import PropTypes from "prop-types";

const PaletteColorPicker = props => {

    return (
        <div className="responsive-color-picker-btn-wrap" tabIndex="0">
            <span className="component-color-indicator responsive-color-palette-indicate" style={{ background: props.colorsPicks.accent }}></span>
            <span className="component-color-indicator responsive-color-palette-indicate" style={{ background: props.colorsPicks.text }}></span>
            <span className="component-color-indicator responsive-color-palette-indicate" style={{ background: props.colorsPicks.background }}></span>
        </div>
    );
};

PaletteColorPicker.propTypes = {
	control: PropTypes.object.isRequired
};

export default React.memo(PaletteColorPicker);