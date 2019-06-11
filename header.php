<?php
	global $blog_id;
	$current_blog_id = $blog_id;
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head itemtype="http://schema.org/Organization" itemscope>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
<title><?php include 'template-parts/header/title-tag.php' ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
<?php include 'headcode.php' ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); if ( $blog_id == 1 && is_front_page() ) : ?>id="citadel-home"<?php endif; ?>>

	<!-- Skip navigation for screen readers -->
	<a href="#primary-nav" class="skip">Skip to main navigation</a>
	<a href="#main-content" class="skip">Skip to main content</a>

	<!-- Start Header -->
	<?php switch_to_blog(1); ?>
	<header id="main-header">

		<!-- Start Secondary Navigation -->
		<nav id="secondary-nav">
			<div class="container">
				<?php if ( has_nav_menu( 'secondary' ) ): ?>
				<?php wp_nav_menu( array(
						'theme_location' => 'secondary',
						'menu_id'        => 'secondary',
						'container' 	 => '',
				) ); ?>
				<?php endif; ?>
				<div class="right-secondary">
					<?php
					//include 'template-parts/header/socialicons.php';

					include 'searchform.php';

					?>
					<a href="#" class="tools-toggle" role="button">Tools <i class="fas fa-angle-down"></i></a>
				</div>
			</div>
			<div id="tools">
				<?php include 'template-parts/header/tools.php' ?>
			</div>
		</nav>
		<!-- End Secondary Navigation -->

		<!-- Start Branding Header -->
		<div id="citadel-heading" class="container">
			<?php if ( $current_blog_id == 1 && is_front_page() ) { ?>
			<h1 class="header-img">
				<a href="<?php echo get_blog_details( 1 )->path; ?>">
					<img src="<?php echo get_blog_details( 1 )->path; ?>/wp-content/themes/citadel/assets/images/citadel-logo-white.png" alt="<?php echo get_bloginfo( 'name' ); ?>">
				</a>
			</h1>
			<?php } else { ?>
			<div class="header-img">
				<a href="<?php echo get_blog_details( 1 )->path; ?>">
					<img src="<?php echo get_blog_details( 1 )->path; ?>/wp-content/themes/citadel/assets/images/citadel-logo-white.png" alt="<?php echo get_bloginfo( 'name' ); ?>">
				</a>
			</div>
			<?php } ?>
			<div class="right-header">
				<?php if ( ($current_blog_id == 1) && (is_front_page()) ) : ?>
				<h2 class="secondary-title">The Military College of South Carolina</h2>
				<?php elseif ( ($current_blog_id == 1) && (!is_front_page()) ) : ?>
				<p class="secondary-title">The Military College of South Carolina</p>
				<?php else: ?>
				<?php
					switch_to_blog($current_blog_id);
				?>
				<p class="secondary-title">
					<a href="<?php echo site_url(); ?>">
					<?php echo bloginfo(); ?>
					</a>
				</p>
				<?php switch_to_blog(1); ?>
				<?php endif; ?>
				<div class="header-buttons">
					<a href="#">Apply Now</a>
					<a href="#">Give Online</a>
				</div>
				<div id="mobile-buttons" class="mobile">
					<a href="#" class="mobile-menu" role="button" aria-label="Navigation Menu"><i class="fas fa-bars fa-fw"></i></a>
					<a href="" class="mobile-search" role="button" aria-label="Site Search"><i class="fas fa-search fa-fw"></i></a>
				</div>
			</div>
		</div>
		<!-- End Branding Header -->

		<div id="mobile-search">
			<?php include 'searchform.php'; ?>
		</div>

		<!-- Start Primary Navigation -->
		<?php //if ( has_nav_menu( 'primary' ) ): ?>
		<nav id="primary-nav">
			<?php wp_nav_menu( array(
				'theme_location' => 'primary',
				'menu_id'        => 'primary',
				'container' 	 => '',
			) ); ?>
		</nav>
		<?php// endif; ?>
		<!-- End Primary Navigation -->

	</header>
	<!-- End Header -->
	<?php switch_to_blog($current_blog_id); ?>

	<?php if (is_front_page() && has_post_thumbnail() && $blog_id != 1) { ?>
	<!-- Start Banner Image -->
	<section id="banner" style="background-image: url('<?php echo the_post_thumbnail_url(); ?>')">
		
		<header class="entry-header">
			<h1 class="entry-title"><?php echo bloginfo(); ?></h1>
		</header><!-- .entry-header -->
	</section>
	<!-- End Banner Image -->
	<?php } ?>

	<!-- Start Page Content -->
	<main id="page" class="container">