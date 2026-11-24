<?php
/**
 * Safe local MP4 retention for GoldNow Video Publisher.
 * Included by the main plugin after WordPress has loaded.
 */
if (!defined('ABSPATH')) { exit; }

final class GNVP_Media_Retention {
    const HOOK = 'gnvp_retention_sweep';
    const RETENTION_SECONDS = DAY_IN_SECONDS;
    const MEDIA_DIR = 'goldnow-videos';

    public static function boot() {
        add_filter('cron_schedules', array(__CLASS__, 'cron_schedules'));
        add_action(self::HOOK, array(__CLASS__, 'sweep'));
        if (!wp_next_scheduled(self::HOOK)) {
            wp_schedule_event(time() + 300, 'gnvp_every_15_minutes', self::HOOK);
        }
    }

    public static function deactivate() { wp_clear_scheduled_hook(self::HOOK); }

    public static function cron_schedules($schedules) {
        $schedules['gnvp_every_15_minutes'] = array(
            'interval' => 15 * MINUTE_IN_SECONDS,
            'display' => 'Every 15 minutes (GoldNow retention)',
        );
        return $schedules;
    }

    public static function delete_after_all_targets($video_id) {
        return self::delete_video_file($video_id, 'all_targets_published');
    }

    public static function mark_final_failure($video_id, $failed_at = null) {
        $option = defined('GNVP_RENDER_OPTION') ? GNVP_RENDER_OPTION : 'gnvp_rendered_videos';
        $videos = get_option($option, array());
        foreach ($videos as &$video) {
            if (($video['id'] ?? '') !== $video_id) { continue; }
            if (empty($video['failed_at'])) { $video['failed_at'] = $failed_at ?: current_time('mysql'); }
            $video['retention_delete_after'] = self::timestamp($video['failed_at']) + self::RETENTION_SECONDS;
            break;
        }
        unset($video);
        update_option($option, $videos, false);
    }

    public static function sweep() {
        $option = defined('GNVP_RENDER_OPTION') ? GNVP_RENDER_OPTION : 'gnvp_rendered_videos';
        $videos = get_option($option, array());
        if (!is_array($videos) || !$videos) { return; }
        $queue = get_option('gnvp_publish_queue', array());
        $now = time();
        $changed = false;

        foreach ($videos as &$video) {
            if (!is_array($video) || !empty($video['file_deleted']) || empty($video['id'])) { continue; }
            $id = (string) $video['id'];
            $items = array();
            foreach ((array) $queue as $item) {
                if (($item['video_id'] ?? '') === $id) { $items[] = $item; }
            }
            if (!$items) { continue; }

            $statuses = array_map(static function ($item) { return (string) ($item['status'] ?? ''); }, $items);
            if (array_intersect($statuses, array('scheduled', 'queued', 'uploading', 'retrying', 'processing'))) { continue; }

            $all_published = !in_array(false, array_map(static function ($s) { return $s === 'published'; }, $statuses), true);
            if ($all_published) {
                if (self::unlink_video($video)) {
                    $video['file_deleted'] = 1;
                    $video['file_deleted_at'] = current_time('mysql');
                    $video['file_delete_reason'] = 'all_targets_published';
                    $changed = true;
                }
                continue;
            }

            $failed_at = !empty($video['failed_at']) ? self::timestamp($video['failed_at']) : 0;
            if (!$failed_at) {
                foreach ($items as $item) {
                    if (($item['status'] ?? '') !== 'failed' || empty($item['failed_at'])) { continue; }
                    $candidate = self::timestamp($item['failed_at']);
                    if ($candidate > $failed_at) { $failed_at = $candidate; }
                }
            }
            if (!$failed_at || ($now - $failed_at) < self::RETENTION_SECONDS) { continue; }
            if (self::unlink_video($video)) {
                $video['file_deleted'] = 1;
                $video['file_deleted_at'] = current_time('mysql');
                $video['file_delete_reason'] = 'final_failure_retention_expired';
                $changed = true;
            }
        }
        unset($video);
        if ($changed) { update_option($option, $videos, false); }
    }

    private static function delete_video_file($video_id, $reason) {
        $option = defined('GNVP_RENDER_OPTION') ? GNVP_RENDER_OPTION : 'gnvp_rendered_videos';
        $videos = get_option($option, array());
        foreach ($videos as &$video) {
            if (($video['id'] ?? '') !== $video_id) { continue; }
            if (self::unlink_video($video)) {
                $video['file_deleted'] = 1;
                $video['file_deleted_at'] = current_time('mysql');
                $video['file_delete_reason'] = $reason;
                unset($video);
                update_option($option, $videos, false);
                return true;
            }
            unset($video);
            return false;
        }
        unset($video);
        return false;
    }

    private static function unlink_video($video) {
        if (empty($video['file'])) { return true; }
        $uploads = wp_upload_dir();
        if (!empty($uploads['error'])) { return false; }
        $base = realpath(trailingslashit($uploads['basedir']) . self::MEDIA_DIR);
        if (!$base || !is_dir($base)) { return false; }
        $candidate = trailingslashit($base) . basename((string) $video['file']);
        if (is_link($candidate)) { return false; }
        $real = realpath($candidate);
        if (!$real || strpos($real, trailingslashit($base)) !== 0 || !is_file($real)) { return false; }
        return @unlink($real);
    }

    private static function timestamp($value) {
        if (is_numeric($value)) { return (int) $value; }
        try {
            $zone = function_exists('wp_timezone') ? wp_timezone() : new DateTimeZone('UTC');
            return (new DateTimeImmutable((string) $value, $zone))->getTimestamp();
        } catch (Exception $e) { return 0; }
    }
}
