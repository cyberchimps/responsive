import InputWithDropdown from './input-with-dropdown';
export const responsiveInputWithDropdown = wp.customize.responsiveControl.extend( {
	renderContent: function renderContent() {
		let control = this;
		ReactDOM.render( <InputWithDropdown control={ control } />, control.container[0] );
	}
} );