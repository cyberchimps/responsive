import RowLayout from './row-layout-component.js';

export const responsiveRowLayout = wp.customize.responsiveControl.extend({
	renderContent: function renderContent() {
		let control = this;
		ReactDOM.render(<RowLayout control={control} customizer={ wp.customize } />, control.container[0]);
	}
});