import HorizontalSeparatorComponent from "./horizontal-separator-component";

export const responsiveHorizontalSeparator = wp.customize.responsiveControl.extend({
	renderContent: function renderContent() {
		let control = this;
		ReactDOM.render(<HorizontalSeparatorComponent control={control} />, control.container[0]);
	}
});