<?php
/**
 * Plugin Name: GoldNow Dynamic Country Images
 * Description: Generates one stable daily gold-price image per country from Gold Manager data and displays it on the matching country page.
 * Version: 1.0.1
 * Author: GoldNow
 * Requires at least: 5.8
 * Requires PHP: 7.4
 * Text Domain: goldnow-dynamic-images
 */

if (!defined('ABSPATH')) {
    exit;
}

final class GoldNow_Dynamic_Images {
    const VERSION       = '1.0.1';
    const OPTION_META   = 'gndi_country_image_meta';
    const OPTION_QUEUE  = 'gndi_generation_queue';
    const OPTION_STATUS = 'gndi_last_status';
    const DAILY_HOOK    = 'gndi_daily_refresh';
    const BATCH_HOOK    = 'gndi_process_batch';
    const LOCK_KEY      = 'gndi_generation_lock';
    const BATCH_SIZE    = 5;
    const DIR_NAME      = 'goldnow-country-images';

    private static $gold_rows = null;
    private static $currency_rates = null;
    private static $did_output = false;

    public static function init() {
        add_action('admin_menu', [__CLASS__, 'admin_menu']);
        add_action('admin_post_gndi_refresh_all', [__CLASS__, 'handle_refresh_all']);
        add_action('admin_post_gndi_refresh_one', [__CLASS__, 'handle_refresh_one']);
        add_action(self::DAILY_HOOK, [__CLASS__, 'start_daily_queue']);
        add_action(self::BATCH_HOOK, [__CLASS__, 'process_batch']);
        add_action('loop_start', [__CLASS__, 'inject_before_country_loop'], 5, 1);
        add_action('wp_footer', [__CLASS__, 'inject_footer_fallback'], 99);
        add_shortcode('goldnow_country_dynamic_image', [__CLASS__, 'shortcode']);

        if (!wp_next_scheduled(self::DAILY_HOOK)) {
            wp_schedule_event(time() + 300, 'daily', self::DAILY_HOOK);
        }
    }

    public static function activate() {
        if (!wp_next_scheduled(self::DAILY_HOOK)) {
            wp_schedule_event(time() + 300, 'daily', self::DAILY_HOOK);
        }
    }

    public static function deactivate() {
        wp_clear_scheduled_hook(self::DAILY_HOOK);
        wp_clear_scheduled_hook(self::BATCH_HOOK);
        delete_transient(self::LOCK_KEY);
        delete_option(self::OPTION_QUEUE);
    }

    private static function dependencies_ready() {
        return class_exists('GNAP_Image')
            && class_exists('GNAP_Countries')
            && class_exists('GNAP_Arabic')
            && function_exists('infi_get_latest_gold_prices')
            && function_exists('infi_get_latest_currency_rates');
    }

    /** Return all actual country taxonomy terms that have a usable country code. */
    public static function country_terms() {
        if (!taxonomy_exists('countries')) {
            return [];
        }
        $terms = get_terms([
            'taxonomy'   => 'countries',
            'hide_empty' => false,
            'number'     => 0,
        ]);
        if (is_wp_error($terms) || !is_array($terms)) {
            return [];
        }
        $out = [];
        foreach ($terms as $term) {
            $code = self::term_country_code($term);
            if ($code !== '' && !isset($out[$code])) {
                // A single country may have language-specific term aliases; one image is generated per country code.
                $out[$code] = $term;
            }
        }
        return array_values($out);
    }

    private static function term_country_code($term) {
        if (!is_object($term) || empty($term->term_id)) {
            return '';
        }
        $code = get_term_meta((int) $term->term_id, 'country_code', true);
        if (!$code && !empty($term->slug)) {
            $code = $term->slug;
        }
        $code = strtolower(preg_replace('/[^a-z0-9]/', '', (string) $code));
        return preg_match('/^[a-z]{2,3}$/', $code) ? $code : '';
    }

    private static function currency_unit($currency) {
        $units = [
            'EGP' => 'جنيه', 'SDG' => 'جنيه', 'SAR' => 'ريال', 'AED' => 'درهم', 'QAR' => 'ريال',
            'OMR' => 'ريال', 'YER' => 'ريال', 'KWD' => 'دينار', 'BHD' => 'دينار', 'JOD' => 'دينار',
            'IQD' => 'دينار', 'DZD' => 'دينار', 'TND' => 'دينار', 'LYD' => 'دينار', 'LBP' => 'ليرة',
            'SYP' => 'ليرة', 'MAD' => 'درهم', 'ILS' => 'شيكل', 'KMF' => 'فرنك', 'DJF' => 'فرنك',
            'SOS' => 'شلن', 'MRU' => 'أوقية', 'USD' => 'دولار', 'EUR' => 'يورو', 'GBP' => 'جنيه',
            'TRY' => 'ليرة', 'INR' => 'روبية', 'PKR' => 'روبية', 'RUB' => 'روبل', 'MXN' => 'بيزو',
            'CAD' => 'دولار', 'AUD' => 'دولار', 'NZD' => 'دولار', 'JPY' => 'ين', 'CNY' => 'يوان',
            'BRL' => 'ريال', 'ZAR' => 'راند', 'CHF' => 'فرنك', 'NGN' => 'نايرا', 'BDT' => 'تاكا',
        ];
        return isset($units[$currency]) ? $units[$currency] : $currency;
    }

    private static function country_data($term) {
        $code = self::term_country_code($term);
        if ($code === '') {
            return new WP_Error('gndi_country_code', 'كود الدولة غير موجود في بيانات الدولة.');
        }

        $currency = strtoupper((string) get_term_meta($term->term_id, 'country_currency', true));
        if ($currency === '') {
            global $country_to_currency;
            if (is_array($country_to_currency) && !empty($country_to_currency[$code])) {
                $currency = strtoupper((string) $country_to_currency[$code]);
            }
        }
        if (!preg_match('/^[A-Z]{3}$/', $currency)) {
            return new WP_Error('gndi_currency', 'عملة الدولة غير محددة في بيانات الصفحة أو خريطة العملات.');
        }

        global $currency_names;
        $currency_name = (is_array($currency_names) && !empty($currency_names[$currency]))
            ? (string) $currency_names[$currency]
            : $currency;

        $name = trim((string) $term->name);
        $english_name = (string) get_term_meta($term->term_id, 'country_english_name', true);
        $timezone = (string) get_term_meta($term->term_id, 'country_timezone', true);
        if ($timezone === '') {
            $timezone = function_exists('wp_timezone_string') ? wp_timezone_string() : 'UTC';
        }

        return [
            'code'          => $code,
            'name'          => $name !== '' ? $name : ($english_name ?: strtoupper($code)),
            'name_en'       => $english_name,
            'currency'      => $currency,
            'currency_name' => $currency_name,
            'unit'          => self::currency_unit($currency),
            'symbol'        => function_exists('infi_currency_symbol') ? infi_currency_symbol($currency) : $currency,
            'capital'       => (string) get_term_meta($term->term_id, 'country_capital', true) ?: ($name ?: $code),
            'tz'            => $timezone,
            'global'        => false,
            'prefix'        => '',
            'lang'          => 'ar',
            'term'          => 'سعر',
            'headline'      => 'سعر الذهب في ' . ($name !== '' ? $name : ($english_name ?: strtoupper($code))) . ' اليوم',
            'pound'         => '',
        ];
    }

    private static function price_data() {
        if (self::$gold_rows === null) {
            self::$gold_rows = function_exists('infi_get_latest_gold_prices') ? infi_get_latest_gold_prices() : [];
        }
        if (self::$currency_rates === null) {
            self::$currency_rates = function_exists('infi_get_latest_currency_rates') ? infi_get_latest_currency_rates() : [];
        }

        if (empty(self::$gold_rows) || !is_array(self::$gold_rows)) {
            return new WP_Error('gndi_no_gold', 'لا توجد أسعار ذهب صالحة في قاعدة بيانات Gold Manager.');
        }

        $usd = [];
        $updated_at = 0;
        foreach (self::$gold_rows as $row) {
            if (empty($row['carat']) || !isset($row['price_usd']) || (float) $row['price_usd'] <= 0) {
                continue;
            }
            $usd[(string) $row['carat']] = (float) $row['price_usd'];
            if (!empty($row['fetch_date'])) {
                $stamp = strtotime((string) $row['fetch_date'] . ' UTC');
                if ($stamp) {
                    $updated_at = max($updated_at, $stamp);
                }
            }
        }

        if (empty($usd['24k'])) {
            return new WP_Error('gndi_missing_24k', 'سعر عيار 24 غير موجود؛ لم يتم إنشاء صورة بأسعار ناقصة.');
        }

        foreach (['22k', '21k', '18k', '14k', '12k'] as $carat) {
            if (empty($usd[$carat])) {
                $usd[$carat] = $usd['24k'] * ((int) $carat / 24);
            }
        }
        if (empty($usd['24k_oz'])) {
            $usd['24k_oz'] = $usd['24k'] * 31.1034768;
        }
        if (!$updated_at) {
            $updated_at = time();
        }
        if ((time() - $updated_at) > (36 * HOUR_IN_SECONDS)) {
            return new WP_Error('gndi_stale_gold', 'آخر أسعار الذهب أقدم من 36 ساعة؛ تم إيقاف توليد الصورة حتى لا تُعرض أسعار قديمة.');
        }

        return ['usd' => $usd, 'updated_at' => $updated_at];
    }

    private static function currency_rate($currency) {
        if ($currency === 'USD') {
            return 1.0;
        }
        $rates = is_array(self::$currency_rates) ? self::$currency_rates : [];
        if (empty($rates[$currency])) {
            return new WP_Error('gndi_missing_rate', 'سعر صرف العملة ' . $currency . ' غير موجود في قاعدة بيانات Gold Manager.');
        }
        $usd_base = !empty($rates['USD']) ? (float) $rates['USD'] : 1.0;
        if ($usd_base <= 0) {
            return new WP_Error('gndi_invalid_usd_rate', 'سعر صرف الدولار غير صالح.');
        }
        return (float) $rates[$currency] / $usd_base;
    }

    private static function image_directory() {
        $upload = wp_upload_dir();
        if (!empty($upload['error'])) {
            return new WP_Error('gndi_upload_dir', $upload['error']);
        }
        $path = trailingslashit($upload['basedir']) . self::DIR_NAME;
        if (!is_dir($path) && !wp_mkdir_p($path)) {
            return new WP_Error('gndi_mkdir', 'تعذر إنشاء مجلد صور الدول داخل uploads.');
        }
        return ['path' => $path, 'url' => trailingslashit($upload['baseurl']) . self::DIR_NAME . '/'];
    }

    public static function generate_country($term) {
        if (!self::dependencies_ready()) {
            return new WP_Error('gndi_dependencies', 'يلزم تفعيل Gold Manager وGoldNow Auto Posts حتى تستخدم الإضافة مصدر الأسعار ومولّد الصور الحالي.');
        }
        $country = self::country_data($term);
        if (is_wp_error($country)) {
            return $country;
        }
        $prices = self::price_data();
        if (is_wp_error($prices)) {
            return $prices;
        }
        $rate = self::currency_rate($country['currency']);
        if (is_wp_error($rate)) {
            return $rate;
        }

        $local = [];
        foreach ($prices['usd'] as $carat => $value) {
            $local[$carat] = $value * $rate;
        }
        $snapshot = [
            'country'    => $country,
            'rate'       => $rate,
            'usd'        => $prices['usd'],
            'local'      => $local,
            'buy_sell'   => [],
            'extremes'   => null,
            'updated_at' => $prices['updated_at'],
        ];

        $date = GNAP_Countries::local_date($country['code']);
        $directory = self::image_directory();
        if (is_wp_error($directory)) {
            return $directory;
        }

        // اسم الملف ثابت لكل دولة؛ يتم استبدال الصورة نفسها كل يوم دون تغيير الرابط.
        $filename = $country['code'] . '.jpg';
        $path = trailingslashit($directory['path']) . $filename;
        $site = wp_parse_url(home_url(), PHP_URL_HOST);
        $generated = GNAP_Image::generate($snapshot, $date, null, $site ?: 'altaqrer.com', $path, 'portrait');
        if (is_wp_error($generated)) {
            return $generated;
        }

        $meta = get_option(self::OPTION_META, []);
        if (!is_array($meta)) {
            $meta = [];
        }
        $meta[$country['code']] = [
            'term_id'    => (int) $term->term_id,
            'name'       => $country['name'],
            'currency'   => $country['currency'],
            'url'        => $directory['url'] . $filename,
            'updated_at' => time(),
            'price_time' => (int) $prices['updated_at'],
            'status'     => 'success',
            'message'    => 'تم تحديث الصورة بنجاح.',
        ];
        update_option(self::OPTION_META, $meta, false);

        return $meta[$country['code']];
    }

    public static function start_daily_queue() {
        self::start_queue(array_map(function ($term) { return (int) $term->term_id; }, self::country_terms()));
    }

    private static function start_queue($term_ids) {
        $term_ids = array_values(array_unique(array_filter(array_map('intval', (array) $term_ids))));
        update_option(self::OPTION_QUEUE, ['ids' => $term_ids, 'started_at' => time(), 'done' => 0], false);
        update_option(self::OPTION_STATUS, [
            'time' => time(),
            'message' => sprintf('بدأ تجهيز صور %d دولة على دفعات صغيرة.', count($term_ids)),
        ], false);
        wp_clear_scheduled_hook(self::BATCH_HOOK);
        if ($term_ids) {
            wp_schedule_single_event(time() + 5, self::BATCH_HOOK);
        }
    }

    public static function process_batch() {
        if (get_transient(self::LOCK_KEY)) {
            wp_schedule_single_event(time() + 60, self::BATCH_HOOK);
            return;
        }
        set_transient(self::LOCK_KEY, 1, 5 * MINUTE_IN_SECONDS);
        try {
            $queue = get_option(self::OPTION_QUEUE, []);
            $ids = (is_array($queue) && !empty($queue['ids']) && is_array($queue['ids'])) ? $queue['ids'] : [];
            if (!$ids) {
                update_option(self::OPTION_STATUS, ['time' => time(), 'message' => 'اكتملت كل الصور أو لا توجد دول جاهزة.'], false);
                return;
            }

            $batch = array_splice($ids, 0, self::BATCH_SIZE);
            $success = 0;
            $errors = [];
            foreach ($batch as $term_id) {
                $term = get_term((int) $term_id, 'countries');
                if (!$term || is_wp_error($term)) {
                    $errors[] = 'تعذر العثور على الدولة رقم ' . (int) $term_id;
                    continue;
                }
                $result = self::generate_country($term);
                if (is_wp_error($result)) {
                    $errors[] = $term->name . ': ' . $result->get_error_message();
                    self::save_error($term, $result->get_error_message());
                } else {
                    $success++;
                }
            }

            $queue['ids'] = $ids;
            $queue['done'] = (int) ($queue['done'] ?? 0) + count($batch);
            update_option(self::OPTION_QUEUE, $queue, false);
            $message = sprintf('تمت معالجة %d دولة في هذه الدفعة، نجح %d، والمتبقي %d.', count($batch), $success, count($ids));
            if ($errors) {
                $message .= ' أخطاء: ' . implode(' | ', array_slice($errors, 0, 4));
            }
            update_option(self::OPTION_STATUS, ['time' => time(), 'message' => $message], false);

            if ($ids) {
                wp_schedule_single_event(time() + 45, self::BATCH_HOOK);
            } else {
                update_option(self::OPTION_STATUS, [
                    'time' => time(),
                    'message' => sprintf('اكتملت دورة الصور. تمت معالجة %d دولة.', (int) $queue['done']),
                ], false);
                delete_option(self::OPTION_QUEUE);
            }
        } finally {
            delete_transient(self::LOCK_KEY);
        }
    }

    private static function save_error($term, $message) {
        $code = self::term_country_code($term);
        if (!$code) {
            return;
        }
        $meta = get_option(self::OPTION_META, []);
        if (!is_array($meta)) {
            $meta = [];
        }
        $previous = isset($meta[$code]) && is_array($meta[$code]) ? $meta[$code] : [];
        $meta[$code] = array_merge($previous, [
            'term_id' => (int) $term->term_id,
            'name' => (string) $term->name,
            'status' => 'error',
            'message' => (string) $message,
            'attempted_at' => time(),
        ]);
        update_option(self::OPTION_META, $meta, false);
    }

    public static function admin_menu() {
        add_options_page(
            'GoldNow Dynamic Images',
            'GoldNow Dynamic Images',
            'manage_options',
            'goldnow-dynamic-images',
            [__CLASS__, 'settings_page']
        );
    }

    public static function settings_page() {
        if (!current_user_can('manage_options')) {
            return;
        }
        $terms = self::country_terms();
        $meta = get_option(self::OPTION_META, []);
        $status = get_option(self::OPTION_STATUS, []);
        $queue = get_option(self::OPTION_QUEUE, []);
        $ready = self::dependencies_ready();
        ?>
        <div class="wrap">
            <h1>GoldNow Dynamic Country Images</h1>
            <p>إنشاء صورة أسعار ثابتة الرابط لكل دولة، وتحديث محتواها كل 24 ساعة من بيانات Gold Manager باستخدام مولّد الصور الموجود في GoldNow Auto Posts.</p>
            <?php if (!$ready) : ?>
                <div class="notice notice-error"><p>الإضافة تحتاج إلى تفعيل Gold Manager وGoldNow Auto Posts. لم يتم تعديل أي ملف من الإضافتين.</p></div>
            <?php else : ?>
                <div class="notice notice-success"><p>مصدر الأسعار ومولّد الصور متاحان.</p></div>
            <?php endif; ?>
            <?php if (!empty($_GET['gndi_queued'])) : ?>
                <div class="notice notice-success is-dismissible"><p>تم وضع طلب تحديث الصور في قائمة التنفيذ.</p></div>
            <?php endif; ?>
            <p><strong>الدول المكتشفة:</strong> <?php echo esc_html((string) count($terms)); ?> — <strong>الصور المسجلة:</strong> <?php echo esc_html((string) (is_array($meta) ? count($meta) : 0)); ?></p>
            <?php if (!empty($status['message'])) : ?>
                <p><strong>آخر حالة:</strong> <?php echo esc_html($status['message']); ?><?php if (!empty($status['time'])) : ?> <span style="color:#666">(<?php echo esc_html(wp_date('Y-m-d H:i:s', (int) $status['time'])); ?>)</span><?php endif; ?></p>
            <?php endif; ?>
            <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" style="margin:18px 0">
                <input type="hidden" name="action" value="gndi_refresh_all">
                <?php wp_nonce_field('gndi_refresh_all'); ?>
                <?php submit_button('تحديث صور جميع الدول الآن', 'primary', 'submit', false, $ready ? [] : ['disabled' => 'disabled']); ?>
            </form>
            <hr>
            <h2>تحديث دولة واحدة للتجربة</h2>
            <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
                <input type="hidden" name="action" value="gndi_refresh_one">
                <?php wp_nonce_field('gndi_refresh_one'); ?>
                <select name="term_id">
                    <?php foreach ($terms as $term) : ?>
                        <option value="<?php echo esc_attr((string) $term->term_id); ?>" <?php selected(strtolower((string) get_term_meta($term->term_id, 'country_code', true)), 'eg'); ?>><?php echo esc_html($term->name . ' (' . self::term_country_code($term) . ')'); ?></option>
                    <?php endforeach; ?>
                </select>
                <?php submit_button('تحديث صورة الدولة المحددة', 'secondary', 'submit', false, ($ready && !empty($terms)) ? [] : ['disabled' => 'disabled']); ?>
            </form>
            <hr>
            <h2>حالة الصور</h2>
            <table class="widefat striped"><thead><tr><th>الدولة</th><th>الكود</th><th>العملة</th><th>آخر تحديث</th><th>الحالة</th><th>الرابط</th></tr></thead><tbody>
            <?php foreach ($terms as $term) : $code = self::term_country_code($term); $item = (is_array($meta) && isset($meta[$code])) ? $meta[$code] : []; ?>
                <tr>
                    <td><?php echo esc_html($term->name); ?></td>
                    <td><?php echo esc_html($code); ?></td>
                    <td><?php echo esc_html($item['currency'] ?? (string) get_term_meta($term->term_id, 'country_currency', true)); ?></td>
                    <td><?php echo !empty($item['updated_at']) ? esc_html(wp_date('Y-m-d H:i', (int) $item['updated_at'])) : '—'; ?></td>
                    <td><?php echo esc_html($item['status'] ?? 'لم تُنشأ بعد'); ?><?php if (!empty($item['message']) && ($item['status'] ?? '') === 'error') : ?><br><small><?php echo esc_html($item['message']); ?></small><?php endif; ?></td>
                    <td><?php if (!empty($item['url'])) : ?><a href="<?php echo esc_url($item['url']); ?>" target="_blank" rel="noopener">فتح الصورة</a><?php else : ?>—<?php endif; ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody></table>
            <p style="margin-top:16px;color:#666">مسار الحفظ: <code>wp-content/uploads/<?php echo esc_html(self::DIR_NAME); ?>/</code> — اسم الملف ثابت حسب كود الدولة مثل <code>eg.jpg</code>.</p>
        </div>
        <?php
    }

    public static function handle_refresh_all() {
        if (!current_user_can('manage_options')) {
            wp_die('غير مسموح.');
        }
        check_admin_referer('gndi_refresh_all');
        self::start_daily_queue();
        wp_safe_redirect(add_query_arg('gndi_queued', '1', admin_url('options-general.php?page=goldnow-dynamic-images')));
        exit;
    }

    public static function handle_refresh_one() {
        if (!current_user_can('manage_options')) {
            wp_die('غير مسموح.');
        }
        check_admin_referer('gndi_refresh_one');
        $term_id = isset($_POST['term_id']) ? absint($_POST['term_id']) : 0;
        $term = $term_id ? get_term($term_id, 'countries') : null;
        if (!$term || is_wp_error($term)) {
            wp_safe_redirect(admin_url('options-general.php?page=goldnow-dynamic-images'));
            exit;
        }
        self::start_queue([$term_id]);
        wp_safe_redirect(add_query_arg('gndi_queued', '1', admin_url('options-general.php?page=goldnow-dynamic-images')));
        exit;
    }

    private static function current_country_term() {
        if (!is_tax('countries')) {
            return null;
        }
        $term = get_queried_object();
        return (is_object($term) && !empty($term->term_id) && $term->taxonomy === 'countries') ? $term : null;
    }

    private static function current_page_url() {
        $path = isset($_SERVER['REQUEST_URI']) ? wp_unslash($_SERVER['REQUEST_URI']) : '/';
        $path = (string) parse_url($path, PHP_URL_PATH);
        if ($path === '') {
            $path = '/';
        }
        return home_url($path);
    }

    private static function image_html($term, $link_url = '') {
        $code = self::term_country_code($term);
        $meta = get_option(self::OPTION_META, []);
        if (!$code || !is_array($meta) || empty($meta[$code]['url'])) {
            return '';
        }
        $image_url = $meta[$code]['url'];
        $directory = self::image_directory();
        if (is_wp_error($directory) || !file_exists(trailingslashit($directory['path']) . $code . '.jpg')) {
            return '';
        }
        $name = !empty($meta[$code]['name']) ? (string) $meta[$code]['name'] : (string) $term->name;
        $alt = 'سعر الذهب اليوم في ' . $name . '، أسعار عيارات 24 و21 و18 و14';
        $link_url = $link_url ?: get_term_link($term);
        if (is_wp_error($link_url) || !$link_url) {
            $link_url = self::current_page_url();
        }
        return '<section class="gndi-country-image" aria-label="' . esc_attr($alt) . '" style="max-width:760px;margin:28px auto;text-align:center;clear:both">'
            . '<a href="' . esc_url($link_url) . '" title="' . esc_attr($alt) . '" style="display:inline-block">'
            . '<img src="' . esc_url($image_url) . '" alt="' . esc_attr($alt) . '" title="' . esc_attr($alt) . '" width="1080" height="1350" loading="lazy" decoding="async" style="display:block;width:100%;height:auto;border-radius:10px">'
            . '</a></section>';
    }

    public static function inject_before_country_loop($query) {
        if (self::$did_output || !($query instanceof WP_Query) || !$query->is_main_query()) {
            return;
        }
        $term = self::current_country_term();
        if (!$term) {
            return;
        }
        $html = self::image_html($term, self::current_page_url());
        if ($html !== '') {
            echo $html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- generated, escaped HTML.
            self::$did_output = true;
        }
    }

    public static function inject_footer_fallback() {
        if (self::$did_output) {
            return;
        }
        $term = self::current_country_term();
        if (!$term) {
            return;
        }
        $html = self::image_html($term, self::current_page_url());
        if ($html !== '') {
            echo $html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- generated, escaped HTML.
            self::$did_output = true;
        }
    }

    public static function shortcode($atts = []) {
        $atts = shortcode_atts(['country' => ''], $atts, 'goldnow_country_dynamic_image');
        $term = null;
        if (!empty($atts['country'])) {
            $code = strtolower(preg_replace('/[^a-z0-9]/', '', (string) $atts['country']));
            $terms = self::country_terms();
            foreach ($terms as $candidate) {
                if (self::term_country_code($candidate) === $code) {
                    $term = $candidate;
                    break;
                }
            }
        } else {
            $term = self::current_country_term();
        }
        return $term ? self::image_html($term, is_tax('countries') ? self::current_page_url() : '') : '';
    }

    public static function timezone($code) {
        $terms = self::country_terms();
        foreach ($terms as $term) {
            if (self::term_country_code($term) === strtolower((string) $code)) {
                $tz = (string) get_term_meta($term->term_id, 'country_timezone', true);
                if ($tz) {
                    try { return new DateTimeZone($tz); } catch (Exception $e) {}
                }
            }
        }
        return function_exists('wp_timezone') ? wp_timezone() : new DateTimeZone('UTC');
    }
}

add_action('plugins_loaded', ['GoldNow_Dynamic_Images', 'init'], 99);
register_activation_hook(__FILE__, ['GoldNow_Dynamic_Images', 'activate']);
register_deactivation_hook(__FILE__, ['GoldNow_Dynamic_Images', 'deactivate']);
