/* jshint esversion: 6 */
import PropTypes from 'prop-types';
import classnames from 'classnames';
import ResponsiveControl from '../common/responsive.js';
import Icons from '../common/icons.js';

const { __ } = wp.i18n;

const { ButtonGroup, Dashicon, Tooltip, Button } = wp.components;

const { Component, Fragment } = wp.element;
class ItemComponent extends Component {
	constructor() {
		super( ...arguments );
		this.choices = this.props.choices;
	}
	render() {
		return (
			<div className="responsive-builder-item" data-id={ this.props.item } data-section={ undefined !== this.choices[ this.props.item ] && undefined !== this.choices[ this.props.item ].section ? this.choices[ this.props.item ].section : '' } key={ this.props.item }>
				<span
					className="responsive-builder-item-icon responsive-move-icon"
				>
					{ Icons['drag'] }
				</span>
				<span
					className="responsive-builder-item-text"
				>
					{ ( undefined !== this.choices[ this.props.item ] && undefined !== this.choices[ this.props.item ].name ? this.choices[ this.props.item ].name : '' ) }
				</span>
				<Button
					className="responsive-builder-item-focus-icon responsive-builder-item-icon"
					aria-label={ __( 'Setting settings for', 'responsive' ) + ' ' + ( undefined !== this.choices[ this.props.item ] && undefined !== this.choices[ this.props.item ].name ? this.choices[ this.props.item ].name : '' ) }
					onClick={ () => {
						this.props.focusItem( undefined !== this.choices[ this.props.item ] && undefined !== this.choices[ this.props.item ].section ? this.choices[ this.props.item ].section : '' );
					} }
				>
					<Dashicon icon="admin-generic"/>
				</Button>
				{ this.props.item.includes('widget') && 'toggle-widget' !== this.props.item && (
					<Button
						className="responsive-builder-item-focus-icon responsive-builder-item-icon"
						aria-label={ __( 'Setting settings for', 'responsive' ) + ' ' + ( undefined !== this.choices[ this.props.item ] && undefined !== this.choices[ this.props.item ].name ? this.choices[ this.props.item ].name : '' ) }
						onClick={ () => {
							this.props.focusItem( undefined !== this.choices[ this.props.item ] && undefined !== this.choices[ this.props.item ].section ? 'responsive_customizer_' + this.choices[ this.props.item ].section : '' );
						} }
					>
						<Dashicon icon="admin-settings"/>
					</Button>
				) }
				<Button
					className="responsive-builder-item-icon"
					aria-label={ __( 'Remove', 'responsive' ) + ' ' + ( undefined !== this.choices[ this.props.item ] && undefined !== this.choices[ this.props.item ].name ? this.choices[ this.props.item ].name : '' ) }
					onClick={ () => {
						this.props.removeItem( this.props.item );
					} }
				>
					<Dashicon icon="no-alt"/>
				</Button>
			</div>
		);
	}
}
export default ItemComponent;
