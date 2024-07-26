import ImageRadioButtonComponent from "./imageradiobtn-component";

export const responsiveImageRadioButton = wp.customize.responsiveControl.extend({
	renderContent: function renderContent() {
		let control = this;
		ReactDOM.render(<ImageRadioButtonComponent control={control} />, control.container[0]);
	}
});