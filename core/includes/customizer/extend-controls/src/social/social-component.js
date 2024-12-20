import React, { useState } from 'react';
import PropTypes from 'prop-types';
import { ReactSortable } from 'react-sortablejs';
import ResponsiveSocialItemComponent from './social-item-component';
import { __ } from '@wordpress/i18n';;
import { Dashicon, Button } from '@wordpress/components';

const ResponsiveSocialComponent = props => {

    const {
        choices,
    } = props.control.params;

    const baseDefault = {
        items: [
            {
                id: 'facebook',
                enabled: true,
                source: 'icon',
                url: '',
                imageid: '',
                width: 24,
                icon: 'facebook',
                label: 'Facebook',
                svg: '',
            },
            {
                id: 'twitter',
                enabled: true,
                source: 'icon',
                url: '',
                imageid: '',
                width: 24,
                icon: 'twitterAlt2',
                label: 'X',
                svg: '',
            },
        ],
    };

    const defaultValue = props.control.params.default
        ? { ...baseDefault, ...props.control.params.default }
        : baseDefault;


    const [value, setValue] = useState(
        props.control.setting.get() ? { ...defaultValue, ...props.control.setting.get() } : defaultValue
    );

    const defaultParams = {
        group: 'social_item_group',
        options: [
            { value: 'facebook', label: __('Facebook', 'responsive') },
            { value: 'twitter', label: __('X formerly Twitter', 'responsive') },
            { value: 'instagram', label: __('Instagram', 'responsive') },
            { value: 'threads', label: __('Threads', 'responsive') },
            { value: 'youtube', label: __('YouTube', 'responsive') },
            { value: 'facebook_group', label: __('Facebook Group', 'responsive') },
            { value: 'vimeo', label: __('Vimeo', 'responsive') },
            { value: 'pinterest', label: __('Pinterest', 'responsive') },
            { value: 'linkedin', label: __('Linkedin', 'responsive') },
            { value: 'medium', label: __('Medium', 'responsive') },
            { value: 'wordpress', label: __('WordPress', 'responsive') },
            { value: 'reddit', label: __('Reddit', 'responsive') },
            { value: 'patreon', label: __('Patreon', 'responsive') },
            { value: 'github', label: __('GitHub', 'responsive') },
            { value: 'dribbble', label: __('Dribbble', 'responsive') },
            { value: 'behance', label: __('Behance', 'responsive') },
            { value: 'vk', label: __('VK', 'responsive') },
            { value: 'xing', label: __('Xing', 'responsive') },
            { value: 'rss', label: __('RSS', 'responsive') },
            { value: 'email', label: __('Email', 'responsive') },
            { value: 'phone', label: __('Phone', 'responsive') },
            { value: 'whatsapp', label: __('WhatsApp', 'responsive') },
            { value: 'google_reviews', label: __('Google Reviews', 'responsive') },
            { value: 'telegram', label: __('Telegram', 'responsive') },
            { value: 'yelp', label: __('Yelp', 'responsive') },
            { value: 'trip_advisor', label: __('Trip Advisor', 'responsive') },
            { value: 'imdb', label: __('IMDB', 'responsive') },
            { value: 'soundcloud', label: __('SoundCloud', 'responsive') },
            { value: 'tumblr', label: __('Tumblr', 'responsive') },
            { value: 'discord', label: __('Discord', 'responsive') },
            { value: 'tiktok', label: __('TikTok', 'responsive') },
            { value: 'spotify', label: __('Spotify', 'responsive') },
            { value: 'apple_podcasts', label: __('Apple Podcast', 'responsive') },
            { value: 'flickr', label: __('Flickr', 'responsive') },
            { value: '500px', label: __('500PX', 'responsive') },
            { value: 'bandcamp', label: __('Bandcamp', 'responsive') },
            { value: 'anchor', label: __('Anchor', 'responsive') },
            { value: 'custom1', label: __('Custom 1', 'responsive') },
            { value: 'custom2', label: __('Custom 2', 'responsive') },
            { value: 'custom3', label: __('Custom 3', 'responsive') },
        ],
    };

    const controlParams = props.control.params.input_attrs
        ? { ...defaultParams, ...props.control.params.input_attrs }
        : defaultParams;

    const availableSocialOptions = controlParams.options.filter(
        (option) => !value.items.some((item) => item.id === option.value)
    );

    const [currentControl, setCurrentControl] = useState(
        availableSocialOptions[0]?.value || ''
    );
    const [isVisible, setIsVisible] = useState(false);

    const updateValues = (newValue) => {
        props.control.setting.set({
            ...props.control.setting.get(),
            ...newValue,
            flag: !props.control.setting.get().flag,
        });
    };

    const saveArrayUpdate = (newValue, index) => {
        const updatedItems = value.items.map((item, idx) =>
            idx === index ? { ...item, ...newValue } : item
        );
        const updatedValue = { ...value, items: updatedItems };
        setValue(updatedValue);
        updateValues(updatedValue);
    };

    const addItem = (selectedControl) => {

        if (selectedControl) {
            console.log('inside current control')
            const newItem = {
                id: selectedControl,
                enabled: true,
                source: 'icon',
                url: '',
                imageid: '',
                width: 24,
                icon: selectedControl,
                label: controlParams.options.find((o) => o.value === selectedControl)?.label || '',
                svg: '',
            };

            const updatedValue = { ...value, items: [...value.items, newItem] };

            setValue(updatedValue);
            updateValues(updatedValue);

            const updatedOptions = controlParams.options.filter(
                (option) => !updatedValue.items.some((item) => item.id === option.value)
            );

            setCurrentControl(updatedOptions[0]?.value || '');
        }
        setIsVisible(false);
    };

    const removeItem = (index) => {
        const updatedItems = value.items.filter((_, idx) => idx !== index);
        const updatedValue = { ...value, items: updatedItems };
        setValue(updatedValue);
        updateValues(updatedValue);
    };

    const onDragEnd = (newItems) => {
        const updatedItems = newItems.map((item) =>
            value.items.find((originalItem) => originalItem.id === item.id)
        );
        if (JSON.stringify(updatedItems) !== JSON.stringify(value.items)) {
            const updatedValue = { ...value, items: updatedItems };
            setValue(updatedValue);
            updateValues(updatedValue);
        }
    };

    return <>
        <div className="responsive-social-items-container">
            <ReactSortable
                animation={100}
                list={value.items.map((item) => ({ id: item.id }))}
                setList={onDragEnd}
                group={controlParams.group}
                className="responsive-social-items-wrapper"
            >
                {value.items.map((item, index) => (
                    <ResponsiveSocialItemComponent
                        key={item.id}
                        item={item}
                        index={index}
                        removeItem={removeItem}
                        toggleEnabled={(enabled) => saveArrayUpdate({ enabled }, index)}
                        onChangeLabel={(label) => saveArrayUpdate({ label }, index)}
                        onChangeIcon={(icon) => saveArrayUpdate({ icon }, index)}
                        onChangeURL={(url) => saveArrayUpdate({ url }, index)}
                        onChangeWidth={(width) => saveArrayUpdate({ width }, index)}
                        onChangeSource={(source) => saveArrayUpdate({ source }, index)}
                        onChangeSVG={ (svg) => saveArrayUpdate( { svg }, index ) }
                    />
                ))}
            </ReactSortable>
            <Button
                className="responsive-add-social-item"
                primary
                onClick={() => {
                    console.log('social')
                    setIsVisible(!isVisible);
                }}
            >
                <Dashicon icon="plus" />
                {__('Add Social', 'responsive')}
            </Button>
            {availableSocialOptions.length > 0 && isVisible && (
                <div className="responsive-social-icons-container">
                    {availableSocialOptions.map((option) => (
                        <Button
                            key={option.value}
                            onClick={() => {
                                console.log(option.value)
                                setCurrentControl(option.value);
                                addItem(option.value);
                            }}
                        >
                            {option.label}
                        </Button>
                    ))}
                </div>
            )}
        </div>
    </>;
};

ResponsiveSocialComponent.propTypes = {
    control: PropTypes.object.isRequired
};

export default React.memo(ResponsiveSocialComponent);
