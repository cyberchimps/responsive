/**
 * Update Typography Customizer settings live.
 *
 * @version 1.0.0
 */
// phpcs:ignoreFile
( function( $ ) {

	// Declare vars
	var api = wp.customize;

	/******** TYPOGRAPHY OPTIONS LOOP *********/
	api( "body_typography[font-family]", function( $swipe ) {
		$swipe.bind( function( pair ) {
			if ( pair ) {
				/** @type {string} */
				var fontName = pair.split(",")[0];
					fontName = fontName.replace(/'/g, '');
				var idfirst = ( fontName.trim().toLowerCase().replace( " ", "-" ), "customizer-typography-body-font-family" );
				var fontSize = fontName.replace( " ", "%20" );
				fontSize = fontSize.replace( ",", "%2C" );
				/** @type {string} */
				fontSize = responsive.googleFontsUrl + "/css?family=" + fontName + ":" + responsive.googleFontsWeight;
                if ( fontName in responsive.googleFonts ) {
                    if ($("#" + idfirst).length) {
                        $("#" + idfirst).attr("href", fontSize);
                    } else {
                        $("head").append('<link id="' + idfirst + '" rel="stylesheet" type="text/css" href="' + fontSize + '">');
                    }
                }
			}
            jQuery( 'style.customizer-typography-body-font-family' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-body-font-family">'
                + 'body{ font-family:' + pair +';}'
                + '</style>'
            );

		} );
	} ), api( "body_typography[font-weight]", function( $swipe ) {
		$swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-body-font-weight' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-body-font-weight">'
                + 'body { font-weight:' + dataAndEvents +' }'
                + '</style>'
            );
		} );
	} ), api( "body_typography[font-style]", function( $swipe ) {
		$swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-body-font-style' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-body-font-style">'
                + 'body { font-style:' + dataAndEvents +' }'
                + '</style>'
            );
		} );
	} ), api( "body_typography[font-size]", function( $swipe ) {
		$swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-body-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-body-font-size">'
                + 'body { font-size:' + dataAndEvents +' }'
                + '</style>'
            );

		} );
	} ), api( "body_tablet_typography[font-size]", function( $swipe ) {
		$swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-body-tablet-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-body-tablet-font-size">'
                + '@media (max-width: 768px){body { font-size:' + dataAndEvents +' }}'
                + '</style>'
            );

		} );
	} ), api( "body_mobile_typography[font-size]", function( $swipe ) {
		$swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-body-mobile-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-body-mobile-font-size">'
                + '@media (max-width: 480px){body { font-size:' + dataAndEvents +' }}'
                + '</style>'
            );

		} );
	} ), api( "body_typography[line-height]", function( $swipe ) {
		$swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-body-line-height' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-body-line-height">'
                + 'body { line-height:' + dataAndEvents +' }'
                + '</style>'
            );

		} );
	} ), api( "body_typography[letter-spacing]", function( $swipe ) {
		$swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-body-letter-spacing' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-body-letter-spacing">'
                + 'body { letter-spacing:' + dataAndEvents +'px;}'
                + '</style>'
            );

		} );
	} ), api( "body_typography[text-transform]", function( $swipe ) {
		$swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-body-text-transform' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-body-text-transform">'
                + 'body { text-transform:' + dataAndEvents +';}'
                + '</style>'
            );

		} );
	} ), api( "headings_typography[font-family]", function( $swipe ) {
	    $swipe.bind( function( pair ) {
	        if ( pair ) {
	            /** @type {string} */
	            var fontName = pair.split(",")[0];
	                fontName = fontName.replace(/'/g, '');
	            var idfirst = ( fontName.trim().toLowerCase().replace( " ", "-" ), "customizer-typography-headings-font-family" );
	            var fontSize = fontName.replace( " ", "%20" );
	            fontSize = fontSize.replace( ",", "%2C" );
	            /** @type {string} */
	            fontSize = responsive.googleFontsUrl + "/css?family=" + fontName + ":" + responsive.googleFontsWeight;
	            if ( fontName in responsive.googleFonts ) {
	                if ($("#" + idfirst).length) {
	                    $("#" + idfirst).attr("href", fontSize);
	                } else {
	                    $("head").append('<link id="' + idfirst + '" rel="stylesheet" type="text/css" href="' + fontSize + '">');
	                }
	            }
	        }
            jQuery( 'style.customizer-typography-headings-font-family' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-headings-font-family">'
                + 'h1,h2,h3,h4,h5,h6,.h1,.h2,.h3,.h4,.h5,.h6{ font-family:' + pair +';}'
                + '</style>'
            );

	    } );
	} ), api( "headings_typography[font-weight]", function( $swipe ) {
	    $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-headings-font-weight' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-headings-font-weight">'
                + 'h1,h2,h3,h4,h5,h6,.h1,.h2,.h3,.h4,.h5,.h6 { font-weight:' + dataAndEvents +';}'
                + '</style>'
            );

	    } );
	} ), api( "headings_typography[line-height]", function( $swipe ) {
	    $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-headings-line-height' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-headings-line-height">'
                + 'h1,h2,h3,h4,h5,h6,.h1,.h2,.h3,.h4,.h5,.h6 { line-height:' + dataAndEvents +';}'
                + '</style>'
            );

	    } );
	} ), api( "headings_typography[letter-spacing]", function( $swipe ) {
	    $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-headings-letter-spacing' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-headings-letter-spacing">'
                + 'h1,h2,h3,h4,h5,h6,.h1,.h2,.h3,.h4,.h5,.h6 { letter-spacing:' + dataAndEvents +'px;}'
                + '</style>'
            );

	    } );
	} ), api( "headings_typography[text-transform]", function( $swipe ) {
	    $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-headings-text-transform' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-headings-text-transform">'
                + 'h1,h2,h3,h4,h5,h6,.h1,.h2,.h3,.h4,.h5,.h6 { text-transform:' + dataAndEvents +';}'
                + '</style>'
            );

	    } );
	} ), api( "heading_h1_typography[font-family]", function( $swipe ) {
		$swipe.bind( function( pair ) {
			if ( pair ) {
				/** @type {string} */
				var fontName = pair.split(",")[0];
					fontName = fontName.replace(/'/g, '');
				var idfirst = ( fontName.trim().toLowerCase().replace( " ", "-" ), "customizer-typography-heading_h1-font-family" );
				var fontSize = fontName.replace( " ", "%20" );
				fontSize = fontSize.replace( ",", "%2C" );
				/** @type {string} */
				fontSize = responsive.googleFontsUrl + "/css?family=" + fontName + ":" + responsive.googleFontsWeight;
                if ( fontName in responsive.googleFonts ) {
                    if ($("#" + idfirst).length) {
                        $("#" + idfirst).attr("href", fontSize);
                    } else {
                        $("head").append('<link id="' + idfirst + '" rel="stylesheet" type="text/css" href="' + fontSize + '">');
                    }
                }
			}
            jQuery( 'style.customizer-typography-heading_h1-font-family' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h1-font-family">'
                + 'h1{ font-family:' + pair +';}'
                + '</style>'
            );

		} );
	} ), api( "heading_h1_typography[font-weight]", function( $swipe ) {
		$swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h1-font-weight' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h1-font-weight">'
                + 'h1{ font-weight:' + dataAndEvents +';}'
                + '</style>'
            );

		} );
	} ), api( "heading_h1_typography[font-style]", function( $swipe ) {
		$swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h1-font-style' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h1-font-style">'
                + 'h1{ font-style:' + dataAndEvents +';}'
                + '</style>'
            );

		} );
	} ), api( "heading_h1_typography[font-size]", function( $swipe ) {
		$swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h1-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h1-font-size">'
                + 'h1{ font-size:' + dataAndEvents +';}'
                + '</style>'
            );

		} );
	} ), api( "heading_h1_tablet_typography[font-size]", function( $swipe ) {
		$swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h1-tablet-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h1-tablet-font-size">'
                + '@media (max-width: 768px){h1{ font-size:' + dataAndEvents +';}}'
                + '</style>'
            );

		} );
	} ), api( "heading_h1_mobile_typography[font-size]", function( $swipe ) {
		$swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h1-mobile-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h1-mobile-font-size">'
                + '@media (max-width: 480px){h1{ font-size:' + dataAndEvents +';}}'
                + '</style>'
            );

		} );
	} ), api( "heading_h1_typography[line-height]", function( $swipe ) {
		$swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h1-line-height' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h1-line-height">'
                + 'h1{ line-height:' + dataAndEvents +';}'
                + '</style>'
            );

		} );
	} ), api( "heading_h1_typography[letter-spacing]", function( $swipe ) {
		$swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h1-letter-spacing' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h1-letter-spacing">'
                + 'h1{ letter-spacing:' + dataAndEvents +'px;}'
                + '</style>'
            );

		} );
	} ), api( "heading_h1_typography[text-transform]", function( $swipe ) {
		$swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h1-text-transform' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h1-text-transform">'
                + 'h1{ text-transform:' + dataAndEvents +';}'
                + '</style>'
            );

		} );
	} ), api( "heading_h2_typography[font-family]", function( $swipe ) {
		$swipe.bind( function( pair ) {
			if ( pair ) {
				/** @type {string} */
				var fontName = pair.split(",")[0];
					fontName = fontName.replace(/'/g, '');
				var idfirst = ( fontName.trim().toLowerCase().replace( " ", "-" ), "customizer-typography-heading_h2-font-family" );
				var fontSize = fontName.replace( " ", "%20" );
				fontSize = fontSize.replace( ",", "%2C" );
				/** @type {string} */
				fontSize = responsive.googleFontsUrl + "/css?family=" + fontName + ":" + responsive.googleFontsWeight;
                if ( fontName in responsive.googleFonts ) {
                    if ($("#" + idfirst).length) {
                        $("#" + idfirst).attr("href", fontSize);
                    } else {
                        $("head").append('<link id="' + idfirst + '" rel="stylesheet" type="text/css" href="' + fontSize + '">');
                    }
                }
			}
            jQuery( 'style.customizer-typography-heading_h2-font-family' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h2-font-family">'
                + 'h2{ font-family:' + pair +';}'
                + '</style>'
            );

		} );
	} ), api( "heading_h2_typography[font-weight]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h2-font-weight' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h2-font-weight">'
                + 'h2{ font-weight:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "heading_h2_typography[font-style]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h2-font-style' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h2-font-style">'
                + 'h2{ font-style:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "heading_h2_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h2-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h2-font-size">'
                + 'h2{ font-size:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "heading_h2_tablet_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h2-tablet-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h2-tablet-font-size">'
                + '@media (max-width: 768px){h2{ font-size:' + dataAndEvents +';}}'
                + '</style>'
            );

        } );
    } ), api( "heading_h2_mobile_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h2-mobile-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h2-mobile-font-size">'
                + '@media (max-width: 480px){h2{ font-size:' + dataAndEvents +';}}'
                + '</style>'
            );

        } );
    } ), api( "heading_h2_typography[line-height]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h2-line-height' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h2-line-height">'
                + 'h2{ line-height:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "heading_h2_typography[letter-spacing]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h2-letter-spacing' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h2-letter-spacing">'
                + 'h2{ letter-spacing:' + dataAndEvents +'px;}'
                + '</style>'
            );

        } );
    } ), api( "heading_h2_typography[text-transform]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h2-text-transform' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h2-text-transform">'
                + 'h2{ text-transform:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "heading_h3_typography[font-family]", function( $swipe ) {
		$swipe.bind( function( pair ) {
			if ( pair ) {
				/** @type {string} */
				var fontName = pair.split(",")[0];
					fontName = fontName.replace(/'/g, '');
				var idfirst = ( fontName.trim().toLowerCase().replace( " ", "-" ), "customizer-typography-heading_h3-font-family" );
				var fontSize = fontName.replace( " ", "%20" );
				fontSize = fontSize.replace( ",", "%2C" );
				/** @type {string} */
				fontSize = responsive.googleFontsUrl + "/css?family=" + fontName + ":" + responsive.googleFontsWeight;
                if ( fontName in responsive.googleFonts ) {
                    if ($("#" + idfirst).length) {
                        $("#" + idfirst).attr("href", fontSize);
                    } else {
                        $("head").append('<link id="' + idfirst + '" rel="stylesheet" type="text/css" href="' + fontSize + '">');
                    }
                }
			}
            jQuery( 'style.customizer-typography-heading_h3-font-family' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h3-font-family">'
                + 'h3{ font-family:' + pair +';}'
                + '</style>'
            );

		} );
	} ), api( "heading_h3_typography[font-weight]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h3-font-weight' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h3-font-weight">'
                + 'h3{ font-weight:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "heading_h3_typography[font-style]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h3-font-style' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h3-font-style">'
                + 'h3{ font-style:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "heading_h3_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h3-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h3-font-size">'
                + 'h3{ font-size:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "heading_h3_tablet_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h3-tablet-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h3-tablet-font-size">'
                + '@media (max-width: 768px){h3{ font-size:' + dataAndEvents +';}}'
                + '</style>'
            );

        } );
    } ), api( "heading_h3_mobile_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h3-mobile-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h3-mobile-font-size">'
                + '@media (max-width: 480px){h3{ font-size:' + dataAndEvents +';}}'
                + '</style>'
            );

        } );
    } ), api( "heading_h3_typography[line-height]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h3-line-height' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h3-line-height">'
                + 'h3{ line-height:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "heading_h3_typography[letter-spacing]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h3-letter-spacing' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h3-letter-spacing">'
                + 'h3{ letter-spacing:' + dataAndEvents +'px;}'
                + '</style>'
            );

        } );
    } ), api( "heading_h3_typography[text-transform]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h3-text-transform' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h3-text-transform">'
                + 'h3{ text-transform:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "heading_h4_typography[font-family]", function( $swipe ) {
		$swipe.bind( function( pair ) {
			if ( pair ) {
				/** @type {string} */
				var fontName = pair.split(",")[0];
					fontName = fontName.replace(/'/g, '');
				var idfirst = ( fontName.trim().toLowerCase().replace( " ", "-" ), "customizer-typography-heading_h4-font-family" );
				var fontSize = fontName.replace( " ", "%20" );
				fontSize = fontSize.replace( ",", "%2C" );
				/** @type {string} */
				fontSize = responsive.googleFontsUrl + "/css?family=" + fontName + ":" + responsive.googleFontsWeight;
                if ( fontName in responsive.googleFonts ) {
                    if ($("#" + idfirst).length) {
                        $("#" + idfirst).attr("href", fontSize);
                    } else {
                        $("head").append('<link id="' + idfirst + '" rel="stylesheet" type="text/css" href="' + fontSize + '">');
                    }
                }
			}
            jQuery( 'style.customizer-typography-heading_h4-font-family' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h4-font-family">'
                + 'h4{ font-family:' + pair +';}'
                + '</style>'
            );

		} );
	} ), api( "heading_h4_typography[font-weight]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h4-font-weight' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h4-font-weight">'
                + 'h4{ font-weight:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "heading_h4_typography[font-style]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h4-font-style' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h4-font-style">'
                + 'h4{ font-style:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "heading_h4_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h4-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h4-font-size">'
                + 'h4{ font-size:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "heading_h4_tablet_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h4-tablet-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h4-tablet-font-size">'
                + '@media (max-width: 768px){h4{ font-size:' + dataAndEvents +';}}'
                + '</style>'
            );

        } );
    } ), api( "heading_h4_mobile_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h4-mobile-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h4-mobile-font-size">'
                + '@media (max-width: 480px){h4{ font-size:' + dataAndEvents +';}}'
                + '</style>'
            );

        } );
    } ), api( "heading_h4_typography[line-height]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h4-line-height' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h4-line-height">'
                + 'h4{ line-height:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "heading_h4_typography[letter-spacing]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h4-letter-spacing' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h4-letter-spacing">'
                + 'h4{ letter-spacing:' + dataAndEvents +'px;}'
                + '</style>'
            );

        } );
    } ), api( "heading_h4_typography[text-transform]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h4-text-transform' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h4-text-transform">'
                + 'h4{ text-transform:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ),api( "heading_h5_typography[font-family]", function( $swipe ) {
        $swipe.bind( function( pair ) {
            if ( pair ) {
                /** @type {string} */
                var fontName = pair.split(",")[0];
                fontName = fontName.replace(/'/g, '');
                var idfirst = ( fontName.trim().toLowerCase().replace( " ", "-" ), "customizer-typography-heading_h5-font-family" );
                var fontSize = fontName.replace( " ", "%20" );
                fontSize = fontSize.replace( ",", "%2C" );
                /** @type {string} */
                fontSize = responsive.googleFontsUrl + "/css?family=" + fontName + ":" + responsive.googleFontsWeight;
                if ( fontName in responsive.googleFonts ) {
                    if ( $( "#" + idfirst ).length ) {
                        $( "#" + idfirst ).attr( "href", fontSize );
                    } else {
                        $( "head" ).append( '<link id="' + idfirst + '" rel="stylesheet" type="text/css" href="' + fontSize + '">' );
                    }
                }
            }
            jQuery( 'style.customizer-typography-heading_h5-font-family' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h5-font-family">'
                + 'h5{ font-family:' + pair +';}'
                + '</style>'
            );

        } );
    } ), api( "heading_h5_typography[font-weight]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h5-font-weight' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h5-font-weight">'
                + 'h5{ font-weight:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "heading_h5_typography[font-style]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h5-font-style' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h5-font-style">'
                + 'h5{ font-style:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "heading_h5_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h5-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h5-font-size">'
                + 'h5{ font-size:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "heading_h5_tablet_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h5-tablet-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h5-tablet-font-size">'
                + '@media (max-width: 768px){h5{ font-size:' + dataAndEvents +';}}'
                + '</style>'
            );

        } );
    } ), api( "heading_h5_mobile_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h5-mobile-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h5-mobile-font-size">'
                + '@media (max-width: 480px){h5{ font-size:' + dataAndEvents +';}}'
                + '</style>'
            );

        } );
    } ), api( "heading_h5_typography[line-height]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h5-line-height' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h5-line-height">'
                + 'h5{ line-height:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "heading_h5_typography[letter-spacing]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h5-letter-spacing' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h5-letter-spacing">'
                + 'h5{ letter-spacing:' + dataAndEvents +'px;}'
                + '</style>'
            );

        } );
    } ), api( "heading_h5_typography[text-transform]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h5-text-transform' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h5-text-transform">'
                + 'h5{ text-transform:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "heading_h6_typography[font-family]", function( $swipe ) {
        $swipe.bind( function( pair ) {
            if ( pair ) {
                /** @type {string} */
                var fontName = pair.split(",")[0];
                fontName = fontName.replace(/'/g, '');
                var idfirst = ( fontName.trim().toLowerCase().replace( " ", "-" ), "customizer-typography-heading_h6-font-family" );
                var fontSize = fontName.replace( " ", "%20" );
                fontSize = fontSize.replace( ",", "%2C" );
                /** @type {string} */
                fontSize = responsive.googleFontsUrl + "/css?family=" + fontName + ":" + responsive.googleFontsWeight;
                if ( fontName in responsive.googleFonts ) {
                    if ( $( "#" + idfirst ).length ) {
                        $( "#" + idfirst ).attr( "href", fontSize );
                    } else {
                        $( "head" ).append( '<link id="' + idfirst + '" rel="stylesheet" type="text/css" href="' + fontSize + '">' );
                    }
                }
            }
            jQuery( 'style.customizer-typography-heading_h6-font-family' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h6-font-family">'
                + 'h6{ font-family:' + pair +';}'
                + '</style>'
            );

        } );
    } ), api( "heading_h6_typography[font-weight]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h6-font-weight' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h6-font-weight">'
                + 'h6{ font-weight:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "heading_h6_typography[font-style]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h6-font-style' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h6-font-style">'
                + 'h6{ font-style:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "heading_h6_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h6-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h6-font-size">'
                + 'h6{ font-size:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "heading_h6_tablet_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h6-tablet-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h6-tablet-font-size">'
                + '@media (max-width: 768px){h6{ font-size:' + dataAndEvents +';}}'
                + '</style>'
            );

        } );
    } ), api( "heading_h6_mobile_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h6-mobile-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h6-mobile-font-size">'
                + '@media (max-width: 480px){h6{ font-size:' + dataAndEvents +';}}'
                + '</style>'
            );

        } );
    } ), api( "heading_h6_typography[line-height]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h6-line-height' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h6-line-height">'
                + 'h6{ line-height:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "heading_h6_typography[letter-spacing]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h6-letter-spacing' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h6-letter-spacing">'
                + 'h6{ letter-spacing:' + dataAndEvents +'px;}'
                + '</style>'
            );

        } );
    } ), api( "heading_h6_typography[text-transform]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-heading_h6-text-transform' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-heading_h6-text-transform">'
                + 'h6{ text-transform:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "meta_typography[font-family]", function( $swipe ) {
        $swipe.bind( function( pair ) {
            if ( pair ) {
                /** @type {string} */
                var fontName = pair.split(",")[0];
                fontName = fontName.replace(/'/g, '');
                var idfirst = ( fontName.trim().toLowerCase().replace( " ", "-" ), "customizer-typography-meta-font-family" );
                var fontSize = fontName.replace( " ", "%20" );
                fontSize = fontSize.replace( ",", "%2C" );
                /** @type {string} */
                fontSize = responsive.googleFontsUrl + "/css?family=" + fontName + ":" + responsive.googleFontsWeight;
                if ( fontName in responsive.googleFonts ) {
                    if ( $( "#" + idfirst ).length ) {
                        $( "#" + idfirst ).attr( "href", fontSize );
                    } else {
                        $( "head" ).append( '<link id="' + idfirst + '" rel="stylesheet" type="text/css" href="' + fontSize + '">' );
                    }
                }
            }
            jQuery( 'style.customizer-typography-meta-font-family' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-meta-font-family">'
                + '.hentry .post-data,.post-meta *{ font-family:' + pair +';}'
                + '</style>'
            );

        } );
    } ), api( "meta_typography[font-weight]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-meta-font-weight' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-meta-font-weight">'
                + '.hentry .post-data,.post-meta *{ font-weight:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "meta_typography[font-style]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-meta-font-style' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-meta-font-style">'
                + '.hentry .post-data,.post-meta *{ font-style:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "meta_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-meta-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-meta-font-size">'
                + '.hentry .post-data,.post-meta *{ font-size:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "meta_tablet_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-meta-tablet-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-meta-tablet-font-size">'
                + '@media (max-width: 768px){.hentry .post-data,.post-meta *{ font-size:' + dataAndEvents +';}}'
                + '</style>'
            );

        } );
    } ), api( "meta_mobile_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-meta-mobile-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-meta-mobile-font-size">'
                + '@media (max-width: 480px){.hentry .post-data,.post-meta *{ font-size:' + dataAndEvents +';}}'
                + '</style>'
            );

        } );
    } ), api( "meta_typography[line-height]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-meta-line-height' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-meta-line-height">'
                + '.hentry .post-data,.post-meta *{ line-height:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "meta_typography[letter-spacing]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-meta-letter-spacing' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-meta-letter-spacing">'
                + '.hentry .post-data,.post-meta *{ letter-spacing:' + dataAndEvents +'px;}'
                + '</style>'
            );

        } );
    } ), api( "meta_typography[text-transform]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-meta-text-transform' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-meta-text-transform">'
                + '.hentry .post-data,.post-meta *{ text-transform:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "button_typography[font-family]", function( $swipe ) {
        $swipe.bind( function( pair ) {
            if ( pair ) {
                /** @type {string} */
                var fontName = pair.split(",")[0];
                fontName = fontName.replace(/'/g, '');
                var idfirst = ( fontName.trim().toLowerCase().replace( " ", "-" ), "customizer-typography-button-font-family" );
                var fontSize = fontName.replace( " ", "%20" );
                fontSize = fontSize.replace( ",", "%2C" );
                /** @type {string} */
                fontSize = responsive.googleFontsUrl + "/css?family=" + fontName + ":" + responsive.googleFontsWeight;
                if ( fontName in responsive.googleFonts ) {
                    if ( $( "#" + idfirst ).length ) {
                        $( "#" + idfirst ).attr( "href", fontSize );
                    } else {
                        $( "head" ).append( '<link id="' + idfirst + '" rel="stylesheet" type="text/css" href="' + fontSize + '">' );
                    }
                }
            }
            jQuery( 'style.customizer-typography-button-font-family' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-button-font-family">'
                + '.course #commentform #submit, .course .submit, .course a.button, .course a.button:visited, .course a.comment-reply-link, .course button.button, .course input.button, .course input[type=submit], .course-container #commentform #submit, .course-container .submit, .course-container a.button, .course-container a.button:visited, .course-container a.comment-reply-link, .course-container button.button, .course-container input.button, .course-container input[type=submit], .lesson #commentform #submit, .lesson .submit, .lesson a.button, .lesson a.button:visited, .lesson a.comment-reply-link, .lesson button.button, .lesson input.button, .lesson input[type=submit], .quiz #commentform #submit, .quiz .submit, .quiz a.button, .quiz a.button:visited, .quiz a.comment-reply-link, .quiz button.button, .quiz input.button, .quiz input[type=submit], .page.front-page .button, .blog.front-page .button, .read-more-button .hentry .read-more .more-link, input[type=button], input[type=submit], button, .button, .wp-block-button__link, div.wpforms-container-full .wpforms-form input[type=submit], body div.wpforms-container-full .wpforms-form button[type=submit], div.wpforms-container-full .wpforms-form .wpforms-page-button,.read-more-button .hentry .read-more .more-link,input[type=button],input[type=submit],button,.button,.wp-block-button__link,div.wpforms-container-full .wpforms-form input[type=submit],div.wpforms-container-full .wpforms-form button[type=submit],div.wpforms-container-full .wpforms-form .wpforms-page-button,.page.woocommerce-cart .woocommerce a.button.alt,.page.woocommerce-cart .woocommerce a.button, .woocommerce-cart .woocommerce a.button.alt,.woocommerce-cart .woocommerce a.button,.woocommerce button.button,.wp-block-button__link{ font-family:' + pair +';}'
                + '</style>'
            );

        } );
    } ), api( "button_typography[font-weight]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-button-font-weight' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-button-font-weight">'
                + '.course #commentform #submit, .course .submit, .course a.button, .course a.button:visited, .course a.comment-reply-link, .course button.button, .course input.button, .course input[type=submit], .course-container #commentform #submit, .course-container .submit, .course-container a.button, .course-container a.button:visited, .course-container a.comment-reply-link, .course-container button.button, .course-container input.button, .course-container input[type=submit], .lesson #commentform #submit, .lesson .submit, .lesson a.button, .lesson a.button:visited, .lesson a.comment-reply-link, .lesson button.button, .lesson input.button, .lesson input[type=submit], .quiz #commentform #submit, .quiz .submit, .quiz a.button, .quiz a.button:visited, .quiz a.comment-reply-link, .quiz button.button, .quiz input.button, .quiz input[type=submit], .page.front-page .button, .blog.front-page .button, .read-more-button .hentry .read-more .more-link, input[type=button], input[type=submit], button, .button, .wp-block-button__link, div.wpforms-container-full .wpforms-form input[type=submit], body div.wpforms-container-full .wpforms-form button[type=submit], div.wpforms-container-full .wpforms-form .wpforms-page-button,.read-more-button .hentry .read-more .more-link,input[type=button],input[type=submit],button,.button,.wp-block-button__link,div.wpforms-container-full .wpforms-form input[type=submit],div.wpforms-container-full .wpforms-form button[type=submit],div.wpforms-container-full .wpforms-form .wpforms-page-button,.page.woocommerce-cart .woocommerce a.button.alt,.page.woocommerce-cart .woocommerce a.button, .woocommerce-cart .woocommerce a.button.alt,.woocommerce-cart .woocommerce a.button,.woocommerce button.button,.wp-block-button__link{ font-weight:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "button_typography[font-style]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-button-font-style' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-button-font-style">'
                + '.course #commentform #submit, .course .submit, .course a.button, .course a.button:visited, .course a.comment-reply-link, .course button.button, .course input.button, .course input[type=submit], .course-container #commentform #submit, .course-container .submit, .course-container a.button, .course-container a.button:visited, .course-container a.comment-reply-link, .course-container button.button, .course-container input.button, .course-container input[type=submit], .lesson #commentform #submit, .lesson .submit, .lesson a.button, .lesson a.button:visited, .lesson a.comment-reply-link, .lesson button.button, .lesson input.button, .lesson input[type=submit], .quiz #commentform #submit, .quiz .submit, .quiz a.button, .quiz a.button:visited, .quiz a.comment-reply-link, .quiz button.button, .quiz input.button, .quiz input[type=submit], .page.front-page .button, .blog.front-page .button, .read-more-button .hentry .read-more .more-link, input[type=button], input[type=submit], button, .button, .wp-block-button__link, div.wpforms-container-full .wpforms-form input[type=submit], body div.wpforms-container-full .wpforms-form button[type=submit], div.wpforms-container-full .wpforms-form .wpforms-page-button,.read-more-button .hentry .read-more .more-link,input[type=button],input[type=submit],button,.button,.wp-block-button__link,div.wpforms-container-full .wpforms-form input[type=submit],div.wpforms-container-full .wpforms-form button[type=submit],div.wpforms-container-full .wpforms-form .wpforms-page-button,.page.woocommerce-cart .woocommerce a.button.alt,.page.woocommerce-cart .woocommerce a.button, .woocommerce-cart .woocommerce a.button.alt,.woocommerce-cart .woocommerce a.button,.woocommerce button.button,.wp-block-button__link{ font-style:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "button_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-button-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-button-font-size">'
                + '.course #commentform #submit, .course .submit, .course a.button, .course a.button:visited, .course a.comment-reply-link, .course button.button, .course input.button, .course input[type=submit], .course-container #commentform #submit, .course-container .submit, .course-container a.button, .course-container a.button:visited, .course-container a.comment-reply-link, .course-container button.button, .course-container input.button, .course-container input[type=submit], .lesson #commentform #submit, .lesson .submit, .lesson a.button, .lesson a.button:visited, .lesson a.comment-reply-link, .lesson button.button, .lesson input.button, .lesson input[type=submit], .quiz #commentform #submit, .quiz .submit, .quiz a.button, .quiz a.button:visited, .quiz a.comment-reply-link, .quiz button.button, .quiz input.button, .quiz input[type=submit], .page.front-page .button, .blog.front-page .button, .read-more-button .hentry .read-more .more-link, input[type=button], input[type=submit], button, .button, .wp-block-button__link, div.wpforms-container-full .wpforms-form input[type=submit], body div.wpforms-container-full .wpforms-form button[type=submit], div.wpforms-container-full .wpforms-form .wpforms-page-button,.read-more-button .hentry .read-more .more-link,input[type=button],input[type=submit],button,.button,.wp-block-button__link,div.wpforms-container-full .wpforms-form input[type=submit],div.wpforms-container-full .wpforms-form button[type=submit],div.wpforms-container-full .wpforms-form .wpforms-page-button,.page.woocommerce-cart .woocommerce a.button.alt,.page.woocommerce-cart .woocommerce a.button, .woocommerce-cart .woocommerce a.button.alt,.woocommerce-cart .woocommerce a.button,.woocommerce button.button,.wp-block-button__link{ font-size:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "button_tablet_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-button-tablet-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-button-tablet-font-size">'
                + '@media (max-width: 768px){.course #commentform #submit, .course .submit, .course a.button, .course a.button:visited, .course a.comment-reply-link, .course button.button, .course input.button, .course input[type=submit], .course-container #commentform #submit, .course-container .submit, .course-container a.button, .course-container a.button:visited, .course-container a.comment-reply-link, .course-container button.button, .course-container input.button, .course-container input[type=submit], .lesson #commentform #submit, .lesson .submit, .lesson a.button, .lesson a.button:visited, .lesson a.comment-reply-link, .lesson button.button, .lesson input.button, .lesson input[type=submit], .quiz #commentform #submit, .quiz .submit, .quiz a.button, .quiz a.button:visited, .quiz a.comment-reply-link, .quiz button.button, .quiz input.button, .quiz input[type=submit], .page.front-page .button, .blog.front-page .button, .read-more-button .hentry .read-more .more-link, input[type=button], input[type=submit], button, .button, .wp-block-button__link, div.wpforms-container-full .wpforms-form input[type=submit], body div.wpforms-container-full .wpforms-form button[type=submit], div.wpforms-container-full .wpforms-form .wpforms-page-button,.read-more-button .hentry .read-more .more-link,input[type=button],input[type=submit],button,.button,.wp-block-button__link,div.wpforms-container-full .wpforms-form input[type=submit],div.wpforms-container-full .wpforms-form button[type=submit],div.wpforms-container-full .wpforms-form .wpforms-page-button,.page.woocommerce-cart .woocommerce a.button.alt,.page.woocommerce-cart .woocommerce a.button, .woocommerce-cart .woocommerce a.button.alt,.woocommerce-cart .woocommerce a.button,.woocommerce button.button,.wp-block-button__link{ font-size:' + dataAndEvents +';}}'
                + '</style>'
            );

        } );
    } ), api( "button_mobile_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-button-mobile-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-button-mobile-font-size">'
                + '@media (max-width: 480px){.course #commentform #submit, .course .submit, .course a.button, .course a.button:visited, .course a.comment-reply-link, .course button.button, .course input.button, .course input[type=submit], .course-container #commentform #submit, .course-container .submit, .course-container a.button, .course-container a.button:visited, .course-container a.comment-reply-link, .course-container button.button, .course-container input.button, .course-container input[type=submit], .lesson #commentform #submit, .lesson .submit, .lesson a.button, .lesson a.button:visited, .lesson a.comment-reply-link, .lesson button.button, .lesson input.button, .lesson input[type=submit], .quiz #commentform #submit, .quiz .submit, .quiz a.button, .quiz a.button:visited, .quiz a.comment-reply-link, .quiz button.button, .quiz input.button, .quiz input[type=submit], .page.front-page .button, .blog.front-page .button, .read-more-button .hentry .read-more .more-link, input[type=button], input[type=submit], button, .button, .wp-block-button__link, div.wpforms-container-full .wpforms-form input[type=submit], body div.wpforms-container-full .wpforms-form button[type=submit], div.wpforms-container-full .wpforms-form .wpforms-page-button,.read-more-button .hentry .read-more .more-link,input[type=button],input[type=submit],button,.button,.wp-block-button__link,div.wpforms-container-full .wpforms-form input[type=submit],div.wpforms-container-full .wpforms-form button[type=submit],div.wpforms-container-full .wpforms-form .wpforms-page-button,.page.woocommerce-cart .woocommerce a.button.alt,.page.woocommerce-cart .woocommerce a.button, .woocommerce-cart .woocommerce a.button.alt,.woocommerce-cart .woocommerce a.button,.woocommerce button.button,.wp-block-button__link{ font-size:' + dataAndEvents +';}}'
                + '</style>'
            );

        } );
    } ), api( "button_typography[line-height]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-button-line-height' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-button-line-height">'
                + '.course #commentform #submit, .course .submit, .course a.button, .course a.button:visited, .course a.comment-reply-link, .course button.button, .course input.button, .course input[type=submit], .course-container #commentform #submit, .course-container .submit, .course-container a.button, .course-container a.button:visited, .course-container a.comment-reply-link, .course-container button.button, .course-container input.button, .course-container input[type=submit], .lesson #commentform #submit, .lesson .submit, .lesson a.button, .lesson a.button:visited, .lesson a.comment-reply-link, .lesson button.button, .lesson input.button, .lesson input[type=submit], .quiz #commentform #submit, .quiz .submit, .quiz a.button, .quiz a.button:visited, .quiz a.comment-reply-link, .quiz button.button, .quiz input.button, .quiz input[type=submit], .page.front-page .button, .blog.front-page .button, .read-more-button .hentry .read-more .more-link, input[type=button], input[type=submit], button, .button, .wp-block-button__link, div.wpforms-container-full .wpforms-form input[type=submit], body div.wpforms-container-full .wpforms-form button[type=submit], div.wpforms-container-full .wpforms-form .wpforms-page-button,.read-more-button .hentry .read-more .more-link,input[type=button],input[type=submit],button,.button,.wp-block-button__link,div.wpforms-container-full .wpforms-form input[type=submit],div.wpforms-container-full .wpforms-form button[type=submit],div.wpforms-container-full .wpforms-form .wpforms-page-button,.page.woocommerce-cart .woocommerce a.button.alt,.page.woocommerce-cart .woocommerce a.button, .woocommerce-cart .woocommerce a.button.alt,.woocommerce-cart .woocommerce a.button,.woocommerce button.button,.wp-block-button__link{ line-height:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "button_typography[letter-spacing]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-button-letter-spacing' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-button-letter-spacing">'
                + '.course #commentform #submit, .course .submit, .course a.button, .course a.button:visited, .course a.comment-reply-link, .course button.button, .course input.button, .course input[type=submit], .course-container #commentform #submit, .course-container .submit, .course-container a.button, .course-container a.button:visited, .course-container a.comment-reply-link, .course-container button.button, .course-container input.button, .course-container input[type=submit], .lesson #commentform #submit, .lesson .submit, .lesson a.button, .lesson a.button:visited, .lesson a.comment-reply-link, .lesson button.button, .lesson input.button, .lesson input[type=submit], .quiz #commentform #submit, .quiz .submit, .quiz a.button, .quiz a.button:visited, .quiz a.comment-reply-link, .quiz button.button, .quiz input.button, .quiz input[type=submit], .page.front-page .button, .blog.front-page .button, .read-more-button .hentry .read-more .more-link, input[type=button], input[type=submit], button, .button, .wp-block-button__link, div.wpforms-container-full .wpforms-form input[type=submit], body div.wpforms-container-full .wpforms-form button[type=submit], div.wpforms-container-full .wpforms-form .wpforms-page-button,.read-more-button .hentry .read-more .more-link,input[type=button],input[type=submit],button,.button,.wp-block-button__link,div.wpforms-container-full .wpforms-form input[type=submit],div.wpforms-container-full .wpforms-form button[type=submit],div.wpforms-container-full .wpforms-form .wpforms-page-button,.page.woocommerce-cart .woocommerce a.button.alt,.page.woocommerce-cart .woocommerce a.button, .woocommerce-cart .woocommerce a.button.alt,.woocommerce-cart .woocommerce a.button,.woocommerce button.button,.wp-block-button__link{ letter-spacing:' + dataAndEvents +'px;}'
                + '</style>'
            );

        } );
    } ), api( "button_typography[text-transform]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-button-text-transform' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-button-text-transform">'
                + '.course #commentform #submit, .course .submit, .course a.button, .course a.button:visited, .course a.comment-reply-link, .course button.button, .course input.button, .course input[type=submit], .course-container #commentform #submit, .course-container .submit, .course-container a.button, .course-container a.button:visited, .course-container a.comment-reply-link, .course-container button.button, .course-container input.button, .course-container input[type=submit], .lesson #commentform #submit, .lesson .submit, .lesson a.button, .lesson a.button:visited, .lesson a.comment-reply-link, .lesson button.button, .lesson input.button, .lesson input[type=submit], .quiz #commentform #submit, .quiz .submit, .quiz a.button, .quiz a.button:visited, .quiz a.comment-reply-link, .quiz button.button, .quiz input.button, .quiz input[type=submit], .page.front-page .button, .blog.front-page .button, .read-more-button .hentry .read-more .more-link, input[type=button], input[type=submit], button, .button, .wp-block-button__link, div.wpforms-container-full .wpforms-form input[type=submit], body div.wpforms-container-full .wpforms-form button[type=submit], div.wpforms-container-full .wpforms-form .wpforms-page-button,.read-more-button .hentry .read-more .more-link,input[type=button],input[type=submit],button,.button,.wp-block-button__link,div.wpforms-container-full .wpforms-form input[type=submit],div.wpforms-container-full .wpforms-form button[type=submit],div.wpforms-container-full .wpforms-form .wpforms-page-button,.page.woocommerce-cart .woocommerce a.button.alt,.page.woocommerce-cart .woocommerce a.button, .woocommerce-cart .woocommerce a.button.alt,.woocommerce-cart .woocommerce a.button,.woocommerce button.button,.wp-block-button__link{ text-transform:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "input_typography[font-family]", function( $swipe ) {
        $swipe.bind( function( pair ) {
            if ( pair ) {
                /** @type {string} */
                var fontName = pair.split(",")[0];
                fontName = fontName.replace(/'/g, '');
                var idfirst = ( fontName.trim().toLowerCase().replace( " ", "-" ), "customizer-typography-input-font-family" );
                var fontSize = fontName.replace( " ", "%20" );
                fontSize = fontSize.replace( ",", "%2C" );
                /** @type {string} */
                fontSize = responsive.googleFontsUrl + "/css?family=" + fontName + ":" + responsive.googleFontsWeight;
                if ( fontName in responsive.googleFonts ) {
                    if ( $( "#" + idfirst ).length ) {
                        $( "#" + idfirst ).attr( "href", fontSize );
                    } else {
                        $( "head" ).append( '<link id="' + idfirst + '" rel="stylesheet" type="text/css" href="' + fontSize + '">' );
                    }
                }
            }
            jQuery( 'style.customizer-typography-input-font-family' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-input-font-family">'
                + 'select,textarea,input[type=tel],input[type=email],input[type=number],input[type=search],input[type=text],input[type=date],input[type=datetime],input[type=datetime-local],input[type=month],input[type=password],input[type=range],input[type=time],input[type=url],input[type=week],div.wpforms-container-full .wpforms-form input[type=date],div.wpforms-container-full .wpforms-form input[type=datetime],div.wpforms-container-full .wpforms-form input[type=datetime-local],div.wpforms-container-full .wpforms-form input[type=email],div.wpforms-container-full .wpforms-form input[type=month],div.wpforms-container-full .wpforms-form input[type=number],div.wpforms-container-full .wpforms-form input[type=password],div.wpforms-container-full .wpforms-form input[type=range],div.wpforms-container-full .wpforms-form input[type=search],div.wpforms-container-full .wpforms-form input[type=tel],div.wpforms-container-full .wpforms-form input[type=text],div.wpforms-container-full .wpforms-form input[type=time],div.wpforms-container-full .wpforms-form input[type=url],div.wpforms-container-full .wpforms-form input[type=week],div.wpforms-container-full .wpforms-form select,div.wpforms-container-full .wpforms-form textarea{ font-family:' + pair +';}'
                + '</style>'
            );

        } );
    } ), api( "input_typography[font-weight]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-input-font-weight' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-input-font-weight">'
                + 'select,textarea,input[type=tel],input[type=email],input[type=number],input[type=search],input[type=text],input[type=date],input[type=datetime],input[type=datetime-local],input[type=month],input[type=password],input[type=range],input[type=time],input[type=url],input[type=week],div.wpforms-container-full .wpforms-form input[type=date],div.wpforms-container-full .wpforms-form input[type=datetime],div.wpforms-container-full .wpforms-form input[type=datetime-local],div.wpforms-container-full .wpforms-form input[type=email],div.wpforms-container-full .wpforms-form input[type=month],div.wpforms-container-full .wpforms-form input[type=number],div.wpforms-container-full .wpforms-form input[type=password],div.wpforms-container-full .wpforms-form input[type=range],div.wpforms-container-full .wpforms-form input[type=search],div.wpforms-container-full .wpforms-form input[type=tel],div.wpforms-container-full .wpforms-form input[type=text],div.wpforms-container-full .wpforms-form input[type=time],div.wpforms-container-full .wpforms-form input[type=url],div.wpforms-container-full .wpforms-form input[type=week],div.wpforms-container-full .wpforms-form select,div.wpforms-container-full .wpforms-form textarea{ font-weight:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "input_typography[font-style]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-input-font-style' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-input-font-style">'
                + 'select,textarea,input[type=tel],input[type=email],input[type=number],input[type=search],input[type=text],input[type=date],input[type=datetime],input[type=datetime-local],input[type=month],input[type=password],input[type=range],input[type=time],input[type=url],input[type=week],div.wpforms-container-full .wpforms-form input[type=date],div.wpforms-container-full .wpforms-form input[type=datetime],div.wpforms-container-full .wpforms-form input[type=datetime-local],div.wpforms-container-full .wpforms-form input[type=email],div.wpforms-container-full .wpforms-form input[type=month],div.wpforms-container-full .wpforms-form input[type=number],div.wpforms-container-full .wpforms-form input[type=password],div.wpforms-container-full .wpforms-form input[type=range],div.wpforms-container-full .wpforms-form input[type=search],div.wpforms-container-full .wpforms-form input[type=tel],div.wpforms-container-full .wpforms-form input[type=text],div.wpforms-container-full .wpforms-form input[type=time],div.wpforms-container-full .wpforms-form input[type=url],div.wpforms-container-full .wpforms-form input[type=week],div.wpforms-container-full .wpforms-form select,div.wpforms-container-full .wpforms-form textarea{ font-style:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "input_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-input-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-input-font-size">'
                + 'select,textarea,input[type=tel],input[type=email],input[type=number],input[type=search],input[type=text],input[type=date],input[type=datetime],input[type=datetime-local],input[type=month],input[type=password],input[type=range],input[type=time],input[type=url],input[type=week],div.wpforms-container-full .wpforms-form input[type=date],div.wpforms-container-full .wpforms-form input[type=datetime],div.wpforms-container-full .wpforms-form input[type=datetime-local],div.wpforms-container-full .wpforms-form input[type=email],div.wpforms-container-full .wpforms-form input[type=month],div.wpforms-container-full .wpforms-form input[type=number],div.wpforms-container-full .wpforms-form input[type=password],div.wpforms-container-full .wpforms-form input[type=range],div.wpforms-container-full .wpforms-form input[type=search],div.wpforms-container-full .wpforms-form input[type=tel],div.wpforms-container-full .wpforms-form input[type=text],div.wpforms-container-full .wpforms-form input[type=time],div.wpforms-container-full .wpforms-form input[type=url],div.wpforms-container-full .wpforms-form input[type=week],div.wpforms-container-full .wpforms-form select,div.wpforms-container-full .wpforms-form textarea{ font-size:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "input_tablet_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-input-tablet-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-input-tablet-font-size">'
                + '@media (max-width: 768px){select,textarea,input[type=tel],input[type=email],input[type=number],input[type=search],input[type=text],input[type=date],input[type=datetime],input[type=datetime-local],input[type=month],input[type=password],input[type=range],input[type=time],input[type=url],input[type=week],div.wpforms-container-full .wpforms-form input[type=date],div.wpforms-container-full .wpforms-form input[type=datetime],div.wpforms-container-full .wpforms-form input[type=datetime-local],div.wpforms-container-full .wpforms-form input[type=email],div.wpforms-container-full .wpforms-form input[type=month],div.wpforms-container-full .wpforms-form input[type=number],div.wpforms-container-full .wpforms-form input[type=password],div.wpforms-container-full .wpforms-form input[type=range],div.wpforms-container-full .wpforms-form input[type=search],div.wpforms-container-full .wpforms-form input[type=tel],div.wpforms-container-full .wpforms-form input[type=text],div.wpforms-container-full .wpforms-form input[type=time],div.wpforms-container-full .wpforms-form input[type=url],div.wpforms-container-full .wpforms-form input[type=week],div.wpforms-container-full .wpforms-form select,div.wpforms-container-full .wpforms-form textarea{ font-size:' + dataAndEvents +';}}'
                + '</style>'
            );

        } );
    } ), api( "input_mobile_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-input-mobile-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-input-mobile-font-size">'
                + '@media (max-width: 480px){select,textarea,input[type=tel],input[type=email],input[type=number],input[type=search],input[type=text],input[type=date],input[type=datetime],input[type=datetime-local],input[type=month],input[type=password],input[type=range],input[type=time],input[type=url],input[type=week],div.wpforms-container-full .wpforms-form input[type=date],div.wpforms-container-full .wpforms-form input[type=datetime],div.wpforms-container-full .wpforms-form input[type=datetime-local],div.wpforms-container-full .wpforms-form input[type=email],div.wpforms-container-full .wpforms-form input[type=month],div.wpforms-container-full .wpforms-form input[type=number],div.wpforms-container-full .wpforms-form input[type=password],div.wpforms-container-full .wpforms-form input[type=range],div.wpforms-container-full .wpforms-form input[type=search],div.wpforms-container-full .wpforms-form input[type=tel],div.wpforms-container-full .wpforms-form input[type=text],div.wpforms-container-full .wpforms-form input[type=time],div.wpforms-container-full .wpforms-form input[type=url],div.wpforms-container-full .wpforms-form input[type=week],div.wpforms-container-full .wpforms-form select,div.wpforms-container-full .wpforms-form textarea{ font-size:' + dataAndEvents +';}}'
                + '</style>'
            );

        } );
    } ), api( "input_typography[line-height]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-input-line-height' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-input-line-height">'
                + 'select,textarea,input[type=tel],input[type=email],input[type=number],input[type=search],input[type=text],input[type=date],input[type=datetime],input[type=datetime-local],input[type=month],input[type=password],input[type=range],input[type=time],input[type=url],input[type=week],div.wpforms-container-full .wpforms-form input[type=date],div.wpforms-container-full .wpforms-form input[type=datetime],div.wpforms-container-full .wpforms-form input[type=datetime-local],div.wpforms-container-full .wpforms-form input[type=email],div.wpforms-container-full .wpforms-form input[type=month],div.wpforms-container-full .wpforms-form input[type=number],div.wpforms-container-full .wpforms-form input[type=password],div.wpforms-container-full .wpforms-form input[type=range],div.wpforms-container-full .wpforms-form input[type=search],div.wpforms-container-full .wpforms-form input[type=tel],div.wpforms-container-full .wpforms-form input[type=text],div.wpforms-container-full .wpforms-form input[type=time],div.wpforms-container-full .wpforms-form input[type=url],div.wpforms-container-full .wpforms-form input[type=week],div.wpforms-container-full .wpforms-form select,div.wpforms-container-full .wpforms-form textarea{ line-height:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "input_typography[letter-spacing]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-input-letter-spacing' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-input-letter-spacing">'
                + 'select,textarea,input[type=tel],input[type=email],input[type=number],input[type=search],input[type=text],input[type=date],input[type=datetime],input[type=datetime-local],input[type=month],input[type=password],input[type=range],input[type=time],input[type=url],input[type=week],div.wpforms-container-full .wpforms-form input[type=date],div.wpforms-container-full .wpforms-form input[type=datetime],div.wpforms-container-full .wpforms-form input[type=datetime-local],div.wpforms-container-full .wpforms-form input[type=email],div.wpforms-container-full .wpforms-form input[type=month],div.wpforms-container-full .wpforms-form input[type=number],div.wpforms-container-full .wpforms-form input[type=password],div.wpforms-container-full .wpforms-form input[type=range],div.wpforms-container-full .wpforms-form input[type=search],div.wpforms-container-full .wpforms-form input[type=tel],div.wpforms-container-full .wpforms-form input[type=text],div.wpforms-container-full .wpforms-form input[type=time],div.wpforms-container-full .wpforms-form input[type=url],div.wpforms-container-full .wpforms-form input[type=week],div.wpforms-container-full .wpforms-form select,div.wpforms-container-full .wpforms-form textarea{ letter-spacing:' + dataAndEvents +'px;}'
                + '</style>'
            );

        } );
    } ), api( "input_typography[text-transform]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-input-text-transform' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-input-text-transform">'
                + 'select,textarea,input[type=tel],input[type=email],input[type=number],input[type=search],input[type=text],input[type=date],input[type=datetime],input[type=datetime-local],input[type=month],input[type=password],input[type=range],input[type=time],input[type=url],input[type=week],div.wpforms-container-full .wpforms-form input[type=date],div.wpforms-container-full .wpforms-form input[type=datetime],div.wpforms-container-full .wpforms-form input[type=datetime-local],div.wpforms-container-full .wpforms-form input[type=email],div.wpforms-container-full .wpforms-form input[type=month],div.wpforms-container-full .wpforms-form input[type=number],div.wpforms-container-full .wpforms-form input[type=password],div.wpforms-container-full .wpforms-form input[type=range],div.wpforms-container-full .wpforms-form input[type=search],div.wpforms-container-full .wpforms-form input[type=tel],div.wpforms-container-full .wpforms-form input[type=text],div.wpforms-container-full .wpforms-form input[type=time],div.wpforms-container-full .wpforms-form input[type=url],div.wpforms-container-full .wpforms-form input[type=week],div.wpforms-container-full .wpforms-form select,div.wpforms-container-full .wpforms-form textarea{ text-transform:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "header_site_title_typography[font-family]", function( $swipe ) {
        $swipe.bind( function( pair ) {
            if ( pair ) {
                /** @type {string} */
                var fontName = pair.split(",")[0];
                fontName = fontName.replace(/'/g, '');
                var idfirst = ( fontName.trim().toLowerCase().replace( " ", "-" ), "customizer-typography-header_site_title-font-family" );
                var fontSize = fontName.replace( " ", "%20" );
                fontSize = fontSize.replace( ",", "%2C" );
                /** @type {string} */
                fontSize = responsive.googleFontsUrl + "/css?family=" + fontName + ":" + responsive.googleFontsWeight;
                if ( fontName in responsive.googleFonts ) {
                    if ( $( "#" + idfirst ).length ) {
                        $( "#" + idfirst ).attr( "href", fontSize );
                    } else {
                        $( "head" ).append( '<link id="' + idfirst + '" rel="stylesheet" type="text/css" href="' + fontSize + '">' );
                    }
                }
            }
            jQuery( 'style.customizer-typography-header_site_title-font-family' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_site_title-font-family">'
                + '.site-title a{ font-family:' + pair +';}'
                + '</style>'
            );

        } );
    } ),api( "header_site_title_typography[font-weight]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_site_title-font-weight' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_site_title-font-weight">'
                + '.site-title a{ font-weight:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "header_site_title_typography[font-style]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_site_title-font-style' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_site_title-font-style">'
                + '.site-title{ font-style:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "header_site_title_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_site_title-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_site_title-font-size">'
                + '.site-title a{ font-size:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "header_site_title_tablet_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_site_title-tablet-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_site_title-tablet-font-size">'
                + '@media (max-width: 768px){.site-title a{ font-size:' + dataAndEvents +';}}'
                + '</style>'
            );

        } );
    } ), api( "header_site_title_mobile_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_site_title-mobile-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_site_title-mobile-font-size">'
                + '@media (max-width: 480px){.site-title a{ font-size:' + dataAndEvents +';}}'
                + '</style>'
            );

        } );
    } ), api( "header_site_title_typography[line-height]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_site_title-line-height' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_site_title-line-height">'
                + '.site-title{ line-height:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "header_site_title_typography[letter-spacing]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_site_title-letter-spacing' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_site_title-letter-spacing">'
                + '.site-title{ letter-spacing:' + dataAndEvents +'px;}'
                + '</style>'
            );

        } );
    } ), api( "header_site_title_typography[text-transform]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_site_title-text-transform' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_site_title-text-transform">'
                + '.site-title{ text-transform:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "header_site_tagline_typography[font-family]", function( $swipe ) {
        $swipe.bind( function( pair ) {
            if ( pair ) {
                /** @type {string} */
                var fontName = pair.split(",")[0];
                fontName = fontName.replace(/'/g, '');
                var idfirst = ( fontName.trim().toLowerCase().replace( " ", "-" ), "customizer-typography-header_site_tagline-font-family" );
                var fontSize = fontName.replace( " ", "%20" );
                fontSize = fontSize.replace( ",", "%2C" );
                /** @type {string} */
                fontSize = responsive.googleFontsUrl + "/css?family=" + fontName + ":" + responsive.googleFontsWeight;
                if ( fontName in responsive.googleFonts ) {
                    if ( $( "#" + idfirst ).length ) {
                        $( "#" + idfirst ).attr( "href", fontSize );
                    } else {
                        $( "head" ).append( '<link id="' + idfirst + '" rel="stylesheet" type="text/css" href="' + fontSize + '">' );
                    }
                }
            }
            jQuery( 'style.customizer-typography-header_site_tagline-font-family' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_site_tagline-font-family">'
                + '.site-description{ font-family:' + pair +';}'
                + '</style>'
            );

        } );
    } ), api( "header_site_tagline_typography[font-weight]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_site_tagline-font-weight' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_site_tagline-font-weight">'
                + '.site-description{ font-weight:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "header_site_tagline_typography[font-style]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_site_tagline-font-style' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_site_tagline-font-style">'
                + '.site-description{ font-style:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "header_site_tagline_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_site_tagline-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_site_tagline-font-size">'
                + '.site-description{ font-size:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "header_site_tagline_tablet_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_site_tagline-tablet-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_site_tagline-tablet-font-size">'
                + '@media (max-width: 768px){.site-description{ font-size:' + dataAndEvents +';}}'
                + '</style>'
            );

        } );
    } ), api( "header_site_tagline_mobile_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_site_tagline-mobile-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_site_tagline-mobile-font-size">'
                + '@media (max-width: 480px){.site-description{ font-size:' + dataAndEvents +';}}'
                + '</style>'
            );

        } );
    } ), api( "header_site_tagline_typography[line-height]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_site_tagline-line-height' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_site_tagline-line-height">'
                + '.site-description{ line-height:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "header_site_tagline_typography[letter-spacing]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_site_tagline-letter-spacing' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_site_tagline-letter-spacing">'
                + '.site-description{ letter-spacing:' + dataAndEvents +'px;}'
                + '</style>'
            );

        } );
    } ), api( "header_site_tagline_typography[text-transform]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_site_tagline-text-transform' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_site_tagline-text-transform">'
                + '.site-description{ text-transform:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "header_widgets_typography[font-family]", function( $swipe ) {
        $swipe.bind( function( pair ) {
            if ( pair ) {
                /** @type {string} */
                var fontName = pair.split(",")[0];
                fontName = fontName.replace(/'/g, '');
                var idfirst = ( fontName.trim().toLowerCase().replace( " ", "-" ), "customizer-typography-header_widgets-font-family" );
                var fontSize = fontName.replace( " ", "%20" );
                fontSize = fontSize.replace( ",", "%2C" );
                /** @type {string} */
                fontSize = responsive.googleFontsUrl + "/css?family=" + fontName + ":" + responsive.googleFontsWeight;
                if ( fontName in responsive.googleFonts ) {
                    if ( $( "#" + idfirst ).length ) {
                        $( "#" + idfirst ).attr( "href", fontSize );
                    } else {
                        $( "head" ).append( '<link id="' + idfirst + '" rel="stylesheet" type="text/css" href="' + fontSize + '">' );
                    }
                }
            }
            jQuery( 'style.customizer-typography-header_widgets-font-family' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_widgets-font-family">'
                + '.header-widgets{ font-family:' + pair +';}'
                + '</style>'
            );

        } );
    } ), api( "header_widgets_typography[font-weight]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_widgets-font-weight' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_widgets-font-weight">'
                + '.header-widgets{ font-weight:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "header_widgets_typography[font-style]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_widgets-font-style' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_widgets-font-style">'
                + '.header-widgets{ font-style:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "header_widgets_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_widgets-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_widgets-font-size">'
                + '.header-widgets{ font-size:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "header_widgets_tablet_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_widgets-tablet-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_widgets-tablet-font-size">'
                + '@media (max-width: 768px){.header-widgets{ font-size:' + dataAndEvents +';}}'
                + '</style>'
            );

        } );
    } ), api( "header_widgets_mobile_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_widgets-mobile-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_widgets-mobile-font-size">'
                + '@media (max-width: 480px){.header-widgets{ font-size:' + dataAndEvents +';}}'
                + '</style>'
            );

        } );
    } ), api( "header_widgets_typography[line-height]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_widgets-line-height' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_widgets-line-height">'
                + '.header-widgets{ line-height:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "header_widgets_typography[letter-spacing]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_widgets-letter-spacing' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_widgets-letter-spacing">'
                + '.header-widgets{ letter-spacing:' + dataAndEvents +'px;}'
                + '</style>'
            );

        } );
    } ), api( "header_widgets_typography[text-transform]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_widgets-text-transform' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_widgets-text-transform">'
                + '.header-widgets{ text-transform:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "header_menu_typography[font-family]", function( $swipe ) {
        $swipe.bind( function( pair ) {
            if ( pair ) {
                /** @type {string} */
                var fontName = pair.split(",")[0];
                fontName = fontName.replace(/'/g, '');
                var idfirst = ( fontName.trim().toLowerCase().replace( " ", "-" ), "customize-control-header_menu_typography-font-family" );
                var fontSize = fontName.replace( " ", "%20" );
                fontSize = fontSize.replace( ",", "%2C" );
                /** @type {string} */
                fontSize = responsive.googleFontsUrl + "/css?family=" + fontName + ":" + responsive.googleFontsWeight;
                if ( fontName in responsive.googleFonts ) {
                    if ($("#" + idfirst).length) {
                        $("#" + idfirst).attr("href", fontSize);
                    } else {
                        $("head").append('<link id="' + idfirst + '" rel="stylesheet" type="text/css" href="' + fontSize + '">');
                    }
                }
            }
            jQuery( 'style.customizer-typography-header_menu_typography-font-family' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_menu_typography-font-family">'
                + '.main-navigation a{ font-family:' + pair +';}'
                + '</style>'
            );

        } );
    } ), api( "header_menu_typography[font-weight]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_menu_typography-font-weight' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_menu_typography-font-weight">'
                + '.main-navigation a{ font-weight:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "header_menu_typography[font-style]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_menu-font-style' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_menu_typography-font-style">'
                + '.main-navigation a{ font-style:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "header_menu_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_menu_typography-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_menu_typography-font-size">'
                + '.main-navigation a{ font-size:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "header_menu_tablet_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_menu_typography-tablet-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_menu_typography-tablet-font-size">'
                + '@media (max-width: 768px){.main-navigation a{ font-size:' + dataAndEvents +';}}'
                + '</style>'
            );

        } );
    } ), api( "header_menu_mobile_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_menu_typography-mobile-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_menu_typography-mobile-font-size">'
                + '@media (max-width: 480px){.main-navigation a{ font-size:' + dataAndEvents +';}}'
                + '</style>'
            );

        } );
    } ), api( "header_menu_typography[line-height]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_menu_typography-line-height' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_menu_typography-line-height">'
                + '.main-navigation a{ line-height:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "header_menu_typography[letter-spacing]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_menu_typography-letter-spacing' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_menu_typography-letter-spacing">'
                + '.main-navigation a{ letter-spacing:' + dataAndEvents +'px;}'
                + '</style>'
            );

        } );
    } ), api( "header_menu_typography[text-transform]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-header_menu_typography-text-transform' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-header_menu_typography-text-transform">'
                + '.main-navigation a{ text-transform:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "sidebar_typography[font-family]", function( $swipe ) {
        $swipe.bind( function( pair ) {
            if ( pair ) {
                /** @type {string} */
                var fontName = pair.split(",")[0];
                fontName = fontName.replace(/'/g, '');
                var idfirst = ( fontName.trim().toLowerCase().replace( " ", "-" ), "customize-control-sidebar_typography-font-family" );
                var fontSize = fontName.replace( " ", "%20" );
                fontSize = fontSize.replace( ",", "%2C" );
                /** @type {string} */
                fontSize = responsive.googleFontsUrl + "/css?family=" + fontName + ":" + responsive.googleFontsWeight;
                if ( fontName in responsive.googleFonts ) {
                    if ($("#" + idfirst).length) {
                        $("#" + idfirst).attr("href", fontSize);
                    } else {
                        $("head").append('<link id="' + idfirst + '" rel="stylesheet" type="text/css" href="' + fontSize + '">');
                    }
                }
            }
            jQuery( 'style.customizer-typography-sidebar_typography-font-family' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-sidebar_typography-font-family">'
                + '.site-content .widget-area:not(.home-widgets) .widget-wrapper{ font-family:' + pair +';}'
                + '</style>'
            );

        } );
    } ), api( "sidebar_typography[font-weight]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-sidebar_typography-font-weight' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-sidebar_typography-font-weight">'
                + '.site-content .widget-area:not(.home-widgets) .widget-wrapper { font-weight:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "sidebar_typography[font-style]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-sidebar_typography-font-style' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-sidebar_typography-font-style">'
                + '.site-content .widget-area:not(.home-widgets) .widget-wrapper { font-style:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "sidebar_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-sidebar_typography-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-sidebar_typography-font-size">'
                + '.site-content .widget-area:not(.home-widgets) .widget-wrapper { font-size:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "sidebar_tablet_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-sidebar_typography-tablet-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-sidebar_typography-tablet-font-size">'
                + '@media (max-width: 768px){.site-content .widget-area:not(.home-widgets) .widget-wrapper { font-size:' + dataAndEvents +';}}'
                + '</style>'
            );

        } );
    } ), api( "sidebar_mobile_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-sidebar_typography-mobile-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-sidebar_typography-mobile-font-size">'
                + '@media (max-width: 480px){.site-content .widget-area:not(.home-widgets) .widget-wrapper { font-size:' + dataAndEvents +';}}'
                + '</style>'
            );

        } );
    } ), api( "sidebar_typography[line-height]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-sidebar_typography-line-height' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-sidebar_typography-line-height">'
                + '.site-content .widget-area:not(.home-widgets) .widget-wrapper { line-height:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "sidebar_typography[letter-spacing]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-sidebar_typography-letter-spacing' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-sidebar_typography-letter-spacing">'
                + '.site-content .widget-area:not(.home-widgets) .widget-wrapper { letter-spacing:' + dataAndEvents +'px;}'
                + '</style>'
            );

        } );
    } ), api( "sidebar_typography[text-transform]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-sidebar_typography-text-transform' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-sidebar_typography-text-transform">'
                + '.site-content .widget-area:not(.home-widgets) .widget-wrapper { text-transform:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "content_header_heading_typography[font-family]", function( $swipe ) {
        $swipe.bind( function( pair ) {
            if ( pair ) {
                /** @type {string} */
                var fontName = pair.split(",")[0];
                fontName = fontName.replace(/'/g, '');
                var idfirst = ( fontName.trim().toLowerCase().replace( " ", "-" ), "customizer-typography-content_header_heading-font-family" );
                var fontSize = fontName.replace( " ", "%20" );
                fontSize = fontSize.replace( ",", "%2C" );
                /** @type {string} */
                fontSize = responsive.googleFontsUrl + "/css?family=" + fontName + ":" + responsive.googleFontsWeight;
                if ( fontName in responsive.googleFonts ) {
                    if ($("#" + idfirst).length) {
                        $("#" + idfirst).attr("href", fontSize);
                    } else {
                        $("head").append('<link id="' + idfirst + '" rel="stylesheet" type="text/css" href="' + fontSize + '">');
                    }
                }
            }
            jQuery( 'style.customizer-typography-content_header_heading-font-family' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-content_header_heading-font-family">'
                + '.site-content-header .page-header .page-title,.site-content-header .page-title{ font-family:' + pair +';}'
                + '</style>'
            );

        } );
    } ), api( "content_header_heading_typography[font-weight]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-content_header_heading-font-weight' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-content_header_heading-font-weight">'
                + '.site-content-header .page-header .page-title,.site-content-header .page-title{ font-weight:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "content_header_heading_typography[font-style]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-content_header_heading-font-style' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-content_header_heading-font-style">'
                + '.site-content-header .page-header .page-title,.site-content-header .page-title{ font-style:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "content_header_heading_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-content_header_heading-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-content_header_heading-font-size">'
                + '.site-content-header .page-header .page-title,.site-content-header .page-title{ font-size:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "content_header_heading_tablet_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-content_header_heading-tablet-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-content_header_heading-tablet-font-size">'
                + '@media (max-width: 768px){.site-content-header .page-header .page-title,.site-content-header .page-title{ font-size:' + dataAndEvents +';}}'
                + '</style>'
            );

        } );
    } ), api( "content_header_heading_mobile_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-content_header_heading-mobile-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-content_header_heading-mobile-font-size">'
                + '@media (max-width: 480px){.site-content-header .page-header .page-title,.site-content-header .page-title{ font-size:' + dataAndEvents +';}}'
                + '</style>'
            );

        } );
    } ), api( "content_header_heading_typography[line-height]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-content_header_heading-line-height' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-content_header_heading-line-height">'
                + '.site-content-header .page-header .page-title,.site-content-header .page-title{ line-height:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "content_header_heading_typography[letter-spacing]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-content_header_heading-letter-spacing' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-content_header_heading-letter-spacing">'
                + '.site-content-header .page-header .page-title,.site-content-header .page-title{ letter-spacing:' + dataAndEvents +'px;}'
                + '</style>'
            );

        } );
    } ), api( "content_header_heading_typography[text-transform]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-content_header_heading-text-transform' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-content_header_heading-text-transform">'
                + '.site-content-header .page-header .page-title,.site-content-header .page-title{ text-transform:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "content_header_description_typography[font-family]", function( $swipe ) {
        $swipe.bind( function( pair ) {
            if ( pair ) {
                /** @type {string} */
                var fontName = pair.split(",")[0];
                fontName = fontName.replace(/'/g, '');
                var idfirst = ( fontName.trim().toLowerCase().replace( " ", "-" ), "customizer-typography-content_header_description-font-family" );
                var fontSize = fontName.replace( " ", "%20" );
                fontSize = fontSize.replace( ",", "%2C" );
                /** @type {string} */
                fontSize = responsive.googleFontsUrl + "/css?family=" + fontName + ":" + responsive.googleFontsWeight;
                if ( fontName in responsive.googleFonts ) {
                    if ($("#" + idfirst).length) {
                        $("#" + idfirst).attr("href", fontSize);
                    } else {
                        $("head").append('<link id="' + idfirst + '" rel="stylesheet" type="text/css" href="' + fontSize + '">');
                    }
                }
            }
            jQuery( 'style.customizer-typography-content_header_description-font-family' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-content_header_description-font-family">'
                + '.site-content-header .page-header .page-description{ font-family:' + pair +';}'
                + '</style>'
            );
            var $child = $( ".customizer-typography-content_header_description-font-family" );
            if ( pair ) {
                /** @type {string} */
                var img = '<style class="customizer-typography-content_header_description-font-family">.site-content-header .page-header .page-description{font-family: ' + pair + ";}</style>";
                if ( $child.length ) {
                    $child.replaceWith( img );
                } else {
                    $( "head" ).append( img );
                }
            } else {
                $child.remove();
            }
        } );
    } ), api( "content_header_description_typography[font-weight]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-content_header_description-font-weight' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-content_header_description-font-weight">'
                + '.site-content-header .page-header .page-description{ font-weight:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "content_header_description_typography[font-style]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-content_header_description-font-style' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-content_header_description-font-style">'
                + '.site-content-header .page-header .page-description{ font-style:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "content_header_description_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-content_header_description-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-content_header_description-font-size">'
                + '.site-content-header .page-header .page-description{ font-size:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "content_header_description_tablet_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-content_header_description-tablet-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-content_header_description-tablet-font-size">'
                + '@media (max-width: 768px){.site-content-header .page-header .page-description{ font-size:' + dataAndEvents +';}}'
                + '</style>'
            );

        } );
    } ), api( "content_header_description_mobile_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-content_header_description-mobile-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-content_header_description-mobile-font-size">'
                + '@media (max-width: 480px){.site-content-header .page-header .page-description{ font-size:' + dataAndEvents +';}}'
                + '</style>'
            );

        } );
    } ), api( "content_header_description_typography[line-height]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-content_header_description-line-height' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-content_header_description-line-height">'
                + '.site-content-header .page-header .page-description{ line-height:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "content_header_description_typography[letter-spacing]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-content_header_description-letter-spacing' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-content_header_description-letter-spacing">'
                + '.site-content-header .page-header .page-description{ letter-spacing:' + dataAndEvents +'px;}'
                + '</style>'
            );

        } );
    } ), api( "content_header_description_typography[text-transform]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-content_header_description-text-transform' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-content_header_description-text-transform">'
                + '.site-content-header .page-header .page-description{ text-transform:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "breadcrumb_typography[font-family]", function( $swipe ) {
        $swipe.bind( function( pair ) {
            if ( pair ) {
                /** @type {string} */
                var fontName = pair.split(",")[0];
                fontName = fontName.replace(/'/g, '');
                var idfirst = ( fontName.trim().toLowerCase().replace( " ", "-" ), "customizer-typography-breadcrumb-font-family" );
                var fontSize = fontName.replace( " ", "%20" );
                fontSize = fontSize.replace( ",", "%2C" );
                /** @type {string} */
                fontSize = responsive.googleFontsUrl + "/css?family=" + fontName + ":" + responsive.googleFontsWeight;
                if ( fontName in responsive.googleFonts ) {
                    if ($("#" + idfirst).length) {
                        $("#" + idfirst).attr("href", fontSize);
                    } else {
                        $("head").append('<link id="' + idfirst + '" rel="stylesheet" type="text/css" href="' + fontSize + '">');
                    }
                }
            }
            jQuery( 'style.customizer-typography-breadcrumb-font-family' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-breadcrumb-font-family">'
                + '.site-content-header .breadcrumb-list,.woocommerce .woocommerce-breadcrumb{ font-family:' + pair +';}'
                + '</style>'
            );

        } );
    } ),  api( "breadcrumb_typography[font-weight]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-breadcrumb-font-weight' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-breadcrumb-font-weight">'
                + '.site-content-header .breadcrumb-list,.woocommerce .woocommerce-breadcrumb{ font-weight:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "breadcrumb_typography[font-style]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-breadcrumb-font-style' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-breadcrumb-font-style">'
                + '.site-content-header .breadcrumb-list,.woocommerce .woocommerce-breadcrumb{ font-style:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "breadcrumb_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-breadcrumb-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-breadcrumb-font-size">'
                + '.site-content-header .breadcrumb-list,.woocommerce .woocommerce-breadcrumb{ font-size:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "breadcrumb_tablet_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-breadcrumb-tablet-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-breadcrumb-tablet-font-size">'
                + '@media (max-width: 768px){.site-content-header .breadcrumb-list,.woocommerce .woocommerce-breadcrumb{ font-size:' + dataAndEvents +';}}'
                + '</style>'
            );

        } );
    } ), api( "breadcrumb_mobile_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-breadcrumb-mobile-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-breadcrumb-mobile-font-size">'
                + '@media (max-width: 480px){.site-content-header .breadcrumb-list,.woocommerce .woocommerce-breadcrumb{ font-size:' + dataAndEvents +';}}'
                + '</style>'
            );

        } );
    } ), api( "breadcrumb_typography[line-height]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-breadcrumb-line-height' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-breadcrumb-line-height">'
                + '.site-content-header .breadcrumb-list,.woocommerce .woocommerce-breadcrumb{ line-height:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "breadcrumb_typography[letter-spacing]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-breadcrumb-letter-spacing' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-breadcrumb-letter-spacing">'
                + '.site-content-header .breadcrumb-list,.woocommerce .woocommerce-breadcrumb{ letter-spacing:' + dataAndEvents +'px;}'
                + '</style>'
            );

        } );
    } ), api( "breadcrumb_typography[text-transform]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-breadcrumb-text-transform' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-breadcrumb-text-transform">'
                + '.site-content-header .breadcrumb-list,.woocommerce .woocommerce-breadcrumb{ text-transform:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "footer_typography[font-family]", function( $swipe ) {
        $swipe.bind( function( pair ) {
            if ( pair ) {
                /** @type {string} */
                var fontName = pair.split(",")[0];
                fontName = fontName.replace(/'/g, '');
                var idfirst = ( fontName.trim().toLowerCase().replace( " ", "-" ), "customize-control-footer_typography-font-family" );
                var fontSize = fontName.replace( " ", "%20" );
                fontSize = fontSize.replace( ",", "%2C" );
                /** @type {string} */
                fontSize = responsive.googleFontsUrl + "/css?family=" + fontName + ":" + responsive.googleFontsWeight;
                if ( fontName in responsive.googleFonts ) {
                    if ($("#" + idfirst).length) {
                        $("#" + idfirst).attr("href", fontSize);
                    } else {
                        $("head").append('<link id="' + idfirst + '" rel="stylesheet" type="text/css" href="' + fontSize + '">');
                    }
                }
            }
            jQuery( 'style.customizer-typography-footer_typography-font-family' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-footer_typography-font-family">'
                + '.site-footer{ font-family:' + pair +';}'
                + '</style>'
            );
        } );
    } ),  api( "footer_typography[font-weight]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-footer_typography-font-weight' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-footer_typography-font-weight">'
                + '.site-footer{ font-weight:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "footer_typography[font-style]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-footer_typography-font-style' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-footer_typography-font-style">'
                + '.site-footer{ font-style:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "footer_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-footer_typography-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-footer_typography-font-size">'
                + '.site-footer{ font-size:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "footer_typography_tablet_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-footer_typography-tablet-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-footer_typography-tablet-font-size">'
                + '@media (max-width: 768px){.site-footer{ font-size:' + dataAndEvents +';}}'
                + '</style>'
            );

        } );
    } ), api( "footer_typography_mobile_typography[font-size]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-footer_typography-mobile-font-size' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-footer_typography-mobile-font-size">'
                + '@media (max-width: 480px){.site-footer{ font-size:' + dataAndEvents +';}}'
                + '</style>'
            );

        } );
    } ), api( "footer_typography[line-height]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-footer_typography-line-height' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-footer_typography-line-height">'
                + '.site-footer{ line-height:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } ), api( "footer_typography[letter-spacing]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-footer_typography-letter-spacing' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-footer_typography-letter-spacing">'
                + '.site-footer{ letter-spacing:' + dataAndEvents +'px;}'
                + '</style>'
            );

        } );
    } ), api( "footer_typography[text-transform]", function( $swipe ) {
        $swipe.bind( function( dataAndEvents ) {
            jQuery( 'style.customizer-typography-footer_typography-text-transform' ).remove();
            jQuery( 'head' ).append(
                '<style class="customizer-typography-footer_typography-text-transform">'
                + '.site-footer{ text-transform:' + dataAndEvents +';}'
                + '</style>'
            );

        } );
    } );

} )( jQuery );
