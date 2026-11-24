<?php
/**
 * Plugin Name: AlTaqrer Gold Video Publisher
 * Description: AlTaqrer Gold multilingual gold video production, scheduling and publishing.
 * Version: 0.6.8-dev
 * Author: GoldNow
 * Text Domain: goldnow-video-publisher
 */

if (!defined('ABSPATH')) { exit; }

define('GNVP_VERSION', '0.6.8-dev');
define('GNVP_FILE', __FILE__);
define('GNVP_PATH', plugin_dir_path(__FILE__));
define('GNVP_OPTION', 'gnvp_settings');
define('GNVP_SNAPSHOT_OPTION', 'gnvp_latest_snapshot');
define('GNVP_RENDER_OPTION', 'gnvp_rendered_videos');

final class GoldNow_Video_Publisher {
    const MENU_SLUG = 'goldnow-video-publisher';
    const CRON_HOOK = 'gnvp_refresh_prices_event';
    const PUBLISH_HOOK = 'gnvp_publish_queue_item';
    const ROTATION_HOOK = 'gnvp_auto_publish_cycle';
    const CLEANUP_HOOK = 'gnvp_cleanup_failed_videos';
    const GRAPH_VERSION = 'v27.0';

    public function __construct() {
        add_filter('cron_schedules', array($this, 'add_cron_schedules'));
        add_action('admin_menu', array($this, 'register_menu'));
        add_action('admin_enqueue_scripts', array($this, 'enqueue_admin_assets'));
        add_action('admin_post_gnvp_save_settings', array($this, 'save_settings'));
        add_action('admin_post_gnvp_refresh_now', array($this, 'refresh_now'));
        add_action('admin_post_gnvp_render_now', array($this, 'render_now'));
        add_action('wp_ajax_gnvp_render_start', array($this, 'ajax_render_start'));
        add_action('wp_ajax_gnvp_render_batch', array($this, 'ajax_render_batch'));
        add_action(self::CRON_HOOK, array($this, 'refresh_snapshot'));
        add_action(self::PUBLISH_HOOK, array($this, 'run_scheduled_publish'), 10, 1);
        add_action(self::ROTATION_HOOK, array($this, 'auto_publish_cycle'));
        add_action(self::CLEANUP_HOOK, array($this, 'cleanup_failed_video_files'));
        add_action('admin_post_gnvp_save_facebook', array($this, 'save_facebook_connection'));
        add_action('admin_post_gnvp_test_facebook', array($this, 'test_facebook_connection'));
        add_action('admin_post_gnvp_queue_publish', array($this, 'queue_publish'));
        add_action('admin_post_gnvp_save_publishing_settings', array($this, 'save_publishing_settings'));
        add_action('admin_post_gnvp_delete_queue', array($this, 'delete_queue_item'));
        add_action('admin_post_gnvp_save_live', array($this, 'save_live_settings'));
        add_action('admin_post_gnvp_run_diagnostics', array($this, 'run_diagnostics'));
        add_action('admin_post_gnvp_run_arabic_diagnostics', array($this, 'run_arabic_diagnostics_admin'));
    }

    public static function activate() {
        $saved = get_option(GNVP_OPTION, array());
        $auto_refresh = !isset($saved['auto_refresh']) || !empty($saved['auto_refresh']);
        if ($auto_refresh && !wp_next_scheduled(self::CRON_HOOK)) {
            wp_schedule_event(time() + 300, 'gnvp_every_three_hours', self::CRON_HOOK);
        }
        wp_clear_scheduled_hook(self::CLEANUP_HOOK);
        if (!wp_next_scheduled(self::CLEANUP_HOOK)) { wp_schedule_event(time() + 60, 'gnvp_retention_15_minutes', self::CLEANUP_HOOK); }
        $pub = get_option('gnvp_publishing_settings', array());
        if (!empty($pub['enabled']) && !wp_next_scheduled(self::ROTATION_HOOK)) { wp_schedule_event(time() + 300, 'gnvp_selected_publish_interval', self::ROTATION_HOOK); }
    }

    public static function deactivate() {
        wp_clear_scheduled_hook(self::CRON_HOOK);
        wp_clear_scheduled_hook(self::ROTATION_HOOK);
        wp_clear_scheduled_hook(self::CLEANUP_HOOK);
    }

    public function add_cron_schedules($schedules) {
        if (!isset($schedules['gnvp_every_three_hours'])) { $schedules['gnvp_every_three_hours'] = array('interval' => 3 * HOUR_IN_SECONDS, 'display' => 'Every 3 hours (AlTaqrer Gold)'); }
        if (!isset($schedules['gnvp_retention_15_minutes'])) { $schedules['gnvp_retention_15_minutes'] = array('interval' => 15 * MINUTE_IN_SECONDS, 'display' => 'Every 15 minutes (GNVP file retention)'); }
        $pub = get_option('gnvp_publishing_settings', array());
        $interval = max(1, min(24, absint($pub['interval_hours'] ?? 3)));
        $schedules['gnvp_selected_publish_interval'] = array('interval' => $interval * HOUR_IN_SECONDS, 'display' => 'AlTaqrer Gold selected publishing interval');
        return $schedules;
    }

    private function supported_languages() {
        return array(
            'ar' => 'العربية — مصر', 'en' => 'English', 'fr' => 'Français', 'de' => 'Deutsch',
            'it' => 'Italiano', 'pt' => 'Português', 'ru' => 'Русский', 'hi' => 'हिन्दी',
            'es' => 'Español', 'tr' => 'Türkçe', 'th' => 'ไทย', 'vi' => 'Tiếng Việt',
            'id' => 'Bahasa Indonesia', 'ja' => '日本語', 'ko' => '한국어',
        );
    }

    private function defaults() {
        return array(
            'market' => 'EG', 'currency' => 'EGP',
            'languages' => array('ar', 'en', 'fr', 'de', 'it', 'pt', 'ru', 'hi', 'es', 'tr', 'th', 'vi', 'id', 'ja', 'ko'),
            'formats' => array('vertical', 'horizontal'),
            'auto_refresh' => 1, 'auto_render' => 0,
            'live_enabled' => 0, 'live_start' => '08:00', 'live_duration' => 60,
            'live_times' => array('08:00', '12:00', '16:00', '20:00', '00:00', '04:00'),
            'live_timezone' => 'Africa/Cairo', 'live_repeat' => 'every_4_hours',
        );
    }

    private function settings() {
        $saved = get_option(GNVP_OPTION, array());
        $saved = is_array($saved) ? $saved : array();
        // One-time upgrade: expand the old ar/en-only installation to the full site language set.
        if (!get_option('gnvp_language_set_v2')) {
            $saved['languages'] = array_values(array_unique(array_merge(
                isset($saved['languages']) && is_array($saved['languages']) ? $saved['languages'] : array(),
                array_keys($this->supported_languages())
            )));
            update_option(GNVP_OPTION, $saved, false);
            update_option('gnvp_language_set_v2', 1, false);
        }
        return wp_parse_args($saved, $this->defaults());
    }

    public function register_menu() {
        add_menu_page('AlTaqrer Gold Video Publisher', 'AlTaqrer Gold Videos', 'manage_options', self::MENU_SLUG,
            array($this, 'render_dashboard'), 'dashicons-video-alt3', 58);
        add_submenu_page(self::MENU_SLUG, 'مكتبة الفيديوهات', 'مكتبة الفيديوهات', 'manage_options', self::MENU_SLUG . '-library', array($this, 'render_library'));
        add_submenu_page(self::MENU_SLUG, 'النشر والجدولة', 'النشر والجدولة', 'manage_options', self::MENU_SLUG . '-publishing', array($this, 'render_publishing'));
        add_submenu_page(self::MENU_SLUG, 'ربط المنصات', 'ربط المنصات', 'manage_options', self::MENU_SLUG . '-connections', array($this, 'render_connections'));
        add_submenu_page(self::MENU_SLUG, 'البث المباشر', 'البث المباشر', 'manage_options', self::MENU_SLUG . '-live', array($this, 'render_live'));
        add_submenu_page(self::MENU_SLUG, 'فحص الجاهزية', 'فحص الجاهزية', 'manage_options', self::MENU_SLUG . '-diagnostics', array($this, 'render_diagnostics'));
    }

    public function enqueue_admin_assets($hook) {
        if ('toplevel_page_' . self::MENU_SLUG === $hook) {
            wp_enqueue_style('gnvp-admin', plugin_dir_url(__FILE__) . 'assets/admin.css', array(), GNVP_VERSION);
            wp_register_script('gnvp-render-admin', false, array(), GNVP_VERSION, true);
            wp_enqueue_script('gnvp-render-admin');
            wp_add_inline_script('gnvp-render-admin', 'window.GNVP_RENDER = ' . wp_json_encode(array(
                'ajaxUrl' => admin_url('admin-ajax.php'),
                'nonce' => wp_create_nonce('gnvp_render_batch'),
            )) . ';');
            wp_add_inline_script('gnvp-render-admin', 'document.addEventListener("DOMContentLoaded",function(){var b=document.getElementById("gnvp-render-button");if(!b||!window.GNVP_RENDER)return;var out=document.getElementById("gnvp-render-status");function call(action){var d=new FormData();d.append("action",action);d.append("_ajax_nonce",GNVP_RENDER.nonce);return fetch(GNVP_RENDER.ajaxUrl,{method:"POST",credentials:"same-origin",body:d}).then(function(r){return r.json()})}b.addEventListener("click",function(){b.disabled=true;out.textContent="جارٍ تجهيز مهمة الإنتاج...";call("gnvp_render_start").then(function(r){if(!r.success)throw new Error(r.data&&r.data.message?r.data.message:"تعذر بدء الإنتاج");var total=r.data.total;var done=0;function next(){call("gnvp_render_batch").then(function(x){if(!x.success)throw new Error(x.data&&x.data.message?x.data.message:"فشلت دفعة الإنتاج");done=x.data.done;out.textContent="تمت معالجة "+done+" من "+total+" — نجاح: "+x.data.success+" — أخطاء: "+x.data.errors;if(x.data.finished){out.textContent+=" — انتهى الإنتاج. سيتم تحديث عرض النتائج الآن.";setTimeout(function(){window.location.reload()},1200);return}next()}).catch(fail)}next()}).catch(fail);function fail(e){out.textContent="تعذر إكمال الإنتاج: "+e.message;b.disabled=false}})})'); 
        }
    }

    /** Gold Manager is read-only. Local Egyptian prices are derived from its USD prices and EGP/USD rate. */
    private function get_gold_data() {
        $result = array('ok' => false, 'message' => 'Gold Manager data functions were not found.', 'prices' => array(),
            'global_ounce_usd' => 0, 'gold_date' => '', 'currency_date' => '', 'source_updated_at' => '', 'ounce_updated_at' => '', 'currency' => 'EGP', 'market' => 'EG');
        if (!function_exists('infi_get_latest_gold_prices') || !function_exists('infi_get_latest_currency_rates')) { return $result; }

        $gold_rows = infi_get_latest_gold_prices();
        $egp_row = infi_get_latest_currency_rates('EGP');
        if (empty($gold_rows) || !is_array($gold_rows)) {
            $result['message'] = 'Gold Manager is available, but no current gold-price records were returned.';
            return $result;
        }
        if (empty($egp_row) || !is_array($egp_row) || empty($egp_row['rate_to_usd']) || floatval($egp_row['rate_to_usd']) <= 0) {
            $result['message'] = 'Gold prices were found, but the EGP rate_to_usd record is missing or invalid.';
            return $result;
        }

        $egp_per_usd = floatval($egp_row['rate_to_usd']);
        foreach ($gold_rows as $row) {
            if (!isset($row['carat'], $row['price_usd']) || floatval($row['price_usd']) <= 0) { continue; }
            $carat = strtoupper(preg_replace('/[^0-9A-Z_]/i', '', (string) $row['carat']));
            $usd = floatval($row['price_usd']);
            // Gold Manager stores carat identifiers in lowercase (for example, 24k_oz).
            // Normalize once, then compare case-insensitively so the global ounce is not discarded.
            if (strtolower($carat) === '24k_oz') {
                $result['global_ounce_usd'] = round($usd, 2);
                if (!empty($row['fetch_date'])) { $result['ounce_updated_at'] = (string) $row['fetch_date']; }
                if (empty($result['gold_date']) && !empty($row['gold_date'])) { $result['gold_date'] = (string) $row['gold_date']; }
                continue;
            }
            $result['prices'][$carat] = array(
                'carat' => $carat,
                'price_egp' => round($usd * $egp_per_usd, 2),
                'price_usd' => round($usd, 6),
                'gold_date' => isset($row['gold_date']) ? (string) $row['gold_date'] : '',
                'fetch_date' => isset($row['fetch_date']) ? (string) $row['fetch_date'] : '',
            );
            if (!empty($row['fetch_date'])) {
                $candidate_time = strtotime((string) $row['fetch_date']);
                $current_time = $result['source_updated_at'] ? strtotime($result['source_updated_at']) : false;
                if ($candidate_time && (!$current_time || $candidate_time > $current_time)) { $result['source_updated_at'] = (string) $row['fetch_date']; }
            }
            if (empty($result['gold_date']) && !empty($row['gold_date'])) { $result['gold_date'] = (string) $row['gold_date']; }
        }
        if (empty($result['prices']) && $result['global_ounce_usd'] <= 0) {
            $result['message'] = 'Gold Manager returned records, but no usable Egyptian karat prices or global ounce price was recognized. Check the latest gold date and stored carat values.';
            return $result;
        }
        if (empty($result['prices'])) {
            $result['message'] = 'The global USD ounce price was found, but no usable Egyptian karat gram prices were recognized.';
            return $result;
        }
        if ($result['global_ounce_usd'] <= 0) {
            $result['message'] = 'Egyptian karat prices were found, but the global 24k_oz USD ounce record was not recognized.';
            return $result;
        }
        $result['ok'] = true;
        $result['message'] = 'Connected to Gold Manager. Egypt prices and global ounce are read-only.';
        $result['currency_date'] = isset($egp_row['currency_date']) ? (string) $egp_row['currency_date'] : '';
        return $result;
    }

    private function build_snapshot($data) {
        $settings = $this->settings();
        $language_labels = $this->supported_languages();
        $format_labels = array('vertical' => '9:16', 'horizontal' => '16:9');
        $jobs = array();
        foreach ($settings['languages'] as $language) {
            foreach ($settings['formats'] as $format) {
                $is_global = ($language !== 'ar');
                $jobs[] = array(
                    'id' => ($is_global ? 'GLOBAL' : 'EG') . '-' . $language . '-' . $format,
                    'market' => $is_global ? 'GLOBAL' : 'EG',
                    'country' => $is_global ? 'Global' : 'Egypt',
                    'currency' => $is_global ? 'USD' : 'EGP',
                    'language' => $language, 'language_label' => isset($language_labels[$language]) ? $language_labels[$language] : $language,
                    'format' => $format, 'aspect_ratio' => $format_labels[$format],
                    'status' => 'queued_for_rendering',
                );
            }
        }
        return array(
            'schema_version' => 2, 'plugin_version' => GNVP_VERSION, 'generated_at_utc' => gmdate('c'),
            'market' => array('code' => 'EG', 'name' => 'Egypt', 'currency' => 'EGP'),
            'global_market' => array('code' => 'GLOBAL', 'name' => 'Global', 'currency' => 'USD'),
            'source' => 'Gold Manager (read-only)', 'gold_date' => $data['gold_date'],
            'currency_date' => $data['currency_date'],
            'source_updated_at' => $data['source_updated_at'],
            'ounce_updated_at' => $data['ounce_updated_at'], 'prices' => array_values($data['prices']),
            'global_ounce_usd' => $data['global_ounce_usd'], 'production_jobs' => $jobs,
            'publishing' => array('enabled' => false, 'platform' => 'Facebook', 'status' => 'not_connected'),
            'rendering' => array('enabled' => true, 'status' => 'ready_to_render'),
        );
    }

    public function refresh_snapshot($allow_auto_render = true) {
        $data = $this->get_gold_data();
        if (empty($data['ok'])) {
            update_option('gnvp_last_refresh_error', array('time' => current_time('mysql'), 'message' => $data['message']), false);
            return false;
        }
        $snapshot = $this->build_snapshot($data);
        update_option(GNVP_SNAPSHOT_OPTION, $snapshot, false);
        update_option('gnvp_last_refresh_error', array(), false);
        $settings = $this->settings();
        if ($allow_auto_render && !empty($settings['auto_render'])) {
            $render_hash = md5(wp_json_encode(array($snapshot['prices'], $snapshot['global_ounce_usd'], $snapshot['gold_date'], $snapshot['source_updated_at'], $snapshot['ounce_updated_at'])));
            if (get_option('gnvp_last_auto_render_hash') !== $render_hash) {
                if ($this->render_snapshot_videos($snapshot)) { update_option('gnvp_last_auto_render_hash', $render_hash, false); }
            }
        }
        return $snapshot;
    }

    private function sanitize_settings_from_post() {
        $languages = isset($_POST['languages']) ? array_map('sanitize_key', (array) wp_unslash($_POST['languages'])) : array();
        $formats = isset($_POST['formats']) ? array_map('sanitize_key', (array) wp_unslash($_POST['formats'])) : array();
        $languages = array_values(array_intersect(array_keys($this->supported_languages()), $languages));
        $formats = array_values(array_intersect(array('vertical', 'horizontal'), $formats));
        if (!$languages) { $languages = array('ar'); }
        if (!$formats) { $formats = array('vertical'); }
        return array(
            'market' => 'EG', 'currency' => 'EGP', 'languages' => $languages, 'formats' => $formats,
            'auto_refresh' => !empty($_POST['auto_refresh']) ? 1 : 0,
            'auto_render' => !empty($_POST['auto_render']) ? 1 : 0,
            'live_enabled' => 0,
            'live_start' => '08:00', 'live_duration' => 60,
            'live_times' => array('08:00', '12:00', '16:00', '20:00', '00:00', '04:00'),
            'live_timezone' => 'Africa/Cairo', 'live_repeat' => 'every_4_hours',
        );
    }

    public function save_settings() {
        if (!current_user_can('manage_options')) { wp_die('Unauthorized'); }
        check_admin_referer('gnvp_save_settings');
        $settings = $this->sanitize_settings_from_post();
        update_option(GNVP_OPTION, $settings, false);
        wp_clear_scheduled_hook(self::CRON_HOOK);
        if ($settings['auto_refresh']) { wp_schedule_event(time() + 300, 'hourly', self::CRON_HOOK); }
        $this->refresh_snapshot();
        wp_safe_redirect(add_query_arg(array('page' => self::MENU_SLUG, 'saved' => '1'), admin_url('admin.php')));
        exit;
    }

    public function refresh_now() {
        if (!current_user_can('manage_options')) { wp_die('Unauthorized'); }
        check_admin_referer('gnvp_refresh_now');
        $result = $this->refresh_snapshot();
        wp_safe_redirect(add_query_arg(array('page' => self::MENU_SLUG, 'refresh' => is_array($result) ? 'refreshed' : 'error'), admin_url('admin.php')));
        exit;
    }

    public function ajax_render_start() {
        if (!current_user_can('manage_options')) { wp_send_json_error(array('message' => 'غير مصرح.'), 403); }
        check_ajax_referer('gnvp_render_batch');
        $snapshot = get_option(GNVP_SNAPSHOT_OPTION, array());
        if (empty($snapshot['production_jobs']) || empty($snapshot['global_ounce_usd'])) {
            $snapshot = $this->refresh_snapshot(false);
        }
        if (!is_array($snapshot) || empty($snapshot['production_jobs']) || empty($snapshot['prices']) || empty($snapshot['global_ounce_usd'])) {
            wp_send_json_error(array('message' => 'بيانات الأسعار أو مهام الإنتاج غير مكتملة.'), 400);
        }
        $upload = wp_upload_dir();
        if (!empty($upload['error'])) { wp_send_json_error(array('message' => $upload['error']), 500); }
        $dir = trailingslashit($upload['basedir']) . 'goldnow-videos';
        if (!wp_mkdir_p($dir)) { wp_send_json_error(array('message' => 'تعذر إنشاء مجلد الفيديوهات.'), 500); }
        $state = array('snapshot' => $snapshot, 'index' => 0, 'total' => count($snapshot['production_jobs']),
            'results' => array(), 'errors' => array(), 'dir' => $dir,
            'baseurl' => trailingslashit($upload['baseurl']) . 'goldnow-videos');
        set_transient('gnvp_render_batch_' . get_current_user_id(), $state, 30 * MINUTE_IN_SECONDS);
        wp_send_json_success(array('total' => $state['total']));
    }

    public function ajax_render_batch() {
        if (!current_user_can('manage_options')) { wp_send_json_error(array('message' => 'غير مصرح.'), 403); }
        check_ajax_referer('gnvp_render_batch');
        $key = 'gnvp_render_batch_' . get_current_user_id();
        $state = get_transient($key);
        if (!is_array($state) || empty($state['snapshot']['production_jobs'])) {
            wp_send_json_error(array('message' => 'انتهت جلسة الإنتاج؛ ابدأ العملية من جديد.'), 400);
        }
        if ($state['index'] < $state['total']) {
            $job = $state['snapshot']['production_jobs'][$state['index']];
            $video = $this->render_one_video($job, $state['snapshot'], array('basedir' => $state['dir'], 'baseurl' => $state['baseurl']));
            if (is_wp_error($video)) { $state['errors'][] = $job['id'] . ': ' . $video->get_error_message(); }
            else { $state['results'][] = $video; }
            $state['index']++;
        }
        $finished = ($state['index'] >= $state['total']);
        if ($finished) {
            $this->merge_rendered_videos($state['results']);
            update_option('gnvp_render_error', $state['errors'] ? implode("\\n", $state['errors']) : '', false);
            update_option('gnvp_last_rendered_at', current_time('mysql'), false);
            delete_transient($key);
        } else {
            set_transient($key, $state, 30 * MINUTE_IN_SECONDS);
        }
        wp_send_json_success(array('done' => $state['index'], 'total' => $state['total'],
            'success' => count($state['results']), 'errors' => count($state['errors']), 'finished' => $finished));
    }

    public function render_now() {
        if (!current_user_can('manage_options')) { wp_die('Unauthorized'); }
        check_admin_referer('gnvp_render_now');
        $snapshot = get_option(GNVP_SNAPSHOT_OPTION, array());
        if (empty($snapshot['production_jobs']) || empty($snapshot['global_ounce_usd'])) {
            $snapshot = $this->refresh_snapshot();
        }
        $result = is_array($snapshot) ? $this->render_snapshot_videos($snapshot) : false;
        wp_safe_redirect(add_query_arg(array('page' => self::MENU_SLUG, 'render' => $result ? 'done' : 'error'), admin_url('admin.php')));
        exit;
    }

    private function ffmpeg_binary() {
        $filtered = apply_filters('gnvp_ffmpeg_binary', '');
        if (is_string($filtered) && $filtered !== '') { return $filtered; }
        foreach (array('/usr/bin/ffmpeg', '/usr/local/bin/ffmpeg', '/opt/homebrew/bin/ffmpeg') as $candidate) {
            if (is_executable($candidate)) { return $candidate; }
        }
        return '';
    }

    private function font_file($language) {
        $filtered = apply_filters('gnvp_font_file', '', $language);
        if (is_string($filtered) && $filtered !== '' && is_readable($filtered)) { return $filtered; }

        // Prefer fonts bundled with this plugin; fall back to the Auto Posts font pack.
        $bundled_fonts = GNVP_PATH . 'assets/fonts/';
        $auto_posts_fonts = WP_PLUGIN_DIR . '/goldnow-auto-posts/assets/fonts/';
        // Prefer bundled bold faces so every language remains legible on mobile.
        // Keep script-specific families first to avoid missing glyphs in CJK/Indic/Thai.
        $font_map = array(
            'ar' => array('Cairo-Bold.ttf', 'Cairo-Regular.ttf'),
            'hi' => array('NotoSansDevanagari-Bold.ttf', 'NotoSansDevanagari-Regular.ttf', 'NotoSans-Bold.ttf', 'NotoSans-Regular.ttf'),
            'th' => array('NotoSansThai-Bold.ttf', 'NotoSansThai-Regular.ttf', 'NotoSans-Bold.ttf', 'NotoSans-Regular.ttf'),
            'ja' => array('NotoSansJP-Bold.ttf', 'NotoSansJP-Regular.ttf', 'NotoSans-Bold.ttf', 'NotoSans-Regular.ttf'),
            'ko' => array('NotoSansKR-Bold.ttf', 'NotoSansKR-Regular.ttf', 'NotoSans-Bold.ttf', 'NotoSans-Regular.ttf'),
        );
        $candidates = isset($font_map[$language]) ? $font_map[$language] : array('NotoSans-Bold.ttf', 'NotoSans-Regular.ttf');
        foreach ($candidates as $candidate) {
            foreach (array($bundled_fonts, $auto_posts_fonts) as $font_dir) {
                $path = $font_dir . $candidate;
                if (is_readable($path)) { return $path; }
            }
        }

        $system = ($language === 'ar')
            ? array('/usr/share/fonts/truetype/noto/NotoSansArabic-Regular.ttf', '/usr/share/fonts/truetype/dejavu/DejaVuSans.ttf')
            : array('/usr/share/fonts/truetype/dejavu/DejaVuSans.ttf', '/usr/share/fonts/truetype/liberation2/LiberationSans-Regular.ttf');
        foreach ($system as $candidate) { if (is_readable($candidate)) { return $candidate; } }
        return '';
    }

    private function ffmpeg_supports_filter($ffmpeg, $filter_name) {
        static $cache = array();
        $key = $ffmpeg . '|' . $filter_name;
        if (isset($cache[$key])) { return $cache[$key]; }
        $process = @proc_open(array($ffmpeg, '-hide_banner', '-filters'), array(0 => array('pipe', 'r'), 1 => array('pipe', 'w'), 2 => array('pipe', 'w')), $pipes);
        if (!is_resource($process)) { $cache[$key] = false; return false; }
        fclose($pipes[0]);
        $output = stream_get_contents($pipes[1]) . "\n" . stream_get_contents($pipes[2]);
        fclose($pipes[1]); fclose($pipes[2]);
        proc_close($process);
        $cache[$key] = (bool) preg_match('/^\\s*[.TSC]{3}\\s+' . preg_quote($filter_name, '/') . '\\s/m', $output);
        return $cache[$key];
    }

    private function ass_escape_text($text) {
        $text = str_replace(array('\\', '{', '}'), array('\\\\', '\\{', '\\}'), (string) $text);
        return str_replace(array("\r\n", "\r", "\n"), '\\N', $text);
    }

    private function ass_font_family($language) {
        $families = array('ar' => 'Cairo', 'hi' => 'Noto Sans Devanagari', 'th' => 'Noto Sans Thai', 'ja' => 'Noto Sans CJK JP', 'ko' => 'Noto Sans CJK KR');
        return isset($families[$language]) ? $families[$language] : 'Noto Sans';
    }

    private function build_ass_subtitles($lines, $path, $width, $height, $font_size, $language) {
        $family = $this->ass_font_family($language);
        $is_vertical = ($height > $width);
        $center_x = (int) ($width / 2);
        $brand_y = $is_vertical ? 82 : 48;
        $title_y = $is_vertical ? 178 : 112;
        $subtitle_y = $is_vertical ? 238 : 158;
        $ounce_y = $is_vertical ? 318 : 218;
        $rows_start = $is_vertical ? 430 : 322;
        $row_gap = $is_vertical ? 82 : 48;
        $footer_start = $is_vertical ? 1110 : 650;
        $base_size = $is_vertical ? 36 : 31;
        $title_size = $is_vertical ? 46 : 41;
        $brand_size = $is_vertical ? 36 : 32;
        $safe = array();
        foreach ($lines as $line) { $line = trim((string) $line); if ($line !== '' && $line !== 'AlTaqrer Gold') { $safe[] = $line; } }
        if (!$safe) { return false; }

        $title = array_shift($safe);
        $subtitle = '';
        if ($safe && !preg_match('/(24K|22K|21K|18K|14K|12K|عيار|carats|Karat|carati|quilates|кара|कैरेट|ayar|กะรัต|순금|USD|\$)/iu', $safe[0])) { $subtitle = array_shift($safe); }
        $ounce = '';
        $rows = array();
        $meta = array();
        $tail = array();
        foreach ($safe as $line) {
            if (preg_match('/^(?:24|22|21|18|14|12)(?:K\b|\s|\x{00A0})|^عيار\s*(?:24|22|21|18|14|12)|^(?:ذهب|ทอง|Vàng|emas)\s*(?:24|22|21|18|14|12)|^(?:24|22|21|18|14|12)金/iu', $line)) { $rows[] = $line; }
            elseif (!$ounce && preg_match('/(Troy ounce|Oncia troy|Onça troy|Feinunze|Тройская унция|ट्रॉय औंस|Onza troy|Troy onsu|ทรอยออนซ์|Ounce troy|Troy ounce|トロイオンス|트로이온스)/iu', $line)) { $ounce = $line; }
            elseif (preg_match('/(تاريخ|Date|Datum|Data|Fecha|Дата|तारीख|Tarih|วันที่|Ngày|Tanggal|日付|날짜|update|تحديث)/iu', $line)) { $meta[] = $line; }
            else { $tail[] = $line; }
        }

        $events = array();
        $push = function($text, $y, $size, $color, $bold = false, $outline = 0) use (&$events, $center_x, $language) {
            // Keep Arabic text in logical Unicode order. libass/FriBidi performs shaping and bidi layout;
            // injecting LRM around numbers can split Arabic runs and scramble punctuation.
			if ($language === 'ar') { $text = $this->shape_arabic_for_ass($text); }

            $escaped = $this->ass_escape_text($text);
            $bold_tag = $bold ? '\\b1' : '\\b0';


            $events[] = 'Dialogue: 1,0:00:00.00,0:00:15.00,Gold,,0,0,0,,' . '{\\an5\\pos(' . $center_x . ',' . (int) $y . ')\\fs' . (int) $size . '\\c' . $color . $bold_tag . '\\bord' . (int) $outline . '\\shad0\\fad(500,500)\\move(' . $center_x . ',' . ((int) $y + 12) . ',' . $center_x . ',' . (int) $y . ',0,700)}' . $escaped;
        };
        $box = function($y, $box_height, $fill = '&H88070402&') use (&$events, $width) {
            $x = 54; $box_width = $width - 108; $top = (int) ($y - ($box_height / 2));
            $drawing = '{\\an7\\pos(' . $x . ',' . $top . ')\\p1\\1c&H020407&\\1a&H88&\\bord0}m 0 0 l ' . $box_width . ' 0 l ' . $box_width . ' ' . (int) $box_height . ' l 0 ' . (int) $box_height . '{\\p0}';
            $events[] = 'Dialogue: 0,0:00:00.00,0:00:15.00,Gold,,0,0,0,,' . $drawing;
        };

        $push('AlTaqrer Gold', $brand_y, $brand_size, '&H0000C5FF&', true, 1);
        $push($title, $title_y, $title_size, '&H00FFFFFF&', true, 1);
        if ($subtitle !== '') { $push($subtitle, $subtitle_y, $base_size, '&H00D6DEE8&', false, 0); }
        if ($ounce !== '') { $box($ounce_y, $is_vertical ? 70 : 54, '&H002B1B0B&'); $push($ounce, $ounce_y, $is_vertical ? 34 : 32, '&H0000C5FF&', true, 1); }

        $section_heading = count($tail) > 1 ? array_shift($tail) : '';
        if ($tail && preg_match('/(Karat|Carat|USD\s*\/|gram|gramme|Gramm|grammo|grama|грамм|ग्राम|gramu|กรัม|그램)/iu', $tail[0])) { array_shift($tail); }
        $descriptor = $tail ? end($tail) : '';
        if ($section_heading !== '') { $push($section_heading, $rows_start - ($is_vertical ? 54 : 38), $is_vertical ? 27 : 23, '&H0000C5FF&', true, 0); }
        $row_y = $rows_start;
        foreach ($rows as $row) {
            // Warm translucent charcoal cards let the gold artwork remain visible behind every price.
            $box($row_y, $is_vertical ? 62 : 38, '&H88070402&');
            $push($row, $row_y, $base_size, '&H00FFFFFF&', true, 1);
            $row_y += $row_gap;
        }
        $meta_y = $footer_start;
        foreach (array_slice($meta, 0, 2) as $line) {
            $push($line, $meta_y, $is_vertical ? 25 : 22, '&H00C8D0DA&', false, 0);
            $meta_y += $is_vertical ? 34 : 24;
        }
        if ($descriptor !== '') { $push($descriptor, $meta_y + 8, $is_vertical ? 23 : 20, '&H0000C5FF&', false, 0); }

                $shaper_line = ($language === 'ar') ? "Shaper: simple\n" : "";
        $script = "[Script Info]\nScriptType: v4.00+\nPlayResX: {$width}\nPlayResY: {$height}\nWrapStyle: 2\nScaledBorderAndShadow: yes\n{$shaper_line}YCbCr Matrix: TV.709\n\n";

        $script .= "[V4+ Styles]\nFormat: Name, Fontname, Fontsize, PrimaryColour, SecondaryColour, OutlineColour, BackColour, Bold, Italic, Underline, StrikeOut, ScaleX, ScaleY, Spacing, Angle, BorderStyle, Outline, Shadow, Alignment, MarginL, MarginR, MarginV, Encoding\n";
		        // Cairo is bundled as a verified TrueType font. Do not select the invalid
        // Almarai placeholder files that may contain an HTML download response.
        if ($language === 'ar') { $family = 'Cairo'; }

        $script .= "Style: Gold,{$family},{$base_size},&H00FFFFFF,&H000000FF,&H00100A04,&H99000000,1,0,0,0,100,100,0,0,1,2,1,5,48,48,48,1\n\n";
        $script .= "[Events]\nFormat: Layer, Start, End, Style, Name, MarginL, MarginR, MarginV, Effect, Text\n" . implode("\n", $events) . "\n";
        return file_put_contents($path, $script) !== false;
    }

    /** Convert the verified global 24K troy-ounce spot price into USD/gram karat prices. */
    private function global_karat_prices($ounce_usd) {
        $pure_24k_per_gram = (float) $ounce_usd / 31.1034768;
        $prices = array();
        foreach (array(24, 22, 21, 18, 14, 12) as $karat) {
            $prices[$karat] = $pure_24k_per_gram * ($karat / 24);
        }
        return $prices;
    }

    /** Render karat names in the actual language of each edition, not a universal English K suffix. */
    private function localized_karat_label($language, $karat) {
        $labels = array(
            'en' => $karat . ' karat', 'fr' => $karat . ' carats', 'de' => $karat . ' Karat',
            'it' => $karat . ' carati', 'pt' => $karat . ' quilates', 'ru' => $karat . ' карата',
            'hi' => $karat . ' कैरेट', 'es' => $karat . ' quilates', 'tr' => $karat . ' ayar',
            'th' => 'ทอง ' . $karat . ' กะรัต', 'vi' => 'Vàng ' . $karat . 'K',
            'id' => 'emas ' . $karat . ' karat', 'ja' => $karat . '金', 'ko' => $karat . 'K 순금',
        );
        return isset($labels[$language]) ? $labels[$language] : $labels['en'];
    }

    /** Localized labels used on every global-language video. */
    private function global_video_copy($language) {
        $copy = array(
            'en' => array('GLOBAL GOLD MARKET', 'Global gold prices today', 'Troy ounce', 'Gold prices per gram', 'Karat', 'USD / gram', 'Date', 'International spot market', 'Last data update'),
            'fr' => array('MARCHÉ MONDIAL DE L’OR', 'Prix mondial de l’or aujourd’hui', 'Once troy', 'Prix de l’or par gramme', 'Carat', 'USD / gramme', 'Date', 'Marché international au comptant', 'Dernière mise à jour des données'),
            'de' => array('GLOBALER GOLDMARKT', 'Weltweiter Goldpreis heute', 'Feinunze', 'Goldpreis pro Gramm', 'Karat', 'USD / Gramm', 'Datum', 'Internationaler Spotmarkt', 'Letzte Datenaktualisierung'),
            'it' => array('MERCATO MONDIALE DELL’ORO', 'Prezzo globale dell’oro oggi', 'Oncia troy', 'Prezzi dell’oro al grammo', 'Carati', 'USD / grammo', 'Data', 'Mercato spot internazionale', 'Ultimo aggiornamento dei dati'),
            'pt' => array('MERCADO GLOBAL DO OURO', 'Preço global do ouro hoje', 'Onça troy', 'Preços do ouro por grama', 'Quilates', 'USD / grama', 'Data', 'Mercado internacional à vista', 'Última atualização dos dados'),
            'ru' => array('МИРОВОЙ РЫНОК ЗОЛОТА', 'Мировые цены на золото сегодня', 'Тройская унция', 'Цена золота за грамм', 'Проба', 'USD / грамм', 'Дата', 'Международный спотовый рынок', 'Последнее обновление данных'),
            'hi' => array('वैश्विक सोना बाजार', 'आज सोने की वैश्विक कीमतें', 'ट्रॉय औंस', 'प्रति ग्राम सोने की कीमत', 'कैरेट', 'USD / ग्राम', 'तारीख', 'अंतरराष्ट्रीय स्पॉट बाजार', 'डेटा का अंतिम अपडेट'),
            'es' => array('MERCADO MUNDIAL DEL ORO', 'Precios mundiales del oro hoy', 'Onza troy', 'Precio del oro por gramo', 'Quilates', 'USD / gramo', 'Fecha', 'Mercado internacional al contado', 'Última actualización de datos'),
            'tr' => array('KÜRESEL ALTIN PİYASASI', 'Bugünün küresel altın fiyatları', 'Troy onsu', 'Gram başına altın fiyatı', 'Ayar', 'USD / gram', 'Tarih', 'Uluslararası spot piyasa', 'Son veri güncellemesi'),
            'th' => array('ตลาดทองคำโลก', 'ราคาทองคำโลกวันนี้', 'ทรอยออนซ์', 'ราคาทองคำต่อกรัม', 'กะรัต', 'USD / กรัม', 'วันที่', 'ตลาดสปอตระหว่างประเทศ', 'อัปเดตข้อมูลล่าสุด'),
            'vi' => array('THỊ TRƯỜNG VÀNG TOÀN CẦU', 'Giá vàng thế giới hôm nay', 'Ounce troy', 'Giá vàng theo gram', 'Tuổi vàng', 'USD / gram', 'Ngày', 'Thị trường giao ngay quốc tế', 'Cập nhật dữ liệu lần cuối'),
            'id' => array('PASAR EMAS GLOBAL', 'Harga emas dunia hari ini', 'Troy ounce', 'Harga emas per gram', 'Karat', 'USD / gram', 'Tanggal', 'Pasar spot internasional', 'Pembaruan data terakhir'),
            'ja' => array('世界の金市場', '本日の世界の金価格', 'トロイオンス', '1グラムあたりの金価格', '金の純度', 'USD / グラム', '日付', '国際スポット市場', 'データ最終更新'),
            'ko' => array('글로벌 금 시장', '오늘의 세계 금 가격', '트로이온스', '그램당 금 가격', '금 순도', 'USD / 그램', '날짜', '국제 현물 시장', '데이터 마지막 업데이트'),
        );
        return isset($copy[$language]) ? $copy[$language] : $copy['en'];
    }

    private function format_video_timestamp($value, $date_only = false) {
        $value = trim((string) $value);
        if ($value === '') { return ''; }
        try {
            $date = new DateTimeImmutable($value, function_exists('wp_timezone') ? wp_timezone() : new DateTimeZone('UTC'));
            return $date_only ? $date->format('d/m/Y') : $date->format('d/m/Y H:i');
        } catch (Exception $e) { return $value; }
    }
    private function ensure_almarai_font_installed() {
        $fonts_dir = plugin_dir_path(__FILE__) . 'assets/fonts/';
        $regular_path = $fonts_dir . 'Almarai-Regular.ttf';
        $bold_path    = $fonts_dir . 'Almarai-Bold.ttf';
        if (!file_exists($regular_path)) {
            $res = wp_remote_get('https://github.com', array('timeout' => 15));
            if (!is_wp_error($res) && wp_remote_retrieve_response_code($res) === 200) {
                file_put_contents($regular_path, wp_remote_retrieve_body($res));
            }
        }
        if (!file_exists($bold_path)) {
            $res = wp_remote_get('https://github.com', array('timeout' => 15));
            if (!is_wp_error($res) && wp_remote_retrieve_response_code($res) === 200) {
                file_put_contents($bold_path, wp_remote_retrieve_body($res));
            }
        }
    }

	    private function shape_arabic_for_ass($text) {
        $text = (string) $text;
        if (!preg_match('/\p{Arabic}/u', $text)) {
            return $text;
        }
        $glyphs = array(
            'ا' => array('ﺍ', 'ﺍ', 'ﺎ', 'ﺎ'), 'أ' => array('ﺃ', 'ﺃ', 'ﺄ', 'ﺄ'),
            'إ' => array('ﺇ', 'ﺇ', 'ﺈ', 'ﺈ'), 'آ' => array('ﺁ', 'ﺁ', 'ﺂ', 'ﺂ'),
            'ب' => array('ﺏ', 'ﺑ', 'ﺒ', 'ﺐ'), 'ت' => array('ﺕ', 'ﺗ', 'ﺘ', 'ﺖ'),
            'ث' => array('ﺙ', 'ﺛ', 'ﺜ', 'ﺚ'), 'ج' => array('ﺝ', 'ﺟ', 'ﺠ', 'ﺞ'),
            'ح' => array('ﺡ', 'ﺣ', 'ﺤ', 'ﺢ'), 'خ' => array('ﺥ', 'ﺧ', 'ﺨ', 'ﺦ'),
            'د' => array('ﺩ', 'ﺩ', 'ﺪ', 'ﺪ'), 'ذ' => array('ﺫ', 'ﺫ', 'ﺬ', 'ﺬ'),
            'ر' => array('ﺭ', 'ﺭ', 'ﺮ', 'ﺮ'), 'ز' => array('ﺯ', 'ﺯ', 'ﺰ', 'ﺰ'),
            'س' => array('ﺱ', 'ﺳ', 'ﺴ', 'ﺲ'), 'ش' => array('ﺵ', 'ﺷ', 'ﺸ', 'ﺶ'),
            'ص' => array('ﺹ', 'ﺻ', 'ﺼ', 'ﺺ'), 'ض' => array('ﺽ', 'ﺿ', 'ﻀ', 'ﺾ'),
            'ط' => array('ﻁ', 'ﻃ', 'ﻄ', 'ﻂ'), 'ظ' => array('ﻅ', 'ﻇ', 'ﻈ', 'ﻆ'),
            'ع' => array('ﻉ', 'ﻋ', 'ﻌ', 'ﻊ'), 'غ' => array('ﻍ', 'ﻏ', 'ﻐ', 'ﻎ'),
            'ف' => array('ﻑ', 'ﻓ', 'ﻔ', 'ﻒ'), 'ق' => array('ﻕ', 'ﻗ', 'ﻘ', 'ﻖ'),
            'ك' => array('ﻙ', 'ﻛ', 'ﻜ', 'ﻚ'), 'ل' => array('ﻝ', 'ﻟ', 'ﻠ', 'ﻞ'),
            'م' => array('ﻡ', 'ﻣ', 'ﻤ', 'ﻢ'), 'ن' => array('ﻥ', 'ﻧ', 'ﻨ', 'ﻦ'),
            'ه' => array('ﻩ', 'ﻫ', 'ﻬ', 'ﻪ'), 'ة' => array('ﺓ', 'ﺓ', 'ﺔ', 'ﺔ'),
            'و' => array('ﻭ', 'ﻭ', 'ﻮ', 'ﻮ'), 'ؤ' => array('ﺅ', 'ﺅ', 'ﺆ', 'ﺆ'),
            'ي' => array('ﻱ', 'ﻳ', 'ﻴ', 'ﻲ'), 'ى' => array('ﻯ', 'ﻯ', 'ﻰ', 'ﻰ'),
            'ئ' => array('ﺉ', 'ﺋ', 'ﺌ', 'ﺊ'), 'ء' => array('ﺀ', 'ﺀ', 'ﺀ', 'ﺀ'),
        );
        $non_connecting_after = array('ا','أ','إ','آ','د','ذ','ر','ز','و','ؤ','ة','ى','ء');
        $lam_alef = array(
            'ا' => array('ﻻ', 'ﻼ'), 'أ' => array('ﻷ', 'ﻸ'),
            'إ' => array('ﻹ', 'ﻺ'), 'آ' => array('ﻵ', 'ﻶ'),
        );
        $text = preg_replace('/[\x{064B}-\x{065F}\x{0670}]/u', '', $text);
        $chars = preg_split('//u', $text, -1, PREG_SPLIT_NO_EMPTY);
        $count = count($chars);
        $shaped = array();
        for ($i = 0; $i < $count; $i++) {
            $curr = $chars[$i];
            if (!isset($glyphs[$curr])) {
                $shaped[] = $curr;
                continue;
            }
            $prev = ($i > 0) ? $chars[$i - 1] : '';
            $next = ($i < $count - 1) ? $chars[$i + 1] : '';
            $prev_connects = isset($glyphs[$prev]) && !in_array($prev, $non_connecting_after, true);
            $next_connects = isset($glyphs[$next]) && !in_array($curr, $non_connecting_after, true);
                     if ($curr === 'ل' && isset($lam_alef[$next])) {
             $shaped[] = $lam_alef[$next][$prev_connects ? 1 : 0];
             $i++;
             continue;
         }
                               if ($prev_connects && $next_connects) { $form = 2; }
elseif ($prev_connects) { $form = 3; }
elseif ($next_connects) { $form = 1; }
else { $form = 0; }
$shaped[] = $glyphs[$curr][$form];


     }
     return implode('', $shaped);
 }


    private function arabic_bidi_safe($text) {
        return preg_replace_callback('/[0-9][0-9.,:\/\-]*/u', function($match) {
            return "\u{200E}" . $match[0] . "\u{200E}";
        }, (string) $text);
    }

    private function render_one_video($job, $snapshot, $upload_dir) {
        $ffmpeg = $this->ffmpeg_binary();
        if (!$ffmpeg) { return new WP_Error('gnvp_no_ffmpeg', 'FFmpeg is not installed or its path is not configured on the WordPress server.'); }
        $font = $this->font_file($job['language']);
        if (!$font) { return new WP_Error('gnvp_no_font', 'No suitable font found for ' . $job['language'] . '. Configure it with the gnvp_font_file filter.'); }

        $is_ar = ($job['language'] === 'ar');
        $is_vertical = ($job['format'] === 'vertical');
        $width = $is_vertical ? 720 : 1280;
        $height = $is_vertical ? 1280 : 720;
        $background_file = GNVP_PATH . 'assets/backgrounds/' . ($is_vertical ? 'vertical.jpg' : 'horizontal.jpg');
        if (!is_readable($background_file)) { return new WP_Error('gnvp_background_missing', 'The AlTaqrer Gold video background asset is missing.'); }
        $stamp = gmdate('Ymd-His') . '-' . strtolower(wp_generate_password(5, false, false));
        $base = sanitize_file_name(strtolower($job['id']) . '-' . $stamp);
        $txt_path = trailingslashit($upload_dir['basedir']) . $base . '.txt';
        $mp4_path = trailingslashit($upload_dir['basedir']) . $base . '.mp4';
        $ass_path = trailingslashit($upload_dir['basedir']) . $base . '.ass';

        if ($is_ar) {
            $data_updated_at = !empty($snapshot['source_updated_at']) ? $snapshot['source_updated_at'] : $snapshot['gold_date'];
            $display_gold_date = $this->format_video_timestamp($snapshot['gold_date'], true);
            $display_data_update = $this->format_video_timestamp($data_updated_at, false);
            $lines = array('أسعار الذهب في مصر اليوم', 'التاريخ: ' . ($display_gold_date ?: 'غير متاح'), 'آخر تحديث للبيانات: ' . ($display_data_update ?: 'غير متاح'), '');
            foreach (array('24K','22K','21K','18K','14K','12K') as $karat) {
                foreach ($snapshot['prices'] as $price) {
                    if (strtoupper($price['carat']) === $karat) {
                        $lines[] = 'عيار ' . str_replace('K', '', $karat) . ' : ' . number_format(floatval($price['price_egp']), 2, '.', '') . ' جنيه مصري للجرام';

                        break;
                    }
                }
            }
            $lines[] = ''; $lines[] = 'AlTaqrer Gold';
        } else {
            // All non-Arabic editions use global USD spot pricing: ounce plus calculated karat gram prices.
            $t = $this->global_video_copy($job['language']);
            $global_prices = $this->global_karat_prices($snapshot['global_ounce_usd']);
            $lines = array(
                $t[0], $t[1], '',
                $t[2] . ': $' . number_format((float) $snapshot['global_ounce_usd'], 2) . ' USD',
                '', $t[3], $t[4] . '     ' . $t[5]
            );
            foreach ($global_prices as $karat => $price) {
                $lines[] = $this->localized_karat_label($job['language'], $karat) . '          $' . number_format($price, 2);
            }
            $lines[] = '';
            $global_updated_at = !empty($snapshot['ounce_updated_at']) ? $snapshot['ounce_updated_at'] : $snapshot['gold_date'];
            $lines[] = $t[6] . ': ' . ($this->format_video_timestamp($snapshot['gold_date'], true) ?: 'N/A');
            $lines[] = $t[8] . ': ' . ($this->format_video_timestamp($global_updated_at, false) ?: 'N/A');
            $lines[] = $t[7];
            $lines[] = 'AlTaqrer Gold';
        }
        $text = implode("\n", $lines);
        $font_size = $is_vertical ? 36 : 32;
        $filter = '';
        $has_subtitles = $this->ffmpeg_supports_filter($ffmpeg, 'subtitles');
        $has_drawtext = $this->ffmpeg_supports_filter($ffmpeg, 'drawtext');
        // Arabic must go through libass for correct right-to-left shaping and glyph joining. Never silently fall back to drawtext for Arabic.
        if ($is_ar && !$has_subtitles) {
            return new WP_Error('gnvp_arabic_shaping_unavailable', 'Arabic rendering requires FFmpeg subtitles/libass with RTL shaping enabled.');
        }
        if ($has_subtitles) {
            if (!$this->build_ass_subtitles($lines, $ass_path, $width, $height, $font_size, $job['language'])) {
                return new WP_Error('gnvp_subtitle_write', 'Could not create the Arabic subtitle file.');
            }
            $ass_escaped = str_replace(array('\\', ':', "'", ','), array('\\\\', '\\:', "\\'", '\\,'), $ass_path);
            $fonts_dir = is_dir(GNVP_PATH . 'assets/fonts') ? GNVP_PATH . 'assets/fonts' : WP_PLUGIN_DIR . '/goldnow-auto-posts/assets/fonts';
            $fonts_escaped = str_replace(array('\\', ':', "'", ','), array('\\\\', '\\:', "\\'", '\\,'), $fonts_dir);
            $panel_y = $is_vertical ? 360 : 250;
            $panel_h = $is_vertical ? 650 : 360;
            $filter = 'drawbox=x=38:y=38:w=iw-76:h=ih-76:color=0x050403@0.06:t=fill,fade=t=in:st=0:d=0.7,fade=t=out:st=14.2:d=0.8,subtitles=filename=' . "'" . $ass_escaped . "':fontsdir='" . $fonts_escaped . "'";
        } elseif ($has_drawtext) {
            if (file_put_contents($txt_path, $text) === false) { return new WP_Error('gnvp_text_write', 'Could not write the video text file.'); }
            $font_escaped = str_replace(array('\\', ':', "'"), array('\\\\', '\\:', "\\'"), $font);
            $text_escaped = str_replace(array('\\', ':', "'"), array('\\\\', '\\:', "\\'"), $txt_path);
            $filter = "drawtext=fontfile='" . $font_escaped . "':textfile='" . $text_escaped . "':fontcolor=white:fontsize={$font_size}:line_spacing=18:text_shaping=1:fix_bounds=1:x=(w-text_w)/2:y=(h-text_h)/2:box=1:boxcolor=0x090806@0.38:boxborderw=34";
        } elseif ($this->ffmpeg_supports_filter($ffmpeg, 'subtitles')) {
            if (!$this->build_ass_subtitles($lines, $ass_path, $width, $height, $font_size, $job['language'])) {
                return new WP_Error('gnvp_subtitle_write', 'Could not create the fallback subtitle file.');
            }
            $ass_escaped = str_replace(array('\\', ':', "'", ','), array('\\\\', '\\:', "\\'", '\\,'), $ass_path);
            $fonts_dir = is_dir(GNVP_PATH . 'assets/fonts') ? GNVP_PATH . 'assets/fonts' : WP_PLUGIN_DIR . '/goldnow-auto-posts/assets/fonts';
            $fonts_escaped = str_replace(array('\\', ':', "'", ','), array('\\\\', '\\:', "\\'", '\\,'), $fonts_dir);
            $panel_y = $is_vertical ? 360 : 250;
            $panel_h = $is_vertical ? 650 : 360;
            $filter = 'drawbox=x=38:y=38:w=iw-76:h=ih-76:color=0x050403@0.06:t=fill,fade=t=in:st=0:d=0.7,fade=t=out:st=14.2:d=0.8,subtitles=filename=' . "'" . $ass_escaped . "':fontsdir='" . $fonts_escaped . "'";
        } else {
            return new WP_Error('gnvp_no_text_filter', 'This FFmpeg build has neither drawtext nor subtitles/libass. The plugin cannot render multilingual text with this build.');
        }
        $duration = 15;
        $filter = "zoompan=z='min(zoom+0.00005,1.025)':d=1:s={$width}x{$height}:fps=30," . $filter;
        $cmd = array(
            $ffmpeg, '-hide_banner', '-loglevel', 'error', '-y',
            '-loop', '1', '-framerate', '30', '-i', $background_file,
            '-f', 'lavfi', '-i', 'anullsrc=channel_layout=stereo:sample_rate=44100',
            '-vf', $filter, '-t', (string) $duration,
            '-c:v', 'libx264', '-preset', 'veryfast', '-pix_fmt', 'yuv420p', '-r', '30',
            '-c:a', 'aac', '-b:a', '96k', '-shortest', '-movflags', '+faststart', $mp4_path,
        );
        $descriptors = array(0 => array('pipe', 'r'), 1 => array('pipe', 'w'), 2 => array('pipe', 'w'));
        $process = proc_open($cmd, $descriptors, $pipes);
        if (!is_resource($process)) { @unlink($txt_path); @unlink($ass_path); return new WP_Error('gnvp_ffmpeg_start', 'Could not start FFmpeg.'); }
        fclose($pipes[0]);
        $stdout = stream_get_contents($pipes[1]); fclose($pipes[1]);
        $stderr = stream_get_contents($pipes[2]); fclose($pipes[2]);
        $exit_code = proc_close($process);
        @unlink($txt_path); @unlink($ass_path);
        if ($exit_code !== 0 || !is_file($mp4_path) || filesize($mp4_path) < 10000) {
            @unlink($mp4_path);
            return new WP_Error('gnvp_ffmpeg_failed', 'FFmpeg could not create ' . $job['id'] . ': ' . substr(trim($stderr . ' ' . $stdout), 0, 900));
        }
        return array('id' => $job['id'] . '-' . $stamp, 'job_id' => $job['id'], 'market' => $job['market'], 'language' => $job['language'],
            'format' => $job['format'], 'aspect_ratio' => $job['aspect_ratio'], 'file' => basename($mp4_path),
            'url' => trailingslashit($upload_dir['baseurl']) . basename($mp4_path), 'bytes' => filesize($mp4_path),
            'created_at' => current_time('mysql'),
            'data_updated_at' => ($job['language'] === 'ar') ? (!empty($snapshot['source_updated_at']) ? $snapshot['source_updated_at'] : $snapshot['gold_date']) : (!empty($snapshot['ounce_updated_at']) ? $snapshot['ounce_updated_at'] : $snapshot['gold_date']),
            'data_updated_label' => ($job['language'] === 'ar') ? (!empty($snapshot['source_updated_at']) ? 'source_fetch_time' : 'gold_date_fallback') : (!empty($snapshot['ounce_updated_at']) ? 'ounce_fetch_time' : 'gold_date_fallback'),
            'duration_seconds' => $duration, 'audio' => 'silent_track_pending_voice_integration');
    }

    private function merge_rendered_videos($new_results) {
        $existing = get_option(GNVP_RENDER_OPTION, array());
        if (!is_array($existing)) { $existing = array(); }
        $by_id = array();
        foreach ($existing as $video) {
            if (!empty($video['id'])) { $by_id[$video['id']] = $video; }
        }
        foreach ((array) $new_results as $video) {
            if (!empty($video['id'])) { $by_id[$video['id']] = $video; }
        }
        // Keep history bounded without deleting records referenced by pending queue items.
        $queue = get_option('gnvp_publish_queue', array());
        $protected = array();
        foreach ((array) $queue as $item) {
            if (!empty($item['video_id']) && in_array(($item['status'] ?? ''), array('scheduled', 'retrying'), true)) { $protected[$item['video_id']] = true; }
        }
        $videos = array_values($by_id);
        usort($videos, function($a, $b) { return strcmp((string)($b['created_at'] ?? ''), (string)($a['created_at'] ?? '')); });
        $keep = array(); $count = 0;
        foreach ($videos as $video) {
            if ($count < 300 || !empty($protected[$video['id'] ?? ''])) { $keep[] = $video; $count++; }
        }
        update_option(GNVP_RENDER_OPTION, $keep, false);
    }

    private function render_snapshot_videos($snapshot) {
        if (empty($snapshot['production_jobs']) || empty($snapshot['prices']) || empty($snapshot['global_ounce_usd'])) {
            update_option('gnvp_render_error', 'The snapshot is missing required Egyptian prices or the global USD ounce price.', false);
            return false;
        }
        $upload = wp_upload_dir();
        if (!empty($upload['error'])) { update_option('gnvp_render_error', $upload['error'], false); return false; }
        $dir = trailingslashit($upload['basedir']) . 'goldnow-videos';
        if (!wp_mkdir_p($dir)) { update_option('gnvp_render_error', 'Could not create uploads/goldnow-videos directory.', false); return false; }
        $index = trailingslashit($dir) . 'index.php';
        if (!file_exists($index)) { file_put_contents($index, "<?php // Silence is golden.\n"); }
        $results = array();
        $errors = array();
        foreach ($snapshot['production_jobs'] as $job) {
            $video = $this->render_one_video($job, $snapshot, array('basedir' => $dir, 'baseurl' => trailingslashit($upload['baseurl']) . 'goldnow-videos'));
            if (is_wp_error($video)) { $errors[] = $job['id'] . ': ' . $video->get_error_message(); }
            else { $results[] = $video; }
        }
        $this->merge_rendered_videos($results);
        update_option('gnvp_render_error', $errors ? implode("\n", $errors) : '', false);
        update_option('gnvp_last_rendered_at', current_time('mysql'), false);
        return !empty($results) && empty($errors);
    }

    private function admin_url_for($page, $args = array()) {
        return add_query_arg(array_merge(array('page' => self::MENU_SLUG . '-' . $page), $args), admin_url('admin.php'));
    }

    private function facebook_connection() {
        $c = get_option('gnvp_facebook_connection', array());
        return wp_parse_args(is_array($c) ? $c : array(), array('page_id' => '', 'page_name' => '', 'access_token' => '', 'connected' => 0, 'checked_at' => '', 'last_error' => ''));
    }

    private function graph_request($method, $path, $body = array()) {
        $url = 'https://graph.facebook.com/' . self::GRAPH_VERSION . '/' . ltrim($path, '/');
        $args = array('timeout' => 45, 'headers' => array('Accept' => 'application/json'));
        if (strtoupper($method) === 'GET') {
            if ($body) { $url = add_query_arg($body, $url); }
            $response = wp_remote_get($url, $args);
        } else {
            $args['body'] = $body;
            $response = wp_remote_post($url, $args);
        }
        if (is_wp_error($response)) { return $response; }
        $code = wp_remote_retrieve_response_code($response);
        $json = json_decode(wp_remote_retrieve_body($response), true);
        if ($code < 200 || $code >= 300 || !is_array($json) || isset($json['error'])) {
            $message = isset($json['error']['message']) ? $json['error']['message'] : 'Meta Graph API returned HTTP ' . $code;
            return new WP_Error('gnvp_graph_api', $message, array('status' => $code, 'response' => $json));
        }
        return $json;
    }

    public function save_facebook_connection() {
        if (!current_user_can('manage_options')) { wp_die('Unauthorized'); }
        check_admin_referer('gnvp_save_facebook');
        $old = $this->facebook_connection();
        $page_id = isset($_POST['page_id']) ? sanitize_text_field(wp_unslash($_POST['page_id'])) : '';
        $token = isset($_POST['access_token']) ? trim((string) wp_unslash($_POST['access_token'])) : '';
        $old['page_id'] = $page_id;
        if ($token !== '') { $old['access_token'] = sanitize_text_field($token); $old['connected'] = 0; }
        $old['last_error'] = '';
        update_option('gnvp_facebook_connection', $old, false);
        wp_safe_redirect($this->admin_url_for('connections', array('fb_saved' => 1))); exit;
    }

    public function test_facebook_connection() {
        if (!current_user_can('manage_options')) { wp_die('Unauthorized'); }
        check_admin_referer('gnvp_test_facebook');
        $c = $this->facebook_connection();
        if (!$c['page_id'] || !$c['access_token']) {
            $c['connected'] = 0; $c['last_error'] = 'أدخل Page ID وPage Access Token أولاً.';
        } else {
            $r = $this->graph_request('GET', $c['page_id'], array('fields' => 'id,name', 'access_token' => $c['access_token']));
            if (is_wp_error($r)) { $c['connected'] = 0; $c['last_error'] = $r->get_error_message(); }
            else { $c['connected'] = 1; $c['page_name'] = sanitize_text_field($r['name'] ?? 'Facebook Page'); $c['last_error'] = ''; }
        }
        $c['checked_at'] = current_time('mysql');
        update_option('gnvp_facebook_connection', $c, false);
        wp_safe_redirect($this->admin_url_for('connections', array('fb_test' => $c['connected'] ? 'ok' : 'error'))); exit;
    }

    private function publish_facebook_video($item) {
        $c = $this->facebook_connection();
        if (!$c['connected'] || !$c['page_id'] || !$c['access_token']) { return new WP_Error('gnvp_fb_not_connected', 'Facebook Page is not connected or verified.'); }
        $videos = get_option(GNVP_RENDER_OPTION, array());
        $video = null;
        foreach ($videos as $v) { if (!empty($v['id']) && $v['id'] === $item['video_id']) { $video = $v; break; } }
        if (!$video) { return new WP_Error('gnvp_video_missing', 'The selected video is no longer in the video library.'); }
        $upload = wp_upload_dir();
        $file = trailingslashit($upload['basedir']) . 'goldnow-videos/' . basename($video['file']);
        if (!is_readable($file)) { return new WP_Error('gnvp_video_file_missing', 'The MP4 file cannot be found on the server.'); }
        $caption = isset($item['caption']) ? $item['caption'] : '';
        if (($item['type'] ?? 'video') === 'reel') {
            $start = $this->graph_request('POST', $c['page_id'] . '/video_reels', array('upload_phase' => 'start', 'access_token' => $c['access_token']));
            if (is_wp_error($start) || empty($start['video_id']) || empty($start['upload_url'])) { return is_wp_error($start) ? $start : new WP_Error('gnvp_reel_start', 'Meta did not return a Reel upload session.'); }
            $binary = file_get_contents($file);
            $upload_response = wp_remote_post($start['upload_url'], array('timeout' => 180, 'headers' => array('Authorization' => 'OAuth ' . $c['access_token'], 'offset' => '0', 'file_size' => (string) filesize($file), 'Content-Type' => 'application/octet-stream'), 'body' => $binary));
            if (is_wp_error($upload_response) || wp_remote_retrieve_response_code($upload_response) >= 300) { return is_wp_error($upload_response) ? $upload_response : new WP_Error('gnvp_reel_upload', 'Meta Reel media upload failed.'); }
            $finish = $this->graph_request('POST', $c['page_id'] . '/video_reels', array('upload_phase' => 'finish', 'video_id' => $start['video_id'], 'video_state' => 'PUBLISHED', 'description' => $caption, 'access_token' => $c['access_token']));
            if (is_wp_error($finish)) { return $finish; }
            return array('id' => $finish['post_id'] ?? $start['video_id'], 'type' => 'reel');
        }
        if (!function_exists('curl_init') || !class_exists('CURLFile')) { return new WP_Error('gnvp_curl_missing', 'PHP cURL is required for direct Facebook MP4 upload.'); }
        $ch = curl_init('https://graph-video.facebook.com/' . self::GRAPH_VERSION . '/' . rawurlencode($c['page_id']) . '/videos');
        $post = array('source' => new CURLFile($file, 'video/mp4', basename($file)), 'description' => $caption, 'access_token' => $c['access_token']);
        curl_setopt_array($ch, array(CURLOPT_POST => true, CURLOPT_POSTFIELDS => $post, CURLOPT_RETURNTRANSFER => true, CURLOPT_CONNECTTIMEOUT => 20, CURLOPT_TIMEOUT => 300));
        $raw = curl_exec($ch); $err = curl_error($ch); $status = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE); curl_close($ch);
        if ($raw === false || $status < 200 || $status >= 300) { return new WP_Error('gnvp_fb_upload', $err ?: 'Facebook video upload failed (HTTP ' . $status . '): ' . substr((string) $raw, 0, 500)); }
        $json = json_decode($raw, true);
        if (empty($json['id'])) { return new WP_Error('gnvp_fb_upload_response', 'Facebook returned no published video ID.'); }
        return array('id' => $json['id'], 'type' => 'video');
    }

    public function queue_publish() {
        if (!current_user_can('manage_options')) { wp_die('Unauthorized'); }
        check_admin_referer('gnvp_queue_publish');
        $video_id = isset($_POST['video_id']) ? sanitize_text_field(wp_unslash($_POST['video_id'])) : '';
        $type = isset($_POST['publish_type']) && $_POST['publish_type'] === 'reel' ? 'reel' : 'video';
        $title = isset($_POST['post_title']) ? sanitize_text_field(wp_unslash($_POST['post_title'])) : '';
        $description = isset($_POST['post_description']) ? sanitize_textarea_field(wp_unslash($_POST['post_description'])) : '';
        $hashtags_raw = isset($_POST['post_hashtags']) ? sanitize_textarea_field(wp_unslash($_POST['post_hashtags'])) : '';
        $hashtags = preg_split('/\s+/', trim($hashtags_raw), -1, PREG_SPLIT_NO_EMPTY);
        $hashtags = array_values(array_unique(array_filter(array_map(function($tag) {
            $tag = preg_replace('/[^#\p{L}\p{N}_]/u', '', (string) $tag);
            return $tag === '' ? '' : (strpos($tag, '#') === 0 ? $tag : '#' . $tag);
        }, $hashtags))));
        $caption = trim($title . "\n\n" . $description . "\n\n" . implode(' ', $hashtags));
        $when = isset($_POST['publish_at']) ? sanitize_text_field(wp_unslash($_POST['publish_at'])) : '';
        $videos = get_option(GNVP_RENDER_OPTION, array()); $exists = false;
        foreach ($videos as $v) { if (($v['id'] ?? '') === $video_id) { $exists = true; break; } }
        if (!$exists) { wp_safe_redirect($this->admin_url_for('publishing', array('queue_error' => 'video'))); exit; }
        $now_utc = current_time('timestamp', true);
        if ($when) {
            try { $dt = new DateTimeImmutable($when, wp_timezone()); $timestamp = $dt->getTimestamp(); }
            catch (Exception $e) { $timestamp = $now_utc; }
        } else { $timestamp = $now_utc; }
        if (empty($timestamp) || $timestamp < $now_utc - 60) { $timestamp = $now_utc; }
        $queue = get_option('gnvp_publish_queue', array());
        $id = 'q' . wp_generate_password(10, false, false);
        $queue[$id] = array('id' => $id, 'video_id' => $video_id, 'platform' => 'facebook', 'type' => $type, 'title' => $title, 'description' => $description, 'hashtags' => $hashtags, 'caption' => $caption, 'platform_payloads' => array('facebook' => array('title' => $title, 'description' => $description, 'hashtags' => $hashtags, 'caption' => $caption)), 'publish_at' => $timestamp, 'status' => 'scheduled', 'created_at' => current_time('mysql'));
        foreach ($videos as $video_meta) { if (($video_meta['id'] ?? '') === $video_id) { $queue[$id]['language'] = $video_meta['language'] ?? ''; break; } }
        update_option('gnvp_publish_queue', $queue, false);
        wp_schedule_single_event(max(time() + 10, $timestamp), self::PUBLISH_HOOK, array($id));
        wp_safe_redirect($this->admin_url_for('publishing', array('queued' => 1))); exit;
    }

    public function run_scheduled_publish($id) {
        $queue = get_option('gnvp_publish_queue', array());
        if (empty($queue[$id]) || !in_array(($queue[$id]['status'] ?? ''), array('scheduled', 'retrying'), true)) { return; }
        $result = $this->publish_facebook_video($queue[$id]);
        if (is_wp_error($result)) {
            $queue[$id]['error'] = $result->get_error_message();
            $queue[$id]['retry_count'] = absint($queue[$id]['retry_count'] ?? 0);
            $settings = $this->publishing_settings();
            if ($queue[$id]['retry_count'] < absint($settings['retry_limit'])) {
                $queue[$id]['retry_count']++;
                $queue[$id]['status'] = 'retrying';
                $queue[$id]['next_retry_at'] = time() + (absint($settings['retry_minutes']) * MINUTE_IN_SECONDS);
                update_option('gnvp_publish_queue', $queue, false);
                wp_schedule_single_event($queue[$id]['next_retry_at'], self::PUBLISH_HOOK, array($id));
                return;
            }
            $queue[$id]['status'] = 'failed';
            $queue[$id]['failed_at'] = current_time('mysql');
            $this->schedule_video_retention_cleanup($queue[$id]['video_id']);
        } else {
            $queue[$id]['status'] = 'published'; $queue[$id]['remote_id'] = $result['id']; $queue[$id]['published_at'] = current_time('mysql');
        }
        update_option('gnvp_publish_queue', $queue, false);
        if (($queue[$id]['status'] ?? '') === 'published') {
            $deleted = $this->maybe_delete_video_after_all_targets($queue[$id]['video_id']);
            if (!$deleted) { $this->schedule_video_retention_cleanup($queue[$id]['video_id']); }
        }
    }

    private function publishing_settings() {
        $defaults = array('enabled' => 0, 'interval_hours' => 3, 'vertical_count' => 1, 'horizontal_count' => 1, 'vertical_enabled' => 1, 'horizontal_enabled' => 1, 'retry_limit' => 3, 'retry_minutes' => 15);
        $saved = get_option('gnvp_publishing_settings', array());
        return wp_parse_args(is_array($saved) ? $saved : array(), $defaults);
    }

    public function save_publishing_settings() {
        if (!current_user_can('manage_options')) { wp_die('Unauthorized'); }
        check_admin_referer('gnvp_save_publishing_settings');
        $interval = isset($_POST['interval_hours']) ? absint($_POST['interval_hours']) : 3;
        $interval = max(1, min(24, $interval));
        $settings = array(
            'enabled' => !empty($_POST['auto_publish_enabled']) ? 1 : 0,
            'interval_hours' => $interval,
            'vertical_enabled' => !empty($_POST['vertical_enabled']) ? 1 : 0,
            'horizontal_enabled' => !empty($_POST['horizontal_enabled']) ? 1 : 0,
            'vertical_count' => max(1, min(10, absint($_POST['vertical_count'] ?? 1))),
            'horizontal_count' => max(1, min(10, absint($_POST['horizontal_count'] ?? 1))),
            'retry_limit' => 3, 'retry_minutes' => 15,
        );
        update_option('gnvp_publishing_settings', $settings, false);
        wp_clear_scheduled_hook(self::ROTATION_HOOK);
        if (!empty($settings['enabled'])) {
            wp_schedule_event(time() + 60, 'gnvp_selected_publish_interval', self::ROTATION_HOOK);
        }
        wp_safe_redirect($this->admin_url_for('publishing', array('settings_saved' => 1))); exit;
    }

    private function next_rotated_video($format, $already_selected = array()) {
        $videos = get_option(GNVP_RENDER_OPTION, array());
        $eligible = array();
        foreach ($videos as $video) {
            if (($video['format'] ?? '') === $format && empty($video['file_deleted']) && !empty($video['file'])) { $eligible[] = $video; }
        }
        if (!$eligible) { return false; }
        $state = get_option('gnvp_video_rotation_state', array());
        $index = isset($state[$format]) ? absint($state[$format]) : 0;
        $count = count($eligible);
        for ($i = 0; $i < $count; $i++) {
            $candidate_index = ($index + $i) % $count;
            $candidate = $eligible[$candidate_index];
            if (!in_array($candidate['id'], $already_selected, true)) {
                $state[$format] = ($candidate_index + 1) % $count;
                update_option('gnvp_video_rotation_state', $state, false);
                return $candidate;
            }
        }
        return false;
    }

    private function auto_rotation_content($video) {
        $lang = sanitize_key($video['language'] ?? 'en');
        $format = ($video['format'] ?? '') === 'vertical' ? 'reel' : 'video';
        $market = (($video['market'] ?? '') === 'EG') ? 'egypt' : 'global';
        $titles = array(
            'ar' => array('egypt' => 'أسعار الذهب في مصر اليوم', 'global' => 'أسعار الذهب العالمية اليوم'),
            'en' => array('egypt' => 'Gold Prices in Egypt Today', 'global' => 'Global Gold Prices Today'),
            'fr' => array('egypt' => 'Prix de l’or en Égypte aujourd’hui', 'global' => 'Prix mondial de l’or aujourd’hui'),
            'de' => array('egypt' => 'Goldpreise in Ägypten heute', 'global' => 'Weltweite Goldpreise heute'),
            'it' => array('egypt' => 'Prezzo dell’oro in Egitto oggi', 'global' => 'Prezzo globale dell’oro oggi'),
            'pt' => array('egypt' => 'Preço do ouro no Egito hoje', 'global' => 'Preço global do ouro hoje'),
            'ru' => array('egypt' => 'Цены на золото в Египте сегодня', 'global' => 'Мировые цены на золото сегодня'),
            'hi' => array('egypt' => 'आज मिस्र में सोने की कीमतें', 'global' => 'आज सोने की वैश्विक कीमतें'),
            'es' => array('egypt' => 'Precio del oro en Egipto hoy', 'global' => 'Precio mundial del oro hoy'),
            'tr' => array('egypt' => 'Bugün Mısır’da altın fiyatları', 'global' => 'Bugünün küresel altın fiyatları'),
            'th' => array('egypt' => 'ราคาทองคำในอียิปต์วันนี้', 'global' => 'ราคาทองคำโลกวันนี้'),
            'vi' => array('egypt' => 'Giá vàng tại Ai Cập hôm nay', 'global' => 'Giá vàng thế giới hôm nay'),
            'id' => array('egypt' => 'Harga emas Mesir hari ini', 'global' => 'Harga emas dunia hari ini'),
            'ja' => array('egypt' => '本日のエジプト金価格', 'global' => '本日の世界の金価格'),
            'ko' => array('egypt' => '오늘의 이집트 금 가격', 'global' => '오늘의 세계 금 가격'),
        );
        $hashtags = array(
            'ar' => '#الذهب #أسعار_الذهب #سعر_الذهب', 'en' => '#Gold #GoldPrice #GoldMarket',
            'fr' => '#Or #PrixDeLOr #MarchéDeLOr', 'de' => '#Gold #Goldpreis #Goldmarkt',
            'it' => '#Oro #PrezzoOro #MercatoOro', 'pt' => '#Ouro #PreçoDoOuro #MercadoDoOuro',
            'ru' => '#Золото #ЦенаЗолота #РынокЗолота', 'hi' => '#सोना #सोनेकीकीमत #GoldPrice',
            'es' => '#Oro #PrecioDelOro #MercadoDelOro', 'tr' => '#Altın #AltınFiyatı #AltınPiyasası',
            'th' => '#ทองคำ #ราคาทอง #ตลาดทอง', 'vi' => '#Vang #GiaVang #ThiTruongVang',
            'id' => '#Emas #HargaEmas #PasarEmas', 'ja' => '#金 #金価格 #金市場',
            'ko' => '#금 #금시세 #금시장'
        );
        $title = $titles[$lang][$market] ?? $titles['en'][$market];
        $descriptions = array(
            'ar' => 'تابع تحديثات أسعار الذهب وبيانات السوق.', 'en' => 'Follow gold price updates and market data.',
            'fr' => 'Suivez les mises à jour des prix de l’or et les données du marché.',
            'de' => 'Verfolgen Sie Goldpreis-Updates und Marktdaten.', 'it' => 'Segui gli aggiornamenti dei prezzi dell’oro e i dati di mercato.',
            'pt' => 'Acompanhe as atualizações do preço do ouro e os dados do mercado.', 'ru' => 'Следите за обновлениями цен на золото и рыночными данными.',
            'hi' => 'सोने की कीमतों के अपडेट और बाजार के आंकड़े देखें।', 'es' => 'Sigue las actualizaciones del precio del oro y los datos del mercado.',
            'tr' => 'Altın fiyatı güncellemelerini ve piyasa verilerini takip edin.', 'th' => 'ติดตามการอัปเดตราคาทองคำและข้อมูลตลาด',
            'vi' => 'Theo dõi cập nhật giá vàng và dữ liệu thị trường.', 'id' => 'Ikuti pembaruan harga emas dan data pasar.',
            'ja' => '金価格の更新情報と市場データをご確認ください。', 'ko' => '금 가격 업데이트와 시장 데이터를 확인하세요.'
        );
        $description = $title . ' — ' . ($descriptions[$lang] ?? $descriptions['en']);
        $tags = $hashtags[$lang] ?? $hashtags['en'];
        return array('title' => $title, 'description' => $description, 'hashtags' => preg_split('/\s+/', $tags), 'caption' => $title . "\n\n" . $description . "\n\n" . $tags, 'format' => $format);
    }

    public function auto_publish_cycle() {
        $settings = $this->publishing_settings();
        if (empty($settings['enabled'])) { return; }
        $connection = $this->facebook_connection();
        if (empty($connection['connected'])) { update_option('gnvp_auto_publish_last_status', 'paused_no_connected_platform', false); return; }
        $created = 0;
        foreach (array('vertical' => 'vertical_count', 'horizontal' => 'horizontal_count') as $format => $count_key) {
            $enabled_key = $format . '_enabled';
            if (empty($settings[$enabled_key])) { continue; }
            $selected = array();
            for ($i = 0; $i < absint($settings[$count_key]); $i++) {
                $video = $this->next_rotated_video($format, $selected);
                if (!$video) { break; }
                $selected[] = $video['id'];
                $id = 'q' . wp_generate_password(10, false, false);
                $queue = get_option('gnvp_publish_queue', array());
                $copy = $this->auto_rotation_content($video);
                $queue[$id] = array('id' => $id, 'video_id' => $video['id'], 'language' => ($video['language'] ?? 'en'), 'platform' => 'facebook', 'type' => ($format === 'vertical' ? 'reel' : 'video'), 'title' => $copy['title'], 'description' => $copy['description'], 'hashtags' => $copy['hashtags'], 'caption' => $copy['caption'], 'platform_payloads' => array('facebook' => $copy), 'publish_at' => time() + ($created * 90), 'status' => 'scheduled', 'created_at' => current_time('mysql'), 'auto_rotation' => 1, 'retry_count' => 0);
                update_option('gnvp_publish_queue', $queue, false);
                wp_schedule_single_event(max(time() + 10, $queue[$id]['publish_at']), self::PUBLISH_HOOK, array($id));
                $created++;
            }
        }
        update_option('gnvp_auto_publish_last_status', $created ? 'queued_' . $created : 'no_eligible_videos', false);
    }

    private function local_datetime_timestamp($value) {
        try {
            $zone = function_exists('wp_timezone') ? wp_timezone() : new DateTimeZone('UTC');
            return (new DateTimeImmutable((string) $value, $zone))->getTimestamp();
        } catch (Exception $e) { return 0; }
    }

    private function schedule_video_retention_cleanup($video_id) {
        $queue = get_option('gnvp_publish_queue', array());
        $failed_at = 0;
        foreach ((array) $queue as $item) {
            if (($item['video_id'] ?? '') !== $video_id || ($item['status'] ?? '') !== 'failed' || empty($item['failed_at'])) { continue; }
            $candidate = $this->local_datetime_timestamp($item['failed_at']);
            if ($candidate > $failed_at) { $failed_at = $candidate; }
        }
        // The 24-hour clock starts only when the final destination failure is recorded.
        // Never fall back to created_at: that can delete a video before its final failure.
        if ($failed_at) {
            wp_schedule_single_event(max(time() + 30, $failed_at + DAY_IN_SECONDS), self::CLEANUP_HOOK);
        }
    }

    private function maybe_delete_video_after_all_targets($video_id) {
        $queue = get_option('gnvp_publish_queue', array());
        $found = false;
        foreach ($queue as $item) {
            if (($item['video_id'] ?? '') !== $video_id) { continue; }
            $found = true;
            if (($item['status'] ?? '') !== 'published') { return false; }
        }
        return $found ? $this->delete_video_file_after_success($video_id) : false;
    }

    /**
     * Delete only a regular MP4 whose canonical path remains inside our dedicated
     * uploads directory. Symlinks, traversal, missing names and non-MP4 files fail closed.
     */
    private function safe_delete_video_file(&$video, $reason) {
        if (!empty($video['file_deleted'])) { return true; }
        $filename = isset($video['file']) ? (string) $video['file'] : '';
        if ($filename === '' || basename($filename) !== $filename || !preg_match('/^[A-Za-z0-9._-]+\\.mp4$/i', $filename)) {
            $video['file_delete_error'] = 'invalid_media_filename';
            return false;
        }
        $uploads = wp_upload_dir();
        if (!empty($uploads['error']) || empty($uploads['basedir'])) {
            $video['file_delete_error'] = 'uploads_directory_unavailable';
            return false;
        }
        $expected_dir = trailingslashit($uploads['basedir']) . 'goldnow-videos';
        $root = realpath($expected_dir);
        if (!$root || !is_dir($root)) {
            $video['file_delete_error'] = 'media_directory_unavailable';
            return false;
        }
        $candidate = trailingslashit($root) . $filename;
        if (is_link($candidate)) {
            $video['file_delete_error'] = 'symlink_rejected';
            return false;
        }
        $real = realpath($candidate);
        if ($real === false) {
            if (file_exists($candidate)) {
                $video['file_delete_error'] = 'unresolvable_media_path';
                return false;
            }
            // An already absent file is safe to mark as absent; metadata is retained.
        } else {
            $prefix = trailingslashit($root);
            if (strpos($real, $prefix) !== 0 || !is_file($real) || strtolower(pathinfo($real, PATHINFO_EXTENSION)) !== 'mp4') {
                $video['file_delete_error'] = 'media_path_rejected';
                return false;
            }
            if (!@unlink($real)) {
                $video['file_delete_error'] = 'unlink_failed';
                return false;
            }
        }
        $video['file_deleted'] = 1;
        $video['file_deleted_at'] = current_time('mysql');
        $video['file_delete_reason'] = sanitize_key($reason);
        unset($video['file_delete_error']);
        return true;
    }

    private function delete_video_file_after_success($video_id) {
        $videos = get_option(GNVP_RENDER_OPTION, array());
        $queue = get_option('gnvp_publish_queue', array());
        $found_target = false;
        foreach ((array) $queue as $item) {
            if (($item['video_id'] ?? '') !== $video_id) { continue; }
            $found_target = true;
            if (($item['status'] ?? '') !== 'published') { return false; }
        }
        if (!$found_target) { return false; }
        foreach ($videos as &$video) {
            if (($video['id'] ?? '') !== $video_id) { continue; }
            $deleted = $this->safe_delete_video_file($video, 'all_targets_published');
            unset($video);
            update_option(GNVP_RENDER_OPTION, $videos, false);
            return $deleted;
        }
        unset($video);
        return false;
    }

    public function cleanup_failed_video_files() {
        $queue = get_option('gnvp_publish_queue', array());
        $items_by_video = array();
        foreach ((array) $queue as $item) {
            if (empty($item['video_id'])) { continue; }
            $items_by_video[(string) $item['video_id']][] = $item;
        }
        if (!$items_by_video) { return; }

        $videos = get_option(GNVP_RENDER_OPTION, array());
        if (!is_array($videos) || !$videos) { return; }
        $now = time();
        $changed = false;
        $final_statuses = array('published', 'failed');

        foreach ($videos as &$video) {
            $video_id = (string) ($video['id'] ?? '');
            if ($video_id === '' || !empty($video['file_deleted']) || empty($items_by_video[$video_id])) { continue; }
            $items = $items_by_video[$video_id];
            $statuses = array_map(static function ($item) { return (string) ($item['status'] ?? ''); }, $items);

            // Any queued, scheduled, uploading, retrying, processing, live, or unknown
            // destination is unresolved and must keep the local source file.
            foreach ($statuses as $status) {
                if (!in_array($status, $final_statuses, true)) { continue 2; }
            }

            $has_failure = in_array('failed', $statuses, true);
            if (!$has_failure) {
                // All destinations are confirmed published: delete promptly.
                if ($this->safe_delete_video_file($video, 'all_targets_published')) { $changed = true; }
                else { $changed = true; }
                continue;
            }

            $failed_at = 0;
            foreach ($items as $item) {
                if (($item['status'] ?? '') !== 'failed' || empty($item['failed_at'])) { continue; }
                $candidate = $this->local_datetime_timestamp($item['failed_at']);
                if ($candidate > $failed_at) { $failed_at = $candidate; }
            }
            // Missing final-failure timestamps are unresolved; never infer from render time.
            if (!$failed_at || ($now - $failed_at) < DAY_IN_SECONDS) { continue; }
            $this->safe_delete_video_file($video, 'final_failure_retention_expired');
            $changed = true;
        }
        unset($video);
        if ($changed) { update_option(GNVP_RENDER_OPTION, $videos, false); }
    }

    public function delete_queue_item() {
        if (!current_user_can('manage_options')) { wp_die('Unauthorized'); }
        $id = isset($_GET['id']) ? sanitize_text_field(wp_unslash($_GET['id'])) : '';
        check_admin_referer('gnvp_delete_queue_' . $id);
        $queue = get_option('gnvp_publish_queue', array());
        if (isset($queue[$id]) && ($queue[$id]['status'] ?? '') === 'scheduled') { wp_unschedule_event($queue[$id]['publish_at'], self::PUBLISH_HOOK, array($id)); unset($queue[$id]); update_option('gnvp_publish_queue', $queue, false); }
        wp_safe_redirect($this->admin_url_for('publishing', array('deleted' => 1))); exit;
    }

    private function live_settings() {
        $defaults = array(
            'enabled' => 0, 'start_time' => '08:00', 'end_time' => '07:59',
            'repeat_hours' => 4, 'duration_minutes' => 60,
            'timezone' => 'Africa/Cairo', 'platforms' => array('facebook'),
        );
        $saved = get_option('gnvp_live_schedule', array());
        return wp_parse_args(is_array($saved) ? $saved : array(), $defaults);
    }

    private function build_live_slots($live) {
        $start = isset($live['start_time']) ? $live['start_time'] : '08:00';
        $end = isset($live['end_time']) ? $live['end_time'] : '07:59';
        $repeat = max(1, min(24, absint($live['repeat_hours'] ?? 4))) * 60;
        $duration = max(5, min(720, absint($live['duration_minutes'] ?? 60)));
        if (!preg_match('/^(?:[01]\d|2[0-3]):[0-5]\d$/', $start)) { $start = '08:00'; }
        if (!preg_match('/^(?:[01]\d|2[0-3]):[0-5]\d$/', $end)) { $end = '07:59'; }
        list($sh, $sm) = array_map('intval', explode(':', $start));
        list($eh, $em) = array_map('intval', explode(':', $end));
        $start_min = $sh * 60 + $sm; $end_min = $eh * 60 + $em;
        $window = ($end_min >= $start_min) ? ($end_min - $start_min) : (1440 - $start_min + $end_min);
        $slots = array();
        for ($offset = 0, $n = 0; $offset <= $window && $n < 24; $offset += $repeat, $n++) {
            $minute = ($start_min + $offset) % 1440;
            $slot_start = sprintf('%02d:%02d', (int) floor($minute / 60), $minute % 60);
            $slot_end_min = ($minute + $duration) % 1440;
            $slot_end = sprintf('%02d:%02d', (int) floor($slot_end_min / 60), $slot_end_min % 60);
            $slots[] = array('start' => $slot_start, 'end' => $slot_end, 'duration' => $duration);
        }
        return $slots;
    }

    public function save_live_settings() {
        if (!current_user_can('manage_options')) { wp_die('Unauthorized'); }
        check_admin_referer('gnvp_save_live');
        $start = isset($_POST['start_time']) ? sanitize_text_field(wp_unslash($_POST['start_time'])) : '08:00';
        $end = isset($_POST['end_time']) ? sanitize_text_field(wp_unslash($_POST['end_time'])) : '07:59';
        if (!preg_match('/^(?:[01]\d|2[0-3]):[0-5]\d$/', $start)) { $start = '08:00'; }
        if (!preg_match('/^(?:[01]\d|2[0-3]):[0-5]\d$/', $end)) { $end = '07:59'; }
        $platforms = isset($_POST['platforms']) ? array_values(array_intersect(array('facebook'), array_map('sanitize_key', (array) wp_unslash($_POST['platforms'])))) : array();
        $live = array(
            'enabled' => !empty($_POST['schedule_enabled']) ? 1 : 0,
            'start_time' => $start, 'end_time' => $end,
            'repeat_hours' => max(1, min(24, absint($_POST['repeat_hours'] ?? 4))),
            'duration_minutes' => max(5, min(720, absint($_POST['duration_minutes'] ?? 60))),
            'timezone' => 'Africa/Cairo', 'platforms' => $platforms,
            'runtime_enabled' => 0,
        );
        update_option('gnvp_live_schedule', $live, false);
        wp_safe_redirect($this->admin_url_for('live', array('saved' => 1))); exit;
    }

    private function admin_header($title, $active) {
        echo '<div class="wrap gnvp-wrap"><h1>AlTaqrer Gold Video Publisher <span class="gnvp-version">v' . esc_html(GNVP_VERSION) . '</span></h1><h2 class="nav-tab-wrapper">';
        $tabs = array('dashboard' => 'لوحة التحكم', 'library' => 'مكتبة الفيديوهات', 'publishing' => 'النشر والجدولة', 'connections' => 'ربط المنصات', 'live' => 'البث المباشر', 'diagnostics' => 'فحص الجاهزية');
        foreach ($tabs as $key => $label) { $url = $key === 'dashboard' ? admin_url('admin.php?page=' . self::MENU_SLUG) : $this->admin_url_for($key); echo '<a class="nav-tab ' . ($active === $key ? 'nav-tab-active' : '') . '" href="' . esc_url($url) . '">' . esc_html($label) . '</a>'; }
        echo '</h2><h2>' . esc_html($title) . '</h2>';
    }

    /** Run a command without a shell. Output streams are drained together to avoid pipe deadlocks. */
    private function diagnostic_proc_exec($command, $timeout = 30) {
        if (!function_exists('proc_open')) {
            return array('exit_code' => -1, 'stdout' => '', 'stderr' => 'proc_open is unavailable.');
        }
        $disabled = array_map('trim', explode(',', (string) ini_get('disable_functions')));
        if (in_array('proc_open', $disabled, true)) {
            return array('exit_code' => -1, 'stdout' => '', 'stderr' => 'proc_open is disabled.');
        }
        $descriptors = array(0 => array('pipe', 'r'), 1 => array('pipe', 'w'), 2 => array('pipe', 'w'));
        $process = @proc_open($command, $descriptors, $pipes);
        if (!is_resource($process)) {
            return array('exit_code' => -1, 'stdout' => '', 'stderr' => 'Could not start process.');
        }
        fclose($pipes[0]);
        stream_set_blocking($pipes[1], false);
        stream_set_blocking($pipes[2], false);
        $stdout = '';
        $stderr = '';
        $started = microtime(true);
        $timed_out = false;
        $observed_exit_code = null;
        while (true) {
            $read = array();
            if (!feof($pipes[1])) { $read[] = $pipes[1]; }
            if (!feof($pipes[2])) { $read[] = $pipes[2]; }
            if ($read) {
                $write = null; $except = null;
                @stream_select($read, $write, $except, 1);
                foreach ($read as $stream) {
                    $chunk = stream_get_contents($stream);
                    if ($stream === $pipes[1]) { $stdout .= $chunk; }
                    else { $stderr .= $chunk; }
                }
            }
            $status = proc_get_status($process);
            if (!$status['running']) { $observed_exit_code = isset($status['exitcode']) ? (int) $status['exitcode'] : null; break; }
            if ((microtime(true) - $started) > $timeout) {
                $timed_out = true;
                @proc_terminate($process, 9);
                break;
            }
        }
        $stdout .= stream_get_contents($pipes[1]);
        $stderr .= stream_get_contents($pipes[2]);
        fclose($pipes[1]); fclose($pipes[2]);
        $close_code = proc_close($process);
        if ($close_code === -1 && $observed_exit_code !== null && $observed_exit_code >= 0) { $close_code = $observed_exit_code; }
        if ($timed_out) { $close_code = 124; $stderr .= "\nProcess timed out after {$timeout} seconds."; }
        return array('exit_code' => $close_code, 'stdout' => trim($stdout), 'stderr' => trim($stderr));
    }

    /** Escape a filesystem path for an FFmpeg filter option value. */
    private function diagnostic_escape_filter_path($path) {
        $path = str_replace('\\', '/', (string) $path);
        return str_replace(array('\\', "'", ':'), array('\\\\', "\\'", '\\:'), $path);
    }

    private function diagnostic_find_ldd() {
        foreach (array('/usr/bin/ldd', '/bin/ldd', '/usr/local/bin/ldd') as $candidate) {
            if (is_executable($candidate)) { return $candidate; }
        }
        return '';
    }

    private function diagnostic_inspect_dependencies($binary) {
        $ldd = $this->diagnostic_find_ldd();
        if (!$ldd) { return array('status' => 'ldd_unavailable', 'libass_path' => '', 'relevant_lines' => array(), 'details' => 'ldd was not found in standard system paths.'); }
        $res = $this->diagnostic_proc_exec(array($ldd, $binary), 15);
        $combined = trim($res['stdout'] . "\n" . $res['stderr']);
        if (stripos($combined, 'not a dynamic executable') !== false || stripos($combined, 'statically linked') !== false) {
            return array('status' => 'static_or_non_dynamic', 'libass_path' => '', 'relevant_lines' => array(), 'details' => $combined, 'exit_code' => $res['exit_code']);
        }
        $libass_path = '';
        foreach (preg_split('/\r?\n/', $combined) as $line) {
            if (stripos($line, 'libass.so') === false) { continue; }
            if (preg_match('/=>\s+(\/\S+)/', $line, $m)) { $libass_path = $m[1]; }
            elseif (preg_match('/^\s*(\/\S*libass\S*)/', $line, $m)) { $libass_path = $m[1]; }
            break;
        }
        $relevant = array();
        foreach (preg_split('/\r?\n/', $combined) as $line) {
            if (preg_match('/(libass|fribidi|harfbuzz|fontconfig|freetype|not found)/i', $line)) { $relevant[] = trim($line); }
        }
        $libs = array();
        $libass_status = 'not_directly_linked';
        if ($libass_path && is_readable($libass_path)) {
            $libres = $this->diagnostic_proc_exec(array($ldd, $libass_path), 15);
            $libcombined = trim($libres['stdout'] . "\n" . $libres['stderr']);
            foreach (preg_split('/\r?\n/', $libcombined) as $line) {
                if (preg_match('/(fribidi|harfbuzz|fontconfig|freetype|not found)/i', $line)) { $libs[] = trim($line); }
            }
            $libass_status = $libres['exit_code'] === 0 ? 'dynamic_found' : 'dependency_check_failed';
        } elseif ($libass_path) {
            $libass_status = 'path_not_readable';
        }
        return array('status' => $libass_status, 'libass_path' => $libass_path, 'relevant_lines' => $relevant, 'libass_dependencies' => $libs, 'details' => $combined, 'exit_code' => $res['exit_code']);
    }

    private function diagnostic_create_temp_dir() {
        $base = function_exists('sys_get_temp_dir') ? sys_get_temp_dir() : '';
        if (!$base || !is_dir($base) || !is_writable($base)) { return ''; }
        $dir = rtrim($base, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . 'atg-diag-' . wp_generate_password(16, false, false);
        if (!@mkdir($dir, 0700) && !is_dir($dir)) { return ''; }
        @chmod($dir, 0700);
        return $dir;
    }

    private function diagnostic_cleanup_temp_dir($dir) {
        $base = function_exists('sys_get_temp_dir') ? realpath(sys_get_temp_dir()) : false;
        $real = realpath($dir);
        if (!$base || !$real || dirname($real) !== $base || strpos(basename($real), 'atg-diag-') !== 0) { return; }
        $items = @scandir($real);
        if (!is_array($items)) { return; }
        foreach (array_diff($items, array('.', '..')) as $item) {
            $target = $real . DIRECTORY_SEPARATOR . $item;
            if (is_file($target) || is_link($target)) { @unlink($target); }
        }
        @rmdir($real);
    }

    private function perform_arabic_render_diagnostics() {
        $ffmpeg = $this->ffmpeg_binary();
        $fonts_dir = GNVP_PATH . 'assets/fonts';
        $this->ensure_almarai_font_installed();
$font_file = $fonts_dir . '/Almarai-Bold.ttf';

        $report = array(
            'ffmpeg_found' => (bool) $ffmpeg,
            'font_file_exists' => is_readable($font_file),
            'dependencies' => array(),
            'renders' => array(),
            'note' => 'Dependency presence is indicative only; successful Arabic shaping must be judged from the generated PNGs.',
        );
        if (!$ffmpeg || !is_executable($ffmpeg)) {
            $report['fatal_error'] = 'FFmpeg binary is missing or not executable.';
            return $report;
        }
        if (!is_readable($font_file)) {
            $report['fatal_error'] = 'Bundled Cairo-Bold.ttf is not readable.';
            return $report;
        }
        $temp = $this->diagnostic_create_temp_dir();
        if (!$temp) {
            $report['fatal_error'] = 'Could not create a private temporary directory under sys_get_temp_dir().';
            return $report;
        }
        try {
            $report['dependencies'] = $this->diagnostic_inspect_dependencies($ffmpeg);
            $profiles = array(
                'vertical' => array('width' => 720, 'height' => 1280, 'font_size' => 48),
                'horizontal' => array('width' => 1280, 'height' => 720, 'font_size' => 44),
            );
            foreach ($profiles as $name => $cfg) {
                $ass = $temp . DIRECTORY_SEPARATOR . 'diag_' . $name . '.ass';
                $png = $temp . DIRECTORY_SEPARATOR . 'diag_' . $name . '.png';
            $line1 = $this->shape_arabic_for_ass("سعر الذهب في مصر اليوم");
            $line2 = $this->shape_arabic_for_ass("عيار 24");
            $line3 = $this->shape_arabic_for_ass("6328.33 جنيه مصري للجرام");
            $text = "{$line1}\\N{$line2}\\N{$line3}";
                $content = "[Script Info]\nScriptType: v4.00+\nPlayResX: {$cfg['width']}\nPlayResY: {$cfg['height']}\n\n"
                    . "[V4+ Styles]\nFormat: Name, Fontname, Fontsize, PrimaryColour, SecondaryColour, OutlineColour, BackColour, Bold, Italic, Underline, StrikeOut, ScaleX, ScaleY, Spacing, Angle, BorderStyle, Outline, Shadow, Alignment, MarginL, MarginR, MarginV, Encoding\n"
                    . "Style: Default,Almarai,{$cfg['font_size']},&H00FFFFFF,&H000000FF,&H00000000,&H80000000,-1,0,0,0,100,100,0,0,1,2,0,5,30,30,30,1\n\n"
                    . "[Events]\nFormat: Layer, Start, End, Style, Name, MarginL, MarginR, MarginV, Effect, Text\n"
                    . "Dialogue: 0,0:00:00.00,0:00:05.00,Default,,0,0,0,,{$text}\n";
                if (@file_put_contents($ass, $content) === false) {
                    $report['renders'][$name] = array('exit_code' => -1, 'png_created' => false, 'error' => 'Could not write ASS test file.');
                    continue;
                }
                $filter = "subtitles=filename='" . $this->diagnostic_escape_filter_path($ass) . "':fontsdir='" . $this->diagnostic_escape_filter_path($fonts_dir) . "'";
                $command = array($ffmpeg, '-y', '-hide_banner', '-v', 'verbose', '-f', 'lavfi', '-i', 'color=c=black:s=' . $cfg['width'] . 'x' . $cfg['height'] . ':d=1', '-vf', $filter, '-frames:v', '1', '-threads', '1', $png);
                $run = $this->diagnostic_proc_exec($command, 35);
                $font_logs = array();
                foreach (preg_split('/\r?\n/', $run['stderr'] . "\n" . $run['stdout']) as $line) {
                    if (stripos($line, 'fontselect') !== false || stripos($line, 'Parsed_subtitles') !== false || stripos($line, 'libass') !== false || stripos($line, 'shaper') !== false) { $font_logs[] = trim($line); }
                }
                $exists = is_file($png);
                $image_info = $exists ? @getimagesize($png) : false;
                $report['renders'][$name] = array(
                    'exit_code' => $run['exit_code'],
                    'png_created' => (bool) $image_info,
                    'png_bytes' => $exists ? (int) @filesize($png) : 0,
                    'image_dimensions' => $image_info ? array((int) $image_info[0], (int) $image_info[1]) : array(),
                    'font_logs' => array_slice($font_logs, 0, 40),
                    'error_tail' => $run['exit_code'] !== 0 ? array_slice(preg_split('/\r?\n/', $run['stderr'] . "\n" . $run['stdout']), -18) : array(),
                    'png_base64' => ($image_info && $image_info[2] === IMAGETYPE_PNG) ? base64_encode(file_get_contents($png)) : '',
                );
            }
        } finally {
            $this->diagnostic_cleanup_temp_dir($temp);
        }
        return $report;
    }

    public function run_arabic_diagnostics_admin() {
        if (!current_user_can('manage_options')) { wp_die('Unauthorized', 403); }
        check_admin_referer('gnvp_run_arabic_diagnostics');
        $report = $this->perform_arabic_render_diagnostics();
        set_transient('gnvp_arabic_diag_' . get_current_user_id(), $report, 10 * MINUTE_IN_SECONDS);
        wp_safe_redirect($this->admin_url_for('diagnostics', array('arabic_test' => 1)));
        exit;
    }

    private function collect_diagnostics() {
        $ffmpeg = $this->ffmpeg_binary();
        $upload = wp_upload_dir();
        $disabled = array_map('trim', explode(',', (string) ini_get('disable_functions')));
        $proc_ok = function_exists('proc_open') && !in_array('proc_open', $disabled, true);
        $exec_ok = function_exists('exec') && !in_array('exec', $disabled, true);
        $checks = array(
            array('name' => 'PHP version', 'value' => PHP_VERSION, 'ok' => version_compare(PHP_VERSION, '7.4', '>=')),
            array('name' => 'PHP SAPI', 'value' => PHP_SAPI, 'ok' => true),
            array('name' => 'proc_open', 'value' => $proc_ok ? 'Available' : 'Unavailable', 'ok' => $proc_ok),
            array('name' => 'exec', 'value' => $exec_ok ? 'Available' : 'Unavailable', 'ok' => $exec_ok),
            array('name' => 'FFmpeg binary', 'value' => $ffmpeg ?: 'Not found in standard paths; configure gnvp_ffmpeg_binary filter', 'ok' => (bool) $ffmpeg),
            array('name' => 'Uploads writable', 'value' => !empty($upload['error']) ? $upload['error'] : (wp_is_writable($upload['basedir']) ? $upload['basedir'] : 'Not writable'), 'ok' => empty($upload['error']) && wp_is_writable($upload['basedir'])),
            array('name' => 'Arabic Cairo font', 'value' => is_readable(GNVP_PATH . 'assets/fonts/Cairo-Bold.ttf') ? 'Bundled' : 'Missing', 'ok' => is_readable(GNVP_PATH . 'assets/fonts/Cairo-Bold.ttf')),
            array('name' => 'Facebook connection', 'value' => $this->facebook_connection()['connected'] ? 'Verified' : 'Not verified', 'ok' => (bool) $this->facebook_connection()['connected']),
            array('name' => 'Persistent Live worker', 'value' => 'Not implemented in this build', 'ok' => false),
        );
        if ($ffmpeg) {
            foreach (array('subtitles' => 'FFmpeg subtitles/libass', 'drawtext' => 'FFmpeg drawtext') as $filter => $label) {
                $ok = $this->ffmpeg_supports_filter($ffmpeg, $filter);
                $checks[] = array('name' => $label, 'value' => $ok ? 'Available' : 'Missing', 'ok' => $ok);
            }
            foreach (array('-encoders' => array('libx264' => 'FFmpeg libx264', ' aac ' => 'FFmpeg AAC'), '-protocols' => array('rtmps' => 'FFmpeg RTMPS protocol')) as $arg => $needles) {
                $proc = @proc_open(array($ffmpeg, '-hide_banner', $arg), array(0 => array('pipe', 'r'), 1 => array('pipe', 'w'), 2 => array('pipe', 'w')), $pipes);
                $output = '';
                if (is_resource($proc)) { fclose($pipes[0]); $output = stream_get_contents($pipes[1]) . stream_get_contents($pipes[2]); fclose($pipes[1]); fclose($pipes[2]); proc_close($proc); }
                foreach ($needles as $needle => $label) { $ok = stripos($output, $needle) !== false; $checks[] = array('name' => $label, 'value' => $ok ? 'Available' : 'Not confirmed', 'ok' => $ok); }
            }
        }
        return $checks;
    }

    public function run_diagnostics() {
        if (!current_user_can('manage_options')) { wp_die('Unauthorized'); }
        check_admin_referer('gnvp_run_diagnostics');
        update_option('gnvp_last_diagnostics', array('checked_at' => current_time('mysql'), 'checks' => $this->collect_diagnostics()), false);
        wp_safe_redirect($this->admin_url_for('diagnostics', array('checked' => 1))); exit;
    }

    public function render_diagnostics() {
        if (!current_user_can('manage_options')) { return; }
        $this->admin_header('فحص جاهزية السيرفر والتصميم والبث', 'diagnostics');
        $saved = get_option('gnvp_last_diagnostics', array());
        echo '<section class="gnvp-card"><p>الفحص للقراءة فقط؛ لا يغيّر إعدادات الاستضافة ولا يبدأ بثًا أو ينشر محتوى.</p>';
        echo '<form method="post" action="' . esc_url(admin_url('admin-post.php')) . '"><input type="hidden" name="action" value="gnvp_run_diagnostics">'; wp_nonce_field('gnvp_run_diagnostics'); echo '<button class="button button-primary">تشغيل فحص الجاهزية الآن</button></form>';
        echo '<hr><h3>تشخيص تشكيل الحروف العربية (اختبار معزول)</h3><p>ينتج صورتين PNG مؤقتتين عبر FFmpeg وملف Cairo المرفق، ثم يعرضهما هنا ويحذف ملفات الاختبار من مجلد النظام المؤقت. لا ينشئ فيديو ولا ينشر ولا يبدأ بثًا.</p>';
        echo '<form method="post" action="' . esc_url(admin_url('admin-post.php')) . '"><input type="hidden" name="action" value="gnvp_run_arabic_diagnostics">'; wp_nonce_field('gnvp_run_arabic_diagnostics'); echo '<button class="button button-secondary">تشغيل اختبار العربية الرأسي والأفقي</button></form>';
        $arabic_report = get_transient('gnvp_arabic_diag_' . get_current_user_id());
        if (isset($_GET['arabic_test']) && $arabic_report && is_array($arabic_report)) {
            echo '<h3>نتيجة اختبار العربية</h3>';
            $safe_report = $arabic_report;
            foreach (array('vertical', 'horizontal') as $profile) { if (isset($safe_report['renders'][$profile]['png_base64'])) { unset($safe_report['renders'][$profile]['png_base64']); } }
            echo '<pre style="max-height:420px;overflow:auto;direction:ltr;text-align:left;white-space:pre-wrap;background:#f6f7f7;padding:12px">' . esc_html(wp_json_encode($safe_report, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)) . '</pre>';
            foreach (array('vertical' => 'الصورة الرأسية 720×1280', 'horizontal' => 'الصورة الأفقية 1280×720') as $profile => $label) {
                $encoded = $arabic_report['renders'][$profile]['png_base64'] ?? '';
                if ($encoded) { echo '<h4>' . esc_html($label) . '</h4><img alt="' . esc_attr($label) . '" style="display:block;max-width:100%;height:auto;border:1px solid #ccd0d4;background:#000;margin:10px 0 24px" src="data:image/png;base64,' . esc_attr($encoded) . '">'; }
                else { echo '<p>' . esc_html($label . ': لم يتم إنشاء صورة صالحة.') . '</p>'; }
            }
            delete_transient('gnvp_arabic_diag_' . get_current_user_id());
        }
        if (!empty($saved['checks'])) { echo '<p>آخر فحص: ' . esc_html($saved['checked_at']) . '</p><table class="widefat striped"><thead><tr><th>البند</th><th>النتيجة</th><th>الحالة</th></tr></thead><tbody>'; foreach ($saved['checks'] as $check) { echo '<tr><td>' . esc_html($check['name']) . '</td><td>' . esc_html($check['value']) . '</td><td>' . ($check['ok'] ? '<span class="gnvp-ok">متاح</span>' : '<span class="gnvp-warning">يحتاج استكمال</span>') . '</td></tr>'; } echo '</tbody></table>'; }
        echo '<h3>بوابة الجودة الإلزامية قبل البث</h3><ol><li>فيديو تجريبي عربي وإنجليزي بالمقاسين 9:16 و16:9.</li><li>مراجعة اتصال الحروف العربية واتجاه RTL ووضوح الأرقام على الهاتف.</li><li>إثبات تغير الأسعار أثناء الفيديو مع إظهار وقت آخر تحديث الفعلي.</li><li>اختبار الصوت لكل لغة بعد ربط TTS؛ المسار الصامت ليس نسخة نهائية.</li><li>التحقق من RTMPS وعامل تشغيل دائم وصلاحيات Live قبل أي بث.</li></ol><p class="gnvp-warning"><strong>تنبيه:</strong> نجاح الفحص لا يثبت صلاحيات Facebook Live ولا يبدأ البث. يلزم اختبار منفصل وموافقتك الصريحة.</p></section></div>';
    }

    public function render_library() {
        if (!current_user_can('manage_options')) { return; }
        $videos = get_option(GNVP_RENDER_OPTION, array());
        $this->admin_header('مكتبة الفيديوهات', 'library');
        echo '<p>كل ملفات MP4 التي أنشأتها الإضافة محفوظة هنا. المعاينة لا تعني أنها نُشرت.</p>';
        if (!$videos) { echo '<div class="notice notice-info"><p>لا توجد فيديوهات حتى الآن. حدّث الأسعار ثم أنشئ ملفات MP4 من لوحة التحكم.</p></div>'; }
        echo '<div class="gnvp-library-grid">';
        foreach (array_reverse($videos) as $v) {
            $deleted = !empty($v['file_deleted']);
            echo '<article class="gnvp-library-card">';
            if (!$deleted && !empty($v['url'])) { echo '<video controls preload="metadata" src="' . esc_url($v['url']) . '"></video>'; }
            else { echo '<div class="gnvp-status"><strong>ملف MP4 محذوف من التخزين</strong><p>تم الاحتفاظ بسجل الفيديو وحالة النشر.</p></div>'; }
            echo '<h3>' . esc_html($v['id']) . '</h3><p>' . esc_html(($v['market'] ?? '') . ' · ' . ($v['language'] ?? '') . ' · ' . ($v['aspect_ratio'] ?? '')) . '</p>';
            echo '<p>آخر تحديث للبيانات المستخدمة: ' . esc_html($v['data_updated_at'] ?? 'غير مسجل') . '</p><p>وقت إنشاء MP4: ' . esc_html($v['created_at'] ?? 'غير مسجل') . ' · ' . esc_html(size_format((int) ($v['bytes'] ?? 0))) . '</p>';
            if (!$deleted && !empty($v['url'])) { echo '<a class="button" href="' . esc_url($v['url']) . '" download>تنزيل MP4</a>'; }
            echo '</article>';
        }
        echo '</div></div>';
    }

    public function render_connections() {
        if (!current_user_can('manage_options')) { return; }
        $c = $this->facebook_connection(); $this->admin_header('ربط حسابات النشر', 'connections');
        if (isset($_GET['fb_test'])) { echo '<div class="notice ' . ($_GET['fb_test'] === 'ok' ? 'notice-success' : 'notice-error') . '"><p>' . ($_GET['fb_test'] === 'ok' ? 'تم التحقق من صفحة Facebook.' : 'فشل التحقق من Facebook؛ راجع رسالة الخطأ أدناه.') . '</p></div>'; }
        if (isset($_GET['fb_saved'])) { echo '<div class="notice notice-success"><p>تم حفظ بيانات الربط.</p></div>'; }
        echo '<section class="gnvp-card"><h3>Facebook Page — أولوية الربط الأولى</h3><p>أدخل Page ID وPage Access Token صادرًا من تطبيق Meta لديه الصلاحيات المطلوبة. الإضافة لا تستطيع إنشاء موافقة Meta نيابةً عنك.</p><form method="post" action="' . esc_url(admin_url('admin-post.php')) . '"><input type="hidden" name="action" value="gnvp_save_facebook">';
        wp_nonce_field('gnvp_save_facebook');
        echo '<p><label>Facebook Page ID<br><input class="regular-text" name="page_id" value="' . esc_attr($c['page_id']) . '" required></label></p><p><label>Page Access Token<br><input class="large-text" type="password" name="access_token" value="" autocomplete="new-password" placeholder="اتركه فارغًا للاحتفاظ بالتوكن الحالي"></label></p><p class="description">التوكن الحالي: ' . ($c['access_token'] ? 'محفوظ (' . esc_html(substr($c['access_token'], -5)) . ')' : 'غير موجود') . '</p><button class="button button-primary">حفظ بيانات Facebook</button></form>';
        echo '<form method="post" action="' . esc_url(admin_url('admin-post.php')) . '" style="margin-top:12px"><input type="hidden" name="action" value="gnvp_test_facebook">'; wp_nonce_field('gnvp_test_facebook'); echo '<button class="button">اختبار الاتصال بالصفحة</button></form>';
        echo '<p><strong>الحالة:</strong> ' . ($c['connected'] ? '<span class="gnvp-ok">متصل: ' . esc_html($c['page_name']) . '</span>' : '<span class="gnvp-muted">غير متصل / لم يتم التحقق</span>') . '</p>';
        if ($c['last_error']) { echo '<div class="gnvp-error">' . esc_html($c['last_error']) . '</div>'; }
        echo '<p class="description">الصلاحيات المعتادة لنشر فيديو على صفحة: pages_show_list وpages_manage_posts وpages_read_engagement، مع مهمة CREATE_CONTENT على الصفحة. قد تتطلب مراجعة التطبيق حسب طريقة استخدامه.</p></section>';
        echo '<div class="gnvp-platform-grid">';
        $platforms = array('Threads' => 'Threads API + OAuth user authorization', 'YouTube' => 'YouTube Data API + Google OAuth 2.0', 'Instagram' => 'Instagram Graph API + Professional account', 'TikTok' => 'Content Posting API + app review and creator authorization');
        foreach ($platforms as $name => $detail) { echo '<div class="gnvp-card"><h3>' . esc_html($name) . '</h3><span class="gnvp-muted">غير مربوط</span><p>' . esc_html($detail) . '</p><p class="description">سيظهر نموذج الربط بعد استكمال موصل المنصة وموافقاتها.</p></div>'; }
        echo '</div></div>';
    }

    public function render_publishing() {
        if (!current_user_can('manage_options')) { return; }
        $videos = get_option(GNVP_RENDER_OPTION, array()); $queue = get_option('gnvp_publish_queue', array()); $c = $this->facebook_connection();
        $this->admin_header('جدولة ونشر الفيديوهات', 'publishing');
        if (isset($_GET['queued'])) { echo '<div class="notice notice-success"><p>تمت إضافة الفيديو إلى قائمة النشر المجدول.</p></div>'; }
        if (isset($_GET['queue_error'])) { echo '<div class="notice notice-error"><p>اختر فيديو صالحًا من المكتبة.</p></div>'; }
        echo '<section class="gnvp-card"><h3>إنشاء مهمة نشر على Facebook</h3><p>الحالة الحالية: ' . ($c['connected'] ? 'الصفحة متصلة' : 'يجب ربط صفحة Facebook واختبار الاتصال أولًا') . '</p><form method="post" action="' . esc_url(admin_url('admin-post.php')) . '"><input type="hidden" name="action" value="gnvp_queue_publish">'; wp_nonce_field('gnvp_queue_publish');
        echo '<p><label>الفيديو<br><select name="video_id" required><option value="">اختر فيديو من المكتبة</option>';
        foreach ($videos as $v) { echo '<option value="' . esc_attr($v['id']) . '">' . esc_html($v['id'] . ' · ' . $v['aspect_ratio']) . '</option>'; }
        echo '</select></label></p><p><label>نوع النشر<br><select name="publish_type"><option value="video">فيديو صفحة عادي</option><option value="reel">Facebook Reel</option></select></label></p><p><label>العنوان<br><input type="text" name="post_title" class="large-text" maxlength="254"></label></p><p><label>الوصف<br><textarea name="post_description" rows="4" class="large-text"></textarea></label></p><p><label>الهاشتاجات (افصل بينها بمسافة)<br><input type="text" name="post_hashtags" class="large-text" placeholder="#Gold #GoldPrice"></label></p><p class="description">يُحفظ العنوان والوصف والهاشتاجات والنص النهائي المستخدم في سجل مهمة Facebook. أدخلها باللغة المطابقة للفيديو.</p><p><label>موعد النشر (اتركه فارغًا للنشر بأقرب تشغيل مجدول)<br><input type="datetime-local" name="publish_at"></label></p><button class="button button-primary" ' . disabled(!$videos || !$c['connected'], true, false) . '>إضافة إلى قائمة النشر</button></form><p class="description">يعتمد التنفيذ على WP-Cron؛ لضمان الدقة في مواعيد النشر يوصى بربط WordPress بنظام cron حقيقي من الاستضافة.</p></section>';
        $ps = $this->publishing_settings();
        echo '<section class="gnvp-card" style="margin-top:16px"><h3>التدوير والجدولة التلقائية حسب مقاس الفيديو</h3><p>يتم اختيار الفيديوهات من المكتبة بالدور، مع مؤشر مستقل للرأسي والأفقي. لا يعمل النشر التلقائي إلا للمنصات المتصلة والمختبرة.</p>';
        echo '<form method="post" action="' . esc_url(admin_url('admin-post.php')) . '"><input type="hidden" name="action" value="gnvp_save_publishing_settings">'; wp_nonce_field('gnvp_save_publishing_settings');
        echo '<p><label><input type="checkbox" name="auto_publish_enabled" value="1" ' . checked(!empty($ps['enabled']), true, false) . '> تفعيل التدوير والنشر التلقائي (متوقف افتراضيًا)</label></p>';
        echo '<p><label>التكرار كل <input type="number" name="interval_hours" min="1" max="24" value="' . esc_attr($ps['interval_hours']) . '" style="width:80px"> ساعة</label></p>';
        echo '<div class="gnvp-platform-grid"><div><h4>الرأسي 9:16</h4><label><input type="checkbox" name="vertical_enabled" value="1" ' . checked(!empty($ps['vertical_enabled']), true, false) . '> تفعيل</label><p>عدد الفيديوهات في كل دورة <input type="number" min="1" max="10" name="vertical_count" value="' . esc_attr($ps['vertical_count']) . '"></p><p class="description">Facebook Reel حاليًا عند اتصال الصفحة.</p></div><div><h4>الأفقي 16:9</h4><label><input type="checkbox" name="horizontal_enabled" value="1" ' . checked(!empty($ps['horizontal_enabled']), true, false) . '> تفعيل</label><p>عدد الفيديوهات في كل دورة <input type="number" min="1" max="10" name="horizontal_count" value="' . esc_attr($ps['horizontal_count']) . '"></p><p class="description">Facebook Video حاليًا عند اتصال الصفحة.</p></div></div>';
        echo '<p class="description">إعادة المحاولة: 3 مرات بفاصل 15 دقيقة. حذف MP4 بعد نجاح النشر، أو بعد 24 ساعة من إنشاء الفيديو إذا انتهت محاولات النشر بالفشل.</p><p><button class="button button-primary">حفظ إعدادات التدوير</button></p></form></section>';
        echo '<section class="gnvp-card" style="margin-top:16px"><h3>قائمة النشر وسجل العمليات</h3>';
        if (!$queue) { echo '<p>لا توجد مهام نشر حتى الآن.</p>'; }
        else { echo '<table class="widefat striped"><thead><tr><th>الفيديو</th><th>المنصة</th><th>النوع</th><th>الموعد</th><th>الحالة</th><th>التفاصيل</th><th></th></tr></thead><tbody>';
            foreach (array_reverse($queue) as $q) { $delete = wp_nonce_url(admin_url('admin-post.php?action=gnvp_delete_queue&id=' . rawurlencode($q['id'])), 'gnvp_delete_queue_' . $q['id']); echo '<tr><td>' . esc_html($q['video_id']) . '</td><td>Facebook</td><td>' . esc_html($q['type']) . '</td><td>' . esc_html(wp_date('Y-m-d H:i', (int) $q['publish_at'], wp_timezone())) . '</td><td>' . esc_html($q['status']) . '</td><td>' . esc_html($q['error'] ?? ($q['remote_id'] ?? '—')) . '</td><td>' . (($q['status'] ?? '') === 'scheduled' ? '<a href="' . esc_url($delete) . '">إلغاء</a>' : '') . '</td></tr>'; }
            echo '</tbody></table>'; }
        echo '</section></div>';
    }

    public function render_live() {
        if (!current_user_can('manage_options')) { return; }
        $live = $this->live_settings();
        $slots = $this->build_live_slots($live);
        $this->admin_header('جدول البث المباشر', 'live');
        if (isset($_GET['saved'])) { echo '<div class="notice notice-success"><p>تم حفظ إعدادات جدول البث المرن.</p></div>'; }
        echo '<section class="gnvp-card"><h3>إعدادات جدول البث المباشر</h3><p>تقدر تحدد بداية ونهاية نافذة البث، وعدد ساعات التكرار، ومدة كل جلسة. التوقيت الافتراضي Africa/Cairo.</p>';
        echo '<form method="post" action="' . esc_url(admin_url('admin-post.php')) . '"><input type="hidden" name="action" value="gnvp_save_live">'; wp_nonce_field('gnvp_save_live');
        echo '<p><label><input type="checkbox" name="schedule_enabled" value="1" ' . checked(!empty($live['enabled']), true, false) . '> تفعيل الجدول (إعداد فقط، لا يبدأ بثًا فعليًا)</label></p>';
        echo '<div class="gnvp-platform-grid"><p><label>بداية الجدول<br><input type="time" name="start_time" value="' . esc_attr($live['start_time']) . '"></label></p><p><label>نهاية نافذة الجدول<br><input type="time" name="end_time" value="' . esc_attr($live['end_time']) . '"></label></p><p><label>التكرار كل (ساعة)<br><input type="number" min="1" max="24" name="repeat_hours" value="' . esc_attr($live['repeat_hours']) . '"></label></p><p><label>مدة كل جلسة (دقيقة)<br><input type="number" min="5" max="720" name="duration_minutes" value="' . esc_attr($live['duration_minutes']) . '"></label></p></div>';
        echo '<h4>المنصات المتاحة للبث</h4><label><input type="checkbox" name="platforms[]" value="facebook" ' . checked(in_array('facebook', (array) $live['platforms'], true), true, false) . '> Facebook Live</label><p class="description">YouTube وInstagram وTikTok وThreads لا تُعرض كخيارات تشغيل حتى يكتمل التحقق من دعم البث المباشر وموصل كل منصة.</p>';
        echo '<p><button class="button button-primary">حفظ إعدادات جدول البث</button></p></form>';
        echo '<h3>معاينة المواعيد المحسوبة</h3><p>عدد الجلسات الناتج عن الإعدادات الحالية: <strong>' . count($slots) . '</strong></p><table class="widefat striped"><thead><tr><th>الجلسة</th><th>البداية</th><th>النهاية</th><th>المدة</th></tr></thead><tbody>';
        foreach ($slots as $i => $slot) { echo '<tr><td>' . esc_html((string) ($i + 1)) . '</td><td>' . esc_html($slot['start']) . '</td><td>' . esc_html($slot['end']) . '</td><td>' . esc_html((string) $slot['duration']) . ' دقيقة</td></tr>'; }
        echo '</tbody></table><p><strong>الحالة:</strong> إعداد الجدول فقط — البث الفعلي متوقف.</p></section>';
        echo '<section class="gnvp-card" style="margin-top:16px"><h3>متطلبات تشغيل البث الآلي</h3><ol><li>صفحة Facebook بصلاحيات Live المناسبة وتوكن صالح.</li><li>FFmpeg مثبت مع دعم RTMPS.</li><li>عامل تشغيل دائم ومراقبة اتصال؛ لا يكفي طلب PHP عادي لمدة ساعة.</li><li>إنشاء جلسة Live API لكل موعد وإنهاؤها بعد المدة المحددة.</li></ol><p class="gnvp-warning">تغيير الجدول لا يشغّل بثًا حقيقيًا. التشغيل سيظل مغلقًا حتى يكتمل عامل البث والربط والاختبارات، ثم موافقتك الصريحة.</p></section></div>';
    }

    public function render_dashboard() {
        if (!current_user_can('manage_options')) { return; }
        $data = $this->get_gold_data();
        $settings = $this->settings();
        $snapshot = get_option(GNVP_SNAPSHOT_OPTION, array());
        $videos = get_option(GNVP_RENDER_OPTION, array());
        $last_error = get_option('gnvp_last_refresh_error', array());
        $render_error = get_option('gnvp_render_error', '');
        $preferred_order = array('24K', '22K', '21K', '18K', '14K', '12K');
        ?>
        <div class="wrap gnvp-wrap">
            <h1>AlTaqrer Gold Video Publisher <span class="gnvp-version">v<?php echo esc_html(GNVP_VERSION); ?></span></h1><h2 class="nav-tab-wrapper"><a class="nav-tab nav-tab-active" href="<?php echo esc_url(admin_url('admin.php?page=' . self::MENU_SLUG)); ?>">لوحة التحكم</a><a class="nav-tab" href="<?php echo esc_url($this->admin_url_for('library')); ?>">مكتبة الفيديوهات</a><a class="nav-tab" href="<?php echo esc_url($this->admin_url_for('publishing')); ?>">النشر والجدولة</a><a class="nav-tab" href="<?php echo esc_url($this->admin_url_for('connections')); ?>">ربط المنصات</a><a class="nav-tab" href="<?php echo esc_url($this->admin_url_for('live')); ?>">البث المباشر</a></h2>
            <p class="gnvp-lead">إنتاج فيديوهات لسوق مصر بالعربية، والسوق العالمي بـ14 لغة إضافية مع تسعير الأونصة بالدولار.</p>
            <?php if (isset($_GET['saved'])) : ?><div class="notice notice-success is-dismissible"><p>تم حفظ إعدادات الإنتاج.</p></div><?php endif; ?>
            <?php if (isset($_GET['refresh']) && $_GET['refresh'] === 'refreshed') : ?><div class="notice notice-success is-dismissible"><p>تم تحديث بيانات السوق المصري والأونصة العالمية.</p></div><?php endif; ?>
            <?php if (isset($_GET['refresh']) && $_GET['refresh'] === 'error') : ?><div class="notice notice-error"><p>تعذر تحديث البيانات. راجع حالة مصدر الأسعار.</p></div><?php endif; ?>
            <?php if (isset($_GET['render']) && $_GET['render'] === 'done') : ?><div class="notice notice-success is-dismissible"><p>اكتملت عملية إنتاج الفيديوهات بنجاح.</p></div><?php endif; ?>
            <?php if (isset($_GET['render']) && $_GET['render'] === 'error') : ?><div class="notice notice-error"><p>لم تكتمل كل الفيديوهات. راجع تفاصيل أخطاء FFmpeg أدناه.</p></div><?php endif; ?>

            <div class="gnvp-status <?php echo $data['ok'] ? 'is-ok' : 'is-warning'; ?>">
                <strong><?php echo $data['ok'] ? 'اتصال مصدر الأسعار ناجح' : 'مصدر الأسعار يحتاج مراجعة'; ?></strong>
                <p><?php echo esc_html($data['message']); ?></p>
            </div>

            <div class="gnvp-grid">
                <section class="gnvp-card gnvp-data-card">
                    <h2>مصر — أسعار الجرام بالجنيه المصري</h2>
                    <?php if ($data['ok']) : ?><div class="gnvp-prices">
                        <?php foreach ($preferred_order as $key) : if (!isset($data['prices'][$key])) { continue; } $item = $data['prices'][$key]; ?>
                            <div class="gnvp-price-row"><span><?php echo esc_html($item['carat']); ?></span><strong><?php echo esc_html(number_format_i18n($item['price_egp'], 2)); ?> <small>EGP</small></strong></div>
                        <?php endforeach; ?>
                    </div><p class="gnvp-meta">تاريخ بيانات الذهب: <?php echo esc_html($data['gold_date'] ?: 'غير متاح'); ?></p>
                    <h3>Global Gold Ounce</h3><p class="gnvp-global-price"><strong><?php echo esc_html(number_format_i18n($data['global_ounce_usd'], 2)); ?> USD</strong> / troy ounce</p>
                    <?php $global_gram_prices = $this->global_karat_prices($data['global_ounce_usd']); ?><h3>Global Gold — USD per Gram</h3><div class="gnvp-prices"><?php foreach ($global_gram_prices as $karat => $gram_price) : ?><div class="gnvp-price-row"><span><?php echo esc_html($karat . 'K'); ?></span><strong><?php echo esc_html(number_format_i18n($gram_price, 2)); ?> <small>USD / g</small></strong></div><?php endforeach; ?></div><p class="gnvp-meta">تحديث الأونصة: <?php echo esc_html($data['ounce_updated_at'] ?: $data['gold_date']); ?></p>
                    <?php else : ?><p>لن يتم تجهيز بيانات إنتاج بأسعار غير مؤكدة.</p><?php endif; ?>
                    <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
                        <input type="hidden" name="action" value="gnvp_refresh_now"><?php wp_nonce_field('gnvp_refresh_now'); ?>
                        <button class="button button-primary" type="submit">تحديث الأسعار الآن</button>
                    </form>
                </section>

                <section class="gnvp-card">
                    <h2>إعدادات تجربة الإنتاج</h2>
                    <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
                        <input type="hidden" name="action" value="gnvp_save_settings"><?php wp_nonce_field('gnvp_save_settings'); ?>
                        <p><strong>السوق العربي</strong><br><span class="gnvp-fixed-setting">مصر — EGP</span></p>
                        <p><strong>السوق الإنجليزي</strong><br><span class="gnvp-fixed-setting">Global — USD / Troy Ounce (all non-Arabic languages)</span></p>
                        <p><strong>اللغات</strong></p>
                        <?php foreach ($this->supported_languages() as $code => $label) : ?>
                            <label class="gnvp-check"><input type="checkbox" name="languages[]" value="<?php echo esc_attr($code); ?>" <?php checked(in_array($code, $settings['languages'], true)); ?>> <?php echo esc_html($label); ?><?php if ($code !== 'ar') : ?> — Global / USD<?php endif; ?></label>
                        <?php endforeach; ?>
                        <p><strong>مقاسات الفيديو</strong></p>
                        <label class="gnvp-check"><input type="checkbox" name="formats[]" value="vertical" <?php checked(in_array('vertical', $settings['formats'], true)); ?>> رأسي 9:16 — Reels / Shorts</label>
                        <label class="gnvp-check"><input type="checkbox" name="formats[]" value="horizontal" <?php checked(in_array('horizontal', $settings['formats'], true)); ?>> عريض 16:9 — YouTube / Facebook</label>
                        <p><label class="gnvp-check"><input type="checkbox" name="auto_refresh" value="1" <?php checked(!empty($settings['auto_refresh'])); ?>> تحديث تلقائي للأسعار كل ساعة</label></p>
                        <p><label class="gnvp-check"><input type="checkbox" name="auto_render" value="1" <?php checked(!empty($settings['auto_render'])); ?>> إنتاج الفيديوهات تلقائيًا عند تحديث الأسعار (يحتاج FFmpeg على السيرفر)</label></p>
                        <p><button class="button button-primary" type="submit">حفظ إعدادات التجربة</button></p>
                    </form>
                </section>

                <section class="gnvp-card gnvp-wide">
                    <h2>إنتاج الفيديوهات</h2>
                    <p>المطلوب: <?php echo isset($snapshot['production_jobs']) ? count($snapshot['production_jobs']) : count($settings['languages']) * count($settings['formats']); ?> ملفات MP4 في الدورة.</p>
                    <p><button id="gnvp-render-button" class="button button-primary" type="button" <?php disabled(!$data['ok']); ?>>إنشاء ملفات MP4 الآن</button></p>
                    <p id="gnvp-render-status" class="gnvp-meta" role="status" aria-live="polite">سيتم إنشاء الفيديوهات على دفعات دون إعادة تحميل الصفحة.</p>
                    <?php if ($videos) : ?><div class="gnvp-video-list"><h3>الفيديوهات المنشأة</h3>
                        <?php foreach ($videos as $video) : ?>
                            <div class="gnvp-video-item"><strong><?php echo esc_html($video['id']); ?></strong> — <?php echo esc_html($video['aspect_ratio']); ?> — <?php echo esc_html(size_format($video['bytes'])); ?>
                                <?php if (empty($video['file_deleted'])) : ?><a href="<?php echo esc_url($video['url']); ?>" target="_blank" rel="noopener">فتح MP4</a><?php else : ?><span class="gnvp-muted">تم حذف MP4 بعد النشر/انتهاء الاحتفاظ</span><?php endif; ?><br><small>آخر تحديث للبيانات: <?php echo esc_html($video['data_updated_at'] ?? 'غير مسجل'); ?> — إنشاء الملف: <?php echo esc_html($video['created_at'] ?? 'غير مسجل'); ?></small>
                            </div>
                        <?php endforeach; ?>
                    </div><?php endif; ?>
                    <?php if ($render_error) : ?><p class="gnvp-error"><strong>أخطاء الإنتاج:</strong><br><?php echo nl2br(esc_html($render_error)); ?></p><?php endif; ?>
                    <p class="gnvp-meta">الصوت المنطوق غير مفعّل في هذا الإصدار؛ ملفات MP4 الحالية تحتوي مسارًا صوتيًا صامتًا متوافقًا مع مشغلات الفيديو. سنضيف مزود صوت عربي وإنجليزي بعد اختيار وربط خدمة TTS.</p>
                </section>

                <section class="gnvp-card gnvp-wide">
                    <h2>جدول Facebook Live المعتمد</h2>
                    <p><strong>6 جلسات يوميًا، كل 4 ساعات — توقيت القاهرة — مدة كل جلسة 60 دقيقة.</strong></p>
                    <p>المواعيد: 08:00–09:00، 12:00–13:00، 16:00–17:00، 20:00–21:00، 00:00–01:00، 04:00–05:00.</p>
                    <p class="gnvp-meta">طريقة التشغيل المخططة: Facebook Live API + RTMPS + FFmpeg. الجدول محفوظ كمواصفة، لكنه غير مفعّل حتى ربط صفحة Facebook والتحقق من صلاحية البث. لا يتم بدء بث تلقائي دون اتصال وموافقة.</p>
                </section>
                <section class="gnvp-card gnvp-wide">
                    <h2>حالة المنصات</h2>
                    <div class="gnvp-channels"><span class="active">Facebook <small>الأولوية الأولى</small></span><span>Threads</span><span>YouTube</span><span>Instagram</span><span>TikTok</span><span>Live Streaming</span></div>
                    <p class="gnvp-meta">لا يوجد اتصال بحسابات التواصل أو نشر تلقائي بعد. الإضافة لا تعدّل Gold Manager أو Jetpack أو المقالات.</p>
                </section>
            </div>
            <?php if (!empty($last_error['message'])) : ?><p class="gnvp-error">آخر خطأ في تحديث الأسعار: <?php echo esc_html($last_error['message']); ?></p><?php endif; ?>
            <p class="gnvp-footnote">AlTaqrer Gold Video Publisher — الإصدار <?php echo esc_html(GNVP_VERSION); ?>. حالة التكاملات موضحة في أقسامها؛ إعداد الجدول لا يعني أن النشر أو البث يعمل تلقائيًا.</p>
        </div>
        <?php
    }
}

register_activation_hook(__FILE__, array('GoldNow_Video_Publisher', 'activate'));
register_deactivation_hook(__FILE__, array('GoldNow_Video_Publisher', 'deactivate'));
new GoldNow_Video_Publisher();