<?php 

defined( 'ABSPATH' ) || exit;

?>

<?php get_header(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php citadel_entry_header(); ?>

	<div class="page-content">

		<div class="wrapper flex-container">

			<?php if ( has_nav_menu( 'leftmenu' ) ): ?>

				<?php get_sidebar(); ?>

			<?php endif; ?>

			<div class="flex-item content-container">

				<div class="entry-content<?php if ( !has_nav_menu( 'leftmenu' ) ): ?> no-sidebar<?php endif; ?>">

					<h2><?php echo __( 'Why you are seeing this message' ); ?></h2>

					<ul>
						<li><?php echo __( 'This page has moved' ); ?></li>
						<li><?php echo __( 'The page no longer exists' ); ?></li>
						<li><?php echo __( 'The URL is incorrect' ); ?></li>
					</ul>

					<p class="message-404">We are working on locating this page. In the meantime, please select an option from the <span class="desktop">left</span> menu<span class="mobile"> above</span>, see our popular pages or search the entire Citadel website below.</p>

					<h3>Popular pages</h3>

					<nav role="navigation" aria-label="popular pages navigation">
						<ul>
							<li><a href="<?php echo esc_url( 'https://citadel.edu/' ); ?>">Citadel Home</a></li>
							<li><a href="<?php echo esc_url( 'https://corps.citadel.edu/' ); ?>">Corps of Cadets</a></li>
							<li><a href="<?php echo esc_url( 'https://graduate.citadel.edu/' ); ?>">Graduate College</a></li>
							<li><a href="<?php echo esc_url( 'https://transfer.citadel.edu/' ); ?>">College Transfer Program</a></li>
							<li><a href="<?php echo esc_url( 'https://online.citadel.edu/' ); ?>">Online Program</a></li>
							<li><a href="<?php echo esc_url( 'https://veterans.citadel.edu/' ); ?>">Veterans</a></li>
						</ul>
					</nav>

					<button class="search-toggle"><?php echo __( 'Search The Citadel website' ); ?></button>

				</div>

			</div><!-- .entry-content -->

		</div>
		
	</div>

	<?php citadel_subsite_frontpage(); ?>

</article><!-- #post-<?php the_ID(); ?> -->

<?php get_footer(); ?>