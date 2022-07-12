/**
 * Customizer Controls JS
 *
 * Adds Javascript for Customizer Controls.
 *
 * @package Maxwell
 */

( function( wp, $ ) {

	// Based on https://make.xwp.co/2016/07/24/dependently-contextual-customizer-controls/
	wp.customize( 'custom_logo', function( setting ) {
		setting.bind( function( value ) {
			if ( '' !== value ) {
				// Set retina logo option to false when a new logo image is uploaded.
				wp.customize.instance( 'maxwell_theme_options[retina_logo]' ).set( false );
			}
		});

		var setupControl = function( control ) {
			var setActiveState, isDisplayed;
			isDisplayed = function() {
				return '' !== setting.get();
			};
			setActiveState = function() {
				control.active.set( isDisplayed() );
			};
			setActiveState();
			setting.bind( setActiveState );
			control.active.validate = isDisplayed;
		};
		wp.customize.control( 'maxwell_theme_options[retina_logo_title]', setupControl );
		wp.customize.control( 'maxwell_theme_options[retina_logo]', setupControl );
	} );

	// Excerpt Settings
	wp.customize( 'maxwell_theme_options[excerpt_use_more_tag]', function( value ) {
		const excerptUseMoreTagCallback = function( newVal ) {
			const excerptLengthControls = $('#customize-control-maxwell_theme_options-excerpt_length');
			true === newVal ? excerptLengthControls.hide() : excerptLengthControls.show();
		}
		excerptUseMoreTagCallback(value.get());
		value.bind( excerptUseMoreTagCallback );
	});

})( this.wp, jQuery );
