import PropTypes from 'prop-types';
import {__} from '@wordpress/i18n';
import {useState} from 'react';

const ResponsiveSliderComponent = props => {

	const [props_value, setPropsValue] = useState( props.control.setting.get() );

	const {
		label,
		description,
		link,
		inputAttrs,
		name
	} = props.control.params;

	let labelHtml = null,
		descriptionHtml = null,
		inp_array = [],
		reset = __('Back to default', 'responsive');


	if (description) {
		descriptionHtml = <span className="description customize-control-description">{description}</span>;
	}

	if (undefined !== inputAttrs) {
		let splited_values = inputAttrs.split(" ");
		splited_values.map((item, i) => {
			let item_values = item.split("=");
			if (undefined !== item_values[1]) {
				inp_array[item_values[0]] = item_values[1].replace(/"/g, "");
			}
		});
	}

	if (undefined !== link) {
		let splited_values = link.split(" ");
		splited_values.map((item, i) => {
			let item_values = item.split("=");
			if (undefined !== item_values[1]) {
				inp_array[item_values[0]] = item_values[1].replace(/"/g, "");
			}
		});
	}

	const updateValues = ( value ) => {
		setPropsValue( value )
		props.control.setting.set( value );
	};

	return <label>
		<label className='responsive-range-control-label'>
			<span className="customize-control-title">{label}</span>
			<div className="responsive-reset-slider" onClick={() => {
				updateValues(props.control.params.default);
			}}>
				<span className="responsive-reset-slider"><span className="dashicons dashicons-image-rotate" title={reset}></span></span>
			</div>
		</label>
		{descriptionHtml}

		<div className="desktop control-wrap active">
			<input {...inp_array} type="range" value={props_value} data-reset_value={props.control.params.default}
				   onChange={() => updateValues(event.target.value)} style={{
					background: `linear-gradient(to right, #007CBA ${((props_value-inp_array.min)/(inp_array.max-inp_array.min))*100}%, #D9D9D9 ${((props_value-inp_array.min)/(inp_array.max-inp_array.min))*100}%)`
				  }}/>
				<input {...inp_array} type="number" data-name={name} className="responsive-range-input"
					   value={props_value} onChange={() => updateValues(event.target.value)}/>
		</div>
	</label>;

};

ResponsiveSliderComponent.propTypes = {
	control: PropTypes.object.isRequired
};

export default React.memo( ResponsiveSliderComponent );
