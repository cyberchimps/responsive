import BuilderComponent from './builder-component.js';

export const BuilderControl = wp.customize.responsiveControl.extend( {
	renderContent: function renderContent() {
		let control = this;
		ReactDOM.render( <BuilderComponent control={ control } customizer={ wp.customize } />, control.container[0] );
	}
} );
