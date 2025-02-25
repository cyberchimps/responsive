import ShadowComponent from "./shadow-component";

export const responsiveShadow = wp.customize.responsiveControl.extend({
    renderContent: function renderContent() {
        let control = this;
        ReactDOM.render(<ShadowComponent control={control} />, control.container[0]);
    }
});