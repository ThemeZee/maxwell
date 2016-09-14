<?php
/**
 * Custom Controls for the Customizer
 *
 * @package Maxwell
 */

/**
 * Make sure that custom controls are only defined in the Customizer
 */
if ( class_exists( 'WP_Customize_Control' ) ) :

	/**
	 * Displays a bold label text. Used to create headlines for radio buttons and description sections.
	 */
	class Maxwell_Customize_Header_Control extends WP_Customize_Control {
		/**
		 * Render Control
		 */
		public function render_content() {
			?>

			<label>
				<span class="customize-control-title"><?php echo wp_kses_post( $this->label ); ?></span>
			</label>

			<?php
		}
	}

	/**
	 * Displays a description text in gray italic font
	 */
	class Maxwell_Customize_Description_Control extends WP_Customize_Control {
		/**
		 * Render Control
		 */
		public function render_content() {
			?>

			<span class="description"><?php echo wp_kses_post( $this->label ); ?></span>

			<?php
		}
	}

	/**
	 * Creates a category dropdown control for the Customizer
	 */
	class Maxwell_Customize_Category_Dropdown_Control extends WP_Customize_Control {
		/**
		 * Render Control
		 */
		public function render_content() {

			$categories = get_categories( array( 'hide_empty' => false ) );

			if ( ! empty( $categories ) ) : ?>

					<label>

						<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>

						<select <?php $this->link(); ?>>
							<option value="0"><?php esc_html_e( 'All Categories', 'maxwell' ); ?></option>
						<?php
						foreach ( $categories as $category ) :

							printf(	'<option value="%s" %s>%s</option>',
								$category->term_id,
								selected( $this->value(), $category->term_id, false ),
								$category->name . ' (' . $category->count . ')'
							);

							endforeach;
						?>
						</select>

					</label>

				<?php
			endif;

		}
	}

	/**
	 * Displays the theme links in the Theme Info section.
	 */
	class Maxwell_Customize_Theme_Links_Control extends WP_Customize_Control {
		/**
		 * Render Control
		 */
		public function render_content() {
			?>

			<div class="theme-links">

				<span class="customize-control-title"><?php esc_html_e( 'Theme Links', 'maxwell' ); ?></span>

				<p>
					<a href="<?php echo esc_url( __( 'https://themezee.com/themes/maxwell/', 'maxwell' ) ); ?>?utm_source=customizer&utm_medium=textlink&utm_campaign=maxwell&utm_content=theme-page" target="_blank">
						<?php esc_html_e( 'Theme Page', 'maxwell' ); ?>
					</a>
				</p>

				<p>
					<a href="http://preview.themezee.com/maxwell/?utm_source=theme-info&utm_medium=textlink&utm_campaign=maxwell&utm_content=demo" target="_blank">
						<?php esc_html_e( 'Theme Demo', 'maxwell' ); ?>
					</a>
				</p>

				<p>
					<a href="<?php echo esc_url( __( 'https://themezee.com/docs/maxwell-documentation/', 'maxwell' ) ); ?>?utm_source=customizer&utm_medium=textlink&utm_campaign=maxwell&utm_content=documentation" target="_blank">
						<?php esc_html_e( 'Theme Documentation', 'maxwell' ); ?>
					</a>
				</p>

				<p>
					<a href="<?php echo esc_url( __( 'https://wordpress.org/support/theme/maxwell/reviews/?filter=5', 'maxwell' ) ); ?>" target="_blank">
						<?php esc_html_e( 'Rate this theme', 'maxwell' ); ?>
					</a>
				</p>

			</div>

			<?php
		}
	}

	/**
	 * Displays the upgrade teasers in thhe Pro Version / More Features section.
	 */
	class Maxwell_Customize_Pro_Version_Control extends WP_Customize_Control {
		/**
		 * Render Control
		 */
		public function render_content() {
			?>

			<div class="pro-version">

				<span class="customize-control-title"><?php esc_html_e( 'Pro Version Add-on', 'maxwell' ); ?></span>

				<span class="textfield">
					<?php printf( esc_html__( 'Purchase the %s Pro Add-on and get additional features and advanced customization options.', 'maxwell' ), 'Maxwell' ); ?>
				</span>

				<p>
					<a href="<?php echo esc_url( __( 'https://themezee.com/addons/maxwell-pro/', 'maxwell' ) ); ?>?utm_source=customizer&utm_medium=button&utm_campaign=maxwell&utm_content=pro-version" target="_blank" class="button button-secondary">
						<?php printf( esc_html__( 'Learn more about %s Pro', 'maxwell' ), 'Maxwell' ); ?>
					</a>
				</p>

			</div>

			<?php
		}
	}

	/**
	 * Displays the upgrade teasers in thhe Pro Version / More Features section.
	 */
	class Maxwell_Customize_Recommended_Plugins_Control extends WP_Customize_Control {
		/**
		 * Render Control
		 */
		public function render_content() {
			?>

			<div class="recommended-plugins">

				<span class="customize-control-title"><?php esc_html_e( 'Recommended Plugins', 'maxwell' ); ?></span>

				<span class="textfield">
					<?php esc_html_e( 'Extend the functionality of your WordPress website with our free and easy to use plugins.', 'maxwell' ); ?>
				</span>

				<p>
					<a href="<?php echo admin_url( 'plugin-install.php?tab=search&type=author&s=themezee' ); ?>" class="button button-secondary">
						<?php esc_html_e( 'View Recommended Plugins', 'maxwell' ); ?>
					</a>
				</p>

			</div>

			<?php
		}
	}

endif;
