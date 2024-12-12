import AvailableItemsDrag from './available-drag-component.js';

export const responsiveAvailableItemsDragControl = wp.customize.responsiveControl.extend( {
	renderContent: function renderContent() {
		let control = this;
		ReactDOM.render( <AvailableItemsDrag control={ control } customizer={ wp.customize } />, control.container[0] );
	}
} );