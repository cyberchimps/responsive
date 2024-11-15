import BuilderAddBlockComponent from './add-block-component';
import BuilderSingleBlockComponent from './single-block-component';
import { ReactSortable } from "react-sortablejs";
const { Fragment } = wp.element;

const BuilderSingleRowComponent = props => {

	const location = props.zone.replace(props.row + '_', '');
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
	};
	const currentCenterList = (typeof props.centerItems != "undefined" && props.centerItems != null && props.centerItems.length != null && props.centerItems.length > 0 ? props.centerItems : []);
	let theCenterItems = [];
	{
		currentCenterList.length > 0 && (
			currentCenterList.map((item) => {
				theCenterItems.push(
					{
						id: item,
					}
				)
			})
		)
	};
	return (
		<div className={`responsive-builder-area responsive-builder-area-${location}`} data-location={props.zone}>
			{'header_desktop_items' === props.controlParams.group && 'right' === location && (
				<Fragment>
					<ReactSortable animation={100} onStart={() => props.showDrop()} onEnd={() => props.hideDrop()} group={props.controlParams.group} className={`responsive-builder-drop responsive-hfb-builder-sortable-panel responsive-builder-drop-${location}_center`} list={theCenterItems} setList={newState => props.onUpdate(props.row, props.zone + '_center', newState)} >
						{currentCenterList.length > 0 && (
							currentCenterList.map((item, index) => {
								return <BuilderSingleBlockComponent removeItem={(remove) => props.removeItem(remove, props.row, props.zone + '_center')} focusItem={(focus) => props.focusItem(focus)} key={item} index={index} item={item} controlParams={props.controlParams} choices={props.choices} />;
							})
						)}
					</ReactSortable>
					<BuilderAddBlockComponent row={props.row} list={theCenterItems} settings={props.settings} column={props.zone + '_center'} setList={newState => props.onAddItem(props.row, props.zone + '_center', newState)} key={location} location={location + '_center'} id={'add-center-' + location} controlParams={props.controlParams} choices={props.choices} />
				</Fragment>
			)}
			<ReactSortable animation={100} onStart={() => props.showDrop()} onEnd={() => props.hideDrop()} group={props.controlParams.group} className={`responsive-builder-drop responsive-hfb-builder-sortable-panel responsive-builder-drop-${location}`} list={theItems} setList={newState => props.onUpdate(props.row, props.zone, newState)} >
				{currentList.length > 0 && (
					currentList.map((item, index) => {
						return <BuilderSingleBlockComponent removeItem={(remove) => props.removeItem(remove, props.row, props.zone)} focusItem={(focus) => props.focusItem(focus)} key={item} index={index} item={item} controlParams={props.controlParams} choices={props.choices} />;
					})
				)}
			</ReactSortable>
			<BuilderAddBlockComponent row={props.row} list={theItems} settings={props.settings} column={props.zone} setList={newState => props.onAddItem(props.row, props.zone, newState)} key={location} location={location} id={'add-' + location} controlParams={props.controlParams} choices={props.choices} />
			{'header_desktop_items' === props.controlParams.group && 'left' === location && (
				<Fragment>
					<ReactSortable animation={100} onStart={() => props.showDrop()} onEnd={() => props.hideDrop()} group={props.controlParams.group} className={`responsive-builder-drop responsive-hfb-builder-sortable-panel responsive-builder-drop-${location}_center`} list={theCenterItems} setList={newState => props.onUpdate(props.row, props.zone + '_center', newState)} >
						{currentCenterList.length > 0 && (
							currentCenterList.map((item, index) => {
								return <BuilderSingleBlockComponent removeItem={(remove) => props.removeItem(remove, props.row, props.zone + '_center')} focusItem={(focus) => props.focusItem(focus)} key={item} index={index} item={item} controlParams={props.controlParams} choices={props.choices} />;
							})
						)}
					</ReactSortable>
					<BuilderAddBlockComponent row={props.row} list={theCenterItems} settings={props.settings} column={props.zone + '_center'} setList={newState => props.onAddItem(props.row, props.zone + '_center', newState)} key={location} location={location + '_center'} id={'add-center-' + location} controlParams={props.controlParams} choices={props.choices} />
				</Fragment>
			)}
		</div>
	);
}
export default BuilderSingleRowComponent;
