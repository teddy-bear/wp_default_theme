<?php
/**
 * Template Name: Sidebar right
 *
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
