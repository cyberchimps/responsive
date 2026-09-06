import PropTypes from "prop-types";

import { __ } from '@wordpress/i18n';
import { useState, useEffect } from "react";
const { ToggleControl } = wp.components;

const ToggleComponent = props => {
    const [props_value, setPropsValue] = useState(props.control.setting.get());

    useEffect(() => {
        const handleSettingChange = (newVal) => {
            let boolVal = (newVal === true || newVal === '1' || newVal === 1);
            setPropsValue(boolVal);
        };
        props.control.setting.bind(handleSettingChange);
        return () => {
            props.control.setting.unbind(handleSettingChange);
        };
    }, [props.control.setting]);

    const onToggleClick = (current_val) => {
        let newVal = !current_val;
        setPropsValue(newVal);
        props.control.setting.set(newVal);
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