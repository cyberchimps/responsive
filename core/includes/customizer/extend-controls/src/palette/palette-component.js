import PropTypes from 'prop-types';
import { useState, useEffect, useRef } from 'react';
import PaletteColorPicker from './palette-color-picker.js';
import ResponsiveColorPickerControl from '../color/responsive-color-picker-control';

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
    const [liveColors, setLiveColors] = useState(null);
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

    // Helpers to read and subscribe to Customizer settings so edits reflect instantly
    const getLiveThemeModColors = () => {
        if (typeof wp === 'undefined' || !wp.customize) {
            return null;
        }
        const api = wp.customize;
        try {
            return {
                accent: api('responsive_link_color') && api('responsive_link_color').get(),
                link_hover: api('responsive_link_hover_color') && api('responsive_link_hover_color').get(),
                text: api('responsive_body_text_color') && api('responsive_body_text_color').get(),
                headings: api('responsive_all_heading_text_color') && api('responsive_all_heading_text_color').get(),
                background: api('responsive_box_background_color') && api('responsive_box_background_color').get(),
                site_background: api('responsive_site_background_color') && api('responsive_site_background_color').get(),
                alt_background: api('responsive_alt_background_color') && api('responsive_alt_background_color').get(),
            };
        } catch (e) {
            return null;
        }
    };

    useEffect(() => {
        const colors = getLiveThemeModColors();
        if (colors) setLiveColors(colors);

        if (typeof wp !== 'undefined' && wp.customize) {
            const api = wp.customize;
            const ids = [
                'responsive_link_color',
                'responsive_link_hover_color',
                'responsive_body_text_color',
                'responsive_all_heading_text_color',
                'responsive_box_background_color',
                'responsive_site_background_color',
                'responsive_alt_background_color',
            ];
            const unsubscribers = [];
            ids.forEach(id => {
                if (api(id)) {
                    const handler = value => {
                        setLiveColors(prev => ({ ...(prev || {}), [
                            id === 'responsive_link_color' ? 'accent' :
                            id === 'responsive_link_hover_color' ? 'link_hover' :
                            id === 'responsive_body_text_color' ? 'text' :
                            id === 'responsive_all_heading_text_color' ? 'headings' :
                            id === 'responsive_box_background_color' ? 'background' :
                            id === 'responsive_site_background_color' ? 'site_background' :
                            'alt_background'
                        ]: value }));
                    };
                    api(id, setting => {
                        const unbind = setting.bind(handler);
                        unsubscribers.push(() => setting.unbind(handler));
                    });
                }
            });
            return () => {
                unsubscribers.forEach(u => u());
            };
        }
    }, []);

    const toColorString = (color) => {
        if (!color) return '';
        if (typeof color === 'string') return color;
        if (color.rgb && color.rgb.a !== undefined) {
            return color.rgb.a !== 1 ? `rgba(${color.rgb.r},${color.rgb.g},${color.rgb.b},${color.rgb.a})` : color.hex;
        }
        return color.hex || '';
    };

    // Inject one-time CSS to make inline pickers large and circular
    useEffect(() => {
        const styleId = 'responsive-inline-palette-picker-style';
        if (!document.getElementById(styleId)) {
            const style = document.createElement('style');
            style.id = styleId;
            style.innerHTML = `
                .responsive-inline-color-picker.lg-round .wp-color-result {
                    width: 36px !important;
                    height: 36px !important;
                    min-width: 36px !important;
                    border-radius: 36px !important;
                    padding: 0 !important;
                }
            `;
            document.head.appendChild(style);
        }
    }, []);

    const InlineThemeModColorPicker = ({ settingId, labelText }) => {
        const pickerId = `responsive-inline-picker-${settingId}`;
        const [color, setColor] = useState(() => {
            if (typeof wp !== 'undefined' && wp.customize && wp.customize(settingId)) {
                return wp.customize(settingId).get();
            }
            return '';
        });

        useEffect(() => {
            if (typeof wp !== 'undefined' && wp.customize && wp.customize(settingId)) {
                const setting = wp.customize(settingId);
                const handler = (newVal) => setColor(newVal);
                const unbind = setting.bind(handler);
                return () => setting.unbind(handler);
            }
        }, [settingId]);

        const handleChangeComplete = (newColor) => {
            const value = toColorString(newColor);
            setColor(value);
            if (typeof wp !== 'undefined' && wp.customize && wp.customize(settingId)) {
                wp.customize(settingId).set(value);
            }
        };

        const inputattr = {
            content: `<div id="${pickerId}"></div>`,
            colorPalettes: [],
            default: color,
            link: ''
        };

        return (
            <div id={pickerId} className="responsive-inline-color-picker lg-round">
                <ResponsiveColorPickerControl
                    color={color}
                    onChangeComplete={handleChangeComplete}
                    backgroundType={'color'}
                    inputattr={inputattr}
                    inputSettings={{}}
                    is_gradient_available={false}
                    colorType={'color'}
                    gradient={''}
                />
            </div>
        );
    };

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
                <PaletteColorPicker colorsPicks={choices[choice]} size={'sm'} />
            </div>
        </label>;
        return html;
    });

    let selectedPaletteHeader = 
    <div className="responsive-selected-palette-details">
        <div className="responsive-selected-palette-header">
            <div className="label">{choices[selectedChoice].label}</div>
            <span
                id="responsive-color-palette-btn"
                className={`dashicons ${isPaletteVisible ? 'dashicons-arrow-up-alt2' : 'dashicons-arrow-down-alt2'}`}
                onClick={togglePaletteVisibility}
                ref={buttonRef}
            ></span>
        </div>
    </div>;

    let selectedPaletteColorsRow = <div className="responsive-selected-palette-all-colors">
        <div className="responsive-selected-palette-editor">
            <div className="responsive-selected-palette-pickers">
                <InlineThemeModColorPicker settingId={'responsive_link_color'} labelText={'Accent (Link)'} />
                <InlineThemeModColorPicker settingId={'responsive_link_hover_color'} labelText={'Link Hover'} />
                <InlineThemeModColorPicker settingId={'responsive_body_text_color'} labelText={'Text'} />
                <InlineThemeModColorPicker settingId={'responsive_all_heading_text_color'} labelText={'Headings'} />
                <InlineThemeModColorPicker settingId={'responsive_box_background_color'} labelText={'Content Background'} />
                <InlineThemeModColorPicker settingId={'responsive_site_background_color'} labelText={'Site Background'} />
                <InlineThemeModColorPicker settingId={'responsive_alt_background_color'} labelText={'Alt Background'} />
            </div>
        </div>
    </div>

    return <>
        {htmlLabel}
        {descriptionHtml}
        {selectedPaletteHeader}
        {selectedPaletteColorsRow}
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