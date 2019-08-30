<?php
	global $blog_id;
	$current_blog_id = $blog_id;

	$main_site = 'The Citadel';
	$main_blogname = get_blog_details( 1 )->blogname;
	$blogname = get_bloginfo( 'name' );
?>

<?php get_header(); ?>

<?php
if ( have_posts() ) {

	// Load posts loop.
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content/content' );
	}

} else {

	// If no content, include the "No posts found" template.
	get_template_part( 'template-parts/content/content', 'none' );

}
?>

<?php get_footer(); ?>