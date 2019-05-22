<?php get_header(); ?>

<?php if (is_active_sidebar('left-sidebar')) { ?>
<aside id="left-sidebar" class="sidebar">
	<?php dynamic_sidebar('left-sidebar'); ?>
</aside>
<?php } ?>

<div id="main-content">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<h1 class="entry-title">404: Page Not Found</h1>
		</header><!-- .entry-header -->
		<div class="entry-content">
			<p>The page you are looking for cannot be found.</p>
			<p>Please select a menu option, go to <a href="<?php echo get_site_url(); ?>"><?php echo get_bloginfo( 'name' ); ?> Home</a>, or search below.</p>
			<?php include 'searchform.php'; ?>
		</div><!-- .entry-content -->
	</article><!-- #post-## -->
</div>

<?php if (is_active_sidebar('right-sidebar')) { ?>
<aside id="right-sidebar" class="sidebar">
	<?php dynamic_sidebar('right-sidebar'); ?>
</aside>
<?php } ?>
<?php get_footer(); ?>