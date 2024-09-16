import PropTypes from "prop-types";
import { useState } from "react";
const { ToggleControl, FormFileUpload } = wp.components;
import { useRef } from '@wordpress/element';
import { __ } from '@wordpress/i18n'
import _ from 'lodash';


const ResponsiveBackgroundImageComponent = props => {

    const value = props.control.params.value;

    const [props_value, setPropsValue] = useState({
        value: value,
    });

    const {
        label,
        description,
    } = props.control.params;

    const frameRef = useRef(null);

    const onToggleClick = () => {
        const newEnableState = !props_value.value.enable;
        const updatedValue = {
            ...props_value.value,
            enable: newEnableState,
        };
    
        setPropsValue(prevState => ({
            ...prevState,
            value: updatedValue,
        }));
        
        props.control.settings['enable'].set(newEnableState);
    };

    const handleChange = () => {
        const attachment = frameRef.current.state().get('selection').first().toJSON();

        const { sizes, width } = attachment;

        let url = sizes.full.url;
        if (width < 700) {
            url = _.maxBy(Object.values(_.omit(sizes, 'large')), 'width').url;
        }

        // Update the state with a new URL
        const updatedValue = {
            ...props_value.value,
            image_url: url,
        };
    
        setPropsValue(prevState => ({
            ...prevState,
            value: updatedValue,
        }));

        // Update the Customizer setting for the URL
        props.control.settings['image_url'].set(url);

        frameRef.current.close();
    };

    const responsiveAddBGMedia = () => {

        frameRef.current = wp.media({
			button: {
				text: 'Select',
				close: false,
			},
			states: [
				new wp.media.controller.Library({
					title: __('Select logo', 'responsive'),
					library: wp.media.query({
						type: 'image',
					}),
					multiple: false,
					date: false,
					priority: 20,
					suggestedWidth: '320px',
					suggestedHeight: '140px',
				}),
			],
		})

		frameRef.current.on('select', handleChange)

		frameRef.current.setState('library').open()
    }

    // Remove/Delete Image
    const removeBGImage = () => {
         // Update the state with a new URL
         const updatedValue = {
            ...props_value.value,
            image_url: '',
        };
    
        setPropsValue(prevState => ({
            ...prevState,
            value: updatedValue,
        }));
        // Update the Customizer setting for the URL
        props.control.settings['image_url'].set('');
    }

    let NoImageSelected = <div className="responsive-bgimage-not-selected" onClick={responsiveAddBGMedia}>
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12ZM12 18C11.4477 18 11 17.5523 11 17V13H7C6.44772 13 6 12.5523 6 12C6 11.4477 6.44772 11 7 11H11V7C11 6.44772 11.4477 6 12 6C12.5523 6 13 6.44772 13 7V11H17C17.5523 11 18 11.4477 18 12C18 12.5523 17.5523 13 17 13H13V17C13 17.5523 12.5523 18 12 18Z" fill="#007CBA"/>
        </svg>
    </div>;

    let ImageSelected = <div className="responsive-bgimage-selected">
        <img src={props_value.value.image_url} />
        <svg class="bgimage-remove-btn" width="32" height="32" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"  onClick={removeBGImage}>
            <circle cx="10" cy="10" r="10" fill="#F2F2F2"/>
            <path d="M8.54175 11.4583L8.54175 9.70825" stroke="#666666" stroke-width="0.8" stroke-linecap="round"/>
            <path d="M11.4583 11.4583L11.4583 9.70825" stroke="#666666" stroke-width="0.8" stroke-linecap="round"/>
            <path d="M4.75 6.79175H15.25V6.79175C15.2113 6.79175 15.192 6.79175 15.1756 6.79202C14.0967 6.80967 13.2263 7.68007 13.2086 8.75902C13.2083 8.77539 13.2083 8.79473 13.2083 8.83342V11.1667C13.2083 12.2947 13.2083 12.8587 12.9874 13.2889C12.7964 13.6606 12.4939 13.9632 12.1221 14.1541C11.692 14.3751 11.128 14.3751 10 14.3751V14.3751C8.87203 14.3751 8.30805 14.3751 7.87786 14.1541C7.50614 13.9632 7.20357 13.6606 7.01263 13.2889C6.79167 12.8587 6.79167 12.2947 6.79167 11.1667V8.83342C6.79167 8.79473 6.79167 8.77539 6.7914 8.75902C6.77374 7.68007 5.90334 6.80967 4.82439 6.79202C4.80803 6.79175 4.78869 6.79175 4.75 6.79175V6.79175Z" stroke="#666666" stroke-width="0.8" stroke-linecap="round"/>
            <path d="M8.54159 5.04173C8.54159 5.04173 8.83325 4.45825 9.99992 4.45825C11.1666 4.45825 11.4583 5.04159 11.4583 5.04159" stroke="#666666" stroke-width="0.8" stroke-linecap="round"/>
        </svg>
        <p class="responsive-bgimage-description"><span>Note: </span>{description}</p>
    </div>;

return <>
        <div className="responsive-background-image-control">
            <ToggleControl
                label={ label ? label : undefined }
                checked={ props_value.value.enable }
                onChange={ () => {
                    onToggleClick( props_value.value.enable );
                } }
                className="responsive-toggle-control"
            />
            { !!props_value.value.enable &&
                <div className={`responsive-background-image-wrapper ${ !props_value.value.image_url ? 'not-selected' : 'selected' } `}>
                    { !props_value.value.image_url && NoImageSelected }
                    { props_value.value.image_url && ImageSelected }
                </div>
            }
        </div>
    </>;

};

ResponsiveBackgroundImageComponent.propTypes = {
	control: PropTypes.object.isRequired
};

export default React.memo(ResponsiveBackgroundImageComponent);