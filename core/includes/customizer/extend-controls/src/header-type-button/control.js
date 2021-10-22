import HeaderTypeButtonComponent from './header-type-button-component';

export const HeaderTypeButtonControl = wp.customize.responsiveControl.extend( {
	renderContent: function renderContent() {
		let control = this;
		ReactDOM.render( <HeaderTypeButtonComponent control={ control } customizer={ wp.customize } />, control.container[0] );
	}
} );
