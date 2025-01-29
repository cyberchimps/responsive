import { __ } from '@wordpress/i18n';
import { useState } from 'react';
import Icons from '../icons'
import { Dashicon, Tooltip } from '@wordpress/components';

const ContactInfoItemComponent = props => {

    const [open, setOpen] = useState(false);

    return <>
        <div className="responsive-contact-info-item" data-id={props.item.id}>
            <div className="responsive-contact-info-panel-header">
                <div className="responsive-contact-info-menu-choice-wrap">
                    <div className="responsive-contact-info-menu">
                        {Icons.sort}
                    </div>
                    <div className="responsive-social-icon-choice"></div>
                    <div className="responsive-social-item-choice">{props.item.label}</div>
                </div>
                {console.log('PROPS')}
                {console.log(props.item.label)}
                <Tooltip text={__('Expand Item Controls', 'responsive')}>
                    <Dashicon onClick={() => setOpen(!open)} icon={open ? 'arrow-up-alt2' : 'arrow-down-alt2'} />
                </Tooltip>
            </div>
            {open && (
                <div className="responsive-social-item-panel-content">
                    {/* <TabPanel
                        className="sortable-style-tabs responsive-social-type"
                        activeClass="responsive-social-active-tab"
                        initialTabName={
                            props.item.source && props.item.source !== ''
                                ? props.item.source
                                : defaultTab
                        }
                        onSelect={(value) => props.onChangeSource(value, props.index)}
                        tabs={tabOptions}
                    >
                        {
                            (tab) => {
                                let tabout;
                                if (tab.name) {
                                    if (tab.name === 'image') {
                                        tabout = (
                                            <Fragment>
                                                {!props.item.url && (
                                                    <div className="attachment-media-view">
                                                        <MediaUpload
                                                            onSelect={(imageData) => {
                                                                props.onChangeURL(imageData.url, props.index);
                                                                // props.onChangeAttachment(imageData.id, props.index);
                                                            }}
                                                            allowedTypes={['image']}
                                                            render={({ open }) => (
                                                                <Button
                                                                    className="button-add-media"
                                                                    isSecondary
                                                                    onClick={open}
                                                                >
                                                                    {__('Add Image', 'responsive')}
                                                                </Button>
                                                            )}
                                                        />
                                                    </div>
                                                )}
                                                {props.item.url && (
                                                    <div className="responsive-social-custom-image">
                                                        <div className="responsive-social-image">
                                                            <img
                                                                className="responsive-social-image-preview"
                                                                src={props.item.url}
                                                            />
                                                        </div>
                                                        <Button
                                                            className="responsive-social-remove-image"
                                                            isDestructive
                                                            onClick={() => {
                                                                props.onChangeURL('', props.index);
                                                                // props.onChangeAttachment('', props.index);
                                                            }}
                                                        >
                                                            <Dashicon icon="no" />
                                                            {__('Remove Image', 'responsive')}
                                                        </Button>
                                                    </div>
                                                )}

                                                <RangeControl
                                                    label={__('Max Width (px)', 'responsive')}
                                                    value={props.item.width || 24}
                                                    onChange={(value) =>
                                                        props.onChangeWidth(value, props.index)
                                                    }
                                                    step={1}
                                                    min={2}
                                                    max={100}
                                                />
                                            </Fragment>
                                        );
                                    } else if (tab.name === 'svg') {
                                        tabout = (
                                            <Fragment>
                                                <TextControl
                                                    label={__('SVG HTML', 'responsive')}
                                                    value={props.item.svg || ''}
                                                    onChange={(value) => {
                                                        const sanitized = DOMPurify.sanitize(value, {
                                                            USE_PROFILES: { svg: true, svgFilters: true },
                                                        });
                                                        props.onChangeSVG(sanitized, props.index);
                                                    }}
                                                />
                                                <RangeControl
                                                    label={__('Max Width (px)', 'responsive')}
                                                    value={props.item.width || 24}
                                                    onChange={(value) =>
                                                        props.onChangeWidth(value, props.index)
                                                    }
                                                    step={1}
                                                    min={2}
                                                    max={100}
                                                />
                                            </Fragment>
                                        );
                                    } else {
                                        tabout = (
                                            <Fragment>
                                                <ButtonGroup className="responsive-social-radio-container-control">
                                                    <Button
                                                        isTertiary
                                                        className={`${props.item.id === props.item.icon
                                                            ? 'active-radio '
                                                            : ''
                                                            }svg-icon-${props.item.id}`}
                                                        onClick={() =>
                                                            props.onChangeIcon(props.item.id, props.index)
                                                        }
                                                    >
                                                        <span className="responsive-social-radio-icon">
                                                            {SocialIcons[props.item.id]}
                                                        </span>
                                                    </Button>
                                                    {SocialIcons[`${props.item.id}Alt`] && (
                                                        <Button
                                                            isTertiary
                                                            className={`${`${props.item.id}Alt` === props.item.icon
                                                                ? 'active-radio '
                                                                : ''
                                                                }svg-icon-${props.item.id}Alt`}
                                                            onClick={() =>
                                                                props.onChangeIcon(
                                                                    `${props.item.id}Alt`,
                                                                    props.index
                                                                )
                                                            }
                                                        >
                                                            <span className="responsive-social-radio-icon">
                                                                {SocialIcons[`${props.item.id}Alt`]}
                                                            </span>
                                                        </Button>
                                                    )}
                                                    {SocialIcons[`${props.item.id}Alt2`] && (
                                                        <Button
                                                            isTertiary
                                                            className={`${`${props.item.id}Alt2` === props.item.icon
                                                                ? 'active-radio '
                                                                : ''
                                                                }svg-icon-${props.item.id}Alt2`}
                                                            onClick={() =>
                                                                props.onChangeIcon(
                                                                    `${props.item.id}Alt2`,
                                                                    props.index
                                                                )
                                                            }
                                                        >
                                                            <span className="responsive-social-radio-icon">
                                                                {SocialIcons[`${props.item.id}Alt2`]}
                                                            </span>
                                                        </Button>
                                                    )}
                                                </ButtonGroup>
                                            </Fragment>
                                        );
                                    }
                                }
                                return <div>{tabout}</div>;
                            }
                        }
                    </TabPanel>
                    <TextControl
                        label={__('Item Label', 'responsive')}
                        value={props.item.label || ''}
                        onChange={(value) => props.onChangeLabel(value, props.index)}
                    />
                    <Button
                        className="responsive-social-sorter-item-remove"
                        isDestructive
                        onClick={() => props.removeItem(props.index)}
                    >
                        <Dashicon icon="no-alt" />
                        {__('Remove Item', 'responsive')}
                    </Button> */}
                </div>
            )}
        </div>
    </>

}

export default React.memo(ContactInfoItemComponent)