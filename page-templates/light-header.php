<?php

/**
 * Template Name: Light Header
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

?>
<div class="light-header">
	<?php get_header('light'); ?>
</div>
<?php

// if ( is_front_page() ) {
// 	get_template_part( 'loop-templates/content', 'transparent-header' );
// }
?>
<!-- class="wrapper"  -->
<div id="light-header-page-wrapper">
	<?php
	while (have_posts()) {
		?>
		<div class="container"><?php the_post(); ?></div>
		<?php
		get_template_part('loop-templates/content', 'blank');
	} ?>
</div>
<?php
get_footer();
