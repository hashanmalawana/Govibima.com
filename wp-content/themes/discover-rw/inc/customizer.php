<?php
/*
 * Discover RW Theme Customizer.
 */



if (!function_exists('discover_rw_customize_register')) {
	function discover_rw_customize_register($wp_customize) {
		// Options
		include(trailingslashit( get_template_directory() ) . 'inc/options.php');
	}
}
add_action( 'customize_register', 'discover_rw_customize_register' );


/**
 * Enqueue style for custom customize control.
 */
function discover_rw_customize_enqueue() {
	wp_enqueue_script( 'discover-rw-customize', get_template_directory_uri() . '/js/customize.js', array( 'customize-controls' ) );
	wp_enqueue_style( 'discover-rw-customize', get_template_directory_uri() . '/css/customize.css' );
}
add_action( 'customize_controls_enqueue_scripts', 'discover_rw_customize_enqueue' );
