<?php

	get_header();

		if ($blog_id == 1) {
		?>
		<article id="citadel-home-content">
		<?php
			get_template_part( 'template-parts/page/content', 'citadel_home' );
		} else {
		?>
		<article id="site-home-content">
		<?php
			get_template_part( 'template-parts/page/content', 'site_home' );
		}
?>
		</article>
<?php
 	get_footer();

?>