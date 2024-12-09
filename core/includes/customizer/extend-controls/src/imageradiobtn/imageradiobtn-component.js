import PropTypes from 'prop-types';
import { useState } from 'react';

const ImageRadioButtonComponent = props => {

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

		return (
			<button
				id={`${id}-imageradiobtn-${choiceValue}`}
				key={choiceValue}
				type="button"
				className={`customize-control-responsive-imageradiobtn__button imageradiobtn-text imagebutton ${props_value === choiceValue ? 'active' : ''}`}
				onClick={() => onOptionClick(choiceValue)}
				>
        		<span class="responsive-image-caption tooltiptext">{icon}</span>
				<img className={`responsive-imageradiobtn-text ${icon}`}  src={`${localize.path}${choiceValue}.png`}></img>
			</button>
      
		);
	});

	return <>
		{htmlLabel}
		{descriptionHtml}
		<div className='customize-control-responsive-imageradiobtn' data-name={name} data-value={props_value} value={props_value}>
			{optionsHtml}
		</div>
	</>;

};

ImageRadioButtonComponent.propTypes = {
	control: PropTypes.object.isRequired
};

export default React.memo(ImageRadioButtonComponent);
