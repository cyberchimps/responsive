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
            <span className="component-color-indicator responsive-color-palette-indicate" style={{ ...indicatorStyle, background: props.colorsPicks.palette_1 }} title="Primary Accent"></span>
            <span className="component-color-indicator responsive-color-palette-indicate" style={{ ...indicatorStyle, background: props.colorsPicks.palette_2 }} title="Secondary Accent"></span>
            <span className="component-color-indicator responsive-color-palette-indicate" style={{ ...indicatorStyle, background: props.colorsPicks.palette_3 }} title="Primary Contrast"></span>
            <span className="component-color-indicator responsive-color-palette-indicate" style={{ ...indicatorStyle, background: props.colorsPicks.palette_4 }} title="Secondary Contrast"></span>
            <span className="component-color-indicator responsive-color-palette-indicate" style={{ ...indicatorStyle, background: props.colorsPicks.palette_5 }} title="Primary Background"></span>
            <span className="component-color-indicator responsive-color-palette-indicate" style={{ ...indicatorStyle, background: props.colorsPicks.palette_6 }} title="Secondary Background"></span>
            <span className="component-color-indicator responsive-color-palette-indicate" style={{ ...indicatorStyle, background: props.colorsPicks.palette_7 }} title="Alternate Background"></span>
            <span className="component-color-indicator responsive-color-palette-indicate" style={{ ...indicatorStyle, background: props.colorsPicks.palette_8 }} title="Primary Neutral"></span>
            <span className="component-color-indicator responsive-color-palette-indicate" style={{ ...indicatorStyle, background: props.colorsPicks.palette_9 }} title="Secondary Neutral"></span>
        </div>
    );
};

PaletteColorPicker.propTypes = {
    colorsPicks: PropTypes.object.isRequired,
    size: PropTypes.oneOf(['sm', 'md', 'lg'])
};

export default React.memo(PaletteColorPicker);