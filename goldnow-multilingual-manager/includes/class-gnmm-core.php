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
            'article_sections' => array('overview'),
            'daily_enabled' => false,
        );
    }

    public static function settings() {
        $saved = get_option(self::OPTION, array());
        return wp_parse_args(is_array($saved) ? $saved : array(), self::defaults());
    }

    public static function init() {
        add_action('admin_menu', array('GNMM_Admin', 'menu'));
        add_action('admin_post_gnmm_save_settings', array('GNMM_Admin', 'save'));
        add_action(self::DAILY_HOOK, array('GNMM_Core', 'run_daily'));
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
        wp_clear_scheduled_hook('gnmm_process_image_queue');
        wp_clear_scheduled_hook('gnmm_process_article_queue');
    }

    public static function run_daily() {
        $settings = self::settings();
        if (empty($settings['daily_enabled'])) { return; }
        do_action('gnmm_run_image_module', $settings);
        do_action('gnmm_run_article_module', $settings);
    }
}
