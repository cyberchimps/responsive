/* jshint esversion: 6 */
import PropTypes from 'prop-types';
import classnames from 'classnames';
import ResponsiveControl from '../common/responsive.js';
import Icons from '../common/icons.js';

import RowComponent from './row-component';

const { __ } = wp.i18n;

const { ButtonGroup, Dashicon, Tooltip, Button } = wp.components;

const { Component, Fragment } = wp.element;
class BuilderComponent extends Component {
	constructor() {
		super( ...arguments );
		this.updateValues = this.updateValues.bind( this );
		this.onDragEnd = this.onDragEnd.bind( this );
		this.onAddItem = this.onAddItem.bind( this );
		this.onDragStart = this.onDragStart.bind( this );
		this.onDragStop = this.onDragStop.bind( this );
		this.removeItem = this.removeItem.bind( this );
		this.focusPanel = this.focusPanel.bind( this );
		this.focusItem = this.focusItem.bind( this );
		this.onFooterUpdate = this.onFooterUpdate.bind( this );
		this.linkColumns();
		let value = this.props.control.setting.get();
		let baseDefault = {};
		this.defaultValue = this.props.control.params.default ? {
			...baseDefault,
			...this.props.control.params.default
		} : baseDefault;
		value = value ? {
			...this.defaultValue,
			...value
		} : this.defaultValue;
		let defaultParams = {};
		this.controlParams = this.props.control.params.input_attrs ? {
			...defaultParams,
			...this.props.control.params.input_attrs,
		} : defaultParams;
		let responsiveCustomizerControlsData = this.props.control.params.choices;
		this.choices = responsiveCustomizerControlsData;//( responsiveCustomizerControlsData && responsiveCustomizerControlsData[ this.controlParams.group ] ? responsiveCustomizerControlsData.choices[ this.controlParams.group ] : [] );
		this.state = {
			value: value,
		};
	 console.log(this.choices);
	}
	onDragStart() {
		var dropzones = document.querySelectorAll( '.responsive-builder-area' );
		var i;
		for (i = 0; i < dropzones.length; ++i) {
			dropzones[i].classList.add( 'responsive-dragging-dropzones' );
		}
	}
	onDragStop() {
		var dropzones = document.querySelectorAll( '.responsive-builder-area' );
		var i;
		for (i = 0; i < dropzones.length; ++i) {
			dropzones[i].classList.remove( 'responsive-dragging-dropzones' );
		}
	}
	removeItem( item, row, zone ) {
		let updateState = this.state.value;
		let update = updateState[ row ];
		let updateItems = [];
		{ update[ zone ].length > 0 && (
			update[ zone ].map( ( old ) => {
				if ( item !== old ) {
					updateItems.push( old );
				}
			} )
		) };
		if ( 'header_desktop_items' === this.controlParams.group &&  row + '_center' === zone && updateItems.length === 0 ) {
			if ( update[ row + '_left_center' ].length > 0 ) {
				update[ row + '_left_center' ].map( ( move ) => {
					updateState[ row ][ row + '_left' ].push( move );
				} )
				updateState[ row ][ row + '_left_center' ] = [];
			}
			if ( update[ row + '_right_center' ].length > 0 ) {
				update[ row + '_right_center' ].map( ( move ) => {
					updateState[ row ][ row + '_right' ].push( move );
				} )
				updateState[ row ][ row + '_right_center' ] = [];
			}
		}
		update[ zone ] = updateItems;
		updateState[ row ][ zone ] = updateItems;
		this.setState( { value: updateState } );
		this.updateValues( updateState );
		let event = new CustomEvent(
			'responsiveRemovedBuilderItem', {
				'detail': this.controlParams.group
			} );
		document.dispatchEvent( event );
	}
	onDragEnd( row, zone, items ) {
		let updateState = this.state.value;
		let update = updateState[ row ];
		let updateItems = [];
		{ items.length > 0 && (
			items.map( ( item ) => {
				updateItems.push( item.id );
			} )
		) };
		if ( ! this.arraysEqual( update[ zone ], updateItems ) ) {
			if ( 'header_desktop_items' === this.controlParams.group && row + '_center' === zone && updateItems.length === 0 ) {
				if ( undefined !== update[ row + '_left_center' ] && update[ row + '_left_center' ].length > 0 ) {
					update[ row + '_left_center' ].map( ( move ) => {
						updateState[ row ][ row + '_left' ].push( move );
					} )
					updateState[ row ][ row + '_left_center' ] = [];
				}
				if ( undefined !== update[ row + '_right_center' ] && update[ row + '_right_center' ].length > 0 ) {
					update[ row + '_right_center' ].map( ( move ) => {
						updateState[ row ][ row + '_right' ].push( move );
					} )
					updateState[ row ][ row + '_right_center' ] = [];
				}
			}
			update[ zone ] = updateItems;
			updateState[ row ][ zone ] = updateItems;
			this.setState( { value: updateState } );
			this.updateValues( updateState );
		}
	}
	onAddItem( row, zone, items ) {
		this.onDragEnd( row, zone, items );
		let event = new CustomEvent(
			'responsiveRemovedBuilderItem', {
				'detail': this.controlParams.group
			} );
		document.dispatchEvent( event );
	}
	onFooterUpdate( row ) {
		let updateState = this.state.value;
		let update = updateState[ row ];
		let removeEvent = false;
		const columns = parseInt( this.props.customizer.control( 'footer_' + row + '_columns' ).setting.get(), 10 );
		if ( columns < 5 ) {
			if ( undefined !== update[ row + '_5' ] && update[ row + '_5' ].length > 0 ) {
				updateState[ row ][ row + '_5' ] = [];
				removeEvent = true;
			}
		}
		if ( columns < 4 ) {
			if ( undefined !== update[ row + '_4' ] && update[ row + '_4' ].length > 0 ) {
				updateState[ row ][ row + '_4' ] = [];
				removeEvent = true;
			}
		}
		if ( columns < 3 ) {
			if ( undefined !== update[ row + '_3' ] && update[ row + '_3' ].length > 0 ) {
				updateState[ row ][ row + '_3' ] = [];
				removeEvent = true;
			}
		}
		if ( columns < 2 ) {
			if ( undefined !== update[ row + '_2' ] && update[ row + '_2' ].length > 0 ) {
				updateState[ row ][ row + '_2' ] = [];
				removeEvent = true;
			}
		}
		this.setState( { value: updateState } );
		this.updateValues( updateState );
		if ( removeEvent ) {
			let event = new CustomEvent(
				'responsiveRemovedBuilderItem', {
					'detail': this.controlParams.group
				} );
			document.dispatchEvent( event );
		}
	}
	arraysEqual( a, b ) {
		if (a === b) return true;
		if (a == null || b == null) return false;
		if (a.length != b.length) return false;		
		for (var i = 0; i < a.length; ++i) {
			if (a[i] !== b[i]) return false;
		}
		return true;
	}
	focusPanel( item ) {
		if ( undefined !== this.props.customizer.section( 'responsive_customizer_' + item ) ) {
			this.props.customizer.section( 'responsive_customizer_' + item ).focus();
		}
	}
	focusItem( item ) {
		if ( undefined !== this.props.customizer.section( item ) ) {
			this.props.customizer.section( item ).focus();
		}
	}
	render() {
		return (
			<div className={ `responsive-control-field responsive-builder-items${ ( this.controlParams.rows.includes( 'popup' ) ? ' responsive-builder-items-with-popup' : '' ) }` }>
				{ this.controlParams.rows.includes( 'popup' ) && (
					<RowComponent showDrop={ () => this.onDragStart() }
						 focusPanel={ ( item ) => this.focusPanel( item ) }
						 focusItem={ ( item ) => this.focusItem( item ) }
						 removeItem={ ( remove, row, zone ) => this.removeItem( remove, row, zone ) } 
						 onAddItem={ ( updateRow, updateZone, updateItems ) => this.onAddItem( updateRow, updateZone, updateItems ) } 
						 hideDrop={ () => this.onDragStop() } onUpdate={ ( updateRow, updateZone, updateItems ) => this.onDragEnd( updateRow, updateZone, updateItems ) } 
						 key={ 'popup' } row={ 'popup' }
						 controlParams={ this.controlParams } 
						 choices={ this.choices } 
						 items={ this.state.value[ 'popup' ] } 
						 settings={ this.state.value }
						/>
				) }
				<div className="responsive-builder-row-items">
					{ this.controlParams.rows.map( ( row ) => {
						if ( 'popup' === row ) {
							return;
						}
						return <RowComponent showDrop={ () => this.onDragStart() }
						 focusPanel={ ( item ) => this.focusPanel( item ) }
						 focusItem={ ( item ) => this.focusItem( item ) }
						 removeItem={ ( remove, row, zone ) => this.removeItem( remove, row, zone ) }
						 hideDrop={ () => this.onDragStop() } 
						 onUpdate={ ( updateRow, updateZone, updateItems ) => this.onDragEnd( updateRow, updateZone, updateItems ) }
						 onAddItem={ ( updateRow, updateZone, updateItems ) => this.onAddItem( updateRow, updateZone, updateItems ) }
						 key={ row } row={ row }
						 controlParams={ this.controlParams }
						 choices={ this.choices }
						 customizer={ this.props.customizer }
						 items={ this.state.value[ row ] }
						 settings={ this.state.value } 
						/>;
					} ) }
				</div>
			</div>
		);
	}
	// linkFocusButtons() {
	// 	this.props.control.container.on( 'click', '.responsive-builder-areas .responsive-builder-item', function( e ) {
	// 		e.preventDefault();
	// 		var targetKey = e.target.getAttribute( 'data-section' );
	// 		var targetControl = wp.customize.section( targetKey );
	// 		if ( targetControl ) targetControl.focus();
	// 	} );
	// }
	updateValues( value ) {
		this.props.control.setting.set( {
			...this.props.control.setting.get(),
			...value,
			flag: !this.props.control.setting.get().flag
		} );
	}
	linkColumns() {
		let self = this;
		document.addEventListener( 'responsiveUpdateFooterColumns', function( e ) {
			if ( 'footer_items' === self.controlParams.group ) {
				self.onFooterUpdate( e.detail );
			}
		} );
	}
}

BuilderComponent.propTypes = {
	control: PropTypes.object.isRequired,
	customizer: PropTypes.object.isRequired
};

export default BuilderComponent;
