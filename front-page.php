<?php
/**
 * Home page template
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 */

get_header(); ?>
<div class="container row-content">
  <div class="row">
    <div class="col-sm-9 col-sm-push-3">
      <main class="main-column">
        <?php
        // Start the loop.
        while ( have_posts() ) : the_post();

          // Include the page content template.
          get_template_part( 'content', 'page' );

          // End the loop.
        endwhile;
        ?>
      </main>
    </div>
    <div class="col-sm-3 col-sm-pull-9">
      <div class="sidebar sidebar-left">
        <?php dynamic_sidebar( 'sidebar-left' ) ?>
      </div>
    </div>

  </div>

</div><!-- .content-area -->

<?php get_footer(); ?>
