import PropTypes from 'prop-types';
import debounce from 'lodash/debounce';

import { useEffect, useRef } from 'react';

/**
 * HTML Editor control component.
 *
 * IMPORTANT: the <textarea> below is deliberately UNCONTROLLED (no
 * `value`/`onChange`). Once wp.oldEditor.initialize() runs, TinyMCE takes
 * ownership of this DOM node - it hides the textarea and inserts its own
 * iframe-based editing surface next to it, mutating that subtree directly
 * and imperatively. If React also believes it owns that node's value (a
 * "controlled" component) and re-renders for any reason, React can
 * recreate the subtree from scratch. TinyMCE's JS object survives that
 * (it's still in tinymce.editors[], tinymce.get(id) still "works"), but
 * its iframe is now an orphaned, detached DOM node that's no longer in
 * the live document - the editor looks fine but stops accepting input.
 * Letting TinyMCE own this node exclusively, with React never touching
 * it after mount, removes that failure mode entirely.
 *
 * Opens on the Text/Code tab by default (see initializeEditor): once
 * TinyMCE reports itself initialized, window.switchEditors.go(id, 'html')
 * flips it to Text mode before the person ever sees the Visual tab.
 */
const HtmlComponent = ( { control } ) => {
	const editorRef = useRef( null );

	// Derive a unique id from the control's own (always-unique) id instead
	// of a hardcoded fallback string, which any settings file that forgets
	// to pass input_attrs.id would otherwise silently collide on.
	const controlParams = {
		id: `responsive-html-editor-${ control.id }`,
		toolbar1: 'bold,italic,bullist,numlist,link',
		toolbar2: '',
		...( control.params.input_attrs || {} ),
	};

	useEffect( () => {
		const editorId = controlParams.id;
		let healthTimer = null;

		const syncToSetting = debounce( () => {
			const editor = window.tinymce && window.tinymce.get( editorId );
			if ( ! editor || editor.isHidden() ) {
				return; // Text/quicktags mode already syncs via the textarea's own change event.
			}
			const newValue = editor.getContent();
			if ( newValue !== control.setting.get() ) {
				control.setting.set( newValue );
			}
		}, 250 );

		const isEditorAlive = ( editor ) => {
			try {
				const body = editor.getBody();
				// An emptied iframe (its document reloaded, e.g. by being
				// re-parented elsewhere in the DOM) loses its window
				// reference once the old document is torn down.
				return !! ( body && body.ownerDocument && body.ownerDocument.defaultView );
			} catch ( err ) {
				return false;
			}
		};

		const startHealthCheck = ( editor ) => {
			clearInterval( healthTimer );
			healthTimer = setInterval( () => {
				if ( isEditorAlive( editor ) ) {
					return;
				}
				clearInterval( healthTimer );
				recoverEditor();
			}, 1500 );
		};

		const openOnTextTab = () => {
			if ( window.switchEditors && 'function' === typeof window.switchEditors.go ) {
				window.switchEditors.go( editorId, 'html' );
			}
		};

		const recoverEditor = () => {
			// control.setting already holds the last-synced value (that
			// binding never touched the dead iframe), so nothing typed is
			// lost by tearing down and reinitializing here.
			try {
				window.wp.oldEditor.remove( editorId );
			} catch ( err ) {
				// Ignore - the old instance may already be in a broken state.
			}
			initializeEditor();
		};

		const initializeEditor = () => {
			if ( editorRef.current ) {
				editorRef.current.value = control.setting.get();
			}

			window.wp.oldEditor.initialize( editorId, {
				tinymce: {
					wpautop: true,
					toolbar1: controlParams.toolbar1,
					toolbar2: controlParams.toolbar2,
					setup: ( editor ) => {
						editor.on( 'Change Undo Redo KeyUp', syncToSetting );
						editor.on( 'init', () => {
							startHealthCheck( editor );
							openOnTextTab();
						} );
					},
				},
				quicktags: true,
				mediaButtons: true,
			} );

			// Covers the rare case where TinyMCE reports itself already
			// initialized synchronously (e.g. re-using a still-live
			// instance rather than booting a fresh one).
			const existingEditor = window.tinymce && window.tinymce.get( editorId );
			if ( existingEditor && existingEditor.initialized ) {
				openOnTextTab();
			}
		};

		// If a previous instance is somehow still registered under this id
		// (e.g. a fast unmount/remount cycle), remove it first rather than
		// initializing a second editor on top of it.
		if ( window.tinymce && window.tinymce.get( editorId ) ) {
			window.wp.oldEditor.remove( editorId );
		}

		initializeEditor();

		// Keep the plain textarea itself (the uncontrolled fallback, and
		// what quicktags/Text-mode edits directly) in sync with the
		// setting too, independent of TinyMCE.
		const onTextareaChange = ( event ) => {
			control.setting.set( event.target.value );
		};
		const textareaEl = editorRef.current;
		if ( textareaEl ) {
			textareaEl.addEventListener( 'change', onTextareaChange );
		}

		return () => {
			clearInterval( healthTimer );
			syncToSetting.cancel();
			if ( textareaEl ) {
				textareaEl.removeEventListener( 'change', onTextareaChange );
			}
			try {
				window.wp.oldEditor.remove( editorId );
			} catch ( err ) {
				// Ignore - nothing to clean up if it was never initialized.
			}
		};
	}, [] );

	return (
		<div className="responsive-control-field responsive-editor-control">
			{ control.params.label && (
				<span className="customize-control-title">{ control.params.label }</span>
			) }
			<textarea
				className="responsive-control-tinymce-editor wp-editor-area"
				id={ controlParams.id }
				ref={ editorRef }
				defaultValue={ control.setting.get() }
			/>
			{ control.params.description && (
				<span className="customize-control-description">{ control.params.description }</span>
			) }
		</div>
	);
};

HtmlComponent.propTypes = {
	control: PropTypes.object.isRequired,
};

export default HtmlComponent;