/* jshint esversion: 6 */
import PropTypes from 'prop-types';
import classnames from 'classnames';
import ResponsiveControl from '../common/responsive.js';
import Icons from '../common/icons.js';

const { __ } = wp.i18n;

const { ButtonGroup, Dashicon, Tooltip, Button } = wp.components;

const { Component, Fragment } = wp.element;
const ItemComponent = props => {

	const choices = props.choices;
	return <>
		<div className="responsive-builder-item" data-id={props.item} data-section={undefined !== choices[props.item] && undefined !== choices[props.item].section ? choices[props.item].section : ''} key={props.item}>
			<span
				className="responsive-builder-item-icon responsive-move-icon"
			>
				{Icons['drag']}
			</span>
			<span
				className="responsive-builder-item-text"
			>
				{(undefined !== choices[props.item] && undefined !== choices[props.item].name ? choices[props.item].name : '')}
			</span>
			<Button
				className="responsive-builder-item-focus-icon responsive-builder-item-icon"
				aria-label={__('Setting settings for', 'responsive') + ' ' + (undefined !== choices[props.item] && undefined !== choices[props.item].name ? choices[props.item].name : '')}
				onClick={() => {
					props.focusItem(undefined !== choices[props.item] && undefined !== choices[props.item].section ? choices[props.item].section : '');
				}}
			>
				<Dashicon icon="admin-generic" />
			</Button>
			{props.item.includes('widget') && 'toggle-widget' !== props.item && (
				<Button
					className="responsive-builder-item-focus-icon responsive-builder-item-icon"
					aria-label={__('Setting settings for', 'responsive') + ' ' + (undefined !== choices[props.item] && undefined !== choices[props.item].name ? choices[props.item].name : '')}
					onClick={() => {
						props.focusItem(undefined !== choices[props.item] && undefined !== choices[props.item].section ? 'responsive_customizer_' + choices[props.item].section : '');
					}}
				>
					<Dashicon icon="admin-settings" />
				</Button>
			)}
			<Button
				className="responsive-builder-item-icon"
				aria-label={__('Remove', 'responsive') + ' ' + (undefined !== choices[props.item] && undefined !== choices[props.item].name ? choices[props.item].name : '')}
				onClick={() => {
					props.removeItem(props.item);
				}}
			>
				<Dashicon icon="no-alt" />
			</Button>
		</div>
	</>
}
export default ItemComponent;
