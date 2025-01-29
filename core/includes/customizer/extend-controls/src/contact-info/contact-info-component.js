import PropTypes from 'prop-types';
import { __ } from '@wordpress/i18n';
import { useState, useEffect, useRef } from 'react';
import { ReactSortable } from 'react-sortablejs';
import Select from "react-select";
import ContactInfoItemComponent from './contact-info-item-component';

const options = [
    { value: "email", label: "Email" },
    { value: "phone", label: "Phone" },
    { value: "address", label: "Address" },
];

const ContactInfoComponent = (props) => {

    const [selectedOptions, setSelectedOptions] = useState([]);

    console.log(props)
    console.log(options)
    console.log(props.control.params.default)
    console.log('SELECTED');
    console.log(selectedOptions)

    return (
        <div className="responsive-contact-info-container">
            <div>
                <label className="responsive-contact-info-label" style={{ fontWeight: "bold" }}>Icons</label>
                <Select
                    options={props.control.params.default}
                    isMulti
                    value={selectedOptions}
                    onChange={setSelectedOptions}
                    placeholder="Select items..."
                    className="responsive-contact-info-selector"
                />
                <p style={{ fontSize: "12px", color: "#888", marginTop: "5px" }}>
                    Select the items that you want to display.
                </p>
            </div>

            {selectedOptions != null && selectedOptions.length > 0 &&
                <div className="responsive-contact-info-list-container">
                    <div className="responsive-contact-info-wrapper">
                        {selectedOptions.map((item, index) => (
                            <>
                                <ContactInfoItemComponent item={item} index={index} />
                                {console.log(index)}
                                {console.log(item)}
                            </>
                        ))}
                    </div>
                </div>
            }
        </div>
    );
};
ContactInfoComponent.propTypes = {
    control: PropTypes.object.isRequired,
};
export default React.memo(ContactInfoComponent);