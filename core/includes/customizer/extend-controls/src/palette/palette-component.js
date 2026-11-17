import PropTypes from 'prop-types';
import { useState, useEffect, useRef } from 'react';
import PaletteColorPicker from './palette-color-picker.js';
import ResponsiveColorPickerControl from '../color/responsive-color-picker-control';
import { __ } from '@wordpress/i18n';
import { CUSTOM_PALETTE_SETTING, MAX_CUSTOM_COLORS, unlinkRemovedColor } from '../color/palette-swatches';

const readCustomData = () => {
    const setting = wp.customize && wp.customize( CUSTOM_PALETTE_SETTING );
    const val = setting ? setting.get() : null;
    if ( val && Array.isArray( val.items ) ) {
        return { next_id: parseInt( val.next_id, 10 ) || 9, items: val.items };
    }
    return { next_id: 9, items: [] };
};

const writeCustomData = ( data ) => {
    const setting = wp.customize( CUSTOM_PALETTE_SETTING );
    if ( setting ) setting.set( data );
};

const colorToString = ( color ) => {
    if ( ! color ) return '';
    if ( typeof color === 'string' ) return color;
    if ( undefined !== color.rgb && undefined !== color.rgb.a && 1 !== color.rgb.a ) {
        return 'rgba(' + color.rgb.r + ',' + color.rgb.g + ',' + color.rgb.b + ',' + color.rgb.a + ')';
    }
    return color.hex || '';
};

const nextCustomName = ( items ) => {
    const used = items.map( ( i ) => { const m = /^Custom (\d+)$/.exec( i.name || '' ); return m ? parseInt( m[1], 10 ) : 0; } );
    let n = 1;
    while ( used.includes( n ) ) n++;
    return 'Custom ' + n;
};

// Places the remove-confirmation popup just below the clicked color (flipping above / clamping to the viewport).
const getConfirmPosition = ( anchor ) => {
    if ( ! anchor ) return undefined;
    const width = 280, height = 150, gap = 8, margin = 8;
    let top = anchor.bottom + gap;
    if ( top + height > window.innerHeight - margin ) top = Math.max( margin, anchor.top - gap - height );
    const left = Math.min( Math.max( margin, anchor.left - 16 ), window.innerWidth - width - margin );
    return { position: 'fixed', top, left, margin: 0 };
};

// Defined at module level so React does not remount it (and close the picker) on each parent render.
const CustomPaletteSwatch = ( { item, openPickerId, setOpenPickerId, onColor, onName, onRemove } ) => {
    const pickerId = 'responsive-inline-picker-custom-' + item.id;
    const isOpen = openPickerId === pickerId;
    const [ name, setName ] = useState( item.name );
    useEffect( () => setName( item.name ), [ item.name ] );

    useEffect( () => {
        if ( ! isOpen ) return;
        const handleClickOutside = ( event ) => {
            const clicked = event.target.closest( '.responsive-inline-color-picker' );
            if ( ! clicked || clicked.id !== pickerId ) {
                setOpenPickerId( clicked ? clicked.id : null );
            }
        };
        window.addEventListener( 'mousedown', handleClickOutside );
        return () => window.removeEventListener( 'mousedown', handleClickOutside );
    }, [ isOpen, pickerId ] );

    const commitName = () => {
        const trimmed = name.trim();
        if ( trimmed && trimmed !== item.name ) {
            onName( item.id, trimmed );
        } else {
            setName( item.name );
        }
    };

    // The picker (and its input) can unmount on outside click before blur fires, so commit on close too.
    const commitRef = useRef( commitName );
    commitRef.current = commitName;
    const wasOpen = useRef( isOpen );
    useEffect( () => {
        if ( wasOpen.current && ! isOpen ) commitRef.current();
        wasOpen.current = isOpen;
    }, [ isOpen ] );

    const header = (
        <input
            type="text"
            className="responsive-custom-palette-name"
            value={ name }
            maxLength={ 40 }
            aria-label={ __( 'Color name', 'responsive' ) }
            onChange={ ( e ) => setName( e.target.value ) }
            onBlur={ commitName }
            onKeyDown={ ( e ) => { if ( 'Enter' === e.key ) { e.preventDefault(); commitName(); } } }
        />
    );

    return (
        <div id={ pickerId } className="responsive-inline-color-picker lg-round responsive-custom-palette-color" title={ item.name }>
            <span className="responsive-custom-palette-anchor">
            <button
                type="button"
                className="responsive-custom-palette-remove"
                aria-label={ __( 'Remove', 'responsive' ) + ' ' + item.name }
                onClick={ ( e ) => { e.stopPropagation(); const r = e.currentTarget.getBoundingClientRect(); onRemove( { ...item, anchor: { top: r.top, bottom: r.bottom, left: r.left, right: r.right } } ); } }
            >
                <svg width="8" height="8" viewBox="0 0 10 10" aria-hidden="true"><path d="M1.5 1.5l7 7M8.5 1.5l-7 7" stroke="currentColor" strokeWidth="1.6" strokeLinecap="round" /></svg>
            </button>
            </span>
            <div onClick={ () => { if ( ! isOpen ) setOpenPickerId( pickerId ); } }>
                <ResponsiveColorPickerControl
                    color={ item.color }
                    onChangeComplete={ ( c ) => onColor( item.id, colorToString( c ) ) }
                    backgroundType={ 'color' }
                    inputattr={ { content: '<div id="' + pickerId + '"></div>', colorPalettes: [], default: item.color, link: '' } }
                    inputSettings={ {} }
                    is_gradient_available={ false }
                    colorType={ 'color' }
                    gradient={ '' }
                    isOpen={ isOpen }
                    selfClicked={ () => setOpenPickerId( null ) }
                    disablePaletteLink={ true }
                    headerSlot={ header }
                />
            </div>

        </div>
    );
};

const PaletteComponent = props => {

    const {
        id,
        choices,
        palette_type,
        label,
        description,
        link, 
    } = props.control.params;

    const [selectedChoice, setSelectedChoice] = useState(() => {
        return props.control.setting.get();
    });

    // Mapping between palette keys and individual setting IDs
    const paletteToSettingMapping = {
        accent: 'responsive_global_color_palette_accent_color',
        link_hover: 'responsive_global_color_palette_link_hover_color',
        text: 'responsive_global_color_palette_text_color',
        header_text: 'responsive_global_color_palette_headings_color',
        content_background: 'responsive_global_color_palette_content_bg_color',
        site_background: 'responsive_global_color_palette_site_background_color',
        alt_background: 'responsive_global_color_palette_alt_background_color',
        subtle_background: 'responsive_global_color_palette_subtle_background_color',
        secondary_neutral: 'responsive_global_color_palette_secondary_neutral_color'
    };

    // Helper function to build palette object from current individual settings
    const buildPaletteFromSettings = () => {
        const palette = {};
        Object.entries(paletteToSettingMapping).forEach(([paletteKey, settingId]) => {
            if (wp.customize(settingId)) {
                palette[paletteKey] = wp.customize(settingId).get();
            }
        });
        return palette;
    };

    const handlePaletteChange = (choice) => {
        const newSettingVal = {
            ...selectedChoice,
            style: choice,
            palette: choices[choice]
        }

        props.control.setting.set(newSettingVal);
        
        const palette = choices[choice];
        Object.entries(paletteToSettingMapping).forEach(([paletteKey, settingId]) => {
            if (palette[paletteKey] && wp.customize(settingId)) {
                wp.customize(settingId).set(palette[paletteKey]);
            }
        });
        setSelectedChoice(newSettingVal);
    };

    const [customData, setCustomData] = useState( readCustomData );
    const [pendingRemove, setPendingRemove] = useState( null );

    useEffect( () => {
        const setting = wp.customize && wp.customize( CUSTOM_PALETTE_SETTING );
        if ( ! setting ) return;
        const handler = () => setCustomData( readCustomData() );
        setting.bind( handler );
        return () => setting.unbind( handler );
    }, [] );

    const handleAddCustom = () => {
        const data = readCustomData();
        if ( data.items.length >= MAX_CUSTOM_COLORS ) return;
        const accent = wp.customize( 'responsive_global_color_palette_accent_color' );
        const newItem = { id: data.next_id, name: nextCustomName( data.items ), color: ( accent && accent.get() ) || '#3B82F6' };
        writeCustomData( { next_id: data.next_id + 1, items: [ ...data.items, newItem ] } );
        setOpenPickerId( 'responsive-inline-picker-custom-' + newItem.id );
    };
    const updateCustomItem = ( id, patch ) => {
        const data = readCustomData();
        writeCustomData( { ...data, items: data.items.map( ( i ) => ( i.id === id ? { ...i, ...patch } : i ) ) } );
    };
    const confirmRemove = () => {
        if ( ! pendingRemove ) return;
        const data = readCustomData();
        unlinkRemovedColor( 'palette' + pendingRemove.id );
        writeCustomData( { ...data, items: data.items.filter( ( i ) => i.id !== pendingRemove.id ) } );
        setPendingRemove( null );
    };

    const [isPaletteVisible, setIsPaletteVisible] = useState(false);
    const [openPickerId, setOpenPickerId] = useState(null);
    
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
        if (undefined !== color.rgb && undefined !== color.rgb.a && 1 !== color.rgb.a) {
			color = 'rgba(' + color.rgb.r + ',' + color.rgb.g + ',' + color.rgb.b + ',' + color.rgb.a + ')';
		} else {
			color = color.hex;
		}
        return color || '';
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

    const InlineThemeModColorPicker = ({ settingId, labelText, settingKey, selectedChoice }) => {
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
                        // Read all current settings to update state with complete palette
                        const updatedPalette = buildPaletteFromSettings();
                        setSelectedChoice(prev => ({
                            ...prev,
                            palette: updatedPalette
                        }));
                    }
                } else {
                    // clicked completely outside → close
                    setOpenPickerId(null);
                    // Read all current settings to update state with complete palette
                    const updatedPalette = buildPaletteFromSettings();
                    setSelectedChoice(prev => ({
                        ...prev,
                        palette: updatedPalette
                    }));
                }
            };

            window.addEventListener('mousedown', handleClickOutside);
            return () => window.removeEventListener('mousedown', handleClickOutside);
        }, [isOpen, pickerId]);

        const handleChangeComplete = (newColor) => {
            const value = toColorString(newColor);
            setColor(value);
            
            // First update the individual setting
            wp.customize(settingId).set(value);
            
            // Then read all current individual settings to build a complete palette
            // This ensures we preserve all previous color changes
            const updatedPalette = buildPaletteFromSettings();
            
            // Update the main palette setting with the complete palette
            const newSettingVal = {
                ...selectedChoice,
                palette: updatedPalette
            };
            props.control.setting.set(newSettingVal);
        };

        const handlePickerToggle = () => {
            if (!isOpen) {
                setOpenPickerId(pickerId);
            }
        };

        const selfClicked = () => {
            setOpenPickerId(null); 
        }

        function getDefaultColor(settingId) {
            if(settingId === "responsive_global_color_palette_text_color")
            {
                return "#404040";
            }
            else if(settingId === "responsive_global_color_palette_headings_color")
            {
                return "#3B82F6";
            }
            else if(settingId === "responsive_global_color_palette_accent_color")
            {
                return "#3B82F6";
            }
            else if(settingId === "responsive_global_color_palette_link_hover_color")
            {
                return "#007fff";
            }
            else if(settingId === "responsive_global_color_palette_content_bg_color"){
                return "#ffffff";
            }
            else if(settingId === "responsive_global_color_palette_site_background_color"){
                return "#f8fafc";
            }
            else if(settingId === "responsive_global_color_palette_alt_background_color"){
                return "#ffffff";
            }
            else if(settingId === "responsive_global_color_palette_subtle_background_color"){
                return "#D4D4D4";
            }
            else if(settingId === "responsive_global_color_palette_secondary_neutral_color"){
                return "#AAAAAA";
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
                        disablePaletteLink={true}
                        selfClicked={selfClicked}
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
        let html = <label key={choice} htmlFor={`${id}-${choice}`} className={`palette__choice ${choice === selectedChoice?.style ? 'selected' : '' }`}>
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
                <InlineThemeModColorPicker key={0} settingId={'responsive_global_color_palette_accent_color'} labelText={'Primary Accent'} settingKey={'accent'} selectedChoice={selectedChoice} />
                <InlineThemeModColorPicker key={1} settingId={'responsive_global_color_palette_link_hover_color'} labelText={'Secondary Accent'} settingKey={'link_hover'} selectedChoice={selectedChoice} />
                <InlineThemeModColorPicker key={2} settingId={'responsive_global_color_palette_text_color'} labelText={'Primary Contrast'} settingKey={'text'} selectedChoice={selectedChoice} />
                <InlineThemeModColorPicker key={3} settingId={'responsive_global_color_palette_headings_color'} labelText={'Secondary Contrast'} settingKey={'header_text'} selectedChoice={selectedChoice} />
                <InlineThemeModColorPicker key={4} settingId={'responsive_global_color_palette_content_bg_color'} labelText={'Primary Background'} settingKey={'content_background'} selectedChoice={selectedChoice} />
                <InlineThemeModColorPicker key={5} settingId={'responsive_global_color_palette_site_background_color'} labelText={'Secondary Background'} settingKey={'site_background'} selectedChoice={selectedChoice} />
                <InlineThemeModColorPicker key={6} settingId={'responsive_global_color_palette_alt_background_color'} labelText={'Alternate Background'} settingKey={'alt_background'} selectedChoice={selectedChoice} />
                <InlineThemeModColorPicker key={7} settingId={'responsive_global_color_palette_subtle_background_color'} labelText={'Primary Neutral'} settingKey={'subtle_background'} selectedChoice={selectedChoice} />
                <InlineThemeModColorPicker key={8} settingId={'responsive_global_color_palette_secondary_neutral_color'} labelText={'Secondary Neutral'} settingKey={'secondary_neutral'} selectedChoice={selectedChoice} />
                {customData.items.map( ( item ) => (
                    <CustomPaletteSwatch
                        key={ 'custom-' + item.id }
                        item={ item }
                        openPickerId={ openPickerId }
                        setOpenPickerId={ setOpenPickerId }
                        onColor={ ( id, color ) => updateCustomItem( id, { color } ) }
                        onName={ ( id, name ) => updateCustomItem( id, { name } ) }
                        onRemove={ setPendingRemove }
                    />
                ) ) }
                { customData.items.length < MAX_CUSTOM_COLORS && (
                    <button type="button" className="responsive-add-custom-color" onClick={ handleAddCustom } aria-label={ __( 'Add a custom color', 'responsive' ) } title={ __( 'Add a custom color', 'responsive' ) }>
                        <svg width="12" height="12" viewBox="0 0 12 12" aria-hidden="true"><path d="M6 1.5v9M1.5 6h9" stroke="currentColor" strokeWidth="1.5" strokeLinecap="round" /></svg>
                    </button>
                ) }
            </div>
        </div>
    </div>

    return <>
        {htmlLabel}
        {descriptionHtml}
        {selectedPaletteHeader}
        {selectedPaletteColorsRow}
        { pendingRemove && (
            <div className="responsive-palette-confirm-backdrop" onMouseDown={ () => setPendingRemove( null ) }>
                <div className="responsive-palette-confirm" role="alertdialog" aria-modal="true" style={ getConfirmPosition( pendingRemove.anchor ) } onMouseDown={ ( e ) => e.stopPropagation() }>
                    <div className="responsive-palette-confirm-title">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#f59e0b" strokeWidth="2" aria-hidden="true"><circle cx="12" cy="12" r="10" /><path d="M12 7v6M12 16.5v.5" strokeLinecap="round" /></svg>
                        <span>{ __( 'Remove', 'responsive' ) } &quot;{ pendingRemove.name }&quot; { __( 'from the palette?', 'responsive' ) }</span>
                    </div>
                    <p>{ __( 'Elements using this color will lose it until the color is added back.', 'responsive' ) }</p>
                    <div className="responsive-palette-confirm-actions">
                        <button type="button" className="is-cancel" onClick={ () => setPendingRemove( null ) }>{ __( 'Cancel', 'responsive' ) }</button>
                        <button type="button" className="is-remove" onClick={ confirmRemove }>{ __( 'Remove', 'responsive' ) }</button>
                    </div>
                </div>
            </div>
        ) }
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