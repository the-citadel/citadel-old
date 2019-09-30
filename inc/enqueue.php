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
		wp_enqueue_style( 'font-awesome', 'https://use.fontawesome.com/releases/v5.8.2/css/all.css', array(), $theme_version );
		wp_enqueue_style( 'citadel-fonts', 'https://use.typekit.net/fzl5dfx.css', array(), $theme_version );

		wp_enqueue_script( 'jquery' );

		$js_version = $theme_version . '.' . filemtime( get_template_directory() . '/js/scripts.js' );
		wp_enqueue_script( 'citadel-scripts', get_template_directory_uri() . '/js/scripts.js', array(), $js_version, true );
	}
	add_action( 'wp_enqueue_scripts', 'citadel_scripts' );
} // endif function_exists( 'citadel_scripts' )

