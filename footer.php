<?php 

defined( 'ABSPATH' ) || exit;

?>

</main>
<!-- End Page Content -->

<!-- Start Footer -->
<footer id="footer" role="contentinfo">

	<div class="main-footer text-center">

		<div class="wrapper flex-container flex-middle flex-between">

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

				<?php get_template_part( 'template-parts/footer/social.php' ); ?>

			</div>

		</div>

	</div>

	<div class="report-issue text-center">

		<div class="wrapper">

			<span>Outdated? Incorrect? Broken? <a href="<?php echo esc_url( 'https://web.citadel.edu/issue' ); ?>" id="report-problem">Report a problem with this page.</a></span>

		</div>

	</div>

	<div class="bottom-footer">

		<div class="wrapper flex-container">

			<div class="copyright flex-item flex-middle">

				<span>&copy; <?php date( 'Y' ); ?> <a href="<?php echo esc_url( 'https://citadel.edu' ); ?>">The Citadel</a>. All rights reserved.<?php citadel_footer_login(); ?></span>

			</div>

			<?php get_template_part( 'template-parts/footer/footer-nav.php' ); ?>

		</div>

	</div>

</footer>
<!-- End Footer -->

<?php wp_footer(); ?>

</body>

</html>