<?php
/**
 * Sample Custom Meta Box to help you on your way
 *
 * Remember: anything and everything can be customised to your wishes
 * Also keep in mind that to use these, you need to have the Meta Box plugin installed: metabox.io
 *
 * @link: github.com/rilwis/meta-box/blob/master/demo/demo.php
 */

/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://metabox.io
 */


add_filter( 'rwmb_meta_boxes', 'soblossom_register_meta_boxes' );

/**
 * Register meta boxes
 *
 * Remember to change "your_prefix" to actual prefix in your project
 *
 * @return void
 */
function soblossom_register_meta_boxes( $meta_boxes ) {
	/**
	 * prefix of meta keys (optional)
	 * Use underscore (_) at the beginning to make keys hidden
	 * Alt.: You also can make prefix empty to disable it
	 */
	// Better has an underscore as last sign
	$prefix = '_soblossom_';

	// 1st meta box
	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id' => 'standard',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title' => __( 'Standard Fields', 'soblossom-cmb' ),

		// Post types, accept custom post types as well - DEFAULT is 'post'. Can be array (multiple post types) or string (1 post type). Optional.
		'post_types' => array( 'post', 'page' ),

		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context' => 'normal',

		// Order of meta box: high (default), low. Optional.
		'priority' => 'high',

		// Auto save: true, false (default). Optional.
		'autosave' => true,

		// List of meta fields
		'fields' => array(
			// TEXT
			array(
				// Field name - Will be used as label
				'name' => __( 'Text', 'soblossom-cmb' ),
				// Field ID, i.e. the meta key
				'id' => "{$prefix}text",
				// Field description (optional)
				'desc' => __( 'Text description', 'soblossom-cmb' ),
				'type'  => 'text',
				// Default value (optional)
				'std' => __( 'Default text value', 'soblossom-cmb' ),
				// CLONES: Add to make the field cloneable (i.e. have multiple value)
				'clone' => true,
			),
			// CHECKBOX
			array(
				'name' => __( 'Checkbox', 'soblossom-cmb' ),
				'id'   => "{$prefix}checkbox",
				'type' => 'checkbox',
				// Value can be 0 or 1
				'std'  => 1,
			),
			// RADIO BUTTONS
			array(
				'name'    => __( 'Radio', 'soblossom-cmb' ),
				'id'      => "{$prefix}radio",
				'type'    => 'radio',
				// Array of 'value' => 'Label' pairs for radio options.
				// Note: the 'value' is stored in meta field, not the 'Label'
				'options' => array(
					'value1' => __( 'Label1', 'soblossom-cmb' ),
					'value2' => __( 'Label2', 'soblossom-cmb' ),
				),
			),
			// SELECT BOX
			array(
				'name'        => __( 'Select', 'soblossom-cmb' ),
				'id'          => "{$prefix}select",
				'type'        => 'select',
				// Array of 'value' => 'Label' pairs for select box
				'options'     => array(
					'value1' => __( 'Label1', 'soblossom-cmb' ),
					'value2' => __( 'Label2', 'soblossom-cmb' ),
				),
				// Select multiple values, optional. Default is false.
				'multiple'    => false,
				'std'         => 'value2',
				'placeholder' => __( 'Select an Item', 'soblossom-cmb' ),
			),
			// HIDDEN
			array(
				'id'   => "{$prefix}hidden",
				'type' => 'hidden',
				// Hidden field must have predefined value
				'std'  => __( 'Hidden value', 'soblossom-cmb' ),
			),
/*
			// PASSWORD
			array(
				'name' => __( 'Password', 'soblossom-cmb' ),
				'id'   => "{$prefix}password",
				'type' => 'password',
			),
*/
			// TEXTAREA
			array(
				'name' => __( 'Textarea', 'soblossom-cmb' ),
				'desc' => __( 'Textarea description', 'soblossom-cmb' ),
				'id'   => "{$prefix}textarea",
				'type' => 'textarea',
				'cols' => 20,
				'rows' => 3,
			),
		),
/*
		'validation' => array(
			'rules'    => array(
				"{$prefix}password" => array(
					'required'  => true,
					'minlength' => 7,
				),
			),
			// optional override of default jquery.validate messages
			'messages' => array(
				"{$prefix}password" => array(
					'required'  => __( 'Password is required', 'soblossom-cmb' ),
					'minlength' => __( 'Password must be at least 7 characters', 'soblossom-cmb' ),
				),
			)
		)
*/
	);

	// 2nd meta box
	$meta_boxes[] = array(
		'title'  => __( 'Advanced Fields', 'soblossom-cmb' ),
		'post_types' => array( 'post', 'page' ),

		'fields' => array(
			// HEADING
			array(
				'type' => 'heading',
				'name' => __( 'Heading', 'soblossom-cmb' ),
				'id'   => 'fake_id', // Not used but needed for plugin
				'desc' => __( 'Optional description for this heading', 'soblossom-cmb' ),
			),
			// SLIDER
			array(
				'name'       => __( 'Slider', 'soblossom-cmb' ),
				'id'         => "{$prefix}slider",
				'type'       => 'slider',

				// Text labels displayed before and after value
				'prefix'     => __( '$', 'soblossom-cmb' ),
				'suffix'     => __( ' USD', 'soblossom-cmb' ),

				// jQuery UI slider options. See here http://api.jqueryui.com/slider/
				'js_options' => array(
					'min'  => 10,
					'max'  => 255,
					'step' => 5,
				),
			),
			// NUMBER
			array(
				'name' => __( 'Number', 'soblossom-cmb' ),
				'id'   => "{$prefix}number",
				'type' => 'number',

				'min'  => 0,
				'step' => 5,
			),
			// DATE
			array(
				'name'       => __( 'Date picker', 'soblossom-cmb' ),
				'id'         => "{$prefix}date",
				'type'       => 'date',

				// jQuery date picker options. See here http://api.jqueryui.com/datepicker
				'js_options' => array(
					'appendText'      => __( '(yyyy-mm-dd)', 'soblossom-cmb' ),
					'dateFormat'      => __( 'yy-mm-dd', 'soblossom-cmb' ),
					'changeMonth'     => true,
					'changeYear'      => true,
					'showButtonPanel' => true,
				),
			),
			// DATETIME
			array(
				'name'       => __( 'Datetime picker', 'soblossom-cmb' ),
				'id'         => $prefix . 'datetime',
				'type'       => 'datetime',

				// jQuery datetime picker options.
				// For date options, see here http://api.jqueryui.com/datepicker
				// For time options, see here http://trentrichardson.com/examples/timepicker/
				'js_options' => array(
					'stepMinute'     => 15,
					'showTimepicker' => true,
				),
			),
			// TIME
			array(
				'name'       => __( 'Time picker', 'soblossom-cmb' ),
				'id'         => $prefix . 'time',
				'type'       => 'time',

				// jQuery datetime picker options.
				// For date options, see here http://api.jqueryui.com/datepicker
				// For time options, see here http://trentrichardson.com/examples/timepicker/
				'js_options' => array(
					'stepMinute' => 5,
					'showSecond' => true,
					'stepSecond' => 10,
				),
			),
			// COLOR
			array(
				'name' => __( 'Color picker', 'soblossom-cmb' ),
				'id'   => "{$prefix}color",
				'type' => 'color',
			),
			// CHECKBOX LIST
			array(
				'name'    => __( 'Checkbox list', 'soblossom-cmb' ),
				'id'      => "{$prefix}checkbox_list",
				'type'    => 'checkbox_list',
				// Options of checkboxes, in format 'value' => 'Label'
				'options' => array(
					'value1' => __( 'Label1', 'soblossom-cmb' ),
					'value2' => __( 'Label2', 'soblossom-cmb' ),
				),
			),
			// AUTOCOMPLETE
			array(
				'name'    => __( 'Autocomplete', 'soblossom-cmb' ),
				'id'      => "{$prefix}autocomplete",
				'type'    => 'autocomplete',
				// Options of autocomplete, in format 'value' => 'Label'
				'options' => array(
					'value1' => __( 'Label1', 'soblossom-cmb' ),
					'value2' => __( 'Label2', 'soblossom-cmb' ),
				),
				// Input size
				'size'    => 30,
				// Clone?
				'clone'   => false,
			),
			// EMAIL
			array(
				'name' => __( 'Email', 'soblossom-cmb' ),
				'id'   => "{$prefix}email",
				'desc' => __( 'Email description', 'soblossom-cmb' ),
				'type' => 'email',
				'std'  => 'name@email.com',
			),
			// RANGE
			array(
				'name' => __( 'Range', 'soblossom-cmb' ),
				'id'   => "{$prefix}range",
				'desc' => __( 'Range description', 'soblossom-cmb' ),
				'type' => 'range',
				'min'  => 0,
				'max'  => 100,
				'step' => 5,
				'std'  => 0,
			),
			// URL
			array(
				'name' => __( 'URL', 'soblossom-cmb' ),
				'id'   => "{$prefix}url",
				'desc' => __( 'URL description', 'soblossom-cmb' ),
				'type' => 'url',
				'std'  => 'http://google.com',
			),
			// OEMBED
			array(
				'name' => __( 'oEmbed', 'soblossom-cmb' ),
				'id'   => "{$prefix}oembed",
				'desc' => __( 'oEmbed description', 'soblossom-cmb' ),
				'type' => 'oembed',
			),
			// SELECT ADVANCED BOX
			array(
				'name'        => __( 'Select', 'soblossom-cmb' ),
				'id'          => "{$prefix}select_advanced",
				'type'        => 'select_advanced',
				// Array of 'value' => 'Label' pairs for select box
				'options'     => array(
					'value1' => __( 'Label1', 'soblossom-cmb' ),
					'value2' => __( 'Label2', 'soblossom-cmb' ),
				),
				// Select multiple values, optional. Default is false.
				'multiple'    => false,
				// 'std'         => 'value2', // Default value, optional
				'placeholder' => __( 'Select an Item', 'soblossom-cmb' ),
			),
			// TAXONOMY
			array(
				'name'    => __( 'Taxonomy', 'soblossom-cmb' ),
				'id'      => "{$prefix}taxonomy",
				'type'    => 'taxonomy',
				'options' => array(
					// Taxonomy name
					'taxonomy' => 'category',
					// How to show taxonomy: 'checkbox_list' (default) or 'checkbox_tree', 'select_tree', select_advanced or 'select'. Optional
					'type'     => 'checkbox_list',
					// Additional arguments for get_terms() function. Optional
					'args'     => array()
				),
			),
			// POST
			array(
				'name'        => __( 'Posts (Pages)', 'soblossom-cmb' ),
				'id'          => "{$prefix}pages",
				'type'        => 'post',
				// Post type
				'post_type'   => 'page',
				// Field type, either 'select' or 'select_advanced' (default)
				'field_type'  => 'select_advanced',
				'placeholder' => __( 'Select an Item', 'soblossom-cmb' ),
				// Query arguments (optional). No settings means get all published posts
				'query_args'  => array(
					'post_status'    => 'publish',
					'posts_per_page' => - 1,
				)
			),
			// WYSIWYG/RICH TEXT EDITOR
			array(
				'name'    => __( 'WYSIWYG / Rich Text Editor', 'soblossom-cmb' ),
				'id'      => "{$prefix}wysiwyg",
				'type'    => 'wysiwyg',
				// Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
				'raw'     => false,
				'std'     => __( 'WYSIWYG default value', 'soblossom-cmb' ),

				// Editor settings, see wp_editor() function: look4wp.com/wp_editor
				'options' => array(
					'textarea_rows' => 4,
					'teeny'         => true,
					'media_buttons' => false,
				),
			),
			// DIVIDER
			array(
				'type' => 'divider',
				'id'   => 'fake_divider_id', // Not used, but needed
			),
			// FILE UPLOAD
			array(
				'name' => __( 'File Upload', 'soblossom-cmb' ),
				'id'   => "{$prefix}file",
				'type' => 'file',
			),
			// FILE ADVANCED (WP 3.5+)
			array(
				'name'             => __( 'File Advanced Upload', 'soblossom-cmb' ),
				'id'               => "{$prefix}file_advanced",
				'type'             => 'file_advanced',
				'max_file_uploads' => 4,
				'mime_type'        => 'application,audio,video', // Leave blank for all file types
			),
			// IMAGE UPLOAD
			array(
				'name' => __( 'Image Upload', 'soblossom-cmb' ),
				'id'   => "{$prefix}image",
				'type' => 'image',
			),
			// THICKBOX IMAGE UPLOAD (WP 3.3+)
			array(
				'name' => __( 'Thickbox Image Upload', 'soblossom-cmb' ),
				'id'   => "{$prefix}thickbox",
				'type' => 'thickbox_image',
			),
			// PLUPLOAD IMAGE UPLOAD (WP 3.3+)
			array(
				'name'             => __( 'Plupload Image Upload', 'soblossom-cmb' ),
				'id'               => "{$prefix}plupload",
				'type'             => 'plupload_image',
				'max_file_uploads' => 4,
			),
			// IMAGE ADVANCED (WP 3.5+)
			array(
				'name'             => __( 'Image Advanced Upload', 'soblossom-cmb' ),
				'id'               => "{$prefix}imgadv",
				'type'             => 'image_advanced',
				'max_file_uploads' => 4,
			),
			// BUTTON
			array(
				'id'   => "{$prefix}button",
				'type' => 'button',
				'name' => ' ', // Empty name will "align" the button to all field inputs
			),
		)
	);

	return $meta_boxes;
}


