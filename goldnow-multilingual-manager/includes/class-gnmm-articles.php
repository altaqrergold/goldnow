<?php
if (!defined('ABSPATH')) { exit; }

/**
 * Localized article publishing module.
 * Uses the site's existing reviewed SEO article dictionary when available;
 * it never invents translations by machine-translating another locale.
 */
final class GNMM_Articles {
    public static function init() {
        add_action('gnmm_run_article_module', array(__CLASS__, 'scheduled_run'));
    }

    public static function article_content($language, $section, $term) {
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
        $url = GNMM_Gold_Manager::country_url($term, $language);
        $content = '<p>' . esc_html($intro) . '</p><p>' . esc_html($body) . '</p>';
        $content .= '<p><a href="' . esc_url($url) . '">' . esc_html($country) . '</a></p>';
        return array('title' => $title, 'content' => $content, 'country_url' => $url);
    }

    public static function scheduled_run($settings) {
        if (!is_array($settings) || !GNMM_Gold_Manager::ready()) { return; }
        $countries = GNMM_Gold_Manager::countries();
        $languages = GNMM_Core::languages();
        foreach ($languages as $language => $meta) {
            $config = isset($settings['languages'][$language]) ? $settings['languages'][$language] : array();
            if (empty($config['enabled']) || empty($config['articles'])) { continue; }
            foreach ($countries as $code => $term) {
                if (array_key_exists($code, $settings['countries']) && empty($settings['countries'][$code])) { continue; }
                $result = self::publish_daily_article($term, $language, $settings);
                if (is_wp_error($result)) {
                    GNMM_Storage::log('error', 'articles', $result->get_error_message(), $code, $language);
                }
            }
        }
    }

    public static function publish_daily_article($term, $language, $settings) {
        $code = GNMM_Gold_Manager::country_code($term);
        $section = 'overview';
        $date = gmdate('Y-m-d');
        $key = '_gnmm_daily_article_key';
        $existing = get_posts(array(
            'post_type' => 'post',
            'post_status' => array('draft', 'publish', 'pending', 'future', 'private'),
            'posts_per_page' => 1,
            'fields' => 'ids',
            'meta_query' => array(array('key' => $key, 'value' => $date . '|' . $code . '|' . $language)),
        ));
        if ($existing) { return (int) $existing[0]; }

        $article = self::article_content($language, $section, $term);
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
        GNMM_Storage::log('success', 'articles', 'Created localized country article.', $code, $language, array('post_id' => $post_id, 'status' => $status));
        return (int) $post_id;
    }
}
GNMM_Articles::init();
