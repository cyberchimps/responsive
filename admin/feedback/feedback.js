/* global responsiveThemeFeedback */
( function () {
	'use strict';

	if ( document.readyState === 'loading' ) {
		document.addEventListener( 'DOMContentLoaded', init );
	} else {
		init();
	}

	function init() {
		var cfg = window.responsiveThemeFeedback;
		var root = document.getElementById( 'rtf-root' );
		if ( ! cfg || ! root ) {
			return;
		}

		var isNotice = root.getAttribute( 'data-rtf-mode' ) === 'notice';
		var form = root.querySelector( '#rtf-form' );
		var answer = root.querySelector( '#rtf-answer' );
		var sendBtn = root.querySelector( '[data-rtf-send]' );
		var skipBtn = root.querySelector( '[data-rtf-skip]' );
		var thanks = root.querySelector( '.rtf-thanks' );
		var closed = false;

		function post( type ) {
			var data = new FormData( form );
			data.append( 'action', cfg.action );
			data.append( 'nonce', cfg.nonce );
			data.append( 'type', type );
			// Fail silently: errors are swallowed and never shown to the user.
			return fetch( cfg.ajaxUrl, { method: 'POST', credentials: 'same-origin', body: data } ).catch( function () {} );
		}

		function close() {
			if ( closed ) {
				return;
			}
			closed = true;

			if ( isNotice ) {
				root.style.transition = 'opacity 200ms';
				root.style.opacity = '0';
				setTimeout( function () {
					if ( root.parentNode ) {
						root.parentNode.removeChild( root );
					}
				}, 200 );
				return;
			}

			root.classList.remove( 'is-open' );
			setTimeout( function () {
				root.hidden = true;
			}, 200 );
		}

		// FP-01: show on page load (the notice is already visible).
		if ( ! isNotice ) {
			root.hidden = false;
			requestAnimationFrame( function () {
				root.classList.add( 'is-open' );
			} );
		}

		// Empty input cannot be sent.
		answer.addEventListener( 'input', function () {
			sendBtn.disabled = answer.value.trim() === '';
		} );

		// FP-03: Send.
		form.addEventListener( 'submit', function ( e ) {
			e.preventDefault();
			if ( answer.value.trim() === '' ) {
				return;
			}
			sendBtn.disabled = true;
			skipBtn.disabled = true;
			sendBtn.classList.add( 'updating-message' );

			post( 'send' ).then( function () {
				form.hidden = true;
				thanks.hidden = false;
				setTimeout( close, cfg.dismissAfter || 3000 );
			} );
		} );

		// FP-04: Skip (and Esc) closes immediately and submits nothing.
		function skip() {
			if ( closed ) {
				return;
			}
			post( 'skip' );
			close();
		}

		skipBtn.addEventListener( 'click', skip );

		root.addEventListener( 'keydown', function ( e ) {
			if ( e.key === 'Escape' && ! form.hidden ) {
				skip();
			}
		} );

		// Notice mode: WordPress adds its own dismiss (X) button; treat it as Skip.
		if ( isNotice ) {
			root.addEventListener( 'click', function ( e ) {
				if ( e.target.closest && e.target.closest( '.notice-dismiss' ) ) {
					if ( ! form.hidden ) {
						post( 'skip' );
					}
					closed = true; // WordPress removes the notice itself.
				}
			} );
		}
	}
} )();