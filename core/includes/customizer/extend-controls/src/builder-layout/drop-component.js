/* jshint esversion: 6 */
import PropTypes from 'prop-types';
import classnames from 'classnames';
import ResponsiveControl from '../common/responsive.js';
import { ReactSortable } from "react-sortablejs";
import Icons from '../common/icons.js';
import ItemComponent from './item-component';
import AddComponent from './add-component';

const { __ } = wp.i18n;

const { ButtonGroup, Dashicon, Tooltip, Button } = wp.components;

const { Component, Fragment } = wp.element;
class DropComponent extends Component {
	render() {		
		const location = this.props.zone.replace( this.props.row + '_', '');
		const currentList = ( typeof this.props.items != "undefined" && this.props.items != null && this.props.items.length != null && this.props.items.length > 0 ? this.props.items : [] );
		let theItems = [];
		{ currentList.length > 0 && (
			currentList.map( ( item ) => {
				theItems.push(
					{
						id: item,
					}
				)
			} )
		) };
		const currentCenterList = ( typeof this.props.centerItems != "undefined" && this.props.centerItems != null && this.props.centerItems.length != null && this.props.centerItems.length > 0 ? this.props.centerItems : [] );
		let theCenterItems = [];
		{ currentCenterList.length > 0 && (
			currentCenterList.map( ( item ) => {
				theCenterItems.push(
					{
						id: item,
					}
				)
			} )
		) };
		return (
			<div className={ `responsive-builder-area responsive-builder-area-${ location }` } data-location={ this.props.zone }>
				<p className="responsive-small-label">{ this.props.controlParams.zones[this.props.row][this.props.zone] }</p>
				{ 'header_desktop_items' === this.props.controlParams.group && 'right' === location && (
					<Fragment>
						<ReactSortable animation={100} onStart={ () => this.props.showDrop() } onEnd={ () => this.props.hideDrop() } group={ this.props.controlParams.group } className={ `responsive-builder-drop responsive-builder-sortable-panel responsive-builder-drop-${ location }_center` } list={ theCenterItems } setList={ newState => this.props.onUpdate( this.props.row, this.props.zone + '_center', newState ) } >
							{ currentCenterList.length > 0 && (
								currentCenterList.map( ( item, index ) => {
									return <ItemComponent removeItem={ ( remove ) => this.props.removeItem( remove, this.props.row, this.props.zone + '_center' ) } focusItem={ ( focus ) => this.props.focusItem( focus ) } key={ item } index={ index } item={ item } controlParams={ this.props.controlParams } choices={ this.props.choices }/>;
								} )
							) }
						</ReactSortable>
						<AddComponent row={ this.props.row } list={ theCenterItems } settings={ this.props.settings } column={ this.props.zone + '_center' } setList={ newState => this.props.onAddItem( this.props.row, this.props.zone + '_center', newState ) } key={ location } location={ location + '_center' } id={ 'add-center-' + location } controlParams={ this.props.controlParams } choices={ this.props.choices } />
					</Fragment>
				) }
				<ReactSortable animation={100} onStart={ () => this.props.showDrop() } onEnd={ () => this.props.hideDrop() } group={ this.props.controlParams.group } className={ `responsive-builder-drop responsive-builder-sortable-panel responsive-builder-drop-${ location }` } list={ theItems } setList={ newState => this.props.onUpdate( this.props.row, this.props.zone, newState ) } >
					{ currentList.length > 0 && (
						currentList.map( ( item, index ) => {
							return <ItemComponent removeItem={ ( remove ) => this.props.removeItem( remove, this.props.row, this.props.zone ) } focusItem={ ( focus ) => this.props.focusItem( focus ) } key={ item } index={ index } item={ item } controlParams={ this.props.controlParams } choices={ this.props.choices } />;
						} )
					) }
				</ReactSortable>
				<AddComponent row={ this.props.row } list={ theItems } settings={ this.props.settings } column={ this.props.zone } setList={ newState => this.props.onAddItem( this.props.row, this.props.zone, newState ) } key={ location } location={ location } id={ 'add-' + location } controlParams={ this.props.controlParams } choices={ this.props.choices } />
				{ 'header_desktop_items' === this.props.controlParams.group && 'left' === location && (
					<Fragment>
						<ReactSortable animation={100} onStart={ () => this.props.showDrop() } onEnd={ () => this.props.hideDrop() } group={ this.props.controlParams.group } className={ `responsive-builder-drop responsive-builder-sortable-panel responsive-builder-drop-${ location }_center` } list={ theCenterItems } setList={ newState => this.props.onUpdate( this.props.row, this.props.zone + '_center', newState ) } >
							{ currentCenterList.length > 0 && (
								currentCenterList.map( ( item, index ) => {
									return <ItemComponent removeItem={ ( remove ) => this.props.removeItem( remove, this.props.row, this.props.zone + '_center' ) } focusItem={ ( focus ) => this.props.focusItem( focus ) } key={ item } index={ index } item={ item } controlParams={ this.props.controlParams } choices={ this.props.choices } />;
								} )
							) }
						</ReactSortable>
						<AddComponent row={ this.props.row } list={ theCenterItems } settings={ this.props.settings } column={ this.props.zone + '_center' } setList={ newState => this.props.onAddItem( this.props.row, this.props.zone + '_center', newState ) } key={ location } location={ location + '_center' } id={ 'add-center-' + location } controlParams={ this.props.controlParams } choices={ this.props.choices } />
					</Fragment>
				) }
			</div>
		);
	}
}
export default DropComponent;
