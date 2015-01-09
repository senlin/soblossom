<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> and <header> sections
 *
 * @package soblossom
 */
?>
<!doctype html>

<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->

	<head>

		<meta charset="<?php bloginfo( 'charset' ); ?>">

		<!-- Google Chrome Frame for IE -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<!-- mobile meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
		<!--[if lt IE 9]>
			<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
		<![endif]-->
		
		<?php wp_head(); ?>

	</head>

<body <?php body_class(); ?>>

<?php
/**
 * Add hook right after the opening body tag to be able to add scripts that 
 * need to be placed there, for example Google Analytics, Facebook, Google+, etc.
 * 
 * See inc/functions/misc.php for details
 *
 * uncomment to start using
 *
 * @since 140730
 */
	
	//soblossom_body_open();

?>

	<div class="off-canvas-wrap" data-offcanvas>

		<div class="inner-wrap">
			
			<div id="page" class="hfeed site">

				<header id="masthead" class="site-header" role="banner">

					<div class="inner-header row">
						
						<div class="site-branding small-12 medium-6 columns">
						
							<h1 class="site-title">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php esc_attr( bloginfo( 'name' ) ); ?></a>
							</h1>
						
							<h2 class="site-description"><?php esc_attr( bloginfo( 'description' ) ); ?></h2>
						
						</div> <!-- end .site-branding -->
					
						<div class="social-media small-12 medium-6 columns">
							<?php soblossom_social_media_links(); ?>
						</div> <!-- end .social-media -->
						
					</div> <!-- end .inner-header -->

					<?php /** Select which setup works best for your site and remove the redundant one.
					<div class="inner-header row">
						
						<div class="site-branding small-12 medium-6 columns">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_attr( bloginfo( 'name' ) ); ?>, <?php  esc_attr( bloginfo( 'description' ) ); ?>" rel="home">
								<img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" width="300" height="60" alt="soblossom logo" />
							</a>
							<h2 class="site-description"><?php esc_attr( bloginfo( 'description' ) ); ?></h2>
						</div> <!-- end .site-branding -->
						
						<div class="social-media small-12 medium-6 columns">
							<?php soblossom_social_media_links(); ?>
						</div> <!-- end .social-media -->
						
					</div><!-- end .inner-header -->
					*/?>

					<nav id="site-navigation" class="main-navigation row" role="navigation">

						<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'soblossom' ); ?></a>

						<?php
							/**
							 * A couple of different ways to call the top navigation menu
							 *
							 * 1. DEFAULT top navigation with mobile off-canvas (soblossom is basically designed to have this,
							 * 	if you don't want this, then you can also remove the off-canvas-wrap and inner-wrap classes
							 * 	from both header and footer templates)
							 *
							 * 2. a simple top navigation menu with mobile dropdown
							 *
							 * 3. call the menu directly
							 *
							 * 4. anything else, customise it by yourself
							 */
						
							// 1. top navigation with mobile off-canvas (
							get_template_part( 'tplparts/nav', 'offcanvas' );

							// 2. a simple top navigation menu with mobile dropdown
							//get_template_part( 'tplparts/nav', 'topbar' );
							
							// 3. call the menu directly (you'll need to figure sth out for mobile)
							//wp_nav_menu( array( 'theme_location' => 'primary' ) );
							
							// 4. anything else, customise it by yourself
							//get_template_part( 'tplparts/nav', 'name-menu' );
						
						?>

					</nav> <!-- end .main-navigation -->

				</header> <!-- end header -->