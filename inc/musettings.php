<?php

//Default Timezone
function set_default_timezone_mu( $blog_id ){
    switch_to_blog( $blog_id );
    update_option( 'gmt_offset','UTC-5' );
    restore_current_blog();
}
add_action( 'wpmu_new_blog', 'set_default_timezone_mu' );

update_option("timezone_string","America/New_York");

add_action( 'init', function() {
    global $wp_rewrite;
    $wp_rewrite->set_permalink_structure( '/%year%/%monthnum%/%postname%/' );
} );