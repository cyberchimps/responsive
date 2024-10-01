import ResponsiveBackgroundImageComponent from "./responsive-backgound-image-component";

export const responsiveBackgroundImage = wp.customize.responsiveControl.extend({
	renderContent: function renderContent() {
		let control = this;
		ReactDOM.render(<ResponsiveBackgroundImageComponent control={control} />, control.container[0]);
	}
});