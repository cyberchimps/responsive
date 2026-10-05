import PropTypes from "prop-types";

import { __ } from '@wordpress/i18n';
import { useState, useEffect, useRef } from "react";
import { createPortal } from "react-dom";
const { ToggleControl } = wp.components;

const ToggleComponent = props => {
    const [props_value, setPropsValue] = useState(props.control.setting.get());
    const [tooltipPos, setTooltipPos] = useState(null);
    const iconRef = useRef(null);

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
		tooltip,
		id,
	} = props.control.params;

    let descriptionHtml = null;
    let toggleLabel = label ? label : undefined;

    const showTooltip = () => {
        if (iconRef.current) {
            const rect = iconRef.current.getBoundingClientRect();
            setTooltipPos({ top: rect.bottom + 6, left: rect.left + 10 });
        }
    };
    const hideTooltip = () => setTooltipPos(null);

    if (description) {
		if (tooltip) {
			toggleLabel = (
				<span className="responsive-toggle-control-label">
					{label}
					<i
						ref={iconRef}
						className="res-control-tooltip dashicons dashicons-editor-help"
						aria-label={description}
						onMouseEnter={showTooltip}
						onMouseLeave={hideTooltip}
					></i>
					{tooltipPos && createPortal(
						<span
							className="responsive-toggle-tooltip-portal"
							style={{ top: tooltipPos.top, left: tooltipPos.left }}
						>
							{description}
						</span>,
						document.body
					)}
				</span>
			);
		} else {
			descriptionHtml = <span className="description customize-control-description">{description}</span>;
		}
	}

    return (
        <div className="responsive-toggle-control-wrapper">
            <ToggleControl
                label={ toggleLabel }
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
