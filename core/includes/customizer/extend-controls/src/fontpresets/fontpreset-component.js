import PropTypes from 'prop-types';
import {__} from '@wordpress/i18n';
import { useState } from 'react';

const FontPresetComponent = (props) => {
    const [selectedValue, setSelectedValue] = useState(props.control.setting.get());
    const onOptionClick = (value) => {
        setSelectedValue(value);
        props.control.setting.set(value);
    };

    const { label, name, choices, description, id } = props.control.params;

    let htmlLabel = null,
        descriptionHtml = null,
        reset = __('Back to default', 'responsive');

    if (label){
        htmlLabel = (
            <span className='customize-control-title'>{label}</span>
        );
    }

    if (description) {
        descriptionHtml = (
            <label className='responsive-font-preset-reset-control'>
	            <span className="customize-control-font-preset-description">{description}</span>
	                <div className="responsive-reset-slider" onClick={() => {
	    	            onOptionClick( '' );
	                }}>
	    	            <span className="responsive-reset-slider"><span className="dashicons dashicons-image-rotate" title={reset}></span></span>
	                </div>
	        </label>
        );
    }

    const optionsHtml = Object.entries(choices).map(
        ([choiceValue, { headingFont, bodyFont, headingWeight, bodyWeight }]) => {
            // for Exo 2 font and fonts which need ''.
            headingFont = headingFont.replace(/'/g, '');
            return (
                <button
                    id={`${id}-fontpreset-${choiceValue}`}
                    key={choiceValue}
                    type="button"
                    className={`customize-control-responsive-fontpreset__button fontpreset-button ${
                        selectedValue === choiceValue ? 'active' : ''
                    }`}
                    onClick={() => onOptionClick(choiceValue)}
                >
                    <div className="heading-preview"
                        style={{ fontFamily: "'" + headingFont + "'", fontWeight: headingWeight }}
                        >
                            Ag
                    </div>
                    <div className="body-preview"
                        style={{ fontFamily: "'" + bodyFont + "'", fontWeight: bodyWeight}}
                        >
                            Ag
                    </div>
                    <span className="font-label tooltiptext">{headingFont} / {bodyFont}</span>
                </button>
            );
        }
    );

    // Load all fonts from choices (both heading and body fonts)
    const loadFonts = () => {
        Object.entries(choices).forEach(([choiceValue, { headingFont, bodyFont, headingWeight, bodyWeight }]) => {
            // Generate URL for Google Fonts link including weights
            const fontsToLoad = [
                { font: headingFont, weight: headingWeight },
                { font: bodyFont, weight: bodyWeight }
            ].map(({ font, weight }) => {
                const fontUrl = font.replace(/ /g, "+").replace(/,/g, "%2C");
                
                return `https://fonts.googleapis.com/css?family=${fontUrl}:${weight}&display=swap`;
            });

            // Load each font by appending a <link> to the head
            fontsToLoad.forEach((fontUrl) => {
                const fontId = `font-${fontUrl.split("=")[1].split(":")[0]}`; // Create a unique ID for each font
                if (!document.getElementById(fontId)) {
                    const linkElement = document.createElement('link');
                    linkElement.id = fontId;
                    linkElement.rel = 'stylesheet';
                    linkElement.type = 'text/css';
                    linkElement.href = fontUrl;
                    document.head.appendChild(linkElement);
                }
            });
        });
    };

    // Call the loadFonts function when the component renders
    loadFonts();

    return (
        <>
            {htmlLabel}
            {descriptionHtml}
            <div
                className="customize-control-responsive-fontpreset"
                data-name={name}
                data-value={selectedValue}
                value={selectedValue}
            >
                {optionsHtml}
            </div>
        </>
    );
};

FontPresetComponent.propTypes = {
    control: PropTypes.object.isRequired
};

export default React.memo(FontPresetComponent);