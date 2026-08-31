import PropTypes from 'prop-types'; 
import { useState } from 'react'; 

const IconRadioButtonComponent = props => {

    const [props_value, setPropsValue] = useState(props.control.setting.get());

    const onOptionClick = (value) => {
        setPropsValue(value); 
        props.control.setting.set(value);
    }

    const {
        label,
        name,
        choices,
        description,
        id,
        icon_ext
    } = props.control.params;

    let htmlLabel = null; 
    let descriptionHtml = null;
    let hasDashicons = false; 

    if(label) 
    {
        htmlLabel = <label htmlFor={id} className="customize-control-title">{label}</label>;
    }

    if (description) {
		descriptionHtml = <i className="res-control-tooltip dashicons dashicons-editor-help" title={description}></i>;
	}

    let optionsHtml = Object.entries(choices).map(([choiceValue, icon]) => {

        // If active → append _active to the filename
        const fileName = props_value === choiceValue
            ? `${choiceValue}_active.${icon_ext}`
            : `${choiceValue}.${icon_ext}`;

        return (
            <button
                id={`${id}-iconradiobtn-${choiceValue}`}
                key={choiceValue}
                type="button"
                className={`customize-control-responsive-iconradiobtn__button iconradiobtn-text ${props_value === choiceValue ? 'active' : ''}`}
                onClick={() => onOptionClick(choiceValue)}
            >
                <span className="responsive-icon-caption tooltiptext">{icon}</span>

                <img
                    className={`responsive-iconradiobtn-text ${icon}`}
                    src={`${localize.path}${fileName}`}
                    alt={icon}
                />
            </button>
        );
    });

    return (
        <>
            <div className="customize-control-responsive-iconradiobtn-wrapper">
                {htmlLabel}
                <div className='customize-control-responsive-iconradiobtn' data-name={name} data-value={props_value} value={props_value}>
                    {optionsHtml}
                </div>
            </div>
            {descriptionHtml}
        </>
    );

};

IconRadioButtonComponent.propTypes = {
    control: PropTypes.object.isRequired
};

export default React.memo(IconRadioButtonComponent);