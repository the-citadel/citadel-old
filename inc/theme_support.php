<?php 

defined( 'ABSPATH' ) || exit;

if ( ! function_exists('citadel_theme_support') ) {

	// Register Theme Features
	function citadel_theme_support()  {

		// Base Colors
		$citadel_navy = '#1F3A60';
		$citadel_blue = '#3975B7';
		$pt_barracks = '#CEC7BF';
		$shako = '#282E36';

		// Add theme support for Automatic Feed Links
		add_theme_support( 'automatic-feed-links' );

		// Add theme support for Featured Images
		add_theme_support( 'post-thumbnails' );

		// Add theme support for HTML5 Semantic Markup
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

		// Gutenberg editor color palette
		add_theme_support( 'editor-color-palette', array(
			array(
				'name'  => __( 'Citadel Navy', 'citadel' ),
				'slug'  => 'citadel_navy',
				'color'	=> $citadel_navy,
			),

			array(
				'name'  => __( 'Citadel Blue', 'citadel' ),
				'slug'  => 'citadel_blue',
				'color' => $citadel_blue,
			),

			array(
				'name'  => __( 'PT Barracks', 'citadel' ),
				'slug'  => 'pt_barracks',
				'color' => $pt_barracks,
			),

			array(
				'name'	=> __( 'White', 'citadel' ),
				'slug'	=> 'white',
				'color'	=> '#ffffff',
			),

			array(
				'name'	=> __( 'Black', 'citadel' ),
				'slug'	=> 'black',
				'color'	=> '#000000',
			),

		) );

		// Remove custom colors
		add_theme_support( 'disable-custom-colors' );
	}

	add_action( 'after_setup_theme', 'citadel_theme_support' );

}
