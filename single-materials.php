<?php
/*
Template Name: Full-width page layout
Template Post Type: post, page, product, materials
*/

defined('ABSPATH') || exit;

// get_header();
// $container = get_theme_mod('understrap_container_type');
?>
<div class="transparent-header">
	<?php get_header(); ?>
</div>
<div id="transparent-header-page-wrapper">
<!-- <div class="wrapper" id="single-wrapper" style="background-color: blue"> -->

	<div class="fuild-container" id="content" tabindex="-1">

		<!-- <div class="row"> -->
			<!-- <div class="col-sm-12"> -->
				<main class="site-main" id="main">
					<?php
					while (have_posts()) {
						the_post();
						get_template_part('loop-templates/content', 'material');
						// understrap_post_nav();

					}
					?>

				</main><!-- #main -->
			<!-- </div> -->
			<!-- </div> -->
			<!-- .row -->

		</div><!-- #content -->

	<!-- </div>#single-wrapper -->

	<?php
	get_footer();
	?>
	</div>
