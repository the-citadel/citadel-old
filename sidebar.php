<aside class="sidebar" role="complementary">
	<?php if ( has_nav_menu( 'leftmenu' ) ): ?>
		<nav class="widget_nav_menu" role="navigation" aria-label="local navigation">
			<?php wp_nav_menu( array(
				'theme_location' => 'primary',
				'menu_id'        => 'primary',
				'container' 	 => '',
			) ); ?>
		</nav>
	<?php endif; ?>
</aside>