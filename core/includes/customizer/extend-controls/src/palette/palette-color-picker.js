import PropTypes from "prop-types";

const PaletteColorPicker = props => {

    const size = props.size || 'md';
    const indicatorSize = size === 'sm' ? 17 : size === 'lg' ? 26 : 12;
    const gapSize = size === 'sm' ? 4 : size === 'lg' ? 8 : 6;
    const indicatorStyle = {
        width: indicatorSize,
        height: indicatorSize,
        borderRadius: indicatorSize,
        display: 'inline-block'
    };
    const wrapStyle = {
        display: 'flex',
        alignItems: 'center',
        gap: gapSize
    };

    return (
        <div className="responsive-color-picker-btn-wrap" tabIndex="0" style={wrapStyle}>
            <span className="component-color-indicator responsive-color-palette-indicate" style={{ ...indicatorStyle, background: props.colorsPicks.accent }} title="Accent"></span>
            <span className="component-color-indicator responsive-color-palette-indicate" style={{ ...indicatorStyle, background: props.colorsPicks.link_hover }} title="Link Hover"></span>
            <span className="component-color-indicator responsive-color-palette-indicate" style={{ ...indicatorStyle, background: props.colorsPicks.text }} title="Text"></span>
            <span className="component-color-indicator responsive-color-palette-indicate" style={{ ...indicatorStyle, background: props.colorsPicks.header_text }} title="Headings"></span>
            <span className="component-color-indicator responsive-color-palette-indicate" style={{ ...indicatorStyle, background: props.colorsPicks.content_background }} title="Content Background"></span>
            <span className="component-color-indicator responsive-color-palette-indicate" style={{ ...indicatorStyle, background: props.colorsPicks.site_background }} title="Site Background"></span>
            <span className="component-color-indicator responsive-color-palette-indicate" style={{ ...indicatorStyle, background: props.colorsPicks.alt_background }} title="Alt Background"></span>
        </div>
    );
};

PaletteColorPicker.propTypes = {
    colorsPicks: PropTypes.object.isRequired,
    size: PropTypes.oneOf(['sm', 'md', 'lg'])
};

export default React.memo(PaletteColorPicker);