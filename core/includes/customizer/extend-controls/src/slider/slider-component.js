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

	const inputId = `responsive-range-${props.control.id}`;

	return <div>
		<div className='responsive-range-control-label'>
			<label className="customize-control-title" htmlFor={inputId}>{label}</label>
			<div className="responsive-reset-slider">
				<button
					type="button"
					className="responsive-slider-reset-btn"
					onClick={(event) => {
						event.preventDefault();
						event.stopPropagation();
						updateValues(props.control.params.default);
					}}
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
		</div>
		{descriptionHtml}

		<div className="desktop control-wrap active">
			<input {...inp_array} id={inputId} type="range" value={props_value} data-reset_value={props.control.params.default}
				   onChange={(event) => updateValues(event.target.value)} style={{
					background: `linear-gradient(to right, #007CBA ${((props_value-inp_array.min)/(inp_array.max-inp_array.min))*100}%, #D9D9D9 ${((props_value-inp_array.min)/(inp_array.max-inp_array.min))*100}%)`
				  }}/>
				<input {...inp_array} type="number" data-name={name} className="responsive-range-input"
					   value={props_value} onChange={(event) => updateValues(event.target.value)}/>
		</div>
	</div>;

};

ResponsiveSliderComponent.propTypes = {
	control: PropTypes.object.isRequired
};

export default React.memo( ResponsiveSliderComponent );
