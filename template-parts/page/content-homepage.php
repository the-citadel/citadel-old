<?php get_header(); ?>

<!-- Home Banner -->
<section id="home-banner">
	<video autoplay="" loop="true" muted="" playsinline="" preload="metadata" width="100%" height="auto" poster="http://citadel.edu/root/images/OEA/OMC/photos/pt-barracks-marching.png"> <source src="http://citadel.edu/root/images/OEA/OMC/videos/omc-faces.webm" type="video/webm"><source src="http://citadel.edu/root/images/OEA/OMC/videos/omc-faces.mp4" type="video/mp4"><source src="http://citadel.edu/root/images/OEA/OMC/videos/omc-faces.ogv" type="video/ogg"> Your browser does not support the video tag. </video>
</section>
<!-- End Home Banner -->

<!-- Home Infographic -->
<section id="home-infographic">
	<div class="container">
		<a href="#">
			<img src="<?php echo network_site_url(); ?>/wp-content/themes/citadel/assets/images/homepage/infographic-01.png" onmouseover="this.src='/citadel-test/wp-content/themes/citadel/assets/images/homepage/infographic-hover-01.png';" onmouseout="this.src='/citadel-test/wp-content/themes/citadel/assets/images/homepage/infographic-01.png';" alt="Citadel Cadets' Commission Rate">
			<p class="link-copy">Approximately 1 in 3 cadets earns a commission into the United States Armed Forces upon graduation.</p>
		</a>
		<a href="#">
			<img src="<?php echo network_site_url(); ?>/wp-content/themes/citadel/assets/images/homepage/infographic-02.png" onmouseover="this.src='/citadel-test/wp-content/themes/citadel/assets/images/homepage/infographic-hover-02.png';" onmouseout="this.src='/citadel-test/wp-content/themes/citadel/assets/images/homepage/infographic-02.png';" alt="#1 Public College in the South">
			<p class="link-copy">The Citadel is ranked #1 Public College in the South offering up to a master's degree by <em>U.S. News &amp; World Report</em>.</p>
		</a>
		<a href="#">
			<img src="<?php echo network_site_url(); ?>/wp-content/themes/citadel/assets/images/homepage/infographic-03.png" onmouseover="this.src='/citadel-test/wp-content/themes/citadel/assets/images/homepage/infographic-hover-03.png';" onmouseout="this.src='/citadel-test/wp-content/themes/citadel/assets/images/homepage/infographic-03.png';" alt="Citadel Student Faculty Ratio">
			<p class="link-copy">The 12:1 student-faculty ratio ensures direct access to nationally recognized scholars.</p>
		</a>
		<a href="#">
			<img src="<?php echo network_site_url(); ?>/wp-content/themes/citadel/assets/images/homepage/infographic-04.png" onmouseover="this.src='/citadel-test/wp-content/themes/citadel/assets/images/homepage/infographic-hover-04.png';" onmouseout="this.src='/citadel-test/wp-content/themes/citadel/assets/images/homepage/infographic-04.png';" alt="Citadel Study Abroad Countries">
			<p class="link-copy">Citadel students in 23 countries across several continents are immersed in study abroad programs.</p>
		</a>
	</div>
</section>
<!-- End Home Infographic -->

<!-- Home Spotlights -->
<section id="home-spotlights">
	<div class="container">
		<h2>Campus Spotlights</h2>
		<div class="spotlight">
			<?php dynamic_sidebar('home-spotlight-1'); ?>
		</div>
		<div class="spotlight">
			<?php dynamic_sidebar('home-spotlight-2'); ?>
		</div>
		<div class="spotlight">
			<?php dynamic_sidebar('home-spotlight-3'); ?>
		</div>
		<div class="spotlight">
			<?php dynamic_sidebar('home-spotlight-4'); ?>
		</div>
	</div>
</section>
<!-- End Spotlights -->

<!-- Home CTAs -->
<section id="home-ctas">
	<div class="container">
		<a href="#"><i class="fas fa-fw fa-pencil-alt"></i><span class="link-copy">Apply Now</span></a>
		<a href="#"><i class="fas fa-fw fa-info"></i><span class="link-copy">Request Info</span></a>
		<a href="#"><i class="fas fa-fw fa-calendar-alt"></i><span class="link-copy">Schedule a Visit</span></a>
		<a href="#"><i class="fas fa-fw fa-map-pin"></i><span class="link-copy">Virtual Tour</span></a>
	</div>
</section>
<!-- End Home CTAs -->

<!-- Home Journey -->
<section id="home-journey">
	<div class="container">
		<h2>Begin Your Journey</h2>
		<div class="left-half">
			<a href="#">
				<img src="<?php echo network_site_url(); ?>/wp-content/themes/citadel/assets/images/homepage/corps-of-cadets.jpg" alt="Citadel Corps of Cadets with class rings">
				<div><p>Corps of Cadets</p></div>
			</a>
		</div>
		<div class="right-half">
			<div class="top-half">
				<a href="#">
					<img src="<?php echo network_site_url(); ?>/wp-content/themes/citadel/assets/images/homepage/graduate-college.jpg" alt="Citadel Graduate College Students">
					<div><p>Graduate College</p></div>
				</a>
				<a href="#">
					<img src="<?php echo network_site_url(); ?>/wp-content/themes/citadel/assets/images/homepage/evening-undergrad.jpg" alt="Citadel Evening Undergraduate Studies Student">
					<div><p>Evening Undergrad</p></div>
				</a>
			</div>
			<div class="bottom-half">
				<a href="#">
					<img src="<?php echo network_site_url(); ?>/wp-content/themes/citadel/assets/images/homepage/veterans.jpg" alt="Citadel Veteran Student">
					<div><p>Veterans</p></div>
				</a>
				<a href="#">
					<img src="<?php echo network_site_url(); ?>/wp-content/themes/citadel/assets/images/homepage/online-programs.jpg" alt="Citadel Online Student">
					<div><p>Online</p></div>
				</a>
			</div>
		</div>
	</div>
</section>
<!-- End Home Journey -->

<!-- Home News & Events -->
<section id="home-news-events">
	<div class="container">
		<h2>Campus Newsroom</h2>
		<?php
			$rss = new DOMDocument();
			$rss->load('https://today.citadel.edu/category/featured/feed/');
			$feed = array();
			foreach ($rss->getElementsByTagName('item') as $node) {
				$item = array ( 
					'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
					'desc' => $node->getElementsByTagName('description')->item(0)->nodeValue,
					'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
					'date' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue,
					);
				array_push($feed, $item);
			}

			$limit = 3;
			for($x=0;$x<$limit;$x++) {
				$title = str_replace(' & ', ' &amp; ', $feed[$x]['title']);
				$link = $feed[$x]['link'];
				$description = $feed[$x]['desc'];

				echo '<div class="news-item"><a href="'.$link.'" title="'.$title.'"><p>'.$description.'</p></a></div>';
			}
		?>
		<div class="clear"></div>
	</div>
</section>
<!-- End Home News & Events -->

<?php
	if (is_active_sidebar('home-video')) :
?>
<!-- Home Video -->
<section id="home-video">
	<div class="container">
	<?php dynamic_sidebar('home-video'); ?>
	</div>
</section>
<!-- End Home Video -->
<?php endif; ?>

<?php get_footer(); ?>