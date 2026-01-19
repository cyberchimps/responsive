import PropTypes from 'prop-types';
import {__} from '@wordpress/i18n';
import {useState} from 'react';

const ResponsiveRangeWithSwitchersComponent = props => {

	const [props_value, setPropsValue] = useState( props.control.settings );

	const {
		label,
		link,
		inputAttrs,
		name,
        desktop,
		tablet,
		mobile,
		devices = ['desktop', 'tablet', 'mobile'], // Default to all devices for backward compatibility
	} = props.control.params;

	let labelHtml = null,
		inputHtml = null,
		resetHtml = null,
		inp_array = [],
		reset = __('Back to default', 'responsive');

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

	const updateValues = (device, value ) => {        
		let inputValue = Number(value);
		let updateValue = {...props_value};
		updateValue[`${device}`].set(inputValue);
		setPropsValue(updateValue);
	};

    if (label) {
		// Determine which device should be active by default (first device in the array)
		const defaultActiveDevice = devices.length > 0 ? devices[0] : 'desktop';
		
		labelHtml = <span className="customize-control-title">
			<span>{label}</span>
			<ul  className="responsive-switchers">
				{devices.includes('desktop') && (
					<li className="desktop">
						<button type="button" className={`preview-desktop ${defaultActiveDevice === 'desktop' ? 'active' : ''}`} data-device="desktop">
							<i className="dashicons dashicons-desktop"></i>
						</button>
					</li>
				)}
				{devices.includes('tablet') && (
					<li className="tablet">
						<button type="button" className={`preview-tablet ${defaultActiveDevice === 'tablet' ? 'active' : ''}`} data-device="tablet">
							<i className="dashicons dashicons-tablet"></i>
						</button>
					</li>
				)}
				{devices.includes('mobile') && (
					<li className="mobile">
						<button type="button" className={`preview-mobile ${defaultActiveDevice === 'mobile' ? 'active' : ''}`} data-device="mobile">
							<i className="dashicons dashicons-smartphone"></i>
						</button>
					</li>
				)}
			</ul>
		</span>;
	}

    const renderInputHtml = (device, active = '') => {
		let link = (device === 'desktop') ? desktop.link : (device === 'tablet') ? tablet.link : mobile.link;
        if (undefined !== link) {
			let splited_values = link.split("=");
			if (undefined !== splited_values[1]) {
				link = splited_values[1].replace(/"/g, "");
			}
		}
		const sliderWidth = ((props_value[`${device}`].get() - inp_array.min) / (inp_array.max - inp_array.min)) * 100;

		return <div className={`${device} control-wrap ${active}`}>
				<input
                    {...inp_array}
					type="range"
					value={props_value[`${device}`].get()}
					data-customize-setting-link={link}
                    data-reset_value={props.control.params.default}
					onChange={(event) => updateValues(device, event.target.value)}
					style={{
                        background: `linear-gradient(to right, #007CBA ${sliderWidth}%, #D9D9D9 ${sliderWidth}%)`
					}}
                    />
				<input
                    {...inp_array}
                    type="number"
                    data-name={name}
                    data-customize-setting-link={link}
                    className="responsive-range-switchers-input"
                    value={props_value[`${device}`].get()}
                    onChange={() => updateValues(device, event.target.value)}
                />
		</div>;
	};

    const renderResetHtml = (device, active = '') => {
		return <div className={`responsive-reset-slider ${device} control-wrap ${active}`}
            onClick={(event) => {
                event.stopPropagation();
                updateValues(device, props.control.params[`${device}`].default);
            }}>
				<button className="responsive-slider-reset-btn">
					<svg width="12" height="12" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path
							fillRule="evenodd"
							clipRule="evenodd"
							d="M1.10666 2.92609L1.28436 0.0619233L0.286278 0L0.0309617 4.11519L0 4.61423L0.49904 4.6452L4.61423 4.90051L4.67616 3.90243L1.74564 3.72061C2.67116 2.63852 4.05283 1.95167 5.59638 1.95167C8.38299 1.95167 10.642 4.19024 10.642 6.95167C10.642 9.71309 8.38299 11.9517 5.59638 11.9517C3.89414 11.9517 2.38879 11.1163 1.47498 9.83677L0.651103 10.4135C1.39211 11.453 2.44747 12.2321 3.66465 12.6381C4.88183 13.0442 6.19777 13.0561 7.42228 12.6723C8.64678 12.2885 9.71642 11.5288 10.4766 10.503C11.2368 9.47722 11.6481 8.23845 11.6511 6.96577C11.6541 5.69308 11.2487 4.45241 10.4934 3.42308C9.73808 2.39374 8.67206 1.62906 7.44939 1.23956C6.22671 0.850065 4.91073 0.855925 3.69164 1.2563C2.69519 1.58355 1.80567 2.16051 1.10666 2.92609Z"
							fill="#9CA3AF"
						/>
					</svg>
				</button>
		</div>;
    }

    // Determine which device should be active by default (first device in the array)
	const defaultActiveDevice = devices.length > 0 ? devices[0] : 'desktop';
	
	inputHtml = <>
		{devices.includes('desktop') && renderInputHtml('desktop', defaultActiveDevice === 'desktop' ? 'active' : '')}
		{devices.includes('tablet') && renderInputHtml('tablet', defaultActiveDevice === 'tablet' ? 'active' : '')}
		{devices.includes('mobile') && renderInputHtml('mobile', defaultActiveDevice === 'mobile' ? 'active' : '')}
	</>;
    resetHtml = <>
        {devices.includes('desktop') && renderResetHtml('desktop', defaultActiveDevice === 'desktop' ? 'active' : '')}
        {devices.includes('tablet') && renderResetHtml('tablet', defaultActiveDevice === 'tablet' ? 'active' : '')}
        {devices.includes('mobile') && renderResetHtml('mobile', defaultActiveDevice === 'mobile' ? 'active' : '')}
    </>

	return <div>
            <div className='responsive-range-control-label'>
                {labelHtml}
                {resetHtml}
            </div>
            {inputHtml}
	</div>;

};

ResponsiveRangeWithSwitchersComponent.propTypes = {
	control: PropTypes.object.isRequired
};

export default React.memo( ResponsiveRangeWithSwitchersComponent );
