<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 */
?>

<?php
if ( ! is_front_page() ) {
	echo show_text_block( 'parallax-row' );
}
?>

</div><!-- .site-content -->
</div><!-- #content -->
<footer class="site-footer">

	<div class="row-footer-blocks">
		<div class="container">
			<div class="footer-blocks">
				<?php if ( ! dynamic_sidebar( 'Footer blocks' ) ) : endif; ?>
			</div>
		</div>
	</div>

	<div class="row-copyright">
		<div class="container">
			<div class="copyright">
				<?php
				//echo show_text_block( 'copyright', FALSE );
				echo get_theme_mod( 'copyright' );
				?>
			</div>
			<div class="privacy">
				<a href="http://www.graphicsbycindy.com/" target="_blank">SEO Company Houston</a> - Graphics by Cindy
			</div>
		</div>
	</div>
</footer><!-- .site-footer -->

<span id="back_to_top"><i class="fa fa-arrow-up"></i></span>


</div><!-- .site-all -->
</div><!-- .site -->

<?php wp_footer(); ?>

</body>
</html>
