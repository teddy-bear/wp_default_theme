<?php
/**
 * The template for displaying single gallery.
 */
?>
<?php get_header(); ?>
<div class="container">

	<main>
		<?php

		// Start the loop.
		while ( have_posts() ) : the_post();

			the_content();

			// End the loop.
		endwhile;
		wp_reset_postdata();
		?>
		<?php
		//var_dump( get_intermediate_image_sizes() );
		$gallery = rwmb_meta( 'gallery', 'type=image' );

		//Setup pagination variables
		// @link http://blog.codebusters.pl/en/pagination-with-gallery-field-advanced-custom-fields
		$images         = array(); // Set images array for current page
		$items_per_page = 8; // How many items we should display on each page
		$total_items    = count( $gallery ); // How many items we have in total
		$total_pages    = ceil( $total_items / $items_per_page ); // How many pages we have in total
		$current_page   = get_query_var( 'page' ) ? get_query_var( 'page' ) : 1; // Get current page

		$starting_point = ( ( $current_page - 1 ) * $items_per_page ); // Get starting point for current page

		// Get elements for current page
		if ( $gallery ) {
			$images = array_slice( $gallery, $starting_point, $items_per_page );
		}
		?>
		<div class="gallery-holder">
			<div class="row infinite-container">
				<?php
				$image_width  = 330;
				$image_height = 275;
				foreach ( $images as $image ) {
					// Resize image.
					$image_resized = aq_resize( $image['full_url'], $image_width, $image_height, TRUE );
					//var_dump($image);
					?>
					<div class="col-xs-6 col-md-4 col-lg-3 infinite-item">
						<a href="<?php echo $image['full_url']; ?>" class='popup'>
							<?php echo "<img src='{$image_resized}' width='{$image_width}' height='{$image_height}' alt='{$image['alt']}' />"; ?>
							<i class="fa fa-search"></i>
						</a>
					</div>
				<?php } ?>
			</div>
			<!--<div class="pagination">
				<?php /*// And our pagination
				echo paginate_links( array(
					'base'               => get_permalink() . '%#%' . '/',
					'format'             => '?page=%#%',
					'current'            => $current_page,
					'total'              => $total_pages,
					'before_page_number' => '<span class="screen-reader-text">' . __( 'Page ', 'textdomain' ) . ' </span>'
				) );
				*/ ?>
			</div>-->
			<div class="load-more">
				<?php
				if ( $total_pages > 1 && $current_page < $total_pages ) {
					echo '<a class="infinite-more-link more" href="' . get_permalink() . ( $current_page + 1 ) . '/">' . __( 'Load more', 'textdomain' ) . '</a>';
				}
				?>
			</div>
		</div>
	</main>

</div>

<?php get_footer(); ?>
