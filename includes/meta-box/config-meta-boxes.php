<?php
/*
 * File Name: config-meta-boxes.php
 *
 * Declaring meta boxes and initialization.
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 */


/**
 * Prefix of meta keys (optional)
 * Use underscore (_) at the beginning to make keys hidden
 * Alt.: You also can make prefix empty to disable it
 */
// Better has an underscore as last sign
//$prefix = 'theme_';


/**
 * Declare meta boxes
 */

global $meta_boxes;

// Custom css page class
$meta_boxes[] = array(
	'id'         => 'functional-meta-box',
	'title'      => __( 'Functional', 'framework' ),
	'post_types' => array( 'page' ),
	'context'    => 'side',
	'priority'   => 'low',
	'fields'     => array(
		array(
			'name' => __( 'Page class', 'framework' ),
			'id'   => "page-class",
			'desc' => __( 'Add custom css class to the body tag', 'framework' ),
			'type' => 'text'
		)
	)
);

// Custom fields for Projects post type.
$meta_boxes[] = array(
	// Meta box id, UNIQUE per meta box. Optional since 4.1.5
	'id'       => 'projects-fields-meta-box',
	// Meta box title - Will appear at the drag and drop handle bar. Required.
	'title'    => __( 'Additional fields' ),
	// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
	'pages'    => array( 'projects' ),
	// Where the meta box appear: normal (default), advanced, side. Optional.
	'context'  => 'normal',
	// Order of meta box: high (default), low. Optional.
	'priority' => 'high',
	// List of meta fields
	'fields'   => array(
		array(
			'name' => __( 'Area' ),
			'id'   => "area",
			'desc' => __( 'square feet' ),
			'type' => 'text'
		),
		array(
			'name' => __( 'Contact agent' ),
			'id'   => "contact_agent",
			'desc' => __( 'add phone number' ),
			'type' => 'text'
		),
		array(
			'name' => __( 'Short description' ),
			'id'   => "short_description",
			'desc' => __( '' ),
			'type' => 'textarea'
		),
		array(
			'name' => __( 'Details' ),
			'id'   => "details",
			'desc' => __( 'contact details' ),
			'type' => 'wysiwyg'
		),
		array(
			'name'             => __( 'Floor Plans' ),
			'id'               => "floor_plans",
			'desc'             => __( 'add images' ),
			'type'             => 'image_advanced',
			'max_file_uploads' => 50
		),
		array(
			'name'             => __( 'Gallery' ),
			'id'               => "projects_gallery",
			'desc'             => __( 'add photos' ),
			'type'             => 'image_advanced',
			'max_file_uploads' => 50
		),
		array(
			'name' => __( 'Location' ),
			'id'   => "location",
			'desc' => __( 'location info & direction instructions' ),
			'type' => 'wysiwyg',
		),
		// Map requires at least one address field (with type = text)
		array(
			'id'   => 'address',
			'name' => __( 'Address' ),
			'type' => 'text',
			'desc' => 'google map address'
		),
		array(
			'name'          => __( 'Map' ),
			'id'            => 'map',
			'type'          => 'map',
			// Default location: 'latitude,longitude[,zoom]' (zoom is optional)
			//'std'           => '-6.233406,-35.049906,15',
			// Name of text field where address is entered. Can be list of text fields, separated by commas (for ex. city, state)
			'address_field' => 'address',
		),

	)
);

// Header section (header background + slogan).
$meta_boxes[] = array(
	'id'         => 'header-background-meta-box',
	'title'      => __( 'Header section' ),
	'post_types' => array( 'page' ),
	'context'    => 'normal',
	'priority'   => 'high',
	'fields'     => array(
		array(
			'name' => __( 'Header text' ),
			'id'   => "header-text",
			//'desc' => __( 'Write text here' ),
			'type' => 'textarea'
		),
		array(
			'name'             => __( 'Header background', 'framework' ),
			'id'               => "header-background",
			'type'             => 'image_advanced',
			'max_file_uploads' => 1
		)
	)
);

// Video field (video post type).
$meta_boxes[] = array(
	'id'         => 'video-meta-box',
	'title'      => __( 'Video' ),
	'post_types' => array( 'video' ),
	'context'    => 'normal',
	'priority'   => 'low',
	// List of meta fields
	'fields'     => array(
		array(
			'name' => __( 'oEmbed(s)' ),
			'id'   => "oembed",
			'type' => 'oembed',
		)
	)
);

// Text field (testimonials post type).
$meta_boxes1[] = array(
	'id'         => 'testimonials-meta-box',
	'title'      => __( 'Info' ),
	'post_types' => array( 'testimonials' ),
	'context'    => 'normal',
	'priority'   => 'high',
	'fields'     => array(
		array(
			'name' => __( 'Custom' ),
			'id'   => "custom",
			//'desc' => __( 'enter location' ),
			'type' => 'text'
		)
	)
);

// Link field (Logotypes post type).
$meta_boxes1[] = array(
	'id'         => 'logotype-meta-box',
	'title'      => __( 'Custom' ),
	'post_types' => array( 'logotypes' ),
	'context'    => 'normal',
	'priority'   => 'low',
	// List of meta fields
	'fields'     => array(
		array(
			'name' => __( 'Link', 'framework' ),
			'id'   => "link",
			'type' => 'url',
		)
	)
);

// Gallery meta box.
$meta_boxes[] = array(
	'id'         => 'gallery-meta-box',
	'title'      => __( 'Gallery Images' ),
	'post_types' => array( 'gallery' ),
	'context'    => 'normal',
	'priority'   => 'low',
	// List of meta fields
	'fields'     => array(
		array(
			'name'             => __( 'Upload Gallery Images', 'framework' ),
			'id'               => "gallery",
			//'desc'             => __( 'Images should have minimum width of 830px and minimum height of 323px, Bigger size images will be cropped automatically.', 'framework' ),
			'type'             => 'image_advanced',
			'max_file_uploads' => 100
		)
	)
);

// Post type select for Services to tie Gallery.
$meta_boxes1[] = array(
	'id'         => 'gallery-post-meta-box',
	'title'      => __( 'Custom' ),
	'post_types' => array( 'services' ),
	'context'    => 'normal',
	'priority'   => 'low',
	// List of meta fields
	'fields'     => array(
		array(
			'name'        => __( 'Gallery' ),
			'id'          => "gallery",
			// Field type, either 'select' or 'select_advanced' (default)
			'type'        => 'post',
			'field_type'  => 'select_advanced',
			// Placeholder
			'placeholder' => __( 'Select an Item' ),
			// Query arguments (optional). No settings means get all published posts
			// @see https://codex.wordpress.org/Class_Reference/WP_Query
			'query_args'  => array(
				'post_type'      => 'gallery',
				'post_status'    => 'publish',
				'posts_per_page' => - 1,
			)
		),
		array(
			'name'             => __( 'Preview image', 'framework' ),
			'id'               => "preview-image",
			//'desc'             => __( 'Images should have minimum width of 830px and minimum height of 323px, Bigger size images will be cropped automatically.', 'framework' ),
			'type'             => 'image_advanced',
			'max_file_uploads' => 1
		)
	)
);


/**
 * Register meta boxes
 *
 * @return void
 */
function theme_register_meta_boxes() {
	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if ( ! class_exists( 'RW_Meta_Box' ) ) {
		return;
	}

	global $meta_boxes;
	foreach ( $meta_boxes as $meta_box ) {
		new RW_Meta_Box( $meta_box );
	}
}

// Hook to 'admin_init' to make sure the meta box class is loaded before
// (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action( 'admin_init', 'theme_register_meta_boxes' );
