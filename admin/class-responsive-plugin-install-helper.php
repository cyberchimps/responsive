<?php
/**
 * Plugin install helper.
 *
 * @package Responsive
 * @since Responsive 1.1.31
 */

/**
 * Class Responsive_Plugin_Install_Helper
 */
class Responsive_Plugin_Install_Helper {
	/**
	 * Instance of class.
	 *
	 * @var bool $instance instance variable.
	 */
	private static $instance;


	/**
	 * Check if instance already exists.
	 *
	 * @return Responsive_Plugin_Install_Helper
	 */
	public static function instance() {
		if ( ! isset( self::$instance ) && ! ( self::$instance instanceof Responsive_Plugin_Install_Helper ) ) {
			self::$instance = new Responsive_Plugin_Install_Helper();
		}

		return self::$instance;
	}

	/**
	 * Get plugin path based on plugin slug.
	 *
	 * @param string $slug Plugin slug.
	 *
	 * @return string
	 */
	public static function get_plugin_path( $slug ) {
		switch ( $slug ) {
			case 'wplegalpages':
				return $slug . '/wplegalpages.php';
			case 'gdpr-cookie-consent':
				return $slug . '/gdpr-cookie-consent.php';
			default:
				return $slug . '/' . $slug . '.php';
		}
	}

	/**
	 * Generate action button html.
	 *
	 * @param string $slug plugin slug.
	 * @param array  $settings settings.
	 *
	 * @return string
	 */
	public function get_button_html( $slug, $settings = array() ) {
		$button   = '';
		$redirect = admin_url( 'admin.php?page=responsive-add-ons' );
		$state = $this->check_plugin_state( $slug );
		if ( empty( $slug ) ) {
			return '';
		}

		$additional = '';

		if ( 'deactivate' === $state ) {
			$additional = ' action_button active';
		}

		$button .= '<div class="plugin-card-' . esc_attr( $slug ) . esc_attr( $additional ) . '" style="padding: 8px 0 5px;">';

		$plugin_link_suffix = self::get_plugin_path( $slug );

		$nonce = add_query_arg(
			array(
				'action'        => 'activate',
				'plugin'        => rawurlencode( $plugin_link_suffix ),
				'plugin_status' => 'all',
				'paged'         => '1',
				'_wpnonce'      => wp_create_nonce( 'activate-plugin_' . $plugin_link_suffix ),
			),
			network_admin_url( 'plugins.php' )
		);
		switch ( $state ) {
			case 'install':
				$button .= '<a data-redirect="' . esc_url( $redirect ) . '" data-slug="' . esc_attr( $slug ) . '" class="install-now responsive-install-plugin button  " href="' . esc_url( $nonce ) . '" data-name="' . esc_attr( $slug ) . '" aria-label="Install ' . esc_attr( $slug ) . '">' . __( 'Install and activate &raquo;', 'responsive' ) . '</a>';
				break;

			case 'activate':
				$button .= '<a  data-redirect="' . esc_url( $redirect ) . '" data-slug="' . esc_attr( $slug ) . '" class="activate-now button button-primary" href="' . esc_url( $nonce ) . '" aria-label="Activate ' . esc_attr( $slug ) . '">' . esc_html__( 'Activate', 'responsive' ) . '</a>';
				break;

			case 'deactivate':
				$nonce = add_query_arg(
					array(
						'action'        => 'deactivate',
						'plugin'        => rawurlencode( $plugin_link_suffix ),
						'plugin_status' => 'all',
						'paged'         => '1',
						'_wpnonce'      => wp_create_nonce( 'deactivate-plugin_' . $plugin_link_suffix ),
					),
					network_admin_url( 'plugins.php' )
				);

				$button .= '<a  data-redirect="' . esc_url( $redirect ) . '" data-slug="' . esc_attr( $slug ) . '" class="deactivate-now button" href="' . esc_url( $nonce ) . '" data-name="' . esc_attr( $slug ) . '" aria-label="Deactivate ' . esc_attr( $slug ) . '">' . esc_html__( 'Deactivate', 'responsive' ) . '</a>';
				break;

			case 'enable_cpt':
				$url     = admin_url( 'admin.php?page=jetpack#/settings' );
				$button .= '<a  data-redirect="' . esc_url( $redirect ) . '" class="button" href="' . esc_url( $url ) . '">' . esc_html__( 'Activate', 'responsive' ) . ' ' . esc_html__( 'Jetpack Portfolio', 'responsive' ) . '</a>';
				break;
		} // End switch.
		$button .= '</div>';
		return $button;
	}

	/**
	 * Check plugin state.
	 *
	 * @param string $slug plugin slug.
	 *
	 * @return bool
	 */
	public function get_deactivate_content( $slug ) {
		$state = $this->check_plugin_state( $slug );
		if ( empty( $slug ) ) {
			return '';
		}

		$deactivate = '';

		if ( 'deactivate' === $state ) {
			$deactivate .= '<div class="deactivate-ready-site">';
		}
		return $deactivate;
	}

	/**
	 * Check plugin state.
	 *
	 * @param string $slug plugin slug.
	 *
	 * @return bool
	 */
	public function get_deactivate_end_content( $slug ) {
		$state = $this->check_plugin_state( $slug );
		if ( empty( $slug ) ) {
			return '';
		}

		$deactivate_end = '';

		if ( 'deactivate' === $state ) {
			$deactivate_end .= '</div>';
		}
		return $deactivate_end;
	}

	/**
	 * Check plugin state.
	 *
	 * @param string $slug plugin slug.
	 *
	 * @return bool
	 */
	public function check_plugin_state( $slug ) {
		$plugin_link_suffix = self::get_plugin_path( $slug );

		if ( file_exists( ABSPATH . 'wp-content/plugins/' . $plugin_link_suffix ) ) {
			$needs = is_plugin_active( $plugin_link_suffix ) ? 'deactivate' : 'activate';
			if ( 'deactivate' === $needs && ! post_type_exists( 'portfolio' ) && 'jetpack' === $slug ) {
				return 'enable_cpt';
			}

			return $needs;
		} else {
			return 'install';
		}
	}

	/**
	 * Enqueue Function.
	 */
	public function enqueue_scripts() {
		wp_enqueue_script( 'plugin-install' );
		wp_enqueue_script( 'updates' );
		wp_enqueue_script( 'responsive-plugin-install-helper', get_template_directory_uri() . '/inc/customizer/controls/ui/helper-plugin-install/helper-script.js', array( 'jquery' ), RESPONSIVE_THEME_VERSION, true );
		wp_localize_script(
			'responsive-plugin-install-helper',
			'responsive_plugin_helper',
			array(
				'activating' => esc_html__( 'Activating ', 'responsive' ),
			)
		);
		wp_localize_script(
			'responsive-plugin-install-helper',
			'pagenow',
			array( 'import' )
		);
	}
}
