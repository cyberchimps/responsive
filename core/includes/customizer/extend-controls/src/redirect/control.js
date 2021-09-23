import RedirectComponent from './redirect-component.js';

export const responsiveRedirect = wp.customize.responsiveControl.extend({
	renderContent: function renderContent() {
		let control = this;
		ReactDOM.render(<RedirectComponent control={control} />, control.container[0]);
	}
});