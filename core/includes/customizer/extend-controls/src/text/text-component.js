import PropTypes from 'prop-types';
import {useState} from 'react';
import {__} from '@wordpress/i18n';

const TextComponent = props => {
	const [props_value, setPropsValue] = useState(props.control.settings);

	const onInputChange = (device) => {
		let updateValue = {...props_value};
		updateValue[device].set(event.target.value);
		setPropsValue(updateValue);
	};

	const renderInputHtml = (device, active = '') => {
		const {
            desktop,
			tablet,
			mobile,
		} = props.control.params;

		let link = (device === 'desktop') ? desktop.link : (device === 'tablet') ? tablet.link : mobile.link;
        if (undefined !== link) {
			let splited_values = link.split("=");
			if (undefined !== splited_values[1]) {
				link = splited_values[1].replace(/"/g, "");
			}
		}
		return <div className={`${device} control-wrap  ${active}`}>
			<input type="text"
				data-customize-setting-link = {link}
				placeholder='px - em - rem'
				value={props_value[device].get()} onChange={() => {
				onInputChange(device)
			}}
				
            />
			
		</div>;
	};

	const {
		description,
		label
	} = props.control.params;

	let labelHtml = null;
	let descriptionHtml = null;
	let inputHtml = null;

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
		descriptionHtml = <i className="res-control-tooltip dashicons dashicons-editor-help" title={description}></i>;
	}

	inputHtml = <>
		{renderInputHtml('desktop', 'active')}
		{renderInputHtml('tablet')}
		{renderInputHtml('mobile')}
	</>;
	return <>
		{labelHtml}
		{inputHtml}
		{descriptionHtml}
	</>;

};

TextComponent.propTypes = {
	control: PropTypes.object.isRequired
};

export default React.memo( TextComponent );
