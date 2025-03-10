import { Fragment } from '@wordpress/element';
import { Button, Dashicon, Popover, ButtonGroup } from '@wordpress/components';
import { useState, useEffect } from 'react';
import he from 'he';
import Icons from '../icons';

const BuilderAddBlockComponent = (props) => {
    const [isPopoverVisible, setIsPopoverVisible] = useState(false);
    const [anyItemAvailable, setAnyItemAvailable] = useState(true);

    useEffect(() => {
        let anyAvailable = false;
        Object.keys(props.choices).forEach((item) => {
            let available = true;
            props.controlParams.rows.forEach((zone) => {
                Object.keys(props.settings[zone]).forEach((area) => {
                    if (props.settings[zone][area].includes(item)) {
                        available = false;
                    }
                });
            });
            if (available) {
                anyAvailable = true;
            }
        });

        setAnyItemAvailable(anyAvailable);
    }, [props.choices, props.controlParams.rows, props.settings]);

    let classForAdd = 'responsive-builder-add-item';

    if ('header_desktop_items' === props.controlParams.group && 'right' === props.location) {
        classForAdd += ' center-on-left';
    }
    if ('header_desktop_items' === props.controlParams.group && 'left' === props.location) {
        classForAdd += ' center-on-right';
    }
    if ('header_desktop_items' === props.controlParams.group && 'left_center' === props.location) {
        classForAdd += ' right-center-on-right';
    }
    if ('header_desktop_items' === props.controlParams.group && 'right_center' === props.location) {
        classForAdd += ' left-center-on-left';
    }

    const addItem = (item) => {
        setIsPopoverVisible(false);
        const updatedItems = [...props.list, { id: item }];
        props.setList(updatedItems);
    };

    const renderItems = () => {
        return Object.keys(props.choices).map((item) => {
            let available = true;

            props.controlParams.rows.forEach((zone) => {
                Object.keys(props.settings[zone]).forEach((area) => {
                    if (props.settings[zone][area].includes(item)) {
                        available = false;
                    }
                });
            });

            if (available) {
                return (
                    <Fragment key={item}>
                        <Button
                            isTertiary
                            className="builder-add-btn"
                            onClick={() => addItem(item)}
                        >
                            <span className="add-btn-icon">
                                {
                                    Icons[item] ? (
                                        // Render the Icon SVG.
                                        Icons[item]
                                    ) : (
                                        <Dashicon icon={props.choices[item].icon || 'block-default'} />
                                    )
                                }
                            </span>
                            <span className="add-btn-title">
                                {he.decode(props.choices[item].name || '')}
                            </span>
                        </Button>
                    </Fragment>
                );
            }
            return null;
        });
    };
    return (
        <div className={classForAdd} key={props.id}>
            {isPopoverVisible && anyItemAvailable && (
                <Popover
                    position="top"
                    inline={true}
                    className="responsive-hfb-popover-add-builder"
                    onClose={() => setIsPopoverVisible(false)}
                >
                    <div className="responsive-hfb-popover-builder-list">
                        <ButtonGroup className="responsive-hfb-radio-container-control">
                            {renderItems()}
                        </ButtonGroup>
                    </div>
                </Popover>
            )}
            <Button
                className="responsive-builder-item-add-icon"
                onClick={() => setIsPopoverVisible(true)}
            >
                <Dashicon icon="plus" />
            </Button>
        </div>
    );
};

export default React.memo(BuilderAddBlockComponent);


