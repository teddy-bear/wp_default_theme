<?php
function theme_customize_register( $wp_customize ) {

  // Create section.
  $wp_customize->add_section( 'custom_settings', array(
    'title'       => __( 'Custom settings' ),
    'description' => __( 'Add custom theme styles' ),
    'priority'    => 30,
  ) );

  // Logo image
  $wp_customize->add_setting( 'logo', array(
    //'default' => get_stylesheet_directory_uri() . '/images/logo.jpg',
    //'transport' => 'postMessage',
  ) );

  $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo', array(
    'label'    => 'Logo',
    'section'  => 'custom_settings',
    'settings' => 'logo',
    'priority' => 1
  ) ) );

  // Phone.
  $wp_customize->add_setting( 'phone', array(
    'transport' => 'postMessage',
  ) );

  $wp_customize->add_control( 'phone', array(
    'label'    => 'Phone number (for mobile view icon)',
    'section'  => 'custom_settings',
    'type'     => 'text',
    'priority' => 2
  ) );

  // Email.
  $wp_customize->add_setting( 'email', array(
    'transport' => 'postMessage',
  ) );

  $wp_customize->add_control( 'email', array(
    'label'    => 'Email address (for mobile view icon)',
    'section'  => 'custom_settings',
    'type'     => 'text',
    'priority' => 3
  ) );

  // Copyright textarea.
  $wp_customize->add_setting( 'copyright', array(
    'default'   => '',
    'transport' => 'postMessage',
  ) );

  $wp_customize->add_control( 'copyright', array(
    'label'    => __( 'Copyright' ),
    'type'     => 'textarea',
    'section'  => 'custom_settings',
    'settings' => 'copyright',
    'priority' => 3
  ) );

  // Colorpicker setting.
  /*$wp_customize->add_setting( 'header_textcolor', array(
    'default'   => '',
    'transport' => 'postMessage',
  ) );

  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color', array(
    'label'    => __( 'Header Color' ),
    'section'  => 'custom_settings',
    'settings' => 'header_textcolor',
    'priority' => 2
  ) ) );*/


  // Colorpicker for links
  /*$wp_customize->add_setting( 'colorpicker', array(
    'default'   => '',
    'transport' => 'postMessage',
  ) );
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'colorpicker', array(
    'label'   => __( 'Colorpicker', 'theme_textdomain' ),
    'section' => 'custom_settings',
  ) ) );*/

  // Media (image) control.
  /*$wp_customize->add_setting( 'image_control', array(
    'default'   => '',
    //'transport' => 'postMessage',
  ) );
  $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'image_control', array(
    'label'     => __( 'Featured Home Page Image', 'theme_textdomain' ),
    'section'   => 'custom_settings',
    //'mime_type' => 'image',
  ) ) );*/

  // Range.
  /*$wp_customize->add_setting( 'range_control', array(
  'default'   => '',
   'transport' => 'postMessage',
  ) );
  $wp_customize->add_control( 'range_control', array(
    'type' => 'range',
    'section' => 'custom_settings',
    'label' => __( 'Range' ),
    'description' => __( 'This is the range control description.' ),
    'input_attrs' => array(
      'min' => 0,
      'max' => 10,
      'step' => 2,
    ),
  ) );*/


}

add_action( 'customize_register', 'theme_customize_register' );

/**
 * Apply custom styles.
 */
function mytheme_customize_css() {
  if ( get_theme_mod( 'header_textcolor' ) ) {
    ?>
    <style type="text/css">
      .site-header {
        background: <?php echo "#". get_theme_mod('header_textcolor'); ?>;
      }
    </style>
    <?php
  }
  if ( get_theme_mod( 'colorpicker' ) ) {
    ?>
    <style type="text/css">
      a {
        color: <?php echo get_theme_mod('colorpicker'); ?>;
      }
    </style>
    <?php
  }

}

add_action( 'wp_head', 'mytheme_customize_css' );

/**
 * Used by hook: 'customize_preview_init' -> call js file only in the admin panel.
 *
 * @see add_action('customize_preview_init',$func)
 */
function mytheme_customizer_live_preview() {
  wp_enqueue_script(
    'mytheme-themecustomizer',      //Give the script an ID
    get_template_directory_uri() . '/js/theme-customizer.js',//Point to file
    array( 'jquery', 'customize-preview' ),  //Define dependencies
    '',            //Define a version (optional)
    TRUE            //Put script in footer?
  );
}

add_action( 'customize_preview_init', 'mytheme_customizer_live_preview' );


