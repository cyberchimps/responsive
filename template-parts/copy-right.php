<?php
global $responsive_options;
$responsive_options = responsive_get_options();
$cyberchimps_link   = '';
echo '<div class="footer-layouts copyright">';
if ( ! empty( $responsive_options['copyright_textbox'] ) ) {
	$copyright_text = $responsive_options['copyright_textbox'];
	esc_attr_e( ' &copy;', 'responsive' );
	echo esc_attr( gmdate( ' Y' ) );
	echo esc_attr( ' ' . $copyright_text, 'responsive' );
} else {
	esc_attr_e( '&copy;', 'responsive' );
	echo esc_attr( gmdate( 'Y' ) );
	esc_attr_e( ' ' . get_bloginfo(), 'responsive' );
}
if ( ! empty( $responsive_options['poweredby_link'] ) ) {
	$cyberchimps_link = $responsive_options['poweredby_link'];

} else {
	echo ' <div class="powered">';
	echo '<a href= "http://cyberchimps.com/" title=' . esc_attr_e( '|', 'responsive' ) . '> Powered by Responsive Theme</a>';
	echo '</div>';
}

echo '</div>';
