// import HorizontalSeparatorComponent from "./horizontal-separator-component";
import HtmlComponent from './html-component';

export const responsiveHtml = wp.customize.responsiveControl.extend({
    renderContent: function renderContent() {
        let control = this;
        ReactDOM.render(<HtmlComponent control={control} />, control.container[0]);
    }
});