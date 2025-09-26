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
        link, 
    } = props.control.params;

    const didMountRef = useRef(false); 

    const [selectedChoice, setSelectedChoice] = useState(() => {
        return props.control.setting.get() || 'playful-default';
    });

    useEffect(() => {
    const setting = props.control.setting;
    const handler = (newVal) => setSelectedChoice(newVal || 'playful-default');
    setting.bind(handler);
    return () => setting.unbind(handler);
    }, [props.control.setting]);

    useEffect(() => {
        if(!didMountRef.current)
        {
            didMountRef.current = true; 
            return; 
        }
        if (!choices || !selectedChoice) return;
        if (typeof wp === 'undefined' || !wp.customize) return;

        const palette = choices[selectedChoice];
        if (!palette) return;

        // Map palette keys → Customizer setting IDs
        const mapping = {
            accent: 'responsive_global_color_palette_accent_color',
            link_hover: 'responsive_global_color_palette_link_hover_color',
            text: 'responsive_global_color_palette_text_color',
            header_text: 'responsive_global_color_palette_headings_color',
            content_background: 'responsive_global_color_palette_content_bg_color',
            site_background: 'responsive_global_color_palette_site_background_color',
            alt_background: 'responsive_global_color_palette_alt_background_color'
        };
        Object.entries(mapping).forEach(([paletteKey, settingId]) => {
            if (palette[paletteKey] && wp.customize(settingId)) {
                wp.customize(settingId).set(palette[paletteKey]);
            }
        });
    }, [selectedChoice, choices]);

    const handlePaletteChange = (choice) => {
        props.control.setting.set(choice);
        
        const palette = choices[choice];
        const mapping = {
            accent: 'responsive_global_color_palette_accent_color',
            link_hover: 'responsive_global_color_palette_link_hover_color',
            text: 'responsive_global_color_palette_text_color',
            header_text: 'responsive_global_color_palette_headings_color',
            content_background: 'responsive_global_color_palette_content_bg_color',
            site_background: 'responsive_global_color_palette_site_background_color',
            alt_background: 'responsive_global_color_palette_alt_background_color'
        };
        Object.entries(mapping).forEach(([paletteKey, settingId]) => {
            if (palette[paletteKey] && wp.customize(settingId)) {
                // wp.customize(settingId).set(palette[paletteKey]);
                 propagateGlobalColor(settingId, palette[paletteKey], wp);
            }
        });
        setSelectedChoice(choice);
    };

    const [isPaletteVisible, setIsPaletteVisible] = useState(false);
    const [openPickerId, setOpenPickerId] = useState(null);
    const propagateGlobalColor = (settingId, value, wp) => {
        if (!wp?.customize || !wp.customize(settingId)) return;
        wp.customize(settingId).set(value);

        /*
            Defining scope of individual global color settings
        */
        const propagationMap = {
            'responsive_global_color_palette_headings_color': [
            'responsive_header_text_color',
            'responsive_header_site_title_color',
            'responsive_header_menu_link_color',
            'responsive_header_secondary_menu_link_color'
            ],
            'responsive_global_color_palette_accent_color': [
            'responsive_link_color',
            'responsive_button_color',
            'responsive_button_hover_color',
            'responsive_meta_text_color',
            'responsive_sidebar_link_color',
            'responsive_shop_product_rating_color',
            'responsive_cart_buttons_hover_color',
            'responsive_cart_checkout_button_color'
            ],
            'responsive_global_color_palette_text_color': [
            'responsive_body_text_color',
            'responsive_sidebar_text_color',
            'responsive_sidebar_headings_color',
            'responsive_h1_text_color',
            'responsive_h2_text_color',
            'responsive_h3_text_color',
            'responsive_h4_text_color',
            'responsive_h5_text_color',
            'responsive_h6_text_color',
            'responsive_all_heading_text_color'
            ],
            'responsive_global_color_palette_link_hover_color': [
            'responsive_link_hover_color'
            ],
            'responsive_global_color_palette_content_bg_color': [
            'responsive_box_background_color',
            'responsive_sidebar_background_color',
            'responsive_add_to_cart_button_text_color',
            'responsive_cart_buttons_text_color',
            'responsive_cart_checkout_button_text_color'
            ],
            'responsive_global_color_palette_alt_background_color': [
            'background_color',
            'responsive_alt_background_color'
            ],
            'responsive_global_color_palette_site_background_color': [
            'responsive_site_background_color'
            ]
        };

        if (propagationMap[settingId]) {
            propagationMap[settingId].forEach(rId => {
            if (wp.customize(rId)) {
                wp.customize(rId).set(value);
            }
            });
        }
    };
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
                    padding: 0 !important;
                    width: 26px !important;
                    border-radius: 50% !important;
                    min-height: 26px !important;
                }
            `;
            document.head.appendChild(style);
        }
    }, []);

    const InlineThemeModColorPicker = ({ settingId, labelText }) => {
        const pickerId = `responsive-inline-picker-${settingId}`;
        const pickerRef = useRef(null);
        const [color, setColor] = useState(() => {
            if (typeof wp !== 'undefined' && wp.customize && wp.customize(settingId)) {
                return wp.customize(settingId).get();
            }
            return '';
        });

        const isOpen = openPickerId === pickerId;

        useEffect(() => {
            if (typeof wp !== 'undefined' && wp.customize && wp.customize(settingId)) {
                const setting = wp.customize(settingId);
                const handler = (newVal) => setColor(newVal);
                const unbind = setting.bind(handler);
                return () => setting.unbind(handler);
            }
        }, [settingId]);

        useEffect(() => {
            /*
                This useEffect handles closing the InlineThemeModPicker picker when clicking outside
            */
            const handleClickOutside = (event) => {
                if (!isOpen) return;

                const clickedInlinePicker = event.target.closest('.responsive-inline-color-picker');

                if (clickedInlinePicker) {
                    // if I clicked inside another picker (not this one) → close this
                    if (clickedInlinePicker.id !== pickerId) {
                        setOpenPickerId(clickedInlinePicker.id  );
                    }
                } else {
                    // clicked completely outside → close
                    setOpenPickerId(null);
                }
            };

            window.addEventListener('mousedown', handleClickOutside);
            return () => window.removeEventListener('mousedown', handleClickOutside);
        }, [isOpen, pickerId]);

        const handleChangeComplete = (newColor) => {
            const value = toColorString(newColor);
            setColor(value);

            propagateGlobalColor(settingId, value, wp);
        };

        const handlePickerToggle = () => {
            if (!isOpen) {
                setOpenPickerId(pickerId);
            } else {
                setOpenPickerId(null);
            }
        };

        function getDefaultColor(settingId) {
            if(settingId === "responsive_global_color_palette_text_color")
            {
                return "#364151";
            }
            else if(settingId === "responsive_global_color_palette_headings_color")
            {
                return "#fcba03";
            }
            else if(settingId === "responsive_global_color_palette_accent_color")
            {
                return "#0066CC";
            }
            else if(settingId === "responsive_global_color_palette_link_hover_color")
            {
                return "#007fff";
            }
            else if(settingId === "responsive_global_color_palette_content_bg_color"){
                return "#ffffff";
            }
            else if(settingId === "responsive_global_color_palette_site_background_color"){
                return "#f0f5fa";
            }
            else if(settingId === "responsive_global_color_palette_alt_background_color"){
                return "#eaeaea";
            }
            return "#ffffff";

        }
        const inputattr = {
            content: `<div id="${pickerId}"></div>`,
            colorPalettes: [],
            default: getDefaultColor(settingId),
            link: ''
        };

        return (
            <div id={pickerId} className="responsive-inline-color-picker lg-round" ref={pickerRef} title={labelText}>
                <div onClick={handlePickerToggle}>
                    <ResponsiveColorPickerControl
                        color={color}
                        onChangeComplete={handleChangeComplete}
                        backgroundType={'color'}
                        inputattr={inputattr}
                        inputSettings={{}}
                        is_gradient_available={false}
                        colorType={'color'}
                        gradient={''}
                        isOpen={isOpen}
                    />
                </div>
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
            {/* not showing the color palette name */}
            {/* <div className="label">{choices[selectedChoice].label}</div> */} 
            <div className="label">Your color palette</div>
            <span
                id="responsive-color-palette-btn"
                className="responsive-palette-edit-icon"
                onClick={togglePaletteVisibility}
                ref={buttonRef}
            >
                <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15 2.70711L18.0052 5.71231L7.32322 16.3943L3.41646 17.2959L4.31802 13.3891L15 2.70711Z" stroke="currentColor"></path>
                    <path d="M16.0282 8.24731L13.0583 5.27747" stroke="currentColor"></path>
                </svg>
            </span>
        </div>
    </div>;

    let selectedPaletteColorsRow = <div className="responsive-selected-palette-all-colors">
        <div className="responsive-selected-palette-editor">
            <div className="responsive-selected-palette-pickers">
                <InlineThemeModColorPicker settingId={'responsive_global_color_palette_accent_color'} labelText={'Accent'} />
                <InlineThemeModColorPicker settingId={'responsive_global_color_palette_link_hover_color'} labelText={'Link Hover'} />
                <InlineThemeModColorPicker settingId={'responsive_global_color_palette_text_color'} labelText={'Text'} />
                <InlineThemeModColorPicker settingId={'responsive_global_color_palette_headings_color'} labelText={'Headings'} />
                <InlineThemeModColorPicker settingId={'responsive_global_color_palette_content_bg_color'} labelText={'Background'} />
                <InlineThemeModColorPicker settingId={'responsive_global_color_palette_site_background_color'} labelText={'Site Background'} />
                <InlineThemeModColorPicker settingId={'responsive_global_color_palette_alt_background_color'} labelText={'Alt Background'} />
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