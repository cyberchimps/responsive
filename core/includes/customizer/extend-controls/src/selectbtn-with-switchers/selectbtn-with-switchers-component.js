import PropTypes from 'prop-types';
import { useState } from 'react';
import Icons from '../icons';

const SelectButtonWithSwitchersComponent = props => {

	const [props_value, setPropsValue] = useState(props.control.settings);

	const updateValues = (device, value) => {
		let updateValue = {...props_value};
		updateValue[`${device}`].set(value);
		setPropsValue(updateValue);
	};

	const {
		label,
		name,
		choices,
		description,
		id
	} = props.control.params;

	let htmlLabel = null;
	let descriptionHtml = null;
	let hasDashicons = false;

	if (label) {
		htmlLabel = <span className="customize-control-title">
			<span>{label}</span>
			<ul className="responsive-switchers">
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

	const getOptionsHtml = (device) => {
		return Object.entries(choices).map(([choiceValue, icon]) => {
			const currentValue = props_value[device] && props_value[device].get() ? props_value[device].get() : '';
			const isActive = currentValue === choiceValue;

			if(icon.toLowerCase().includes('dashicons')) {
				return (
					<button
						key={choiceValue}
						type="button"
						className={`customize-control-responsive-selectbtn__button selectbtn-dashicon ${isActive ? 'active' : ''}`}
						onClick={() => updateValues(device, choiceValue)}
					>
						<span className={`responsive-selectbtn-dashicon dashicons ${icon}`} />
					</button>
				);
			}
			if (icon.toLowerCase().includes('icon text')) {
				return (
					<button
						key={choiceValue}
						type="button"
						className={`customize-control-responsive-selectbtn__button selectbtn-text ${isActive ? 'active' : ''}`}
						onClick={() => updateValues(device, choiceValue)}
					>
						<span className={`responsive-selectbtn-text ${icon}`}>Icon</span>
					</button>
				);
			}
			if (icon.toLowerCase().includes('icon')) {
				return Icons[icon] ? (
					<button
						key={choiceValue}
						type="button"
						className={`customize-control-responsive-selectbtn__button selectbtn-icon ${isActive ? 'active' : ''}`}
						onClick={() => updateValues(device, choiceValue)}
					>
						{Icons[icon]}
					</button>
				) : (
					<button
						key={choiceValue}
						type="button"
						className={`customize-control-responsive-selectbtn__button selectbtn-icon ${isActive ? 'active' : ''}`}
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
					className={`customize-control-responsive-selectbtn__button selectbtn-text ${isActive ? 'active' : ''}`}
					onClick={() => updateValues(device, choiceValue)}
				>
					<span className={`responsive-selectbtn-text ${icon}`}>{icon}</span>
				</button>
			);
		});
	};

	const renderHTML = (device, active = '') => {
		return (
			<div className={`customize-control-responsive-selectbtn control-wrap ${device} ${active} ${id && id.includes('font-style') ? 'responsive-font-style-selectbtn-control' : ''}`} data-name={name} data-value={props_value[device] && props_value[device].get() ? props_value[device].get() : ''} value={props_value[device] && props_value[device].get() ? props_value[device].get() : ''}>
				{getOptionsHtml(device)}
			</div>
		);
	};

	return <>
		<div className="responsive-selectbtn-control-wrapper">
			<div className="responsive-selectbtn-control-header">
				{htmlLabel}
				{descriptionHtml}
			</div>
			<div className="responsive-selectbtn-control-with-switchers">
				{renderHTML('desktop', 'active')}
				{renderHTML('tablet')}
				{renderHTML('mobile')}
			</div>
		</div>
	</>;

};

SelectButtonWithSwitchersComponent.propTypes = {
	control: PropTypes.object.isRequired
};

export default React.memo(SelectButtonWithSwitchersComponent);

