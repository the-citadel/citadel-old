<?php

// Add custom admin CSS
function admin_style() {
  wp_enqueue_style('admin-styles', get_template_directory_uri().'/assets/css/admin.css');
}
add_action('admin_enqueue_scripts', 'admin_style');

// Hide Admin Toolbar
show_admin_bar( false );

// Change Howdy to Welcome
add_filter('gettext', 'change_howdy', 10, 3);
function change_howdy($translated, $text, $domain) {

	if (!is_admin() || 'default' != $domain)
		return $translated;

	if (false !== strpos($translated, 'Howdy'))
		return str_replace('Howdy', 'Welcome', $translated);

	return $translated;
}

// Replace Admin Logo
function my_login_logo() { ?>
	<style type="text/css">
		body { background: #F5F4F2 !important; }
		#login h1 a, .login h1 a {
			background-image: url(<?php echo network_site_url(); ?>/wp-content/themes/citadel/assets/images/citadel-logo-navy.png);
			height: 150px;
			width: 150px;
			background-size: 150px 150px;
			background-repeat: no-repeat;
		}
		.login form {
			border: 1px solid #d4d5d7;
			box-shadow: none !important;
		}
		p#nav {
			display: none;
		}
	</style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

add_filter(  'gettext',  'register_text'  );
add_filter(  'ngettext',  'register_text'  );
function register_text( $translating ) {
     $translated = str_ireplace(  'Username or Email Address',  'Citadel Username',  $translating );
     return $translated;
}

// Remove lost password url from login page
function remove_lostpassword_text ( $text ) {
if ($text == 'Lost your password?'){$text = '';}
	return $text;
}
add_filter( 'gettext', 'remove_lostpassword_text' );

// Disable password reset for all users
function disable_password_reset() {
	return false;
}
add_filter ( 'allow_password_reset', 'disable_password_reset' );

// Custom Dashboard Widget
add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');
  
function my_custom_dashboard_widgets() {
global $wp_meta_boxes;
 
wp_add_dashboard_widget('citadel-quick-links', 'Citadel Quick Links', 'custom_dashboard_help');
}
 
function custom_dashboard_help() {
	include 'citadel-dashboard.php';
}

// Display Pending Posts

function citadel_add_pending_widget() {
		// Add a pending posts dashboard widget
		wp_add_dashboard_widget(
			'citadel_pending_dashboard_widget',         // Widget slug.
			'Pending Pages',         // Title.
			'citadel_pending_dashboard_widget_function' // Display function.
		);
}
add_action( 'wp_dashboard_setup', 'citadel_add_pending_widget' );
// Build the Pending posts dashboard widget
function citadel_pending_dashboard_widget_function() {
	$args = array(
	  'post_type' => 'page',
	  'orderby'   => 'date',
	  'order'     => 'DSC',
	  'post_status' => 'pending',
	  'posts_per_page' => -1
	);
	$pending_posts = new WP_Query( $args );
	// The Loop
	if ( $pending_posts->have_posts() ) {
		echo  '<table class="wp-list-table widefat fixed striped">' .
						'<thead>' .
							'<tr>' .
								'<th class="row-title">Title</th>' .
								'<th>Author</th>' .
								'<th>Date</th>' .
							'</tr>' .
						'</thead>' .
						'<tbody>';
		while ( $pending_posts->have_posts() ) {
			$pending_posts->the_post();
			echo  '<tr>' .
							'<td class="row-title"><a href="' . get_edit_post_link() . '">' . get_the_title() . '</a></td>' .
							'<td>' . get_the_author() . '</td>' .
							'<td>' . get_the_date() . '</td>' .
						'</tr>';
		}
		echo    '</tbody>' .
					'</table>';
	} else {
		echo 'There are no pending pages.';
	}
	wp_reset_postdata();
	
}

// Add dashboard widgets
function citadel_network_add_pending_widget() {
	// Admin-level users only
	if (current_user_can('add_users')) {
		// Add a pending posts dashboard widget
		wp_add_dashboard_widget(
			'citadel_network_pending_dashboard_widget',         // Widget slug.
			'Pending Pages',         // Title.
			'citadel_network_pending_dashboard_widget_function' // Display function.
		);
	}
}
add_action( 'wp_network_dashboard_setup', 'citadel_network_add_pending_widget' );

// Build the Pending posts network dashboard widget
function citadel_network_pending_dashboard_widget_function() {
	$args = array(
	  'post_type' => 'page',
	  'orderby'   => 'date',
	  'order'     => 'DSC',
	  'post_status' => 'pending',
	  'posts_per_page' => -1
	);

	$subsites = wp_get_sites();


	if ($subsites) {
		echo  '<table class="wp-list-table widefat fixed striped">' .
				'<thead>' .
					'<tr>' .
						'<th class="row-title">Title</th>' .
						'<th>Author</th>' .
						'<th>Website</th>' .
						'<th style="min-width: 100px;">Date</th>' .
					'</tr>' .
				'</thead>' .
				'<tbody>';
		foreach( $subsites as $subsite ) {
			switch_to_blog( $subsite['blog_id'] );
			$pending_posts = new WP_Query( $args );

			if ( $pending_posts->have_posts() ) {
				while ( $pending_posts->have_posts() ) {
					$pending_posts->the_post();
					echo  '<tr>' .
							'<td class="row-title"><a href="' . get_edit_post_link() . '">' . get_the_title() . '</a></td>' .
							'<td><a href="mailto:' . get_the_author_email() . '">' . get_the_author() .  '</a></td>' .
							'<td><a href="' . get_site_url() . '/wp-admin">' . get_bloginfo() . '</a></td>' .
							'<td style="min-width: 100px;">' . get_the_date() . '</td>' .
						'</tr>';
				}
				echo    '</tbody>' .
						'</table>';
			}
			wp_reset_postdata();
		}
	} else {
		echo 'There are no subsites in this network.';
	}
	
}
?>