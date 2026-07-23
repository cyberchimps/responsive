import PropTypes from 'prop-types';
import { useState } from 'react';
import Icons from '../icons';

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
		note,
		id
	} = props.control.params;

	let htmlLabel = null;
	let descriptionHtml = null;
	let noteHtml = null;
	let hasDashicons = false;

	if (label) {
		htmlLabel = <label htmlFor={id} className="customize-control-title">{label}</label>;
	}

	if (description) {
		descriptionHtml = <i className="res-control-tooltip dashicons dashicons-editor-help" title={description}></i>;
	}

	if (note) {
		noteHtml = <p className="responsive-selectbtn-control-note"><span>Note:</span> {note}</p>;
	}

	let optionsHtml = Object.entries(choices).map(([choiceValue, icon]) => {
		let tooltipText = '';
		if (id && id.includes('text-transform')) {
			if (choiceValue === '') tooltipText = 'Default';
			else if (choiceValue === 'capitalize') tooltipText = 'Capitalize';
			else if (choiceValue === 'lowercase') tooltipText = 'Lowercase';
			else if (choiceValue === 'uppercase') tooltipText = 'Uppercase';
		} else if (id && id.includes('font-style')) {
			if (choiceValue === 'italic') tooltipText = 'Italic';
			else if (choiceValue === 'normal') tooltipText = 'Normal';
		}
		const tooltipHtml = tooltipText ? <span className="responsive-tooltip">{tooltipText}</span> : null;

		if(icon.toLowerCase().includes('dashicons')) {
			return (
				<button
				key={choiceValue}
				type="button"
				className={`customize-control-responsive-selectbtn__button selectbtn-dashicon ${props_value === choiceValue ? 'active' : ''} ${tooltipText ? 'has-tooltip' : ''}`}
				onClick={() => onOptionClick(choiceValue)}
				>
				<span className={`responsive-selectbtn-dashicon dashicons ${icon}`} />
				{tooltipHtml}
				</button>
			);
		}
		if (icon.toLowerCase().includes('icon text')) {
			return (
			<button
					key={choiceValue}
					type="button"
					className={`customize-control-responsive-selectbtn__button selectbtn-text ${props_value === choiceValue ? 'active' : ''} ${tooltipText ? 'has-tooltip' : ''}`}
					onClick={() => onOptionClick(choiceValue)}
					>
					<span className={`responsive-selectbtn-text ${icon}`}>Icon</span>
					{tooltipHtml}
				</button>
			);
		}
		if (icon.toLowerCase().includes('icon')) {
			return Icons[icon]? (
				<button
					key={choiceValue}
					type="button"
					className={`customize-control-responsive-selectbtn__button selectbtn-icon ${props_value === choiceValue ? 'active' : ''} ${tooltipText ? 'has-tooltip' : ''}`}
					onClick={() => onOptionClick(choiceValue)}
				>
					{Icons[icon]}
					{tooltipHtml}
				</button>
			) : (
				<button
					key={choiceValue}
					type="button"
					className={`customize-control-responsive-selectbtn__button selectbtn-icon ${props_value === choiceValue ? 'active' : ''} ${tooltipText ? 'has-tooltip' : ''}`}
					onClick={() => onOptionClick(choiceValue)}
				>
					<span className={`responsive-selectbtn-icon icon ${icon}`} />
					{tooltipHtml}
				</button>
			);
		}

		return (
			<button
				key={choiceValue}
				type="button"
				className={`customize-control-responsive-selectbtn__button selectbtn-text ${props_value === choiceValue ? 'active' : ''} ${tooltipText ? 'has-tooltip' : ''}`}
				onClick={() => onOptionClick(choiceValue)}
				>
				<span className={`responsive-selectbtn-text ${icon}`}>{icon}</span>
				{tooltipHtml}
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
			{noteHtml}
		</div>
	</>;

};

SelectButtonComponent.propTypes = {
	control: PropTypes.object.isRequired
};

export default React.memo(SelectButtonComponent);
