<?php
if (!defined('ABSPATH')) { exit; }

/**
 * Localized article publishing module.
 * Uses the reviewed 10-language editorial dictionary and live Gold Manager
 * snapshot. It never calculates or changes the source gold prices.
 */
final class GNMM_Articles {
    public static function init() {
        add_action('gnmm_run_article_module', array(__CLASS__, 'scheduled_run'));
    }

    private static function localized_price_rows($term, $language, $snapshot) {
        $currency = GNMM_Gold_Manager::currency($term, GNMM_Gold_Manager::country_code($term));
        if (!$currency) { return new WP_Error('gnmm_article_currency', 'Country currency is missing.'); }
        $labels = array(
            'ar'=>array('karat'=>'العيار','price'=>'السعر','currency'=>'العملة'),
            'en'=>array('karat'=>'Karat','price'=>'Price','currency'=>'Currency'),
            'fr'=>array('karat'=>'Carat','price'=>'Prix','currency'=>'Devise'),
            'de'=>array('karat'=>'Karat','price'=>'Preis','currency'=>'Währung'),
            'es'=>array('karat'=>'Quilate','price'=>'Precio','currency'=>'Moneda'),
            'it'=>array('karat'=>'Carati','price'=>'Prezzo','currency'=>'Valuta'),
            'pt'=>array('karat'=>'Quilate','price'=>'Preço','currency'=>'Moeda'),
            'ru'=>array('karat'=>'Проба','price'=>'Цена','currency'=>'Валюта'),
            'hi'=>array('karat'=>'कैरेट','price'=>'कीमत','currency'=>'मुद्रा'),
            'tr'=>array('karat'=>'Ayar','price'=>'Fiyat','currency'=>'Para birimi'),
        );
        $words = isset($labels[$language]) ? $labels[$language] : $labels['en'];
        $rows = array();
        foreach ((array) $snapshot['prices_usd'] as $key => $usd) {
            $karat = preg_replace('/[^0-9]/', '', (string) $key);
            if (!in_array($karat, array('24','22','21','18','14'), true)) { continue; }
            $local = GNMM_Gold_Manager::local_price((float) $usd, $currency, $snapshot['currency_rates']);
            if ($local === null) { continue; }
            $rows[] = '<tr><th>' . esc_html($karat . 'K') . '</th><td>' . esc_html(number_format_i18n($local, 2)) . '</td><td>' . esc_html($currency) . '</td></tr>';
        }
        if (!$rows) { return new WP_Error('gnmm_article_prices', 'No localized karat prices could be produced from Gold Manager data.'); }
        $html = '<table class="gnmm-price-table"><thead><tr><th>' . esc_html($words['karat']) . '</th><th>' . esc_html($words['price']) . '</th><th>' . esc_html($words['currency']) . '</th></tr></thead><tbody>' . implode('', $rows) . '</tbody></table>';
        return $html;
    }

    public static function article_content($language, $section, $term, $snapshot) {
        if (!function_exists('goldnow_seo_article_data')) {
            return new WP_Error('gnmm_article_dictionary_missing', 'The localized GoldNow SEO article dictionary is not loaded.');
        }
        $article = goldnow_seo_article_data($language, $section);
        if (!is_array($article) || count($article) < 3) {
            return new WP_Error('gnmm_article_invalid', 'The localized article entry is incomplete.');
        }
        $country = GNMM_Gold_Manager::localized_country_name($term, $language);
        $title = trim((string) $article[0]) . ' - ' . $country;
        $intro = trim((string) $article[1]);
        $body = trim((string) $article[2]);
        if ($title === '' || $intro === '' || $body === '') {
            return new WP_Error('gnmm_article_empty', 'A localized article field is empty; no fallback translation will be used.');
        }
        $table = self::localized_price_rows($term, $language, $snapshot);
        if (is_wp_error($table)) { return $table; }
        $url = GNMM_Gold_Manager::country_url($term, $language);
        $content = '<p>' . esc_html($intro) . '</p><p>' . esc_html($body) . '</p>';
        $content .= $table;
        $content .= '<p><a href="' . esc_url($url) . '">' . esc_html($country) . '</a></p>';
        return array('title' => $title, 'content' => $content, 'country_url' => $url);
    }

    public static function scheduled_run($settings) {
        if (!is_array($settings) || !GNMM_Gold_Manager::ready()) { return; }
        $snapshot = GNMM_Gold_Manager::snapshot();
        if (is_wp_error($snapshot)) {
            GNMM_Storage::log('error', 'articles', $snapshot->get_error_message());
            return;
        }
        $countries = GNMM_Gold_Manager::countries();
        foreach (GNMM_Core::languages() as $language => $meta) {
            $config = isset($settings['languages'][$language]) ? $settings['languages'][$language] : array();
            if (empty($config['enabled']) || empty($config['articles'])) { continue; }
            foreach ($countries as $code => $term) {
                if (array_key_exists($code, $settings['countries']) && empty($settings['countries'][$code])) { continue; }
                $result = self::publish_daily_article($term, $language, $settings, $snapshot);
                if (is_wp_error($result)) {
                    GNMM_Storage::log('error', 'articles', $result->get_error_message(), $code, $language);
                }
            }
        }
    }

    public static function publish_daily_article($term, $language, $settings, $snapshot) {
        $code = GNMM_Gold_Manager::country_code($term);
        $section = 'overview';
        $date = wp_date('Y-m-d', time(), new DateTimeZone('UTC'));
        $key = '_gnmm_daily_article_key';
        $existing = get_posts(array(
            'post_type' => 'post',
            'post_status' => array('draft', 'publish', 'pending', 'future', 'private'),
            'posts_per_page' => 1,
            'fields' => 'ids',
            'meta_query' => array(array('key' => $key, 'value' => $date . '|' . $code . '|' . $language)),
        ));
        if ($existing) { return (int) $existing[0]; }

        $article = self::article_content($language, $section, $term, $snapshot);
        if (is_wp_error($article)) { return $article; }
        $status = isset($settings['article_status']) && $settings['article_status'] === 'publish' ? 'publish' : 'draft';
        $post_id = wp_insert_post(array(
            'post_type' => 'post',
            'post_status' => $status,
            'post_title' => $article['title'],
            'post_content' => $article['content'],
            'post_excerpt' => wp_strip_all_tags($article['content']),
        ), true);
        if (is_wp_error($post_id)) { return $post_id; }
        update_post_meta($post_id, $key, $date . '|' . $code . '|' . $language);
        update_post_meta($post_id, '_gnmm_country_code', $code);
        update_post_meta($post_id, '_gnmm_language', $language);
        update_post_meta($post_id, '_gnmm_country_url', $article['country_url']);
        update_post_meta($post_id, '_gnmm_source_updated_at', !empty($snapshot['source_updated_at']) ? (int) $snapshot['source_updated_at'] : 0);
        GNMM_Storage::log('success', 'articles', 'Created localized country article with current Gold Manager prices.', $code, $language, array('post_id' => $post_id, 'status' => $status));
        return (int) $post_id;
    }
}
GNMM_Articles::init();
