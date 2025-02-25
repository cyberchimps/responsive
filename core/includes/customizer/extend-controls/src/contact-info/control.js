import ContactInfoComponent from './contact-info-component';
export const responsiveContactInfo = wp.customize.responsiveControl.extend({
    renderContent: function renderContent() {
        let control = this;
        ReactDOM.render(<ContactInfoComponent control={control} />, control.container[0]);
    }
});