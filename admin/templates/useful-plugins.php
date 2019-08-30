<?php
/**
 * Useful plugins.
 *
 * @package Responsive
 */

$responsive_recommended_plugins = array( 'wplegalpages', 'gdpr-cookie-consent' );
?>

<div class="responsive-about-tabs about-tabs">
	<p><?php esc_html_e( 'We recommend the following plugins to get your website started on the right path.', 'responsive' ); ?></p>
	<?php responsive_render_plugins_tab( $responsive_recommended_plugins ); ?>
</div>

<?php
/**
 * Render plugins tab content.
 *
 * @param array $plugins_list - list of useful plugins.
 */
function responsive_render_plugins_tab( $plugins_list ) {
	if ( empty( $plugins_list ) ) {
		return;
	}
	echo '<div class="recommended-plugins">';

	foreach ( $plugins_list as $plugin ) {
		$current_plugin = responsive_call_plugin_api( $plugin );
		?>
		<div class="plugin_box">
			<div class='plugin-detials'>
				<h3 class='plugin-name'><?php echo esc_attr( $current_plugin->name ); ?> </h3>
				<span class="plugin-desc"><?php echo esc_attr( $current_plugin->short_description ); ?> </span>
				<div class="button-wrap"><?php echo Responsive_Plugin_Install_Helper::instance()->get_button_html( $plugin ); //phpcs:ignore ?></div>
			</div>
			<div class="plugin-bapper-wrapper">
				<img class="plugin-banner" src="<?php echo esc_attr( $current_plugin->banners['low'] ); ?>">
			</div>
		</div>
		<?php
	}

	echo '</div>';
}
