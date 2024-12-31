import PropTypes from 'prop-types';
import {__} from '@wordpress/i18n';
import { useState, useEffect } from 'react';

const TabsComponent = props => {

	var api = wp.customize;

	const onTabClick = (value) => {
		setTab(value)
	};

	const [tab, setTab] = useState('general');

	const {
		label,
		name,
		description,
		id,
		design_id,
		general_id,
		design_tab_ids,
		general_tab_ids,
	} = props.control.params;

	const elementsToHide = {
		design: general_tab_ids,
		general: design_tab_ids,
	};

	useEffect(() => {
		const showElements = tab === 'general' ? 'design' : 'general';
		elementsToHide[showElements].forEach(elementId => {
			const element = document.getElementById(elementId);
			if (element) {
				element.style.display = 'block';
			}
		});
		elementsToHide[tab].forEach(elementId => {
			const element = document.getElementById(elementId);
			if (element) {
				element.style.display = 'none';
			}
		});
		const logoWidthElement = document.getElementById('customize-control-responsive_logo_width');
		const isCustomLogoPresent = document.getElementsByClassName('attachment-thumb').length > 0;
		if ( showElements === 'general' && logoWidthElement || !isCustomLogoPresent ) {
			logoWidthElement.style.display = 'none';
		} else if( showElements === 'design' && logoWidthElement && isCustomLogoPresent ) {
			logoWidthElement.style.display = 'block';
		}
		toggleSidebarPositionWidthControls( api('responsive_page_sidebar_toggle').get(), 'page' );
		toggleSidebarPositionWidthControls( api('responsive_blog_sidebar_toggle').get(), 'blog' );
		toggleSidebarPositionWidthControls( api('responsive_single_blog_sidebar_toggle').get(), 'single_blog' );

		hideSidebarWidthControl( api('responsive_page_sidebar_position').get(), 'page' );
		hideSidebarWidthControl( api('responsive_blog_sidebar_position').get(), 'blog' );
		hideSidebarWidthControl( api('responsive_single_blog_sidebar_position').get(), 'single_blog' );
		
		api('responsive_page_sidebar_toggle', function( value ) {
			value.bind( function( newval ) {
				if( newval == 0){
					api('responsive_page_sidebar_position', function(value) {
						value.set('no');
					});
				} else {
					document.getElementById('responsive_page_sidebar_position-imageradiobtn-right').click();
				}
				hideSidebarWidthControl( api('responsive_page_sidebar_position').get(), 'page');
			});
		});
		api('responsive_blog_sidebar_toggle', function( value ) {
			value.bind( function( newval ) {
				if( newval == 0 ){
					api('responsive_blog_sidebar_position', function(value) {
						value.set('no');
					});
				} else {
					document.getElementById('responsive_blog_sidebar_position-imageradiobtn-right').click();
				}
				hideSidebarWidthControl( api('responsive_blog_sidebar_position').get(), 'blog');
			});
		});
		api('responsive_single_blog_sidebar_toggle', function( value ) {
			value.bind( function( newval ) {
				if( newval == 0 ){
					api('responsive_single_blog_sidebar_position', function(value) {
						value.set('no');
					});
				} else {
					document.getElementById('responsive_single_blog_sidebar_position-imageradiobtn-right').click();
				}
				hideSidebarWidthControl( api('responsive_single_blog_sidebar_position').get(), 'single_blog');
			});
		});

		api('responsive_page_sidebar_position', function( value ) {
			value.bind( function( newval ) {
				if ( newval ) {
					hideSidebarWidthControl(newval, 'page');
				}
			});
		});
		api('responsive_blog_sidebar_position', function( value ) {
			value.bind( function( newval ) {
				if ( newval ) {
					hideSidebarWidthControl(newval, 'blog');
				}
			});
		});
		api('responsive_single_blog_sidebar_position', function( value ) {
			value.bind( function( newval ) {
				if ( newval ) {
					hideSidebarWidthControl(newval, 'single_blog');
				}
			});
		});
		if( api('responsive_footer_primary_row_top_border_size').get() > 0 && 'design' === tab ) {
			document.getElementById('customize-control-responsive_footer_primary_row_border_color').style.display = 'block';
		} else {
			document.getElementById('customize-control-responsive_footer_primary_row_border_color').style.display = 'none';
		}
		if( api('responsive_footer_above_row_top_border_size').get() > 0 && 'design' === tab ) {
			document.getElementById('customize-control-responsive_footer_above_row_border_color').style.display = 'block';
		} else {
			document.getElementById('customize-control-responsive_footer_above_row_border_color').style.display = 'none';
		}
		if( api('responsive_footer_below_row_top_border_size').get() > 0 && 'design' === tab ) {
			document.getElementById('customize-control-responsive_footer_below_row_border_color').style.display = 'block';
		} else {
			document.getElementById('customize-control-responsive_footer_below_row_border_color').style.display = 'none';
		}
		if( api('responsive_footer_primary_columns').get() > 1 && 'general' === tab ) {
			document.getElementById('customize-control-responsive_footer_primary_inner_column_spacing').style.display = 'block';
		} else {
			document.getElementById('customize-control-responsive_footer_primary_inner_column_spacing').style.display = 'none';
		}
		if( api('responsive_footer_above_columns').get() > 1 && 'general' === tab ) {
			document.getElementById('customize-control-responsive_footer_above_inner_column_spacing').style.display = 'block';
		} else {
			document.getElementById('customize-control-responsive_footer_above_inner_column_spacing').style.display = 'none';
		}
		if( api('responsive_footer_below_columns').get() > 1 && 'general' === tab ) {
			document.getElementById('customize-control-responsive_footer_below_inner_column_spacing').style.display = 'block';
		} else {
			document.getElementById('customize-control-responsive_footer_below_inner_column_spacing').style.display = 'none';
		}
	}, [tab]);

	const toggleSidebarPositionWidthControls = (value, control) => {
		if( value && tab === 'general' ) {
			document.getElementById(`customize-control-responsive_${control}_sidebar_position`).style.display = 'block';
			if( api(`responsive_${control}_sidebar_position`).get() !== 'no' ) {
				document.getElementById(`customize-control-responsive_${control}_sidebar_width`).style.display = 'block';
			}
		} else {
			document.getElementById(`customize-control-responsive_${control}_sidebar_position`).style.display = 'none';
			document.getElementById(`customize-control-responsive_${control}_sidebar_width`).style.display = 'none';
		}
	};

	const hideSidebarWidthControl = (value, control) => {
		if( value == 'no' || ! api(`responsive_${control}_sidebar_toggle`).get() ) {
			document.getElementById(`customize-control-responsive_${control}_sidebar_width`).style.display = 'none';
		} else if( 'no' != value && tab === 'general' && api(`responsive_${control}_sidebar_toggle`).get() ) {
			setTimeout(() => {
				document.getElementById(`customize-control-responsive_${control}_sidebar_width`).style.display = 'block';
			}, 1000);
		}
	};

	return <>
		<div className='responsive-component-tabs nav-tab-wrapper wp-clearfix' data-name={name}>
			<a
				href="#"
				className={`nav-tab responsive-component-tabs-button ${tab === 'general' ? 'nav-tab-active' : ''}`}
				id={general_id}
				onClick={() => onTabClick('general')}
				>
					<span>{__( 'General', 'responsive' )}</span>
			</a>
			<a
				type="#"
				className={`nav-tab responsive-component-tabs-button ${tab === 'design' ? 'nav-tab-active' : ''}`}
				id={design_id}
				onClick={() => onTabClick('design')}
				>
					<span>{ __('Design', 'responsive' )}</span>
			</a>
		</div>
	</>;

};

TabsComponent.propTypes = {
	control: PropTypes.object.isRequired
};

export default React.memo(TabsComponent);