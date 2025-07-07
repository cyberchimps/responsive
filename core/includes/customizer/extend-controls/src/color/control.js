import ColorComponent from './color-component';

export const responsiveColor = wp.customize.responsiveControl.extend({
	renderContent: function renderContent() {
		let control = this;
		ReactDOM.render(
			<ColorComponent control={control} customizer={wp.customize} />,
			control.container[0]
		);
	},
	ready: function () {
		'use strict';
		let control = this;
		jQuery(document).mouseup(function (e) {
			var container = jQuery(control.container);
	        var colorWrap = container.find('.wp-picker-container');

			jQuery('.components-color-picker').on('click', function( event ){
        	    event.preventDefault(); // Keep if this prevents other unwanted actions
        	});

			const excludeFromCloseSelectors = [
				'.responsive-color-picker-tab-content',
				'.components-popover__fallback-container',          // General popover content, covers many WP components popovers
				'.components-color-palette__custom-color-dropdown-content',              // The actual color picker UI within popovers
				'.components-popover__content', // Sliders within the gradient picker popover
				'.components-dropdown-content-wrapper',  // A common wrapper for dropdown content
				'.components-color-picker',  // For hex/rgba input fields inside pickers
				'.react-colorful',
			];

			var excludeElements = jQuery(excludeFromCloseSelectors.join(', '));

			if (
				!(colorWrap.is(e.target) || colorWrap.has(e.target).length > 0) &&
				!(excludeElements.is(e.target) || excludeElements.has(e.target).length > 0)
			) {
				// Only trigger the close if the click is truly outside all relevant picker UI
				// and its associated floating popovers.
				container.find('button.wp-color-result.wp-picker-open').click();
			}

		});
	}
} );
