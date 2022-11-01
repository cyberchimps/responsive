import PropTypes from 'prop-types';
import { useState } from 'react';
import {__} from '@wordpress/i18n';

const TypographyComponent = props => {
    const {
		label,
		name,
		description,
        all_font_weight,
        id,
        connect,
        resp_inherit,
        value,
        link,
        standard_fonts,
        google_fonts,
        custom_fonts,
	} = props.control.params;

    let htmlLabel = null;
	let descriptionHtml = null;

    if (label) {
		htmlLabel = <span className="customize-control-title">{label}</span>;
	}

    if (description) {
        descriptionHtml = <i className="res-control-tooltip dashicons dashicons-editor-help" title={description}></i>;
    }

    let linkNew = link;
    if (undefined !== linkNew) {
        let splited_values = linkNew.split("=");
        if (undefined !== splited_values[1]) {
            linkNew = splited_values[1].replace(/"/g, "");
        }
    }

    if (id === 'responsive_font_family') {

        let familyDescriptionHtml = null;
        let defaultValue = __( 'Arial, Helvetica, sans-serif', 'responsive' );
        let stdFonts = standard_fonts;
        let googleFonts = google_fonts;
        let customFonts = custom_fonts;
        let optgrpOfStandardFonts = null;
        let optgrpOfCustomFonts = null;
        let optgrpOfGoogleFonts = null;
        let optgrpOfStandardFontsLabel = __( 'Standard Fonts', 'responsive' );
        let optgrpOfGoogleFontsLabel = __( 'Google Fonts', 'responsive' );
        let optgrpOfCustomFontsLabel = __( 'Custom Fonts', 'responsive-addons-pro' );
        let standardFontsOptionsHtml = null;
        let googleFontsOptionsHtml = null;
        let customFontsOptionsHtml = null;

        if (description) {
            familyDescriptionHtml = <span class="description customize-control-description">{description}</span>
        }
        if (stdFonts) {
            standardFontsOptionsHtml = Object.entries(stdFonts).map(font => {
                let html = <option key={font[0]} value={`\'${font[0]}\', ${font[1][1]}`}>{font[0]}</option>;
		        return html;
            });
        }

        if (googleFonts) {
            googleFontsOptionsHtml = Object.entries(googleFonts).map(font => {
                let html = <option key={font[0]} value={`\'${font[0]}\', ${font[1][1]}`}>{font[0]}</option>;
		        return html;
            });
        }

        if (customFonts) {
            customFontsOptionsHtml = Object.keys(customFonts).map(font => {
                 let html = <option key ={font} value={font} > {font} </option>;
                 return html;
            });

            optgrpOfCustomFonts = <optgroup label={optgrpOfCustomFontsLabel}>
             {customFontsOptionsHtml}
            </optgroup>;
        }

        optgrpOfStandardFonts = <optgroup label={optgrpOfStandardFontsLabel}>
            {standardFontsOptionsHtml}
        </optgroup>;

        optgrpOfGoogleFonts = <optgroup label={optgrpOfGoogleFontsLabel}>
            {googleFontsOptionsHtml}
        </optgroup>;


        let selectHtml = <select className='responsive-typography-select responsive-font-family-select' data-customize-setting-link={linkNew} data-connected-control={connect} data-inherit={resp_inherit} data-value={value} data-name={name}>
            <option value="">{defaultValue}</option>
            {optgrpOfStandardFonts}
            {optgrpOfCustomFonts }
            {optgrpOfGoogleFonts}
        </select>;
        return <>
            <label>
                {htmlLabel}
                {familyDescriptionHtml}
                {selectHtml}
            </label>
        </>;

    } else if (id === 'responsive_font_weight') {

        let allFonts = all_font_weight;
        let optionsHtml = null;
        optionsHtml = Object.entries(allFonts).map(fontWght => {
            let html = <option key={fontWght[0]} value={fontWght[0]}>{fontWght[1]}</option>;
		    return html;
        });

        let selectHtml = <select data-customize-setting-link={linkNew} data-connected-control={connect} data-inherit={resp_inherit} data-value={value} data-name={name}>{optionsHtml}</select>;
        return <>
            <label>
                {htmlLabel}
                {descriptionHtml}
                {selectHtml}
            </label>
        </>;
    }

};

TypographyComponent.propTypes = {
	control: PropTypes.object.isRequired
};

export default React.memo(TypographyComponent);
