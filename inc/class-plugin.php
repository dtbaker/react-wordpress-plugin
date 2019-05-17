<?php

namespace React_WordPress_Plugin;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Plugin extends Base {


	public function __construct() {
		parent::__construct();

		add_action( 'wp_enqueue_scripts', [ $this, 'add_frontend_styles'] );
	}

	public function add_frontend_styles() {

		wp_enqueue_style( 'react-wordpress-plugin-css', REACT_WORDPRESS_URI . 'assets/frontend.css', [], filemtime( REACT_WORDPRESS_DIR . 'assets/frontend.css' ) );
		wp_register_script( 'react-wordpress-plugin-javascript', REACT_WORDPRESS_URI . 'assets/frontend.js', [], filemtime( REACT_WORDPRESS_DIR . 'assets/frontend.js' ) );
		wp_localize_script( 'react-wordpress-plugin-javascript', 'react_wordpress_plugin_settings', [
			'some' => 'configuration',
			'values' => 'can',
			'go' => 'here',
			'and' => 'you can access with window.react_wordpress_plugin_settings in JavaScript',
			'someSettingFromPHP' => 'This value is passed through to React as a prop example',
		] );
		wp_enqueue_script( 'react-wordpress-plugin-javascript' );

	}

}
