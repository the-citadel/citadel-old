<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( ( is_home() || is_front_page() ) && has_post_thumbnail() ) : ?>

		<header class="wrapper entry-header home-header header-image">
			<h1 class="text-center wrapper"><?php echo bloginfo('name'); ?></h1>
			<?php the_post_thumbnail(); ?>
		</header>

	<?php else: ?>

		<?php if ( is_home() || is_front_page() ) : ?>

			<header class="wrapper entry-header home-header">
				<h1 class="text-center "><?php echo bloginfo('name'); ?></h1>

		<?php else: ?>

			<header class="wrapper entry-header">
				<?php if (function_exists('the_breadcrumb')) the_breadcrumb(); ?>
				<h1 class="text-center"><?php the_title(); ?></h1>

		<?php endif; ?>

			</header>

	<?php endif; ?>

	<div class="entry-content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
