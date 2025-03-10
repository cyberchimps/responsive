import PropTypes from 'prop-types';

const descriptionStyle = {
	fontSize: '12px',
    lineHeight: '18px',
    color: '#A4A4A4',
    marginTop: '10px',
	fontStyle: 'italic',
}
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
		descriptionHtml = <div className="description" style={descriptionStyle}><span style={{ fontWeight: 600 }} >Note: </span>{description}</div>;
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