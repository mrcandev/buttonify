<?php

/**
 * Plugin Name: Buttonify - Custom Chat Button
 * Description: Buttonify is a WordPress plugin that adds customizable WhatsApp chat button to your website. Increase user engagement and boost support and order response times with Buttonify.
 * Author: mrcandev
 * Author URI: https://www.omeraydinoglu.com
 * Version: 1.1.0
 * License: GPLv2 or later
 **/



// INCLUDES
// Include activation actions
require_once plugin_dir_path(__FILE__) . 'includes/activation_process.php';
// Include deletion actions
require_once plugin_dir_path(__FILE__) . 'includes/remove_process.php';
// Include admin menu
require_once plugin_dir_path(__FILE__) . 'admin/menu.php';

require_once plugin_dir_path(__FILE__) . 'public/chat_button.php';


// Block direct access for security
if (!defined('ABSPATH')) {
    exit;
}




// Save default settings when plugin is activated
register_activation_hook( __FILE__, array( 'Buttonify_Activation_Process', 'buttonify_insert_default_options' ) );
// Clear settings when plugin is uninstalled
register_uninstall_hook( __FILE__, array( 'Buttonify_Remove_Process', 'buttonify_remove_options' ) );





// Add admin menu
add_action('admin_menu', array('Buttonify_Admin_Menu', 'buttonify_add_admin_menu'));

// Add button to footer
add_action('wp_footer', 'buttonify_add_chat_button_to_footer');