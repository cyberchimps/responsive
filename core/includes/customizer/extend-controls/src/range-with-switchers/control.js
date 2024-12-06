import ResponsiveRangeWithSwitchersComponent from './range-component.js';

export const responsiveRangeWithSwitcher = wp.customize.responsiveControl.extend( {
	renderContent: function renderContent() {
		let control = this;
		ReactDOM.render( <ResponsiveRangeWithSwitchersComponent control={ control } />, control.container[0] );
	},
        // When we're finished loading continue processing.
		ready: function() {

			'use strict';

			var control = this;

			// Save the values.
			control.container.on(
				'change keyup paste',
				'.desktop input',
				function() {
					control.settings['desktop'].set( jQuery( this ).val() );
				}
			);

			control.container.on(
				'change keyup paste',
				'.tablet input',
				function() {
					control.settings['tablet'].set( jQuery( this ).val() );
				}
			);

			control.container.on(
				'change keyup paste',
				'.mobile input',
				function() {
					control.settings['mobile'].set( jQuery( this ).val() );
				}
			);
			control.container.on( 'click',
				'.responsive-switchers button',
				function( event ) {
                    event.stopPropagation();

					// Set up variables
					var $this 		= jQuery( this ),
						$devices 	= jQuery( '.responsive-switchers' ),
						$device 	= jQuery( event.currentTarget ).data( 'device' ),
						$control 	= jQuery( '.customize-control.has-switchers' ),
						$body 		= jQuery( '.wp-full-overlay' ),
						$footer_devices = jQuery( '.wp-full-overlay-footer .devices' );
			
					// Button class
					$devices.find( 'button' ).removeClass( 'active' );
					$devices.find( 'button.preview-' + $device ).addClass( 'active' );
			
					// Control class
					$control.find( '.control-wrap' ).removeClass( 'active' );
					$control.find( '.control-wrap.' + $device ).addClass( 'active' );
					$control.removeClass( 'control-device-desktop control-device-tablet control-device-mobile' ).addClass( 'control-device-' + $device );
			
					// Wrapper class
					$body.removeClass( 'preview-desktop preview-tablet preview-mobile' ).addClass( 'preview-' + $device );
			
					// Panel footer buttons
					$footer_devices.find( 'button' ).removeClass( 'active' ).attr( 'aria-pressed', false );
					$footer_devices.find( 'button.preview-' + $device ).addClass( 'active' ).attr( 'aria-pressed', true );
			
					// Open switchers
					if ( $this.hasClass( 'preview-desktop' ) ) {
						$control.toggleClass( 'responsive-switchers-open' );
					}
				} 
			);
		

		}
} );
