/* jshint esversion: 6 */
import PropTypes from 'prop-types';
import classnames from 'classnames';
import ResponsiveControl from '../common/responsive.js';
import Icons from '../common/icons.js';
import DropComponent from './drop-component';

const { __ } = wp.i18n;

const { ButtonGroup, Dashicon, Tooltip, Button } = wp.components;

const RowComponent = props => {
	const {
		customizer,
		controlParams,
		focusPanel,
		removeItem
	} = props;
	const controlParamsGroup = controlParams.group;
	let centerClass = 'no-center-items';
	if ('header_desktop_items' === controlParamsGroup && typeof props.items[props.row + '_center'] != "undefined" && props.items[props.row + '_center'] != null && props.items[props.row + '_center'].length != null && props.items[props.row + '_center'].length > 0) {
		centerClass = 'has-center-items';
	}
	if ('popup' === props.row) {
		centerClass = 'popup-vertical-group';
	}
	if ('footer_items' === controlParamsGroup) {
		// var layout = customizer.control('footer_' + props.row + '_layout').setting.get();
		var columns = customizer.control('responsive_footer_' + props.row + '_columns').setting.get();
		var direction = customizer.control('responsive_footer_' + props.row + '_direction_desktop').setting.get();
		centerClass = 'footer-column-row footer-row-columns-' + columns + ' footer-row-layout-equal' + ' footer-row-direction-' + direction;  //' footer-row-layout-' + layout.desktop.
	}
	const mode = (controlParamsGroup.indexOf('header') !== -1 ? 'header' : 'footer');
	let besideItems = [];
	return <>
		<div className={`responsive-builder-areas ${centerClass}`}>
			<Button
				className="responsive-row-left-actions"
				aria-label={__('Edit Settings for', 'responsive') + ' ' + (props.row === 'popup' ? __('Off Canvas', 'responsive') : props.row + ' ' + __('Row', 'responsive'))}
				onClick={() => focusPanel(mode + '_' + props.row)}
				icon="admin-generic"
			>
			</Button>
			<Button
				className="responsive-row-actions"
				aria-label={__('Edit Settings for', 'responsive') + ' ' + (props.row === 'popup' ? __('Off Canvas', 'responsive') : props.row + ' ' + __('Row', 'responsive'))}
				onClick={() => focusPanel(mode + '_' + props.row)}
			>
				{(props.row === 'popup' ? __('Off Canvas', 'responsive') : props.row + ' ' + __('Row', 'responsive'))}
				<Dashicon icon="admin-generic" />
			</Button>
			<div className="responsive-builder-group responsive-builder-group-horizontal" data-setting={props.row}>
				{Object.keys(controlParams.zones[props.row]).map((zone, index) => {
					if (props.row + '_left_center' === zone || props.row + '_right_center' === zone) {
						return;
					}
					if ('footer_items' === controlParamsGroup) {
						if (columns < (index + 1)) {
							return;
						}
					}
					if ('header_desktop_items' === controlParamsGroup && props.row + '_left' === zone) {
						besideItems = props.items[props.row + '_left_center'];
					}
					if ('header_desktop_items' === controlParamsGroup && props.row + '_right' === zone) {
						besideItems = props.items[props.row + '_right_center'];
					}
					return <DropComponent removeItem={(remove, removeRow, removeZone) => removeItem(remove, removeRow, removeZone)} focusItem={(focus) => props.focusItem(focus)} hideDrop={() => props.hideDrop()} showDrop={() => props.showDrop()} onUpdate={(updateRow, updateZone, updateItems) => props.onUpdate(updateRow, updateZone, updateItems)} zone={zone} row={props.row} choices={props.choices} key={zone} items={props.items[zone]} centerItems={besideItems} controlParams={controlParams} onAddItem={(updateRow, updateZone, updateItems) => props.onAddItem(updateRow, updateZone, updateItems)} settings={props.settings} />;
				})}
			</div>
		</div>
	</>
}
export default RowComponent;
