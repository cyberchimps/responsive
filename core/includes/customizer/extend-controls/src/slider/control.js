import ResponsiveSliderComponent from './slider-component.js';

export const responsiveSlider = wp.customize.responsiveControl.extend( {
	renderContent: function renderContent() {
		let control = this;
		ReactDOM.render( <ResponsiveSliderComponent control={ control } />, control.container[0] );
	}
} );
