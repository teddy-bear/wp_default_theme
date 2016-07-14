<?php
/**
 * The template for displaying 404 pages (not found)
 */

get_header(); ?>

<div class="container">
  <main class="main-column">
    <section class="error-404 not-found">

      <p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'theme' ); ?></p>
      <?php get_search_form(); ?>

    </section>
  </main>
</div>

<?php get_footer(); ?>
