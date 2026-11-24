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
if (!class_exists('WP_Error')) {
    class WP_Error {
        private $code;
        public function __construct($code, $message = '') { $this->code = $code; }
        public function get_error_code() { return $this->code; }
    }
}
function is_wp_error($value) { return $value instanceof WP_Error; }
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
$GLOBALS['gnvp_scheduled'] = array();
$GLOBALS['gnvp_cleared'] = array();
function wp_next_scheduled($hook) { return false; }
function wp_schedule_event($timestamp, $recurrence, $hook) { $GLOBALS['gnvp_scheduled'][] = array($hook, $recurrence); return true; }
function wp_schedule_single_event($timestamp, $hook, $args = array()) { $GLOBALS['gnvp_scheduled'][] = array($hook, 'single'); return true; }
function wp_clear_scheduled_hook($hook) { $GLOBALS['gnvp_cleared'][] = $hook; return true; }
function wp_parse_args($args, $defaults) { return array_merge($defaults, $args); }
function absint($value) { return abs((int) $value); }
function apply_filters($hook, $value) { return $value; }
$GLOBALS['gnvp_last_http_request'] = array();
function wp_json_encode($value) { return json_encode($value); }
function add_query_arg($key, $value, $url) { return $url . '?' . rawurlencode($key) . '=' . rawurlencode($value); }
function wp_strip_all_tags($value) { return strip_tags($value); }
function wp_remote_post($url, $args) {
    $GLOBALS['gnvp_last_http_request'] = array('url' => $url, 'args' => $args);
    return array('response' => array('code' => 200), 'body' => json_encode(array('audioContent' => base64_encode('ID3' . str_repeat('A', 300)))));
}
function wp_remote_retrieve_response_code($response) { return $response['response']['code']; }
function wp_remote_retrieve_body($response) { return $response['body']; }
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
$settings_method = new ReflectionMethod('GoldNow_Video_Publisher', 'settings');
$settings_method->setAccessible(true);
$pilot_settings = $settings_method->invoke($instance);
gnvp_assert(!empty($pilot_settings['auto_refresh']), 'automatic price refresh must be enabled by default');
gnvp_assert(!empty($pilot_settings['auto_render']), 'scheduled video generation must be enabled by default for the pilot');

// All supported language editions must resolve to a valid Google TTS locale.
$tts_locale = new ReflectionMethod('GoldNow_Video_Publisher', 'tts_language_code');
$tts_locale->setAccessible(true);
$expected_locales = array(
    'ar' => 'ar-XA', 'en' => 'en-US', 'fr' => 'fr-FR', 'de' => 'de-DE',
    'it' => 'it-IT', 'pt' => 'pt-BR', 'ru' => 'ru-RU', 'hi' => 'hi-IN',
    'es' => 'es-ES', 'tr' => 'tr-TR', 'th' => 'th-TH', 'vi' => 'vi-VN',
    'id' => 'id-ID', 'ja' => 'ja-JP', 'ko' => 'ko-KR',
);
foreach ($expected_locales as $language => $locale) {
    gnvp_assert($tts_locale->invoke($instance, $language) === $locale, 'TTS locale mapping for ' . $language);
}
$tts_method = new ReflectionMethod('GoldNow_Video_Publisher', 'synthesize_voiceover');
$tts_method->setAccessible(true);
$tts_disabled = $tts_method->invoke($instance, array('test speech'), 'ar', sys_get_temp_dir() . '/gnvp-disabled-tts.mp3');
gnvp_assert(is_wp_error($tts_disabled) && $tts_disabled->get_error_code() === 'gnvp_tts_disabled', 'rendering must not silently fall back to a silent audio track');
update_option('gnvp_tts_settings', array('provider' => 'google_cloud', 'enabled' => 1, 'api_key' => 'test-key', 'speaking_rate' => 0.95), false);
$mock_mp3 = sys_get_temp_dir() . '/gnvp-tts-' . getmypid() . '.mp3';
$tts_result = $tts_method->invoke($instance, array('Gold prices today', '24 karat: 100 USD'), 'en', $mock_mp3);
gnvp_assert(is_array($tts_result) && is_file($mock_mp3), 'valid TTS response must create an MP3 file');
gnvp_assert($tts_result['language_code'] === 'en-US', 'TTS output must report the requested locale');
$tts_payload = json_decode($GLOBALS['gnvp_last_http_request']['args']['body'], true);
gnvp_assert(($tts_payload['voice']['languageCode'] ?? '') === 'en-US', 'TTS request must send the correct language code');
gnvp_assert(($tts_payload['audioConfig']['audioEncoding'] ?? '') === 'MP3', 'TTS request must ask for MP3 audio');
@unlink($mock_mp3);

// The configured default production matrix must contain all 15 languages in both formats.
$build_snapshot = new ReflectionMethod('GoldNow_Video_Publisher', 'build_snapshot');
$build_snapshot->setAccessible(true);
$sample_data = array(
    'gold_date' => '2026-11-24', 'currency_date' => '2026-11-24',
    'source_updated_at' => '2026-11-24 10:00:00', 'ounce_updated_at' => '2026-11-24 10:00:00',
    'prices' => array(array('carat' => '24K', 'price_egp' => 5000, 'price_usd' => 100)),
    'global_ounce_usd' => 4100,
);
$snapshot = $build_snapshot->invoke($instance, $sample_data);
gnvp_assert(count($snapshot['production_jobs']) === 4, 'default Egypt pilot must contain Arabic and English in two formats (4 jobs)');
$job_languages = array_values(array_unique(array_column($snapshot['production_jobs'], 'language')));
gnvp_assert($job_languages === array('ar', 'en'), 'default production must be limited to Arabic and English pilot languages');
$english_egypt_jobs = array_values(array_filter($snapshot['production_jobs'], function ($job) {
    return $job['language'] === 'en';
}));
gnvp_assert(count($english_egypt_jobs) === 2, 'English must have both Egypt pilot formats');
foreach ($english_egypt_jobs as $english_job) {
    gnvp_assert($english_job['market'] === 'EG' && $english_job['currency'] === 'EGP', 'English pilot jobs must use Egypt market and EGP');
}
$global_jobs = array_values(array_filter($snapshot['production_jobs'], function ($job) {
    return $job['language'] === 'fr';
}));
gnvp_assert(count($global_jobs) === 0, 'global languages must not be automatically included in the Egypt pilot');
$supported_method = new ReflectionMethod('GoldNow_Video_Publisher', 'supported_languages');
$supported_method->setAccessible(true);
$supported = $supported_method->invoke($instance);
gnvp_assert(count($supported) === 15, 'all 15 locales must remain available for later explicit rollout');
$job_formats = array_values(array_unique(array_column($snapshot['production_jobs'], 'format')));
sort($job_formats);
gnvp_assert($job_formats === array('horizontal', 'vertical'), 'production matrix must include vertical and horizontal formats');

// Activation must replace legacy hourly events with the requested 3-hour recurrence.
GoldNow_Video_Publisher::activate();
$refresh_schedules = array_values(array_filter($GLOBALS['gnvp_scheduled'], function ($event) {
    return $event[0] === 'gnvp_refresh_prices_event';
}));
gnvp_assert(count($refresh_schedules) === 1 && $refresh_schedules[0][1] === 'gnvp_every_three_hours', 'activation must schedule price refresh every three hours');
gnvp_assert(in_array('gnvp_refresh_prices_event', $GLOBALS['gnvp_cleared'], true), 'activation must clear any legacy refresh recurrence');
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
