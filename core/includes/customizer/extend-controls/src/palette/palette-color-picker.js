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
            <span className="component-color-indicator responsive-color-palette-indicate" style={{ ...indicatorStyle, background: props.colorsPicks.accent }} title="Accent Color (Link)"></span>
            <span className="component-color-indicator responsive-color-palette-indicate" style={{ ...indicatorStyle, background: props.colorsPicks.accent }} title="Link Hover Color"></span>
            <span className="component-color-indicator responsive-color-palette-indicate" style={{ ...indicatorStyle, background: props.colorsPicks.text }} title="Text Color"></span>
            <span className="component-color-indicator responsive-color-palette-indicate" style={{ ...indicatorStyle, background: props.colorsPicks.text }} title="Headings Text Color"></span>
            <span className="component-color-indicator responsive-color-palette-indicate" style={{ ...indicatorStyle, background: props.colorsPicks.background }} title="Content Background Color"></span>
            <span className="component-color-indicator responsive-color-palette-indicate" style={{ ...indicatorStyle, background: props.colorsPicks.alt_background }} title="Site Background Color"></span>
            <span className="component-color-indicator responsive-color-palette-indicate" style={{ ...indicatorStyle, background: props.colorsPicks.alt_background }} title="Alt Background Color"></span>
        </div>
    );
};

PaletteColorPicker.propTypes = {
    colorsPicks: PropTypes.object.isRequired,
    size: PropTypes.oneOf(['sm', 'md', 'lg'])
};

export default React.memo(PaletteColorPicker);