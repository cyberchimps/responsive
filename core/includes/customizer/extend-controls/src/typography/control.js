import TypographyComponent from './typography-component.js';

export const responsiveTypography = wp.customize.responsiveControl.extend({
	renderContent: function renderContent() {
		let control = this;
		ReactDOM.render(<TypographyComponent control={control} />, control.container[0]);
	},
	ready: function ready() {
		ResponsiveTypography.init();
	}
});