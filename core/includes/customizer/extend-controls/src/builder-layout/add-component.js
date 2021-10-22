/* jshint esversion: 6 */
import PropTypes from 'prop-types';
import classnames from 'classnames';
import ResponsiveControl from '../common/responsive.js';
import Icons from '../common/icons.js';

const { __ } = wp.i18n;

const { ButtonGroup, Dashicon, Popover, Tooltip, Button } = wp.components;

const { Component, Fragment } = wp.element;
class AddComponent extends Component {
	constructor() {
		super( ...arguments );
		this.addItem = this.addItem.bind( this );
		this.state = {
			isVisible: false,
		}
	}
	addItem( item, row, column ) {
		this.setState( { isVisible: false } );
		let updateItems = this.props.list;
		let theitem = [ {
			id: item,
		} ];
		updateItems.push( {
			id: item,
		});
		this.props.setList( updateItems );
	}
	render() {
		const renderItems = ( item, row, column ) => {
			let available = true;
			this.props.controlParams.rows.map( ( zone ) => {
				Object.keys( this.props.settings[zone] ).map( ( area ) => {
					if ( this.props.settings[zone][area].includes( item ) ) {
						available = false;
					}
				} );
			} );
			return (
				<Fragment>
					{ available && (
						<Button
							isTertiary
							className={ 'builder-add-btn' }
							onClick={ () => {
								this.addItem( item, row, column );
							} }
						>
							{ ( undefined !== this.props.choices[ item ] && undefined !== this.props.choices[ item ].name ? this.props.choices[ item ].name : '' ) }
						</Button>
					) }
				</Fragment>
			);
		};
		const toggleClose = () => {
			if ( this.state.isVisible === true ) {
				this.setState( { isVisible: false } );
			}
		};
		let classForAdd = 'responsive-builder-add-item';

		if ( 'header_desktop_items' === this.props.controlParams.group && 'right' === this.props.location ) {
			classForAdd = classForAdd + ' center-on-left';
		}
		if ( 'header_desktop_items' === this.props.controlParams.group && 'left' === this.props.location ) {
			classForAdd = classForAdd + ' center-on-right';
		}
		if ( 'header_desktop_items' === this.props.controlParams.group && 'left_center' === this.props.location ) {
			classForAdd = classForAdd + ' right-center-on-right';
		}
		if ( 'header_desktop_items' === this.props.controlParams.group && 'right_center' === this.props.location ) {
			classForAdd = classForAdd + ' left-center-on-left';
		}
		return (
			<div className={ classForAdd } key={ this.props.id }>
				{ this.state.isVisible && (
					<Popover position="top" className="responsive-popover-add-builder" onClose={ toggleClose }>
						<div className="responsive-popover-builder-list">
							<ButtonGroup className="responsive-radio-container-control">
								{
								Object.keys( this.props.choices ).map( ( item ) => {
									return renderItems( item, this.props.row, this.props.column );
								} ) }
							</ButtonGroup>
						</div>
					</Popover>
				) }
				<Button
					className="responsive-builder-item-add-icon"
					onClick={ () => {
						this.setState( { isVisible: true } );
					} }
				>
					<Dashicon icon="plus"/>
				</Button>
			</div>
		);
	}
}
export default AddComponent;
