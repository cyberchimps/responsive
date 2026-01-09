/**
 * This file adds some LIVE to the Theme Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here. Your javascript should grab settings from customizer controls, and
 * then make any necessary changes to the page using jQuery.
 */
// phpcs:ignoreFile
( function( $ ) {
    var api = wp.customize;
    
    function setBackground( type ) {
		if ( type === 'gradient' ) {
			api( 'responsive_site_background_gradient_color', function( value ) {
				var gradient = value.get();
				$('body').addClass( 'custom-background' ).css({
					'background': gradient,
					'background-color': '',
                    'background-position': api('responsive_site_background_img_position').get().replace( '-', ' ' ),
                    'background-attachment': api('responsive_site_background_image_attachment').get(),
                    'background-repeat': api('responsive_site_background_image_repeat').get(),
                    'background-size': api('responsive_site_background_image_size').get(),
				});
			});
		} else {
			api( 'responsive_site_background_color', function( value ) {
				var color = value.get();
                if( color && color.includes('palette') ) {
                    color = 'var(--responsive-global-' + color + ')';
                }
				$('body').addClass( 'custom-background' ).css({
					'background': 'none',
					'background-color': color
				});
			});
		}
	}

    function processThemeSettingForCSS ( setting ) {
		// Ensure the setting exists
        const settingObj = api(setting);
        if (!settingObj) {
            console.warn('Invalid setting:', setting);
            return null;
        }

        // Get actual value
        let value = settingObj.get();
        if (!value) return null;
	
		// Detect palette var format
        if (typeof value === 'string' && value.startsWith('palette')) {
            return `var(--responsive-global-${value})`;
        }
        return value;
	}

	// On color type change
	api( 'responsive_site_background_color_type', function( value ) {
		value.bind( function( newType ) {
			setBackground( newType );
		} );
	} );

	// On solid color change
	api( 'responsive_site_background_color', function( value ) {
		value.bind( function( newColor ) {
			api( 'responsive_site_background_color_type', function( typeValue ) {
				if ( typeValue.get() === 'color' ) {
					setBackground( 'color' );
				}
			});
		} );
	} );

	// On gradient change
	api( 'responsive_site_background_gradient_color', function( value ) {
		value.bind( function( newGradient ) {
			api( 'responsive_site_background_color_type', function( typeValue ) {
				if ( typeValue.get() === 'gradient' ) {
					setBackground( 'gradient' );
				}
			});
		} );
	} );

    //Box Background Color
    function setBoxBackground(type) {
        if (type === 'gradient') {
            api('responsive_box_background_gradient_color', function (value) {
                var gradient = value.get();
                $(
                    '.page.front-page.responsive-site-style-content-boxed .custom-home-widget-section.home-widgets,' +
                    '.blog.front-page.responsive-site-style-content-boxed .custom-home-widget-section.home-widgets,' +
                    '.responsive-site-style-content-boxed .custom-home-about-section,' +
                    '.responsive-site-style-content-boxed .custom-home-feature-section,' +
                    '.responsive-site-style-content-boxed .custom-home-team-section,' +
                    '.responsive-site-style-content-boxed .custom-home-testimonial-section,' +
                    '.responsive-site-style-content-boxed .custom-home-contact-section,' +
                    '.responsive-site-style-content-boxed .custom-home-widget-section,' +
                    '.responsive-site-style-content-boxed .custom-home-featured-area,' +
                    '.responsive-site-style-content-boxed .site-content-header,' +
                    '.responsive-site-style-content-boxed .content-area-wrapper,' +
                    '.responsive-site-style-content-boxed .site-content .hentry,' +
                    '.responsive-site-style-content-boxed .navigation,' +
                    '.responsive-site-style-content-boxed .responsive-single-related-posts-container,' +
                    '.responsive-site-style-content-boxed .comments-area,' +
                    '.responsive-site-style-content-boxed .comment-respond,' +
                    '.responsive-site-style-boxed .custom-home-about-section,' +
                    '.responsive-site-style-boxed .custom-home-feature-section,' +
                    '.responsive-site-style-boxed .custom-home-team-section,' +
                    '.responsive-site-style-boxed .custom-home-testimonial-section,' +
                    '.responsive-site-style-boxed .custom-home-contact-section,' +
                    '.responsive-site-style-boxed .custom-home-widget-section,' +
                    '.responsive-site-style-boxed .custom-home-featured-area,' +
                    '.responsive-site-style-boxed .site-content-header,' +
                    '.responsive-site-style-boxed .site-content .hentry:not(.bbp-forum-status-open),' +
                    '.responsive-site-style-boxed .navigation,' +
                    '.responsive-site-style-boxed .responsive-single-related-posts-container,' +
                    '.responsive-site-style-boxed .comments-area,' +
                    '.responsive-site-style-boxed .comment-respond,' +
                    '.responsive-site-style-boxed .site-content article.product,' +
                    '.woocommerce.responsive-site-style-content-boxed .related-product-wrapper,' +
                    '.woocommerce-page.responsive-site-style-content-boxed .related-product-wrapper,' +
                    '.woocommerce-page.responsive-site-style-content-boxed .products-wrapper,' +
                    '.woocommerce.responsive-site-style-content-boxed .products-wrapper,' +
                    '.woocommerce-page:not(.responsive-site-style-flat) .woocommerce-pagination,' +
                    '.woocommerce-page.single-product:not(.responsive-site-style-flat) div.product,' +
                    '.woocommerce.single-product:not(.responsive-site-style-flat) div.product' + 
                    '.elementor-element.elementor-products-grid ul.products li.product .responsive-shop-summary-wrap'
                ).css({
                    'background': gradient,
                    'background-color': ''
                });
    
                if ( ! api('responsive_sidebar_background_image').get() && api('responsive_sidebar_background_color').get() === 'palette4') {
                    $('.responsive-site-style-boxed aside#secondary.main-sidebar .widget-wrapper').css({
                        'background': gradient,
                        'background-color': '',
                        'background-position': api('responsive_site_background_img_position').get().replace( '-', ' ' ),
                        'background-attachment': api('responsive_site_background_image_attachment').get(),
                        'background-repeat': api('responsive_site_background_image_repeat').get(),
                        'background-size': api('responsive_site_background_image_size').get(),
                    });
                }
            });
        } else {
            api('responsive_box_background_color', function (value) {
                var color = value.get();
                if( color && color.includes('palette') ) {
                    color = 'var(--responsive-global-' + color + ')';
                }
                $(
                    '.page.front-page.responsive-site-style-content-boxed .custom-home-widget-section.home-widgets,' +
                    '.blog.front-page.responsive-site-style-content-boxed .custom-home-widget-section.home-widgets,' +
                    '.responsive-site-style-content-boxed .custom-home-about-section,' +
                    '.responsive-site-style-content-boxed .custom-home-feature-section,' +
                    '.responsive-site-style-content-boxed .custom-home-team-section,' +
                    '.responsive-site-style-content-boxed .custom-home-testimonial-section,' +
                    '.responsive-site-style-content-boxed .custom-home-contact-section,' +
                    '.responsive-site-style-content-boxed .custom-home-widget-section,' +
                    '.responsive-site-style-content-boxed .custom-home-featured-area,' +
                    '.responsive-site-style-content-boxed .site-content-header,' +
                    '.responsive-site-style-content-boxed .content-area-wrapper,' +
                    '.responsive-site-style-content-boxed .site-content .hentry,' +
                    '.responsive-site-style-content-boxed .navigation,' +
                    '.responsive-site-style-content-boxed .responsive-single-related-posts-container,' +
                    '.responsive-site-style-content-boxed .comments-area,' +
                    '.responsive-site-style-content-boxed .comment-respond,' +
                    '.responsive-site-style-boxed .custom-home-about-section,' +
                    '.responsive-site-style-boxed .custom-home-feature-section,' +
                    '.responsive-site-style-boxed .custom-home-team-section,' +
                    '.responsive-site-style-boxed .custom-home-testimonial-section,' +
                    '.responsive-site-style-boxed .custom-home-contact-section,' +
                    '.responsive-site-style-boxed .custom-home-widget-section,' +
                    '.responsive-site-style-boxed .custom-home-featured-area,' +
                    '.responsive-site-style-boxed .site-content-header,' +
                    '.responsive-site-style-boxed .site-content .hentry:not(.bbp-forum-status-open),' +
                    '.responsive-site-style-boxed .navigation,' +
                    '.responsive-site-style-boxed .responsive-single-related-posts-container,' +
                    '.responsive-site-style-boxed .comments-area,' +
                    '.responsive-site-style-boxed .comment-respond,' +
                    '.responsive-site-style-boxed .site-content article.product,' +
                    '.woocommerce.responsive-site-style-content-boxed .related-product-wrapper,' +
                    '.woocommerce-page.responsive-site-style-content-boxed .related-product-wrapper,' +
                    '.woocommerce-page.responsive-site-style-content-boxed .products-wrapper,' +
                    '.woocommerce.responsive-site-style-content-boxed .products-wrapper,' +
                    '.woocommerce-page:not(.responsive-site-style-flat) .woocommerce-pagination,' +
                    '.woocommerce-page.single-product:not(.responsive-site-style-flat) div.product,' +
                    '.woocommerce.single-product:not(.responsive-site-style-flat) div.product' + 
                    '.elementor-element.elementor-products-grid ul.products li.product .responsive-shop-summary-wrap'
                ).css({
                    'background': 'none',
                    'background-color': color
                });
                if ( ! api('responsive_sidebar_background_image').get() && api('responsive_sidebar_background_color').get() === 'palette4' ) {
                    $('.responsive-site-style-boxed aside#secondary.main-sidebar .widget-wrapper').css({
                        'background': '',
                        'background-color': color,
                        'background-image': 'none',
                    });
                }
            });
        }
    }
    
    // On color type change
    api('responsive_box_background_color_type', function (value) {
        value.bind(function (newType) {
            setBoxBackground(newType);
        });
    });
    
    // On solid color change
    api('responsive_box_background_color', function (value) {
        value.bind(function () {
            api('responsive_box_background_color_type', function (typeValue) {
                if (typeValue.get() === 'color') {
                    setBoxBackground('color');
                }
            });
        });
    });
    
    // On gradient change
    api('responsive_box_background_gradient_color', function (value) {
        value.bind(function () {
            api('responsive_box_background_color_type', function (typeValue) {
                if (typeValue.get() === 'gradient') {
                    setBoxBackground('gradient');
                }
            });
        });
    });

    //Header section
    //Update header background color...
    // api( 'responsive_header_background_color', function( value ) {
    //         value.bind( function( newval ) {
    //             $('.site-header').css('background-color', newval );
    //         } );
    //     } );

    //Update header border color...
    // api( 'responsive_header_border_color', function( value ) {
    //     value.bind( function( newval ) {
    //         $('.site-header').css('border-bottom-color', newval );
    //     } );
    // } );

    //Update site title color...
    api( 'responsive_header_site_title_color', function( value ) {
        value.bind( function( newval ) {
            if ( newval && newval.startsWith('palette') ) {
                newval = `var(--responsive-global-${newval})`;
            }
            $('.site-title a').css('color', newval );
        } );
    } );

    //Update site title hover color...
    api( 'responsive_header_site_title_hover_color', function( value ) {
        value.bind( function( newval ) {
            if ( newval && newval.startsWith('palette') ) {
                newval = `var(--responsive-global-${newval})`;
            }
            $('.site-title a:hover').css('color', newval );
        } );
    } );

    //Update site tagline color...
    api( 'responsive_header_text_color', function( value ) {
        value.bind( function( newval ) {
            if ( newval && newval.startsWith('palette') ) {
                newval = `var(--responsive-global-${newval})`;
            }
            $('.site-description').css('color', newval );
        } );
    } );

    // Transparent Header
    //Update header border color...
    api( 'responsive_transparent_header_border_color', function( value ) {
        value.bind( function( newval ) {
            $('.res-transparent-header .site-header').css('border-bottom-color', newval );
        } );
    } );

    //Update site title color...
    api( 'responsive_transparent_header_site_title_color', function( value ) {
        value.bind( function( newval ) {
            $('.res-transparent-header .site-title a').css('color', newval );
        } );
    } );

    //Update site title hover color...
    api( 'responsive_transparent_header_site_title_hover_color', function( value ) {
        value.bind( function( newval ) {
            $('.res-transparent-header .site-title a:hover').css('color', newval );
        } );
    } );

    //Update site tagline color...
    api( 'responsive_transparent_header_text_color', function( value ) {
        value.bind( function( newval ) {
            $('.res-transparent-header .site-description').css('color', newval );
        } );
    } );

    //Header Widget section
    //Update header widget text background color...
    api( 'responsive_header_widget_text_color', function( value ) {
        value.bind( function( newval ) {
            $('.header-widgets, .header-widgets h1, .header-widgets h2, .header-widgets h3, .header-widgets h4, .header-widgets h5, .header-widgets h6, .header-widgets .widget-title h4').css('color', newval );
        } );
    } );

    //Update header widget background color...
    api( 'responsive_header_widget_background_color', function( value ) {
        value.bind( function( newval ) {
                $('.header-widgets').css('background-color', newval );
            
        } );
    } );

    //Update header widget border color...
    api( 'responsive_header_widget_border_color', function( value ) {
        value.bind( function( newval ) {
            $('.header-widgets').css('border-color', newval );
        } );
    } );

    //Update header widget link color...
    api( 'responsive_header_widget_link_color', function( value ) {
        value.bind( function( newval ) {
            $('.header-widgets a').css('color', newval );
        } );
    } );

    //Update header widget link hover color...
    api( 'responsive_header_widget_link_hover_color', function( value ) {
        value.bind( function( newval ) {
            $('.header-widgets a:focus, .header-widgets a:hover').css('color', newval );
        } );
    } );

    // Mobile Header Widgets (apply styles within the mobile header widgets wrapper)
    // Update mobile header widget text color...
    api( 'responsive_mobile_header_widget_text_color', function( value ) {
        value.bind( function( newval ) {
            $('.mobile-header-widgets .mobile-header-widgets-wrapper, .mobile-header-widgets .mobile-header-widgets-wrapper h1, .mobile-header-widgets .mobile-header-widgets-wrapper h2, .mobile-header-widgets .mobile-header-widgets-wrapper h3, .mobile-header-widgets .mobile-header-widgets-wrapper h4, .mobile-header-widgets .mobile-header-widgets-wrapper h5, .mobile-header-widgets .mobile-header-widgets-wrapper h6, .mobile-header-widgets .mobile-header-widgets-wrapper .widget-title h4').css('color', newval );
        } );
    } );

    // Update mobile header widget background color...
    api( 'responsive_mobile_header_widget_background_color', function( value ) {
        value.bind( function( newval ) {
            $('.mobile-header-widgets').css('background-color', newval );
        } );
    } );

    // Update mobile header widget border color...
    api( 'responsive_mobile_header_widget_border_color', function( value ) {
        value.bind( function( newval ) {
            $('.mobile-header-widgets').css('border-color', newval );
        } );
    } );

    // Update mobile header widget link color...
    api( 'responsive_mobile_header_widget_link_color', function( value ) {
        value.bind( function( newval ) {
            $('.mobile-header-widgets .mobile-header-widgets-wrapper a').css('color', newval );
        } );
    } );

    // Update mobile header widget link hover color...
    api( 'responsive_mobile_header_widget_link_hover_color', function( value ) {
        value.bind( function( newval ) {
            $('.mobile-header-widgets .mobile-header-widgets-wrapper a:focus, .header-widgets .mobile-header-widgets-wrapper a:hover').css('color', newval );
        } );
    } );

    //Header Widget section
    //Update header widget text background color...
    api( 'responsive_transparent_header_widget_text_color', function( value ) {
        value.bind( function( newval ) {
            $('.res-transparent-header .header-widgets, .res-transparent-header .header-widgets h1, .res-transparent-header .header-widgets h2, .res-transparent-header .header-widgets h3, .res-transparent-header .header-widgets h4, .res-transparent-header .header-widgets h5, .res-transparent-header .header-widgets h6, .res-transparent-header .header-widgets .widget-title h4').css('color', newval );
        } );
    } );

    //Update header widget background color...
    api( 'responsive_transparent_header_widget_background_color', function( value ) {
        value.bind( function( newval ) {
                $('.res-transparent-header .header-widgets').css('background-color', newval );
        } );
    } );

    //Update header widget border color...
    api( 'responsive_transparent_header_widget_border_color', function( value ) {
        value.bind( function( newval ) {
            $('.res-transparent-header .header-widgets').css('border-color', newval );
        } );
    } );

    //Update header widget link color...
    api( 'responsive_transparent_header_widget_link_color', function( value ) {
        value.bind( function( newval ) {
            $('.res-transparent-header .header-widgets a').css('color', newval );
        } );
    } );

    //Update header widget link hover color...
    api( 'responsive_transparent_header_widget_link_hover_color', function( value ) {
        value.bind( function( newval ) {
            $('.res-transparent-header .header-widgets a:focus, .res-transparent-header .header-widgets a:hover').css('color', newval );
        } );
    } );

    //Alternate Background Color
    api( 'responsive_alt_background_color', function( value ) {
        value.bind( function( newval ) {
            if ( newval && newval.includes('palette') ) {
                newval = 'var(--responsive-global-' + newval + ')';
            }
            $('address, blockquote, pre, code, kbd, tt, var').css('background-color', newval );
        } );
    } );

    api( 'responsive_rp_section_title_color', function ( value ){
        value.bind( function ( newval ) {
            const elems = document.querySelectorAll( '.responsive-related-single-posts-title' );
			elems.forEach( el => {
                el.style.color = newval;
			});
		});
	});
    api( 'responsive_rp_section_bg_color', ( value ) => {
        value.bind( ( newval ) => {
            $('.responsive-single-related-posts-container, .responsive-single-related-posts-container .responsive-related-single-posts-wrapper .responsive-related-single-post').css('background', newval);
		});
	});

    api( 'responsive_rp_text_color', ( value ) => {
        value.bind( ( newval ) => {
            document.querySelectorAll('.responsive-single-related-posts-container, .responsive-single-related-posts-container p, .responsive-single-related-posts-container .entry-content')
                .forEach(el => el.style.color = newval);
        });
    });

    api( 'responsive_rp_text_hover_color', ( value ) => {
        value.bind( ( newval ) => {
            document.querySelectorAll('.responsive-single-related-posts-container, .responsive-single-related-posts-container p, .responsive-single-related-posts-container .entry-content')
                .forEach(el => {
                    el.addEventListener('mouseenter', () => el.style.color = newval);
                    el.addEventListener('mouseleave', () => el.style.color = api( 'responsive_rp_text_color' )());
                });
        });
    });

    api( 'responsive_rp_link_color', ( value ) => {
        value.bind( ( newval ) => {
            document.querySelectorAll('.responsive-single-related-posts-container a')
                .forEach(el => el.style.color = newval);
        });
    });

    api( 'responsive_rp_link_hover_color', ( value ) => {
        value.bind( ( newval ) => {
            document.querySelectorAll('.responsive-single-related-posts-container a')
                .forEach(el => {
                    el.addEventListener('mouseenter', () => el.style.color = newval);
                    el.addEventListener('mouseleave', () => el.style.color = api( 'responsive_rp_link_color' )());
                });
        });
    });

    api( 'responsive_rp_meta_color', ( value ) => {
        value.bind( ( newval ) => {
            document.querySelectorAll('.responsive-single-related-posts-container .post-meta span, .responsive-single-related-posts-container .post-meta span i, .responsive-single-related-posts-container .post-meta span a, .responsive-single-related-posts-container .post-meta span a time, .responsive-single-related-posts-container .entry-meta')
                .forEach(el => el.style.color = newval);
        });
    });

    api( 'responsive_rp_meta_hover_color', ( value ) => {
        value.bind( ( newval ) => {
            document.querySelectorAll('.responsive-single-related-posts-container .post-meta span, .responsive-single-related-posts-container .post-meta span i, .responsive-single-related-posts-container .post-meta span a, .responsive-single-related-posts-container .post-meta span a time, .responsive-single-related-posts-container .entry-meta')
                .forEach(el => {
                    el.addEventListener('mouseenter', () => el.style.color = newval);
                    el.addEventListener('mouseleave', () => el.style.color = api( 'responsive_rp_meta_color' )());
                });
        });
    });

    
    //Body text Color
    api( 'responsive_body_text_color', function( value ) {
        value.bind( function( newval ) {
            if( newval && newval.startsWith('palette') ) {
                newval = `var(--responsive-global-${newval})`;
            }
            $('body, .wc-block-grid__product-title').css('color', newval );
        } );
    } );

    //All Heading text Color
    api( 'responsive_all_heading_text_color', function( value ) {
        value.bind( function( newval ) {
            if( newval && newval.startsWith('palette') ) {
                newval = `var(--responsive-global-${newval})`;
            }
            document.documentElement.style.setProperty(
                '--responsive-global-headings-color',
                newval
            );

            $('h1,h2,h3,h4,h5,h6,.h1,.h2,.h3,.h4,.h5,.h6').not('.woocommerce-products-header .woocommerce-products-header__title.page-title').css('color', newval );
            
        } );
    } );

    //H1 text Color
    api( 'responsive_h1_text_color', function( value ) {
        value.bind( function( newval ) {
            $('h1').not('.woocommerce-products-header .woocommerce-products-header__title.page-title').css('color', newval );
        } );
    } );

    //H2 text Color
    api('responsive_h2_text_color', function(value) {
        value.bind(function(newval) {
            $('h2').each(function() {
                // Check if the <h2> is not inside an ancestor with the class "widget-area" or "site-title"
                $isNotWidgetArea = $(this).closest('.widget-area').length === 0;
                $isNotSiteTitle = $(this).closest('.site-title').length === 0
                if ( $isNotSiteTitle && $isNotWidgetArea ) {
                    $(this).css('color', newval);
                }
            });
        });
    });

    //H3 text Color
    api( 'responsive_h3_text_color', function( value ) {
        value.bind( function( newval ) {
            $('h3').css('color', newval );
        } );
    } );

    //H4 text Color
    api( 'responsive_h4_text_color', function( value ) {
        value.bind( function( newval ) {
            $('h4').css('color', newval );
        } );
    } );

    //H5 text Color
    api( 'responsive_h5_text_color', function( value ) {
        value.bind( function( newval ) {
            $('h5').css('color', newval );
        } );
    } );

    //H6 text Color
    api( 'responsive_h6_text_color', function( value ) {
        value.bind( function( newval ) {
            $('h6').css('color', newval );
        } );
    } );




    //Meta text Color
    api( 'responsive_meta_text_color', function( value ) {
        value.bind( function( newval ) {
            if ( newval && newval.startsWith('palette') ) {
                newval = `var(--responsive-global-${newval})`;
            }
            $('.post-meta *, .hentry .post-meta a').css('color', newval );
        } );
    } );

    //Link Color
    api( 'responsive_link_color', function( value ) {
        value.bind( function( newval ) {
            if( newval && newval.startsWith('palette') ) {
                newval = `var(--responsive-global-${newval})`;
            }
            $('a, .woocommerce a.remove:hover').not('nav a').not('a.add_to_cart_button').not('.site-title-tagline a').not('.widget-area .widget-wrapper a').not('a.product_type_grouped').not('.woocommerce-tabs .description_tab').not('.woocommerce-tabs .reviews_tab').css('color', newval );
        } );
    } );

    //Date Box Background Color
    api( 'responsive_link_color', function( value ) {
        value.bind( function( newval ) {
            if( newval && newval.startsWith('palette') ) {
                newval = `var(--responsive-global-${newval})`;
            }
            $('.responsive-date-box').css('background-color', newval );
        } );
    } );

    //Date box Font Color
    api( 'responsive_link_color', function( value ) {
        value.bind( function( newval ) {
            let backgroundColor = newval;
            hexcolor = backgroundColor.replace("#", "");
            let r = parseInt(hexcolor.substr(0,2),16);
            let g = parseInt(hexcolor.substr(2,2),16);
            let b = parseInt(hexcolor.substr(4,2),16);
            let o = Math.round(((parseInt(r) * 299) + (parseInt(g) * 587) + (parseInt(b) * 114)) /1000);
            if( o > 125 ) {
                $('.date-box-day').css("color", "black");
                $('.date-box-month').css("color", "black");
                $('.date-box-year').css("color", "black");
            }
            else {
                $('.date-box-day').css("color", "white");
                $('.date-box-month').css("color", "white");
                $('.date-box-year').css("color", "white");
            }
        } );
    } );

    //Link Hover Color
    api( 'responsive_link_hover_color', function( value ) {
        value.bind( function( newval ) {
            if( newval && newval.startsWith('palette') ) {
                newval = `var(--responsive-global-${newval})`;
            }
            $('a:hover').css('color', newval );
        } );
    } );

    //Buttons color
    api( 'responsive_button_color', function( value ) {
        value.bind( function( newval ) {
            if( newval && newval.startsWith('palette') ) {
                newval = `var(--responsive-global-${newval})`;
            }
            $('.page.front-page .button,.blog.front-page .button,.read-more-button .hentry .read-more .more-link,input[type=button],input[type=submit],button,.button,.wp-block-button__link,div.wpforms-container-full .wpforms-form input[type=submit],body div.wpforms-container-full .wpforms-form button[type=submit],div.wpforms-container-full .wpforms-form .wpforms-page-button ').not('a.add_to_cart_button').not('a.product_type_grouped').not('button.single_add_to_cart_button').not('.woocommerce-Reviews input').css('background-color', newval );
            if( responsiveSiteLocalOptions.isDisableElementorDefaultColors ) {
                jQuery( 'style#responsive-elementor-button-color' ).remove();
                jQuery( 'head' ).append(
                    '<style id="responsive-elementor-button-color">'
                    + '.elementor-button-wrapper .elementor-button { background-color:' + newval +'}'
                    + '</style>'
                );
            }
        } );
    } );

    //Buttons hover color
    api( 'responsive_button_hover_color', function( value ) {
        value.bind( function( newval ) {
            if( newval && newval.startsWith('palette') ) {
                newval = `var(--responsive-global-${newval})`;
            }
            // Inline style won't work for :hover, so we inject a style tag
            var styleId = 'responsive-button-hover-color-preview';
            jQuery('style#' + styleId).remove();
            
            var selectors = '.page.front-page .button:hover, .blog.front-page .button:hover, .read-more-button .hentry .read-more .more-link:hover, input[type=button]:hover, input[type=submit]:hover, button:hover, .button:hover, .wp-block-button__link:hover, div.wpforms-container-full .wpforms-form input[type=submit]:hover, body div.wpforms-container-full .wpforms-form button[type=submit]:hover, div.wpforms-container-full .wpforms-form .wpforms-page-button:hover';
            
            var css = selectors + ' { background-color: ' + newval + ' !important; }';
            
            jQuery('head').append('<style id="' + styleId + '">' + css + '</style>');
        } );
    } );

    // Header Button Hover Color
    api( 'responsive_header_button_bg_hover_color', function( value ) {
        value.bind( function( newval ) {
            if( newval && newval.startsWith('palette') ) {
                newval = `var(--responsive-global-${newval})`;
            }
            var styleId = 'responsive-header-button-hover-color-preview';
            jQuery('style#' + styleId).remove();
            
            var selectors = '.site-header-item .responsive-header-button-wrap .responsive-header-button-inner-wrap .responsive-header-button:hover';
            var css = selectors + ' { background-color: ' + newval + ' !important; }';
            
            jQuery('head').append('<style id="' + styleId + '">' + css + '</style>');
        } );
    } );

    // Mobile Header Button Hover Color
    api( 'responsive_mobile_header_button_bg_hover_color', function( value ) {
        value.bind( function( newval ) {
            if( newval && newval.startsWith('palette') ) {
                newval = `var(--responsive-global-${newval})`;
            }
            var styleId = 'responsive-mobile-header-button-hover-color-preview';
            jQuery('style#' + styleId).remove();
            
            var selectors = '.site-header-mobile .responsive-header-button-wrap .responsive-header-button-inner-wrap .responsive-header-button:hover';
            var css = selectors + ' { background-color: ' + newval + ' !important; }';
            
            jQuery('head').append('<style id="' + styleId + '">' + css + '</style>');
        } );
    } );

    // Add To Cart Button Hover Color
    api( 'responsive_add_to_cart_button_hover_color', function( value ) {
        value.bind( function( newval ) {
            if( newval && newval.startsWith('palette') ) {
                newval = `var(--responsive-global-${newval})`;
            }
            var styleId = 'responsive-add-to-cart-button-hover-color-preview';
            jQuery('style#' + styleId).remove();
            
            var selectors = '.woocommerce #respond input#submit:hover, .wp-block-button__link.add_to_cart_button:hover, .woocommerce div.product .woocommerce-tabs ul.tabs li.active a, .woocommerce div.product .woocommerce-tabs ul.tabs li.active, .woocommerce button.button:focus, .woocommerce button.button.alt:focus, .woocommerce button.button:hover, .woocommerce button.button.alt:hover, .woocommerce button.button:hover, .woocommerce button.button:focus, .woocommerce a.button:focus, .woocommerce a.button:hover, .woocommerce a.button.alt:focus, .woocommerce a.button.alt:hover, .woocommerce .widget_price_filter .price_slider_wrapper .ui-widget-content';
            var css = selectors + ' { background-color: ' + newval + ' !important; }';
            
            jQuery('head').append('<style id="' + styleId + '">' + css + '</style>');
        } );
    } );

    // Cart & Checkout Button Hover Color
    api( 'responsive_cart_checkout_button_hover_color', function( value ) {
        value.bind( function( newval ) {
            if( newval && newval.startsWith('palette') ) {
                newval = `var(--responsive-global-${newval})`;
            }
            var styleId = 'responsive-cart-checkout-button-hover-color-preview';
            jQuery('style#' + styleId).remove();
            
            var selectors = '.page.woocommerce-cart .woocommerce a.button.alt:hover, .page.woocommerce-cart .woocommerce a.button:hover, .page.woocommerce-cart .wp-block-woocommerce-cart a.wc-block-cart__submit-button:hover, .page.woocommerce-checkout .woocommerce button.button.alt:hover, .page.woocommerce-checkout .woocommerce button.button:hover, .page.woocommerce-checkout .wp-block-woocommerce-checkout button.wc-block-components-checkout-place-order-button:hover';
            var css = selectors + ' { background-color: ' + newval + ' !important; }';
            
            jQuery('head').append('<style id="' + styleId + '">' + css + '</style>');
        } );
    } );

    //Buttons text Color
    api( 'responsive_button_text_color', function( value ) {
        value.bind( function( newval ) {
            $('.page.front-page .button,.blog.front-page .button,.read-more-button .hentry .read-more .more-link,input[type=button],input[type=submit],button,.button,.wp-block-button__link,div.wpforms-container-full .wpforms-form input[type=submit],body div.wpforms-container-full .wpforms-form button[type=submit],div.wpforms-container-full .wpforms-form .wpforms-page-button').css('color', newval );
        } );
    } );

    //Buttons border color
    api( 'responsive_button_border_color', function( value ) {
        value.bind( function( newval ) {
            $('.page.front-page .button,.blog.front-page .button,.read-more-button .hentry .read-more .more-link,input[type=button],input[type=submit],button,.button,.wp-block-button__link,div.wpforms-container-full .wpforms-form input[type=submit],body div.wpforms-container-full .wpforms-form button[type=submit],div.wpforms-container-full .wpforms-form .wpforms-page-button').css('border-color', newval );
        } );
    } );

    //Inputs color
    api( 'responsive_inputs_background_color', function( value ) {
        value.bind( function( newval ) {
            $('select,textarea,input[type=tel],input[type=email],input[type=number],input[type=search],input[type=text],input[type=date],input[type=datetime],input[type=datetime-local],input[type=month],input[type=password],input[type=range],input[type=time],input[type=url],input[type=week],div.wpforms-container-full .wpforms-form input[type=date],div.wpforms-container-full .wpforms-form input[type=datetime],div.wpforms-container-full .wpforms-form input[type=datetime-local],body div.wpforms-container-full .wpforms-form input[type=email],div.wpforms-container-full .wpforms-form input[type=month],div.wpforms-container-full .wpforms-form input[type=number],div.wpforms-container-full .wpforms-form input[type=password],div.wpforms-container-full .wpforms-form input[type=range],div.wpforms-container-full .wpforms-form input[type=search],div.wpforms-container-full .wpforms-form input[type=tel],div.wpforms-container-full .wpforms-form input[type=text],div.wpforms-container-full .wpforms-form input[type=time],div.wpforms-container-full .wpforms-form input[type=url],div.wpforms-container-full .wpforms-form input[type=week],div.wpforms-container-full .wpforms-form select,div.wpforms-container-full .wpforms-form textarea,#add_payment_method table.cart td.actions .coupon .input-text,.woocommerce-cart table.cart td.actions .coupon .input-text,.woocommerce-checkout table.cart td.actions .coupon .input-text,.woocommerce form .form-row input.input-text,.woocommerce form .form-row textarea').css('background-color', newval );
        } );
    } );

    //Inputs text Color
    api( 'responsive_inputs_text_color', function( value ) {
        value.bind( function( newval ) {
            $('select,textarea,input[type=tel],input[type=email],input[type=number],input[type=search],input[type=text],input[type=date],input[type=datetime],input[type=datetime-local],input[type=month],input[type=password],input[type=range],input[type=time],input[type=url],input[type=week],div.wpforms-container-full .wpforms-form input[type=date],div.wpforms-container-full .wpforms-form input[type=datetime],div.wpforms-container-full .wpforms-form input[type=datetime-local],body div.wpforms-container-full .wpforms-form input[type=email],div.wpforms-container-full .wpforms-form input[type=month],div.wpforms-container-full .wpforms-form input[type=number],div.wpforms-container-full .wpforms-form input[type=password],div.wpforms-container-full .wpforms-form input[type=range],div.wpforms-container-full .wpforms-form input[type=search],div.wpforms-container-full .wpforms-form input[type=tel],div.wpforms-container-full .wpforms-form input[type=text],div.wpforms-container-full .wpforms-form input[type=time],div.wpforms-container-full .wpforms-form input[type=url],div.wpforms-container-full .wpforms-form input[type=week],div.wpforms-container-full .wpforms-form select,div.wpforms-container-full .wpforms-form textarea,#add_payment_method table.cart td.actions .coupon .input-text,.woocommerce-cart table.cart td.actions .coupon .input-text,.woocommerce-checkout table.cart td.actions .coupon .input-text,.woocommerce form .form-row input.input-text,.woocommerce form .form-row textarea').css('color', newval );
        } );
    } );

    // Inputs border color
    api( 'responsive_inputs_border_color', function( value ) {
        value.bind( function( newval ) {
            $('select,textarea,input[type=tel],input[type=email],input[type=number],input[type=search],input[type=text],input[type=date],input[type=datetime],input[type=datetime-local],input[type=month],input[type=password],input[type=range],input[type=time],input[type=url],input[type=week],div.wpforms-container-full .wpforms-form input[type=date],div.wpforms-container-full .wpforms-form input[type=datetime],div.wpforms-container-full .wpforms-form input[type=datetime-local],body div.wpforms-container-full .wpforms-form input[type=email],div.wpforms-container-full .wpforms-form input[type=month],div.wpforms-container-full .wpforms-form input[type=number],div.wpforms-container-full .wpforms-form input[type=password],div.wpforms-container-full .wpforms-form input[type=range],div.wpforms-container-full .wpforms-form input[type=search],div.wpforms-container-full .wpforms-form input[type=tel],div.wpforms-container-full .wpforms-form input[type=text],div.wpforms-container-full .wpforms-form input[type=time],div.wpforms-container-full .wpforms-form input[type=url],div.wpforms-container-full .wpforms-form input[type=week],div.wpforms-container-full .wpforms-form select,div.wpforms-container-full .wpforms-form textarea,#add_payment_method table.cart td.actions .coupon .input-text,.woocommerce-cart table.cart td.actions .coupon .input-text,.woocommerce-checkout table.cart td.actions .coupon .input-text,.woocommerce form .form-row input.input-text,.woocommerce form .form-row textarea').css('border-color', newval );
        } );
    } );

    //Labels Text Color
    api( 'responsive_label_color', function( value ) {
        value.bind( function( newval ) {
            $('label').css('color', newval );
        } );
    } );

    //Main Menu Colors Section
    //Background Color
    api( 'responsive_header_menu_background_color', function( value ) {
        value.bind( function( color ) {
            if( 0 == api('responsive_transparent_header').get()) {
                let mobileBreakPoint = api('responsive_mobile_menu_breakpoint').get()+"px";

                jQuery( 'style#responsive-header-menu-background-color' ).remove();
                jQuery( 'head' ).append(
                    '<style id="responsive-header-menu-background-color">'
                    + '@media screen and (min-width: ' + mobileBreakPoint + ') {'
                    + '.site-header-row .main-navigation:not(.toggled) .main-navigation-wrapper { background-color: ' + color + ' !important; }'
                    + '} </style>'
                );
            }
        } );
    } );

    //Main Menu Colors Section
    //Background Color
    api( 'responsive_header_mobile_menu_background_color', function( value ) {
        value.bind( function( color ) {
            if( 0 == api('responsive_transparent_header').get()) {
                let mobileBreakPoint = api('responsive_mobile_menu_breakpoint').get()+"px";
                jQuery( 'style#responsive-header-mobile-menu-background-color' ).remove();
                jQuery('.responsive-off-canvas-panel').css({'background-color': color});
                jQuery( 'head' ).append(
                    '<style id="responsive-header-mobile-menu-background-color">'
                    + '@media screen and (max-width: ' + mobileBreakPoint + ') {'
                    + '.site-header-row .main-navigation.toggled,.site-header-row .main-navigation.toggled .main-navigation-wrapper, .main-navigation.toggled #header-menu, .responsive-off-canvas-panel-fullscreen.active .off-canvas-navigation, .responsive-off-canvas-panel-sidebar.active .off-canvas-navigation { background-color: ' + color + ' !important; }'
                    + '} </style>'
                );
            }
            else {
                $('.res-transparent-header .main-navigation.toggled').css('background-color', newval);
            }
        } );
    } );

    //Border Color
    api( 'responsive_header_menu_border_color', function( value ) {
        value.bind( function( newval ) {
            if( 0 == api('responsive_transparent_header').get()) {
                function isMobile(x) {
                    if (x.matches) { // If media query matches
                        $('.site-header-layout-vertical.site-header-site-branding-main-navigation:not(.site-header-full-width-main-navigation) .main-navigation').css('border-top', '1px solid '+newval);
                        $('.site-header-layout-vertical.site-header-main-navigation-site-branding:not(.site-header-full-width-main-navigation) .main-navigation').css('border-bottom', '1px solid '+newval);
                    }
                }
                var x = window.matchMedia("(max-width:" + api('responsive_mobile_menu_breakpoint').get() + "px)");
                isMobile(x); // Call listener function at run time
                x.addListener(isMobile);

                function isTablet(x) {
                    if (x.matches) { // If media query matches
                        $('.header-full-width.site-header-layout-vertical.site-header-site-branding-main-navigation .main-navigation,.responsive-site-full-width.site-header-layout-vertical.site-header-site-branding-main-navigation .main-navigation,.site-header-layout-vertical.site-header-site-branding-main-navigation:not(.site-header-full-width-main-navigation):not(.responsive-site-full-width):not(.header-full-width) .main-navigation div').css('border-top', '1px solid '+newval);
                        $('.header-full-width.site-header-layout-vertical.site-header-site-branding-main-navigation .main-navigation,.responsive-site-full-width.site-header-layout-vertical.site-header-site-branding-main-navigation .main-navigation,.site-header-layout-vertical.site-header-site-branding-main-navigation:not(.site-header-full-width-main-navigation):not(.responsive-site-full-width):not(.header-full-width) .main-navigation div').css('border-bottom', '1px solid '+newval);
                    }
                }
                var x = window.matchMedia("(min-width:" + api('responsive_mobile_menu_breakpoint').get() + "px)");
                isTablet(x); // Call listener function at run time
                x.addListener(isTablet);

                $('.site-header-layout-vertical.site-header-full-width-main-navigation.site-header-site-branding-main-navigation .main-navigation').css('border-top', '1px solid '+newval);
                $('.site-header-layout-vertical.site-header-full-width-main-navigation.site-header-main-navigation-site-branding .main-navigation').css('border-bottom', '1px solid '+newval);

            }
        } );
    } );

    //Active Menu Background Color
    api( 'responsive_header_active_menu_background_color', function( value ) {
        value.bind( function( newval ) {
            $('.main-navigation .menu  .current_page_item > a,.main-navigation .menu  .current-menu-item > a').css('background-color', newval );
        } );
    } );

    //Active Menu Background Color
    api( 'responsive_header_hover_menu_background_color', function( value ) {
        value.bind( function( newval ) {
            $(".main-navigation .menu li > a").hover(
                function() {
                    $(this).css("background-color", api('responsive_header_hover_menu_background_color').get());
                },
                function() {
                    $(this).css("background-color", api('responsive_header_active_menu_background_color').get());
                }
            );
        } );
    } );

    //Menu Item Link Color
    api( 'responsive_header_menu_link_color', function( value ) {
        value.bind( function( newval ) {
            if ( newval && newval.startsWith('palette') ) {
                newval = `var(--responsive-global-${newval})`;
            }
            $('.main-navigation .menu > li > a').css('color', newval );
            if ( api('responsive_header_menu_link_hover_color').get() === '' && api('responsive_header_active_menu_link_color').get() === '' ) {
                jQuery( 'style#responsive-header-menu-link-color-change' ).remove();
                jQuery( 'head' ).append(
                    '<style id="responsive-header-menu-link-color-change">'
                    + '.menu-item-hover-style-underline .menu.nav-menu > li::after { border-bottom: 3px solid '+newval+' }'
                    + '.menu-item-hover-style-overline .menu.nav-menu > li::before { border-bottom: 3px solid '+newval+' }'
                    + '</style>'
                );
            }
        } );
    } );

    api( 'responsive_header_menu_link_color', function( value ) {
        value.bind( function( newval ) {
            if ( newval && newval.startsWith('palette') ) {
                newval = `var(--responsive-global-${newval})`;
            }
            $('.main-navigation .res-iconify svg').css('stroke', newval );
        } );
    } );

	//Active Menu Link Color
    api( 'responsive_header_active_menu_link_color', function( value ) {
        value.bind( function( newval ) {
            $('.main-navigation .menu .current_page_item > a,.main-navigation .menu .current-menu-item > a,.main-navigation .menu .current-menu-item.current_page_item a').css('color', newval );
            if ( api('responsive_header_menu_link_hover_color').get() === '' ) {
                jQuery( 'style#responsive-header-active-menu-link-color-change' ).remove();
                jQuery( 'head' ).append(
                    '<style id="responsive-header-active-menu-link-color-change">'
                    + '.menu-item-hover-style-underline .main-navigation .menu > li.current-menu-item::after, .menu-item-hover-style-underline .main-navigation .menu > li.current_page_item::after { border-bottom: 3px solid '+newval+' }'
                    + '.menu-item-hover-style-underline .main-navigation .menu > li.current-menu-item::before, .menu-item-hover-style-underline .main-navigation .menu > li.current_page_item::before { border-bottom: 3px solid '+newval+' }'
                    + '</style>'
                );
            }
        } );
    } );

    api( 'responsive_header_active_menu_link_color', function( value ) {
        value.bind( function( newval ) {
            $('.main-navigation .menu > li.current-menu-item > a > .res-iconify svg').css('stroke', newval );
        } );
    } );

    //Sub Menu Background Color
    api( 'responsive_header_sub_menu_background_color', function( value ) {
        value.bind( function( newval ) {
            $('.main-navigation .children,.main-navigation .sub-menu,.responsive-off-canvas-panel .sub-menu,.responsive-off-canvas-panel .sub-menu li, .responsive-off-canvas-panel .sub-menu li a, .responsive-off-canvas-panel .children,#off-canvas-menu .sub-menu, #off-canvas-menu .sub-menu li, #off-canvas-menu .sub-menu li a, #off-canvas-menu .children,.off-canvas-widget-area #off-canvas-menu .sub-menu,#off-canvas-menu .sub-menu li, #off-canvas-menu .sub-menu li a,.off-canvas-widget-area #off-canvas-menu .children,#off-canvas-site-navigation .menu .sub-menu, #off-canvas-site-navigation .menu .sub-menu li, #off-canvas-site-navigation .menu .sub-menu li a, #off-canvas-site-navigation .menu .children, #off-canvas-site-navigation .menu .children a').css('background-color', newval );
        } );
    } );

    //Sub Menu Active Background Color
    api( 'responsive_header_active_sub_menu_background_color', function( value ) {
        value.bind( function( newval ) {
            $('.main-navigation .menu .sub-menu .current_page_item > a,.main-navigation .menu .sub-menu .current-menu-item > a,.main-navigation .menu .children li.current_page_item a,.responsive-off-canvas-panel .sub-menu .current_page_item > a,.responsive-off-canvas-panel .sub-menu .current-menu-item > a,.responsive-off-canvas-panel .children li.current_page_item a,#off-canvas-menu .sub-menu .current_page_item > a,#off-canvas-menu .sub-menu .current-menu-item > a,#off-canvas-menu .children li.current_page_item a,.off-canvas-widget-area #off-canvas-menu .sub-menu .current_page_item > a,.off-canvas-widget-area #off-canvas-menu .sub-menu .current-menu-item > a,.off-canvas-widget-area #off-canvas-menu .children li.current_page_item a,#off-canvas-site-navigation .menu .sub-menu .current_page_item > a,#off-canvas-site-navigation .menu .sub-menu .current-menu-item > a,#off-canvas-site-navigation .menu .children li.current_page_item a').css('background-color', newval );
        } );
    } );

    //Sub Menu Hover Background Color
    api( 'responsive_header_hover_sub_menu_background_color', function( value ) {
        value.bind( function( newval ) {
            $('.main-navigation .children li a:hover,.main-navigation .sub-menu li a:hover, .main-navigation .menu .sub-menu .current_page_item > a:hover,.main-navigation .menu .sub-menu .current-menu-item > a:hover,.responsive-off-canvas-panel .sub-menu li a:hover,.responsive-off-canvas-panel .children li a:hover,.responsive-off-canvas-panel .sub-menu .current_page_item > a:hover,.responsive-off-canvas-panel .sub-menu .current-menu-item > a:hover,#off-canvas-menu .sub-menu li a:hover,#off-canvas-menu .children li a:hover,#off-canvas-menu .sub-menu .current_page_item > a:hover,#off-canvas-menu .sub-menu .current-menu-item > a:hover,.off-canvas-widget-area #off-canvas-menu .sub-menu li a:hover,.off-canvas-widget-area #off-canvas-menu .children li a:hover,.off-canvas-widget-area #off-canvas-menu .sub-menu .current_page_item > a:hover,.off-canvas-widget-area #off-canvas-menu .sub-menu .current-menu-item > a:hover,#off-canvas-site-navigation .menu .sub-menu li a:hover,#off-canvas-site-navigation .menu .children li a:hover,#off-canvas-site-navigation .menu .sub-menu .current_page_item > a:hover,#off-canvas-site-navigation .menu .sub-menu .current-menu-item > a:hover').css('background-color', newval );
        } );
    } );

    //Sub Menu Item Link Color
    api( 'responsive_header_sub_menu_link_color', function( value ) {
        value.bind( function( newval ) {
            $('.main-navigation .children li a,.main-navigation .sub-menu li a,.responsive-off-canvas-panel .sub-menu li a,.responsive-off-canvas-panel .children li a,#off-canvas-menu .sub-menu li a,#off-canvas-menu .children li a,.off-canvas-widget-area #off-canvas-menu .sub-menu li a,.off-canvas-widget-area #off-canvas-menu .children li a,#off-canvas-site-navigation .menu .sub-menu li a,#off-canvas-site-navigation .menu .children li a').css('color', newval );
        } );
    } );

    api( 'responsive_header_sub_menu_link_color', function( value ) {
        value.bind( function( newval ) {
            $('.main-navigation .sub-menu li .res-iconify svg').css('stroke', newval );
        } );
    } );

	//Active Sub Menu Item Link Color
    api( 'responsive_header_sub_menu_active_link_color', function( value ) {
        value.bind( function( newval ) {
            $('.main-navigation .menu .sub-menu .current_page_item > a,.main-navigation .menu .sub-menu .current-menu-item > a,.main-navigation .menu .children li.current_page_item a,.responsive-off-canvas-panel .sub-menu .current_page_item > a,.responsive-off-canvas-panel .sub-menu .current-menu-item > a,.responsive-off-canvas-panel .children li.current_page_item a,#off-canvas-menu .sub-menu .current_page_item > a,#off-canvas-menu .sub-menu .current-menu-item > a,#off-canvas-menu .children li.current_page_item a,.off-canvas-widget-area #off-canvas-menu .sub-menu .current_page_item > a,.off-canvas-widget-area #off-canvas-menu .sub-menu .current-menu-item > a,.off-canvas-widget-area #off-canvas-menu .children li.current_page_item a,#off-canvas-site-navigation .menu .sub-menu .current_page_item > a,#off-canvas-site-navigation .menu .sub-menu .current-menu-item > a,#off-canvas-site-navigation .menu .children li.current_page_item a').css('color', newval );
        } );
    } );
    //Active Sub Menu Item Link Color
    api( 'responsive_transparent_header_sub_menu_active_link_color', function( value ) {
        value.bind( function( newval ) {
            $('.res-transparent-header .main-navigation .menu .sub-menu .current_page_item > a,.res-transparent-header .main-navigation .menu .sub-menu .current-menu-item > a,.res-transparent-header .main-navigation .menu .children li.current_page_item a,.res-transparent-header .responsive-off-canvas-panel .sub-menu .current_page_item > a,.res-transparent-header .responsive-off-canvas-panel .sub-menu .current-menu-item > a,.res-transparent-header .responsive-off-canvas-panel .children li.current_page_item a,.res-transparent-header #off-canvas-menu .sub-menu .current_page_item > a,.res-transparent-header #off-canvas-menu .sub-menu .current-menu-item > a,.res-transparent-header #off-canvas-menu .children li.current_page_item a,.res-transparent-header .off-canvas-widget-area #off-canvas-menu .sub-menu .current_page_item > a,.res-transparent-header .off-canvas-widget-area #off-canvas-menu .sub-menu .current-menu-item > a,.res-transparent-header .off-canvas-widget-area #off-canvas-menu .children li.current_page_item a,.res-transparent-header #off-canvas-site-navigation .menu .sub-menu .current_page_item > a,.res-transparent-header #off-canvas-site-navigation .menu .sub-menu .current-menu-item > a,.res-transparent-header #off-canvas-site-navigation .menu .children li.current_page_item a').css('color', newval );
        } );
    } );

    //Menu Toggle Background Color
    api( 'responsive_header_menu_toggle_background_color', function( value ) {
        value.bind( function( newval ) {
            $('.site-header-item-toggle-button .menu-toggle, #responsive-off-canvas-panel .responsive-off-canvas-panel-close').css('background-color', newval );
            $('.menu-toggle svg rect:first-child, .menu-toggle svg circle:first-child ').css('fill',newval);
        } );
    } );

    //Menu Toggle Color
    api( 'responsive_header_menu_toggle_color', function( value ) {
        value.bind( function( newval ) {
         $('.main-navigation .menu-toggle').css('color', newval );
        } );
    } );

    api( 'responsive_mobile_menu_toggle_border_color', function( value ) {
        value.bind( function( newval ) {
         $('.site-header-item-toggle-button .menu-toggle, #responsive-off-canvas-panel .responsive-off-canvas-panel-close').css({'border-color': newval});
         $('.site-header-item-toggle-button .menu-toggle, #responsive-off-canvas-panel .responsive-off-canvas-panel-close').css({'border-color': newval} );
        } );
    } );
    //Sub Menu divider
    api( 'responsive_sub_menu_divider_color', function( value ) {
        value.bind( function( newval ) {
         $('.main-navigation .children li, .main-navigation .sub-menu li,.responsive-off-canvas-panel .sub-menu li,.responsive-off-canvas-panel .children li,#off-canvas-menu .sub-menu li,#off-canvas-menu .children li,.off-canvas-widget-area #off-canvas-menu .sub-menu li,.off-canvas-widget-area #off-canvas-menu .children li,#off-canvas-site-navigation .menu .sub-menu li,#off-canvas-site-navigation .menu .children li').css('border-color', newval );
        } );
    } );
    //Transparent Header Main Menu Colors Section
    //Background Color
    api( 'responsive_transparent_header_menu_background_color', function( value ) {
        value.bind( function( color ) {
            if( 1 === api('responsive_transparent_header').get()) {

                let mobileBreakPoint = api('responsive_mobile_menu_breakpoint').get()+"px";

                jQuery( 'style#responsive-transparent-header-menu-background-color' ).remove();
                jQuery( 'head' ).append(
                    '<style id="responsive-transparent-header-menu-background-color">'
                    + '@media screen and (min-width: ' + mobileBreakPoint + ') {'
                    + '.res-transparent-header .site-header-row .main-navigation:not(.toggled) .main-navigation-wrapper { background-color: ' + color + ' !important; }'
                    + '} </style>'
                );
            }
        } );
    } );

    //Main Menu Colors Section
    //Background Color
    api( 'responsive_transparent_header_mobile_menu_background_color', function( value ) {
        value.bind( function( color ) {
            if( 1 === api('responsive_transparent_header').get()) {
                let mobileBreakPoint = api('responsive_mobile_menu_breakpoint').get()+"px";
                jQuery( 'style#responsive-transparent-header-mobile-menu-background-color' ).remove();
                jQuery( 'head' ).append(
                    '<style id="responsive-transparent-header-mobile-menu-background-color">'
                    + '@media screen and (max-width: ' + mobileBreakPoint + ') {'
                    + '.res-transparent-header .site-header-row .main-navigation.toggled,.res-transparent-header .site-header-row .main-navigation.toggled .main-navigation-wrapper, .off-canvas-widget-area #off-canvas-menu li a, #off-canvas-site-navigation .menu li a, .off-canvas-widget-area .off-canvas-navigation { background-color: ' + color + ' !important; }'
                    + '} </style>'
                );
            }
        } );
    } );

    //Border Color
    api( 'responsive_transparent_header_menu_border_color', function( value ) {
        value.bind( function( newval ) {
            if( 0 == api('responsive_transparent_header').get()) {
                function isMobile(x) {
                    if (x.matches) { // If media query matches
                        $('.res-transparent-header.site-header-layout-vertical.site-header-site-branding-main-navigation:not(.site-header-full-width-main-navigation) .main-navigation').css('border-top', '1px solid '+newval);
                        $('.res-transparent-header.site-header-layout-vertical.site-header-main-navigation-site-branding:not(.site-header-full-width-main-navigation) .main-navigation').css('border-bottom', '1px solid '+newval);
                    }
                }
                var x = window.matchMedia("(max-width:" + api('responsive_mobile_menu_breakpoint').get() + "px)");
                isMobile(x); // Call listener function at run time
                x.addListener(isMobile);

                function isTablet(x) {
                    if (x.matches) { // If media query matches
                        $('.res-transparent-header.header-full-width.site-header-layout-vertical.site-header-site-branding-main-navigation .main-navigation,.res-transparent-header.responsive-site-full-width.site-header-layout-vertical.site-header-site-branding-main-navigation .main-navigation,.res-transparent-header.site-header-layout-vertical.site-header-site-branding-main-navigation:not(.site-header-full-width-main-navigation):not(.responsive-site-full-width):not(.header-full-width) .main-navigation div').css('border-top', '1px solid '+newval);
                        $('.res-transparent-header.header-full-width.site-header-layout-vertical.site-header-site-branding-main-navigation .main-navigation,.res-transparent-header.responsive-site-full-width.site-header-layout-vertical.site-header-site-branding-main-navigation .main-navigation,.res-transparent-header.site-header-layout-vertical.site-header-site-branding-main-navigation:not(.site-header-full-width-main-navigation):not(.responsive-site-full-width):not(.header-full-width) .main-navigation div').css('border-bottom', '1px solid '+newval);
                    }
                }
                var x = window.matchMedia("(min-width:" + api('responsive_mobile_menu_breakpoint').get() + "px)");
                isTablet(x); // Call listener function at run time
                x.addListener(isTablet);

                $('.res-transparent-header.site-header-layout-vertical.site-header-full-width-main-navigation.site-header-site-branding-main-navigation .main-navigation').css('border-top', '1px solid '+newval);
                $('.res-transparent-header.site-header-layout-vertical.site-header-full-width-main-navigation.site-header-main-navigation-site-branding .main-navigation').css('border-bottom', '1px solid '+newval);

            }
        } );
    } );

    //Active Menu Background Color
    api( 'responsive_transparent_header_active_menu_background_color', function( value ) {
        value.bind( function( newval ) {
            $('.res-transparent-header .main-navigation .menu .current_page_item > a,.res-transparent-header .main-navigation .menu .current-menu-item > a').css('background-color,.off-canvas-widget-area #off-canvas-menu li.current-menu-item > a,.off-canvas-widget-area #off-canvas-menu li.current_page_item > a,#off-canvas-site-navigation .menu li.current_page_item > a', newval );
        } );
    } );

    //Active Menu Background Color
    api( 'responsive_transparent_header_hover_menu_background_color', function( value ) {
        value.bind( function( newval ) {
            $('.res-transparent-header .main-navigation .menu .current_page_item > a:hover,.res-transparent-header .main-navigation .menu .current-menu-item > a:hover,.res-transparent-header .main-navigation .menu li > a:hover,.res-transparent-header .main-navigation .menu .page_item a:hover,.off-canvas-widget-area #off-canvas-menu li a:hover, #off-canvas-site-navigation .menu li a:hover').css('background-color', newval );
        } );
    } );

    //Menu Item Link Color
    api( 'responsive_transparent_header_menu_link_color', function( value ) {
        value.bind( function( newval ) {
            $('.res-transparent-header .main-navigation .menu > li > a').css('color', newval );
            if ( api('responsive_transparent_header_menu_link_hover_color').get() === '' && api('responsive_transparent_header_active_menu_link_color').get() === '' ) {
                jQuery( 'style#responsive-transparent-header-menu-link-color-change' ).remove();
                jQuery( 'head' ).append(
                    '<style id="responsive-transparent-header-menu-link-color-change">'
                    + '.menu-item-hover-style-underline .menu.nav-menu > li::after { border-bottom: 3px solid '+newval+' }'
                    + '.menu-item-hover-style-overline .menu.nav-menu > li::before { border-bottom: 3px solid '+newval+' }'
                    + '</style>'
                );
            }
        } );
    } );

    api( 'responsive_transparent_header_menu_link_color', function( value ) {
        value.bind( function( newval ) {
            $('.res-transparent-header .main-navigation .res-iconify svg').css('stroke', newval );
        } );
    } );

    //Sub Menu Background Color
    api( 'responsive_transparent_header_sub_menu_background_color', function( value ) {
        value.bind( function( newval ) {
            $('.res-transparent-header .main-navigation .children,.res-transparent-header .main-navigation .sub-menu,.res-transparent-header .responsive-off-canvas-panel .sub-menu,.res-transparent-header .responsive-off-canvas-panel .children,.res-transparent-header #off-canvas-menu .sub-menu,.res-transparent-header #off-canvas-menu .children,.res-transparent-header .off-canvas-widget-area #off-canvas-menu .sub-menu,.res-transparent-header .off-canvas-widget-area #off-canvas-menu .children,.res-transparent-header #off-canvas-site-navigation .menu .sub-menu,.res-transparent-header #off-canvas-site-navigation .menu .children').css('background-color', newval );
        } );
    } );

    //Sub Menu Active Background Color
    api( 'responsive_transparent_header_active_sub_menu_background_color', function( value ) {
        value.bind( function( newval ) {
            $('.res-transparent-header .main-navigation .children li.current_page_item a,.res-transparent-header .main-navigation .sub-menu .current-menu-item > a, .res-transparent-header .main-navigation .sub-menu .current_page_item > a,.res-transparent-header .responsive-off-canvas-panel .sub-menu .current_page_item > a,.res-transparent-header .responsive-off-canvas-panel .sub-menu .current-menu-item > a,.res-transparent-header .responsive-off-canvas-panel .children li.current_page_item a,.res-transparent-header #off-canvas-menu .sub-menu .current_page_item > a,.res-transparent-header #off-canvas-menu .sub-menu .current-menu-item > a,.res-transparent-header #off-canvas-menu .children li.current_page_item a,.res-transparent-header .off-canvas-widget-area #off-canvas-menu .sub-menu .current_page_item > a,.res-transparent-header .off-canvas-widget-area #off-canvas-menu .sub-menu .current-menu-item > a,.res-transparent-header .off-canvas-widget-area #off-canvas-menu .children li.current_page_item a,.res-transparent-header #off-canvas-site-navigation .menu .sub-menu .current_page_item > a,.res-transparent-header #off-canvas-site-navigation .menu .sub-menu .current-menu-item > a,.res-transparent-header #off-canvas-site-navigation .menu .children li.current_page_item a').css('background-color', newval );
        } );
    } );

    //Sub Menu Hover Background Color
    api( 'responsive_transparent_header_hover_sub_menu_background_color', function( value ) {
        value.bind( function( newval ) {
            $('.res-transparent-header .main-navigation .children li a:hover,.res-transparent-header .main-navigation .sub-menu li a:hover,.res-transparent-header .main-navigation .menu .sub-menu .current-menu-item > a:hover,.res-transparent-header .main-navigation .menu .sub-menu .current_page_item > a:hover,.res-transparent-header .responsive-off-canvas-panel .sub-menu li a:hover,.res-transparent-header .responsive-off-canvas-panel .children li a:hover,.res-transparent-header .responsive-off-canvas-panel .sub-menu .current_page_item > a:hover,.res-transparent-header .responsive-off-canvas-panel .sub-menu .current-menu-item > a:hover,.res-transparent-header #off-canvas-menu .sub-menu li a:hover,.res-transparent-header #off-canvas-menu .children li a:hover,.res-transparent-header #off-canvas-menu .sub-menu .current_page_item > a:hover,.res-transparent-header #off-canvas-menu .sub-menu .current-menu-item > a:hover,.res-transparent-header .off-canvas-widget-area #off-canvas-menu .sub-menu li a:hover,.res-transparent-header .off-canvas-widget-area #off-canvas-menu .children li a:hover,.res-transparent-header .off-canvas-widget-area #off-canvas-menu .sub-menu .current_page_item > a:hover,.res-transparent-header .off-canvas-widget-area #off-canvas-menu .sub-menu .current-menu-item > a:hover,.res-transparent-header #off-canvas-site-navigation .menu .sub-menu li a:hover,.res-transparent-header #off-canvas-site-navigation .menu .children li a:hover,.res-transparent-header #off-canvas-site-navigation .menu .sub-menu .current_page_item > a:hover,.res-transparent-header #off-canvas-site-navigation .menu .sub-menu .current-menu-item > a:hover').css('background-color', newval );
        } );
    } );

    //Sub Menu Item Link Color
    api( 'responsive_transparent_header_sub_menu_link_color', function( value ) {
        value.bind( function( newval ) {
            $('.res-transparent-header .main-navigation .children li a,.res-transparent-header .main-navigation .sub-menu li a,.res-transparent-header .responsive-off-canvas-panel .sub-menu li a,.res-transparent-header .responsive-off-canvas-panel .children li a,.res-transparent-header #off-canvas-menu .sub-menu li a,.res-transparent-header #off-canvas-menu .children li a,.res-transparent-header .off-canvas-widget-area #off-canvas-menu .sub-menu li a,.res-transparent-header .off-canvas-widget-area #off-canvas-menu .children li a,.res-transparent-header #off-canvas-site-navigation .menu .sub-menu li a,.res-transparent-header #off-canvas-site-navigation .menu .children li a').css('color', newval );
        } );
    } );

    api( 'responsive_transparent_header_sub_menu_link_color', function( value ) {
        value.bind( function( newval ) {
            $('.res-transparent-header .main-navigation .sub-menu li .res-iconify svg').css('stroke', newval );
        } );
    } );

    //Menu Toggle Background Color
    api( 'responsive_transparent_header_menu_toggle_background_color', function( value ) {
        value.bind( function( newval ) {
            $('.res-transparent-header .main-navigation .menu-toggle, .res-transparent-header #masthead-mobile .menu-toggle').css('background-color', newval );
        } );
    } );

    //Menu Toggle Color
    api( 'responsive_transparent_header_menu_toggle_color', function( value ) {
        value.bind( function( newval ) {
            $('.res-transparent-header .main-navigation .menu-toggle').css('color', newval );
        } );
    } );

    //Active Menu Background Color
    api( 'responsive_transparent_header_active_menu_link_color', function( value ) {
        value.bind( function( newval ) {
            $('.main-navigation .menu > li.current_page_item > a,.main-navigation .menu > li.current-menu-item > a').css('color', newval );
            if ( api('responsive_transparent_header_menu_link_hover_color').get() === '' ) {
                jQuery( 'style#responsive-transparent-header-active-menu-link-color-change' ).remove();
                jQuery( 'head' ).append(
                    '<style id="responsive-transparent-header-active-menu-link-color-change">'
                    + '.menu-item-hover-style-underline .main-navigation .menu > li.current-menu-item::after, .menu-item-hover-style-underline .main-navigation .menu > li.current_page_item::after { border-bottom: 3px solid '+newval+' }'
                    + '.menu-item-hover-style-underline .main-navigation .menu > li.current-menu-item::before, .menu-item-hover-style-underline .main-navigation .menu > li.current_page_item::before { border-bottom: 3px solid '+newval+' }'
                    + '</style>'
                );
            }
        } );
    } );

    //Active Menu Background Color
    api( 'responsive_sub_menu_border_color', function( value ) {
        value.bind( function( newval ) {
            $('.main-navigation .children, .main-navigation .sub-menu,.responsive-off-canvas-panel .sub-menu,.responsive-off-canvas-panel .children,#off-canvas-menu .sub-menu,#off-canvas-menu .children,.off-canvas-widget-area #off-canvas-menu .sub-menu,.off-canvas-widget-area #off-canvas-menu .children,#off-canvas-site-navigation .menu .sub-menu,#off-canvas-site-navigation .menu .children').css('border-color', newval );
        } );
    } );


    //Footer Color Section
    //Background Color
    api( 'responsive_footer_background_color', function( value ) {
        value.bind( function( newval ) {
            $('.site-footer').css('background-color', newval );
        } );
    } );

    //Text Color
    api( 'responsive_footer_text_color', function( value ) {
        value.bind( function( newval ) {
            $('.site-footer, .site-footer h1,.site-footer h2,.site-footer h3,.site-footer h4,.site-footer h5,.site-footer h6').css('color', newval );
        } );
    } );

    //Links Color
    api( 'responsive_footer_links_color', function( value ) {
        value.bind( function( newval ) {
            $('.site-footer a').css('color', newval );
        } );
    } );

    //Border Color
    // api( 'responsive_footer_border_color', function( value ) {
    //     value.bind( function( newval ) {
    //         $('.footer-bar').css('border-color', newval );
    //     } );
    // } );

    //Content Header Color Section
    //Title Color
    api( 'responsive_content_header_heading_color', function( value ) {
        value.bind( function( newval ) {
            $('.site-content-header .page-header .page-title,.site-content-header .page-title').css('color', newval );
        } );
    } );

    //Description Color
    api( 'responsive_content_header_description_color', function( value ) {
        value.bind( function( newval ) {
            $('.site-content-header .page-header .page-description,.site-content-header .page-description').css('color', newval );
        } );
    } );

    //Breadcrumb Color
    api( 'responsive_breadcrumb_color', function( value ) {
        value.bind( function( newval ) {
            $('.site-content-header .breadcrumb-list,.site-content-header .breadcrumb-list a, .woocommerce .woocommerce-breadcrumb,.woocommerce .woocommerce-breadcrumb a').css('color', newval );
        } );
    } );

    //Product Catalog Options Color Section
    //Rating Color
    api( 'responsive_shop_product_rating_color', function( value ) {
        value.bind( function( newval ) {
            if ( newval && newval.startsWith('palette') ) {
                newval = `var(--responsive-global-${newval})`;
            }
            $('.woocommerce .star-rating span').not('.woocommerce-tabs .reviews_tab').css('color', newval );
        } );
    } );

    //Product Price Color
    api( 'responsive_shop_product_price_color', function( value ) {
        value.bind( function( newval ) {
            $('.wc-block-grid__product-price,.woocommerce ul.products li.product .price').css('color', newval );
        } );
    } );

    // Product Background Color
    api('responsive_shop_product_background_color', function (value) {
        value.bind(function (newval) {
            var styleTag = $('#responsive-live-preview');
            if (!styleTag.length) {
                styleTag = $('<style id="responsive-live-preview"></style>').appendTo('head');
            }
            styleTag.html(
                'li.product {' +
                'background-color: ' + newval + '!important;' +
                '}'
            );  
        });
    });



    //Buttons Color
    api( 'responsive_add_to_cart_button_color', function( value ) {
        value.bind( function( newval ) {
            $('.woocommerce #respond input#submit,.wp-block-button__link.add_to_cart_button,.woocommerce div.product .woocommerce-tabs ul.tabs li a,.woocommerce div.product .woocommerce-tabs ul.tabs li,.woocommerce button.button.alt,.woocommerce button.button,.woocommerce a.button,.woocommerce .widget_price_filter .ui-slider .ui-slider-handle,.woocommerce .widget_price_filter .ui-slider .ui-slider-range,.wc-block-grid__product-onsale,.woocommerce span.onsale').css('background-color', newval );
            $('.woocommerce div.product .woocommerce-tabs ul.tabs::before,.woocommerce div.product .woocommerce-tabs ul.tabs li').css('border-color', newval );
        } );
    } );

    //Buttons Text
    api( 'responsive_add_to_cart_button_text_color', function( value ) {
        value.bind( function( newval ) {
            if( newval && newval.startsWith('palette') ) {
                newval = `var(--responsive-global-${newval})`;
            }
            $('.woocommerce span.onsale,.wc-block-grid__product-onsale,.woocommerce #respond input#submit,.wp-block-button__link.add_to_cart_button,.woocommerce div.product .woocommerce-tabs ul.tabs li a,.woocommerce div.product .woocommerce-tabs ul.tabs li,.woocommerce button.button.alt,.woocommerce button.button,.woocommerce a.button').css('color', newval );
        } );
    } );

    //Cart Options Color Section
    //Button Color
    api( 'responsive_cart_buttons_color', function( value ) {
        value.bind( function( newval ) {
            $('.page.woocommerce-cart .woocommerce button.button:disabled,.page.woocommerce-cart .woocommerce button.button:disabled[disabled],.page.woocommerce-cart .woocommerce button.button').css('background-color', newval );
            $('.page.woocommerce-cart .wp-block-woocommerce-cart button.wc-block-components-totals-coupon__button').css('background-color', newval );
            $('.page.woocommerce-cart .wp-block-woocommerce-cart button.wc-block-components-totals-coupon__button').css('border-color', newval );
            $('.woocommerce #respond input#submit.alt,.woocommerce a.button.alt,.woocommerce button.button.alt,.woocommerce input.button.alt,.woocommerce #respond input#submit,.woocommerce a.button,.woocommerce button.button,.woocommerce input.button ').css('border-color', newval );
        } );
    } );

    //Button Text Color
    api( 'responsive_cart_buttons_text_color', function( value ) {
        value.bind( function( newval ) {
            if( newval && newval.startsWith('palette') ) {
                newval = `var(--responsive-global-${newval})`;
            }
            $('.page.woocommerce-cart .woocommerce button.button:disabled,.page.woocommerce-cart .woocommerce button.button:disabled[disabled],.page.woocommerce-cart .woocommerce button.button').css('color', newval );
            $('.page.woocommerce-cart .wp-block-woocommerce-cart button.wc-block-components-totals-coupon__button').css('color', newval );
        } );
    } );

    //Checkout Button Color
    api( 'responsive_cart_checkout_button_color', function( value ) {
        value.bind( function( color ) {
            if( color && color.startsWith('palette') ) {
                color = `var(--responsive-global-${color})`;
            }
            jQuery('style#responsive-cart-checkout-button-color').remove();
            jQuery('head').append(
                '<style id="responsive-cart-checkout-button-color">'
                + '.page.woocommerce-cart .woocommerce a.button.alt,.page.woocommerce-cart .woocommerce a.button,.page.woocommerce-checkout .woocommerce button.button.alt,.page.woocommerce-checkout .woocommerce button.button, .page.woocommerce-cart .wp-block-woocommerce-cart a.wc-block-cart__submit-button, .page.woocommerce-checkout .wp-block-woocommerce-checkout button.wc-block-components-checkout-place-order-button { background-color: ' + color + ' !important; }'
                + '</style>'
            );
        } );
    } );

    //Checkout Button Text Color
    api( 'responsive_cart_checkout_button_text_color', function( value ) {
        value.bind( function( newval ) {
            if ( newval && newval.startsWith('palette') ) {
                newval = `var(--responsive-global-${newval})`;
            }
            $('.page.woocommerce-cart .woocommerce a.button.alt,.page.woocommerce-cart .woocommerce a.button,.page.woocommerce-checkout .woocommerce button.button.alt,.page.woocommerce-checkout .woocommerce button.button').css('color', newval );
            $('.page.woocommerce-cart .wp-block-woocommerce-cart a.wc-block-cart__submit-button, .page.woocommerce-checkout .wp-block-woocommerce-checkout button.wc-block-components-checkout-place-order-button').css('color', newval );
        } );
    } );
    // Cart Buttons Text Color.
    api ( 'responsive_cart_buttons_hover_color', function(value){
        value.bind( function( newval ) {
            $(".page.woocommerce-cart .wp-block-woocommerce-cart button.wc-block-components-totals-coupon__button").hover(
                function() {
                    const cartButtonsBGHoverColor = processThemeSettingForCSS('responsive_cart_buttons_hover_color');
                    $(this).css("background-color", cartButtonsBGHoverColor);
                },
                function() {
                    $(this).css("background-color", api('responsive_cart_buttons_color').get());
                }
            );
        } );
    } );
    // Cart Buttons Text Hover Color.
    api ( 'responsive_cart_buttons_hover_text_color', function(value){
        value.bind( function( newval ) {
            $(".page.woocommerce-cart .wp-block-woocommerce-cart button.wc-block-components-totals-coupon__button").hover(
                function() {
                    const cartButtonTextHoverColor = processThemeSettingForCSS('responsive_cart_buttons_hover_text_color');
                    $(this).css("color", cartButtonTextHoverColor);
                },
                function() {
                    const cartButtonTextColor = processThemeSettingForCSS('responsive_cart_buttons_text_color');
                    $(this).css("color", cartButtonTextColor);
                }
            );
        } );
    } );
    //Checkout Button Hover Color
    api ( 'responsive_cart_checkout_button_hover_color', function(value){
        value.bind( function( color ) {
            jQuery('style#responsive-cart-checkout-button-hover-color').remove();
            jQuery('head').append(
                '<style id="responsive-cart-checkout-button-hover-color">'
                + '.page.woocommerce-cart .woocommerce a.button.alt:hover,.page.woocommerce-cart .woocommerce a.button:hover,.page.woocommerce-checkout .woocommerce button.button.alt:hover,.page.woocommerce-checkout .woocommerce button.button:hover, .page.woocommerce-cart .wp-block-woocommerce-cart a.wc-block-cart__submit-button:hover, .page.woocommerce-checkout .wp-block-woocommerce-checkout button.wc-block-components-checkout-place-order-button:hover { background-color: ' + color + ' !important; }'
                + '</style>'
            );
        } );
    } );
    //Checkout Button Text Hover Color
    api ( 'responsive_cart_checkout_button_hover_text_color', function(value){
        value.bind( function( newval ) {
            $(".page.woocommerce-cart .wp-block-woocommerce-cart a.wc-block-cart__submit-button, .page.woocommerce-checkout .wp-block-woocommerce-checkout button.wc-block-components-checkout-place-order-button").hover(
                function() {
                    const checkoutButtonTextHoverColor = processThemeSettingForCSS('responsive_cart_checkout_button_hover_text_color');
                    $(this).css("color", checkoutButtonTextHoverColor);
                },
                function() {
                    const checkoutButtonTextColor = processThemeSettingForCSS('responsive_cart_checkout_button_text_color');
                    $(this).css("color", checkoutButtonTextColor);
                }
            );
        } );
    } );

    //Single Product Floating Bar -> Colors
    //Floating bar background color
    api( 'responsive_floatingb_background_color', function( value ) {
        value.bind( function( newval ) {
            $( '.responsive-floating-bar' ).css( 'background-color', newval );
        } );
    } );

    //Floating bar title color
    api( 'responsive_floatingb_title_color', function( value ) {
        value.bind( function( newval ) {
            $( '.floatingb-title' ).css( 'color', newval );
        } );
    } );

    //Floating bar price color
    api( 'responsive_floatingb_price_color', function( value ) {
        value.bind( function( newval ) {
            $( '.floatingb-price' ).css( 'color', newval );
        } );
    } );

    //Floating bar quantity input background color
    api( 'responsive_floatingb_qty_input_background_color', function( value ) {
        value.bind( function( newval ) {
            $( '.responsive-floating-bar .input-text' ).css( 'background-color', newval );
        } );
    } );

    //Floating bar quantity input font color
    api( 'responsive_floatingb_qty_input_font_color', function( value ) {
        value.bind( function( newval ) {
            $( '.responsive-floating-bar .input-text' ).css( 'color', newval );
        } );
    } );

    //Floating bar quantity input border color
    api( 'responsive_floatingb_qty_input_border_color', function( value ) {
        value.bind( function( newval ) {
            $( '.responsive-floating-bar .input-text' ).css( 'border-color', newval );
        } );
    } );

    //Floating bar add to cart background color
    api( 'responsive_floatingb_addtocart_background_color', function( value ) {
        value.bind( function( newval ) {
            $( '.responsive-floating-bar .floating-bar-addbtn' ).css( 'background-color', newval );
            var originalFloatingbBgHoverColor = api( 'responsive_floatingb_addtocart_bghover_color' ).get();
            $( '.responsive-floating-bar .floating-bar-addbtn' ).hover( function() {
                $(this).css( 'background-color', originalFloatingbBgHoverColor );
            }, function() {
                $(this).css( 'background-color', newval );
            } );
        } );
    } );

    //Floating bar add to cart background hover color
    api( 'responsive_floatingb_addtocart_bghover_color', function( value ) {
        value.bind( function( newval ) {
            var originalFloatingbBgColor = api( 'responsive_floatingb_addtocart_background_color' ).get();
            $( '.responsive-floating-bar .floating-bar-addbtn' ).hover( function() {
                $(this).css( 'background-color', newval );
            }, function() {
                $(this).css( 'background-color', originalFloatingbBgColor );
            } );
        } );
    } );

    //Floating bar add to cart font color
    api( 'responsive_floatingb_addtocart_font_color', function( value ) {
        value.bind( function( newval ) {
            $( '.responsive-floating-bar .floating-bar-addbtn' ).css( 'color', newval );
            var originalFloatingbFontHoverColor = api( 'responsive_floatingb_addtocart_fonthover_color' ).get();
            $( '.responsive-floating-bar .floating-bar-addbtn' ).hover( function() {
                $(this).css( 'color', originalFloatingbFontHoverColor );
            }, function() {
                $(this).css( 'color', newval );
            } );
        } );
    } );

    //Floating bar add to cart font hover color
    api( 'responsive_floatingb_addtocart_fonthover_color', function( value ) {
        value.bind( function( newval ) {
            var originalFloatingbFontColor = api( 'responsive_floatingb_addtocart_font_color' ).get();
            $( '.responsive-floating-bar .floating-bar-addbtn' ).hover( function() {
                $(this).css( 'color', newval );
            }, function() {
                $(this).css( 'color', originalFloatingbFontColor );
            } );
        } );
    } );

    //Sidebar -> Colors
    //Headings Color
    api( 'responsive_sidebar_headings_color', function( value ) {
        value.bind( function( newval ) {
            let sidebarHeadings = $('.widget-area').find('h1, h2, h3, h4, h5, h6');
            if( newval && newval.startsWith('palette') ) {
                newval = `var(--responsive-global-${newval})`;
            }
            sidebarHeadings.css('color', newval);
        } );
    } );

    //Background Color
    api( 'responsive_sidebar_background_color', function( value ) {
        value.bind( function( newval ) {
            if( newval && newval.startsWith('palette') ) {
                newval = `var(--responsive-global-${newval})`;
            }
            $('.responsive-site-style-boxed aside#secondary .widget-wrapper ').css('background-color', newval );
        } );
    } );

    //Text Color
    api( 'responsive_sidebar_text_color', function( value ) {
        value.bind( function( newval ) {
            if( newval && newval.startsWith('palette') ) {
                newval = `var(--responsive-global-${newval})`;
            }
            $('.widget-area').css('color', newval );
        } );
    } );

    //Links Color
    api( 'responsive_sidebar_link_color', function( value ) {
        value.bind( function( newval ) {
            if( newval && newval.startsWith('palette') ) {
                newval = `var(--responsive-global-${newval})`;
            }
            $('.widget-area .widget-wrapper a ').not('a.add_to_cart_button').not('a.product_type_grouped').not('.woocommerce-tabs .reviews_tab').css('color', newval );
        } );
    } );

    //Links Hover Color
    $(".widget-area .widget-wrapper a").hover(
        function() {
            $(this).css("color", api('responsive_sidebar_link_hover_color').get());
        },
        function() {
            const sidebarLinkColor = processThemeSettingForCSS('responsive_sidebar_link_color');
            $(this).css("color", sidebarLinkColor);
        });

    //Scroll To Top
    //Icon Color
    // Scroll To Top Icon Color — Desktop (min-width: 993px)
    api('responsive_scroll_to_top_icon_color', function(value){
        value.bind(function(newval){

            const styleId = 'responsive-scroll-top-color-desktop';
            jQuery(`style#${styleId}`).remove();

            jQuery('head').append(
                `<style id="${styleId}">
                    @media (min-width: 993px) {
                        #scroll span { border-bottom-color: ${newval}; }
                    }
                </style>`
            );
        });
    });


    // Tablet
    api('responsive_scroll_to_top_icon_color_tablet', function(value){
        value.bind(function(newval){

            const styleId = 'responsive-scroll-top-color-tablet';
            jQuery(`style#${styleId}`).remove();

            jQuery('head').append(
                `<style id="${styleId}">
                    @media (min-width: 577px) and (max-width: 992px) {
                        #scroll span { border-bottom-color: ${newval}; }
                    }
                </style>`
            );
        });
    });


    // Mobile
    api('responsive_scroll_to_top_icon_color_mobile', function(value){
        value.bind(function(newval){

            const styleId = 'responsive-scroll-top-color-mobile';
            jQuery(`style#${styleId}`).remove();

            jQuery('head').append(
                `<style id="${styleId}">
                    @media (max-width: 576px) {
                        #scroll span { border-bottom-color: ${newval}; }
                    }
                </style>`
            );
        });
    });
    
    //Icon Hover Color
    // Hover Color — Desktop
    api('responsive_scroll_to_top_icon_color_hover', function(value){
        value.bind(function(newval){

            const styleId = 'responsive-scroll-top-color-hover-desktop';
            jQuery(`style#${styleId}`).remove();

            jQuery('head').append(
                `<style id="${styleId}">
                    @media (min-width: 993px) {
                        #scroll:hover span { border-bottom-color: ${newval}; }
                    }
                </style>`
            );
        });
    });

    // Hover Color — Tablet
    api('responsive_scroll_to_top_icon_color_tablet_hover', function(value){
        value.bind(function(newval){

            const styleId = 'responsive-scroll-top-color-tablet-hover';
            jQuery(`style#${styleId}`).remove();

            jQuery('head').append(
                `<style id="${styleId}">
                    @media (min-width: 577px) and (max-width: 992px) {
                        #scroll:hover span { border-bottom-color: ${newval}; }
                    }
                </style>`
            );
        });
    });

    // Hover Color — Mobile
    api('responsive_scroll_to_top_icon_color_mobile_hover', function(value){
        value.bind(function(newval){

            const styleId = 'responsive-scroll-top-color-mobile-hover';
            jQuery(`style#${styleId}`).remove();

            jQuery('head').append(
                `<style id="${styleId}">
                    @media (max-width: 576px) {
                        #scroll:hover span { border-bottom-color: ${newval}; }
                    }
                </style>`
            );
        });
    });

    //Icon Background Color
        api('responsive_scroll_to_top_icon_background_color', function(value){
        value.bind(function(newval){

            const styleId = 'responsive-scroll-top-bg-desktop';
            jQuery(`style#${styleId}`).remove();

            jQuery('head').append(`
                <style id="${styleId}">
                    @media (min-width: 993px) {
                        #scroll { background-color: ${newval}; }
                    }
                </style>
            `);
        });
    });


    // Tablet (577px–992px)
    api('responsive_scroll_to_top_icon_background_color_tablet', function(value){
        value.bind(function(newval){

            const styleId = 'responsive-scroll-top-bg-tablet';
            jQuery(`style#${styleId}`).remove();

            jQuery('head').append(`
                <style id="${styleId}">
                    @media (min-width: 577px) and (max-width: 992px) {
                        #scroll { background-color: ${newval}; }
                    }
                </style>
            `);
        });
    });


    // Mobile (max-width: 576px)
    api('responsive_scroll_to_top_icon_background_color_mobile', function(value){
        value.bind(function(newval){

            const styleId = 'responsive-scroll-top-bg-mobile';
            jQuery(`style#${styleId}`).remove();

            jQuery('head').append(`
                <style id="${styleId}">
                    @media (max-width: 576px) {
                        #scroll { background-color: ${newval}; }
                    }
                </style>
            `);
        });
    });

    // Icon Background Hover Color
    // Desktop hover (min-width: 993px)
    api('responsive_scroll_to_top_icon_background_color_hover', function(value){
        value.bind(function(newval){

            const styleId = 'responsive-scroll-top-bg-hover-desktop';
            jQuery(`style#${styleId}`).remove();

            jQuery('head').append(`
                <style id="${styleId}">
                    @media (min-width: 993px) {
                        #scroll:hover { background-color: ${newval}; }
                    }
                </style>
            `);
        });
    });


    // Tablet hover (577px–992px)
    api('responsive_scroll_to_top_icon_background_color_tablet_hover', function(value){
        value.bind(function(newval){

            const styleId = 'responsive-scroll-top-bg-hover-tablet';
            jQuery(`style#${styleId}`).remove();

            jQuery('head').append(`
                <style id="${styleId}">
                    @media (min-width: 577px) and (max-width: 992px) {
                        #scroll:hover { background-color: ${newval}; }
                    }
                </style>
            `);
        });
    });

    // Mobile hover (max-width: 576px)
    api('responsive_scroll_to_top_icon_background_color_mobile_hover', function(value){
        value.bind(function(newval){

            const styleId = 'responsive-scroll-top-bg-hover-mobile';
            jQuery(`style#${styleId}`).remove();

            jQuery('head').append(`
                <style id="${styleId}">
                    @media (max-width: 576px) {
                        #scroll:hover { background-color: ${newval}; }
                    }
                </style>
            `);
        });
    });


    //Hover Colors

    //Links Hover Color
    $("a").hover(
        function() {
            const linkHoverColor = processThemeSettingForCSS('responsive_link_hover_color');
            $(this).css("color", linkHoverColor);
        },
        
        function() {
            const linkColor = processThemeSettingForCSS('responsive_link_color');
            $(this).css("color", linkColor);
        }
    );
    //Buttons Hover Color
    $(".page.front-page .button,.blog.front-page .button,.read-more-button .hentry .read-more .more-link,input[type=button],input[type=submit],button:not(.menu-toggle),.button,.wp-block-button__link,div.wpforms-container-full .wpforms-form input[type=submit],body div.wpforms-container-full .wpforms-form button[type=submit],div.wpforms-container-full .wpforms-form .wpforms-page-button, .elementor-widget-rael-button .rael-button").hover(
        function() {
            $(this).css("background-color", api('responsive_button_hover_color').get());
            $(this).css("color", api('responsive_button_hover_text_color').get());
            $(this).css("border-color", api('responsive_button_hover_border_color').get());
        },

        function() {
            const buttonBGColor = processThemeSettingForCSS('responsive_button_color');
            $(this).css("background-color", buttonBGColor);
            $(this).css("color", api('responsive_button_text_color').get());
            $(this).css("border-color", api('responsive_button_border_color').get());
        }
    );
    api( 'responsive_button_hover_color', function( value ) {
        if( responsiveSiteLocalOptions.isDisableElementorDefaultColors ) {
            value.bind( function( newval ) {
                jQuery( 'style#responsive-elementor-button-hover-color' ).remove();
                jQuery( 'head' ).append(
                    '<style id="responsive-elementor-button-hover-color">'
                    + '.elementor-button-wrapper .elementor-button:hover{ background-color:' + newval +' }'
                    + '</style>'
                );
            } );
        }
    } );
    api( 'responsive_button_text_color', function( value ) {
        if( responsiveSiteLocalOptions.isDisableElementorDefaultColors ) {
            value.bind( function( newval ) {
                jQuery( 'style#responsive-elementor-button-text-color' ).remove();
                jQuery( 'head' ).append(
                    '<style id="responsive-elementor-button-text-color">'
                    + '.elementor-button-wrapper .elementor-button{ color:' + newval +' !important;}'
                    + '.elementor-button-wrapper .elementor-button{ fill:' + newval +'}'
                    + '</style>'
                );
            } );
        }
    } );
    api( 'responsive_button_hover_text_color', function( value ) {
        if( responsiveSiteLocalOptions.isDisableElementorDefaultColors ) {
            value.bind( function( newval ) {
                jQuery( 'style#responsive-elementor-button-text-hover-color' ).remove();
                jQuery( 'head' ).append(
                    '<style id="responsive-elementor-button-text-hover-color">'
                    + '.elementor-button-wrapper .elementor-button:hover{ color:' + newval +' !important; }'
                    + '.elementor-button-wrapper .elementor-button:hover svg{ fill:' + newval +'}'
                    + '</style>'
                );
            } );
        }
    } );
    api( 'responsive_button_border_color', function( value ) {
        if( responsiveSiteLocalOptions.isDisableElementorDefaultColors ) {
            value.bind( function( newval ) {
                jQuery( 'style#responsive-elementor-button-border-color' ).remove();
                jQuery( 'head' ).append(
                    '<style id="responsive-elementor-button-border-color">'
                    + '.elementor-button-wrapper .elementor-button{ border-color:' + newval +'; }'
                    + '</style>'
                );
            } );
        }
    } );
    api( 'responsive_button_hover_border_color', function( value ) {
        if( responsiveSiteLocalOptions.isDisableElementorDefaultColors ) {
            value.bind( function( newval ) {
                jQuery( 'style#responsive-elementor-button-border-hover-color' ).remove();
                jQuery( 'head' ).append(
                    '<style id="responsive-elementor-button-border-hover-color">'
                    + '.elementor-button-wrapper .elementor-button:hover{ border-color:' + newval +'; }'
                    + '</style>'
                );
            } );
        }
    } );

    // //site title hover color
    $(".site-title a").hover(
        function() {
            const siteTitleHoverColor = processThemeSettingForCSS('responsive_header_site_title_hover_color');
            $(this).css("color", siteTitleHoverColor);
        },

        function() {
            const siteTitleColor = processThemeSettingForCSS('responsive_header_site_title_color');
            $(this).css("color", siteTitleColor);
        }
    );
    //site title hover color
    $(".res-transparent-header .site-title a").hover(
        function() {
            $(this).css("color", api('responsive_transparent_header_site_title_hover_color').get());
        },

        function() {
            $(this).css("color", api('responsive_transparent_header_site_title_color').get());
        }
    );

   //Header widget link hover color...
    $(".header-widgets a").hover(
        function() {
            $(this).css("color", api('responsive_header_widget_link_hover_color').get());
        },

        function() {
            $(this).css("color", api('responsive_header_widget_link_color').get());
        }
    );

    //Menu Links Hover Color
    $(".main-navigation .menu > li > a").hover(
        function() {
            $(this).css("color", api('responsive_header_menu_link_hover_color').get());
            if (api('responsive_header_menu_link_hover_color').get() !== '' ) {
                jQuery( 'style#responsive-header-menu-link-hover-color-change' ).remove();
                jQuery( 'head' ).append(
                    '<style id="responsive-header-menu-link-hover-color-change">'
                    + '.menu-item-hover-style-underline .menu.nav-menu > li::after, .menu-item-hover-style-underline .main-navigation .menu > li.current-menu-item::after, .menu-item-hover-style-underline .main-navigation .menu > li.current_page_item::after { border-bottom: 3px solid '+api("responsive_header_menu_link_hover_color").get()+' }'
                    + '.menu-item-hover-style-overline .menu.nav-menu > li::before, .menu-item-hover-style-underline .main-navigation .menu > li.current-menu-item::before, .menu-item-hover-style-underline .main-navigation .menu > li.current_page_item::before { border-bottom: 3px solid '+api("responsive_header_menu_link_hover_color").get()+' }'
                    + '</style>'
                );
            } else {
                const menuLinkColor = processThemeSettingForCSS('responsive_header_menu_link_color');
                jQuery( 'style#responsive-header-menu-link-color-change' ).remove();
                jQuery( 'head' ).append(
                    '<style id="responsive-header-menu-link-color-change">'
                    + '.menu-item-hover-style-underline .menu.nav-menu > li::after, .menu-item-hover-style-underline .main-navigation .menu > li.current-menu-item::after, .menu-item-hover-style-underline .main-navigation .menu > li.current_page_item::after { border-bottom: 3px solid '+menuLinkColor+' }'
                    + '.menu-item-hover-style-overline .menu.nav-menu > li::before, .menu-item-hover-style-underline .main-navigation .menu > li.current-menu-item::before, .menu-item-hover-style-underline .main-navigation .menu > li.current_page_item::before { border-bottom: 3px solid '+menuLinkColor+' }'
                    + '</style>'
                );
                if (api('responsive_header_active_menu_link_color').get() !== '') {
                    jQuery( 'style#responsive-header-active-menu-link-color-change' ).remove();
                    jQuery( 'head' ).append(
                        '<style id="responsive-header-active-menu-link-color-change">'
                        + '.menu-item-hover-style-underline .main-navigation .menu > li.current-menu-item::after, .menu-item-hover-style-underline .main-navigation .menu > li.current_page_item::after { border-bottom: 3px solid '+api('responsive_header_active_menu_link_color').get()+' }'
                        + '.menu-item-hover-style-underline .main-navigation .menu > li.current-menu-item::before, .menu-item-hover-style-underline .main-navigation .menu > li.current_page_item::before { border-bottom: 3px solid '+api('responsive_header_active_menu_link_color').get()+' }'
                        + '</style>'
                    );
                } else {
                    jQuery( 'style#responsive-header-active-menu-link-color-change' ).remove();
                    jQuery( 'head' ).append(
                        '<style id="responsive-header-active-menu-link-color-change">'
                        + '.menu-item-hover-style-underline .main-navigation .menu > li.current-menu-item::after, .menu-item-hover-style-underline .main-navigation .menu > li.current_page_item::after { border-bottom: 3px solid '+menuLinkColor+' }'
                        + '.menu-item-hover-style-underline .main-navigation .menu > li.current-menu-item::before, .menu-item-hover-style-underline .main-navigation .menu > li.current_page_item::before { border-bottom: 3px solid '+menuLinkColor+' }'
                        + '</style>'
                    );
                }
            }
        },

        function() {
            const menuLinkColor = processThemeSettingForCSS('responsive_header_menu_link_color');
            $(this).css("color", menuLinkColor);
        }
    );
    $(".main-navigation .menu li .res-iconify svg, .main-navigation .menu > li > a:not(.sub-menu) > .res-iconify svg").hover(
        function() {
            $(this).css("stroke", api('responsive_header_menu_link_hover_color').get());
        },

        function() {
            const menuLinkColor = processThemeSettingForCSS('responsive_header_menu_link_color');
            $(this).css("stroke", menuLinkColor);
        }
    );
    //Menu item link hover color
    $(".res-transparent-header .main-navigation .menu > li > a").hover(
        function() {
            $(this).css("color", api('responsive_transparent_header_menu_link_hover_color').get());
            if (api('responsive_transparent_header_menu_link_hover_color').get() !== '' ) {
                jQuery( 'style#responsive-transparent-header-menu-link-hover-color-change' ).remove();
                jQuery( 'head' ).append(
                    '<style id="responsive-transparent-header-menu-link-hover-color-change">'
                    + '.menu-item-hover-style-underline .menu.nav-menu > li::after, .menu-item-hover-style-underline .main-navigation .menu > li.current-menu-item::after, .menu-item-hover-style-underline .main-navigation .menu > li.current_page_item::after { border-bottom: 3px solid '+api("responsive_transparent_header_menu_link_hover_color").get()+' }'
                    + '.menu-item-hover-style-overline .menu.nav-menu > li::before, .menu-item-hover-style-underline .main-navigation .menu > li.current-menu-item::before, .menu-item-hover-style-underline .main-navigation .menu > li.current_page_item::before { border-bottom: 3px solid '+api("responsive_transparent_header_menu_link_hover_color").get()+' }'
                    + '</style>'
                );
            } else {
                jQuery( 'style#responsive-transparent-header-menu-link-color-change' ).remove();
                jQuery( 'head' ).append(
                    '<style id="responsive-transparent-header-menu-link-color-change">'
                    + '.menu-item-hover-style-underline .menu.nav-menu > li::after, .menu-item-hover-style-underline .main-navigation .menu > li.current-menu-item::after, .menu-item-hover-style-underline .main-navigation .menu > li.current_page_item::after { border-bottom: 3px solid '+api('responsive_transparent_header_menu_link_color').get()+' }'
                    + '.menu-item-hover-style-overline .menu.nav-menu > li::before, .menu-item-hover-style-underline .main-navigation .menu > li.current-menu-item::before, .menu-item-hover-style-underline .main-navigation .menu > li.current_page_item::before { border-bottom: 3px solid '+api('responsive_transparent_header_menu_link_color').get()+' }'
                    + '</style>'
                );
                if (api('responsive_transparent_header_active_menu_link_color').get() !== '') {
                    jQuery( 'style#responsive-transparent-header-active-menu-link-color-change' ).remove();
                    jQuery( 'head' ).append(
                        '<style id="responsive-transparent-header-active-menu-link-color-change">'
                        + '.menu-item-hover-style-underline .main-navigation .menu > li.current-menu-item::after, .menu-item-hover-style-underline .main-navigation .menu > li.current_page_item::after { border-bottom: 3px solid '+api('responsive_transparent_header_active_menu_link_color').get()+' }'
                        + '.menu-item-hover-style-underline .main-navigation .menu > li.current-menu-item::before, .menu-item-hover-style-underline .main-navigation .menu > li.current_page_item::before { border-bottom: 3px solid '+api('responsive_transparent_header_active_menu_link_color').get()+' }'
                        + '</style>'
                    );
                } else {
                    jQuery( 'style#responsive-transparent-header-active-menu-link-color-change' ).remove();
                    jQuery( 'head' ).append(
                        '<style id="responsive-transparent-header-active-menu-link-color-change">'
                        + '.menu-item-hover-style-underline .main-navigation .menu > li.current-menu-item::after, .menu-item-hover-style-underline .main-navigation .menu > li.current_page_item::after { border-bottom: 3px solid '+api('responsive_transparent_header_menu_link_color').get()+' }'
                        + '.menu-item-hover-style-underline .main-navigation .menu > li.current-menu-item::before, .menu-item-hover-style-underline .main-navigation .menu > li.current_page_item::before { border-bottom: 3px solid '+api('responsive_transparent_header_menu_link_color').get()+' }'
                        + '</style>'
                    );
                }
            }
        },

        function() {
            $(this).css("color", api('responsive_transparent_header_menu_link_color').get());
        }
    );
    $(".res-transparent-header .main-navigation .menu li .res-iconify svg,.res-transparent-header .main-navigation .menu > li > .res-iconify svg").hover(
        function() {
            $(this).css("stroke", api('responsive_transparent_header_menu_link_hover_color').get());
        },

        function() {
            $(this).css("stroke", api('responsive_transparent_header_menu_link_color').get());
        }
    );
    $(".res-transparent-header .main-navigation .menu > li.current_page_item > a,.res-transparent-header .main-navigation .menu > li.current-menu-item > a").hover(
        function() {
            $(this).css("color", api('responsive_transparent_header_menu_link_hover_color').get());
        },

        function() {
            $(this).css("color", api('responsive_transparent_header_active_menu_link_color').get());
        }
    );

    //Sub Menu Links Hover Color
    $(".main-navigation .children li a,.main-navigation .sub-menu li a,.responsive-off-canvas-panel .sub-menu li a,.responsive-off-canvas-panel .children li a,#off-canvas-menu .sub-menu li a,#off-canvas-menu .children li a,.off-canvas-widget-area #off-canvas-menu .sub-menu li a,.off-canvas-widget-area #off-canvas-menu .children li a,#off-canvas-site-navigation .menu .sub-menu li a,#off-canvas-site-navigation .menu .children li a").hover(
        function() {
            $(this).css("color", api('responsive_header_sub_menu_link_hover_color').get());
        },

        function() {
            $(this).css("color", api('responsive_header_sub_menu_link_color').get());
        }
    );
    $(".main-navigation .menu .sub-menu li > .res-iconify svg, .main-navigation .menu .sub-menu li > a > .res-iconify svg").hover(
        function() {
            $(this).css("stroke", api('responsive_header_sub_menu_link_hover_color').get());
        },

        function() {
            $(this).css("stroke", api('responsive_header_sub_menu_link_color').get());
        }
    );

    //Active Sub Menu Links Hover Color
    $(".main-navigation .menu .sub-menu .current_page_item > a,.main-navigation .menu .sub-menu .current-menu-item > a,.main-navigation .menu .children li.current_page_item a,.responsive-off-canvas-panel .sub-menu .current_page_item > a,.responsive-off-canvas-panel .sub-menu .current-menu-item > a,.responsive-off-canvas-panel .children li.current_page_item a,#off-canvas-menu .sub-menu .current_page_item > a,#off-canvas-menu .sub-menu .current-menu-item > a,#off-canvas-menu .children li.current_page_item a,.off-canvas-widget-area #off-canvas-menu .sub-menu .current_page_item > a,.off-canvas-widget-area #off-canvas-menu .sub-menu .current-menu-item > a,.off-canvas-widget-area #off-canvas-menu .children li.current_page_item a,#off-canvas-site-navigation .menu .sub-menu .current_page_item > a,#off-canvas-site-navigation .menu .sub-menu .current-menu-item > a,#off-canvas-site-navigation .menu .children li.current_page_item a").hover(
        function() {
            $(this).css("color", api('responsive_header_sub_menu_link_hover_color').get());
        },

        function() {
            $(this).css("color", api('responsive_header_sub_menu_active_link_color').get());
        }
    );
    $(".main-navigation .menu .sub-menu .current_page_item > .res-iconify svg").hover(
        function() {
            $(this).css("stroke", api('responsive_header_sub_menu_link_hover_color').get());
        },

        function() {
            $(this).css("stroke", api('responsive_header_sub_menu_active_link_color').get());
        }
    );
//Active Sub Menu Links Hover Color
    $(".res-transparent-header .main-navigation .menu .sub-menu .current_page_item > a,.res-transparent-header .main-navigation .menu .sub-menu .current-menu-item > a,.res-transparent-header .main-navigation .menu .children li.current_page_item a,.res-transparent-header .main-navigation .menu .sub-menu li:hover > .res-iconify svg,.res-transparent-header .responsive-off-canvas-panel .sub-menu .current_page_item > a,.res-transparent-header .responsive-off-canvas-panel .sub-menu .current-menu-item > a,.res-transparent-header .responsive-off-canvas-panel .children li.current_page_item a,.res-transparent-header #off-canvas-menu .sub-menu .current_page_item > a,.res-transparent-header #off-canvas-menu .sub-menu .current-menu-item > a,.res-transparent-header #off-canvas-menu .children li.current_page_item a,.res-transparent-header .off-canvas-widget-area #off-canvas-menu .sub-menu .current_page_item > a,.res-transparent-header .off-canvas-widget-area #off-canvas-menu .sub-menu .current-menu-item > a,.res-transparent-header .off-canvas-widget-area #off-canvas-menu .children li.current_page_item a,.res-transparent-header #off-canvas-site-navigation .menu .sub-menu .current_page_item > a,.res-transparent-header #off-canvas-site-navigation .menu .sub-menu .current-menu-item > a,.res-transparent-header #off-canvas-site-navigation .menu .children li.current_page_item a").hover(
        function() {
            $(this).css("color", api('responsive_transparent_header_sub_menu_link_hover_color').get());
        },

        function() {
            $(this).css("color", api('responsive_transparent_header_sub_menu_link_color').get());
        }
    );
    $(".res-transparent-header .main-navigation .menu .sub-menu li > .res-iconify svg").hover(
        function() {
            $(this).css("stroke", api('responsive_transparent_header_sub_menu_link_hover_color').get());
        },

        function() {
            $(this).css("stroke", api('responsive_transparent_header_sub_menu_link_color').get());
        }
    );
//Active Sub Menu Links Hover Color
    $(".res-transparent-header .main-navigation .menu .sub-menu .current_page_item > a,.res-transparent-header .main-navigation .menu .sub-menu .current-menu-item > a,.res-transparent-header .main-navigation .menu .children li.current_page_item a,.res-transparent-header .responsive-off-canvas-panel .sub-menu .current_page_item > a,.res-transparent-header .responsive-off-canvas-panel .sub-menu .current-menu-item > a,.res-transparent-header .responsive-off-canvas-panel .children li.current_page_item a,.res-transparent-header #off-canvas-menu .sub-menu .current_page_item > a,.res-transparent-header #off-canvas-menu .sub-menu .current-menu-item > a,.res-transparent-header #off-canvas-menu .children li.current_page_item a,.res-transparent-header .off-canvas-widget-area #off-canvas-menu .sub-menu .current_page_item > a,.res-transparent-header .off-canvas-widget-area #off-canvas-menu .sub-menu .current-menu-item > a,.res-transparent-header .off-canvas-widget-area #off-canvas-menu .children li.current_page_item a,.res-transparent-header #off-canvas-site-navigation .menu .sub-menu .current_page_item > a,.res-transparent-header #off-canvas-site-navigation .menu .sub-menu .current-menu-item > a,.res-transparent-header #off-canvas-site-navigation .menu .children li.current_page_item a").hover(
        function() {
            $(this).css("color", api('responsive_transparent_header_sub_menu_link_hover_color').get());
        },

        function() {
            $(this).css("color", api('responsive_transparent_header_sub_menu_active_link_color').get());
        }
    );
    //Footer Links Hover Color
    $(".site-footer a").hover(
        function() {
            $(this).css("color", api('responsive_footer_links_hover_color').get());
        },

        function() {
            $(this).css("color", api('responsive_footer_links_color').get());
        }
    );

    //Add to cart Button Text Hover Color
    $(".woocommerce span.onsale,.wc-block-grid__product-onsale,.woocommerce #respond input#submit,.wp-block-button__link.add_to_cart_button,.woocommerce div.product .woocommerce-tabs ul.tabs li a,.woocommerce div.product .woocommerce-tabs ul.tabs li,.woocommerce button.button.alt,.woocommerce button.button,.woocommerce a.button").hover(
        function() {
            const addToCartButtonTextHoverColor = processThemeSettingForCSS('responsive_add_to_cart_button_hover_text_color');
            $(this).css("color", addToCartButtonTextHoverColor);
        },
        
        function() {
            const addToCartButtonTextColor = processThemeSettingForCSS('responsive_add_to_cart_button_text_color');
            $(this).css("color", addToCartButtonTextColor);
        }
    );

    //Cart Button Text Hover Color
    $(".page.woocommerce-cart .woocommerce button.button:disabled,.page.woocommerce-cart .woocommerce button.button:disabled[disabled],.page.woocommerce-cart .woocommerce button.button").hover(
        function() {
            const cartButtonTextHoverColor = processThemeSettingForCSS('responsive_cart_buttons_hover_text_color');
            $(this).css("color", cartButtonTextHoverColor);
        },

        function() {
            const cartButtonTextColor = processThemeSettingForCSS('responsive_cart_buttons_text_color');
            $(this).css("color", cartButtonTextColor);
        }
    );

    //Checkout Button Hover text Color
    $(".page.woocommerce-cart .woocommerce a.button.alt,.page.woocommerce-cart .woocommerce a.button,.page.woocommerce-checkout .woocommerce button.button.alt,.page.woocommerce-checkout .woocommerce button.button").hover(
        function() {
            const checkoutButtonTextHoverColor = processThemeSettingForCSS('responsive_cart_checkout_button_hover_text_color');
            $(this).css("color", checkoutButtonTextHoverColor);
        },

        function() {
            const checkoutButtonTextColor = processThemeSettingForCSS('responsive_cart_checkout_button_text_color');
            $(this).css("color", checkoutButtonTextColor);
        }
    );

    //Add to Cart Button Hover Color
    $(".woocommerce #respond input#submit,.wp-block-button__link.add_to_cart_button,.woocommerce button.button,.woocommerce button.button.alt,.woocommerce button.button,.woocommerce a.button").hover(
        function() {
            $(this).css("background-color", api('responsive_add_to_cart_button_hover_color').get());
        },

        function() {
            $(this).css("background-color", api('responsive_add_to_cart_button_color').get());
        }
    );

    //Cart Button Hover Color
    $(".page.woocommerce-cart .woocommerce button.button:disabled,.page.woocommerce-cart .woocommerce button.button:disabled[disabled],.page.woocommerce-cart .woocommerce button.button").hover(
        function() {
            const cartButtonsBGHoverColor = processThemeSettingForCSS('responsive_cart_buttons_hover_color');
            $(this).css("background-color", cartButtonsBGHoverColor);
        },

        function() {
            $(this).css("background-color", api('responsive_cart_buttons_color').get());
        }
    );
    // Woocommerce off canvas filter.
    api( 'responsive_off_canvas_close_button_color', function( value ) {
        value.bind( function( newval ) {
            $('.responsive-off-canvas-close svg').css('fill', newval );
        } );
    } );

    $(".responsive-off-canvas-close svg").hover(
        function() {
            $(this).css("fill", api('responsive_off_canvas_close_button_hover_color').get());
        },

        function() {
            $(this).css("fill", api('responsive_off_canvas_close_button_color').get());
        }
    );
    
    api( 'responsive_off_canvas_filter_button_color', function( value ) {
        value.bind( function( newval ) {
            $('.off_canvas_filter_btn').css('background-color', newval );
        } );
    } );

    api( 'responsive_off_canvas_filter_button_text_color', function( value ) {
        value.bind( function( newval ) {
            $('.off_canvas_filter_btn').css('color', newval );
        } );
    } );

    api( 'responsive_off_canvas_filter_button_border_color', function( value ) {
        value.bind( function( newval ) {
            $('.off_canvas_filter_btn').css('border-color', newval );
        } );
    } );
    api( 'responsive_off_canvas_filter_button_hover_color', function( value ) {
		value.bind( function( to ) {
			var $child = $( '.customizer-responsive_off_canvas_filter_button_hover_color' );
			if ( to ) {
				var style = '<style class="customizer-responsive_off_canvas_filter_button_hover_color">.off_canvas_filter_btn:hover {background-color:' + to + ';}</style>';
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
    api( 'responsive_off_canvas_filter_button_text_hover_color', function( value ) {
		value.bind( function( to ) {
			var $child = $( '.customizer-responsive_off_canvas_filter_button_text_hover_color' );
			if ( to ) {
				var style = '<style class="customizer-responsive_off_canvas_filter_button_text_hover_color">.off_canvas_filter_btn:hover {color:' + to + ';} element.style{color: unset}</style>';
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
    api( 'responsive_off_canvas_filter_button_border_hover_color', function( value ) {
		value.bind( function( to ) {
			var $child = $( '.customizer-responsive_off_canvas_filter_button_border_hover_color' );
			if ( to ) {
				var style = '<style class="customizer-responsive_off_canvas_filter_button_border_hover_color">.off_canvas_filter_btn:hover {border-color:' + to + ';}</style>';
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

    api( 'responsive_sorting_option_text_color', function( value ) {
        value.bind( function( newval ) {
            $('.woocommerce-ordering .orderby').css('color', newval );
        } );
    } );

    api( 'responsive_sorting_option_background_color', function( value ) {
        value.bind( function( newval ) {
            $('.woocommerce-ordering .orderby').css('background-color', newval );
        } );
    } );

    //Header Top Row Background Color
    //Header Above Row Background Color - Desktop
    api( 'responsive_header_above_row_bg_color', function( value ) {
        value.bind( function( newval ) {
            jQuery('style#responsive-header-above-row-bg-color').remove();
            jQuery('head').append(
                '<style id="responsive-header-above-row-bg-color">'
                + '.responsive-site-above-header-wrap { background-color: ' + newval + ' }'
                + '</style>'
            );
        } );
    } );

    //Header Above Row Hover Background Color - Desktop
    api( 'responsive_header_above_row_bg_color_hover', function( value ) {
        value.bind( function( newval ) {
            jQuery('style#responsive-header-above-row-bg-hover-color').remove();
            jQuery('head').append(
                '<style id="responsive-header-above-row-bg-hover-color">'
                + '.responsive-site-above-header-wrap:hover { background-color: ' + newval + ' }'
                + '</style>'
            );
        } );
    } );

    //Header Above Row Background Color - Tablet
    api( 'responsive_header_above_row_bg_color_tablet', function( value ) {
        value.bind( function( newval ) {
            jQuery('style#responsive-header-above-row-bg-color-tablet').remove();
            jQuery('head').append(
                '<style id="responsive-header-above-row-bg-color-tablet">'
                + '@media screen and ( max-width: 992px ) { .responsive-site-above-mobile-header-wrap { background-color: ' + newval + ' } }'
                + '</style>'
            );
        } );
    } );

    //Header Above Row Hover Background Color - Tablet
    api( 'responsive_header_above_row_bg_color_tablet_hover', function( value ) {
        value.bind( function( newval ) {
            jQuery('style#responsive-header-above-row-bg-hover-color-tablet').remove();
            jQuery('head').append(
                '<style id="responsive-header-above-row-bg-hover-color-tablet">'
                + '@media screen and ( max-width: 992px ) { .responsive-site-above-mobile-header-wrap:hover { background-color: ' + newval + ' } }'
                + '</style>'
            );
        } );
    } );

    //Header Above Row Background Color - Mobile
    api( 'responsive_header_above_row_bg_color_mobile', function( value ) {
        value.bind( function( newval ) {
            jQuery('style#responsive-header-above-row-bg-color-mobile').remove();
            jQuery('head').append(
                '<style id="responsive-header-above-row-bg-color-mobile">'
                + '@media screen and ( max-width: 576px ) { .responsive-site-above-mobile-header-wrap { background-color: ' + newval + ' } }'
                + '</style>'
            );
        } );
    } );

    //Header Above Row Hover Background Color - Mobile
    api( 'responsive_header_above_row_bg_color_mobile_hover', function( value ) {
        value.bind( function( newval ) {
            jQuery('style#responsive-header-above-row-bg-hover-color-mobile').remove();
            jQuery('head').append(
                '<style id="responsive-header-above-row-bg-hover-color-mobile">'
                + '@media screen and ( max-width: 576px ) { .responsive-site-above-mobile-header-wrap:hover { background-color: ' + newval + ' } }'
                + '</style>'
            );
        } );
    } );

    // Backward compatibility - old hover color setting
    api( 'responsive_header_above_row_bg_hover_color', function( value ) {
        value.bind( function( newval ) {
            jQuery('style#responsive-header-above-row-bg-hover-color-old').remove();
            jQuery('head').append(
                '<style id="responsive-header-above-row-bg-hover-color-old">'
                + '.responsive-site-above-header-wrap:hover { background-color: ' + newval + ' }'
                + '</style>'
            );
        } );
    } );

    //Header Above Row Bottom Border Color - Desktop
    api('responsive_header_above_row_bottom_border_color', function(value) {
        value.bind(function(newColor) {
            jQuery('style#responsive-header-above-row-bottom-border-color').remove();
            const currentBorderSize = api('responsive_header_above_row_bottom_border_size').get() || 0;
            jQuery('head').append(
                '<style id="responsive-header-above-row-bottom-border-color">'
                + '.responsive-site-above-header-wrap { border-bottom: ' + currentBorderSize + 'px solid ' + newColor + ' }'
                + '</style>'
            );
        });
    });    
    
    //Header Above Row Bottom Border Hover Color - Desktop
    api( 'responsive_header_above_row_bottom_border_color_hover', function( value ) {
        value.bind( function( newColor ) {
            jQuery('style#responsive-header-above-row-bottom-border-hover-color').remove();
            const currentBorderSize = api('responsive_header_above_row_bottom_border_size').get() || 0;
            jQuery('head').append(
                '<style id="responsive-header-above-row-bottom-border-hover-color">'
                + '.responsive-site-above-header-wrap:hover { border-bottom: ' + currentBorderSize + 'px solid ' + newColor + ' }'
                + '</style>'
            );
        } );
    } );

    //Header Above Row Bottom Border Color - Tablet
    api( 'responsive_header_above_row_bottom_border_color_tablet', function( value ) {
        value.bind( function( newColor ) {
            jQuery('style#responsive-header-above-row-bottom-border-color-tablet').remove();
            const currentBorderSize = api('responsive_header_above_row_bottom_border_size_tablet') ? api('responsive_header_above_row_bottom_border_size_tablet').get() : (api('responsive_header_above_row_bottom_border_size').get() || 0);
            jQuery('head').append(
                '<style id="responsive-header-above-row-bottom-border-color-tablet">'
                + '@media screen and ( max-width: 992px ) { .responsive-site-above-mobile-header-wrap { border-bottom: ' + currentBorderSize + 'px solid ' + newColor + ' } }'
                + '</style>'
            );
        } );
    } );

    //Header Above Row Bottom Border Hover Color - Tablet
    api( 'responsive_header_above_row_bottom_border_color_tablet_hover', function( value ) {
        value.bind( function( newColor ) {
            jQuery('style#responsive-header-above-row-bottom-border-hover-color-tablet').remove();
            const currentBorderSize = api('responsive_header_above_row_bottom_border_size_tablet') ? api('responsive_header_above_row_bottom_border_size_tablet').get() : (api('responsive_header_above_row_bottom_border_size').get() || 0);
            jQuery('head').append(
                '<style id="responsive-header-above-row-bottom-border-hover-color-tablet">'
                + '@media screen and ( max-width: 992px ) { .responsive-site-above-mobile-header-wrap:hover { border-bottom: ' + currentBorderSize + 'px solid ' + newColor + ' } }'
                + '</style>'
            );
        } );
    } );

    //Header Above Row Bottom Border Color - Mobile
    api( 'responsive_header_above_row_bottom_border_color_mobile', function( value ) {
        value.bind( function( newColor ) {
            jQuery('style#responsive-header-above-row-bottom-border-color-mobile').remove();
            const currentBorderSize = api('responsive_header_above_row_bottom_border_size_mobile') ? api('responsive_header_above_row_bottom_border_size_mobile').get() : (api('responsive_header_above_row_bottom_border_size').get() || 0);
            jQuery('head').append(
                '<style id="responsive-header-above-row-bottom-border-color-mobile">'
                + '@media screen and ( max-width: 576px ) { .responsive-site-above-mobile-header-wrap { border-bottom: ' + currentBorderSize + 'px solid ' + newColor + ' } }'
                + '</style>'
            );
        } );
    } );

    //Header Above Row Bottom Border Hover Color - Mobile
    api( 'responsive_header_above_row_bottom_border_color_mobile_hover', function( value ) {
        value.bind( function( newColor ) {
            jQuery('style#responsive-header-above-row-bottom-border-hover-color-mobile').remove();
            const currentBorderSize = api('responsive_header_above_row_bottom_border_size_mobile') ? api('responsive_header_above_row_bottom_border_size_mobile').get() : (api('responsive_header_above_row_bottom_border_size').get() || 0);
            jQuery('head').append(
                '<style id="responsive-header-above-row-bottom-border-hover-color-mobile">'
                + '@media screen and ( max-width: 576px ) { .responsive-site-above-mobile-header-wrap:hover { border-bottom: ' + currentBorderSize + 'px solid ' + newColor + ' } }'
                + '</style>'
            );
        } );
    } );

    // Backward compatibility - old hover border color setting
    api( 'responsive_header_above_row_bottom_border_hover_color', function( value ) {
        value.bind( function( newColor ) {
            jQuery('style#responsive-header-above-row-bottom-border-hover-color-old').remove();
            const currentBorderSize = api('responsive_header_above_row_bottom_border_size').get() || 0;
            jQuery('head').append(
                '<style id="responsive-header-above-row-bottom-border-hover-color-old">'
                + '.responsive-site-above-header-wrap:hover { border-bottom: ' + currentBorderSize + 'px solid ' + newColor + ' }'
                + '</style>'
            );
        } );
    } );

    //Header Primary Row Background Color - Desktop
    api( 'responsive_header_primary_row_bg_color', function( value ) {
        value.bind( function( newval ) {
            jQuery('style#responsive-header-primary-row-bg-color').remove();
            jQuery('head').append(
                '<style id="responsive-header-primary-row-bg-color">'
                + '.responsive-site-primary-header-wrap { background-color: ' + newval + ' }'
                + '</style>'
            );
        } );
    } );

    //Header Primary Row Hover Background Color - Desktop
    api( 'responsive_header_primary_row_bg_color_hover', function( value ) {
        value.bind( function( newval ) {
            jQuery('style#responsive-header-primary-row-bg-hover-color').remove();
            jQuery('head').append(
                '<style id="responsive-header-primary-row-bg-hover-color">'
                + '.responsive-site-primary-header-wrap:hover { background-color: ' + newval + ' }'
                + '</style>'
            );
        } );
    } );

    //Header Primary Row Background Color - Tablet
    api( 'responsive_header_primary_row_bg_color_tablet', function( value ) {
        value.bind( function( newval ) {
            jQuery('style#responsive-header-primary-row-bg-color-tablet').remove();
            jQuery('head').append(
                '<style id="responsive-header-primary-row-bg-color-tablet">'
                + '@media screen and ( max-width: 992px ) { .responsive-site-primary-mobile-header-wrap { background-color: ' + newval + ' } }'
                + '</style>'
            );
        } );
    } );

    //Header Primary Row Hover Background Color - Tablet
    api( 'responsive_header_primary_row_bg_color_tablet_hover', function( value ) {
        value.bind( function( newval ) {
            jQuery('style#responsive-header-primary-row-bg-hover-color-tablet').remove();
            jQuery('head').append(
                '<style id="responsive-header-primary-row-bg-hover-color-tablet">'
                + '@media screen and ( max-width: 992px ) { .responsive-site-primary-mobile-header-wrap:hover { background-color: ' + newval + ' } }'
                + '</style>'
            );
        } );
    } );

    //Header Primary Row Background Color - Mobile
    api( 'responsive_header_primary_row_bg_color_mobile', function( value ) {
        value.bind( function( newval ) {
            jQuery('style#responsive-header-primary-row-bg-color-mobile').remove();
            jQuery('head').append(
                '<style id="responsive-header-primary-row-bg-color-mobile">'
                + '@media screen and ( max-width: 576px ) { .responsive-site-primary-mobile-header-wrap { background-color: ' + newval + ' } }'
                + '</style>'
            );
        } );
    } );

    //Header Primary Row Hover Background Color - Mobile
    api( 'responsive_header_primary_row_bg_color_mobile_hover', function( value ) {
        value.bind( function( newval ) {
            jQuery('style#responsive-header-primary-row-bg-hover-color-mobile').remove();
            jQuery('head').append(
                '<style id="responsive-header-primary-row-bg-hover-color-mobile">'
                + '@media screen and ( max-width: 576px ) { .responsive-site-primary-mobile-header-wrap:hover { background-color: ' + newval + ' } }'
                + '</style>'
            );
        } );
    } );

    // Backward compatibility - old hover color setting
    api( 'responsive_header_primary_row_bg_hover_color', function( value ) {
        value.bind( function( newval ) {
            jQuery('style#responsive-header-primary-row-bg-hover-color-old').remove();
            jQuery('head').append(
                '<style id="responsive-header-primary-row-bg-hover-color-old">'
                + '.responsive-site-primary-header-wrap:hover { background-color: ' + newval + ' }'
                + '</style>'
            );
        } );
    } );

    //Header Primary Row Bottom Border Color - Desktop
    api('responsive_header_primary_row_bottom_border_color', function(value) {
        value.bind(function(newColor) {
            jQuery('style#responsive-header-primary-row-bottom-border-color').remove();
            const currentBorderSize = api('responsive_header_primary_row_bottom_border_size').get() || 0;
            jQuery('head').append(
                '<style id="responsive-header-primary-row-bottom-border-color">'
                + '.responsive-site-primary-header-wrap { border-bottom: ' + currentBorderSize + 'px solid ' + newColor + ' }'
                + '</style>'
            );
        });
    });    
    
    //Header Primary Row Bottom Border Hover Color - Desktop
    api( 'responsive_header_primary_row_bottom_border_color_hover', function( value ) {
        value.bind( function( newColor ) {
            jQuery('style#responsive-header-primary-row-bottom-border-hover-color').remove();
            const currentBorderSize = api('responsive_header_primary_row_bottom_border_size').get() || 0;
            jQuery('head').append(
                '<style id="responsive-header-primary-row-bottom-border-hover-color">'
                + '.responsive-site-primary-header-wrap:hover { border-bottom: ' + currentBorderSize + 'px solid ' + newColor + ' }'
                + '</style>'
            );
        } );
    } );

    //Header Primary Row Bottom Border Color - Tablet
    api( 'responsive_header_primary_row_bottom_border_color_tablet', function( value ) {
        value.bind( function( newColor ) {
            jQuery('style#responsive-header-primary-row-bottom-border-color-tablet').remove();
            const currentBorderSize = api('responsive_header_primary_row_bottom_border_size_tablet') ? api('responsive_header_primary_row_bottom_border_size_tablet').get() : (api('responsive_header_primary_row_bottom_border_size').get() || 0);
            jQuery('head').append(
                '<style id="responsive-header-primary-row-bottom-border-color-tablet">'
                + '@media screen and ( max-width: 992px ) { .responsive-site-primary-mobile-header-wrap { border-bottom: ' + currentBorderSize + 'px solid ' + newColor + ' } }'
                + '</style>'
            );
        } );
    } );

    //Header Primary Row Bottom Border Hover Color - Tablet
    api( 'responsive_header_primary_row_bottom_border_color_tablet_hover', function( value ) {
        value.bind( function( newColor ) {
            jQuery('style#responsive-header-primary-row-bottom-border-hover-color-tablet').remove();
            const currentBorderSize = api('responsive_header_primary_row_bottom_border_size_tablet') ? api('responsive_header_primary_row_bottom_border_size_tablet').get() : (api('responsive_header_primary_row_bottom_border_size').get() || 0);
            jQuery('head').append(
                '<style id="responsive-header-primary-row-bottom-border-hover-color-tablet">'
                + '@media screen and ( max-width: 992px ) { .responsive-site-primary-mobile-header-wrap:hover { border-bottom: ' + currentBorderSize + 'px solid ' + newColor + ' } }'
                + '</style>'
            );
        } );
    } );

    //Header Primary Row Bottom Border Color - Mobile
    api( 'responsive_header_primary_row_bottom_border_color_mobile', function( value ) {
        value.bind( function( newColor ) {
            jQuery('style#responsive-header-primary-row-bottom-border-color-mobile').remove();
            const currentBorderSize = api('responsive_header_primary_row_bottom_border_size_mobile') ? api('responsive_header_primary_row_bottom_border_size_mobile').get() : (api('responsive_header_primary_row_bottom_border_size').get() || 0);
            jQuery('head').append(
                '<style id="responsive-header-primary-row-bottom-border-color-mobile">'
                + '@media screen and ( max-width: 576px ) { .responsive-site-primary-mobile-header-wrap { border-bottom: ' + currentBorderSize + 'px solid ' + newColor + ' } }'
                + '</style>'
            );
        } );
    } );

    //Header Primary Row Bottom Border Hover Color - Mobile
    api( 'responsive_header_primary_row_bottom_border_color_mobile_hover', function( value ) {
        value.bind( function( newColor ) {
            jQuery('style#responsive-header-primary-row-bottom-border-hover-color-mobile').remove();
            const currentBorderSize = api('responsive_header_primary_row_bottom_border_size_mobile') ? api('responsive_header_primary_row_bottom_border_size_mobile').get() : (api('responsive_header_primary_row_bottom_border_size').get() || 0);
            jQuery('head').append(
                '<style id="responsive-header-primary-row-bottom-border-hover-color-mobile">'
                + '@media screen and ( max-width: 576px ) { .responsive-site-primary-mobile-header-wrap:hover { border-bottom: ' + currentBorderSize + 'px solid ' + newColor + ' } }'
                + '</style>'
            );
        } );
    } );

    // Backward compatibility - old hover color setting
    api( 'responsive_header_primary_row_bottom_border_hover_color', function( value ) {
        value.bind( function( newColor ) {
            jQuery('style#responsive-header-primary-row-bottom-border-hover-color-old').remove();
            const currentBorderSize = api('responsive_header_primary_row_bottom_border_size').get() || 0;
            jQuery('head').append(
                '<style id="responsive-header-primary-row-bottom-border-hover-color-old">'
                + '.responsive-site-primary-header-wrap:hover { border-bottom: ' + currentBorderSize + 'px solid ' + newColor + ' }'
                + '</style>'
            );
        } );
    } );

    //Header Below Row Background Color
    //Header Below Row Background Color - Desktop
    api( 'responsive_header_below_row_bg_color', function( value ) {
        value.bind( function( newval ) {
            jQuery('style#responsive-header-below-row-bg-color').remove();
            jQuery('head').append(
                '<style id="responsive-header-below-row-bg-color">'
                + '.responsive-site-below-header-wrap { background-color: ' + newval + ' }'
                + '</style>'
            );
        } );
    } );

    //Header Below Row Hover Background Color - Desktop
    api( 'responsive_header_below_row_bg_color_hover', function( value ) {
        value.bind( function( newval ) {
            jQuery('style#responsive-header-below-row-bg-hover-color').remove();
            jQuery('head').append(
                '<style id="responsive-header-below-row-bg-hover-color">'
                + '.responsive-site-below-header-wrap:hover { background-color: ' + newval + ' }'
                + '</style>'
            );
        } );
    } );

    //Header Below Row Background Color - Tablet
    api( 'responsive_header_below_row_bg_color_tablet', function( value ) {
        value.bind( function( newval ) {
            jQuery('style#responsive-header-below-row-bg-color-tablet').remove();
            jQuery('head').append(
                '<style id="responsive-header-below-row-bg-color-tablet">'
                + '@media screen and ( max-width: 992px ) { .responsive-site-below-mobile-header-wrap { background-color: ' + newval + ' } }'
                + '</style>'
            );
        } );
    } );

    //Header Below Row Hover Background Color - Tablet
    api( 'responsive_header_below_row_bg_color_tablet_hover', function( value ) {
        value.bind( function( newval ) {
            jQuery('style#responsive-header-below-row-bg-hover-color-tablet').remove();
            jQuery('head').append(
                '<style id="responsive-header-below-row-bg-hover-color-tablet">'
                + '@media screen and ( max-width: 992px ) { .responsive-site-below-mobile-header-wrap:hover { background-color: ' + newval + ' } }'
                + '</style>'
            );
        } );
    } );

    //Header Below Row Background Color - Mobile
    api( 'responsive_header_below_row_bg_color_mobile', function( value ) {
        value.bind( function( newval ) {
            jQuery('style#responsive-header-below-row-bg-color-mobile').remove();
            jQuery('head').append(
                '<style id="responsive-header-below-row-bg-color-mobile">'
                + '@media screen and ( max-width: 576px ) { .responsive-site-below-mobile-header-wrap { background-color: ' + newval + ' } }'
                + '</style>'
            );
        } );
    } );

    //Header Below Row Hover Background Color - Mobile
    api( 'responsive_header_below_row_bg_color_mobile_hover', function( value ) {
        value.bind( function( newval ) {
            jQuery('style#responsive-header-below-row-bg-hover-color-mobile').remove();
            jQuery('head').append(
                '<style id="responsive-header-below-row-bg-hover-color-mobile">'
                + '@media screen and ( max-width: 576px ) { .responsive-site-below-mobile-header-wrap:hover { background-color: ' + newval + ' } }'
                + '</style>'
            );
        } );
    } );

    // Backward compatibility - old hover color setting
    api( 'responsive_header_below_row_bg_hover_color', function( value ) {
        value.bind( function( newval ) {
            jQuery('style#responsive-header-below-row-bg-hover-color-old').remove();
            jQuery('head').append(
                '<style id="responsive-header-below-row-bg-hover-color-old">'
                + '.responsive-site-below-header-wrap:hover { background-color: ' + newval + ' }'
                + '</style>'
            );
        } );
    } );

    //Header Below Row Bottom Border Color - Desktop
    api('responsive_header_below_row_bottom_border_color', function(value) {
        value.bind(function(newColor) {
            jQuery('style#responsive-header-below-row-bottom-border-color').remove();
            const currentBorderSize = api('responsive_header_below_row_bottom_border_size').get() || 0;
            jQuery('head').append(
                '<style id="responsive-header-below-row-bottom-border-color">'
                + '.responsive-site-below-header-wrap { border-bottom: ' + currentBorderSize + 'px solid ' + newColor + ' }'
                + '</style>'
            );
        });
    });    
    
    //Header Below Row Bottom Border Hover Color - Desktop
    api( 'responsive_header_below_row_bottom_border_color_hover', function( value ) {
        value.bind( function( newColor ) {
            jQuery('style#responsive-header-below-row-bottom-border-hover-color').remove();
            const currentBorderSize = api('responsive_header_below_row_bottom_border_size').get() || 0;
            jQuery('head').append(
                '<style id="responsive-header-below-row-bottom-border-hover-color">'
                + '.responsive-site-below-header-wrap:hover { border-bottom: ' + currentBorderSize + 'px solid ' + newColor + ' }'
                + '</style>'
            );
        } );
    } );

    //Header Below Row Bottom Border Color - Tablet
    api( 'responsive_header_below_row_bottom_border_color_tablet', function( value ) {
        value.bind( function( newColor ) {
            jQuery('style#responsive-header-below-row-bottom-border-color-tablet').remove();
            const currentBorderSize = api('responsive_header_below_row_bottom_border_size_tablet') ? api('responsive_header_below_row_bottom_border_size_tablet').get() : (api('responsive_header_below_row_bottom_border_size').get() || 0);
            jQuery('head').append(
                '<style id="responsive-header-below-row-bottom-border-color-tablet">'
                + '@media screen and ( max-width: 992px ) { .responsive-site-below-mobile-header-wrap { border-bottom: ' + currentBorderSize + 'px solid ' + newColor + ' } }'
                + '</style>'
            );
        } );
    } );

    //Header Below Row Bottom Border Hover Color - Tablet
    api( 'responsive_header_below_row_bottom_border_color_tablet_hover', function( value ) {
        value.bind( function( newColor ) {
            jQuery('style#responsive-header-below-row-bottom-border-hover-color-tablet').remove();
            const currentBorderSize = api('responsive_header_below_row_bottom_border_size_tablet') ? api('responsive_header_below_row_bottom_border_size_tablet').get() : (api('responsive_header_below_row_bottom_border_size').get() || 0);
            jQuery('head').append(
                '<style id="responsive-header-below-row-bottom-border-hover-color-tablet">'
                + '@media screen and ( max-width: 992px ) { .responsive-site-below-mobile-header-wrap:hover { border-bottom: ' + currentBorderSize + 'px solid ' + newColor + ' } }'
                + '</style>'
            );
        } );
    } );

    //Header Below Row Bottom Border Color - Mobile
    api( 'responsive_header_below_row_bottom_border_color_mobile', function( value ) {
        value.bind( function( newColor ) {
            jQuery('style#responsive-header-below-row-bottom-border-color-mobile').remove();
            const currentBorderSize = api('responsive_header_below_row_bottom_border_size_mobile') ? api('responsive_header_below_row_bottom_border_size_mobile').get() : (api('responsive_header_below_row_bottom_border_size').get() || 0);
            jQuery('head').append(
                '<style id="responsive-header-below-row-bottom-border-color-mobile">'
                + '@media screen and ( max-width: 576px ) { .responsive-site-below-mobile-header-wrap { border-bottom: ' + currentBorderSize + 'px solid ' + newColor + ' } }'
                + '</style>'
            );
        } );
    } );

    //Header Below Row Bottom Border Hover Color - Mobile
    api( 'responsive_header_below_row_bottom_border_color_mobile_hover', function( value ) {
        value.bind( function( newColor ) {
            jQuery('style#responsive-header-below-row-bottom-border-hover-color-mobile').remove();
            const currentBorderSize = api('responsive_header_below_row_bottom_border_size_mobile') ? api('responsive_header_below_row_bottom_border_size_mobile').get() : (api('responsive_header_below_row_bottom_border_size').get() || 0);
            jQuery('head').append(
                '<style id="responsive-header-below-row-bottom-border-hover-color-mobile">'
                + '@media screen and ( max-width: 576px ) { .responsive-site-below-mobile-header-wrap:hover { border-bottom: ' + currentBorderSize + 'px solid ' + newColor + ' } }'
                + '</style>'
            );
        } );
    } );

    // Backward compatibility - old hover border color setting
    api( 'responsive_header_below_row_bottom_border_hover_color', function( value ) {
        value.bind( function( newColor ) {
            jQuery('style#responsive-header-below-row-bottom-border-hover-color-old').remove();
            const currentBorderSize = api('responsive_header_below_row_bottom_border_size').get() || 0;
            jQuery('head').append(
                '<style id="responsive-header-below-row-bottom-border-hover-color-old">'
                + '.responsive-site-below-header-wrap:hover { border-bottom: ' + currentBorderSize + 'px solid ' + newColor + ' }'
                + '</style>'
            );
        } );
    } );

    api( 'responsive_header_secondary_menu_background_color', function( value ) {
        value.bind( function( newval ) {
            $('.secondary-navigation').css('background-color', newval );
        } );
    } );
    api( 'responsive_header_secondary_menu_link_color', function( value ) {
        value.bind( function( newval ) {
            if ( newval && newval.startsWith('palette') ) {
                newval = `var(--responsive-global-${newval})`;
            }
            // $('.secondary-navigation .menu li a').attr('style', 'color: ' + newval + ' !important;');
            $('.secondary-navigation .menu li a').css('color', newval );
            $('.secondary-navigation .res-iconify svg').css('stroke', newval );
            $(".secondary-navigation-wrapper > ul > li a").hover(
                function() {
                    $('.secondary-navigation .menu li a').css("color", newval);
                },
                function() {
                    $('.secondary-navigation .menu li a').css("color", newval);
                }
            );
        } );
    } );
    
    $(".secondary-navigation-wrapper > ul > li").hover(
        function() {
            let selectedHoverStyle = api('responsive_secondary_menu_item_hover_style').get();
            let hoverColor = processThemeSettingForCSS('responsive_header_secondary_menu_link_color'); 
            
            $(this).css("color", hoverColor);
            if (selectedHoverStyle === 'underline') {
                $('style#secondary-menu-item-hover-style').remove();
                $('head').append(
                    '<style id="secondary-menu-item-hover-style">' +
                    '.secondary-navigation-wrapper > ul > li::after {' +
                    'display: block;' +
                    'content: "";' +
                    'border-bottom: solid 3px ' + hoverColor + ';' +
                    'transform: scaleX(0);' +
                    'transition: transform 250ms ease-in-out;' +
                    '}' +
                    '.secondary-navigation-wrapper > ul > li:hover::after {' +
                    'transform: scaleX(1);' +
                    '}' +
                    '.secondary-navigation-wrapper > ul > li::after {' +
                    'transform-origin: 0% 50%;' +
                    '}' +
                    '</style>'
                );
            } else if (selectedHoverStyle === 'overline') {
                $('style#secondary-menu-item-hover-style').remove();
                $('head').append(
                    '<style id="secondary-menu-item-hover-style">' +
                    '.secondary-navigation-wrapper > ul > li::before {' +
                    'display: block;' +
                    'content: "";' +
                    'border-bottom: solid 3px ' + hoverColor + ';' +
                    'transform: scaleX(0);' +
                    'transition: transform 250ms ease-in-out;' +
                    '}' +
                    '.secondary-navigation-wrapper > ul > li:hover::before {' +
                    'transform: scaleX(1);' +
                    '}' +
                    '.secondary-navigation-wrapper > ul > li::before {' +
                    'transform-origin: 0% 50%;' +
                    '}' +
                    '</style>'
                );
            } else if (selectedHoverStyle === 'zoom') {
                $('style#secondary-menu-item-hover-style').remove();
                $('head').append(
                    '<style id="secondary-menu-item-hover-style">' +
                    '.secondary-navigation-wrapper > ul > li > a:hover {' +
                    'transition: all 0.3s ease-in-out;' +
                    'transform: scale(1.1);' +
                    '}' +
                    '</style>'
                );
            }
        },
        function() {
            $('style#secondary-menu-item-hover-style').remove();
        },
        $(".secondary-navigation-wrapper > ul > li a").hover(
            function() {
                const secondaryMenuLinkColor = processThemeSettingForCSS('responsive_header_secondary_menu_link_color');
                $('.secondary-navigation .menu li a').css("color", secondaryMenuLinkColor);
            },
            function() {
                const secondaryMenuLinkColor = processThemeSettingForCSS('responsive_header_secondary_menu_link_color');
                $('.secondary-navigation .menu li a').css("color", secondaryMenuLinkColor);
            }
        ),
    );
    api( 'responsive_sticky_header_background_color', function( value ) {
        value.bind( function( newval ) {
            jQuery('style#responsive-sticky-header-bg-color').remove();
            jQuery('head').append(
                '<style id="responsive-sticky-header-bg-color">'
                + '#masthead.sticky-header, .res-transparent-header #masthead.sticky-header, .res-transparent-header:not(.woocommerce-cart):not(.woocommerce-checkout) #masthead.sticky-header, .res-transparent-header:not(.woocommerce-cart):not(.woocommerce-checkout) #masthead.sticky-header,'
                + '#masthead-mobile.sticky-header, .res-transparent-header #masthead-mobile.sticky-header, .res-transparent-header:not(.woocommerce-cart):not(.woocommerce-checkout) #masthead-mobile.sticky-header, .res-transparent-header:not(.woocommerce-cart):not(.woocommerce-checkout) #masthead-mobile.sticky-header { background-color: ' + newval + '; }'
                + '</style>'
            );
        } );
    } );
    api( 'responsive_sticky_header_site_title_color', function( value ) {
        value.bind( function( newval ) {
            jQuery('style#responsive-sticky-header-site-title-color').remove();
            jQuery('head').append(
                '<style id="responsive-sticky-header-site-title-color">'
                + '#masthead.sticky-header .site-title a, .res-transparent-header #masthead.sticky-header .site-title a, '
                + '#masthead-mobile.sticky-header .site-title a, .res-transparent-header #masthead-mobile.sticky-header .site-title a { color: ' + newval + ' !important; }'
                + '</style>'
            );
        } );
    } );
    api( 'responsive_sticky_header_site_title_hover_color', function( value ) {
        value.bind( function( newval ) {
            jQuery('style#responsive-sticky-header-site-title-hover-color').remove();
            jQuery('head').append(
                '<style id="responsive-sticky-header-site-title-hover-color">'
                + '#masthead.sticky-header .site-title a:hover, .res-transparent-header #masthead.sticky-header .site-title a:hover, '
                + '#masthead-mobile.sticky-header .site-title a:hover, .res-transparent-header #masthead-mobile.sticky-header .site-title a:hover { color: ' + newval + ' !important; }'
                + '</style>'
            );
        } );
    } );
    api( 'responsive_sticky_header_text_color', function( value ) {
        value.bind( function( newval ) {
            // $('#masthead.sticky-header .site-description, .res-transparent-header #masthead.sticky-header .site-description').css('color', newval );
            jQuery('style#responsive-sticky-header-text-color').remove();
            jQuery('head').append(
                '<style id="responsive-sticky-header-text-color">'
                + '#masthead.sticky-header .site-description, .res-transparent-header #masthead.sticky-header .site-description, '
                + '#masthead-mobile.sticky-header .site-description, .res-transparent-header #masthead-mobile.sticky-header .site-description { color: ' + newval + '; }'
                + '</style>'
            );
        } );
    } );
    api( 'responsive_sticky_header_menu_background_color', function( value ) {
        value.bind( function( newval ) {
            jQuery('style#responsive-sticky-header-menu-background-color').remove();
            jQuery('head').append(
                '<style id="responsive-sticky-header-menu-background-color">'
                + '#masthead.sticky-header .site-header-row .main-navigation .main-navigation-wrapper, #masthead.sticky-header .site-header-row .main-navigation.toggled, '
                + '#masthead-mobile.sticky-header .site-mobile-header-row .main-navigation .main-navigation-wrapper, #masthead-mobile.sticky-header .site-mobile-header-row .main-navigation.toggled { background-color: ' + newval + ' !important; }'
                + '</style>'
            );
        } );
    } );
    api( 'responsive_sticky_header_active_menu_background_color', function( value ) {
        value.bind( function( newval ) {
            jQuery('style#responsive-sticky-header-active-menu-background-color').remove();
            jQuery('head').append(
                '<style id="responsive-sticky-header-active-menu-background-color">'
                + '#masthead.sticky-header .main-navigation .menu .current_page_item > a, #masthead.sticky-header .main-navigation .menu .current-menu-item > a, #masthead.sticky-header .main-navigation .menu li > a:hover, .res-transparent-header #masthead.sticky-header .main-navigation .menu .current_page_item > a, .res-transparent-header #masthead.sticky-header .main-navigation .menu .current-menu-item > a, .res-transparent-header #masthead.sticky-header .main-navigation .menu li > a:hover, '
                + '#masthead-mobile.sticky-header .main-navigation .menu .current_page_item > a, #masthead-mobile.sticky-header .main-navigation .menu .current-menu-item > a, #masthead-mobile.sticky-header .main-navigation .menu li > a:hover, .res-transparent-header #masthead-mobile.sticky-header .main-navigation .menu .current_page_item > a, .res-transparent-header #masthead-mobile.sticky-header .main-navigation .menu .current-menu-item > a, .res-transparent-header #masthead-mobile.sticky-header .main-navigation .menu li > a:hover { background-color: ' + newval + '; }'
                + '</style>'
            );
        } );
    } );
    api( 'responsive_sticky_header_menu_link_color', function( value ) {
        value.bind( function( newval ) {
            jQuery('style#responsive-sticky-header-menu-link-color').remove();
            jQuery('head').append(
                '<style id="responsive-sticky-header-menu-link-color">'
                + '#masthead.sticky-header .main-navigation .menu > li > a, .res-transparent-header #masthead.sticky-header .main-navigation .menu > li > a, '
                + '#masthead-mobile.sticky-header .main-navigation .menu > li > a, .res-transparent-header #masthead-mobile.sticky-header .main-navigation .menu > li > a { color: ' + newval + ' !important; }'
                + '</style>'
            );
        } );
    } );
    api( 'responsive_sticky_header_menu_link_hover_color', function( value ) {
        value.bind( function( newval ) {
            jQuery('style#responsive-sticky-header-menu-link-hover-color').remove();
            jQuery('head').append(
                '<style id="responsive-sticky-header-menu-link-hover-color">'
                + '#masthead.sticky-header .main-navigation .menu .current_page_item > a, #masthead.sticky-header .main-navigation .menu .current-menu-item > a, #masthead.sticky-header .main-navigation .menu li > a:hover, .res-transparent-header #masthead.sticky-header .main-navigation .menu .current_page_item > a, .res-transparent-header #masthead.sticky-header .main-navigation .menu .current-menu-item > a, .res-transparent-header #masthead.sticky-header .main-navigation .menu li > a:hover, '
                + '#masthead-mobile.sticky-header .main-navigation .menu .current_page_item > a, #masthead-mobile.sticky-header .main-navigation .menu .current-menu-item > a, #masthead-mobile.sticky-header .main-navigation .menu li > a:hover, .res-transparent-header #masthead-mobile.sticky-header .main-navigation .menu .current_page_item > a, .res-transparent-header #masthead-mobile.sticky-header .main-navigation .menu .current-menu-item > a, .res-transparent-header #masthead-mobile.sticky-header .main-navigation .menu li > a:hover { color: ' + newval + '!important; }'
                + '</style>'
            );
        } );
    } );
    api( 'responsive_sticky_header_sub_menu_background_color', function( value ) {
        value.bind( function( newval ) {
            jQuery('style#responsive-sticky-header-sub-menu-bg-color').remove();
            jQuery('head').append(
                '<style id="responsive-sticky-header-sub-menu-bg-color">'
                + '#masthead.sticky-header .main-navigation .children, #masthead.sticky-header .main-navigation .sub-menu, .res-transparent-header #masthead.sticky-header .main-navigation .children,	.res-transparent-header #masthead.sticky-header .main-navigation .sub-menu, '
                + '#masthead-mobile.sticky-header .main-navigation .children, #masthead-mobile.sticky-header .main-navigation .sub-menu, .res-transparent-header #masthead-mobile.sticky-header .main-navigation .children,	.res-transparent-header #masthead-mobile.sticky-header .main-navigation .sub-menu { background-color: ' + newval + '; }'
                + '</style>'
            );
        } );
    } );
    api( 'responsive_sticky_header_sub_menu_link_color', function( value ) {
        value.bind( function( newval ) {
            jQuery('style#responsive-sticky-header-sub-menu-link-color').remove();
            jQuery('head').append(
                '<style id="responsive-sticky-header-sub-menu-link-color">'
                + '#masthead.sticky-header .main-navigation .children li a,	#masthead.sticky-header .main-navigation .sub-menu li a, .res-transparent-header #masthead.sticky-header .main-navigation .children li a, .res-transparent-header #masthead.sticky-header .main-navigation .sub-menu li a, '
                + '#masthead-mobile.sticky-header .main-navigation .children li a,	#masthead-mobile.sticky-header .main-navigation .sub-menu li a, .res-transparent-header #masthead-mobile.sticky-header .main-navigation .children li a, .res-transparent-header #masthead-mobile.sticky-header .main-navigation .sub-menu li a { color: ' + newval + ' !important; }'
                + '</style>'
            );
        } );
    } );
    api( 'responsive_sticky_header_sub_menu_link_hover_color', function( value ) {
        value.bind( function( newval ) {
            jQuery('style#responsive-sticky-header-sub-menu-link-hover-color').remove();
            jQuery('head').append(
                '<style id="responsive-sticky-header-sub-menu-link-hover-color">'
                + '#masthead.sticky-header .main-navigation .children li a:hover, #masthead.sticky-header .main-navigation .sub-menu li a:hover, .res-transparent-header #masthead.sticky-header .main-navigation .children li a:hover, .res-transparent-header #masthead.sticky-header .main-navigation .sub-menu li a:hover, '
                + '#masthead-mobile.sticky-header .main-navigation .children li a:hover, #masthead-mobile.sticky-header .main-navigation .sub-menu li a:hover, .res-transparent-header #masthead-mobile.sticky-header .main-navigation .children li a:hover, .res-transparent-header #masthead-mobile.sticky-header .main-navigation .sub-menu li a:hover { color: ' + newval + ' !important; }'
                + '</style>'
            );
        } );
    } );
    // primary footer - desktop
    api( 'responsive_footer_primary_row_bg_color', function(val){
        val.bind(function(newval){
            jQuery('style#responsive-footer-primary-row-bg-color').remove();
            jQuery('head').append(
                '<style id="responsive-footer-primary-row-bg-color">'
                + '@media screen and ( min-width: 993px ) { .rspv-site-primary-footer-wrap { background-color: ' + newval + '; } }'
                + '</style>'
            );
        });
    });
    api( 'responsive_footer_primary_row_bg_color_tablet', function( val){
        val.bind( function(newval){
            jQuery('style#responsive-footer-primary-row-bg-color-tablet').remove();
            jQuery('head').append(
                '<style id="responsive-footer-primary-row-bg-color-tablet">'
                + '@media screen and ( min-width: 577px )  and ( max-width: 992px ) { .rspv-site-primary-footer-wrap { background-color: ' + newval + '; } }'
                + '</style>'
            );
        })
    })
    api( 'responsive_footer_primary_row_bg_color_mobile', function( val){
        val.bind( function(newval){
            jQuery('style#responsive-footer-primary-row-bg-color-mobile').remove();
            jQuery('head').append(
                '<style id="responsive-footer-primary-row-bg-color-mobile">'
                + '@media screen and ( max-width: 576px ) { .rspv-site-primary-footer-wrap { background-color: ' + newval + '; } }'
                + '</style>'
            );
        })
    });
    api('responsive_footer_primary_row_border_color', function(val) {
        val.bind(function(newval) {

            const borderSize = api('responsive_footer_primary_row_top_border_size').get();

            jQuery('style#responsive-footer-primary-row-border-color').remove();

            jQuery('head').append(
                '<style id="responsive-footer-primary-row-border-color">' +
                '@media screen and (min-width: 993px) {' +
                ' .rspv-site-primary-footer-wrap { border-top: ' + borderSize + 'px solid ' + newval + '; }' +
                '}' +
                '</style>'
            );
        });
    });
    api('responsive_footer_primary_row_border_color_tablet', function(val) {
        val.bind(function(newval) {

            const borderSize = api('responsive_footer_primary_row_top_border_size_tablet').get();

            jQuery('style#responsive-footer-primary-row-border-color-tablet').remove();

            jQuery('head').append(
                '<style id="responsive-footer-primary-row-border-color-tablet">' +
                '@media screen and (min-width: 577px) and (max-width: 992px) {' +
                ' .rspv-site-primary-footer-wrap { border-top: ' + borderSize + 'px solid ' + newval + '; }' +
                '}' +
                '</style>'
            );
        });
    });
    api('responsive_footer_primary_row_border_color_mobile', function(val) {
        val.bind(function(newval) {

            const borderSize = api('responsive_footer_primary_row_top_border_size_mobile').get();

            jQuery('style#responsive-footer-primary-row-border-color-mobile').remove();

            jQuery('head').append(
                '<style id="responsive-footer-primary-row-border-color-mobile">' +
                '@media screen and (max-width: 576px) {' +
                ' .rspv-site-primary-footer-wrap { border-top: ' + borderSize + 'px solid ' + newval + '; }' +
                '}' +
                '</style>'
            );
        });
    });
    // above footer
    api( 'responsive_footer_above_row_bg_color', function(val){
        val.bind(function(newval){
            jQuery('style#responsive-footer-above-row-bg-color').remove();
            jQuery('head').append(
                '<style id="responsive-footer-above-row-bg-color">'
                + '@media screen and ( min-width: 993px ) { .rspv-site-above-footer-wrap { background-color: ' + newval + '; } }'
                + '</style>'
            )
        });
    });
    //Footer Above Row Background Color - Tablet
    api( 'responsive_footer_above_row_bg_color_tablet', function( value ) {
        value.bind( function( newval ) {
            jQuery('style#responsive-footer-above-row-bg-color-tablet').remove();
            jQuery('head').append(
                '<style id="responsive-footer-above-row-bg-color-tablet">'
                + '@media screen and ( min-width: 577px ) and ( max-width: 992px ) { .rspv-site-above-footer-wrap { background-color: ' + newval + '; } }'
                + '</style>'
            );
        } );
    } );
    //Footer Above Row Background Color - Mobile
    api( 'responsive_footer_above_row_bg_color_mobile', function( value ) {
        value.bind( function( newval ) {
            jQuery('style#responsive-footer-above-row-bg-color-mobile').remove();
            jQuery('head').append(
                '<style id="responsive-footer-above-row-bg-color-mobile">'
                + '@media screen and ( max-width: 576px ) { .rspv-site-above-footer-wrap { background-color: ' + newval + ' } }'
                + '</style>'
            );
        } );
    } );
    api('responsive_footer_above_row_border_color', function(val) {
        val.bind(function(newval) {

            const borderSize = api('responsive_footer_above_row_top_border_size').get();

            jQuery('style#responsive-footer-above-row-border-color').remove();

            jQuery('head').append(
                '<style id="responsive-footer-above-row-border-color">' +
                '@media screen and (min-width: 993px) {' +
                ' .rspv-site-above-footer-wrap { border-top: ' + borderSize + 'px solid ' + newval + '; }' +
                '}' +
                '</style>'
            );
        });
    });
    api('responsive_footer_above_row_border_color_tablet', function(val) {
        val.bind(function(newval) {

            const borderSize = api('responsive_footer_above_row_top_border_size_tablet').get();

            jQuery('style#responsive-footer-above-row-border-color-tablet').remove();

            jQuery('head').append(
                '<style id="responsive-footer-above-row-border-color-tablet">' +
                '@media screen and (min-width: 577px) and (max-width: 992px) {' +
                ' .rspv-site-above-footer-wrap { border-top: ' + borderSize + 'px solid ' + newval + '; }' +
                '}' +
                '</style>'
            );
        });
    });
    api('responsive_footer_above_row_border_color_mobile', function(val) {
        val.bind(function(newval) {

            const borderSize = api('responsive_footer_above_row_top_border_size_mobile').get();

            jQuery('style#responsive-footer-above-row-border-color-mobile').remove();

            jQuery('head').append(
                '<style id="responsive-footer-above-row-border-color-mobile">' +
                '@media screen and (max-width: 576px) {' +
                ' .rspv-site-above-footer-wrap { border-top: ' + borderSize + 'px solid ' + newval + '; }' +
                '}' +
                '</style>'
            );
        });
    });
    // below footer
    api( 'responsive_footer_below_row_bg_color', function(val){
        val.bind(function(newval){
            jQuery('style#responsive-footer-below-row-bg-color').remove();
            jQuery('head').append(
                '<style id="responsive-footer-below-row-bg-color">'
                + '@media screen and (min-width: 993px) { .rspv-site-below-footer-wrap { background-color: ' + newval + ' } }'
                + '</style>'
            )
        });
    });
    //Footer Below Row Background Color - Tablet
    api( 'responsive_footer_below_row_bg_color_tablet', function( value ) {
        value.bind( function( newval ) {
            jQuery('style#responsive-footer-below-row-bg-color-tablet').remove();
            jQuery('head').append(
                '<style id="responsive-footer-below-row-bg-color-tablet">'
                + '@media screen and ( min-width: 577px ) and ( max-width: 992px ) { .rspv-site-below-footer-wrap { background-color: ' + newval + ' } }'
                + '</style>'
            );
        } );
    } );
    //Footer Below Row Background Color - Mobile
    api( 'responsive_footer_below_row_bg_color_mobile', function( value ) {
        value.bind( function( newval ) {
            jQuery('style#responsive-footer-below-row-bg-color-mobile').remove();
            jQuery('head').append(
                '<style id="responsive-footer-below-row-bg-color-mobile">'
                + '@media screen and ( max-width: 576px ) { .rspv-site-below-footer-wrap { background-color: ' + newval + ' } }'
                + '</style>'
            );
        } );
    } );
    api('responsive_footer_below_row_border_color', function(val) {
        val.bind(function(newval) {

            const borderSize = api('responsive_footer_below_row_top_border_size').get();

            jQuery('style#responsive-footer-below-row-border-color').remove();

            jQuery('head').append(
                '<style id="responsive-footer-below-row-border-color">' +
                '@media screen and (min-width: 993px) {' +
                ' .rspv-site-below-footer-wrap { border-top: ' + borderSize + 'px solid ' + newval + '; }' +
                '}' +
                '</style>'
            );
        });
    });
    api('responsive_footer_below_row_border_color_tablet', function(val) {
        val.bind(function(newval) {

            const borderSize = api('responsive_footer_below_row_top_border_size_tablet').get();

            jQuery('style#responsive-footer-below-row-border-color-tablet').remove();

            jQuery('head').append(
                '<style id="responsive-footer-below-row-border-color-tablet">' +
                '@media screen and (min-width: 577px) and (max-width: 992px) {' +
                ' .rspv-site-below-footer-wrap { border-top: ' + borderSize + 'px solid ' + newval + '; }' +
                '}' +
                '</style>'
            );
        });
    });
    api('responsive_footer_below_row_border_color_mobile', function(val) {
        val.bind(function(newval) {

            const borderSize = api('responsive_footer_below_row_top_border_size_mobile').get();

            jQuery('style#responsive-footer-below-row-border-color-mobile').remove();

            jQuery('head').append(
                '<style id="responsive-footer-below-row-border-color-mobile">' +
                '@media screen and (max-width: 576px) {' +
                ' .rspv-site-below-footer-wrap { border-top: ' + borderSize + 'px solid ' + newval + '; }' +
                '}' +
                '</style>'
            );
        });
    });

    api( 'responsive_footer_menu_background_color', function(val){
        val.bind(function(newval){
            jQuery('style#responsive-footer-menu-background-color').remove();
            jQuery('head').append(
                '<style id="responsive-footer-menu-background-color">'
                + '@media screen and (min-width: 993px) { .footer-navigation { background-color: ' + newval + '; } }'
                + '</style>'
            );
        });
    });
    api( 'responsive_footer_menu_background_color_hover', function(val){
        val.bind(function(newval){
            jQuery('style#responsive-footer-menu-background-color-hover').remove();
            jQuery('head').append(
                '<style id="responsive-footer-menu-background-color-hover">'
                + '@media screen and (min-width: 993px) { .footer-navigation:hover { background-color: ' + newval + ' } }'
                + '</style>'
            );
        });
    });
    api( 'responsive_footer_menu_background_color_tablet', function( val){
        val.bind( function(newval){
            jQuery('style#responsive-footer-menu-background-color-tablet').remove();
            jQuery('head').append(
                '<style id="responsive-footer-menu-background-color-tablet">'
                + '@media screen and (min-width: 577px) and (max-width: 992px) { .footer-navigation { background-color: ' + newval + ' } }'
                + '</style>'
            );
        })
    });
    api( 'responsive_footer_menu_background_color_tablet_hover', function( val){
        val.bind( function(newval){
            jQuery('style#responsive-footer-menu-background-color-tablet-hover').remove();
            jQuery('head').append(
                '<style id="responsive-footer-menu-background-color-tablet-hover">'
                + '@media screen and (min-width: 577px) and (max-width: 992px) { .footer-navigation:hover { background-color: ' + newval + '; } }'
                + '</style>'
            );
        })
    });
    api( 'responsive_footer_menu_background_color_mobile', function( val){
        val.bind( function(newval){
            jQuery('style#responsive-footer-menu-background-color-mobile').remove();
            jQuery('head').append(
                '<style id="responsive-footer-menu-background-color-mobile">'
                + '@media screen and ( max-width: 576px ) { .footer-navigation { background-color: ' + newval + '; } }'
                + '</style>'
            );
        })
    });
    api( 'responsive_footer_menu_background_color_mobile_hover', function( val){
        val.bind( function(newval){
            jQuery('style#responsive-footer-menu-background-color-mobile-hover').remove();
            jQuery('head').append(
                '<style id="responsive-footer-menu-background-color-mobile-hover">'
                + '@media screen and ( max-width: 576px ) { .footer-navigation:hover { background-color: ' + newval + '; } }'
                + '</style>'
            );
        })
    });
    // Footer Copyright Text Color - Desktop
    api( 'responsive_footer_copyright_text_color', function(val){
        val.bind(function(newval){
            jQuery('style#responsive-footer-copyright-text-color').remove();
            jQuery('head').append(
                '<style id="responsive-footer-copyright-text-color">'
                + '@media screen and ( min-width: 993px ) { .footer-layouts.copyright { color: ' + newval + '; } }'
                + '</style>'
            );
        });
    });
    // Footer Copyright Text Hover Color - Desktop
    api( 'responsive_footer_copyright_text_color_hover', function(val){
        val.bind(function(newval){
            jQuery('style#responsive-footer-copyright-text-hover-color').remove();
            jQuery('head').append(
                '<style id="responsive-footer-copyright-text-hover-color">'
                + '@media screen and ( min-width: 992px ) { .footer-layouts.copyright:hover { color: ' + newval + '; } }'
                + '</style>'
            );
        });
    });
    // Footer Copyright Text Color - Tablet
    api( 'responsive_footer_copyright_text_color_tablet', function(val){
        val.bind(function(newval){
            jQuery('style#responsive-footer-copyright-text-color-tablet').remove();
            jQuery('head').append(
                '<style id="responsive-footer-copyright-text-color-tablet">'
                + '@media screen and ( min-width: 577px ) and ( max-width: 992px ) { .footer-layouts.copyright { color: ' + newval + '; } }'
                + '</style>'
            );
        });
    });
    // Footer Copyright Text Hover Color - Tablet
    api( 'responsive_footer_copyright_text_color_tablet_hover', function(val){
        val.bind(function(newval){
            jQuery('style#responsive-footer-copyright-text-hover-color-tablet').remove();
            jQuery('head').append(
                '<style id="responsive-footer-copyright-text-hover-color-tablet">'
                + '@media screen and ( min-width: 577px ) and ( max-width: 992px ) { .footer-layouts.copyright:hover { color: ' + newval + '; } }'
                + '</style>'
            );
        });
    });
    // Footer Copyright Text Color - Mobile
    api( 'responsive_footer_copyright_text_color_mobile', function(val){
        val.bind(function(newval){
            jQuery('style#responsive-footer-copyright-text-color-mobile').remove();
            jQuery('head').append(
                '<style id="responsive-footer-copyright-text-color-mobile">'
                + '@media screen and ( max-width: 576px ) { .footer-layouts.copyright { color: ' + newval + '; } }'
                + '</style>'
            );
        });
    });
    // Footer Copyright Text Hover Color - Mobile
    api( 'responsive_footer_copyright_text_color_mobile_hover', function(val){
        val.bind(function(newval){
            jQuery('style#responsive-footer-copyright-text-hover-color-mobile').remove();
            jQuery('head').append(
                '<style id="responsive-footer-copyright-text-hover-color-mobile">'
                + '@media screen and ( max-width: 576px ) { .footer-layouts.copyright:hover { color: ' + newval + '; } }'
                + '</style>'
            );
        });
    });
    // Footer Copyright Links Color - Desktop
    api( 'responsive_footer_copyright_links_color', function(val){
        val.bind(function(newval){
            jQuery('style#responsive-footer-copyright-links-color').remove();
            jQuery('head').append(
                '<style id="responsive-footer-copyright-links-color">'
                + '@media screen and ( min-width: 993px ) { .footer-layouts.copyright a { color: ' + newval + '!important; } }'
                + '</style>'
            );
        });
    });
    // Footer Copyright Links Hover Color - Desktop
    api( 'responsive_footer_copyright_links_color_hover', function(val){
        val.bind(function(newval){
            jQuery('style#responsive-footer-copyright-links-hover-color').remove();
            jQuery('head').append(
                '<style id="responsive-footer-copyright-links-hover-color">'
                + '@media screen and ( min-width: 993px ) { .footer-layouts.copyright a:hover { color: ' + newval + '!important; } }'
                + '</style>'
            );
        });
    });
    // Footer Copyright Links Color - Tablet
    api( 'responsive_footer_copyright_links_color_tablet', function(val){
        val.bind(function(newval){
            jQuery('style#responsive-footer-copyright-links-color-tablet').remove();
            jQuery('head').append(
                '<style id="responsive-footer-copyright-links-color-tablet">'
                + '@media screen and ( min-width: 577px) and ( max-width: 992px ) { .footer-layouts.copyright a { color: ' + newval + '!important; } }'
                + '</style>'
            );
        });
    });
    // Footer Copyright Links Hover Color - Tablet
    api( 'responsive_footer_copyright_links_color_tablet_hover', function(val){
        val.bind(function(newval){
            jQuery('style#responsive-footer-copyright-links-hover-color-tablet').remove();
            jQuery('head').append(
                '<style id="responsive-footer-copyright-links-hover-color-tablet">'
                + '@media screen and ( min-width: 577px ) and ( max-width: 992px ) { .footer-layouts.copyright a:hover { color: ' + newval + '!important; } }'
                + '</style>'
            );
        });
    });
    // Footer Copyright Links Color - Mobile
    api( 'responsive_footer_copyright_links_color_mobile', function(val){
        val.bind(function(newval){
            jQuery('style#responsive-footer-copyright-links-color-mobile').remove();
            jQuery('head').append(
                '<style id="responsive-footer-copyright-links-color-mobile">'
                + '@media screen and ( max-width: 576px ) { .footer-layouts.copyright a { color: ' + newval + '!important; } }'
                + '</style>'
            );
        });
    });
    // Footer Copyright Links Hover Color - Mobile
    api( 'responsive_footer_copyright_links_color_mobile_hover', function(val){
        val.bind(function(newval){
            jQuery('style#responsive-footer-copyright-links-hover-color-mobile').remove();
            jQuery('head').append(
                '<style id="responsive-footer-copyright-links-hover-color-mobile">'
                + '@media screen and ( max-width: 576px ) { .footer-layouts.copyright a:hover { color: ' + newval + '!important; } }'
                + '</style>'
            );
        });
    });
    api( 'responsive_header_button_color', function(val){
        val.bind(function(newval){
            $( '.site-header-item .responsive-header-button-wrap .responsive-header-button-inner-wrap .responsive-header-button' ).css( 'color', newval );
        });
    });
    api( 'responsive_header_button_hover_color', function(val){
        val.bind(function(newval){
            $( '.site-header-item .responsive-header-button-wrap .responsive-header-button-inner-wrap .responsive-header-button:hover' ).css( 'color', newval );
        });
    });
    api( 'responsive_header_button_bg_color', function(val){
        val.bind(function(newval){
            let header_button_style = api('responsive_header_button_style').get();
            if ( 'filled' === header_button_style ) {
                $( '.site-header-item .responsive-header-button-wrap .responsive-header-button-inner-wrap .responsive-header-button' ).css( 'background-color', newval );
            }
        });
    });
    api( 'responsive_header_button_bg_hover_color', function(val){
        val.bind(function(newval){
            let header_button_style = api('responsive_header_button_style').get();
            if ( 'filled' === header_button_style ) {
                $( '.site-header-item .responsive-header-button-wrap .responsive-header-button-inner-wrap .responsive-header-button:hover' ).css( 'background-color', newval );
            }
        });
    });
    api( 'responsive_header_button_border_color', function(val){
        val.bind(function(newval){
            let header_button_border_style = api('responsive_header_button_border_style').get();
            if ( 'none' !== header_button_border_style ) {
                $( '.site-header-item .responsive-header-button-wrap .responsive-header-button-inner-wrap .responsive-header-button' ).css( 'border-color', newval );
            }
        });
    });
    api( 'responsive_header_button_border_hover_color', function(val){
        val.bind(function(newval){
            let header_button_border_style = api('responsive_header_button_border_style').get();
            if ( 'none' !== header_button_border_style ) {
                $( '.site-header-item .responsive-header-button-wrap .responsive-header-button-inner-wrap .responsive-header-button:hover' ).css( 'border-color', newval );
            }
        });
    });

    // Mobile Header Button Color Controls
    api( 'responsive_mobile_header_button_color', function(val){
        val.bind(function(newval){
            $( '.site-header-mobile .responsive-header-button-wrap .responsive-header-button-inner-wrap .responsive-header-button' ).css( 'color', newval );
        });
    });
    api( 'responsive_mobile_header_button_hover_color', function(val){
        val.bind(function(newval){
            $( '.site-header-mobile .responsive-header-button-wrap .responsive-header-button-inner-wrap .responsive-header-button:hover' ).css( 'color', newval );
        });
    });
    api( 'responsive_mobile_header_button_bg_color', function(val){
        val.bind(function(newval){
            let mobile_header_button_style = api('responsive_mobile_header_button_style').get();
            if ( 'filled' === mobile_header_button_style ) {
                $( '.site-header-mobile .responsive-header-button-wrap .responsive-header-button-inner-wrap .responsive-header-button' ).css( 'background-color', newval );
            }
        });
    });
    api( 'responsive_mobile_header_button_bg_hover_color', function(val){
        val.bind(function(newval){
            let mobile_header_button_style = api('responsive_mobile_header_button_style').get();
            if ( 'filled' === mobile_header_button_style ) {
                $( '.site-header-mobile .responsive-header-button-wrap .responsive-header-button-inner-wrap .responsive-header-button:hover' ).css( 'background-color', newval );
            }
        });
    });
    api( 'responsive_mobile_header_button_border_color', function(val){
        val.bind(function(newval){
            let mobile_header_button_border_style = api('responsive_mobile_header_button_border_style').get();
            if ( 'none' !== mobile_header_button_border_style ) {
                $( '.site-header-mobile .responsive-header-button-wrap .responsive-header-button-inner-wrap .responsive-header-button' ).css( 'border-color', newval );
            }
        });
    });
    api( 'responsive_mobile_header_button_border_hover_color', function(val){
        val.bind(function(newval){
            let mobile_header_button_border_style = api('responsive_mobile_header_button_border_style').get();
            if ( 'none' !== mobile_header_button_border_style ) {
                $( '.site-header-mobile .responsive-header-button-wrap .responsive-header-button-inner-wrap .responsive-header-button:hover' ).css( 'border-color', newval );
            }
        });
    });
    api( 'responsive_mobile_header_button_shadow_color', function(val){
        val.bind(function(newval){
            $( '.site-header-mobile .responsive-header-button-wrap .responsive-header-button-inner-wrap .responsive-header-button' ).css( 'box-shadow', function(i, value) {
                return value.replace(/rgba?\([^)]+\)|#[0-9a-f]+/i, newval);
            });
        });
    });

    api( 'responsive_header_social_item_style', function(val){
        val.bind(function(newval){
            if ( 'filled' === newval || '' == newval ) {
                $( '.site-header-item .header-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor' ).css( 'background-color', '#EDF2F7' );
            }
        });
    });
    api( 'responsive_mobile_header_social_item_style', function(val){
        val.bind(function(newval){
            if ( 'filled' === newval || '' == newval ) {
                $( '.site-mobile-header-item .header-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor' ).css( 'background-color', '#EDF2F7' );
            }
        });
    });
    api( 'responsive_footer_social_item_style', function(val){
        val.bind(function(newval){
            if ( 'filled' === newval || '' == newval ) {
                $( '.footer-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor' ).css( 'background-color', '#EDF2F7' );
            }
        });
    });
    api( 'responsive_header_social_item_color', function(val){
        val.bind(function(newval){
            var header_social_item_use_brand_colors = api('responsive_header_social_item_use_brand_colors').get();
            if ( 'no' === header_social_item_use_brand_colors ) {
                $( '.site-header-item .header-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor' ).css( 'color', newval );
                $( '.site-header-item .header-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor' ).css( 'fill', newval );
            }
        });
    });
    api( 'responsive_mobile_header_social_item_color', function(val){
        val.bind(function(newval){
            var header_social_item_use_brand_colors = api('responsive_mobile_header_social_item_use_brand_colors').get();
            if ( 'no' === header_social_item_use_brand_colors ) {
                $( '.site-mobile-header-item .header-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor' ).css( 'color', newval );
                $( '.site-mobile-header-item .header-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor' ).css( 'fill', newval );
            }
        });
    });
    // Footer Social Item Color - Desktop
    api( 'responsive_footer_social_item_color', function(val){
        val.bind(function(newval){
            var footer_social_item_use_brand_colors = api('responsive_footer_social_item_use_brand_colors').get();
            if ( 'no' === footer_social_item_use_brand_colors ) {
                jQuery('style#responsive-footer-social-item-color-desktop').remove();
                jQuery('head').append(
                    '<style id="responsive-footer-social-item-color-desktop">'
                    + '@media screen and (min-width: 993px) {'
                    + '.footer-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor { color: ' + newval + '; fill: ' + newval + '; }'
                    + '} </style>'
                );
            }
        });
    });
    // Footer Social Item Color - Tablet
    api( 'responsive_footer_social_item_color_tablet', function(val){
        val.bind(function(newval){
            var footer_social_item_use_brand_colors = api('responsive_footer_social_item_use_brand_colors').get();
            if ( 'no' === footer_social_item_use_brand_colors ) {
                jQuery('style#responsive-footer-social-item-color-tablet').remove();
                jQuery('head').append(
                    '<style id="responsive-footer-social-item-color-tablet">'
                    + '@media screen and (min-width: 577px) and (max-width: 992px) {'
                    + '.footer-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor { color: ' + newval + '; fill: ' + newval + '; }'
                    + '} </style>'
                );
            }
        });
    });
    // Footer Social Item Color - Mobile
    api( 'responsive_footer_social_item_color_mobile', function(val){
        val.bind(function(newval){
            var footer_social_item_use_brand_colors = api('responsive_footer_social_item_use_brand_colors').get();
            if ( 'no' === footer_social_item_use_brand_colors ) {
                jQuery('style#responsive-footer-social-item-color-mobile').remove();
                jQuery('head').append(
                    '<style id="responsive-footer-social-item-color-mobile">'
                    + '@media screen and (max-width: 556px) {'
                    + '.footer-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor { color: ' + newval + '; fill: ' + newval + '; }'
                    + '} </style>'
                );
            }
        });
    });
    api( 'responsive_header_social_item_hover_color', function(val){
        val.bind(function(newval){
            var header_social_item_use_brand_colors = api('responsive_header_social_item_use_brand_colors').get();
            if ( 'no' === header_social_item_use_brand_colors ) {
                $( '.site-header-item .header-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor:hover' ).css( 'color', newval );
                $( '.site-header-item .header-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor:hover' ).css( 'fill', newval );
            }
        });
    });
    api( 'responsive_mobile_header_social_item_hover_color', function(val){
        val.bind(function(newval){
            var header_social_item_use_brand_colors = api('responsive_mobile_header_social_item_use_brand_colors').get();
            if ( 'no' === header_social_item_use_brand_colors ) {
                $( '.site-mobile-header-item .header-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor:hover' ).css( 'color', newval );
                $( '.site-mobile-header-item .header-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor:hover' ).css( 'fill', newval );
            }
        });
    });
    // Footer Social Item Hover Color - Desktop
    api( 'responsive_footer_social_item_color_hover', function(val){
        val.bind(function(newval){
            var footer_social_item_use_brand_colors = api('responsive_footer_social_item_use_brand_colors').get();
            if ( 'no' === footer_social_item_use_brand_colors ) {
                jQuery('style#responsive-footer-social-item-hover-color-desktop').remove();
                jQuery('head').append(
                    '<style id="responsive-footer-social-item-hover-color-desktop">'
                    + '@media screen and (min-width: 993px) {'
                    + '.footer-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor:hover { color: ' + newval + '; fill: ' + newval + '; }'
                    + '} </style>'
                );
            }
        });
    });
    // Footer Social Item Hover Color - Tablet
    api( 'responsive_footer_social_item_color_tablet_hover', function(val){
        val.bind(function(newval){
            var footer_social_item_use_brand_colors = api('responsive_footer_social_item_use_brand_colors').get();
            if ( 'no' === footer_social_item_use_brand_colors ) {
                jQuery('style#responsive-footer-social-item-hover-color-tablet').remove();
                jQuery('head').append(
                    '<style id="responsive-footer-social-item-hover-color-tablet">'
                    + '@media screen and (min-width: 577px) and (max-width: 992px) {'
                    + '.footer-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor:hover { color: ' + newval + '; fill: ' + newval + '; }'
                    + '} </style>'
                );
            }
        });
    });
    // Footer Social Item Hover Color - Mobile
    api( 'responsive_footer_social_item_color_mobile_hover', function(val){
        val.bind(function(newval){
            var footer_social_item_use_brand_colors = api('responsive_footer_social_item_use_brand_colors').get();
            if ( 'no' === footer_social_item_use_brand_colors ) {
                jQuery('style#responsive-footer-social-item-hover-color-mobile').remove();
                jQuery('head').append(
                    '<style id="responsive-footer-social-item-hover-color-mobile">'
                    + '@media screen and (max-width: 556px) {'
                    + '.footer-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor:hover { color: ' + newval + '; fill: ' + newval + '; }'
                    + '} </style>'
                );
            }
        });
    });
    api( 'responsive_header_social_item_background_color', function(val){
        val.bind(function(newval){
            var header_social_item_use_brand_colors = api('responsive_header_social_item_use_brand_colors').get();
            if ( 'no' === header_social_item_use_brand_colors ) {
                $( '.site-header-item .header-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor' ).css( 'background-color', newval );
            }
        });
    });
    api( 'responsive_mobile_header_social_item_background_color', function(val){
        val.bind(function(newval){
            var header_social_item_use_brand_colors = api('responsive_mobile_header_social_item_use_brand_colors').get();
            if ( 'no' === header_social_item_use_brand_colors ) {
                $( '.site-mobile-header-item .header-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor' ).css( 'background-color', newval );
            }
        });
    });
    // Footer Social Item Background Color - Desktop
    api( 'responsive_footer_social_item_background_color', function(val){
        val.bind(function(newval){
            var footer_social_item_use_brand_colors = api('responsive_footer_social_item_use_brand_colors').get();
            if ( 'no' === footer_social_item_use_brand_colors ) {
                jQuery('style#responsive-footer-social-item-background-color-desktop').remove();
                jQuery('head').append(
                    '<style id="responsive-footer-social-item-background-color-desktop">'
                    + '@media screen and (min-width: 993px) {'
                    + '.footer-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor { background-color: ' + newval + '; }'
                    + '} </style>'
                );
            }
        });
    });
    // Footer Social Item Background Color - Tablet
    api( 'responsive_footer_social_item_background_color_tablet', function(val){
        val.bind(function(newval){
            var footer_social_item_use_brand_colors = api('responsive_footer_social_item_use_brand_colors').get();
            if ( 'no' === footer_social_item_use_brand_colors ) {
                jQuery('style#responsive-footer-social-item-background-color-tablet').remove();
                jQuery('head').append(
                    '<style id="responsive-footer-social-item-background-color-tablet">'
                    + '@media screen and (min-width: 577px) and (max-width: 992px) {'
                    + '.footer-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor { background-color: ' + newval + '; }'
                    + '} </style>'
                );
            }
        });
    });
    // Footer Social Item Background Color - Mobile
    api( 'responsive_footer_social_item_background_color_mobile', function(val){
        val.bind(function(newval){
            var footer_social_item_use_brand_colors = api('responsive_footer_social_item_use_brand_colors').get();
            if ( 'no' === footer_social_item_use_brand_colors ) {
                jQuery('style#responsive-footer-social-item-background-color-mobile').remove();
                jQuery('head').append(
                    '<style id="responsive-footer-social-item-background-color-mobile">'
                    + '@media screen and (max-width: 556px) {'
                    + '.footer-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor { background-color: ' + newval + '; }'
                    + '} </style>'
                );
            }
        });
    });
    api( 'responsive_header_social_item_background_hover_color', function(val){
        val.bind(function(newval){
            var header_social_item_use_brand_colors = api('responsive_header_social_item_use_brand_colors').get();
            if ( 'no' === header_social_item_use_brand_colors ) {
                $( '.site-header-item .header-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor:hover' ).css( 'background-color', newval );
            }
        });
    });
    api( 'responsive_mobile_header_social_item_background_hover_color', function(val){
        val.bind(function(newval){
            var header_social_item_use_brand_colors = api('responsive_mobile_header_social_item_use_brand_colors').get();
            if ( 'no' === header_social_item_use_brand_colors ) {
                $( '.site-mobile-header-item .header-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor:hover' ).css( 'background-color', newval );
            }
        });
    });
    // Footer Social Item Background Hover Color - Desktop
    api( 'responsive_footer_social_item_background_color_hover', function(val){
        val.bind(function(newval){
            var footer_social_item_use_brand_colors = api('responsive_footer_social_item_use_brand_colors').get();
            if ( 'no' === footer_social_item_use_brand_colors ) {
                jQuery('style#responsive-footer-social-item-background-hover-color-desktop').remove();
                jQuery('head').append(
                    '<style id="responsive-footer-social-item-background-hover-color-desktop">'
                    + '@media screen and (min-width: 993px) {'
                    + '.footer-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor:hover { background-color: ' + newval + '; }'
                    + '} </style>'
                );
            }
        });
    });
    // Footer Social Item Background Hover Color - Tablet
    api( 'responsive_footer_social_item_background_color_tablet_hover', function(val){
        val.bind(function(newval){
            var footer_social_item_use_brand_colors = api('responsive_footer_social_item_use_brand_colors').get();
            if ( 'no' === footer_social_item_use_brand_colors ) {
                jQuery('style#responsive-footer-social-item-background-hover-color-tablet').remove();
                jQuery('head').append(
                    '<style id="responsive-footer-social-item-background-hover-color-tablet">'
                    + '@media screen and (min-width: 577px) and (max-width: 992px) {'
                    + '.footer-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor:hover { background-color: ' + newval + '; }'
                    + '} </style>'
                );
            }
        });
    });
    // Footer Social Item Background Hover Color - Mobile
    api( 'responsive_footer_social_item_background_color_mobile_hover', function(val){
        val.bind(function(newval){
            var footer_social_item_use_brand_colors = api('responsive_footer_social_item_use_brand_colors').get();
            if ( 'no' === footer_social_item_use_brand_colors ) {
                jQuery('style#responsive-footer-social-item-background-hover-color-mobile').remove();
                jQuery('head').append(
                    '<style id="responsive-footer-social-item-background-hover-color-mobile">'
                    + '@media screen and (max-width: 556px) {'
                    + '.footer-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor:hover { background-color: ' + newval + '; }'
                    + '} </style>'
                );
            }
        });
    });
    api( 'responsive_header_social_item_border_color', function(val){
        val.bind(function(newval){
            var header_social_item_use_brand_colors = api('responsive_header_social_item_use_brand_colors').get();
            if ( 'no' === header_social_item_use_brand_colors ) {
                $( '.site-header-item .header-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor' ).css( 'border-color', newval );
            }
        });
    });
    api( 'responsive_mobile_header_social_item_border_color', function(val){
        val.bind(function(newval){
            var header_social_item_use_brand_colors = api('responsive_mobile_header_social_item_use_brand_colors').get();
            if ( 'no' === header_social_item_use_brand_colors ) {
                $( '.site-mobile-header-item .header-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor' ).css( 'border-color', newval );
            }
        });
    });
    // Footer Social Item Border Color - Desktop
    api( 'responsive_footer_social_item_border_color', function(val){
        val.bind(function(newval){
            var footer_social_item_use_brand_colors = api('responsive_footer_social_item_use_brand_colors').get();
            if ( 'no' === footer_social_item_use_brand_colors ) {
                jQuery('style#responsive-footer-social-item-border-color-desktop').remove();
                jQuery('head').append(
                    '<style id="responsive-footer-social-item-border-color-desktop">'
                    + '@media screen and (min-width: 993px) {'
                    + '.footer-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor { border-color: ' + newval + '; }'
                    + '} </style>'
                );
            }
        });
    });
    // Footer Social Item Border Color - Tablet
    api( 'responsive_footer_social_item_border_color_tablet', function(val){
        val.bind(function(newval){
            var footer_social_item_use_brand_colors = api('responsive_footer_social_item_use_brand_colors').get();
            if ( 'no' === footer_social_item_use_brand_colors ) {
                jQuery('style#responsive-footer-social-item-border-color-tablet').remove();
                jQuery('head').append(
                    '<style id="responsive-footer-social-item-border-color-tablet">'
                    + '@media screen and (min-width: 577px) and (max-width: 992px) {'
                    + '.footer-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor { border-color: ' + newval + '; }'
                    + '} </style>'
                );
            }
        });
    });
    // Footer Social Item Border Color - Mobile
    api( 'responsive_footer_social_item_border_color_mobile', function(val){
        val.bind(function(newval){
            var footer_social_item_use_brand_colors = api('responsive_footer_social_item_use_brand_colors').get();
            if ( 'no' === footer_social_item_use_brand_colors ) {
                jQuery('style#responsive-footer-social-item-border-color-mobile').remove();
                jQuery('head').append(
                    '<style id="responsive-footer-social-item-border-color-mobile">'
                    + '@media screen and (max-width: 556px) {'
                    + '.footer-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor { border-color: ' + newval + '; }'
                    + '} </style>'
                );
            }
        });
    });
    api( 'responsive_header_social_item_border_hover_color', function(val){
        val.bind(function(newval){
            var header_social_item_use_brand_colors = api('responsive_header_social_item_use_brand_colors').get();
            if ( 'no' === header_social_item_use_brand_colors ) {
                $( '.site-header-item .header-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor:hover' ).css( 'border-color', newval );
            }
        });
    });
    api( 'responsive_mobile_header_social_item_border_hover_color', function(val){
        val.bind(function(newval){
            var header_social_item_use_brand_colors = api('responsive_mobile_header_social_item_use_brand_colors').get();
            if ( 'no' === header_social_item_use_brand_colors ) {
                $( '.site-mobile-header-item .header-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor:hover' ).css( 'border-color', newval );
            }
        });
    });
    // Footer Social Item Border Hover Color - Desktop
    api( 'responsive_footer_social_item_border_color_hover', function(val){
        val.bind(function(newval){
            var footer_social_item_use_brand_colors = api('responsive_footer_social_item_use_brand_colors').get();
            if ( 'no' === footer_social_item_use_brand_colors ) {
                jQuery('style#responsive-footer-social-item-border-hover-color-desktop').remove();
                jQuery('head').append(
                    '<style id="responsive-footer-social-item-border-hover-color-desktop">'
                    + '@media screen and (min-width: 993px) {'
                    + '.footer-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor:hover { border-color: ' + newval + '; }'
                    + '} </style>'
                );
            }
        });
    });
    // Footer Social Item Border Hover Color - Tablet
    api( 'responsive_footer_social_item_border_color_tablet_hover', function(val){
        val.bind(function(newval){
            var footer_social_item_use_brand_colors = api('responsive_footer_social_item_use_brand_colors').get();
            if ( 'no' === footer_social_item_use_brand_colors ) {
                jQuery('style#responsive-footer-social-item-border-hover-color-tablet').remove();
                jQuery('head').append(
                    '<style id="responsive-footer-social-item-border-hover-color-tablet">'
                    + '@media screen and (min-width: 577px) and (max-width: 992px) {'
                    + '.footer-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor:hover { border-color: ' + newval + '; }'
                    + '} </style>'
                );
            }
        });
    });
    // Footer Social Item Border Hover Color - Mobile
    api( 'responsive_footer_social_item_border_color_mobile_hover', function(val){
        val.bind(function(newval){
            var footer_social_item_use_brand_colors = api('responsive_footer_social_item_use_brand_colors').get();
            if ( 'no' === footer_social_item_use_brand_colors ) {
                jQuery('style#responsive-footer-social-item-border-hover-color-mobile').remove();
                jQuery('head').append(
                    '<style id="responsive-footer-social-item-border-hover-color-mobile">'
                    + '@media screen and (max-width: 556px) {'
                    + '.footer-layouts.social-icon .social-icons .responsive-social-icon .responsive-social-icon-anchor:hover { border-color: ' + newval + '; }'
                    + '} </style>'
                );
            }
        });
    });
    api( 'responsive_cart_count_color', function(setting){
        setting.bind(function(color){
            jQuery('style#responsive-cart-count-color').remove();
            jQuery('head').append(
                '<style id="responsive-cart-count-color">'
                + '.responsive-header-cart-total { color: ' + color + '!important; }'
                + '</style>'
            );
        });
    });
    api( 'responsive_cart_count_hover_color', function(setting){
        setting.bind(function(color){
            jQuery('style#responsive-cart-count-hover-color').remove();
            jQuery('head').append(
                '<style id="responsive-cart-count-hover-color">'
                + '.responsive-header-cart-total:hover { color: ' + color + '!important; }'
                + '</style>'
            );
        });
    });
    api('responsive_header_cart_button_color', function (setting) {
        setting.bind(function (color) {
            jQuery('style#responsive-header-cart-button-color').remove();
            const css = `
                .responsive-header-cart .responsive-header-cart-data .widget_shopping_cart_content a.button.wc-forward:not(.checkout),
                .rspv-header-cart-drawer .woocommerce-mini-cart__buttons.buttons .button:not(.checkout) {
                    background-color: ${color} !important;
                    border-color: ${color} !important;
                }
            `;
            jQuery('head').append(
                `<style id="responsive-header-cart-button-color">${css}</style>`
            );
        });
    });
    api('responsive_header_cart_button_hover_color', function (setting) {
        setting.bind(function (color) {
            jQuery('style#responsive-header-cart-button-hover-color').remove();
            const css = `
                .responsive-header-cart .responsive-header-cart-data .widget_shopping_cart_content a.button.wc-forward:not(.checkout):hover,
                .rspv-header-cart-drawer .woocommerce-mini-cart__buttons.buttons .button:not(.checkout):hover {
                    background-color: ${color} !important;
                    border-color: ${color} !important;
                }
            `;
            jQuery('head').append(
                `<style id="responsive-header-cart-button-hover-color">${css}</style>`
            );
        });
    });

    api( 'responsive_header_cart_button_text_color', function(setting){
        setting.bind(function(color){
            jQuery('style#responsive-header-cart-button-text-color').remove();
            jQuery('head').append(
                '<style id="responsive-header-cart-button-text-color">'
                + '.responsive-header-cart .responsive-header-cart-data .widget_shopping_cart_content a.button.wc-forward:not(.checkout), .rspv-header-cart-drawer .woocommerce-mini-cart__buttons.buttons .button:not(.checkout) { color: ' + color + ' !important; }'
                + '</style>'
            );
        });
    });
    api( 'responsive_header_cart_button_text_hover_color', function(setting){
        setting.bind(function(color){
            jQuery('style#responsive-header-cart-button-text-hover-color').remove();
            jQuery('head').append(
                '<style id="responsive-header-cart-button-text-hover-color">'
                + '.responsive-header-cart .responsive-header-cart-data .widget_shopping_cart_content a.button.wc-forward:not(.checkout):hover, .rspv-header-cart-drawer .woocommerce-mini-cart__buttons.buttons .button:not(.checkout):hover { color: ' + color + ' !important; }'
                + '</style>'
            );
        });
    });
    api('responsive_header_cart_checkout_button_color', function (setting) {
        setting.bind(function (color) {
            jQuery('style#responsive-header-cart-checkout-button-color').remove();
            const css = `
                .responsive-header-cart .responsive-header-cart-data .widget_shopping_cart_content a.button.checkout.wc-forward,
                .rspv-header-cart-drawer .woocommerce-mini-cart__buttons.buttons .button.checkout {
                    background-color: ${color} !important;
                    border-color: ${color} !important;
                }
            `;
            jQuery('head').append(`<style id="responsive-header-cart-checkout-button-color">${css}</style>`);
        });
    });
    api('responsive_header_cart_checkout_button_hover_color', function (setting) {
        setting.bind(function (color) {
            jQuery('style#responsive-header-cart-checkout-button-hover-color').remove();
            const css = `
                .responsive-header-cart .responsive-header-cart-data .widget_shopping_cart_content a.button.checkout.wc-forward:hover,
                .rspv-header-cart-drawer .woocommerce-mini-cart__buttons.buttons .button.checkout:hover {
                    background-color: ${color} !important;
                    border-color: ${color} !important;
                }
            `;
            jQuery('head').append(`<style id="responsive-header-cart-checkout-button-hover-color">${css}</style>`);
        });
    });

    api( 'responsive_header_cart_checkout_button_text_color', function(setting){
        setting.bind(function(color){
            jQuery('style#responsive-header-cart-checkout-button-text-color').remove();
            jQuery('head').append(
                '<style id="responsive-header-cart-checkout-button-text-color">'
                + '.responsive-header-cart .responsive-header-cart-data .widget_shopping_cart_content a.button.checkout.wc-forward, .rspv-header-cart-drawer .woocommerce-mini-cart__buttons.buttons .button.checkout { color: ' + color + ' !important; }'
                + '</style>'
            );
        });
    });
    api( 'responsive_header_cart_checkout_button_text_hover_color', function(setting){
        setting.bind(function(color){
            jQuery('style#responsive-header-cart-checkout-button-text-hover-color').remove();
            jQuery('head').append(
                '<style id="responsive-header-cart-checkout-button-text-hover-color">'
                + '.responsive-header-cart .responsive-header-cart-data .widget_shopping_cart_content a.button.checkout.wc-forward:hover, .rspv-header-cart-drawer .woocommerce-mini-cart__buttons.buttons .button.checkout:hover { color: ' + color + ' !important; }'
                + '</style>'
            );
        });
    });
    // header cart tray background color
    api('responsive_header_cart_tray_bg_color', function (setting) {
        setting.bind(function (color) {
            jQuery('style#responsive-header-cart-tray-bg-color').remove();
            const css = `
                .rspv-header-cart-drawer, .responsive-header-cart .woocommerce.widget_shopping_cart {
                    background-color: ${color} !important;
                }
            `;
            jQuery('head').append(`<style id="responsive-header-cart-tray-bg-color">${css}</style>`);
        });
    });
    // header cart tray background hover color
    api('responsive_header_cart_tray_bg_hover_color', function (setting) {
        setting.bind(function (color) {
            jQuery('style#responsive-header-cart-tray-bg-hover-color').remove();
            const css = `
                .rspv-header-cart-drawer:hover, .responsive-header-cart .woocommerce.widget_shopping_cart:hover {
                    background-color: ${color} !important;
                }
                `;
            jQuery('head').append(`<style id="responsive-header-cart-tray-bg-hover-color">${css}</style>`);
        });
    });
    // header cart tray separator color
    api( 'responsive_header_cart_tray_separator_color', function(setting){
        setting.bind(function(color){
            jQuery('style#responsive-header-cart-tray-separator-color').remove();
            const css = `
               .responsive-header-cart .woocommerce.widget_shopping_cart .woocommerce-mini-cart__total,
			    .woocommerce-js .rspv-header-cart-drawer .rspv-cart-drawer-content .woocommerce-mini-cart__total,
			    .woocommerce-js .rspv-header-cart-drawer .rspv-cart-drawer-header {
                    border-top-color: ${color} !important;
                    border-bottom-color: ${color} !important;
                }
                .responsive-header-cart .widget_shopping_cart .mini_cart_item,
                .rspv-header-cart-drawer .rspv-cart-drawer-content .widget_shopping_cart_content ul li {
                    border-bottom-color: ${color} !important;
                }
            `;
            jQuery('head').append(`<style id="responsive-header-cart-tray-separator-color">${css}</style>`);
        });
    });
    // header cart tray links color
    api('responsive_header_cart_tray_link_color', function (setting) {
        setting.bind(function (color) {
            jQuery('style#responsive-header-cart-tray-link-color').remove();
            const css = `
                .rspv-header-cart-drawer .widget_shopping_cart_content a:not(.button), .responsive-header-cart .responsive-header-cart-data .widget_shopping_cart_content a:not(.button) {
                    color: ${color} !important;
                }
            `;
            jQuery('head').append(`<style id="responsive-header-cart-tray-link-color">${css}</style>`);
        });
    });
    // header cart tray links hover color
    api('responsive_header_cart_tray_link_hover_color', function (setting) {
        setting.bind(function (color) {
            jQuery('style#responsive-header-cart-tray-link-hover-color').remove();
            const css = `
                .rspv-header-cart-drawer .widget_shopping_cart_content a:not(.button):hover, .responsive-header-cart .responsive-header-cart-data .widget_shopping_cart_content a:not(.button):hover {
                    color: ${color} !important;
                }
            `;
            jQuery('head').append(`<style id="responsive-header-cart-tray-link-hover-color">${css}</style>`);
        });
    });

    // Mobile Header Cart Color
    api('responsive_mobile_cart_color', function(setting){
        setting.bind(function(color){
            jQuery('style#responsive-mobile-cart-color').remove();
            jQuery('head').append(
                '<style id="responsive-mobile-cart-color">'
                + '.site-mobile-header-item .responsive-header-cart .res-cart-icon { color: ' + color + ' !important; }'
                + '.site-mobile-header-item .responsive-header-cart .res-cart-icon svg { fill: ' + color + ' !important; }'
                + '</style>'
            );
        });
    });
    api('responsive_mobile_cart_hover_color', function(setting){
        setting.bind(function(color){
            jQuery('style#responsive-mobile-cart-hover-color').remove();
            jQuery('head').append(
                '<style id="responsive-mobile-cart-hover-color">'
                + '.site-mobile-header-item .responsive-header-cart .res-cart-icon:hover { color: ' + color + ' !important; }'
                + '.site-mobile-header-item .responsive-header-cart .res-cart-icon:hover svg { fill: ' + color + ' !important; }'
                + '</style>'
            );
        });
    });
    api('responsive_mobile_cart_count_color', function(setting){
        setting.bind(function(color){
            jQuery('style#responsive-mobile-cart-count-color').remove();
            jQuery('head').append(
                '<style id="responsive-mobile-cart-count-color">'
                + '.site-mobile-header-item .responsive-header-cart-total { color: ' + color + '!important; }'
                + '</style>'
            );
        });
    });
    api('responsive_mobile_cart_count_hover_color', function(setting){
        setting.bind(function(color){
            jQuery('style#responsive-mobile-cart-count-hover-color').remove();
            jQuery('head').append(
                '<style id="responsive-mobile-cart-count-hover-color">'
                + '.site-mobile-header-item .responsive-header-cart-total:hover { color: ' + color + '!important; }'
                + '</style>'
            );
        });
    });
    api('responsive_mobile_header_cart_button_color', function (setting) {
        setting.bind(function (color) {
            jQuery('style#responsive-mobile-header-cart-button-color').remove();
            const css = `
                .site-mobile-header-item .responsive-header-cart .responsive-header-cart-data .widget_shopping_cart_content a.button.wc-forward:not(.checkout),
                .site-mobile-header-item .rspv-header-cart-drawer .woocommerce-mini-cart__buttons.buttons .button:not(.checkout) {
                    background-color: ${color} !important;
                    border-color: ${color} !important;
                }
            `;
            jQuery('head').append(
                `<style id="responsive-mobile-header-cart-button-color">${css}</style>`
            );
        });
    });
    api('responsive_mobile_header_cart_button_hover_color', function (setting) {
        setting.bind(function (color) {
            jQuery('style#responsive-mobile-header-cart-button-hover-color').remove();
            const css = `
                .site-mobile-header-item .responsive-header-cart .responsive-header-cart-data .widget_shopping_cart_content a.button.wc-forward:not(.checkout):hover,
                .site-mobile-header-item .rspv-header-cart-drawer .woocommerce-mini-cart__buttons.buttons .button:not(.checkout):hover {
                    background-color: ${color} !important;
                    border-color: ${color} !important;
                }
            `;
            jQuery('head').append(
                `<style id="responsive-mobile-header-cart-button-hover-color">${css}</style>`
            );
        });
    });
    api('responsive_mobile_header_cart_button_text_color', function(setting){
        setting.bind(function(color){
            jQuery('style#responsive-mobile-header-cart-button-text-color').remove();
            jQuery('head').append(
                '<style id="responsive-mobile-header-cart-button-text-color">'
                + '.site-mobile-header-item .responsive-header-cart .responsive-header-cart-data .widget_shopping_cart_content a.button.wc-forward:not(.checkout), .site-mobile-header-item .rspv-header-cart-drawer .woocommerce-mini-cart__buttons.buttons .button:not(.checkout) { color: ' + color + ' !important; }'
                + '</style>'
            );
        });
    });
    api('responsive_mobile_header_cart_button_text_hover_color', function(setting){
        setting.bind(function(color){
            jQuery('style#responsive-mobile-header-cart-button-text-hover-color').remove();
            jQuery('head').append(
                '<style id="responsive-mobile-header-cart-button-text-hover-color">'
                + '.site-mobile-header-item .responsive-header-cart .responsive-header-cart-data .widget_shopping_cart_content a.button.wc-forward:not(.checkout):hover, .site-mobile-header-item .rspv-header-cart-drawer .woocommerce-mini-cart__buttons.buttons .button:not(.checkout):hover { color: ' + color + ' !important; }'
                + '</style>'
            );
        });
    });
    api('responsive_mobile_header_cart_checkout_button_color', function (setting) {
        setting.bind(function (color) {
            jQuery('style#responsive-mobile-header-cart-checkout-button-color').remove();
            const css = `
                .site-mobile-header-item .responsive-header-cart .responsive-header-cart-data .widget_shopping_cart_content a.button.checkout.wc-forward,
                .site-mobile-header-item .rspv-header-cart-drawer .woocommerce-mini-cart__buttons.buttons .button.checkout {
                    background-color: ${color} !important;
                    border-color: ${color} !important;
                }
            `;
            jQuery('head').append(`<style id="responsive-mobile-header-cart-checkout-button-color">${css}</style>`);
        });
    });
    api('responsive_mobile_header_cart_checkout_button_hover_color', function (setting) {
        setting.bind(function (color) {
            jQuery('style#responsive-mobile-header-cart-checkout-button-hover-color').remove();
            const css = `
                .site-mobile-header-item .responsive-header-cart .responsive-header-cart-data .widget_shopping_cart_content a.button.checkout.wc-forward:hover,
                .site-mobile-header-item .rspv-header-cart-drawer .woocommerce-mini-cart__buttons.buttons .button.checkout:hover {
                    background-color: ${color} !important;
                    border-color: ${color} !important;
                }
            `;
            jQuery('head').append(`<style id="responsive-mobile-header-cart-checkout-button-hover-color">${css}</style>`);
        });
    });
    api('responsive_mobile_header_cart_checkout_button_text_color', function(setting){
        setting.bind(function(color){
            jQuery('style#responsive-mobile-header-cart-checkout-button-text-color').remove();
            jQuery('head').append(
                '<style id="responsive-mobile-header-cart-checkout-button-text-color">'
                + '.site-mobile-header-item .responsive-header-cart .responsive-header-cart-data .widget_shopping_cart_content a.button.checkout.wc-forward, .site-mobile-header-item .rspv-header-cart-drawer .woocommerce-mini-cart__buttons.buttons .button.checkout { color: ' + color + ' !important; }'
                + '</style>'
            );
        });
    });
    api('responsive_mobile_header_cart_checkout_button_text_hover_color', function(setting){
        setting.bind(function(color){
            jQuery('style#responsive-mobile-header-cart-checkout-button-text-hover-color').remove();
            jQuery('head').append(
                '<style id="responsive-mobile-header-cart-checkout-button-text-hover-color">'
                + '.site-mobile-header-item .responsive-header-cart .responsive-header-cart-data .widget_shopping_cart_content a.button.checkout.wc-forward:hover, .site-mobile-header-item .rspv-header-cart-drawer .woocommerce-mini-cart__buttons.buttons .button.checkout:hover { color: ' + color + ' !important; }'
                + '</style>'
            );
        });
    });
    // mobile header cart tray background color
    api('responsive_mobile_header_cart_tray_bg_color', function (setting) {
        setting.bind(function (color) {
            jQuery('style#responsive-mobile-header-cart-tray-bg-color').remove();
            const css = `
                .site-mobile-header-item .rspv-header-cart-drawer, .site-mobile-header-item .responsive-header-cart .woocommerce.widget_shopping_cart {
                    background-color: ${color} !important;
                }
            `;
            jQuery('head').append(`<style id="responsive-mobile-header-cart-tray-bg-color">${css}</style>`);
        });
    });
    // mobile header cart tray background hover color
    api('responsive_mobile_header_cart_tray_bg_hover_color', function (setting) {
        setting.bind(function (color) {
            jQuery('style#responsive-mobile-header-cart-tray-bg-hover-color').remove();
            const css = `
                .site-mobile-header-item .rspv-header-cart-drawer:hover, .site-mobile-header-item .responsive-header-cart .woocommerce.widget_shopping_cart:hover {
                    background-color: ${color} !important;
                }
                `;
            jQuery('head').append(`<style id="responsive-mobile-header-cart-tray-bg-hover-color">${css}</style>`);
        });
    });
    // mobile header cart tray separator color
    api('responsive_mobile_header_cart_tray_separator_color', function(setting){
        setting.bind(function(color){
            jQuery('style#responsive-mobile-header-cart-tray-separator-color').remove();
            const css = `
               .site-mobile-header-item .responsive-header-cart .woocommerce.widget_shopping_cart .woocommerce-mini-cart__total,
			    .site-mobile-header-item .woocommerce-js .rspv-header-cart-drawer .rspv-cart-drawer-content .woocommerce-mini-cart__total,
			    .site-mobile-header-item .woocommerce-js .rspv-header-cart-drawer .rspv-cart-drawer-header {
                    border-top-color: ${color} !important;
                    border-bottom-color: ${color} !important;
                }
                .site-mobile-header-item .responsive-header-cart .widget_shopping_cart .mini_cart_item,
                .site-mobile-header-item .rspv-header-cart-drawer .rspv-cart-drawer-content .widget_shopping_cart_content ul li {
                    border-bottom-color: ${color} !important;
                }
            `;
            jQuery('head').append(`<style id="responsive-mobile-header-cart-tray-separator-color">${css}</style>`);
        });
    });
    // mobile header cart tray links color
    api('responsive_mobile_header_cart_tray_link_color', function (setting) {
        setting.bind(function (color) {
            jQuery('style#responsive-mobile-header-cart-tray-link-color').remove();
            const css = `
                .site-mobile-header-item .rspv-header-cart-drawer .widget_shopping_cart_content a:not(.button), .site-mobile-header-item .responsive-header-cart .responsive-header-cart-data .widget_shopping_cart_content a:not(.button) {
                    color: ${color} !important;
                }
            `;
            jQuery('head').append(`<style id="responsive-mobile-header-cart-tray-link-color">${css}</style>`);
        });
    });
    // mobile header cart tray links hover color
    api('responsive_mobile_header_cart_tray_link_hover_color', function (setting) {
        setting.bind(function (color) {
            jQuery('style#responsive-mobile-header-cart-tray-link-hover-color').remove();
            const css = `
                .site-mobile-header-item .rspv-header-cart-drawer .widget_shopping_cart_content a:not(.button):hover, .site-mobile-header-item .responsive-header-cart .responsive-header-cart-data .widget_shopping_cart_content a:not(.button):hover {
                    color: ${color} !important;
                }
            `;
            jQuery('head').append(`<style id="responsive-mobile-header-cart-tray-link-hover-color">${css}</style>`);
        });
    });
    api( 'responsive_header_contact_info_icons_color', function(val){
        val.bind(function(newval){
            $( '.site-header-item .responsive-header-contact-info .responsive-header-contact-info-icons-types .responsive-header-contact-info-icons-list .responsive-header-contact-info-icon-container svg' ).css( 'fill', newval );
        });
    });
    api( 'responsive_mobile_header_contact_info_icons_color', function(val){
        val.bind(function(newval){
            $( '.site-mobile-header-item .responsive-header-contact-info .responsive-header-contact-info-icons-types .responsive-header-contact-info-icons-list .responsive-header-contact-info-icon-container svg' ).css( 'fill', newval );
        });
    });
    api('responsive_header_contact_info_icons_hover_color', function(val) {
        val.bind(function(newval) {
            $('.site-header-item .responsive-header-contact-info .responsive-header-contact-info-icons-types .responsive-header-contact-info-icons-list .responsive-header-contact-info-icon-container svg').off('mouseenter mouseleave');

            $('.site-header-item .responsive-header-contact-info .responsive-header-contact-info-icons-types .responsive-header-contact-info-icons-list .responsive-header-contact-info-icon-container svg').on('mouseenter', function() {
                $(this).css('fill', newval);
            }).on('mouseleave', function() {
                $(this).css('fill', '');
            });
        });
    });
    api('responsive_mobile_header_contact_info_icons_hover_color', function(val) {
        val.bind(function(newval) {
            $('.site-mobile-header-item .responsive-header-contact-info .responsive-header-contact-info-icons-types .responsive-header-contact-info-icons-list .responsive-header-contact-info-icon-container svg').off('mouseenter mouseleave');

            $('.site-mobile-header-item .responsive-header-contact-info .responsive-header-contact-info-icons-types .responsive-header-contact-info-icons-list .responsive-header-contact-info-icon-container svg').on('mouseenter', function() {
                $(this).css('fill', newval);
            }).on('mouseleave', function() {
                $(this).css('fill', '');
            });
        });
    });
    api( 'responsive_header_contact_info_background_color', function(val){
        val.bind(function(newval){
            let header_contact_info_icon_style = api('responsive_header_contact_info_icon_style').get() || 'filled';
            if ( 'filled' === header_contact_info_icon_style ) {
                $( '.site-header-item .responsive-header-contact-info .responsive-header-contact-info-icons-types .responsive-header-contact-info-icons-list .responsive-header-contact-info-icon-container' ).css( 'background-color', newval );
            } else {
                $( '.site-header-item .responsive-header-contact-info .responsive-header-contact-info-icons-types .responsive-header-contact-info-icons-list .responsive-header-contact-info-icon-container' ).css( 'border', '1px solid ' + newval );
            }
        });
    });
    api( 'responsive_mobile_header_contact_info_background_color', function(val){
        val.bind(function(newval){
            let header_contact_info_icon_style = api('responsive_mobile_header_contact_info_icon_style').get() || 'filled';
            if ( 'filled' === header_contact_info_icon_style ) {
                $( '.site-mobile-header-item .responsive-header-contact-info .responsive-header-contact-info-icons-types .responsive-header-contact-info-icons-list .responsive-header-contact-info-icon-container' ).css( 'background-color', newval );
            } else {
                $( '.site-mobile-header-item .responsive-header-contact-info .responsive-header-contact-info-icons-types .responsive-header-contact-info-icons-list .responsive-header-contact-info-icon-container' ).css( 'border', '1px solid ' + newval );
            }
        });
    });
    api( 'responsive_header_contact_info_background_hover_color', function(val){
        val.bind(function(newval){
            let header_contact_info_icon_style = api('responsive_header_contact_info_icon_style').get() || 'filled';
            if ( 'filled' === header_contact_info_icon_style ) {
                $('.site-header-item .responsive-header-contact-info .responsive-header-contact-info-icons-types .responsive-header-contact-info-icons-list .responsive-header-contact-info-icon-container').off('mouseenter mouseleave');

                $('.site-header-item .responsive-header-contact-info .responsive-header-contact-info-icons-types .responsive-header-contact-info-icons-list .responsive-header-contact-info-icon-container').on('mouseenter', function() {
                    $(this).css('background-color', newval);
                }).on('mouseleave', function() {
                    $(this).css('background-color', api('responsive_header_contact_info_background_color').get());
                });
            } else {
                $('.site-header-item .responsive-header-contact-info .responsive-header-contact-info-icons-types .responsive-header-contact-info-icons-list .responsive-header-contact-info-icon-container').off('mouseenter mouseleave');

                $('.site-header-item .responsive-header-contact-info .responsive-header-contact-info-icons-types .responsive-header-contact-info-icons-list .responsive-header-contact-info-icon-container').on('mouseenter', function() {
                    $(this).css( 'border', '1px solid ' + newval );
                }).on('mouseleave', function() {
                    $(this).css('border', '1px solid ' + api('responsive_header_contact_info_background_color').get());
                });
            }
        });
    });
    api( 'responsive_mobile_header_contact_info_background_hover_color', function(val){
        val.bind(function(newval){
            let header_contact_info_icon_style = api('responsive_mobile_header_contact_info_icon_style').get() || 'filled';
            if ( 'filled' === header_contact_info_icon_style ) {
                $('.site-mobile-header-item .responsive-header-contact-info .responsive-header-contact-info-icons-types .responsive-header-contact-info-icons-list .responsive-header-contact-info-icon-container').off('mouseenter mouseleave');

                $('.site-mobile-header-item .responsive-header-contact-info .responsive-header-contact-info-icons-types .responsive-header-contact-info-icons-list .responsive-header-contact-info-icon-container').on('mouseenter', function() {
                    $(this).css('background-color', newval);
                }).on('mouseleave', function() {
                    $(this).css('background-color', api('responsive_mobile_header_contact_info_background_color').get());
                });
            } else {
                $('.site-mobile-header-item .responsive-header-contact-info .responsive-header-contact-info-icons-types .responsive-header-contact-info-icons-list .responsive-header-contact-info-icon-container').off('mouseenter mouseleave');

                $('.site-mobile-header-item .responsive-header-contact-info .responsive-header-contact-info-icons-types .responsive-header-contact-info-icons-list .responsive-header-contact-info-icon-container').on('mouseenter', function() {
                    $(this).css( 'border', '1px solid ' + newval );
                }).on('mouseleave', function() {
                    $(this).css('border', '1px solid ' + api('responsive_mobile_header_contact_info_background_color').get());
                });
            }
        });
    });
    api( 'responsive_header_contact_info_font_color', function(val){
        val.bind(function(newval){
            $('.site-header-item .responsive-header-contact-info .responsive-header-contact-info-icons-types .responsive-header-contact-info-icons-list  .responsive-header-contact-info-contact-info .responsive-header-contact-info-contact-title, .site-header-item .responsive-header-contact-info .responsive-header-contact-info-icons-types .responsive-header-contact-info-icons-list .responsive-header-contact-info-contact-info .responsive-header-contact-info-contact-text, .site-header-item .responsive-header-contact-info .responsive-header-contact-info-icons-types .responsive-header-contact-info-icons-list .responsive-header-contact-info-contact-info .responsive-header-contact-info-contact-text .responsive-header-contact-info-contact-link').css('color', newval);
        });
    });
    api( 'responsive_mobile_header_contact_info_font_color', function(val){
        val.bind(function(newval){
            $('.site-mobile-header-item .responsive-header-contact-info .responsive-header-contact-info-icons-types .responsive-header-contact-info-icons-list  .responsive-header-contact-info-contact-info .responsive-header-contact-info-contact-title, .site-mobile-header-item .responsive-header-contact-info .responsive-header-contact-info-icons-types .responsive-header-contact-info-icons-list .responsive-header-contact-info-contact-info .responsive-header-contact-info-contact-text, .site-mobile-header-item .responsive-header-contact-info .responsive-header-contact-info-icons-types .responsive-header-contact-info-icons-list .responsive-header-contact-info-contact-info .responsive-header-contact-info-contact-text .responsive-header-contact-info-contact-link').css('color', newval);
        });
    });
    api( 'responsive_header_contact_info_font_hover_color', function(val){
        val.bind(function(newval){
            $('.site-header-item .responsive-header-contact-info .responsive-header-contact-info-icons-types .responsive-header-contact-info-icons-list  .responsive-header-contact-info-contact-info .responsive-header-contact-info-contact-title, .site-header-item .responsive-header-contact-info .responsive-header-contact-info-icons-types .responsive-header-contact-info-icons-list .responsive-header-contact-info-contact-info .responsive-header-contact-info-contact-text, .site-header-item .responsive-header-contact-info .responsive-header-contact-info-icons-types .responsive-header-contact-info-icons-list .responsive-header-contact-info-contact-info .responsive-header-contact-info-contact-text .responsive-header-contact-info-contact-link').off('mouseenter mouseleave');

            $('.site-header-item .responsive-header-contact-info .responsive-header-contact-info-icons-types .responsive-header-contact-info-icons-list  .responsive-header-contact-info-contact-info .responsive-header-contact-info-contact-title, .site-header-item .responsive-header-contact-info .responsive-header-contact-info-icons-types .responsive-header-contact-info-icons-list .responsive-header-contact-info-contact-info .responsive-header-contact-info-contact-text, .site-header-item .responsive-header-contact-info .responsive-header-contact-info-icons-types .responsive-header-contact-info-icons-list .responsive-header-contact-info-contact-info .responsive-header-contact-info-contact-text .responsive-header-contact-info-contact-link').on('mouseenter', function() {
                $(this).css('color', newval);
            }).on('mouseleave', function() {
                $(this).css('color', api('responsive_header_contact_info_font_color').get());
            });
        });
    });
    api( 'responsive_mobile_header_contact_info_font_hover_color', function(val){
        val.bind(function(newval){
            $('.site-mobile-header-item .responsive-header-contact-info .responsive-header-contact-info-icons-types .responsive-header-contact-info-icons-list  .responsive-header-contact-info-contact-info .responsive-header-contact-info-contact-title, .site-mobile-header-item .responsive-header-contact-info .responsive-header-contact-info-icons-types .responsive-header-contact-info-icons-list .responsive-header-contact-info-contact-info .responsive-header-contact-info-contact-text, .site-mobile-header-item .responsive-header-contact-info .responsive-header-contact-info-icons-types .responsive-header-contact-info-icons-list .responsive-header-contact-info-contact-info .responsive-header-contact-info-contact-text .responsive-header-contact-info-contact-link').off('mouseenter mouseleave');

            $('.site-mobile-header-item .responsive-header-contact-info .responsive-header-contact-info-icons-types .responsive-header-contact-info-icons-list  .responsive-header-contact-info-contact-info .responsive-header-contact-info-contact-title, .site-mobile-header-item .responsive-header-contact-info .responsive-header-contact-info-icons-types .responsive-header-contact-info-icons-list .responsive-header-contact-info-contact-info .responsive-header-contact-info-contact-text, .site-mobile-header-item .responsive-header-contact-info .responsive-header-contact-info-icons-types .responsive-header-contact-info-icons-list .responsive-header-contact-info-contact-info .responsive-header-contact-info-contact-text .responsive-header-contact-info-contact-link').on('mouseenter', function() {
                $(this).css('color', newval);
            }).on('mouseleave', function() {
                $(this).css('color', api('responsive_mobile_header_contact_info_font_color').get());
            });
        });
    });

    // Header Search Color.
    api( 'responsive_header_search_color', function(setting){
        setting.bind(function(color){
            jQuery('style#responsive-header-search-color').remove();
            jQuery('head').append(
                '<style id="responsive-header-search-color">'
                + '.responsive-header-search-icon-wrap { color: ' + color + '!important; }'
                + '</style>'
            );
        });
    });
    // Header Search Hover Color.
    api( 'responsive_header_search_hover_color', function(setting){
        setting.bind(function(color){
            jQuery('style#responsive-header-search-hover-color').remove();
            jQuery('head').append(
                '<style id="responsive-header-search-hover-color">'
                + '.responsive-header-search-icon-wrap:hover { color: ' + color + '!important; }'
                + '</style>'
            );
        });
    });
    // Header Search Background Color.
    api( 'responsive_header_search_background_color', function(setting){
        setting.bind(function(color){
            jQuery('style#responsive-header-search-background-color').remove();
            jQuery('head').append(
                '<style id="responsive-header-search-background-color">'
                + '.responsive-header-search-icon-wrap, .responsive-header-search input[type=search] { background: ' + color + '!important; }'
                + '</style>'
            );
        });
    });
    // Header Search Background Hover Color.
    api( 'responsive_header_search_background_hover_color', function(setting){
        setting.bind(function(color){
            jQuery('style#responsive-header-search-background-hover-color').remove();
            jQuery('head').append(
                '<style id="responsive-header-search-background-hover-color">'
                + '.responsive-header-search-icon-wrap:hover, .responsive-header-search-icon-wrap:hover input[type=search] { background: ' + color + '!important; }'
                + '</style>'
            );
        });
    });
    // Header Search Text Color.
    api( 'responsive_header_search_text_color', function(setting){
        setting.bind(function(color){
            jQuery('style#responsive-header-search-text-color').remove();
            jQuery('head').append(
                '<style id="responsive-header-search-text-color">'
                + '.full-screen .site-header-item .full-screen-search-wrapper .full-screen-search-container #searchform .res-search-wrapper input[type=search], .full-screen .site-header-item .full-screen-search-wrapper .full-screen-search-container #searchform .res-search-wrapper input::placeholder,.full-screen .site-header-item .full-screen-search-wrapper .full-screen-search-container #searchform .res-search-wrapper,.full-screen .site-header-item .full-screen-search-wrapper .search-close,.full-screen .site-header-item .full-screen-search-wrapper #search-close { color: ' + color + '!important; }'
                + '</style>'
            );
        });
    });
    // Header Search Text Hover Color.
    api( 'responsive_header_search_text_hover_color', function(setting){
        setting.bind(function(color){
            jQuery('style#responsive-header-search-text-hover-color').remove();
            jQuery('head').append(
                '<style id="responsive-header-search-text-hover-color">'
                + '.full-screen .site-header-item .full-screen-search-wrapper .full-screen-search-container #searchform .res-search-wrapper input[type=search]:hover,.full-screen .site-header-item .full-screen-search-wrapper .full-screen-search-container #searchform .res-search-wrapper input:hover::placeholder,.full-screen .site-header-item .full-screen-search-wrapper .full-screen-search-container #searchform .res-search-wrapper:hover,.full-screen .site-header-item .full-screen-search-wrapper .search-close:hover,.full-screen .site-header-item .full-screen-search-wrapper #search-close:hover { color: ' + color + '!important; }'
                + '</style>'
            );
        });
    });
    // Header Search Modal Background.
    api('responsive_header_search_modal_background_color', function(setting) {
        setting.bind(function(color) {
            jQuery('style#responsive-header-search-modal-background-color').remove();
            jQuery('head').append(
                '<style id="responsive-header-search-modal-background-color">'
                + '.full-screen .site-header-item .full-screen-search-wrapper { background: ' + color + '; }'
                + '</style>'
            );
        });
    });
    // Header Search Modal Background Tablet.
    api('responsive_header_search_modal_background_color_tablet', function(setting) {
        setting.bind(function(color) {
            jQuery('style#responsive-header-search-modal-background-color-tablet').remove();
            jQuery('head').append(
                '<style id="responsive-header-search-modal-background-color-tablet">'
                + '@media screen and (max-width: 992px) {'
                + '.full-screen .site-header-item .full-screen-search-wrapper { background: ' + color + ' !important; }'
                + '} </style>'
            );
        });
    });
    // Header Search Modal Background Mobile.
    api('responsive_header_search_modal_background_color_mobile', function(setting) {
        setting.bind(function(color) {
            jQuery('style#responsive-header-search-modal-background-color-mobile').remove();
            jQuery('head').append(
                '<style id="responsive-header-search-modal-background-color-mobile">'
                + '@media screen and (max-width: 576px) {'
                + '.full-screen .site-header-item .full-screen-search-wrapper { background: ' + color + ' !important; }'
                + '} </style>'
            );
        });
    });
    // HTML Element Link Color.
    api( 'responsive_header_html_link_color', function(val){
        val.bind(function(newval){
            $( '.site-header .responsive-header-html .responsive-header-html-inner a' ).css( 'color', newval );
        });
    });
    api('responsive_header_html_link_hover_color', function(val) {
        val.bind(function(newval) {
            $('.site-header .responsive-header-html .responsive-header-html-inner a').off('mouseenter mouseleave');

            $('.site-header .responsive-header-html .responsive-header-html-inner a').on('mouseenter', function() {
                $(this).css('color', newval);
            }).on('mouseleave', function() {
                $(this).css('color', api('responsive_header_html_link_color').get());
            });
        });
    });

    // Mobile Header HTML Element Link Color.
    api( 'responsive_mobile_header_html_link_color', function(val){
        val.bind(function(newval){
            $( '.site-header-mobile .responsive-mobile-header-html .responsive-mobile-header-html-inner a' ).css( 'color', newval );
        });
    });
    api('responsive_mobile_header_html_link_hover_color', function(val) {
        val.bind(function(newval) {
            $('.site-header-mobile .responsive-mobile-header-html .responsive-mobile-header-html-inner a').off('mouseenter mouseleave');

            $('.site-header-mobile .responsive-mobile-header-html .responsive-mobile-header-html-inner a').on('mouseenter', function() {
                $(this).css('color', newval);
            }).on('mouseleave', function() {
                $(this).css('color', api('responsive_mobile_header_html_link_color').get());
            });
        });
    });

    // Cache the <head> element
    const $head = $( 'head' );
    // Define the style properties we want to bind for each footer widget
    const footerWidgetsStyleTypes = [
        {
            key: '_title_color',       // Setting suffix
            idSuffix: '-title-color',  // <style> tag ID suffix
            property: 'color',         // CSS property
            // Function to generate the correct CSS selector
            getSelector: ( i ) => [
                `.footer-widget-area[data-section="responsive-footer-widget-${i}"] h1`,
                `.footer-widget-area[data-section="responsive-footer-widget-${i}"] h2`,
                `.footer-widget-area[data-section="responsive-footer-widget-${i}"] h3`,
                `.footer-widget-area[data-section="responsive-footer-widget-${i}"] h4`,
                `.footer-widget-area[data-section="responsive-footer-widget-${i}"] h5`,
                `.footer-widget-area[data-section="responsive-footer-widget-${i}"] h6`
            ].join( ', ' )
        },
        {
            key: '_content_color',
            idSuffix: '-content-color',
            property: 'color',
            getSelector: ( i ) => `.footer-widget-area[data-section="responsive-footer-widget-${i}"].footer-widget-${i}`
        },
        {
            key: '_link_color',
            idSuffix: '-link-color',
            property: 'color',
            getSelector: ( i ) => `.footer-widget-area[data-section="responsive-footer-widget-${i}"].footer-widget-${i} a`
        },
        {
            key: '_link_hover_color',
            idSuffix: '-link-hover-color',
            property: 'color',
            getSelector: ( i ) => `.footer-widget-area[data-section="responsive-footer-widget-${i}"].footer-widget-${i} a:hover`
        }
    ];

    // --- Single Loop for all Footer Widgets ---
    for ( let i = 1; i <= 6; i++ ) {

        // Loop over each style type (title, content, etc.) for the current widget
        footerWidgetsStyleTypes.forEach( function( type ) {

            const breakpoints = {
                desktop: {
                    query: '@media (min-width: 993px)',
                    suffix: ''
                },
                tablet: {
                    query: '@media (min-width: 577px) and (max-width: 992px)',
                    suffix: '-tablet'
                },
                mobile: {
                    query: '@media (max-width: 576px)',
                    suffix: '-mobile'
                }
            };

            Object.entries(breakpoints).forEach(([device, bp]) => {

                const settingId = device === 'desktop' ? `responsive_footer_widget${i}${type.key}` : `responsive_footer_widget${i}${type.key}_${device}`;
                const styleTagId = `responsive-footer-widget${i}${type.idSuffix}${bp.suffix}`;

                api(settingId, function(setting) {
                    setting.bind(function(newValue) {
                        
                        const selector = type.getSelector(i);
                        const cssRule = `${bp.query} { ${selector} { ${type.property}: ${newValue} !important; } }`;

                        let $styleTag = jQuery(`style#${styleTagId}`);

                        if ($styleTag.length) {
                            $styleTag.html(cssRule);
                        } else {
                            $head.append(`<style id="${styleTagId}">${cssRule}</style>`);
                        }
                    });
                });

            });
            
        });
    }
    // For Mobile Toggle Button Icon Color
    wp.customize('responsive_header_toggle_button_icon_color', function (val) {
        // Apply initial value on load
        var initialValue = val.get();
        if (initialValue) {
            jQuery('.menu-toggle svg')
                .children(':not(:first-child)')
                .css('fill', initialValue);
            jQuery('.hamburger-menu-label')
                .css('color', initialValue);
        }
        
        // Apply on value change
        val.bind(function (newval) {
            // Target all children EXCEPT the first (rect/circle/path/etc.)
            jQuery('.menu-toggle svg')
                .children(':not(:first-child)')
                .css('fill', newval);

            // Apply same color to menu label
            jQuery(".hamburger-menu-label,.site-header-item .menu-toggle[aria-expanded='true'],#masthead-mobile .responsive-off-canvas-panel-close")
                .css('color', newval);
        });
    });

    // Off-Canvas Menu Link Default Color
    api('responsive_header_off_canvas_menu_link_default_color', function(value) {
        value.bind(function(newval) {
            $('.off-canvas-widget-area #off-canvas-menu li a, #off-canvas-site-navigation .menu li a').css('color', newval);
        });
    });

    // Off-Canvas Menu Link Hover Color
    api('responsive_header_off_canvas_menu_link_hover_color', function(value) {
        value.bind(function(newval) {
            jQuery('style#responsive-off-canvas-menu-link-hover-color').remove();
            jQuery('head').append(
                '<style id="responsive-off-canvas-menu-link-hover-color">' +
                '.off-canvas-widget-area #off-canvas-menu li a:hover, #off-canvas-site-navigation .menu li a:hover { color: ' + newval + ' !important; }' +
                '</style>'
            );
        });
    });

    // Off-Canvas Menu Link Active Color
    api('responsive_header_off_canvas_menu_link_active_color', function(value) {
        value.bind(function(newval) {
            $('.off-canvas-widget-area #off-canvas-menu li.current-menu-item > a, .off-canvas-widget-area #off-canvas-menu li.current_page_item > a, #off-canvas-site-navigation .menu li > a').css('color', newval);
        });
    });

    // Off-Canvas Menu Background Default Color
    api('responsive_header_off_canvas_menu_bg_default_color', function(value) {
        value.bind(function(newval) {
            $('.off-canvas-widget-area #off-canvas-menu li, #off-canvas-site-navigation .menu li, .off-canvas-widget-area #off-canvas-menu li a,#off-canvas-site-navigation .menu li a').css('background-color', newval);
        });
    });

    // Off-Canvas Menu Background Hover Color
    api('responsive_header_off_canvas_menu_bg_hover_color', function(value) {
        value.bind(function(newval) {
            jQuery('style#responsive-off-canvas-menu-bg-hover-color').remove();
            jQuery('head').append(
                '<style id="responsive-off-canvas-menu-bg-hover-color">' +
                '.off-canvas-widget-area #off-canvas-menu li a:hover, #off-canvas-site-navigation .menu li a:hover { background-color: ' + newval + ' !important; }' +
                '</style>'
            );
        });
    });

    // Off-Canvas Menu Background Active Color
    api('responsive_header_off_canvas_menu_bg_active_color', function(value) {
        value.bind(function(newval) {
            $('.off-canvas-widget-area #off-canvas-menu li.current-menu-item > a, .off-canvas-widget-area #off-canvas-menu li.current_page_item > a, #off-canvas-site-navigation .menu li.current_page_item > a').css('background-color', newval);
        });
    });

} )( jQuery );
