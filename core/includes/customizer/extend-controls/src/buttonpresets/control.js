import ButtonPresetComponent from './buttonpreset-component';

export const responsiveButtonPreset = wp.customize.responsiveControl.extend({
	renderContent: function renderContent() {
		let control = this;
		ReactDOM.render(<ButtonPresetComponent control={control} />, control.container[0]);
	}
});
