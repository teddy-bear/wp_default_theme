<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 */
function optionsframework_option_name() {
  // Change this to use your theme slug
  return 'options-framework-theme';
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'theme-textdomain'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

  // Image path variable.
  $imagepath = get_template_directory_uri() . '/inc/images/';

  // Main settings section.
  $options[] = array(
    'name' => __( 'Theme Settings', 'theme' ),
    'type' => 'heading'
  );

  $options[] = array(
    'name' => __( 'Logo', 'theme' ),
    'desc' => __( 'upload your logo here, it will replace the default one', 'theme' ),
    'id'   => 'logo',
    'type' => 'upload'
  );
;

  $wp_editor_settings = array(
    'wpautop'       => TRUE, // Default
    'textarea_rows' => 5,
    'tinymce'       => array( 'plugins' => 'wordpress' )
  );

  $options[] = array(
    'name'     => __( 'Copyright text', 'theme' ),
    'desc' => __( 'text displayed in the footer', 'theme' ),
    'id'       => 'copyright',
    'type'     => 'editor'
    //'settings' => $wp_editor_settings
  );

  return $options;
}

add_action('optionsframework_after','exampletheme_options_after', 100);

function exampletheme_options_after() { ?>
  <p>Content after the options panel!</p>
<?php }
