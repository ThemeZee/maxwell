<?php
/**
 * Blog Settings
 *
 * Register Blog Settings section, settings and controls for Theme Customizer
 *
 * @package Maxwell
 */

/**
 * Adds blog settings in the Customizer
 *
 * @param object $wp_customize / Customizer Object.
 */
function maxwell_customize_register_blog_settings( $wp_customize ) {

	// Add Section for Blog Settings.
	$wp_customize->add_section( 'maxwell_section_blog', array(
		'title'    => esc_html__( 'Blog Settings', 'maxwell' ),
		'priority' => 25,
		'panel'    => 'maxwell_options_panel',
	) );

	// Add Blog Layout setting and control.
	$wp_customize->add_setting( 'maxwell_theme_options[post_layout]', array(
		'default'           => 'three-columns',
		'type'              => 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'maxwell_sanitize_select',
		)
	);
	$wp_customize->add_control( 'maxwell_theme_options[post_layout]', array(
		'label'    => esc_html__( 'Blog Layout', 'maxwell' ),
		'section'  => 'maxwell_section_blog',
		'settings' => 'maxwell_theme_options[post_layout]',
		'type'     => 'select',
		'priority' => 10,
		'choices'  => array(
			'one-column'    => esc_html__( 'One Column', 'maxwell' ),
			'two-columns'   => esc_html__( 'Two Columns', 'maxwell' ),
			'three-columns' => esc_html__( 'Three Columns without Sidebar', 'maxwell' ),
		),
	) );

	// Add Blog Title setting and control.
	$wp_customize->add_setting( 'maxwell_theme_options[blog_title]', array(
		'default'           => '',
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'maxwell_theme_options[blog_title]', array(
		'label'    => esc_html__( 'Blog Title', 'maxwell' ),
		'section'  => 'maxwell_section_blog',
		'settings' => 'maxwell_theme_options[blog_title]',
		'type'     => 'text',
		'priority' => 20,
	) );

	$wp_customize->selective_refresh->add_partial( 'maxwell_theme_options[blog_title]', array(
		'selector'         => '.blog-header .blog-title',
		'render_callback'  => 'maxwell_customize_partial_blog_title',
		'fallback_refresh' => false,
	) );

	// Add Blog Description setting and control.
	$wp_customize->add_setting( 'maxwell_theme_options[blog_description]', array(
		'default'           => '',
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'maxwell_theme_options[blog_description]', array(
		'label'    => esc_html__( 'Blog Description', 'maxwell' ),
		'section'  => 'maxwell_section_blog',
		'settings' => 'maxwell_theme_options[blog_description]',
		'type'     => 'textarea',
		'priority' => 30,
	) );

	$wp_customize->selective_refresh->add_partial( 'maxwell_theme_options[blog_description]', array(
		'selector'         => '.blog-header .blog-description',
		'render_callback'  => 'maxwell_customize_partial_blog_description',
		'fallback_refresh' => false,
	) );

	// Add Magazine Widgets Headline.
	$wp_customize->add_control( new Maxwell_Customize_Header_Control(
		$wp_customize, 'maxwell_theme_options[blog_magazine_widgets_title]', array(
			'label'    => esc_html__( 'Magazine Widgets', 'maxwell' ),
			'section'  => 'maxwell_section_blog',
			'settings' => array(),
			'priority' => 40,
		)
	) );

	// Add Setting and Control for Magazine widgets.
	$wp_customize->add_setting( 'maxwell_theme_options[blog_magazine_widgets]', array(
		'default'           => true,
		'type'              => 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'maxwell_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'maxwell_theme_options[blog_magazine_widgets]', array(
		'label'    => esc_html__( 'Display Magazine widgets on blog index', 'maxwell' ),
		'section'  => 'maxwell_section_blog',
		'settings' => 'maxwell_theme_options[blog_magazine_widgets]',
		'type'     => 'checkbox',
		'priority' => 50,
	) );
}
add_action( 'customize_register', 'maxwell_customize_register_blog_settings' );

/**
 * Render the blog title for the selective refresh partial.
 */
function maxwell_customize_partial_blog_title() {
	$theme_options = maxwell_theme_options();
	echo wp_kses_post( $theme_options['blog_title'] );
}

/**
 * Render the blog description for the selective refresh partial.
 */
function maxwell_customize_partial_blog_description() {
	$theme_options = maxwell_theme_options();
	echo wp_kses_post( $theme_options['blog_description'] );
}
