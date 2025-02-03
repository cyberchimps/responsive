import PropTypes from "prop-types";

import { __ } from '@wordpress/i18n';
import { useState } from "react";
const { ToggleControl } = wp.components;

const ToggleComponent = props => {
    const [props_value, setPropsValue] = useState(props.control.setting.get());

    const onToggleClick = (props_value) => {
        setPropsValue(!props_value);
        props.control.setting.set(!props_value);
    };

    const {
		label,
		name,
		description,
		id,
	} = props.control.params;

    let descriptionHtml = null;
    if (description) {
		descriptionHtml = <span className="description customize-control-description">{description}</span>;
	}

    return (
        <div className="responsive-toggle-control-wrapper">
            <ToggleControl
                label={ props.control.params.label ? props.control.params.label : undefined }
                checked={ props_value }
                onChange={ () => {
                    onToggleClick( props_value );
                } }
                className="responsive-toggle-control"
            />
            {descriptionHtml}
        </div>
    );
};

ToggleComponent.propTypes = {
	control: PropTypes.object.isRequired
};

export default React.memo(ToggleComponent);