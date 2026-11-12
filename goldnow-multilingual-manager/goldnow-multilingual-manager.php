<?php
/**
 * Plugin Name: GoldNow Multilingual Manager
 * Description: Central manager for localized GoldNow country images and articles, using Gold Manager as the price source.
 * Version: 0.1.0
 * Requires at least: 5.8
 * Requires PHP: 7.4
 * Text Domain: goldnow-multilingual-manager
 */
if (!defined('ABSPATH')) { exit; }

define('GNMM_VERSION', '0.1.0');
define('GNMM_FILE', __FILE__);
define('GNMM_DIR', plugin_dir_path(__FILE__));
define('GNMM_URL', plugin_dir_url(__FILE__));

require_once GNMM_DIR . 'includes/class-gnmm-storage.php';
require_once GNMM_DIR . 'includes/class-gnmm-gold-manager.php';
require_once GNMM_DIR . 'includes/class-gnmm-admin.php';
require_once GNMM_DIR . 'includes/class-gnmm-images.php';
require_once GNMM_DIR . 'includes/class-gnmm-articles.php';
require_once GNMM_DIR . 'includes/class-gnmm-core.php';

register_activation_hook(__FILE__, array('GNMM_Core', 'activate'));
register_deactivation_hook(__FILE__, array('GNMM_Core', 'deactivate'));
add_action('plugins_loaded', array('GNMM_Core', 'init'), 30);
