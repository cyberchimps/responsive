import HeadingComponent from './heading-component.js';

export const responsiveHeading = wp.customize.responsiveControl.extend({
	renderContent: function renderContent() {
		let control = this;
		ReactDOM.render(<HeadingComponent control={control} />, control.container[0]);
	}
});