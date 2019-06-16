<?php get_header(); ?>


<header class="entry-header">
	<h1 class="entry-title">404: Page Not Found</h1>
</header><!-- .entry-header -->

<?php if ( has_nav_menu( 'leftmenu' ) ): ?>
<aside id="left-sidebar" class="sidebar">
	<div class="widget_nav_menu">
		<h2 class="widgettitle">
			<a href="<?php echo site_url(); ?>"><i class="fas fa-bars"></i><?php echo bloginfo(); ?></a>
		</h2>
		<?php wp_nav_menu( array(
			'theme_location' 	=> 'leftmenu',
			'menu_id'        	=> 'leftmenu',
			'container' 	 	=> '',
			'depth'				=> 1,
		) ); ?>
	</div>
</aside>
<?php endif; ?>

<article id="main-content"<?php if ( !has_nav_menu('leftmenu') ) : ?> class="no-sidebar"<?php endif; ?>>
	<div class="entry-content">
		<p>The page you are looking for cannot be found.</p>
		<p>Please select a menu option, go to <a href="<?php echo get_site_url(); ?>"><?php echo get_bloginfo( 'name' ); ?> Home</a>, or search below.</p>
		<?php include 'template-parts/header/search-toggle.php'; ?>
	</div><!-- .entry-content -->
</article>

<?php get_footer(); ?>