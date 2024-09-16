import PropTypes from "prop-types";

import { __ } from '@wordpress/i18n';
import { useState } from "react";

const TypographyGroupControlComponent = props => {
    const [props_value, setPropsValue] = useState(props.control.setting.get());

    console.log('TypographyGroupControlComponent triggered');

    const {
		label,
		name,
		description,
		id,
	} = props.control.params;

    console.log('TypographyGroupControlComponent params: ' , props.control.params);
    return (
        <div className="responsive-typography-settings-group">
            <span className="customize-control-title">{label}</span>
        </div>
    );
};

TypographyGroupControlComponent.propTypes = {
	control: PropTypes.object.isRequired
};

export default React.memo(TypographyGroupControlComponent);