import { memo } from 'react';
import { Button } from '@wordpress/components';
import OffCanvasColumnComponent from './off-canvas-column-component';

const OffCanvasPanel = (props) => {
    console.log("Props received in OffCanvasPanel : ", props); 
    let items = []; 
    const mode = (props.controlParams.group.indexOf('header') !== -1 ? 'header' : 'footer');
    items = (props.items && props.items['popup_content']) ? props.items['popup_content'] : [];

    return (
        <div className="responsive-builder-areas popup-vertical-group">
            <Button
                className="responsive-row-actions"
                icon="admin-generic"
                iconSize="13"
                title="Off Canvas"
                onClick={() => props.focusPanel(mode + '_mobile_off_canvas')}
                text="Off Canvas"
            />
            <div className="responsive-builder-group responsive-builder-group-vertical" data-setting="popup">
                <OffCanvasColumnComponent
                    key={props.controlParams.zones.popup}
                    zone={props.controlParams.zones.popup}
                    row="popup"
                    choices={props.choices}
                    controlParams={props.controlParams} 
                    settings={props.settings}
                    items={items}
                    removeItem={(remove, removeRow, removeZone) => props.removeItem(remove, removeRow, removeZone)}
                    focusItem={(focus) => props.focusItem(focus)}
                    hideDrop={() => props.hideDrop()}
                    showDrop={() => props.showDrop()}
                    onUpdate={(updateRow, updateZone, updateItems) => props.onUpdate(updateRow, updateZone, updateItems)}
                    onAddItem={(updateRow, updateZone, updateItems) => props.onAddItem(updateRow, updateZone, updateItems)}
                />
            </div>
        </div>
    );
}

export default memo(OffCanvasPanel);