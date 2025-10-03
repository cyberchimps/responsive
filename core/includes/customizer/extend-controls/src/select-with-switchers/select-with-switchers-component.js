import PropTypes from 'prop-types';
import { useState } from 'react';
import Icons from '../icons';
import {__} from '@wordpress/i18n';

const SelectWithSwitchersComponent = props => {

	const [props_value, setPropsValue] = useState(props.control.settings);

	const {
		label,
		choices,
		description,
	} = props.control.params;

	let htmlLabel = null;
	let descriptionHtml = null;
	let controlHTML = null;

	const updateValues = (device, value ) => {
		let updateValue = {...props_value};
		updateValue[`${device}`].set(value);
		setPropsValue(updateValue);
	};

	if (label) {
		htmlLabel = <span className="customize-control-title">
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

	const getOptionsHtml = (device) => {
		return Object.entries(choices).map(([choiceValue, icon]) => {
			if (icon.toLowerCase().includes('dashicons')) {
				return (
					<button
						key={choiceValue}
						type="button"
						className={`customize-control-responsive-selectbtn__button selectbtn-dashicon ${
							props_value[device].get() === choiceValue ? 'active' : ''
						}`}
						onClick={() => updateValues(device, choiceValue)}
					>
						<span className={`responsive-selectbtn-dashicon dashicons ${icon}`} />
					</button>
				);
			}

			if (icon.toLowerCase().includes('icon')) {
				return Icons[icon] ? (
					<button
						key={choiceValue}
						type="button"
						className={`customize-control-responsive-selectbtn__button selectbtn-icon ${
							props_value[device].get() === choiceValue ? 'active' : ''
						}`}
						onClick={() => updateValues(device, choiceValue)}
					>
						{Icons[icon]}
					</button>
				) : (
					<button
						key={choiceValue}
						type="button"
						className={`customize-control-responsive-selectbtn__button selectbtn-icon ${
							props_value[device].get() === choiceValue ? 'active' : ''
						}`}
						onClick={() => updateValues(device, choiceValue)}
					>
						<span className={`responsive-selectbtn-icon icon ${icon}`} />
					</button>
				);
			}

			return (
				<button
					key={choiceValue}
					type="button"
					className={`customize-control-responsive-selectbtn__button selectbtn-text ${
						props_value[device].get() === choiceValue ? 'active' : ''
					}`}
					onClick={() => updateValues(device, choiceValue)}
				>
					<span className={`responsive-selectbtn-text ${icon}`}>{icon}</span>
				</button>
			);
		});
	};

	const renderHTML = (device, active='') => {
		return (
			<div className={`customize-control-responsive-selectbtn control-wrap ${device} ${active} `}>
				{getOptionsHtml(device)}
			</div>
		)
	}

	    controlHTML = <>
			{renderHTML('desktop', 'active')}
			{renderHTML('tablet')}
			{renderHTML('mobile')}
		</>;

	return <>
		<div class="responsive-selectbtn-control-wrapper">
			{htmlLabel}
			{controlHTML}
			{descriptionHtml}
		</div>
	</>;

};

SelectWithSwitchersComponent.propTypes = {
	control: PropTypes.object.isRequired
};

export default React.memo(SelectWithSwitchersComponent);