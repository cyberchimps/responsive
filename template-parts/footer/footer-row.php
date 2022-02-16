<?php
/**
 * Template part for displaying the a row of the footer
 *
 * @package responsive
 */

$row               = get_query_var( 'row' );
$desktop_contain   = get_theme_mod( 'responsive_footer_' . $row . '_contain', 'standard' );
$tablet_contain    = get_theme_mod( 'responsive_footer_tablet' . $row . '_contain', 'default' );
$mobile_contain    = get_theme_mod( 'responsive_footer_mobile' . $row . '_contain', 'default' );
$desktop_layout    = get_theme_mod( 'responsive_footer_' . $row . '_layout', 'equal' );
$tablet_layout     = get_theme_mod( 'responsive_footer_' . $row . '_layout', 'equal' );
$mobile_layout     = get_theme_mod( 'responsive_footer_' . $row . '_layout', 'row' );
$link_style        = get_theme_mod( 'responsive_footer_' . $row . '_link_style', 'plain' );
$columns           = absint( get_theme_mod( 'responsive_footer_' . $row . '_columns', 1 ) );
$desktop_direction = get_theme_mod( 'responsive_footer_' . $row . '_direction_desktop', 'row' );
$tablet_direction  = get_theme_mod( 'responsive_footer_' . $row . '_direction_tablet', '' );
$mobile_direction  = get_theme_mod( 'responsive_footer_' . $row . '_direction_mobile', 'column' );
$footer_collapse   = get_theme_mod( 'responsive_footer_' . $row . '_collapse', 'normal' );
$footer_link_style   = get_theme_mod( 'responsive_footer_' . $row . '_link_style', 'plain' );
$footer_html_link_style   = get_theme_mod( 'responsive_footer_html_link_style', 'normal' );

$i                 = 0;
?>
<div class="site-<?php echo esc_attr( $row ); ?>-footer-wrap site-footer-row-container site-footer-focus-item site-<?php echo esc_attr( $row ); ?>-footer-link-style-<?php echo esc_attr( $footer_link_style ); ?> site-footer-html-link-style-<?php echo esc_attr( $footer_html_link_style ); ?> site-footer-row-layout-<?php echo esc_attr( $desktop_contain ); ?> site-footer-row-tablet-layout-<?php echo esc_attr( $tablet_contain ); ?> site-footer-row-mobile-layout-<?php echo esc_attr( $mobile_contain ); ?>" data-section="responsive_customizer_footer_<?php echo esc_attr( $row ); ?>">
	<div class="site-footer-row-container-inner">
		<?php if ( is_customize_preview() ) { ?>
			<div class="customize-partial-edit-shortcut responsive-custom-partial-edit-shortcut">
				<button aria-label="<?php esc_attr_e( 'Click to edit this element.', 'responsive' ); ?>" title="<?php esc_attr_e( 'Click to edit this element.', 'responsive' ); ?>" class="customize-partial-edit-shortcut-button item-customizer-focus"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13.89 3.39l2.71 2.72c.46.46.42 1.24.03 1.64l-8.01 8.02-5.56 1.16 1.16-5.58s7.6-7.63 7.99-8.03c.39-.39 1.22-.39 1.68.07zm-2.73 2.79l-5.59 5.61 1.11 1.11 5.54-5.65zm-2.97 8.23l5.58-5.6-1.07-1.08-5.59 5.6z"></path></svg></button>
			</div>
		<?php } ?>
		<div class="site-container">
			<div class="site-<?php echo esc_attr( $row ); ?>-footer-inner-wrap site-footer-row site-footer-row-columns-<?php echo esc_attr( $columns ); ?> site-footer-row-column-layout-<?php echo esc_attr( $desktop_layout ); ?> site-footer-row-tablet-column-layout-<?php echo esc_attr( $tablet_layout ); ?> site-footer-row-mobile-column-layout-<?php echo esc_attr( $mobile_layout ); ?> ft-ro-dir-<?php echo esc_attr( $desktop_direction ); ?> ft-ro-collapse-<?php echo esc_attr( $footer_collapse ); ?> ft-ro-t-dir-<?php echo esc_attr( $tablet_direction ); ?> ft-ro-m-dir-<?php echo esc_attr( $mobile_direction ); ?> ft-ro-lstyle-<?php echo esc_attr( $link_style ); ?>">
				<?php

				while ( $i++ < $columns ) {
					?>
					<div class="site-footer-<?php echo esc_attr( $row ); ?>-section-<?php echo esc_attr( $i ); ?> site-footer-section footer-section-inner-items-<?php echo esc_attr( footer_column_item_count( $row, $i ) ); ?>">
						<?php
						/**
						 * Responsive Render Footer Column
						 *
						 * Hooked responsive\footer_column
						 */
						do_action( 'responsive_render_footer_column', $row, $i );
						?>
					</div>
					<?php
				}
				?>
			</div>
		</div>
	</div>
</div>
