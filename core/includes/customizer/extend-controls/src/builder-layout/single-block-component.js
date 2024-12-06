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
				<Button
					className="responsive-hfb-builder-item-icon"
					aria-label={ __( 'Remove', 'responsive' ) + ' ' + ( undefined !== choices[ props.item ] && undefined !== choices[ props.item ].name ? choices[ props.item ].name : '' ) }
					onClick={ () => {
						props.removeItem( props.item );
					} }
				>
					<Dashicon icon="no-alt"/>
				</Button>
			</div>
    );

}
export default BuilderSingleBlockComponent;