<?php
defined('ABSPATH') || exit;

$terms  = wp_get_object_terms($post->ID, 'types');
$names  = wp_list_pluck($terms, 'name');
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

  <header class="entry-header">

    <?php
    the_title(
      sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())),
      '</a></h2>'
    );

    if (get_field('test_keys')) {
      echo '<p>' . get_field('test_keys') . '</p>';
    } else {
      echo "nope";
    }


    // the_field('lists');
    echo get_field('key-materials');
    $rows = get_field('key-materials');
    if ($rows) {
      echo '<ul>';

      foreach ($rows as $row) {
        echo '<li>sub_field_1 = ' . $row['title'] . '</li>';
      }

      echo '</ul>';
    }

    // $rows = get_field('lists');
    // if ($rows) {
    //   echo '<ul class="slides">';
    //   foreach ($rows as $row) {
    //     $image = $row['title'];
    //     echo '<li>';
    //     echo $image;
    //     echo wpautop($row['caption']);
    //     echo '</li>';
    //   }
    //   echo '</ul>';
    // }

    //   if( have_rows('lists') ):

    //     // Loop through rows.
    //     while( have_rows('lists') ) : the_row();

    //         // Load sub field value.
    //         $sub_value = get_sub_field('title');
    //         $sub_value2 = get_sub_field('materials');
    //     // Do something...

    //     var_dump($sub_value2);

    //     echo $sub_value;
    //     echo $sub_value2;

    //     // End loop.
    //     endwhile;

    // // No value.
    // else :
    //     // Do something...
    // endif;

    if (in_array("Strip", $names) && in_array("Wire", $names)) {
      echo '<div class="material-page-title-availability">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <circle cx="12" cy="12" r="10" fill="#085FA9"/>
          <path d="M14.225 10.2358C14.159 10.1624 14.0197 10.0671 13.807 9.94977C13.5943 9.8251 13.3377 9.7151 13.037 9.61977C12.7437 9.5171 12.4393 9.46577 12.124 9.46577C11.2953 9.46577 10.881 9.7591 10.881 10.3458C10.881 10.5584 10.947 10.7271 11.079 10.8518C11.211 10.9764 11.409 11.0828 11.673 11.1708C11.937 11.2588 12.267 11.3541 12.663 11.4568C13.1763 11.5888 13.62 11.7428 13.994 11.9188C14.3753 12.0948 14.665 12.3294 14.863 12.6228C15.0683 12.9088 15.171 13.2901 15.171 13.7668C15.171 14.3241 15.0353 14.7751 14.764 15.1198C14.5 15.4571 14.148 15.7028 13.708 15.8568C13.268 16.0108 12.7913 16.0878 12.278 16.0878C11.6913 16.0878 11.1083 15.9998 10.529 15.8238C9.957 15.6404 9.44733 15.3911 9 15.0758L9.671 13.7668C9.737 13.8328 9.85433 13.9208 10.023 14.0308C10.1917 14.1334 10.397 14.2398 10.639 14.3498C10.881 14.4524 11.145 14.5404 11.431 14.6138C11.717 14.6871 12.0067 14.7238 12.3 14.7238C13.136 14.7238 13.554 14.4561 13.554 13.9208C13.554 13.6934 13.4697 13.5101 13.301 13.3708C13.1323 13.2314 12.894 13.1141 12.586 13.0188C12.2853 12.9234 11.9333 12.8171 11.53 12.6998C11.0313 12.5604 10.617 12.4064 10.287 12.2378C9.96433 12.0618 9.72233 11.8454 9.561 11.5888C9.39967 11.3248 9.319 10.9911 9.319 10.5878C9.319 10.0524 9.44367 9.6051 9.693 9.24577C9.94967 8.8791 10.2943 8.6041 10.727 8.42077C11.1597 8.2301 11.64 8.13477 12.168 8.13477C12.7107 8.13477 13.2167 8.22277 13.686 8.39877C14.1553 8.57477 14.5587 8.77643 14.896 9.00377L14.225 10.2358Z" fill="white"/>
        </svg>
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <circle cx="12" cy="12" r="10" fill="#576D80"/>
          <path d="M17.957 8.18994L15.537 15.9999H13.986L12.006 10.6319L10.07 15.9999H8.52999L6.10999 8.18994H7.77099L9.43199 13.7559L11.258 8.18994H12.765L14.646 13.7559L16.285 8.18994H17.957Z" fill="white"/>
        </svg>
      </div>';
    } elseif (in_array("Strip", $names) && !in_array("Wire", $names)) {
      echo '<div class="material-page-title-availability">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <circle cx="12" cy="12" r="10" fill="#085FA9"/>
          <path d="M14.225 10.2358C14.159 10.1624 14.0197 10.0671 13.807 9.94977C13.5943 9.8251 13.3377 9.7151 13.037 9.61977C12.7437 9.5171 12.4393 9.46577 12.124 9.46577C11.2953 9.46577 10.881 9.7591 10.881 10.3458C10.881 10.5584 10.947 10.7271 11.079 10.8518C11.211 10.9764 11.409 11.0828 11.673 11.1708C11.937 11.2588 12.267 11.3541 12.663 11.4568C13.1763 11.5888 13.62 11.7428 13.994 11.9188C14.3753 12.0948 14.665 12.3294 14.863 12.6228C15.0683 12.9088 15.171 13.2901 15.171 13.7668C15.171 14.3241 15.0353 14.7751 14.764 15.1198C14.5 15.4571 14.148 15.7028 13.708 15.8568C13.268 16.0108 12.7913 16.0878 12.278 16.0878C11.6913 16.0878 11.1083 15.9998 10.529 15.8238C9.957 15.6404 9.44733 15.3911 9 15.0758L9.671 13.7668C9.737 13.8328 9.85433 13.9208 10.023 14.0308C10.1917 14.1334 10.397 14.2398 10.639 14.3498C10.881 14.4524 11.145 14.5404 11.431 14.6138C11.717 14.6871 12.0067 14.7238 12.3 14.7238C13.136 14.7238 13.554 14.4561 13.554 13.9208C13.554 13.6934 13.4697 13.5101 13.301 13.3708C13.1323 13.2314 12.894 13.1141 12.586 13.0188C12.2853 12.9234 11.9333 12.8171 11.53 12.6998C11.0313 12.5604 10.617 12.4064 10.287 12.2378C9.96433 12.0618 9.72233 11.8454 9.561 11.5888C9.39967 11.3248 9.319 10.9911 9.319 10.5878C9.319 10.0524 9.44367 9.6051 9.693 9.24577C9.94967 8.8791 10.2943 8.6041 10.727 8.42077C11.1597 8.2301 11.64 8.13477 12.168 8.13477C12.7107 8.13477 13.2167 8.22277 13.686 8.39877C14.1553 8.57477 14.5587 8.77643 14.896 9.00377L14.225 10.2358Z" fill="white"/>
        </svg>
      </div>';
    } elseif (!in_array("Strip", $names) && in_array("Wire", $names)) {
      echo '<div class="material-page-title-availability">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <circle cx="12" cy="12" r="10" fill="#576D80"/>
          <path d="M17.957 8.18994L15.537 15.9999H13.986L12.006 10.6319L10.07 15.9999H8.52999L6.10999 8.18994H7.77099L9.43199 13.7559L11.258 8.18994H12.765L14.646 13.7559L16.285 8.18994H17.957Z" fill="white"/>
        </svg>
      </div>';
    }
    // this will used later for filtering
    // $output = implode(', ', $names);
    // echo $output;

    ?>

  </header><!-- .entry-header -->

  <?php //echo get_the_post_thumbnail( $post->ID, 'large' ); 
  ?>

  <div class="entry-content">

    <?php
    // the_excerpt();
    // understrap_link_pages();
    ?>

  </div><!-- .entry-content -->

  <footer class="entry-footer">

    <?php understrap_entry_footer(); ?>

  </footer><!-- .entry-footer -->

</article><!-- #post-## -->