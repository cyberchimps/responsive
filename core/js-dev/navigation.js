/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */

( function() {
	var container, button, menu, links, i, len;

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

	button.onclick = function() {
		if ( -1 !== container.className.indexOf( 'toggled' ) ) {
			container.className = container.className.replace( ' toggled', '' );
			button.setAttribute( 'aria-expanded', 'false' );
			menu.setAttribute( 'aria-expanded', 'false' );
		} else {
			container.className += ' toggled';
			button.setAttribute( 'aria-expanded', 'true' );
			menu.setAttribute( 'aria-expanded', 'true' );
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

    search_link = document.getElementById( 'res-search-link' );

    if ( search_link ) {
        search_link.onclick = function() {
            search_form = container.getElementsByTagName( 'form' )[0];
            if ( search_form.style.display == 'block' ) {
                search_form.style.display = 'none';
            } else {
                search_form.style.display = 'block';
            }
        }
    }

	search_style = document.getElementById( 'full-screen-res-search-link' );

    if ( search_style ) {
		search_style_form = document.getElementById( 'full-screen-search-wrapper' );
		search_style_form.style.display = 'none';
        search_style.onclick = function() {
			search_style_form.style.display = 'block';
            search_style_form.style.position = 'fixed';
			search_form = container.getElementsByTagName( 'form' )[0];
            search_form.style.display = 'block';
        }
    }

	search_close = document.getElementById( 'search-close' );
	if( search_close  ) {
        search_close.onclick = function() {
            search_style_form = document.getElementById( 'full-screen-search-wrapper' );
                search_style_form.style.display = 'none';
        }
    }


      menu_close = document.querySelectorAll( '.menu-item-has-children > a, .page_item_has_children > a' );
    	if( menu_close  ) {
        menu_close.onclick = function() {
          sub_menu = document.querySelectorAll( 'sub-menu' );
          if( sub_menu.style.display == 'block' ) {
              sub_menu.style.display = 'none';
          } else {
              sub_menu.style.display = 'block';
          }
    }
    }

	let siteBrandingToggle = document.querySelector( '.site-branding' );
	if (!siteBrandingToggle) {
		let element = document.querySelector( 'body' );
		element.classList.add("site-branding-off");
	}

} )();


/* global responsiveConfig */
/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */

// polyfill forEach
// https://developer.mozilla.org/en-US/docs/Web/API/NodeList/forEach#Polyfill
if ( window.NodeList && ! NodeList.prototype.forEach ) {
	NodeList.prototype.forEach = function( callback, thisArg ) {
		var i;
		var len = this.length;

		thisArg = thisArg || window;

		for ( i = 0; i < len; i++ ) {
			callback.call( thisArg, this[ i ], i, this );
		}
	};
}
// Polyfill Smooth Scroll
!function(){"use strict";function o(){var o=window,t=document;if(!("scrollBehavior"in t.documentElement.style&&!0!==o.__forceSmoothScrollPolyfill__)){var l,e=o.HTMLElement||o.Element,r=468,i={scroll:o.scroll||o.scrollTo,scrollBy:o.scrollBy,elementScroll:e.prototype.scroll||n,scrollIntoView:e.prototype.scrollIntoView},s=o.performance&&o.performance.now?o.performance.now.bind(o.performance):Date.now,c=(l=o.navigator.userAgent,new RegExp(["MSIE ","Trident/","Edge/"].join("|")).test(l)?1:0);o.scroll=o.scrollTo=function(){void 0!==arguments[0]&&(!0!==f(arguments[0])?h.call(o,t.body,void 0!==arguments[0].left?~~arguments[0].left:o.scrollX||o.pageXOffset,void 0!==arguments[0].top?~~arguments[0].top:o.scrollY||o.pageYOffset):i.scroll.call(o,void 0!==arguments[0].left?arguments[0].left:"object"!=typeof arguments[0]?arguments[0]:o.scrollX||o.pageXOffset,void 0!==arguments[0].top?arguments[0].top:void 0!==arguments[1]?arguments[1]:o.scrollY||o.pageYOffset))},o.scrollBy=function(){void 0!==arguments[0]&&(f(arguments[0])?i.scrollBy.call(o,void 0!==arguments[0].left?arguments[0].left:"object"!=typeof arguments[0]?arguments[0]:0,void 0!==arguments[0].top?arguments[0].top:void 0!==arguments[1]?arguments[1]:0):h.call(o,t.body,~~arguments[0].left+(o.scrollX||o.pageXOffset),~~arguments[0].top+(o.scrollY||o.pageYOffset)))},e.prototype.scroll=e.prototype.scrollTo=function(){if(void 0!==arguments[0])if(!0!==f(arguments[0])){var o=arguments[0].left,t=arguments[0].top;h.call(this,this,void 0===o?this.scrollLeft:~~o,void 0===t?this.scrollTop:~~t)}else{if("number"==typeof arguments[0]&&void 0===arguments[1])throw new SyntaxError("Value could not be converted");i.elementScroll.call(this,void 0!==arguments[0].left?~~arguments[0].left:"object"!=typeof arguments[0]?~~arguments[0]:this.scrollLeft,void 0!==arguments[0].top?~~arguments[0].top:void 0!==arguments[1]?~~arguments[1]:this.scrollTop)}},e.prototype.scrollBy=function(){void 0!==arguments[0]&&(!0!==f(arguments[0])?this.scroll({left:~~arguments[0].left+this.scrollLeft,top:~~arguments[0].top+this.scrollTop,behavior:arguments[0].behavior}):i.elementScroll.call(this,void 0!==arguments[0].left?~~arguments[0].left+this.scrollLeft:~~arguments[0]+this.scrollLeft,void 0!==arguments[0].top?~~arguments[0].top+this.scrollTop:~~arguments[1]+this.scrollTop))},e.prototype.scrollIntoView=function(){if(!0!==f(arguments[0])){var l=function(o){for(;o!==t.body&&!1===(e=p(l=o,"Y")&&a(l,"Y"),r=p(l,"X")&&a(l,"X"),e||r);)o=o.parentNode||o.host;var l,e,r;return o}(this),e=l.getBoundingClientRect(),r=this.getBoundingClientRect();l!==t.body?(h.call(this,l,l.scrollLeft+r.left-e.left,l.scrollTop+r.top-e.top),"fixed"!==o.getComputedStyle(l).position&&o.scrollBy({left:e.left,top:e.top,behavior:"smooth"})):o.scrollBy({left:r.left,top:r.top,behavior:"smooth"})}else i.scrollIntoView.call(this,void 0===arguments[0]||arguments[0])}}function n(o,t){this.scrollLeft=o,this.scrollTop=t}function f(o){if(null===o||"object"!=typeof o||void 0===o.behavior||"auto"===o.behavior||"instant"===o.behavior)return!0;if("object"==typeof o&&"smooth"===o.behavior)return!1;throw new TypeError("behavior member of ScrollOptions "+o.behavior+" is not a valid value for enumeration ScrollBehavior.")}function p(o,t){return"Y"===t?o.clientHeight+c<o.scrollHeight:"X"===t?o.clientWidth+c<o.scrollWidth:void 0}function a(t,l){var e=o.getComputedStyle(t,null)["overflow"+l];return"auto"===e||"scroll"===e}function d(t){var l,e,i,c,n=(s()-t.startTime)/r;c=n=n>1?1:n,l=.5*(1-Math.cos(Math.PI*c)),e=t.startX+(t.x-t.startX)*l,i=t.startY+(t.y-t.startY)*l,t.method.call(t.scrollable,e,i),e===t.x&&i===t.y||o.requestAnimationFrame(d.bind(o,t))}function h(l,e,r){var c,f,p,a,h=s();l===t.body?(c=o,f=o.scrollX||o.pageXOffset,p=o.scrollY||o.pageYOffset,a=i.scroll):(c=l,f=l.scrollLeft,p=l.scrollTop,a=n),d({scrollable:c,method:a,startTime:h,startX:f,startY:p,x:e,y:r})}}"object"==typeof exports&&"undefined"!=typeof module?module.exports={polyfill:o}:o()}();
(function() {
	'use strict';
	window.responsiveNav = {

		/**
		 * Function to init different style of focused element on keyboard users and mouse users.
		 */
		initOutlineToggle: function() {
			document.body.addEventListener( 'keydown', function() {
				document.body.classList.remove( 'hide-focus-outline' );
			});

			document.body.addEventListener( 'mousedown', function() {
				document.body.classList.add( 'hide-focus-outline' );
			});
		},

		/**
		 * Get element's offset.
		 */
		getOffset: function( el ) {
			if ( el instanceof HTMLElement ) {
				var rect = el.getBoundingClientRect();

				return {
					top: rect.top + window.pageYOffset,
					left: rect.left + window.pageXOffset
				}
			}

			return {
				top: null,
				left: null
			};
		},

		/**
		 * traverses the DOM up to find elements matching the query
		 *
		 * @param {HTMLElement} target
		 * @param {string} query
		 * @return {NodeList} parents matching query
		 */
		findParents: function( target, query ) {
			var parents = [];

			// recursively go up the DOM adding matches to the parents array
			function traverse( item ) {
				var parent = item.parentNode;
				if ( parent instanceof HTMLElement ) {
					if ( parent.matches( query ) ) {
						parents.push( parent );
					}
					traverse( parent );
				}
			}

			traverse( target );

			return parents;
		},
		/**
		 * Toggle an attribute.
		 */
		toggleAttribute: function( element, attribute, trueVal, falseVal ) {
			if ( trueVal === undefined ) {
				trueVal = true;
			}
			if ( falseVal === undefined ) {
				falseVal = false;
			}
			if ( element.getAttribute( attribute ) !== trueVal ) {
				element.setAttribute( attribute, trueVal );
			} else {
				element.setAttribute( attribute, falseVal );
			}
		},
		/**
		 * Initiate the script to process all
		 * navigation menus with submenu toggle enabled.
		 */
		initNavToggleSubmenus: function() {
			var navTOGGLE = document.querySelectorAll( '.nav--toggle-sub' );

			// No point if no navs.
			if ( ! navTOGGLE.length ) {
				return;
			}

			for ( let i = 0; i < navTOGGLE.length; i++ ) {
				window.responsiveNav.initEachNavToggleSubmenu( navTOGGLE[ i ] );
			}
		},
		initEachNavToggleSubmenu: function( nav ) {
			// Get the submenus.
			var SUBMENUS = nav.querySelectorAll( '.menu ul' );
		
			// No point if no submenus.
			if ( ! SUBMENUS.length ) {
				return;
			}
		
			for ( let i = 0; i < SUBMENUS.length; i++ ) {
				var parentMenuItem = SUBMENUS[ i ].parentNode;
				let dropdown = parentMenuItem.querySelector( '.dropdown-nav-toggle' );
				// If dropdown.
				if ( dropdown ) {
					// Toggle the submenu when we click the dropdown button.
					dropdown.addEventListener( 'click', function( e ) {
						e.preventDefault();
						if ( e.target.parentNode.parentNode.parentNode.parentNode.classList.contains( 'menu-item' ) ) {
							window.responsiveNav.toggleSubMenu( e.target.parentNode.parentNode.parentNode.parentNode );
						} else {
							window.responsiveNav.toggleSubMenu( e.target.parentNode.parentNode.parentNode );
						}
					} );
					// Add tabindex.
					dropdown.tabIndex = 0;
					// Add role button
					dropdown.setAttribute( 'role', 'button' );
					// Toggle the submenu when we press enter on the dropdown button.
					dropdown.addEventListener( 'keypress', function( e ) {
						if ( e.key === 'Enter' ) {
							window.responsiveNav.toggleSubMenu( e.target.parentNode.parentNode.parentNode );
						}
					} );
		
					// Clean up the toggle if a mouse takes over from keyboard.
					parentMenuItem.addEventListener( 'mouseleave', function( e ) {
						window.responsiveNav.toggleSubMenu( e.target, false );
					} );
		
					// When we focus on a menu link, make sure all siblings are closed.
					parentMenuItem.querySelector( 'a' ).addEventListener( 'focus', function( e ) {
						var parentMenuItemsToggled = e.target.parentNode.parentNode.querySelectorAll( 'li.menu-item--toggled-on' );
						for ( let j = 0; j < parentMenuItemsToggled.length; j++ ) {
							window.responsiveNav.toggleSubMenu( parentMenuItemsToggled[ j ], false );
						}
					} );
		
					// Handle keyboard accessibility for traversing menu.
					SUBMENUS[ i ].addEventListener( 'keydown', function( e ) {
						// These specific selectors help us only select items that are visible.
						var focusSelector = 'ul.toggle-show > li > a, ul.toggle-show > li > a .dropdown-nav-toggle';
		
						// 9 is tab KeyMap
						if ( 9 === e.keyCode ) {
							if ( e.shiftKey ) {
								// Means we're tabbing out of the beginning of the submenu.
								if ( window.responsiveNav.isfirstFocusableElement (SUBMENUS[ i ], document.activeElement, focusSelector ) ) {
									window.responsiveNav.toggleSubMenu( SUBMENUS[ i ].parentNode, false );
								}
								// Means we're tabbing out of the end of the submenu.
							} else if ( window.responsiveNav.islastFocusableElement( SUBMENUS[ i ], document.activeElement, focusSelector ) ) {
								window.responsiveNav.toggleSubMenu( SUBMENUS[ i ].parentNode, false );
							}
						}
					} );
		
					SUBMENUS[ i ].parentNode.classList.add( 'menu-item--has-toggle' );
				}
			}
		},
		/**
		 * Toggle submenus open and closed, and tell screen readers what's going on.
		 * @param {Object} parentMenuItem Parent menu element.
		 * @param {boolean} forceToggle Force the menu toggle.
		 * @return {void}
		 */
		toggleSubMenu: function( parentMenuItem, forceToggle ) {
			var toggleButton = parentMenuItem.querySelector( '.dropdown-nav-toggle' ),
				subMenu = parentMenuItem.querySelector( 'ul' );
			let parentMenuItemToggled = parentMenuItem.classList.contains( 'menu-item--toggled-on' );
			// Will be true if we want to force the toggle on, false if force toggle close.
			if ( undefined !== forceToggle && 'boolean' === ( typeof forceToggle ) ) {
				parentMenuItemToggled = ! forceToggle;
			}

			// Toggle aria-expanded status.
			toggleButton.setAttribute( 'aria-expanded', ( ! parentMenuItemToggled ).toString() );

			/*
			* Steps to handle during toggle:
			* - Let the parent menu item know we're toggled on/off.
			* - Toggle the ARIA label to let screen readers know will expand or collapse.
			*/
			if ( parentMenuItemToggled ) {
				// Toggle "off" the submenu.
				parentMenuItem.classList.remove( 'menu-item--toggled-on' );
				subMenu.classList.remove( 'toggle-show' );
				toggleButton.setAttribute( 'aria-label', responsiveConfig.screenReader.expand );

				// Make sure all children are closed.
				var subMenuItemsToggled = parentMenuItem.querySelectorAll( '.menu-item--toggled-on' );
				for ( let i = 0; i < subMenuItemsToggled.length; i++ ) {
					window.responsiveNav.toggleSubMenu( subMenuItemsToggled[ i ], false );
				}
			} else {
				// Make sure siblings are closed.
				var parentMenuItemsToggled = parentMenuItem.parentNode.querySelectorAll( 'li.menu-item--toggled-on' );
				for ( let i = 0; i < parentMenuItemsToggled.length; i++ ) {
					window.responsiveNav.toggleSubMenu( parentMenuItemsToggled[ i ], false );
				}

				// Toggle "on" the submenu.
				parentMenuItem.classList.add( 'menu-item--toggled-on' );
				subMenu.classList.add( 'toggle-show' );
				toggleButton.setAttribute( 'aria-label', responsiveConfig.screenReader.collapse );
			}
		},
		/**
		 * Returns true if element is the
		 * first focusable element in the container.
		 * @param {Object} container
		 * @param {Object} element
		 * @param {string} focusSelector
		 * @return {boolean} whether or not the element is the first focusable element in the container
		 */
		isfirstFocusableElement: function( container, element, focusSelector ) {
			var focusableElements = container.querySelectorAll( focusSelector );
			if ( 0 < focusableElements.length ) {
				return element === focusableElements[ 0 ];
			}
			return false;
		},

		/**
		 * Returns true if element is the
		 * last focusable element in the container.
		 * @param {Object} container
		 * @param {Object} element
		 * @param {string} focusSelector
		 * @return {boolean} whether or not the element is the last focusable element in the container
		 */
		islastFocusableElement: function( container, element, focusSelector ) {
			var focusableElements = container.querySelectorAll( focusSelector );
			if ( 0 < focusableElements.length ) {
				return element === focusableElements[ focusableElements.length - 1 ];
			}
			return false;
		},
		/**
		 * Initiate the script to process all drawer toggles.
		 */
		toggleDrawer: function( element, changeFocus ) {
			changeFocus = (typeof changeFocus !== 'undefined') ?  changeFocus : true;
			var toggle = element;
			var target = document.querySelector( toggle.dataset.toggleTarget );
			var _doc   = document;
			var duration = ( toggle.dataset.toggleDuration ? toggle.dataset.toggleDuration : 250 );
			window.responsiveNav.toggleAttribute( toggle, 'aria-expanded', 'true', 'false' );
			if ( target.classList.contains('show-drawer') ) {
				if ( toggle.dataset.toggleBodyClass ) {
					_doc.body.classList.remove( toggle.dataset.toggleBodyClass );
				}
				// Hide the drawer.
				target.classList.remove('active');
				target.classList.remove('pop-animated');
				setTimeout(function () {
					target.classList.remove('show-drawer');
					if ( toggle.dataset.setFocus && changeFocus ) {
						var focusElement = document.querySelector(toggle.dataset.setFocus);
						if ( focusElement ) {
							focusElement.focus();
							if ( focusElement.hasAttribute( 'aria-expanded') ) {
								window.responsiveNav.toggleAttribute( focusElement, 'aria-expanded', 'true', 'false' );
							}
						}
					}
				}, duration);
			} else {
				// Show the drawer.
				target.classList.add('show-drawer');
				// Toggle body class
				if ( toggle.dataset.toggleBodyClass ) {
					_doc.body.classList.toggle( toggle.dataset.toggleBodyClass );
				}
				setTimeout(function () {
					target.classList.add('active');
					if ( toggle.dataset.setFocus, changeFocus ) {
						var focusElement = document.querySelector(toggle.dataset.setFocus);

						if ( focusElement ) {
							if ( focusElement.hasAttribute( 'aria-expanded') ) {
								window.responsiveNav.toggleAttribute( focusElement, 'aria-expanded', 'true', 'false' );
							}
							var searchTerm = focusElement.value;
							focusElement.value = '';
							focusElement.focus();
							focusElement.value = searchTerm;
						}
					}
				}, 10);
				setTimeout(function () {
					target.classList.add('pop-animated');
				}, duration);
				// Keep Focus in Modal
				if ( target.classList.contains('popup-drawer') ) {
					// add all the elements inside modal which you want to make focusable
					var focusableElements = 'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])';
					var focusableContent = target.querySelectorAll( focusableElements );
					var firstFocusableElement = focusableContent[0]; // get first element to be focused inside modal
					var lastFocusableElement = focusableContent[ focusableContent.length - 1 ]; // get last element to be focused inside modal

					document.addEventListener( 'keydown', function(e) {
						let isTabPressed = e.key === 'Tab' || e.keyCode === 9;

						if ( ! isTabPressed ) {
							return;
						}

						if ( e.shiftKey ) { // if shift key pressed for shift + tab combination
							if ( document.activeElement === firstFocusableElement ) {
								lastFocusableElement.focus(); // add focus for the last focusable element
								e.preventDefault();
							}
						} else { // if tab key is pressed
							if ( document.activeElement === lastFocusableElement ) { // if focused has reached to last focusable element then focus first focusable element after pressing tab
								firstFocusableElement.focus(); // add focus for the first focusable element
								e.preventDefault();
							}
						}
					});
				}
			}
		},
		/**
		 * Initiate the script to process all
		 * navigation menus with small toggle enabled.
		 */
		initToggleDrawer: function() {
			var drawerTOGGLE = document.querySelectorAll( '.drawer-toggle' );

			// No point if no drawers.
			if ( ! drawerTOGGLE.length ) {
				return;
			}
			for ( let i = 0; i < drawerTOGGLE.length; i++ ) {
				drawerTOGGLE[ i ].addEventListener('click', function( event ) {
					event.preventDefault();
					window.responsiveNav.toggleDrawer( drawerTOGGLE[ i ] );
				} );
			}
			// Close Drawer if esc is pressed.
			document.addEventListener( 'keyup', function (event) {
				// 27 is keymap for esc key.
				if ( event.keyCode === 27 ) {
					event.preventDefault();
					document.querySelectorAll( '.show-drawer.active' ).forEach(function ( element ) {
						window.responsiveNav.toggleDrawer( document.querySelector('*[data-toggle-target="' + element.dataset.drawerTargetString + '"]' ) );
					} );
				}
			  });
			// Close modal on outside click.
			document.addEventListener( 'click', function (event) {
				var target = event.target;
				var modal = document.querySelector( '.show-drawer.active .drawer-overlay' );
				if ( target === modal ) {
					window.responsiveNav.toggleDrawer(document.querySelector('*[data-toggle-target="' + modal.dataset.drawerTargetString + '"]'));
				}
			} );
		},
		/**
		 * Initiate the script to process all
		 * navigation menus with small toggle enabled.
		 */
		initMobileToggleSub: function() {
			var modalMenus = document.querySelectorAll( '.has-collapse-sub-nav' );

			modalMenus.forEach( function( modalMenu ) {
				var activeMenuItem = modalMenu.querySelector( '.current-menu-item' );
				if ( activeMenuItem ) {
					window.responsiveNav.findParents( activeMenuItem, 'li' ).forEach( function( element ) {
						var subMenuToggle = element.querySelector( '.drawer-sub-toggle' );
						if ( subMenuToggle ) {
							window.responsiveNav.toggleDrawer( subMenuToggle, true );
						}
					} );
				}
			} );
			var drawerSubTOGGLE = document.querySelectorAll( '.drawer-sub-toggle' );
			// No point if no drawers.
			if ( ! drawerSubTOGGLE.length ) {
				return;
			}
		
			for ( let i = 0; i < drawerSubTOGGLE.length; i++ ) {
				drawerSubTOGGLE[ i ].addEventListener('click', function (event) {
					event.preventDefault();
					window.responsiveNav.toggleDrawer( drawerSubTOGGLE[ i ] );
				} );
			}
		},
		/**
		 * Initiate the script to process all
		 * navigation menus check to close mobile.
		 */
		initMobileToggleAnchor: function() {
			var mobileModal = document.getElementById( 'mobile-drawer' );
			// No point if no drawers.
			if ( ! mobileModal ) {
				return;
			}
			var menuLink = mobileModal.querySelectorAll( 'a' );
			// No point if no links.
			if ( ! menuLink.length ) {
				return;
			}
			for ( let i = 0; i < menuLink.length; i++ ) {
				menuLink[ i ].addEventListener('click', function (event) {
					window.responsiveNav.toggleDrawer( mobileModal.querySelector( '.menu-toggle-close' ), false );
				} );
			}
		},
		/**
		 * Initiate setting the top padding for hero title when page is transparent.
		 */
		initTransHeaderPadding: function() {
			if ( document.body.classList.contains( 'no-header' ) ) {
				return;
			}
			if ( ! document.body.classList.contains( 'transparent-header' ) || ! document.body.classList.contains( 'mobile-transparent-header' ) ) {
				return;
			}
			var titleHero = document.querySelector( '.entry-hero-container-inner' ),
				header =  document.querySelector( '#masthead' );
			var updateHeroPadding = function( e ) {
				header
				if ( responsiveConfig.breakPoints.desktop <= window.innerWidth ) {
					if ( ! document.body.classList.contains( 'transparent-header' ) ) {
						titleHero.style.paddingTop = 0;
					} else {
						titleHero.style.paddingTop = header.offsetHeight + 'px';
					}
				} else {
					if ( ! document.body.classList.contains( 'mobile-transparent-header' ) ) {
						titleHero.style.paddingTop = 0;
					} else {
						titleHero.style.paddingTop = header.offsetHeight + 'px';
					}
				}
			}
			if ( titleHero ) {
				window.addEventListener( 'resize', updateHeroPadding, false );
				window.addEventListener( 'scroll', updateHeroPadding, false );
				window.addEventListener( 'load', updateHeroPadding, false );
				updateHeroPadding();
			}
		},
		/**
		 * Initiate the script to stick the header.
		 * http://www.mattmorgante.com/technology/sticky-navigation-bar-javascript
		 */
		initStickyHeader: function() {
			var desktopSticky = document.querySelector( '#main-header .responsive-sticky-header' ),
				mobileSticky  = document.querySelector( '#mobile-header .responsive-sticky-header' ),
				wrapper = document.getElementById( 'wrapper' ),
				proSticky = document.querySelectorAll( '.responsive-pro-fixed-above' ),
				proElements = document.querySelectorAll( '.responsive-before-wrapper-item' ),
				activeSize = 'mobile',
				lastScrollTop = 0,
				activeOffsetTop = 0;
				if ( responsiveConfig.breakPoints.desktop <= window.innerWidth ) {
					activeSize = 'desktop';
					if ( desktopSticky ) {
						desktopSticky.style.position = 'static';
						activeOffsetTop = window.responsiveNav.getOffset( desktopSticky ).top;
						desktopSticky.style.position = null;
					}
				} else {
					if ( mobileSticky ) {
						mobileSticky.style.position = 'static';
						activeOffsetTop = window.responsiveNav.getOffset( mobileSticky ).top;
						mobileSticky.style.position = null;
					}
				}
				var updateSticky = function( e ) {
					var activeHeader;
					var offsetTop = window.responsiveNav.getOffset( wrapper ).top;
					if ( document.body.classList.toString().includes( 'boom_bar-static-top' ) ) {
						var boomBar = document.querySelector( '.boom_bar' );
						offsetTop = window.responsiveNav.getOffset( wrapper ).top - boomBar.offsetHeight;
					}
					if ( proElements.length ) {
						var proElementOffset = 0;
						for ( let i = 0; i < proElements.length; i++ ) {
							proElementOffset = proElementOffset + proElements[ i ].offsetHeight;
						}
						offsetTop = window.responsiveNav.getOffset( wrapper ).top - proElementOffset;
					}
					if ( proSticky.length ) {
						var proOffset = 0;
						for ( let i = 0; i < proSticky.length; i++ ) {
							proOffset = proOffset + proSticky[ i ].offsetHeight;
						}
						offsetTop = window.responsiveNav.getOffset( wrapper ).top + proOffset;
					}
					if ( responsiveConfig.breakPoints.desktop <= window.innerWidth ) {
						activeHeader = desktopSticky;
					} else {
						activeHeader = mobileSticky;
					}
					if ( ! activeHeader ) {
						return;
					}
					if ( responsiveConfig.breakPoints.desktop <= window.innerWidth ) {
						if ( activeSize === 'mobile' ) {
							activeOffsetTop = window.responsiveNav.getOffset( activeHeader ).top;
							activeSize = 'desktop';
						} else if ( e && e === 'updateActive' ) {
							activeHeader.style.top = 'auto';
							activeOffsetTop = window.responsiveNav.getOffset( activeHeader ).top;
							activeSize = 'desktop';
						}
					} else {
						if ( activeSize === 'desktop' ) {
							activeOffsetTop = window.responsiveNav.getOffset( activeHeader ).top;
							activeSize = 'mobile';
						} else if ( e && e === 'updateActive' ) {
							activeHeader.style.top = 'auto';
							activeOffsetTop = window.responsiveNav.getOffset( activeHeader ).top;
							activeSize = 'mobile';
						}
					}
					var parent = activeHeader.parentNode;
					var shrink = activeHeader.getAttribute( 'data-shrink' );
					var revealScroll = activeHeader.getAttribute( 'data-reveal-scroll-up' );
					var startHeight = parseInt( activeHeader.getAttribute( 'data-start-height' ) );
					if ( ! startHeight || ( e && undefined !== e.type && ( 'orientationchange' === e.type ) ) ) {
						activeHeader.setAttribute( 'data-start-height', activeHeader.offsetHeight );
						startHeight = activeHeader.offsetHeight;
						if ( parent.classList.contains( 'site-header-upper-inner-wrap' ) ) {
							parent.style.height = null;
							if ( e && undefined !== e.type && ( 'orientationchange' === e.type ) ) {
								if ( activeHeader.classList.contains( 'item-is-fixed' ) ) {
									setTimeout(function(){
										parent.style.height = Math.floor( parent.offsetHeight + activeHeader.offsetHeight ) + 'px';
									}, 21);
								} else {
									setTimeout(function(){ parent.style.height = parent.offsetHeight + 'px'; }, 21);
								}
							} else {
								parent.style.height = parent.offsetHeight + 'px';
							}
						} else if ( parent.classList.contains( 'site-header-inner-wrap' ) ) {
							parent.style.height = null;
							parent.style.height = parent.offsetHeight + 'px';
						} else {
							parent.style.height = activeHeader.offsetHeight + 'px';
						}
					}
					if ( 'true' === shrink ) {
						var shrinkHeight = activeHeader.getAttribute( 'data-shrink-height' );
						if ( shrinkHeight ) {
							if ( 'true' === revealScroll ) {
								if ( window.scrollY  > lastScrollTop ) {
									var totalOffsetDelay = Math.floor( ( Math.floor( activeOffsetTop ) - Math.floor( offsetTop ) ) + Math.floor( startHeight ) );
								} else {
									var totalOffsetDelay = Math.floor( activeOffsetTop - offsetTop );
								}
							} else {
								var totalOffsetDelay = Math.floor( activeOffsetTop - offsetTop );
							}
							var shrinkLogo = activeHeader.querySelector( '.custom-logo' );
							var customShrinkLogo = activeHeader.querySelector( '.responsive-sticky-logo' );
							var shrinkHeader = activeHeader.querySelector( '.site-main-header-inner-wrap' );
							var shrinkStartHeight = parseInt( shrinkHeader.getAttribute( 'data-start-height' ) );
							if ( ! shrinkStartHeight ) {
								shrinkHeader.setAttribute( 'data-start-height', shrinkHeader.offsetHeight );
								shrinkStartHeight = shrinkHeader.offsetHeight;
							}
							if ( window.scrollY <= totalOffsetDelay ) {
								shrinkHeader.style.height = shrinkStartHeight + 'px';
								shrinkHeader.style.minHeight = shrinkStartHeight + 'px';
								shrinkHeader.style.maxHeight = shrinkStartHeight + 'px';
								if ( shrinkLogo ) {
									shrinkLogo.style.maxHeight = '100%';
								}
								if ( customShrinkLogo ) {
									customShrinkLogo.style.maxHeight = '100%';
								}
							} else if ( window.scrollY > totalOffsetDelay ) {
								var shrinkingHeight = Math.max( shrinkHeight, shrinkStartHeight - ( window.scrollY - ( activeOffsetTop - offsetTop ) ) );
								shrinkHeader.style.height = shrinkingHeight + 'px';
								shrinkHeader.style.minHeight = shrinkingHeight + 'px';
								shrinkHeader.style.maxHeight = shrinkingHeight + 'px';
								if ( shrinkLogo ) {
									shrinkLogo.style.maxHeight = shrinkingHeight + 'px';
								}
								if ( customShrinkLogo ) {
									customShrinkLogo.style.maxHeight = shrinkingHeight + 'px';
								}
							}
						}
					}
					if ( 'true' === revealScroll ) {
						var totalOffset = Math.floor( activeOffsetTop - offsetTop );
						var currScrollTop = window.scrollY;
						var elHeight		= activeHeader.offsetHeight;
						var wScrollDiff		= lastScrollTop - currScrollTop;
						var elTop			= window.getComputedStyle( activeHeader ).getPropertyValue( 'transform' ).match(/(-?[0-9\.]+)/g);
						if ( elTop && undefined !== elTop[5] && elTop[5] ) {
							var elTopOff = parseInt( elTop[5] ) + wScrollDiff;
						} else {
							var elTopOff = 0;
						}
						var isScrollingDown = currScrollTop > lastScrollTop;
						if ( currScrollTop <= totalOffset ) {
							activeHeader.style.transform = 'translateY(0px)';
						} else if ( isScrollingDown ) {
							activeHeader.classList.add('item-hidden-above');
							activeHeader.style.transform = 'translateY(' + ( Math.abs( elTopOff ) > elHeight ? -elHeight : elTopOff ) + 'px)';
						} else {
							var totalOffset = Math.floor( activeOffsetTop - offsetTop );
							activeHeader.style.transform = 'translateY(' + ( elTopOff > 0 ? 0 : elTopOff ) + 'px)';
							activeHeader.classList.remove('item-hidden-above');
						}
						lastScrollTop = currScrollTop;
					} else {
						var totalOffset = Math.floor( activeOffsetTop - offsetTop );
					}
					if ( window.scrollY == totalOffset ) {
						activeHeader.style.top = offsetTop + 'px';
						activeHeader.classList.add('item-is-fixed');
						activeHeader.classList.add('item-at-start');
						activeHeader.classList.remove('item-is-stuck');
						parent.classList.add('child-is-fixed');
						document.body.classList.add('header-is-fixed');
					} else if ( window.scrollY > totalOffset ) {
						activeHeader.style.top = offsetTop + 'px';
						activeHeader.classList.add('item-is-fixed');
						activeHeader.classList.add('item-is-stuck');
						activeHeader.classList.remove('item-at-start');
						parent.classList.add('child-is-fixed');
						document.body.classList.add('header-is-fixed');
					} else {
						if ( activeHeader.classList.contains( 'item-is-fixed' ) ) {
							activeHeader.classList.remove( 'item-is-fixed' );
							activeHeader.classList.remove('item-at-start');
							activeHeader.classList.remove('item-is-stuck');
							activeHeader.style.height = null;
							activeHeader.style.top = null;
							parent.classList.remove('child-is-fixed');
							document.body.classList.remove( 'header-is-fixed' );
						}
					}
				}
				if ( desktopSticky || mobileSticky ) {
					window.addEventListener( 'resize', updateSticky, false );
					window.addEventListener( 'scroll', updateSticky, false );
					window.addEventListener( 'load', updateSticky, false );
					window.addEventListener( 'orientationchange', updateSticky );
					if ( document.readyState === 'complete' ) {
						updateSticky( 'updateActive' );
					}
					if ( document.body.classList.contains( 'woocommerce-demo-store' ) && document.body.classList.contains( 'responsive-store-notice-placement-above' ) ) {
						var respondToVisibility = function(element, callback) {
							var options = {
							  root: document.documentElement
							}
						  
							var observer = new IntersectionObserver( (entries, observer) => {
							  entries.forEach(entry => {
								callback(entry.intersectionRatio > 0);
							  });
							}, options);
						  
							observer.observe(element);
						  }
						respondToVisibility( document.querySelector( '.woocommerce-store-notice'), visible => {
							updateSticky('updateActive');
						});
					}
				}
		},
		getTopOffset: function() {
			var desktopSticky = document.querySelector( '#main-header .responsive-sticky-header:not([data-reveal-scroll-up="true"])' ),
				mobileSticky  = document.querySelector( '#mobile-header .responsive-sticky-header:not([data-reveal-scroll-up="true"])' ),
				activeScrollOffsetTop = 0,
				activeScrollAdminOffsetTop = 0;
			if ( responsiveConfig.breakPoints.desktop <= window.innerWidth ) {
				if ( desktopSticky ) {
					var shrink = desktopSticky.getAttribute( 'data-shrink' );
					if ( 'true' === shrink && ! desktopSticky.classList.contains( 'site-header-inner-wrap' ) ) {
						activeScrollOffsetTop = Math.floor( desktopSticky.getAttribute( 'data-shrink-height' ) );
					} else {
						activeScrollOffsetTop = Math.floor( desktopSticky.offsetHeight );
					}
				} else {
					activeScrollOffsetTop = 0;
				}
				if ( document.body.classList.contains( 'admin-bar' ) ) {
					activeScrollAdminOffsetTop = 32;
				}
			} else {
				if ( mobileSticky ) {
					var shrink = mobileSticky.getAttribute( 'data-shrink' );
					if ( 'true' === shrink ) {
						activeScrollOffsetTop = Math.floor( mobileSticky.getAttribute( 'data-shrink-height' ) );
					} else {
						activeScrollOffsetTop = Math.floor( mobileSticky.offsetHeight );
					}
				} else {
					activeScrollOffsetTop = 0;
				}
				if ( document.body.classList.contains( 'admin-bar' ) ) {
					activeScrollAdminOffsetTop = 46;
				}
			}
			return Math.floor( activeScrollOffsetTop + activeScrollAdminOffsetTop );
		},
		scrollToElement: function( element, history ) {
			history = (typeof history !== 'undefined') ? history : true;
			var offsetSticky = window.responsiveNav.getTopOffset();
			var originalTop = Math.floor( element.getBoundingClientRect().top ) - offsetSticky;
			window.scrollBy( { top: originalTop, left: 0, behavior: 'smooth' } );
			var checkIfDone = setInterval( function() {
				var atBottom = window.innerHeight + window.pageYOffset >= document.body.offsetHeight - 2;
				if ( ( Math.floor( element.getBoundingClientRect().top ) - offsetSticky === 0 ) || atBottom ) {
					//element.tabIndex = '-1';
					element.focus();
					if ( element.classList.contains( 'kt-title-item' ) ) {
						element.firstElementChild.click();
					}
					if ( history ) {
						window.history.pushState('', '', '#' + element.id );
					}
					clearInterval( checkIfDone );
				}
			}, 100 );
		},
		anchorScrollToCheck: function( e, respond ) {
			respond = (typeof respond !== 'undefined') ?  respond : null;
			if ( e.target.getAttribute('href') ) {
				var targetLink = e.target;
			} else {
				var targetLink = e.target.closest('a');
				if ( ! targetLink ) {
					return;
				}
				if ( ! targetLink.getAttribute('href') ) {
					return;
				}
			}
			if ( targetLink.parentNode && targetLink.parentNode.hasAttribute('role') && targetLink.parentNode.getAttribute('role') === 'tab' ) {
				return;
			}
			var targetID;
			if ( respond ) {
				targetID = respond.getAttribute( 'href' ).substring( respond.getAttribute('href').indexOf('#') );
			} else {
				targetID = targetLink.getAttribute('href').substring( targetLink.getAttribute('href').indexOf('#') );
			}
			var targetAnchor = document.getElementById( targetID.replace( '#', '' ) );
			if ( ! targetAnchor ) {
				//window.location.href = targetLink.getAttribute('href');
				return;
			}
			e.preventDefault();
			window.responsiveNav.scrollToElement( targetAnchor );
		},
		/**
		 * Initiate the sticky sidebar last width.
		 */
		initStickySidebarWidget: function() {
			if ( ! document.body.classList.contains( 'has-sticky-sidebar-widget' ) ) {
				return;
			}
			var offsetSticky = window.responsiveNav.getTopOffset(),
			widget         = document.querySelector( '#secondary .sidebar-inner-wrap .widget:last-child' );
			if ( widget ) { 
				widget.style.top = Math.floor( offsetSticky + 20 ) + 'px';
				widget.style.maxHeight = 'calc( 100vh - ' + Math.floor( offsetSticky + 20 ) + 'px )';
			}
		},
		/**
		 * Initiate the sticky sidebar.
		 */
		initStickySidebar: function() {
			if ( ! document.body.classList.contains( 'has-sticky-sidebar' ) ) {
				return;
			}
			var offsetSticky = window.responsiveNav.getTopOffset(),
			sidebar          = document.querySelector( '#secondary .sidebar-inner-wrap' );
			if ( sidebar ) { 
				sidebar.style.top = Math.floor( offsetSticky + 20 ) + 'px';
				sidebar.style.maxHeight = 'calc( 100vh - ' + Math.floor( offsetSticky + 20 ) + 'px )';
			}
		},
		/**
		 * Initiate the scroll to top.
		 */
		initAnchorScrollTo: function() {
			if ( document.body.classList.contains( 'no-anchor-scroll' ) ) {
				return;
			}
			if ( window.location.hash != '' ) {
				var id = location.hash.substring( 1 ),
					element;

				if ( ! ( /^[A-z0-9_-]+$/.test( id ) ) ) {
					return;
				}
				element = document.getElementById( id );
				if ( element ) {
					window.setTimeout( function() {
						window.responsiveNav.scrollToElement( element, false );
					}, 100 );
				}
			}
			var foundLinks = document.querySelectorAll( 'a[href*=\\#]:not([href=\\#]):not(.scroll-ignore):not([data-tab]):not([data-toggle])' );
			if ( ! foundLinks.length ) {
				return;
			}
			foundLinks.forEach( function( element ) {
				element.addEventListener( 'click', function( e ) {
					window.responsiveNav.anchorScrollToCheck( e );
				} );
			} );
		},
		/**
		 * Initiate the scroll to top.
		 */
		initScrollToTop: function() {
			var scrollBtn = document.getElementById( "kt-scroll-up" );
			if ( scrollBtn ) {
				var checkScrollVisiblity = function() {
					if ( window.scrollY > 100 ) {
						scrollBtn.classList.add( 'scroll-visible' );
					} else {
						scrollBtn.classList.remove( 'scroll-visible' );;
					}
				}
				window.addEventListener( 'scroll', checkScrollVisiblity );
				checkScrollVisiblity();
				// Toggle the Scroll to top on click.
				scrollBtn.addEventListener( 'click', function( e ) {
					e.preventDefault();
					//window.scrollBy( { top: 0, left: 0, behavior: 'smooth' } );
					window.scrollTo({top: 0, behavior: 'smooth'});
					document.activeElement.blur()
				} );
				// // Toggle the Scroll to top on keypress
				// scrollBtn.addEventListener( 'keypress', ( e ) => {
				// 	if ( e.key === 'Enter' ) {
				// 		document.body.scrollTop = 0;
  				// 		document.documentElement.scrollTop = 0;
				// 	}
				// } );
			}
		},
		// Initiate the menus when the DOM loads.
		init: function() {
			window.responsiveNav.initNavToggleSubmenus();
			window.responsiveNav.initToggleDrawer();
			window.responsiveNav.initMobileToggleAnchor();
			window.responsiveNav.initMobileToggleSub();
			window.responsiveNav.initOutlineToggle();
			window.responsiveNav.initStickyHeader();
			window.responsiveNav.initStickySidebar();
			window.responsiveNav.initStickySidebarWidget();
			window.responsiveNav.initTransHeaderPadding();
			window.responsiveNav.initAnchorScrollTo();
			window.responsiveNav.initScrollToTop();
		}
	}
	if ( 'loading' === document.readyState ) {
		// The DOM has not yet been loaded.
		document.addEventListener( 'DOMContentLoaded', window.responsiveNav.init );
	} else {
		// The DOM has already been loaded.
		window.responsiveNav.init();
	}
})();

