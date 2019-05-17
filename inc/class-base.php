<?php

namespace React_WordPress_Plugin;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


class Base {

	/**
	 * Holds the plugin instance.
	 *
	 * @since 0.0.2
	 * @access protected
	 * @static
	 *
	 * @var Base
	 */
	private static $instances = [];

	/**
	 * Disable class cloning and throw an error on object clone.
	 *
	 * The whole idea of the singleton design pattern is that there is a single
	 * object. Therefore, we don't want the object to be cloned.
	 *
	 * @access public
	 * @since 0.0.2
	 */
	public function __clone() {
		// Cloning instances of the class is forbidden.
		_doing_it_wrong( __FUNCTION__, esc_html__( 'Something went wrong.', 'react-wordpress-plugin' ), '1.0.0' );
	}

	/**
	 * Disable unserializing of the class.
	 *
	 * @access public
	 * @since 0.0.2
	 */
	public function __wakeup() {
		// Unserializing instances of the class is forbidden.
		_doing_it_wrong( __FUNCTION__, esc_html__( 'Something went wrong.', 'react-wordpress-plugin' ), '1.0.0' );
	}

	/**
	 * Sets up a single instance of the plugin.
	 *
	 * @since 0.0.2
	 * @access public
	 * @static
	 *
	 * @return static An instance of the class.
	 */
	public static function get_instance() {
		$module = get_called_class();
		if ( ! isset( self::$instances[ $module ] ) ) {
			self::$instances[ $module ] = new $module();
		}

		return self::$instances[ $module ];
	}

	/**
	 * Initializing plugin.
	 *
	 * @since 0.0.2
	 * @access private
	 */
	public function __construct() {

		add_action( 'init', [ $this, 'init' ], 0 );

	}

	/**
	 * Runs in the init WordPress hook and sets everything up.
	 *
	 * @since 0.0.2
	 * @access public
	 */
	public function init() {

	}
}
