<?php

function dc_customize_contact( $wp_customize ) {

// No panels added!

// Create our sections

  $wp_customize->add_section( 'dc_contact' , array(
    'title'             => _('Contact', 'dc'),
    'description'       => _('Contact Description', 'dc'),
  ) );

// Create our settings

  $wp_customize->add_setting( 'dc_location' , array(
    'type'          => 'theme_mod',
    'transport'     => 'refresh',
  ) );
  $wp_customize->add_control( 'dc_location_control', array(
    'label'      => _('Address', 'dc'),
    'section'    => 'dc_contact',
    'settings'   => 'dc_location',
    'type'       => 'text',
  ) );
  $wp_customize->selective_refresh->add_partial('dc_location', array(
    'selector' => 'span#dc_location',
  ));


  $wp_customize->add_setting( 'dc_phone' , array(
    'type'          => 'theme_mod',
    'transport'     => 'refresh',
  ) );
  $wp_customize->add_control( 'dc_phone_control', array(
    'label'      => _('Phone', 'dc'),
    'section'    => 'dc_contact',
    'settings'   => 'dc_phone',
    'type'       => 'text',
  ) );
  $wp_customize->selective_refresh->add_partial('dc_phone', array(
    'selector' => 'span#dc_phone',
  ));

  $wp_customize->add_setting( 'dc_email' , array(
    'type'          => 'theme_mod',
    'transport'     => 'refresh',
  ) );
  $wp_customize->add_control( 'dc_email_control', array(
    'label'      => _('Email', 'dc'),
    'section'    => 'dc_contact',
    'settings'   => 'dc_email',
    'type'       => 'text',
  ) );
  $wp_customize->selective_refresh->add_partial('dc_email', array(
    'selector' => 'span#dc_email',
  ));





}
add_action( 'customize_register', 'dc_customize_contact' );