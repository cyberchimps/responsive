/* jshint esversion: 6 */
import PropTypes from 'prop-types';
import classnames from 'classnames';
import ResponsiveControl from '../common/responsive.js';
import Icons from '../common/icons.js';
import { useState } from 'react';

import RowComponent from './row-component';

const { __ } = wp.i18n;

const { ButtonGroup, Dashicon, Tooltip, Button } = wp.components;

const BuilderComponent = props => {
	let value = props.control.setting.get();
	let baseDefault = {};
	const defaultValue = props.control.params.default ? {
		...baseDefault,
		...props.control.params.default
	} : baseDefault;
	value = value ? {
		...defaultValue,
		...value
	} : defaultValue;
	let defaultParams = {};
	const controlParams = props.control.params.input_attrs ? {
		...defaultParams,
		...props.control.params.input_attrs,
	} : defaultParams;

	const choices = props.control.params.choices ? props.control.params.choices : [];

	const [state, setState] = useState({
		value: value,
	});
	const linkColumns = () => {
		let self = this;
		document.addEventListener('responsiveUpdateFooterColumns', function (e) {
			if ('footer_items' === self.controlParams.group) {
				self.onFooterUpdate(e.detail);
			}
		});
	}
	linkColumns();
	const onDragStart = (e) => {
		var dropzones = document.querySelectorAll('.responsive-builder-area');
		var i;
		for (i = 0; i < dropzones.length; ++i) {
			dropzones[i].classList.add('responsive-dragging-dropzones');
		}
	}
	const onDragStop = () => {
		var dropzones = document.querySelectorAll('.responsive-builder-area');
		var i;
		for (i = 0; i < dropzones.length; ++i) {
			dropzones[i].classList.remove('responsive-dragging-dropzones');
		}
	}
	const updateValues = (value) => {
		props.control.setting.set({
			...props.control.setting.get(),
			...value,
			flag: !props.control.setting.get().flag
		});
	}
	const removeItem = (item, row, zone) => {
		let updateState = state.value;
		let update = updateState[row];
		let updateItems = [];
		{
			update[zone].length > 0 && (
				update[zone].map((old) => {
					if (item !== old) {
						updateItems.push(old);
					}
				})
			)
		};
		if ('header_desktop_items' === controlParams.group && row + '_center' === zone && updateItems.length === 0) {
			if (update[row + '_left_center'].length > 0) {
				update[row + '_left_center'].map((move) => {
					updateState[row][row + '_left'].push(move);
				})
				updateState[row][row + '_left_center'] = [];
			}
			if (update[row + '_right_center'].length > 0) {
				update[row + '_right_center'].map((move) => {
					updateState[row][row + '_right'].push(move);
				})
				updateState[row][row + '_right_center'] = [];
			}
		}
		update[zone] = updateItems;
		updateState[row][zone] = updateItems;
		setState({ value: updateState });
		updateValues(updateState);
		let event = new CustomEvent(
			'responsiveRemovedBuilderItem', {
			'detail': controlParams.group
		});
		document.dispatchEvent(event);
	}
	const onDragEnd = (row, zone, items) => {
		let updateState = state.value;
		let update = updateState[row];
		let updateItems = [];
		{
			items.length > 0 && (
				items.map((item) => {
					updateItems.push(item.id);
				})
			)
		};
		if (!arraysEqual(update[zone], updateItems)) {
			if ('header_desktop_items' === controlParams.group && row + '_center' === zone && updateItems.length === 0) {
				if (undefined !== update[row + '_left_center'] && update[row + '_left_center'].length > 0) {
					update[row + '_left_center'].map((move) => {
						updateState[row][row + '_left'].push(move);
					})
					updateState[row][row + '_left_center'] = [];
				}
				if (undefined !== update[row + '_right_center'] && update[row + '_right_center'].length > 0) {
					update[row + '_right_center'].map((move) => {
						updateState[row][row + '_right'].push(move);
					})
					updateState[row][row + '_right_center'] = [];
				}
			}
			update[zone] = updateItems;
			updateState[row][zone] = updateItems;
			setState({ value: updateState });
			updateValues(updateState);
		}
	}
	const onAddItem = (row, zone, items) => {
		onDragEnd(row, zone, items);
		let event = new CustomEvent(
			'responsiveRemovedBuilderItem', {
			'detail': controlParams.group
		});
		document.dispatchEvent(event);
	}
	const onFooterUpdate = (row) => {
		let updateState = state.value;
		let update = updateState[row];
		let removeEvent = false;
		const columns = parseInt(props.customizer.control('footer_' + row + '_columns').setting.get(), 10);
		if (columns < 5) {
			if (undefined !== update[row + '_5'] && update[row + '_5'].length > 0) {
				updateState[row][row + '_5'] = [];
				removeEvent = true;
			}
		}
		if (columns < 4) {
			if (undefined !== update[row + '_4'] && update[row + '_4'].length > 0) {
				updateState[row][row + '_4'] = [];
				removeEvent = true;
			}
		}
		if (columns < 3) {
			if (undefined !== update[row + '_3'] && update[row + '_3'].length > 0) {
				updateState[row][row + '_3'] = [];
				removeEvent = true;
			}
		}
		if (columns < 2) {
			if (undefined !== update[row + '_2'] && update[row + '_2'].length > 0) {
				updateState[row][row + '_2'] = [];
				removeEvent = true;
			}
		}
		setState({ value: updateState });
		updateValues(updateState);
		if (removeEvent) {
			let event = new CustomEvent(
				'responsiveRemovedBuilderItem', {
				'detail': controlParams.group
			});
			document.dispatchEvent(event);
		}
	}
	const arraysEqual = (a, b) => {
		if (a === b) return true;
		if (a == null || b == null) return false;
		if (a.length != b.length) return false;
		for (var i = 0; i < a.length; ++i) {
			if (a[i] !== b[i]) return false;
		}
		return true;
	}
	const focusPanel = (item) => {
		if (undefined !== props.customizer.section('responsive_customizer_' + item)) {
			props.customizer.section('responsive_customizer_' + item).focus();
		}
	}
	const focusItem = (item) => {
		if (undefined !== props.customizer.section(item)) {
			props.customizer.section(item).focus();
		}
	}
	return <>
		<div className={`responsive-control-field responsive-builder-items${(controlParams.rows.includes('popup') ? ' responsive-builder-items-with-popup' : '')}`}>
			{controlParams.rows.includes('popup') && (
				<RowComponent showDrop={() => onDragStart()}
					focusPanel={(item) => focusPanel(item)}
					focusItem={(item) => focusItem(item)}
					removeItem={(remove, row, zone) => removeItem(remove, row, zone)}
					onAddItem={(updateRow, updateZone, updateItems) => onAddItem(updateRow, updateZone, updateItems)}
					hideDrop={() => onDragStop()} onUpdate={(updateRow, updateZone, updateItems) => onDragEnd(updateRow, updateZone, updateItems)}
					key={'popup'} row={'popup'}
					controlParams={controlParams}
					choices={choices}
					items={state.value['popup']}
					settings={state.value}
				/>
			)}
			<div className="responsive-builder-row-items">
				{controlParams.rows.map((row) => {
					if ('popup' === row) {
						return;
					}
					return <RowComponent showDrop={() => onDragStart()}
						focusPanel={(item) => focusPanel(item)}
						focusItem={(item) => focusItem(item)}
						removeItem={(remove, row, zone) => removeItem(remove, row, zone)}
						hideDrop={() => onDragStop()}
						onUpdate={(updateRow, updateZone, updateItems) => onDragEnd(updateRow, updateZone, updateItems)}
						onAddItem={(updateRow, updateZone, updateItems) => onAddItem(updateRow, updateZone, updateItems)}
						key={row} row={row}
						controlParams={controlParams}
						choices={choices}
						customizer={props.customizer}
						items={state.value[row]}
						settings={state.value}
					/>;
				})}
			</div>
		</div>
	</>
	// linkFocusButtons() {
	// 	props.control.container.on( 'click', '.responsive-builder-areas .responsive-builder-item', function( e ) {
	// 		e.preventDefault();
	// 		var targetKey = e.target.getAttribute( 'data-section' );
	// 		var targetControl = wp.customize.section( targetKey );
	// 		if ( targetControl ) targetControl.focus();
	// 	} );
	// }
}

BuilderComponent.propTypes = {
	control: PropTypes.object.isRequired,
	// customizer: PropTypes.object.isRequired
};

export default BuilderComponent;
