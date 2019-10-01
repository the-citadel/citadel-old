<?php 

defined( 'ABSPATH' ) || exit;

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( has_post_thumbnail() ) : ?>

		<header class="wrapper entry-header home-header header-image">
			<h1 class="text-center wrapper"><?php echo bloginfo('name'); ?></h1>
			<?php the_post_thumbnail(); ?>
		</header>

	<?php else: ?>

		<header class="wrapper entry-header">

			<?php if (function_exists('the_breadcrumb')) the_breadcrumb(); ?>

			<h1 class="text-center "><?php echo bloginfo('name'); ?></h1>

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

<?php if (is_active_sidebar('home-cta')) : ?>
<section id="home-cta">

	<div class="wrapper">

		<?php dynamic_sidebar('home-cta'); ?>

	</div>

</section>
<?php endif; ?>

<?php if (is_active_sidebar('home-featured-video')) : ?>
<section id="home-featured-video">

	<div class="wrapper">

		<?php dynamic_sidebar('home-featured-video'); ?>

	</div>

</section>
<?php endif; ?>