import BuilderComponent from './builder-component.js';

export const responsiveBuilderControl = wp.customize.responsiveControl.extend( {
	renderContent: function renderContent() {
		let control = this;
		console.log("Sending the control to react builder layout control: ", control);
		console.log("Control params: ", control.params);
		console.log("Customizer instance: ", wp.customize);
		ReactDOM.render( <BuilderComponent control={ control } customizer={ wp.customize } />, control.container[0] );
	}
} );