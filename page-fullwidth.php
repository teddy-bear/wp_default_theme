<?php
/**
 * Template Name: Fullwidth
 *
 * outputs page content inside .container bootstrap class
 * reference http://getbootstrap.com/css/#grid
 */

get_header(); ?>

<div class="container">
  <main class="main-column">
    <?php
    // Start the loop.
    while (have_posts()) : the_post();

      // Include the page content template.
      get_template_part('content', 'page');

      // End the loop.
    endwhile;
    ?>

  </main>
  <!-- .site-main -->
</div><!-- .content-area -->

<?php get_footer(); ?>
