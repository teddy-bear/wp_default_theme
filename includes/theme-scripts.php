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

	// Bootstrap styles.
	// file contains only grid classes.
	wp_enqueue_style( 'bootstrap-grid', get_template_directory_uri() . '/css/bootstrap-grid.css' );

	// CSS Animations library.
	// @link https://daneden.github.io/animate.css/
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.min.css' );

	/* Custom fonts */
	wp_enqueue_style( 'custom-fonts', '//fonts.googleapis.com/css?family=Raleway:400,700,600,500|Open+Sans:400,700,400italic|Cinzel' );
	wp_enqueue_style( 'Font-Awesome', get_template_directory_uri() . '/css/font-awesome.min.css' );

	// Remove contact form styles.
	wp_dequeue_style( array( 'contact-form-7' ) );

	/**
	 * Device dependant styles.
	 */
	if ( ! $detect->isMobile() ) {

	}

	// Mobile only styles here.
	if ( $detect->isMobile() ) {
	}
	// Mobile menu
	wp_enqueue_style( 'mmenu', get_template_directory_uri() . '/css/jquery.mmenu.all.css' );

	// Theme stylesheet.
	wp_enqueue_style( 'main', get_template_directory_uri() . '/css/main.css' );

	/* ++++++++++ Scripts ++++++++++ */

	// Dropdown menu for non mobile devices.
	wp_enqueue_script( 'superfish', get_template_directory_uri() . '/js/superfish.min.js', array( 'jquery' ), '1.7.5', TRUE );

	// Pinned elements on page scroll.
	//wp_enqueue_script( 'pin', get_template_directory_uri() . '/js/jquery.pin.min.js', array( 'jquery' ), '', TRUE );

	// On scroll events.
	wp_enqueue_script( 'wow', get_template_directory_uri() . '/js/wow.min.js', array( 'jquery' ), '', TRUE );

	// Equal heights.
	wp_enqueue_script( 'matchHeight', get_template_directory_uri() . '/js/jquery.matchHeight-min.js', array( 'jquery' ), '', TRUE );

	// Magnific popup.
	wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', array( 'jquery' ), FALSE, TRUE );

	if ( is_front_page() ) {
		// Youtube api
		wp_enqueue_script( 'iframe_api', '//www.youtube.com/iframe_api', FALSE, '', TRUE );
	}

	// Adaptive carousel.
	wp_enqueue_script( 'owl_carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array( 'jquery' ), '2', TRUE );

	// Parallax effect for rows background.
	//wp_enqueue_script( 'parallax', get_template_directory_uri() . '/js/jquery.parallax.min.js', array( 'jquery' ), '', TRUE );

	if ( ! $detect->isMobile() && ! $detect->isTablet() ) {
		/**
		 * Desktop scripts here
		 */
		// Theme custom scripts.
		wp_enqueue_script( 'init_desktop', get_template_directory_uri() . '/js/init_desktop.js', array( 'jquery' ), '1.0', TRUE );

	} else {
		/**
		 * Tablet & Mobile scripts.
		 */
		// Theme custom scripts.
		//wp_enqueue_script( 'init_touch', get_template_directory_uri() . '/js/init_touch.js', array( 'jquery' ), '1.0', TRUE );

	}
	/**
	 * Mobile only scripts (exclude tablets).
	 */
	if ( $detect->isMobile() && ! $detect->isTablet() ) {
		//wp_enqueue_script( 'init_mobile', get_template_directory_uri() . '/js/init_mobile.js', array( 'jquery' ), FALSE, TRUE );
	}
	// Mobile menu.
	wp_enqueue_script( 'mmenu', get_template_directory_uri() . '/js/jquery.mmenu.min.all.js', array( 'jquery' ), '4.7.4', TRUE );


	/**
	 * Theme custom scripts for all devices.
	 */
	wp_enqueue_script( 'init', get_template_directory_uri() . '/js/init.js', array( 'jquery' ), '', TRUE );

}

add_action( 'wp_enqueue_scripts', 'theme_scripts' );