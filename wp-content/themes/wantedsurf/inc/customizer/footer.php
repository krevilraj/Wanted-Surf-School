<?php
/*******************footer text**********************/
function dc_footer_sec_register( $wp_customize ) {

// Create our sections

  $wp_customize->add_section( 'dc_footer_section' , array(
    'title'             => __('Footer', DCClass::TEMPLATE_NAME),
    'description'       => __('Customize footer section', '7icch'),
  ) );

// Create our settings

  $wp_customize->add_setting( 'dc_footer_text' , array(
    'type'          => 'theme_mod',
    'transport'     => 'refresh',
  ) );
  $wp_customize->add_control( 'dc_footer_text_control', array(
    'label'      => __('Footer Text', DCClass::TEMPLATE_NAME),
    'section'    => 'dc_footer_section',
    'settings'   => 'dc_footer_text',
    'type'       => 'textarea',
  ) );
  $wp_customize->selective_refresh->add_partial('dc_footer_text', array(
    'selector' => 'span#c_footer_text',
  ));
}
add_action( 'customize_register', 'dc_footer_sec_register' );