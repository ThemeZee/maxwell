<?php
/**
 * Post Settings
 *
 * Register Post Settings section, settings and controls for Theme Customizer
 *
 * @package Maxwell
 */


/**
 * Adds post settings in the Customizer
 *
 * @param object $wp_customize / Customizer Object
 */
function maxwell_customize_register_post_settings( $wp_customize ) {

	// Add Sections for Post Settings
	$wp_customize->add_section( 'maxwell_section_post', array(
        'title'    => esc_html__( 'Post Settings', 'maxwell' ),
        'priority' => 30,
		'panel' => 'maxwell_options_panel' 
		)
	);
	
	// Add Post Layout Settings for archive posts
	$wp_customize->add_setting( 'maxwell_theme_options[post_layout]', array(
        'default'           => 'one-column',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'maxwell_sanitize_select'
		)
	);
    $wp_customize->add_control( 'maxwell_theme_options[post_layout]', array(
        'label'    => esc_html__( 'Post Layout (archive pages)', 'maxwell' ),
        'section'  => 'maxwell_section_post',
        'settings' => 'maxwell_theme_options[post_layout]',
        'type'     => 'select',
		'priority' => 1,
        'choices'  => array(
            'one-column' => esc_html__( 'One Column', 'maxwell' ),
            'two-columns' => esc_html__( 'Two Columns', 'maxwell' ),
			'three-columns' => esc_html__( 'Three Columns without Sidebar', 'maxwell' )
			)
		)
	);

	// Add Setting and Control for Excerpt Length
	$wp_customize->add_setting( 'maxwell_theme_options[excerpt_length]', array(
        'default'           => 20,
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'absint'
		)
	);
    $wp_customize->add_control( 'maxwell_theme_options[excerpt_length]', array(
        'label'    => esc_html__( 'Excerpt Length', 'maxwell' ),
        'section'  => 'maxwell_section_post',
        'settings' => 'maxwell_theme_options[excerpt_length]',
        'type'     => 'text',
		'priority' => 2
		)
	);
	
}
add_action( 'customize_register', 'maxwell_customize_register_post_settings' );