<?php
/**
 * This file is the core soblossom file which includes
 * most of the main functions. Without this file the blossom
 * cannot bloom :)
 *
 * To include any additional functions we recommend to add them to the
 * inc/functions/functionality.php file or the inc/functions/dashboard-functions.php file
 *
 * @package soblossom
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 * see available workarounds via wordpress.stackexchange.com/a/87556/2015
 */
if ( ! isset( $content_width ) ) {
	$content_width = 970;
}

add_action( 'after_setup_theme', 'soblossom_bloom' );

/**
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */

function soblossom_bloom() { //actions, filters and other theme setup related things

	/**
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on soblossom, use a find and replace
	 * to change 'soblossom' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'soblossom', get_template_directory() . '/languages' );

    // sets up theme defaults and registers support for various WordPress features
    soblossom_supports_wp_features();

    // enqueue base scripts and styles
    add_action( 'wp_enqueue_scripts', 'soblossom_scripts' );
    
    // Add stylesheet to the visual editor to more or less resemble the theme style on the backend
	add_editor_style( array( 'css/style.css', 'css/style.min.css' ) ); // remove the one you don't use.

    
    // widget areas registration (areas are created in functions.php)
	add_action( 'widgets_init', 'soblossom_register_widget_areas' );

	// Navigation menus registration (menus are created in functions.php)
	register_nav_menus(
		array(
			'topnav' => __( 'Top Navigation Menu', 'soblossom' ),
			'social' => __( 'Social Media Links', 'soblossom' ),
			'footer' => __( 'Footer Menu', 'soblossom' )
		)
	);

	// clean up the head
	add_action( 'init', 'soblossom_clean_head' );
	
    // remove action WP recent comments widget
    add_action( 'wp_head', 'soblossom_removeaction_wpwidget_recent_comments', 1 );
    
    // remove filter WP recent comments widget
    add_filter( 'wp_head', 'soblossom_removefilter_wpwidget_recent_comments', 1 );
    
	// remove WP version from RSS
    add_filter( 'the_generator', 'soblossom_remove_wp_version_from_rss' );
    
    // remove injected CSS from gallery
    add_filter( 'gallery_style', 'soblossom_remove_gallery_styling' );

    // clean up and add new excerpt more
    add_filter( 'excerpt_more', 'soblossom_clean_excerpt_more' ); //remove [&hellip;] 
    add_filter( 'get_the_excerpt', 'soblossom_new_excerpt_more' ); // add a proper read more link

    // add soblossom search form
	add_filter( 'get_search_form', 'soblossom_wpsearch' );

} // end soblossom_bloom()


/**
 * SOBLOSSOM THEME SETUP
 * sets up theme defaults and registers support for various WordPress features
 */
function soblossom_supports_wp_features() {

	// since WP 4.1 Title Tag no longer needs to be added to header directly - codex.wordpress.org/Title_Tag
	add_theme_support( 'title-tag' );
	
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails (Featured Image) on posts and pages.
	 * We will not a plethora of sizes as we prefer to dynamically resize images
	 * with the included Aqua Resizer script (functions.php), but it is there for you
	 * if you want to use it.
	 * uncomment to enable add_image_size
	 *
	 * @link codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 * @link codex.wordpress.org/Function_Reference/add_image_size
	 */
	add_theme_support( 'post-thumbnails' );
	//add_image_size( $name, $width, $height, $crop );

	// Enable support for HTML5 markup.
	// from WP 4.2 also supports widgets: //make.wordpress.org/core/2015/03/11/html5-widgets-in-wordpress-4-2/
	add_theme_support( 'html5',
		array(
			'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'widgets'
		)
	);

	// Post Formats - uncomment to enable
	/*
	add_theme_support( 'post-formats',
		array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' )
	);
	*/
	
} // end function soblossom_supports_wp_features()


/**
 * SOBLOSSOM ENQUEUE SCRIPTS & STYLES
 * define custom font urls, enqueue scripts and styles, other scripts related functions
 */

	/**
	 * Return the Google Webfont URLs of your choice
	 * These are just two samples, you can find your own fonts on Google
	 * @link: www.google.com/fonts
	 */
	function soblossom_google_webfonts() {
		$fonts_url = '';
		$fonts     = array();
		$subsets   = 'latin,latin-ext';
	
		$fonts[] = 'Source Sans Pro:200,300,700,700italic';
	
		$fonts[] = 'PT Serif:400,400italic';
		
		if ( $fonts ) {
			$fonts_url = add_query_arg( array(
				'family' => urlencode( implode( '|', $fonts ) ),
				'subset' => urlencode( $subsets ),
			), '//fonts.googleapis.com/css' ); // possible to replace with //fonts.useso.com/css for fonts to be accessible in China too
		}
	
		return $fonts_url;
	}


	// Enqueue scripts and styles.
	function soblossom_scripts() {

		/* STYLES */
		if ( WP_DEBUG || SCRIPT_DEBUG ) { // DEBUG usually is turned on in the Dev environment and off on Staging and Production

			wp_enqueue_style( 'soblossom-style', get_template_directory_uri() . '/css/style.css', array(), null );
		
		} else {
			
			wp_enqueue_style( 'soblossom-style-minified', get_template_directory_uri() . '/css/style.min.css', array(), null );
			
		}
		
		// uncomment to include Google Webfonts (see lines 132-154)
		//wp_enqueue_style( 'google_webfonts', soblossom_google_webfonts(), array(), null );
	
		/* SCRIPTS */
		if ( WP_DEBUG || SCRIPT_DEBUG ) {

			//wp_enqueue_script( 'modernizer', get_template_directory_uri() . '/bower_components/modernizr/modernizr.js', array(), null );
			
			//wp_enqueue_script( 'foundation', get_template_directory_uri() . '/bower_components/foundation/js/foundation.min.js', array(), null, true );
			
			//wp_enqueue_script( 'soblossom-js', get_template_directory_uri() . '/js/soblossom.js', array( 'jquery' ), null, true );
			
			//wp_enqueue_script( 'soblossom-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), null, true );
			
			wp_enqueue_script( 'soblossom-combined', get_template_directory_uri() . '/js/combined.js', array( 'jquery' ), null, true );
			
		} else {
		
			wp_enqueue_script( 'soblossom-minified', get_template_directory_uri() . '/js/combined.min.js', array( 'jquery' ), null, true );
		
		}		
		
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}


/**
 * WP_HEAD CLEANUP
 * all cleaning related functions
 */
	function soblossom_clean_head() {

		// EditURI link
		remove_action( 'wp_head', 'rsd_link' );

		// windows live writer
		remove_action( 'wp_head', 'wlwmanifest_link' );

		// index link
		remove_action( 'wp_head', 'index_rel_link' );

		// previous link
		remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );

		// start link
		remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );

		// links for adjacent posts
		remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );

		// WP version
		remove_action( 'wp_head', 'wp_generator' );

	} // end soblossom_clean_head()
	
	// soblossom_removeaction_wpwidget_recent_comments
	function soblossom_removeaction_wpwidget_recent_comments() {
	  global $wp_widget_factory;
	  if ( isset( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'] ) ) {
	    remove_action( 'wp_head',
	    	array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' )
	    );
	  }
	}
	
	// soblossom_removefilter_wpwidget_recent_comments
	function soblossom_removefilter_wpwidget_recent_comments() {
	   if ( has_filter( 'wp_head', 'wp_widget_recent_comments_style' ) ) {
	      remove_filter( 'wp_head', 'wp_widget_recent_comments_style' );
	   }
	}
	
	// remove WP version from RSS
	function soblossom_remove_wp_version_from_rss() {
		return '';
	}
	
	// remove injected CSS from gallery
	function soblossom_remove_gallery_styling( $css ) {
		return preg_replace( "!<style type='text/css'>(.*?)</style>!s", '', $css );
	}

/**
 * CLEAN EXCERPT MORE AND ADD A NEW EXCERPT MORE
 * edit the output to your liking
 */
	// remove [&hellip;]
	function soblossom_clean_excerpt_more( $more ) {
		return '';
	}	
	
	// add a proper read more link
	function soblossom_new_excerpt_more( $output ) {
		global $post;
		return $output . '&hellip; <a class="excerpt-read-more" href="' . get_permalink( $post->ID ) . '" title="' . __( 'Read the rest of ', 'soblossom' ) . get_the_title( $post->ID ) .'">' .  __( ' Read more <i class="fa fa-long-arrow-right"></i>', 'soblossom' ) . '</a>';
			
	}

/**
 * SEARCH FORM
 *
 * Used as a callback by get_search_form() for displaying the searchform.
 * Uses FontAwesome search icon
 */
	function soblossom_wpsearch( $form ) {
		$form = '<form role="search" method="get" id="searchform" action="' . esc_url( home_url( '/' ) ) . '">
		<label class="screen-reader-text" for="s">' . __( 'Search for:', 'soblossom' ) . '</label>
		<input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="' . esc_attr__( 'Search the Site...', 'soblossom' ) . '" />
		<input type="submit" id="searchsubmit" class="search-icon" value="" />
		</form>';
		return $form;
	}


/**
 * ADD FOUNDATION FEATURES TO SOBLOSSOM
 */
 	add_filter( 'nav_menu_css_class', 'soblossom_nav_menu_item_parent_classing', 10, 2 );
 	add_filter( 'wp_nav_menu','soblossom_change_submenu_class' );
 	add_filter( 'nav_menu_css_class', 'soblossom_active_nav_class', 10, 2 );

	// Add "has-dropdown" CSS class to navigation menu items that have children in a submenu.
	function soblossom_nav_menu_item_parent_classing( $classes, $item ) {
	    global $wpdb;
	    
		$has_children = $wpdb -> get_var( "SELECT COUNT(meta_id) FROM {$wpdb->prefix}postmeta WHERE meta_key='_menu_item_menu_item_parent' AND meta_value='" . $item->ID . "'" );
	    
	    if ( $has_children > 0 ) {
	        array_push( $classes, "has-dropdown" );
	    }
	    
	    return $classes;
	}
	
	// Deletes empty classes and changes the sub menu class name
	function soblossom_change_submenu_class( $menu ) {
	    $menu = preg_replace( '/ class="sub-menu"/', ' class="dropdown"', $menu );
	    return $menu;
	}
	
	// Use the active class of the ZURB Foundation for the current menu item. (From: https://github.com/milohuang/reverie/blob/master/functions.php)
	function soblossom_active_nav_class( $classes, $item ) {
	    if ( $item->current == 1 || $item->current_item_ancestor == true ) {
	        $classes[] = 'active';
	    }
	    return $classes;
	}
	


/**
 * A FEW SOBLOSSOM SPECIFIC TEMPLATE TAGS
 */
	if ( ! function_exists( 'soblossom_featured_image' ) ) {
		/**
		 * Outputs Featured image with Foundation Interchange (different size per browser-width)
		 * and shows the full image with Foundation Clearing Thumbs (lightbox)
		 */
		function soblossom_featured_image() {
			
			echo '<div class="featured-image">';
			
			$small = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumbnail' );
			$medium = wp_get_attachment_image_src( get_post_thumbnail_id(), 'medium' );
			$large = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
			$full = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
			
			/**
			 * To use the built-in Foundation lightbox effect to enlarge the Featured Image to full size,
			 * uncomment the following line and the one below at line 314
			 */
			//echo '<ul class="clearing-thumbs" data-clearing><li><a href="' . $full[0] . '" title="' . the_title_attribute( 'echo=0' ) . '" itemprop="image">';
			
			/**
			 * use the built-in Foundation Interchange to load different sized image depending on device
			 * alternatively you can simply show the medium-sized, large-sized image or your own image size
			 * by replacing this block with: `the_post_thumbnail( 'medium' );` or `the_post_thumbnail( 'large' );` or `the_post_thumbnail( 'custom' );`
			 *
			 * you can define image sizes in inc/soblossom.php -> soblossom_supports_wp_features()
			 *
			 * @source: zurb.com/playground/foundation-interchange
			 */
			echo '<img src="' . $small[0] . '" data-interchange="[' . $small[0] . ', (default)], [' . $medium[0] . ', (small)], [' . $medium[0] . ', (medium)], [' . $large[0] . ', (large)]" itemprop="thumbnailUrl">';
			
			//echo '</a></li></ul>';
			
			echo '</div>';
			
		} //end function soblossom_featured_image()
	
	} //endif function_exists soblossom_featured_image()
	
	
	if ( ! function_exists( 'soblossom_posted_in' ) ) {
		/**
		 * Prints entry-meta with information in which category the article has been posted and how it has been tagged.
		 */
		function soblossom_posted_in() {
			/* translators: used between list items, there is a space after the comma */
			$category_list = '<span itemprop="keywords">' . get_the_category_list( __( ', ', 'soblossom' ) ) . '</span>';

			/* translators: used between list items, there is a space after the comma */
			$tag_list =  get_the_tag_list( '<span itemprop="keywords">', ', ', '</span>' );

			if ( ! soblossom_categorized_blog() ) { // see lines 468-501 for the soblossom_categorized_blog() function
				// This blog only has 1 category so we just need to worry about tags in the meta text
				if ( '' != $tag_list ) {
					$meta_text = __( 'This article was tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'soblossom' );
				} else {
					$meta_text = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'soblossom' );
				}
			} else {
				// But this blog has loads of categories so we should probably display them here
				if ( '' != $tag_list ) {
					$meta_text = __( 'This article was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'soblossom' );
				} else {
					$meta_text = __( 'This article was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'soblossom' );
				}
			} // end check for categories on this blog
			printf(
				$meta_text,
				$category_list,
				$tag_list,
				get_permalink(),
				the_title_attribute( 'echo=0' )
			);
		
		} //end function soblossom_posted_in()
		
	} //endif function_exists soblossom_posted_in()

/**
 * DEFAULT TEMPLATE TAGS FROM UNDERSCORES THEME
 */
	if ( ! function_exists( 'soblossom_paging_nav' ) ) {
		/**
		 * Display navigation to next/previous set of posts when applicable.
		 *
		 * @return void
		 */
		function soblossom_paging_nav() {
			// Don't print empty markup if there's only one page.
			if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
				return;
			}
			?>
			<nav class="navigation paging-navigation clearfix" role="navigation">
				<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'soblossom' ); ?></h1>
				<div class="nav-links">
		
					<?php if ( get_next_posts_link() ) : ?>
					<div class="nav-previous"><?php next_posts_link( __( '<i class="fa fa-long-arrow-left"></i> Older articles', 'soblossom' ) ); ?></div>
					<?php endif; ?>
		
					<?php if ( get_previous_posts_link() ) : ?>
					<div class="nav-next"><?php previous_posts_link( __( 'Newer articles <i class="fa fa-long-arrow-right"></i>', 'soblossom' ) ); ?></div>
					<?php endif; ?>
		
				</div><!-- .nav-links -->
			</nav><!-- .navigation -->
			<?php
		}
	} //endif

		
	if ( ! function_exists( 'soblossom_post_nav' ) ) {
		/**
		 * Display navigation to next/previous post when applicable.
		 *
		 * @return void
		 */
		function soblossom_post_nav() {
			// Don't print empty markup if there's nowhere to navigate.
			$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
			$next     = get_adjacent_post( false, '', false );
		
			if ( ! $next && ! $previous ) {
				return;
			}
			?>
			<nav class="navigation post-navigation clearfix" role="navigation">
				<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'soblossom' ); ?></h1>
				<div class="nav-links">
					<?php
						previous_post_link( '<div class="nav-previous">%link</div>', _x( '<i class="fa fa-long-arrow-left"></i> %title', 'Previous post link', 'soblossom' ) );
						next_post_link(     '<div class="nav-next">%link</div>',     _x( '%title <i class="fa fa-long-arrow-right"></i>', 'Next post link', 'soblossom' ) );
					?>
				</div><!-- .nav-links -->
			</nav><!-- .navigation -->
			<?php
		}
	} //endif


	if ( ! function_exists( 'soblossom_posted_on' ) ) {
		/**
		 * Prints HTML with meta information for the current post-date/time and author.
		 */
		function soblossom_posted_on() {
			$time_string = '<time class="entry-date published updated" datetime="%1$s" title="' . __( 'Published on ', 'soblossom' ) . '%1$s">%2$s</time>';
			/*
			if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
				$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
			}
		*/
		
			$time_string = sprintf( $time_string,
				esc_attr( get_the_date() ),
				/* Translators: for Chinese translate to: Y年n月j日 */
				esc_html( get_the_date( __( 'F jS, Y', 'soblossom' ) ) )
				//esc_attr( get_the_modified_date( 'c' ) ),
				//esc_html( get_the_modified_date() )
			);
		
			$posted_on = '<i class="fa fa-calendar"></i> ' . $time_string;
		
			$author_title = __( 'Articles by ', 'soblossom' ) . esc_html( get_the_author() );
			$byline = '<span itemtype="http://schema.org/Person" itemscope="itemscope" itemprop="author" class="entry-author"><a itemprop="url" class="url fn n" rel="author" title="' . $author_title . '" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '"><i class="fa fa-user"></i> <span itemprop="name">' . esc_html( get_the_author() ) . '</span></a></span>';
		
			echo '<div class="entry-info"><span class="byline"> ' . $byline . '</span> <span class="posted-on">' . $posted_on . '</span></div>';
		
		} //end function soblossom_posted_on()
	
	} //endif function_exists soblossom_posted_on()


	/**
	 * Returns true if a blog has more than 1 category.
	 */
	function soblossom_categorized_blog() {
		if ( false === ( $all_the_cool_cats = get_transient( 'all_the_cool_cats' ) ) ) {
			// Create an array of all the categories that are attached to posts.
			$all_the_cool_cats = get_categories( array(
				'hide_empty' => 1,
			) );
	
			// Count the number of categories that are attached to the posts.
			$all_the_cool_cats = count( $all_the_cool_cats );
	
			set_transient( 'all_the_cool_cats', $all_the_cool_cats );
		}
	
		if ( '1' != $all_the_cool_cats ) {
			// This blog has more than 1 category so soblossom_categorized_blog should return true.
			return true;
		} else {
			// This blog has only 1 category so soblossom_categorized_blog should return false.
			return false;
		}
	}
	
	/**
	 * Flush out the transients used in soblossom_categorized_blog.
	 */
	function soblossom_category_transient_flusher() {
		// Like, beat it. Dig?
		delete_transient( 'all_the_cool_cats' );
	}
	add_action( 'edit_category', 'soblossom_category_transient_flusher' );
	add_action( 'save_post',     'soblossom_category_transient_flusher' );
	

/**
 * COMMENTS
 */
	/**
	 * Template for comments and pingbacks.
	 *
	 * Used as a callback by wp_list_comments() for displaying the comments.
	 *
	 * @source //themeshaper.com/2012/11/04/the-wordpress-theme-comments-template/
	 */
	if ( ! function_exists( 'soblossom_comment' ) ) {
	
		function soblossom_comment( $comment, $args, $depth ) {
		    $GLOBALS['comment'] = $comment;
		    switch ( $comment->comment_type ) :
		        case 'pingback' :
		        case 'trackback' :
		    ?>
		    <li class="post pingback">
		        <p><?php _e( 'Pingback:', 'soblossom' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'soblossom' ), ' ' ); ?></p>
		    <?php
		            break;
		        default :
		    ?>
		    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		        <article id="comment-<?php comment_ID(); ?>" class="comment">

		            <header class="comment-header comment-meta commentmetadata clearfix">
	                    <?php echo get_avatar( $comment, 60 ); ?>
	                    <cite class="fn"><i class="fa fa-user"></i> <?php echo get_comment_author_link(); ?></cite>
	                    <br />
		                <?php if ( $comment->comment_approved == '0' ) : ?>
		                    <em><?php _e( 'Your comment is awaiting moderation.', 'soblossom' ); ?></em>
		                <?php endif; ?>
								 
						<time pubdate datetime="<?php comment_time( 'c' ); ?>">
							<?php
								/* translators: 1: date, 2: time */
								printf( __( '%1$s at %2$s', 'soblossom' ), get_comment_date(), get_comment_time() );
							?>
						</time>

						<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>" title="<?php _e( 'Link to this comment.', 'soblossom' ); ?>">
							<i class="fa fa-link"></i>
						</a>						
	                    
						<?php edit_comment_link( __( '(Edit)', 'soblossom' ), ' ' ); ?>
		            
		            </header>
		 
		            <div class="comment-content"><?php comment_text(); ?></div>
		 
		            <div class="reply">
		                <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		            </div><!-- .reply -->
		        </article><!-- #comment-## -->
		 
		    <?php
		            break;
		    endswitch;
		}
	} // ends check for soblossom_comment()


/**
 * BODY CLASS
 * Add our own classes to the body_class function
 * adds language code if WPML has been installed
 *
 * @source: mimoymima.com/2013/01/lab/better-body-class-function-wordpress/
 */
	add_filter( 'body_class', 'soblossom_body_classes' );
	
	function soblossom_body_classes( $classes ) {
	
	    global $post;
	
		// return some of these things
	    if ( is_category() ) {
	    	$classes[] =  'cat-archive';
	    } elseif ( is_search() ) {
	    	$classes[] = 'search-page';
	    } elseif ( is_tag() ) {
	    	$classes[] = 'tag-archive';
	    } elseif ( is_home() ) {
	    	$classes[] = 'home-page';
	    } elseif ( is_404() ) {
	    	$classes[] = 'error-page';
	    }
	
	    // return page_(page name)
	    if ( is_page() ) {
	        $pn = $post->post_name;
	        $classes[] = 'page-' . $pn;
	    }
	
	    // if WPML has been installed return the language code
	    if ( in_array( 'sitepress-multilingual-cms/sitepress.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
		    if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
			    $lang = 'lang-' . ICL_LANGUAGE_CODE;
			    $classes[] = $lang;
		    }
	    }
	
	    return $classes;
	    
	}

/**
 * ADD FAVICON TO HEAD
 *
 * @sizes: graphicdesign.stackexchange.com/a/27142
 * @cheatsheet: github.com/audreyr/favicon-cheat-sheet
 */
	add_action( 'wp_head', 'soblossom_add_favicon' );

	function soblossom_add_favicon() {

	    echo '<link rel="apple-touch-icon-precomposed" href="' . get_template_directory_uri() . '/images/favicon-152.png">';
	    echo '<link rel="shortcut icon" href="' . get_template_directory_uri() . '/images/favicon-96.png" />';
	
	}

/**
 * Replace .sticky with .sticky-post on the post_class array (to prevent conflicts with sticky top navigation)
 *
 * @source: github.com/wearerequired/required-foundation/blob/master/includes/req-foundation.php#L294-319
 */
if ( ! function_exists( 'soblossom_enhance_sticky_post' ) ) {

	add_filter( 'post_class', 'soblossom_enhance_sticky_post', 20 );

	function soblossom_enhance_sticky_post( $classes ) {

		if ( ( $key = array_search( 'sticky', $classes ) ) !== false ) {

			unset( $classes[$key] );

			$classes[] = 'sticky-post';

		}

		return $classes;

	}

}
