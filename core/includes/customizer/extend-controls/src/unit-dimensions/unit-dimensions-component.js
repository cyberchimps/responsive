import PropTypes from 'prop-types';
import {__} from '@wordpress/i18n';
import {useState, useEffect} from 'react';

const UnitDimensionsComponent = props => {
	let value = props.control.params;
	const [props_value, setPropsValue] = useState(value);
	const [activeDevice, setActiveDevice] = useState('desktop');

	useEffect(() => {
		if (window.wp && window.wp.customize && window.wp.customize.previewedDevice) {
			const currentDevice = window.wp.customize.previewedDevice.get();
			setActiveDevice(currentDevice);
			
			// Sync control container class
			props.control.container.removeClass( 'control-device-desktop control-device-tablet control-device-mobile' ).addClass( 'control-device-' + currentDevice );

			const handleDeviceChange = () => {
				const device = window.wp.customize.previewedDevice.get();
				setActiveDevice(device);
				props.control.container.removeClass( 'control-device-desktop control-device-tablet control-device-mobile' ).addClass( 'control-device-' + device );
			};
			window.wp.customize.previewedDevice.bind(handleDeviceChange);
			return () => {
				window.wp.customize.previewedDevice.unbind(handleDeviceChange);
			};
		}
	}, []);

	const onConnectedClick = (e) => {
		let parent = e.target.parentElement.parentElement.parentElement;
		let inputs = parent.querySelectorAll('.responsive-dimensions-input');

		for (let i = 0; i < inputs.length; i++) {
			inputs[i].classList.remove('linked');
			inputs[i].setAttribute('data-element-connect', '');
		}

		e.target.parentElement.classList.remove('unlinked');
		e.target.parentElement.style.backgroundColor = '';
		e.target.parentElement.style.color = '';
	};

	const onDisconnectedClick = (e) => {
		let elements = e.target.dataset.elementConnect;
		let parent = e.target.parentElement.parentElement.parentElement;
		let inputs = parent.querySelectorAll('.responsive-dimensions-input');

		for (let i = 0; i < inputs.length; i++) {
			inputs[i].classList.add('linked');
			inputs[i].setAttribute('data-element-connect', elements);
		}

		e.target.parentElement.classList.add('unlinked');
		e.target.parentElement.style.backgroundColor = '#13aff0';
		e.target.parentElement.style.color = '#fff';
	};

	const onSpacingChange = (e, device, choiceID) => {
		let updateState = {
			...props_value
		};
		let deviceUpdateState = {
			...updateState[device]
		};
		
		if (!e.target.classList.contains('linked')) {
			deviceUpdateState[choiceID].value = e.target.value;
			props.control.settings[choiceID].set(e.target.value);
		} else {
			for (let cID in deviceUpdateState) {
				let value = e.target.value;
				deviceUpdateState[cID].value = value;
				props.control.settings[cID].set(value);
			}
		}
		updateState[device] = deviceUpdateState;
		setPropsValue(updateState);
	};

	const onUnitChange = (device, unitValue) => {
		let updateState = {
			...props_value
		};
		let unitsUpdateState = {
			...updateState.units
		};
		
		let unitKey = device + '_unit';
		
		if (unitsUpdateState[unitKey]) {
			unitsUpdateState[unitKey].value = unitValue;
			props.control.settings[unitKey].set(unitValue);
			
			updateState.units = unitsUpdateState;
			setPropsValue(updateState);
		}
	};

	const renderInputHtml = (device, active = '') => {
		const {
			id,
			inputAttrs,
			l10n
		} = props.control.params;

		let itemLinkDesc = __('Link Values Together', 'responsive');

		let linkHtml = null;
		let htmlChoices = null;
		let dataElement = id;
		if ('tablet'===device) {
			dataElement = dataElement + '_tablet';
		}
		if ('mobile'===device) {
			dataElement = dataElement + '_mobile';
		}

		linkHtml = <li key={'connect-disconnect' + device} className="dimension-wrap">
			<div className="link-dimensions unlinked" style={{backgroundColor: '#13aff0', color: '#fff'}}>
				<span key={'connect' + device}
					className="dashicons dashicons-admin-links responsive-linked"
					onClick={(e) => {
					  onConnectedClick(e);
					}}
					data-element-connect={id} title={itemLinkDesc}
					data-element={dataElement}
					>
				</span>
				<span key={'disconnect' + device} className="dashicons dashicons-editor-unlink responsive-unlinked"
					onClick={(e) => {
						onDisconnectedClick(e);
					}} data-element-connect={id} title={itemLinkDesc}
					data-element={dataElement}
					>
				</span>
			</div>	
		</li>;

		if( props_value[device] ) {
			htmlChoices = Object.keys(props_value[device]).map(choiceID => {
				let link = props_value[device][choiceID].id;
				if (undefined !== link) {
					let splited_values = link.split("=");
					if (undefined !== splited_values[1]) {
						link = splited_values[1].replace(/"/g, "");
					}
				}
				let attr= [];
				if (undefined !== inputAttrs) {
					let splited_values = inputAttrs.split(" ");
					splited_values.map((item) => {
						let item_values = item.split("=");
		
						if (undefined !== item_values[1]) {
							attr[item_values[0]] = item_values[1].replace(/"/g, "");
						}
					});
				}
				let html = <li key={props_value[device][choiceID].id}  className={`dimension-wrap ${choiceID}`}>
					<input  type='number' {...attr} className={`dimensions-${choiceID} linked responsive-dimensions-input`} data-id={props_value[device][choiceID].id}
						   value={props_value[device][choiceID].value} onChange={(e) => onSpacingChange(e, device, choiceID)}
						   data-element={dataElement}
						   data-customize-setting-link = {link}
						/>
						  <span className="dimension-label">{l10n[choiceID]}</span>
				</li>;
				return html;
			});
		}

		return <ul key={`${device}-${id}`} className={`${device} control-wrap ${active}`}>
			{htmlChoices}
			{linkHtml}
		</ul>;
	};

	const {
		label,
		description
	} = props.control.params;
	let htmlDescription = null;
	let inputHtml = null;
	let responsiveHtml = null;

	if (description) {
		htmlDescription =  <i className="res-control-tooltip dashicons dashicons-editor-help" title={description}></i>;
	}

	inputHtml = <>
		{renderInputHtml('desktop', activeDevice === 'desktop' ? 'active' : '')}
		{renderInputHtml('tablet', activeDevice === 'tablet' ? 'active' : '')}
		{renderInputHtml('mobile', activeDevice === 'mobile' ? 'active' : '')}
	</>;
	
	const availableUnits = props.control.params.unit_choices || ['px', 'em', '%'];
	const currentUnitKey = activeDevice + '_unit';
	const currentUnitValue = (props_value.units && props_value.units[currentUnitKey]) ? props_value.units[currentUnitKey].value : 'px';

	let unitsHtml = <div className="responsive-units-switchers" style={{ marginLeft: 'auto' }}>
		<select value={currentUnitValue} onChange={(e) => onUnitChange(activeDevice, e.target.value)}>
			{availableUnits.map(unit => (
				<option key={unit} value={unit}>
					{unit}
				</option>
			))}
		</select>
	</div>;

	responsiveHtml = <>
		<span className="customize-control-title" style={{ display: 'flex', alignItems: 'center', justifyContent: 'space-between' }}>
			<div style={{ display: 'flex', alignItems: 'center' }}>
				<span>{label}</span>
				<ul className="responsive-switchers" style={{ marginLeft: '10px' }}>
					<li className="desktop">
						<button type="button" className={`preview-desktop ${activeDevice === 'desktop' ? 'active' : ''}`} data-device="desktop" onClick={() => window.wp.customize.previewedDevice.set('desktop')}>
							<i className="dashicons dashicons-desktop"></i>
						</button>
					</li>
					<li className="tablet">
						<button type="button" className={`preview-tablet ${activeDevice === 'tablet' ? 'active' : ''}`} data-device="tablet" onClick={() => window.wp.customize.previewedDevice.set('tablet')}>
							<i className="dashicons dashicons-tablet"></i>
						</button>
					</li>
					<li className="mobile">
						<button type="button" className={`preview-mobile ${activeDevice === 'mobile' ? 'active' : ''}`} data-device="mobile" onClick={() => window.wp.customize.previewedDevice.set('mobile')}>
							<i className="dashicons dashicons-smartphone"></i>
						</button>
					</li>
				</ul>
			</div>
			{unitsHtml}
		</span>
		{inputHtml}
	</>;

	return <>
		{responsiveHtml}
		{htmlDescription}
	</>;

};

UnitDimensionsComponent.propTypes = {
	control: PropTypes.object.isRequired
};

export default React.memo( UnitDimensionsComponent );
