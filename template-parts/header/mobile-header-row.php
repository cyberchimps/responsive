<?php
/**
 * Template part for displaying a row of the mobile header
 *
 * @package responsive
 */


$row           = get_query_var( 'mobile_row' );
$tablet_layout = ( get_theme_mod( 'responsive_header_tablet_' . $row . '_layout' ) ? get_theme_mod( 'responsive_header_tablet_' . $row . '_layout' ) : 'default' );
$mobile_layout = ( get_theme_mod( 'responsive_header_mobile_' . $row . '_layout' ) ? get_theme_mod( 'responsive_header_mobile_' . $row . '_layout' ) : 'default' );
?>
<div class="site-<?php echo esc_attr( $row ); ?>-header-wrap site-header-focus-item site-header-row-layout-<?php echo esc_attr( get_theme_mod( 'responsive_header_desktop_' . $row . '_layout', 'standard' ) ); ?> site-header-row-tablet-layout-<?php echo esc_attr( $tablet_layout ); ?> site-header-row-mobile-layout-<?php echo esc_attr( $mobile_layout ); ?> <?php /* echo esc_attr( $row === get_theme_mod( 'mobile_header_sticky' ) ? ' responsive-sticky-header' : '' ); */ ?>"
<?php
/*
	If ( $row === 'main' && 'main' === get_theme_mod( 'mobile_header_sticky' ) ) {
		echo ' data-shrink="' . ( get_theme_mod( 'mobile_header_sticky_shrink' ) ? 'true' : 'false' ) . '"';
		echo ' data-reveal-scroll-up="' . ( get_theme_mod( 'mobile_header_reveal_scroll_up' ) ? 'true' : 'false' ) . '"';
		if ( get_theme_mod( 'mobile_header_sticky_shrink' ) ) {
			echo ' data-shrink-height="' . esc_attr( get_theme_mod( 'mobile_header_sticky_main_shrink', 'size' ) ) . '"';
		}
	}
*/
?>
>
	<div class="site-header-row-container-inner">
		<div class="site-container">
			<div class="site-<?php echo esc_attr( $row ); ?>-header-inner-wrap site-header-row <?php echo ( has_mobile_side_columns( $row ) ? 'site-header-row-has-sides' : 'site-header-row-only-center-column' ); ?> <?php echo ( has_mobile_center_column( $row ) ? 'site-header-row-center-column' : 'site-header-row-no-center' ); ?>">
				<?php if ( has_mobile_side_columns( $row ) ) { ?>
					<div class="site-header-<?php echo esc_attr( $row ); ?>-section-left site-header-section site-header-section-left">
						<?php
						/**
						 * Responsive Render Header Column
						 *
						 * Hooked Responsive\mobile_header_column
						 */
						do_action( 'responsive_render_mobile_header_column', $row, 'left' );

						if ( has_mobile_center_column( $row ) ) {
							/**
							 * Responsive Render Header Column
							 *
							 * Hooked Responsive\mobile_header_column
							 */
							do_action( 'responsive_render_mobile_header_column', $row, 'left_center' );
						}
						?>
					</div>
				<?php } ?>
				<?php if ( has_mobile_center_column( $row ) ) { ?>
					<div class="site-header-<?php echo esc_attr( $row ); ?>-section-center site-header-section site-header-section-center">
						<?php
						/**
						 * Responsive Render Header Column
						 *
						 * Hooked Responsive\mobile_header_column
						 */
						do_action( 'responsive_render_mobile_header_column', $row, 'center' );
						?>
					</div>
				<?php } ?>
				<?php if ( has_mobile_side_columns( $row ) ) { ?>
					<div class="site-header-<?php echo esc_attr( $row ); ?>-section-right site-header-section site-header-section-right">
						<?php
						if ( has_mobile_center_column( $row ) ) {
							/**
							 * Responsive Render Header Column
							 *
							 * Hooked Responsive\mobile_header_column
							 */
							do_action( 'responsive_render_mobile_header_column', $row, 'right_center' );
						}
						/**
							 * Responsive Render Header Column
							 *
							 * Hooked Responsive\mobile_header_column
							 */
							do_action( 'responsive_render_mobile_header_column', $row, 'right' );
						?>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
