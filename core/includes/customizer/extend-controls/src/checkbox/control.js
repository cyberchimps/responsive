import CheckboxComponent from './checkbox-component.js';

export const responsiveCheckbox = wp.customize.responsiveControl.extend({
	renderContent: function renderContent() {
		let control = this;
		ReactDOM.render(<CheckboxComponent control={control} />, control.container[0]);
	}
});