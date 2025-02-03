import PropTypes from 'prop-types';
import { useState } from 'react';
const InputWithDropdown = props => {
	const [value, setPropsValue] = useState(props.control.setting.get());
    const [showChoices, setShowChoices] = useState(false);
    // Add Option to input val.
	const onOptionClick = (shortcode) => {
        const newValue = value + shortcode;
		setPropsValue(newValue);
		props.control.setting.set(newValue);
        setShowChoices(false);
	};
    // Handle input change.
    const onInputChange = (val) => {
        setPropsValue( val );
        props.control.setting.set( val );
    };
	const {
		label,
		choices,
		description,
		id
	} = props.control.params;
	let htmlLabel = null;
	let descriptionHtml = null;
	if (label) {
		htmlLabel = <label htmlFor={id} className="customize-control-title">{label}</label>;
	}
	if (description) {
		descriptionHtml = <span className="responsive-customize-control-desc res-input-with-dropdown-desc"><span className="note">Note: </span>{description}</span>;
	}
	return (
        <div className="responsive-input-with-dropdown-wrapper">
            {htmlLabel}
            <div className='responsive-input-with-dropdown-inputs-wrap'>
                <input
                    type="text"
                    value={value}
                    onChange={(event) => onInputChange(event.target.value)}
                />
                <button
                    type="button"
                    onClick={() => setShowChoices(!showChoices)} // Toggle dropdown visibility.
                    >
                        +
                </button>
            </div>
            {descriptionHtml}
            {/* Dropdown for shortcode choices */}
            {showChoices && (
                    <div
                    className='responsive-input-with-dropdown-options'
                        style={{
                            position: 'absolute',
                            top: '42%',
                            left: '140px',
                            marginTop: '5px',
                            backgroundColor: '#fff',
                            boxShadow: '0px 0px 10px 0px #00000026',
                            borderRadius: '4px',
                            zIndex: 10,
                            border: '1px solid #D0D0D0',
                            minWidth: '172px',
                            minHeight: '160px',
                        }}
                    >
                        <ul style={{ listStyle: 'none', margin: 0, padding: '10px 0' }}>
                            {Object.entries(choices).map(([shortcode, label]) => (
                                <li
                                    key={shortcode}
                                    style={{
                                        padding: '10px',
                                        cursor: 'pointer',
                                        fontSize: '14px',
                                        lineHeight: '16px',
                                    }}
                                    onClick={() => onOptionClick(shortcode)}
                                    onMouseEnter={(e) => (e.target.style.backgroundColor = '#f0f0f0')}
                                    onMouseLeave={(e) => (e.target.style.backgroundColor = 'transparent')}
                                >
                                    {label}
                                </li>
                            ))}
                        </ul>
                    </div>
                )}
        </div>
    );
};
InputWithDropdown.propTypes = {
	control: PropTypes.object.isRequired
};
export default React.memo(InputWithDropdown);