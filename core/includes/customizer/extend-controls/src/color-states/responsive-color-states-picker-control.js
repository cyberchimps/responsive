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
            opacityZero: false,
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
        const opacity = this.extractOpacity(color);
        this.setState({ opacityZero: opacity === 0 });
        this.props.onChange(color, activeState);
    };

    togglePicker = (state) => {
        this.setState((prev) => ({
            activeState: state,
            isVisible: prev.activeState === state ? !prev.isVisible : true,
        }));
    };

    onDefaultClick = () => {
        const { activeState } = this.state;
        const { defaultValues } = this.props;
        let defaultColor = '';

        if (defaultValues && typeof defaultValues === 'object') {
            defaultColor = defaultValues[activeState] || '';
        }

        this.onColorChange(defaultColor);
    };

    renderStateButton = (state, label) => {
        const { activeState, isVisible } = this.state;
        const isActive = activeState === state && isVisible;

		
        return (
            <div className="responsive-state-btn-wrapper tooltip-container">
                <Button
                    className={`button wp-color-result ${isActive ? 'wp-picker-open' : ''}`}
                    style={{ backgroundColor: this.getColorValue(state) }}
                    onClick={() => this.togglePicker(state)}  
                />
                <span className="tooltip-text">{state}</span>
            </div>
        );
    };
    extractOpacity = (color) => {
        if (!color) return 1;

        if (typeof color === 'string') {
            if (color === 'transparent') return 0;

            const rgbaMatch = color.match(
                /rgba\(\s*\d+,\s*\d+,\s*\d+,\s*(\d*\.?\d+)\s*\)/
            );
            return rgbaMatch ? parseFloat(rgbaMatch[1]) : 1;
        }

        if (typeof color === 'object' && color.rgb && color.rgb.a !== undefined) {
            return color.rgb.a;
        }

        return 1;
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
                        {this.state.opacityZero && (
                            <div className="responsive-color-picker-zero-opac">
                                <strong>{__('Note: ', 'responsive')}</strong>
                                {__('Opacity is set to zero. Increase it to make the color visible.', 'responsive')}
                            </div>
                        )}
                        <Button
                            type="button"
                            onClick={this.onDefaultClick}
                            className="responsive-clear-btn-inside-picker components-button is-secondary is-small"
                        >
                            {__('Default', 'responsive')}
                        </Button>
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
    defaultValues: PropTypes.oneOfType([
        PropTypes.shape({
            normal: PropTypes.string,
            hover: PropTypes.string,
            active: PropTypes.string,
        }),
        PropTypes.string,
    ]),
    onChange: PropTypes.func.isRequired,
};

export default ResponsiveColorStatesPickerControl;
