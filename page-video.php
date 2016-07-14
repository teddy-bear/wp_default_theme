<?php
/**
 * Template Name: Videos
 */
get_header(); ?>

	<div class="container">
		<div class="row">

			<div class="col-md-8">
				<main class="main-column">
					<?php
					// Show default page content.
					while ( have_posts() ) {
						the_post();
						the_content();
					}
					?>

					<?php
					// Define custom query options.
					$args = array(
						'post_type' => 'video'
					);
					query_posts( $args );

					// Initialize custom query loop.
					if ( have_posts() ) { ?>

						<div class="videos-list">
							<?php
							while ( have_posts() ) {
								the_post();

								// Get post meta boxes values.
								$post_meta_data = get_post_custom( $post->ID );

								?>
								<div class="item">
									<div class="video">
										<?php echo rwmb_meta( 'oembed', 'type=oembed' ); ?>
									</div>
									<div class="entry-title">
										<h3><?php the_title(); ?></h3>
									</div>
									<div class="entry-content">
										<?php the_content(); ?>
									</div>
								</div>
							<?php } ?>
						</div>
					<?php }
					wp_reset_postdata();
					?>

				</main>
			</div>

			<div class="col-md-4">
				<div class="sidebar sidebar-right">
					<?php dynamic_sidebar( 'sidebar-right' ); ?>
				</div>
			</div>

		</div>

	</div>

<?php get_footer(); ?>