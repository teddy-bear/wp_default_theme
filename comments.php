<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
  return;
}
?>

<div id="comments" class="comments-area">

  <?php if ( have_comments() ) : ?>
    <h2 class="comments-title">
      <?php
      printf( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', '' ),
        number_format_i18n( get_comments_number() ), get_the_title() );
      ?>
    </h2>

    <ol class="comment-list">
      <?php
      wp_list_comments( array(
        'style'       => 'ol',
        'short_ping'  => TRUE,
        'avatar_size' => 56,
      ) );
      ?>
    </ol><!-- .comment-list -->

    <?php
    /**
     * Display navigation to next/previous comments when applicable.
     * theme_comment_nav();
     * Function located at 2015 WP default theme.
     * @file inc/template-tags.php
     */
    ?>

  <?php endif; // have_comments() ?>

  <?php
  // If comments are closed and there are comments, let's leave a little note, shall we?
  if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
    ?>
    <p
      class="no-comments"><?php _e( 'Comments are closed.', '' ); ?></p>
  <?php endif; ?>

  <?php comment_form(); ?>

</div><!-- .comments-area -->
