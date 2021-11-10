<?php

/**
 * Include file
 */
class DCClass
{
  const TEMPLATE_NAME = 'wantedsurf';
  const TEMPLATE_THEME_NAME = 'Wanted Surf School';
}

require_once get_template_directory() . '/inc/menu/nav-walker.php';
require_once get_template_directory() . '/inc/customposttype/slider.php';
require_once get_template_directory() . '/inc/customizer/index.php';


/**
 * Enqueue scripts and styles.
 */
function wantedsurf_scripts()
{
  //CSS files
  wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '5.0.2', 'all');
  wp_enqueue_style('fontawesome-css', "https://pro.fontawesome.com/releases/v5.10.0/css/all.css");
  wp_enqueue_style('aos-css', "https://unpkg.com/aos@2.3.1/dist/aos.css");


  // Js
//  wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '5.0.2', true);
//  wp_enqueue_script('pooper-js', get_template_directory_uri() . '/js/pooper.min.js', array('jquery'), '5.0.2', true);

  wp_enqueue_script('aos-js', 'https://unpkg.com/aos@2.3.1/dist/aos.js', array('jquery'), '3.3.5', true);
  wp_enqueue_script('bootstrap-bundle-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js', array('jquery'), '3.3.5', true);


  wp_enqueue_script('custom-js', get_template_directory_uri() . '/js/custom.js', array('jquery'), '1.0.1', true);

  // Theme's main stylesheet
  wp_enqueue_style('wantedsurf-style', get_stylesheet_uri(), array(), filemtime(get_template_directory() . '/style.css'), 'all');

}

add_action('wp_enqueue_scripts', 'wantedsurf_scripts');


/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function wantedsurf_config()
{

  // This theme uses wp_nav_menu() in two locations.
  register_nav_menus(
    array(
      'wantedsurf_main_menu' => DCClass::TEMPLATE_THEME_NAME . ' Main Menu',
      'wantedsurf_footer_menu' => DCClass::TEMPLATE_THEME_NAME . ' Footer Menu',
    )
  );

}

add_action('after_setup_theme', 'wantedsurf_config', 0);

//featured image
add_theme_support('post-thumbnails');

add_filter('excerpt_length', function ($length) {
  return 15;
}, PHP_INT_MAX);
function new_excerpt_more($more)
{
  return '...';
}

add_filter('excerpt_more', 'new_excerpt_more');

function lozaizidoro_config()
{

  // This theme uses wp_nav_menu() in two locations.
  register_nav_menus(
    array(
      'lozaizidoro_main_menu' => 'Lozaizidoro Main Menu',
      'lozaizidoro_footer_menu' => 'Lozaizidoro Footer Menu',
    )
  );

  // This theme is WooCommerce compatible, so we're adding support to WooCommerce
  add_theme_support('woocommerce', array(
    'thumbnail_image_width' => 500,
    'single_image_width' => 1024,
    'product_grid' => array(
      'default_rows' => 10,
      'min_rows' => 6,
      'max_rows' => 10,
      'default_columns' => 3,
      'min_columns' => 3,
      'max_columns' => 3,
    )
  ));
//  add_theme_support('wc-product-gallery-zoom');
  add_theme_support('wc-product-gallery-lightbox');
  add_theme_support('wc-product-gallery-slider');


}

add_action('after_setup_theme', 'lozaizidoro_config', 0);