<div class="transparent-header">
  <?php get_header(); ?>
</div>
<div class="fuild-container">
  <div class="natural-page-title">
    <div class="container">
      <h2 class="natural-page-title-text"><?php single_term_title(); ?></h2>
    </div>
  </div>
  <?php
   if (get_field('test_keys')) {
    echo '<p>' . get_field('test_keys') . '</p>';
  } else {
    echo "nope";
  }
	if ( have_posts() ) {
    ?>
    <?php
    // Start the loop.
    while ( have_posts() ) {
      the_post();

      /*
       * Include the Post-Format-specific template for the content.
       * If you want to override this in a child theme, then include a file
       * called content-___.php (where ___ is the Post Format name) and that will be used instead.
       */
      get_template_part( 'loop-templates/materials-key-page', "transparent-header" );
    }
  } else {
    get_template_part( 'loop-templates/content', 'none' );
  }
  ?>
</div>