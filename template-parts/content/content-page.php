<?php 

defined( 'ABSPATH' ) || exit;

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( ( is_home() || is_front_page() ) && has_post_thumbnail() ) : ?>

		<header class="wrapper entry-header home-header header-image">
			<h1 class="text-center wrapper"><?php echo bloginfo('name'); ?></h1>
			<?php the_post_thumbnail(); ?>
		</header>

	<?php else: ?>

		<header class="wrapper entry-header">

			<?php if (function_exists('the_breadcrumb')) the_breadcrumb(); ?>

			<?php if ( is_home() || is_front_page() ) : ?>

				<h1 class="text-center "><?php echo bloginfo('name'); ?></h1>

			<?php else: ?>

				<h1 class="text-center"><?php the_title(); ?></h1>

			<?php endif; ?>

		</header>

	<?php endif; ?>
	<div class="wrapper flex-container page-content mobile-no-flex">
		<?php if ( has_nav_menu( 'leftmenu' ) ): ?>
			<?php get_sidebar(); ?>
		<?php endif; ?>
		<div class="flex-item content-container">
			<div class="entry-content<?php if ( !has_nav_menu( 'leftmenu' ) ): ?> no-sidebar<?php endif; ?>">
				<?php the_content(); ?>
			</div>
		</div><!-- .entry-content -->
	</div>

</article><!-- #post-<?php the_ID(); ?> -->
