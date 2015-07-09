<?php
/**
 * Enqueue scripts and styles.
 */
function theme_scripts() {

  /**
   * Script for device detection -> includes\mobile_Detect.php
   * used to initialize scripts/styles on specific devices
   */
  $detect = new Mobile_Detect;

  /* ++++++++++ Styles ++++++++++ */
  // Load default stylesheet.
  wp_enqueue_style( 'default', get_stylesheet_uri() );

  // Exclude plugin styles since we override theme by theme styles.
  wp_dequeue_style('crellyslider');

  // Bootstrap styles.
  // file contains only grid classes.
  wp_enqueue_style( 'bootstrap.min', get_template_directory_uri() . '/css/bootstrap-grid.css' );

  /* Custom fonts */
  wp_enqueue_style( 'Roboto', '//fonts.googleapis.com/css?family=Roboto:400,300,500,700,900' );
  wp_enqueue_style( 'Roboto Condensed', '//fonts.googleapis.com/css?family=Roboto+Condensed:300italic,400italic,700italic,400,300,700' );
  wp_enqueue_style( 'Oswald', '//fonts.googleapis.com/css?family=Oswald:400,700,300' );
  wp_enqueue_style( 'Playfair Display', '//fonts.googleapis.com/css?family=Playfair+Display:400,700,900' );
  wp_enqueue_style( 'Font Awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css' );


  /**
   * Device dependant styles.
   */
  if ( ! $detect->isMobile() && ! $detect->isTablet() ) {
    // animate elements on page scroll
    // wp_enqueue_style( 'scroll animate', get_template_directory_uri() . '/css/scroll_animate.css' );
  }

  if ( $detect->isMobile()) {
    // Mobile menu
    wp_enqueue_style( 'mmenu', get_template_directory_uri() . '/css/jquery.mmenu.all.css' );
  }

  // Theme stylesheet.
  wp_enqueue_style( 'main', get_template_directory_uri() . '/css/main.css' );

  /**
   * Scripts
   */
  // Dropdown menu for non mobile devices.
  wp_enqueue_script( 'superfish', get_template_directory_uri() . '/js/superfish.min.js', array( 'jquery' ), '1.7.5', TRUE );

  // Pinned elements on page scroll.
  wp_enqueue_script( 'pin', get_template_directory_uri() . '/js/jquery.pin.min.js', array( 'jquery' ), '', TRUE );

  wp_enqueue_script( 'smartsite', '//www.smartsite.tv/remote/smartV2.php?oid=y3zB4QB72', array( 'jquery' ), '', TRUE );

  if ( ! $detect->isMobile() && ! $detect->isTablet() ) {
    // Theme custom scripts.
    wp_enqueue_script( 'init_touch', get_template_directory_uri() . '/js/init_desktop.js', array( 'jquery' ), '1.0', TRUE );

  } else {
    /**
     * Tablet & Mobile scripts.
     */
    // Theme custom scripts.
    wp_enqueue_script( 'init_touch', get_template_directory_uri() . '/js/init_touch.js', array( 'jquery' ), '1.0', TRUE );
  }
  /**
   * Mobile only scripts.
   */
  if ( $detect->isMobile()){
    // Mobile menu.
  }
  wp_enqueue_script( 'mmenu', get_template_directory_uri() . '/js/jquery.mmenu.min.all.js', array( 'jquery' ), '4.7.4', TRUE );


  /**
   * Theme custom scripts for all devices.
   */
  wp_enqueue_script( 'init', get_template_directory_uri() . '/js/init.js', array( 'jquery' ), '', TRUE );
}

add_action( 'wp_enqueue_scripts', 'theme_scripts' );