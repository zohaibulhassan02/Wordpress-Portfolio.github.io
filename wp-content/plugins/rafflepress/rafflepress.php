<?php
/*
Plugin Name: RafflePress Lite
Plugin URI: https://www.rafflepress.com
Description: RafflePress allows you to easily create giveaways, contests and rewards in WordPress
Version:  1.11.3
Author: RafflePress
Author URI: https://www.rafflepress.com
TextDomain: rafflepress
Domain Path: /languages
License: GPLv2 or later
*/

/**
 * Default Constants
 */
define( 'RAFFLEPRESS_BUILD', 'lite' );
define( 'RAFFLEPRESS_SLUG', 'rafflepress/rafflepress.php' );
define( 'RAFFLEPRESS_VERSION', '1.11.3' );
define( 'RAFFLEPRESS_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
// Example output: /Applications/MAMP/htdocs/wordpress/wp-content/plugins/rafflepress/
define( 'RAFFLEPRESS_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
// Example output: http://localhost:8888/wordpress/wp-content/plugins/rafflepress/
if ( defined( 'RAFFLEPRESS_LOCAL_JS' ) ) {
	define( 'RAFFLEPRESS_API_URL', 'http://app.rafflepress.test/v1/' );

	define( 'RAFFLEPRESS_WEB_API_URL', 'http://app.rafflepress.test/' );

	define( 'RAFFLEPRESS_CALLBACK_URL', 'http://app.rafflepress.test/' );

} else {
	define( 'RAFFLEPRESS_API_URL', 'https://api.rafflepress.com/v1/' );
	define( 'RAFFLEPRESS_WEB_API_URL', 'https://app.rafflepress.com/' );

	define( 'RAFFLEPRESS_CALLBACK_URL', 'https://apigateway.rafflepress.com/' );

}

/**
 * Load Translation
 */
function rafflepress_lite_load_textdomain() {
	load_plugin_textdomain( 'rafflepress', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'rafflepress_lite_load_textdomain' );


/**
 * Upon activation of the plugin check php version, load defaults and show welcome screen.
 */

function rafflepress_lite_activation() {
	 add_option( 'rafflepress_initial_version', RAFFLEPRESS_VERSION, '', false );
	update_option( 'rafflepress_run_activation', true, '', false );

	// Load and Set Default Settings
	require_once RAFFLEPRESS_PLUGIN_PATH . 'resources/giveaway-templates/default-settings.php';
	add_option( 'rafflepress_settings', $rafflepress_default_settings );

	// Set a token
	add_option( 'rafflepress_token', strtolower( wp_generate_password( 32, false, false ) ) );

	// Welcome Page Flag
	set_transient( '_rafflepress_welcome_screen_activation_redirect', true, 30 );

	// Rewrite Rules
	rafflepress_lite_add_rules();
	flush_rewrite_rules();

	// Set inital version
	$data = array(
		'installed_version' => RAFFLEPRESS_VERSION,
		'installed_date'    => time(),
		'installed_pro'     => RAFFLEPRESS_BUILD,
	);

	add_option( 'rafflepress_over_time', $data );

	// set cron to fetch feed
	if ( ! wp_next_scheduled( 'rafflepress_notifications_remote' ) ) {
		wp_schedule_event( time(), 'daily', 'rafflepress_notifications_remote' );
	}
}

register_activation_hook( __FILE__, 'rafflepress_lite_activation' );


/**
 * Deactivate Flush Rules
 */

function rafflepress_lite_deactivate() {
	 flush_rewrite_rules();


	wp_clear_scheduled_hook( 'rafflepress_notifications_remote' );
}

register_deactivation_hook( __FILE__, 'rafflepress_lite_deactivate' );


/**
 * Load Plugin
 */
require_once RAFFLEPRESS_PLUGIN_PATH . 'app/bootstrap.php';
require_once RAFFLEPRESS_PLUGIN_PATH . 'app/routes.php';
require_once RAFFLEPRESS_PLUGIN_PATH . 'app/load_controller.php';
