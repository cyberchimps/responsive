/**
 * Customizer options
 *
 * @package Responsive WordPress theme
 */

( function( $ ) {
	
	// Declare vars.
	var api = wp.customize;
	api(
		"responsive_theme_options[sticky-header]",
		function( $swipe ) {

			$swipe.bind(
				function( pair ) {
					// Function to handle sticky header on scroll
					function handleStickyHeader() {
						if (jQuery( window ).scrollTop() > 0) {
							if ( pair === true ) {
								jQuery( '#masthead' ).addClass( "sticky-header" );
								jQuery( '#masthead-mobile' ).addClass( "sticky-header" );
								var floatingBarCheck = document.getElementById( 'floating-bar' );
								var heightOfHeaderTaken = jQuery( '#masthead' ).outerHeight() || jQuery( '#masthead-mobile' ).outerHeight();
								if ( floatingBarCheck && jQuery(window).width() > 768) {
									jQuery( '.responsive-floating-bar' ).css({ top: heightOfHeaderTaken+'px', bottom: 'auto' });
								} else if ( ( jQuery( '#masthead' ).hasClass( 'sticky-header' ) || jQuery( '#masthead-mobile' ).hasClass( 'sticky-header' ) ) && jQuery(window).width() <= 768 ) {
									jQuery( '.responsive-floating-bar' ).css({ bottom: 0, top: 'auto' });
								}
							}
						} else {
							jQuery( '#masthead' ).removeClass( "sticky-header" );
							jQuery( '#masthead-mobile' ).removeClass( "sticky-header" );
						}
					}

					if ( pair === true ) {
						jQuery( window ).scroll( handleStickyHeader );
						// Initialize on page load if already scrolled
						handleStickyHeader();
					} else {
						jQuery( window ).scroll(
							function()  {
								jQuery( '#masthead' ).removeClass( "sticky-header" );
								jQuery( '#masthead-mobile' ).removeClass( "sticky-header" );
								var floatingBarCheck = document.getElementById( 'floating-bar' );
								if ( floatingBarCheck && jQuery(window).width() > 768 ) {
									jQuery( '.responsive-floating-bar' ).css({ top: 0, bottom: 'auto' });
								}	else if ( jQuery(window).width() <= 768 ) {
									jQuery( '.responsive-floating-bar' ).css({ bottom: 0, top: 'auto' });
								}			
							}
						);
					}
				}
			);
		}
	);
	api(
		"responsive_shrink_sticky_header",
		function( $swipe ) {

			$swipe.bind(
				function( pair ) {
					if ( pair === true ) {
						jQuery( '#masthead' ).addClass( "shrink" );
						jQuery( '#masthead-mobile' ).addClass( "shrink" );
					} else {
						jQuery( '#masthead' ).removeClass( "shrink" );
						jQuery( '#masthead-mobile' ).removeClass( "shrink" );
					}
				}
			);
			// Initialize on page load
			if ( $swipe.get() === true ) {
				jQuery( '#masthead' ).addClass( "shrink" );
				jQuery( '#masthead-mobile' ).addClass( "shrink" );
			}
		}
	);

	api(
		"responsive_sticky_header_logo_option",
		function( $swipe ) {

			$swipe.bind(
				function( pair ) {
					if ( pair === true ) {
						jQuery( '#masthead' ).addClass( "sticky-logo" );
						jQuery( '#masthead-mobile' ).addClass( "sticky-logo" );
					} else {
						jQuery( '#masthead' ).removeClass( "sticky-logo" );
						jQuery( '#masthead-mobile' ).removeClass( "sticky-logo" );
					}
				}
			);
			// Initialize on page load
			if ( $swipe.get() === true ) {
				jQuery( '#masthead' ).addClass( "sticky-logo" );
				jQuery( '#masthead-mobile' ).addClass( "sticky-logo" );
			}
		}
	);

	// Function to update disable sticky header mobile menu CSS
	function updateDisableStickyHeaderMobileMenu() {
		var disable_sticky_mobile = api( 'responsive_disable_sticky_header_mobile_menu' ).get();
		var mobile_menu_breakpoint = api( 'responsive_mobile_menu_breakpoint' ).get();
		var disable_mobile_menu = api( 'responsive_disable_mobile_menu' ).get();
		
		if ( 0 === disable_mobile_menu ) {
			mobile_menu_breakpoint = 0;
		}

		jQuery( 'style#responsive-disable-sticky-header-mobile-menu' ).remove();
		
		if ( disable_sticky_mobile === true || disable_sticky_mobile === 1 ) {
			var css = '@media (max-width: ' + mobile_menu_breakpoint + 'px) {';
			css += '#masthead.sticky-header, .res-transparent-header #masthead.sticky-header, .res-transparent-header:not(.woocommerce-cart):not(.woocommerce-checkout) #masthead.sticky-header,';
			css += '#masthead-mobile.sticky-header, .res-transparent-header #masthead-mobile.sticky-header, .res-transparent-header:not(.woocommerce-cart):not(.woocommerce-checkout) #masthead-mobile.sticky-header {';
			css += 'position: relative !important;';
			css += 'scroll-behavior: smooth;';
			css += '}';
			css += '#wrapper.site-content {';
			css += 'margin-top: 0px !important;';
			css += '}';
			css += '}';
			jQuery( 'head' ).append( '<style id="responsive-disable-sticky-header-mobile-menu">' + css + '</style>' );
		}
	}

	api(
		"responsive_disable_sticky_header_mobile_menu",
		function( $swipe ) {
			$swipe.bind( function( pair ) {
				updateDisableStickyHeaderMobileMenu();
			});
		}
	);

	// Update when mobile menu breakpoint changes
	api( 'responsive_mobile_menu_breakpoint', function( value ) {
		value.bind( function() {
			updateDisableStickyHeaderMobileMenu();
		});
	});

	// Update when disable mobile menu changes
	api( 'responsive_disable_mobile_menu', function( value ) {
		value.bind( function() {
			updateDisableStickyHeaderMobileMenu();
		});
	});

	// Initialize on page load
	updateDisableStickyHeaderMobileMenu();

	api(
		"responsive_disable_author_meta",
		function( $swipe ) {

			$swipe.bind(
				function( pair ) {
					if ( pair === true ) {
						jQuery( '#author-meta' ).css( "display", "none" );
					} else {
						jQuery( '#author-meta' ).css( "display", "block" );
					}
				}
			)
		}
	);

	if ( responsive_pro.isProGreater && ! responsive_pro.isThemeGreater ) {
		api( 'responsive_button_background_image', function( value ) {
			value.bind( function( newval ) {
				$('.page.front-page .button,.blog.front-page .button,.read-more-button .hentry .read-more .more-link,input[type=button],input[type=submit],button,.button,.wp-block-button__link,div.wpforms-container-full .wpforms-form input[type=submit],body div.wpforms-container-full .wpforms-form button[type=submit],div.wpforms-container-full .wpforms-form .wpforms-page-button ').css('background-image', 'linear-gradient(to right,' + api('responsive_button_color').get() + ',' + api('responsive_button_color').get() + '),url(' + newval + ')' );
			} );
		} );

		api( 'responsive_button_color', function( value ) {
			value.bind( function( newval ) {
				if( api('responsive_button_background_image').get() ) {
					$('.page.front-page .button,.blog.front-page .button,.read-more-button .hentry .read-more .more-link,input[type=button],input[type=submit],button,.button,.wp-block-button__link,div.wpforms-container-full .wpforms-form input[type=submit],body div.wpforms-container-full .wpforms-form button[type=submit],div.wpforms-container-full .wpforms-form .wpforms-page-button ').css('background-image', 'linear-gradient(to right,' + newval + ',' + newval + '),url(' + api('responsive_button_background_image').get() + ')' );
				}
			} );
		} );
	}
	if ( responsive_pro.isProGreater && ! responsive_pro.isThemeGreater ) {
		//Inputs color
		api( 'responsive_inputs_background_image', function( value ) {
			value.bind( function( newval ) {
				$('select,textarea,input[type=tel],input[type=email],input[type=number],input[type=search],input[type=text],input[type=date],input[type=datetime],input[type=datetime-local],input[type=month],input[type=password],input[type=range],input[type=time],input[type=url],input[type=week],div.wpforms-container-full .wpforms-form input[type=date],div.wpforms-container-full .wpforms-form input[type=datetime],div.wpforms-container-full .wpforms-form input[type=datetime-local],body div.wpforms-container-full .wpforms-form input[type=email],div.wpforms-container-full .wpforms-form input[type=month],div.wpforms-container-full .wpforms-form input[type=number],div.wpforms-container-full .wpforms-form input[type=password],div.wpforms-container-full .wpforms-form input[type=range],div.wpforms-container-full .wpforms-form input[type=search],div.wpforms-container-full .wpforms-form input[type=tel],div.wpforms-container-full .wpforms-form input[type=text],div.wpforms-container-full .wpforms-form input[type=time],div.wpforms-container-full .wpforms-form input[type=url],div.wpforms-container-full .wpforms-form input[type=week],div.wpforms-container-full .wpforms-form select,div.wpforms-container-full .wpforms-form textarea,#add_payment_method table.cart td.actions .coupon .input-text,.woocommerce-cart table.cart td.actions .coupon .input-text,.woocommerce-checkout table.cart td.actions .coupon .input-text,.woocommerce form .form-row input.input-text,.woocommerce form .form-row textarea').css('background-image', 'linear-gradient(to right,' + api('responsive_inputs_background_color').get() + ',' + api('responsive_inputs_background_color').get() + '),url(' + newval + ')' );
			} );
		} );
	} else {
		api( 'responsive_inputs_background_image', function( value ) {
			value.bind( function( newval ) {
				$('#add_payment_method table.cart td.actions .coupon .input-text,.woocommerce-cart table.cart td.actions .coupon .input-text,.woocommerce-checkout table.cart td.actions .coupon .input-text,.woocommerce form .form-row input.input-text,.woocommerce form .form-row textarea').css('background-image', 'linear-gradient(to right,' + api('responsive_inputs_background_color').get() + ',' + api('responsive_inputs_background_color').get() + '),url(' + newval + ')' );
			} );
		} );
	}
	if ( responsive_pro.isProGreater && ! responsive_pro.isThemeGreater ) {
		//Inputs color
		api( 'responsive_inputs_background_color', function( value ) {
			value.bind( function( newval ) {
				if( api('responsive_inputs_background_image').get() ) {
					$('select,textarea,input[type=tel],input[type=email],input[type=number],input[type=search],input[type=text],input[type=date],input[type=datetime],input[type=datetime-local],input[type=month],input[type=password],input[type=range],input[type=time],input[type=url],input[type=week],div.wpforms-container-full .wpforms-form input[type=date],div.wpforms-container-full .wpforms-form input[type=datetime],div.wpforms-container-full .wpforms-form input[type=datetime-local],body div.wpforms-container-full .wpforms-form input[type=email],div.wpforms-container-full .wpforms-form input[type=month],div.wpforms-container-full .wpforms-form input[type=number],div.wpforms-container-full .wpforms-form input[type=password],div.wpforms-container-full .wpforms-form input[type=range],div.wpforms-container-full .wpforms-form input[type=search],div.wpforms-container-full .wpforms-form input[type=tel],div.wpforms-container-full .wpforms-form input[type=text],div.wpforms-container-full .wpforms-form input[type=time],div.wpforms-container-full .wpforms-form input[type=url],div.wpforms-container-full .wpforms-form input[type=week],div.wpforms-container-full .wpforms-form select,div.wpforms-container-full .wpforms-form textarea,#add_payment_method table.cart td.actions .coupon .input-text,.woocommerce-cart table.cart td.actions .coupon .input-text,.woocommerce-checkout table.cart td.actions .coupon .input-text,.woocommerce form .form-row input.input-text,.woocommerce form .form-row textarea').css('background-image', 'linear-gradient(to right,' + newval + ',' + newval + '),url(' + api('responsive_inputs_background_image').get() + ')' );
				}
			} );
		} );
	} else {
		//Inputs color
		api( 'responsive_inputs_background_color', function( value ) {
			value.bind( function( newval ) {
				if( api('responsive_inputs_background_image').get() ) {
					$('#add_payment_method table.cart td.actions .coupon .input-text,.woocommerce-cart table.cart td.actions .coupon .input-text,.woocommerce-checkout table.cart td.actions .coupon .input-text,.woocommerce form .form-row input.input-text,.woocommerce form .form-row textarea').css('background-image', 'linear-gradient(to right,' + newval + ',' + newval + '),url(' + api('responsive_inputs_background_image').get() + ')' );
				}
			} );
		} );
	}

	if ( responsive_pro.isProGreater && ! responsive_pro.isThemeGreater ) {
		//sidebar color
		api( 'responsive_sidebar_background_image', function( value ) {
			value.bind( function( newval ) {
				$('.responsive-site-style-boxed aside#secondary .widget-wrapper').css('background-image', 'linear-gradient(to right,' + api('responsive_sidebar_background_color').get() + ',' + api('responsive_sidebar_background_color').get() + '),url(' + newval + ')' );
			} );
		} );
		//sidebar color
		api( 'responsive_sidebar_background_color', function( value ) {
			value.bind( function( newval ) {
				if( api('responsive_sidebar_background_image').get() ) {
					$('.responsive-site-style-boxed aside#secondary .widget-wrapper').css('background-image', 'linear-gradient(to right,' + newval + ',' + newval + '),url(' + api('responsive_sidebar_background_image').get() + ')' );
				}
			} );
		} );

		//header color
		api( 'responsive_header_background_image', function( value ) {
			value.bind( function( newval ) {
				$('body:not(.res-transparent-header) .site-header').css('background-image', 'linear-gradient(to right,' + api('responsive_header_background_color').get() + ',' + api('responsive_header_background_color').get() + '),url(' + newval + ')' );
			} );
		} );
		//header color
		// api( 'responsive_header_background_color', function( value ) {
		// 	value.bind( function( newval ) {
		// 		if( api('responsive_header_background_image').get() ) {
		// 			$('body:not(.res-transparent-header) .site-header').css('background-image', 'linear-gradient(to right,' + newval + ',' + newval + '),url(' + api('responsive_header_background_image').get() + ')' );
		// 		}
		// 	} );
		// } );

	}

	// Native POPUP
	api('responsive_native_cart_popup_display', function( value ) {
		value.bind( function( newval ) {

			if( newval === true ){

				$( '#woo-popup-wrap' ).css( {'display':'block'});
				$.magnificPopup.open({
					items: {
					src: '#woo-popup-wrap',
					
					},
					modal: true,
					closeOnBgClick: true
					
				});
			} else {
				$.magnificPopup.close();
			} 
		});
    });

	
	// Title text
	api('responsive_popup_title_text', function( value ) {
		value.bind( function( newval ) {
			$( '#woo-popup-wrap .popup-title' ).html( newval );
		});
    });
	// Content
	api('responsive_popup_content', function( value ) {
    	value.bind( function( newval ) {
    		$( '#woo-popup-wrap .popup-content' ).html( newval );
    	});
    });
	
	// Continue button text
	api('responsive_popup_continue_btn_text', function( value ) {
		value.bind( function( newval ) {
			$( '#woo-popup-wrap .buttons-wrap a.continue-btn' ).html( newval );
		});
    });

	// Cart button text
    api('responsive_popup_cart_btn_text', function( value ) {
		value.bind( function( newval ) {
			$( '#woo-popup-wrap .buttons-wrap a.cart-btn' ).html( newval );
		});
    });

	// Bottom text
    api('responsive_popup_bottom_text', function( value ) {
		value.bind( function( newval ) {
			$( '#woo-popup-wrap .popup-text' ).html( newval );
		});
    });

	// Popup width
    api( 'responsive_popup_width', function( value ) {
		value.bind( function( to ) {
			var $child = $( '.customizer-responsive_popup_width' );
			if ( to ) {
				var style = '<style class="customizer-responsive_popup_width">#woo-popup-wrap #woo-popup-inner { width: ' + to + 'px; }</style>';
				if ( $child.length ) {
					$child.replaceWith( style );
				} else {
					$( 'head' ).append( style );
				}
			} else {
				$child.remove();
			}
		});
	});

	 // Popup width tablet
	 api( 'responsive_popup_width_tablet', function( value ) {
		value.bind( function( to ) {
			var $child = $( '.customizer-responsive_popup_width_tablet' );
			if ( to ) {
				var style = '<style class="customizer-responsive_popup_width_tablet">@media (max-width: 786px){#woo-popup-wrap #woo-popup-inner{width: ' + to + 'px; }}</style>';
				if ( $child.length ) {
					$child.replaceWith( style );
				} else {
					$( 'head' ).append( style );
				}
			} else {
				$child.remove();
			}
		});
	});

	// Popup width mobile
    api( 'responsive_popup_width_mobile', function( value ) {
		value.bind( function( to ) {
			var $child = $( '.customizer-responsive_popup_width_mobilee' );
			if ( to ) {
				var style = '<style class="customizer-responsive_popup_width_mobile">@media (max-width: 480px){#woo-popup-wrap #woo-popup-inner{width: ' + to + 'px; }}</style>';
				if ( $child.length ) {
					$child.replaceWith( style );
				} else {
					$( 'head' ).append( style );
				}
			} else {
				$child.remove();
			}
		});
	});

	// Popup height
    api( 'responsive_popup_height', function( value ) {
		value.bind( function( to ) {
			var $child = $( '.customizer-responsive_popup_height' );
			if ( to ) {
				var style = '<style class="customizer-responsive_popup_height">#woo-popup-wrap #woo-popup-inner { height: ' + to + 'px; }</style>';
				if ( $child.length ) {
					$child.replaceWith( style );
				} else {
					$( 'head' ).append( style );
				}
			} else {
				$child.remove();
			}
		});
	});

	// Popup height tablet
    api( 'responsive_popup_height_tablet', function( value ) {
		value.bind( function( to ) {
			var $child = $( '.customizer-responsive_popup_height_tablet' );
			if ( to ) {
				var style = '<style class="customizer-responsive_popup_height_tablet">@media (max-height: 786px){#woo-popup-wrap #woo-popup-inner{height: ' + to + 'px; }}</style>';
				if ( $child.length ) {
					$child.replaceWith( style );
				} else {
					$( 'head' ).append( style );
				}
			} else {
				$child.remove();
			}
		});
	});

	// Popup height mobile
    api( 'responsive_popup_height_mobile', function( value ) {
		value.bind( function( to ) {
			var $child = $( '.customizer-responsive_popup_height_mobile' );
			if ( to ) {
				var style = '<style class="customizer-responsive_popup_height_mobile">@media (max-height: 480px){#woo-popup-wrap #woo-popup-inner{height: ' + to + 'px; }}</style>';
				if ( $child.length ) {
					$child.replaceWith( style );
				} else {
					$( 'head' ).append( style );
				}
			} else {
				$child.remove();
			}
		});
	});

	// Popup Radius
	function responsive_popup_radius(control, to, selector) {
		var $child = $( '.customizer-'+ control );
		if ( to ) {
			var style = '<style class="customizer-'+ control +'">#woo-popup-wrap #woo-popup-inner{' + selector + ': ' + to + 'px; }</style>';
			if ( $child.length ) {
				$child.replaceWith( style );
			} else {
				$( 'head' ).append( style );
			}
		} else {
			$child.remove();
		}
	}
	var topRight    = 'border-top-right-radius';
	var bottomRight = 'border-bottom-right-radius';
	var bottomLeft  = 'border-bottom-left-radius';
	var topLeft     = 'border-top-left-radius';
	api( 'responsive_popup_radius_top_padding', function( value ) {
		value.bind( function( to ) {
			responsive_popup_radius('responsive_popup_radius_top_padding', to, topRight);
		});
	});
	api( 'responsive_popup_radius_right_padding', function( value ) {
		value.bind( function( to ) {
			responsive_popup_radius('responsive_popup_radius_right_padding', to, bottomRight);
		});
	});
	api( 'responsive_popup_radius_bottom_padding', function( value ) {
		value.bind( function( to ) {
			responsive_popup_radius('responsive_popup_radius_bottom_padding', to, bottomLeft);
		});
	});
	api( 'responsive_popup_radius_left_padding', function( value ) {
		value.bind( function( to ) {
			responsive_popup_radius('responsive_popup_radius_left_padding', to, topLeft);
		});
	});

	api( 'responsive_popup_radius_tablet_top_padding', function( value ) {
		value.bind( function( to ) {
			responsive_popup_radius('responsive_popup_radius_tablet_top_padding', to, topRight);
		});
	});
	api( 'responsive_popup_radius_tablet_right_padding', function( value ) {
		value.bind( function( to ) {
			responsive_popup_radius('responsive_popup_radius_tablet_right_padding', to, bottomRight);
		});
	});
	api( 'responsive_popup_radius_tablet_bottom_padding', function( value ) {
		value.bind( function( to ) {
			responsive_popup_radius('responsive_popup_radius_tablet_bottom_padding', to, bottomLeft);
		});
	});
	api( 'responsive_popup_radius_tablet_left_padding', function( value ) {
		value.bind( function( to ) {
			responsive_popup_radius('responsive_popup_radius_tablet_left_padding', to, topLeft );
		});
	});

	api( 'responsive_popup_radius_mobile_top_padding', function( value ) {
		value.bind( function( to ) {
			responsive_popup_radius('responsive_popup_radius_mobile_top_padding', to, topRight);
		});
	});
	api( 'responsive_popup_radius_mobile_right_padding', function( value ) {
		value.bind( function( to ) {
			responsive_popup_radius('responsive_popup_radius_mobile_right_padding', to, bottomRight);
		});
	});
	api( 'responsive_popup_radius_mobile_bottom_padding', function( value ) {
		value.bind( function( to ) {
			responsive_popup_radius('responsive_popup_radius_mobile_bottom_padding', to, bottomLeft);
		});
	});
	api( 'responsive_popup_radius_mobile_left_padding', function( value ) {
		value.bind( function( to ) {
			responsive_popup_radius('responsive_popup_radius_mobile_left_padding', to, topLeft);
		});
	});

	// Popup background color
	api('responsive_popup_bg_color', function( value ) {
		value.bind( function( newval ) {
	        if ( newval ) {
				$( '#woo-popup-wrap #woo-popup-inner' ).css( 'background-color', newval );
	        }
		});
    });
	// Popup overlay color
	api('responsive_popup_overlay_color', function( value ) {
		value.bind( function( newval ) {
	        if ( newval ) {
				$( '.mfp-container' ).css( 'background', newval );
	        }
		});
    });

	// Popup check mark background
    api( 'responsive_popup_checkmark_bg_color', function( value ) {
		value.bind( function( to ) {
			var $child = $( '.customizer-responsive_popup_checkmark_bg_color' );
			if ( to ) {
				var style = '<style class="customizer-responsive_popup_checkmark_bg_color">#woo-popup-wrap .checkmark{box-shadow: inset 0 0 0 ' + to + '; }#woo-popup-wrap .checkmark-circle{stroke: ' + to + ';}@keyframes fill {100% { box-shadow: inset 0 0 0 100px ' + to + '; }}</style>';
				if ( $child.length ) {
					$child.replaceWith( style );
				} else {
					$( 'head' ).append( style );
				}
			} else {
				$child.remove();
			}
		});
	});

	// Popup check mark color
    api( 'responsive_popup_checkmark_color', function( value ) {
		value.bind( function( to ) {
			var $child = $( '.customizer-responsive_popup_checkmark_color' );
			if ( to ) {
				var style = '<style class="customizer-responsive_popup_checkmark_color">#woo-popup-wrap .checkmark-check{stroke: ' + to + ';}</style>';
				if ( $child.length ) {
					$child.replaceWith( style );
				} else {
					$( 'head' ).append( style );
				}
			} else {
				$child.remove();
			}
		});
	});

	// Popup title color
	api('responsive_popup_title_color', function( value ) {
		value.bind( function( newval ) {
	        if ( newval ) {
				$( '#woo-popup-wrap .popup-title' ).css( 'color', newval );
	        }
		});
    });

	// Popup content color
	api('responsive_popup_content_color', function( value ) {
		value.bind( function( newval ) {
	        if ( newval ) {
				$( '#woo-popup-wrap .popup-content' ).css( 'color', newval );
	        }
		});
    });

	// Popup continue button background color
    api( 'responsive_popup_continue_btn_bg_color', function( value ) {
		value.bind( function( to ) {
			var $child = $( '.customizer-responsive_popup_continue_btn_bg_color' );
			if ( to ) {
				var style = '<style class="customizer-responsive_popup_continue_btn_bg_color">#woo-popup-wrap .buttons-wrap a.continue-btn{background-color: ' + to + ';}</style>';
				if ( $child.length ) {
					$child.replaceWith( style );
				} else {
					$( 'head' ).append( style );
				}
			} else {
				$child.remove();
			}
		});
	});

	// Popup continue button color
    api( 'responsive_popup_continue_btn_color', function( value ) {
		value.bind( function( to ) {
			var $child = $( '.customizer-responsive_popup_continue_btn_color' );
			if ( to ) {
				var style = '<style class="customizer-responsive_popup_continue_btn_color">#woo-popup-wrap .buttons-wrap a.continue-btn{color: ' + to + ';}</style>';
				if ( $child.length ) {
					$child.replaceWith( style );
				} else {
					$( 'head' ).append( style );
				}
			} else {
				$child.remove();
			}
		});
	});

	// Popup continue button border color
    api( 'responsive_popup_continue_btn_border_color', function( value ) {
		value.bind( function( to ) {
			var $child = $( '.customizer-responsive_popup_continue_btn_border_color' );
			if ( to ) {
				var style = '<style class="customizer-responsive_popup_continue_btn_border_color">#woo-popup-wrap .buttons-wrap a.continue-btn{border-color: ' + to + ';}</style>';
				if ( $child.length ) {
					$child.replaceWith( style );
				} else {
					$( 'head' ).append( style );
				}
			} else {
				$child.remove();
			}
		});
	});

	// Popup continue button hover background color
    api( 'responsive_popup_continue_btn_hover_bg_color', function( value ) {
		value.bind( function( to ) {
			var $child = $( '.customizer-responsive_popup_continue_btn_hover_bg_color' );
			if ( to ) {
				var style = '<style class="customizer-responsive_popup_continue_btn_hover_bg_color">#woo-popup-wrap .buttons-wrap a.continue-btn:hover{background-color: ' + to + ';}</style>';
				if ( $child.length ) {
					$child.replaceWith( style );
				} else {
					$( 'head' ).append( style );
				}
			} else {
				$child.remove();
			}
		});
	});

	// Popup continue button hover color
    api( 'responsive_popup_continue_btn_hover_color', function( value ) {
		value.bind( function( to ) {
			var $child = $( '.customizer-responsive_popup_continue_btn_hover_color' );
			if ( to ) {
				var style = '<style class="customizer-responsive_popup_continue_btn_hover_color">#woo-popup-wrap .buttons-wrap a.continue-btn:hover{color: ' + to + ';}</style>';
				if ( $child.length ) {
					$child.replaceWith( style );
				} else {
					$( 'head' ).append( style );
				}
			} else {
				$child.remove();
			}
		});
	});

    // Popup continue button hover border color
    api( 'responsive_popup_continue_btn_hover_border_color', function( value ) {
		value.bind( function( to ) {
			var $child = $( '.customizer-responsive_popup_continue_btn_hover_border_color' );
			if ( to ) {
				var style = '<style class="customizer-responsive_popup_continue_btn_hover_border_color">#woo-popup-wrap .buttons-wrap a.continue-btn:hover{border-color: ' + to + ';}</style>';
				if ( $child.length ) {
					$child.replaceWith( style );
				} else {
					$( 'head' ).append( style );
				}
			} else {
				$child.remove();
			}
		});
	});

	// Popup cart button background color
    api( 'responsive_popup_cart_btn_bg_color', function( value ) {
		value.bind( function( to ) {
			var $child = $( '.customizer-responsive_popup_cart_btn_bg_color' );
			if ( to ) {
				var style = '<style class="customizer-responsive_popup_cart_btn_bg_color">#woo-popup-wrap .buttons-wrap a.cart-btn{background-color: ' + to + ';}</style>';
				if ( $child.length ) {
					$child.replaceWith( style );
				} else {
					$( 'head' ).append( style );
				}
			} else {
				$child.remove();
			}
		});
	});

    // Popup cart button color
    api( 'responsive_popup_cart_btn_color', function( value ) {
		value.bind( function( to ) {
			var $child = $( '.responsive_popup_cart_btn_color' );
			if ( to ) {
				var style = '<style class="customizer-responsive_popup_cart_btn_color">#woo-popup-wrap .buttons-wrap a.cart-btn{color: ' + to + ';}</style>';
				if ( $child.length ) {
					$child.replaceWith( style );
				} else {
					$( 'head' ).append( style );
				}
			} else {
				$child.remove();
			}
		});
	});

    // Popup cart button border color
    api( 'responsive_popup_cart_btn_border_color', function( value ) {
		value.bind( function( to ) {
			var $child = $( '.customizer-responsive_popup_cart_btn_border_color' );
			if ( to ) {
				var style = '<style class="customizer-responsive_popup_cart_btn_border_color">#woo-popup-wrap .buttons-wrap a.cart-btn{border-color: ' + to + ';}</style>';
				if ( $child.length ) {
					$child.replaceWith( style );
				} else {
					$( 'head' ).append( style );
				}
			} else {
				$child.remove();
			}
		});
	});

    // Popup cart button hover background color
    api( 'responsive_popup_cart_btn_hover_bg_color', function( value ) {
		value.bind( function( to ) {
			var $child = $( '.customizer-responsive_popup_cart_btn_hover_bg_color' );
			if ( to ) {
				var style = '<style class="customizer-responsive_popup_cart_btn_hover_bg_color">#woo-popup-wrap .buttons-wrap a.cart-btn:hover{background-color: ' + to + ';}</style>';
				if ( $child.length ) {
					$child.replaceWith( style );
				} else {
					$( 'head' ).append( style );
				}
			} else {
				$child.remove();
			}
		});
	});

    // Popup cart button hover color
    api( 'responsive_popup_cart_btn_hover_color', function( value ) {
		value.bind( function( to ) {
			var $child = $( '.customizer-responsive_popup_cart_btn_hover_color' );
			if ( to ) {
				var style = '<style class="customizer-responsive_popup_cart_btn_hover_color">#woo-popup-wrap .buttons-wrap a.cart-btn:hover{color: ' + to + ';}</style>';
				if ( $child.length ) {
					$child.replaceWith( style );
				} else {
					$( 'head' ).append( style );
				}
			} else {
				$child.remove();
			}
		});
	});

    // Popup cart button hover border color
    api( 'responsive_popup_cart_btn_hover_border_color', function( value ) {
		value.bind( function( to ) {
			var $child = $( '.customizer-responsive_popup_cart_btn_hover_border_colorr' );
			if ( to ) {
				var style = '<style class="customizer-responsive_popup_cart_btn_hover_border_color">#woo-popup-wrap .buttons-wrap a.cart-btn:hover{border-color: ' + to + ';}</style>';
				if ( $child.length ) {
					$child.replaceWith( style );
				} else {
					$( 'head' ).append( style );
				}
			} else {
				$child.remove();
			}
		});
	});

	// Popup bottom text color
	api('responsive_popup_text_color', function( value ) {
		value.bind( function( newval ) {
	        if ( newval ) {
				$( '#woo-popup-wrap .popup-text' ).css( 'color', newval );
	        }
		});
    });

	

} )( jQuery );
