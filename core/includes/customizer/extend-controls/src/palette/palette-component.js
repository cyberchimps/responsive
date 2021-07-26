import PropTypes from 'prop-types';
import { useState } from 'react';

const PaletteComponent = props => {

    const {
        id,
        choices,
        palette_type,
        label,
        description,
        link
    } = props.control.params;

    let htmlLabel = null;
    let descriptionHtml = null;
    let paletteTypeCheck = "default";
    let paletteDisplayImage = null;

    if (!choices) {
        return;
    }

    if (label) {
        htmlLabel = <span className="customize-control-title">{label}</span>;
    }

    if (description) {
        descriptionHtml = <span className="customize-control-description">{description}</span>;
    }

    if (palette_type === "color-scheme") {
        paletteTypeCheck = "color_scheme";
    }

    let linkNew = link;
    if (undefined !== linkNew) {
        let splited_values = linkNew.split("=");
        if (undefined !== splited_values[1]) {
            linkNew = splited_values[1].replace(/"/g, "");
        }
    }

    let optionsHtml = Object.keys(choices).map(choice => {
        if (choices[choice].preview_image) {
            paletteDisplayImage = <img src={choices[choice].preview_image} />;
        } else {
            paletteDisplayImage = <>
                <span className="color-scheme" style={{ background: `linear-gradient(to right, ${choices[choice].accent}, ${choices[choice].accent} 33.33%, ${choices[choice].text} 33.33%, ${choices[choice].text} 66.66%, ${choices[choice].alt_background} 66.66%, ${choices[choice].alt_background} 100%)` }}></span>
                <span className="color-scheme__check"></span>
                <span className="label">{choices[choice].label}</span>
            </>
        }

        let html = <label key={choice} htmlFor={`${id}-${choice}`} className="palette__choice">
            <span className="screen-reader-text">{choices[choice].label} design style</span>
            <input type="radio" value={choice}
                name={`_customize-${id}`} id={`${id}-${choice}`}
                className="layout"
                data-customize-setting-link={linkNew}
            />
            {paletteDisplayImage}
        </label>;
        return html;
    });

    return <>
        {htmlLabel}
        {descriptionHtml}
        <div role="group" className={`palette__wrapper ${paletteTypeCheck}`}>
            {optionsHtml}
        </div>
    </>;

};

PaletteComponent.propTypes = {
    control: PropTypes.object.isRequired
};

export default React.memo(PaletteComponent);