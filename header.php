<?php
	global $blog_id;
	$current_blog_id = $blog_id;

	$main_site = 'The Citadel';
	$main_blogname = get_blog_details( 1 )->blogname;
	$blogname = get_bloginfo( 'name' );
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <title><?php wp_title(); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<nav class="skip"  role="navigation">
		<a class="show-on-focus" href="#main">Skip to main content</a>
	</nav>

	<header role="banner">

		<div class="wrapper top-header">
			<?php if ($blogname != $main_site): ?>
			<a href="https://citadel.edu/" title="Go to The Citadel home page" aria-label="Go to The Citadel home page" class="institution-title">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/wordmark/Citadel_Logo_Wordmark_Reverse.png" alt="The Citadel Wordmark">
			</a>
			<?php endif; ?>
		</div>

		<div class="wrapper main-header">
			<div class="lockup">
				<?php if ( ( $blog_id == 1 ) && ($main_blogname == $main_site) ) : ?>
				<a class="header-logo" title="Go to The Citadel home page" aria-label="Go to The Citadel home page" href="https://citadel.edu/">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/brand_signature/Citadel_Logo_Signature_Horizontal_Reverse.png" alt="The Citadel Brandmark">
				</a>
				<?php else: ?>
				<a class="header-logo" title="Go to The Citadel home page" aria-label="Go to The Citadel home page" href="https://citadel.edu/">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/brandmark/Citadel_Logo_Brandmark_Reverse.png" alt="The Citadel Brandmark">
				</a>
				<div class="lockup-text">
					<?php if ( ( $blog_id != 1 ) && ($main_blogname != $main_site) ) : ?>
					<a href="<?php echo esc_url(get_blog_details( 1 )->path ); ?>" class="parent-site"><?php echo get_blog_details( 1 )->blogname; ?></a>
					<?php endif; ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="current-site"><?php echo bloginfo('name'); ?></a>
				</div>
				<?php endif; ?>

			</div>
		</div>

		<nav class="wrapper main-nav" role="navigation" aria-label="local navigation">
			
		</nav>

	</header>

	<main class="wrapper" id="main" role="main">
	