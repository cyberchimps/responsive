/* jshint esversion: 6 */
import PropTypes from 'prop-types';
import classnames from 'classnames';
import ResponsiveControl from '../common/responsive.js';
import Icons from '../common/icons.js';
import { useState } from 'react';

const { __ } = wp.i18n;

const { ButtonGroup, Dashicon, Popover, Tooltip, Button } = wp.components;

const { Component, Fragment } = wp.element;
const AddComponent = props => {

	const [state, setState] = useState({
		isVisible: false,
	});

	const addItem = (item, row, column) => {
		setState({ isVisible: false });
		let updateItems = props.list;
		let theitem = [{
			id: item,
		}];
		updateItems.push({
			id: item,
		});
		props.setList(updateItems);
	}

	const renderItems = (item, row, column) => {
		let available = true;
		props.controlParams.rows.map((zone) => {
			Object.keys(props.settings[zone]).map((area) => {
				if (props.settings[zone][area].includes(item)) {
					available = false;
				}
			});
		});
		return <>
			{available && (
				<Button
					isTertiary
					className={'builder-add-btn'}
					onClick={() => {
						addItem(item, row, column);
					}}
				>
					{(undefined !== props.choices[item] && undefined !== props.choices[item].name ? props.choices[item].name : '')}
				</Button>
			)}
		</>

	};
	const toggleClose = () => {
		if (state.isVisible === true) {
			setState({ isVisible: false });
		}
	};
	let classForAdd = 'responsive-builder-add-item';

	if ('header_desktop_items' === props.controlParams.group && 'right' === props.location) {
		classForAdd = classForAdd + ' center-on-left';
	}
	if ('header_desktop_items' === props.controlParams.group && 'left' === props.location) {
		classForAdd = classForAdd + ' center-on-right';
	}
	if ('header_desktop_items' === props.controlParams.group && 'left_center' === props.location) {
		classForAdd = classForAdd + ' right-center-on-right';
	}
	if ('header_desktop_items' === props.controlParams.group && 'right_center' === props.location) {
		classForAdd = classForAdd + ' left-center-on-left';
	}
	return <>
		<div className={classForAdd} key={props.id}>
			{state.isVisible && (
				<Popover position="top" className="responsive-popover-add-builder" onClose={toggleClose}>
					<div className="responsive-popover-builder-list">
						<ButtonGroup className="responsive-radio-container-control">
							{
								Object.keys(props.choices).map((item) => {
									return renderItems(item, props.row, props.column);
								})}
						</ButtonGroup>
					</div>
				</Popover>
			)}
			<Button
				className="responsive-builder-item-add-icon"
				onClick={() => {
					setState({ isVisible: true });
				}}
			>
				<Dashicon icon="plus" />
			</Button>
		</div>
	</>


}
export default AddComponent;
