import PropTypes from "prop-types";
import { useState } from "react";
const { ToggleControl } = wp.components;

const SectionToggle = props => {
    const [props_value, setPropsValue] = useState(props.control.setting.get());
    const [showTooltip, setShowTooltip] = useState(false);
    
    const {
		label,
		description,
        link_type,
		linked
	} = props.control.params;

    const onToggleClick = (props_value) => {
        const newValue = !props_value;
        setPropsValue(newValue);
        props.control.setting.set(newValue);

        if (newValue) {
            onLinkClick(newValue);
        }
    };

    const onLinkClick = (currentValue = props_value) => {

        if (!currentValue) {
            return;
        }

        switch (link_type) {
            case 'section':
                wp.customize.section(linked).expand();
                break;
            case 'control':
                wp.customize.control(linked).focus();
                break;
        }
    };

    let htmlToRender = null;
    if (linked && label) {
        htmlToRender = (
            <div
                className={`responsive-section-toggle-control-wrapper ${props_value ? 'active' : ''}`}
                data-customizer-linked={linked}
                data-res-customizer-link-type={link_type}
                onClick={() => {
                    onLinkClick();
                }}
                onMouseEnter={() => {
                    if (!props_value) setShowTooltip(true);
                }}
                onMouseLeave={() => setShowTooltip(false)}
            >
                {/* Tooltip */}
                {showTooltip && description && (
                    <div className="responsive-tooltip">
                        {description}
                    </div>
                )}
                <h3 className="label">{label}</h3>
                <div
                    onClick={(e) => {
                        e.stopPropagation(); // stops parent div click
                    }}
                >
                    <ToggleControl
                        __nextHasNoMarginBottom
                        checked={props_value}
                        onChange={() => {
                            onToggleClick(props_value);
                        }}
                        className="responsive-section-toggle-control"
                    />
                </div>
                <span className="arrow-head"></span>
            </div>
        );
    }

    return (
        <div className="responsive-customizer-section-toggle-control">
            {htmlToRender}
        </div>
    );
};

SectionToggle.propTypes = {
	control: PropTypes.object.isRequired
};

export default React.memo(SectionToggle);