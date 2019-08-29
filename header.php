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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

		<!-- start .top-header -->
		<?php if ($blogname != $main_site): ?>
		<div class="wrapper top-header mobile-hide flex-container flex-between">
			<a href="https://citadel.edu/" title="Go to The Citadel home page" aria-label="Go to The Citadel home page" class="institution-title flex-item flex-middle" rel="home">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/wordmark/Citadel_Logo_Wordmark_Reverse.png" alt="The Citadel Wordmark">
			</a>
		<?php else: ?>
		<div class="wrapper top-header mobile-hide flex-container flex-row-rev">
		<?php endif; ?>
			<div class="right-header flex-item flex-middle">
				<nav class="secondary-nav" role="navigation" aria-label="secondary navigation">
					<?php include 'php/secondary-nav.php'; ?>
				</nav>
				<div class="action-buttons">
					<button class="search-toggle">Search</button>
					<button class="tools-toggle"><span>Tools</span></button>
				</div>
				<?php include 'php/tools.php'; ?>
			</div>
		</div><!-- end .top-header -->

		<!-- start .main-header -->
		<div class="wrapper main-header flex-container flex-between">
			<div class="lockup flex-item">
				<?php if ( ( $blog_id == 1 ) && ($main_blogname == $main_site) ) : ?>
				<a class="header-logo main-logo flex-item flex-middle" title="Go to The Citadel home page" aria-label="Go to The Citadel home page" href="https://citadel.edu/" rel="home">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/brand_signature/Citadel_Logo_Signature_Horizontal_Reverse.png" alt="The Citadel Brandmark">
				</a>
				<?php else: ?>
				<a class="header-logo flex-item flex-middle" title="Go to The Citadel home page" aria-label="Go to The Citadel home page" href="https://citadel.edu/" rel="home">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/brandmark/Citadel_Logo_Brandmark_Reverse.png" alt="The Citadel Brandmark">
				</a>
				<div class="lockup-text flex-container flex-center flex-col">
					<?php if ( ( $blog_id != 1 ) /*&& ($main_blogname != $main_site)*/  ) : ?>
					<div class="parent-site flex-item">
						<a href="<?php echo esc_url(get_blog_details( 1 )->path ); ?>" class=""><?php echo get_blog_details( 1 )->blogname; ?></a>
					</div>
					<?php endif; ?>
					<div class="current-site flex-item">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class=""><?php echo bloginfo('name'); ?></a>
					</div>
				</div>
				<?php endif; ?>
			</div>
			<div class="main-cta mobile-hide flex-item flex-middle">
				<a href="">Apply Now</a>
				<a href="">Give Online</a>
			</div>
			<div class="mobile-buttons flex-item flex-middle">
				<button class="search-toggle"><span class="screen-reader-text">Search</span><i class="fas fa-search fa-fw"></i></button>
				<button class="menu-toggle"><span class="screen-reader-text">Main Menu</span><i class="fas fa-bars fa-fw"></i></button>
			</div>
		</div><!-- end .main-header -->

		<!-- start .main-nav -->
		<nav class="wrapper main-nav mobile-hide" role="navigation" aria-label="main navigation">
			<?php include 'php/main-nav.php'; ?>
		</nav><!-- end .main-nav -->

	</header>

	<!-- start #main -->
	<main class="wrapper" id="main" role="main">
	