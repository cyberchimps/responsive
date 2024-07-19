import PropTypes from "prop-types";

import { __ } from '@wordpress/i18n'

const HorizontalSeparatorComponent = props => {

    return (
        <div className="responsive-horizontal-separator-control-wrapper">
            {[...Array(props.control.params.label)].map((_, index) => (
                <hr key={index} />
            ))}
        </div>
    );
};

HorizontalSeparatorComponent.propTypes = {
	control: PropTypes.object.isRequired
};

export default React.memo(HorizontalSeparatorComponent);