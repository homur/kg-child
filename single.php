<?php

/**
 * The template for displaying all single posts
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
$container = get_theme_mod('understrap_container_type');
?>

<div class="wrapper" id="single-wrapper">

	<div class="<?php echo esc_attr($container); ?> single-post-content-container" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check -->
			<?php // get_template_part( 'global-templates/left-sidebar-check' ); 
			?>

			<main class="site-main" id="main">

				<?php
				while (have_posts()) {
					the_post();
					// get_template_part( 'loop-templates/content', 'post' );
					the_content();
					// understrap_post_nav();
					// previous_post_link('&laquo; &laquo; %', 'Toward The Past: ', 'yes');
				?>
					<div class="fuild-container">
						<?php
						previous_post_link('<svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M24.667 13.9997C24.667 19.8797 19.8803 24.6663 14.0003 24.6663C8.12033 24.6663 3.33366 19.8797 3.33366 13.9997C3.33366 8.11967 8.12033 3.33301 14.0003 3.33301C19.8803 3.33301 24.667 8.11967 24.667 13.9997ZM27.3337 13.9997C27.3337 6.63967 21.3603 0.66634 14.0003 0.66634C6.64033 0.66634 0.666992 6.63967 0.666992 13.9997C0.666992 21.3597 6.64033 27.333 14.0003 27.333C21.3603 27.333 27.3337 21.3597 27.3337 13.9997ZM14.0003 15.333H19.3337V12.6663H14.0003V8.66634L8.66699 13.9997L14.0003 19.333V15.333Z" fill="#69BFF0"/>
						</svg> %link', 'Previous post', 'yes');

						$view_all_posts = get_field('view_all_post');
						if ($view_all_posts) :
						?>
							<a href="<?php echo $view_all_posts['url'] ?>"><?php echo $view_all_posts['title'] ?></a>
						<?php
						endif;

						?>
					</div>
				<?php

					// If comments are open or we have at least one comment, load up the comment template.
					// if ( comments_open() || get_comments_number() ) {
					// 	comments_template();
					// }
				}
				?>

			</main><!-- #main -->

			<!-- Do the right sidebar check -->
			<?php // get_template_part( 'global-templates/right-sidebar-check' ); 
			?>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #single-wrapper -->

<?php
get_footer();
