<?php 

defined( 'ABSPATH' ) || exit;

global $blog_id;

// Closes div
function closeDiv() {
	?>

	</div>

	<?php
}

// Defines blog pages
if ( ! function_exists ( 'is_blog' ) ) {

	function is_blog() {

	    return ( is_archive() || is_author() || is_category() || is_single() || is_tag()) && 'post' == get_post_type();

	}

}

// Post Metadata
if ( ! function_exists ( 'citadel_post_meta' ) ) {

	function citadel_post_meta() {

		?>

		<p class="post-meta">

			<span class="attribution-meta"><?php echo bloginfo( 'name' ); ?> Blog</span>

			<?php if ( is_single() ) { ?>

				<span class="sep">|</span>

				<span class="date-meta"><?php echo the_date(); ?></span>

				<?php if ( has_category() ) : ?>

				<span class="category-meta"><?php echo get_the_category_list( ',' ); ?></span>

				<?php endif; ?>

				<?php if ( has_tag() ) : ?>

				<span class="tag-meta"><?php echo get_the_tag_list( '', ', ' ); ?></span>

				<?php endif; ?>

			<?php } ?>

		</p>

		<?php

	}

}

// Entry Header
if ( ! function_exists ( 'citadel_entry_header' ) ) {

	function citadel_entry_header() {

		if ( ( is_home() || is_front_page() ) && has_post_thumbnail() ) { ?>

			<header class="entry-header home-header header-image">

				<h1 class="wrapper text-center"><?php echo bloginfo('name'); ?></h1>

				<?php the_post_thumbnail( 'post-thumbnail', ['role' => 'presentation'] ); ?>

			</header>

		<?php } else { ?>

			<header class="entry-header">

			<?php 

			if ( is_blog() ) {

				if ( function_exists('citadel_post_meta')) citadel_post_meta();

			} else {

				if ( function_exists('the_breadcrumb') ) the_breadcrumb();

			}

			?>

			<?php if ( is_home() || is_front_page() ) : ?>

				<h1 class="wrapper text-center "><?php echo bloginfo('name'); ?></h1>

			<?php elseif ( is_404() ): ?>

				<h1 class="wrapper text-center"><?php echo __( 'Sorry, this page cannot be found!' ); ?></h1>

			<?php else: ?>

				<h1 class="wrapper text-center"><?php the_title(); ?></h1>

			<?php endif; ?>

			</header>

		<?php }
	}

}

// Function subsite frontpage
if ( ! function_exists ( 'citadel_subsite_frontpage' ) ) {

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

}

// Citadel top header wordmark
if ( ! function_exists ( 'citadel_top_header_wordmark' ) ) {

	function citadel_top_header_wordmark() {

		global $blog_id;

		if ( 1 != $blog_id ) :

		?>
			<div class="wrapper flex-container flex-between">

				<a href="https://citadel.edu/" title="Go to The Citadel home page" aria-label="Go to The Citadel home page" class="institution-title flex-item flex-middle" rel="home">

					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/wordmark/Citadel_Logo_Wordmark_Reverse.png" alt="The Citadel Wordmark">

				</a>

		<?php else : ?>

			<div class="wrapper flex-container flex-row-rev">

		<?php

		endif;

	}

}

// Citadel main header logo lockup
if ( ! function_exists ( 'citadel_lockup_logo' ) ) {

	function citadel_lockup_logo() {

		?>

		<a class="header-logo main-logo flex-item flex-middle" title="Go to The Citadel home page" aria-label="Go to The Citadel home page" href="<?php echo esc_url( 'https://citadel.edu/' ); ?>" rel="home">

			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/brand_signature/Citadel_Logo_Signature_Horizontal_Reverse.png" alt="The Citadel Brandmark">

		</a>

		<?php

	}

}

// Citadel main subsite header lockup
if ( ! function_exists ( 'citadel_subsite_lockup' ) ) {

	function citadel_subsite_lockup() {

		?>

		<a class="header-logo flex-item flex-middle" title="Go to The Citadel home page" aria-label="Go to The Citadel home page" href="<?php echo esc_url( 'https://citadel.edu/' ); ?>" rel="home">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/brandmark/Citadel_Logo_Brandmark_Reverse.png" alt="The Citadel Brandmark">
		</a>
		<div class="lockup-text flex-item flex-center flex-col">
			
			<div class="current-site flex-item">

				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class=""><?php echo bloginfo('name'); ?></a>

			</div>

		</div>

		<?php

	}

}

// Citadel network subsite header lockup
if ( ! function_exists ( 'citadel_network_subsite_lockup' ) ) {

	function citadel_network_subsite_lockup() {

		?>

		<a class="header-logo flex-item flex-middle" title="Go to The Citadel home page" aria-label="Go to The Citadel home page" href="<?php echo esc_url( 'https://citadel.edu/' ); ?>" rel="home">

			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/brandmark/Citadel_Logo_Brandmark_Reverse.png" alt="The Citadel Brandmark">

		</a>

		<div class="lockup-text flex-item flex-center flex-col">
			
			<div class="current-site flex-item">

				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class=""><?php echo bloginfo('name'); ?></a>

			</div>

			<?php if ( 1 !== $blog_id ) : ?>

			<div class="parent-site flex-item">

				<a href="<?php echo esc_url(get_blog_details( 1 )->path ); ?>" class=""><?php echo get_blog_details( 1 )->blogname; ?></a>

			</div>

			<?php endif; ?>
		</div>

		<?php

	}

}

// Login link in footer
if ( ! function_exists( 'citadel_footer_login' ) ) {

	function citadel_footer_login() {

		$allow = "(^155\.225\.\d+\.\d+$)";

		$login_text = sprintf(
			' | <a href="%1$s">%2$s</a>',
			esc_url( site_url() . '/wp-admin', 'citadel' ),
			sprintf(
				esc_html__( 'Login' )
			)
		);

		$allowed = preg_match( $allow, $_SERVER['REMOTE_ADDR'] ) ? $login_text : '';

		echo $allowed;

	}

}







