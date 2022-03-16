<?php

static $layout                = null;
const PRIMARY_NAV_MENU_SLUG   = 'primary';
const MOBILE_NAV_MENU_SLUG    = 'mobile';
const SECONDARY_NAV_MENU_SLUG = 'secondary';
const FOOTER_NAV_MENU_SLUG    = 'footer';
$has_sides                    = array();
$has_center                   = array();
$has_mobile_sides             = array();
$has_mobile_center            = array();

if ( get_option( 'is-header-footer-builder' ) ) {
	add_action( 'after_setup_theme', 'action_register_nav_menus' );
}
add_filter( 'nav_menu_item_title', 'filter_primary_nav_menu_dropdown_symbol', 10, 4 );
add_filter( 'walker_nav_menu_start_el', 'filter_mobile_nav_menu_dropdown_symbol', 10, 4 );
add_action( 'wp', 'check_for_fragment_support' );
add_filter( 'responsive_logo_url', 'responsive_filter_custom_logo_url' );

/**
 * Registers the navigation menus.
 */
function action_register_nav_menus() {
	register_nav_menus(
		array(
			PRIMARY_NAV_MENU_SLUG   => esc_html__( 'Primary', 'responsive' ),
			SECONDARY_NAV_MENU_SLUG => esc_html__( 'Secondary', 'responsive' ),
			MOBILE_NAV_MENU_SLUG    => esc_html__( 'Mobile', 'responsive' ),
			FOOTER_NAV_MENU_SLUG    => esc_html__( 'Footer', 'responsive' ),
		)
	);
}
/**
 * Main Call for Responsive Header
 */
function header_markup() {
	get_template_part( 'template-parts/header/base' );
}
/**
 * Header Row Class.
 *
 * @param string $row the header row.
 */
function header_row_class( $row ) {
	$classes = 'site-' . esc_attr( $row ) . '-header-wrap site-header-row-container site-header-focus-item site-header-row-layout-' . esc_attr( get_theme_mod( 'responsive_header_' . $row . '_layout', 'standard' ) ) . esc_attr( get_theme_mod( 'header_sticky', 0 ) === $row ? ' responsive-sticky-header' : '' );
	return apply_filters( 'responsive-header-row-class-string', $classes );
}

/**
 * Get other templates assing attributes and including the file.
 *
 * @param string $slug The slug name for the generic template.
 * @param string $name The name of the specialised template.
 * @param array  $args          Arguments. (default: array).
 */
function get_other_template( $slug, $name = null, $args = array() ) {

	/**
	 * Pass custom variables to the template file.
	 */
	foreach ( (array) $args as $key => $value ) {
		set_query_var( $key, $value );
	}

	return get_template_part( $slug, $name );
}

/**
 * Adds support to render header columns.
 *
 * @param string $row the name of the row.
 */
function display_header_row( $row = 'main' ) {
	$display = false;
	foreach ( array( 'left', 'center', 'right' ) as $column ) {
		$elements = get_theme_mod( 'header_desktop_items', Responsive\Core\get_responsive_customizer_defaults( 'header_desktop_items' ) );
		if ( isset( $elements ) && isset( $elements[ $row ] ) && isset( $elements[ $row ][ $row . '_' . $column ] ) && is_array( $elements[ $row ][ $row . '_' . $column ] ) && ! empty( $elements[ $row ][ $row . '_' . $column ] ) ) {
			$display = true;
			break;
		}
	}
	return $display;
}


/**
 * Header Top Row
 */
function top_header() {
	if ( display_header_row( 'top' ) ) {
		get_other_template( 'template-parts/header/header', 'row', array( 'row' => 'top' ) );
	}
}

/**
 * Header Main Row
 */
function main_header() {
	if ( display_header_row( 'main' ) ) {
		get_other_template( 'template-parts/header/header', 'row', array( 'row' => 'main' ) );
	}
}

/**
 * Header Bottom Row
 */
function bottom_header() {
	if ( display_header_row( 'bottom' ) ) {
		get_other_template( 'template-parts/header/header', 'row', array( 'row' => 'bottom' ) );
	}
}

/**
 * Adds support to render header columns.
 *
 * @param string $row the name of the row.
 * @param string $column the name of the column.
 * @param string $header the name of the header.
 */
function render_header( $row = 'main', $column = 'left', $header = 'desktop' ) {
	$elements = get_theme_mod( 'header_' . $header . '_items', Responsive\Core\get_responsive_customizer_defaults( 'header_' . $header . '_items' ) );
	if ( isset( $elements ) && isset( $elements[ $row ] ) && isset( $elements[ $row ][ $row . '_' . $column ] ) && is_array( $elements[ $row ][ $row . '_' . $column ] ) && ! empty( $elements[ $row ][ $row . '_' . $column ] ) ) {
		foreach ( $elements[ $row ][ $row . '_' . $column ] as $key => $item ) {
			$template = apply_filters( 'responsive_header_elements_template_path', 'template-parts/header/' . $item, $item, $row, $column );
			get_template_part( $template );
		}
	}
}

/**
 * Header Column
 *
 * @param string $row the column row.
 * @param string $column the row column.
 */
function header_column( $row, $column ) {
	render_header( $row, $column );
}

/**
 * Mobile Header
 */
function mobile_header() {
	get_template_part( 'template-parts/header/mobile' );
}

/**
 * Adds support to render header columns.
 *
 * @param string $row the name of the row.
 */
function display_mobile_header_row( $row = 'main' ) {
	$display = false;
	foreach ( array( 'left', 'center', 'right' ) as $column ) {
		$elements = get_theme_mod( 'header_mobile_items', Responsive\Core\get_responsive_customizer_defaults( 'header_mobile_items' ) );
		if ( isset( $elements ) && isset( $elements[ $row ] ) && isset( $elements[ $row ][ $row . '_' . $column ] ) && is_array( $elements[ $row ][ $row . '_' . $column ] ) && ! empty( $elements[ $row ][ $row . '_' . $column ] ) ) {
			$display = true;
			break;
		}
	}
	return $display;
}

/**
 * Mobile Header Top Row
 */
function mobile_top_header() {
	if ( display_mobile_header_row( 'top' ) ) {
		get_other_template( 'template-parts/header/mobile-header', 'row', array( 'mobile_row' => 'top' ) );
	}
}

/**
 * Mobile Header Main Row
 */
function mobile_main_header() {
	if ( display_mobile_header_row( 'main' ) ) {
		get_other_template( 'template-parts/header/mobile-header', 'row', array( 'mobile_row' => 'main' ) );
	}
}

/**
 * Mobile Header Bottom Row
 */
function mobile_bottom_header() {
	if ( display_mobile_header_row( 'bottom' ) ) {
		get_other_template( 'template-parts/header/mobile-header', 'row', array( 'mobile_row' => 'bottom' ) );
	}
}

/**
 * Mobile Header Column
 *
 * @param string $row the header row.
 * @param string $column the row column.
 */
function mobile_header_column( $row, $column ) {
	render_header( $row, $column, 'mobile' );
}

/**
 * If in customizer output the quicklink.
 */
function customizer_quick_link() {
	if ( is_customize_preview() ) {
		?>
			<div class="customize-partial-edit-shortcut responsive-custom-partial-edit-shortcut">
				<button aria-label="<?php esc_attr_e( 'Click to edit this element.', 'responsive' ); ?>" title="<?php esc_attr_e( 'Click to edit this element.', 'responsive' ); ?>" class="customize-partial-edit-shortcut-button item-customizer-focus"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13.89 3.39l2.71 2.72c.46.46.42 1.24.03 1.64l-8.01 8.02-5.56 1.16 1.16-5.58s7.6-7.63 7.99-8.03c.39-.39 1.22-.39 1.68.07zm-2.73 2.79l-5.59 5.61 1.11 1.11 5.54-5.65zm-2.97 8.23l5.58-5.6-1.07-1.08-5.59 5.6z"></path></svg></button>
			</div>
			<?php
	}
}

/**
 * Output custom logo
 *
 * @param string $option_string the image option id string.
 * @param string $custom_class the image custom class.
 */
function render_custom_logo( $option_string = '', $custom_class = 'extra-custom-logo' ) {
	$html = '';
	if ( empty( $option_string ) ) {
		return;
	}
	$custom_logo_id = get_theme_mod( $option_string );

	// We have a logo. Logo is go.
	if ( $custom_logo_id ) {
		$custom_logo_attr = array(
			'class'   => 'custom-logo ' . $custom_class,
			'loading' => false,
		);

		/*
		* If the logo alt attribute is empty, get the site title and explicitly
		* pass it to the attributes used by wp_get_attachment_image().
		*/
		$image_alt = get_post_meta( $custom_logo_id, '_wp_attachment_image_alt', true );
		if ( empty( $image_alt ) ) {
			$custom_logo_attr['alt'] = get_bloginfo( 'name', 'display' );
		}
		$type = get_post_mime_type( $custom_logo_id );
		if ( isset( $type ) && 'image/svg+xml' === $type ) {
			$custom_logo_attr['class'] = 'custom-logo ' . $custom_class . ' svg-logo-image';
		}

		/*
		* If the alt attribute is not empty, there's no need to explicitly pass
		* it because wp_get_attachment_image() already adds the alt attribute.
		*/
		$html = wp_get_attachment_image( $custom_logo_id, 'full', false, $custom_logo_attr );
	} elseif ( is_customize_preview() ) {
		// If no logo is set but we're in the Customizer, leave a placeholder (needed for the live preview).
		$html = '<img class="custom-logo"/></a>';
	}
	/**
	 * Filters the custom logo output.
	 *
	 * @param string $html    Custom logo HTML output.
	 * @param string $option_string the ID of the logo option.
	 */
	echo apply_filters( 'responsive_extra_custom_logo', $html, $option_string ); /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */
}

/**
 * Desktop Site Branding
 */
function site_branding() {
	$layout   = array(
		'include' => array(
			'mobile'  => get_theme_mod( 'responsive_mobile_logo_layout_include', 'logo' ),
			'tablet'  => get_theme_mod( 'responsive_tablet_logo_layout_include', 'logo' ),
			'desktop' => get_theme_mod( 'responsive_desktop_logo_layout_include', 'logo_title' ),
		),
		'layout'  => array(
			'mobile'  => get_theme_mod( 'responsive_mobile_logo_layout_structure', 'standard' ),
			'tablet'  => get_theme_mod( 'responsive_tablet_logo_layout_structure', 'standard' ),
			'desktop' => get_theme_mod( 'responsive_desktop_logo_layout_structure', 'standard' ),
		),
	);
	$includes = array();
	$layouts  = array();
	if ( is_array( $layout ) && isset( $layout['include'] ) ) {
		if ( isset( $layout['layout'] ) ) {
			if ( isset( $layout['layout']['desktop'] ) && ! empty( $layout['layout']['desktop'] ) ) {
				$layouts['desktop'] = $layout['layout']['desktop'];
			}
		}
		if ( isset( $layout['include']['desktop'] ) && ! empty( $layout['include']['desktop'] ) ) {
			if ( strpos( $layout['include']['desktop'], 'logo' ) !== false ) {
				if ( ! in_array( 'logo', $includes, true ) ) {
					$includes[] = 'logo';
				}
			}
			if ( strpos( $layout['include']['desktop'], 'title' ) !== false ) {
				if ( ! in_array( 'title', $includes, true ) ) {
					$includes[] = 'title';
				}
			}
			if ( strpos( $layout['include']['desktop'], 'tagline' ) !== false ) {
				if ( ! in_array( 'tagline', $includes, true ) ) {
					$includes[] = 'tagline';
				}
			}
		}
	}
	$layout_slug = isset( $layouts['desktop'] ) ? $layouts['desktop'] : 'standard';
	if ( 'title_logo' === $layout_slug || 'title_tag_logo' === $layout_slug ) {
		$layout_class = 'standard-reverse';
	} elseif ( 'top_logo_title' === $layout_slug || 'top_logo_title_tag' === $layout_slug ) {
		$layout_class = 'vertical';
	} elseif ( 'top_title_logo' === $layout_slug || 'top_title_tag_logo' === $layout_slug ) {
		$layout_class = 'vertical-reverse';
	} elseif ( 'top_title_logo_tag' === $layout_slug ) {
		$layout_class = 'vertical site-title-top';
	} elseif ( 'standard' === $layout_slug && ! in_array( 'title', $includes, true ) ) {
		$layout_class = 'standard site-brand-logo-only';
	} else {
		$layout_class = 'standard';
	}

	echo '<div class="site-branding branding-layout-' . esc_attr( $layout_class ) . '">';
	customizer_quick_link();
	echo '<a class="brand' . ( in_array( 'logo', $includes, true ) && get_theme_mod( 'custom_logo' ) ? ' has-logo-image' : '' ) . ( in_array( 'logo', $includes, true ) && 'no' !== get_theme_mod( 'header_sticky' ) && get_theme_mod( 'header_sticky_custom_logo' ) && get_theme_mod( 'header_sticky_logo' ) ? ' has-sticky-logo' : '' ) . '" href="' . esc_url( apply_filters( 'responsive_logo_url', home_url( '/' ) ) ) . '" rel="home" aria-label="' . esc_attr( get_bloginfo( 'name' ) ) . '">';
	foreach ( $includes as $include ) {
		switch ( $include ) {
			case 'logo':
				do_action( 'before_responsive_logo_output' );
				if ( /* responsive()->desk_transparent_header() && */ get_theme_mod( 'transparent_header_custom_logo' ) && get_theme_mod( 'transparent_header_logo' ) ) {
					render_custom_logo( 'transparent_header_logo', 'responsive-transparent-logo' );
				} else {
					custom_logo();
				}
				if ( 'no' !== get_theme_mod( 'header_sticky' ) && get_theme_mod( 'header_sticky_custom_logo' ) && get_theme_mod( 'header_sticky_logo' ) ) {
					render_custom_logo( 'header_sticky_logo', 'responsive-sticky-logo' );
				}
				break;
			case 'title':
				echo '<div class="site-title-wrap">';
				echo '<p class="site-title">' . get_bloginfo( 'name' ) . '</p>'; /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */
				if ( in_array( 'tagline', $includes, true ) && ( ! isset( $layouts['desktop'] ) || ( isset( $layouts['desktop'] ) && 'top_title_logo_tag' !== $layouts['desktop'] ) ) ) {
					echo '<p class="site-description">' . get_bloginfo( 'description' ) . '</p>'; /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */
				}
				echo '</div>';
				break;
			case 'tagline':
				if ( isset( $layouts['desktop'] ) && 'top_title_logo_tag' === $layouts['desktop'] ) {
					echo '<p class="site-description">' . get_bloginfo( 'description' ) . '</p>'; /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */
				}
				break;
		}
	}
	echo '</a>';
	echo '</div>';
}
/**
 * Gets custom logo URL.
 *
 * @return URL String
 */
function responsive_filter_custom_logo_url(){
	return esc_url( get_theme_mod( 'responsive_custom_logo_url', home_url( '/' ) ) );
}
/**
 * Checks whether the primary navigation menu is active.
 *
 * @return bool True if the primary navigation menu is active, false otherwise.
 */
function is_primary_nav_menu_active() : bool {
	return (bool) has_nav_menu( PRIMARY_NAV_MENU_SLUG );
}

/**
 * Displays the primary navigation menu.
 *
 * @param array $args Optional. Array of arguments. See wp nav menu documentation for a list of supported arguments.
 */
function display_primary_nav_menu( array $args = array() ) {
	if ( ! isset( $args['container'] ) ) {
		$args['container'] = 'ul';
	}
	if ( ! isset( $args['sub_arrows'] ) ) {
		$args['sub_arrows'] = true;
	}
	if ( ! isset( $args['mega_support'] ) ) {
		$args['mega_support'] = true;
	}
	if ( ! isset( $args['addon_support'] ) ) {
		$args['addon_support'] = true;
	}
	if ( ! isset( $args['theme_location'] ) ) {
		$args['theme_location'] = PRIMARY_NAV_MENU_SLUG;
	}
	if ( ! isset( $args['menu_class'] ) ) {
		$args['menu_class'] = 'menu';
	}

	if ( ! isset( $args['menu_id'] ) ) {
		$args['menu_id'] = 'primary-menu';
	}

	$args['fallback_cb'] = 'responsive_fallback_menu';

	wp_nav_menu(
		array(
			'container'      => $args['container'],
			'sub_arrows'     => $args['sub_arrows'],
			'mega_support'   => $args['mega_support'],
			'addon_support'  => $args['addon_support'],
			'theme_location' => $args['theme_location'],
			'fallback_cb'    => $args['fallback_cb'],
			'menu_class'     => $args['menu_class'],
			'menu_id'        => $args['menu_id'],
		)
	);

}

/**
 * Changes the page menu classes.
 *
 * @param string $menu
 * @param array $args
 * @return void
 */
function change_page_menu_classes( $menu, $args ) {
	$menu = str_replace( 'page_item', 'menu-item', $menu );
	return $menu;
}

/**
 * Displays the fallback page navigation menu.
 *
 * @param array $args Optional. Array of arguments. See wp page menu documentation for a list of supported.
 */
function display_fallback_menu( array $args = array() ) {
	$latest   = new WP_Query(
		array(
			'post_type'      => 'page',
			'orderby'        => 'menu_order title',
			'order'          => 'ASC',
			'posts_per_page' => 5,
		)
	);
	$page_ids = wp_list_pluck( $latest->posts, 'ID' );
	$page_ids = implode( ',', $page_ids );

	$fallback_args = array(
		'depth'      => -1,
		'include'    => $page_ids,
		'show_home'  => false,
		'before'     => '',
		'after'      => '',
		'menu_id'    => 'primary-menu',
		'menu_class' => 'menu',
		'container'  => 'ul',
	);
	add_filter( 'wp_page_menu', 'change_page_menu_classes', 10, 2 );
	wp_page_menu( $fallback_args );
	remove_filter( 'wp_page_menu', 'change_page_menu_classes', 10, 2 );
}
	/**
	 * Adds a dropdown symbol to nav menu items with children.
	 *
	 * @param string   $title The menu item's title.
	 * @param object   $item  The current menu item usually a post object.
	 * @param stdClass $args  An object of wp_nav_menu arguments.
	 * @param int      $depth Depth of menu item. Used for padding.
	 */
function filter_primary_nav_menu_dropdown_symbol( $title, $item, $args, $depth ) {
	// Only for our primary and secondary menu location.
	if ( empty( $args->theme_location ) || ( PRIMARY_NAV_MENU_SLUG !== $args->theme_location && SECONDARY_NAV_MENU_SLUG !== $args->theme_location ) ) {
		return $title;
	}
	// This can still get called because menu location isn't always correct.
	if ( ! empty( $args->menu_id ) && 'mobile-menu' === $args->menu_id ) {
		return $title;
	}
	if ( ! isset( $args->sub_arrows ) || empty( $args->sub_arrows ) ) {
		return $title;
	}

	// Add the dropdown for items that have children.
	if ( ! empty( $item->classes ) && in_array( 'menu-item-has-children', $item->classes ) ) {
		$title = '<span class="nav-drop-title-wrap">' . $title . '<span class="dropdown-nav-toggle" aria-label="' . esc_attr__( 'Expand child menu', 'responsive' ) . '">' . get_icon( 'arrow-down' ) . '</span></span>';
	}

	return $title;
}

	/**
	 * Adds a dropdown symbol to nav menu items with children.
	 *
	 * @param string $item_output The menu item's starting HTML output.
	 * @param object $item        Menu item data object.
	 * @param int    $depth       Depth of menu item. Used for padding.
	 * @param object $args        An object of wp_nav_menu.
	 * @return string Modified nav menu HTML.
	 */
function filter_mobile_nav_menu_dropdown_symbol( $item_output, $item, $depth, $args ) {
	// Only for our Mobile menu location.
	if ( ! isset( $args->show_toggles ) || empty( $args->show_toggles ) ) {
		return $item_output;
	}

	// Add the dropdown for items that have children.
	if ( ! empty( $item->classes ) && in_array( 'menu-item-has-children', $item->classes ) ) {
		if ( is_amp() ) {
			return $item_output;
		}

		$menu_id              = ( isset( $args->menu_id ) && ! empty( $args->menu_id ) ? '#' . $args->menu_id : '.menu' );
		$toggle_target_string = $menu_id . ' .menu-item-' . $item->ID . ' > .sub-menu';
		$output               = '<div class="drawer-nav-drop-wrap">' . $item_output . '<button class="drawer-sub-toggle" data-toggle-duration="10" data-toggle-target="' . esc_attr( $toggle_target_string ) . '" aria-expanded="false"><span class="screen-reader-text">' . esc_html__( 'Expand child menu', 'responsive' ) . '</span>' . get_icon( 'arrow-down', '', false, false ) . '</button></div>';

		return $output;
	}
	return $item_output;
}

/**
 * Desktop Navigation
 */
function primary_navigation() {
	?>
	<nav id="site-navigation" class="main-navigation header-navigation nav--toggle-sub header-navigation-style-<?php echo esc_attr( get_theme_mod( 'responsive_primary_navigation_style', 'standard' ) ); ?> header-navigation-dropdown-animation-<?php echo esc_attr( get_theme_mod( 'responsive_primary_dropdown_navigation_reveal' ) ); ?>" role="navigation" aria-label="<?php esc_attr_e( 'Primary Navigation', 'responsive' ); ?>">
		<?php customizer_quick_link(); ?>
		<div class="primary-menu-container header-menu-container">
			<?php
			if ( is_primary_nav_menu_active() ) {
				display_primary_nav_menu( array( 'menu_id' => 'primary-menu' ) );
			} else {
				display_fallback_menu();
			}
			?>
		</div>
	</nav><!-- #site-navigation -->
	<?php
}

/**
 * Displays the Secondary navigation menu.
 *
 * @param array $args Optional. Array of arguments. See wp nav menu documentation for a list of supported arguments.
 */
function display_secondary_nav_menu( array $args = array() ) {
	if ( ! isset( $args['container'] ) ) {
		$args['container'] = 'ul';
	}
	if ( ! isset( $args['sub_arrows'] ) ) {
		$args['sub_arrows'] = true;
	}
	if ( ! isset( $args['mega_support'] ) ) {
		$args['mega_support'] = true;
	}
	if ( ! isset( $args['addon_support'] ) ) {
		$args['addon_support'] = true;
	}
	if ( ! isset( $args['theme_location'] ) ) {
		$args['theme_location'] = SECONDARY_NAV_MENU_SLUG;
	}
	if ( ! isset( $args['menu_class'] ) ) {
		$args['menu_class'] = 'menu';
	}

	if ( ! isset( $args['menu_id'] ) ) {
		$args['menu_id'] = 'secondary-menu';
	}
	$args['fallback_cb'] = 'responsive_fallback_menu';

	wp_nav_menu(
		array(
			'container'      => $args['container'],
			'sub_arrows'     => $args['sub_arrows'],
			'mega_support'   => $args['mega_support'],
			'addon_support'  => $args['addon_support'],
			'theme_location' => $args['theme_location'],
			'fallback_cb'    => $args['fallback_cb'],
			'menu_class'     => $args['menu_class'],
			'menu_id'        => $args['menu_id'],
		)
	);
}

/**
 * Check if secondary navigation is active.
 *
 * @return boolean
 */
function is_secondary_nav_menu_active() : bool {
	return (bool) has_nav_menu( SECONDARY_NAV_MENU_SLUG );
}

/**
 * Desktop Navigation
 */
function secondary_navigation() {
	?>
		<nav id="secondary-navigation" class="secondary-navigation main-navigation header-navigation nav--toggle-sub header-navigation-style-<?php echo esc_attr( get_theme_mod( 'responsive_secondary_navigation_style' ) ); ?> header-navigation-dropdown-animation-<?php echo esc_attr( get_theme_mod( 'responsive_secondary_dropdown_navigation_reveal' ) ); ?>" role="navigation" aria-label="<?php esc_attr_e( 'Secondary Navigation', 'responsive' ); ?>">
		<?php customizer_quick_link(); ?>
			<div class="secondary-menu-container header-menu-container">
			<?php
			if ( is_secondary_nav_menu_active() ) {
				display_secondary_nav_menu( array( 'menu_id' => 'secondary-menu' ) );
			} else {
				display_fallback_menu();
			}
			?>
			</div>
		</nav><!-- #secondary-navigation -->
		<?php
}

/**
 * Output custom logo
 *
 * @param integer $blog_id the site ID for multisites.
 */
function custom_logo( $blog_id = 0 ) {
	$html          = '';
	$switched_blog = false;

	if ( is_multisite() && ! empty( $blog_id ) && get_current_blog_id() !== (int) $blog_id ) {
		switch_to_blog( $blog_id );
		$switched_blog = true;
	}

	$custom_logo_id = get_theme_mod( 'custom_logo' );

	// We have a logo. Logo is go.
	if ( $custom_logo_id ) {
		$custom_logo_attr = array(
			'class'   => 'custom-logo',
			'loading' => false,
		);

		/*
		* If the logo alt attribute is empty, get the site title and explicitly
		* pass it to the attributes used by wp_get_attachment_image().
		*/
		$image_alt = get_post_meta( $custom_logo_id, '_wp_attachment_image_alt', true );
		if ( empty( $image_alt ) ) {
			$custom_logo_attr['alt'] = get_bloginfo( 'name', 'display' );
		}

		$type = get_post_mime_type( $custom_logo_id );
		if ( isset( $type ) && 'image/svg+xml' === $type ) {
			$custom_logo_attr['class'] = 'custom-logo svg-logo-image';
		}

		/*
		* If the alt attribute is not empty, there's no need to explicitly pass
		* it because wp_get_attachment_image() already adds the alt attribute.
		*/
		$html = wp_get_attachment_image( $custom_logo_id, 'full', false, $custom_logo_attr );
	} elseif ( is_customize_preview() ) {
		// If no logo is set but we're in the Customizer, leave a placeholder (needed for the live preview).
		$html = '<img class="custom-logo"/></a>';
	}

	if ( $switched_blog ) {
		restore_current_blog();
	}
	/**
	 * Filters the custom logo output.
	 *
	 * @since 4.5.0
	 * @since 4.6.0 Added the `$blog_id` parameter.
	 *
	 * @param string $html    Custom logo HTML output.
	 * @param int    $blog_id ID of the blog to get the custom logo for.
	 */
	echo apply_filters( 'responsive_custom_logo', $html, $blog_id ); /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */
}

/**
 * Mobile Site Branding
 */
function mobile_site_branding() {
	$layout   = array(
		'include' => array(
			'mobile'  => get_theme_mod( 'responsive_mobile_logo_layout_include', 'logo' ),
			'tablet'  => get_theme_mod( 'responsive_tablet_logo_layout_include', 'logo' ),
			'desktop' => get_theme_mod( 'responsive_desktop_logo_layout_include', 'logo_title' ),
		),
		'layout'  => array(
			'mobile'  => get_theme_mod( 'responsive_mobile_logo_layout_structure', 'standard' ),
			'tablet'  => get_theme_mod( 'responsive_tablet_logo_layout_structure', 'standard' ),
			'desktop' => get_theme_mod( 'responsive_desktop_logo_layout_structure', 'standard' ),
		),
	);
	$includes = array();
	$layouts  = array();
	if ( is_array( $layout ) && isset( $layout['include'] ) ) {
		foreach ( array( 'mobile', 'tablet', 'desktop' ) as $device ) {
			if ( isset( $layout['layout'] ) ) {
				if ( isset( $layout['layout'][ $device ] ) && ! empty( $layout['layout'][ $device ] ) ) {
					$layouts[ $device ] = $layout['layout'][ $device ];
				}
			}
			// if ( 'desktop' === $device && ! empty( $includes ) ) {
			// continue;
			// }
			if ( isset( $layout['include'][ $device ] ) && ! empty( $layout['include'][ $device ] ) ) {
				if ( strpos( $layout['include'][ $device ], 'logo' ) !== false ) {
					if ( ! in_array( 'logo', $includes, true ) ) {
						$includes[] = 'logo';
					}
				}
				if ( strpos( $layout['include'][ $device ], 'title' ) !== false ) {
					if ( ! in_array( 'title', $includes, true ) ) {
						$includes[] = 'title';
					}
				}
				if ( strpos( $layout['include'][ $device ], 'tagline' ) !== false ) {
					if ( ! in_array( 'tagline', $includes, true ) ) {
						$includes[] = 'tagline';
					}
				}
			}
		}
	}
	if ( isset( $layouts['tablet'] ) ) {
		if ( 'title_logo' === $layouts['tablet'] || 'title_tag_logo' === $layouts['tablet'] ) {
			$tab_layout_class = 'standard-reverse';
		} elseif ( 'top_logo_title' === $layouts['tablet'] || 'top_logo_title_tag' === $layouts['tablet'] ) {
			$tab_layout_class = 'vertical';
		} elseif ( 'top_title_logo' === $layouts['tablet'] || 'top_title_tag_logo' === $layouts['tablet'] ) {
			$tab_layout_class = 'vertical-reverse';
		} elseif ( 'top_title_logo_tag' === $layouts['tablet'] ) {
			$tab_layout_class = 'vertical site-title-top';
		} elseif ( 'standard' === $layouts['tablet'] && ! in_array( 'title', $includes, true ) ) {
			$tab_layout_class = 'standard site-brand-logo-only';
		} elseif ( 'standard' === $layouts['tablet'] ) {
			$tab_layout_class = 'standard';
		} else {
			if ( ! in_array( 'title', $includes, true ) ) {
				$tab_layout_class = 'inherit site-brand-logo-only';
			} else {
				$tab_layout_class = 'inherit';
			}
		}
	} else {
		if ( ! in_array( 'title', $includes, true ) ) {
			$tab_layout_class = 'inherit site-brand-logo-only';
		} else {
			$tab_layout_class = 'inherit';
		}
	}
	if ( isset( $layouts['mobile'] ) ) {
		if ( 'title_logo' === $layouts['mobile'] || 'title_tag_logo' === $layouts['mobile'] ) {
			$mobile_layout_class = 'standard-reverse';
		} elseif ( 'top_logo_title' === $layouts['mobile'] || 'top_logo_title_tag' === $layouts['mobile'] ) {
			$mobile_layout_class = 'vertical';
		} elseif ( 'top_title_logo' === $layouts['mobile'] || 'top_title_tag_logo' === $layouts['mobile'] ) {
			$mobile_layout_class = 'vertical-reverse';
		} elseif ( 'top_title_logo_tag' === $layouts['mobile'] ) {
			$mobile_layout_class = 'vertical site-title-top';
		} elseif ( 'standard' === $layouts['mobile'] && ! in_array( 'title', $includes, true ) ) {
			$mobile_layout_class = 'standard site-brand-logo-only';
		} elseif ( 'standard' === $layouts['mobile'] ) {
			$mobile_layout_class = 'standard';
		} else {
			$mobile_layout_class = 'inherit';
		}
	} else {
		$mobile_layout_class = 'inherit';
	}
	echo '<div class="site-branding mobile-site-branding branding-layout-' . esc_attr( isset( $layouts['desktop'] ) ? $layouts['desktop'] : 'standard' ) . ' branding-tablet-layout-' . esc_attr( $tab_layout_class ) . ' branding-mobile-layout-' . esc_attr( $mobile_layout_class ) . '">';
	echo '<a class="brand' . ( in_array( 'logo', $includes, true ) && get_theme_mod( 'custom_logo' ) ? ' has-logo-image' : '' ) . ( in_array( 'logo', $includes, true ) && 'no' !== get_theme_mod( 'mobile_header_sticky' ) && ( get_theme_mod( 'header_sticky_custom_mobile_logo' ) && get_theme_mod( 'header_sticky_mobile_logo' ) || get_theme_mod( 'header_sticky_custom_logo' ) && get_theme_mod( 'header_sticky_logo' ) ) ? ' has-sticky-logo' : '' ) . '" href="' . esc_url( apply_filters( 'responsive_logo_url', home_url( '/' ) ) ) . '" rel="home" aria-label="' . esc_attr( get_bloginfo( 'name' ) ) . '">';
	foreach ( $includes as $include ) {
		switch ( $include ) {
			case 'logo':
				do_action( 'before_responsive_mobile_logo_output' );
				if ( /* responsive()->mobile_transparent_header() && */ get_theme_mod( 'transparent_header_custom_mobile_logo' ) && get_theme_mod( 'transparent_header_mobile_logo' ) ) {
					render_custom_logo( 'transparent_header_mobile_logo', 'responsive-transparent-logo' );
				} elseif ( /* responsive()->mobile_transparent_header() && */ get_theme_mod( 'transparent_header_custom_logo' ) && get_theme_mod( 'transparent_header_logo' ) ) {
					render_custom_logo( 'transparent_header_logo', 'responsive-transparent-logo' );
				} else {
					if ( get_theme_mod( 'use_mobile_logo' ) && get_theme_mod( 'mobile_logo' ) ) {
						render_custom_logo( 'mobile_logo' );
					} else {
						custom_logo();
					}
				}
				if ( 'no' !== get_theme_mod( 'mobile_header_sticky' ) && get_theme_mod( 'header_sticky_custom_mobile_logo' ) && get_theme_mod( 'header_sticky_mobile_logo' ) ) {
					render_custom_logo( 'header_sticky_mobile_logo', 'responsive-sticky-logo' );
				} elseif ( 'no' !== get_theme_mod( 'mobile_header_sticky' ) && get_theme_mod( 'header_sticky_custom_logo' ) && get_theme_mod( 'header_sticky_logo' ) ) {
					render_custom_logo( 'header_sticky_logo', 'responsive-sticky-logo' );
				}
				break;
			case 'title':
				echo '<div class="site-title-wrap">';
				echo '<div class="site-title' . ( ! empty( $layout['include']['mobile'] ) && ( strpos( $layout['include']['mobile'], 'title' ) === false ) ? ' vs-sm-false' : '' ) . ( ( strpos( $layout['include']['tablet'], 'title' ) === false ) ? ' vs-md-false' : '' ) . '">' . get_bloginfo( 'name' ) . '</div>'; /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */
				if ( in_array( 'tagline', $includes, true ) && ( ! isset( $layouts['desktop'] ) || ( isset( $layouts['desktop'] ) && 'top_title_logo_tag' !== $layouts['desktop'] ) ) ) {
					echo '<div class="site-description' . ( ( strpos( $layout['include']['mobile'], 'tagline' ) === false ) ? ' vs-sm-false' : '' ) . ( ( strpos( $layout['include']['tablet'], 'tagline' ) === false ) ? ' vs-md-false' : '' ) . '">' . get_bloginfo( 'description' ) . '</div>'; /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */
				}
				echo '</div>';
				break;
			case 'tagline':
				if ( isset( $layouts['desktop'] ) && 'top_title_logo_tag' === $layouts['desktop'] ) {
					echo '<div class="site-description' . ( ( strpos( $layout['include']['mobile'], 'tagline' ) === false ) ? ' vs-sm-false' : '' ) . ( ( strpos( $layout['include']['tablet'], 'tagline' ) === false ) ? ' vs-md-false' : '' ) . '">' . get_bloginfo( 'description' ) . '</div>'; /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */
				}
				break;
		}
	}
	echo '</a>';
	echo '</div>';
}

/**
 * Determines whether this is an AMP response.
 *
 * Note that this must only be called after the parse_query action.
 *
 * @return bool Whether the AMP plugin is active and the current request is for an AMP endpoint.
 */
function is_amp() : bool {
	return function_exists( 'is_amp_endpoint' ) && is_amp_endpoint();
}


/**
 * Mobile Navigation Popup Toggle
 */
function navigation_popup_toggle() {
	add_action( 'wp_footer', 'navigation_popup' );
	?>
	<div class="mobile-toggle-open-container">
		<?php customizer_quick_link(); ?>
		<?php
		if ( is_amp() ) {
			?>
			<amp-state id="siteNavigationMenu">
				<script type="application/json">
					{
						"expanded": false
					}
				</script>
			</amp-state>
			<?php
		}
		?>
		<button id="mobile-toggle" class="menu-toggle-open drawer-toggle menu-toggle-style-<?php echo esc_attr( get_theme_mod( 'responsive_mobile_trigger_style', 'default' ) ); ?>" aria-label="<?php esc_attr_e( 'Open menu', 'responsive' ); ?>" data-toggle-target="#mobile-drawer" data-toggle-body-class="showing-popup-drawer-from-<?php echo esc_attr( 'sidepanel' === get_theme_mod( 'responsive_header_popup_layout', 'sidepanel' ) ? get_theme_mod( 'responsive_header_popup_side' ) : 'full' ); ?>" aria-expanded="false" data-set-focus=".menu-toggle-close"
			<?php
			if ( is_amp() ) {
				?>
				[class]=" siteNavigationMenu.expanded ? 'menu-toggle-open drawer-toggle menu-toggle-style-<?php echo esc_attr( get_theme_mod( 'responsive_mobile_trigger_style', 'default' ) ); ?> active' : 'menu-toggle-open drawer-toggle menu-toggle-style-<?php echo esc_attr( get_theme_mod( 'responsive_mobile_trigger_style', 'default' ) ); ?>' "
				on="tap:AMP.setState( { siteNavigationMenu: { expanded: ! siteNavigationMenu.expanded } } )"
				[aria-expanded]="siteNavigationMenu.expanded ? 'true' : 'false'"
				<?php
			}
			?>
		>
			<?php
			$label = get_theme_mod( 'responsive_mobile_trigger_label', '' );
			if ( ! empty( $label ) || is_customize_preview() ) {
				?>
				<span class="menu-toggle-label"><?php echo esc_html( $label ); ?></span>
				<?php
			}
			?>
			<span class="menu-toggle-icon"><?php popup_toggle(); ?></span>
		</button>
	</div>
	<?php
}
add_action( 'responsive_navigation_popup_toggle', 'navigation_popup_toggle' );
/**
 * Mobile Navigation Popup Toggle
 */
function popup_toggle() {
	$icon = get_theme_mod( 'responsive_mobile_trigger_icon', 'menu' );
	echo get_icon( $icon, '', false );
}

/**
 * Mobile Navigation Popup Toggle
 */
function navigation_popup() {
	?>
	<div id="mobile-drawer" class="popup-drawer popup-drawer-layout-<?php echo esc_attr( get_theme_mod( 'responsive_header_popup_layout', 'sidepanel' ) ); ?> popup-drawer-animation-<?php echo esc_attr( get_theme_mod( 'responsive_header_popup_animation' ) ); ?> popup-drawer-side-<?php echo esc_attr( get_theme_mod( 'responsive_header_popup_side' ) ); ?>" data-drawer-target-string="#mobile-drawer"
		<?php
		if ( is_amp() ) {
			?>
			[class]=" siteNavigationMenu.expanded ? 'popup-drawer popup-drawer-layout-<?php echo esc_attr( get_theme_mod( 'responsive_header_popup_layout', 'sidepanel' ) ); ?> popup-drawer-side-<?php echo esc_attr( get_theme_mod( 'responsive_header_popup_side' ) ); ?> show-drawer active' : 'popup-drawer popup-drawer-layout-<?php echo esc_attr( get_theme_mod( 'responsive_header_popup_layout', 'sidepanel' ) ); ?> popup-drawer-side-<?php echo esc_attr( get_theme_mod( 'responsive_header_popup_side' ) ); ?>' "
			<?php
		}
		?>
	>
		<div class="drawer-overlay" data-drawer-target-string="#mobile-drawer"></div>
		<div class="drawer-inner">
			<?php
			if ( 'fullwidth' === get_theme_mod( 'responsive_header_popup_layout', 'sidepanel' ) && 'slice' === get_theme_mod( 'responsive_header_popup_animation' ) ) {
				echo '<div class="pop-slice-background"><div class="pop-portion-bg"></div><div class="pop-portion-bg"></div><div class="pop-portion-bg"></div></div>';
			}
			?>
			<div class="drawer-header">
				<button class="menu-toggle-close drawer-toggle" aria-label="<?php esc_attr_e( 'Close menu', 'responsive' ); ?>"  data-toggle-target="#mobile-drawer" data-toggle-body-class="showing-popup-drawer-from-<?php echo esc_attr( 'sidepanel' === get_theme_mod( 'responsive_header_popup_layout', 'sidepanel' ) ? get_theme_mod( 'responsive_header_popup_side' ) : 'full' ); ?>" aria-expanded="false" data-set-focus=".menu-toggle-open"
				<?php
				if ( is_amp() ) {
					?>
						on="tap:AMP.setState( { siteNavigationMenu: { expanded: ! siteNavigationMenu.expanded } } )"
						[aria-expanded]="siteNavigationMenu.expanded ? 'true' : 'false'"
					<?php
				}
				?>
			>
					<span class="toggle-close-bar"></span>
					<span class="toggle-close-bar"></span>
				</button>
			</div>
			<div class="drawer-content mobile-drawer-content content-align-<?php echo esc_attr( get_theme_mod( 'responsive_header_popup_content_align' ) ); ?> content-valign-<?php echo esc_attr( get_theme_mod( 'responsive_header_popup_vertical_align' ) ); ?>">
				<?php do_action( 'responsive_before_mobile_navigation_popup' ); ?>
				<?php render_header( 'popup', 'content', 'mobile' ); ?>
				<?php do_action( 'responsive_after_mobile_navigation_popup' ); ?>
			</div>
		</div>
	</div>
	<?php
}

/**
 * Checks whether the mobile navigation menu is active.
 *
 * @return bool True if the mobile navigation menu is active, false otherwise.
 */
function is_mobile_nav_menu_active() : bool {
	return (bool) has_nav_menu( MOBILE_NAV_MENU_SLUG );
}
	/**
	 * Displays the primary navigation menu.
	 *
	 * @param array $args Optional. Array of arguments. See wp nav menu documentation for a list of supported arguments.
	 */
function display_mobile_nav_menu( array $args = array() ) {

	if ( ! isset( $args['container'] ) ) {
		$args['container'] = 'ul';
	}
	if ( ! isset( $args['addon_support'] ) ) {
		$args['addon_support'] = true;
	}
	if ( ! isset( $args['mega_support'] ) && apply_filters( 'responsive_mobile_allow_mega_support', true ) ) {
		$args['mega_support'] = true;
	}
	if ( ! isset( $args['show_toggles'] ) ) {
		$args['show_toggles'] = is_menu_collapsible();
	}
	if ( ! isset( $args['theme_location'] ) ) {
		$args['theme_location'] = MOBILE_NAV_MENU_SLUG;
	}
	if ( ! isset( $args['menu_class'] ) ) {
		$args['menu_class'] = 'menu';
	}
	if ( ! isset( $args['menu_id'] ) ) {
		$args['menu_id'] = 'mobile-menu';
	}
	$args['fallback_cb'] = 'responsive_fallback_menu';

	wp_nav_menu(
		array(
			'container'      => $args['container'],
			'show_toggles'   => $args['show_toggles'],
			'mega_support'   => $args['mega_support'],
			'addon_support'  => $args['addon_support'],
			'theme_location' => $args['theme_location'],
			'fallback_cb'    => $args['fallback_cb'],
			'menu_class'     => $args['menu_class'],
			'menu_id'        => $args['menu_id'],
		)
	);

}

/**
 * Mobile Navigation
 */
function mobile_navigation() {
	?>
	<nav id="mobile-site-navigation" class="mobile-navigation drawer-navigation drawer-navigation-parent-toggle-<?php echo esc_attr( get_theme_mod( 'responsive_mobile_navigation_parent_toggle' ) ? 'true' : 'false' ); ?>" role="navigation" aria-label="<?php esc_attr_e( 'Primary Mobile Navigation', 'responsive' ); ?>">
		<?php customizer_quick_link(); ?>
		<div class="mobile-menu-container drawer-menu-container">
			<?php
			if ( is_mobile_nav_menu_active() ) {
				display_mobile_nav_menu(
					array(
						'menu_id'    => 'mobile-menu',
						'menu_class' => ( get_theme_mod( 'responsive_mobile_navigation_collapse', true ) ? 'menu has-collapse-sub-nav' : 'menu' ),
					)
				);
			} elseif ( is_primary_nav_menu_active() ) {
				display_primary_nav_menu(
					array(
						'menu_id'      => 'mobile-menu',
						'menu_class'   => ( is_menu_collapsible() ? 'menu has-collapse-sub-nav' : 'menu' ),
						'show_toggles' => is_menu_collapsible(),
						'sub_arrows'   => false,
						'mega_support' => apply_filters(
							'responsive_mobile_allow_mega_support',
							true
						),
					)
				);
			} else {
				display_fallback_menu();
			}
			?>
		</div>
	</nav><!-- #site-navigation -->
	<?php
}

/**
 * Desktop HTML
 */
function header_html() {
	$content = get_theme_mod( 'responsive_header_html_content', '<p>Enter HTML here!</p>' );
	if ( $content || is_customize_preview() ) {
		$link_style = get_theme_mod( 'header_html_link_style' );
		$wpautop    = get_theme_mod( 'responsive_header_html_wpautop', 1 );
		echo '<div class="header-html inner-link-style-' . esc_attr( $link_style ) . '">';
		// customizer_quick_link();
		echo '<div class="header-html-inner">';
		if ( $wpautop ) {
			echo do_shortcode( wpautop( $content ) );
		} else {
			$array   = array(
				'<p>['    => '[',
				']</p>'   => ']',
				'<p></p>' => '',
				']<br />' => ']',
				'<br />[' => '[',
			);
			$content = strtr( $content, $array );
			echo do_shortcode( $content );
		}
		echo '</div>';
		echo '</div>';
	}
}

/**
 * Mobile HTML
 */
function mobile_html() {
	$content = get_theme_mod( 'responsive_mobile_html_content', '<p>Enter HTML here!</p>' );
	if ( $content || is_customize_preview() ) {
		$link_style = get_theme_mod( 'responsive_mobile_html_link_style' );
		$wpautop    = get_theme_mod( 'responsive_mobile_html_wpautop', 1 );
		echo '<div class="mobile-html inner-link-style-' . esc_attr( $link_style ) . '">';
		// customizer_quick_link();
		echo '<div class="mobile-html-inner">';
		if ( $wpautop ) {
			echo do_shortcode( wpautop( $content ) );
		} else {
			echo do_shortcode( $content );
		}
		echo '</div>';
		echo '</div>';
	}
}

/**
 * Desktop Button
 */
function header_button() {
	$label = get_theme_mod( 'responsive_header_button_label', 'Button' );
	if ( 'loggedin' === get_theme_mod( 'responsive_header_button_visibility' ) && ! is_user_logged_in() ) {
		return;
	}
	if ( 'loggedout' === get_theme_mod( 'responsive_header_button_visibility' ) && is_user_logged_in() ) {
		return;
	}
	if ( $label || is_customize_preview() ) {
		$wrap_classes   = array();
		$wrap_classes[] = 'header-button-wrap';
		if ( 'loggedin' === get_theme_mod( 'responsive_header_button_visibility' ) ) {
			$wrap_classes[] = 'vs-logged-out-false';
		}
		if ( 'loggedout' === get_theme_mod( 'responsive_header_button_visibility' ) ) {
			$wrap_classes[] = 'vs-logged-in-false';
		}
		echo '<div class="' . esc_attr( implode( ' ', $wrap_classes ) ) . '">';
		customizer_quick_link();
		echo '<div class="header-button-inner-wrap">';
		$rel = array();
		if ( get_theme_mod( 'responsive_header_button_target' ) ) {
			$rel[] = 'noopener';
			$rel[] = 'noreferrer';
		}
		if ( get_theme_mod( 'responsive_header_button_nofollow' ) ) {
			$rel[] = 'nofollow';
		}
		if ( get_theme_mod( 'responsive_header_button_sponsored' ) ) {
			$rel[] = 'sponsored';
		}
		$href = get_theme_mod( 'responsive_header_button_link' ) !== '' ? get_theme_mod( 'responsive_header_button_link' ) : '';
		echo '<a href="' . esc_attr( $href ) . '" target="' . esc_attr( get_theme_mod( 'responsive_header_button_target' ) ? '_blank' : '_self' ) . '"' . ( ! empty( $rel ) ? ' rel="' . esc_attr( implode( ' ', $rel ) ) . '"' : '' ) . ( ! empty( get_theme_mod( 'responsive_header_button_download' ) ) ? ' download' : '' ) . ' class="button header-button button-size-' . esc_attr( get_theme_mod( 'responsive_header_button_size' ) ) . ' button-style-' . esc_attr( get_theme_mod( 'responsive_header_button_style' ) ) . '">';
		echo esc_html( $label );
		echo '</a>';
		echo '</div>';
		echo '</div>';
	}
}

/**
 * Mobile Button
 */
function mobile_button() {
	$label = get_theme_mod( 'responsive_mobile_button_label', 'Button' );
	if ( 'loggedin' === get_theme_mod( 'responsive_mobile_button_visibility' ) && ! is_user_logged_in() ) {
		return;
	}
	if ( 'loggedout' === get_theme_mod( 'responsive_mobile_button_visibility' ) && is_user_logged_in() ) {
		return;
	}
	if ( $label || is_customize_preview() ) {
		$wrap_classes   = array();
		$wrap_classes[] = 'mobile-header-button-wrap';
		if ( 'loggedin' === get_theme_mod( 'responsive_mobile_button_visibility' ) ) {
			$wrap_classes[] = 'vs-logged-out-false';
		}
		if ( 'loggedout' === get_theme_mod( 'responsive_mobile_button_visibility' ) ) {
			$wrap_classes[] = 'vs-logged-in-false';
		}
		echo '<div class="' . esc_attr( implode( ' ', $wrap_classes ) ) . '">';
		customizer_quick_link();
		$rel = array();
		if ( get_theme_mod( 'responsive_mobile_button_target' ) ) {
			$rel[] = 'noopener';
			$rel[] = 'noreferrer';
		}
		if ( get_theme_mod( 'responsive_mobile_button_nofollow' ) ) {
			$rel[] = 'nofollow';
		}
		if ( get_theme_mod( 'responsive_mobile_button_sponsored' ) ) {
			$rel[] = 'sponsored';
		}
		$classes   = array();
		$classes[] = 'button';
		$classes[] = 'mobile-header-button';
		$classes[] = 'button-size-' . esc_attr( get_theme_mod( 'responsive_mobile_button_size' ) );
		$classes[] = 'button-style-' . esc_attr( get_theme_mod( 'responsive_mobile_button_style' ) );
		$href      = get_theme_mod( 'responsive_mobile_button_link' ) !== '' ? get_theme_mod( 'responsive_mobile_button_link' ) : '';
		echo '<div class="mobile-header-button-inner-wrap">';
		echo '<a href="' . esc_attr( $href ) . '" target="' . esc_attr( get_theme_mod( 'responsive_mobile_button_target' ) ? '_blank' : '_self' ) . '"' . ( ! empty( $rel ) ? ' rel="' . esc_attr( implode( ' ', $rel ) ) . '"' : '' ) . ' class="' . esc_attr( implode( ' ', $classes ) ) . '">';
		echo esc_html( $label );
		echo '</a>';
		echo '</div>';
		echo '</div>';
	}
}

/**
 * Desktop Cart
 */
function header_cart() {
	if ( class_exists( 'woocommerce' ) ) {
		$label      = get_theme_mod( 'responsive_header_cart_label', '' );
		$show_total = get_theme_mod( 'responsive_header_cart_show_total', true );
		$icon       = get_theme_mod( 'responsive_header_cart_icon', 'shopping-cart' );
		$dropdown   = 'header-navigation nav--toggle-sub header-navigation-dropdown-animation-' . esc_attr( get_theme_mod( 'responsive_primary_dropdown_navigation_reveal' ) );
		echo '<div class="header-cart-wrap responsive-header-cart' . ( 'dropdown' === get_theme_mod( 'responsive_header_cart_style', 'link' ) ? ' ' . esc_attr( $dropdown ) : '' ) . '">';
		customizer_quick_link();
		echo '<span class="header-cart-empty-check header-cart-is-empty-' . ( WC()->cart->get_cart_contents_count() > 0 ? 'false' : 'true' ) . '"></span>';
		echo '<div class="header-cart-inner-wrap cart-show-label-' . ( ! empty( $label ) ? 'true' : 'false' ) . ' cart-style-' . esc_attr( get_theme_mod( 'responsive_header_cart_style', 'link' ) ) . ( 'dropdown' === get_theme_mod( 'responsive_header_cart_style', 'link' ) ? ' header-menu-container' : '' ) . '">';
		if ( 'link' === get_theme_mod( 'responsive_header_cart_style', 'link' ) ) {
			echo '<a href="' . esc_url( wc_get_cart_url() ) . '"' . ( ! empty( $label ) ? '' : ' aria-label="' . esc_attr__( 'Shopping Cart', 'responsive' ) . '"' ) . ' class="header-cart-button">';
			if ( ! empty( $label ) || is_customize_preview() ) {
				?>
				<span class="header-cart-label"><?php echo esc_html( $label ); ?></span>
				<?php
			}
			echo get_icon( $icon, '', false );
			if ( $show_total ) {
				echo '<span class="header-cart-total header-cart-is-empty-' . ( WC()->cart->get_cart_contents_count() > 0 ? 'false' : 'true' ) . '">' . wp_kses_post( WC()->cart->get_cart_contents_count() ) . '</span>';
			}
			echo '</a>';
		} elseif ( 'slide' === get_theme_mod( 'responsive_header_cart_style', 'link' ) ) {
			add_action( 'wp_footer', 'cart_popup', 5 );
			echo '<button data-toggle-target="#cart-drawer"' . ( ! empty( $label ) ? '' : ' aria-label="' . esc_attr__( 'Shopping Cart', 'responsive' ) . '"' ) . ' class="drawer-toggle header-cart-button" data-toggle-body-class="showing-popup-drawer-from-' . esc_attr( get_theme_mod( 'header_mobile_cart_popup_side' ) ) . '" aria-expanded="false" data-set-focus=".cart-toggle-close">';
			if ( ! empty( $label ) || is_customize_preview() ) {
				?>
				<span class="header-cart-label"><?php echo esc_html( $label ); ?></span>
				<?php
			}
			echo get_icon( $icon, '', false );
			if ( $show_total ) {
				echo '<span class="header-cart-total header-cart-is-empty-' . ( WC()->cart->get_cart_contents_count() > 0 ? 'false' : 'true' ) . '">' . wp_kses_post( WC()->cart->get_cart_contents_count() ) . '</span>';
			}
			echo '</button>';
		} elseif ( 'dropdown' === get_theme_mod( 'responsive_header_cart_style', 'link' ) ) {
			echo '<ul id="cart-menu" class="menu woocommerce widget_shopping_cart">';
			echo '<li class="menu-item menu-item-has-children menu-item-responsive-cart responsive-menu-has-icon menu-item--has-toggle">';
			echo '<a href="' . esc_url( wc_get_cart_url() ) . '"' . ( ! empty( $label ) ? '' : ' aria-label="' . esc_attr__( 'Shopping Cart', 'responsive' ) . '"' ) . ' class="header-cart-button">';
			if ( ! empty( $label ) || is_customize_preview() ) {
				?>
				<span class="header-cart-label"><?php echo esc_html( $label ); ?></span>
				<?php
			}
			echo get_icon( $icon, '', false );
			if ( $show_total ) {
				echo '<span class="header-cart-total header-cart-is-empty-' . ( WC()->cart->get_cart_contents_count() > 0 ? 'false' : 'true' ) . '">' . wp_kses_post( WC()->cart->get_cart_contents_count() ) . '</span>';
			}
			echo '</a>';
			echo '<ul class="sub-menu">
			<li class="menu-item menu-item-responsive-cart-dropdown">
				<div class="responsive-mini-cart-refresh">';
					woocommerce_mini_cart();
				echo '</div>
			</li>
			</ul>
			</li>
			</ul>';
		}
		echo '</div>';
		echo '</div>';
	}
}

/**
 * Cart Popup Toggle
 */
function cart_popup() {
	?>
	<div id="cart-drawer" class="popup-drawer popup-drawer-layout-sidepanel popup-drawer-side-<?php echo esc_attr( get_theme_mod( 'responsive_header_cart_popup_side', 'right' ) ); ?> popup-mobile-drawer-side-<?php echo esc_attr( get_theme_mod( 'header_mobile_cart_popup_side', 'left' ) ); ?>" data-drawer-target-string="#cart-drawer">
		<div class="drawer-overlay" data-drawer-target-string="#cart-drawer"></div>
		<div class="drawer-inner">
			<div class="drawer-header">
				<h2 class="side-cart-header"><?php esc_html_e( 'Review Cart', 'responsive' ); ?></h2>
				<button class="cart-toggle-close drawer-toggle" aria-label="<?php esc_attr_e( 'Close Cart', 'responsive' ); ?>"  data-toggle-target="#cart-drawer" data-toggle-body-class="showing-popup-drawer-from-<?php echo esc_attr( get_theme_mod( 'header_mobile_cart_popup_side', 'left' ) ); ?>" aria-expanded="false" data-set-focus=".header-cart-button">
					<?php echo get_icon( 'close', '', false ); ?>
				</button>
			</div>
			<div class="drawer-content woocommerce widget_shopping_cart">
				<?php do_action( 'responsive_before_side_cart' ); ?>
				<div class="mini-cart-container">
					<div class="responsive-mini-cart-refresh">
						<?php woocommerce_mini_cart(); ?>
					</div>
				</div>
				<?php do_action( 'responsive-after-side-cart' ); ?>
			</div>
		</div>
	</div>
	<?php
}

/**
 * Desktop Cart
 */
function mobile_cart() {
	if ( class_exists( 'woocommerce' ) ) {
		$label      = get_theme_mod( 'responsive_header_mobile_cart_label', '' );
		$show_total = get_theme_mod( 'responsive_header_mobile_cart_show_total', true );
		$icon       = get_theme_mod( 'responsive_header_mobile_cart_icon', 'shopping-cart' );
		echo '<div class="header-mobile-cart-wrap responsive-header-cart">';
		customizer_quick_link();
		echo '<div class="header-cart-inner-wrap header-cart-is-empty-' . ( WC()->cart->get_cart_contents_count() > 0 ? 'true' : 'false' ) . ' cart-show-label-' . ( ! empty( $label ) ? 'true' : 'false' ) . ' cart-style-' . esc_attr( get_theme_mod( 'responsive_header_mobile_cart_style', 'link' ) ) . '">';
		if ( 'link' === get_theme_mod( 'responsive_header_mobile_cart_style', 'link' ) ) {
			echo '<a href="' . esc_url( wc_get_cart_url() ) . '"' . ( ! empty( $label ) ? '' : ' aria-label="' . esc_attr__( 'Shopping Cart', 'responsive' ) . '"' ) . ' class="header-cart-button">';
			if ( ! empty( $label ) || is_customize_preview() ) {
				?>
				<span class="header-cart-label"><?php echo esc_html( $label ); ?></span>
				<?php
			}
			echo get_icon( $icon, '', false );
			if ( $show_total ) {
				echo '<span class="header-cart-total">' . wp_kses_post( WC()->cart->get_cart_contents_count() ) . '</span>';
			}
			echo '</a>';
		} elseif ( 'slide' === get_theme_mod( 'responsive_header_mobile_cart_style', 'link' ) ) {
			add_action( 'wp_footer', 'cart_popup', 5 );
			echo '<button data-toggle-target="#cart-drawer"' . ( ! empty( $label ) ? '' : ' aria-label="' . esc_attr__( 'Shopping Cart', 'responsive' ) . '"' ) . ' class="drawer-toggle header-cart-button" data-toggle-body-class="showing-popup-drawer-from-' . esc_attr( get_theme_mod( 'header_mobile_cart_popup_side' ) ) . '" aria-expanded="false" data-set-focus=".cart-toggle-close">';
			if ( ! empty( $label ) || is_customize_preview() ) {
				?>
				<span class="header-cart-label"><?php echo esc_html( $label ); ?></span>
				<?php
			}
			echo get_icon( $icon, '', false );
			if ( $show_total ) {
				echo '<span class="header-cart-total">' . wp_kses_post( WC()->cart->get_cart_contents_count() ) . '</span>';
			}
			echo '</button>';
		}
		echo '</div>';
		echo '</div>';
	}
}

/**
 * Desktop Social
 */
function header_social() {
	$items             = get_theme_mod( 'header_social_items', 'items' );
	$show_label        = get_theme_mod( 'header_social_show_label' );
	$brand_colors      = get_theme_mod( 'header_social_brand' );
	$brand_color_class = '';
	if ( 'onhover' === $brand_colors ) {
		$brand_color_class = ' social-show-brand-hover';
	} elseif ( 'untilhover' === $brand_colors ) {
		$brand_color_class = ' social-show-brand-until';
	} elseif ( 'always' === $brand_colors ) {
		$brand_color_class = ' social-show-brand-always';
	}
	echo '<div class="header-social-wrap">';
	customizer_quick_link();
	echo '<div class="header-social-inner-wrap element-social-inner-wrap social-show-label-' . ( $show_label ? 'true' : 'false' ) . ' social-style-' . esc_attr( get_theme_mod( 'header_social_style' ) ) . esc_attr( $brand_color_class ) . '">';
	if ( is_array( $items ) && ! empty( $items ) ) {
		foreach ( $items as $item ) {
			if ( $item['enabled'] ) {
				$link = get_theme_mod( $item['id'] . '_link' );
				if ( 'phone' === $item['id'] ) {
					$link = 'tel:' . str_replace( 'tel:', '', $link );
				} elseif ( 'email' === $item['id'] ) {
					$link = str_replace( 'mailto:', '', $link );
					if ( is_email( $link ) ) {
						$link = 'mailto:' . $link;
					}
				}
				echo '<a href="' . esc_attr( $link ) . '"' . esc_attr( $show_label ? '' : ' aria-label="' . $item['label'] . '"' ) . ' ' . ( 'phone' === $item['id'] || 'email' === $item['id'] || apply_filters( 'responsive_social_link_target', false, $item ) ? '' : 'target="_blank" rel="noopener noreferrer"  ' ) . 'class="social-button header-social-item social-link-' . esc_attr( $item['id'] ) . esc_attr( 'image' === $item['source'] ? ' has-custom-image' : '' ) . '">';
				if ( 'image' === $item['source'] ) {
					if ( $item['imageid'] && wp_get_attachment_image( $item['imageid'], 'full', true ) ) {
						echo wp_get_attachment_image(
							$item['imageid'],
							'full',
							true,
							array(
								'class' => 'social-icon-image',
								'style' => 'max-width:' . esc_attr( $item['width'] ) . 'px',
							)
						);
					} elseif ( ! empty( $item['url'] ) ) {
						echo '<img src="' . esc_attr( $item['url'] ) . '" alt="' . esc_attr( $item['label'] ) . '" class="social-icon-image" style="max-width:' . esc_attr( $item['width'] ) . 'px"/>';
					}
				}
				else {
					echo get_icon( $item['icon'], '', false );
				}
				if ( $show_label ) {
					echo '<span class="social-label">' . esc_html( $item['label'] ) . '</span>';
				}
				echo '</a>';
			}
		}
	}
	echo '</div>';
	echo '</div>';
}

/**
 * Mobile Social
 */
function mobile_social() {
	$items             = get_theme_mod( 'header_mobile_social_items', 'items' );
	$show_label        = get_theme_mod( 'header_mobile_social_show_label' );
	$brand_colors      = get_theme_mod( 'header_mobile_social_brand' );
	$brand_color_class = '';
	if ( 'onhover' === $brand_colors ) {
		$brand_color_class = ' social-show-brand-hover';
	} elseif ( 'untilhover' === $brand_colors ) {
		$brand_color_class = ' social-show-brand-until';
	} elseif ( 'always' === $brand_colors ) {
		$brand_color_class = ' social-show-brand-always';
	}
	echo '<div class="header-mobile-social-wrap">';
	customizer_quick_link();
	echo '<div class="header-mobile-social-inner-wrap element-social-inner-wrap social-show-label-' . ( $show_label ? 'true' : 'false' ) . ' social-style-' . esc_attr( get_theme_mod( 'header_mobile_social_style' ) ) . esc_attr( $brand_color_class ) . '">';
	if ( is_array( $items ) && ! empty( $items ) ) {
		foreach ( $items as $item ) {
			if ( $item['enabled'] ) {
				$link = get_theme_mod( $item['id'] . '_link' );
				if ( 'phone' === $item['id'] ) {
					$link = 'tel:' . str_replace( 'tel:', '', $link );
				} elseif ( 'email' === $item['id'] ) {
					$link = str_replace( 'mailto:', '', $link );
					if ( is_email( $link ) ) {
						$link = 'mailto:' . $link;
					}
				}
				echo '<a href="' . esc_attr( $link ) . '"' . esc_attr( $show_label ? '' : ' aria-label="' . $item['label'] . '"' ) . ' ' . ( 'phone' === $item['id'] || 'email' === $item['id'] || apply_filters( 'responsive_social_link_target', false, $item ) ? '' : 'target="_blank" rel="noopener noreferrer"  ' ) . 'class="social-button header-social-item social-link-' . esc_attr( $item['id'] ) . esc_attr( 'image' === $item['source'] ? ' has-custom-image' : '' ) . '">';
				if ( 'image' === $item['source'] ) {
					if ( $item['imageid'] && wp_get_attachment_image( $item['imageid'], 'full', true ) ) {
						echo wp_get_attachment_image(
							$item['imageid'],
							'full',
							true,
							array(
								'class' => 'social-icon-image',
								'style' => 'max-width:' . esc_attr( $item['width'] ) . 'px',
							)
						);
					} elseif ( ! empty( $item['url'] ) ) {
						echo '<img src="' . esc_attr( $item['url'] ) . '" alt="' . esc_attr( $item['label'] ) . '" class="social-icon-image" style="max-width:' . esc_attr( $item['width'] ) . 'px"/>';
					}
				} else {
					get_theme_mod( $item['icon'], '', false );
				}
				if ( $show_label ) {
					echo '<span class="social-label">' . esc_html( $item['label'] ) . '</span>';
				}
				echo '</a>';
			}
		}
	}
	echo '</div>';
	echo '</div>';
}

/**
 * Header Search Popup Toggle
 */
function header_search() {
	add_action( 'wp_footer', 'search_modal', 20 );
	?>
	<div class="search-toggle-open-container">
		<?php customizer_quick_link(); ?>
		<?php
		if ( is_amp() ) {
			?>
			<amp-state id="siteSearchModal">
				<script type="application/json">
					{
						"expanded": false
					}
				</script>
			</amp-state>
			<?php
		}
		?>
		<button class="search-toggle-open drawer-toggle search-toggle-style-<?php echo esc_attr( get_theme_mod( 'responsive_header_search_style', 'default' ) ); ?>" aria-label="<?php esc_attr_e( 'View Search Form', 'responsive' ); ?>" data-toggle-target="#search-drawer" data-toggle-body-class="showing-popup-drawer-from-full" aria-expanded="false" data-set-focus="#search-drawer .search-field"
			<?php
			if ( is_amp() ) {
				?>
				[class]=" siteSearchModal.expanded ? 'search-toggle-open drawer-toggle search-toggle-style-<?php echo esc_attr( get_theme_mod( 'responsive_header_search_style', 'default' ) ); ?> active' : 'search-toggle-open drawer-toggle search-toggle-style-<?php echo esc_attr( get_theme_mod( 'responsive_header_search_style', 'default' ) ); ?>' "
				on="tap:AMP.setState( { siteSearchModal: { expanded: ! siteSearchModal.expanded } } )"
				[aria-expanded]="siteSearchModal.expanded ? 'true' : 'false'"
				<?php
			}
			?>
		>
			<?php
			$label = get_theme_mod( 'responsive_header_search_label', 'Search' );
			if ( ! empty( $label ) || is_customize_preview() ) {
				?>
				<span class="search-toggle-label vs-lg-<?php echo ( get_theme_mod( 'responsive_header_search_label_visiblity_desktop', true ) ? 'true' : 'false' ); ?> vs-md-<?php echo ( get_theme_mod( 'responsive_header_search_label_visiblity_tablet', false ) ? 'true' : 'false' ); ?> vs-sm-<?php echo ( get_theme_mod( 'responsive_header_search_label_visiblity_mobile', false ) ? 'true' : 'false' ); ?>"><?php echo esc_html( $label ); ?></span>
				<?php
			}
			?>
			<span class="search-toggle-icon"><?php search_toggle(); ?></span>
		</button>
	</div>
	<?php
}

/**
 * Search Popup Toggle Icon
 */
function search_toggle() {
	$icon = get_theme_mod( 'responsive_header_search_icon', 'search' );
	echo get_icon( $icon, '', false );
}

/**
 * Search Popup Modal
 */
function search_modal() {
	?>
	<div id="search-drawer" class="popup-drawer popup-drawer-layout-fullwidth" data-drawer-target-string="#search-drawer"
		<?php
		if ( is_amp() ) {
			?>
			[class]=" siteSearchModal.expanded ? 'popup-drawer popup-drawer-layout-fullwidth show-drawer active' : 'popup-drawer popup-drawer-layout-fullwidth' "
			<?php
		}
		?>
	>
		<div class="drawer-overlay" data-drawer-target-string="#search-drawer"></div>
		<div class="drawer-header">
				<button class="search-toggle-close drawer-toggle" aria-label="<?php esc_attr_e( 'Close search', 'responsive' ); ?>"  data-toggle-target="#search-drawer" data-toggle-body-class="showing-popup-drawer-from-full" aria-expanded="false" data-set-focus=".search-toggle-open"
					<?php
					if ( is_amp() ) {
						?>
						on="tap:AMP.setState( { siteSearchModal: { expanded: ! siteSearchModal.expanded } } )"
						[aria-expanded]="siteSearchModal.expanded ? 'true' : 'false'"
						<?php
					}
					?>
				>
					<?php echo get_icon( 'close', '', false ); ?>
				</button>
			</div>
		<div class="drawer-inner">
			<div class="drawer-content">
				<?php
				if ( class_exists( 'woocommerce' ) && get_theme_mod( 'responsive_header_search_woo', 0 ) ) {
					get_product_search_form();
				} else {
					get_search_form();
				}
				?>
			</div>
		</div>
	</div>
	<?php
}

/**
 * Adds a check to see if the side columns should run.
 *
 * @param string $row the name of the row.
 */
function has_side_columns( $row = 'main' ) {
	if ( isset( $has_sides[ $row ] ) ) {
		return $has_sides[ $row ];
	}
	$side     = false;
	$elements = get_theme_mod( 'header_desktop_items', Responsive\Core\get_responsive_customizer_defaults( 'header_desktop_items' ) );
	if ( isset( $elements ) && isset( $elements[ $row ] ) ) {
		if ( ( isset( $elements[ $row ][ $row . '_left' ] ) && is_array( $elements[ $row ][ $row . '_left' ] ) && ! empty( $elements[ $row ][ $row . '_left' ] ) ) || ( isset( $elements[ $row ][ $row . '_left_center' ] ) && is_array( $elements[ $row ][ $row . '_left_center' ] ) && ! empty( $elements[ $row ][ $row . '_left_center' ] ) ) || ( isset( $elements[ $row ][ $row . '_right_center' ] ) && is_array( $elements[ $row ][ $row . '_right_center' ] ) && ! empty( $elements[ $row ][ $row . '_right_center' ] ) ) || ( isset( $elements[ $row ][ $row . '_right' ] ) && is_array( $elements[ $row ][ $row . '_right' ] ) && ! empty( $elements[ $row ][ $row . '_right' ] ) ) ) {
			$side = true;
		}
	}
	$has_sides[ $row ] = $side;
	return $side;
}

/**
 * Adds a check to see if the center column should run.
 *
 * @param string $row the name of the row.
 */
function has_center_column( $row = 'main' ) {
	if ( isset( $has_center[ $row ] ) ) {
		return $has_center[ $row ];
	}
	$centre   = false;
	$elements = get_theme_mod( 'header_desktop_items', Responsive\Core\get_responsive_customizer_defaults( 'header_desktop_items' ) );
	if ( isset( $elements ) && isset( $elements[ $row ] ) && isset( $elements[ $row ][ $row . '_center' ] ) && is_array( $elements[ $row ][ $row . '_center' ] ) && ! empty( $elements[ $row ][ $row . '_center' ] ) ) {
		$centre = true;
	}
	$has_center[ $row ] = $centre;
	return $centre;
}

/**
 * Adds a check to see if the side columns should run.
 *
 * @param string $row the name of the row.
 */
function has_mobile_side_columns( $row = 'main' ) {
	if ( isset( $has_mobile_sides[ $row ] ) ) {
		return $has_mobile_sides[ $row ];
	}
	$has_mobile_side = false;
	$elements    = get_theme_mod( 'header_mobile_items', Responsive\Core\get_responsive_customizer_defaults( 'header_mobile_items' ) );
	if ( isset( $elements ) && isset( $elements[ $row ] ) ) {
		if ( ( isset( $elements[ $row ][ $row . '_left' ] ) && is_array( $elements[ $row ][ $row . '_left' ] ) && ! empty( $elements[ $row ][ $row . '_left' ] ) ) || ( isset( $elements[ $row ][ $row . '_left_center' ] ) && is_array( $elements[ $row ][ $row . '_left_center' ] ) && ! empty( $elements[ $row ][ $row . '_left_center' ] ) ) || ( isset( $elements[ $row ][ $row . '_right_center' ] ) && is_array( $elements[ $row ][ $row . '_right_center' ] ) && ! empty( $elements[ $row ][ $row . '_right_center' ] ) ) || ( isset( $elements[ $row ][ $row . '_right' ] ) && is_array( $elements[ $row ][ $row . '_right' ] ) && ! empty( $elements[ $row ][ $row . '_right' ] ) ) ) {
			$mobile_side = true;
		}
	}
	$has_mobile_sides[ $row ] = $mobile_side;
	return $mobile_side;
}

/**
 * Adds a check to see if the center column should run.
 *
 * @param string $row the name of the row.
 */
function has_mobile_center_column( $row = 'main' ) {
	if ( isset( $has_mobile_center[ $row ] ) ) {
		return $has_mobile_center[ $row ];
	}
	$mobile_centre = false;
	$elements      = get_theme_mod( 'header_mobile_items', Responsive\Core\get_responsive_customizer_defaults( 'header_mobile_items' ) );
	if ( isset( $elements ) && isset( $elements[ $row ] ) && isset( $elements[ $row ][ $row . '_center' ] ) && is_array( $elements[ $row ][ $row . '_center' ] ) && ! empty( $elements[ $row ][ $row . '_center' ] ) ) {
		$mobile_centre = true;
	}
	$has_mobile_center[ $row ] = $mobile_centre;
	return $mobile_centre;
}

/**
 * Checks to see if theme needs to hook into cart fragments.
 */
function check_for_fragment_support() {
	if ( cart_in_header() ) {
		add_filter( 'woocommerce_add_to_cart_fragments', 'get_refreshed_fragments_class' );
		if ( get_theme_mod( 'responsive_header_cart_show_total', true ) ) {
			add_filter( 'woocommerce_add_to_cart_fragments', 'get_refreshed_fragments_number' );
		}
		if ( 'slide' === get_theme_mod( 'responsive_header_cart_style', 'link' ) || 'slide' === get_theme_mod( 'responsive_header_mobile_cart_style', 'link' ) || 'dropdown' === get_theme_mod( 'responsive_header_cart_style', 'link' ) ) {
			add_filter( 'woocommerce_add_to_cart_fragments', 'get_refreshed_fragments_mini' );
		}
	}
}
/**
 * Refresh the cart for ajax adds.
 *
 * @param object $fragments the cart object.
 */
function get_refreshed_fragments_number( $fragments ) {
	// Get cart items.
	ob_start();

	?>
		<span class="header-cart-total header-cart-is-empty-<?php echo esc_attr( WC()->cart->get_cart_contents_count() > 0 ? 'false' : 'true' ); ?>"><?php echo wp_kses_post( WC()->cart->get_cart_contents_count() ); ?></span> 
		<?php

		$fragments['span.header-cart-total'] = ob_get_clean();

		return $fragments;

}
/**
 * Refresh the cart for ajax adds.
 *
 * @param object $fragments the cart object.
 */
function get_refreshed_fragments_class( $fragments ) {
	// Get cart items.
	ob_start();

	?>
		<span class="header-cart-empty-check header-cart-is-empty-<?php echo esc_attr( WC()->cart->get_cart_contents_count() > 0 ? 'false' : 'true' ); ?>"></span> 
		<?php

		$fragments['span.header-cart-empty-check'] = ob_get_clean();

		return $fragments;

}

	/**
	 * Refresh the cart for ajax adds.
	 *
	 * @param object $fragments the cart object.
	 */
function get_refreshed_fragments_mini( $fragments ) {
	// Get mini cart.
	ob_start();

	echo '<div class="responsive-mini-cart-refresh">';
	woocommerce_mini_cart();
	echo '</div>';
	$fragments['div.responsive-mini-cart-refresh'] = ob_get_clean();

	return $fragments;

}

	/**
	 * Checks to see if theme needs to hook into cart fragments.
	 */
function cart_in_header() {
	$in_header = false;
	$elements  = get_theme_mod( 'header_desktop_items',Responsive\Core\get_responsive_customizer_defaults( 'header_desktop_items' ) );
	if ( isset( $elements ) && is_array( $elements ) ) {
		foreach ( array( 'top', 'main', 'bottom' ) as $row ) {
			if ( isset( $elements[ $row ] ) && is_array( $elements[ $row ] ) ) {
				foreach ( array( 'left', 'left_center', 'center', 'right_center', 'right' ) as $column ) {
					if ( isset( $elements[ $row ][ $row . '_' . $column ] ) && is_array( $elements[ $row ][ $row . '_' . $column ] ) ) {
						if ( in_array( 'cart', $elements[ $row ][ $row . '_' . $column ], true ) ) {
							$in_header = true;
							break;
						}
					}
				}
			}
		}
	}
	return $in_header;
}
