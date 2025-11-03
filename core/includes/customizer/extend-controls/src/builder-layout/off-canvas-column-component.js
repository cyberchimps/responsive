import BuilderAddBlockComponent from './add-block-component';
import BuilderSingleBlockComponent from './single-block-component';
import { ReactSortable } from "react-sortablejs";
const { Fragment } = wp.element;

const OffCanvasColumnComponent = props => {
    const location = "popup";
    const currentList = (typeof props.items != "undefined" && props.items != null && props.items.length != null && props.items.length > 0 ? props.items : []);
    let theItems = [];
    {
        currentList.length > 0 && (
            currentList.map((item) => {
                theItems.push(
                    {
                        id: item,
                    }
                )
            })
        )
    }
    const zoneKey = Object.keys(props.zone)[0];
    console.log("OffCanvasColumnComponent - theItems: ", theItems);
    console.log("Props in OffCanvasColumnComponent: ", props);
    console.log("Current list in off-canvas column component: ", currentList);
    return (
        <div className="responsive-builder-area responsive-builder-area-popup" data-location={(props.zone?.popup_content ?? '').toLowerCase().replace(/\s+/g, '_')}>
            {
                <Fragment>
                    <ReactSortable animation={100} onStart={() => props.showDrop()} onEnd={() => props.hideDrop()} group={props.controlParams.group} className={`responsive-builder-drop responsive-hfb-builder-sortable-panel responsive-builder-drop-popup`} list={theItems} setList={newState => props.onUpdate(props.row, props.zone, newState)} >
                        {
                            currentList.length > 0 && (
                                currentList.map((item, index) => {
                                    return <BuilderSingleBlockComponent removeItem={(remove) => props.removeItem(remove, props.row, zoneKey)} focusItem={(focus) => props.focusItem(focus)} key={item} index={index} item={item} controlParams={props.controlParams} choices={props.choices} />;
                                })
                            )
                        }
                    </ReactSortable>
                    <BuilderAddBlockComponent row={props.row} list={theItems} settings={props.settings} column={props.zone} setList={newState => props.onAddItem(props.row, zoneKey, newState)} key={location} location={location} id={'add-' + location} controlParams={props.controlParams} choices={props.choices} sender="mobile"/>
                </Fragment>
            }

        </div>
    )
}

export default OffCanvasColumnComponent;