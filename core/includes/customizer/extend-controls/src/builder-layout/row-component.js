import { memo } from 'react';
import { Button } from '@wordpress/components';
import BuilderSingleRowComponent from './single-row-component';

const BuilderRowComponent = (props) => {
    let besideItems = [];
    const mode = (props.controlParams.group.indexOf('header') !== -1 ? 'header' : 'footer');
    let footerClass=null;
    if ('footer_items' === props.controlParams.group) {
		var columns = props.customizer('responsive_footer_' + props.row + '_columns').get();
		var layout  = props.customizer('responsive_footer_' + props.row + '_layout').get();
		footerClass = 'footer-column-row footer-row-columns-' + columns + ' footer-row-layout-' + layout;
	}
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
                    if ( 'footer_items' === props.controlParams.group ) {
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
