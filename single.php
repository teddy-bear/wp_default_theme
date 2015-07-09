<?php
/**
 * The template for displaying all single posts and attachments
 */
?>
<?php get_header(); ?>
<div id="primary" class="content-area">

  <div class="row-radial-gradient">
    <div class="container">
      <h1><?php the_title(); ?></h1>
    </div>
  </div>
  <main id="main" class="site-main">
    <div class="container">
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div class="title-section clearfix">
          <time>
            <? echo the_time( 'F d, Y' ); ?>
          </time>
          <?php $home_url = get_home_url(); ?>
          <!-- Share Links -->
          <div class="share-networks clearfix">
            <span class="share-label"><?php _e( 'SHARE:'); ?></span>
            <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>">
              <i class="fa fa-facebook"></i>
            </a>
            <a target="_blank" href="https://twitter.com/share?url=<?php the_permalink(); ?>">
              <i class="fa fa-twitter"></i>
            </a>
            <a
              href="mailto:?subject=Thought you might like this article&amp;body=I wanted to share it with you.%0D%0A%0D%0A<?php the_permalink(); ?>"
              target="_blank" class="icon-mail" title="Email this to a friend">
              <i class="fa fa-envelope"></i>
            </a>
          </div>
          <!-- End Share Links -->

        </div>
        <div class="content">
          <?php if ( has_post_thumbnail() ) {
            // Resize featured image.
            $thumb   = get_post_thumbnail_id();
            $img_url = wp_get_attachment_url( $thumb, 'full' ); //get img URL
            $image   = aq_resize( $img_url, 370, 250, TRUE, TRUE, TRUE ); //resize & crop img
            ?>
            <img class="border alignleft" src="<?php echo $image ?>" alt="<?php the_title(); ?>"/>
          <?php } ?>
          <? the_content(); ?>
        </div>
        <?php // get_template_part( 'includes/post-formats/related-posts' ); ?>

        <?php //comments_template( '', TRUE ); ?>

      <?php endwhile; endif; ?>
    </div>

  </main>
</div>

<?php get_footer(); ?>
