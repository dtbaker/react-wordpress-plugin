<?php

namespace React_WordPress_Plugin;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


spl_autoload_register(
	function ( $class ) {
		$prefix   = __NAMESPACE__;
		$base_dir = __DIR__;
		$len      = strlen( $prefix );
		if ( strncmp( $prefix, $class, $len ) !== 0 || $class === $prefix ) {
			return;
		}
		$relative_class = strtolower( substr( $class, $len + 1 ) );
		$relative_class = 'class-' . $relative_class;
		$file           = $base_dir . DIRECTORY_SEPARATOR . str_replace( [ '\\', '_' ], [ '/', '-' ], $relative_class ) . '.php';
		if ( file_exists( $file ) ) {
			require $file;
		} else {
			die( esc_html( basename( $file ) . ' missing.' ) );
		}
	}
);


Plugin::get_instance();
Shortcode::get_instance();
