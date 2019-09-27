<?php 

defined( 'ABSPATH' ) || exit;

?>

<?php 

// Main Site Homepage
if ( ($blogname == $main_site) && (is_front_page()) ) {
	echo $main_site; ?> | The Military College of South Carolina

<?php 
//Any Site Homepage
} else if ( ($blogname != $main_site) && (is_front_page()) ) {
	echo get_bloginfo( 'name' ); ?> | <?php echo $main_site;

// 404 Page
} else if ( is_404() ) { ?>
	404 | <?php echo get_bloginfo( 'name' ); ?> | <?php echo $main_site;

// All Other Pages
} else {

	// Pages on Main Site
	if (($blogname == $main_site)) {
		the_title(); ?> | <?php echo $main_site;

	// Pages on Any Site
	} else {
		the_title(); ?> | <?php echo get_bloginfo( 'name' ); ?> | <?php echo $main_site;
	}
}

?>