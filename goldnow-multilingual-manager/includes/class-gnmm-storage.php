<?php
if (!defined('ABSPATH')) { exit; }

final class GNMM_Storage {
    public static function tables() {
        global $wpdb;
        return array(
            'jobs' => $wpdb->prefix . 'gnmm_jobs',
            'assets' => $wpdb->prefix . 'gnmm_assets',
            'logs' => $wpdb->prefix . 'gnmm_logs',
        );
    }

    public static function install() {
        global $wpdb;
        require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        $tables = self::tables();
        $charset = $wpdb->get_charset_collate();

        $sql_jobs = "CREATE TABLE {$tables['jobs']} (
            id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
            job_type varchar(24) NOT NULL,
            country_code varchar(8) NOT NULL DEFAULT '',
            language varchar(8) NOT NULL DEFAULT '',
            job_date date NOT NULL,
            status varchar(20) NOT NULL DEFAULT 'queued',
            attempts smallint(5) unsigned NOT NULL DEFAULT 0,
            payload longtext NULL,
            message text NULL,
            created_at datetime NOT NULL,
            updated_at datetime NOT NULL,
            PRIMARY KEY  (id),
            KEY job_lookup (job_type,country_code,language,job_date),
            KEY status_created (status,created_at)
        ) $charset;";

        $sql_assets = "CREATE TABLE {$tables['assets']} (
            id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
            asset_type varchar(20) NOT NULL,
            country_code varchar(8) NOT NULL,
            language varchar(8) NOT NULL,
            current_url text NOT NULL,
            archive_url text NULL,
            related_post_id bigint(20) unsigned NOT NULL DEFAULT 0,
            generated_at datetime NOT NULL,
            source_updated_at datetime NULL,
            status varchar(20) NOT NULL DEFAULT 'ready',
            meta longtext NULL,
            PRIMARY KEY  (id),
            KEY asset_lookup (asset_type,country_code,language),
            KEY generated_at (generated_at)
        ) $charset;";

        $sql_logs = "CREATE TABLE {$tables['logs']} (
            id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
            level varchar(12) NOT NULL DEFAULT 'info',
            module varchar(24) NOT NULL,
            country_code varchar(8) NOT NULL DEFAULT '',
            language varchar(8) NOT NULL DEFAULT '',
            message text NOT NULL,
            context longtext NULL,
            created_at datetime NOT NULL,
            PRIMARY KEY  (id),
            KEY module_created (module,created_at),
            KEY country_language (country_code,language)
        ) $charset;";

        dbDelta($sql_jobs);
        dbDelta($sql_assets);
        dbDelta($sql_logs);
        update_option('gnmm_db_version', GNMM_VERSION, false);
    }

    public static function log($level, $module, $message, $country = '', $language = '', $context = array()) {
        global $wpdb;
        $tables = self::tables();
        $wpdb->insert($tables['logs'], array(
            'level' => sanitize_key($level),
            'module' => sanitize_key($module),
            'country_code' => sanitize_key($country),
            'language' => sanitize_key($language),
            'message' => sanitize_text_field($message),
            'context' => wp_json_encode($context),
            'created_at' => current_time('mysql', true),
        ), array('%s','%s','%s','%s','%s','%s','%s'));
    }

    public static function upsert_asset($data) {
        global $wpdb;
        $tables = self::tables();
        $where = array(
            'asset_type' => sanitize_key($data['asset_type']),
            'country_code' => sanitize_key($data['country_code']),
            'language' => sanitize_key($data['language']),
        );
        $id = $wpdb->get_var($wpdb->prepare(
            "SELECT id FROM {$tables['assets']} WHERE asset_type=%s AND country_code=%s AND language=%s ORDER BY id DESC LIMIT 1",
            $where['asset_type'], $where['country_code'], $where['language']
        ));
        $row = array_merge($where, array(
            'current_url' => esc_url_raw($data['current_url']),
            'archive_url' => isset($data['archive_url']) ? esc_url_raw($data['archive_url']) : '',
            'related_post_id' => isset($data['related_post_id']) ? absint($data['related_post_id']) : 0,
            'generated_at' => current_time('mysql', true),
            'source_updated_at' => !empty($data['source_updated_at']) ? gmdate('Y-m-d H:i:s', (int) $data['source_updated_at']) : null,
            'status' => isset($data['status']) ? sanitize_key($data['status']) : 'ready',
            'meta' => wp_json_encode(isset($data['meta']) ? $data['meta'] : array()),
        ));
        if ($id) {
            $wpdb->update($tables['assets'], $row, array('id' => (int) $id));
        } else {
            $wpdb->insert($tables['assets'], $row);
        }
        return $id ? (int) $id : (int) $wpdb->insert_id;
    }
}
