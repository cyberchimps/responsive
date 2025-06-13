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
		if( api('responsive_cart_style') ) {
            if( api('responsive_cart_style').get() !== 'outline' && 'design' === tab ) {
				let cartBorderWidth = document.getElementById('customize-control-responsive_cart_border_width');
				if (cartBorderWidth) {
					cartBorderWidth.style.display = 'none';
				}
            }
            if( api('responsive_cart_style').get() === 'none' && 'design' === tab ) {
				let cartElementIds = [
					'customize-control-responsive_cart_border_separator',
					'customize-control-responsive_border_cart_radius',
				];
		
				cartElementIds.forEach(id => {
					let el = document.getElementById(id);
					if (el) {
						el.style.display = 'none';
					}
				});
            }
        }
		if( api('responsive_header_button_size').get() === 'custom' && 'design' === tab ) {
			document.getElementById('customize-control-responsive_header_button_padding').style.display = 'block';
			document.getElementById('customize-control-responsive_header_button_size_separator').style.display = 'block';
		} else {
			document.getElementById('customize-control-responsive_header_button_padding').style.display = 'none';
			document.getElementById('customize-control-responsive_header_button_size_separator').style.display = 'none';
		}
		if( api('responsive_header_button_style').get() === 'filled' && 'design' === tab ) {
			document.getElementById('customize-control-responsive_header_button_bg_color').style.display = 'block';
			document.getElementById('customize-control-responsive_header_button_bg_color_separator').style.display = 'block';
		} else {
			document.getElementById('customize-control-responsive_header_button_bg_color').style.display = 'none';
			document.getElementById('customize-control-responsive_header_button_bg_color_separator').style.display = 'none';
		}
		if( api('responsive_header_contact_info_icon_shape').get() === 'none' && 'general' === tab ) {
			document.getElementById('customize-control-responsive_header_contact_info_icon_style').style.display = 'none';
			document.getElementById('customize-control-responsive_header_contact_info_icon_style_separator').style.display = 'none';
		}
		if( api('responsive_header_search_style_design').get() === 'bordered' && 'design' === tab ) {
			document.getElementById('customize-control-responsive_header_search_border').style.display = 'block';
			document.getElementById('customize-control-responsive_header_search_separator6').style.display = 'block';
			document.getElementById('customize-control-responsive_border_header_search_border_radius').style.display = 'block';
			document.getElementById('customize-control-responsive_header_search_separator14').style.display = 'block';
		} else {
			document.getElementById('customize-control-responsive_header_search_border').style.display = 'none';
			document.getElementById('customize-control-responsive_header_search_separator6').style.display = 'none';
			document.getElementById('customize-control-responsive_border_header_search_border_radius').style.display = 'none';
			document.getElementById('customize-control-responsive_header_search_separator14').style.display = 'none';
		}
		// Header Search Border control toggle.
		wp.customize( 'responsive_header_search_style_design', function( setting ) {
			setting.bind( function( newval ) {
				if( 'default' === newval ) {
					document.getElementById('customize-control-responsive_header_search_border').style.display = 'none';
					document.getElementById('customize-control-responsive_header_search_separator6').style.display = 'none';
					document.getElementById('customize-control-responsive_border_header_search_border_radius').style.display = 'none';
					document.getElementById('customize-control-responsive_header_search_separator14').style.display = 'none';
				} else if( 'bordered' === newval && 'design' === tab ) {
					document.getElementById('customize-control-responsive_header_search_border').style.display = 'block';
					document.getElementById('customize-control-responsive_header_search_separator6').style.display = 'block';
					document.getElementById('customize-control-responsive_border_header_search_border_radius').style.display = 'block';
					document.getElementById('customize-control-responsive_header_search_separator14').style.display = 'block';
				}
			} );
		} );
		if( api('responsive_header_search_label').get() !== '' ) {
			if( 'design' === tab ) {
				document.getElementById('customize-control-responsive_header_search_label_typography_group').style.display = 'block';
				document.getElementById('customize-control-responsive_header_search_separator10').style.display = 'block';
			}
			if( 'general' === tab ) {
				document.getElementById('customize-control-responsive_header_search_label_visibility').style.display = 'block';
				document.getElementById('customize-control-responsive_header_search_separator3').style.display = 'block';
			}
		} else {
			document.getElementById('customize-control-responsive_header_search_label_visibility').style.display = 'none';
			document.getElementById('customize-control-responsive_header_search_separator3').style.display = 'none';
			document.getElementById('customize-control-responsive_header_search_label_typography_group').style.display = 'none';
			document.getElementById('customize-control-responsive_header_search_separator10').style.display = 'none';
		}
		if( api('search_style').get() ) {
			const search_style = api('search_style').get();
			if( search_style !== 'full-screen' ) {
				document.getElementById('customize-control-responsive_header_search_separator12').style.display = 'none';
				document.getElementById('customize-control-responsive_header_search_modal_options_separator').style.display = 'none';
				document.getElementById('customize-control-responsive_header_search_text_color').style.display = 'none';
				document.getElementById('customize-control-responsive_header_search_separator4').style.display = 'none';
				document.getElementById('customize-control-responsive_header_search_modal_background_color').style.display = 'none';

				document.getElementById('customize-control-responsive_header_search_label').style.display = 'none';
				document.getElementById('customize-control-responsive_header_search_separator2').style.display = 'none';
				document.getElementById('customize-control-responsive_header_search_label_visibility').style.display = 'none';
				document.getElementById('customize-control-responsive_header_search_separator3').style.display = 'none';
				document.getElementById('customize-control-responsive_header_search_label_typography_group').style.display = 'none';
				document.getElementById('customize-control-responsive_header_search_separator10').style.display = 'none';			
			}
			if( search_style === 'full-screen' ) {
				document.getElementById('customize-control-responsive_header_search_width').style.display = 'none';
				document.getElementById('customize-control-responsive_header_search_separator13').style.display = 'none';
			}
		}

		if( ! api('responsive_blog_post_title_toggle').get() ) {
			document.getElementById('customize-control-responsive_blog_post_title_toggle_separator').style.display = 'none';
			document.getElementById('customize-control-res_blog_post_title_text').style.display = 'none';
		} else {
			if( 'general' === tab ) {
				document.getElementById('customize-control-responsive_blog_post_title_toggle_separator').style.display = 'block';
				document.getElementById('customize-control-res_blog_post_title_text').style.display = 'block';
			}
		}

		if( 'list' === api('responsive_blog_layout').get() ) {
			document.getElementById('customize-control-responsive_blog_layout_options_separator').style.display = 'none';
			document.getElementById('customize-control-responsive_blog_entry_columns').style.display = 'none';
			document.getElementById('customize-control-responsive_blog_content_width_separator').style.display = 'none';
			document.getElementById('customize-control-responsive_blog_entry_display_masonry').style.display = 'none';
		}
		if( 'grid' === api('responsive_blog_layout').get() ) {
			document.getElementById('customize-control-responsive_blog_image_positions_layout_separator').style.display = 'none';
			document.getElementById('customize-control-responsive_blog_layout_options').style.display = 'none';
		}
		if( api('responsive_blog_entry_columns').get() <= 1 ) {
			document.getElementById('customize-control-responsive_blog_content_width_separator').style.display = 'none';
			document.getElementById('customize-control-responsive_blog_entry_display_masonry').style.display = 'none';
		}
		if( ! api('responsive_date_box_toggle').get() ) {
			document.getElementById('customize-control-responsive_date_box_toggle_separator').style.display = 'none';
			document.getElementById('customize-control-responsive_date_box_style').style.display = 'none';
		}
		if( 'excerpt' !== api('responsive_blog_entry_content_type').get() ) {
			document.getElementById('customize-control-responsive_blog_entry_content_alignment_separator').style.display = 'none';
			document.getElementById('customize-control-responsive_excerpt_length').style.display = 'none';
			document.getElementById('customize-control-responsive_excerpt_length_separator').style.display = 'none';
			document.getElementById('customize-control-responsive_blog_read_more_text').style.display = 'none';
			document.getElementById('customize-control-responsive_blog_read_more_text_separator').style.display = 'none';
			document.getElementById('customize-control-responsive_blog_entry_read_more_type').style.display = 'none';
		}
		if( 'none' === api('responsive_header_button_border_style').get() ) {
			document.getElementById('customize-control-responsive_header_button_border_width').style.display = 'none';
			document.getElementById('customize-control-responsive_header_button_border_color').style.display = 'none';
			document.getElementById('customize-control-responsive_border_header_button_radius').style.display = 'none';
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
		const controlId = `customize-control-responsive_${control}_sidebar_width`;
		const controlElement = document.getElementById(controlId);
		const isBlog = control === 'blog';
		const isVisible = value !== 'no' && tab === 'general' && (isBlog || api(`responsive_${control}_sidebar_toggle`).get());

		if (!controlElement) return;

		controlElement.style.display = 'none';

		if (isVisible) {
			controlElement.style.display = 'block';
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