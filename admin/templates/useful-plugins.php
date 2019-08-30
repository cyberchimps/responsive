<?php
/**
 * Useful plugins.
 *
 * @package Responsive
 */

$responsive_recommended_plugins = array(
	''
)
?>

<div class="about-tabs">
	<p><?php esc_html_e( 'We recommend the following plugins to get your website started on the right path.' ); ?></p>
	<?php render_plugins_tab( array( 'wplegalpages', 'gdpr-cookie-consent' ) ); ?>
</div>

<?php
/**
 * Render plugins tab content.
 *
 * @param array $plugins_list - list of useful plugins
 */
function render_plugins_tab( $plugins_list ) {
	if ( empty( $plugins_list ) ) {
		return;
	}
	echo '<div class="recommended-plugins">';

	foreach ( $plugins_list as $plugin ) {
		$current_plugin = call_plugin_api( $plugin );

		echo '<div class="plugin_box">';
		echo '<img class="plugin-banner" src="' . esc_attr( $current_plugin->banners['low'] ) . '">';
		echo '<div class="title-action-wrapper">';
		echo '<span class="plugin-name">' . esc_html( $current_plugin->name ) . '</span>';
		echo '<span class="plugin-desc">' . esc_html( $current_plugin->short_description ) . '</span>';
		echo '</div>';
		echo '<div class="plugin-box-footer">';
		echo '<div class="button-wrap">';
		echo Ti_About_Plugin_Helper::instance()->get_button_html( $plugin );
		echo '</div>';
		echo '<div class="version-wrapper"><span class="version">' . esc_html( $current_plugin->version ) . '</span><span class="separator"> | </span>' . strtok( strip_tags( $current_plugin->author ), ',' ) . '</div>';
		echo '</div>';
		echo '</div>';
	}

	echo '</div>';
}
/**
 * Call plugin api
 *
 * @param string $slug plugin slug.
 *
 * @return array|mixed|object
 */
function call_plugin_api( $slug ) {
	include_once ABSPATH . 'wp-admin/includes/plugin-install.php';

	$call_api = get_transient( 'ti_about_plugin_info_' . $slug );

	if ( false === $call_api ) {
		$call_api = plugins_api(
			'plugin_information',
			array(
				'slug'   => $slug,
				'fields' => array(
					'downloaded'        => false,
					'rating'            => false,
					'description'       => false,
					'short_description' => true,
					'donate_link'       => false,
					'tags'              => false,
					'sections'          => true,
					'homepage'          => true,
					'added'             => false,
					'last_updated'      => false,
					'compatibility'     => false,
					'tested'            => false,
					'requires'          => false,
					'downloadlink'      => false,
					'icons'             => true,
					'banners'           => true,
				),
			)
		);
		set_transient( 'ti_about_plugin_info_' . $slug, $call_api, 30 * MINUTE_IN_SECONDS );
	}

	return $call_api;
}
