import PropTypes from 'prop-types';
import {__} from '@wordpress/i18n';
import { useState } from 'react';

const FontPresetComponent = (props) => {
    const [selectedValue, setSelectedValue] = useState(props.control.setting.get());
    const onOptionClick = (value) => {
        console.log(value, "this is clicked");
        setSelectedValue(value);
        props.control.setting.set(value);
    };

    const { label, name, choices, description, id } = props.control.params;

    let htmlLabel = null,
        descriptionHtml = null,
        reset = __('Back to default', 'responsive');

    if (description) {
        descriptionHtml = (
            <i
                className="res-control-tooltip dashicons dashicons-editor-help"
                title={description}
            ></i>
        );
    }

    const optionsHtml = Object.entries(choices).map(
        ([choiceValue, { headingFont, bodyFont, label: choiceLabel }]) => {
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
                    <div className="font-preview">
                        <span
                            className="heading-preview"
                            style={{ fontFamily: headingFont }}
                        >
                            Ag
                        </span>
                        <br></br>
                        <br></br>
                        <span
                            className="body-preview"
                            style={{ fontFamily: bodyFont }}
                        >
                            Ag
                        </span>
                    </div>
                    <span className="font-label tooltiptext">{choiceLabel}</span>
                </button>
            );
        }
    );

    // Load all fonts from choices (both heading and body fonts)
    const loadFonts = () => {
        Object.entries(choices).forEach(([choiceValue, { headingFont, bodyFont }]) => {
            // Generate URL for Google Fonts link
            const fontsToLoad = [headingFont, bodyFont].map((fontName) => {
                const fontUrl = fontName
                    .replace(" ", "%20")
                    .replace(",", "%2C");

                return `https://fonts.googleapis.com/css?family=${fontUrl}:${responsive.googleFontsWeight}`;
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
            <label className='responsive-range-control-label'>
	    <span className="customize-control-title">{label}</span>
	    <div className="responsive-reset-slider" onClick={() => {
	    	onOptionClick( '' );
	    }}>
	    	<span className="responsive-reset-slider"><span className="dashicons dashicons-image-rotate" title={reset}></span></span>
	    </div>
	</label>
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