<?php 

defined( 'ABSPATH' ) || exit;

function is_blog () {
    return ( is_archive() || is_author() || is_category() || is_single() || is_tag()) && 'post' == get_post_type();
}

// Post Metadata
function citadel_post_meta() {

	if ( is_single() ) {
	?>
		<p class="post-meta">
			<span class="attribution-meta"><?php echo bloginfo( 'name' ); ?> Blog</span>
			<span class="sep">|</span>
			<span class="date-meta"><?php echo the_date(); ?></span>
			<?php if ( has_category() ) : ?>
			<span class="category-meta"><?php echo get_the_category_list( ',' ); ?></span>
			<?php endif; ?>
			<?php if ( has_tag() ) : ?>
			<span class="tag-meta"><?php echo get_the_tag_list( '', ', ' ); ?></span>
			<?php endif; ?>
		</p>
	<?php
	} else {
	?>
		<p class="post-meta">
			<span class="attribution-meta"><?php echo bloginfo( 'name' ); ?> Blog</span>
		</p>
	<?php
	}

}

// Entry Header
function citadel_entry_header() {
	if ( ( is_home() || is_front_page() ) && has_post_thumbnail() ) : ?>

		<header class="entry-header home-header header-image">
			<div class="wrapper">
				<h1 class="text-center"><?php echo bloginfo('name'); ?></h1>
				<?php the_post_thumbnail( 'post-thumbnail', ['role' => 'presentation'] ); ?>
			</div>
		</header>

	<?php else: ?>

		<header class="entry-header">

			<div class="wrapper">

			<?php 

			if ( is_blog() ) {

				if (function_exists('citadel_post_meta')) citadel_post_meta();

			} else {

				if (function_exists('the_breadcrumb')) the_breadcrumb();

			}
			

			?>

			<?php if ( is_home() || is_front_page() ) : ?>

				<h1 class="text-center "><?php echo bloginfo('name'); ?></h1>

			<?php elseif ( is_404() ): ?>

				<h1 class="text-center"><?php echo __( 'Sorry, this page cannot be found!' ); ?></h1>

			<?php else: ?>

				<h1 class="text-center"><?php the_title(); ?></h1>

			<?php endif; ?>

			</div>

		</header>

	<?php endif;
}

// Function subsite frontpage
function citadel_subsite_frontpage() {

	if ( is_home() || is_front_page() ) {

		if (is_active_sidebar('home-cta')) : ?>

		<section id="home-cta">

			<div class="wrapper">

				<?php dynamic_sidebar('home-cta'); ?>

			</div>

		</section>

	<?php

		endif;

		if (is_active_sidebar('home-featured-video')) : ?>

		<section id="home-featured-video">

			<div class="wrapper">

				<?php dynamic_sidebar('home-featured-video'); ?>

			</div>

		</section>

	<?php 

		endif;

	}

}
