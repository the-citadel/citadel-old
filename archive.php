<?php 

defined( 'ABSPATH' ) || exit;

?>

<?php get_header(); ?>

<?php

/* Start the Loop */
while ( have_posts() ) : ?>

	<header class="wrapper entry-header">
		
			<?php if (function_exists('citadel_post_meta')) citadel_post_meta(); ?>

			<h1 class="text-center"><?php the_archive_title(); ?></h1>

	</header>

	<div class="wrapper flex-container page-content mobile-no-flex">
	<?php if ( has_nav_menu( 'leftmenu' ) ): ?>
		<?php get_sidebar(); ?>
	<?php endif; ?>
		<div class="flex-item content-container">
			<div class="entry-content<?php if ( !has_nav_menu( 'leftmenu' ) ): ?> no-sidebar<?php endif; ?>">

	<?php
	the_post();

	get_template_part( 'template-parts/content/content', 'excerpt' ); ?>

			</div>
		</div><!-- .entry-content -->
	</div>

<?php
endwhile; // End of the loop.
?>


	
		

<?php get_footer(); ?>