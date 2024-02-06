import SelectButtonComponent from "./selectbtn-component";

export const responsiveSelectButton = wp.customize.responsiveControl.extend({
	renderContent: function renderContent() {
		let control = this;
		ReactDOM.render(<SelectButtonComponent control={control} />, control.container[0]);
	}
});