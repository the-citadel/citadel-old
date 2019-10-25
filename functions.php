<?php 

defined( 'ABSPATH' ) || exit;

$citadel_includes = array(
	'/enqueue.php',
	'/custom-functions.php',
	'/theme_support.php',
	'/menus.php',
	'/widgets.php',
	'/breadcrumbs.php',
	'/child-menu.php',
	'/title-tag.php',
);

foreach ( $citadel_includes as $file ) {
	$filepath = locate_template( 'inc' . $file );
	if ( ! $filepath ) {
		trigger_error( sprintf( 'Error locating /inc%s for inclusion', $file ), E_USER_ERROR );
	}
	require_once $filepath;
}