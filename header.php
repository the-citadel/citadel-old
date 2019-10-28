<?php 

defined( 'ABSPATH' ) || exit;

global $blog_id;
	
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <title><?php wp_title( ' | ', true, 'right' ); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
    <?php wp_head(); ?>
	<?php include 'template-parts/header/header_scripts.php' ?>
</head>
<body <?php body_class(); ?>>

	<div id="dimmer-overlay"></div>

	<nav class="skip" role="navigation">

		<a class="show-on-focus" href="#main">Skip to main content</a>

	</nav>

	<header role="banner" id="header">

		<!-- start .top-header -->
		<div class="top-header">

			<?php citadel_top_header_wordmark(); ?>

				<div class="right-header flex-item flex-middle flex-right">

					<nav class="secondary-nav flex-item flex-middle" role="navigation" aria-label="secondary navigation">

						<?php include 'template-parts/header/secondary-nav.php'; ?>

					</nav>

					<div class="action-buttons flex-item flex-middle mobile-hide">

						<button class="search-toggle">Search</button>

						<button class="tools-toggle"><span>Tools</span></button>

					</div>

				</div>

			</div>

			<?php include 'template-parts/header/tools.php'; ?>

		</div><!-- end .top-header -->

		<!-- start .main-header -->
		<div class="main-header">

			<div class="wrapper flex-container flex-between">

				<div class="lockup flex-item">

					<?php 

					if ( ( $blog_id == 1 ) ) :

						citadel_lockup_logo();
					
					else:

						citadel_subsite_lockup();

					endif; 

					?>

				</div>

				<div class="main-cta mobile-hide flex-item flex-middle">

					<div class="flex-container text-right">

						<a href="">Apply Now</a>

						<a href="">Give Online</a>

					</div>

				</div>

			</div>

		</div><!-- end .main-header -->

		<!-- start .main-nav -->
		<nav class="main-nav" role="navigation" aria-label="main navigation">

			<div class="wrapper">

				<?php include 'template-parts/header/main-nav.php'; ?>

			</div>
			
		</nav><!-- end .main-nav -->

	</header>

	<?php include 'template-parts/header/mobile-nav.php'; ?>

	<!-- start #main -->
	<main id="main" role="main">
		
	