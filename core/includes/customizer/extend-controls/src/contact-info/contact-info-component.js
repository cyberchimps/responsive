import PropTypes from 'prop-types';
import { __ } from '@wordpress/i18n';
import { useState, useEffect, useRef } from 'react';
import { Dashicon, Tooltip, Button } from '@wordpress/components';
import { ReactSortable } from 'react-sortablejs';
import ContactInfoItemComponent from './contact-info-item-component';

const ContactInfoComponent = (props) => {

    const allItems = [
        {
            id: "email",
            enable: true,
            label: "Email",
            title: "Email",
            content: "",
            link: ""
        },
        {
            id: "phone",
            enable: true,
            label: "Phone",
            title: "Phone",
            content: "",
            link: ""
        },
        {
            id: "address",
            enable: true,
            label: "Address",
            title: "Address",
            content: "",
            link: ""
        },
        {
            id: "mobile",
            enable: true,
            label: "Mobile",
            title: "Mobile",
            content: "",
            link: ""
        },
        {
            id: "work_hours",
            enable: true,
            label: "Work Hours",
            title: "Work Hours",
            content: "",
            link: ""
        },
        {
            id: "website",
            enable: true,
            label: "Website",
            title: "Website",
            content: "",
            link: ""
        },
        {
            id: "fax",
            enable: true,
            label: "Fax",
            title: "Fax",
            content: "",
            link: ""
        }
    ];

    const [selectedOptions, setSelectedOptions] = useState(() => {
        const currentValue = props.control.setting.get();
        return (currentValue && currentValue.length > 0) ? currentValue : props.control.params.default;
    });

    const [open, setOpen] = useState(false);

    const updateItem = (newItem, index) => {
        const updatedOptions = [...selectedOptions];
        updatedOptions[index] = newItem;
        setSelectedOptions(updatedOptions);
        props.control.setting.set(updatedOptions);
    };

    const removeItem = (id) => {
        const updatedOptions = selectedOptions.filter(item => item.id !== id);
        setSelectedOptions(updatedOptions);
        props.control.setting.set(updatedOptions);
    };

    const addItem = (item) => {
        const updatedOptions = [...selectedOptions, item];
        setSelectedOptions(updatedOptions);
        props.control.setting.set(updatedOptions);
    };

    const firstSort = useRef(true);
    const handleSort = (newList) => {
        if (firstSort.current) {
            firstSort.current = false;
            return;
        }
        setSelectedOptions(newList);
        props.control.setting.set(newList);
    };

    const availableItems = allItems.filter(item => !selectedOptions.some(selected => selected.id === item.id));

    return (
        <div className="responsive-contact-info-container">
            <div className="responsive-contact-info-select-wrapper">
                <label className="responsive-contact-info-label">{__('Icons', 'responsive')}</label>
                <div className="responsive-contact-info-selector">
                    <span className="responsive-contact-info-selector-group">
                        {selectedOptions.map((currentItem, index) => (
                            <span className="responsive-contact-info-item-selected" key={currentItem.id}>{currentItem.label}
                                <Tooltip text={__('Remove Item', 'responsive')}>
                                    <Dashicon onClick={() => removeItem(currentItem.id)} icon={'no-alt'} />
                                </Tooltip>
                            </span>
                        ))}
                    </span>
                    <span className="responsive-contact-info-add-item">
                        <Tooltip text={__('Add Item', 'responsive')}>
                            <Dashicon onClick={() => { setOpen(!open) }} icon={open ? 'minus' : 'plus'} />
                        </Tooltip>
                    </span>
                </div>
                <p className="responsive-contact-info-add-item-desc">
                    {__('Select the items that you want to display.', 'responsive')}
                </p>
                {open && availableItems?.length > 0 &&
                    <div className="responsive-contact-info-available-items">
                        {availableItems.map(item => (
                            <Button key={item.id} onClick={() => addItem(item)}>
                                {item.label}
                            </Button>
                        ))}
                    </div>
                }
            </div>

            {selectedOptions?.length > 0 &&
                <div className="responsive-contact-info-list-container">
                    <ReactSortable list={selectedOptions} handle=".responsive-contact-info-panel-header" setList={handleSort} animation={200} delayOnTouchStart={true} delay={2} className="responsive-contact-info-wrapper">
                        {selectedOptions.map((item, index) => (
                            <ContactInfoItemComponent
                                key={item.id}
                                item={item}
                                index={index}
                                updateItem={updateItem}
                            />
                        ))}
                    </ReactSortable>
                </div>
            }
        </div>
    );
};
ContactInfoComponent.propTypes = {
    control: PropTypes.object.isRequired,
};
export default React.memo(ContactInfoComponent);