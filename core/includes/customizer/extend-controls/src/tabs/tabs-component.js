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
		general_label,
		design_label,
	} = props.control.params;

	const elementsToHide = {
		design: general_tab_ids,
		general: design_tab_ids,
	};

	// The Breadcrumb section's General-tab fields (aside from the "Enable
	// Breadcrumbs" toggle itself) should stay hidden while breadcrumbs are
	// disabled. WP Core's active_callback already hides them on load, but
	// this component force-sets display:block for every general_tab_ids
	// element whenever the General tab is (re)selected, with no awareness
	// of the toggle's value - so switching to Design and back to General
	// briefly reveals them before an unrelated jQuery patch re-hides them
	// ~100ms later. Gate the reveal here instead, synchronously.
	const isBreadcrumbGeneralFieldInactive = (elementId) => {
		if (id !== 'responsive_breadcrumb_tabs' || elementId === 'customize-control-res_breadcrumb') {
			return false;
		}
		const breadcrumbToggle = api('responsive_theme_options[breadcrumb]');
		return breadcrumbToggle ? !breadcrumbToggle.get() : false;
	};

	// Every Sticky Header field (General and Design tabs, including the ones
	// ResponsivePRO adds) stays hidden while "Enable Sticky Header?" is off.
	const isStickyHeaderFieldInactive = (elementId) => {
		if (id !== 'responsive_responsive_sticky_header_menu_tabs' || elementId === 'customize-control-res_sticky-header') {
			return false;
		}
		const stickyToggle = api('responsive_theme_options[sticky-header]');
		if (stickyToggle && !stickyToggle.get()) {
			return true;
		}
		if (elementId === 'customize-control-responsive_sticky_header_logo') {
			const logoToggle = api('responsive_sticky_header_logo_option');
			return logoToggle ? !logoToggle.get() : false;
		}
		return false;
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

	const isAddToCartButtonControlInactive = (elementId) => {
		const nonTextButtonControls = [
			'customize-control-responsive_add_to_cart_button_color',
			'customize-control-responsive_add_to_cart_button_border_width_border',
			'customize-control-responsive_add_to_cart_button_border_style',
			'customize-control-responsive_add_to_cart_button_border_color',
			'customize-control-responsive_border_add_to_cart_button_radius',
			'customize-control-responsive_add_to_cart_button_shadow_separator',
			'customize-control-responsive_add_to_cart_button_shadow',
			'customize-control-responsive_add_to_cart_button_shadow_color',
			'customize-control-responsive_add_to_cart_button_hover_shadow_separator',
			'customize-control-responsive_add_to_cart_button_hover_shadow',
			'customize-control-responsive_add_to_cart_button_hover_shadow_color',
		];
		if (nonTextButtonControls.indexOf(elementId) !== -1) {
			const buttonStyleSetting = api('responsive_product_button_style');
			if (buttonStyleSetting && buttonStyleSetting.get() === 'text_with_arrow') {
				return true;
			}
		}
		return false;
	};

	const isControlInactive = (elementId) => {
		if (isSidebarControlInactive(elementId) || isAddToCartButtonControlInactive(elementId)) {
			return true;
		}
		const controlKey = elementId.replace('customize-control-', '');
		if (api.control.has(controlKey)) {
			const ctrl = api.control(controlKey);
			if (ctrl && ctrl.active && !ctrl.active.get()) {
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
				if (isSidebarControlInactive(elementId) || isBreadcrumbGeneralFieldInactive(elementId) || isStickyHeaderFieldInactive(elementId)) {
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

		// Keep the General-tab fields in sync if the "Enable Breadcrumbs"
		// toggle changes while the user is already sitting on the General tab.
		if (id === 'responsive_breadcrumb_tabs') {
			const breadcrumbToggle = api('responsive_theme_options[breadcrumb]');
			if (breadcrumbToggle) {
				// The separator character and custom-icon controls have their own
				// extra condition (hidden when Yoast/RankMath supply the separator)
				// on top of the breadcrumb-enabled gating, so they're re-applied via
				// their own toggle functions rather than the generic loop below.
				const separatorRelatedIds = [
					'customize-control-responsive_breadcrumb_separator',
					'customize-control-responsive_breadcrumb_separator_separator',
					'customize-control-responsive_breadcrumb_unicode',
				];
				breadcrumbToggle.bind(() => {
					// Design tab: the separator color control is gated the same way.
					toggleBreadcrumbSeparatorColorTab();

					if (tab !== 'general') {
						return;
					}
					general_tab_ids.forEach(elementId => {
						if (separatorRelatedIds.indexOf(elementId) !== -1) {
							return;
						}
						const element = document.getElementById(elementId);
						if (element) {
							element.style.display = isBreadcrumbGeneralFieldInactive(elementId) ? 'none' : 'block';
						}
					});
					toggleBreadcrumbSeparatorControls();
					toggleBreadcrumbCustomIcon();
				});
			}
		}

		const isCustomLogoPresent = document.querySelector('#customize-control-custom_logo img.attachment-thumb') !== null;
		toggleLogoControl('customize-control-responsive_logo_width', isCustomLogoPresent);
		toggleLogoControl('customize-control-responsive_retina_logo', isCustomLogoPresent);
		toggleLogoControl('customize-control-responsive_mobile_logo_option', isCustomLogoPresent);

		const toggleContentBackground = () => {
			const pageStyle = api('responsive_page_container_style') ? api('responsive_page_container_style').get() : 'default';
			const resolvedPageStyle = pageStyle === 'default' ? (api('responsive_style') ? api('responsive_style').get() : 'boxed') : pageStyle;
			const pageCtrl = document.getElementById('customize-control-responsive_page_content_background_color');
			if (pageCtrl) {
				pageCtrl.style.display = (resolvedPageStyle !== 'flat' && tab === 'design') ? 'block' : 'none';
			}
			
			const blogStyle = api('responsive_blog_container_style') ? api('responsive_blog_container_style').get() : 'default';
			const resolvedBlogStyle = blogStyle === 'default' ? (api('responsive_style') ? api('responsive_style').get() : 'boxed') : blogStyle;
			const blogCtrl = document.getElementById('customize-control-responsive_blog_content_background_color');
			if (blogCtrl) {
				blogCtrl.style.display = (resolvedBlogStyle !== 'flat' && tab === 'design') ? 'block' : 'none';
			}
			
			const singleblogStyle = api('responsive_single_blog_container_style') ? api('responsive_single_blog_container_style').get() : 'default';
			const resolvedSingleBlogStyle = singleblogStyle === 'default' ? (api('responsive_style') ? api('responsive_style').get() : 'boxed') : singleblogStyle;
			const singleblogCtrl = document.getElementById('customize-control-responsive_single_blog_content_background_color');
			if (singleblogCtrl) {
				singleblogCtrl.style.display = (resolvedSingleBlogStyle !== 'flat' && tab === 'design') ? 'block' : 'none';
			}
		};
		toggleContentBackground();

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

		if ( api( 'responsive_disable_author_meta' ) && api( 'responsive_disable_author_meta' ).get() ) {
			const authorBoxEl = document.getElementById( 'customize-control-responsive_post_author_box_style' );
			const authorBoxSep = document.getElementById( 'customize-control-responsive_responsive_disable_author_meta_separator' );
			if ( authorBoxEl ) {
				authorBoxEl.style.display = 'none';
			}
			if ( authorBoxSep ) {
				authorBoxSep.style.display = 'none';
			}
		}

		api('responsive_page_sidebar_position', function( value ) {
			value.bind( function( newval ) {
				if ( newval ) {
					hideSidebarWidthControl(newval, 'page');
					hideSidebarStyleControl(newval, 'page');
				}
			});
		});
		api( 'responsive_header_html_content', function ( value ) {
		value.bind( function ( newval ) {
			if ( newval ) {
				$( '#responsive-html-editor-responsive_header_html_content-html' ).attr( 'aria-pressed', 'true' );
			}
		} );
	} );
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

		if (api('responsive_page_container_style')) {
			api('responsive_page_container_style', function( value ){
				value.bind( function( newval ) {
					toggleContentBackground();
				})
			});
		}
		
		if (api('responsive_blog_container_style')) {
			api('responsive_blog_container_style', function( value ){
				value.bind( function( newval ) {
					toggleContentBackground();
				})
			});
		}
		
		if (api('responsive_single_blog_container_style')) {
			api('responsive_single_blog_container_style', function( value ){
				value.bind( function( newval ) {
					toggleContentBackground();
				})
			});
		}
		
		if (api('responsive_style')) {
			api('responsive_style', function( value ){
				value.bind( function( newval ) {
					toggleContentBackground();
				})
			});
		}

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

		const toggleTopBorderControls = (rowPrefix) => {
			const sizeSetting = api(`responsive_footer_${rowPrefix}_row_top_border_size`);
			if (!sizeSetting) return;
			const size = sizeSetting.get();
			const display = (size > 0 && 'design' === tab) ? 'block' : 'none';
			
			const colorSuffix = rowPrefix === 'above' ? 'row_border_color' : 'row_border_color';
			
			const controlsToToggle = [
				`customize-control-responsive_footer_${rowPrefix}_separator_8`,
				`customize-control-responsive_footer_${rowPrefix}_${colorSuffix}`,
				`customize-control-responsive_footer_${rowPrefix}_separator_9`,
				`customize-control-responsive_footer_${rowPrefix}_top_border_type`
			];
			
			controlsToToggle.forEach(id => {
				const el = document.getElementById(id);
				if (el) {
					el.style.display = display;
				}
			});
		};

		const toggleBottomBorderControls = (rowPrefix) => {
			const sizeSetting = api(`responsive_footer_${rowPrefix}_row_bottom_border_size`);
			if (!sizeSetting) return;
			const size = sizeSetting.get();
			const display = (size > 0 && 'design' === tab) ? 'block' : 'none';
			
			const controlsToToggle = [
				`customize-control-responsive_footer_${rowPrefix}_separator_11`,
				`customize-control-responsive_footer_${rowPrefix}_row_bottom_border_color`,
				`customize-control-responsive_footer_${rowPrefix}_separator_10`,
				`customize-control-responsive_footer_${rowPrefix}_bottom_border_type`
			];
			
			controlsToToggle.forEach(id => {
				const el = document.getElementById(id);
				if (el) {
					el.style.display = display;
				}
			});
		};

		['above', 'primary', 'below'].forEach(rowPrefix => {
			toggleTopBorderControls(rowPrefix);
			toggleBottomBorderControls(rowPrefix);
		});

		['above', 'primary', 'below'].forEach(rowPrefix => {
			const topSettingId = `responsive_footer_${rowPrefix}_row_top_border_size`;
			if (api(topSettingId)) {
				api(topSettingId, function(value) {
					value.bind(function() {
						toggleTopBorderControls(rowPrefix);
					});
				});
			}

			const bottomSettingId = `responsive_footer_${rowPrefix}_row_bottom_border_size`;
			if (api(bottomSettingId)) {
				api(bottomSettingId, function(value) {
					value.bind(function() {
						toggleBottomBorderControls(rowPrefix);
					});
				});
			}
		});

		const toggleFooterLinkHoverBg = (rowPrefix) => {
			const styleSetting = api(`responsive_footer_${rowPrefix}_link_style`);
			if (!styleSetting) return;
			const isHoverBg = styleSetting.get() === 'hover-background';
			const display = (isHoverBg && 'design' === tab) ? 'block' : 'none';
			
			const controlsToToggle = [
				`customize-control-responsive_footer_${rowPrefix}_link_hover_bg_color`
			];
			
			controlsToToggle.forEach(id => {
				const el = document.getElementById(id);
				if (el) el.style.display = display;
			});
		};

		['above', 'primary', 'below'].forEach(rowPrefix => {
			toggleFooterLinkHoverBg(rowPrefix);
			
			const styleSettingId = `responsive_footer_${rowPrefix}_link_style`;
			if (api(styleSettingId)) {
				api(styleSettingId, function(value) {
					value.bind(function() {
						toggleFooterLinkHoverBg(rowPrefix);
					});
				});
			}
		});

		const toggleColumnBorderControls = (rowPrefix) => {
			const widthSetting = api(`responsive_footer_${rowPrefix}_column_border_width`);
			if (!widthSetting) return;
			const width = widthSetting.get();
			const display = (width > 0 && 'design' === tab) ? 'block' : 'none';
			
			const controlsToToggle = [
				`customize-control-responsive_footer_${rowPrefix}_separator_12`,
				`customize-control-responsive_footer_${rowPrefix}_column_border_color`,
				`customize-control-responsive_footer_${rowPrefix}_separator_13`,
				`customize-control-responsive_footer_${rowPrefix}_column_border_type`
			];
			
			controlsToToggle.forEach(id => {
				const el = document.getElementById(id);
				if (el) {
					el.style.display = display;
				}
			});
		};

		toggleColumnBorderControls('above');
		toggleColumnBorderControls('primary');
		toggleColumnBorderControls('below');

		['above', 'primary', 'below'].forEach(rowPrefix => {
			const settingId = `responsive_footer_${rowPrefix}_column_border_width`;
			if (api(settingId)) {
				api(settingId, function(value) {
					value.bind(function() {
						toggleColumnBorderControls(rowPrefix);
					});
				});
			}
		});
		['primary', 'above', 'below'].forEach(rowPrefix => {
			const columnsSetting = api(`responsive_footer_${rowPrefix}_columns`);
			const displayCondition = columnsSetting && columnsSetting.get() > 1 && 'general' === tab;
			const el = document.getElementById(`customize-control-responsive_footer_${rowPrefix}_inner_column_spacing`);
			if (el) el.style.display = displayCondition ? 'block' : 'none';
		});
		
		if ( api('responsive_sidebar_link_style') ) {
			const isHoverBg = api('responsive_sidebar_link_style').get() === 'hover-background';
			const linkHoverBgColorEl = document.getElementById('customize-control-responsive_sidebar_link_hover_bg_color');
			const linkHoverBgSepEl = document.getElementById('customize-control-responsive_sidebar_link_hover_bg_separator');
			if (linkHoverBgColorEl) {
				linkHoverBgColorEl.style.display = (isHoverBg && 'design' === tab) ? 'block' : 'none';
			}
			if (linkHoverBgSepEl) {
				linkHoverBgSepEl.style.display = (isHoverBg && 'design' === tab) ? 'block' : 'none';
			}
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

		if( api('responsive_mobile_cart_style') ) {
            if( api('responsive_mobile_cart_style').get() !== 'outline' && 'design' === tab ) {
				let cartBorderWidth = document.getElementById('customize-control-responsive_mobile_cart_border_width');
				if (cartBorderWidth) {
					cartBorderWidth.style.display = 'none';
				}
            }
            if( api('responsive_mobile_cart_style').get() === 'none' && 'design' === tab ) {
				let cartElementIds = [
					'customize-control-responsive_mobile_cart_border_separator',
					'customize-control-responsive_mobile_border_cart_radius',
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

		if( api('responsive_primary_navigation_stretch') && api('responsive_primary_navigation_stretch').get() == 1 && 'general' === tab ) {
			document.getElementById('customize-control-responsive_primary_navigation_fill_stretch').style.display = 'block';
		} else {
			document.getElementById('customize-control-responsive_primary_navigation_fill_stretch').style.display = 'none';
		}

		if( api('responsive_secondary_navigation_stretch') && api('responsive_secondary_navigation_stretch').get() == 1 && 'general' === tab ) {
			document.getElementById('customize-control-responsive_secondary_navigation_fill_stretch').style.display = 'block';
		} else {
			document.getElementById('customize-control-responsive_secondary_navigation_fill_stretch').style.display = 'none';
		}

		if ( api('responsive_product_card_design') && api('responsive_product_card_design').get() === 'design2' ) {
			const saleStyleCtrl = document.getElementById('customize-control-responsive_product_sale_style');
			if ( saleStyleCtrl ) {
				saleStyleCtrl.style.display = 'none';
			}
		}

		if ( api('toolbar_options') && ! api('toolbar_options').get() ) {
			const resultsCountCtrl = document.getElementById('customize-control-responsive_show_archive_results_count');
			const sortingDropdownCtrl = document.getElementById('customize-control-responsive_show_archive_sorting_dropdown');
			if ( resultsCountCtrl ) {
				resultsCountCtrl.style.display = 'none';
			}
			if ( sortingDropdownCtrl ) {
				sortingDropdownCtrl.style.display = 'none';
			}
		}

		if ( api('responsive_single_product_show_related_products') && ! api('responsive_single_product_show_related_products').get() ) {
			const relatedColumnsCtrl = document.getElementById('customize-control-responsive_single_product_related_products_columns');
			if ( relatedColumnsCtrl ) {
				relatedColumnsCtrl.style.display = 'none';
			}
		}

		if ( api('responsive_single_product_enable_shipping_text') && ! api('responsive_single_product_enable_shipping_text').get() ) {
			const shippingTextCtrl = document.getElementById('customize-control-responsive_single_product_shipping_text');
			if ( shippingTextCtrl ) {
				shippingTextCtrl.style.display = 'none';
			}
		}

		if ( api('responsive_single_product_floating_bar') && api('responsive_single_product_floating_bar').get() !== 'display' ) {
			const floatingBarPlacementCtrl = document.getElementById('customize-control-responsive_single_product_floating_bar_placement');
			if ( floatingBarPlacementCtrl ) {
				floatingBarPlacementCtrl.style.display = 'none';
			}
		}

		// The Center tab style has no tab background, so hide the tab background control.
		if ( api('responsive_single_product_tab_style') && 'center' === api('responsive_single_product_tab_style').get() ) {
			const tabBackgroundCtrl = document.getElementById('customize-control-responsive_single_product_tab_background_color_states');
			if ( tabBackgroundCtrl ) {
				tabBackgroundCtrl.style.display = 'none';
			}
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

		// Hide background image controls if disabled
		const toggleFooterBgControls = () => {
			const isBgImgEnabled = api('responsive_footer_background_image_toggle') ? api('responsive_footer_background_image_toggle').get() : false;
			const display = (isBgImgEnabled && 'design' === tab) ? 'block' : 'none';
			const elements = [
				'customize-control-responsive_footer_bg_left',
				'customize-control-responsive_footer_bg_top',
				'customize-control-responsive_footer_bg_repeat',
				'customize-control-responsive_footer_bg_size',
				'customize-control-responsive_footer_bg_attachment'
			];
			elements.forEach(id => {
				let el = document.getElementById(id);
				if (el) el.style.display = display;
			});
		};
		toggleFooterBgControls();

		if (api('responsive_footer_background_image_toggle')) {
			api('responsive_footer_background_image_toggle', function( value ) {
				value.bind( function( newval ) {
					toggleFooterBgControls();
				});
			});
		}

		// Sidebar Divider Style Controls
		if( api('responsive_sidebar_border_divider_style') ) {
			toggleSidebarDividerStyleControls( api('responsive_sidebar_border_divider_style').get() );
		}

		// Listen for changes to responsive_sidebar_border_divider_style
		if( api('responsive_sidebar_border_divider_style') ) {
			api('responsive_sidebar_border_divider_style', function( value ) {
				value.bind( function( newval ) {
					toggleSidebarDividerStyleControls( newval );
				} );
			} );
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
			if ( document.getElementById('customize-control-responsive_transparent_header_logo_width') ) {
				document.getElementById('customize-control-responsive_transparent_header_logo_width').style.display = 'none';
			}
			if ( document.getElementById('customize-control-responsive_transparent_header_retina_logo_option') ) {
				document.getElementById('customize-control-responsive_transparent_header_retina_logo_option').style.display = 'none';
			}
			if ( document.getElementById('customize-control-responsive_transparent_header_retina_logo') ) {
				document.getElementById('customize-control-responsive_transparent_header_retina_logo').style.display = 'none';
			}
		}
		if( api('responsive_transparent_header_retina_logo_option') && ! api('responsive_transparent_header_retina_logo_option').get() ) {
			if ( document.getElementById('customize-control-responsive_transparent_header_retina_logo') ) {
				document.getElementById('customize-control-responsive_transparent_header_retina_logo').style.display = 'none';
			}
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
			if ( document.getElementById('customize-control-responsive_transparent_header_enable_on') ) {
				document.getElementById('customize-control-responsive_transparent_header_enable_on').style.display = 'none';
			}
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
			if ( document.getElementById('customize-control-responsive_transparent_header_logo_width') ) {
				document.getElementById('customize-control-responsive_transparent_header_logo_width').style.display = 'none';
			}
			if ( document.getElementById('customize-control-responsive_transparent_header_retina_logo_option') ) {
				document.getElementById('customize-control-responsive_transparent_header_retina_logo_option').style.display = 'none';
			}
			if ( document.getElementById('customize-control-responsive_transparent_header_retina_logo') ) {
				document.getElementById('customize-control-responsive_transparent_header_retina_logo').style.display = 'none';
			}
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

		toggleShopTitleLayoutControls();
		if (api('responsive_shop_title_layout')) {
			api('responsive_shop_title_layout', function(value) {
				value.bind(function() {
					toggleShopTitleLayoutControls();
				});
			});
		}
		if (api('responsive_shop_banner_container_width')) {
			api('responsive_shop_banner_container_width', function(value) {
				value.bind(function() {
					toggleShopTitleLayoutControls();
				});
			});
		}
		if (api('responsive_shop_title_elements_positioning')) {
			api('responsive_shop_title_elements_positioning', function(value) {
				value.bind(function() {
					toggleShopTitleLayoutControls();
				});
			});
		}
		if (api('responsive_shop_title_container_background_layout1')) {
			api('responsive_shop_title_container_background_layout1', function(value) {
				value.bind(function() {
					toggleShopTitleLayoutControls();
				});
			});
		}
		if (api('responsive_shop_title_container_background_layout2')) {
			api('responsive_shop_title_container_background_layout2', function(value) {
				value.bind(function() {
					toggleShopTitleLayoutControls();
				});
			});
		}
		const shopElementsCtrl = document.getElementById('customize-control-responsive_shop_title_elements_positioning');
		if (shopElementsCtrl) {
			shopElementsCtrl.addEventListener('click', function() {
				setTimeout(toggleShopTitleLayoutControls, 50);
			});
		}
		const shopBgL1Ctrl = document.getElementById('customize-control-responsive_shop_title_container_background_layout1');
		if (shopBgL1Ctrl) {
			shopBgL1Ctrl.addEventListener('click', function() {
				setTimeout(toggleShopTitleLayoutControls, 50);
			});
		}
		const shopBgL2Ctrl = document.getElementById('customize-control-responsive_shop_title_container_background_layout2');
		if (shopBgL2Ctrl) {
			shopBgL2Ctrl.addEventListener('click', function() {
				setTimeout(toggleShopTitleLayoutControls, 50);
			});
		}

		toggleSingleProductTitleLayoutControls();
		if (api('responsive_single_product_title_layout')) {
			api('responsive_single_product_title_layout', function(value) {
				value.bind(function() {
					toggleSingleProductTitleLayoutControls();
				});
			});
		}
		if (api('responsive_single_product_title_elements_positioning')) {
			api('responsive_single_product_title_elements_positioning', function(value) {
				value.bind(function() {
					toggleSingleProductTitleLayoutControls();
				});
			});
		}
		if (api('responsive_single_product_featured_image_ratio')) {
			api('responsive_single_product_featured_image_ratio', function(value) {
				value.bind(function() {
					toggleSingleProductTitleLayoutControls();
				});
			});
		}
		if (api('responsive_single_product_featured_image_as_background')) {
			api('responsive_single_product_featured_image_as_background', function(value) {
				value.bind(function() {
					toggleSingleProductTitleLayoutControls();
				});
			});
		}
		const spTitleElementsCtrl = document.getElementById('customize-control-responsive_single_product_title_elements_positioning');
		if (spTitleElementsCtrl) {
			spTitleElementsCtrl.addEventListener('click', function() {
				setTimeout(toggleSingleProductTitleLayoutControls, 50);
			});
		}
		const spUseAsBgCtrl = document.getElementById('customize-control-responsive_single_product_featured_image_as_background');
		if (spUseAsBgCtrl) {
			spUseAsBgCtrl.addEventListener('click', function() {
				setTimeout(toggleSingleProductTitleLayoutControls, 50);
			});
		}
		if (api('responsive_single_product_banner_container_width')) {
			api('responsive_single_product_banner_container_width', function(value) {
				value.bind(function() {
					toggleSingleProductTitleLayoutControls();
				});
			});
		}

		togglePageTitleLayoutControls();
		if (api('responsive_page_title_layout')) {
			api('responsive_page_title_layout', function(value) {
				value.bind(function() {
					togglePageTitleLayoutControls();
				});
			});
		}
		if (api('responsive_page_title_container_width')) {
			api('responsive_page_title_container_width', function(value) {
				value.bind(function() {
					togglePageTitleLayoutControls();
				});
			});
		}

		togglePageFeaturedImageControls();
		if (api('responsive_page_featured_image_ratio')) {
			api('responsive_page_featured_image_ratio', function(value) {
				value.bind(function() {
					togglePageFeaturedImageControls();
				});
			});
		}
		if (api('responsive_page_featured_image_position')) {
			api('responsive_page_featured_image_position', function(value) {
				value.bind(function() {
					togglePageFeaturedImageControls();
				});
			});
		}

		toggleSingleBlogFeaturedImageControls();
		if (api('responsive_single_blog_featured_image_ratio')) {
			api('responsive_single_blog_featured_image_ratio', function(value) {
				value.bind(function() {
					toggleSingleBlogFeaturedImageControls();
				});
			});
		}
		if (api('responsive_single_blog_featured_image_position')) {
			api('responsive_single_blog_featured_image_position', function(value) {
				value.bind(function() {
					toggleSingleBlogFeaturedImageControls();
				});
			});
		}

		toggleBreadcrumbCustomIcon();
		if (api('responsive_breadcrumb_separator')) {
			api('responsive_breadcrumb_separator', function(value) {
				value.bind(function() {
					toggleBreadcrumbCustomIcon();
				});
			});
		}

		// Yoast SEO / RankMath render their own separator - our character
		// choice and its color have nothing to affect when either is the
		// selected source, so hide them reactively as the source changes
		// (the PHP active_callback only sets the initial state on page load).
		toggleBreadcrumbSeparatorControls();
		if (api('responsive_breadcrumb_source')) {
			api('responsive_breadcrumb_source', function(value) {
				value.bind(function() {
					toggleBreadcrumbCustomIcon();
					toggleBreadcrumbSeparatorControls();
				});
			});
		}

		// responsive_breadcrumb_separator_color is the only Design-tab control in
		// this section with a real active_callback (the others just use null,
		// i.e. always active). WP Core only animates a control's container in/out
		// when its "active" Value actually transitions - and since this one's
		// active state gets evaluated (and typically resolves true) on load, WP's
		// own slideDown() fires asynchronously and sets display:block *after* our
		// synchronous tab sweep above already hid it (it's in design_tab_ids), so
		// it wins the race and stays visible on the General tab. Re-apply our tab
		// rule every time WP's own active-state animation completes.
		toggleBreadcrumbSeparatorColorTab();
		const breadcrumbSeparatorColorCtrl = api.control('responsive_breadcrumb_separator_color');
		if (breadcrumbSeparatorColorCtrl && breadcrumbSeparatorColorCtrl.active) {
			breadcrumbSeparatorColorCtrl.active.bind(toggleBreadcrumbSeparatorColorTab);
		}

		// Nearly every other General-tab breadcrumb field shares that same race:
		// they use active_callback 'responsive_active_breadcrumb', so turning
		// "Enable Breadcrumbs" on/off flips their active state, and WP Core's
		// slideDown()/slideUp() for that transition runs asynchronously. Switch
		// tabs quickly right after toggling and that animation can finish after
		// our synchronous sweep above, leaving a General field visible on the
		// Design tab (or hidden on General) until something else re-applies our
		// rule. Re-apply it whenever any of these controls' active state settles.
		if (id === 'responsive_breadcrumb_tabs') {
			const separatorRelatedIds = [
				'customize-control-responsive_breadcrumb_separator',
				'customize-control-responsive_breadcrumb_separator_separator',
				'customize-control-responsive_breadcrumb_unicode',
			];
			general_tab_ids
				.filter(elementId => elementId !== 'customize-control-res_breadcrumb' && separatorRelatedIds.indexOf(elementId) === -1)
				.forEach(elementId => {
					const ctrl = api.control(elementId.replace('customize-control-', ''));
					if (ctrl && ctrl.active) {
						ctrl.active.bind(() => {
							const element = document.getElementById(elementId);
							if (element) {
								element.style.display = (tab === 'general' && !isBreadcrumbGeneralFieldInactive(elementId)) ? 'block' : 'none';
							}
						});
					}
				});
			separatorRelatedIds.forEach(elementId => {
				const ctrl = api.control(elementId.replace('customize-control-', ''));
				if (ctrl && ctrl.active) {
					ctrl.active.bind(() => {
						toggleBreadcrumbSeparatorControls();
						toggleBreadcrumbCustomIcon();
					});
				}
			});
		}

		// Let other extensions (e.g. ResponsivePRO's Site Layout controls) know the
		// visible tab has changed, since the generic per-id resets above may have
		// just overridden any conditional visibility they applied.
		document.dispatchEvent(new CustomEvent('responsive:tabChanged', { detail: { tab } }));

		toggleShopReviewCountControl();
		toggleShopAddToCartActionControl();
		if (api('responsive_woocommerce_shop_elements_positioning')) {
			api('responsive_woocommerce_shop_elements_positioning', function(value) {
				value.bind(function() {
					toggleShopReviewCountControl();
					toggleShopAddToCartActionControl();
				});
			});
		}

		toggleAddToCartButtonBorderControls();
		if (api('responsive_product_button_style')) {
			api('responsive_product_button_style', function(value) {
				value.bind(function() {
					toggleAddToCartButtonBorderControls();
				});
			});
		}
		if (api('responsive_product_card_design')) {
			api('responsive_product_card_design', function(value) {
				value.bind(function(newval) {
					const el = document.getElementById('customize-control-responsive_product_sale_style');
					if (el) {
						el.style.display = (newval !== 'design2' && 'general' === tab) ? 'block' : 'none';
					}
				});
			});
		}
		if (api('toolbar_options')) {
			api('toolbar_options', function(value) {
				value.bind(function(newval) {
					const display = (!!newval && 'general' === tab) ? 'block' : 'none';
					const resultsCountCtrl = document.getElementById('customize-control-responsive_show_archive_results_count');
					const sortingDropdownCtrl = document.getElementById('customize-control-responsive_show_archive_sorting_dropdown');
					if (resultsCountCtrl) {
						resultsCountCtrl.style.display = display;
					}
					if (sortingDropdownCtrl) {
						sortingDropdownCtrl.style.display = display;
					}
				});
			});
		}
		if (api('responsive_single_product_show_related_products')) {
			api('responsive_single_product_show_related_products', function(value) {
				value.bind(function(newval) {
					const relatedColumnsCtrl = document.getElementById('customize-control-responsive_single_product_related_products_columns');
					if (relatedColumnsCtrl) {
						relatedColumnsCtrl.style.display = (!!newval && 'general' === tab) ? 'block' : 'none';
					}
				});
			});
		}
		if (api('responsive_single_product_enable_shipping_text')) {
			api('responsive_single_product_enable_shipping_text', function(value) {
				value.bind(function(newval) {
					const shippingTextCtrl = document.getElementById('customize-control-responsive_single_product_shipping_text');
					if (shippingTextCtrl) {
						shippingTextCtrl.style.display = (!!newval && 'general' === tab) ? 'block' : 'none';
					}
				});
			});
		}
		if (api('responsive_single_product_floating_bar')) {
			api('responsive_single_product_floating_bar', function(value) {
				value.bind(function(newval) {
					const floatingBarPlacementCtrl = document.getElementById('customize-control-responsive_single_product_floating_bar_placement');
					if (floatingBarPlacementCtrl) {
						floatingBarPlacementCtrl.style.display = ('display' === newval && 'general' === tab) ? 'block' : 'none';
					}
				});
			});
		}
		if (api('responsive_single_product_tab_style')) {
			api('responsive_single_product_tab_style', function(value) {
				value.bind(function(newval) {
					const tabBackgroundCtrl = document.getElementById('customize-control-responsive_single_product_tab_background_color_states');
					if (tabBackgroundCtrl) {
						tabBackgroundCtrl.style.display = ('center' !== newval && 'design' === tab) ? 'block' : 'none';
					}
				});
			});
		}
		[
			'responsive_add_to_cart_button_border_width_top_border',
			'responsive_add_to_cart_button_border_width_right_border',
			'responsive_add_to_cart_button_border_width_bottom_border',
			'responsive_add_to_cart_button_border_width_left_border',
			'responsive_add_to_cart_button_border_width_tablet_top_border',
			'responsive_add_to_cart_button_border_width_tablet_right_border',
			'responsive_add_to_cart_button_border_width_tablet_bottom_border',
			'responsive_add_to_cart_button_border_width_tablet_left_border',
			'responsive_add_to_cart_button_border_width_mobile_top_border',
			'responsive_add_to_cart_button_border_width_mobile_right_border',
			'responsive_add_to_cart_button_border_width_mobile_bottom_border',
			'responsive_add_to_cart_button_border_width_mobile_left_border',
		].forEach(function(key) {
			if (api(key)) {
				api(key, function(value) {
					value.bind(function() {
						toggleAddToCartButtonBorderControls();
					});
				});
			}
		});

	}, [tab]);

	// Show / hide the Sticky Header fields on the current tab as soon as
	// "Enable Sticky Header?" (or "Different Logo For Sticky Header") changes.
	useEffect(() => {
		if (id !== 'responsive_responsive_sticky_header_menu_tabs') {
			return;
		}

		const applyStickyHeaderVisibility = () => {
			elementsToHide[tab === 'general' ? 'design' : 'general'].forEach(elementId => {
				const element = document.getElementById(elementId);
				if (element) {
					element.style.display = isStickyHeaderFieldInactive(elementId) ? 'none' : 'block';
				}
			});
			// Let ResponsivePRO re-apply its own conditions on top (devices, rows, ...).
			document.dispatchEvent(new CustomEvent('responsive:tabChanged', { detail: { tab } }));
		};

		const settings = ['responsive_theme_options[sticky-header]', 'responsive_sticky_header_logo_option']
			.map(settingId => api(settingId))
			.filter(Boolean);

		settings.forEach(setting => setting.bind(applyStickyHeaderVisibility));

		return () => {
			settings.forEach(setting => setting.unbind(applyStickyHeaderVisibility));
		};
	}, [tab]);

	const hideSidebarWidthControl = (value, control) => {
    const controlId = (control === 'global' || control === 'default') ? 'customize-control-responsive_default_sidebar_width' : `customize-control-responsive_${control}_sidebar_width`;
    const controlElement = document.getElementById(controlId);
    const separatorId = (control === 'global' || control === 'default') ? 'customize-control-responsive_default_sidebar_width_separator' : `customize-control-responsive_${control}_sidebar_width_separator`;
    const separatorElement = document.getElementById(separatorId);

    if (controlElement) {
        controlElement.style.display = 'none';
    }
    if (separatorElement) {
        separatorElement.style.display = 'none';
    }

    let isVisible = false;
    if (control === 'global' || control === 'default') {
        // For global sidebar: show whenever on general tab
        isVisible = tab === 'general';
    } else {
        // For page/blog: hide when 'no' or resolve 'global'
        if (value === 'global') {
            const globalValue = api('responsive_default_sidebar_position') ? api('responsive_default_sidebar_position').get() : 'no';
            isVisible = globalValue !== 'no' && tab === 'general';
        } else {
            isVisible = value !== 'no' && tab === 'general';
        }
    }

    if (isVisible) {
        if (controlElement && !isSidebarControlInactive(controlId)) {
            controlElement.style.display = 'block';
        }
        if (separatorElement && !isSidebarControlInactive(separatorId)) {
            separatorElement.style.display = 'block';
        }
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
			// For global sidebar style: show whenever on general tab
			isVisible = tab === 'general';
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

			// Show whenever active tab is 'design'
			const isVisible = tab === 'design';
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

	const toggleSidebarDividerStyleControls = (borderStyle) => {
		const controlIds = [
			'customize-control-responsive_sidebar_border_divider_width',
			'customize-control-responsive_sidebar_border_divider_color',
		];

		const shouldShow = 'none' !== borderStyle && 'design' === tab;

		controlIds.forEach(controlId => {
			const controlElement = document.getElementById(controlId);
			if (controlElement) {
				controlElement.style.display = shouldShow ? 'block' : 'none';
			}
		});
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
		const separatorElement = document.getElementById('customize-control-responsive_single_blog_post_meta_typography_group_separator');

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
		if(separatorElement) {
			separatorElement.style.display = (layout === 'post_title_layout2' && tab === 'design') ? 'block' : 'none';
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
		const minHeightElement = document.getElementById('customize-control-responsive_blog_banner_min_height');
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
		if (minHeightElement) {
			minHeightElement.style.display = (layout === 'post_title_layout2' && tab === 'design') ? 'block' : 'none';
		}

	};

	const toggleShopTitleLayoutControls = () => {
		const layout = api('responsive_shop_title_layout')
			? api('responsive_shop_title_layout').get()
			: 'post_title_layout1';

		const elements = api('responsive_shop_title_elements_positioning')
			? api('responsive_shop_title_elements_positioning').get()
			: ['breadcrumb', 'title', 'description'];

		const isTitleVisible = Array.isArray(elements) ? elements.indexOf('title') !== -1 : (typeof elements === 'string' && elements.split(',').indexOf('title') !== -1);
		const isDescVisible  = Array.isArray(elements) ? elements.indexOf('description') !== -1 : (typeof elements === 'string' && elements.split(',').indexOf('description') !== -1);

		const titleElement = document.getElementById('customize-control-responsive_shop_archive_title');
		const descElement = document.getElementById('customize-control-responsive_shop_archive_description');

		if (titleElement) {
			titleElement.style.display = (isTitleVisible && tab === 'general') ? 'block' : 'none';
		}
		if (descElement) {
			descElement.style.display = (isDescVisible && tab === 'general') ? 'block' : 'none';
		}

		const containerWidth = api('responsive_shop_banner_container_width')
			? api('responsive_shop_banner_container_width').get()
			: 'full_width';

		const containerWidthElement = document.getElementById('customize-control-responsive_shop_banner_container_width');
		const customWidthElement = document.getElementById('customize-control-responsive_shop_banner_custom_width');

		if (containerWidthElement) {
			containerWidthElement.style.display = (layout === 'post_title_layout2' && tab === 'general') ? 'block' : 'none';
		}
		if (customWidthElement) {
			customWidthElement.style.display = (layout === 'post_title_layout2' && containerWidth === 'custom' && tab === 'general') ? 'block' : 'none';
		}

		const verticalAlignment = document.getElementById('customize-control-responsive_shop_title_vertical_alignment');
		if (verticalAlignment) {
			verticalAlignment.style.display = (layout === 'post_title_layout2' && tab === 'general') ? 'block' : 'none';
		}

		const minHeightElement = document.getElementById('customize-control-responsive_shop_banner_min_height');
		if (minHeightElement) {
			minHeightElement.style.display = (layout === 'post_title_layout2' && tab === 'design') ? 'block' : 'none';
		}

		const bgL1El = document.getElementById('customize-control-responsive_shop_title_container_background_layout1');
		const bgL2El = document.getElementById('customize-control-responsive_shop_title_container_background_layout2');
		const bannerBgEl = document.getElementById('customize-control-responsive_shop_banner_background_color');
		const bannerOverlayEl = document.getElementById('customize-control-responsive_shop_banner_overlay_color');

		if (tab === 'design') {
			if (layout === 'post_title_layout1') {
				if (bgL1El) bgL1El.style.display = 'block';
				if (bgL2El) bgL2El.style.display = 'none';
				const bg1 = api('responsive_shop_title_container_background_layout1')
					? api('responsive_shop_title_container_background_layout1').get()
					: 'none';
				if (bannerBgEl) bannerBgEl.style.display = (bg1 === 'custom') ? 'block' : 'none';
				if (bannerOverlayEl) bannerOverlayEl.style.display = 'none';
			} else {
				if (bgL1El) bgL1El.style.display = 'none';
				if (bgL2El) bgL2El.style.display = 'block';
				const bg2 = api('responsive_shop_title_container_background_layout2')
					? api('responsive_shop_title_container_background_layout2').get()
					: 'custom';
				if (bannerBgEl) bannerBgEl.style.display = (bg2 === 'custom') ? 'block' : 'none';
				if (bannerOverlayEl) bannerOverlayEl.style.display = (bg2 === 'featured') ? 'block' : 'none';
			}
		} else {
			if (bgL1El) bgL1El.style.display = 'none';
			if (bgL2El) bgL2El.style.display = 'none';
			if (bannerBgEl) bannerBgEl.style.display = 'none';
			if (bannerOverlayEl) bannerOverlayEl.style.display = 'none';
		}
	};

	const toggleSingleProductTitleLayoutControls = () => {
		if ( id !== 'responsive_single_product_title_area_tabs' ) {
			return;
		}
		const layout = api('responsive_single_product_title_layout')
			? api('responsive_single_product_title_layout').get()
			: 'post_title_layout1';

		const isLayout1 = ( 'post_title_layout1' === layout );
		const isLayout2 = !isLayout1;

		const structureEl = document.getElementById('customize-control-responsive_single_product_title_elements_positioning');
		const metaEl      = document.getElementById('customize-control-responsive_single_product_title_meta');
		const metaSeparatorEl = document.getElementById('customize-control-responsive_single_product_title_meta_separator');

		if (structureEl) {
			structureEl.style.display = (tab === 'general') ? 'block' : 'none';
		}

		let elements = api('responsive_single_product_title_elements_positioning')
			? api('responsive_single_product_title_elements_positioning').get()
			: [];
		if (typeof elements === 'string') {
			try {
				elements = JSON.parse(elements);
			} catch (e) {
				elements = elements.split(',');
			}
		}
		const hasMeta = Array.isArray(elements) && elements.indexOf('meta') !== -1;

		if (metaEl) {
			metaEl.style.display = (hasMeta && tab === 'general') ? 'block' : 'none';
		}

		if (metaSeparatorEl) {
			metaSeparatorEl.style.display = (hasMeta && tab === 'general') ? 'block' : 'none';
		}

		// Featured Image controls: dependent on visibility of featured image
		const hasFeaturedImage = Array.isArray(elements) && elements.indexOf('featured_image') !== -1;

		const featuredImageSeparatorEl = document.getElementById('customize-control-responsive_single_product_title_featured_image_separator');
		if (featuredImageSeparatorEl) {
			featuredImageSeparatorEl.style.display = (hasFeaturedImage && tab === 'general') ? 'block' : 'none';
		}

		// Use as background toggle (only for Layout 2 when featured_image is visible)
		const useAsBgEl = document.getElementById('customize-control-responsive_single_product_featured_image_as_background');
		const isUseAsBgVisible = isLayout2 && hasFeaturedImage;
		if (useAsBgEl) {
			useAsBgEl.style.display = (isUseAsBgVisible && tab === 'general') ? 'block' : 'none';
		}

		const asBg = api('responsive_single_product_featured_image_as_background')
			? api('responsive_single_product_featured_image_as_background').get()
			: 0;
		const isAsBackground = isUseAsBgVisible && (asBg === 1 || asBg === true || asBg === '1');

		// Featured Image controls: only when featured image is visible AND NOT used as background
		const showImageRatioControls = hasFeaturedImage && !isAsBackground;

		const ratio = api('responsive_single_product_featured_image_ratio')
			? api('responsive_single_product_featured_image_ratio').get()
			: 'original';

		const ratioEl           = document.getElementById('customize-control-responsive_single_product_featured_image_ratio');
		const predefinedRatioEl = document.getElementById('customize-control-responsive_single_product_featured_image_predefined_ratio');
		const customWidthEl     = document.getElementById('customize-control-responsive_single_product_featured_image_custom_width');
		const customHeightEl    = document.getElementById('customize-control-responsive_single_product_featured_image_custom_height');
		const imageSizeEl       = document.getElementById('customize-control-responsive_single_product_featured_image_size');

		if (ratioEl) {
			ratioEl.style.display = (showImageRatioControls && tab === 'general') ? 'block' : 'none';
		}
		if (predefinedRatioEl) {
			predefinedRatioEl.style.display = (showImageRatioControls && ratio === 'predefined' && tab === 'general') ? 'block' : 'none';
		}
		if (customWidthEl) {
			customWidthEl.style.display = (showImageRatioControls && ratio === 'custom' && tab === 'general') ? 'block' : 'none';
		}
		if (customHeightEl) {
			customHeightEl.style.display = (showImageRatioControls && ratio === 'custom' && tab === 'general') ? 'block' : 'none';
		}
		if (imageSizeEl) {
			imageSizeEl.style.display = (showImageRatioControls && tab === 'general') ? 'block' : 'none';
		}

		const verticalAlignment = document.getElementById('customize-control-responsive_single_product_title_vertical_alignment');
		if (verticalAlignment) {
			verticalAlignment.style.display = (isLayout2 && tab === 'general') ? 'block' : 'none';
		}

		const spContainerWidth = api('responsive_single_product_banner_container_width')
			? api('responsive_single_product_banner_container_width').get()
			: 'full_width';

		const spContainerWidthEl = document.getElementById('customize-control-responsive_single_product_banner_container_width');
		const spCustomWidthEl    = document.getElementById('customize-control-responsive_single_product_banner_custom_width');

		if (spContainerWidthEl) {
			spContainerWidthEl.style.display = (isLayout2 && tab === 'general') ? 'block' : 'none';
		}
		if (spCustomWidthEl) {
			spCustomWidthEl.style.display = (isLayout2 && spContainerWidth === 'custom' && tab === 'general') ? 'block' : 'none';
		}

		const minHeightEl = document.getElementById('customize-control-responsive_single_product_banner_min_height');
		if (minHeightEl) {
			minHeightEl.style.display = (isLayout2 && tab === 'design') ? 'block' : 'none';
		}

		const bannerBgEl = document.getElementById('customize-control-responsive_single_product_banner_background_color');
		if (bannerBgEl) {
			bannerBgEl.style.display = (isLayout2 && !isAsBackground && tab === 'design') ? 'block' : 'none';
		}

		const bannerOverlayEl = document.getElementById('customize-control-responsive_single_product_banner_overlay_color');
		if (bannerOverlayEl) {
			bannerOverlayEl.style.display = (isAsBackground && tab === 'design') ? 'block' : 'none';
		}
	};

	const togglePageTitleLayoutControls = () => {
		const layout = api('responsive_page_title_layout') ? api('responsive_page_title_layout').get() : 'post_title_layout1';
		const containerWidth = api('responsive_page_title_container_width') ? api('responsive_page_title_container_width').get() : 'full_width';

		const containerWidthElement = document.getElementById('customize-control-responsive_page_title_container_width');
		const verticalAlignment = document.getElementById('customize-control-responsive_page_title_vertical_alignment');
		const customWidthElement = document.getElementById('customize-control-responsive_page_title_custom_width');
		const minHeightElement = document.getElementById('customize-control-responsive_page_title_banner_min_height');
		const bgColorElement = document.getElementById('customize-control-responsive_page_title_banner_background_color');
		const paddingElement = document.getElementById('customize-control-responsive_page_title_banner_padding_padding');
		const marginElement = document.getElementById('customize-control-responsive_page_title_banner_margin_padding');
		const separator = document.getElementById('customize-control-responsive_page_title_area_meta_typography_group_separator');

		if (containerWidthElement) {
			containerWidthElement.style.display = (layout === 'post_title_layout2' && tab === 'general') ? 'block' : 'none';
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
		if(separator) {
			separator.style.display = (layout === 'post_title_layout2' && tab === 'design') ? 'block' : 'none';
		}
	};

	const togglePageFeaturedImageControls = () => {
		const ratio = api('responsive_page_featured_image_ratio') ? api('responsive_page_featured_image_ratio').get() : 'original';
		const position = api('responsive_page_featured_image_position') ? api('responsive_page_featured_image_position').get() : 'none';

		const predefinedRatioElement = document.getElementById('customize-control-responsive_page_featured_image_predefined_ratio');
		const customWidthElement = document.getElementById('customize-control-responsive_page_featured_image_custom_width');
		const customHeightElement = document.getElementById('customize-control-responsive_page_featured_image_custom_height');
		const overlayColorElement = document.getElementById('customize-control-responsive_page_featured_image_overlay_color');

		if (predefinedRatioElement) {
			predefinedRatioElement.style.display = (ratio === 'predefined' && tab === 'general') ? 'block' : 'none';
		}
		if (customWidthElement) {
			customWidthElement.style.display = (ratio === 'custom' && tab === 'general') ? 'block' : 'none';
		}
		if (customHeightElement) {
			customHeightElement.style.display = (ratio === 'custom' && tab === 'general') ? 'block' : 'none';
		}
		if (overlayColorElement) {
			overlayColorElement.style.display = (position === 'background' && tab === 'design') ? 'block' : 'none';
		}
	};

	const toggleSingleBlogFeaturedImageControls = () => {
		const ratio = api('responsive_single_blog_featured_image_ratio') ? api('responsive_single_blog_featured_image_ratio').get() : 'original';
		const position = api('responsive_single_blog_featured_image_position') ? api('responsive_single_blog_featured_image_position').get() : 'none';

		const predefinedRatioElement = document.getElementById('customize-control-responsive_single_blog_featured_image_predefined_ratio');
		const customWidthElement = document.getElementById('customize-control-responsive_single_blog_featured_image_custom_width');
		const customHeightElement = document.getElementById('customize-control-responsive_single_blog_featured_image_custom_height');
		const overlayColorElement = document.getElementById('customize-control-responsive_single_blog_featured_image_overlay_color');

		if (predefinedRatioElement) {
			predefinedRatioElement.style.display = (ratio === 'predefined' && tab === 'general') ? 'block' : 'none';
		}
		if (customWidthElement) {
			customWidthElement.style.display = (ratio === 'custom' && tab === 'general') ? 'block' : 'none';
		}
		if (customHeightElement) {
			customHeightElement.style.display = (ratio === 'custom' && tab === 'general') ? 'block' : 'none';
		}
		if (overlayColorElement) {
			overlayColorElement.style.display = (position === 'background' && tab === 'design') ? 'block' : 'none';
		}
	};

	const isBreadcrumbPluginSource = () => {
		const source = api('responsive_breadcrumb_source') ? api('responsive_breadcrumb_source').get() : 'default';
		return ( 'yoast' === source || 'rankmath' === source );
	};

	const toggleBreadcrumbCustomIcon = () => {
		const separator = api('responsive_breadcrumb_separator') ? api('responsive_breadcrumb_separator').get() : 'rsaquo';
		const customIconElement = document.getElementById('customize-control-responsive_breadcrumb_unicode');
		if (customIconElement) {
			customIconElement.style.display = (separator === 'unicode' && !isBreadcrumbPluginSource() && tab === 'general'
				&& !isBreadcrumbGeneralFieldInactive('customize-control-responsive_breadcrumb_unicode')) ? 'block' : 'none';
		}
	};

	const toggleBreadcrumbSeparatorControls = () => {
		// Both controls only ever belong on the General tab (see general_tab_ids
		// in class-responsive-panel.php) - showing them here must still respect
		// that, or switching to the Design tab would never hide them again.
		// They must also stay hidden while breadcrumbs are disabled entirely,
		// same as the rest of that tab's fields (isBreadcrumbGeneralFieldInactive).
		const show = !isBreadcrumbPluginSource() && tab === 'general'
			&& !isBreadcrumbGeneralFieldInactive('customize-control-responsive_breadcrumb_separator');
		const separatorEl = document.getElementById('customize-control-responsive_breadcrumb_separator');
		const separatorDividerEl = document.getElementById('customize-control-responsive_breadcrumb_separator_separator');
		if (separatorEl) {
			separatorEl.style.display = show ? 'block' : 'none';
		}
		if (separatorDividerEl) {
			separatorDividerEl.style.display = show ? 'block' : 'none';
		}
	};

	// "Separator Color" is a Design-tab-only control (see design_tab_ids in
	// class-responsive-panel.php) - this only handles which tab it belongs to,
	// not the Yoast/RankMath plugin-source hiding (that stays PHP-only, since
	// unlike the character-choice control this one stays visible for RankMath).
	const toggleBreadcrumbSeparatorColorTab = () => {
		const el = document.getElementById('customize-control-responsive_breadcrumb_separator_color');
		if (el) {
			el.style.display = (tab === 'design' && !isBreadcrumbGeneralFieldInactive('customize-control-responsive_breadcrumb_separator_color')) ? 'block' : 'none';
		}
	};

	const toggleShopReviewCountControl = () => {
		const reviewCountEl = document.getElementById('customize-control-responsive_product_review_count');
		if (!reviewCountEl) return;
		const positioningSetting = api('responsive_woocommerce_shop_elements_positioning');
		const elements = positioningSetting ? positioningSetting.get() : [];
		const isRatingsVisible = Array.isArray(elements) ? elements.includes('ratings') : (typeof elements === 'string' && elements.split(',').includes('ratings'));
		reviewCountEl.style.display = (isRatingsVisible && tab === 'general') ? 'block' : 'none';
	};

	const toggleShopAddToCartActionControl = () => {
		const addToCartActionEl = document.getElementById('customize-control-responsive_shop_add_to_cart_action');
		if (!addToCartActionEl) return;
		const positioningSetting = api('responsive_woocommerce_shop_elements_positioning');
		const elements = positioningSetting ? positioningSetting.get() : [];
		const isAddToCartVisible = Array.isArray(elements) ? elements.includes('add_cart') : (typeof elements === 'string' && elements.split(',').includes('add_cart'));
		addToCartActionEl.style.display = (isAddToCartVisible && tab === 'general') ? 'block' : 'none';
	};

	const toggleAddToCartButtonBorderControls = () => {
		const borderWidthEl = document.getElementById('customize-control-responsive_add_to_cart_button_border_width_border');
		const borderStyleEl = document.getElementById('customize-control-responsive_add_to_cart_button_border_style');
		const borderColorEl = document.getElementById('customize-control-responsive_add_to_cart_button_border_color');
		const borderRadiusEl = document.getElementById('customize-control-responsive_border_add_to_cart_button_radius');

		const buttonStyleSetting = api('responsive_product_button_style');
		const buttonStyle = buttonStyleSetting ? buttonStyleSetting.get() : 'button';
		const isButton = buttonStyle !== 'text_with_arrow';
		const shouldShow = isButton && tab === 'design';

		const buttonColorEl = document.getElementById('customize-control-responsive_add_to_cart_button_color');
		if (buttonColorEl) {
			buttonColorEl.style.display = shouldShow ? 'block' : 'none';
		}

		if (borderWidthEl) {
			borderWidthEl.style.display = shouldShow ? 'block' : 'none';
		}
		if (borderColorEl) {
			borderColorEl.style.display = shouldShow ? 'block' : 'none';
		}
		if (borderRadiusEl) {
			borderRadiusEl.style.display = shouldShow ? 'block' : 'none';
		}

		const shadowControlIds = [
			'customize-control-responsive_add_to_cart_button_shadow_separator',
			'customize-control-responsive_add_to_cart_button_shadow',
			'customize-control-responsive_add_to_cart_button_shadow_color',
			'customize-control-responsive_add_to_cart_button_hover_shadow_separator',
			'customize-control-responsive_add_to_cart_button_hover_shadow',
			'customize-control-responsive_add_to_cart_button_hover_shadow_color',
		];
		shadowControlIds.forEach(function(id) {
			const el = document.getElementById(id);
			if (el) {
				el.style.display = shouldShow ? 'block' : 'none';
			}
		});

		if (borderStyleEl) {
			if (!shouldShow) {
				borderStyleEl.style.display = 'none';
			} else {
				const widthKeys = [
					'responsive_add_to_cart_button_border_width_top_border',
					'responsive_add_to_cart_button_border_width_right_border',
					'responsive_add_to_cart_button_border_width_bottom_border',
					'responsive_add_to_cart_button_border_width_left_border',
					'responsive_add_to_cart_button_border_width_tablet_top_border',
					'responsive_add_to_cart_button_border_width_tablet_right_border',
					'responsive_add_to_cart_button_border_width_tablet_bottom_border',
					'responsive_add_to_cart_button_border_width_tablet_left_border',
					'responsive_add_to_cart_button_border_width_mobile_top_border',
					'responsive_add_to_cart_button_border_width_mobile_right_border',
					'responsive_add_to_cart_button_border_width_mobile_bottom_border',
					'responsive_add_to_cart_button_border_width_mobile_left_border',
				];
				const hasWidth = widthKeys.some(function(key) {
					const s = api(key);
					return s && parseFloat(s.get()) > 0;
				});
				borderStyleEl.style.display = hasWidth ? 'block' : 'none';
			}
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
					<span>{general_label || __( 'General', 'responsive' )}</span>
			</a>
			<a
				type="#"
				className={`nav-tab responsive-component-tabs-button ${tab === 'design' ? 'nav-tab-active' : ''}`}
				id={design_id}
				onClick={() => onTabClick('design')}
				>
					<span>{design_label || __( 'Design', 'responsive' )}</span>
			</a>
		</div>
	</>;

};

TabsComponent.propTypes = {
	control: PropTypes.object.isRequired
};

export default React.memo(TabsComponent);
