import PropTypes from 'prop-types';

const HeadingComponent = props => {

	const {
		label,
		description
	} = props.control.params;

	let labelHtml = null;
	let descriptionHtml = null;

	if (label) {
		labelHtml = <h4 className="responsive-customizer-heading">{label}</h4>;
	}

	if (description) {
		descriptionHtml = <div className="description">{description}</div>;
	}

	return <>
		{labelHtml}
		{descriptionHtml}
	</>;
};

HeadingComponent.propTypes = {
	control: PropTypes.object.isRequired
};

export default React.memo(HeadingComponent);