<?php
/**
 * Add theme support for the Gutenberg Editor
 *
 * @package Maxwell
 */

/**
 * Registers support for various Gutenberg features.
 *
 * @return void
 */
function maxwell_gutenberg_support() {

	// Add theme support for dimension controls.
	add_theme_support( 'custom-spacing' );

	// Add theme support for custom line heights.
	add_theme_support( 'custom-line-height' );

	// Define block color palette.
	$color_palette = apply_filters(
		'maxwell_color_palette',
		array(
			'primary_color'    => '#33bbcc',
			'secondary_color'  => '#008899',
			'tertiary_color'   => '#005566',
			'accent_color'     => '#cc3833',
			'highlight_color'  => '#009912',
			'light_gray_color' => '#f0f0f0',
			'gray_color'       => '#999999',
			'dark_gray_color'  => '#303030',
		)
	);

	// Add theme support for block color palette.
	add_theme_support(
		'editor-color-palette',
		apply_filters(
			'maxwell_editor_color_palette_args',
			array(
				array(
					'name'  => esc_html_x( 'Primary', 'block color', 'maxwell' ),
					'slug'  => 'primary',
					'color' => esc_html( $color_palette['primary_color'] ),
				),
				array(
					'name'  => esc_html_x( 'Secondary', 'block color', 'maxwell' ),
					'slug'  => 'secondary',
					'color' => esc_html( $color_palette['secondary_color'] ),
				),
				array(
					'name'  => esc_html_x( 'Tertiary', 'block color', 'maxwell' ),
					'slug'  => 'tertiary',
					'color' => esc_html( $color_palette['tertiary_color'] ),
				),
				array(
					'name'  => esc_html_x( 'Accent', 'block color', 'maxwell' ),
					'slug'  => 'accent',
					'color' => esc_html( $color_palette['accent_color'] ),
				),
				array(
					'name'  => esc_html_x( 'Highlight', 'block color', 'maxwell' ),
					'slug'  => 'highlight',
					'color' => esc_html( $color_palette['highlight_color'] ),
				),
				array(
					'name'  => esc_html_x( 'White', 'block color', 'maxwell' ),
					'slug'  => 'white',
					'color' => '#ffffff',
				),
				array(
					'name'  => esc_html_x( 'Light Gray', 'block color', 'maxwell' ),
					'slug'  => 'light-gray',
					'color' => esc_html( $color_palette['light_gray_color'] ),
				),
				array(
					'name'  => esc_html_x( 'Gray', 'block color', 'maxwell' ),
					'slug'  => 'gray',
					'color' => esc_html( $color_palette['gray_color'] ),
				),
				array(
					'name'  => esc_html_x( 'Dark Gray', 'block color', 'maxwell' ),
					'slug'  => 'dark-gray',
					'color' => esc_html( $color_palette['dark_gray_color'] ),
				),
				array(
					'name'  => esc_html_x( 'Black', 'block color', 'maxwell' ),
					'slug'  => 'black',
					'color' => '#000000',
				),
			)
		)
	);

	// Check if block style functions are available.
	if ( function_exists( 'register_block_style' ) ) {

		// Register Widget Title Block style.
		register_block_style(
			'core/heading',
			array(
				'name'         => 'widget-title',
				'label'        => esc_html__( 'Widget Title', 'maxwell' ),
				'style_handle' => 'maxwell-stylesheet',
			)
		);
	}
}
add_action( 'after_setup_theme', 'maxwell_gutenberg_support' );


/**
 * Enqueue block styles and scripts for Gutenberg Editor.
 */
function maxwell_block_editor_assets() {

	// Enqueue Editor Styling.
	wp_enqueue_style( 'maxwell-editor-styles', get_theme_file_uri( '/assets/css/editor-styles.css' ), array(), '20210306', 'all' );
}
add_action( 'enqueue_block_editor_assets', 'maxwell_block_editor_assets' );
