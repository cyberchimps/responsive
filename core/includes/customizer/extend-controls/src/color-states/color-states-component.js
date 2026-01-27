import PropTypes from 'prop-types';
import ResponsiveColorStatesPickerControl from './responsive-color-states-picker-control';
// import ResponsiveColorStatesPickerWithHoverControl from './responsive-color-states-picker-with-hover-contorl';
// import ResponsiveColorStatesPickerWithActiveControl from './responsive-color-states-picker-with-active-control';
import {useState, useEffect} from 'react';

const ColorStatesComponent = props => {

	const { label, description, is_hover_required, is_active_required, value, is_gradient_available } = props.control.params;
	
	const colorType = props.control.settings?.color_type?.get() || 'color';

	const currentGradientValue = props.control.settings?.gradient?.get() || props.control.params.gradient_default;

	const [state, setState] = useState({
		value: value,
	});

	useEffect(() => {
	const settings = props.control.settings;
	if (!settings?.normal) return;

	const updateState = () => {
		const next = { normal: settings.normal.get() };

		if (settings.hover) {
			next.hover = settings.hover.get();
		}
		if (settings.active) {
			next.active = settings.active.get();
		}

		setState({ value: next });
	};

	updateState();

	const unbinds = [];

	unbinds.push(settings.normal.bind(updateState));
	if (settings.hover) unbinds.push(settings.hover.bind(updateState));
	if (settings.active) unbinds.push(settings.active.bind(updateState));

	return () => unbinds.forEach(fn => fn && fn());
}, [props.control.id]);



	const updateValues = (value) => {
		setState(prevState => ({
			...prevState,
			value: value
		}));
		// if (is_hover_required) {
        //     props.control.settings['normal'].set(value.normal);
        //     props.control.settings['hover'].set(value.hover);
        // } else if (is_gradient_available && props.control.settings?.default) {
		// 	props.control?.settings?.default?.set(value);
		// 	props.control?.settings?.color_type?.set('color');
		// } else {
        //     props.control.setting.set(value);
        // }
		if (is_active_required) {
			props.control.settings.normal.set(value.normal);
			props.control.settings.active.set(value.active);
		} else if (is_hover_required) {
			props.control.settings.normal.set(value.normal);
			props.control.settings.hover.set(value.hover);
		} else {
			props.control.setting.set(value);
		}

	};
	
	const handleChangeComplete = (color, stateName) => {
		let colorValue;

		if (typeof color === 'string') {
			colorValue = color;
		} else if (color?.rgb && color.rgb.a !== 1) {
			colorValue = `rgba(${color.rgb.r},${color.rgb.g},${color.rgb.b},${color.rgb.a})`;
		} else {
			colorValue = color.hex;
		}

		const updatedValue = {
			...state.value,
			[stateName]: colorValue,
		};

		props.control.settings.normal?.set(updatedValue.normal);

		if (is_hover_required && props.control.settings.hover) {
			props.control.settings.hover.set(updatedValue.hover);
		}

		if (is_active_required && props.control.settings.active) {
			props.control.settings.active.set(updatedValue.active);
		}

		setState({ value: updatedValue });
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
    htmlDescription = (
        <span
            className="res-control-tooltip dashicons dashicons-editor-help"
            title={description}
            style={{ cursor: 'help', marginLeft: '6px' }}
        />
    );
}

	return <div className="responsive-color-control-wrapper">
		<label className='responsive-color-control-main-wrap'>
			{labelHtml}
            <div>
				<ResponsiveColorStatesPickerControl
					colors={{
						normal: state.value?.normal || '',
						hover: state.value?.hover || '',
						active: state.value?.active || '',
					}}
					onChange={(color, stateName) => {
						handleChangeComplete(color, stateName);
					}}
				/>

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


ColorStatesComponent.propTypes = {
	control: PropTypes.object.isRequired
	
};

export default React.memo ( ColorStatesComponent );