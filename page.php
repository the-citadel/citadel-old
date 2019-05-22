<?php get_header(); ?>

<?php if (is_active_sidebar('left-sidebar')) : ?>
<aside id="left-sidebar" class="sidebar">
	<?php dynamic_sidebar('left-sidebar'); ?>
</aside>
<?php endif; ?>

<article id="main-content"<?php if (is_active_sidebar('left-sidebar')) : ?> class="no-sidebar"<?php endif; ?>>
	<?php if ( ($blog_id == 1) && !(is_front_page()) ) { ?>
	<div id="breadcrumbs">
		<?php include 'template-parts/page/breadcrumbs.php' ?>
	</div>
	<?php } else if ($blog_id != 1) { ?>
	<div id="breadcrumbs">
		<?php include 'template-parts/page/breadcrumbs.php' ?>
	</div>
	<?php 
	}

	while (have_posts()) : the_post();

		if (($blog_id == 1) && (is_front_page())) {
			get_template_part( 'template-parts/page/content', 'homepage' );
		} else {
			get_template_part( 'template-parts/page/content', 'page' );
		}

	endwhile;
	?>
</article>

<?php if ((is_active_sidebar('right-sidebar')) && !(is_active_sidebar('left-sidebar'))) : ?>
<aside id="right-sidebar" class="sidebar">
	<?php dynamic_sidebar('right-sidebar'); ?>
</aside>
<?php endif; ?>
<?php get_footer(); ?>