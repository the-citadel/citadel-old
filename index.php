<?php
	global $blog_id;
	$current_blog_id = $blog_id;

	$main_site = 'The Citadel';
	$main_blogname = get_blog_details( 1 )->blogname;
	$blogname = get_bloginfo( 'name' );
?>

<?php get_header(); ?>



<?php get_footer(); ?>