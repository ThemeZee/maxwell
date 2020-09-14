<?php
/**
 * Main Navigation
 *
 * @version 1.1
 * @package Maxwell
 */
?>

<?php if ( has_nav_menu( 'primary' ) ) : ?>

	<div id="main-navigation-wrap" class="primary-navigation-wrap">

		<?php do_action( 'maxwell_header_search' ); ?>

		<button class="primary-menu-toggle menu-toggle" aria-controls="primary-menu" aria-expanded="false" <?php maxwell_amp_menu_toggle(); ?>>
			<?php
			echo maxwell_get_svg( 'menu' );
			echo maxwell_get_svg( 'close' );
			?>
			<span class="menu-toggle-text"><?php esc_html_e( 'Navigation', 'maxwell' ); ?></span>
		</button>

		<div class="primary-navigation">

			<nav id="site-navigation" class="main-navigation" role="navigation" <?php maxwell_amp_menu_is_toggled(); ?> aria-label="<?php esc_attr_e( 'Primary Menu', 'maxwell' ); ?>">

				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'primary',
						'menu_id'        => 'primary-menu',
						'container'      => false,
					)
				);
				?>
			</nav><!-- #site-navigation -->

		</div><!-- .primary-navigation -->

	</div>

<?php endif; ?>

<?php do_action( 'maxwell_after_navigation' ); ?>
