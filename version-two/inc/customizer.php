<?php
/**
 * Vision Two Customizer functionality
 */
function vision_two_customize_register( $wp_customize ){
   	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	
        
    $wp_customize->add_section( 'colors', array(
		'title'            =>'HK Colors',
		'priority'         => '20',
	) );

    
    // Add custom header and sidebar text color setting and control.
	$wp_customize->add_setting( 'header_textcolor', array(
		'default'            =>'#000',
        'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );
    
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_textcolor', array(
		'label'       => __( 'Header and Sidebar HK Text Color', 'versiontwo' ),
		'description' => __( 'Applied to the header on small screens and the sidebar on wide screens.', 'versiontwo' ),
		'section'     => 'colors',
        'setting'     =>'header_textcolor',
	) ) );

    // Remove the core header textcolor control,
    //$wp_customize->remove_control( 'header_textcolor' );
}
add_action('customize_register','vision_two_customize_register');



	


/**
 * 
 * Add support custom background 
 */ 
function versiontwo_custom_background() {
	add_theme_support( 'custom-background', apply_filters( 'versiontwo_custom_background_args', array(
		'default-color' => '#fff',
        'default-image' => '',
	) ) );
}
    
add_action( 'after_setup_theme', 'versiontwo_custom_background' );
























