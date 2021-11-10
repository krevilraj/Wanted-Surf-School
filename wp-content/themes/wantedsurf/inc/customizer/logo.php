<?php
/**
 * Add support for core custom logo.
 *
 * @link https://codex.wordpress.org/Theme_Logo
 */
add_theme_support('custom-logo', array());

/*****************Add custom logo class ****************/
add_filter('get_custom_logo', 'add_custom_logo_url');
function add_custom_logo_url()
{
  $custom_logo_id = get_theme_mod('custom_logo');
  $html = sprintf('<a href="%1$s" class="custom-logo-link" rel="home" itemprop="url">%2$s</a>',
    esc_url(site_url()),
    wp_get_attachment_image($custom_logo_id, 'full', false, array(
      'class' => 'img-fluid',
    ))
  );
  return $html;
}

//**********************Second logo***********************************
function dc_customize_second_logo( $wp_customize )
{
  $wp_customize->add_setting('second_logo', array(
    'default' => get_theme_file_uri('inc/img/footer-logo.png'), // Add Default Image URL
    'sanitize_callback' => 'esc_url_raw'
  ));

  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'second_logo_control', array(
    'label' => 'Upload second logo',
    'priority' => 20,
    'section' => 'title_tagline',
    'settings' => 'second_logo',
    'button_labels' => array(// All These labels are optional
      'select' => 'Select Image',
      'remove' => 'Remove Image',
      'change' => 'Change Image',
    )
  )));
  $wp_customize->selective_refresh->add_partial('second_logo', array(
    'selector' => 'span#c_second_logo',
  ));
}
add_action( 'customize_register', 'dc_customize_second_logo' );
