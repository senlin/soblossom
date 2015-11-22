<?php
/**
 * Separate file for all dashboard functions/filters
 *
 * this file is excluded by default, see functions.php
 *
 * @package soblossom
 */

/**
 *	- replace howdy with something more appropriate
 *	- change dashboard footer
 *	- remove number of default dashboard widgets
 *	- remove number of default WordPress widgets
 *	- custom login
 *	- always remove adminbar from frontend
 *	- remove 3 custom columns added by Yoast WordPress SEO plugin - @source: yoast.com/wordpress/seo/api/#filters
 */

add_filter( 'admin_bar_menu', 'soblossom_replace_howdy', 25 );
add_filter( 'admin_footer_text', 'soblossom_dashboard_footer' );
add_action( 'admin_menu', 'soblossom_disable_default_dashboard_widgets' );
add_action( 'widgets_init', 'soblossom_remove_wp_default_widgets', 1 );
add_filter( 'show_admin_bar', '__return_false' );

/* Related to Custom Login */
add_action( 'login_enqueue_scripts', 'soblossom_login_stylesheet' ); // custom logo is set from here too
add_filter( 'login_headerurl', 'soblossom_login_logo_url' );
add_filter( 'login_headertitle', 'soblossom_login_logo_url_title' );
add_filter( 'gettext', 'soblossom_remove_lostpassword_text' );
// Remove error messages
add_filter( 'login_errors', create_function( '$a', "return null;" ) );

// Disable XML-RPC - //plugins.svn.wordpress.org/disable-xml-rpc/tags/1.0.1/disable-xml-rpc.php
add_filter( 'xmlrpc_enabled', '__return_false' );

// Replace "Howdy" with "Hello, welcome back"
function soblossom_replace_howdy( $wp_admin_bar ) {
    
    $my_account = $wp_admin_bar->get_node('my-account');
    $newtitle = str_replace( 'Howdy,', 'Hello, welcome back', $my_account->title );
    $wp_admin_bar->add_node(
    	array(
        	'id' => 'my-account',
			'title' => $newtitle,
		)
	);

}


// Customize admin footer
function soblossom_dashboard_footer () {
	
	$text = sprintf( __( 'The %s <a href="https://wordpress.org/" target="_blank">WordPress</a> website has been built on <a href="http://so-wp/themes/soblossom" title="Use soblossom to create an awesome WordPress theme!" target="_blank">soblossom</a>. ', 'soblossom' ),
		get_option( 'blogname' )
	);
	
	echo apply_filters( 'soblossom_dashboard_footer', '<span id="footer-thankyou">' . $text . '</span>' );
}



function soblossom_disable_default_dashboard_widgets() {

	// WordPress default dashboard widgets
	remove_meta_box( 'dashboard_right_now', 'dashboard', 'core' );
	remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'core' );
	remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'core' );
	remove_meta_box( 'dashboard_plugins', 'dashboard', 'core' );
	remove_meta_box( 'dashboard_quick_press', 'dashboard', 'core' );
	remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'core' );
	remove_meta_box( 'dashboard_primary', 'dashboard', 'core' );
	remove_meta_box( 'dashboard_secondary', 'dashboard', 'core' );
	
	// Plugin dashboard widgets
	remove_meta_box( 'yoast_db_widget', 'dashboard', 'normal' ); // Yoast's WordPress SEO Plugin Widget
	remove_meta_box( 'icl_dashboard_widget', 'dashboard', 'normal' ); // WPML plugin Dashboard Widget

}


function soblossom_remove_wp_default_widgets() {

	// source: sixrevisions.com/wordpress/how-to-customize-the-wordpress-admin-area/
	unregister_widget( 'WP_Widget_Pages' );
	unregister_widget( 'WP_Widget_Calendar' );
	unregister_widget( 'WP_Widget_Archives' );
	if ( get_option( 'link_manager_enabled' ) )
		unregister_widget( 'WP_Widget_Links' );
	unregister_widget( 'WP_Widget_Meta' );
	unregister_widget( 'WP_Widget_Search' );
	unregister_widget( 'WP_Widget_Text' );
	unregister_widget( 'WP_Widget_Categories' );
	unregister_widget( 'WP_Widget_Recent_Posts' );
	unregister_widget( 'WP_Widget_Recent_Comments' );
	unregister_widget( 'WP_Widget_RSS' );
	unregister_widget( 'WP_Widget_Tag_Cloud' );
	unregister_widget( 'WP_Nav_Menu_Widget' );

}


function soblossom_login_stylesheet() {
    wp_enqueue_style( 'custom-login', get_template_directory_uri() . '/css/custom-login.css' );
}

function soblossom_login_logo_url() {
    return home_url();
}

function soblossom_login_logo_url_title() {
    get_option( 'blogname' );
}

function soblossom_remove_lostpassword_text ( $text ) {
	if ( $text == 'Lost your password?' ) {
		$text = '';
	}
	 return $text;
}

