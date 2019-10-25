<?php 

defined( 'ABSPATH' ) || exit;

global $blog_id;

?>

<?php get_header(); ?>

<?php

/* Start the Loop */
while ( have_posts() ) :
	the_post();

	if ( ( $blog_id == 1 ) ) {

		get_template_part( 'template-parts/content/content', 'network_home' );

	} else {

		get_template_part( 'template-parts/content/content' );

	}

endwhile; // End of the loop.
?>

<?php get_footer(); ?>