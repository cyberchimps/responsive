import FlushFontsComponent from './flush-fonts-component.js';

export const responsiveFlushFonts = wp.customize.responsiveControl.extend({
    renderContent: function renderContent() {
        let control = this;
        ReactDOM.render(<FlushFontsComponent control={control} />, control.container[0]);
    }
});


