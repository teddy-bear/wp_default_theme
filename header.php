<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <!-- Default faicon -->
  <link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon.ico" type="image/x-icon"/>

  <?php wp_head(); ?>
</head>
<?php
// Set site logo.
function site_logo() {
  global $logo;
  $logo = get_stylesheet_directory_uri() . '/images/logo.png';

  // uncomment this if we use theme options interface
  /*if ( of_get_option( 'logo' ) ) {
    $logo = of_get_option( 'logo' );
  }*/

  return $logo;
}

// Add custom body class.
$body_class = '';

if ( ! is_front_page() ) {
  $body_class .= ' not-home';
}

$detect = new Mobile_Detect;
if ( ! $detect->isMobile() && ! $detect->isTablet() ) {
  $body_class .= ' non-touch';
} else {
  $body_class .= ' touch';
}

// Declared in theme-function.php
append_browser_name( $body_class );
?>

<body <?php body_class( $body_class ); ?>>

<div id="cbp-so-scroller" class="site">

  <div class="site-all">

    <header id="masthead" class="site-header clearfix">
      <div class="container top-elements">
        <div id="logo">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" title="<?php echo get_bloginfo( 'name' ); ?>">
            <img src="<?php echo site_logo(); ?>" alt="<?php echo get_bloginfo( 'description' ); ?>"/>
          </a>
        </div>
        <div class="header-blocks clearfix">
          <?php if ( ! dynamic_sidebar( 'Header blocks' ) ) : ?>
          <?php endif; ?>
        </div>
      </div>
      <div class="row-menu">
        <div class="container">
          <!-- Mobile menu button -->
          <a href="#menu_mobile" class="mobile-menu-icon">
            <i class="fa fa-bars"></i>
            <i class="fa fa-times"></i>
          </a>

          <!--Primary menu-->
          <!-- .header-menu = additional DOM element to prevent inheritance of the superfish menu styles to the mobile menu -->
          <div class="header-menu">
            <nav id="menu_mobile" class="nav-primary">
              <?php wp_nav_menu( array(
                'container'  => 'ul',
                'menu_class' => 'main-menu clearfix',
                'menu_id'    => 'primary',
                'menu'       => 'Primary'
              ) );
              ?>
            </nav>
          </div>
        </div>

      </div>
    </header>

    <div id="content">
      <div class="container slider-row">
        <?php
        echo do_shortcode( "[crellyslider alias='home_slider']" );
        echo '<div class="slider-links">' . show_text_block( 'slider-links' ) . '</div>';
        ?>

      </div>
      <div class="container slogan-row">
        <?php
        // Get meta box value.
        $post_meta_data = get_post_custom( $post->ID );
        // Set Slogan text.
        $header_slogan = $post_meta_data['header-slogan'][0] ?: get_the_title();
        ?>
        <h1><?php echo $header_slogan; ?></h1>
        <span></span>
      </div>
    </div>
    <div class="site-content">
