<?php 

defined( 'ABSPATH' ) || exit;

?>

</main>
<!-- End Page Content -->

<!-- Start Footer -->
<footer id="footer" role="contentinfo">

	<div class="main-footer wrapper text-center">
		<a href="https://citadel.edu/" class="footer-brand">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/brand_signature/Citadel_Logo_Signature_Horizontal_Reverse.png" alt="The Citadel Brandmark">
		</a>
		<div class="footer-contact address">
			<a href="<?php echo esc_url( 'https://www.google.com/maps/place/The+Citadel/@32.797075,-79.9606739,15z/data=!4m5!3m4!1s0x0:0x3b31932293c50008!8m2!3d32.797075!4d-79.9606739' ); ?>" target="_blank">171 Moultrie Street<br/>Charleston, SC 29409</a>
		</div>
		<div class="footer-contact phone">
			<a href="tel:+18432253294">843.225.3294</a>
		</div>
		<div class="footer-contact">
			<?php include 'template-parts/footer/social.php' ?>
		</div>
	</div>

	<div class="report-issue wrapper text-center">
		<span>Outdated? Incorrect? Broken? <a href="<?php echo esc_url( 'https://web.citadel.edu/issue' ); ?>" id="report-problem">Report a problem with this page.</a></span>
	</div>

	<div class="bottom-footer wrapper flex-container">
		<div class="copyright flex-item flex-middle">

			<?php

				$allow = "(^155\.225\.\d+\.\d+$)";

				$login_text = sprintf(
					' | <a href="%1$s">%2$s</a>',
					esc_url( site_url() . '/wp-admin', 'citadel' ),
					sprintf(
						esc_html__( 'Login' )
					)
				);

				$allowed = preg_match( $allow, $_SERVER['REMOTE_ADDR'] ) ? $login_text : '';

			?>

			<span>&copy; <?php date( 'Y' ); ?> <a href="<?php echo esc_url( 'https://citadel.edu' ); ?>">The Citadel</a>. All rights reserved.<?php echo $allowed; ?></span>
		</div>
	</div>

</footer>
<!-- End Footer -->

<?php include 'template-parts/footer/footer_scripts.php' ?>
<?php include 'template-parts/footer/custom_scripts.php' ?>

<?php wp_footer(); ?>
</body>
</html>