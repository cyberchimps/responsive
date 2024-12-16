/**
 * Customizer options
 *
 * @package Responsive WordPress theme
 */

( function( $ ) {

	// Declare vars.
	var api = wp.customize;

	api( 'responsive_site_background_image_toggle', function( value ) {
	    value.bind( function( newval ) {
			if( newval ) {
				if( api('responsive_site_background_image').get() ) {
					$('body').addClass( 'custom-background' );
					$('body.custom-background').css({'background-image': 'url(' + api('responsive_site_background_image').get() + ')' });
				}
			} else {
				$('body').removeClass( 'custom-background' );
				$('body').css('background-image', 'none');
			}
		} );
	} );

	api( 'responsive_site_background_image', function( value ) {
		value.bind( function( newval ) {
			$('body.custom-background').css({'background-image': 'url(' + newval + ')' });
		} );
	} );

	api( 'responsive_header_widget_background_image_toggle', function( value ) {
	    value.bind( function( newval ) {
			if( newval ) {
				if( api('responsive_header_widget_background_image').get() ) {
					$('body:not(.res-transparent-header) .header-widgets').css('background-image', 'linear-gradient(to right,' + api('responsive_header_widget_background_color').get() + ',' + api('responsive_header_widget_background_color').get() + '),url(' + api('responsive_header_widget_background_image').get() + ')' );
				}
			} else {
				$('body:not(.res-transparent-header) .header-widgets').css('background-image', 'none');
			}
		} );
	} );
    //header_widget color
	api( 'responsive_header_widget_background_image', function( value ) {
	    value.bind( function( newval ) {
	        $('body:not(.res-transparent-header) .header-widgets').css('background-image', 'linear-gradient(to right,' + api('responsive_header_widget_background_color').get() + ',' + api('responsive_header_widget_background_color').get() + '),url(' + newval + ')' );
	    } );
	} );
	//header_widget color
	api( 'responsive_header_widget_background_color', function( value ) {
	    value.bind( function( newval ) {
	        if( api('responsive_header_widget_background_image').get() && api('responsive_header_widget_background_image_toggle').get() ) {
	            $('body:not(.res-transparent-header) .header-widgets').css('background-image', 'linear-gradient(to right,' + newval + ',' + newval + '),url(' + api('responsive_header_widget_background_image').get() + ')' );
	        }
	    } );
	} );
	//transparent_header_widget_background_image toggle
	api( 'responsive_transparent_header_widget_background_image_toggle', function( value ) {
	    value.bind( function( newval ) {
			if( newval ) {
				if( api('responsive_transparent_header_widget_background_image').get() ) {
					$('.res-transparent-header .header-widgets').css('background-image', 'linear-gradient(to right,' + api('responsive_transparent_header_widget_background_color').get() + ',' + api('responsive_transparent_header_widget_background_color').get() + '),url(' + api('responsive_transparent_header_widget_background_image').get() + ')' );
				}
			} else {
				$('.res-transparent-header .header-widgets').css('background-image', 'none');
			}
		} );
	} );
	//transparent_header_widget color
	api( 'responsive_transparent_header_widget_background_image', function( value ) {
	    value.bind( function( newval ) {
	        $('.res-transparent-header .header-widgets').css('background-image', 'linear-gradient(to right,' + api('responsive_transparent_header_widget_background_color').get() + ',' + api('responsive_transparent_header_widget_background_color').get() + '),url(' + newval + ')' );
	    } );
	} );
	//transparent_header_widget color
	api( 'responsive_transparent_header_widget_background_color', function( value ) {
	    value.bind( function( newval ) {
	        if( api('responsive_transparent_header_widget_background_image').get() && api('responsive_transparent_header_widget_background_image_toggle').get() ) {
	            $('.res-transparent-header .header-widgets').css('background-image', 'linear-gradient(to right,' + newval + ',' + newval + '),url(' + api('responsive_transparent_header_widget_background_image').get() + ')' );
	        }
	    } );
	} );
	//footer color
	api( 'responsive_footer_background_image_toggle', function( value ) {
	    value.bind( function( newval ) {
			if( newval ) {
				if( api('responsive_footer_background_image').get() ) {
					$('body:not(.res-transparent-footer) .site-footer').css('background-image', 'linear-gradient(to right,' + api( 'responsive_footer_background_color' ).get() + ',' + api( 'responsive_footer_background_color' ).get() + '),url(' + api('responsive_footer_background_image').get() + ')' );
				}
			} else {
				$('body:not(.res-transparent-footer) .site-footer').css('background-image', 'none');
			}
		} );
	});
	//footer color
	api( 'responsive_footer_background_image', function( value ) {
		value.bind( function( newval ) {
			$('body:not(.res-transparent-footer) .site-footer').css('background-image', 'linear-gradient(to right,' + api('responsive_footer_background_color').get() + ',' + api('responsive_footer_background_color').get() + '),url(' + newval + ')' );
		} );
	} );
	//footer color
	api( 'responsive_footer_background_color', function( value ) {
	    value.bind( function( newval ) {
	        if( api('responsive_footer_background_image').get() && api( 'responsive_footer_background_image_toggle').get() ) {
	            $('body:not(.res-transparent-footer) .site-footer').css('background-image', 'linear-gradient(to right,' + newval + ',' + newval + '),url(' + api('responsive_footer_background_image').get() + ')' );
	        }
	    } );
	} );

	//Site Colors
	//ox Background Toggle
	api( 'responsive_box_background_image_toggle', function( value ) {
	    value.bind( function( newval ) {
			if( newval ) {
				if( api('responsive_box_background_image').get() ) {
					$('.page.front-page.responsive-site-style-content-boxed .custom-home-widget-section.home-widgets,.blog.front-page.responsive-site-style-content-boxed .custom-home-widget-section.home-widgets,.responsive-site-style-content-boxed .custom-home-about-section,.responsive-site-style-content-boxed .custom-home-feature-section,.responsive-site-style-content-boxed .custom-home-team-section,.responsive-site-style-content-boxed .custom-home-testimonial-section,.responsive-site-style-content-boxed .custom-home-contact-section,.responsive-site-style-content-boxed .custom-home-widget-section,.responsive-site-style-content-boxed .custom-home-featured-area,.responsive-site-style-content-boxed .site-content-header,.responsive-site-style-content-boxed .content-area-wrapper,.responsive-site-style-content-boxed .site-content .hentry,.responsive-site-style-content-boxed .navigation,.responsive-site-style-content-boxed .comments-area,.responsive-site-style-content-boxed .comment-respond,.responsive-site-style-boxed .custom-home-about-section,.responsive-site-style-boxed .custom-home-feature-section,.responsive-site-style-boxed .custom-home-team-section,.responsive-site-style-boxed .custom-home-testimonial-section,.responsive-site-style-boxed .custom-home-contact-section,.responsive-site-style-boxed .custom-home-widget-section,.responsive-site-style-boxed .custom-home-featured-area,.responsive-site-style-boxed .site-content-header,.responsive-site-style-boxed .site-content .hentry,.responsive-site-style-boxed .navigation,.responsive-site-style-boxed .comments-area,.responsive-site-style-boxed .comment-respond,.responsive-site-style-boxed .comment-respond').css({'background-image': 'linear-gradient(to right,' + api('responsive_box_background_color').get() + ',' + api('responsive_box_background_color').get() + '),url(' + api('responsive_box_background_image').get() + ')', 'background-size': 'cover' });

					if( ! api('responsive_sidebar_background_image').get() ) {
						$('.responsive-site-style-boxed aside#secondary .widget-wrapper').css({'background-image': 'linear-gradient(to right,' + api('responsive_box_background_color').get() + ',' + api('responsive_box_background_color').get() + '),url(' + api('responsive_box_background_image').get() + ')', 'background-size': 'cover' });
					}
				}
			} else {
				$('.page.front-page.responsive-site-style-content-boxed .custom-home-widget-section.home-widgets,.blog.front-page.responsive-site-style-content-boxed .custom-home-widget-section.home-widgets,.responsive-site-style-content-boxed .custom-home-about-section,.responsive-site-style-content-boxed .custom-home-feature-section,.responsive-site-style-content-boxed .custom-home-team-section,.responsive-site-style-content-boxed .custom-home-testimonial-section,.responsive-site-style-content-boxed .custom-home-contact-section,.responsive-site-style-content-boxed .custom-home-widget-section,.responsive-site-style-content-boxed .custom-home-featured-area,.responsive-site-style-content-boxed .site-content-header,.responsive-site-style-content-boxed .content-area-wrapper,.responsive-site-style-content-boxed .site-content .hentry,.responsive-site-style-content-boxed .navigation,.responsive-site-style-content-boxed .comments-area,.responsive-site-style-content-boxed .comment-respond,.responsive-site-style-boxed .custom-home-about-section,.responsive-site-style-boxed .custom-home-feature-section,.responsive-site-style-boxed .custom-home-team-section,.responsive-site-style-boxed .custom-home-testimonial-section,.responsive-site-style-boxed .custom-home-contact-section,.responsive-site-style-boxed .custom-home-widget-section,.responsive-site-style-boxed .custom-home-featured-area,.responsive-site-style-boxed .site-content-header,.responsive-site-style-boxed .site-content .hentry,.responsive-site-style-boxed .navigation,.responsive-site-style-boxed .comments-area,.responsive-site-style-boxed .comment-respond,.responsive-site-style-boxed .comment-respond').css('background-image', 'none' );

				if( ! api('responsive_sidebar_background_image').get() ) {
					$('.responsive-site-style-boxed aside#secondary .widget-wrapper').css('background-image', 'none' );
				}
			}
		} );
	});
	//Box Background Color
	api( 'responsive_box_background_image', function( value ) {
		value.bind( function( newval ) {
			$('.page.front-page.responsive-site-style-content-boxed .custom-home-widget-section.home-widgets,.blog.front-page.responsive-site-style-content-boxed .custom-home-widget-section.home-widgets,.responsive-site-style-content-boxed .custom-home-about-section,.responsive-site-style-content-boxed .custom-home-feature-section,.responsive-site-style-content-boxed .custom-home-team-section,.responsive-site-style-content-boxed .custom-home-testimonial-section,.responsive-site-style-content-boxed .custom-home-contact-section,.responsive-site-style-content-boxed .custom-home-widget-section,.responsive-site-style-content-boxed .custom-home-featured-area,.responsive-site-style-content-boxed .site-content-header,.responsive-site-style-content-boxed .content-area-wrapper,.responsive-site-style-content-boxed .site-content .hentry,.responsive-site-style-content-boxed .navigation,.responsive-site-style-content-boxed .comments-area,.responsive-site-style-content-boxed .comment-respond,.responsive-site-style-boxed .custom-home-about-section,.responsive-site-style-boxed .custom-home-feature-section,.responsive-site-style-boxed .custom-home-team-section,.responsive-site-style-boxed .custom-home-testimonial-section,.responsive-site-style-boxed .custom-home-contact-section,.responsive-site-style-boxed .custom-home-widget-section,.responsive-site-style-boxed .custom-home-featured-area,.responsive-site-style-boxed .site-content-header,.responsive-site-style-boxed .site-content .hentry,.responsive-site-style-boxed .navigation,.responsive-site-style-boxed .comments-area,.responsive-site-style-boxed .comment-respond,.responsive-site-style-boxed .comment-respond').css({'background-image': 'linear-gradient(to right,' + api('responsive_box_background_color').get() + ',' + api('responsive_box_background_color').get() + '),url(' + newval + ')', 'background-size': 'cover' });

			if( ! api('responsive_sidebar_background_image').get() ) {
				$('.responsive-site-style-boxed aside#secondary .widget-wrapper').css({'background-image': 'linear-gradient(to right,' + api('responsive_box_background_color').get() + ',' + api('responsive_box_background_color').get() + '),url(' + newval + ')', 'background-size': 'cover' });
			}
		} );
	} );
	api( 'responsive_box_background_color', function( value ) {
		value.bind( function( newval ) {
			if( api( 'responsive_box_background_image_toggle').get() && api('responsive_box_background_image').get() ) {
				$('.page.front-page.responsive-site-style-content-boxed .custom-home-widget-section.home-widgets,.blog.front-page.responsive-site-style-content-boxed .custom-home-widget-section.home-widgets,.responsive-site-style-content-boxed .custom-home-about-section,.responsive-site-style-content-boxed .custom-home-feature-section,.responsive-site-style-content-boxed .custom-home-team-section,.responsive-site-style-content-boxed .custom-home-testimonial-section,.responsive-site-style-content-boxed .custom-home-contact-section,.responsive-site-style-content-boxed .custom-home-widget-section,.responsive-site-style-content-boxed .custom-home-featured-area,.responsive-site-style-content-boxed .site-content-header,.responsive-site-style-content-boxed .content-area-wrapper,.responsive-site-style-content-boxed .site-content .hentry,.responsive-site-style-content-boxed .navigation,.responsive-site-style-content-boxed .comments-area,.responsive-site-style-content-boxed .comment-respond,.responsive-site-style-boxed .custom-home-about-section,.responsive-site-style-boxed .custom-home-feature-section,.responsive-site-style-boxed .custom-home-team-section,.responsive-site-style-boxed .custom-home-testimonial-section,.responsive-site-style-boxed .custom-home-contact-section,.responsive-site-style-boxed .custom-home-widget-section,.responsive-site-style-boxed .custom-home-featured-area,.responsive-site-style-boxed .site-content-header,.responsive-site-style-boxed .site-content .hentry,.responsive-site-style-boxed .navigation,.responsive-site-style-boxed .comments-area,.responsive-site-style-boxed .comment-respond,.responsive-site-style-boxed .comment-respond').css('background-image', 'linear-gradient(to right,' + newval + ',' + newval + '),url(' + api('responsive_box_background_image').get() + ')' );
				if( ! api('responsive_sidebar_background_image').get() && ! ! api('responsive_sidebar_background_color').get() ) {
					$('.responsive-site-style-boxed aside#secondary .widget-wrapper').css('background-image', 'linear-gradient(to right,' + newval + ',' + newval + '),url(' + api('responsive_box_background_image').get() + ')' );
				}
			}

		} );
	} );
	// button background image.
	api( 'responsive_button_background_image_toggle', function( value ) {
	    value.bind( function( newval ) {
			if( newval ) {
				if( api('responsive_button_background_image').get() ) {
					$('.page.front-page .button,.blog.front-page .button,.read-more-button .hentry .read-more .more-link,input[type=button],input[type=submit],button,.button,.wp-block-button__link,div.wpforms-container-full .wpforms-form input[type=submit],body div.wpforms-container-full .wpforms-form button[type=submit],div.wpforms-container-full .wpforms-form .wpforms-page-button ').css({'background-image': 'linear-gradient(to right,' + api( 'responsive_button_color' ).get() + ',' + api( 'responsive_button_color' ).get() + '),url(' + api('responsive_button_background_image').get() + ')', 'background-size': 'cover' });
				}
			} else {
				$('.page.front-page .button,.blog.front-page .button,.read-more-button .hentry .read-more .more-link,input[type=button],input[type=submit],button,.button,.wp-block-button__link,div.wpforms-container-full .wpforms-form input[type=submit],body div.wpforms-container-full .wpforms-form button[type=submit],div.wpforms-container-full .wpforms-form .wpforms-page-button ').css('background-image', 'none');
			}
		} );
	});
	// button background image.
	api( 'responsive_button_background_image', function( value ) {
		value.bind( function( newval ) {
            $('.page.front-page .button,.blog.front-page .button,.read-more-button .hentry .read-more .more-link,input[type=button],input[type=submit],button,.button,.wp-block-button__link,div.wpforms-container-full .wpforms-form input[type=submit],body div.wpforms-container-full .wpforms-form button[type=submit],div.wpforms-container-full .wpforms-form .wpforms-page-button ').css({'background-image': 'linear-gradient(to right,' + api('responsive_button_color').get() + ',' + api('responsive_button_color').get() + '),url(' + newval + ')', 'background-size': 'cover' });
        } );
    } );
	// button color.
    api( 'responsive_button_color', function( value ) {
        value.bind( function( newval ) {
			if( api('responsive_button_background_image').get() && api( 'responsive_button_background_image_toggle').get() ) {
	            $('.page.front-page .button,.blog.front-page .button,.read-more-button .hentry .read-more .more-link,input[type=button],input[type=submit],button,.button,.wp-block-button__link,div.wpforms-container-full .wpforms-form input[type=submit],body div.wpforms-container-full .wpforms-form button[type=submit],div.wpforms-container-full .wpforms-form .wpforms-page-button ').css('background-image', 'linear-gradient(to right,' + newval + ',' + newval + '),url(' + api('responsive_button_background_image').get() + ')' );
			}
        } );
    } );

	// Inputs color.
	api( 'responsive_inputs_background_image_toggle', function( value ) {
	    value.bind( function( newval ) {
			if( newval ) {
				if( api('responsive_inputs_background_image').get() ) {
					$('select,textarea,input[type=tel],input[type=email],input[type=number],input[type=search],input[type=text],input[type=date],input[type=datetime],input[type=datetime-local],input[type=month],input[type=password],input[type=range],input[type=time],input[type=url],input[type=week],div.wpforms-container-full .wpforms-form input[type=date],div.wpforms-container-full .wpforms-form input[type=datetime],div.wpforms-container-full .wpforms-form input[type=datetime-local],body div.wpforms-container-full .wpforms-form input[type=email],div.wpforms-container-full .wpforms-form input[type=month],div.wpforms-container-full .wpforms-form input[type=number],div.wpforms-container-full .wpforms-form input[type=password],div.wpforms-container-full .wpforms-form input[type=range],div.wpforms-container-full .wpforms-form input[type=search],div.wpforms-container-full .wpforms-form input[type=tel],div.wpforms-container-full .wpforms-form input[type=text],div.wpforms-container-full .wpforms-form input[type=time],div.wpforms-container-full .wpforms-form input[type=url],div.wpforms-container-full .wpforms-form input[type=week],div.wpforms-container-full .wpforms-form select,div.wpforms-container-full .wpforms-form textarea').css({'background-image': 'linear-gradient(to right,' + api( 'responsive_inputs_background_color' ).get() + ',' + api( 'responsive_inputs_background_color' ).get() + '),url(' + api('responsive_inputs_background_image').get() + ')', 'background-size': 'cover' });
				}
			} else {
				$('select,textarea,input[type=tel],input[type=email],input[type=number],input[type=search],input[type=text],input[type=date],input[type=datetime],input[type=datetime-local],input[type=month],input[type=password],input[type=range],input[type=time],input[type=url],input[type=week],div.wpforms-container-full .wpforms-form input[type=date],div.wpforms-container-full .wpforms-form input[type=datetime],div.wpforms-container-full .wpforms-form input[type=datetime-local],body div.wpforms-container-full .wpforms-form input[type=email],div.wpforms-container-full .wpforms-form input[type=month],div.wpforms-container-full .wpforms-form input[type=number],div.wpforms-container-full .wpforms-form input[type=password],div.wpforms-container-full .wpforms-form input[type=range],div.wpforms-container-full .wpforms-form input[type=search],div.wpforms-container-full .wpforms-form input[type=tel],div.wpforms-container-full .wpforms-form input[type=text],div.wpforms-container-full .wpforms-form input[type=time],div.wpforms-container-full .wpforms-form input[type=url],div.wpforms-container-full .wpforms-form input[type=week],div.wpforms-container-full .wpforms-form select,div.wpforms-container-full .wpforms-form textarea').css('background-image', 'none');
			}
		} );
	});
	//Inputs color
	api( 'responsive_inputs_background_image', function( value ) {
	    value.bind( function( newval ) {
	        $('select,textarea,input[type=tel],input[type=email],input[type=number],input[type=search],input[type=text],input[type=date],input[type=datetime],input[type=datetime-local],input[type=month],input[type=password],input[type=range],input[type=time],input[type=url],input[type=week],div.wpforms-container-full .wpforms-form input[type=date],div.wpforms-container-full .wpforms-form input[type=datetime],div.wpforms-container-full .wpforms-form input[type=datetime-local],body div.wpforms-container-full .wpforms-form input[type=email],div.wpforms-container-full .wpforms-form input[type=month],div.wpforms-container-full .wpforms-form input[type=number],div.wpforms-container-full .wpforms-form input[type=password],div.wpforms-container-full .wpforms-form input[type=range],div.wpforms-container-full .wpforms-form input[type=search],div.wpforms-container-full .wpforms-form input[type=tel],div.wpforms-container-full .wpforms-form input[type=text],div.wpforms-container-full .wpforms-form input[type=time],div.wpforms-container-full .wpforms-form input[type=url],div.wpforms-container-full .wpforms-form input[type=week],div.wpforms-container-full .wpforms-form select,div.wpforms-container-full .wpforms-form textarea').css({'background-image': 'linear-gradient(to right,' + api('responsive_inputs_background_color').get() + ',' + api('responsive_inputs_background_color').get() + '),url(' + newval + ')', 'background-size': 'cover' });
	    } );
	} );
	//Inputs color
	api( 'responsive_inputs_background_color', function( value ) {
	    value.bind( function( newval ) {
	        if( api('responsive_inputs_background_image').get() && api( 'responsive_inputs_background_image_toggle').get() ) {
	            $('select,textarea,input[type=tel],input[type=email],input[type=number],input[type=search],input[type=text],input[type=date],input[type=datetime],input[type=datetime-local],input[type=month],input[type=password],input[type=range],input[type=time],input[type=url],input[type=week],div.wpforms-container-full .wpforms-form input[type=date],div.wpforms-container-full .wpforms-form input[type=datetime],div.wpforms-container-full .wpforms-form input[type=datetime-local],body div.wpforms-container-full .wpforms-form input[type=email],div.wpforms-container-full .wpforms-form input[type=month],div.wpforms-container-full .wpforms-form input[type=number],div.wpforms-container-full .wpforms-form input[type=password],div.wpforms-container-full .wpforms-form input[type=range],div.wpforms-container-full .wpforms-form input[type=search],div.wpforms-container-full .wpforms-form input[type=tel],div.wpforms-container-full .wpforms-form input[type=text],div.wpforms-container-full .wpforms-form input[type=time],div.wpforms-container-full .wpforms-form input[type=url],div.wpforms-container-full .wpforms-form input[type=week],div.wpforms-container-full .wpforms-form select,div.wpforms-container-full .wpforms-form textarea').css('background-image', 'linear-gradient(to right,' + newval + ',' + newval + '),url(' + api('responsive_inputs_background_image').get() + ')' );
	        }
	    } );
	} );
	//sidebar color
	api( 'responsive_sidebar_background_image_toggle', function( value ) {
	    value.bind( function( newval ) {
			if( newval ) {
				if( api('responsive_sidebar_background_image').get() ) {
					$('.responsive-site-style-boxed aside#secondary .widget-wrapper').css({'background-image': 'linear-gradient(to right,' + api( 'responsive_sidebar_background_color' ).get() + ',' + api( 'responsive_sidebar_background_color' ).get() + '),url(' + api('responsive_sidebar_background_image').get() + ')', 'background-size': 'cover' });
				}
			} else {
				$('.responsive-site-style-boxed aside#secondary .widget-wrapper').css('background-image', 'none');
			}
		} );
	});
	//sidebar color
	api( 'responsive_sidebar_background_image', function( value ) {
	    value.bind( function( newval ) {
	        $('.responsive-site-style-boxed aside#secondary .widget-wrapper').css({'background-image': 'linear-gradient(to right,' + api('responsive_sidebar_background_color').get() + ',' + api('responsive_sidebar_background_color').get() + '),url(' + newval + ')', 'background-size': 'cover' });
	    } );
	} );
	//sidebar color
	api( 'responsive_sidebar_background_color', function( value ) {
	    value.bind( function( newval ) {
	        if( api('responsive_sidebar_background_image').get() && api( 'responsive_sidebar_background_image_toggle').get() ) {
	            $('.responsive-site-style-boxed aside#secondary .widget-wrapper').css('background-image', 'linear-gradient(to right,' + newval + ',' + newval + '),url(' + api('responsive_sidebar_background_image').get() + ')' );
	        } else{
				$('.responsive-site-style-boxed aside#secondary .widget-wrapper').css('background-image', 'linear-gradient(to right,' + newval + ',' + newval + ')');
			}
	    } );
	} );

} )( jQuery );