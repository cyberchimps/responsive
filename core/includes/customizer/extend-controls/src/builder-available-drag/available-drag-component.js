import PropTypes from 'prop-types';
import { useState, useEffect } from 'react';
import { ReactSortable } from 'react-sortablejs';
const { Fragment } = wp.element;
import { Button, Dashicon } from '@wordpress/components';
import he from 'he';

const AvailableItemsDrag = (props) => {

    const controlParams = props.control.params.input_attrs;
    const choices       = props.control.params.builder_choices;
    let settings        = props.customizer.control(`responsive_${controlParams.group}`).setting.get();

    const [state, setState] = useState({
        settings: settings,
    });

    const onDragStart = () => {
        const dropzones = document.querySelectorAll('.responsive-builder-area');
        dropzones.forEach((dropzone) => {
            dropzone.classList.add('responsive-dragging-dropzones');
        });
    };

    const onDragStop = () => {
        const dropzones = document.querySelectorAll('.responsive-builder-area');
        dropzones.forEach((dropzone) => {
            dropzone.classList.remove('responsive-dragging-dropzones');
        });
    };
    
    const onDragEnd = (items) => {
        if (items.length === 0) {
            onUpdate();
        }
    };

    const focusPanel = (item) => {
        const section = choices[item]?.section;
        if (section && props.customizer.section(section)) {
            props.customizer.section(section).focus();
        }
    };

    const onUpdate = () => {
        settings = props.customizer.control(`responsive_${controlParams.group}`).setting.get();
        setState({ settings: settings });
    };

    useEffect(() => {
            document.addEventListener( 'responsiveUpdateHFBuilderAvailable', function( e ) {
                if ( e.detail === controlParams.group ) {
                    onUpdate();
                }
            } );
    }, [state]);

    const renderItem = (item, part) => {
        let available = true;
        controlParams.rows.forEach((zone) => {
            Object.keys(state.settings[zone]).forEach((area) => {
                if (state.settings[zone][area].includes(item)) {
                    available = false;
                }
            });
        });

        const theItem = [{ id: item }];

        return (
            <Fragment key={item}>
                {!available && part === 'links' && (
                    <div className="responsive-hfb-item-wrap">
                        <Button
                            className="responsive-hfb-item"
                            onClick={() => focusPanel(item)}
                            data-section={choices[item]?.section || ''}
                        >
                            {he.decode(choices[item]?.name) || ''}
                            <span className="responsive-hfb-item-icon">
                                <Dashicon icon="arrow-right-alt2" />
                            </span>
                        </Button>
                    </div>
                )}
                {available && part === 'available' && (
                    <ReactSortable
                        animation={100}
                        onStart={onDragStart}
                        onEnd={onDragStop}
                        group={{ name: controlParams.group, put: false }}
                        list={theItem}
                        setList={(newState) => onDragEnd(newState)}
                        delayOnTouchStart={true}
                        delay={5}
                        className="responsive-hfb-item-wrap responsive-hfb-move-item"
                    >
                        <div
                            className="responsive-hfb-item"
                            data-section={choices[item]?.section || ''}
                        >
                            {he.decode(choices[item]?.name) || ''}
                        </div>
                    </ReactSortable>
                )}
            </Fragment>
        );
    };

    return (
        <div className="responsive-control-field responsive-hfb-available-items">
            {Object.keys(choices).map((item) => renderItem(item, 'links'))}
            <div className="responsive-hfb-available-items-title">
                <span className="customize-control-title">
                    {props.control.params.label}
                </span>
            </div>
            <div className="responsive-hfb-available-items-pool">
                {Object.keys(choices).map((item) => renderItem(item, 'available'))}
            </div>
        </div>
    );
};

AvailableItemsDrag.propTypes = {
    control: PropTypes.object.isRequired,
    customizer: PropTypes.object.isRequired,
};

export default React.memo(AvailableItemsDrag);
