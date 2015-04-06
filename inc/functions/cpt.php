<?php
/**
 * Sample Custom Post Type to help you on your way
 *
 * Remember: anything and everything can be customised to your wishes
 *
 * @link: generatewp.com/snippet/PGQj8gv/
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


// Hook into the 'init' action
add_action( 'init', 'soblossom_sample_cpt', 0 );

// Register Custom Post Type
function soblossom_sample_cpt() {

	$labels = array(
		'name'                => _x( 'Samples', 'Post Type General Name', 'soblossom-cpt' ),
		'singular_name'       => _x( 'Sample', 'Post Type Singular Name', 'soblossom-cpt' ),
		'menu_name'           => __( 'Samples', 'soblossom-cpt' ),
		'parent_item_colon'   => __( 'Parent Sample:', 'soblossom-cpt' ),
		'all_items'           => __( 'All Samples', 'soblossom-cpt' ),
		'view_item'           => __( 'View Sample', 'soblossom-cpt' ),
		'add_new_item'        => __( 'Add New Sample', 'soblossom-cpt' ),
		'add_new'             => __( 'Add New', 'soblossom-cpt' ),
		'edit_item'           => __( 'Edit Sample', 'soblossom-cpt' ),
		'update_item'         => __( 'Update Sample', 'soblossom-cpt' ),
		'search_items'        => __( 'Search Sample', 'soblossom-cpt' ),
		'not_found'           => __( 'Not found', 'soblossom-cpt' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'soblossom-cpt' ),
	);
	
	$args = array(
		'label'               => __( 'sample_cpt', 'soblossom-cpt' ),
		'description'         => __( 'Sample Custom Post Type for the soblossom theme', 'soblossom-cpt' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', 'post-formats' ), // remove the ones you don't need
		'taxonomies'          => array( 'category', 'post_tag' ), // or any other custom taxonomy
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-tickets', // use dashicons for supercool icon (melchoyce.github.io/dashicons/)
		'can_export'          => true,
		'has_archive'         => 'sample', // rename slug or set to true for default
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
		'rewrite'			  => array( 'slug' => 'samples', 'with_front' => false ), // specify url slug or remove for default
		

	);
	
	register_post_type( 'sample_cpt', $args );

}

// Generate Custom Taxonomies via generatewp.com/taxonomy/ and add them below