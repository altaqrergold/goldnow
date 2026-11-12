<?php
if (!defined('ABSPATH')) { exit; }

/**
 * Image module entry point. The renderer is intentionally isolated from the
 * legacy GNAP_Image class until its multilingual contract has been verified.
 */
final class GNMM_Images {
    public static function init() {
        add_action('gnmm_run_image_module', array(__CLASS__, 'scheduled_run'));
        add_shortcode('goldnow_multilingual_image', array(__CLASS__, 'shortcode'));
    }

    public static function scheduled_run($settings) {
        if (!is_array($settings) || !GNMM_Gold_Manager::ready()) { return; }
        $snapshot = GNMM_Gold_Manager::snapshot();
        if (is_wp_error($snapshot)) {
            GNMM_Storage::log('error', 'images', $snapshot->get_error_message());
            return;
        }
        // The job planner is implemented separately from the renderer so a
        // failed image render cannot stop article jobs or alter old assets.
        do_action('gnmm_plan_image_jobs', $settings, $snapshot);
    }

    public static function shortcode($atts = array()) {
        $atts = shortcode_atts(array('lang' => '', 'country' => ''), $atts, 'goldnow_multilingual_image');
        $language = sanitize_key($atts['lang'] ? $atts['lang'] : (function_exists('goldnow_current_language') ? goldnow_current_language() : 'ar'));
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
        $table = GNMM_Storage::tables();
        global $wpdb;
        $asset = $wpdb->get_row($wpdb->prepare(
            "SELECT current_url FROM {$table['assets']} WHERE asset_type='image' AND country_code=%s AND language=%s ORDER BY id DESC LIMIT 1",
            $code, $language
        ));
        if (!$asset || empty($asset->current_url)) { return ''; }
        $name = GNMM_Gold_Manager::localized_country_name($term, $language);
        $url = GNMM_Gold_Manager::country_url($term, $language);
        $alt = sprintf('%s - %s', $name, $language);
        return '<figure class="gnmm-country-image"><a href="' . esc_url($url) . '"><img src="' . esc_url($asset->current_url) . '" alt="' . esc_attr($alt) . '" loading="lazy" decoding="async" style="display:block;max-width:100%;height:auto;margin:24px auto"></a></figure>';
    }
}
GNMM_Images::init();
