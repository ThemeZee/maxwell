<?php
/**
 * Theme Add-ons Section
 *
 * Registers Theme Add-ons Section in Customizer
 *
 * @package Maxwell
 */

/**
 * Adds theme links, upgrade and recommend plugin controls.
 *
 * @param object $wp_customize / Customizer Object.
 */
function maxwell_customize_register_upgrade_settings( $wp_customize ) {

	// Add Theme Add-ons Section.
	$wp_customize->add_section( 'maxwell_section_upgrade', array(
		'title'    => esc_html__( 'Theme Add-ons', 'maxwell' ),
		'priority' => 70,
		'panel' => 'maxwell_options_panel',
		)
	);

	// Add custom Pro Version control.
	$wp_customize->add_setting( 'maxwell_theme_options[pro_version]', array(
		'default'           => '',
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control( new Maxwell_Customize_Pro_Version_Control(
		$wp_customize, 'maxwell_theme_options[pro_version]', array(
		'section' => 'maxwell_section_upgrade',
		'settings' => 'maxwell_theme_options[pro_version]',
		'priority' => 1,
		)
	) );

	// Add custom Recommended Plugins control.
	$wp_customize->add_setting( 'maxwell_theme_options[recommended_plugins]', array(
		'default'           => '',
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control( new Maxwell_Customize_Recommended_Plugins_Control(
		$wp_customize, 'maxwell_theme_options[recommended_plugins]', array(
		'section' => 'maxwell_section_upgrade',
		'settings' => 'maxwell_theme_options[recommended_plugins]',
		'priority' => 2,
		)
	) );

	// Add custom Theme Links control.
	$wp_customize->add_setting( 'maxwell_theme_options[theme_links]', array(
		'default'           => '',
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control( new Maxwell_Customize_Theme_Links_Control(
		$wp_customize, 'maxwell_theme_options[theme_links]', array(
		'section' => 'maxwell_section_upgrade',
		'settings' => 'maxwell_theme_options[theme_links]',
		'priority' => 3,
		)
	) );

}
add_action( 'customize_register', 'maxwell_customize_register_upgrade_settings' );
