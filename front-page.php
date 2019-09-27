<?php 

defined( 'ABSPATH' ) || exit;

global $blog_id;

$main_site = 'The Citadel';
$main_blogname = get_blog_details( 1 )->blogname;
$blogname = get_bloginfo( 'name' );

?>

<?php get_header(); ?>

<?php

/* Start the Loop */
while ( have_posts() ) :
	the_post();

	if ( ( $blog_id == 1 ) && ($main_blogname == $main_site)  ) {

		get_template_part( 'template-parts/content/content', 'citadel_home' );

	} else {

		get_template_part( 'template-parts/content/content', 'home' );

	}

endwhile; // End of the loop.
?>

<?php get_footer(); ?>