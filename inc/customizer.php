<?php
/**
 * Asthir plus Theme Customizer
 *
 * @package Asthir plus
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */


function asthir_pluscustomize_register( $wp_customize ) {

    $wp_customize->remove_section( 'asthir_topbar' );

  //  $wp_customize->remove_control('asthir_blog_style');
    $wp_customize->remove_control('asthir_shop_style');

        
    $wp_customize->add_setting( 'asthir_plus_navlogo' , array(
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'default'       =>  '1',
        'sanitize_callback' => 'absint',
        'transport'     => 'refresh',
        ) );
        $wp_customize->add_control( 'asthir_plus_navlogo', array(
            'label'      => __('Show Nav Logo & Title ', 'asthir-shop'),
            'description'=> __('You can show or hide nav logo.', 'asthir-shop'),
            'section'    => 'asthir_main_header',
            'settings'   => 'asthir_plus_navlogo',
            'type'       => 'checkbox',
            
        ) );
        
    $wp_customize->add_setting( 'asthir_plus_extralogo' , array(
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'default'       =>  '',
        'sanitize_callback' => 'absint',
        'transport'     => 'refresh',
        ) );
        $wp_customize->add_control( 'asthir_plus_extralogo', array(
            'label'      => __('Show Extra Logo & Title ', 'asthir-shop'),
            'description'=> __('You can show or hide extra logo.', 'asthir-shop'),
            'section'    => 'asthir_main_header',
            'settings'   => 'asthir_plus_extralogo',
            'type'       => 'checkbox',
            
        ) );
        
    $wp_customize->add_setting( 'asthir_plus_navlogo' , array(
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'default'       =>  '1',
        'sanitize_callback' => 'absint',
        'transport'     => 'refresh',
        ) );
        $wp_customize->add_control( 'asthir_plus_navlogo', array(
            'label'      => __('Show Nav Logo & Title ', 'asthir-shop'),
            'description'=> __('You can show or hide nav logo.', 'asthir-shop'),
            'section'    => 'asthir_main_header',
            'settings'   => 'asthir_plus_navlogo',
            'type'       => 'checkbox',
            
        ) );
  
    $wp_customize->add_section('asthir_blog', array(
		'title' => __('Asthir Blog Settings', 'asthir-shop'),
		'capability'     => 'edit_theme_options',
		'description'     => __('Asthir blog setup.', 'asthir-shop'),
	//	'priority'       => 4,

	));
    
    $wp_customize->add_setting('asthir_plus_blog_style', array(
        'default'        => 'style2',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'asthir_sanitize_select',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('asthir_plus_blog_style', array(
        'label'      => __('Select Blog Style', 'asthir-shop'),
        'section'    => 'asthir_blog',
        'settings'   => 'asthir_plus_blog_style',
        'type'       => 'select',
        'choices'    => array(
            'style1' => __('List Style', 'asthir-shop'),
            'style2' => __('Grid Style', 'asthir-shop'),
        ),
    ));   
    $wp_customize->add_setting('asthir_plus_widget_style', array(
        'default'        => '2',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'asthir_sanitize_select',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('asthir_plus_widget_style', array(
        'label'      => __('Select Widget Style', 'asthir-shop'),
        'section'    => 'asthir_blog',
        'settings'   => 'asthir_plus_widget_style',
        'type'       => 'select',
        'choices'    => array(
            '1' => __('Style one', 'asthir-shop'),
            '2' => __('Style Two', 'asthir-shop'),
        ),
    ));

    $wp_customize->add_setting('asthir_shop_style', array(
        'default'        => '2',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'asthirwoo_sanitize_select',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('asthir_shop_style', array(
        'label'      => __('Select Products Style', 'asthir-shop'),
        'section'    => 'asthir_shop',
        'settings'   => 'asthir_shop_style',
        'type'       => 'select',
        'choices'    => array(
            '1' => __('Style One', 'asthir-shop'),
            '2' => __('Style Two', 'asthir-shop'),
        ),
    ));
    


}
add_action( 'customize_register', 'asthir_pluscustomize_register',99 );

