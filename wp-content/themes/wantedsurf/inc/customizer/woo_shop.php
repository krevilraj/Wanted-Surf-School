<?php
// shop title and description
function wantedsurf_customize_register2( $wp_customize ) {

// No panels added!

// Create our sections

  $wp_customize->add_section( 'shop_section' , array(
    'title'             => __('Shop', 'wanted'),
  ) );

// Create our settings

  $wp_customize->add_setting( 'wantedsurf_shop_title_setting' , array(
    'type'          => 'theme_mod',
    'transport'     => 'refresh',
  ) );
  $wp_customize->add_control( 'wantedsurf_shop_title_setting_control', array(
    'label'      => __('Shop Title', 'wanted'),
    'section'    => 'shop_section',
    'settings'   => 'wantedsurf_shop_title_setting',
    'type'       => 'text',
  ) );


  $wp_customize->add_setting( 'wantedsurf_shop_description_setting' , array(
    'type'          => 'theme_mod',
    'transport'     => 'refresh',
  ) );
  $wp_customize->add_control( 'wantedsurf_shop_description_setting_control', array(
    'label'      => __('Shop Description', 'wanted'),
    'section'    => 'shop_section',
    'settings'   => 'wantedsurf_shop_description_setting',
    'type'       => 'textarea',
  ) );


  $wp_customize->add_setting('wantedsurf_cart_image', array(
    'sanitize_callback' => 'esc_url_raw'
  ));

  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'wantedsurf_cart_image_control', array(
    'label' => 'Cart Banner Image',
    'section' => 'shop_section',
    'settings' => 'wantedsurf_cart_image',
    'button_labels' => array(// All These labels are optional
      'select' => 'Select  Image',
      'remove' => 'Remove  Image',
      'change' => 'Upload  Image',
    )
  )));

  $wp_customize->add_setting('wantedsurf_account_image', array(
    'sanitize_callback' => 'esc_url_raw'
  ));

  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'wantedsurf_account_image_control', array(
    'label' => 'Account Banner Image',
    'section' => 'shop_section',
    'settings' => 'wantedsurf_account_image',
    'button_labels' => array(// All These labels are optional
      'select' => 'Select  Image',
      'remove' => 'Remove  Image',
      'change' => 'Upload  Image',
    )
  )));


  $wp_customize->add_setting('wantedsurf_checkout_image', array(
    'sanitize_callback' => 'esc_url_raw'
  ));

  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'wantedsurf_checkout_image_control', array(
    'label' => 'Checkout Banner Image',
    'section' => 'shop_section',
    'settings' => 'wantedsurf_checkout_image',
    'button_labels' => array(// All These labels are optional
      'select' => 'Select  Image',
      'remove' => 'Remove  Image',
      'change' => 'Upload  Image',
    )
  )));
}
add_action( 'customize_register', 'wantedsurf_customize_register2' );