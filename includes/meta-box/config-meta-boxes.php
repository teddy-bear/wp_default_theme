<?php
/**
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

// Gallery meta box (used in Portfolio).
$meta_boxes[] = array(
  // Meta box id, UNIQUE per meta box. Optional since 4.1.5
  'id'       => 'gallery-meta-box',
  // Meta box title - Will appear at the drag and drop handle bar. Required.
  'title'    => __( 'Gallery Images', 'framework' ),
  // Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
  'pages'    => array( 'portfolio' ),
  // Where the meta box appear: normal (default), advanced, side. Optional.
  'context'  => 'normal',
  // Order of meta box: high (default), low. Optional.
  'priority' => 'high',
  // List of meta fields
  'fields'   => array(
    array(
      'name'             => __( 'Upload Gallery Images', 'framework' ),
      'id'               => "gallery",
      'desc'             => __( 'Images should have minimum width of 830px and minimum height of 323px, Bigger size images will be cropped automatically.', 'framework' ),
      'type'             => 'image_advanced',
      'max_file_uploads' => 100
    )
  )
);

// Page header image.
$meta_boxes[] = array(
  // Meta box id, UNIQUE per meta box. Optional since 4.1.5
  'id'       => 'header-background-meta-box',
  // Meta box title - Will appear at the drag and drop handle bar. Required.
  'title'    => __( 'Header section', 'framework' ),
  // Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
  'pages'    => array( 'page', 'post' ),
  // Where the meta box appear: normal (default), advanced, side. Optional.
  'context'  => 'normal',
  // Order of meta box: high (default), low. Optional.
  'priority' => 'high',
  // List of meta fields
  'fields'   => array(
    array(
      'name' => __( 'Slogan', 'framework' ),
      'id'   => "header-slogan",
      'desc' => __( 'Appears on top of the page, above the main column.', 'framework' ),
      'type' => 'text'
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
