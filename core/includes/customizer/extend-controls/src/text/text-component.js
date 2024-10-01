import PropTypes from 'prop-types';
import {useState} from 'react';
import {__} from '@wordpress/i18n';

const TextComponent = props => {
	const [props_value, setPropsValue] = useState(props.control.settings);

	const onInputChange = (device, value) => {
		let inputValue = Number(value);
		let updateValue = {...props_value};
		updateValue[`${device}_value`].set(inputValue);
		let deviceUpdateSize = (updateValue[`${device}_value`].get());
		updateValue[`${device}_font_unit`].set(activeFontUnits[device]);
		updateValue[device].set(deviceUpdateSize + activeFontUnits[device]);
		setPropsValue(updateValue);
	};
	
	
	const {
		desktop_value,
		tablet_value,
		mobile_value,
	} = props.control.params;

	let pxRangeAttrs = {
		max: '200',
		min: '0',
		step: '1',
	}
	let emRangeAttrs = {
		max: '20',
		min: '0',
		step: '0.01',
	}

	const extractUnit = (value) => {
		const match = value.match(/[a-z%]+$/i);
		return match ? match[0] : 'px';
	}

	let desktopActiveFontUnit = extractUnit(props_value['desktop'].get());
	let tabletActiveFontUnit  = extractUnit(props_value['tablet'].get());
	let mobileActiveFontUnit  = extractUnit(props_value['mobile'].get());

	const [activeFontUnits, setActiveFontUnits] = useState({
		desktop: desktopActiveFontUnit,
		tablet: tabletActiveFontUnit,
		mobile: mobileActiveFontUnit,
	  });
	  
	  // Update function to handle unit changes
	const updateFontUnits = (device, units) => {
		setActiveFontUnits(prevUnits => ({
		...prevUnits,
		[device]: units,
		}));
		let updateValue = {...props_value};
		let deviceUpdateSize = (updateValue[`${device}_value`].get());
		updateValue[`${device}_font_unit`].set(units);
		updateValue[device].set(deviceUpdateSize + units);
		setPropsValue(updateValue);
	};

	const renderInputHtml = (device, active = '') => {
		let link = (device === 'desktop') ? desktop_value.link : (device === 'tablet') ? tablet_value.link : mobile_value.link;
        if (undefined !== link) {
			let splited_values = link.split("=");
			if (undefined !== splited_values[1]) {
				link = splited_values[1].replace(/"/g, "");
			}
		}
		const rangeAttrs    = ( activeFontUnits[device] === 'px' || activeFontUnits[device] === '%' ) ? pxRangeAttrs : emRangeAttrs;
		const sliderWidth = ((props_value[`${device}_value`].get() - rangeAttrs.min) / (rangeAttrs.max - rangeAttrs.min)) * 100;

		return <div className={`${device} control-wrap  ${active}`}>
				<input
					{...rangeAttrs}
					type="range"
					value={props_value[`${device}_value`].get()}
					data-customize-setting-link={link}
					onChange={(event) => onInputChange(device, event.target.value)}
					style={{
						background: `linear-gradient(to right, #007CBA ${sliderWidth}%, #D9D9D9 ${sliderWidth}%)`
					}}
				/>
				<input
					{...rangeAttrs}
					type="number"
					className="responsive-range-input"
					value={props_value[`${device}_value`].get()}
					data-customize-setting-link={link}
					onChange={(event) => onInputChange(device, event.target.value)}
				/>
		</div>;
	};

	const renderFontUnits = (device, active = '') => {

		return (
			<div class={`responsive-font-units-wrap ${device} control-wrap ${active} `}>
				<ul class={`responsive-font-units input-field-wrapper responsive-spacing-${device}-font-units ${device} ${active}`}>
				<li class={`single-unit ${activeFontUnits[device] === 'px' ? 'active' : ''}`} data-unit="px">
					<span class="unit-text" onClick={() => updateFontUnits(device, 'px')}>
					{__('px', 'responsive')}
					</span>
				</li>
				<li class={`single-unit ${activeFontUnits[device] === 'em' ? 'active' : ''}`} data-unit="em">
					<span class="unit-text" onClick={() => updateFontUnits(device, 'em')}>
					{__('em', 'responsive')}
					</span>
				</li>
				<li class={`single-unit ${activeFontUnits[device] === '%' ? 'active' : ''}`} data-unit="%">
					<span class="unit-text" onClick={() => updateFontUnits(device, '%')}>
					{__('%', 'responsive')}
					</span>
				</li>
				</ul>
			</div>
		  );
	};

	const {
		description,
		label
	} = props.control.params;

	let labelHtml = null;
	let descriptionHtml = null;
	let inputHtml = null;
	let fontUnits = null;

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
	let noteTitle = __('Note: ', 'responsive');
	if (description) {
		descriptionHtml = <p className="responsive-customize-control-note responsive-text-control-note"><span>{noteTitle}</span>{description}</p>;
	}

	inputHtml = <>
		{renderInputHtml('desktop', 'active')}
		{renderInputHtml('tablet')}
		{renderInputHtml('mobile')}
	</>;
	fontUnits = <>
		{renderFontUnits('desktop', 'active')}
		{renderFontUnits('tablet')}
		{renderFontUnits('mobile')}
	</>
	return <>
		<div class="responsive-typo-font-size-label-units-wrap">
			{labelHtml}
			{fontUnits}
		</div>
		{inputHtml}
		{descriptionHtml}
	</>;

};

TextComponent.propTypes = {
	control: PropTypes.object.isRequired
};

export default React.memo( TextComponent );
