<?php 

defined( 'ABSPATH' ) || exit;

function citadel_filter_wp_title( $title, $sep ) {

    global $paged, $page, $blog_id;

    $blog_name = get_bloginfo( 'name' );

    if ( is_feed() ) {

        return $title;

    }

    // Add a page number if necessary
    if ( $paged >= 2 || $page >= 2 ) {

        $title .= sprintf( __( 'Page %s', 'citadel' ), max( $paged, $page ) );

    }

    // Add the site name
    if ( ( 1 == $blog_id ) && ( is_home() || is_front_page() ) ) { // Main site home page

    	$title = "The Citadel $sep The Military College of South Carolina";

    } elseif ( 1 == $blog_id ) { // Main site other pages

    	$title .= "The Citadel";

    } elseif ( is_home() || is_front_page() ) { // Other sites home page

    	$title = "$blog_name $sep The Citadel";

    } else { // Other sites other pages

    	$title .= "$blog_name $sep The Citadel";

    }
 
    return $title;

}

add_filter( 'wp_title', 'citadel_filter_wp_title', 10, 2 );