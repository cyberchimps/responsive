import ToggleComponent from "./toggle-component";

export const responsiveToggle = wp.customize.responsiveControl.extend({
	renderContent: function renderContent() {
		let control = this;
		ReactDOM.render(<ToggleComponent control={control} />, control.container[0]);
	}
});