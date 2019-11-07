<?php 

defined( 'ABSPATH' ) || exit;

?>
<?php if ( has_nav_menu( 'leftmenu' ) ): ?>

	<aside class="sidebar" role="complementary">

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

		<div id="sidebar-buttons">

		<?php if (is_active_sidebar('sidebar-buttons')) : ?>
				
			<?php dynamic_sidebar('sidebar-buttons'); ?>

		<?php else: ?>

			<div class="widget widget_citadel_cta_widget">
				<a href="http://www.citadel.edu/root/applyhub">
					<div class="cta-icon">
						<i class="fa-fw fas fa-check-square"></i>
					</div>
					<span class="cta-title">Apply Online</span>
				</a>
			</div>

			<div class="widget widget_citadel_cta_widget">
				<a href="http://www.citadel.edu/root/information-request">
					<div class="cta-icon">
						<i class="fa-fw fas fa-info-circle"></i>
					</div>
					<span class="cta-title">Request Info</span>
				</a>
			</div>

			<div class="widget widget_citadel_cta_widget">
				<a href="http://www.citadel.edu/root/schedule-a-visit">
					<div class="cta-icon">
						<i class="fa-fw fas fa-map-pin"></i>
					</div>
					<span class="cta-title">Visit Campus</span>
				</a>
			</div>

		<?php endif; ?>

		</div>

	</aside>
<?php endif; ?>
