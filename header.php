<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php
	$theme_url    = get_stylesheet_directory_uri();
	$favicon_path = $theme_url . '/images/favicons/';

	// Customizer options.
	$phone = get_theme_mod( 'phone' );
	$email = get_theme_mod( 'email' );
	?>

	<!--Favicon set-->
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo $favicon_path; ?>apple-touch-icon.png">
	<link rel="icon" type="image/png" href="<?php echo $favicon_path; ?>favicon-32x32.png" sizes="32x32">
	<link rel="icon" type="image/png" href="<?php echo $favicon_path; ?>favicon-16x16.png" sizes="16x16">
	<link rel="manifest" href="<?php echo $favicon_path; ?>manifest.json">
	<link rel="mask-icon" href="<?php echo $favicon_path; ?>safari-pinned-tab.svg" color="#5bbad5">
	<link rel="shortcut icon" href="<?php echo $favicon_path; ?>favicon.ico">
	<meta name="msapplication-config" content="<?php echo $favicon_path; ?>browserconfig.xml">

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<?php if ( ! is_admin_bar_showing() ) { ?>
	<div class="site-preloader"></div>
<?php } ?>

<div class="site">

	<div class="site-all">

		<header class="site-header">

			<div class="row-mobile visible-xs">
				<!-- Mobile menu button -->
				<a href="#menu_mobile" class="mobile-menu-icon">
					<i class="fa fa-bars"></i>
					<i class="fa fa-times"></i>
				</a>
				<div class="icons-mobile">
					<?php if ( $phone ) { ?>
						<a href="tel:<?php echo $phone; ?>"><i class="fa fa-phone-square"></i></a>
					<?php } ?>
					<?php if ( $email ) { ?>
						<a href="mailto:<?php echo $email; ?>"><i class="fa fa-envelope-square"></i></a>
					<?php } ?>
				</div>
			</div>

			<div class="row-top">
				<div class="container">

					<div class="site-logo">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo get_bloginfo( 'name' ); ?>">
							<?php
							$logo_url = get_theme_mod( 'logo' );
							if ( ! $logo_url ) {
								$logo_url = get_stylesheet_directory_uri() . '/images/logo.png';
							}
							?>
							<img src="<?php echo $logo_url; ?>" alt="<?php echo get_bloginfo( 'name' ); ?>"/>
						</a>
					</div>

					<?php // Header blocks region. ?>
					<div class="header-blocks">
						<?php dynamic_sidebar( 'header-blocks' ); ?>
					</div>
				</div>
			</div>

			<div class="row-menu">
				<div class="container">
					<!--Primary menu-->
					<!-- .header-menu = additional DOM element to prevent inheritance of the superfish menu styles to the mobile menu -->
					<div class="header-menu">
						<nav id="menu_mobile" class="nav-primary">
							<?php wp_nav_menu( array(
								'container'  => 'ul',
								'menu_class' => 'main-menu clearfix',
								'menu_id'    => 'primary',
								'menu'       => 'Primary',
							) );
							?>
						</nav>
					</div>
				</div>
			</div>

		</header>

		<div id="content">
			<?php
			if ( ! is_front_page() ) {
				?>
				<div class="page-title-row">
					<div class="image-holder">
						<?php

						// Background image + slogan for the rest of the pages.

						// Get post meta boxes values.
						$post_meta_data = get_post_custom( $post->ID );

						// Get Meta box image value.
						$images = rwmb_meta( 'header-background', 'type=image' );
						// Documentation https://metabox.io/docs/get-meta-value/#section-examples
						if ( $images ) {
							foreach ( $images as $image ) {
								// Resize featured image.
								$image_resized_src = aq_resize( $image['full_url'], 1600, 285, TRUE );
								echo "<img src='$image_resized_src' alt='{$image['alt']}' />";
							}
						} else {
							// Set default header image.
							echo "<img src='" . get_bloginfo( 'template_url' ) . "/images/header-bg.jpg' alt='" . get_bloginfo( 'name' ) . "' />";
						}
						?>
					</div>
					<div class="container">
						<div class="page-title">
							<h1>
								<?php
								// Get Slogan text.
								$header_text = $post_meta_data['header-text'][0];
								?>
								<?php if ( $header_text ) {
									echo $header_text;
								} elseif ( is_tax( 'projects_category' ) ) {
									single_cat_title();
								} else {
									the_title();
								}
								?>
							</h1>
						</div>
						<div class="breadcrumbs">
							<?php if ( function_exists( 'bcn_display' ) ) {
								bcn_display();
							} ?>
						</div>
					</div>
				</div>
			<?php } ?>
			<div class="site-content">
