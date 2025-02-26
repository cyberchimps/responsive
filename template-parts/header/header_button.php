<?php
/**
 * Template part for displaying the Header Button Modual.
 *
 * @package responsive
 */

if( ! defined('ABSPATH') ) {
    exit; // Exit if accessed directly.
}
?>
<div class="site-header-item site-header-focus-item" data-section="responsive_customizer_header_button">
	<div class="responsive-header-button-wrap">
		<div class="responsive-header-button-inner-wrap">
		<?php
			$href = get_theme_mod(
				'responsive_header_button_url',
				Responsive\Core\get_responsive_customizer_defaults('responsive_header_button_url')
			);

			// Determine target and rel attributes.
			$new_tab = get_theme_mod(
				'responsive_header_button_open_in_new_tab',
				Responsive\Core\get_responsive_customizer_defaults('responsive_header_button_open_in_new_tab')
			);
			$target = $new_tab ? 'target="_blank"' : 'target="_self"';
			$rel = array();
			if ( $new_tab ) {
				$rel[] = 'noopener';
				$rel[] = 'noreferrer';
			}

			// Append additional rel attributes.
			if (get_theme_mod('responsive_header_button_set_nofollow', Responsive\Core\get_responsive_customizer_defaults('responsive_header_button_set_nofollow'))) {
				$rel[] = 'nofollow';
			}
			if (get_theme_mod('responsive_header_button_set_sponsored', Responsive\Core\get_responsive_customizer_defaults('responsive_header_button_set_sponsored'))) {
				$rel[] = 'sponsored';
			}

			// Determine download attribute.
			$download = get_theme_mod('responsive_header_button_set_download', Responsive\Core\get_responsive_customizer_defaults('responsive_header_button_set_download')) ? 'download' : '';

			// Determine visibility.
			$header_button_visibility = get_theme_mod(
				'responsive_header_button_visibility',
				Responsive\Core\get_responsive_customizer_defaults('responsive_header_button_visibility')
			);
			$is_visible = (
				('logged-in' === $header_button_visibility && is_user_logged_in()) ||
				('logged-out' === $header_button_visibility && !is_user_logged_in()) ||
				('everyone' === $header_button_visibility)
			);

			$header_button_size = get_theme_mod( 'responsive_header_button_size', Responsive\Core\get_responsive_customizer_defaults( 'responsive_header_button_size' ) );

			$header_button_size_class = 'responsive-header-button-' . $header_button_size . '-size';

			$rel_display = ! empty( $rel ) ? ' rel="' . esc_attr( implode( ' ', $rel ) ) . '"' : '';

			if ($is_visible) {
				$button_label = get_theme_mod(
					'responsive_header_button_label',
					Responsive\Core\get_responsive_customizer_defaults('responsive_header_button_label')
				);
				?>
				<a 
					href="<?php echo $href; ?>" 
					<?php echo $target; ?> 
					<?php echo $rel_display; ?>
					<?php echo esc_attr( $download ); ?>  
					class="button responsive-header-button <?php echo esc_attr( $header_button_size_class ); ?>">
					<?php echo esc_html( $button_label, 'responsive' ); ?>
				</a>
				<?php
			}
		?>
		</div>
	</div>
</div><!-- data-section="header_button" -->