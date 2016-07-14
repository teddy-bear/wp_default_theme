<?php

/**
 * Layout controls & grid markup based on Bootstrap version 3.* framework.
 */

// Container
function container_shortcode( $atts, $content = NULL ) {

	extract( shortcode_atts( array(
		'class' => ''
	), $atts ) );

	// add divs to the content
	$output = '<div class="container ' . $class . '">';
	$output .= do_shortcode( $content );
	$output .= '</div> <!-- .container (end) -->';

	return $output;
}

add_shortcode( 'container', 'container_shortcode' );

// Row
function row_shortcode( $atts, $content = NULL ) {

	extract( shortcode_atts( array(
		'class' => ''
	), $atts ) );

	// add divs to the content
	$output = '<div class="row ' . $class . '">';
	$output .= do_shortcode( $content );
	$output .= '</div> <!-- .row (end) -->';

	return $output;
}

add_shortcode( 'row', 'row_shortcode' );

// Row innerf
function row_inner_shortcode( $atts, $content = NULL ) {

	extract( shortcode_atts( array(
		'class' => ''
	), $atts ) );

	// add divs to the content
	$output = '<div class="row ' . $class . '">';
	$output .= do_shortcode( $content );
	$output .= '</div> <!-- .row inner (end) -->';

	return $output;
}

add_shortcode( 'row_inner', 'row_inner_shortcode' );

/**
 * Columns: add bootstrap classes to make grid layout.
 * Eg.: [column class="col-sm-6"]
 */
function column_shortcode( $atts, $content = NULL ) {

	extract( shortcode_atts( array(
		'class' => ''
	), $atts ) );

	$return = '<div class="' . $class . '">';
	$return .= do_shortcode( $content );
	$return .= '</div><!-- column (end) -->';

	return $return;
}

add_shortcode( 'column', 'column_shortcode' );

// Column inner
function column_inner_shortcode( $atts, $content = NULL ) {

	extract( shortcode_atts( array(
		'class' => ''
	), $atts ) );

	$return = '<div class="' . $class . '">';
	$return .= do_shortcode( $content );
	$return .= '</div>';

	return $return;
}

add_shortcode( 'column_inner', 'column_inner_shortcode' );

// Wrapper
function wrapper_shortcode( $atts, $content = NULL ) {

	extract( shortcode_atts( array(
		'class' => ''
	), $atts ) );

	// add divs to the content
	$output = '<div class="wrapper ' . $class . '">';
	$output .= do_shortcode( $content );
	$output .= '</div> <!-- .wrapper (end) -->';

	return $output;
}

add_shortcode( 'wrapper', 'wrapper_shortcode' );

// Universal block wrapper for styling purposes.
function block_shortcode( $atts, $content = NULL ) {

	extract( shortcode_atts( array(
		'class' => ''
	), $atts ) );

	// add divs to the content
	$output = '<div class="block ' . $class . '">';
	$output .= do_shortcode( $content );
	$output .= '</div>';

	return $output;
}

add_shortcode( 'block', 'block_shortcode' );

// Universal block for text wrapping and easier styling.
function text_shortcode( $atts, $content = NULL ) {

	extract( shortcode_atts( array(
		'class' => ''
	), $atts ) );

	// add divs to the content
	$output = '<div class="text ' . $class . '">';
	$output .= do_shortcode( $content );
	$output .= '</div>';

	return $output;
}

add_shortcode( 'text', 'text_shortcode' );

// Button.
function button_shortcode( $atts, $content = NULL ) {
	extract( shortcode_atts(
		array(
			'link'   => '#',
			'text'   => 'Button Text',
			'style'  => '',
			'target' => '_self',
			'class'  => '',
			'icon'   => 'no',
			'align'  => ""
		), $atts ) );

	if ( $align == 'aligncenter' ) {
		$output = '<div class="btn-center">';
	}

	$output .= '<a href="' . $link . '" title="' . $text . '" class="' . $style . ' ' . $class . ' ' . $align . '" target="' . $target . '">';
	if ( $icon != 'no' ) {
		$output .= '<i class="fa ' . $icon . '"></i>';
	}
	$output .= '<span>' . $text . '</span>';
	$output .= '</a>';

	if ( $align == 'aligncenter' ) {
		$output .= '</div>';
	}

	return $output;
}

add_shortcode( 'button', 'button_shortcode' );

// Clear
function clear_shortcode( $atts, $content = NULL ) {

	$output = '<div class="clear"></div>';

	return $output;
}

add_shortcode( 'clear', 'clear_shortcode' );

// Spacer
function spacer_shortcode( $atts, $content = NULL ) {

	$output = '<div class="spacer"></div>';

	return $output;
}

add_shortcode( 'spacer', 'spacer_shortcode' );


/**
 * Content adding section
 */
// Content (list of recent posts by default)
// todo: make shortcode more flexible and universal.
function shortcode_content( $atts, $content = NULL ) {

	extract( shortcode_atts( array(
		'post_type'        => 'post',
		'category'         => '',
		'custom_category'  => '',
		'layout'           => 'primary',
		'num'              => '-1',
		'meta'             => 'false',
		'thumb'            => 'false',
		'thumb_width'      => '120',
		'thumb_height'     => '120',
		'more_text_single' => '',
		'excerpt_count'    => '0',
		'content_count'    => '0',
		'wrapper_tag'      => 'div',
		'class'            => '',
		'class_item'       => '',
		'exclude'          => '',
		'orderby'          => ''
	), $atts ) );

	if ( $wrapper_tag == 'div' ) {
		$item_tag = $wrapper_tag;
	} else {
		$item_tag = 'li';
	}

	$output = '<' . $wrapper_tag . ' class="recent-posts ' . $class . '">';
	// Split items into columns.
	/*if ( $layout == 'secondary' ) {
		$output .= '<div class="column ' . $class_item . '">';
	}*/

	global $post;

	$args = array(
		'post_type'              => $post_type,
		'category_name'          => $category,
		$post_type . '_category' => $custom_category,
		'numberposts'            => $num,
		'orderby'                => $orderby,
		'order'                  => 'DESC',
		'exclude'                => $exclude
	);

	$latest = get_posts( $args );

	$i = 0;
	foreach ( $latest as $post ) {
		$i ++;

		setup_postdata( $post );
		$excerpt        = get_the_excerpt( $post->ID );
		$content        = get_the_content( $post->ID );
		$attachment_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
		$url            = $attachment_url['0'];
		$image          = aq_resize( $url, $thumb_width, $thumb_height, TRUE, TRUE, TRUE );


		$post_classes = get_post_class();

		foreach ( $post_classes as $key => $value ) {
			$pos = strripos( $value, 'tag-' );
			if ( $pos !== FALSE ) {
				unset( $post_classes[ $i ] );
			}
		}
		$post_classes = implode( ' ', $post_classes );

		// Major layouts.
		switch ( $layout ) {
			// Default layout.
			case 'primary':
				$output .= '<' . $item_tag . ' class="item item-' . $i . ' ' . $post_classes . ' ' . $class_item . '">';

				$output .= '<a href="' . get_permalink( $post->ID ) . '" title="' . get_the_title( $post->ID ) . '">';

				$output .= '<h3>';
				$output .= get_the_title( $post->ID );
				$output .= '</h3>';

				if ( $thumb == 'true' ) {

					if ( has_post_thumbnail( $post->ID ) ) {
						$output .= '<figure class="featured-thumbnail">';
						if ( $image ) {
							$output .= '<img  src="' . $image . '" alt="' . get_the_title( $post->ID ) . '"/>';
						} else {
							$output .= '<img  src="' . $url . '" alt="' . get_the_title( $post->ID ) . '"/>';
						}
						$output .= '</figure>';
					}
				}

				$output .= '<div class="wrap-info">';

				if ( $meta == 'true' ) {
					$output .= '<span class="meta">';
					$output .= '<span class="day">' . get_the_time( 'd' ) . '/</span><span class="months">' . get_the_time( 'm' ) . '/</span><span class="year">' . get_the_time( 'Y' ) . '</span>';
					$output .= '</span>';
				}

				if ( $excerpt_count >= 1 || $content_count >= 1 ) {

					$output .= '<div class="post-content">';
					if ( $excerpt_count >= 1 ) {

						$output .= '<div class="excerpt">';
						$output .= trim_string_length( $excerpt, $excerpt_count );
						$output .= '</div>';
					}
					if ( $content_count >= 1 ) {
						$output .= '<div class="content">';
						$output .= trim_string_length( $content, $content_count );
						$output .= '</div>';
					}
					$output .= '</div>';
				}

				/*if ( $more_text_single != "" ) {
					$output .= '<a href="' . get_permalink( $post->ID ) . '" class="btn" title="' . get_the_title( $post->ID ) . '">';
					$output .= $more_text_single;
					$output .= '</a>';
				}*/

				$output .= '</div>'; // .wrap-info close.

				$output .= '</a></' . $item_tag . '><!-- .entry (end) -->';
				break;

			// Logo layout.
			case 'logo':

				$output .= '<' . $item_tag . ' class="item item-' . $i . ' ' . $post_classes . ' ' . $class_item . '"><div class="wrapper">';
				if ( is_front_page() ) {
					$output .= get_the_post_thumbnail( $post->ID, 'full' );
				} else {
					$output .= '<img  src="' . $url . '" alt="' . get_the_title( $post->ID ) . '"/>';
				}

				$output .= '</div></' . $item_tag . '><!-- .entry (end) -->';

				break;

			// Video layout.
			case 'video':
				$output .= '<' . $item_tag . ' class="' . $post_classes . ' ' . $class_item . ' item item-' . $i . '">';

				// Featured image.
				if ( has_post_thumbnail( $post->ID ) ) {
					$output .= '<figure class="featured-thumbnail">';
					$output .= '<a href="' . rwmb_meta( "oembed" ) . '">';
					$output .= '<img  src="' . $image . '" alt="' . get_the_title( $post->ID ) . '"/>';
					$output .= '</a>';
					$output .= '</figure>';
				}

				// Info wrapper.
				$output .= '<div class="wrap-info">';

				// Content.
				if ( $excerpt_count >= 1 || $content_count >= 1 ) {

					$output .= '<div class="post-content">';
					if ( $excerpt_count >= 1 ) {

						$output .= '<div class="excerpt">"';
						$output .= trim_string_length( $excerpt, $excerpt_count );
						$output .= '"</div>';
					}
					if ( $content_count >= 1 ) {
						$output .= '<div class="content">"';
						$output .= trim_string_length( $content, $content_count );
						$output .= '"</div>';
					}
					$output .= '</div>';
				}

				// Title.
				$output .= '<strong class="title">';
				$output .= get_the_title( $post->ID );
				$output .= '</strong>';

				// wrap-info end.
				$output .= '</div>';

				$output .= '</' . $item_tag . '><!-- .entry (end) -->';
				break;

			// Testimonials layout.
			case 'testimonials':
				$output .= '<' . $item_tag . ' class="' . $post_classes . ' ' . $class_item . ' item item-' . $i . '">';

				if ( $thumb == 'true' ) {

					if ( has_post_thumbnail( $post->ID ) ) {
						$output .= '<figure class="featured-thumbnail">';
						if ( $image ) {
							$output .= '<img  src="' . $image . '" alt="' . get_the_title( $post->ID ) . '"/>';
						} else {
							$output .= '<img  src="' . $url . '" alt="' . get_the_title( $post->ID ) . '"/>';
						}
						$output .= '</figure>';
					}
				}


				// Info wrapper.
				$output .= '<div class="wrap-info">';

				// Content.
				if ( $excerpt_count >= 1 || $content_count >= 1 ) {

					$output .= '<div class="post-content">';
					if ( $excerpt_count >= 1 ) {

						$output .= '<div class="excerpt">';
						$output .= trim_string_length( $excerpt, $excerpt_count );
						$output .= '"</div>';
					}
					if ( $content_count >= 1 ) {
						$output .= '<div class="content">';
						$output .= trim_string_length( $content, $content_count );
						$output .= '</div>';
					}
					$output .= '</div>';
				}

				// Title.
				$output .= '<div class="title">-by ';
				$output .= get_the_title( $post->ID );
				$output .= '</div>';

				// wrap-info end.
				$output .= '</div>';

				$output .= '</' . $item_tag . '><!-- .entry (end) -->';
				break;
		}

	}

	$output .= '</' . $wrapper_tag . '><!-- .recent-posts (end) -->';

	wp_reset_postdata();

	return $output;

}

add_shortcode( 'content', 'shortcode_content' );

// Project Categories taxonomy call.
function project_categories_shortcode() {
	ob_start();
	get_template_part( 'template-parts/project-categories' );

	return ob_get_clean();
}

add_shortcode( 'project-categories', 'project_categories_shortcode' );