import PropTypes from 'prop-types';
import { useState } from 'react';

const SelectComponent = props => {

	const [props_value, setPropsValue] = useState(props.control.setting.get());

	const onSelectChange = (value) => {
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

	if (label) {
		htmlLabel = <label htmlFor={id} className="customize-control-title">{label}</label>;
	}

	if (description) {
		descriptionHtml = <i className="res-control-tooltip dashicons dashicons-editor-help" title={description}></i>;
	}

	let optionsHtml = Object.entries(choices).map(key => {
		let html = <option key={key[0]} value={key[0]}>{key[1]}</option>;
		return html;
	});

	return <>
		{htmlLabel}
		{descriptionHtml}
		<select data-name={name} data-value={props_value} value={props_value}
			onChange={() => {
				onSelectChange(event.target.value);
			}}>
			{optionsHtml}
		</select>
	</>;

};

SelectComponent.propTypes = {
	control: PropTypes.object.isRequired
};

export default React.memo(SelectComponent);
