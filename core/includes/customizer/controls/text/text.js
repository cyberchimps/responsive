/**
 * Text JS
 *
 * @package Responsive WordPress theme
 *
 * This file includes several helper functions and the core control JS.
 */

wp.customize.controlConstructor['responsive-text'] = wp.customize.Control.extend(
	{

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

		}

	}
);
