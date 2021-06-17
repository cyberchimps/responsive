import PaletteComponent from './palette-component.js';

export const responsivePalette = wp.customize.responsiveControl.extend({
	renderContent: function renderContent() {
		let control = this;
		ReactDOM.render(<PaletteComponent control={control} />, control.container[0]);
	}
});