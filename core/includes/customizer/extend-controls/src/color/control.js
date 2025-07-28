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
			jQuery('.responsive-color-picker-tab-content').on('click', function( event ){
        	    event.preventDefault();
        	});

			if (!colorWrap.is(e.target) && colorWrap.has(e.target).length === 0 ){
				container.find('button.wp-color-result.wp-picker-open').click();
			}

		});
	}
} );
