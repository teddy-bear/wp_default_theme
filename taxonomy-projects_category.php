<?php
/**
 * The template for displaying projects category items.
 */

get_header(); ?>

<div class="container">
	<main class="main-column">

		<?php
		if ( have_posts() ) { ?>

			<div class="projects-blocks row">
				<?php
				while ( have_posts() ) {
					the_post();

					// Get Category.
					$category = wp_get_post_terms( $post->ID, 'projects_category' );
					$terms    = get_the_terms( get_the_ID(), 'projects_category' );

					// Add image size.
					add_image_size( 'project-image', 298, 224, TRUE );
					?>
					<div class="item">
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							<figure class="featured-thumbnail">
								<?php the_post_thumbnail( 'project-image' ); ?>
							</figure>
							<div class="wrap-info">
								<h4 class="title">
									<?php the_title(); ?>
								</h4>
								<div class="category">
									<?php
									foreach ( $terms as $term ) {
										echo $term->name . ' ';
									}
									?>
								</div>
								<div class="area">
									<?php echo rwmb_meta( 'area' ); ?> sq ft
								</div>
							</div>
						</a>
					</div>
				<?php } ?>
			</div>
		<?php } ?>

		<?php get_template_part( 'includes/post-formats/post-nav' ); ?>

	</main>
</div>

<?php get_footer(); ?>
