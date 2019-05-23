<?php get_header(); ?>

<?php if (function_exists('the_breadcrumb')) the_breadcrumb(); ?>

<?php while (have_posts()) : the_post(); ?>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->
	
	<?php
	$args = array(
		'post_parent' => get_the_ID(), // Current post's ID
	);
	$children = get_children( $args );
	
	if( $post->post_parent > 0 && !empty($children) ) : 
	?>
	<p class="section-items-pages">
	<?php
		$args = array(
		'post_type'      => 'page',
		'posts_per_page' => -1,
		'post_parent'    => $post->ID,
		'order'          => 'ASC',
		'orderby'        => 'menu_order'
	 );


	$parent = new WP_Query( $args );

	if ( $parent->have_posts() ) : ?>

		<?php while ( $parent->have_posts() ) : $parent->the_post(); ?>

			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>

		<?php endwhile; ?>

	<?php endif; wp_reset_postdata(); ?>
	</p>
	<?php endif; ?>

<hr style="margin: 0;"/>

<?php if ( has_nav_menu( 'leftmenu' ) ): ?>
<aside id="left-sidebar" class="sidebar">
	<h2 class="widgettitle">
		<a href="<?php echo site_url(); ?>"><i class="fas fa-bars"></i><?php echo bloginfo(); ?></a>
	</h2>
	<div class="widget_nav_menu">
		<?php wp_nav_menu( array(
			'theme_location' => 'primary',
			'menu_id'        => 'primary',
			'container' 	 => '',
		) ); ?>
	</div>
</aside>
<?php endif; ?>

<article id="main-content"<?php if ( !has_nav_menu('leftmenu') ) : ?> class="no-sidebar"<?php endif; ?>>
	
	<?php 
		if (is_home()) :
		get_template_part( 'template-parts/page/content', 'homepage' );
		else:
		get_template_part( 'template-parts/page/content', 'page' );
		endif; 
	?>
	
</article>
<?php  
	endwhile;
?>
<?php get_footer(); ?>