<?php 

defined( 'ABSPATH' ) || exit;

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php citadel_entry_header(); ?>

	<div class="page-content">

		<div class="wrapper flex-container mobile-no-flex">

			<?php if ( has_nav_menu( 'leftmenu' ) ): ?>

				<?php get_sidebar(); ?>

			<?php endif; ?>

			<div class="flex-item content-container">

				<div class="entry-content<?php if ( !has_nav_menu( 'leftmenu' ) ): ?> no-sidebar<?php endif; ?>">

					<?php the_content(); ?>

				</div>

			</div><!-- .entry-content -->

		</div>
		
	</div>

	<?php citadel_subsite_frontpage(); ?>

</article><!-- #post-<?php the_ID(); ?> -->
