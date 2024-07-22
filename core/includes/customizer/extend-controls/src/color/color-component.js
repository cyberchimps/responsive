import PropTypes from 'prop-types';
import ResponsiveColorPickerControl from './responsive-color-picker-control';
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
		props.control.setting.set(value);
	};
	const handleChangeComplete = ( color ) => {
		let value;

		if (typeof color === 'string' || color instanceof String) {
			value = color;
		} else if (undefined !== color.rgb && undefined !== color.rgb.a && 1 !== color.rgb.a) {
			value = 'rgba(' + color.rgb.r + ',' + color.rgb.g + ',' + color.rgb.b + ',' + color.rgb.a + ')';
		} else {
			value = color.hex;
		}

		updateValues(value);
	};

	let labelHtml = null;
    let htmlDescription = null;
	const {
		label,
        description
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
                <ResponsiveColorPickerControl color={undefined !== state.value && state.value ? state.value : ''}
                    onChangeComplete={(color) => handleChangeComplete(color)}
                    backgroundType={'color'}
                    inputattr={props.control.params}
                />

		    </div>
		</label>
        {htmlDescription}
	</>;

};

ColorComponent.propTypes = {
	control: PropTypes.object.isRequired
};

export default React.memo ( ColorComponent );
