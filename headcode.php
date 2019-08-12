<?php
	global $blog_id;
	global $wp;

	$current_blog_id = $blog_id;
?>

<!-- Description -->
<?php  if ( ($current_blog_id == 1) && (is_front_page()) ) { ?>
	<meta name="description" content="Founded in 1842, The Citadel is a landmark in Charleston and South Carolina that is noted for its educational reputation as well as its rich history.">
<?php } else if ( ($current_blog_id == 1) && !(is_front_page()) ) { ?>
	<meta name="description" content="Founded in 1842, The Citadel is a landmark in Charleston and South Carolina that is noted for its educational reputation as well as its rich history.">
<?php } else { ?>
	<meta name="description" content="Founded in 1842, The Citadel is a landmark in Charleston and South Carolina that is noted for its educational reputation as well as its rich history.">
<?php } ?>

<!-- Keywords -->
<?php  if ( ($current_blog_id == 1) && (is_front_page()) ) { ?>
	<meta name="keywords" content="The Citadel, military college, South Carolina, Charleston, Citadel, graduate school, masters degree, corps of cadets, charleston sc, rotc college">
<?php } else if ( ($current_blog_id == 1) && !(is_front_page()) ) { ?>
	<meta name="keywords" content="The Citadel, military college, South Carolina, Charleston, Citadel, <?php echo the_title(); ?>, graduate school, masters degree, corps of cadets, charleston sc, rotc college">
<?php } else { ?>
	<meta name="keywords" content="The Citadel, military college, South Carolina, Charleston, Citadel, <?php echo get_bloginfo( 'name' ); ?>, graduate school, masters degree, corps of cadets, charleston sc, rotc college">
<?php } ?>

<!-- Schema.org for Google -->
<meta itemprop="name" content="The Citadel">

<!-- Twitter -->
<meta name="twitter:card" content="summary">
<meta name="twitter:title" content="<?php include 'template-parts/header/title-tag.php' ?>">
<meta name="twitter:site" content="@Citadel1842">

<!-- Open Graph general (Facebook, Pinterest & Google+) -->
<meta property="og:locale" content="en_US" />
<meta name="og:title" content="<?php include 'template-parts/header/title-tag.php' ?>">
<meta name="og:url" content="<?php echo home_url( $wp->request )?>">
<meta name="og:site_name" content="The Citadel">
<meta name="og:type" content="website">

<?php if (has_excerpt()) { ?>
<!-- Description Metadata -->
<meta name="description" content="<?php echo wp_strip_all_tags( the_excerpt(), true ); ?>">
<meta itemprop="description" content="<?php echo wp_strip_all_tags( the_excerpt(), true ); ?>">
<meta name="twitter:description" content="<?php echo wp_strip_all_tags( the_excerpt(), true ); ?>">
<meta name="og:description" content="<?php echo wp_strip_all_tags( the_excerpt(), true ); ?>">
<?php } ?>

<!-- Image Metadata -->
<?php if (is_front_page() && has_post_thumbnail() && $blog_id != 1) { ?>
<meta name="image" content="<?php the_post_thumbnail_url() ?>">
<meta itemprop="image" content="<?php the_post_thumbnail_url() ?>">
<meta name="twitter:image:src" content="<?php the_post_thumbnail_url() ?>">
<meta name="og:image" content="<?php the_post_thumbnail_url() ?>">
<?php } else { ?>
<meta name="image" content="<?php echo network_site_url(); ?>/wp-content/themes/citadel/screenshot.jpg">
<meta itemprop="image" content="<?php echo network_site_url(); ?>/wp-content/themes/citadel/screenshot.jpg">
<meta name="twitter:image:src" content="<?php echo network_site_url(); ?>/wp-content/themes/citadel/screenshot.jpg">
<meta name="og:image" content="<?php echo network_site_url(); ?>/wp-content/themes/citadel/screenshot.jpg">
<?php } ?>

<!-- Cross-Device Support -->
<meta name="application-name" content="The Citadel"/>
<meta name="msapplication-square70x70logo" content="wp-content/themes/citadel/assets/favicon/small.jpg"/>
<meta name="msapplication-square150x150logo" content="wp-content/themes/citadel/assets/favicon/medium.jpg"/>
<meta name="msapplication-wide310x150logo" content="wp-content/themes/citadel/assets/favicon/wide.jpg"/>
<meta name="msapplication-square310x310logo" content="wp-content/themes/citadel/assets/favicon/arge.jpg"/>
<meta name="msapplication-TileColor" content="#1F3A60"/>

