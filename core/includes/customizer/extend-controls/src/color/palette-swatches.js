/**
 * Shared helpers for linking individual color controls to global palette colors.
 */
import { useState, useEffect } from 'react';
import { __ } from '@wordpress/i18n';

export const CUSTOM_PALETTE_SETTING = 'responsive_custom_palette_colors';
export const MAX_CUSTOM_COLORS = 9;

// Index === palette number (palette0..palette8).
export const FIXED_PALETTE = [
	{ settingId: 'responsive_global_color_palette_accent_color', label: __( 'Primary Accent', 'responsive' ) },
	{ settingId: 'responsive_global_color_palette_link_hover_color', label: __( 'Secondary Accent', 'responsive' ) },
	{ settingId: 'responsive_global_color_palette_text_color', label: __( 'Primary Contrast', 'responsive' ) },
	{ settingId: 'responsive_global_color_palette_headings_color', label: __( 'Secondary Contrast', 'responsive' ) },
	{ settingId: 'responsive_global_color_palette_content_bg_color', label: __( 'Primary Background', 'responsive' ) },
	{ settingId: 'responsive_global_color_palette_site_background_color', label: __( 'Secondary Background', 'responsive' ) },
	{ settingId: 'responsive_global_color_palette_alt_background_color', label: __( 'Alternate Background', 'responsive' ) },
	{ settingId: 'responsive_global_color_palette_subtle_background_color', label: __( 'Primary Neutral', 'responsive' ) },
	{ settingId: 'responsive_global_color_palette_secondary_neutral_color', label: __( 'Secondary Neutral', 'responsive' ) },
];

export const isPaletteValue = ( value ) => typeof value === 'string' && /^palette\d+$/.test( value );

export const globeIcon = (
	<svg className="responsive-global-color-globe" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.8" strokeLinecap="round" strokeLinejoin="round" aria-hidden="true">
		<circle cx="12" cy="12" r="9.5" />
		<path d="M2.5 12h19" />
		<path d="M12 2.5c2.6 2.7 4 5.9 4 9.5s-1.4 6.8-4 9.5c-2.6-2.7-4-5.9-4-9.5s1.4-6.8 4-9.5z" />
	</svg>
);

const getCustomData = () => {
	const setting = window.wp && wp.customize && wp.customize( CUSTOM_PALETTE_SETTING );
	const val = setting ? setting.get() : null;
	if ( val && Array.isArray( val.items ) ) {
		return { next_id: parseInt( val.next_id, 10 ) || 9, items: val.items };
	}
	return { next_id: 9, items: [] };
};

export const getCustomItems = () => getCustomData().items;

/**
 * Build the current list of palette colors (fixed + custom).
 */
export const getPaletteList = () => {
	const list = FIXED_PALETTE.map( ( entry, index ) => {
		const setting = wp.customize( entry.settingId );
		return { id: 'palette' + index, label: entry.label, color: setting ? setting.get() : '', custom: false };
	} );
	getCustomItems().forEach( ( item, i ) => {
		list.push( {
			id: 'palette' + item.id,
			label: item.name || __( 'Custom', 'responsive' ) + ' ' + ( i + 1 ),
			color: item.color,
			custom: true,
		} );
	} );
	return list;
};

/**
 * Re-render when any palette color changes.
 */
export const usePaletteList = () => {
	const [ list, setList ] = useState( getPaletteList );
	useEffect( () => {
		const refresh = () => setList( getPaletteList() );
		const settings = FIXED_PALETTE.map( ( e ) => wp.customize( e.settingId ) ).filter( Boolean );
		const custom = wp.customize( CUSTOM_PALETTE_SETTING );
		if ( custom ) settings.push( custom );
		settings.forEach( ( s ) => s.bind( refresh ) );
		refresh();
		return () => settings.forEach( ( s ) => s.unbind( refresh ) );
	}, [] );
	return list;
};

/**
 * Whether a raw CSS color (hex, rgb(a), named...) is light, so a contrasting tick can be chosen.
 */
const isLightCssColor = ( color ) => {
	try {
		if ( ! color ) return false;
		const probe = document.createElement( 'span' );
		probe.style.display = 'none';
		probe.style.color = color;
		document.body.appendChild( probe );
		const rgb = getComputedStyle( probe ).color;
		document.body.removeChild( probe );
		const m = rgb.match( /rgba?\(([^)]+)\)/ );
		if ( ! m ) return false;
		const [ r, g, b, a = 1 ] = m[ 1 ].split( /[,\s/]+/ ).filter( Boolean ).map( Number );
		if ( a < 0.5 ) return true; // Mostly transparent shows the light panel behind it.
		return ( 0.299 * r + 0.587 * g + 0.114 * b ) > 150;
	} catch ( e ) {
		return false;
	}
};

/**
 * Row of palette swatches. Clicking one links the control to that palette color.
 */
export const PaletteLinkRow = ( { value, onSelect } ) => {
	const list = usePaletteList();
	const renderRow = ( items, extraClass ) => (
		<div className={ 'responsive-palette-link-row' + ( extraClass ? ' ' + extraClass : '' ) } role="group" aria-label={ extraClass ? __( 'Custom colors', 'responsive' ) : __( 'Global palette', 'responsive' ) }>
			{ items.map( ( item ) => {
				const selected = value === item.id;
				return (
					<button
						key={ item.id }
						type="button"
						className={ 'responsive-palette-link-swatch' + ( selected ? ' is-selected' : '' ) }
						style={ { backgroundColor: item.color } }
						title={ item.label }
						aria-label={ item.label }
						aria-pressed={ selected }
						onClick={ () => onSelect( item.id ) }
					>
						{ selected && (
							<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke={ isLightCssColor( item.color ) ? '#000' : '#fff' } strokeWidth="3" strokeLinecap="round" strokeLinejoin="round" aria-hidden="true"><path d="M5 12.5l4.5 4.5L19 7.5" /></svg>
						) }
					</button>
				);
			} ) }
		</div>
	);
	const fixed = list.filter( ( item ) => ! item.custom );
	const custom = list.filter( ( item ) => item.custom );
	return (
		<>
			{ renderRow( fixed ) }
			{ custom.length > 0 && renderRow( custom, 'is-custom' ) }
		</>
	);
};

/**
 * Globe badge to overlay on a linked swatch.
 */
const isLightColor = ( value ) => {
	try {
		const varName = value.startsWith( 'title-above-content' ) ? `--responsive-${ value }` : `--responsive-global-${ value }`;
		const probe = document.createElement( 'span' );
		probe.style.color = `var(${ varName })`;
		probe.style.display = 'none';
		document.body.appendChild( probe );
		const rgb = getComputedStyle( probe ).color;
		document.body.removeChild( probe );
		const m = rgb.match( /rgba?\(([^)]+)\)/ );
		if ( ! m ) return false;
		const [ r, g, b, a = 1 ] = m[ 1 ].split( /[,\s/]+/ ).filter( Boolean ).map( Number );
		if ( a < 0.5 ) return false;
		// Perceived luminance (0-255); treat anything above ~190 as whitish.
		return ( 0.299 * r + 0.587 * g + 0.114 * b ) > 190;
	} catch ( e ) {
		return false;
	}
};

export const GlobeBadge = ( { value } ) => ( isPaletteValue( value ) ? <span className={ 'responsive-global-color-badge' + ( isLightColor( value ) ? ' is-light-color' : '' ) } title={ __( 'Linked to a global palette color', 'responsive' ) }>{ globeIcon }</span> : null );

/**
 * When a custom color is removed, reset every setting that referenced it to its control default.
 */
export const unlinkRemovedColor = ( paletteId ) => {
	wp.customize.control.each( ( control ) => {
		const params = control.params || {};
		const settings = control.settings || {};
		Object.keys( settings ).forEach( ( key ) => {
			const setting = settings[ key ];
			if ( ! setting || typeof setting.get !== 'function' ) return;
			const current = setting.get();
			const defaults = params.default;
			const fallbackFor = ( path ) => {
				if ( defaults && typeof defaults === 'object' && path && undefined !== defaults[ path ] ) return defaults[ path ];
				return typeof defaults === 'string' ? defaults : ( setting.default !== undefined ? setting.default : '' );
			};
			if ( current === paletteId ) {
				setting.set( fallbackFor( key ) );
			} else if ( current && typeof current === 'object' ) {
				let changed = false;
				const next = JSON.parse( JSON.stringify( current ) );
				const walk = ( node, path ) => {
					Object.keys( node ).forEach( ( k ) => {
						if ( node[ k ] === paletteId ) {
							const def = defaults && typeof defaults === 'object' ? defaults[ k ] : undefined;
							node[ k ] = undefined !== def ? def : ( setting.default && typeof setting.default === 'object' && undefined !== setting.default[ k ] ? setting.default[ k ] : '' );
							changed = true;
						} else if ( node[ k ] && typeof node[ k ] === 'object' ) {
							walk( node[ k ], path + '.' + k );
						}
					} );
				};
				walk( next, key );
				if ( changed ) setting.set( next );
			}
		} );
	} );
};
