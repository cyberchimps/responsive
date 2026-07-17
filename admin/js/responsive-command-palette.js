( function ( wp ) {
	'use strict';
	if ( ! wp || ! wp.data || ! wp.commands || ! window.responsiveCommandPalette ) {
		return;
	}
	const { dispatch } = wp.data;
	const { store: commandsStore } = wp.commands;
	const sections = window.responsiveCommandPalette.sections || [];
	const iconUrl = window.responsiveCommandPalette.iconUrl || '';
	const whiteLabelThemeName = window.localize?.whiteLabelSettings?.theme_name || 'Responsive';
	if ( sections.length === 0 ) {
		return;
	}
	const { createElement } = wp.element;
	const responsiveIcon = iconUrl ? createElement(
		'img',
		{
			src: iconUrl,
			alt: whiteLabelThemeName + ' Theme',
			width: 20,
			height: 20,
		}
	) : null;
	function registerResponsiveCommands() {
		sections.forEach( function ( section ) {
			try {
				dispatch( 'core/commands' ).registerCommand( {
					name: section.name,
					label: section.label,
					searchLabel: section.searchLabel || section.label,
					icon: responsiveIcon,
					callback: function () {
						window.location.href = section.url;
					},
				} );
			} catch ( error ) {
				console.error( 'Responsive Command Palette: Failed to register', section.label, error );
			}
		} );
	}
    
	// Initialize the command registration and event handlers.
	const init = () => {
		registerResponsiveCommands();
		// The Command Palette UI is not mounted by default on all WP Admin pages.
		// We need to render it so Ctrl + K actually works globally.
		if ( wp.commands && wp.commands.CommandMenu && wp.element && wp.element.render ) {
			// We removed the manual rendering of CommandMenu because it causes a MutationObserver
			// TypeError in newer WordPress versions when mounted outside of its expected React context.
			// WordPress handles the Command Palette natively on pages that support it.
			// Some WP Admin pages don't have the ShortcutProvider wrapper for Cmd+K.
			// We can add a simple fallback listener to manually open it.
			document.addEventListener( 'keydown', function( event ) {
				if ( ( event.ctrlKey || event.metaKey ) && event.key.toLowerCase() === 'k' ) {
					event.preventDefault();
					if ( wp.data.dispatch( 'core/commands' ) && wp.data.dispatch( 'core/commands' ).open ) {
						wp.data.dispatch( 'core/commands' ).open();
					} else {
						console.log('Responsive Command Palette: core/commands open() not available.');
					}
				}
			} );
		} else {
			console.log('Responsive Command Palette: wp.commands.CommandMenu or wp.element.render is NOT available.', !!wp.commands.CommandMenu, !!wp.element, !!wp.element.render);
		}
	}
	// Wait for the editor to be ready before registering commands.
	if ( wp.domReady ) {
		wp.domReady( init );
	} else {
		if ( document.readyState === 'loading' ) {
			document.addEventListener( 'DOMContentLoaded', init );
		} else {
			init();
		}
	}
} )( window.wp );
