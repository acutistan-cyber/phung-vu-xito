<?php
/**
 * Plugin Name: Lịch Vạn Niên Công Giáo
 * Plugin URI: https://github.com/acutistan-cyber/phung-vu-xito
 * Description: WordPress Plugin hiển thị Lịch Phụng Vụ Công Giáo Roma (2022-2100) với bài đọc và các thánh được cử hành
 * Version: 1.0.0
 * Author: Acutistan Cyber
 * Author URI: https://github.com/acutistan-cyber
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: phung-vu-xito
 * Domain Path: /languages
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// Define plugin constants
define('PHUNG_VU_XITO_VERSION', '1.0.0');
define('PHUNG_VU_XITO_PATH', plugin_dir_path(__FILE__));
define('PHUNG_VU_XITO_URL', plugin_dir_url(__FILE__));
define('PHUNG_VU_XITO_BASENAME', plugin_basename(__FILE__));

// Load plugin classes and functions
require_once PHUNG_VU_XITO_PATH . 'includes/class-liturgical-calendar.php';
require_once PHUNG_VU_XITO_PATH . 'includes/class-shortcode.php';
require_once PHUNG_VU_XITO_PATH . 'includes/class-admin.php';

// Initialize plugin
function phung_vu_xito_init() {
    // Load text domain for translations
    load_plugin_textdomain('phung-vu-xito', false, dirname(PHUNG_VU_XITO_BASENAME) . '/languages');
    
    // Initialize classes
    new Phung_Vu_Xito\Liturgical_Calendar();
    new Phung_Vu_Xito\Shortcode();
    new Phung_Vu_Xito\Admin();
}

add_action('plugins_loaded', 'phung_vu_xito_init');

// Activation hook
register_activation_hook(__FILE__, 'phung_vu_xito_activate');
function phung_vu_xito_activate() {
    // Create plugin tables or initialize options if needed
}

// Deactivation hook
register_deactivation_hook(__FILE__, 'phung_vu_xito_deactivate');
function phung_vu_xito_deactivate() {
    // Clean up if needed
}
