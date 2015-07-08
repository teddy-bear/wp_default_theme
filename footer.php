<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 */
?>
<div class="wrapper row-bottom cbp-so-init cbp-so-section">
  <div class="container <?php if ( is_front_page() ) {
    echo 'cbp-so-side';
  } ?>">
    <?php if ( function_exists( 'show_text_block' ) ) {
      echo show_text_block( 'cities-list', FALSE );
    } ?>
  </div>
</div>
</div><!-- .site-content -->
</div><!-- #content -->
<?php
if ( is_front_page() ) {
  ?>
  <div class="smartobject">
    <smartobject type='universal_avatar' icon_url='http://www.nxnotes.com/survey/simg/av7.png'
                 icon_over_url='http://www.nxnotes.com/survey/simg/av7_h.png'
                 icon_close_url='http://www.nxnotes.com/survey/simg/av7_c.png' auto_center='true' open_x='0' open_y='0'
                 auto_open='true' avatar_code='av7' open_direction='right' contain_survey='true'></smartobject>
  </div>
<?php } ?>

<footer class="site-footer">
  <div class="container">
    <div class="footer-section">
      <div class="footer-blocks clearfix row">
        <?php if ( ! dynamic_sidebar( 'Footer blocks' ) ) : endif; ?>
      </div>
    </div>
  </div>
</footer><!-- .site-footer -->

<strong id="back_to_top"><i class="fa fa-angle-double-up"></i></strong>


</div><!-- .site-all -->
</div><!-- .site -->

<?php wp_footer(); ?>

<!-- Google Plus button -->
<script type="text/javascript">
  (function () {
    var po = document.createElement('script');
    po.type = 'text/javascript';
    po.async = true;
    po.src = 'https://apis.google.com/js/platform.js';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(po, s);
  })();
</script>
</body>
</html>
