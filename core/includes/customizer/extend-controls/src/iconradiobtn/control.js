import IconRadioButtonComponent from "./iconradiobtn-component";

export const responsiveIconRadioButton = wp.customize.responsiveControl.extend({
    renderContent: function renderContent() {
        let control = this;
        ReactDOM.render(<IconRadioButtonComponent control={control} />, control.container[0]);
    }
});