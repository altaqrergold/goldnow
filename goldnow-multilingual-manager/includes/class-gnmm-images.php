<?php
if (!defined('ABSPATH')) { exit; }

/**
 * Multilingual country image renderer.
 * Creates self-contained SVGs from Gold Manager's read-only price snapshot.
 * Current files are replaced atomically; dated archives are never overwritten.
 */
final class GNMM_Images {
    const BATCH_HOOK = 'gnmm_process_image_batch';
    const BATCH_SIZE = 5;

    public static function init() {
        add_action('gnmm_run_image_module', array(__CLASS__, 'scheduled_run'));
        add_action(self::BATCH_HOOK, array(__CLASS__, 'process_batch'));
        add_shortcode('goldnow_multilingual_image', array(__CLASS__, 'shortcode'));
        add_action('template_redirect', array(__CLASS__, 'start_page_buffer'), 0);
        add_action('wp_footer', array(__CLASS__, 'footer_fallback'), 20);
    }

    public static function scheduled_run($settings) {
        if (!is_array($settings) || !GNMM_Gold_Manager::ready()) { return; }
        $snapshot = GNMM_Gold_Manager::snapshot();
        if (is_wp_error($snapshot)) {
            GNMM_Storage::log('error', 'images', $snapshot->get_error_message());
            return;
        }
        $queue = array();
        foreach (GNMM_Core::languages() as $language => $meta) {
            $config = isset($settings['languages'][$language]) ? $settings['languages'][$language] : array();
            if (empty($config['enabled']) || empty($config['images'])) { continue; }
            foreach (GNMM_Gold_Manager::countries() as $code => $term) {
                $country_config = isset($settings['countries'][$code]) && is_array($settings['countries'][$code]) ? $settings['countries'][$code] : array();
                if (empty($country_config['images'])) { continue; }
                $queue[] = array('country_code' => $code, 'language' => $language);
            }
        }
        if (!$queue) { return; }
        update_option('gnmm_image_queue', array('items' => $queue, 'snapshot' => $snapshot, 'created' => time()), false);
        wp_clear_scheduled_hook(self::BATCH_HOOK);
        wp_schedule_single_event(time() + 5, self::BATCH_HOOK);
        GNMM_Storage::log('info', 'images', 'Queued ' . count($queue) . ' localized country images.');
    }

    public static function process_batch() {
        $queue = get_option('gnmm_image_queue', array());
        if (empty($queue['items']) || !is_array($queue['items']) || empty($queue['snapshot'])) { return; }
        $items = array_splice($queue['items'], 0, self::BATCH_SIZE);
        $countries = GNMM_Gold_Manager::countries();
        foreach ($items as $item) {
            $code = sanitize_key($item['country_code']);
            $language = sanitize_key($item['language']);
            if (empty($countries[$code]) || !isset(GNMM_Core::languages()[$language])) { continue; }
            $settings = GNMM_Core::settings();
            if (empty($settings['languages'][$language]['enabled']) || empty($settings['languages'][$language]['images'])) { continue; }
            $country_config = isset($settings['countries'][$code]) && is_array($settings['countries'][$code]) ? $settings['countries'][$code] : array();
            if (empty($country_config['images'])) { continue; }
            $result = self::generate($countries[$code], $language, $queue['snapshot']);
            if (is_wp_error($result)) {
                GNMM_Storage::log('error', 'images', $result->get_error_message(), $code, $language);
            } else {
                GNMM_Storage::log('success', 'images', 'Generated localized SVG image.', $code, $language, $result);
            }
        }
        if ($queue['items']) {
            update_option('gnmm_image_queue', $queue, false);
            wp_schedule_single_event(time() + 30, self::BATCH_HOOK);
        } else {
            delete_option('gnmm_image_queue');
        }
    }

    private static function dictionary($language) {
        $all = array(
            'ar' => array('title'=>'أسعار الذهب اليوم في','subtitle'=>'أسعار جرام الذهب حسب العيار','karat'=>'العيار','price'=>'السعر','currency'=>'العملة','updated'=>'آخر تحديث','ounce'=>'الأونصة العالمية بالدولار','brand'=>'GoldNow'),
            'en' => array('title'=>'Gold Prices Today in','subtitle'=>'Gold price per gram by karat','karat'=>'Karat','price'=>'Price','currency'=>'Currency','updated'=>'Last updated','ounce'=>'Global gold ounce (USD)','brand'=>'GoldNow'),
            'fr' => array('title'=>'Prix de l’or aujourd’hui en','subtitle'=>'Prix du gramme selon le titrage','karat'=>'Carat','price'=>'Prix','currency'=>'Devise','updated'=>'Dernière mise à jour','ounce'=>'Once mondiale (USD)','brand'=>'GoldNow'),
            'de' => array('title'=>'Goldpreise heute in','subtitle'=>'Goldpreis pro Gramm nach Karat','karat'=>'Karat','price'=>'Preis','currency'=>'Währung','updated'=>'Zuletzt aktualisiert','ounce'=>'Weltweiter Goldpreis je Unze (USD)','brand'=>'GoldNow'),
            'es' => array('title'=>'Precio del oro hoy en','subtitle'=>'Precio del oro por gramo y quilate','karat'=>'Quilate','price'=>'Precio','currency'=>'Moneda','updated'=>'Última actualización','ounce'=>'Onza mundial de oro (USD)','brand'=>'GoldNow'),
            'it' => array('title'=>'Prezzo dell’oro oggi in','subtitle'=>'Prezzo dell’oro al grammo per caratura','karat'=>'Carati','price'=>'Prezzo','currency'=>'Valuta','updated'=>'Ultimo aggiornamento','ounce'=>'Oncia mondiale (USD)','brand'=>'GoldNow'),
            'pt' => array('title'=>'Preço do ouro hoje em','subtitle'=>'Preço do ouro por grama e quilate','karat'=>'Quilate','price'=>'Preço','currency'=>'Moeda','updated'=>'Última atualização','ounce'=>'Onça mundial de ouro (USD)','brand'=>'GoldNow'),
            'ru' => array('title'=>'Цена золота сегодня в','subtitle'=>'Цена грамма золота по пробе','karat'=>'Проба','price'=>'Цена','currency'=>'Валюта','updated'=>'Обновлено','ounce'=>'Мировая цена унции (USD)','brand'=>'GoldNow'),
            'hi' => array('title'=>'आज सोने की कीमत','subtitle'=>'कैरेट के अनुसार प्रति ग्राम सोने का भाव','karat'=>'कैरेट','price'=>'कीमत','currency'=>'मुद्रा','updated'=>'अंतिम अपडेट','ounce'=>'वैश्विक सोने का औंस (USD)','brand'=>'GoldNow'),
            'tr' => array('title'=>'Bugün altın fiyatları:','subtitle'=>'Ayarına göre gram altın fiyatı','karat'=>'Ayar','price'=>'Fiyat','currency'=>'Para birimi','updated'=>'Son güncelleme','ounce'=>'Küresel altın onsu (USD)','brand'=>'GoldNow'),
        );
        return isset($all[$language]) ? $all[$language] : $all['en'];
    }

    private static function normalized_prices($snapshot) {
        $out = array();
        foreach ((array) $snapshot['prices_usd'] as $key => $value) {
            $digits = preg_replace('/[^0-9]/', '', (string) $key);
            if (in_array($digits, array('24','22','21','18','14'), true) && (float) $value > 0) {
                $out[$digits] = (float) $value;
            }
        }
        return $out;
    }

    public static function generate($term, $language, $snapshot) {
        $code = GNMM_Gold_Manager::country_code($term);
        $currency = GNMM_Gold_Manager::currency($term, $code);
        if (!$code || !$currency) {
            return new WP_Error('gnmm_image_country_data', 'Country code or currency is missing in Gold Manager country data.');
        }
        $prices = self::normalized_prices($snapshot);
        if (!$prices) {
            return new WP_Error('gnmm_image_prices', 'No supported karat prices were found in the Gold Manager snapshot.');
        }
        $local = array();
        foreach ($prices as $karat => $usd) {
            $converted = GNMM_Gold_Manager::local_price($usd, $currency, $snapshot['currency_rates']);
            if ($converted !== null) { $local[$karat] = $converted; }
        }
        if (!$local) { return new WP_Error('gnmm_image_currency', 'No exchange rate is available for ' . $currency . '.'); }

        $upload = wp_upload_dir();
        if (!empty($upload['error'])) { return new WP_Error('gnmm_upload_dir', $upload['error']); }
        $base_dir = trailingslashit($upload['basedir']) . 'goldnow-multilingual-manager/';
        $base_url = trailingslashit($upload['baseurl']) . 'goldnow-multilingual-manager/';
        $current_dir = $base_dir . $language . '/';
        $archive_dir = $base_dir . 'archive/' . $language . '/' . $code . '/';
        foreach (array($current_dir, $archive_dir) as $dir) {
            if (!wp_mkdir_p($dir)) { return new WP_Error('gnmm_image_directory', 'Could not create image directory: ' . $dir); }
        }

        $name = GNMM_Gold_Manager::localized_country_name($term, $language);
        $labels = self::dictionary($language);
        $svg = self::build_svg($name, $currency, $local, $prices, $labels, $language, $snapshot);
        $current_path = $current_dir . $code . '.svg';
        $temp_path = $current_path . '.tmp-' . wp_generate_password(6, false, false);
        if (file_put_contents($temp_path, $svg, LOCK_EX) === false) {
            return new WP_Error('gnmm_image_write', 'Could not write generated image file.');
        }
        if (file_exists($current_path)) {
            $archive_path = $archive_dir . $code . '-' . gmdate('Ymd-His') . '-' . wp_generate_password(4, false, false) . '.svg';
            if (!@copy($current_path, $archive_path)) {
                @unlink($temp_path);
                return new WP_Error('gnmm_image_archive', 'Could not archive the previous image; current image was not replaced.');
            }
        } else {
            $archive_path = '';
        }
        if (!@rename($temp_path, $current_path)) {
            @unlink($temp_path);
            return new WP_Error('gnmm_image_replace', 'Could not atomically replace current image.');
        }
        $url = $base_url . rawurlencode($language) . '/' . rawurlencode($code) . '.svg';
        $archive_url = $archive_path ? $base_url . 'archive/' . rawurlencode($language) . '/' . rawurlencode($code) . '/' . rawurlencode(basename($archive_path)) : '';
        clearstatcache(true, $current_path);
        $file_mtime = filemtime($current_path);
        $file_size = filesize($current_path);
        if ($file_mtime === false || $file_size === false || $file_size <= 0) {
            return new WP_Error('gnmm_image_verify', 'The generated SVG could not be verified after replacement.');
        }
        GNMM_Storage::upsert_asset(array(
            'asset_type' => 'image', 'country_code' => $code, 'language' => $language,
            'current_url' => $url, 'archive_url' => $archive_url,
            'source_updated_at' => $snapshot['source_updated_at'],
            'meta' => array('currency'=>$currency,'prices'=>$local,'file_mtime'=>$file_mtime,'file_size'=>$file_size)
        ));
        self::purge_country_page_cache($term, $language);
        $version = $file_mtime;
        return array('url'=>add_query_arg('gnmm_v', $version, $url), 'canonical_url'=>$url, 'archive_url'=>$archive_url, 'currency'=>$currency, 'version'=>$version);
    }

    private static function build_svg($country, $currency, $local, $usd, $labels, $language, $snapshot) {
        $rtl = $language === 'ar' || $language === 'hi';
        $direction = $rtl ? 'rtl' : 'ltr';
        $anchor = $rtl ? 'end' : 'start';
        $esc = static function($value) { return htmlspecialchars((string) $value, ENT_QUOTES | ENT_XML1, 'UTF-8'); };
        $title = $labels['title'] . ' ' . $country;
        $rows = '';
        $y = 430;
        foreach (array('24','22','21','18','14') as $karat) {
            if (!isset($local[$karat])) { continue; }
            $price = number_format_i18n($local[$karat], 2) . ' ' . $currency;
            $rows .= '<rect x="70" y="' . ($y-48) . '" width="940" height="66" rx="15" fill="#ffffff" opacity=".96"/>';
            $rows .= '<text x="965" y="' . $y . '" text-anchor="end" font-size="27" fill="#6c5521">' . $esc($karat . 'K') . '</text>';
            $rows .= '<text x="135" y="' . $y . '" text-anchor="start" font-size="27" fill="#242424">' . $esc($price) . '</text>';
            $y += 82;
        }
        $ounce = isset($usd['24']) ? number_format_i18n($usd['24'] * 31.1034768, 2) . ' USD' : '—';
        $stamp = !empty($snapshot['source_updated_at']) ? wp_date('Y-m-d H:i', (int) $snapshot['source_updated_at'], new DateTimeZone('UTC')) : gmdate('Y-m-d H:i');
        $svg = '<?xml version="1.0" encoding="UTF-8"?>';
        $svg .= '<svg xmlns="http://www.w3.org/2000/svg" width="1080" height="900" viewBox="0 0 1080 900" role="img" aria-label="' . $esc($title) . '">';
        $svg .= '<defs><linearGradient id="bg" x1="0" y1="0" x2="1" y2="1"><stop offset="0" stop-color="#f7e9bd"/><stop offset="1" stop-color="#d8ae50"/></linearGradient></defs>';
        $svg .= '<rect width="1080" height="900" rx="30" fill="url(#bg)"/><rect x="35" y="35" width="1010" height="830" rx="24" fill="none" stroke="#9b772b" stroke-width="3"/>';
        $svg .= '<text x="540" y="120" text-anchor="middle" font-size="30" font-weight="700" fill="#654b16">' . $esc($labels['brand']) . '</text>';
        $svg .= '<text x="540" y="190" text-anchor="middle" font-size="39" font-weight="700" fill="#2b2414">' . $esc($title) . '</text>';
        $svg .= '<text x="540" y="245" text-anchor="middle" font-size="23" fill="#51452c">' . $esc($labels['subtitle']) . '</text>';
        $svg .= '<text x="965" y="330" text-anchor="end" font-size="21" font-weight="700" fill="#4e3a12">' . $esc($labels['karat']) . '</text>';
        $svg .= '<text x="135" y="330" text-anchor="start" font-size="21" font-weight="700" fill="#4e3a12">' . $esc($labels['price']) . '</text>';
        $svg .= $rows;
        $svg .= '<rect x="70" y="790" width="940" height="48" rx="12" fill="#7d5b19"/>';
        $svg .= '<text x="540" y="822" text-anchor="middle" font-size="21" font-weight="700" fill="#fff">' . $esc($labels['ounce'] . ': ' . $ounce) . '</text>';
        $svg .= '<text x="540" y="870" text-anchor="middle" font-size="15" fill="#5b481f">' . $esc($labels['updated'] . ': ' . $stamp) . '</text>';
        $svg .= '</svg>';
        return $svg;
    }

    /**
     * Invalidate common page caches after the image URL's current content changes.
     * Cache integrations are optional; the image remains usable without them.
     */
    private static function purge_country_page_cache($term, $language) {
        clean_term_cache((int) $term->term_id, 'countries');
        $page_url = GNMM_Gold_Manager::country_url($term, $language);
        if (!$page_url) { return; }

        if (function_exists('rocket_clean_files')) {
            rocket_clean_files(array($page_url));
        }
        if (function_exists('w3tc_flush_url')) {
            w3tc_flush_url($page_url);
        }
        if (has_action('litespeed_purge_url')) {
            do_action('litespeed_purge_url', $page_url);
        }
        do_action('gnmm_image_updated', $page_url, $term, $language);
    }

    public static function shortcode($atts = array()) {
        $atts = shortcode_atts(array('lang' => '', 'country' => ''), $atts, 'goldnow_multilingual_image');
        $language = sanitize_key($atts['lang'] ? $atts['lang'] : (function_exists('altaqrer_ml_current_language') ? altaqrer_ml_current_language() : 'ar'));
        $term = null;
        if ($atts['country'] !== '') {
            $code = sanitize_key($atts['country']);
            $countries = GNMM_Gold_Manager::countries();
            $term = isset($countries[$code]) ? $countries[$code] : null;
        } elseif (is_tax('countries')) {
            $term = get_queried_object();
        }
        if (!$term || !isset(GNMM_Core::languages()[$language])) { return ''; }
        $code = GNMM_Gold_Manager::country_code($term);
        $settings = GNMM_Core::settings();
        if (empty($settings['languages'][$language]['enabled']) || empty($settings['languages'][$language]['images'])) { return ''; }
        $country_config = isset($settings['countries'][$code]) && is_array($settings['countries'][$code]) ? $settings['countries'][$code] : array();
        if (empty($country_config['images'])) { return ''; }
        global $wpdb;
        $tables = GNMM_Storage::tables();
        $asset = $wpdb->get_row($wpdb->prepare(
            "SELECT current_url, generated_at FROM {$tables['assets']} WHERE asset_type='image' AND country_code=%s AND language=%s ORDER BY id DESC LIMIT 1",
            $code, $language
        ));
        if (!$asset || empty($asset->current_url)) { return ''; }
        $version = !empty($asset->generated_at) ? strtotime($asset->generated_at . ' UTC') : 0;
        if (!$version) { $version = time(); }
        // The SVG filename stays stable; a generation version prevents browsers/CDNs
        // from reusing a previously cached response for the old bytes.
        $image_url = add_query_arg('gnmm_v', $version, $asset->current_url);
        $name = GNMM_Gold_Manager::localized_country_name($term, $language);
        $url = GNMM_Gold_Manager::country_url($term, $language);
        $alt = $language === 'ar' ? 'أسعار الذهب اليوم في ' . $name : 'Gold prices today in ' . $name;
        do_action('gnmm_image_printed');
        return '<figure class="gnmm-country-image"><a href="' . esc_url($url) . '"><img src="' . esc_url($image_url) . '" alt="' . esc_attr($alt) . '" loading="lazy" decoding="async" style="display:block;max-width:100%;height:auto;margin:24px auto"></a></figure>';
    }

    public static function start_page_buffer() {
        $settings = GNMM_Core::settings();
        if (!is_tax('countries') || empty($settings['image_position']) || $settings['image_position'] !== 'shortcode') { return; }
        ob_start(array(__CLASS__, 'inject_before_tabs_content'));
    }

    public static function inject_before_tabs_content($html) {
        if (strpos($html, 'gold-tabs-content') === false || strpos($html, 'gnmm-country-image') !== false) { return $html; }
        $term = get_queried_object();
        if (!$term || !is_object($term)) { return $html; }
        $language = function_exists('altaqrer_ml_current_language') ? sanitize_key(altaqrer_ml_current_language()) : 'ar';
        $image = self::shortcode(array('lang'=>$language));
        if ($image === '') { return $html; }
        $position = strpos($html, 'gold-tabs-content');
        $start = strrpos(substr($html, 0, $position), '<');
        if ($start === false) { return $html; }
        return substr($html, 0, $start) . $image . substr($html, $start);
    }

    public static function footer_fallback() {
        $settings = GNMM_Core::settings();
        if (isset($settings['image_position']) && $settings['image_position'] !== 'footer') { return; }
        if (!is_tax('countries') || did_action('gnmm_image_printed')) { return; }
        $language = function_exists('altaqrer_ml_current_language') ? sanitize_key(altaqrer_ml_current_language()) : 'ar';
        $image = self::shortcode(array('lang'=>$language));
        if ($image !== '') { echo $image; }
    }
}
GNMM_Images::init();
