<?php
if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

function understrap_remove_scripts()
{
  wp_dequeue_style('understrap-styles');
  wp_deregister_style('understrap-styles');

  wp_dequeue_script('understrap-scripts');
  wp_deregister_script('understrap-scripts');

  // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action('wp_enqueue_scripts', 'understrap_remove_scripts', 20);

add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
function theme_enqueue_styles()
{

  // Get the theme data
  $the_theme = wp_get_theme();
  wp_enqueue_style('child-understrap-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $the_theme->get('Version'));
  wp_enqueue_script('jquery');
  wp_enqueue_script('child-understrap-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get('Version'), true);
  if (is_singular() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }
}

function add_child_theme_textdomain()
{
  load_child_theme_textdomain('understrap-child', get_stylesheet_directory() . '/languages');
}
add_action('after_setup_theme', 'add_child_theme_textdomain');


### START CUSTOM CODE

define('CHILD_THEME_DIR', trailingslashit(dirname(__FILE__)));

// Includes list
$rbc_includes = array(
  'custom-elementor/register-categories.php',
  'custom-elementor/register-widgets.php',
);


// Require Includes
foreach ($rbc_includes as $fp) {
  $include_path = CHILD_THEME_DIR . $fp;
  if (file_exists($include_path)) {
    //echo file_get_contents(CHILD_THEME_DIR . $fp);
    require_once $include_path;
  }
}

// Create Materials custom post tyoe
function crunchify_materials_custom_post_type()
{
  $labels = array(
    'name'                => __('Materials'),
    'singular_name'       => __('Material'),
    'menu_name'           => __('Materials'),
    'parent_item_colon'   => __('Parent Material'),
    'all_items'           => __('All Materials'),
    'view_item'           => __('View Material'),
    'add_new_item'        => __('Add New Material'),
    'add_new'             => __('Add New'),
    'edit_item'           => __('Edit Material'),
    'update_item'         => __('Update Material'),
    'search_items'        => __('Search Material'),
    'not_found'           => __('Not Found'),
    'not_found_in_trash'  => __('Not found in Trash')
  );
  $args = array(
    'label'               => __('materials'),
    'description'         => __('Best Crunchify Materials'),
    'labels'              => $labels,
    'supports'            => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields'),
    'public'              => true,
    'hierarchical'        => false,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => true,
    'has_archive'         => true,
    'can_export'          => true,
    'exclude_from_search' => false,
    'yarpp_support'       => true,
    'taxonomies'           => array('post_tag'),
    'publicly_queryable'  => true,
    'capability_type'     => 'page'
  );
  register_post_type('materials', $args);
}
add_action('init', 'crunchify_materials_custom_post_type', 0);

//create a custom taxonomy name it "type" for your posts
function crunchify_create_materials_custom_taxonomy()
{
  
  $labels = array(
    'name' => _x('Types', 'taxonomy general name'),
    'singular_name' => _x('Type', 'taxonomy singular name'),
    'search_items' =>  __('Search Types'),
    'all_items' => __('All Types'),
    'parent_item' => __('Parent Type'),
    'parent_item_colon' => __('Parent Type:'),
    'edit_item' => __('Edit Type'),
    'update_item' => __('Update Type'),
    'add_new_item' => __('Add New Type'),
    'new_item_name' => __('New Type Name'),
    'menu_name' => __('Types'),
  );
  
  register_taxonomy('types', 'materials', array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'types'),
  ));
}

// Let us create Taxonomy for Custom Post Type
add_action('init', 'crunchify_create_materials_custom_taxonomy', 0);

// function crunchify_material_keys_custom_post_type()
// {
//   $labels = array(
//     'name'                => __('Material Keys'),
//     'singular_name'       => __('Material'),
//     'menu_name'           => __('Material Keys'),
//     'parent_item_colon'   => __('Parent Material key'),
//     'all_items'           => __('All Material Keys'),
//     'view_item'           => __('View Material key'),
//     'add_new_item'        => __('Add New Material key'),
//     'add_new'             => __('Add New'),
//     'edit_item'           => __('Edit Material key'),
//     'update_item'         => __('Update Material key'),
//     'search_items'        => __('Search Material key'),
//     'not_found'           => __('Not Found'),
//     'not_found_in_trash'  => __('Not found in Trash')
//   );
//   $args = array(
//     'label'               => __('material keys'),
//     'description'         => __('Best Crunchify Material Keys'),
//     'labels'              => $labels,
//     'supports'            => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields'),
//     'public'              => true,
//     'hierarchical'        => false,
//     'show_ui'             => true,
//     'show_in_menu'        => true,
//     'show_in_nav_menus'   => true,
//     'show_in_admin_bar'   => true,
//     'has_archive'         => true,
//     'can_export'          => true,
//     'exclude_from_search' => false,
//     'yarpp_support'       => true,
//     'taxonomies'           => array('post_tag'),
//     'publicly_queryable'  => true,
//     'capability_type'     => 'page'
//   );
//   register_post_type('materialkeys', $args);
// }
// add_action('init', 'crunchify_material_keys_custom_post_type', 0);


function tutsplus_widgets_init() {
 
  // First footer widget area, located in the footer. Empty by default.
  register_sidebar( array(
      'name' => __( 'First Footer Widget Area', 'tutsplus' ),
      'id' => 'first-footer-widget-area',
      'description' => __( 'The first footer widget area', 'tutsplus' ),
      'before_widget' => '<div id="%1$s" class="widget-container custom-footer-widget first-footer-widget-area %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h3 class="widget-title">',
      'after_title' => '</h3>',
  ) );

  // Second Footer Widget Area, located in the footer. Empty by default.
  register_sidebar( array(
      'name' => __( 'Second Footer Widget Area', 'tutsplus' ),
      'id' => 'second-footer-widget-area',
      'description' => __( 'The second footer widget area', 'tutsplus' ),
      'before_widget' => '<div id="%1$s" class="widget-container custom-footer-widget second-footer-widget-area %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h3 class="widget-title">',
      'after_title' => '</h3>',
  ) );

  // Third Footer Widget Area, located in the footer. Empty by default.
  register_sidebar( array(
      'name' => __( 'Third Footer Widget Area', 'tutsplus' ),
      'id' => 'third-footer-widget-area',
      'description' => __( 'The third footer widget area', 'tutsplus' ),
      'before_widget' => '<div id="%1$s" class="widget-container custom-footer-widget third-footer-widget-area %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h3 class="widget-title">',
      'after_title' => '</h3>',
  ) );

  // Fourth Footer Widget Area, located in the footer. Empty by default.
  register_sidebar( array(
      'name' => __( 'Fourth Footer Widget Area', 'tutsplus' ),
      'id' => 'fourth-footer-widget-area',
      'description' => __( 'The fourth footer widget area', 'tutsplus' ),
      'before_widget' => '<div id="%1$s" class="widget-container custom-footer-widget fourth-footer-widget-area %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h3 class="widget-title">',
      'after_title' => '</h3>',
  ) );
  register_sidebar( array(
    'name' => __( 'Fifth Footer Widget Area', 'tutsplus' ),
    'id' => 'fifth-footer-widget-area',
    'description' => __( 'The Fifth footer widget area', 'tutsplus' ),
    'before_widget' => '<div id="%1$s" class="widget-container custom-footer-widget fifth-footer-widget-area %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
) );
       
}

// Register sidebars by running tutsplus_widgets_init() on the widgets_init hook.
add_action( 'widgets_init', 'tutsplus_widgets_init' );


// function themename_custom_logo_setup() {
//   $defaults = array(
//       'height'               => 100,
//       'width'                => 400,
//       'flex-height'          => true,
//       'flex-width'           => true,
//       'header-text'          => array( 'site-title', 'site-description' ),
//       'unlink-homepage-logo' => true, 
//       'default-image' => get_parent_theme_file_uri( '/img/header.jpg' )
//   );

//   add_theme_support( 'custom-logo2', $defaults );
// }

// add_action( 'after_setup_theme', 'understrap' );

function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

require_once "motaz.php";
