<?php
	global $blog_id;
	$current_blog_id = $blog_id;
?>
</main>
<!-- End Page Content -->

<!-- Start Footer -->
<footer id="footer">
	<div class="main-footer">
		<div class="container">
			<?php 
				switch_to_blog(1);
			?>
			<div id="middle-footer">
				<a href="<?php echo network_site_url(); ?>">
				<img src="<?php echo network_site_url(); ?>/wp-content/themes/citadel/assets/images/citadel-logo-reverse.png" alt="White Citadel PT Barracks Brandmark" /></a>
			</div>
			<div id="left-footer">
			<?php
				wp_nav_menu( array(
					'theme_location' => 'leftfooter',
					'menu_id'        => 'leftfooter',
					'container' 	 => '',
				) ); 
			?>
			</div>
			<div id="right-footer">
			<?php
				wp_nav_menu( array(
					'theme_location' => 'rightfooter',
					'menu_id'        => 'rightfooter',
					'container' 	 => '',
				) ); 
			?>
			</div>
			<div class="clear"></div>
			<?php switch_to_blog($current_blog_id); ?>
			<?php include 'template-parts/header/socialicons.php' ?>
			<div class="address">
				<span>171 Moultrie Street | Charleston, SC 29409 | 843.225.3294</span>
			</div>
		</div>
	</div>
	<div class="report-issue">
		<span>Outdated? Incorrect? Broken? <a href="#">Report a problem with this page.</a></span>
	</div>
	<div class="secondary-footer">
		<div class="container">
			<div id="copyright">
				<span>&copy; <?php echo date("Y"); ?> <a href="<?php echo network_site_url(); ?>">The Citadel</a>. All rights reserved. | <a href="<?php echo network_site_url(); ?>/admin">Login</a></span>
			</div>
			<?php switch_to_blog(1); ?>
			<div id="legal-menu">
				<?php
					wp_nav_menu( array(
						'theme_location' => 'legalfooter',
						'menu_id'        => 'legalfooter',
						'container' 	 => '',
					) ); 
				?>
			</div>
			<?php switch_to_blog($current_blog_id); ?>
		</div>
	</div>
</footer>
<!-- End Footer -->

<?php wp_footer(); ?>
<?php include 'footercode.php' ?>
</body>
</html>