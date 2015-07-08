<?php
/**
 * Register widget area.
 *
 * @link https://codex.wordpress.org/Function_Reference/register_sidebar
 */

function theme_widgets_init() {

// Header blocks
// Location: header
  register_sidebar( array(
    'name'          => 'Header blocks',
    'id'            => 'header-blocks',
    'description'   => __( 'Located in the header' ),
    'before_widget' => '<div id="%1$s" class="widget">',
    'after_widget'  => '</div>'
  ) );

// Footer blocks
// Location: footer
  register_sidebar( array(
    'name'          => 'Footer blocks',
    'id'            => 'footer-blocks',
    'description'   => __( 'Located in the footer' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4 class="widget-title">',
    'after_title'   => '</h4>'
  ) );

// Sidebar left
// Location: left column.
  register_sidebar( array(
    'name'          => __( 'Sidebar left' ),
    'id'            => 'sidebar-left',
    'description'   => __( 'Add widgets here to appear in your sidebar.' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h4 class="widget-title">',
    'after_title'   => '</h4>',
  ) );


}

add_action( 'widgets_init', 'theme_widgets_init' );
