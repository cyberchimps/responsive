import PropTypes from 'prop-types';
import ResponsiveColorPickerControl from './responsive-color-picker-control';
import ResponsiveColorPickerWithHoverControl from './responsive-color-picker-with-hover-contorl';
import {useState} from 'react';

const ColorComponent = props => {

	let value = props.control.params.value;

	const [state, setState] = useState({
		value: value,
	});

	const updateValues = (value) => {
		setState(prevState => ({
			...prevState,
			value: value
		}));
		if (props.control.params.is_hover_required) {
            props.control.settings['normal'].set(value.normal);
            props.control.settings['hover'].set(value.hover);
        } else {
            props.control.setting.set(value);
        }
	};
	const handleChangeComplete = ( color, type ) => {
		let colorValue;

		if (typeof color === 'string' || color instanceof String) {
			colorValue = color;
		} else if (undefined !== color.rgb && undefined !== color.rgb.a && 1 !== color.rgb.a) {
			colorValue = 'rgba(' + color.rgb.r + ',' + color.rgb.g + ',' + color.rgb.b + ',' + color.rgb.a + ')';
		} else {
			colorValue = color.hex;
		}

		let updatedValue = { ...state.value };
        if (type === 'normal') {
            updatedValue.normal = colorValue;
        } else if (type === 'hover') {
            updatedValue.hover = colorValue;
        }
		if( props.control.params.is_hover_required ) {
			updateValues(updatedValue);
		} else {
			updateValues(colorValue);
		}
	};

	let labelHtml = null;
    let htmlDescription = null;
	const {
		label,
        description,
		is_hover_required
	} = props.control.params;

	if (label) {
		labelHtml = <span className="customize-control-title">{label}</span>;
	}
    if (description) {
        htmlDescription =  <i className="res-control-tooltip dashicons dashicons-editor-help" title={description}></i>;
    }

	return <>
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
						onChangeComplete={(color) => handleChangeComplete(color)}
						backgroundType={'color'}
						inputattr={props.control.params}
					/>
				)}

		    </div>
		</label>
        {htmlDescription}
	</>;

};

ColorComponent.propTypes = {
	control: PropTypes.object.isRequired
};

export default React.memo ( ColorComponent );
