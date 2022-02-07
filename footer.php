<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$container = get_theme_mod('understrap_container_type');
?>

<?php get_template_part('sidebar-templates/sidebar', 'footerfull'); ?>

<div class="fuild-container footer-container" id="wrapper-footer">

  <footer class="footer-inner-container" id="colophon">

    <?php
    /* The footer widget area is triggered if any of the areas
     * have widgets. So let's check that first.
     *
     * If none of the sidebars have widgets, then let's bail early.
     */
    // if (
    //   !is_active_sidebar('first-footer-widget-area')
    //   && !is_active_sidebar('second-footer-widget-area')
    //   && !is_active_sidebar('third-footer-widget-area')
    //   && !is_active_sidebar('fourth-footer-widget-area')
    // ) {
    //   return;
    // }
    ?>
    <div class="row">
      <?php
      if (is_active_sidebar('first-footer-widget-area')) : ?>

        <div class="col-md col-sm-12" tabindex="-1">

          <?php dynamic_sidebar('first-footer-widget-area'); ?>

        </div>

      <?php endif;
      if (is_active_sidebar('second-footer-widget-area')) : ?>

        <div class="col-md col-sm-12" tabindex="-1">

          <?php dynamic_sidebar('second-footer-widget-area'); ?>

        </div>

      <?php endif;
      if (is_active_sidebar('third-footer-widget-area')) : ?>

        <div class="col-md col-sm-12" tabindex="-1">

          <?php dynamic_sidebar('third-footer-widget-area'); ?>

        </div>

      <?php endif;
      if (is_active_sidebar('fourth-footer-widget-area')) : ?>

        <div class="col-md col-sm-12" tabindex="-1">

          <?php dynamic_sidebar('fourth-footer-widget-area'); ?>

        </div>

      <?php endif;
      if (is_active_sidebar('fifth-footer-widget-area')) : ?>

        <div class="col-md col-sm-12" tabindex="-1">

          <?php dynamic_sidebar('fifth-footer-widget-area'); ?>

        </div>

      <?php endif; ?>
    </div>
  </footer>

</div>

</div>
<!-- #page we need this extra closing tag here -->

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered search-popup-for-mobile" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <?php get_search_form() ?>
      </div>
    </div>
  </div>
</div>

<?php wp_footer(); ?>

</body>

</html>