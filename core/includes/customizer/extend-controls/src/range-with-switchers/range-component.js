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
			<span className="responsive-reset-slider"><span className="dashicons dashicons-image-rotate" title={reset}></span></span>
		</div>;
    }

    inputHtml = <>
		{renderInputHtml('desktop', 'active')}
		{renderInputHtml('tablet')}
		{renderInputHtml('mobile')}
	</>;
    resetHtml = <>
        {renderResetHtml('desktop', 'active')}
        {renderResetHtml('tablet')}
        {renderResetHtml('mobile')}
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
