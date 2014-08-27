<?php
/**
 * Miscellaneous functions that you might or might not use for your theme
 *
 * By default the call to this file is commented out
 * If you need any of these you can uncomment the call in functions.php
 * or grab the functions you like and add them to the inc/functionality.php file
 *
 * @package soblossom
 */

/**
 * Function to make it possible to query on is_post_type()
 * 
 * source: http://wordpress.stackexchange.com/a/22166/2015
 */
function is_post_type( $type ) {
    global $wp_query;
    if ( $type == get_post_type( $wp_query->post->ID) ) return true;
    return false;
}

// Enable Page Excerpts
add_post_type_support( 'page', 'excerpt' );


// Enable shortcode in text widgets
add_filter( 'widget_text', 'do_shortcode' );

/**
 * Snippet taken from Remove Widget Titles plugin by Stephen Cronin
 * (because I think it is nonsense to install a plugin for a simple function like this)
 * 
 * Removes the title from any widget that has a title starting with the "!" character.
 *
 * @source: wordpress.org/plugins/remove-widget-titles/
 */
 
// Add the filter and function, returning the widget title only if the first character is not "!"
add_filter( 'widget_title', 'soblossom_remove_widget_title' );

function soblossom_remove_widget_title( $widget_title ) {
	if ( substr ( $widget_title, 0, 1 ) == '!' )
		return;
	else 
		return ( $widget_title );
}

/**
 * Sets the authordata global when viewing an author archive.
 *
 * This provides backwards compatibility with
 * http://core.trac.wordpress.org/changeset/25574
 *
 * It removes the need to call the_post() and rewind_posts() in an author
 * template to print information about the author.
 *
 * @imported from previous inc/extras.php
 * @global WP_Query $wp_query WordPress Query object.
 * @return void
 */
function soblossom_setup_author() {
	global $wp_query;

	if ( $wp_query->is_author() && isset( $wp_query->post ) ) {
		$GLOBALS['authordata'] = get_userdata( $wp_query->post->post_author );
	}
}

add_action( 'wp', 'soblossom_setup_author' );

// ADD 3RD PARTY SCRIPTS RIGHT AFTER THE OPENING BODY CLASS
	/**
	 * Add hook right after the opening body tag to be able to add scripts that 
	 * need to be placed there, for example Google Analytics, Facebook, Google+, etc.
	 *
	 * @since 140730
	 */
	function soblossom_body_open() { 
		do_action( 'soblossom_body_open' ); 
	}
	
	/**
	 * Sample function to add GA Universal tracking script to the site.
	 * 
	 * hooks into soblossom_body_open() function
	 * 
	 * @since 140730
	 */
	function soblossom_ga_script() { ?>
	
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		
		ga('create', 'UA-********-x', 'auto');
		ga('send', 'pageview');
	</script>
	
	<?php }
	
	/**
	 * Adjust above sample to your liking and uncomment the line below to start using this
	 */
	//add_action( 'soblossom_body_open', 'soblossom_ga_script' );



