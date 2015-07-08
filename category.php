<?php
/**
 * The template for displaying post from a category.
 */
?>
<?php get_header(); ?>
  <div class="container">
    <div class="row">
      <div class="col-sm-8 col-md-9">
        <div class="posts-list">
          <?php

          if ( have_posts() ) : while ( have_posts() ) : the_post();

            // The following determines what the post format is and shows the correct file accordingly
            $format = get_post_format();
            get_template_part( 'includes/post-formats/' . $format );

            if ( $format == '' ) {
              get_template_part( 'includes/post-formats/standard' );
            }

          endwhile;
          else:

            ?>

            <div class="no-results">
              <?php echo '<p><strong>' . __( 'There has been an error.', 'theme' ) . '</strong></p>'; ?>
              <p><?php _e( 'We apologize for any inconvenience, please', 'theme' ); ?> <a
                  href="<?php bloginfo( 'url' ); ?>/"
                  title="<?php bloginfo( 'description' ); ?>"><?php _e( 'return to the home page', 'theme' ); ?></a> <?php _e( 'or use the search form below.', 'theme' ); ?>
              </p>
              <?php
              /* outputs the default search form */
              get_search_form();
              ?>
            </div>

          <?php endif; ?>

        </div>

        <?php get_template_part( 'includes/post-formats/post-nav' ); ?>

      </div>

      <div class="col-sm-4 col-md-3">
        <div class="sidebar sidebar-blog">
          <?php if ( ! dynamic_sidebar( 'Sidebar Company' ) ) : ?>
          <?php endif; ?>
        </div>
      </div>

    </div>
  </div>

<?php get_footer(); ?>