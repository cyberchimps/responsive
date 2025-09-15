import SectionToggle from "./section-toggle";

export const responsiveSectionToggle = wp.customize.responsiveControl.extend({
    renderContent: function renderContent() {
        let control = this;
        ReactDOM.render(<SectionToggle control={control} />, control.container[0]);
    }
});