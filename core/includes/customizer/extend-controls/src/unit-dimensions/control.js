import UnitDimensionsComponent from './unit-dimensions-component.js';


export const responsiveUnitDimensions = wp.customize.responsiveControl.extend({
	renderContent: function renderContent() {
		let control = this;
		ReactDOM.render(<UnitDimensionsComponent control={control} />, control.container[0]);
	},
	ready: function () {

		'use strict';
		let control = this;
		jQuery(document).mouseup(function (e) {
			var container = jQuery(control.container);
			var colorWrap = container.find('.wp-picker-container');
			jQuery('.components-color-picker').on('click', function (event) {
				event.preventDefault();
			});
			// If the target of the click isn't the container nor a descendant of the container.
			if (!colorWrap.is(e.target) && colorWrap.has(e.target).length === 0) {
				container.find('button.wp-color-result.wp-picker-open').click();
			}
		});

		control.container.on(
			'click',
			'.responsive-switchers button',
			function (event) {
				event.stopPropagation();

				let $this = jQuery(this),
					$control = $this.closest('.customize-control'),
					$devices = $control.find('.responsive-switchers'),
					$device = $this.data('device'),
					$body = jQuery('.wp-full-overlay'),
					$footer_devices = jQuery('.wp-full-overlay-footer .devices');

				// Button class
				$devices.find('button').removeClass('active');
				$devices.find('button.preview-' + $device).addClass('active');

				// Control class (ONLY inside this control)
				$control.find('.control-wrap').removeClass('active');
				$control.find('.control-wrap.' + $device).addClass('active');

				$control
					.removeClass('control-device-desktop control-device-tablet control-device-mobile')
					.addClass('control-device-' + $device);

				// Wrapper class
				$body
					.removeClass('preview-desktop preview-tablet preview-mobile')
					.addClass('preview-' + $device);

				// Panel footer buttons
				$footer_devices.find('button')
					.removeClass('active')
					.attr('aria-pressed', false);

				$footer_devices.find('button.preview-' + $device)
					.addClass('active')
					.attr('aria-pressed', true);

				// Toggle switchers
				if ($this.hasClass('preview-desktop')) {
					$control.toggleClass('responsive-switchers-open');
				}
			}
		);

	},
});
