<?php 

if ( ($current_blog_id == 1) && (is_front_page()) ) {
	echo get_bloginfo( 'name' ); ?> | <?php echo get_bloginfo( 'description' );
} else if ( !($current_blog_id == 1) && (is_front_page()) ) {
	echo get_bloginfo( 'name' ); ?> | <?php switch_to_blog(1); echo get_bloginfo( 'name' ); switch_to_blog($current_blog_id);
} else if ( is_404() ) { ?>
	404 | <?php echo get_bloginfo( 'name' ); ?> | <?php switch_to_blog(1); echo get_bloginfo( 'name' ); switch_to_blog($current_blog_id);
} else {
the_title(); ?> | <?php echo get_bloginfo( 'name' ); ?> | <?php switch_to_blog(1); echo get_bloginfo( 'name' ); switch_to_blog($current_blog_id);
}

?>