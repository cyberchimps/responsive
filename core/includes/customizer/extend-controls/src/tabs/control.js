import TabsComponent from "./tabs-component";

export const responsiveTabs = wp.customize.responsiveControl.extend({
	renderContent: function renderContent() {
		let control = this;
		ReactDOM.render(<TabsComponent control={control} />, control.container[0]);
	}
});