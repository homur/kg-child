<?php

/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$container = get_theme_mod('understrap_container_type');
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
	<script>
		var menuApi
		var siteUrl = `<?= get_site_url() ?>`
	</script>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;600;700&display=swap" rel="stylesheet">
	
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script> -->

	<script>
		jQuery(document).ready(function() {

			var toggleAffix = function(affixElement, scrollElement, wrapper) {

				var height = affixElement.outerHeight(),
					top = wrapper.offset().top + 80;

				if (scrollElement.scrollTop() >= top) {
					wrapper.height(height);
					affixElement.addClass("affix");
				} else {
					affixElement.removeClass("affix");
					wrapper.height('auto');
				}

			};

			jQuery('[data-toggle="affix"]').each(function() {
				var ele = jQuery(this);
				var wrapper = jQuery('<div></div>');

				// ele.before(wrapper);
				jQuery(window).on('scroll resize', function() {
					toggleAffix(ele, jQuery(this), wrapper);
				});

				// init
				toggleAffix(ele, jQuery(window), wrapper);
			});

		});
	</script>
</head>

<body <?php body_class(); ?> <?php understrap_body_attributes(); ?>>
	<?php do_action('wp_body_open'); ?>
	<div class="site ctsm-wrapper-navbar" id="page">

		<!-- ******************* The Navbar Area ******************* -->
		<div id="wrapper-navbar" data-toggle="affix">

			<a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e('Skip to content', 'understrap'); ?></a>

			<nav id="main-nav" class="navbar kg-navbar navbar-expand-md" aria-labelledby="main-nav-label">

				<h2 id="main-nav-label" class="sr-only">
					<?php esc_html_e('Main Navigation', 'understrap'); ?>
				</h2>

				<?php if ('container' === $container) : ?>
					<div class="container">
					<?php endif; ?>

					<!-- Your site title as branding in the menu -->
					<?php if (!has_custom_logo()) { ?>

						<?php if (is_front_page() && is_home()) : ?>

							<h1 class="navbar-brand mb-0"><a rel="home" href="<?php echo esc_url(home_url('/')); ?>" itemprop="url"><?php bloginfo('name'); ?></a></h1>

						<?php else : ?>

							<a class="navbar-brand" rel="home" href="<?php echo esc_url(home_url('/')); ?>" itemprop="url"><?php bloginfo('name'); ?></a>

						<?php endif; ?>

					<?php
					} else { ?>
						<a href="<?php echo esc_url(home_url('/')); ?>" 
						class="navbar-brand custom-logo-link" 
						rel="home">
						<img width="137" height="60" 
						src="<?php echo esc_url(home_url('/')) . "wp-content/uploads/2021/12/dark.png"; ?>" 
						class="img-fluid" 
						alt="Knight Group"></a>
					<?php }
					?>
					<!-- end custom logo -->

					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'understrap'); ?>">
						<span class="navbar-toggler-icon">
						<svg width="30" height="20" viewBox="0 0 30 20" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M0 20H30V16.6667H0V20ZM0 11.6667H30V8.33333H0V11.6667ZM0 0V3.33333H30V0H0Z" fill="white" />
							</svg>
						</span>
					</button>

					<!-- The WordPress Menu goes here -->
					<?php
					wp_nav_menu(
						array(
							'theme_location'  => 'primary',
							'container_class' => 'collapse navbar-collapse',
							'container_id'    => 'navbarNavDropdown',
							'menu_class'      => 'navbar-nav mr-auto',
							'fallback_cb'     => '',
							'menu_id'         => 'main-menu',
							'depth'           => 5,
							'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
						)
					);
					?>
					<?php if ('container' === $container) : ?>
					</div><!-- .container -->
				<?php endif; ?>

			</nav><!-- .site-navigation -->

		</div>

				<!-- <div id="wrapper-navbar-fixed" data-toggle="affix"> -->

			<!-- <a class="skip-link sr-only sr-only-focusable" href="#content"><?php// esc_html_e('Skip to content', 'understrap'); ?></a> -->

			<!-- <nav id="main-nav" class="navbar kg-navbar navbar-expand-md" aria-labelledby="main-nav-label"> -->

				<!-- <h2 id="main-nav-label affix-navbar" class="sr-only"> -->
				<?php //esc_html_e('Main Navigation', 'understrap'); ?>
				<!-- </h2> -->

				<?php //if ('container' === $container) : ?>
					<!-- <div class="container"> -->
					<?php// endif; ?>

					<!-- Your site title as branding in the menu -->
					<?php// if (!has_custom_logo()) { ?>

						<?php// if (is_front_page() && is_home()) : ?>

							<!-- <h1 class="navbar-brand mb-0"><a rel="home" href="<?php echo esc_url(home_url('/')); ?>" itemprop="url"><?php bloginfo('name'); ?></a></h1> -->

						<?php// else : ?>

							<!-- <a class="navbar-brand" rel="home" href="<?php echo esc_url(home_url('/')); ?>" itemprop="url"><?php bloginfo('name'); ?></a> -->

						<?php //endif; ?>

					<?php
					// } else {
					// 	the_custom_logo();
					// }
					?>
					<!-- end custom logo -->

					<!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'understrap'); ?>">
						<span class="navbar-toggler-icon"></span>
					</button> -->

					<!-- The WordPress Menu goes here -->
					<!-- <div class="affix-navbar-menu"> -->
					<?php
					// wp_nav_menu(
					// 	array(
					// 		'theme_location'  => 'primary',
					// 		'container_class' => 'collapse navbar-collapse',
					// 		'container_id'    => 'navbarNavDropdown',
					// 		'menu_class'      => 'navbar-nav mr-auto',
					// 		'fallback_cb'     => '',
					// 		'menu_id'         => 'main-menu',
					// 		'depth'           => 5,
					// 		'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
					// 	)
					// );
					?>
					<!-- </div> -->
					<!-- <?php// if ('container' === $container) : ?> -->
					<!-- </div> -->
					<!-- .container -->
				<!-- <?php// endif; ?> -->

			<!-- </nav> -->
			<!-- .site-navigation -->

		<!-- </div> -->
		<!-- #wrapper-navbar end -->