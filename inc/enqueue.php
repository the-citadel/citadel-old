<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'citadel_scripts' ) ) {
	// Load theme's JavaScript and CSS sources
	function citadel_scripts() {
		// Get the theme data
		$the_theme     = wp_get_theme();
		$theme_version = $the_theme->get( 'Version' );

		$css_version = $theme_version . '.' . filemtime( get_template_directory() . '/style.css' );
		wp_enqueue_style( 'citadel-styles', get_template_directory_uri() . '/style.css', array(), $css_version );
		wp_enqueue_style( 'citadel-print-styles', get_template_directory_uri() . '/print.css', array(), $css_version );
		wp_enqueue_style( 'font-awesome', 'https://use.fontawesome.com/releases/v5.8.2/css/all.css', array(), $theme_version );
		wp_enqueue_style( 'citadel-fonts', 'https://use.typekit.net/onz2qme.css', array(), $theme_version );

		//IE styles
		wp_enqueue_style( 'citadel-ie10', get_template_directory_uri() . '/sass/ie/ie10/ie10.css', array(), $theme_version );
		wp_style_add_data( 'citadel-ie10', 'conditional', 'gt IE 9' );
		wp_enqueue_style( 'citadel-ie9', get_template_directory_uri() . '/sass/ie/ie9/ie9.css', array(), $theme_version );
		wp_style_add_data( 'citadel-ie9', 'conditional', 'lte IE 9' );
		wp_enqueue_style( 'citadel-ie8', get_template_directory_uri() . '/sass/ie/ie8/ie8.css', array(), $theme_version );
		wp_style_add_data( 'citadel-ie8', 'conditional', 'lte IE 8' );
		wp_enqueue_style( 'citadel-ie7', get_template_directory_uri() . '/sass/ie/ie7/ie7.css', array(), $theme_version );
		wp_style_add_data( 'citadel-ie7', 'conditional', 'lte IE 7' );

		wp_enqueue_script( 'jquery' );

		$js_version = $theme_version . '.' . filemtime( get_template_directory() . '/js/scripts.js' );
		wp_enqueue_script( 'citadel-scripts', get_template_directory_uri() . '/js/scripts.js', array(), $js_version, true );
	}
	add_action( 'wp_enqueue_scripts', 'citadel_scripts' );
} // endif function_exists( 'citadel_scripts' )

