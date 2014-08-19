<?php
/**
 * functions and definitions
 *
 * @package soblossom
 */

/**
 * Lineup of all required files:
 */

/**
 * inc/soblossom.php - The blossom in soblossom, if you remove this, the sky will come falling down :)
 *	- theme setup soblossom_bloom()
 *		- textdomain
 *		- theme support
 *		- enqueue scripts and styles
 *		- add function soblossom_remove_script_version() (get rid of the ? in the script/style URLs)
 *		- register widget areas
 *		- register navigation menus
 *		- general cleanup (incl. injected styling, rss, generator, excerpt more and what not)
 *		- soblossom search form
 *
 *	- add Foundation Features
 *
 *	- Template Tags
 *		- soblossom_featured_image
 *		- soblossom_posted_in
 *		- soblossom_paging_nav
 *		- soblossom_post_nav
 *		- soblossom_posted_on
 *		- soblossom_categorized_blog
 *		- soblossom_comment
 *
 * 	- soblossom_body_classes
 * 	- add functions soblossom_add_favicon
 */
require get_template_directory() . '/inc/soblossom.php';

/**
 * inc/iconfont-walker.php - Custom Walker to enable using Font Awesome icon font in navigation menus
 *	- used for social media menu
 *
 * comment out to exclude
 */
require get_template_directory() . '/inc/walkers/iconfont-walker.php';

/**
 * /inc/classes/Mobile_Detect.php - Mobile Detect Library
 *	- used for tplparts/nav-topbar.php among others
 *
 * @link: mobiledetect.net
 * comment out to exclude
 */
require get_template_directory() . '/inc/classes/Mobile_Detect.php';
$soblossom_detect = new Mobile_Detect();

/**
 * /inc/classes/gallery.php - soblossom_clearing_blockgrid_gallery
 * adapted the output of the WP Gallery shortcode
 *
 * comment out to exclude
 */
require get_template_directory() . '/inc/classes/gallery.php';

/**
 * /inc/classes/aq_resizer.php - Aqua Resizer script to dynamically resize images
 *
 * @link: github.com/syamilmj/Aqua-Resizer
 * uncomment to include
 */
//require get_template_directory() . '/inc/classes/aq_resizer.php';

/**
 * /inc/functions/functionality.php - your own functions file
 * this file is for you to add your own functions, added with an eye on portability
 * you can also add your own functions to this main functions.php file or any other place you like
 * 
 * uncomment to include
 */
//require get_template_directory() . '/inc/functions/functionality.php';

/**
 * /inc/functions/cpt.php - Custom Post Type registration file
 * /inc/functions/cmb.php - Custom Meta Box registration file
 *
 * 	sample custom post type included, generated with generatewp.com/post-type/; generate custom taxonomies with generatewp.com/taxonomy/
 * 	sample custom meta box included, generated from github.com/rilwis/meta-box/blob/master/demo/demo.php
 *
 * uncomment to include
 */
//require get_template_directory() . '/inc/functions/cpt.php';
//require get_template_directory() . '/inc/functions/cmb.php';

/**
 * /inc/functions/dashboard-functions.php - specific backend functions
 *	- change howdy into something more appropriate
 *	- change dashboard footer
 *	- remove number of default dashboard widgets
 *	- remove number of default WordPress widgets
 *	- custom login
 *	- always remove adminbar from frontend
 *	- remove 3 custom columns added by Yoast WordPress SEO plugin
 * 
 * uncomment to include
 */
//require get_template_directory() . '/inc/functions/dashboard-functions.php';


/**
 * /inc/functions/misc.php - Miscellaneous functions that you might or might not use for your theme
 * 	- function to make it possible to query on is_post_type()
 * 	- enable page excerpts
 * 	- enable shortcode in text widgets
 * 	- function that sets the authordata global when viewing an author archive
 * 	- add hook soblossom_body_open (to add 3rd party scripts like GA)
 *
 * uncomment to include
 */
// require get_template_directory() . '/inc/functions/misc.php';


/**
 * NAVIGATION MENUS FUNCTIONS
 *
 * Top Navigation and Footer Navigation Menus
 * Registration of the menus takes place in soblossom_setup in inc/soblossom.php
 */

// topnav-menu
function soblossom_top_nav() {
    wp_nav_menu( array(
    	'container' => false,							// remove nav container
    	'container_class' => '',						// class of container (should you choose to use it)
    	'menu' => __( 'Top Navigation', 'soblossom' ),	// nav name
    	'menu_class' => '',								// adding custom nav class
    	'theme_location' => 'topnav',					// where it's located in the theme
    	'before' => '',                                 // before the menu
        'after' => '',                                  // after the menu
        'link_before' => '',                            // before each link
        'link_after' => '',                             // after each link
    	'fallback_cb' => 'soblossom_topnav_fallback'	// fallback function
    	// if you want to use icons in the navigation; uncomment the following line and add a comma to the line above
    	// 'walker' => new iconfont_walker() // custom walker located in inc/iconfont-walker.php
    	
	));
} /* end soblossom_top_nav */

// social-media-menu (optional)
function soblossom_social_media_links() {
    wp_nav_menu( array(
    	'container' => '',
    	'container_class' => 'socialmedia clearfix',
    	'menu' => __( 'Social Media', 'soblossom' ),
       	'menu_class' => 'sub-nav',
    	'theme_location' => 'social',
    	'before' => '',
        'after' => '',
        'link_before' => '',
        'link_after' => '',
        'walker' => new iconfont_walker() // custom walker located in inc/walkers/iconfont-walker.php - add social media name to description
	));
} /* end soblossom_social_media_links */

// footer-menu (optional)
function soblossom_footer_nav() {
    wp_nav_menu( array(
    	'container' => '',
    	'container_class' => 'footer-links clearfix',
    	'menu' => __( 'Footer Links', 'soblossom' ),
    	'menu_class' => 'sub-nav',
    	'theme_location' => 'footer',
    	'before' => '',
        'after' => '',
        'link_before' => '',
        'link_after' => '',
        'depth' => 0,
    	'fallback_cb' => 'soblossom_footernav_fallback'
	));
} /* end soblossom_footer_nav */

// fallback for header menu
function soblossom_topnav_fallback() {
	wp_page_menu( array(
		'show_home' => true,
    	'menu_class' => 'fallback',	// adding custom nav class
		'include'     => '',
		'exclude'     => '',
		'echo'        => true,
        'link_before' => '',
        'link_after' => ''
	) );
}

// fallback for footer menu
function soblossom_footernav_fallback() {
	/* optional, add default, see soblossom_topnav_fallback as example */
}

/**
 * WIDGET AREAS FUNCTIONS
 *
 * Sidebars & Widgetised Areas
 * Registration of the areas takes place in soblossom_setup in inc/soblossom.php
 */
function soblossom_register_widget_areas() {
	register_sidebar( array(
		'name'          => __( 'Sidebar Widget Area', 'soblossom' ),
		'id'            => 'sidebar-widget-area',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Widget Area', 'soblossom' ),
		'id'            => 'footer-widget-area',
		'description'   => __( 'Appears in the footer section of the site.', 'soblossom' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s small-12 medium-3 columns">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
