import PropTypes from 'prop-types';
import ColorPickerControlWithDevices from './color-picker-control';
import {useState} from 'react';

const ColorComponentWithDevices = props => {

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
		has_reset = false,
	} = props.control.params;

	const renderResetHtml = (device, active = '') => {
		if (!has_reset) return null;

		return (
			<div className={`${device} control-wrap ${active}`}>
				<button
					type="button"
					className="responsive-color-reset-btn"
					onClick={(e) => {
						e.preventDefault();
						e.stopPropagation();
						const defaultValue = props.control.params[device]?.default || '';
						updateColors(device, defaultValue);
					}}
					title="Reset to default"
				>
					<svg width="12" height="12" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path
							fillRule="evenodd"
							clipRule="evenodd"
							d="M1.10666 2.92609L1.28436 0.0619233L0.286278 0L0.0309617 4.11519L0 4.61423L0.49904 4.6452L4.61423 4.90051L4.67616 3.90243L1.74564 3.72061C2.67116 2.63852 4.05283 1.95167 5.59638 1.95167C8.38299 1.95167 10.642 4.19024 10.642 6.95167C10.642 9.71309 8.38299 11.9517 5.59638 11.9517C3.89414 11.9517 2.38879 11.1163 1.47498 9.83677L0.651103 10.4135C1.39211 11.453 2.44747 12.2321 3.66465 12.6381C4.88183 13.0442 6.19777 13.0561 7.42228 12.6723C8.64678 12.2885 9.71642 11.5288 10.4766 10.503C11.2368 9.47722 11.6481 8.23845 11.6511 6.96577C11.6541 5.69308 11.2487 4.45241 10.4934 3.42308C9.73808 2.39374 8.67206 1.62906 7.44939 1.23956C6.22671 0.850065 4.91073 0.855925 3.69164 1.2563C2.69519 1.58355 1.80567 2.16051 1.10666 2.92609Z"
							fill="#9CA3AF"
						/>
					</svg>
				</button>
			</div>
		);
	};

	if (label) {
		labelHtml = <span className="customize-control-title">
			<span>{label}</span>
			<ul className="responsive-switchers">
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
            <ColorPickerControlWithDevices color={undefined !== props_value[`${device}`].get() && props_value[`${device}`].get() ? props_value[`${device}`].get() : ''}
                onChangeComplete={(color) => handleChangeComplete(device, color)}
                backgroundType={'color'}
                inputattr={props.control.params}
				defaultValue = {props.control.params[`${device}`].default}
            />
        </div>
	};

    inputHtml = <>
        {renderColorPicker('desktop', 'active')}
        {renderColorPicker('tablet')}
        {renderColorPicker('mobile')}
    </>;

	if (!has_reset) {
		return <>
			<div className='responsive-color-control-main-wrap'>
				{labelHtml}
				{inputHtml}
			</div>
			{htmlDescription}
		</>;
	}

	return <div className="responsive-color-control-wrapper">
		<div className="responsive-color-control-main-wrap">
			{labelHtml}
			{inputHtml}
		</div>
		{renderResetHtml('desktop', 'active')}
		{renderResetHtml('tablet')}
		{renderResetHtml('mobile')}
		{htmlDescription}
	</div>;

};

ColorComponentWithDevices.propTypes = {
	control: PropTypes.object.isRequired
};

export default React.memo ( ColorComponentWithDevices );