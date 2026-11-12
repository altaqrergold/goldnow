<?php
if (!defined('ABSPATH')) { exit; }

final class GNMM_Core {
    const OPTION = 'gnmm_settings';
    const DAILY_HOOK = 'gnmm_daily_run';

    public static function languages() {
        return array(
            'ar' => array('name' => 'العربية', 'rtl' => true),
            'en' => array('name' => 'English', 'rtl' => false),
            'fr' => array('name' => 'Français', 'rtl' => false),
            'de' => array('name' => 'Deutsch', 'rtl' => false),
            'es' => array('name' => 'Español', 'rtl' => false),
            'it' => array('name' => 'Italiano', 'rtl' => false),
            'pt' => array('name' => 'Português', 'rtl' => false),
            'ru' => array('name' => 'Русский', 'rtl' => false),
            'hi' => array('name' => 'हिन्दी', 'rtl' => false),
            'tr' => array('name' => 'Türkçe', 'rtl' => false),
        );
    }

    public static function defaults() {
        $languages = array();
        foreach (self::languages() as $code => $data) {
            $languages[$code] = array('enabled' => false, 'images' => false, 'articles' => false);
        }
        return array(
            'languages' => $languages,
            'countries' => array(),
            'image_position' => 'shortcode',
            'article_status' => 'draft',
            'article_category' => 0,
            'article_author' => get_current_user_id(),
            'article_comments' => 'closed',
            'article_pingbacks' => 'closed',
            'article_sections' => array('overview'),
            'daily_enabled' => false,
        );
    }

    public static function settings() {
        $saved = get_option(self::OPTION, array());
        $settings = wp_parse_args(is_array($saved) ? $saved : array(), self::defaults());
        $defaults = self::defaults();
        $settings['languages'] = isset($settings['languages']) && is_array($settings['languages']) ? $settings['languages'] : array();
        foreach (self::languages() as $code => $meta) {
            $row = isset($settings['languages'][$code]) && is_array($settings['languages'][$code]) ? $settings['languages'][$code] : array();
            $settings['languages'][$code] = wp_parse_args($row, $defaults['languages'][$code]);
        }
        $settings['countries'] = isset($settings['countries']) && is_array($settings['countries']) ? $settings['countries'] : array();
        foreach (GNMM_Gold_Manager::countries() as $code => $term) {
            $row = isset($settings['countries'][$code]) ? $settings['countries'][$code] : array();
            // Migrate the previous single country switch without enabling new countries.
            if (!is_array($row)) {
                $enabled = (bool) $row;
                $row = array('images' => $enabled, 'articles' => $enabled);
            }
            $settings['countries'][$code] = wp_parse_args($row, array('images' => false, 'articles' => false));
        }
        return $settings;
    }

    public static function init() {
        add_action('admin_menu', array('GNMM_Admin', 'menu'));
        add_action('admin_post_gnmm_save_settings', array('GNMM_Admin', 'save'));
        // The missing handler caused admin-post.php to return an empty page on manual runs.
        add_action('admin_post_gnmm_run_now', array('GNMM_Admin', 'run_now'));
        add_action(self::DAILY_HOOK, array(__CLASS__, 'run_daily'));
        if (!wp_next_scheduled(self::DAILY_HOOK)) {
            wp_schedule_event(time() + 600, 'daily', self::DAILY_HOOK);
        }
    }

    public static function activate() {
        GNMM_Storage::install();
        if (!get_option(self::OPTION, false)) {
            add_option(self::OPTION, self::defaults(), '', false);
        }
        if (!wp_next_scheduled(self::DAILY_HOOK)) {
            wp_schedule_event(time() + 600, 'daily', self::DAILY_HOOK);
        }
    }

    public static function deactivate() {
        wp_clear_scheduled_hook(self::DAILY_HOOK);
        wp_clear_scheduled_hook('gnmm_process_image_batch');
        wp_clear_scheduled_hook('gnmm_process_article_queue');
    }

    public static function run_daily() {
        $settings = self::settings();
        if (empty($settings['daily_enabled'])) { return; }
        do_action('gnmm_run_image_module', $settings);
        do_action('gnmm_run_article_module', $settings);
    }
}
