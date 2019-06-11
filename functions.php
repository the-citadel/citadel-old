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
		'leftmenu' 		=> 'Citadel Left Menu',
	) );
} else {
	register_nav_menus( array(
		'leftmenu' 		=> 'Citadel Left Menu',
	) );
}

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
		'name' 			=> 'Home Spotlights',
		'id'         	=> 'home-spotlights',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => "</div>\n",
		'before_title'  => '<h3 class="widgettitle">',
		'after_title'   => "</h3>\n",
	) );

	register_sidebar(array(
		'name' 			=> 'Home CTA',
		'id'         	=> 'home-cta',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => "</div>\n",
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
Breadcrumbs
----------
*/

function the_breadcrumb()
{
    $showOnHome = 1; // 1 - show breadcrumbs on the homepage, 0 - don't show
    $delimiter = '<i class="fas fa-angle-right"></i>'; // delimiter between crumbs
    $home = get_bloginfo( 'name' ); // text for the 'Home' link
    $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
    $before = '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><span class="current" itemprop="title">'; // tag before the current crumb
    $after = '</span></li>'; // tag after the current crumb
    global $post;
    $networkHomeLink = get_blog_details( 1 )->path;
    $homeLink = get_bloginfo('url');
    if ($showOnHome == 1) {
        echo '<ol id="breadcrumbs" itemscope itemtype="https://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a href="' . $networkHomeLink . '" itemprop="url"><span itemprop="title">The Citadel</span></a></li> ' . $delimiter . ' <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a href="' . $homeLink . '" itemprop="url"><span itemprop="title">' . $home . '</span></a></li> ' . $delimiter . ' ';
        if (is_category()) {
            $thisCat = get_category(get_query_var('cat'), false);
            if ($thisCat->parent != 0) {
                echo get_category_parents($thisCat->parent, true, ' ' . $delimiter . ' ');
            }
            echo $before . 'Archive by category "' . single_cat_title('', false) . '"' . $after;
        } elseif (is_search()) {
            echo $before . 'Search results for "' . get_search_query() . '"' . $after;
        } elseif (is_day()) {
            echo '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a href="' . get_year_link(get_the_time('Y')) . '" itemprop="url"><span itemprop="title">' . get_the_time('Y') . '</span></a></li> ' . $delimiter . ' ';
            echo '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '" itemprop="url"><span itemprop="title">' . get_the_time('F') . '</span></a></li> ' . $delimiter . ' ';
            echo $before . get_the_time('d') . $after;
        } elseif (is_month()) {
            echo '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a href="' . get_year_link(get_the_time('Y')) . '" itemprop="url"><span itemprop="title">' . get_the_time('Y') . '</span></a></li> ' . $delimiter . ' ';
            echo $before . get_the_time('F') . $after;
        } elseif (is_year()) {
            echo $before . get_the_time('Y') . $after;
        } elseif (is_single() && !is_attachment()) {
            if (get_post_type() != 'post') {
                $post_type = get_post_type_object(get_post_type());
                $slug = $post_type->rewrite;
                echo '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a href="' . $homeLink . '/' . $slug['slug'] . '/" itemprop="url"><span itemprop="title">' . $post_type->labels->singular_name . '</span></a></li>';
                if ($showCurrent == 1) {
                    echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
                }
            } else {
                $cat = get_the_category();
                $cat = $cat[0];
                $cats = get_category_parents($cat, true, ' ' . $delimiter . ' ');
                if ($showCurrent == 0) {
                    $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
                }
                echo $cats;
                if ($showCurrent == 1) {
                    echo $before . get_the_title() . $after;
                }
            }
        } elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
            $post_type = get_post_type_object(get_post_type());
            echo $before . $post_type->labels->singular_name . $after;
        } elseif (is_attachment()) {
            $parent = get_post($post->post_parent);
            $cat = get_the_category($parent->ID);
            $cat = $cat[0];
            echo get_category_parents($cat, true, ' ' . $delimiter . ' ');
            echo '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a href="' . get_permalink($parent) . '" itemprop="url"><span itemprop="title">' . $parent->post_title . '</span></a></li>';
            if ($showCurrent == 1) {
                echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
            }
        } elseif (is_page() && !$post->post_parent) {
            if ($showCurrent == 1) {
                echo $before . get_the_title() . $after;
            }
        } elseif (is_page() && $post->post_parent) {
            $parent_id  = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
                $page = get_page($parent_id);
                $breadcrumbs[] = '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a href="' . get_permalink($page->ID) . '" itemprop="url"><span itemprop="title">' . get_the_title($page->ID) . '</span></a></li>';
                $parent_id  = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            for ($i = 0; $i < count($breadcrumbs); $i++) {
                echo $breadcrumbs[$i];
                if ($i != count($breadcrumbs)-1) {
                    echo ' ' . $delimiter . ' ';
                }
            }
            if ($showCurrent == 1) {
                echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
            }
        } elseif (is_tag()) {
            echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
        } elseif (is_author()) {
            global $author;
            $userdata = get_userdata($author);
            echo $before . 'Articles posted by ' . $userdata->display_name . $after;
        } elseif (is_404()) {
            echo $before . 'Error 404' . $after;
        }
        if (get_query_var('paged')) {
            if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) {
                echo ' (';
            }
            echo __('Page') . ' ' . get_query_var('paged');
            if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) {
                echo ')';
            }
        }
        echo '</ol>';
    }
}

/*
----------
Add Description Support to Main Menu
----------
*/

function prefix_nav_description( $item_output, $item, $depth, $args ) {
    if ( !empty( $item->description ) ) {
        $item_output = str_replace( $args->link_after . '</a>', '<span class="menu-item-description">' . $item->description . '</span>' . $args->link_after . '</a>', $item_output );
    }
 
    return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'prefix_nav_description', 10, 4 );

/*
----------
Approved Gutenberg Blocks
----------
*/

$user = wp_get_current_user();

$allowed_roles = array('super_admin', 'administrator');

if( !array_intersect($allowed_roles, $user->roles ) ) {
	add_filter( 'allowed_block_types', 'citadel_allowed_block_types' );
	function citadel_allowed_block_types( $allowed_blocks ) {
		return array(
			'core/paragraph',
			'core/heading',
			'core/image',
			'core/list',
			'core/gallery',
			'core/quote',
			'core/file',			
			'core/video',
			'core/table',
			'core/media-text',
			'core/separator',
			'core/shortcode',
			'core-embed/twitter',
			'core-embed/youtube',
			'core-embed/facebook',
			'core-embed/instagram',
			'core-embed/vimeo',
		);
	}
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
