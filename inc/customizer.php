<?php
/**
 * TempTest Theme Customizer
 *
 * @package TempTest
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function temptest_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'temptest_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'temptest_customize_partial_blogdescription',
		) );
	}

	/**
	 * add section for Header Settings
	 */
	$wp_customize->add_section( 'temptest_header_settings', array(
        'title'          => 'Header Settings',
        'priority'       => 58,
    ) );
 
    // for location input
    $wp_customize->add_setting( 'temptest_header_location', array(
        'default'        => '123 SomeStreet City State, ZIPCODE',
	) );
	
 
    $wp_customize->add_control( 'temptest_header_location', array(
        'label'   => 'Location',
        'section' => 'temptest_header_settings',
        'type'    => 'text',
	) );

	// for email address
    $wp_customize->add_setting( 'temptest_header_email', array(
		'default'        => '',
		'sanitize_callback' => 'sanitize_email',
	) );

	$wp_customize->add_control( 'temptest_header_email', array(
        'label'   => 'Email Address',
        'section' => 'temptest_header_settings',
		'type'    => 'email',
	) );

	// for phone number input
	$wp_customize->add_setting( 'temptest_header_phone', array(
		'default'        => '',
		'transport'      => 'postMessage',
		'type'           => 'theme_mod',
    ) );
	
	$wp_customize->add_control( 'temptest_header_phone', array(
        'label'   => 'Phone Number',
        'section' => 'temptest_header_settings',
        'type'    => 'text',
    ) );


}
add_action( 'customize_register', 'temptest_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function temptest_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function temptest_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function temptest_customize_preview_js() {
	wp_enqueue_script( 'temptest-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'temptest_customize_preview_js' );
