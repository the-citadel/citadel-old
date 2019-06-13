<?php
	global $blog_id;
	$current_blog_id = $blog_id;
?>
</main>
<!-- End Page Content -->

<!-- Start Footer -->
<footer id="footer">
	<section class="main-footer">
		<div class="container">
			<?php 
				switch_to_blog(1);
			?>
			<div class="footer-img">
				<a href="<?php echo network_site_url(); ?>">
					<img src="<?php echo network_site_url(); ?>/wp-content/themes/citadel/assets/images/citadel-logo-white.png" alt="<?php echo get_bloginfo( 'name' ); ?>">
				</a>
			</div>
			<div class="footer-contact">
				<i class="fas fa-map-marker-alt"></i>
				<span><a href="https://www.google.com/maps/place/The+Citadel/@32.797075,-79.9606739,15z/data=!4m5!3m4!1s0x0:0x3b31932293c50008!8m2!3d32.797075!4d-79.9606739" target="_blank">171 Moultrie Street<br/>Charleston, SC 29409</a></span>
			</div>
			<div class="footer-contact">
				<i class="fas fa-phone"></i>
				<span><a href="tel:+18432253294">843.225.3294</a></span>
			</div>
			<?php switch_to_blog($current_blog_id); ?>
			<?php include 'template-parts/header/socialicons.php' ?>
		</div>
	</section>

	<?php
		$issue_url = add_query_arg( 'SITE_URL', home_url( $wp->request ), network_site_url() . 'web/issue' );
	?>
	<section class="report-issue">
		<?php global $wp; ?>
		<span>Outdated? Incorrect? Broken? <a href="<?php echo $issue_url; ?>">Report a problem with this page.</a></span>
	</section>
	<section class="secondary-footer">
		<div class="container">
			<section id="footer-menus">
	            <div class="left-footer">
	            	
	            </div>
			</section>
			<div id="copyright">
				<span>&copy; <?php echo date("Y"); ?> <a href="<?php echo network_site_url(); ?>">The Citadel</a>. All rights reserved. | <a href="<?php echo site_url(); ?>/wp-admin" target="_blank">Login</a></span>
			</div>
			<?php switch_to_blog(1); ?>
			<div id="legal-menu">
				<?php if ( has_nav_menu( 'legalfooter' ) ): ?>
				<?php
					wp_nav_menu( array(
						'theme_location' => 'legalfooter',
						'menu_id'        => 'legalfooter',
						'container' 	 => '',
					) ); 
				?>
				<?php endif; ?>
			</div>
			<?php switch_to_blog($current_blog_id); ?>
		</div>
	</section>
</footer>
<!-- End Footer -->

<?php wp_footer(); ?>
<?php include 'footercode.php' ?>
</body>
</html>