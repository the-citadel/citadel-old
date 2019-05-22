<?php get_header(); ?>

<?php if (is_active_sidebar('left-sidebar')) : ?>
<aside id="left-sidebar" class="sidebar">
	<?php dynamic_sidebar('left-sidebar'); ?>
</aside>
<?php endif; ?>

<article id="main-content"<?php if (is_active_sidebar('left-sidebar')) : ?> class="no-sidebar"<?php endif; ?>>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header><!-- .entry-header -->
		<div class="entry-content">
			<?php
				echo the_content();
			?>
		</div><!-- .entry-content -->
	</article><!-- #post-## -->
	<?php endwhile; ?>
	<?php endif; ?>
</article>

<?php if (is_active_sidebar('right-sidebar')) { ?>
<aside id="right-sidebar" class="sidebar">
	<?php dynamic_sidebar('right-sidebar'); ?>
</aside>
<?php } ?>
<div class="clear"></div>
<?php get_footer(); ?>