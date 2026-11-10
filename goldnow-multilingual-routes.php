<?php
/**
 * Template Name: GoldNow Multilingual Routes
 * Description: Starter foundation for the unified GoldNow multilingual country routes/template.
 * Version: 0.1.0
 *
 * IMPORTANT:
 * This is the initial routing scaffold only. The complete production template
 * must be merged from the verified Arabic, English, and French source templates
 * before it is used on the live site.
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Supported language codes and URL prefixes.
 *
 * Arabic uses the root URL; the other languages use /{language}/.
 */
if (!function_exists('goldnow_mlr_supported_languages')) {
    function goldnow_mlr_supported_languages() {
        return array(
            'ar' => '',
            'en' => 'en',
            'fr' => 'fr',
            'de' => 'de',
            'es' => 'es',
            'it' => 'it',
            'pt' => 'pt',
            'ru' => 'ru',
            'hi' => 'hi',
            'tr' => 'tr',
        );
    }
}

/**
 * Detect the current language from the first URL path segment.
 * Falls back to Arabic when no supported language prefix is present.
 */
if (!function_exists('goldnow_mlr_current_language')) {
    function goldnow_mlr_current_language() {
        $path = isset($_SERVER['REQUEST_URI'])
            ? (string) wp_parse_url(wp_unslash($_SERVER['REQUEST_URI']), PHP_URL_PATH)
            : '/';

        $segments = array_values(array_filter(explode('/', trim($path, '/'))));
        $first = isset($segments[0]) ? strtolower(sanitize_key($segments[0])) : '';

        $languages = goldnow_mlr_supported_languages();

        return isset($languages[$first]) && $first !== '' ? $first : 'ar';
    }
}

/**
 * Build a URL for a supported language while preserving the supplied path.
 *
 * Example:
 * goldnow_mlr_language_url('en', 'country/eg/24k/')
 */
if (!function_exists('goldnow_mlr_language_url')) {
    function goldnow_mlr_language_url($language, $path = '') {
        $languages = goldnow_mlr_supported_languages();
        $language = strtolower(sanitize_key((string) $language));

        if (!isset($languages[$language])) {
            $language = 'ar';
        }

        $path = trim((string) $path, '/');
        $prefix = $languages[$language];

        $url_path = '';
        if ($prefix !== '') {
            $url_path .= $prefix . '/';
        }
        if ($path !== '') {
            $url_path .= $path . '/';
        }

        return home_url('/' . ltrim($url_path, '/'));
    }
}

/**
 * Return the current request path without its language prefix.
 * This can be used when rendering language-switcher links.
 */
if (!function_exists('goldnow_mlr_current_path_without_language')) {
    function goldnow_mlr_current_path_without_language() {
        $path = isset($_SERVER['REQUEST_URI'])
            ? (string) wp_parse_url(wp_unslash($_SERVER['REQUEST_URI']), PHP_URL_PATH)
            : '/';

        $segments = array_values(array_filter(explode('/', trim($path, '/'))));
        $languages = goldnow_mlr_supported_languages();
        $first = isset($segments[0]) ? strtolower(sanitize_key($segments[0])) : '';

        if ($first !== '' && isset($languages[$first])) {
            array_shift($segments);
        }

        return implode('/', array_map('sanitize_title', $segments));
    }
}

/*
 * Integration checklist before production use:
 * - Merge the verified Arabic, English, and French template markup and logic.
 * - Preserve the Arabic calculations, shortcodes, data sources, and layout.
 * - Translate every visible static and dynamic label for all 10 languages.
 * - Verify country pages, all 10 tabs, canonical URLs, SEO metadata, and sitemaps.
 * - Test PHP syntax and every language route before activating on the live site.
 */
