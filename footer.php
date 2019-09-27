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
			<a href="https://www.google.com/maps/place/The+Citadel/@32.797075,-79.9606739,15z/data=!4m5!3m4!1s0x0:0x3b31932293c50008!8m2!3d32.797075!4d-79.9606739" target="_blank">171 Moultrie Street<br/>Charleston, SC 29409</a>
		</div>
		<div class="footer-contact phone">
			<a href="tel:+18432253294">843.225.3294</a>
		</div>
		<div class="footer-contact">
			<?php include 'template-parts/footer/social.php' ?>
		</div>
	</div>

	<div class="report-issue wrapper text-center">
		<span><?php citadel_report_problem(); ?></span>
	</div>

	<div class="bottom-footer wrapper flex-container">
		<div class="copyright flex-item flex-middle">
			<span><?php citadel_footer_copyright(); ?></span>
		</div>
	</div>

</footer>
<!-- End Footer -->

<?php wp_footer(); ?>

<?php include 'template-parts/footer/footer_scripts.php' ?>
<?php include 'template-parts/footer/custom_scripts.php' ?>

</body>
</html>

<?php wp_footer(); ?>
</body>
</html>