/**
 * Update Customizer settings live.
 *
 * @version 1.0.0
 *
 * @since 2.0
 */

 ( function( $ ) {

    // Declare vars
	var api 				= wp.customize,
    body 				= $( 'body' ),
    siteHeader 			= $( '#site-header' ),
    llmsCol = [
        '1',
        '2',
        '3',
        '4',
        '5',
        '6'
    ],
    llmsTabletCol = [
        'tablet-1-col',
        'tablet-2-col',
        'tablet-3-col',
        'tablet-4-col',
        'tablet-5-col',
        'tablet-6-col'
    ],
    llmsMobileCol = [
        'mobile-1-col',
        'mobile-2-col',
        'mobile-3-col',
        'mobile-4-col',
        'mobile-5-col',
        'mobile-6-col'
    ];

    	/******** LifterLMS *********/
		// Courses columns
		api('lifterlms_columns', function( value ) {
			value.bind( function( newval ) {
				var coursesCol = $( '.llms-loop-list.llms-course-list' );
				if ( coursesCol.length ) {
					$.each( llmsCol, function( i, v ) {
						coursesCol.removeClass( 'cols-'+ v );
					});
					coursesCol.addClass( 'cols-'+ newval );
				}
			});
		});



	// Theme Options -> Layout
    //Width
		api( 'lifterlms_width', function( $swipe ) {
			$swipe.bind(
				function( newval ) {

					jQuery( 'body' ).removeClass( 'responsive-site-contained');
					jQuery( 'body' ).removeClass( 'responsive-site-full-width');
					jQuery( 'body' ).removeClass( 'responsive-site-llms-full-width');
					jQuery( 'body' ).removeClass( 'responsive-site-llms-contained');
					jQuery( 'body' ).addClass( 'responsive-site-llms-'+ newval );
					if ( newval === 'contained' && $(window).width() > 768 ) {
						jQuery( '.floatingb-container' ).css( 'width', '1140px' );
					} else {
						jQuery( '.floatingb-container' ).css( 'width', '100%' );
					}
				}
			);
		}
	);


	//syle section

	api( 'lifterlms_style', function( $swipe ) {
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



















} )( jQuery );
