<?php
/**
 * Footer Template
 *
 * @file           copy-right.php
 * @package        Responsive
 */

global $responsive_options;
$responsive_options = Responsive\Core\responsive_get_options();
$cyberchimps_link   = '';
?>

<div class="footer-layouts copyright">
	<?php
	if ( ! empty( $responsive_options['copyright_textbox'] ) ) {
		esc_attr_e( ' &copy; ', 'responsive' );
		echo esc_attr( gmdate( ' Y' ) );
		echo esc_html( ' ' . $responsive_options['copyright_textbox'] );
	} else {
		esc_attr_e( '&copy; ', 'responsive' );
		echo esc_attr( gmdate( 'Y' ) );
	}
	if ( ! empty( $responsive_options['poweredby_link'] ) ) {
		$cyberchimps_link = $responsive_options['poweredby_link'];

	} else {
		?>
			<a href= "<?php echo esc_url( 'https://cyberchimps.com/' ); ?>"> <?php echo esc_html__( ' | Powered by Responsive Theme', 'responsive' ); ?></a>
	<?php } ?>
</div>
