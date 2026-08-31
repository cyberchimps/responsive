import ColorComponentWithStatesAndDevices from './color-component-with-states-and-devices';

export const responsiveColorWithStatesAndDevices = wp.customize.responsiveControl.extend({
    renderContent: function renderContent() {
        let control = this;
        ReactDOM.render(
            <ColorComponentWithStatesAndDevices control={control} customizer={wp.customize} />,
            control.container[0]
        );
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

                event.preventDefault();
                event.stopPropagation();

                const $this = jQuery(this);
                const $control = $this.closest('.customize-control');
                const device = $this.data('device');
                const $body = jQuery('.wp-full-overlay');
                const $footer_devices = jQuery('.wp-full-overlay-footer .devices');

                const $switchers = $control.find('.responsive-switchers');
                const $wraps = $control.find('.control-wrap');

                // update switcher buttons
                $switchers.find('button').removeClass('active');
                $this.addClass('active');

                // update color panels
                $wraps.removeClass('active');
                $wraps.filter('.' + device).addClass('active');

                // Updating body class to resize preview screen
                $body
                    .removeClass('preview-desktop preview-tablet preview-mobile')
                    .addClass('preview-' + device);

                // Updating footer device buttons to stay in sync
                $footer_devices.find('button')
                    .removeClass('active')
                    .attr('aria-pressed', false);

                $footer_devices.find('button.preview-' + device)
                    .addClass('active')
                    .attr('aria-pressed', true);

                if ($this.hasClass('preview-desktop')) {
                    $control.toggleClass('responsive-switchers-open');
                }

                // Also trigger window resize event for any dependent scripts
                jQuery(window).trigger('resize');
            }
        );
    }
});