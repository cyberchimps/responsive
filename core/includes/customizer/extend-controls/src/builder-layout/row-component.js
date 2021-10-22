/* jshint esversion: 6 */
import PropTypes from 'prop-types';
import classnames from 'classnames';
import ResponsiveControl from '../common/responsive.js';
import Icons from '../common/icons.js';
import DropComponent from './drop-component';

const { __ } = wp.i18n;

const { ButtonGroup, Dashicon, Tooltip, Button } = wp.components;

const { Component, Fragment } = wp.element;
class RowComponent extends Component {
	render() {
		let centerClass = 'no-center-items';
		if ( 'header_desktop_items' === this.props.controlParams.group && typeof this.props.items[this.props.row + '_center'] != "undefined" && this.props.items[this.props.row + '_center'] != null && this.props.items[this.props.row + '_center'].length != null && this.props.items[this.props.row + '_center'].length > 0  ){
			centerClass = 'has-center-items';
		}
		if ( 'popup' === this.props.row ) {
			centerClass = 'popup-vertical-group';
		}
		if ( 'footer_items' === this.props.controlParams.group ) {
			var columns = this.props.customizer.control( 'footer_' + this.props.row + '_columns' ).setting.get();
			var layout = this.props.customizer.control( 'footer_' + this.props.row + '_layout' ).setting.get();
			var direction = this.props.customizer.control( 'footer_' + this.props.row + '_direction' ).setting.get();
			centerClass = 'footer-column-row footer-row-columns-' + columns + ' footer-row-layout-' + layout.desktop + ' footer-row-direction-' + direction.desktop;
		}
		const mode = ( this.props.controlParams.group.indexOf( 'header' ) !== -1 ? 'header' : 'footer' );
		let besideItems = [];
		return (
			<div className={ `responsive-builder-areas ${ centerClass }` }>
				<Button
					className="responsive-row-left-actions"
					aria-label={ __( 'Edit Settings for', 'responsive' ) + ' ' + ( this.props.row === 'popup' ? __( 'Off Canvas', 'responsive' ) : this.props.row + ' ' + __( 'Row', 'responsive' ) ) }
					onClick={ () => this.props.focusPanel( mode + '_' + this.props.row ) }
					icon="admin-generic"
				>
				</Button>
				<Button
					className="responsive-row-actions"
					aria-label={ __( 'Edit Settings for', 'responsive' ) + ' ' + ( this.props.row === 'popup' ? __( 'Off Canvas', 'responsive' ) : this.props.row + ' ' + __( 'Row', 'responsive' ) ) }
					onClick={ () => this.props.focusPanel( mode + '_' + this.props.row ) }
				>
					{ ( this.props.row === 'popup' ? __( 'Off Canvas', 'responsive' ) : this.props.row + ' ' + __( 'Row', 'responsive' ) ) }
					<Dashicon icon="admin-generic" />
				</Button>
				<div className="responsive-builder-group responsive-builder-group-horizontal" data-setting={ this.props.row }>
					{ Object.keys( this.props.controlParams.zones[ this.props.row ] ).map( ( zone, index ) => {
						if ( this.props.row + '_left_center' === zone || this.props.row + '_right_center' === zone ) {
							return;
						}
						if ( 'footer_items' === this.props.controlParams.group ) {
							if ( columns < ( index + 1 ) ) {
								return;
							}
						}
						if ( 'header_desktop_items' === this.props.controlParams.group && this.props.row + '_left' === zone ) {
							besideItems = this.props.items[ this.props.row + '_left_center' ];
						}
						if ( 'header_desktop_items' === this.props.controlParams.group && this.props.row + '_right' === zone ) {
							besideItems = this.props.items[ this.props.row + '_right_center' ];
						}
						return <DropComponent removeItem={ ( remove, removeRow, removeZone ) => this.props.removeItem( remove, removeRow, removeZone ) } focusItem={ ( focus ) => this.props.focusItem( focus ) } hideDrop={ () => this.props.hideDrop() } showDrop={ () => this.props.showDrop() } onUpdate={ ( updateRow, updateZone, updateItems ) => this.props.onUpdate( updateRow, updateZone, updateItems ) } zone={ zone } row={ this.props.row } choices={ this.props.choices } key={ zone } items={ this.props.items[zone] } centerItems={ besideItems } controlParams={ this.props.controlParams } onAddItem={ ( updateRow, updateZone, updateItems ) => this.props.onAddItem( updateRow, updateZone, updateItems ) } settings={ this.props.settings } />;
					} ) }
				</div>
			</div>
		);
	}
}
export default RowComponent;
