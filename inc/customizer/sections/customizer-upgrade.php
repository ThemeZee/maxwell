<?php
/**
 * Pro Version Upgrade Section
 *
 * Registers Upgrade Section for the Pro Version of the theme
 *
 * @package Maxwell
 */

/**
 * Adds pro version description and CTA button
 *
 * @param object $wp_customize / Customizer Object.
 */
function maxwell_customize_register_upgrade_settings( $wp_customize ) {

	// Add Upgrade / More Features Section.
	$wp_customize->add_section( 'maxwell_section_upgrade', array(
		'title'    => esc_html__( 'More Features', 'maxwell' ),
		'priority' => 70,
		'panel' => 'maxwell_options_panel',
		)
	);

	// Add custom Upgrade Content control.
	$wp_customize->add_setting( 'maxwell_theme_options[upgrade]', array(
		'default'           => '',
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control( new Maxwell_Customize_Upgrade_Control(
		$wp_customize, 'maxwell_theme_options[upgrade]', array(
		'section' => 'maxwell_section_upgrade',
		'settings' => 'maxwell_theme_options[upgrade]',
		'priority' => 1,
		)
	) );

}
add_action( 'customize_register', 'maxwell_customize_register_upgrade_settings' );
