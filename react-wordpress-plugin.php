<?php
/**
 * Plugin Name: Sample React Plugin
 * Description: blah blah
 * Author: dtbaker
 * Author URI: https://dtbaker.net
 * Version: 1.0.0
 * License: GPLv3 or later
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 *
 * Text Domain: something-here
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'REACT_WORDPRESS_SLUG', 'react-wordpress-plugin' );
define( 'REACT_WORDPRESS_VER', '1.0.0' );
define( 'REACT_WORDPRESS_FILE', __FILE__ );
define( 'REACT_WORDPRESS_DIR', plugin_dir_path( REACT_WORDPRESS_FILE ) );
define( 'REACT_WORDPRESS_URI', plugins_url( '/', REACT_WORDPRESS_FILE ) );
define( 'REACT_WORDPRESS_PHP_VERSION', '5.6' );

add_action( 'plugins_loaded', 'react_wordpress_load_plugin_textdomain' );

if ( ! version_compare( PHP_VERSION, REACT_WORDPRESS_PHP_VERSION, '>=' ) ) {
	add_action( 'admin_notices', 'react_wordpress_fail_php_version' );
} elseif ( ! version_compare( get_bloginfo( 'version' ), '4.6', '>=' ) ) {
	add_action( 'admin_notices', 'react_wordpress_fail_wp_version' );
} else {
	require REACT_WORDPRESS_DIR . 'inc/bootstrap.php';
}

function react_wordpress_load_plugin_textdomain() {
	load_plugin_textdomain( 'react-wordpress-plugin' );
}


function react_wordpress_fail_php_version() {
	$message = sprintf(
	/* translators: %s: PHP version */
		esc_html__( 'This plugin requires PHP version %s+, plugin is currently NOT ACTIVE. Please contact the hosting provider. WordPress recommends version %s.', 'react-wordpress-plugin' ),
		REACT_WORDPRESS_PHP_VERSION,
		sprintf(
			'<a href="%s" target="_blank">%s</a>',
			esc_url( 'https://wordpress.org/about/requirements/' ),
			esc_html__( '7.2 or above', 'react-wordpress-plugin' )
		)
	);

	$html_message = sprintf( '<div class="error">%s</div> ', wpautop( $message ) );
	echo wp_kses_post( $html_message );
}


function react_wordpress_fail_wp_version() {
	/* translators: %s: WordPress version */
	$message      = sprintf( esc_html__( 'This plugin requires WordPress version %s+. Because you are using an earlier version, the plugin is currently NOT ACTIVE.', 'react-wordpress-plugin' ), '4.6' );
	$html_message = sprintf( '<div class="error">%s</div>', wpautop( $message ) );
	echo wp_kses_post( $html_message );
}
