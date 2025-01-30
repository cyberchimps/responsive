import { __ } from '@wordpress/i18n';
import { useState } from 'react';
import Icons from '../icons'
import ContactIcons from './contact-icons';
import { Dashicon, Tooltip, TextControl } from '@wordpress/components';

const ContactInfoItemComponent = props => {

    const [open, setOpen] = useState(false);
    const [isVisible, setIsVisible] = useState(true);
    const { id, label } = props.item;

    console.log('props')
    console.log(props)

    let showLinks = true;
    if ('address' === id || 'work_hours' === id) {
        showLinks = false;
    }

    let displayLabel = id;
    switch (id) {
        case 'phone':
            displayLabel = 'Phone No.';
            break;
        case 'mobile':
            displayLabel = 'Mobile No.';
            break;
        case 'work_hours':
            displayLabel = 'Time';
            break;
        default:
            displayLabel = label;
    }

    return <>
        <div className="responsive-contact-info-item" data-id={id} key={id}>
            <div className="responsive-contact-info-panel-header">
                <div className="responsive-contact-info-menu-choice-wrap">
                    <div className="responsive-contact-info-menu">
                        {Icons.sort}
                    </div>
                    <div className="responsive-contact-info-icon-choice">{ContactIcons[id + '_outline']}</div>
                    <div className="responsive-contact-info-item-choice">{label}</div>
                </div>
                <div className="responsive-contact-info-item-actions">
                    <Tooltip text={isVisible ? __('Enable Item', 'responsive') : __('Disable Item', 'responsive')}>
                        <span className="responsive-contact-info-visibility-action" onClick={() => {
                            setIsVisible(!isVisible);
                            props.updateItem({ ...props.item, enable: !isVisible }, props.index);
                        }}>
                            {isVisible ? Icons.eye_active : Icons.eye}</span>
                    </Tooltip>
                    <Tooltip text={__('Expand Item Controls', 'responsive')}>
                        <Dashicon onClick={() => setOpen(!open)} icon={open ? 'arrow-up-alt2' : 'arrow-down-alt2'} />
                    </Tooltip>
                </div>
            </div>
            {open && (
                <div className="responsive-contact-info-panel-content">
                    <TextControl
                        label={__('Title', 'responsive')}
                        value={props.item.title || ''}
                        className="responsive-contact-info-content-item"
                        onChange={(value) => {
                            props.updateItem({ ...props.item, title: value }, props.index);
                        }}
                    />
                    <TextControl
                        label={displayLabel}
                        value={props.item.content || ''}
                        className="responsive-contact-info-content-item"
                        onChange={(value) => {
                            props.updateItem({ ...props.item, content: value }, props.index);
                        }}
                    />
                    {showLinks &&
                        <TextControl
                            label={__('Link', 'responsive')}
                            value={props.item.link || ''}
                            className="responsive-contact-info-content-item"
                            onChange={(value) => {
                                props.updateItem({ ...props.item, link: value }, props.index);
                            }}
                        />}
                </div>
            )}
        </div>
    </>

}

export default React.memo(ContactInfoItemComponent)