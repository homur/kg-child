<?php

/**
 * Single post partial template
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<div class="material-page-title-hero">
		<div class="material-page-title-container">
			<!-- <video autoplay muted loop id="video" class="page-title-video">
				<source src="https://wordpress-497576-2250197.cloudwaysapps.com/wp-content/uploads/2021/11/1056399188-preview.mp4" type="video/mp4" />
				Your browser does not support HTML5 video.
			</video> -->
			<div class="material-page-title-content-container">
				<div class="material-page-title-content-inner-container container">

					<header class="entry-header">
						<a class="btn btn-link material-page-title-all-button" href="#" role="button">
							<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M18 10C18 14.41 14.41 18 10 18C5.59 18 2 14.41 2 10C2 5.59 5.59 2 10 2C14.41 2 18 5.59 18 10ZM20 10C20 4.48 15.52 0 10 0C4.48 0 0 4.48 0 10C0 15.52 4.48 20 10 20C15.52 20 20 15.52 20 10ZM10 11H14V9H10V6L6 10L10 14V11Z" fill="#69BFF0" />
							</svg>
							<p>All Materials</p>
						</a>

						<?php the_title('<h1 class="entry-title">', '</h1>'); ?>
						<h2 class="material-page-title-subtitle"><?php the_field('sub_title'); ?></h2>
							<?php
							// the_field('availability');

							if (in_array("Strip", get_field('availability')) && in_array("Wire", get_field('availability'))) {
								echo '<div class="material-page-title-availability">
									<p>Available in strip and wire</p> 
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<circle cx="12" cy="12" r="10" fill="#085FA9"/>
										<path d="M14.225 10.2358C14.159 10.1624 14.0197 10.0671 13.807 9.94977C13.5943 9.8251 13.3377 9.7151 13.037 9.61977C12.7437 9.5171 12.4393 9.46577 12.124 9.46577C11.2953 9.46577 10.881 9.7591 10.881 10.3458C10.881 10.5584 10.947 10.7271 11.079 10.8518C11.211 10.9764 11.409 11.0828 11.673 11.1708C11.937 11.2588 12.267 11.3541 12.663 11.4568C13.1763 11.5888 13.62 11.7428 13.994 11.9188C14.3753 12.0948 14.665 12.3294 14.863 12.6228C15.0683 12.9088 15.171 13.2901 15.171 13.7668C15.171 14.3241 15.0353 14.7751 14.764 15.1198C14.5 15.4571 14.148 15.7028 13.708 15.8568C13.268 16.0108 12.7913 16.0878 12.278 16.0878C11.6913 16.0878 11.1083 15.9998 10.529 15.8238C9.957 15.6404 9.44733 15.3911 9 15.0758L9.671 13.7668C9.737 13.8328 9.85433 13.9208 10.023 14.0308C10.1917 14.1334 10.397 14.2398 10.639 14.3498C10.881 14.4524 11.145 14.5404 11.431 14.6138C11.717 14.6871 12.0067 14.7238 12.3 14.7238C13.136 14.7238 13.554 14.4561 13.554 13.9208C13.554 13.6934 13.4697 13.5101 13.301 13.3708C13.1323 13.2314 12.894 13.1141 12.586 13.0188C12.2853 12.9234 11.9333 12.8171 11.53 12.6998C11.0313 12.5604 10.617 12.4064 10.287 12.2378C9.96433 12.0618 9.72233 11.8454 9.561 11.5888C9.39967 11.3248 9.319 10.9911 9.319 10.5878C9.319 10.0524 9.44367 9.6051 9.693 9.24577C9.94967 8.8791 10.2943 8.6041 10.727 8.42077C11.1597 8.2301 11.64 8.13477 12.168 8.13477C12.7107 8.13477 13.2167 8.22277 13.686 8.39877C14.1553 8.57477 14.5587 8.77643 14.896 9.00377L14.225 10.2358Z" fill="white"/>
									</svg>
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<circle cx="12" cy="12" r="10" fill="#576D80"/>
										<path d="M17.957 8.18994L15.537 15.9999H13.986L12.006 10.6319L10.07 15.9999H8.52999L6.10999 8.18994H7.77099L9.43199 13.7559L11.258 8.18994H12.765L14.646 13.7559L16.285 8.18994H17.957Z" fill="white"/>
									</svg>
								</div>';
							} elseif (in_array("Strip", get_field('availability')) && !in_array("Wire", get_field('availability'))) {
								echo '<div class="material-page-title-availability">
									<p>Available in strip</p> 
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<circle cx="12" cy="12" r="10" fill="#085FA9"/>
										<path d="M14.225 10.2358C14.159 10.1624 14.0197 10.0671 13.807 9.94977C13.5943 9.8251 13.3377 9.7151 13.037 9.61977C12.7437 9.5171 12.4393 9.46577 12.124 9.46577C11.2953 9.46577 10.881 9.7591 10.881 10.3458C10.881 10.5584 10.947 10.7271 11.079 10.8518C11.211 10.9764 11.409 11.0828 11.673 11.1708C11.937 11.2588 12.267 11.3541 12.663 11.4568C13.1763 11.5888 13.62 11.7428 13.994 11.9188C14.3753 12.0948 14.665 12.3294 14.863 12.6228C15.0683 12.9088 15.171 13.2901 15.171 13.7668C15.171 14.3241 15.0353 14.7751 14.764 15.1198C14.5 15.4571 14.148 15.7028 13.708 15.8568C13.268 16.0108 12.7913 16.0878 12.278 16.0878C11.6913 16.0878 11.1083 15.9998 10.529 15.8238C9.957 15.6404 9.44733 15.3911 9 15.0758L9.671 13.7668C9.737 13.8328 9.85433 13.9208 10.023 14.0308C10.1917 14.1334 10.397 14.2398 10.639 14.3498C10.881 14.4524 11.145 14.5404 11.431 14.6138C11.717 14.6871 12.0067 14.7238 12.3 14.7238C13.136 14.7238 13.554 14.4561 13.554 13.9208C13.554 13.6934 13.4697 13.5101 13.301 13.3708C13.1323 13.2314 12.894 13.1141 12.586 13.0188C12.2853 12.9234 11.9333 12.8171 11.53 12.6998C11.0313 12.5604 10.617 12.4064 10.287 12.2378C9.96433 12.0618 9.72233 11.8454 9.561 11.5888C9.39967 11.3248 9.319 10.9911 9.319 10.5878C9.319 10.0524 9.44367 9.6051 9.693 9.24577C9.94967 8.8791 10.2943 8.6041 10.727 8.42077C11.1597 8.2301 11.64 8.13477 12.168 8.13477C12.7107 8.13477 13.2167 8.22277 13.686 8.39877C14.1553 8.57477 14.5587 8.77643 14.896 9.00377L14.225 10.2358Z" fill="white"/>
									</svg>
								</div>';
							} elseif (!in_array("Strip", get_field('availability')) && in_array("Wire", get_field('availability'))) {
								echo '<div class="material-page-title-availability">
									<p>Available in wire</p> 
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<circle cx="12" cy="12" r="10" fill="#576D80"/>
										<path d="M17.957 8.18994L15.537 15.9999H13.986L12.006 10.6319L10.07 15.9999H8.52999L6.10999 8.18994H7.77099L9.43199 13.7559L11.258 8.18994H12.765L14.646 13.7559L16.285 8.18994H17.957Z" fill="white"/>
									</svg>
								</div>';
							}
							echo ' 	<div class="page-title-buttons">';
							echo '		<div class="button-container get-quote-btn-container">';
							echo '			<a href="#" class="btn btn-primary button" role="button" aria-pressed="true"><p>Get a quote</p></a>';
							echo '		</div>';
							echo ' 		<div class="buttons-container">';
							echo ' 			<a class="trans-button" href="#">';
							echo '				<p>Processing</p>';
							echo '				<svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">';
							echo '					<path d="M13.9997 3.33337C19.8797 3.33337 24.6663 8.12004 24.6663 14C24.6663 19.88 19.8797 24.6667 13.9997 24.6667C8.11967 24.6667 3.33301 19.88 3.33301 14C3.33301 8.12004 8.11968 3.33337 13.9997 3.33337ZM13.9997 0.666705C6.63968 0.666705 0.666342 6.64004 0.666342 14C0.666341 21.36 6.63967 27.3334 13.9997 27.3334C21.3597 27.3334 27.333 21.36 27.333 14C27.333 6.64004 21.3597 0.666706 13.9997 0.666705ZM15.333 14L15.333 8.66671L12.6663 8.66671L12.6663 14L8.66634 14L13.9997 19.3334L19.333 14L15.333 14Z" fill="white"/>';
							echo '				</svg>';
							echo '			</a>';
							echo '		</div>';
							echo '	</div>';
							?>

					</header><!-- .entry-header -->
				</div>
			</div>
		</div>
	</div>
	<?php // echo get_the_post_thumbnail( $post->ID, 'large' ); 
	?>

	<div class="entry-content">

		<?php
		the_content();
		understrap_link_pages();
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php understrap_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->