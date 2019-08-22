<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Theme options upgrade bar
 */
function responsive_upgrade_bar() {
	?>

	<!--  <div class="upgrade-callout">
		<p class="responsivepro-offer"><img src="<?php echo get_template_directory_uri(); ?>/core/includes/theme-options/images/chimp.png" alt="CyberChimps"/>
			<?php
			printf(
				__( '%1$s Such Free Themes By CyberChimps</span>', 'responsive' ),
				' <a href="https://cyberchimps.com/10-free-responsive-wordpress-themes/?utm_source=orgwpresponsive" target="_blank" title="CyberChimps Free Themes">Get More</a> '
			);
			?>
		</p>
		 <p class="responsivepro-offer">Get 30% off on Responsive Pro using Coupon Code RESPONSIVE30</p> -->

	<!--</div>-->
	<div class="updated">
		<p><?php esc_html_e( 'Looking for More Features?', 'responsive' ); ?></p>
		<p><?php esc_html_e( 'Check out <a href="https://cyberchimps.com/store/responsivepro/?utm_source=responsive2pro" target="_blank" title="Responsive Pro">Responsive Pro</a> & <a href="https://cyberchimps.com/product-category/upgradefromresponsive/?utm_source=responsive2pro" target="_blank" title="Responsive Pro">Premium Child Themes</a> for your Responsive Theme.', 'responsive' ); ?></p>
	</div>
	<?php
}

add_action( 'responsive_theme_options', 'responsive_upgrade_bar', 1 );

/**
 * Theme Options Support and Information
 */
function responsive_theme_support() {
	?>

	<div id="info-box-wrapper" class="grid col-940">
		<div class="info-box notice">

			<a class="button" href="<?php echo esc_url( 'http://cyberchimps.com/guides/r-free/' ); ?>" title="<?php esc_attr_e( 'Instructions', 'responsive' ); ?>" target="_blank">
				<?php esc_html_e( 'Instructions', 'responsive' ); ?></a>

			<a class="button" href="<?php echo esc_url( 'http://cyberchimps.com/forum/free/responsive/' ); ?>" title="<?php esc_attr_e( 'Help', 'responsive' ); ?>" target="_blank">
				<?php esc_html_e( 'Help', 'responsive' ); ?></a>


			<a class="button button-primary" href="<?php echo esc_url( 'https://wordpress.org/support/theme/responsive/reviews/#new-post/' ); ?>" title="<?php esc_attr_e( 'Leave a star rating', 'responsive' ); ?>" target="_blank">
				<?php esc_html_e( 'Leave a star rating', 'responsive' ); ?></a>

			<a class="button" href="<?php echo esc_url( 'https://cyberchimps.com/contact/' ); ?>" title="<?php esc_attr_e( 'Need Customization', 'responsive' ); ?>" target="_blank">
				<?php esc_html_e( 'Need Customization?', 'responsive' ); ?></a>

			<a class="button" href="<?php echo esc_url( 'https://cyberchimps.com/checkout/?add-to-cart=277804' ); ?>" title="<?php esc_attr_e( 'Theme Demo Data', 'responsive' ); ?>" target="_blank">
				<?php esc_html_e( 'Theme Demo Data', 'responsive' ); ?></a>
<a class="button" href="<?php echo esc_url( 'https://cyberchimps.com/store/responsivepro#whygopro' ); ?>" title="<?php esc_attr_e( 'Why Go Pro?', 'responsive' ); ?>" target="_blank">
				<?php esc_html_e( 'Why Go Pro?', 'responsive' ); ?></a>
		</div>
	</div>

	<?php
}

add_action( 'responsive_theme_options', 'responsive_theme_support', 2 );

/*
 * Add notification to Reading Settings page to notify if Custom Front Page is enabled.
 *
 * @since    1.9.4.0
 */
function responsive_front_page_reading_notice() {
	$screen             = get_current_screen();
	$responsive_options = responsive_get_options();
	if ( 'options-reading' == $screen->id ) {
		$html = '<div class="updated">';
		if ( 1 == $responsive_options['front_page'] ) {
			$html .= '<p>' . sprintf( __( 'The Custom Front Page is enabled. You can disable it in the <a href="%1$s">theme settings</a>.', 'responsive' ), admin_url( 'themes.php?page=theme_options' ) ) . '</p>';
		} else {
			$html .= '<p>' . sprintf( __( 'The Custom Front Page is disabled. You can enable it in the <a href="%1$s">theme settings</a>.', 'responsive' ), admin_url( 'themes.php?page=theme_options' ) ) . '</p>';
		}
		$html .= '</div>';
		echo $html;
	}
}

add_action( 'admin_notices', 'responsive_front_page_reading_notice' );
