<?php
/**
 * CLI regression tests for GoldNow video retention.
 * Run: php tests/test-video-retention.php
 */
define('ABSPATH', __DIR__);
define('HOUR_IN_SECONDS', 3600);
define('DAY_IN_SECONDS', 86400);
define('MINUTE_IN_SECONDS', 60);
define('WP_PLUGIN_DIR', __DIR__);
$GLOBALS['gnvp_options'] = array();
$GLOBALS['gnvp_uploads'] = array('basedir' => sys_get_temp_dir() . '/gnvp-retention-' . getmypid(), 'baseurl' => 'https://example.test/uploads', 'error' => false);
function add_filter($hook, $callback) {}
function add_action($hook, $callback, $priority = 10, $args = 1) {}
function register_activation_hook($file, $callback) {}
function register_deactivation_hook($file, $callback) {}
function plugin_dir_path($file) { return dirname($file) . '/'; }
function plugin_dir_url($file) { return 'https://example.test/plugin/'; }
function get_option($key, $default = false) { return array_key_exists($key, $GLOBALS['gnvp_options']) ? $GLOBALS['gnvp_options'][$key] : $default; }
function update_option($key, $value, $autoload = null) { $GLOBALS['gnvp_options'][$key] = $value; return true; }
function wp_upload_dir() { return $GLOBALS['gnvp_uploads']; }
function trailingslashit($value) { return rtrim($value, '/\\\\') . DIRECTORY_SEPARATOR; }
function current_time($type) { return date('Y-m-d H:i:s'); }
function sanitize_key($value) { return preg_replace('/[^a-z0-9_\\-]/', '', strtolower($value)); }
function wp_next_scheduled($hook) { return false; }
function wp_schedule_event($timestamp, $recurrence, $hook) {}
function wp_clear_scheduled_hook($hook) {}
function wp_parse_args($args, $defaults) { return array_merge($defaults, $args); }
function apply_filters($hook, $value) { return $value; }
require_once dirname(__DIR__) . '/video-publisher/goldnow-video-publisher.php';

function gnvp_assert($condition, $message) {
    if (!$condition) { fwrite(STDERR, "FAIL: " . $message . "\\n"); exit(1); }
}
function gnvp_make_video($id, $filename) {
    $dir = $GLOBALS['gnvp_uploads']['basedir'] . '/goldnow-videos';
    if (!is_dir($dir)) { mkdir($dir, 0777, true); }
    file_put_contents($dir . '/' . $filename, 'fake-mp4');
    return array('id' => $id, 'file' => $filename, 'created_at' => date('Y-m-d H:i:s', time() - 172800));
}
function gnvp_set_state($videos, $queue) {
    update_option(GNVP_RENDER_OPTION, $videos, false);
    update_option('gnvp_publish_queue', $queue, false);
}
$instance = new GoldNow_Video_Publisher();
$cleanup = new ReflectionMethod('GoldNow_Video_Publisher', 'cleanup_failed_video_files');
$cleanup->setAccessible(true);
$delete = new ReflectionMethod('GoldNow_Video_Publisher', 'safe_delete_video_file');
$delete->setAccessible(true);
$media = $GLOBALS['gnvp_uploads']['basedir'] . '/goldnow-videos';

// Any unresolved destination protects the MP4.
$v = gnvp_make_video('mixed', 'mixed.mp4');
gnvp_set_state(array($v), array(
    array('video_id' => 'mixed', 'status' => 'failed', 'failed_at' => date('Y-m-d H:i:s', time() - 90000)),
    array('video_id' => 'mixed', 'status' => 'uploading'),
));
$cleanup->invoke($instance);
gnvp_assert(is_file($media . '/mixed.mp4'), 'uploading destination must prevent deletion');

// Missing final-failure timestamps must not fall back to the old render timestamp.
$v = gnvp_make_video('no-failure-time', 'no-failure-time.mp4');
gnvp_set_state(array($v), array(array('video_id' => 'no-failure-time', 'status' => 'failed')));
$cleanup->invoke($instance);
gnvp_assert(is_file($media . '/no-failure-time.mp4'), 'missing failed_at must retain the MP4');

// A final failure younger than 24 hours retains the file.
$v = gnvp_make_video('recent-failure', 'recent-failure.mp4');
gnvp_set_state(array($v), array(array('video_id' => 'recent-failure', 'status' => 'failed', 'failed_at' => date('Y-m-d H:i:s', time() - 86399))));
$cleanup->invoke($instance);
gnvp_assert(is_file($media . '/recent-failure.mp4'), 'failure younger than 24 hours must retain the MP4');

// A final failure older than 24 hours deletes the MP4 and keeps its metadata.
$v = gnvp_make_video('expired-failure', 'expired-failure.mp4');
gnvp_set_state(array($v), array(array('video_id' => 'expired-failure', 'status' => 'failed', 'failed_at' => date('Y-m-d H:i:s', time() - 86401))));
$cleanup->invoke($instance);
gnvp_assert(!is_file($media . '/expired-failure.mp4'), 'expired final failure must delete the MP4');
$stored = get_option(GNVP_RENDER_OPTION, array());
gnvp_assert(!empty($stored[0]['file_deleted']), 'deletion metadata must be persisted');

// Every configured destination published successfully: delete promptly.
$v = gnvp_make_video('all-published', 'all-published.mp4');
gnvp_set_state(array($v), array(
    array('video_id' => 'all-published', 'status' => 'published'),
    array('video_id' => 'all-published', 'status' => 'published'),
));
$cleanup->invoke($instance);
gnvp_assert(!is_file($media . '/all-published.mp4'), 'all-published media should be deleted');

// Symlinks and traversal-like names fail closed.
$outside = $GLOBALS['gnvp_uploads']['basedir'] . '/outside.mp4';
file_put_contents($outside, 'keep');
$link = $media . '/linked.mp4';
if (function_exists('symlink') && @symlink($outside, $link)) {
    $candidate = array('id' => 'linked', 'file' => 'linked.mp4');
    gnvp_assert($delete->invokeArgs($instance, array(&$candidate, 'test')) === false, 'symlink must be rejected');
    gnvp_assert(is_file($outside), 'symlink target must remain untouched');
}
$candidate = array('id' => 'traversal', 'file' => '../outside.mp4');
gnvp_assert($delete->invokeArgs($instance, array(&$candidate, 'test')) === false, 'path traversal must be rejected');
gnvp_assert(is_file($outside), 'outside file must remain untouched');

echo "GoldNow video retention regression tests passed.\\n";
