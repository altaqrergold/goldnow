<?php
/**
 * GoldNow SEO article shortcode.
 * Provides a reusable shortcode and a PHP helper for templates.
 */
if (!defined('ABSPATH')) {
    exit;
}

if (!function_exists('goldnow_seo_article_shortcode')) {
    function goldnow_seo_article_shortcode($atts = array(), $content = null) {
        if (!function_exists('goldnow_render_seo_article')) {
            return '';
        }

        $atts = shortcode_atts(array(
            'language' => function_exists('goldnow_current_language') ? goldnow_current_language() : 'ar',
            'section' => 'overview',
            'country' => '',
            'currency' => '',
            'date' => '',
            'country_slug' => '',
            'base_url' => '',
            'price_24k' => '',
            'price_22k' => '',
            'price_21k' => '',
            'price_18k' => '',
            'price_14k' => '',
            'ounce_usd' => '',
            'coin' => '',
            'usd_rate' => ''
        ), $atts, 'goldnow_seo_article');

        $decode = function($value) {
            return html_entity_decode((string) $value, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        };
        $language = sanitize_key($decode($atts['language']));
        $section = sanitize_key($decode($atts['section']));
        $prices = array();
        foreach (array('24k', '22k', '21k', '18k', '14k', 'ounce_usd', 'coin', 'usd_rate') as $key) {
            $value = $decode($atts[$key]);
            $prices[$key] = ($value !== '' && is_numeric($value)) ? (float) $value : null;
        }

        return goldnow_render_seo_article($language, $section, array(
            'country' => $decode($atts['country']),
            'currency' => $decode($atts['currency']),
            'date' => $decode($atts['date']),
            'country_slug' => $decode($atts['country_slug']),
            'base_url' => $decode($atts['base_url']),
            'prices' => $prices
        ));
    }
}

if (!function_exists('goldnow_render_seo_article_shortcode')) {
    function goldnow_render_seo_article_shortcode($language, $section, $data = array()) {
        if (!function_exists('do_shortcode')) {
            return '';
        }
        $data = is_array($data) ? $data : array();
        $prices = (isset($data['prices']) && is_array($data['prices'])) ? $data['prices'] : array();
        $atts = array(
            'language' => $language,
            'section' => $section,
            'country' => isset($data['country']) ? $data['country'] : '',
            'currency' => isset($data['currency']) ? $data['currency'] : '',
            'date' => isset($data['date']) ? $data['date'] : '',
            'country_slug' => isset($data['country_slug']) ? $data['country_slug'] : '',
            'base_url' => isset($data['base_url']) ? $data['base_url'] : ''
        );
        foreach (array('24k', '22k', '21k', '18k', '14k', 'ounce_usd', 'coin', 'usd_rate') as $key) {
            $atts['price_' . $key] = isset($prices[$key]) && is_numeric($prices[$key]) ? (string) $prices[$key] : '';
        }
        $shortcode = '[goldnow_seo_article';
        foreach ($atts as $key => $value) {
            $shortcode .= ' ' . $key . '="' . esc_attr((string) $value) . '"';
        }
        $shortcode .= ']';
        return do_shortcode($shortcode);
    }
}

if (function_exists('add_shortcode')) {
    add_shortcode('goldnow_seo_article', 'goldnow_seo_article_shortcode');
}
