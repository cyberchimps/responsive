import PropTypes from 'prop-types';
import { useState } from 'react';

const SelectButtonComponent = props => {

	const [props_value, setPropsValue] = useState(props.control.setting.get());

	const onOptionClick = (value) => {
        setPropsValue(value);
        props.control.setting.set(value);
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
		htmlLabel = <label htmlFor={id} className="customize-control-title">{label}</label>;
	}

	if (description) {
		descriptionHtml = <i className="res-control-tooltip dashicons dashicons-editor-help" title={description}></i>;
	}

	let optionsHtml = Object.entries(choices).map(([choiceValue, icon]) => {
		if(icon.toLowerCase().includes('dashicons')) {
			return (
				<button
				key={choiceValue}
				type="button"
				className={`customize-control-responsive-selectbtn__button selectbtn-dashicon ${props_value === choiceValue ? 'active' : ''}`}
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
				className={`customize-control-responsive-selectbtn__button selectbtn-text ${props_value === choiceValue ? 'active' : ''}`}
				onClick={() => onOptionClick(choiceValue)}
				>
				<span className={`responsive-selectbtn-text ${icon}`}>{icon}</span>
			</button>
		);
	});

	return <>
		<div class="responsive-selectbtn-control-wrapper">
			{htmlLabel}
			{descriptionHtml}
			<div className={`customize-control-responsive-selectbtn ${id.includes('font-style') ? 'responsive-font-style-selectbtn-control' : '' }`} data-name={name} data-value={props_value} value={props_value}>
				{optionsHtml}
			</div>
		</div>
	</>;

};

SelectButtonComponent.propTypes = {
	control: PropTypes.object.isRequired
};

export default React.memo(SelectButtonComponent);
