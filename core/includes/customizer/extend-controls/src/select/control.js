import SelectComponent from './select-component.js';

export const responsiveSelect = wp.customize.responsiveControl.extend({
	renderContent: function renderContent() {
		let control = this;
		ReactDOM.render(<SelectComponent control={control} />, control.container[0]);
	}
});