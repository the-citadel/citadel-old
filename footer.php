</main>
<!-- End Page Content -->

<!-- Start Footer -->
<footer id="footer">

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
			<?php include 'php/social.php' ?>
		</div>
	</div>

	<div class="report-issue wrapper text-center">
		<span>Outdated? Incorrect? Broken? <a href="https://citadel.edu/web/issue">Report a problem with this page.</a></span>
	</div>

	<div class="bottom-footer wrapper flex-container">
		<div class="copyright flex-item flex-middle">
			<span>&copy; <?php echo date("Y"); ?> <a href="https://citadel.edu">The Citadel</a>. All rights reserved. | <a href="<?php echo site_url(); ?>/wp-admin" target="_blank">Login</a></span>
		</div>
	</div>

</footer>
<!-- End Footer -->

<?php wp_footer(); ?>

<?php include 'php/footer_scripts.php' ?>
<?php include 'php/custom_scripts.php' ?>

</body>
</html>

<?php wp_footer(); ?>
</body>
</html>