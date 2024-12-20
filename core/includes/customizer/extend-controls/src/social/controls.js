import ResponsiveSocialComponent from './social-component.js';

export const responsiveSocial = wp.customize.responsiveControl.extend( {
    renderContent: function renderContent() {
        let control = this;
        ReactDOM.render( <ResponsiveSocialComponent control={ control } />, control.container[0] );
    },
    // ready: function() {

	// 	'use strict';

	// 	let control = this;

	// 	// Set the sortable container.
	// 	control.sortableContainer = control.container.find( 'div.sortable' ).first();

	// 	// Init sortable.
	// 	control.sortableContainer.sortable({

	// 		// Update value when we stop sorting.
	// 		stop: function() {
	// 			control.updateValue();
	// 		}
	// 	})
	// },

	/**
	 * Updates the sorting list
	*/
	// updateValue: function() {

	// 	'use strict';

	// 	let control = this,
	// 	choices = control.params.choices,
	// 	newValue = [];

	// 	this.sortableContainer.find( '.responsive-social-item' ).each( function() {
    //         newValue.push( jQuery( this ).data( 'value' ) );
	// 	});

	// 	control.setting.set( newValue );
	// }
} );
