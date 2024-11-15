<?php
/**
 * Template part for displaying the a row of the header
 *
 * @package responsive
 */

namespace Responsive\Core;

$row = get_query_var( 'row' );
?>
<div class="<?php echo esc_attr( header_row_class( $row ) ); ?>" data-section="responsive_customizer_header_<?php echo esc_attr( $row ); ?>"
>
	<div class="site-header-row-container-inner">
		<div class="container">
			<div class="site-<?php echo esc_attr( $row ); ?>-header-inner-wrap site-header-row <?php echo ( has_side_columns( $row ) ? 'site-header-row-has-sides' : 'site-header-row-only-center-column' ); ?> <?php echo ( has_center_column( $row ) ? 'site-header-row-center-column' : 'site-header-row-no-center' ); ?>">
				<?php if ( has_side_columns( $row ) ) { ?>
					<div class="site-header-<?php echo esc_attr( $row ); ?>-section-left site-header-section site-header-section-left">
						<?php
						/**
						 * Responsive Render Header Column
						 *
						 * Hooked Responsive\header_column
						 */
						do_action( 'responsive_render_header_column', $row, 'left' );

						if ( has_center_column( $row ) ) {
							?>
							<div class="site-header-<?php echo esc_attr( $row ); ?>-section-left-center site-header-section site-header-section-left-center">
								<?php
								/**
								 * Responsive Render Header Column
								 *
								 * Hooked Responsive\header_column
								 */
								do_action( 'responsive_render_header_column', $row, 'left_center' );
								?>
							</div>
							<?php
						}
						?>
					</div>
				<?php } ?>
				<?php if ( has_center_column( $row ) ) { ?>
					<div class="site-header-<?php echo esc_attr( $row ); ?>-section-center site-header-section site-header-section-center">
						<?php
						/**
						 * Responsive Render Header Column
						 *
						 * Hooked Responsive\header_column
						 */
						do_action( 'responsive_render_header_column', $row, 'center' );
						?>
					</div>
				<?php } ?>
				<?php if ( has_side_columns( $row ) ) { ?>
					<div class="site-header-<?php echo esc_attr( $row ); ?>-section-right site-header-section site-header-section-right">
						<?php
						if ( has_center_column( $row ) ) {
							?>
							<div class="site-header-<?php echo esc_attr( $row ); ?>-section-right-center site-header-section site-header-section-right-center">
								<?php
								/**
								 * Responsive Render Header Column
								 *
								 * Hooked Responsive\header_column
								 */
								do_action( 'responsive_render_header_column', $row, 'right_center' );
								?>
							</div>
							<?php
						}
						/**
							 * Responsive Render Header Column
							 *
							 * Hooked Responsive\header_column
							 */
							do_action( 'responsive_render_header_column', $row, 'right' );
						?>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
