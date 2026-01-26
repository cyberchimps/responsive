import PropTypes from 'prop-types';
import { __ } from '@wordpress/i18n';
import { Component } from '@wordpress/element';
import { Button, ColorPicker } from '@wordpress/components';

class ResponsiveColorStatesPickerControl extends Component {
    constructor(props) {
        super(props);

        this.state = {
            activeState: 'normal', // normal | hover | active
            isVisible: false,
        };
    }

    getColorValue = (state) => {
        const { normal, hover, active } = this.props.colors || {};
        return state === 'hover'
            ? hover
            : state === 'active'
            ? active
            : normal;
    };

    onColorChange = (color) => {
        const { activeState } = this.state;
        this.props.onChange(color, activeState);
    };

    togglePicker = (state) => {
        this.setState((prev) => ({
            activeState: state,
            isVisible: prev.activeState === state ? !prev.isVisible : true,
        }));
    };

    renderStateButton = (state, label) => {
        const { activeState, isVisible } = this.state;
        const isActive = activeState === state && isVisible;

		
        return (
            <div className="responsive-state-btn-wrapper">
                <Button
                    className={`button wp-color-result ${isActive ? 'wp-picker-open' : ''}`}
                    style={{ backgroundColor: this.getColorValue(state) }}
                    onClick={() => this.togglePicker(state)}  
                />
                <span className="tooltip-text">{label}</span>
            </div>
        );
    };

    render() {
        const { activeState, isVisible } = this.state;

        return (
            <div className="wp-picker-container responsive-color-states">

                {/* STATE BUTTONS */}
                <div className="responsive-color-state-buttons">
                    {this.renderStateButton('normal', __('', 'responsive'))}
                    {this.renderStateButton('hover', __('', 'responsive'))}
                    {this.renderStateButton('active', __('', 'responsive'))}
                </div>

                {/* COLOR PICKER */}
                {isVisible && (
                    <div className="wp-picker-holder">
                        <ColorPicker
                            color={this.getColorValue(activeState)}
                            onChangeComplete={this.onColorChange}
                        />
                    </div>
                )}
            </div>
        );
    }
}

ResponsiveColorStatesPickerControl.propTypes = {
    colors: PropTypes.shape({
        normal: PropTypes.string,
        hover: PropTypes.string,
        active: PropTypes.string,
    }),
    onChange: PropTypes.func.isRequired,
};

export default ResponsiveColorStatesPickerControl;
