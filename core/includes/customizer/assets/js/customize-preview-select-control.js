/**
 * This file makes customizer preview of responsive_select_control faster
 */
// phpcs:ignoreFile
( function( $ ) {
    var api = wp.customize;

    // Theme Options -> Layout
    //Width
    api( 'responsive_width', function( $swipe ) {
            $swipe.bind(
                function( newval ) {
                    jQuery( 'body' ).removeClass( 'responsive-site-contained');
                    jQuery( 'body' ).removeClass( 'responsive-site-full-width');
                    jQuery( 'body' ).addClass( 'responsive-site-'+ newval );
                    if ( newval === 'contained' && $(window).width() > 768 ) {
                        jQuery( '.floatingb-container' ).css( 'width', '1140px' );
                    } else {
                        jQuery( '.floatingb-container' ).css( 'width', '100%' );
                    }
                }
            );
        }
    );

    // Theme Options -> Layout
    //Style
    api( 'responsive_style', function( $swipe ) {
            $swipe.bind(
                function( newval ) {
                    // remove class regex expression function
                    $.fn.removeClassRegEx = function(regex) {
                        var classes = $(this).attr('class');
                        if (!classes || !regex) return false;
                        var classArray = [];
                        classes = classes.split(' ');
                        for (var i = 0, len = classes.length; i < len; i++)
                            if (!classes[i].match(regex)) classArray.push(classes[i]);
                        $(this).attr('class', classArray.join(' '));
                    };

                    $('body').removeClassRegEx('responsive-site-style-');
                    jQuery( 'body' ).addClass( 'responsive-site-style-'+ newval );
                }
            );
        }
    );

    // Header -> Layout
    //Header Layout
    api( 'responsive_header_layout', function( $swipe ) {
            $swipe.bind(
                function( newval ) {
                    // remove class regex expression function
                    $.fn.removeClassRegEx = function(regex) {
                        var classes = $(this).attr('class');
                        if (!classes || !regex) return false;
                        var classArray = [];
                        classes = classes.split(' ');
                        for (var i = 0, len = classes.length; i < len; i++)
                            if (!classes[i].match(regex)) classArray.push(classes[i]);
                        $(this).attr('class', classArray.join(' '));
                    };

                    $('body').removeClassRegEx('site-header-layout-');
                    jQuery( 'body' ).addClass( 'site-header-layout-'+ newval );
                }
            );
        }
    );


    // Header -> Layout
    //Header Layout
    api( 'responsive_mobile_header_layout', function( $swipe ) {
            $swipe.bind(
                function( newval ) {
                    // remove class regex expression function
                    $.fn.removeClassRegEx = function(regex) {
                        var classes = $(this).attr('class');
                        if (!classes || !regex) return false;
                        var classArray = [];
                        classes = classes.split(' ');
                        for (var i = 0, len = classes.length; i < len; i++)
                            if (!classes[i].match(regex)) classArray.push(classes[i]);
                        $(this).attr('class', classArray.join(' '));
                    };

                    $('body').removeClassRegEx('site-mobile-header-layout-');
                    jQuery( 'body' ).addClass( 'site-mobile-header-layout-'+ newval );
                }
            );
        }
    );

    // Header -> Layout
    //Header Alignment
    api( 'responsive_header_alignment', function( $swipe ) {
            $swipe.bind(
                function( newval ) {
                    // remove class regex expression function
                    $.fn.removeClassRegEx = function(regex) {
                        var classes = $(this).attr('class');
                        if (!classes || !regex) return false;
                        var classArray = [];
                        classes = classes.split(' ');
                        for (var i = 0, len = classes.length; i < len; i++)
                            if (!classes[i].match(regex)) classArray.push(classes[i]);
                        $(this).attr('class', classArray.join(' '));
                    };

                    $('body').removeClassRegEx('site-header-alignment-');
                    jQuery( 'body' ).addClass( 'site-header-alignment-'+ newval );
                }
            );
        }
    );


    // Header -> Layout
    //Header Alignment
    api( 'responsive_mobile_header_alignment', function( $swipe ) {
            $swipe.bind(
                function( newval ) {
                    // remove class regex expression function
                    $.fn.removeClassRegEx = function(regex) {
                        var classes = $(this).attr('class');
                        if (!classes || !regex) return false;
                        var classArray = [];
                        classes = classes.split(' ');
                        for (var i = 0, len = classes.length; i < len; i++)
                            if (!classes[i].match(regex)) classArray.push(classes[i]);
                        $(this).attr('class', classArray.join(' '));
                    };

                    $('body').removeClassRegEx('site-mobile-header-alignment-');
                    jQuery( 'body' ).addClass( 'site-mobile-header-alignment-'+ newval );
                }
            );
        }
    );

    // Header -> Layout
    //Header Widgets Position
    api( 'responsive_header_widget_position', function( $swipe ) {
            $swipe.bind(
                function( newval ) {
                    // remove class regex expression function
                    $.fn.removeClassRegEx = function(regex) {
                        var classes = $(this).attr('class');
                        if (!classes || !regex) return false;
                        var classArray = [];
                        classes = classes.split(' ');
                        for (var i = 0, len = classes.length; i < len; i++)
                            if (!classes[i].match(regex)) classArray.push(classes[i]);
                        $(this).attr('class', classArray.join(' '));
                    };

                    $('body').removeClassRegEx('header-widget-position-');
                    jQuery( 'body' ).addClass( 'header-widget-position-'+ newval );
                }
            );
        }
    );

    // Header -> Layout
    //Header Widgets Alignment
    api( 'responsive_header_widget_alignment', function( $swipe ) {
            $swipe.bind(
                function( newval ) {
                    // remove class regex expression function
                    $.fn.removeClassRegEx = function(regex) {
                        var classes = $(this).attr('class');
                        if (!classes || !regex) return false;
                        var classArray = [];
                        classes = classes.split(' ');
                        for (var i = 0, len = classes.length; i < len; i++)
                            if (!classes[i].match(regex)) classArray.push(classes[i]);
                        $(this).attr('class', classArray.join(' '));
                    };

                    $('body').removeClassRegEx('header-widget-alignment-');
                    jQuery( 'body' ).addClass( 'header-widget-alignment-'+ newval );
                }
            );
        }
    );

    // Footer -> Layout
    //Footer Bar Layout
    api( 'responsive_footer_bar_layout', function( $swipe ) {
            $swipe.bind(
                function( newval ) {
                    // remove class regex expression function
                    $.fn.removeClassRegEx = function(regex) {
                        var classes = $(this).attr('class');
                        if (!classes || !regex) return false;
                        var classArray = [];
                        classes = classes.split(' ');
                        for (var i = 0, len = classes.length; i < len; i++)
                            if (!classes[i].match(regex)) classArray.push(classes[i]);
                        $(this).attr('class', classArray.join(' '));
                    };

                    $('body').removeClassRegEx('footer-bar-layout-');
                    jQuery( 'body' ).addClass( 'footer-bar-layout-'+ newval );
                }
            );
        }
    );

    // Content hEader -> Layout
    // Alignment
    api( 'responsive_content_header_alignment', function( $swipe ) {
            $swipe.bind(
                function( newval ) {
                    // remove class regex expression function
                    $.fn.removeClassRegEx = function(regex) {
                        var classes = $(this).attr('class');
                        if (!classes || !regex) return false;
                        var classArray = [];
                        classes = classes.split(' ');
                        for (var i = 0, len = classes.length; i < len; i++)
                            if (!classes[i].match(regex)) classArray.push(classes[i]);
                        $(this).attr('class', classArray.join(' '));
                    };

                    $('body').removeClassRegEx('site-content-header-alignment-');
                    jQuery( 'body' ).addClass( 'site-content-header-alignment-'+ newval );
                }
            );
        }
    );

    //Blog -> Content
    // Entry Featured Image  -> style
    api( 'responsive_blog_entry_featured_image_style', function( $swipe ) {
        var box_padding_left = api( 'responsive_box_left_padding' );
        var box_padding_right = api( 'responsive_box_right_padding' );
        var box_padding_top = api( 'responsive_box_top_padding' );

        var box_tablet_padding_left = api( 'responsive_box_tablet_left_padding' );
        var box_tablet_padding_right = api( 'responsive_box_tablet_right_padding' );
        var box_tablet_padding_top = api( 'responsive_box_tablet_top_padding' );

        var box_mobile_padding_left = api( 'responsive_box_mobile_left_padding' );
        var box_mobile_padding_right = api( 'responsive_box_mobile_right_padding' );
        var box_mobile_padding_top = api( 'responsive_box_mobile_top_padding' );
            $swipe.bind( function( newval ) {
                if('stretched' === newval ) {
                    $('.search .thumbnail-caption,.archive .thumbnail-caption,.blog .thumbnail-caption').css('text-align', 'center');
                    $('.search.responsive-site-style-boxed .site-content article.product .post-entry .thumbnail,.search.responsive-site-style-content-boxed .hentry .thumbnail,.search.responsive-site-style-boxed .hentry .thumbnail,.archive.responsive-site-style-content-boxed .hentry .thumbnail,.archive.responsive-site-style-boxed .hentry .thumbnail,.blog.responsive-site-style-content-boxed .hentry .thumbnail,.blog.responsive-site-style-boxed .hentry .thumbnail').css({'margin-left': '-' + box_padding_left + 'px', 'margin-right': '-' + box_padding_right + 'px'});
                    $('.search.responsive-site-style-boxed article.product .post-entry > .thumbnail:first-child,.search.responsive-site-style-boxed .hentry .post-entry > .thumbnail:first-child,.search.responsive-site-style-content-boxed .hentry .post-entry > .thumbnail:first-child,.archive.responsive-site-style-boxed .hentry .post-entry > .thumbnail:first-child,.archive.responsive-site-style-content-boxed .hentry .post-entry > .thumbnail:first-child,.blog.responsive-site-style-boxed .hentry .post-entry > .thumbnail:first-child,.blog.responsive-site-style-content-boxed .hentry .post-entry > .thumbnail:first-child').css('margin-top', '-' + box_padding_top + 'px');

                    function isTablet(x) {
                        if (x.matches) { // If media query matches
                            $('.search.responsive-site-style-boxed .site-content article.product .post-entry .thumbnail,.search.responsive-site-style-content-boxed .hentry .thumbnail,.search.responsive-site-style-boxed .hentry .thumbnail,.archive.responsive-site-style-content-boxed .hentry .thumbnail,.archive.responsive-site-style-boxed .hentry .thumbnail,.blog.responsive-site-style-content-boxed .hentry .thumbnail,.blog.responsive-site-style-boxed .hentry .thumbnail').css( {'margin-left': '-' + box_tablet_padding_left + 'px', 'margin-right': '-' + box_tablet_padding_right + 'px'} );
                            $('.search.responsive-site-style-boxed article.product .post-entry > .thumbnail:first-child,.search.responsive-site-style-boxed .hentry .post-entry > .thumbnail:first-child,.search.responsive-site-style-content-boxed .hentry .post-entry > .thumbnail:first-child,.archive.responsive-site-style-boxed .hentry .post-entry > .thumbnail:first-child,.archive.responsive-site-style-content-boxed .hentry .post-entry > .thumbnail:first-child,.blog.responsive-site-style-boxed .hentry .post-entry > .thumbnail:first-child,.blog.responsive-site-style-content-boxed .hentry .post-entry > .thumbnail:first-child').css('margin-top', '-' + box_tablet_padding_top + 'px')
                        }
                    }
                    var x = window.matchMedia("(max-width: 992px)")
                    isTablet(x) // Call listener function at run time
                    x.addListener(isTablet)

                    function isMobile(x) {
                        if (x.matches) { // If media query matches
                            $('.search.responsive-site-style-boxed .site-content article.product .post-entry .thumbnail,.search.responsive-site-style-content-boxed .hentry .thumbnail,.search.responsive-site-style-boxed .hentry .thumbnail,.archive.responsive-site-style-content-boxed .hentry .thumbnail,.archive.responsive-site-style-boxed .hentry .thumbnail,.blog.responsive-site-style-content-boxed .hentry .thumbnail,.blog.responsive-site-style-boxed .hentry .thumbnail').css( {'margin-left': '-' + box_mobile_padding_left + 'px', 'margin-right': '-' + box_mobile_padding_right + 'px'} );
                            $('.search.responsive-site-style-boxed article.product .post-entry > .thumbnail:first-child,.search.responsive-site-style-boxed .hentry .post-entry > .thumbnail:first-child,.search.responsive-site-style-content-boxed .hentry .post-entry > .thumbnail:first-child,.archive.responsive-site-style-boxed .hentry .post-entry > .thumbnail:first-child,.archive.responsive-site-style-content-boxed .hentry .post-entry > .thumbnail:first-child,.blog.responsive-site-style-boxed .hentry .post-entry > .thumbnail:first-child,.blog.responsive-site-style-content-boxed .hentry .post-entry > .thumbnail:first-child').css('margin-top', '-' + box_mobile_padding_top + 'px')
                        }
                    }
                    var x = window.matchMedia("(max-width: 576px)")
                    isMobile(x) // Call listener function at run time
                    x.addListener(isMobile)

                }
            } );
        }
    );

    // Blog -> Content
    // Entry Featured Image Alignment


    //Blog Post -> Content
    // Post Featured Image  -> style
    api( 'responsive_single_blog_featured_image_style', function( $swipe ) {
        var box_padding_left = api( 'responsive_box_left_padding' );
        var box_padding_right = api( 'responsive_box_right_padding' );
        var box_padding_top = api( 'responsive_box_top_padding' );

        var box_tablet_padding_left = api( 'responsive_box_tablet_left_padding' );
        var box_tablet_padding_right = api( 'responsive_box_tablet_right_padding' );
        var box_tablet_padding_top = api( 'responsive_box_tablet_top_padding' );

        var box_mobile_padding_left = api( 'responsive_box_mobile_left_padding' );
        var box_mobile_padding_right = api( 'responsive_box_mobile_right_padding' );
        var box_mobile_padding_top = api( 'responsive_box_mobile_top_padding' );
            $swipe.bind( function( newval ) {
                if('stretched' === newval ) {
                    $('.single .thumbnail-caption').css('text-align', 'center');
                    $('.single.responsive-site-style-content-boxed .hentry .thumbnail,.single.responsive-site-style-boxed .hentry .thumbnail').css({'margin-left': '-' + box_padding_left + 'px', 'margin-right': '-' + box_padding_right + 'px'});
                    $('.single.responsive-site-style-boxed .hentry .post-entry > .thumbnail:first-child,.single.responsive-site-style-content-boxed .hentry .post-entry > .thumbnail:first-child').css('margin-top', '-' + box_padding_top + 'px');

                    function isTablet(x) {
                        if (x.matches) { // If media query matches
                            $('.single.responsive-site-style-content-boxed .hentry .thumbnail,\t.single.responsive-site-style-boxed .hentry .thumbnail').css( {'margin-left': '-' + box_tablet_padding_left + 'px', 'margin-right': '-' + box_tablet_padding_right + 'px'} );
                            $('.single.responsive-site-style-boxed .hentry .post-entry > .thumbnail:first-child,.single.responsive-site-style-content-boxed .hentry .post-entry > .thumbnail:first-child').css('margin-top', '-' + box_tablet_padding_top + 'px')
                        }
                    }
                    var x = window.matchMedia("(max-width: 992px)")
                    isTablet(x) // Call listener function at run time
                    x.addListener(isTablet)

                    function isMobile(x) {
                        if (x.matches) { // If media query matches
                            $('.single.responsive-site-style-content-boxed .hentry .thumbnail,.single.responsive-site-style-boxed .hentry .thumbnail').css( {'margin-left': '-' + box_mobile_padding_left + 'px', 'margin-right': '-' + box_mobile_padding_right + 'px'} );
                            $('.single.responsive-site-style-boxed .hentry .post-entry > .thumbnail:first-child,.single.responsive-site-style-content-boxed .hentry .post-entry > .thumbnail:first-child').css('margin-top', '-' + box_mobile_padding_top + 'px')
                        }
                    }
                    var x = window.matchMedia("(max-width: 576px)")
                    isMobile(x) // Call listener function at run time
                    x.addListener(isMobile)

                }
            } );
        }
    );

    //Page -> Content
    // Page Featured Image  -> style
    api( 'responsive_page_featured_image_style', function( $swipe ) {
        var box_padding_left = api( 'responsive_box_left_padding' );
        var box_padding_right = api( 'responsive_box_right_padding' );
        var box_padding_top = api( 'responsive_box_top_padding' );

        var box_tablet_padding_left = api( 'responsive_box_tablet_left_padding' );
        var box_tablet_padding_right = api( 'responsive_box_tablet_right_padding' );
        var box_tablet_padding_top = api( 'responsive_box_tablet_top_padding' );

        var box_mobile_padding_left = api( 'responsive_box_mobile_left_padding' );
        var box_mobile_padding_right = api( 'responsive_box_mobile_right_padding' );
        var box_mobile_padding_top = api( 'responsive_box_mobile_top_padding' );
            $swipe.bind( function( newval ) {
                if('stretched' === newval ) {
                    $('.page .thumbnail-caption').css('text-align', 'center');
                    $('.page.responsive-site-style-content-boxed .hentry .thumbnail,.page.responsive-site-style-boxed .hentry .thumbnail').css({'margin-left': '-' + box_padding_left + 'px', 'margin-right': '-' + box_padding_right + 'px'});
                    $('.page.responsive-site-style-boxed .hentry .post-entry > .thumbnail:first-child,.page.responsive-site-style-content-boxed .hentry .post-entry > .thumbnail:first-child ').css('margin-top', '-' + box_padding_top + 'px');

                    function isTablet(x) {
                        if (x.matches) { // If media query matches
                            $('.page.responsive-site-style-content-boxed .hentry .thumbnail,.page.responsive-site-style-boxed .hentry .thumbnail').css( {'margin-left': '-' + box_tablet_padding_left + 'px', 'margin-right': '-' + box_tablet_padding_right + 'px'} );
                            $('.page.responsive-site-style-boxed .hentry .post-entry > .thumbnail:first-child,.page.responsive-site-style-content-boxed .hentry .post-entry > .thumbnail:first-child').css('margin-top', '-' + box_tablet_padding_top + 'px')
                        }
                    }
                    var x = window.matchMedia("(max-width: 992px)")
                    isTablet(x) // Call listener function at run time
                    x.addListener(isTablet)

                    function isMobile(x) {
                        if (x.matches) { // If media query matches
                            $('.page.responsive-site-style-content-boxed .hentry .thumbnail,.page.responsive-site-style-boxed .hentry .thumbnail').css( {'margin-left': '-' + box_mobile_padding_left + 'px', 'margin-right': '-' + box_mobile_padding_right + 'px'} );
                            $('.page.responsive-site-style-boxed .hentry .post-entry > .thumbnail:first-child,.page.responsive-site-style-content-boxed .hentry .post-entry > .thumbnail:first-child').css('margin-top', '-' + box_mobile_padding_top + 'px')
                        }
                    }
                    var x = window.matchMedia("(max-width: 576px)")
                    isMobile(x) // Call listener function at run time
                    x.addListener(isMobile)

                }
            } );
        }
    );

    // Body -> Background
    // Background Image - Position
    api( 'responsive_site_background_img_position', function( value ) {     
        value.bind( function ( newval ) {  
            let posi = newval.replace( '-', ' ' );  
            $( 'body.custom-background.responsive-site-contained, body.custom-background.responsive-site-full-width' ).css( 'background-position', posi );
        } );
    } );

    // Body -> Background
    // Background Image - Attachment
    api( 'responsive_site_background_image_attachment', function( value ) {
        value.bind( function ( newval ) {
            $( 'body.custom-background.responsive-site-contained, body.custom-background.responsive-site-full-width' ).css( 'background-attachment', newval );
        } );
    } );

    // Body -> Background
    // Background Image - Repeat
    api( 'responsive_site_background_image_repeat', function( value ) {
        value.bind( function ( newval ) {
            $( 'body.custom-background.responsive-site-contained, body.custom-background.responsive-site-full-width' ).css( 'background-repeat', newval );
        } );
    } );

    // Body -> Background
    // Background Image - Size
    api( 'responsive_site_background_image_size', function( value ) {
        value.bind( function ( newval ) {
            $( 'body.custom-background.responsive-site-contained, body.custom-background.responsive-site-full-width' ).css( 'background-size', newval );
        } );
    } );

    //Scroll To Top
    //Icon Position
    api( 'responsive_scroll_to_top_icon_position', function( value ) {
        value.bind( function( newval ) {
                $('#scroll').css('left', '');
                $('#scroll').css('right', '');
                $('#scroll').css(newval, '2px');

        } );
    } );
    // Footer Widget Alignment.
    api( 'responsive_footer_widget_alignment_desktop_1', function( value ) {
		value.bind( function( to ) {
			var $child = $( '.customizer-responsive_footer_widget_alignment_desktop_1' );
			if ( to ) {
				var style = '<style class="customizer-responsive_footer_widget_alignment_desktop_1">.footer-widget-1 .widget-wrapper {text-align:' + to + '}</style>';
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
    api( 'responsive_footer_widget_alignment_desktop_2', function( value ) {
		value.bind( function( to ) {
			var $child = $( '.customizer-responsive_footer_widget_alignment_desktop_2' );
			if ( to ) {
				var style = '<style class="customizer-responsive_footer_widget_alignment_desktop_2">.footer-widget-2 .widget-wrapper {text-align:' + to + '}</style>';
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
    api( 'responsive_footer_widget_alignment_desktop_3', function( value ) {
		value.bind( function( to ) {
			var $child = $( '.customizer-responsive_footer_widget_alignment_desktop_3' );
			if ( to ) {
				var style = '<style class="customizer-responsive_footer_widget_alignment_desktop_3">.footer-widget-3 .widget-wrapper {text-align:' + to + '}</style>';
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
    api( 'responsive_footer_widget_alignment_desktop_4', function( value ) {
		value.bind( function( to ) {
			var $child = $( '.customizer-responsive_footer_widget_alignment_desktop_4' );
			if ( to ) {
				var style = '<style class="customizer-responsive_footer_widget_alignment_desktop_4">.footer-widget-4 .widget-wrapper {text-align:' + to + '}</style>';
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

    api( 'responsive_footer_widget_alignment_tablet_1', function( value ) {
		value.bind( function( to ) {
			var $child = $( '.customizer-responsive_footer_widget_alignment_tablet_1' );
			if ( to ) {
				var style = '<style class="customizer-responsive_footer_widget_alignment_tablet_1">@media (max-width: 992px){ .footer-widget-1 .widget-wrapper {text-align:' + to + '}}</style>';
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
    api( 'responsive_footer_widget_alignment_tablet_2', function( value ) {
		value.bind( function( to ) {
			var $child = $( '.customizer-responsive_footer_widget_alignment_tablet_2' );
			if ( to ) {
				var style = '<style class="customizer-responsive_footer_widget_alignment_tablet_2">@media (max-width: 992px){ .footer-widget-2 .widget-wrapper {text-align:' + to + '}}</style>';
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
    api( 'responsive_footer_widget_alignment_tablet_3', function( value ) {
		value.bind( function( to ) {
			var $child = $( '.customizer-responsive_footer_widget_alignment_tablet_3' );
			if ( to ) {
				var style = '<style class="customizer-responsive_footer_widget_alignment_tablet_3">@media (max-width: 992px){ .footer-widget-3 .widget-wrapper {text-align:' + to + '}}</style>';
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
    api( 'responsive_footer_widget_alignment_tablet_4', function( value ) {
		value.bind( function( to ) {
			var $child = $( '.customizer-responsive_footer_widget_alignment_tablet_4' );
			if ( to ) {
				var style = '<style class="customizer-responsive_footer_widget_alignment_tablet_4">@media (max-width: 992px){ .footer-widget-4 .widget-wrapper {text-align:' + to + '}}</style>';
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

    api( 'responsive_footer_widget_alignment_mobile_1', function( value ) {
		value.bind( function( to ) {
			var $child = $( '.customizer-responsive_footer_widget_alignment_mobile_1' );
			if ( to ) {
				var style = '<style class="customizer-responsive_footer_widget_alignment_mobile_1">@media (max-width: 576px){ .footer-widget-1 .widget-wrapper {text-align:' + to + '}}</style>';
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
    api( 'responsive_footer_widget_alignment_mobile_2', function( value ) {
		value.bind( function( to ) {
			var $child = $( '.customizer-responsive_footer_widget_alignment_mobile_2' );
			if ( to ) {
				var style = '<style class="customizer-responsive_footer_widget_alignment_mobile_2">@media (max-width: 576px){ .footer-widget-2 .widget-wrapper {text-align:' + to + '}}</style>';
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
    api( 'responsive_footer_widget_alignment_mobile_3', function( value ) {
		value.bind( function( to ) {
			var $child = $( '.customizer-responsive_footer_widget_alignment_mobile_3' );
			if ( to ) {
				var style = '<style class="customizer-responsive_footer_widget_alignment_mobile_3">@media (max-width: 576px){ .footer-widget-3 .widget-wrapper {text-align:' + to + '}}</style>';
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
    api( 'responsive_footer_widget_alignment_mobile_4', function( value ) {
		value.bind( function( to ) {
			var $child = $( '.customizer-responsive_footer_widget_alignment_mobile_4' );
			if ( to ) {
				var style = '<style class="customizer-responsive_footer_widget_alignment_mobile_4">@media (max-width: 576px){ .footer-widget-4 .widget-wrapper {text-align:' + to + '}}</style>';
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

} )( jQuery );
