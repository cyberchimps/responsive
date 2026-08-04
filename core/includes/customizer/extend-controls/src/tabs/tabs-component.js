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

	const isSidebarControlInactive = (elementId) => {
		let posControlKey = null;
		if (elementId.indexOf('responsive_page_sidebar') !== -1) {
			posControlKey = 'responsive_page_sidebar_position';
		} else if (elementId.indexOf('responsive_blog_sidebar') !== -1) {
			posControlKey = 'responsive_blog_sidebar_position';
		} else if (elementId.indexOf('responsive_shop_sidebar') !== -1) {
			posControlKey = 'responsive_shop_sidebar_position';
		} else if (elementId.indexOf('responsive_single_product_sidebar') !== -1) {
			posControlKey = 'responsive_single_product_sidebar_position';
		}
		if (posControlKey) {
			const posCtrl = api.control(posControlKey);
			if (posCtrl && posCtrl.active && !posCtrl.active.get()) {
				return true;
			}
		}
		return false;
	};

	useEffect(() => {
		const showElements = tab === 'general' ? 'design' : 'general';
		elementsToHide[showElements].forEach(elementId => {
			const element = document.getElementById(elementId);
			if (element) {
				if (isSidebarControlInactive(elementId)) {
					element.style.display = 'none';
				} else {
					element.style.display = 'block';
				}
			}
		});
		elementsToHide[tab].forEach(elementId => {
			const element = document.getElementById(elementId);
			if (element) {
				element.style.display = 'none';
			}
		});
		const isCustomLogoPresent = document.querySelector('#customize-control-custom_logo img.attachment-thumb') !== null;
		toggleLogoControl('customize-control-responsive_logo_width', isCustomLogoPresent);
		toggleLogoControl('customize-control-responsive_retina_logo', isCustomLogoPresent);
		toggleLogoControl('customize-control-responsive_mobile_logo_option', isCustomLogoPresent);


		hideSidebarWidthControl( api('responsive_page_sidebar_position').get(), 'page' );
		hideSidebarStyleControl( api('responsive_page_sidebar_position').get(), 'page' );
		hideSidebarWidthControl( api('responsive_blog_sidebar_position').get(), 'blog' );
		hideSidebarStyleControl( api('responsive_blog_sidebar_position').get(), 'blog' );
		hideSidebarWidthControl( api('responsive_default_sidebar_position').get(), 'default' );
		hideSidebarStyleControl( api('responsive_default_sidebar_position').get(), 'default' );
		hideSidebarSpacingControls( api('responsive_default_sidebar_position').get() );
		if(api('responsive_shop_sidebar_position')){
			hideWoocommerceSidebarWidthControl( api('responsive_shop_sidebar_position').get(), 'shop');
			hideWoocommerceSidebarStyleControl( api('responsive_shop_sidebar_position').get(), 'shop');
		}
		if(api('responsive_single_product_sidebar_position'))
		{
			hideWoocommerceSidebarWidthControl( api('responsive_single_product_sidebar_position').get(), 'single_product');
			hideWoocommerceSidebarStyleControl( api('responsive_single_product_sidebar_position').get(), 'single_product');
		}
		if(api('responsive_shop_sidebar_position')){
			hideWoocommerceMainContentWidthControl( api('responsive_shop_sidebar_position').get(), 'shop');
		}
		if(api('responsive_single_product_sidebar_position'))
		{
			hideWoocommerceMainContentWidthControl( api('responsive_single_product_sidebar_position').get(), 'single_product');
		}
		hideRetinaLogoUploadControl( api( 'responsive_retina_logo').get());
		hideMobileLogoUploadControl( api( 'responsive_mobile_logo_option').get());

		api('responsive_page_sidebar_position', function( value ) {
			value.bind( function( newval ) {
				if ( newval ) {
					hideSidebarWidthControl(newval, 'page');
					hideSidebarStyleControl(newval, 'page');
				}
			});
		});
		api('responsive_blog_sidebar_position', function( value ) {
			value.bind( function( newval ) {
				if ( newval ) {
					hideSidebarWidthControl(newval, 'blog');
					hideSidebarStyleControl(newval, 'blog');
				}
			});
		});
		api('responsive_default_sidebar_position', function( value ){
			value.bind( function( newval ) {
				if( newval ) {
					hideSidebarWidthControl(newval, 'global');
					hideSidebarStyleControl(newval, 'default');
					hideSidebarSpacingControls(newval);
					hideSidebarWidthControl(api('responsive_page_sidebar_position').get(), 'page');
					hideSidebarStyleControl(api('responsive_page_sidebar_position').get(), 'page');
					hideSidebarWidthControl(api('responsive_blog_sidebar_position').get(), 'blog');
					hideSidebarStyleControl(api('responsive_blog_sidebar_position').get(), 'blog');
					if(api('responsive_shop_sidebar_position')){
						hideWoocommerceSidebarWidthControl(api('responsive_shop_sidebar_position').get(), 'shop');
						hideWoocommerceSidebarStyleControl(api('responsive_shop_sidebar_position').get(), 'shop');
						hideWoocommerceMainContentWidthControl(api('responsive_shop_sidebar_position').get(), 'shop');
					}
					if(api('responsive_single_product_sidebar_position')){
						hideWoocommerceSidebarWidthControl(api('responsive_single_product_sidebar_position').get(), 'single_product');
						hideWoocommerceSidebarStyleControl(api('responsive_single_product_sidebar_position').get(), 'single_product');
						hideWoocommerceMainContentWidthControl(api('responsive_single_product_sidebar_position').get(), 'single_product');
					}
				}
			})
		});
		api('responsive_shop_sidebar_position', function( value ){
			value.bind( function( newval ) {
				if( newval ) {
					hideWoocommerceSidebarWidthControl(newval, 'shop');
					hideWoocommerceSidebarStyleControl(newval, 'shop');
					hideWoocommerceMainContentWidthControl(newval, 'shop');
				}
			})
		});
		api('responsive_single_product_sidebar_position', function( value ){
			value.bind( function( newval ) {
				if( newval ) {
					hideWoocommerceSidebarWidthControl(newval, 'single_product');
					hideWoocommerceSidebarStyleControl(newval, 'single_product');
					hideWoocommerceMainContentWidthControl(newval, 'single_product');
				}
			})
		});

		api('custom_logo', function(value) {
		value.bind(function(newval) {
			const hasLogo = !!newval; // WP gives attachment ID or false
			toggleLogoControl('customize-control-responsive_logo_width', hasLogo);
			toggleLogoControl('customize-control-responsive_retina_logo', hasLogo);
			toggleLogoControl('customize-control-responsive_mobile_logo_option', hasLogo);
			const mobileLogoEnabled = api('responsive_mobile_logo_option').get();
			const retinaLogoEnabled = api('responsive_retina_logo').get();
			hideMobileLogoUploadControl(hasLogo & mobileLogoEnabled);
			hideRetinaLogoUploadControl(hasLogo & retinaLogoEnabled);
		});
	});

		api('responsive_retina_logo', function( value ) {
			value.bind( function( newval ) {
				hideRetinaLogoUploadControl(newval);
			})
		});

		api('responsive_mobile_logo_option', function( value ) {
			value.bind( function( newval ) {
				hideMobileLogoUploadControl(newval);
			})
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

		if( api('responsive_mobile_header_button_size').get() === 'custom' && 'design' === tab ) {
			document.getElementById('customize-control-responsive_mobile_header_button_padding').style.display = 'block';
			document.getElementById('customize-control-responsive_mobile_header_button_size_separator').style.display = 'block';
		} else {
			document.getElementById('customize-control-responsive_mobile_header_button_padding').style.display = 'none';
			document.getElementById('customize-control-responsive_mobile_header_button_size_separator').style.display = 'none';
		}

		if( api('responsive_header_button_style').get() === 'filled' && 'design' === tab ) {
			document.getElementById('customize-control-responsive_header_button_bg_color').style.display = 'block';
			document.getElementById('customize-control-responsive_header_button_bg_color_separator').style.display = 'block';
		} else {
			document.getElementById('customize-control-responsive_header_button_bg_color').style.display = 'none';
			document.getElementById('customize-control-responsive_header_button_bg_color_separator').style.display = 'none';
		}

		if( api( 'responsive_mobile_header_button_style' ).get() === 'filled' && 'design' === tab ) {
			document.getElementById('customize-control-responsive_mobile_header_button_bg_color').style.display = 'block';
			document.getElementById('customize-control-responsive_mobile_header_button_bg_color_separator').style.display = 'block';
		} else {
			document.getElementById('customize-control-responsive_mobile_header_button_bg_color').style.display = 'none';
			document.getElementById('customize-control-responsive_mobile_header_button_bg_color_separator').style.display = 'none';
		}

		// Toggle Button Style - Hide controls based on style
		if( api('responsive_mobile_menu_toggle_style') ) {
			const allToggleButtonElementIds = [
				'customize-control-responsive_mobile_menu_toggle_border_color',
				'customize-control-responsive_header_menu_toggle_background_color',
				'customize-control-responsive_header_toggle_button_background_color_separator',
				'customize-control-responsive_header_toggle_button_border_radius_padding',
				'customize-control-responsive_mobile_menu_toggle_border_width_border'
			];
			const backgroundColorElementIds = [
				'customize-control-responsive_header_menu_toggle_background_color',
				'customize-control-responsive_header_toggle_button_background_color_separator'
			];
			const minimalStyleElementIds = [
				'customize-control-responsive_mobile_menu_toggle_border_color',
				'customize-control-responsive_header_menu_toggle_background_color',
				'customize-control-responsive_header_toggle_button_background_color_separator',
				'customize-control-responsive_header_toggle_button_border_radius_padding',
				'customize-control-responsive_mobile_menu_toggle_border_width_border'
			];

			if( 'general' === tab ) {
				// Always hide on general tab
				allToggleButtonElementIds.forEach(id => {
					let el = document.getElementById(id);
					if (el) {
						el.style.display = 'none';
					}
				});
			} else if( 'design' === tab ) {
				const currentStyle = api('responsive_mobile_menu_toggle_style').get();
				
				if( 'minimal' === currentStyle ) {
					// Hide all controls for minimal style
					minimalStyleElementIds.forEach(id => {
						let el = document.getElementById(id);
						if (el) {
							el.style.display = 'none';
						}
					});
					const toggleBorderWidthEl = document.getElementById('customize-control-responsive_mobile_menu_toggle_border_width_border');
							if (toggleBorderWidthEl) {
								toggleBorderWidthEl.style.display = 'none';
							}
				} else if( 'outline' === currentStyle ) {
					// Hide background color for outline style, show others
					backgroundColorElementIds.forEach(id => {
						let el = document.getElementById(id);
						if (el) {
							el.style.display = 'none';
						}
					});
					// Show border color and border radius
					const borderColorEl = document.getElementById('customize-control-responsive_mobile_menu_toggle_border_color');
					if (borderColorEl) {
						borderColorEl.style.display = 'block';
					}
					const borderRadiusEl = document.getElementById('customize-control-responsive_header_toggle_button_border_radius_padding');
					if (borderRadiusEl) {
						borderRadiusEl.style.display = 'block';
					}
				} else {
					// Hide border color for fill style, show others
					const borderColorEl = document.getElementById('customize-control-responsive_mobile_menu_toggle_border_color');
					if (borderColorEl) {
						borderColorEl.style.display = 'none';
					}
					// Show background color, background separator, and border radius
					const backgroundColorEl = document.getElementById('customize-control-responsive_header_menu_toggle_background_color');
					if (backgroundColorEl) {
						backgroundColorEl.style.display = 'block';
					}
					const backgroundSeparatorEl = document.getElementById('customize-control-responsive_header_toggle_button_background_color_separator');
					if (backgroundSeparatorEl) {
						backgroundSeparatorEl.style.display = 'block';
					}
					const borderRadiusEl = document.getElementById('customize-control-responsive_header_toggle_button_border_radius_padding');
					if (borderRadiusEl) {
						borderRadiusEl.style.display = 'block';
					}
					const toggleBorderWidthEl = document.getElementById('customize-control-responsive_mobile_menu_toggle_border_width_border');
							if (toggleBorderWidthEl) {
								toggleBorderWidthEl.style.display = 'none';
							}

				}
			}
		}

		// Listen for changes to responsive_mobile_menu_toggle_style
		if( api('responsive_mobile_menu_toggle_style') ) {
			api('responsive_mobile_menu_toggle_style', function( value ) {
				value.bind( function( newval ) {
					const allToggleButtonElementIds = [
						'customize-control-responsive_mobile_menu_toggle_border_color',
						'customize-control-responsive_header_menu_toggle_background_color',
						'customize-control-responsive_header_toggle_button_background_color_separator',
						'customize-control-responsive_header_toggle_button_border_radius_padding',
						'customize-control-responsive_mobile_menu_toggle_border_width_border'	
					];
					const backgroundColorElementIds = [
						'customize-control-responsive_header_menu_toggle_background_color',
						'customize-control-responsive_header_toggle_button_background_color_separator'
					];
					const minimalStyleElementIds = [
						'customize-control-responsive_mobile_menu_toggle_border_color',
						'customize-control-responsive_header_menu_toggle_background_color',
						'customize-control-responsive_header_toggle_button_background_color_separator',
						'customize-control-responsive_header_toggle_button_border_radius_padding',
						'customize-control-responsive_mobile_menu_toggle_border_width_border'
					];
			
					if( 'general' === tab ) {
						// Always hide on general tab
						allToggleButtonElementIds.forEach(id => {
							let el = document.getElementById(id);
							if (el) {
								el.style.display = 'none';
							}
						});
					} else if( 'design' === tab ) {
						if( 'minimal' === newval ) {
							// Hide all controls for minimal style
							minimalStyleElementIds.forEach(id => {
								let el = document.getElementById(id);
								if (el) {
									el.style.display = 'none';
								}
							});
							const toggleBorderWidthEl = document.getElementById('customize-control-responsive_mobile_menu_toggle_border_width_border');
							if (toggleBorderWidthEl) {
								toggleBorderWidthEl.style.display = 'none';
							}
						} else if( 'outline' === newval ) {
							// Hide background color for outline style, show others
							backgroundColorElementIds.forEach(id => {
								let el = document.getElementById(id);
								if (el) {
									el.style.display = 'none';
								}
							});
							// Show border color and border radius
							const borderColorEl = document.getElementById('customize-control-responsive_mobile_menu_toggle_border_color');
							if (borderColorEl) {
								borderColorEl.style.display = 'block';
							}
							const borderRadiusEl = document.getElementById('customize-control-responsive_header_toggle_button_border_radius_padding');
							if (borderRadiusEl) {
								borderRadiusEl.style.display = 'block';
							}
							const toggleBorderWidthEl = document.getElementById('customize-control-responsive_mobile_menu_toggle_border_width_border');
							if (toggleBorderWidthEl) {
								toggleBorderWidthEl.style.display = 'block';
							}
							
						} else {
							// Hide border color for fill style, show others
							const borderColorEl = document.getElementById('customize-control-responsive_mobile_menu_toggle_border_color');
							if (borderColorEl) {
								borderColorEl.style.display = 'none';
							}
							const toggleBorderWidthEl = document.getElementById('customize-control-responsive_mobile_menu_toggle_border_width_border');
							if (toggleBorderWidthEl) {
								toggleBorderWidthEl.style.display = 'none';
							}
							// Show background color, background separator, and border radius
							const backgroundColorEl = document.getElementById('customize-control-responsive_header_menu_toggle_background_color');
							if (backgroundColorEl) {
								backgroundColorEl.style.display = 'block';
							}
							const backgroundSeparatorEl = document.getElementById('customize-control-responsive_header_toggle_button_background_color_separator');
							if (backgroundSeparatorEl) {
								backgroundSeparatorEl.style.display = 'block';
							}
							const borderRadiusEl = document.getElementById('customize-control-responsive_header_toggle_button_border_radius_padding');
							if (borderRadiusEl) {
								borderRadiusEl.style.display = 'block';
							}
							
						}
					}
				} );
			} );
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
		}
		if( 'none' === api('responsive_mobile_header_button_border_style').get() ) {
			document.getElementById('customize-control-responsive_mobile_header_button_border_width').style.display = 'none';
			document.getElementById('customize-control-responsive_mobile_header_button_border_color').style.display = 'none';
		}

		// Footer Social Border Controls
		if( api('responsive_footer_social_item_border_style') ) {
			toggleFooterSocialBorderControls( api('responsive_footer_social_item_border_style').get() );
		}

		// Listen for changes to responsive_footer_social_item_border_style
		if( api('responsive_footer_social_item_border_style') ) {
			api('responsive_footer_social_item_border_style', function( value ) {
				value.bind( function( newval ) {
					toggleFooterSocialBorderControls( newval );
				} );
			} );
		}

		// Header Social Border Controls
		if( api('responsive_header_social_item_border_style') ) {
			toggleHeaderSocialBorderControls( api('responsive_header_social_item_border_style').get() );
		}

		// Listen for changes to responsive_header_social_item_border_style
		if( api('responsive_header_social_item_border_style') ) {
			api('responsive_header_social_item_border_style', function( value ) {
				value.bind( function( newval ) {
					toggleHeaderSocialBorderControls( newval );
				} );
			} );
		}

		// Mobile Header Social Border Controls
		if( api('responsive_mobile_header_social_item_border_style') ) {
			toggleMobileHeaderSocialBorderControls( api('responsive_mobile_header_social_item_border_style').get() );
		}

		// Listen for changes to responsive_mobile_header_social_item_border_style
		if( api('responsive_mobile_header_social_item_border_style') ) {
			api('responsive_mobile_header_social_item_border_style', function( value ) {
				value.bind( function( newval ) {
					toggleMobileHeaderSocialBorderControls( newval );
				} );
			} );
		}

		// Header Social Color Controls
		if( api('responsive_header_social_item_style') ) {
			toggleHeaderSocialColorControls();
			api('responsive_header_social_item_style', function( value ) {
				value.bind( function( newval ) {
					toggleHeaderSocialColorControls();
				} );
			} );
		}
		if( api('responsive_header_social_item_use_brand_colors') ) {
			api('responsive_header_social_item_use_brand_colors', function( value ) {
				value.bind( function( newval ) {
					toggleHeaderSocialColorControls();
				} );
			} );
		}

		// Mobile Header Social Color Controls
		if( api('responsive_mobile_header_social_item_style') ) {
			toggleMobileHeaderSocialColorControls();
			api('responsive_mobile_header_social_item_style', function( value ) {
				value.bind( function( newval ) {
					toggleMobileHeaderSocialColorControls();
				} );
			} );
		}
		if( api('responsive_mobile_header_social_item_use_brand_colors') ) {
			api('responsive_mobile_header_social_item_use_brand_colors', function( value ) {
				value.bind( function( newval ) {
					toggleMobileHeaderSocialColorControls();
				} );
			} );
		}

		// Footer Social Color Controls
		if( api('responsive_footer_social_item_style') ) {
			toggleFooterSocialColorControls();
			api('responsive_footer_social_item_style', function( value ) {
				value.bind( function( newval ) {
					toggleFooterSocialColorControls();
				} );
			} );
		}
		if( api('responsive_footer_social_item_use_brand_colors') ) {
			api('responsive_footer_social_item_use_brand_colors', function( value ) {
				value.bind( function( newval ) {
					toggleFooterSocialColorControls();
				} );
			} );
		}

		// Transparent Header Settings
		if( ! api( 'responsive_transparent_header' ).get() ) {
			document.getElementById('customize-control-responsive_transparent_header_widget_color_separator').style.display = 'none';
			document.getElementById('customize-control-responsive_transparent_header_widget_text_color').style.display = 'none';
			document.getElementById('customize-control-responsive_transparent_header_widget_background_color').style.display = 'none';
			document.getElementById('customize-control-responsive_transparent_header_widget_background_image').style.display = 'none';
			document.getElementById('customize-control-responsive_transparent_header_widget_border_color').style.display = 'none';
			document.getElementById('customize-control-responsive_transparent_header_widget_link_color').style.display = 'none';
			document.getElementById('customize-control-responsive_transparent_header_widget_link_hover_color').style.display = 'none';
		} else if ( api( 'responsive_transparent_header' ).get() && 'design' === tab ) {
			document.getElementById('customize-control-responsive_transparent_header_widget_color_separator').style.display = 'block';
			document.getElementById('customize-control-responsive_transparent_header_widget_text_color').style.display = 'block';
			document.getElementById('customize-control-responsive_transparent_header_widget_background_color').style.display = 'block';
			document.getElementById('customize-control-responsive_transparent_header_widget_background_image').style.display = 'block';
			document.getElementById('customize-control-responsive_transparent_header_widget_border_color').style.display = 'block';
			document.getElementById('customize-control-responsive_transparent_header_widget_link_color').style.display = 'block';
			document.getElementById('customize-control-responsive_transparent_header_widget_link_hover_color').style.display = 'block';
		}
		if( ! api('responsive_transparent_header_logo_option').get() ) {
			document.getElementById('customize-control-responsive_transparent_header_logo').style.display = 'none';
		}
		if( ! api('responsive_enable_transparent_header_bottom_border').get() ) {
			document.getElementById('customize-control-responsive_transparent_bottom_border').style.display = 'none';
		}
		if( ! api('responsive_sticky_header_logo_option').get() ) {
			document.getElementById('customize-control-responsive_sticky_header_logo').style.display = 'none';
		}
		if( ! api('responsive_rp_enable_excerpt').get() ) {
			document.getElementById('customize-control-responsive_rp_excerpt_length').style.display = 'none';
			document.getElementById('customize-control-responsive_rp_read_more').style.display = 'none';
		}
		if( ! api('responsive_transparent_header').get() ) {
			document.getElementById('customize-control-responsive_transparent_header_logo_option').style.display = 'none';
			document.getElementById('customize-control-responsive_enable_transparent_header_bottom_border').style.display = 'none';
			document.getElementById('customize-control-responsive_disable_archive_transparent_header').style.display = 'none';
			document.getElementById('customize-control-responsive_disable_blog_page_transparent_header').style.display = 'none';
			document.getElementById('customize-control-responsive_disable_homepage_transparent_header').style.display = 'none';
			document.getElementById('customize-control-responsive_disable_pages_transparent_header').style.display = 'none';
			document.getElementById('customize-control-responsive_disable_posts_transparent_header').style.display = 'none';
			document.getElementById('customize-control-responsive_disable_woo_products_transparent_header').style.display = 'none';
			document.getElementById('customize-control-responsive_transparent_bottom_border').style.display = 'none';
			document.getElementById('customize-control-responsive_transparent_header_logo').style.display = 'none';
		}

		// Show/hide Move Body control based on mobile menu style (only show when dropdown is selected)
		if( api('responsive_mobile_menu_style') ) {
			const mobileMenuStyle = api('responsive_mobile_menu_style').get();
			const moveBodyControl = document.getElementById('customize-control-responsive_header_mobile_off_canvas_move_body');
			const moveBodySeparator = document.getElementById('customize-control-responsive_header_mobile_off_canvas_move_body_horizontal_separator');
			
			if( moveBodyControl ) {
				if( mobileMenuStyle === 'dropdown' && 'general' === tab ) {
					moveBodyControl.style.display = 'block';
					if( moveBodySeparator ) {
						moveBodySeparator.style.display = 'block';
					}
				} else {
					moveBodyControl.style.display = 'none';
					if( moveBodySeparator ) {
						moveBodySeparator.style.display = 'none';
					}
				}
			}
		}

		// Listen for changes to responsive_mobile_menu_style
		api('responsive_mobile_menu_style', function( value ) {
			value.bind( function( newval ) {
				const moveBodyControl = document.getElementById('customize-control-responsive_header_mobile_off_canvas_move_body');
				const moveBodySeparator = document.getElementById('customize-control-responsive_header_mobile_off_canvas_move_body_horizontal_separator');
				
				if( moveBodyControl ) {
					if( newval === 'dropdown' && 'general' === tab ) {
						moveBodyControl.style.display = 'block';
						if( moveBodySeparator ) {
							moveBodySeparator.style.display = 'block';
						}
					} else {
						moveBodyControl.style.display = 'none';
						if( moveBodySeparator ) {
							moveBodySeparator.style.display = 'none';
						}
					}
				}
			});
		});

		toggleBannerLayoutControls();
		if (api('responsive_single_blog_post_title_layout')) {
			api('responsive_single_blog_post_title_layout', function(value) {
				value.bind(function() {
					toggleBannerLayoutControls();
				});
			});
		}
		if (api('responsive_single_blog_banner_container_width')) {
			api('responsive_single_blog_banner_container_width', function(value) {
				value.bind(function() {
					toggleBannerLayoutControls();
				});
			});
		}

		toggleBlogTitleLayoutControls();
		if (api('responsive_blog_title_layout')) {
			api('responsive_blog_title_layout', function(value) {
				value.bind(function() {
					toggleBlogTitleLayoutControls();
				});
			});
		}
		if (api('responsive_blog_banner_container_width')) {
			api('responsive_blog_banner_container_width', function(value) {
				value.bind(function() {
					toggleBlogTitleLayoutControls();
				});
			});
		}
		if (api('responsive_blog_post_title_toggle')) {
			api('responsive_blog_post_title_toggle', function(value) {
				value.bind(function() {
					toggleBlogTitleLayoutControls();
				});
			});
		}

	}, [tab]);

	const hideSidebarWidthControl = (value, control) => {
    const controlId = `customize-control-responsive_${control}_sidebar_width`;
    const controlElement = document.getElementById(controlId);

    if (!controlElement) return;

    controlElement.style.display = 'none';

    let isVisible = false;
    if (control === 'global') {
        // For global sidebar: only hide when 'no'
        isVisible = value !== 'no' && tab === 'general';
    } else {
        // For page/blog: hide when 'no' or resolve 'global'
        if (value === 'global') {
            const globalValue = api('responsive_default_sidebar_position') ? api('responsive_default_sidebar_position').get() : 'no';
            isVisible = globalValue !== 'no' && tab === 'general';
        } else {
            isVisible = value !== 'no' && tab === 'general';
        }
    }

    if (isVisible && !isSidebarControlInactive(controlId)) {
        controlElement.style.display = 'block';
    }
};

	const hideSidebarStyleControl = (value, control) => {
		const controlId = (control === 'global' || control === 'default')
			? 'customize-control-responsive_sidebar_style'
			: `customize-control-responsive_${control}_sidebar_style`;
		const controlElement = document.getElementById(controlId);

		if (!controlElement) return;

		controlElement.style.display = 'none';

		let isVisible = false;
		if (control === 'global' || control === 'default') {
			// For global sidebar: only hide when 'no'
			isVisible = value !== 'no' && tab === 'general';
		} else {
			// For page/blog: hide when 'no' or resolve 'global'
			if (value === 'global') {
				const globalValue = api('responsive_default_sidebar_position') ? api('responsive_default_sidebar_position').get() : 'no';
				isVisible = globalValue !== 'no' && tab === 'general';
			} else {
				isVisible = value !== 'no' && tab === 'general';
			}
		}

		if (isVisible && !isSidebarControlInactive(controlId)) {
			controlElement.style.display = 'block';
		}
	};

	const hideSidebarSpacingControls = (value) => {
		const spacingControls = [
			'customize-control-responsive_sidebar_spacing',
			'customize-control-responsive_sidebar_outside_container_padding',
			'customize-control-responsive_sidebar_inside_container_padding'
		];

		spacingControls.forEach(controlId => {
			const element = document.getElementById(controlId);
			if (!element) return;

			element.style.display = 'none';

			// Show only if default sidebar position is not 'no' AND active tab is 'design'
			const isVisible = value !== 'no' && tab === 'design';
			if (isVisible) {
				element.style.display = 'block';
			}
		});
	};

	const hideWoocommerceSidebarWidthControl = (value,control) => {
		const controlId = `customize-control-responsive_${control}_sidebar_width`;
		const controlElement = document.getElementById(controlId);
		if (!controlElement) return;
		controlElement.style.display = 'none';

		let isVisible = false;
		if (value === 'global') {
			const globalValue = api('responsive_default_sidebar_position') ? api('responsive_default_sidebar_position').get() : 'no';
			isVisible = globalValue !== 'no' && tab === 'general';
		} else {
			isVisible = value !== 'no' && tab === 'general';
		}

		if (isVisible && !isSidebarControlInactive(controlId)) {
			controlElement.style.display = 'block';
		}
	};

	const hideWoocommerceSidebarStyleControl = (value,control) => {
		const controlId = `customize-control-responsive_${control}_sidebar_style`;
		const controlElement = document.getElementById(controlId);
		if (!controlElement) return;
		controlElement.style.display = 'none';

		let isVisible = false;
		if (value === 'global') {
			const globalValue = api('responsive_default_sidebar_position') ? api('responsive_default_sidebar_position').get() : 'no';
			isVisible = globalValue !== 'no' && tab === 'general';
		} else {
			isVisible = value !== 'no' && tab === 'general';
		}

		if (isVisible && !isSidebarControlInactive(controlId)) {
			controlElement.style.display = 'block';
		}
	};

	const hideWoocommerceMainContentWidthControl = (value, control) => {
		const controlId = `customize-control-responsive_${control}_content_width`;
		const controlElement = document.getElementById(controlId);
		const separatorId = `customize-control-responsive_${control}_layout_elements_separator`;
		const separatorElement = document.getElementById(separatorId);
		if (!controlElement) return;

		let resolvedValue = value;
		if (value === 'global' || value === 'default') {
			resolvedValue = api('responsive_default_sidebar_position') ? api('responsive_default_sidebar_position').get() : 'no';
		}

		// For shop/single product sidebar: hide when 'left' or 'right'
		let isVisible = resolvedValue === 'no' && tab === 'general';

		if (isVisible) {
			controlElement.style.display = 'block';
			if (separatorElement) {
				separatorElement.style.display = 'block';
			}
		} else {
			controlElement.style.display = 'none';
			if (separatorElement) {
				separatorElement.style.display = 'none';
			}
		}
	}

	const hideRetinaLogoUploadControl = (value) => {
		const controlId = `customize-control-responsive_retina_logo_image`;
		const isCustomLogoPresent = document.querySelector('#customize-control-custom_logo img.attachment-thumb') !== null;
		
		const controlElement = document.getElementById(controlId); 
		if(!controlElement) return; 

		// Hide by default
		controlElement.style.display = 'none'; 

		// Show only if toggle is enabled AND we're on the general tab
		let isVisible = value !== 0 && isCustomLogoPresent && value !== false && tab === 'general';

		if(isVisible) {
			controlElement.style.display = 'block';
		}
	};

	const hideMobileLogoUploadControl = (value) => {
		const controlId = `customize-control-responsive_mobile_logo`;
		const isCustomLogoPresent = document.querySelector('#customize-control-custom_logo img.attachment-thumb') !== null;
		const controlElement = document.getElementById(controlId); 
		if(!controlElement) return; 

		// Hide by default
		controlElement.style.display = 'none'; 

		// Show only if toggle is enabled AND we're on the general tab
		let isVisible = value !== 0 && isCustomLogoPresent && value !== false && tab === 'general';

		if(isVisible) {
			controlElement.style.display = 'block';
		}
	}

	const toggleLogoControl = (controlId, isCustomLogoPresent) => {
		const controlElement = document.getElementById(controlId);
		if (!controlElement) return;

		// Hide by default
		controlElement.style.display = 'none';

		// Show only if custom logo exists and we're on the general tab
		let isVisible = isCustomLogoPresent && tab === 'general';

		if (isVisible) {
			controlElement.style.display = 'block';
		}
	};

	const toggleFooterSocialBorderControls = (borderStyle) => {
		const controlIds = [
			'customize-control-responsive_footer_social_item_border_width',
			'customize-control-responsive_border_footer_social_radius',
			'customize-control-responsive_footer_social_border_radius_padding',
			'customize-control-responsive_footer_social_item_border_color',
			'customize-control-responsive_footer_social_item_icon_spacing',
		];

		const shouldShow = 'none' !== borderStyle && 'design' === tab;

		controlIds.forEach(controlId => {
			const controlElement = document.getElementById(controlId);
			if (controlElement) {
				controlElement.style.display = shouldShow ? 'block' : 'none';
			}
		});
	};

	const toggleHeaderSocialBorderControls = (borderStyle) => {
		const controlIds = [
			'customize-control-responsive_header_social_item_border_width',
			'customize-control-responsive_border_header_social_radius',
			'customize-control-responsive_header_social_border_radius_padding',
			'customize-control-responsive_header_social_item_border_color',
			'customize-control-responsive_header_social_item_icon_spacing',
		];

		const shouldShow = 'none' !== borderStyle && 'design' === tab;

		controlIds.forEach(controlId => {
			const controlElement = document.getElementById(controlId);
			if (controlElement) {
				controlElement.style.display = shouldShow ? 'block' : 'none';
			}
		});
	};

	const toggleMobileHeaderSocialBorderControls = (borderStyle) => {
		const controlIds = [
			'customize-control-responsive_mobile_header_social_item_border_width',
			'customize-control-responsive_border_mobile_header_social_radius',
			'customize-control-responsive_mobile_header_social_border_radius_padding',
			'customize-control-responsive_mobile_header_social_item_border_color',
			'customize-control-responsive_mobile_header_social_item_icon_spacing',
		];

		const shouldShow = 'none' !== borderStyle && 'design' === tab;

		controlIds.forEach(controlId => {
			const controlElement = document.getElementById(controlId);
			if (controlElement) {
				controlElement.style.display = shouldShow ? 'block' : 'none';
			}
		});
	};

	const toggleHeaderSocialColorControls = () => {
		const style = api('responsive_header_social_item_style') ? api('responsive_header_social_item_style').get() : 'filled';
		const brandColors = api('responsive_header_social_item_use_brand_colors') ? api('responsive_header_social_item_use_brand_colors').get() : 'no';

		const bgColorElement = document.getElementById('customize-control-responsive_header_social_item_background_color');
		if (bgColorElement) {
			bgColorElement.style.display = (style === 'filled' && brandColors !== 'yes' && tab === 'design') ? 'block' : 'none';
		}

		const colorElement = document.getElementById('customize-control-responsive_header_social_item_color');
		if (colorElement) {
			colorElement.style.display = (brandColors !== 'yes' && tab === 'design') ? 'block' : 'none';
		}
	};

	const toggleMobileHeaderSocialColorControls = () => {
		const style = api('responsive_mobile_header_social_item_style') ? api('responsive_mobile_header_social_item_style').get() : 'filled';
		const brandColors = api('responsive_mobile_header_social_item_use_brand_colors') ? api('responsive_mobile_header_social_item_use_brand_colors').get() : 'no';

		const bgColorElement = document.getElementById('customize-control-responsive_mobile_header_social_item_background_color');
		if (bgColorElement) {
			bgColorElement.style.display = (style === 'filled' && brandColors !== 'yes' && tab === 'design') ? 'block' : 'none';
		}

		const colorElement = document.getElementById('customize-control-responsive_mobile_header_social_item_color');
		if (colorElement) {
			colorElement.style.display = (brandColors !== 'yes' && tab === 'design') ? 'block' : 'none';
		}
	};

	const toggleFooterSocialColorControls = () => {
		const style = api('responsive_footer_social_item_style') ? api('responsive_footer_social_item_style').get() : 'filled';
		const brandColors = api('responsive_footer_social_item_use_brand_colors') ? api('responsive_footer_social_item_use_brand_colors').get() : 'no';

		const bgColorElement = document.getElementById('customize-control-responsive_footer_social_item_background_color');
		if (bgColorElement) {
			bgColorElement.style.display = (style === 'filled' && brandColors !== 'yes' && tab === 'design') ? 'block' : 'none';
		}

		const colorElement = document.getElementById('customize-control-responsive_footer_social_item_color');
		if (colorElement) {
			colorElement.style.display = (brandColors !== 'yes' && tab === 'design') ? 'block' : 'none';
		}
	};

	const toggleBannerLayoutControls = () => {
		const layout = api('responsive_single_blog_post_title_layout') ? api('responsive_single_blog_post_title_layout').get() : 'post_title_layout1';
		const containerWidth = api('responsive_single_blog_banner_container_width') ? api('responsive_single_blog_banner_container_width').get() : 'full_width';

		const containerWidthElement = document.getElementById('customize-control-responsive_single_blog_banner_container_width');
		const metaAlignmentSeparator = document.getElementById('customize-control-responsive_single_blog_meta_alignment_separator');
		const verticalAlignment = document.getElementById('customize-control-responsive_single_blog_post_title_vertical_alignment');
		const customWidthElement = document.getElementById('customize-control-responsive_single_blog_banner_custom_width');
		const minHeightElement = document.getElementById('customize-control-responsive_single_blog_banner_min_height');
		const bgColorElement = document.getElementById('customize-control-responsive_single_blog_banner_background_color');
		const paddingElement = document.getElementById('customize-control-responsive_single_blog_banner_padding_padding');
		const marginElement = document.getElementById('customize-control-responsive_single_blog_banner_margin_padding');

		if (containerWidthElement) {
			containerWidthElement.style.display = (layout === 'post_title_layout2' && tab === 'general') ? 'block' : 'none';
		}
		if(metaAlignmentSeparator) {
			metaAlignmentSeparator.style.display = (layout === 'post_title_layout2' && tab=== 'general') ? 'block' : 'none';
		}
		if (verticalAlignment) {
			verticalAlignment.style.display = (layout === 'post_title_layout2' && tab === 'general') ? 'block' : 'none';
		}
		if (customWidthElement) {
			customWidthElement.style.display = (layout === 'post_title_layout2' && containerWidth === 'custom' && tab === 'general') ? 'block' : 'none';
		}
		if (minHeightElement) {
			minHeightElement.style.display = (layout === 'post_title_layout2' && tab === 'design') ? 'block' : 'none';
		}
		if (bgColorElement) {
			bgColorElement.style.display = (layout === 'post_title_layout2' && tab === 'design') ? 'block' : 'none';
		}
		if (paddingElement) {
			paddingElement.style.display = (layout === 'post_title_layout2' && tab === 'design') ? 'block' : 'none';
		}
		if (marginElement) {
			marginElement.style.display = (layout === 'post_title_layout2' && tab === 'design') ? 'block' : 'none';
		}
	};

	const toggleBlogTitleLayoutControls = () => {
		const layout = api('responsive_blog_title_layout') ? api('responsive_blog_title_layout').get() : 'post_title_layout1';
		const isToggleActive = api('responsive_blog_post_title_toggle') ? api('responsive_blog_post_title_toggle').get() : false;
		
		const descElement = document.getElementById('customize-control-responsive_blog_title_description');
		const titleToggleElement = document.getElementById('customize-control-responsive_blog_post_title_toggle');
		const titleTextElement = document.getElementById('customize-control-res_blog_post_title_text');
		const titleToggleSeparator = document.getElementById('customize-control-responsive_blog_post_title_toggle_separator');
		const containerWidth = api('responsive_blog_banner_container_width') ? api('responsive_blog_banner_container_width').get() : 'full_width';

		const containerWidthElement = document.getElementById('customize-control-responsive_blog_banner_container_width');
		const customWidthElement = document.getElementById('customize-control-responsive_blog_banner_custom_width');

		const verticalAlignment = document.getElementById('customize-control-responsive_blog_post_title_vertical_alignment');
		if (verticalAlignment) {
			verticalAlignment.style.display = (layout === 'post_title_layout2' && tab === 'general') ? 'block' : 'none';
		}

		if (containerWidthElement) {
			containerWidthElement.style.display = (layout === 'post_title_layout2' && tab === 'general') ? 'block' : 'none';
		}

		if (descElement) {
			descElement.style.display = (layout === 'post_title_layout2' && tab === 'general') ? 'block' : 'none';
		}
		if (titleToggleElement) {
			titleToggleElement.style.display = (layout === 'post_title_layout2' && tab === 'general') ? 'block' : 'none';
		}
		if (titleTextElement) {
			titleTextElement.style.display = (layout === 'post_title_layout2' && isToggleActive && tab === 'general') ? 'block' : 'none';
		}
		if (titleToggleSeparator) {
			titleToggleSeparator.style.display = (layout === 'post_title_layout2' && isToggleActive && tab === 'general') ? 'block' : 'none';
		}
		if (customWidthElement) {
			customWidthElement.style.display = (layout === 'post_title_layout2' && containerWidth === 'custom' && tab === 'general') ? 'block' : 'none';
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