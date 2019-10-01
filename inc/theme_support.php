<?php 

defined( 'ABSPATH' ) || exit;

// Base Colors
$citadel_navy = '#1F3A60';
$citadel_blue = '#3975B7';
$pt_barracks = '#CEC7BF';
$shako = '#282E36';

add_theme_support( 'post-thumbnails' );
add_theme_support( 'title-tag' );
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

add_theme_support( 'disable-custom-colors' );
