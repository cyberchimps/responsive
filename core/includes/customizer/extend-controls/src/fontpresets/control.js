import FontPresetComponent from './fontpreset-component';

export const responsiveFontPreset = wp.customize.responsiveControl.extend({
	renderContent: function renderContent() {
		let control = this;
		ReactDOM.render(<FontPresetComponent control={control} />, control.container[0]);
	}
});