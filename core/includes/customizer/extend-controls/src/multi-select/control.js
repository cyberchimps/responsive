import MultiSelectControlComponent from "./multi-select-component";

export const responsiveMultiSelectControl = wp.customize.responsiveControl.extend({
	renderContent: function renderContent() {
		let control = this;
		ReactDOM.render(<MultiSelectControlComponent control={control} />, control.container[0]);
	}
});