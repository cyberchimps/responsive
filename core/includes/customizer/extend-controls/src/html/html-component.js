import PropTypes from 'prop-types';
import debounce from 'lodash/debounce';

import { __ } from '@wordpress/i18n';
import { useState, useEffect, useRef } from 'react';

const HtmlComponent = ({ control }) => {
    const [value, setValue] = useState(control.setting.get());
    const [restoreTextMode, setRestoreTextMode] = useState(false);
    const controlParams = control.params.input_attrs
        ? {
            id: 'header_html',
            toolbar1: 'bold,italic,bullist,numlist,link',
            toolbar2: '',
            ...control.params.input_attrs,
        }
        : {
            id: 'header_html',
            toolbar1: 'bold,italic,bullist,numlist,link',
            toolbar2: '',
        };

    const editorRef = useRef(null);

    const updateValues = (newValue) => {
        setValue(newValue);
        control.setting.set(newValue);
    };

    const triggerChangeIfDirty = debounce(() => {
        const newValue = window.wp.oldEditor.getContent(controlParams.id);
        updateValues(newValue);
    }, 250);

    const onInit = () => {
        const tinymceEditor = window.tinymce.get(controlParams.id);
        if (restoreTextMode) {
            window.switchEditors.go(controlParams.id, 'html');
        }
        tinymceEditor.on('NodeChange', triggerChangeIfDirty);
    };

    useEffect(() => {
        if (window.tinymce.get(controlParams.id)) {
            setRestoreTextMode(window.tinymce.get(controlParams.id).isHidden());
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

        const tinymceEditor = window.tinymce.get(controlParams.id);
        if (tinymceEditor.initialized) {
            onInit();
        } else {
            tinymceEditor.on('init', onInit);
        }

        return () => {
            if (tinymceEditor) {
                tinymceEditor.off('NodeChange', triggerChangeIfDirty);
            }
        };
    }, []);

    return (
        <div className="responsive-control-field responsive-editor-control">
            {control.params.label && (
                <span className="customize-control-title">{control.params.label}</span>
            )}
            <textarea
                className="responsive-control-tinymce-editor wp-editor-area"
                id={controlParams.id}
                ref={editorRef}
                value={value}
                onChange={({ target: { value } }) => updateValues(value)}
            />
            {control.params.description && (
                <span className="customize-control-description">{control.params.description}</span>
            )}
        </div>
    );
};

HtmlComponent.propTypes = {
    control: PropTypes.object.isRequired,
};

export default HtmlComponent;
