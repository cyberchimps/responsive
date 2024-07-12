import PropTypes from 'prop-types';
import {__} from '@wordpress/i18n';
import {useState} from 'react';

const RadiusDimensionsComponent = props => {
	let value = props.control.params;
	const [props_value, setPropsValue] = useState(value);

	const onConnectedClick = () => {
		let parent = event.target.parentElement.parentElement.parentElement;
		let inputs = parent.querySelectorAll('.responsive-radiusdimensions-input');

		for (let i = 0; i < inputs.length; i++) {
			inputs[i].classList.remove('linked');
			inputs[i].setAttribute('data-element-connect', '');
		}

		event.target.parentElement.classList.remove('unlinked');
	};

	const onDisconnectedClick = () => {
		let elements = event.target.dataset.elementConnect;
		let parent = event.target.parentElement.parentElement.parentElement;
		let inputs = parent.querySelectorAll('.responsive-radiusdimensions-input');

		for (let i = 0; i < inputs.length; i++) {
			inputs[i].classList.add('linked');
			inputs[i].setAttribute('data-element-connect', elements);
		}

		event.target.parentElement.classList.add('unlinked');
	};

	const onSpacingChange = (device, choiceID) => {
		let updateState = {
			...props_value
		};
		let deviceUpdateState = {
			...updateState[device]
		};
		
		if (!event.target.classList.contains('linked')) {
			deviceUpdateState[choiceID].value = event.target.value;
		} else {
			for (let choiceID in deviceUpdateState) {
				let value = event.target.value;
				deviceUpdateState[choiceID].value = value;
				props.control.settings[choiceID].set(value);
			}
		}
		updateState[device] = deviceUpdateState;
		setPropsValue(updateState);
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
			<div className="link-dimensions unlinked">
				<span key={'connect' + device}
					className="dashicons dashicons-admin-links responsive-linked"
					onClick={() => {
					  onConnectedClick();
					}}
					data-element-connect={id} title={itemLinkDesc}
					data-element={dataElement}
					>
				</span>
				<span key={'disconnect' + device} className="dashicons dashicons-editor-unlink responsive-unlinked"
					onClick={() => {
						onDisconnectedClick();
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
						   value={props_value[device][choiceID].value} onChange={() => onSpacingChange(device, choiceID)}
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
		{renderInputHtml('desktop', 'active')}
		{renderInputHtml('tablet')}
		{renderInputHtml('mobile')}
	</>;
	responsiveHtml = <>
		<span className="customize-control-title">
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
		</span>
		{inputHtml}
	</>;

	return <>
		{responsiveHtml}
		{htmlDescription}
	</>;

};

RadiusDimensionsComponent.propTypes = {
	control: PropTypes.object.isRequired
};

export default React.memo( RadiusDimensionsComponent );
