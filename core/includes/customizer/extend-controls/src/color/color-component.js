import PropTypes from 'prop-types';
import ResponsiveColorPickerControl from './responsive-color-picker-control';
import ResponsiveColorPickerWithHoverControl from './responsive-color-picker-with-hover-contorl';
import {useState, useEffect} from 'react';

const ColorComponent = props => {

	const { label, description, is_hover_required, value, is_gradient_available } = props.control.params;
	
	const colorType = props.control.settings?.color_type?.get() || 'color';

	const currentGradientValue = props.control.settings?.gradient?.get() || props.control.params.gradient_default;

	const [state, setState] = useState({
		value: value,
	});

	useEffect(() => {
		if (is_hover_required) {
			// For hover controls, listen to both normal and hover settings
			const normalSetting = wp.customize(props.control.settings['normal'].id);
			const hoverSetting = wp.customize(props.control.settings['hover'].id);
			
			if (!normalSetting || !hoverSetting) return;

			const updateState = () => {
				setState({
					value: {
						normal: normalSetting.get(),
						hover: hoverSetting.get()
					}
				});
			};

			// Initial state
			updateState();

			// Listen to changes
			const normalUnbind = normalSetting.bind(updateState);
			const hoverUnbind = hoverSetting.bind(updateState);

			return () => {
				normalUnbind();
				hoverUnbind();
			};
		} else {
			// For regular controls, listen to the main setting
			const settingId = props.control.id;  // e.g. "responsive_all_heading_text_color"
			const setting = wp.customize(settingId);
			if (!setting) return;

			const listener = (newVal) => {
				setState({ value: newVal });
			};

			setting.bind(listener);
			return () => setting.unbind(listener);
		}
	}, [props.control.id, is_hover_required]);

	const updateValues = (value) => {
		setState(prevState => ({
			...prevState,
			value: value
		}));
		if (is_hover_required) {
            props.control.settings['normal'].set(value.normal);
            props.control.settings['hover'].set(value.hover);
        } else if (is_gradient_available && props.control.settings?.default) {
			props.control?.settings?.default?.set(value);
			props.control?.settings?.color_type?.set('color');
		} else {
            props.control.setting.set(value);
        }
	};
	const handleChangeComplete = ( color, type='color' ) => {
		let colorValue;

		if(type === 'gradient') {
			colorValue = color;
		} else if (typeof color === 'string' || color instanceof String) {
			colorValue = color;
		} else if (undefined !== color.rgb && undefined !== color.rgb.a && 1 !== color.rgb.a) {
			colorValue = 'rgba(' + color.rgb.r + ',' + color.rgb.g + ',' + color.rgb.b + ',' + color.rgb.a + ')';
		} else {
			colorValue = color.hex;
		}

		if (is_gradient_available && type === 'gradient') {
			props.control?.settings?.gradient.set(colorValue);
			props.control?.settings?.color_type.set('gradient');
			// Update local state to reflect the change for potential re-renders or prop updates
            setState(prevState => ({
                ...prevState,
                value: colorValue // If gradient, set the value to the gradient string
            }));
			return;
		}

		let updatedValue = { ...state.value };
        if (type === 'normal') {
            updatedValue.normal = colorValue;
        } else if (type === 'hover') {
            updatedValue.hover = colorValue;
        }
		if( is_hover_required ) {
			updateValues(updatedValue);
		} else {
			updateValues(colorValue);
		}

		// reciprocation logic for All Headings color
		const settingId = props.control.id;
		if (settingId === 'responsive_all_heading_text_color') {
			// Update individual heading color settings when All Headings changes
			const individualHeadingIds = [
				'responsive_h1_text_color',
				'responsive_h2_text_color',
				'responsive_h3_text_color',
				'responsive_h4_text_color',
				'responsive_h5_text_color',
				'responsive_h6_text_color'
			];
			
			individualHeadingIds.forEach(function(headingId) {
				const headingSetting = wp.customize(headingId);
				if (headingSetting) {
					headingSetting.set(colorValue);
				}
			});
		}
	};

	const handleReset = () => {
		// Get the default value from the control's default setting
		const defaultValue = props.control.params.default;
		updateValues(defaultValue);
	};

	let labelHtml = null;
    let htmlDescription = null;
	

	if (label) {
		labelHtml = <span className="customize-control-title">{label}</span>;
	}
    if (description) {
        htmlDescription =  <i className="res-control-tooltip dashicons dashicons-editor-help" title={description}></i>;
    }

	return <div className="responsive-color-control-wrapper">
		<label className='responsive-color-control-main-wrap'>
			{labelHtml}
            <div>
				{ is_hover_required && (
					<ResponsiveColorPickerWithHoverControl color={undefined !== state.value.normal && state.value.normal ? state.value.normal : ''} hover_color={undefined !== state.value.hover && state.value.hover ? state.value.hover : ''}
						onChangeComplete={(color, type) => handleChangeComplete(color, type)}
						backgroundType={'color'}
						inputattr={props.control.params}
					/>
				) }
				{ ! is_hover_required && (
					<ResponsiveColorPickerControl color={undefined !== state.value && state.value ? state.value : ''}
						onChangeComplete={(color, type) => handleChangeComplete(color, type)}
						backgroundType={'color'}
						inputattr={props.control.params}
						inputSettings={props.control.settings}
						is_gradient_available={is_gradient_available ? is_gradient_available : false}
						colorType={colorType}
						gradient={currentGradientValue}
					/>
				)}

		    </div>
		</label>
		<button
			type="button"
			className="responsive-color-reset-btn"
			onClick={handleReset}
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
        {htmlDescription}
	</div>;

};

ColorComponent.propTypes = {
	control: PropTypes.object.isRequired
};

export default React.memo ( ColorComponent );