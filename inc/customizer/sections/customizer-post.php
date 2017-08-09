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
 * @param object $wp_customize / Customizer Object.
 */
function maxwell_customize_register_post_settings( $wp_customize ) {

	// Add Sections for Post Settings.
	$wp_customize->add_section( 'maxwell_section_post', array(
		'title'    => esc_html__( 'Post Settings', 'maxwell' ),
		'priority' => 30,
		'panel' => 'maxwell_options_panel',
		)
	);

	// Add Setting and Control for Excerpt Length.
	$wp_customize->add_setting( 'maxwell_theme_options[excerpt_length]', array(
		'default'           => 20,
		'type'           	=> 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	) );

	$wp_customize->add_control( 'maxwell_theme_options[excerpt_length]', array(
		'label'    => esc_html__( 'Excerpt Length', 'maxwell' ),
		'section'  => 'maxwell_section_post',
		'settings' => 'maxwell_theme_options[excerpt_length]',
		'type'     => 'text',
		'priority' => 10,
	) );

	// Add Post Meta Settings.
	$wp_customize->add_setting( 'maxwell_theme_options[postmeta_headline]', array(
		'default'           => '',
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'esc_attr',
	) );

	$wp_customize->add_control( new Maxwell_Customize_Header_Control(
		$wp_customize, 'maxwell_theme_options[postmeta_headline]', array(
		'label' => esc_html__( 'Post Meta', 'maxwell' ),
		'section' => 'maxwell_section_post',
		'settings' => 'maxwell_theme_options[postmeta_headline]',
		'priority' => 20,
		)
	) );

	$wp_customize->add_setting( 'maxwell_theme_options[meta_date]', array(
		'default'           => true,
		'type'           	=> 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'maxwell_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'maxwell_theme_options[meta_date]', array(
		'label'    => esc_html__( 'Display post date', 'maxwell' ),
		'section'  => 'maxwell_section_post',
		'settings' => 'maxwell_theme_options[meta_date]',
		'type'     => 'checkbox',
		'priority' => 30,
	) );

	$wp_customize->add_setting( 'maxwell_theme_options[meta_category]', array(
		'default'           => true,
		'type'           	=> 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'maxwell_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'maxwell_theme_options[meta_category]', array(
		'label'    => esc_html__( 'Display post categories', 'maxwell' ),
		'section'  => 'maxwell_section_post',
		'settings' => 'maxwell_theme_options[meta_category]',
		'type'     => 'checkbox',
		'priority' => 40,
	) );

	// Add Single Post Settings.
	$wp_customize->add_setting( 'maxwell_theme_options[single_post_headline]', array(
		'default'           => '',
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'esc_attr',
	) );

	$wp_customize->add_control( new Maxwell_Customize_Header_Control(
		$wp_customize, 'maxwell_theme_options[single_post_headline]', array(
			'label'    => esc_html__( 'Single Posts', 'maxwell' ),
			'section'  => 'maxwell_section_post',
			'settings' => 'maxwell_theme_options[single_post_headline]',
			'priority' => 50,
		)
	) );

	$wp_customize->add_setting( 'maxwell_theme_options[meta_author]', array(
		'default'           => true,
		'type'           	=> 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'maxwell_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'maxwell_theme_options[meta_author]', array(
		'label'    => esc_html__( 'Display post author on single posts', 'maxwell' ),
		'section'  => 'maxwell_section_post',
		'settings' => 'maxwell_theme_options[meta_author]',
		'type'     => 'checkbox',
		'priority' => 60,
	) );

	$wp_customize->add_setting( 'maxwell_theme_options[meta_tags]', array(
		'default'           => true,
		'type'           	=> 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'maxwell_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'maxwell_theme_options[meta_tags]', array(
		'label'    => esc_html__( 'Display post tags on single posts', 'maxwell' ),
		'section'  => 'maxwell_section_post',
		'settings' => 'maxwell_theme_options[meta_tags]',
		'type'     => 'checkbox',
		'priority' => 70,
	) );

	$wp_customize->add_setting( 'maxwell_theme_options[post_navigation]', array(
		'default'           => true,
		'type'           	=> 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'maxwell_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'maxwell_theme_options[post_navigation]', array(
		'label'    => esc_html__( 'Display post navigation on single posts', 'maxwell' ),
		'section'  => 'maxwell_section_post',
		'settings' => 'maxwell_theme_options[post_navigation]',
		'type'     => 'checkbox',
		'priority' => 80,
	) );

	// Add Featured Images Headline.
	$wp_customize->add_control( new Maxwell_Customize_Header_Control(
		$wp_customize, 'maxwell_theme_options[featured_images]', array(
		'label'    => esc_html__( 'Featured Images', 'maxwell' ),
		'section'  => 'maxwell_section_post',
		'settings' => array(),
		'priority' => 90,
		)
	) );

	// Add Setting and Control for featured images on blog and archives.
	$wp_customize->add_setting( 'maxwell_theme_options[post_image_archives]', array(
		'default'           => true,
		'type'           	=> 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'maxwell_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'maxwell_theme_options[post_image_archives]', array(
		'label'    => esc_html__( 'Display on blog and archives', 'maxwell' ),
		'section'  => 'maxwell_section_post',
		'settings' => 'maxwell_theme_options[post_image_archives]',
		'type'     => 'checkbox',
		'priority' => 100,
	) );

	// Add Setting and Control for featured images on single posts.
	$wp_customize->add_setting( 'maxwell_theme_options[post_image_single]', array(
		'default'           => true,
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'maxwell_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'maxwell_theme_options[post_image_single]', array(
		'label'    => esc_html__( 'Display on single posts', 'maxwell' ),
		'section'  => 'maxwell_section_post',
		'settings' => 'maxwell_theme_options[post_image_single]',
		'type'     => 'checkbox',
		'priority' => 110,
	) );

	// Add Partial for Excerpt Length and Post Images on blog and archives.
	$wp_customize->selective_refresh->add_partial( 'maxwell_blog_layout_partial', array(
		'selector'         => '.site-main .post-wrapper',
		'settings'         => array(
			'maxwell_theme_options[excerpt_length]',
			'maxwell_theme_options[post_image_archives]',
		),
		'render_callback'  => 'maxwell_customize_partial_blog_layout',
		'fallback_refresh' => false,
	) );

}
add_action( 'customize_register', 'maxwell_customize_register_post_settings' );

/**
 * Render the blog layout for the selective refresh partial.
 */
function maxwell_customize_partial_blog_layout() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content' );
	}
}
