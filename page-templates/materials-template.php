<?php 
/*
Template Name: Full-width page layout
Template Post Type: post, page, product, materials
*/
defined( 'ABSPATH' ) || exit;

// get_header();
// $container = get_theme_mod( 'understrap_container_type' );
?>


<div class="transparent-header">
	<?php get_header(); ?>
</div>
<div id="transparent-header-page-wrapper">
<div class="wrapper" id="single-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">
      <h1>Heeeeeee</h1>
				<?php
				while ( have_posts() ) {
					the_post();
					get_template_part( 'loop-templates/content', 'single' );
					understrap_post_nav();

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
				}
				?>

			</main><!-- #main -->

			<!-- Do the right sidebar check -->
			<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #single-wrapper -->

<?php
get_footer();
?>
</div>