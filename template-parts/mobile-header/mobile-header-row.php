<?php
/**
 * Template part for displaying the a row of the mobile header
 *
 * @package responsive
 */

namespace Responsive\Core;

$row = get_query_var( 'row' );
?>
<div class="<?php echo esc_attr( mobile_header_row_class( $row ) ); ?>" data-section="responsive_customizer_mobile_header_<?php echo esc_attr( $row ); ?>"
>
	<div class="site-mobile-header-row-container-inner">
		<div class="container">
			<div class="site-<?php echo esc_attr( $row ); ?>-mobile-header-inner-wrap site-mobile-header-row <?php echo ( has_side_columns_mobile( $row ) ? 'site-mobile-header-row-has-sides' : 'site-mobile-header-row-only-center-column' ); ?> <?php echo ( has_center_column_mobile( $row ) ? 'site-mobile-header-row-center-column' : 'site-mobile-header-row-no-center' ); ?>">
				<?php if ( has_side_columns_mobile( $row ) ) { ?>
					<div class="site-mobile-header-<?php echo esc_attr( $row ); ?>-section-left site-mobile-header-section site-mobile-header-section-left">
						<?php
						/**
						 * Responsive Render Header Column
						 *
						 * Hooked Responsive\header_column
						 */
						do_action( 'responsive_render_mobile_header_column', $row, 'left' );

						if ( has_center_column_mobile( $row ) ) {
							?>
							<div class="site-mobile-header-<?php echo esc_attr( $row ); ?>-section-left-center site-mobile-header-section site-mobile-header-section-left-center">
								<?php
								/**
								 * Responsive Render Header Column
								 *
								 * Hooked Responsive\header_column
								 */
								do_action( 'responsive_render_mobile_header_column', $row, 'left_center' );
								?>
							</div>
							<?php
						}
						?>
					</div>
				<?php } ?>
				<?php if ( has_center_column_mobile( $row ) ) { ?>
					<div class="site-mobile-header-<?php echo esc_attr( $row ); ?>-section-center site-mobile-header-section site-mobile-header-section-center">
						<?php
						/**
						 * Responsive Render Header Column
						 *
						 * Hooked Responsive\header_column
						 */
						do_action( 'responsive_render_mobile_header_column', $row, 'center' );
						?>
					</div>
				<?php } ?>
				<?php if ( has_side_columns_mobile( $row ) ) { ?>
					<div class="site-mobile-header-<?php echo esc_attr( $row ); ?>-section-right site-mobile-header-section site-mobile-header-section-right">
						<?php
						if ( has_center_column_mobile( $row ) ) {
							?>
							<div class="site-mobile-header-<?php echo esc_attr( $row ); ?>-section-right-center site-mobile-header-section site-mobile-header-section-right-center">
								<?php
								/**
								 * Responsive Render Header Column
								 *
								 * Hooked Responsive\header_column
								 */
								do_action( 'responsive_render_mobile_header_column', $row, 'right_center' );
								?>
							</div>
							<?php
						}
						/**
							 * Responsive Render Header Column
							 *
							 * Hooked Responsive\header_column
							 */
							do_action( 'responsive_render_mobile_header_column', $row, 'right' );
						?>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
