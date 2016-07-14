<?php

if ( ! function_exists( 'theme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 *
	 */
	function theme_setup() {

		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on twentyfifteen, use a find and replace
		 * to change 'twentyfifteen' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'theme', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 825, 510, TRUE );

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus( array(
			'primary' => __( 'Primary Menu' ),
			'social'  => __( 'Secondary Menu' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption'
		) );

		/*
		 * Enable support for Post Formats.
		 *
		 * See: https://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
			'gallery',
			'status',
			'audio',
			'chat'
		) );

	}
endif; // theme_setup
add_action( 'after_setup_theme', 'theme_setup' );


/**
 * Declare post types
 *
 * Learn more: {@link http://codex.wordpress.org/Function_Reference/register_post_type}
 */

/* Services */
add_action( 'init', 'post_type_projects' );
function post_type_projects() {
	$labels = array(
		'name'               => _x( 'Services', 'post type general name', '' ),
		'singular_name'      => _x( 'Services', 'post type singular name', '' ),
		'menu_name'          => _x( 'Services', 'admin menu', '' ),
		'name_admin_bar'     => _x( 'Services', 'add new on admin bar', '' ),
		'add_new'            => __( 'Add New Service', '' ),
		'add_new_item'       => __( 'Add New Service', '' ),
		'new_item'           => __( 'New Service', '' ),
		'edit_item'          => __( 'Edit Service', '' ),
		'view_item'          => __( 'View Service', '' ),
		'all_items'          => __( 'All Services', '' ),
		'search_items'       => __( 'Search Service', '' ),
		'parent_item_colon'  => __( 'Parent Service:', '' ),
		'not_found'          => __( 'No Services found.', '' ),
		'not_found_in_trash' => __( 'No Services found in Trash.', '' )
	);
	register_post_type( 'services',
		array(
			'labels'        => $labels,
			'public'        => TRUE,
			'menu_position' => 7,
			'menu_icon'     => 'dashicons-admin-multisite',
			'rewrite'       => array(
				'slug' => 'projects',
			),
			'supports'      => array(
				'title',
				'thumbnail',
				'editor',
				'excerpt'
			)
		)
	);
	$taxonomy_labels = array(
		'name'                       => _x( 'Services categories', 'taxonomy general name' ),
		'singular_name'              => _x( 'Category', 'taxonomy singular name' ),
		'search_items'               => __( 'Search Categories' ),
		'popular_items'              => __( 'Popular Categories' ),
		'all_items'                  => __( 'All Categories' ),
		'parent_item'                => NULL,
		'parent_item_colon'          => NULL,
		'edit_item'                  => __( 'Edit Category' ),
		'update_item'                => __( 'Update Category' ),
		'add_new_item'               => __( 'Add New Category' ),
		'new_item_name'              => __( 'New Category Name' ),
		'separate_items_with_commas' => __( 'Separate categories with commas' ),
		'add_or_remove_items'        => __( 'Add or remove categories' ),
		'choose_from_most_used'      => __( 'Choose from the most used categories' ),
		'not_found'                  => __( 'No categories found.' ),
		'menu_name'                  => __( 'Services Categories' ),
	);
	register_taxonomy(
		'services_category',
		'services',
		array(
			'hierarchical' => FALSE,
			'labels'       => $taxonomy_labels
		)
	);

}


/* Video */
add_action( 'init', 'post_type_video' );
function post_type_video() {
	$labels = array(
		'name'               => _x( 'Video', 'post type general name', '' ),
		'singular_name'      => _x( 'Video', 'post type singular name', '' ),
		'menu_name'          => _x( 'Video', 'admin menu', '' ),
		'name_admin_bar'     => _x( 'Video', 'add new on admin bar', '' ),
		'add_new'            => __( 'Add New item', '' ),
		'add_new_item'       => __( 'Add New item', '' ),
		'new_item'           => __( 'New item', '' ),
		'edit_item'          => __( 'Edit item', '' ),
		'view_item'          => __( 'View item', '' ),
		'all_items'          => __( 'All items', '' ),
		'search_items'       => __( 'Search Video', '' ),
		'parent_item_colon'  => __( 'Parent Video:', '' ),
		'not_found'          => __( 'No Video found.', '' ),
		'not_found_in_trash' => __( 'No Video found in Trash.', '' )
	);
	register_post_type( 'video',
		array(
			'labels'        => $labels,
			'public'        => TRUE,
			'menu_position' => 7,
			'menu_icon'     => 'dashicons-format-video',
			'supports'      => array(
				'title',
				'editor',
				'thumbnail'
			)
		)
	);
}

/* Testimonials */
add_action( 'init', 'post_type_testimonials' );
function post_type_testimonials() {
	$labels = array(
		'name'               => _x( 'Testimonials', 'post type general name', '' ),
		'singular_name'      => _x( 'Testimonials', 'post type singular name', '' ),
		'menu_name'          => _x( 'Testimonials', 'admin menu', '' ),
		'name_admin_bar'     => _x( 'Testimonials', 'add new on admin bar', '' ),
		'add_new'            => __( 'Add New Testimonial', '' ),
		'add_new_item'       => __( 'Add New Testimonial', '' ),
		'new_item'           => __( 'New Testimonial', '' ),
		'edit_item'          => __( 'Edit Testimonial', '' ),
		'view_item'          => __( 'View Testimonial', '' ),
		'all_items'          => __( 'All Testimonials', '' ),
		'search_items'       => __( 'Search Testimonial', '' ),
		'parent_item_colon'  => __( 'Parent Testimonial:', '' ),
		'not_found'          => __( 'No Testimonials found.', '' ),
		'not_found_in_trash' => __( 'No Testimonials found in Trash.', '' )
	);
	register_post_type( 'testimonials',
		array(
			'labels'              => $labels,
			'public'              => TRUE,
			'menu_position'       => 8,
			'menu_icon'           => 'dashicons-megaphone',
			'publicly_queriable'  => FALSE,
			'exclude_from_search' => TRUE,
			'supports'            => array(
				'title',
				'editor',
				'thumbnail'
			)
		)
	);
}

/* Network logotypes */
add_action( 'init', 'post_type_network_logo' );
function post_type_network_logo() {
	$labels = array(
		'name'               => _x( 'Logotypes', 'post type general name' ),
		'singular_name'      => _x( 'Logo', 'post type singular name' ),
		'menu_name'          => _x( 'Logos', 'admin menu' ),
		'name_admin_bar'     => _x( 'Logo', 'add new on admin bar' ),
		'add_new'            => __( 'Add New item' ),
		'add_new_item'       => __( 'Add New item' ),
		'new_item'           => __( 'New item' ),
		'edit_item'          => __( 'Edit item' ),
		'view_item'          => __( 'View item' ),
		'all_items'          => __( 'All items' ),
		'search_items'       => __( 'Search items' ),
		'parent_item_colon'  => __( 'Parent Logos:' ),
		'not_found'          => __( 'No Logos found.' ),
		'not_found_in_trash' => __( 'No Logos found in Trash.' )
	);
	register_post_type( 'network_logo',
		array(
			'labels'            => $labels,
			'public'            => TRUE,
			'show_in_nav_menus' => FALSE,
			'menu_position'     => 8,
			'menu_icon'         => 'dashicons-images-alt2',
			'supports'          => array(
				'title',
				'thumbnail'
			)
		)
	);
}

/* Gallery */
//add_action( 'init', 'post_type_gallery' );
function post_type_gallery() {
	register_post_type( 'gallery',
		array(
			'label'           => __( 'Gallery' ),
			'public'          => TRUE,
			'capability_type' => 'post',
			'menu_icon'       => 'dashicons-camera',
			'menu_position'   => 9,
			'supports'        => array(
				'title'
			)
		)
	);
}
