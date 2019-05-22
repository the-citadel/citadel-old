<?php get_header(); ?>

<div id="main-content">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header>
		<div class="entry-content">
			<?php
				echo the_content();
			?>
		</div>
	</article>
	<?php endwhile; ?>
	<?php endif; ?>
</div>

<?php get_footer(); ?>