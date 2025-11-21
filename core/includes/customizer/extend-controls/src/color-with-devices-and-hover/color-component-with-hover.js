import PropTypes from 'prop-types';
import ColorPickerControlWithDevices from '../color-with-devices/color-picker-control';
import {useState} from 'react';

const ColorComponentWithDevicesAndHover = props => {

    const [props_value, setPropsValue] = useState( props.control.settings );

	const updateColors = (device, value) => {
        let updateColor = {...props_value};
		updateColor[`${device}`].set(value);
		setPropsValue(updateColor);
	};
	const handleChangeComplete = ( device, color ) => {
		let value;
		if (typeof color === 'string' || color instanceof String) {
			value = color;
		} else if (undefined !== color.rgb && undefined !== color.rgb.a && 1 !== color.rgb.a) {
			value = 'rgba(' + color.rgb.r + ',' + color.rgb.g + ',' + color.rgb.b + ',' + color.rgb.a + ')';
		} else {
			value = color.hex;
		}

		updateColors(device, value);
	};

    let labelHtml = null,
        inputHtml = null,
        htmlDescription = null;

	const {
		label,
		description,
	} = props.control.params;

	if (label) {
		labelHtml = <span className="customize-control-title">
			<span>{label}</span>
			<ul  className="responsive-switchers">
				<li className="desktop">
					<button type="button" className="preview-desktop active" data-device="desktop">
						<i className="dashicons dashicons-desktop"></i>
					</button>
				</li>
				<li className="tablet">
					<button type="button" className="preview-tablet" data-device="tablet">
						<i className="dashicons dashicons-tablet"></i>
					</button>
				</li>
				<li className="mobile">
					<button type="button" className="preview-mobile" data-device="mobile">
						<i className="dashicons dashicons-smartphone"></i>
					</button>
				</li>
			</ul>
		</span>;
	}
    if (description) {
        htmlDescription =  <i className="res-control-tooltip dashicons dashicons-editor-help" title={description}></i>;
    }

    const renderColorPicker = (device, active = '') => {

		return <div className={`${device} control-wrap ${active}`}>
			<div className="responsive-color-hover-wrapper">
				<div className="responsive-color-normal">
					{/* <label className="responsive-color-label">Normal</label> */}
					<ColorPickerControlWithDevices 
						color={undefined !== props_value[`${device}`].get() && props_value[`${device}`].get() ? props_value[`${device}`].get() : ''}
						onChangeComplete={(color) => handleChangeComplete(device, color)}
						backgroundType={'color'}
						inputattr={props.control.params}
						defaultValue = {props.control.params[`${device}`].default}
					/>
				</div>
				<div className="responsive-color-hover">
					{/* <label className="responsive-color-label">Hover</label> */}
					<ColorPickerControlWithDevices 
						color={undefined !== props_value[`${device}_hover`].get() && props_value[`${device}_hover`].get() ? props_value[`${device}_hover`].get() : ''}
						onChangeComplete={(color) => handleChangeComplete(`${device}_hover`, color)}
						backgroundType={'color'}
						inputattr={props.control.params}
						defaultValue = {props.control.params[`${device}_hover`].default}
					/>
				</div>
			</div>
        </div>
	};

    inputHtml = <>
        {renderColorPicker('desktop', 'active')}
        {renderColorPicker('tablet')}
        {renderColorPicker('mobile')}
    </>;

	return <>
		<label className='responsive-color-control-main-wrap'>
			{labelHtml}
            {inputHtml}
		</label>
        {htmlDescription}
	</>;

};

ColorComponentWithDevicesAndHover.propTypes = {
	control: PropTypes.object.isRequired
};

export default React.memo ( ColorComponentWithDevicesAndHover );

