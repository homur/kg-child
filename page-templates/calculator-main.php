<?php
/*
 * Template Name: Calculators
 * Description: calculator template
 */

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$calc_type = get_field('calc_types');

?>
<div class="transparent-header">
	<?php get_header(); ?>
</div>

<div id="transparent-header-page-wrapper">

	<?php
		while (have_posts()) {
			the_post();
		}
		?>

		<?php the_content(); ?>

		<div class="container calculator-wrapper my-5">
            <div class="row">
                <div class="col-12 col-md-6 offset-md-3">
                    <?php get_template_part('page-templates/calculators/calc', $calc_type);?>
                </div>
            </div>
		</div>
</div>

<?php get_footer(); ?>
