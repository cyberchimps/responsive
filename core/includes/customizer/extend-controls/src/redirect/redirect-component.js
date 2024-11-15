import PropTypes from 'prop-types';

const RedirectComponent = props => {

	const onLinkClick = () => {
		const {
			linked,
			link_type
		} = props.control.params;

		switch (link_type) {
			case 'section':
				var section = wp.customize.section(linked);
				section.expand();
				break;

			case 'control':
				wp.customize.control(linked).focus();
				break;

			default:
				break;
		}
	};

	const {
		label,
		link_type,
		linked
	} = props.control.params;

	let linkHtml = null;

	if (linked && label) {
		linkHtml = <a href="#" onClick={() => {
			onLinkClick();
		}} className="customizer-link customizer-redirect-button responsive-customizer-redirect-button" data-customizer-linked={linked} data-res-customizer-link-type={link_type}>
			<div className='responsive-customizer-redirect-button-inner-wrap'>
				<h3 className="redirect-button-label">{label}</h3>
				<span class="arrow-head"></span>
			</div>
		</a>;
	}

	return <>
		{linkHtml}
	</>;
};

RedirectComponent.propTypes = {
	control: PropTypes.object.isRequired
};

export default React.memo(RedirectComponent);