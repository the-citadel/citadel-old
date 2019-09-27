<?php 

defined( 'ABSPATH' ) || exit;

$citadel_includes = array(
	'/enqueue.php',
	'/hooks.php',
	'/theme_support.php',
	'/menus.php',
	'/breadcrumbs.php',
	'/defaults.php',
);

foreach ( $citadel_includes as $file ) {
	$filepath = locate_template( 'inc' . $file );
	if ( ! $filepath ) {
		trigger_error( sprintf( 'Error locating /inc%s for inclusion', $file ), E_USER_ERROR );
	}
	require_once $filepath;
}