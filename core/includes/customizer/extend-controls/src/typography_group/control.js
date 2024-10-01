import TypographyGroupControlComponent from "./typography-group-component";

export const responsiveTypographyGroup = wp.customize.responsiveControl.extend({
	renderContent: function renderContent() {
		let control = this;
		ReactDOM.render(<TypographyGroupControlComponent control={control} />, control.container[0]);
	}
});