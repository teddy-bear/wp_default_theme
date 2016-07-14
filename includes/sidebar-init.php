<?php
/**
 * Register widget area.
 *
 * @link https://codex.wordpress.org/Function_Reference/register_sidebar
 */

function theme_widgets_init() {

// Sidebar default
// Location: sidebar-right page layout.
	register_sidebar( array(
		'name'          => __( 'Sidebar right' ),
		'id'            => 'sidebar-right',
		'description'   => __( 'shows on sidebar right page layout' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	
// Header blocks
// Location: header
	register_sidebar( array(
		'name'          => __( 'Header blocks' ),
		'id'            => 'header-blocks',
		'description'   => __( 'above header menu' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		/*'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',*/
	) );

// Footer blocks
// Location: footer
	register_sidebar( array(
		'name'          => 'Footer blocks',
		'id'            => 'footer-blocks',
		'description'   => __( 'Located in the footer' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>'
	) );

}

add_action( 'widgets_init', 'theme_widgets_init' );
