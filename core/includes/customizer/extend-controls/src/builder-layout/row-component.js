import { memo, useState, useEffect } from 'react';
import { Button } from '@wordpress/components';
import BuilderSingleRowComponent from './single-row-component';

const BuilderRowComponent = (props) => {
    let besideItems = [];
    let mode = (props.controlParams.group.indexOf('header') !== -1 ? 'header' : 'footer');
    
    // State to track current device and footer layout
    const [currentDevice, setCurrentDevice] = useState(
        props.customizer.previewedDevice ? props.customizer.previewedDevice.get() : 'desktop'
    );
    const [footerLayout, setFooterLayout] = useState(null);
    const [footerColumns, setFooterColumns] = useState(null);
    
    // Update footer layout and columns when device or settings change
    useEffect(() => {
        if ('footer_items' !== props.controlParams.group && 'footer_mobile_items' !== props.controlParams.group) {
            return;
        }
        
        // Function to update the layout based on current device
        const updateFooterLayout = (device) => {
            let layoutSetting = 'responsive_footer_' + props.row + '_layout';
            if (device === 'tablet') {
                layoutSetting += '_tablet';
            } else if (device === 'mobile') {
                layoutSetting += '_mobile';
            }
            const layout = props.customizer(layoutSetting).get();
            setFooterLayout(layout);
        };
        
        // Get initial columns and layout
        const columns = props.customizer('responsive_footer_' + props.row + '_columns').get();
        setFooterColumns(columns);
        updateFooterLayout(currentDevice);
        
        // Listen for changes to columns
        const columnsHandler = (newval) => {
            setFooterColumns(newval);
        };
        props.customizer('responsive_footer_' + props.row + '_columns', (value) => {
            value.bind(columnsHandler);
        });
        
        // Listen for changes to all layout settings
        const layoutDesktopHandler = (newval) => {
            if (currentDevice === 'desktop') {
                setFooterLayout(newval);
            }
        };
        const layoutTabletHandler = (newval) => {
            if (currentDevice === 'tablet') {
                setFooterLayout(newval);
            }
        };
        const layoutMobileHandler = (newval) => {
            if (currentDevice === 'mobile') {
                setFooterLayout(newval);
            }
        };
        
        props.customizer('responsive_footer_' + props.row + '_layout', (value) => {
            value.bind(layoutDesktopHandler);
        });
        props.customizer('responsive_footer_' + props.row + '_layout_tablet', (value) => {
            value.bind(layoutTabletHandler);
        });
        props.customizer('responsive_footer_' + props.row + '_layout_mobile', (value) => {
            value.bind(layoutMobileHandler);
        });
        
        // Listen for device changes
        const deviceHandler = (device) => {
            setCurrentDevice(device);
            updateFooterLayout(device);
        };
        
        if (props.customizer.previewedDevice) {
            props.customizer.previewedDevice.bind(deviceHandler);
        }
        
        // Cleanup function to unbind all handlers
        return () => {
            props.customizer('responsive_footer_' + props.row + '_columns', (value) => {
                value.unbind(columnsHandler);
            });
            props.customizer('responsive_footer_' + props.row + '_layout', (value) => {
                value.unbind(layoutDesktopHandler);
            });
            props.customizer('responsive_footer_' + props.row + '_layout_tablet', (value) => {
                value.unbind(layoutTabletHandler);
            });
            props.customizer('responsive_footer_' + props.row + '_layout_mobile', (value) => {
                value.unbind(layoutMobileHandler);
            });
            if (props.customizer.previewedDevice) {
                props.customizer.previewedDevice.unbind(deviceHandler);
            }
        };
    }, [props.customizer, props.row, props.controlParams.group]);
    
    let footerClass = null;
    if (('footer_items' === props.controlParams.group || 'footer_mobile_items' === props.controlParams.group) && footerColumns && footerLayout) {
        footerClass = 'footer-column-row footer-row-columns-' + footerColumns + ' footer-row-layout-' + footerLayout;
    }
    
    // Use footerColumns for checking column visibility
    const columns = footerColumns;
    return (
        <div className={`responsive-builder-areas responsive-hfb-mode-${mode} ${footerClass}`} data-row={props.row}>
            <Button
                className="responsive-row-actions"
                icon="admin-generic"
                title={props.row.charAt(0).toUpperCase() + props.row.slice(1) + ' ' + mode}
                onClick={() => props.focusPanel(mode + '_' + props.row + '_row')}
            />
            <div className='responsive-builder-group responsive-builder-group-horizontal' data-setting={props.row}>
                {Object.keys(props.controlParams.zones[props.row]).map((zone, index) => {
                    if (props.row + '_left_center' === zone || props.row + '_right_center' === zone) {
                        return null;
                    }

                    if ('header_desktop_items' === props.controlParams.group && props.row + '_left' === zone) {
                        besideItems = props.items[props.row + '_left_center'];
                    }
                    if ('header_desktop_items' === props.controlParams.group && props.row + '_right' === zone) {
                        besideItems = props.items[props.row + '_right_center'];
                    }
                    if ( 'footer_items' === props.controlParams.group || 'footer_mobile_items' === props.controlParams.group ) {
                        if ( columns < ( index + 1 ) ) {
                            return;
                        }
                    }

                    return (
                        <BuilderSingleRowComponent
                            key={zone}
                            zone={zone}
                            row={props.row}
                            controlParams={props.controlParams}
                            settings={props.settings}
                            choices={props.choices}
                            centerItems={besideItems}
                            items={props.items[zone]}
                            removeItem={(remove, removeRow, removeZone) => props.removeItem(remove, removeRow, removeZone)}
                            focusItem={(focus) => props.focusItem(focus)}
                            hideDrop={() => props.hideDrop()}
                            showDrop={() => props.showDrop()}
                            onUpdate={(updateRow, updateZone, updateItems) => props.onUpdate(updateRow, updateZone, updateItems)}
                            onAddItem={(updateRow, updateZone, updateItems) => props.onAddItem(updateRow, updateZone, updateItems)}
                        />
                    );
                })}
            </div>
        </div>
    );
};

export default memo(BuilderRowComponent);
