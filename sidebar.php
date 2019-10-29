<?php 

defined( 'ABSPATH' ) || exit;

?>

<aside class="sidebar" role="complementary">

	<?php if ( has_nav_menu( 'leftmenu' ) ): ?>

		<nav class="widget_nav_menu" role="navigation" aria-label="local navigation">

			<span class="screen-reader-text">Department Menu</span>

			<?php

			if ( is_home() || is_front_page() ) :

				wp_nav_menu( array(
					'theme_location'	=> 'leftmenu',
					'menu_id'        	=> 'leftmenu',
					'container' 	 	=> '',
					'items_wrap'		=> '<ul id="%1$s" class="%2$s"><li class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item current_page_item"><a href="' . esc_url( home_url( '/' ) ) . '">Home</a></li>%3$s</ul>',
				) );

			else :

				wp_nav_menu( array(
					'theme_location'	=> 'leftmenu',
					'menu_id'        	=> 'leftmenu',
					'container' 	 	=> '',
					'items_wrap'		=> '<ul id="%1$s" class="%2$s"><li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="' . esc_url( home_url( '/' ) ) . '">Home</a></li>%3$s</ul>',
				) );

			endif;

			?>

		</nav>

	<?php endif; ?>

	<?php if ( !is_page() ): ?>

		<div class="blog-widgets">

			<h4>Recent Blog Posts</h4>
			
		</div>

	<?php endif; ?>

	<div id="sidebar-buttons">

	<?php if (is_active_sidebar('sidebar-buttons')) : ?>
			
		<?php dynamic_sidebar('sidebar-buttons'); ?>

	<?php else: ?>



	<?php endif; ?>

	</div>

</aside>