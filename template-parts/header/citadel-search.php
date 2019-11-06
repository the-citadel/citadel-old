<?php

defined( 'ABSPATH' ) || exit;

/**
 * Get posts via REST API.
 */
function get_posts_via_rest() {
	// Initialize variable.
	$allposts = [];
	$sites = array(
		'https://today.citadel.edu/',
		'https://krausecenter.citadel.edu/',
		'https://brand.citadel.edu/',
		'https://morganmspencer.com/',
		'https://creativecache.co/',
	);

	foreach ( $sites as $site ) {
		$response = wp_remote_get( $site . 'wp-json/wp/v2/pages?per_page=2' );

		// Exit if error.
		if ( is_wp_error( $response ) ) {
			return;
		}

		// Get the body.
		$posts = json_decode( wp_remote_retrieve_body( $response ) );

		// Exit if nothing is returned.
		if ( empty( $posts ) ) {
			return;
		}

		// If there are posts.
		if ( ! empty( $posts ) ) {
			// For each post.
			foreach ( $posts as $post ) {
				// Use print_r($post); to get the details of the post and all available fields
				// Show a linked title and post date.

				$title = esc_html( $post->title->rendered );
				$url = esc_url( $post->link );

				$allposts[$title] = $url;
			}
		}
	}

	if ( ! empty( $allposts ) ) {

		$sortedPages = ksort( $allposts );

		echo '<ul class="site-list">';

		foreach ($allposts as $title => $link) {
			
			echo '<li><a href="' . $link . '" target=\"_blank\">' . $title . '</a></li>';

		}

		echo'</ul>';

	}
}

?>


<div id="citadel-search">

	<div class="wrapper">
		<label for="citadel-search">
			<span class="screen-reader-text">Search The Citadel</span>
		</label>
		<input type="text" name="citadel-search" placeholder="Search The Citadel..." />
		
		<?php //get_posts_via_rest(); ?>
		
	</div>

</div>