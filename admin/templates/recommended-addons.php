<?php
/**
 * Recommended Addon template
 *
 * @package Responsive
 */

?>

<div class="responsive-about-tabs about-tabs">
	<div class="responsive-recommoned-addons">
		<p><?php esc_html_e( 'We recommend that you install the following free plugins to get the best experience out of the Responsive theme.', 'responsive' ); ?> </p>
		<div class="responsive-addon-wrapper">
			<div class="responsive-addon-detials">
				<h3><?php esc_html_e( 'Responsive Add Ons', 'responsive' ); ?></h3>
				<p>
					<?php
					esc_html_e( 'With this free WordPress plugin, you can import beautifully designed, ready to use websites with full demo content. Update the content and launch your website in minutes.', 'responsive' );
					?>
				</p>
				<?php echo Responsive_Plugin_Install_Helper::instance()->get_button_html( 'responsive-add-ons' ); //phpcs:ignore ?>
			</div>
			<div class="plugin-banner-wrapper">
				<?php $current_plugin = responsive_call_plugin_api( 'responsive-add-ons' ); ?>
				<img class="plugin-banner" src="<?php echo esc_attr( $current_plugin->banners['low'] ); ?>">
			</div>
		</div>
	</div>
</div>
