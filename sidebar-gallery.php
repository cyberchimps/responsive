<?php
/**
 * Gallery Widget Template
 *
 * @file           sidebar-gallery.php
 * @package        Responsive
 * @author         CyberChimps
 * @copyright      2020 CyberChimps
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/responsive/sidebar-gallery.php
 * @link           http://codex.wordpress.org/Theme_Development#secondary_.28sidebar.php.29
 * @since          available since Release 1.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
Responsive\responsive_widgets_before(); // above widgets container hook. ?>
	<aside id="secondary" class="widget-area grid col-300 fit gallery-meta" role="complementary">
		<?php Responsive\responsive_widgets(); // above widgets hook. ?>
		<div class="widget-wrapper">

			<div class="widget-title"><h4><?php esc_html_e( 'Image Information', 'responsive' ); ?></h4></div>
			<ul>
				<?php
				$responsive_data = get_post_meta( $post->ID, '_wp_attachment_metadata', true );

				if ( is_array( $responsive_data ) ) {
					?>
					<span class="full-size"><?php esc_html_e( 'Full Size:', 'responsive' ); ?> <a href="<?php echo esc_url( wp_get_attachment_url( $post->ID ) ); ?>"><?php echo esc_attr( $responsive_data['width'] ) . '&#215;' . esc_attr( $responsive_data['height'] ); ?></a>px</span>

					<?php
					if ( is_array( $responsive_data['image_meta'] ) ) {
						?>
						<?php if ( $responsive_data['image_meta']['aperture'] ) { ?>
							<span class="aperture"><?php esc_html_e( 'Aperture: f&#47;', 'responsive' ); ?><?php echo esc_attr( $responsive_data['image_meta']['aperture'] ); ?></span>
						<?php } ?>

						<?php if ( $responsive_data['image_meta']['focal_length'] ) { ?>
							<span
								class="focal-length"><?php esc_html_e( 'Focal Length:', 'responsive' ); ?> <?php echo esc_attr( $responsive_data['image_meta']['focal_length'] ); ?><?php esc_html_e( 'mm', 'responsive' ); ?></span>
						<?php } ?>

						<?php if ( $responsive_data['image_meta']['iso'] ) { ?>
							<span class="iso"><?php esc_html_e( 'ISO:', 'responsive' ); ?> <?php echo esc_attr( $responsive_data['image_meta']['iso'] ); ?></span>
						<?php } ?>

						<?php if ( $responsive_data['image_meta']['shutter_speed'] ) { ?>
							<span class="shutter"><?php esc_html_e( 'Shutter:', 'responsive' ); ?>
								<?php
								if ( ( 1 / $responsive_data['image_meta']['shutter_speed'] ) > 1 ) {
									echo '1/';
									if ( number_format( ( 1 / esc_attr( $responsive_data['image_meta']['shutter_speed'] ) ), 1 ) == number_format( ( 1 / esc_attr( $responsive_data['image_meta']['shutter_speed'] ) ), 0 ) ) {
										echo number_format( ( 1 / esc_attr( $responsive_data['image_meta']['shutter_speed'] ) ), 0, '.', '' ) . ' ' . esc_html__( 'sec', 'responsive' );
									} else {
										echo number_format( ( 1 / esc_attr( $responsive_data['image_meta']['shutter_speed'] ) ), 1, '.', '' ) . ' ' . esc_html__( 'sec', 'responsive' );
									}
								} else {
									echo esc_attr( $responsive_data['image_meta']['shutter_speed'] ) . ' ' . esc_html__( 'sec', 'responsive' );
								}
								?>
								</span>
						<?php } ?>

						<?php if ( $responsive_data['image_meta']['camera'] ) { ?>
							<span class="camera"><?php esc_html_e( 'Camera:', 'responsive' ); ?> <?php echo esc_attr( $responsive_data['image_meta']['camera'] ); ?></span>
							<?php
						}
					}
				}
				?>
			</ul>

		</div><!-- end of .widget-wrapper -->
	</aside><!-- end of #secondary -->

<?php
if ( ! is_active_sidebar( 'gallery-widget' ) ) {
	return;
}
?>

<?php if ( is_active_sidebar( 'gallery-widget' ) ) : ?>

	<aside id="secondary" class="widget-area grid col-300 fit" role="complementary">

		<?php Responsive\responsive_widgets(); // above widgets hook. ?>

		<?php dynamic_sidebar( 'gallery-widget' ); ?>

		<?php Responsive\responsive_widgets_end(); // after widgets hook. ?>
	</aside><!-- end of #secondary -->
	<?php Responsive\responsive_widgets_after(); // after widgets container hook. ?>

<?php endif; ?>
