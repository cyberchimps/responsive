import PropTypes from 'prop-types';

const RedirectComponent = props => {

	const {
		label,
		link_value
	} = props.control.params;

	return <>
		<a href={link_value} className="customizer-redirect-button">
			<h3 className="redirect-button-label">{label}</h3>
		</a>
	</>;
};

RedirectComponent.propTypes = {
	control: PropTypes.object.isRequired
};

export default React.memo(RedirectComponent);