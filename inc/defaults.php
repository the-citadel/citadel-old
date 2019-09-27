<?php 

defined( 'ABSPATH' ) || exit;

$citadel_includes = array(
	'/admin.php',
	'/new-site.php',
	'/widgets.php',
);

foreach ( $citadel_includes as $file ) {
	$filepath = locate_template( 'inc/defaults' . $file );
	if ( ! $filepath ) {
		trigger_error( sprintf( 'Error locating /inc%s for inclusion', $file ), E_USER_ERROR );
	}
	require_once $filepath;
}