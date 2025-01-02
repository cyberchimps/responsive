import ResponsiveSocialComponent from './social-component.js';

export const responsiveSocial = wp.customize.responsiveControl.extend( {
    renderContent: function renderContent() {
        let control = this;
        ReactDOM.render( <ResponsiveSocialComponent control={ control } />, control.container[0] );
    },
} );
