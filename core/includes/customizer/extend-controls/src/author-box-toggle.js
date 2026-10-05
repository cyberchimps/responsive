/**
 * Author Box Style — show/hide based on "Disable Author Profile Box" toggle.
 */
wp.customize.bind( 'ready', function () {
	if ( ! wp.customize( 'responsive_disable_author_meta' ) ) {
		return;
	}

	const authorBoxEl = document.getElementById( 'customize-control-responsive_post_author_box_style' );
	if ( authorBoxEl ) {
		authorBoxEl.style.display = wp.customize( 'responsive_disable_author_meta' ).get() ? 'none' : 'block';
	}

	wp.customize( 'responsive_disable_author_meta', function ( value ) {
		value.bind( function ( newval ) {
			const el = document.getElementById( 'customize-control-responsive_post_author_box_style' );
			if ( el ) {
				el.style.display = newval ? 'none' : 'block';
			}
		} );
	} );
} );