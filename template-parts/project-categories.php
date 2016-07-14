<?php
/**
 * Output project categories taxonomy.
 */
?>

<?php
// get the terms of taxonomy
$terms = get_terms( array(
		'taxonomy'   => 'projects_category',
		'hide_empty' => FALSE
	)
);
?>
<div class="project-categories owl-carousel wow fadeIn">
	<?php
	// loop through all terms
	foreach ( $terms as $term ) { ?>
		<div class="item">
			<?php // Get the term link
			$term_link = get_term_link( $term );

			if ( $term->count > 0 ) { ?>
				<h3><?php echo $term->name; ?></h3>
				<div class="description"><?php echo $term->description; ?></div>
				<?php echo '<a href="' . esc_url( $term_link ) . '" class="btn-custom">more</a>';
			} elseif ( $term->count !== 0 ) {
				echo '' . $term->name . '';
			} ?>
		</div>
	<?php } ?>
</div>