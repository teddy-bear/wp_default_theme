<?php

/**
 * Theme custom functions.
 */

/**
 * Cut string length to a specified words limit
 *
 * @param string $text
 * @param integer $limit
 *
 * @return string
 */
function trim_string_length( $text, $limit ) {
  $text = strip_tags( $text );
  if ( str_word_count( $text, 0 ) > $limit ) {
    $words = str_word_count( $text, 2 );
    $pos   = array_keys( $words );
    $text  = substr( $text, 0, $pos[ $limit ] );
  }

  return $text;
}


/**
 * Remove invalid tags
 *
 * @param string $str
 * @param array $tags
 *
 * @return string
 */
function remove_invalid_tags( $str, $tags ) {
  foreach ( $tags as $tag ) {
    $str = preg_replace( '#^<\/' . $tag . '>|<' . $tag . '>$#', '', trim( $str ) );
  }

  return $str;
}

/**
 * Remove Empty Paragraphs
 */
add_filter( 'the_content', 'shortcode_empty_paragraph_fix' );
function shortcode_empty_paragraph_fix( $content ) {
  $array = array(
    '<p>['    => '[',
    ']</p>'   => ']',
    ']<br />' => ']'
  );

  $content = strtr( $content, $array );

  return $content;
}

/**
 * Custom Pagination
 * @link http://www.kriesi.at/archives/how-to-build-a-wordpress-post-pagination-without-plugin
 */
function pagination( $pages = '', $range = 2 ) {
  $showitems = ( $range * 2 ) + 1;

  global $paged;
  if ( empty( $paged ) ) {
    $paged = 1;
  }

  if ( $pages == '' ) {
    global $wp_query;
    $pages = $wp_query->max_num_pages;
    if ( ! $pages ) {
      $pages = 1;
    }
  }

  if ( 1 != $pages ) {
    echo "<div class='pagination-custom'>";
    if ( $paged > 2 && $paged > $range + 1 && $showitems < $pages ) {
      echo "<a class='custom' href='" . get_pagenum_link( 1 ) . "'><i class='fa fa-angle-left'></i><i class='fa fa-angle-left'></i> First page</a>";
    }
    if ( $paged > 1 && $showitems < $pages ) {
      echo "<a class='custom' href='" . get_pagenum_link( $paged - 1 ) . "'><i class='fa fa-angle-left'></i> Previous page</a>";
    }

    for ( $i = 1; $i <= $pages; $i ++ ) {
      if ( 1 != $pages && ( ! ( $i >= $paged + $range + 1 || $i <= $paged - $range - 1 ) || $pages <= $showitems ) ) {
        echo ( $paged == $i ) ? "<span class='current'>" . $i . "</span>" : "<a href='" . get_pagenum_link( $i ) . "' class='inactive' >" . $i . "</a>";
      }
    }

    if ( $paged < $pages && $showitems < $pages ) {
      echo "<a class='custom' href='" . get_pagenum_link( $paged + 1 ) . "'>Next page <i class='fa fa-angle-right'></i></a>";
    }
    if ( $paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages ) {
      echo "<a class='custom' href='" . get_pagenum_link( $pages ) . "'>Last page <i class='fa fa-angle-right'></i><i class='fa fa-angle-right'></i></a>";
    }
    echo "</div>\n";
  }
}

/**
 * Retrieve browser name and attach it to the custom body class.
 * updates html output by modifying $body_class variable defined in header.php
 */
function append_browser_name( &$body_class ) {
  $user_agent = $_SERVER["HTTP_USER_AGENT"];
  if ( strpos( $user_agent, "Presto" ) ) {
    $browser = "opera";
  } else if ( strpos( $user_agent, "Chrome" ) ) {
    $browser = "chrome";
  } else if ( strpos( $user_agent, "Safari" ) ) {
    $browser = "safari";
  } else if ( strpos( $user_agent, 'Firefox' ) ) {
    $browser = "firefox";
  } else if ( strpos( $user_agent, "MSIE" ) ) {
    $browser = "ie";
  } else {
    $browser = "other";
  }

  return $body_class .= ' ' . $browser;
}

/**
 * Set site logo.
 * @return string
 */
function site_logo() {

  $logo = get_stylesheet_directory_uri() . '/images/logo.png';

  // uncomment this if we use theme options interface
  /*if ( of_get_option( 'logo' ) ) {
    $logo = of_get_option( 'logo' );
  }*/

  echo $logo;
}

/**
 * Add specific CSS body classes by filter
 * @link https://codex.wordpress.org/Function_Reference/body_class
 */
add_filter( 'body_class', 'custom_body_css' );
function custom_body_css( $classes ) {
  // add meta box value.
  $classes[] = rwmb_meta( 'page-class' );

  // front page check.
  if ( ! is_front_page() ) {
    $classes[] = 'not-home';
  }

  // touch device check.
  $detect = new Mobile_Detect;
  if ( ! $detect->isMobile() && ! $detect->isTablet() ) {
    $classes[] = 'non-touch';
  } else {
    $classes[] = ' touch';
  }

  // Sidebar check.
  // todo: make it work; it shows that sidebar is always on
  /*if ( is_active_sidebar( 'Sidebar' ) == TRUE ) {
    $classes[] = ' has-sidebar';
  } else {
    $classes[] = ' no-sidebar';
  }*/

  // Browser class.
  $classes[] = append_browser_name( $body_class );

  return $classes;
}

/**
 * Add support for Really Simple Captcha in Contact form 7 > v.4.3
 * @link http://contactform7.com/2015/09/17/contact-form-7-43/
 */
add_filter( 'wpcf7_use_really_simple_captcha', '__return_true' );

/**
 * Add support for shortcodes inside contact form 7
 * @link https://wordpress.org/support/topic/plugin-contact-form-7-include-custom-shortcodes-in-form
 */
function custom_wpcf7_form_elements( $form ) {
  $form = do_shortcode( $form );

  return $form;
}

add_filter( 'wpcf7_form_elements', 'custom_wpcf7_form_elements' );

/**
 * Custom Admin Login Form
 * https://codex.wordpress.org/Customizing_the_Login_Form
 */
function custom_login_logo() { ?>
  <style type="text/css">
    #login h1 a, .login h1 a {
      background: url(<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png) no-repeat 50% 0 / contain;
      padding: 0;
      width: 320px;
      height: 50px;
    }
  </style>
<?php }

add_action( 'login_enqueue_scripts', 'custom_login_logo' );

function custom_login_logo_url() {
  return home_url();
}

add_filter( 'login_headerurl', 'custom_login_logo_url' );

function custom_login_logo_url_title() {
  return get_bloginfo( 'name' );
}

add_filter( 'login_headertitle', 'custom_login_logo_url_title' );