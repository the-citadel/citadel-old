<?php 

defined( 'ABSPATH' ) || exit;

?>

<aside class="sidebar flex-item" role="complementary">
	<?php if ( has_nav_menu( 'leftmenu' ) ): ?>
		<nav class="widget_nav_menu" role="navigation" aria-label="local navigation">
			<h3><button class="leftmenu-toggle"><i class="fas fa-bars fa-fw"></i><span class="screen-reader-text"><?php echo bloginfo('name'); ?> Menu</span></button><?php echo bloginfo('name'); ?></h3>
			<?php wp_nav_menu( array(
				'theme_location' => 'leftmenu',
				'menu_id'        => 'leftmenu',
				'container' 	 => '',
			) ); ?>
		</nav>
	<?php endif; ?>
</aside>