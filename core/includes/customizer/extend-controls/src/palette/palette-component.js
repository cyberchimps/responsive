import PropTypes from 'prop-types';
import { useState, useEffect, useRef } from 'react';
import PaletteColorPicker from './palette-color-picker.js';

const PaletteComponent = props => {

    const {
        id,
        choices,
        palette_type,
        label,
        description,
        link
    } = props.control.params;

    const [selectedChoice, setSelectedChoice] = useState(() => {
        return props.control.setting.get() || 'playful-default';
    });

    const handlePaletteChange = (choice) => {
        setSelectedChoice(choice);
        props.control.setting.set(choice);
    };

    const [isPaletteVisible, setIsPaletteVisible] = useState(false);
    const togglePaletteVisibility = (e) => {
        e.stopPropagation();
        setIsPaletteVisible(!isPaletteVisible);
    };

    const paletteWrapperRef = useRef(null);
    const buttonRef = useRef(null);

    useEffect(() => {
        const handleClickOutside = event => {
            if (
                paletteWrapperRef.current &&
                !paletteWrapperRef.current.contains(event.target) &&
                buttonRef.current &&
                !buttonRef.current.contains(event.target)
                ) {
                setIsPaletteVisible(false);
            }
        };

        window.addEventListener('mousedown', handleClickOutside);
        return () => {
            window.removeEventListener('mousedown', handleClickOutside);
        };
    }, [paletteWrapperRef, buttonRef]);

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
        let html = <label key={choice} htmlFor={`${id}-${choice}`} className={`palette__choice ${choice === selectedChoice ? 'selected' : '' }`}>
            <div className="label">{choices[choice].label}</div>
            <div className="responsive-palette-picker-control-wrapper">
                <span className="screen-reader-text">{choices[choice].label} design style</span>
                <input type="radio" value={choice}
                    name={`_customize-${id}`} id={`${id}-${choice}`}
                    className="layout"
                    data-customize-setting-link={linkNew}
                    onChange={() => handlePaletteChange(choice)}
                />
                {paletteDisplayImage}
                <PaletteColorPicker colorsPicks={choices[choice]} />
            </div>
        </label>;
        return html;
    });

    let selectedPaletteDetails = <div className="responsive-selected-palette-details">
        <div className="label">{choices[selectedChoice].label}</div>
        <div className="responsive-color-picker-btn-wrap" tabIndex="0">
            <span className="component-color-indicator responsive-color-palette-indicate" style={{ background: choices[selectedChoice].accent }}></span>
            <span className="component-color-indicator responsive-color-palette-indicate" style={{background: choices[selectedChoice].text}}></span>
            <span className="component-color-indicator responsive-color-palette-indicate" style={{ background: choices[selectedChoice].background }}></span>
            <span
                id="responsive-color-palette-btn"
                className={`dashicons ${isPaletteVisible ? 'dashicons-arrow-up-alt2' : 'dashicons-arrow-down-alt2'}`}
                onClick={togglePaletteVisibility}
                ref={buttonRef}
            ></span>
        </div>
    </div>;

    return <>
        {htmlLabel}
        {descriptionHtml}
        {selectedPaletteDetails}
        {isPaletteVisible && (
            <div role="group" className={`palette__wrapper ${paletteTypeCheck}`} ref={paletteWrapperRef}>
                {optionsHtml}
            </div>
        )}
    </>;

};

PaletteComponent.propTypes = {
    control: PropTypes.object.isRequired
};

export default React.memo(PaletteComponent);