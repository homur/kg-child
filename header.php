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
	<!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" type="text/javascript"></script> -->


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
			let submitIcon = jQuery(".searchbar-icon")
			let inputBox = jQuery(".searchbar-input")
			let searchbar = jQuery(".searchbar")
			let isOpen = false
			submitIcon.click(function() {
				if (isOpen == false) {
					searchbar.addClass("searchbar-open")
					inputBox.focus()
					isOpen = true
				} else {
					searchbar.removeClass("searchbar-open")
					inputBox.focusout()
					isOpen = false
				}
			})
			submitIcon.mouseup(function() {
				return false
			})
			searchbar.mouseup(function() {
				return false
			})
			jQuery(document).mouseup(function() {
				if (isOpen == true) {
					jQuery(".searchbar-icon").css("display", "block")
					submitIcon.click()
				}
			})
		});

		function buttonUp() {
			let inputVal = jQuery(".searchbar-input").val()
			inputVal = jQuery.trim(inputVal).length
			if (inputVal !== 0) {
				jQuery(".searchbar-icon").css("display", "none")
			} else {
				jQuery(".searchbar-input").val("")
				jQuery(".searchbar-icon").css("display", "block")
			}
		}
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
					} else {
						the_custom_logo();
					}
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

				<div class="nav-bar-helper-buttons">
					<!-- <button>Get a quote</button> -->
					<div class="input-group cstm-search-input-group-desktop">
						<div class="input-group-append">
							<div class="searchbar-container">
								<form class="searchbar">
									<input type="search" placeholder="Search here" name="search" class="searchbar-input" onkeyup="buttonUp();" required />
									<!-- <input type="submit" class="searchbar-submit" value="GO"> -->
									<svg id="search-button" class="searchbar-submit" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
										<path d="M0 0h24v24H0V0z" fill="none" />
										<path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z" />
									</svg>
									<span class="searchbar-icon" />
									<!-- <i class="fa fa-search" aria-hidden="true"></i> -->
									<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
										<path d="M0 0h24v24H0V0z" fill="none" />
										<path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z" />
									</svg>
									</span>
								</form>
							</div>
						</div>
					</div>
					<button class="btn btn-outline-secondary nav-bar-contact-buttons nav-bar-get-a-quote" type="button">
						<a href="/contact-us/">
							Get a quote
						</a>
					</button>
					<button class="btn btn-outline-secondary nav-bar-contact-buttons nav-bar-buy-direct" type="button">
						<a href="/contact-us/">
							Buy direct
						</a>
					</button>

				</div>

			</nav><!-- .site-navigation -->

		</div>

		<!-- #wrapper-navbar end -->