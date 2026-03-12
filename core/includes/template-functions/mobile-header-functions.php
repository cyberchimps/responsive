<?php

// Exit if accessed directly.
if( ! defined( 'ABSPATH' ) ) {
    exit;
}

$has_sides                    = array();
$has_center                   = array();

/**
 * Main Call for Responsive Header
 */
function mobile_header_markup() {
	get_template_part( 'template-parts/mobile-header/base' );
}

/**
 * Header Row Class.
 *
 * @param string $row the header row.
 */
function mobile_header_row_class( $row ) {
	$classes = 'responsive-site-' . esc_attr( $row ) . '-mobile-header-wrap site-mobile-header-row-container site-mobile-header-focus-item' . esc_attr( get_theme_mod( 'header_sticky', 0 ) === $row ? ' responsive-sticky-header' : '' );
	return apply_filters( 'responsive-mobile-header-row-class-string', $classes );
}

/**
 * Mobile Header 
 */
function mobile_header()
{
	get_template_part( 'template-parts/mobile-header/base' );
}

/**
 * Mobile Header - Above Row
 */
function above_mobile_header()
{
	if( display_mobile_header_row( 'above' ) )
	{
		get_other_template( 'template-parts/mobile-header/mobile-header', 'row', array( 'row' => 'above' ) );
	}
}

/**
 * Mobile Header - Primary Row
 */
function primary_mobile_header()
{
	if( display_mobile_header_row( 'primary' ) )
	{
		get_other_template( 'template-parts/mobile-header/mobile-header', 'row', array( 'row' => 'primary' ) );
	}
}

/**
 * Mobile Header - Bottom Row
 */
function below_mobile_header()
{
	if( display_mobile_header_row( 'below' ) ) 
	{
		get_other_template( 'template-parts/mobile-header/mobile-header', 'row', array( 'row' => 'below' ) );
	}
}

/**
 * Mobile Header Column
 *
 * @param string $row the column row.
 * @param string $column the row column.
 */
function mobile_header_column( $row, $column ) {
	render_header( $row, $column, 'mobile_tablet');
}

/**
 * Adds support to render mobile header columns
 * 
 * @param string $row the name of the row
 */
function display_mobile_header_row( $row= 'primary' ) {
	$display = false; 
	foreach( array('left', 'left_center', 'center', 'right_center', 'right' ) as $column ) {
		$elements = get_theme_mod('responsive_header_mobile_tablet_items',
		Responsive\Core\get_responsive_customizer_defaults(
			'responsive_header_mobile_tablet_items'
		));
		if ( isset( $elements ) && isset( $elements[ $row ] ) && isset( $elements[ $row ][ $row . '_' . $column ] ) && is_array( $elements[ $row ][ $row . '_' . $column ] ) && ! empty( $elements[ $row ][ $row . '_' . $column ] ) ) {
			$display = true;
			break;
		}
	}
	return $display;
}

/**
 * Adds a check to see if the side columns should run.
 *
 * @param string $row the name of the row.
 */
function has_side_columns_mobile( $row = 'primary' ) {
	global $has_sides;
	if ( isset( $has_sides[ $row ] ) ) {
		return $has_sides[ $row ];
	}
	$side     = false;
	$elements = get_theme_mod( 'responsive_header_mobile_tablet_items', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_mobile_tablet_items' ) );
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
function has_center_column_mobile( $row = 'primary' ) {
	global $has_center;
	if ( isset( $has_center[ $row ] ) ) {
		return $has_center[ $row ];
	}
	$centre   = false;
	$elements = get_theme_mod( 'responsive_header_mobile_tablet_items', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_mobile_tablet_items' ) );
	if ( isset( $elements ) && isset( $elements[ $row ] ) && isset( $elements[ $row ][ $row . '_center' ] ) && is_array( $elements[ $row ][ $row . '_center' ] ) && ! empty( $elements[ $row ][ $row . '_center' ] ) ) {
		$centre = true;
	}
	$has_center[ $row ] = $centre;
	return $centre;
}

/**
 * Render off-canvas panel with menu if toggle button is present in mobile/tablet header
 * This should only be rendered inside the mobile header wrapper
 * Renders all elements from popup_content zone (Cart, Button, HTML, Header Widgets, Off Canvas Menu)
 */
function responsive_render_off_canvas_panel() {
	// Check if toggle button is present in mobile header builder
	$show_off_canvas = false;
	if ( function_exists( '\Responsive\Core\responsive_check_element_in_mobile_tablet_items' ) ) {
		$show_off_canvas = \Responsive\Core\responsive_check_element_in_mobile_tablet_items( 'toggle_button', 'header' );
	}
	
	// Only render if toggle button is present
	if ( $show_off_canvas ) {
		$mobile_menu_style = get_theme_mod( 'responsive_mobile_menu_style', 'dropdown' );
		$panel_class = 'responsive-off-canvas-panel responsive-off-canvas-panel-' . esc_attr( $mobile_menu_style );
		$dropdown_target = get_theme_mod( 'responsive_header_mobile_off_canvas_dropdown_target', 'icon' );
		
		// Get popup content elements
		$elements = get_theme_mod( 'responsive_header_mobile_tablet_items', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_mobile_tablet_items' ) );
		$popup_elements = array();
		if ( isset( $elements ) && isset( $elements['popup'] ) && isset( $elements['popup']['popup_content'] ) && is_array( $elements['popup']['popup_content'] ) && ! empty( $elements['popup']['popup_content'] ) ) {
			$popup_elements = $elements['popup']['popup_content'];
		}
		
		?>
		<div id="responsive-off-canvas-panel" class="<?php echo esc_attr( $panel_class ); ?>" aria-hidden="true" data-dropdown-target="<?php echo esc_attr( $dropdown_target ); ?>">
			<div class="responsive-off-canvas-panel-inner">
				<?php
				// Render all elements from popup_content zone
				if ( ! empty( $popup_elements ) ) {
					foreach ( $popup_elements as $key => $item ) {
						// Special handling for off_canvas_menu - use mobile-header template
						if ( 'off_canvas_menu' === $item ) {
							get_template_part( 'template-parts/mobile-header/off_canvas_navigation' );
						} else {
							// Use the same template path filter as header elements, passing 'mobile_tablet' as header type
							$template = apply_filters( 'responsive_header_elements_template_path', 'template-parts/header/' . $item, $item, 'popup', 'popup_content', 'mobile_tablet' );
							get_template_part( $template );
						}
					}
				}
				?>
			</div>
			<?php if ( 'fullscreen' === $mobile_menu_style || 'sidebar' === $mobile_menu_style ) : ?>
				<button class="responsive-off-canvas-panel-close" aria-label="<?php esc_attr_e( 'Close Menu', 'responsive' ); ?>">
					<i class="icon-times"></i>
				</button>
			<?php endif; ?>
		</div>
		<div class="responsive-off-canvas-overlay" aria-hidden="true"></div>
		<?php
	}
}
