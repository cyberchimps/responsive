<?php
global $responsive_options;
$responsive_options = responsive_get_options();
echo '<div class="footer-layouts copyright">';
if ( ! empty( $responsive_options['copyright_textbox'] ) ) {
	$copyright_text = $responsive_options['copyright_textbox'];
	esc_attr_e( '&copy;', 'responsive' );
	echo esc_attr( gmdate( 'Y' ) );
	echo esc_attr( ' ' . $copyright_text, 'responsive' );
} else {
	esc_attr_e( '&copy;', 'responsive' );
	echo esc_attr( gmdate( 'Y' ) );
	esc_attr_e( ' Responsive', 'responsive' );
}
if ( ! empty( $responsive_options['poweredby_link'] ) ) {
	$cyberchimps_link = $responsive_options['poweredby_link'];
}
if ( $cyberchimps_link ) {
	echo ' <div class="powered">';
	esc_attr_e( ' | Powered by', 'responsive' );
	echo '<a href=' . esc_url( 'http://cyberchimps.com/responsive-theme/' ) . ' title=' . esc_attr_e( ' Responsive Theme', 'responsive' ) . '></a>';

	echo '</div>';
}

	echo '</div>';

