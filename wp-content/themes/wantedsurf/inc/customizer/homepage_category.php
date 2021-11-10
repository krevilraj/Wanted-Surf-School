<?php
function li_customize_register( $wp_customize ) {

// Create our panels

  $wp_customize->add_panel( 'li_homepage_category_panel', array(
    'title'          => __('Homepage Category', 'lojaizidoro'),
  ) );

// Create our sections

  $wp_customize->add_section( 'li_homepage_category_section1' , array(
    'title'             => __('Category 1', 'lojaizidoro'),
    'panel'             => 'li_homepage_category_panel',
  ) );

// Create our settings

  $wp_customize->add_setting( 'li_category_title1' , array(
    'type'          => 'theme_mod',
    'transport'     => 'refresh',
  ) );
  $wp_customize->add_control( 'li_category_title1_control', array(
    'label'      => __('Category Title', 'lojaizidoro'),
    'section'    => 'li_homepage_category_section1',
    'settings'   => 'li_category_title1',
    'type'       => 'text',
  ) );

  $wp_customize->add_setting( 'li_category_link1' , array(
    'type'          => 'theme_mod',
    'transport'     => 'refresh',
  ) );
  $wp_customize->add_control( 'li_category_link1_control', array(
    'label'      => __('Category Link', 'lojaizidoro'),
    'section'    => 'li_homepage_category_section1',
    'settings'   => 'li_category_link1',
    'type'       => 'url',
  ) );
  $wp_customize->add_setting('li_category_image1', array(
    'sanitize_callback' => 'esc_url_raw'
  ));

  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'li_category_image1_control', array(
    'label' => 'Upload offer image',
    'section' => 'li_homepage_category_section1',
    'settings' => 'li_category_image1',
    'button_labels' => array(// All These labels are optional
      'select' => 'Select  Image',
      'remove' => 'Remove  Image',
      'change' => 'Upload  Image',
    )
  )));


  // it disply pen tool for edit
  $wp_customize->selective_refresh->add_partial('li_category_image1', array(
    'selector' => 'span#li_category_image1',
  ));

  // Create our sections

  $wp_customize->add_section( 'li_homepage_category_section2' , array(
    'title'             => __('Category 2', 'lojaizidoro'),
    'panel'             => 'li_homepage_category_panel',
  ) );
  // Create our settings

  $wp_customize->add_setting( 'li_category_title2' , array(
    'type'          => 'theme_mod',
    'transport'     => 'refresh',
  ) );
  $wp_customize->add_control( 'li_category_title2_control', array(
    'label'      => __('Category Title', 'lojaizidoro'),
    'section'    => 'li_homepage_category_section2',
    'settings'   => 'li_category_title2',
    'type'       => 'text',
  ) );

  $wp_customize->add_setting( 'li_category_link2' , array(
    'type'          => 'theme_mod',
    'transport'     => 'refresh',
  ) );
  $wp_customize->add_control( 'li_category_link2_control', array(
    'label'      => __('Category Link', 'lojaizidoro'),
    'section'    => 'li_homepage_category_section2',
    'settings'   => 'li_category_link2',
    'type'       => 'url',
  ) );
  $wp_customize->add_setting('li_category_image2', array(
    'sanitize_callback' => 'esc_url_raw'
  ));

  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'li_category_image2_control', array(
    'label' => 'Upload offer image',
    'section' => 'li_homepage_category_section2',
    'settings' => 'li_category_image2',
    'button_labels' => array(// All These labels are optional
      'select' => 'Select  Image',
      'remove' => 'Remove  Image',
      'change' => 'Upload  Image',
    )
  )));


  // it disply pen tool for edit
  $wp_customize->selective_refresh->add_partial('li_category_image2', array(
    'selector' => 'span#li_category_image2',
  ));

  // Create our sections

  $wp_customize->add_section( 'li_homepage_category_section3' , array(
    'title'             => __('Category 3', 'lojaizidoro'),
    'panel'             => 'li_homepage_category_panel',
  ) );
  // Create our settings

  $wp_customize->add_setting( 'li_category_title3' , array(
    'type'          => 'theme_mod',
    'transport'     => 'refresh',
  ) );
  $wp_customize->add_control( 'li_category_title3_control', array(
    'label'      => __('Category Title', 'lojaizidoro'),
    'section'    => 'li_homepage_category_section3',
    'settings'   => 'li_category_title3',
    'type'       => 'text',
  ) );

  $wp_customize->add_setting( 'li_category_link3' , array(
    'type'          => 'theme_mod',
    'transport'     => 'refresh',
  ) );
  $wp_customize->add_control( 'li_category_link3_control', array(
    'label'      => __('Category Link', 'lojaizidoro'),
    'section'    => 'li_homepage_category_section3',
    'settings'   => 'li_category_link3',
    'type'       => 'url',
  ) );
  $wp_customize->add_setting('li_category_image3', array(
    'sanitize_callback' => 'esc_url_raw'
  ));

  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'li_category_image3_control', array(
    'label' => 'Upload offer image',
    'section' => 'li_homepage_category_section3',
    'settings' => 'li_category_image3',
    'button_labels' => array(// All These labels are optional
      'select' => 'Select  Image',
      'remove' => 'Remove  Image',
      'change' => 'Upload  Image',
    )
  )));


  // it disply pen tool for edit
  $wp_customize->selective_refresh->add_partial('li_category_image3', array(
    'selector' => 'span#li_category_image3',
  ));
}
add_action( 'customize_register', 'li_customize_register' );
