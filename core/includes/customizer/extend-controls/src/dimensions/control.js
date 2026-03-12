import DimensionsComponent from './dimensions-component.js';


export const responsiveDimensions = wp.customize.responsiveControl.extend( {
	renderContent: function renderContent() {
		let control = this;
	ReactDOM.render( <DimensionsComponent control={ control } />, control.container[0] );
	},
	ready: function() {

        'use strict';

        var control = this;

    },
} );
