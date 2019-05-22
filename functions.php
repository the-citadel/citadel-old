<?php

global $blog_id;

//Enqueue scripts and styles
function citadel_adding_scripts() {
	wp_enqueue_style('style', get_template_directory_uri() . '/style.css');
	wp_enqueue_script( 'customjs', get_template_directory_uri() . '/assets/js/scripts.js', array('jquery'), '', true );
}
add_action( 'wp_enqueue_scripts', 'citadel_adding_scripts' );

// Add post thumbnail feature
add_theme_support( 'post-thumbnails' );

// Customizer settings
include('inc/customizer.php');

// Custom WP admin settings
include('inc/admin.php');

// Default new WPMU settings
include('inc/musettings.php');

/*
----------
Add New Menus & Widget Areas
----------
*/

if ($blog_id == 1) {
	register_nav_menus( array(
		'primary' 		=> 'Citadel Main Menu',
		'secondary' 	=> 'Citadel Secondary Menu',
		'social' 		=> 'Citadel Social Menu',
		'leftfooter' 	=> 'Citadel Left Footer Menu',
		'rightfooter' 	=> 'Citadel Right Footer Menu',
		'legalfooter' 	=> 'Citadel Legal Footer Menu',
	) );
}

register_sidebar(array(
	'name' 			=> 'Left Sidebar',
	'id'            => 'left-sidebar',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => "</div>\n",
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => "</h2>\n",
) );

/*
----------
Homepage Widget Areas
----------
*/

if ($blog_id == 1) {
	register_sidebar(array(
		'name' 			=> 'Home Banner',
		'id'         	=> 'home-banner',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => "</div>\n",
	) );

	register_sidebar(array(
		'name' 			=> 'Home Spotlight 1',
		'id'         	=> 'home-spotlight-1',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => "</div>\n",
		'before_title'  => '<h3 class="widgettitle">',
		'after_title'   => "</h3>\n",
	) );

	register_sidebar(array(
		'name' 			=> 'Home Spotlight 2',
		'id'         	=> 'home-spotlight-2',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => "</div>\n",
		'before_title'  => '<h3 class="widgettitle">',
		'after_title'   => "</h3>\n",
	) );

	register_sidebar(array(
		'name' 			=> 'Home Spotlight 3',
		'id'         	=> 'home-spotlight-3',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => "</div>\n",
		'before_title'  => '<h3 class="widgettitle">',
		'after_title'   => "</h3>\n",
	) );

	register_sidebar(array(
		'name' 			=> 'Home Spotlight 4',
		'id'         	=> 'home-spotlight-4',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => "</div>\n",
		'before_title'  => '<h3 class="widgettitle">',
		'after_title'   => "</h3>\n",
	) );

	register_sidebar(array(
		'name' 			=> 'Home Video',
		'id'         	=> 'home-video',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => "</div>\n",
	) );
}

/*
----------
Modify User Permissions
----------
*/

$wp_roles = new WP_Roles();
$wp_roles->remove_role('editor');
$wp_roles->remove_role('author');
$wp_roles->remove_role('contributor');
$wp_roles->remove_role('subscriber');

$wp_roles->add_role(
	'editor',
	'Editor',
	array (
		'delete_others_pages'		=> true,
		'delete_pages'				=> true,
		'delete_private_pages'		=> true,
		'delete_published_pages'	=> true,
		'edit_others_pages'			=> true,
		'edit_pages'				=> true,
		'edit_private_pages'		=> true,
		'edit_published_pages'		=> true,
		'read'						=> true,
		'read_private_pages'		=> true,
		'upload_files'				=> true,
	)
);

$wp_roles->add_role(
	'advanced_editor',
	'Advanced Editor',
	array (
		'delete_others_pages'		=> true,
		'delete_pages'				=> true,
		'delete_private_pages'		=> true,
		'delete_published_pages'	=> true,
		'edit_others_pages'			=> true,
		'edit_pages'				=> true,
		'edit_private_pages'		=> true,
		'edit_published_pages'		=> true,
		'read'						=> true,
		'read_private_pages'		=> true,
		'upload_files'				=> true,
		'edit_theme_options'		=> true,
	)
);

$wp_roles->add_role(
	'blogger',
	'Blogger',
	array (
		'delete_others_posts'		=> true,
		'delete_posts'				=> true,
		'delete_private_posts'		=> true,
		'delete_published_posts'	=> true,
		'edit_others_posts'			=> true,
		'edit_posts'				=> true,
		'edit_private_posts'		=> true,
		'edit_published_posts'		=> true,
		'read'						=> true,
		'read_private_posts'		=> true,
		'upload_files'				=> true,
	)
);

$wp_roles->add_role(
	'editor_blogger',
	'Editor and Blogger',
	array (
		'delete_others_pages'		=> true,
		'delete_pages'				=> true,
		'delete_private_pages'		=> true,
		'delete_published_pages'	=> true,
		'edit_others_pages'			=> true,
		'edit_pages'				=> true,
		'edit_private_pages'		=> true,
		'edit_published_pages'		=> true,
		'delete_others_posts'		=> true,
		'delete_posts'				=> true,
		'delete_private_posts'		=> true,
		'delete_published_posts'	=> true,
		'edit_others_posts'			=> true,
		'edit_posts'				=> true,
		'edit_private_posts'		=> true,
		'edit_published_posts'		=> true,
		'read'						=> true,
		'read_private_posts'		=> true,
		'upload_files'				=> true,
	)
);

$wp_roles->add_role(
	'site_admin',
	'Site Admin',
	array (
		'delete_others_posts'		=> true,
		'delete_posts'				=> true,
		'delete_private_posts'		=> true,
		'delete_published_posts'	=> true,
		'edit_others_posts'			=> true,
		'edit_posts'				=> true,
		'edit_private_posts'		=> true,
		'edit_published_posts'		=> true,
		'delete_others_pages'		=> true,
		'delete_pages'				=> true,
		'delete_private_pages'		=> true,
		'delete_published_pages'	=> true,
		'edit_others_pages'			=> true,
		'edit_pages'				=> true,
		'edit_private_pages'		=> true,
		'edit_published_pages'		=> true,
		'read'						=> true,
		'read_private_pages'		=> true,
		'upload_files'				=> true,
		'edit_theme_options'		=> true,
	)
);

$user = wp_get_current_user();

/*
----------
Admin Feature Permissions
----------
*/

// Remove features on page/post edit screen
add_action( 'admin_menu', 'restrict_access' );
function restrict_access() {
	//Global
	remove_meta_box( 'postcustom', 'page','normal' );
	remove_meta_box( 'postcustom', 'post','normal' );
	remove_meta_box( 'commentstatusdiv', 'page','normal' );
	remove_meta_box( 'commentsdiv', 'page','normal' );
	remove_meta_box( 'authordiv', 'page','normal' );
	remove_meta_box( 'slugdiv', 'page','normal' );
	remove_meta_box( 'slugdiv', 'post','normal' );

	// Non Admins
	if (!current_user_can('edit_themes')) {
    	remove_meta_box( 'pageparentdiv', 'page','normal' );
    	remove_meta_box('navmenuthemelocations', 'nav-menus', 'side');

    }
    // Admins
    if (current_user_can('edit_themes')) {
    	remove_meta_box('navmenuthemelocations', 'nav-menus', 'side');
    }
}

// Remove Quick Edit on Pages/Post
add_filter( 'post_row_actions', 'my_cpt_row_actions', 10, 2 );
function my_cpt_row_actions( $actions, $post ) {
    if ( 'my-cpt' === $post->post_type ) {
        // Removes the "Quick Edit" action.
        unset( $actions['inline hide-if-no-js'] );
    }
    return $actions;
}

// Remove Dashboard Widgets
function remove_dashboard_widgets() {
	remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' );   // Recent Activity
	remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' ); // Recent Comments
	remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );  // Incoming Links
	remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );   // Plugins
	remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );  // Quick Press
	remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );  // Recent Drafts
	remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );   // WordPress blog
	remove_meta_box( 'dashboard_secondary', 'dashboard', 'side' );   // Other WordPress News
	remove_meta_box('dashboard_right_now', 'dashboard', 'normal'); //Removes the 'At a Glance' widget
}
add_action( 'wp_dashboard_setup', 'remove_dashboard_widgets' );

remove_action( 'welcome_panel', 'wp_welcome_panel' );
remove_action( 'try_gutenberg_panel', 'wp_try_gutenberg_panel' );

add_action('wp_network_dashboard_setup', 'hhs_remove_network_dashboard_widgets' );
function hhs_remove_network_dashboard_widgets() {
    remove_meta_box ( 'network_dashboard_right_now', 'dashboard-network', 'normal' ); // Right Now
    remove_meta_box ( 'dashboard_plugins', 'dashboard-network', 'normal' ); // Plugins
    remove_meta_box ( 'dashboard_primary', 'dashboard-network', 'side' ); // WordPress Blog
    remove_meta_box ( 'dashboard_secondary', 'dashboard-network', 'side' ); // Other WordPress News
}
