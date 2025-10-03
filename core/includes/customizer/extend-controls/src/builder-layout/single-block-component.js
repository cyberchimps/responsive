import { __ } from '@wordpress/i18n';
import { Button, Dashicon } from '@wordpress/components';
import he from 'he';

const BuilderSingleBlockComponent = (props) => {

	const {
		choices
	} = props;
    return (
        <div className="responsive-hfb-builder-item" data-id={ props.item } data-section={ undefined !== choices[ props.item ] && undefined !== choices[ props.item ].section ? choices[ props.item ].section : '' } key={ props.item }>
				<span
					className="responsive-hfb-builder-item-text"
					onClick={() => {
						props.focusItem(undefined !== choices[props.item] && undefined !== choices[props.item].section ? choices[props.item].section : '');
					}}
				>
					{ ( undefined !== choices[ props.item ] && undefined !== choices[ props.item ].name ? he.decode(choices[ props.item ].name) : '' ) }
				</span>
				{props.item.includes('widget') && 'colophon-widget' !== props.item && (
					<Button
						className="rhfb-setting-icon responsive-hfb-builder-item-icon"
						aria-label={ __( 'Setting settings for', 'responsive' ) + ' ' + ( undefined !== choices[ props.item ] && undefined !== choices[ props.item ].name ? choices[ props.item ].name : '' ) }
						onClick={ () => {
							props.focusItem( undefined !== choices[ props.item ] && undefined !== choices[ props.item ].section ? choices[props.item].section : '' );
						} }
					>
						<span class="dashicon dashicons dashicons-admin-generic" data-tooltip="General"></span>
					</Button>
				)}
				{props.item.includes('widget') && 'colophon-widget' !== props.item && (
					<Button
						className="rhfb-setting-icon responsive-hfb-builder-item-icon"
						aria-label={ __( 'Setting settings for', 'responsive' ) + ' ' + ( undefined !== choices[ props.item ] && undefined !== choices[ props.item ].name ? choices[ props.item ].name : '' ) }
						onClick={ () => {
							props.focusItem( undefined !== choices[ props.item ] && undefined !== choices[ props.item ].section ? 'responsive_footer_' + choices[props.item].section : '' );
						} }
					>
						<span class="dashicon dashicons dashicons-admin-settings" data-tooltip="Design"></span>
					</Button>
				)}
				<Button
					className="responsive-hfb-builder-item-icon"
					aria-label={ __( 'Remove', 'responsive' ) + ' ' + ( undefined !== choices[ props.item ] && undefined !== choices[ props.item ].name ? choices[ props.item ].name : '' ) }
					onClick={ () => {
						props.removeItem( props.item );
					} }
				>
					<span class="dashicon dashicons dashicons-no-alt" data-tooltip="Remove"></span>
				</Button>
			</div>
    );

}
export default BuilderSingleBlockComponent;