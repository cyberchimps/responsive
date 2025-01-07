import PropTypes from 'prop-types';
import { useState } from 'react';
import { __experimentalNumberControl as NumberControl, ToggleControl } from '@wordpress/components';
import { __ } from '@wordpress/i18n'

const ShadowComponent = props => {

    const [xAxis, setXAxis] = useState(props.control.settings['x_axis'].get())
    const [yAxis, setYAxis] = useState(props.control.settings['y_axis'].get())
    const [blur, setBlur] = useState(props.control.settings['blur'].get())
    const [spread, setSpread] = useState(props.control.settings['spread'].get())
    const [inset, setInset] = useState(props.control.settings['inset'].get())

    const {
        label,
        name,
        description,
        id
    } = props.control.params;

    let htmlLabel = null;
    let descriptionHtml = null;

    if (label) {
        htmlLabel = <label htmlFor={id} className="customize-control-title">{label}</label>;
    }

    if (description) {
        descriptionHtml = <i className="res-control-tooltip dashicons dashicons-editor-help" title={description}></i>;
    }

    return <>
        <div className="responsive-shadow-controls-container">
            {htmlLabel}
            <div className="responsive-shadow-controls-wrapper">
                <div className="responsive-shadow-number-control">
                    <NumberControl
                        __next40pxDefaultSize
                        onChange={(xAxisValue) => {
                            console.log(xAxisValue)
                            props.control.settings['x_axis'].set(xAxisValue)
                        }}
                        value={xAxis}
                        label={__( 'X', 'responsive' )}
                        max={100}
                        min={-100}
                    />
                </div>
                <div className="responsive-shadow-number-control">
                    <NumberControl
                        __next40pxDefaultSize
                        onChange={(yAxisValue) => {
                            console.log(yAxisValue)
                            props.control.settings['y_axis'].set(yAxisValue)
                        }}
                        value={yAxis}
                        label={__( 'Y', 'responsive' )}
                        max={100}
                        min={-100}
                    />
                </div>
                <div className="responsive-shadow-number-control">
                    <NumberControl
                        __next40pxDefaultSize
                        onChange={(blurValue) => {
                            console.log(blurValue)
                            props.control.settings['blur'].set(blurValue)
                        }}
                        value={blur}
                        label={__( 'Blur', 'responsive' )}
                        max={100}
                        min={-100}
                    />
                </div>
                <div className="responsive-shadow-number-control">
                    <NumberControl
                        __next40pxDefaultSize
                        onChange={(spreadValue) => {
                            console.log(spreadValue);
                            props.control.settings['spread'].set(spreadValue)
                        }}
                        value={spread}
                        label={__( 'Spread', 'responsive' )}
                        max={100}
                        min={-100}
                    />
                </div>
            </div>
            <div className="responsive-shadow-controls-wrapper">
                <div className="responsive-shadow-inset-control">
                    <ToggleControl
                        __nextHasNoMarginBottom
                        label={__('Inset', 'responsive')}
                        checked={inset}
                        onChange={(newValue) => {
                            console.log(newValue);
                            setInset(!inset);
                            props.control.settings['inset'].set(!inset)
                        }}
                    />
                </div>
            </div>
        </div>
    </>;

};

ShadowComponent.propTypes = {
    control: PropTypes.object.isRequired
};

export default React.memo(ShadowComponent);
