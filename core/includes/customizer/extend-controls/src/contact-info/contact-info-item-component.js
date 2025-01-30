import { __ } from '@wordpress/i18n';
import { useState } from 'react';
import Icons from '../icons'
import ContactIcons from './contact-icons';
import { Dashicon, Tooltip, TextControl } from '@wordpress/components';

const ContactInfoItemComponent = props => {

    const [open, setOpen] = useState(false);

    const { id, label } = props.item;

    console.log('props')
    console.log(props)
    
    // console.log('id')
    // console.log(id)

    let showLinks = true;
    if ( 'address' === id || 'work_hours' === id ) {
        showLinks = false;
    }

    let displayLabel = id;
    switch( id ) {
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

    console.log('displayLabel')
    console.log(displayLabel)

    return <>
        <div className="responsive-contact-info-item" data-id={id}>
            <div className="responsive-contact-info-panel-header">
                <div className="responsive-contact-info-menu-choice-wrap">
                    <div className="responsive-contact-info-menu">
                        {Icons.sort}
                    </div>
                    <div className="responsive-contact-info-icon-choice">{ContactIcons[id+'_outline']}</div>
                    <div className="responsive-contact-info-item-choice">{label}</div>
                </div>
                <div className="responsive-contact-info-item-actions">
                    {Icons.eye}
                    <Tooltip text={__('Expand Item Controls', 'responsive')}>
                        <Dashicon onClick={() => setOpen(!open)} icon={open ? 'arrow-up-alt2' : 'arrow-down-alt2'} />
                    </Tooltip>
                </div>
            </div>
            {open && (
                <div className="responsive-social-item-panel-content">
                    <TextControl
                        label={__('Title', 'responsive')}
                        value={props.item.label || ''}
                        className="responsive-contact-info-content-item"
                        onChange={(value) => console.log(value)}
                    />
                    <TextControl
                        label={displayLabel}
                        value={props.item.label || ''}
                        className="responsive-contact-info-content-item"
                        onChange={(value) => console.log(value)}
                    />
                    {showLinks &&
                    <TextControl
                        label={__('Link', 'responsive')}
                        value={props.item.label || ''}
                        className="responsive-contact-info-content-item"
                        onChange={(value) => console.log(value)}
                    />}
                </div>
            )}
        </div>
    </>

}

export default React.memo(ContactInfoItemComponent)