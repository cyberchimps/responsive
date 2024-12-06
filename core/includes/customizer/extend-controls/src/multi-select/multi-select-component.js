import PropTypes from 'prop-types';
import { useState } from 'react';

const MultiSelectControlComponent = props => {

	const [props_value, setPropsValue] = useState(props.control.setting.get());
	
	const onOptionClick = (value) => {
		let updatedPropsValue;

		if (!props_value.includes(value)) { 
			// Add new value to a copy of the array
			updatedPropsValue = [...props_value, value];
		} else {
			// Filter out the value to remove it
			updatedPropsValue = props_value.filter(item => item !== value);
		}

		setPropsValue(updatedPropsValue);
		props.control.setting.set(updatedPropsValue);
	};

	const {
		label,
		name,
		choices,
		id
	} = props.control.params;

	let htmlLabel = null;
	let descriptionHtml = null;

	if (label) {
		htmlLabel = <label htmlFor={id} className="customize-control-title customize-control-multi-select-title">{label}</label>;
	}

	let optionsHtml = Object.entries(choices).map(([choiceValue, icon]) => {
		if(icon.toLowerCase().includes('dashicons')) {
			return (
				<button
				key={choiceValue}
				type="button"
				className={`customize-control-responsive-selectbtn__button selectbtn-dashicon ${props_value.includes(choiceValue) ? 'active' : ''}`}
				onClick={() => onOptionClick(choiceValue)}
				>
				<span className={`responsive-selectbtn-dashicon dashicons ${icon}`} />
				</button>
			);
		}

		return (
			<button
				key={choiceValue}
				type="button"
				className={`customize-control-responsive-selectbtn__button selectbtn-text ${props_value.includes(choiceValue) ? 'active' : ''}`}
				onClick={() => onOptionClick(choiceValue)}
				>
				<span className={`responsive-selectbtn-text ${icon}`}>{icon}</span>
			</button>
		);
	});

	return <>
		<div class="responsive-multi-select-control-wrapper">
			{htmlLabel}
			{descriptionHtml}
			<div className={`customize-control-responsive-multiselect ${id.includes('font-style') ? 'responsive-font-style-selectbtn-control' : '' }`} data-name={name} data-value={props_value} value={props_value}>
				{optionsHtml}
			</div>
		</div>
	</>;

};

MultiSelectControlComponent.propTypes = {
	control: PropTypes.object.isRequired
};

export default React.memo(MultiSelectControlComponent);
