/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */

( function() {
	var container, button, menu, links, i, len;

	// Handle off-canvas panel toggle for mobile/tablet header
	// Wait for DOM to be fully loaded
	function initOffCanvasPanel() {
		var offCanvasPanel = document.getElementById( 'responsive-off-canvas-panel' );
		var mobileHeader = document.getElementById( 'masthead-mobile' );

		var container = document.getElementsByClassName('site-header-item-toggle-button')[0];

		if (!container) {
			return;
		}

		var button = container.getElementsByClassName('menu-toggle')[0];

		if (!button) {
			return;
		}

		var menu = document.getElementById('off-canvas-menu'); // The ul tag
		var offCanvasPanelInner = document.getElementsByClassName('responsive-off-canvas-panel-inner')[0];
		var ulHasChildren = false;

		if (!menu) {
			// Checking for default menu : 
			menu = offCanvasPanelInner.getElementsByClassName( 'menu' )[0]; 
			if( menu )
			{
				ulHasChildren = menu.children.length > 0;
			}
		} else {
			ulHasChildren = menu.children.length > 0;
		}

		// Checking if there are any other elements in off canvas panel 
		var otherElementsInOffCanvas = false;

		if (offCanvasPanelInner) {
			var widgetsInOffCanvas = offCanvasPanelInner.getElementsByClassName('site-header-focus-item');

			if (!widgetsInOffCanvas) {
			} else {
				otherElementsInOffCanvas = widgetsInOffCanvas.length > 0;
			}
		}

		// Final decision logging
		if (!ulHasChildren && !otherElementsInOffCanvas) {
			button.style.display = 'none';
		} else {
			button.style.display = '';
		}

		if ( offCanvasPanel && mobileHeader ) {
			// Find toggle button in mobile header
			var mobileToggleButton = mobileHeader.querySelector( '.menu-toggle' );
			
			if ( mobileToggleButton ) {
				mobileToggleButton.addEventListener( 'click', function( e ) {
					e.preventDefault();
					e.stopPropagation();
					var offCanvasOverlay = document.querySelector( '.responsive-off-canvas-overlay' );
					var isExpanded = this.getAttribute( 'aria-expanded' ) === 'true';
					
				// Check if dropdown style (no overlay for dropdown)
				var isDropdown = offCanvasPanel.classList.contains( 'responsive-off-canvas-panel-dropdown' );
				
				if ( isExpanded ) {
					// Close off-canvas panel
					offCanvasPanel.classList.remove( 'active' );
					offCanvasPanel.setAttribute( 'aria-hidden', 'true' );
					if ( offCanvasOverlay && ! isDropdown ) {
						offCanvasOverlay.classList.remove( 'active' );
						offCanvasOverlay.setAttribute( 'aria-hidden', 'true' );
					}
					this.setAttribute( 'aria-expanded', 'false' );
					document.body.classList.remove( 'off-canvas-open' );
				} else {
					// Open off-canvas panel
					offCanvasPanel.classList.add( 'active' );
					offCanvasPanel.setAttribute( 'aria-hidden', 'false' );
					if ( offCanvasOverlay && ! isDropdown ) {
						offCanvasOverlay.classList.add( 'active' );
						offCanvasOverlay.setAttribute( 'aria-hidden', 'false' );
					}
					this.setAttribute( 'aria-expanded', 'true' );
					document.body.classList.add( 'off-canvas-open' );
					// Reinitialize submenu toggles when panel opens
					setTimeout( function() {
						if ( typeof initOffCanvasSubmenuToggles === 'function' ) {
							initOffCanvasSubmenuToggles();
						}
					}, 100 );
				}
				});
			}
		}
	}
	
	// Initialize when DOM is ready
	if ( document.readyState === 'loading' ) {
		document.addEventListener( 'DOMContentLoaded', initOffCanvasPanel );
	} else {
		initOffCanvasPanel();
	}

	// Handle off-canvas menu submenu toggles based on dropdown target setting
	var offCanvasSubmenuHandlers = [];
	function initOffCanvasSubmenuToggles() {
		var offCanvasPanel = document.getElementById( 'responsive-off-canvas-panel' );
		if ( ! offCanvasPanel ) {
			return;
		}

		// Remove existing event listeners if any
		for ( var h = 0; h < offCanvasSubmenuHandlers.length; h++ ) {
			var handler = offCanvasSubmenuHandlers[h];
			if ( handler.element && handler.fn ) {
				handler.element.removeEventListener( 'click', handler.fn, false );
			}
		}
		offCanvasSubmenuHandlers = [];

		var dropdownTarget = offCanvasPanel.getAttribute( 'data-dropdown-target' ) || 'icon';
		var mobile_menu_breakpoint = responsive_breakpoint.mobileBreakpoint;
		var breakpoint = window.matchMedia('(max-width: ' + mobile_menu_breakpoint + 'px)');

		// Function to toggle submenu
		var toggleSubmenu = function( parentLi, e ) {
			if ( e ) {
				e.preventDefault();
				e.stopPropagation();
			}

			responsiveToggleClass( parentLi, 'res-submenu-expanded' );
			
			if ( parentLi.classList.contains( 'menu-item-has-children' ) ) {
				var subMenu = parentLi.querySelector( '.sub-menu' );
				if ( subMenu ) {
					if ( parentLi.classList.contains( 'res-submenu-expanded' ) ) {
						subMenu.style.display = 'block';
						if( breakpoint.matches ) {
							parentLi.style.width = '100%';
						}
					} else {
						subMenu.style.display = 'none';
						if( breakpoint.matches ) {
							parentLi.style.width = '100%';
						}
					}
				}
			} else if ( parentLi.classList.contains( 'page_item_has_children' ) ) {
				var children = parentLi.querySelector( '.children' );
				if ( children ) {
					if ( parentLi.classList.contains( 'res-submenu-expanded' ) ) {
						children.style.display = 'block';
						if( breakpoint.matches ) {
							parentLi.style.width = '100%';
						}
					} else {
						children.style.display = 'none';
						if( breakpoint.matches ) {
							parentLi.style.width = '100%';
						}
					}
				}
			}
		};

		// Get menu items with children within off-canvas panel
		var offCanvasMenu = offCanvasPanel.querySelector( '#off-canvas-menu' );
		if ( ! offCanvasMenu ) {
			return;
		}

		var menuItemsWithChildren = offCanvasMenu.querySelectorAll( '.menu-item-has-children, .page_item_has_children' );

		for ( var i = 0; i < menuItemsWithChildren.length; i++ ) {
			var menuItem = menuItemsWithChildren[i];
			var icon = menuItem.querySelector( '.res-iconify' );
			var link = menuItem.querySelector( 'a' );

			if ( dropdownTarget === 'link' && link ) {
				// Link target: clicking the link toggles submenu
				var linkHandler = function( e ) {
					var parentLi = this.closest( '.menu-item-has-children, .page_item_has_children' );
					if ( parentLi ) {
						toggleSubmenu( parentLi, e );
					}
				};
				link.addEventListener( 'click', linkHandler, false );
				offCanvasSubmenuHandlers.push( { element: link, fn: linkHandler } );
			} else if ( dropdownTarget === 'icon' ) {
				if ( icon ) {
					// Icon target: clicking the icon toggles submenu (default behavior)
					var iconHandler = function( e ) {
						var parentLi = this.closest( '.menu-item-has-children, .page_item_has_children' );
						if ( parentLi ) {
							toggleSubmenu( parentLi, e );
						}
					};
					icon.addEventListener( 'click', iconHandler, false );
					offCanvasSubmenuHandlers.push( { element: icon, fn: iconHandler } );
				} else if ( link ) {
					// Fallback: if icon not found but dropdown target is icon, use link
					var linkHandler = function( e ) {
						var parentLi = this.closest( '.menu-item-has-children, .page_item_has_children' );
						if ( parentLi ) {
							toggleSubmenu( parentLi, e );
						}
					};
					link.addEventListener( 'click', linkHandler, false );
					offCanvasSubmenuHandlers.push( { element: link, fn: linkHandler } );
				}
			}
		}
	}

	// Initialize off-canvas submenu toggles when DOM is ready
	if ( document.readyState === 'loading' ) {
		document.addEventListener( 'DOMContentLoaded', initOffCanvasSubmenuToggles );
	} else {
		initOffCanvasSubmenuToggles();
	}

	// Reinitialize submenu toggles when dropdown target setting changes in customizer
	document.addEventListener( 'responsive-dropdown-target-changed', function( e ) {
		// Remove existing event listeners by reinitializing
		initOffCanvasSubmenuToggles();
	});

	// Handle desktop navigation toggle
	container = document.getElementById( 'site-navigation' );
	if ( ! container ) {
		return;
	}

	button = container.getElementsByTagName( 'button' )[0];
	if ( 'undefined' === typeof button ) {
		return;
	}

	menu = container.getElementsByTagName( 'ul' )[0];

	// Hide menu toggle button if menu is empty and return early.
	if ( 'undefined' === typeof menu ) {
		button.style.display = 'none';
		return;
	}

	menu.setAttribute( 'aria-expanded', 'false' );
	if ( -1 === menu.className.indexOf( 'nav-menu' ) ) {
		menu.className += ' nav-menu';
	}

	// Only handle desktop navigation if not in mobile header
	var mobileHeaderCheck = document.getElementById( 'masthead-mobile' );
	if ( ! mobileHeaderCheck || ! container.closest( '#masthead-mobile' ) ) {
		button.onclick = function() {
			let sibling = container.parentNode.parentNode.parentNode.querySelector('.responsive-header-search');
			if ( -1 !== container.className.indexOf( 'toggled' ) ) {
				container.className = container.className.replace( ' toggled', '' );
				button.setAttribute( 'aria-expanded', 'false' );
				menu.setAttribute( 'aria-expanded', 'false' );
				if( sibling ) {
					responsiveHandleHeaderSearchSlideTypeOpening(sibling, 'off');
				}
			} else {
				container.className += ' toggled';
				button.setAttribute( 'aria-expanded', 'true' );
				menu.setAttribute( 'aria-expanded', 'true' );
				if( sibling ) {
					responsiveHandleHeaderSearchSlideTypeOpening(sibling, 'on');
				}
			}

			icon = button.getElementsByTagName( 'i' )[0]
			if ( 'true' === button.getAttribute( "aria-expanded" )) {
				icon.setAttribute( 'class', 'icon-bars' );
				icon.setAttribute( 'class', 'icon-times' );
				if (document.body.classList.contains( 'mobile-menu-style-sidebar' )) {
					document.getElementById( "sidebar-menu-overlay" ).style.display = "block";
				}
			} else {
				icon.setAttribute( 'class', 'icon-bars' );
				if (document.body.classList.contains( 'mobile-menu-style-sidebar' )) {
					document.getElementById( "sidebar-menu-overlay" ).style.display = "none";
				}
			}
		};
	}

	// Get all the link elements within the menu.
	links = menu.getElementsByTagName( 'a' );

	// Each time a menu link is focused or blurred, toggle focus.
	for ( i = 0, len = links.length; i < len; i++ ) {
		links[i].addEventListener( 'focus', toggleFocus, true );
		links[i].addEventListener( 'blur', toggleFocus, true );

		// Removes focus & .focus class on an element when link opened in new tab.
		if ( links[i].target === '_blank'){
			links[i].addEventListener( 'click', newTabFocusOut );
		}
		
	}

	/**
	 * Sets or removes .focus class on an element.
	 */
	function toggleFocus() {
		var self = this;

		// Move up through the ancestors of the current link until we hit .nav-menu.
		while ( -1 === self.className.indexOf( 'nav-menu' ) ) {

			// On li elements toggle the class .focus.
			if ( 'li' === self.tagName.toLowerCase() ) {

				var previousSubMenu   = self.previousElementSibling;
				var reverseTabSubMenu = self.nextElementSibling;

				if ( -1 == self.className.indexOf( 'focus' ) ) {
					self.className += ' focus';
				}
				// On Tab blur remove focus of previous focused element.
				if( previousSubMenu ){
					previousSubMenu.classList.remove('focus');
				}
				// On reverse Tab blur remove focus of previous focused element.
				if( reverseTabSubMenu ){
					reverseTabSubMenu.classList.remove('focus');
				}	
			}

			self = self.parentElement;
		}
	}
	/**
	 * Removes focus & .focus class on an element when link opened in new tab.
	 */
	function newTabFocusOut() {
		this.blur();
		var allFocus = document.querySelectorAll( '.focus.menu-item' );
		for ( var i = 0, j = allFocus.length; i < j; i++ ){

			if( allFocus[i].classList.contains( 'focus' ) ){

				allFocus[i].blur();
				allFocus[i].classList.remove( 'focus' );
			}
		}
		
	}
	
  var responsiveToggleClass = function ( el, className ) {
    if ( el.classList.contains( className ) ) {
      el.classList.remove( className );
    } else {
      el.classList.add( className );
    }
  };

	/**
	 * Toggles `focus` class to allow submenu access on tablets.
	 */
	( function( container ) {
		var mobile_menu_breakpoint = responsive_breakpoint.mobileBreakpoint,
		breakpoint = window.matchMedia('(max-width: ' + mobile_menu_breakpoint + 'px)');
		var touchStartFn, i,
			parentLink = container.querySelectorAll( '.menu-item-has-children > .res-iconify, .page_item_has_children > .res-iconify.no-menu' );
		touchStartFn = function( e ) {
			var parent_li = this.parentNode, i;
			if ( parent_li.classList.contains( 'menu-item-has-children' ) ) {
				responsiveToggleClass( parent_li, 'res-submenu-expanded' );
				if ( parent_li.classList.contains( 'res-submenu-expanded' ) ) {
					parent_li.querySelector( '.sub-menu' ).style.display = 'block';
					if(breakpoint.matches){
						parent_li.style.width = '100%';
					}
				} else {
					parent_li.querySelector( '.sub-menu' ).style.display = 'none';
					if(breakpoint.matches){
						parent_li.style.width = 'auto';
					}
				}
			} else if ( parent_li.classList.contains( 'page_item_has_children' ) ) {
				responsiveToggleClass( parent_li, 'res-submenu-expanded' );
				if ( parent_li.classList.contains( 'res-submenu-expanded' ) ) {
					parent_li.querySelector( '.children' ).style.display = 'block';
					if(breakpoint.matches){
						parent_li.style.width = '100%';
					}
				} else {
					parent_li.querySelector( '.children' ).style.display = 'none';
					if(breakpoint.matches){
						parent_li.style.width = 'auto';
					}
				}
			}
		};

		for ( i = 0; i < parentLink.length; ++i ) {
			parentLink[i].addEventListener( 'click', touchStartFn, false );
		}
	}( container ) );

      menu_close = document.querySelectorAll( '.menu-item-has-children > a, .page_item_has_children > a' );
    	if( menu_close  ) {
        menu_close.onclick = function() {
          sub_menu = document.querySelectorAll( 'sub-menu' );
          if( sub_menu.style.display == 'block' ) {
              sub_menu.style.display = 'none';
          } else {
              sub_menu.style.display = 'block';
          }
		  sub_menu_edge = document.querySelectorAll( 'sub-menu-edge' );
		  if ( sub_menu_edge.style.display == 'block' ) {
			  sub_menu_edge.style.display = 'none';
		  } else {
			  sub_menu_edge.style.display = 'block';
		  }
    }
    }

	let siteBrandingToggle = document.querySelector( '.site-branding' );
	if (!siteBrandingToggle) {
		let element = document.querySelector( 'body' );
		element.classList.add("site-branding-off");
	}

	function responsiveHandleHeaderSearchSlideTypeOpening(ele, toggle) {
		let searchFormEle = ele.querySelector( '.search-form' );
		if( searchFormEle) {
			if( 'on' === toggle ) {
				searchFormEle.style.setProperty('right', 'auto', 'important');
			} else {
				searchFormEle.style.setProperty('right', '0', 'important');
			}
		}
	}

	// Handle off-canvas panel close button and overlay click
	function initOffCanvasCloseHandlers() {
		var offCanvasPanel = document.getElementById( 'responsive-off-canvas-panel' );
		if ( ! offCanvasPanel ) {
			return;
		}
		
		var offCanvasOverlay = document.querySelector( '.responsive-off-canvas-overlay' );
		var offCanvasClose = document.querySelector( '.responsive-off-canvas-panel-close' );
		var mobileHeader = document.getElementById( 'masthead-mobile' );
		var mobileToggleButton = mobileHeader ? mobileHeader.querySelector( '.menu-toggle' ) : null;
		
		function closeOffCanvasPanel() {
			var isDropdown = offCanvasPanel.classList.contains( 'responsive-off-canvas-panel-dropdown' );
			offCanvasPanel.classList.remove( 'active' );
			offCanvasPanel.setAttribute( 'aria-hidden', 'true' );
			if ( offCanvasOverlay && ! isDropdown ) {
				offCanvasOverlay.classList.remove( 'active' );
				offCanvasOverlay.setAttribute( 'aria-hidden', 'true' );
			}
			if ( mobileToggleButton ) {
				mobileToggleButton.setAttribute( 'aria-expanded', 'false' );
			}
			document.body.classList.remove( 'off-canvas-open' );
		}
		
		// Close panel when overlay is clicked
		if ( offCanvasOverlay ) {
			offCanvasOverlay.addEventListener( 'click', closeOffCanvasPanel );
		}
		
		// Close panel when close button is clicked
		if ( offCanvasClose ) {
			offCanvasClose.addEventListener( 'click', function( e ) {
				e.preventDefault();
				e.stopPropagation();
				closeOffCanvasPanel();
			});
		}
		
		// Close panel on Escape key
		document.addEventListener( 'keydown', function( e ) {
			if ( e.key === 'Escape' && offCanvasPanel.classList.contains( 'active' ) ) {
				closeOffCanvasPanel();
			}
		});
	}
	
	// Initialize close handlers when DOM is ready
	if ( document.readyState === 'loading' ) {
		document.addEventListener( 'DOMContentLoaded', initOffCanvasCloseHandlers );
	} else {
		initOffCanvasCloseHandlers();
	}

} )();
