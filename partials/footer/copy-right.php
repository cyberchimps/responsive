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
	if ( ! get_theme_mod( 'responsive_copyright_icon_and_year' ) ) {
		?>
		<span class="copyright_icon_and_year" >
			<?php
				esc_attr_e( ' &copy; ', 'responsive' );
				echo esc_attr( gmdate( ' Y' ) );
			?>
		</span>
		<?php
	}
	if ( ! empty( $responsive_options['copyright_textbox'] ) ) {
		echo esc_html( ' ' . $responsive_options['copyright_textbox'] );
	}
	if ( ! empty( $responsive_options['poweredby_link'] ) ) {
		$cyberchimps_link = $responsive_options['poweredby_link'];

	} else {
		?>
		<a href= "
		<?php
		echo apply_filters(
			'responsive_theme_footer_link',
			esc_url( 'https://cyberchimps.com/' )
		);
		?>
			">
			<?php
			echo apply_filters(
				'responsive_theme_footer_link_text',
				esc_html__( ' | Powered by Responsive Theme', 'responsive' )
			)
			?>
			</a>	<?php } ?>
</div>
