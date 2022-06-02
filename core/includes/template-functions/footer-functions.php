<?php
/**
 * Calls in Templates using theme hooks.
 *
 * @package responsive
 */

// namespace responsive;

// defined( 'ABSPATH' ) || exit;

/**
 * Main Call for responsive footer
 */
function footer_markup() {
	get_template_part( 'template-parts/footer/base' );
}

/**
 * Checks to see if the row has any content.
 *
 * @param string $row the name of the row.
 * @return bool
 */
function display_footer_row( $row = 'bottom' ) {
	$display = false;
	foreach ( array( '1', '2', '3', '4', '5' ) as $column ) {
		$elements = get_theme_mod( 'footer_items', Responsive\Core\get_responsive_customizer_defaults( 'footer_items' ) );
		if ( isset( $elements ) && isset( $elements[ $row ] ) && isset( $elements[ $row ][ $row . '_' . $column ] ) && is_array( $elements[ $row ][ $row . '_' . $column ] ) && ! empty( $elements[ $row ][ $row . '_' . $column ] ) ) {
			$display = true;
			break;
		}
	}
	return $display;
}

/**
 * Adds support to render footer columns.
 *
 * @param string $row the name of the row.
 * @param string $column the name of the column.
 */
function render_footer( $row = 'bottom', $column = '1' ) {
	$elements = get_theme_mod( 'footer_items', Responsive\Core\get_responsive_customizer_defaults( 'footer_items' ) );
	if ( isset( $elements ) && isset( $elements[ $row ] ) && isset( $elements[ $row ][ $row . '_' . $column ] ) && is_array( $elements[ $row ][ $row . '_' . $column ] ) && ! empty( $elements[ $row ][ $row . '_' . $column ] ) ) {
		foreach ( $elements[ $row ][ $row . '_' . $column ] as $key => $item ) {
			$template = apply_filters( 'responsive_footer_elements_template_path', 'template-parts/footer/' . $item, $item, $row, $column );
			get_template_part( $template );
		}
	}
}

/**
 * Adds support to get the footer item count for a specific column.
 *
 * @param string $row the name of the row.
 * @param string $column the name of the column.
 */
function footer_column_item_count( $row = 'bottom', $column = '1' ) {
	$count    = 0;
	$elements = get_theme_mod( 'footer_items', Responsive\Core\get_responsive_customizer_defaults( 'footer_items' ) );
	if ( isset( $elements ) && isset( $elements[ $row ] ) && isset( $elements[ $row ][ $row . '_' . $column ] ) && is_array( $elements[ $row ][ $row . '_' . $column ] ) && ! empty( $elements[ $row ][ $row . '_' . $column ] ) ) {
		$count = count( $elements[ $row ][ $row . '_' . $column ] );
	}
	return $count;
}


/**
 * Footer Top Row
 */
function top_footer() {
	if ( display_footer_row( 'top' ) ) {
		get_other_template( 'template-parts/footer/footer', 'row', array( 'row' => 'top' ) );
	}
}

/**
 * Footer Middle Row
 */
function middle_footer() {
	if ( display_footer_row( 'middle' ) ) {
		get_other_template( 'template-parts/footer/footer', 'row', array( 'row' => 'middle' ) );
	}

}

/**
 * Footer Bottom Row
 */
function bottom_footer() {
	if ( display_footer_row( 'bottom' ) ) {
		get_other_template( 'template-parts/footer/footer', 'row', array( 'row' => 'bottom' ) );
	}
}

/**
 * Footer Column
 *
 * @param string $row the column row.
 * @param string $column the row column.
 */
function footer_column( $row, $column ) {
	render_footer( $row, $column );
}


/**
 * Footer HTML
 */
function footer_html() {
	$content = get_theme_mod( 'responsive_footer_html_content', '{copyright} {year} {site-title} {theme-credit}' );
	if ( $content || is_customize_preview() ) {
		$link_style = get_theme_mod( 'responsive_footer_html_link_style', 'normal' );
		echo '<div class="footer-html inner-link-style-' . esc_attr( $link_style ) . '">';
		echo '<div class="footer-html-inner">';
		$content = str_replace( '{copyright}', '&copy;', $content );
		$content = str_replace( '{year}', date_i18n( _x( 'Y', 'copyright date format; check date() on php.net', 'responsive' ) ), $content );
		$content = str_replace( '{site-title}', get_bloginfo( 'name' ), $content );
		// translators: %s is link to responsive WP.
		$content = str_replace( '{theme-credit}', sprintf( __( '- Powered by %s', 'responsive' ), '<a href="https://www.cyberchimps.com/" rel="nofollow noopener" target="_blank">Responsive Theme</a>' ), $content );
		echo do_shortcode( wpautop( $content ) );
		echo '</div>';
		echo '</div>';
	}
}
/**
 * Checks whether the footer navigation menu is active.
 *
 * @return bool True if the footer navigation menu is active, false otherwise.
 */
function is_footer_nav_menu_active() : bool {
	return (bool) has_nav_menu( FOOTER_NAV_MENU_SLUG );
}

/**
 * Displays the footer navigation menu.
 *
 * @param array $args Optional. Array of arguments. See wp nav menu documentation for a list of supported arguments.
 */
function display_footer_nav_menu( array $args = array() ) {
	if ( ! isset( $args['container'] ) ) {
		$args['container'] = 'ul';
	}
	if ( ! isset( $args['depth'] ) ) {
		$args['depth'] = 1;
	}
	if ( ! isset( $args['addon_support'] ) ) {
		$args['addon_support'] = true;
	}
	$args['theme_location'] = FOOTER_NAV_MENU_SLUG;

	$args['fallback_cb'] = 'responsive_fallback_menu';

	wp_nav_menu(
		array(
			'container'      => $args['container'],
			'depth'          => $args['depth'],
			'addon_support'  => $args['addon_support'],
			'theme_location' => $args['theme_location'],
			'fallback_cb'    => $args['fallback_cb'],
		)
	);
}


/**
 * Desktop Navigation
 */
function footer_navigation() {
	?>
	<nav id="footer-navigation" class="footer-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Navigation', 'responsive' ); ?>">
		<div class="footer-menu-container">
			<?php
			if ( is_footer_nav_menu_active() ) {
				display_footer_nav_menu( array( 'menu_id' => 'footer-menu' ) );
			} else {
				display_fallback_menu();
			}
			?>
		</div>
	</nav><!-- #footer-navigation -->
	<?php
}
