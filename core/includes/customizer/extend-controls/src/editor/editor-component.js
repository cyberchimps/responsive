import PropTypes from 'prop-types';
import debounce from 'lodash/debounce';
import {useState, useEffect } from 'react';

const { __ } = wp.i18n;
const { Component } = wp.element;

const EditorComponent = props => {


	let value = props.control.setting.get();
	const [state, setState] = useState({
		value,
		editor: {},
		restoreTextMode: false,
	});
	let defaultParams = {
		id: 'header_html',
		toolbar1: 'bold,italic,bullist,numlist,link',
		toolbar2: '',
	};
	const controlParams = props.control.params.input_attrs ? {
		...defaultParams,
		...props.control.params.input_attrs,
	} : defaultParams;
	let defaultValue = props.control.params.default || '';

	useEffect(() => {
		if (window.tinymce.get(controlParams.id)) {
			setState({ restoreTextMode: window.tinymce.get(controlParams.id).isHidden() });
			window.wp.oldEditor.remove(controlParams.id);
		}
		window.wp.oldEditor.initialize(controlParams.id, {
			tinymce: {
				wpautop: true,
				toolbar1: controlParams.toolbar1,
				toolbar2: controlParams.toolbar2,
			},
			quicktags: true,
			mediaButtons: true,
		});
		const editor = window.tinymce.get(controlParams.id);
		if (editor.initialized) {
			onInit();
		} else {
			editor.on('init', onInit);
		}
	}, []);
	const onInit = () => {
		const editor = window.tinymce.get(controlParams.id);
		if (state.restoreTextMode) {
			window.switchEditors.go(controlParams.id, 'html');
		}
		editor.on('NodeChange', debounce(triggerChangeIfDirty, 250));

		setState({ editor: editor });
	}
	const triggerChangeIfDirty = () => {
		updateValues(window.wp.oldEditor.getContent(controlParams.id));
	}
	const updateValues = (value) => {
		setState({ value: value });
		props.control.setting.set(value);
	}

	return (
		<div className="responsive-control-field responsive-editor-control">
			{props.control.params.label && (
				<span className="customize-control-title">{props.control.params.label}</span>
			)}
			<textarea
				className="responsive-control-tinymce-editor wp-editor-area"
				id={controlParams.id}
				value={state.value}
				onChange={({ target: { value } }) => {
					updateValues(value);
				}}
			/>
			{props.control.params.description && (
				<span className="customize-control-description">{props.control.params.description}</span>
			)}
		</div>
	);

}

export default EditorComponent;
