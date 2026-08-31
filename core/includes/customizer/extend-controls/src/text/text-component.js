import PropTypes from 'prop-types';
import {useState, useEffect} from 'react';
import {__} from '@wordpress/i18n';

const TextComponent = props => {
	const [props_value, setPropsValue] = useState(props.control.settings);
	const [activeDevice, setActiveDevice] = useState('desktop');

	useEffect(() => {
		if (window.wp && window.wp.customize && window.wp.customize.previewedDevice) {
			const currentDevice = window.wp.customize.previewedDevice.get();
			setActiveDevice(currentDevice);
			
			const handleDeviceChange = () => {
				const device = window.wp.customize.previewedDevice.get();
				setActiveDevice(device);
			};
			window.wp.customize.previewedDevice.bind(handleDeviceChange);
			return () => {
				window.wp.customize.previewedDevice.unbind(handleDeviceChange);
			};
		}
	}, []);

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
					{__('PX', 'responsive')}
					</span>
				</li>
				<li class={`single-unit ${activeFontUnits[device] === 'em' ? 'active' : ''}`} data-unit="em">
					<span class="unit-text" onClick={() => updateFontUnits(device, 'em')}>
					{__('EM', 'responsive')}
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

	const renderResetHtml = (device, active = '') => {
		return <div className={`responsive-reset-slider ${device} control-wrap ${active}`}>
				<button
					type="button"
					className="responsive-slider-reset-btn"
					onClick={(event) => {
						event.preventDefault();
						event.stopPropagation();
						
						if (props.control.params[device] && props.control.params[device].default !== undefined) {
							const defaultStr = String(props.control.params[device].default);
							const match = defaultStr.match(/[a-z%]+$/i);
							const unit = match ? match[0] : 'px';
							const value = defaultStr.replace(unit, '');
							
							let updateValue = {...props_value};
							updateValue[`${device}_value`].set(Number(value));
							updateValue[`${device}_font_unit`].set(unit);
							updateValue[device].set(defaultStr);
							setPropsValue(updateValue);
							
							setActiveFontUnits(prevUnits => ({
								...prevUnits,
								[device]: unit,
							}));
						}
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
		</div>;
	};

	const {
		description,
		label
	} = props.control.params;

	let labelHtml = null;
	let descriptionHtml = null;
	let inputHtml = null;
	let fontUnits = null;
	let resetHtml = null;

	if (label) {
		labelHtml = <span className="customize-control-title">
			<span>{label}</span>
			<ul  className="responsive-switchers">
				<li className="desktop">
					<button type="button" className={`preview-desktop ${activeDevice === 'desktop' ? 'active' : ''}`} data-device="desktop" onClick={() => window.wp.customize.previewedDevice.set('desktop')}>
						<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M14.5 1H1.5C1.22344 1 1 1.26909 1 1.60215V10.9355C1 11.2685 1.22344 11.5376 1.5 11.5376H7.4375V13.6452H4.75C4.6125 13.6452 4.5 13.7806 4.5 13.9462V14.8495C4.5 14.9323 4.55625 15 4.625 15H11.375C11.4438 15 11.5 14.9323 11.5 14.8495V13.9462C11.5 13.7806 11.3875 13.6452 11.25 13.6452H8.5625V11.5376H14.5C14.7766 11.5376 15 11.2685 15 10.9355V1.60215C15 1.26909 14.7766 1 14.5 1ZM13.875 10.1828H2.125V2.35484H13.875V10.1828Z" fill="#50575E"/>
						</svg>
					</button>
				</li>
				<li className="tablet">
					<button type="button" className={`preview-tablet ${activeDevice === 'tablet' ? 'active' : ''}`} data-device="tablet" onClick={() => window.wp.customize.previewedDevice.set('tablet')}>
						<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M12.6452 1H3.35484C2.61161 1 2 1.632 2 2.4V13.6C2 14.368 2.61161 15 3.35484 15H12.6452C13.3884 15 14 14.368 14 13.6V2.4C14 1.632 13.3884 1 12.6452 1ZM12.8387 13.6C12.8387 13.712 12.7535 13.8 12.6452 13.8H3.35484C3.24645 13.8 3.16129 13.712 3.16129 13.6V2.4C3.16129 2.288 3.24645 2.2 3.35484 2.2H12.6452C12.7535 2.2 12.8387 2.288 12.8387 2.4V13.6ZM8.77419 11.2C8.77419 11.64 8.42581 12 8 12C7.57419 12 7.22581 11.64 7.22581 11.2C7.22581 10.76 7.57419 10.4 8 10.4C8.42581 10.4 8.77419 10.76 8.77419 11.2Z" fill="#50575E"/>
						</svg>
					</button>
				</li>
				<li className="mobile">
					<button type="button" className={`preview-mobile ${activeDevice === 'mobile' ? 'active' : ''}`} data-device="mobile" onClick={() => window.wp.customize.previewedDevice.set('mobile')}>
						<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M10.5 1C10.8978 1 11.2794 1.16594 11.5607 1.46131C11.842 1.75668 12 2.15728 12 2.575V13.425C12 13.8427 11.842 14.2433 11.5607 14.5387C11.2794 14.8341 10.8978 15 10.5 15H5.5C5.10218 15 4.72064 14.8341 4.43934 14.5387C4.15804 14.2433 4 13.8427 4 13.425V2.575C4 2.15728 4.15804 1.75668 4.43934 1.46131C4.72064 1.16594 5.10218 1 5.5 1H10.5ZM10.5 2.05H5.5C5.36739 2.05 5.24021 2.10531 5.14645 2.20377C5.05268 2.30223 5 2.43576 5 2.575V13.425C5 13.7148 5.224 13.95 5.5 13.95H10.5C10.6326 13.95 10.7598 13.8947 10.8536 13.7962C10.9473 13.6978 11 13.5642 11 13.425V2.575C11 2.43576 10.9473 2.30223 10.8536 2.20377C10.7598 2.10531 10.6326 2.05 10.5 2.05ZM8.83267 11.85C8.96527 11.8498 9.09252 11.9049 9.18642 12.0033C9.28031 12.1016 9.33316 12.2351 9.33333 12.3743C9.33351 12.5135 9.281 12.6471 9.18736 12.7457C9.09372 12.8443 8.96661 12.8998 8.834 12.9L7.16733 12.9028C7.03473 12.903 6.90748 12.8479 6.81358 12.7495C6.71969 12.6512 6.66684 12.5177 6.66667 12.3785C6.66649 12.2393 6.719 12.1057 6.81264 12.0071C6.90629 11.9085 7.03339 11.853 7.166 11.8528L8.83267 11.85Z" fill="#50575E"/>
						</svg>
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
		{renderInputHtml('desktop', activeDevice === 'desktop' ? 'active' : '')}
		{renderInputHtml('tablet', activeDevice === 'tablet' ? 'active' : '')}
		{renderInputHtml('mobile', activeDevice === 'mobile' ? 'active' : '')}
	</>;
	fontUnits = <>
		{renderFontUnits('desktop', activeDevice === 'desktop' ? 'active' : '')}
		{renderFontUnits('tablet', activeDevice === 'tablet' ? 'active' : '')}
		{renderFontUnits('mobile', activeDevice === 'mobile' ? 'active' : '')}
	</>;

	resetHtml = <>
		{renderResetHtml('desktop', activeDevice === 'desktop' ? 'active' : '')}
		{renderResetHtml('tablet', activeDevice === 'tablet' ? 'active' : '')}
		{renderResetHtml('mobile', activeDevice === 'mobile' ? 'active' : '')}
	</>;

	return <>
		<div class="responsive-typo-font-size-label-units-wrap">
			{labelHtml}
			<div style={{display: 'flex', alignItems: 'center', gap: '8px'}}>
				{fontUnits}
				{resetHtml}
			</div>
		</div>
		{inputHtml}
		{descriptionHtml}
	</>;

};

TextComponent.propTypes = {
	control: PropTypes.object.isRequired
};

export default React.memo( TextComponent );
