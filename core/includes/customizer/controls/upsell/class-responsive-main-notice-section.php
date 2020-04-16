<?php
/**
 * Responsive Customizer Notification Section Class.
 *
 * @package Responsive
 */

/**
 * Responsive_Customizer_Notify_Section class
 */
class Responsive_Main_Notice_Section extends Responsive_Generic_Notice_Section {
	/**
	 * The type of customize section being rendered.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $type = 'main-customizer-notice';

	/**
	 * The plugin information requested from plugins api.
	 *
	 * @var array
	 */
	private $plugin_info;

	/**
	 * Slug of recommended plugin.
	 *
	 * @var string
	 */
	public $slug;

	/**
	 * Control options.
	 *
	 * Ex: redirect link after install
	 *
	 * @var array
	 */
	public $options = array();

	/**
	 * Responsive_Main_Notice_Section constructor.
	 *
	 * @param WP_Customize_Manager $manager The customizer object.
	 * @param string               $id The control id.
	 * @param array                $args The control args.
	 */
	public function __construct( $manager, $id, $args = array() ) {
		parent::__construct( $manager, $id, $args );
		if ( empty( $this->slug ) ) {
			return;
		}
		$this->plugin_info = $this->call_plugin_api( $this->slug );
	}

	/**
	 * Call plugin API to get plugins info
	 *
	 * @param plugin-slug $slug The plugin slug.
	 *
	 * @return mixed
	 */
	private function call_plugin_api( $slug ) {
		if ( empty( $slug ) ) {
			return;
		}
		include_once ABSPATH . 'wp-admin/includes/plugin-install.php';
		$call_api = get_transient( 'ti_cust_notify_plugin_info_' . $slug );
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
						'sections'          => false,
						'homepage'          => false,
						'added'             => false,
						'last_updated'      => false,
						'compatibility'     => false,
						'tested'            => false,
						'requires'          => false,
						'downloadlink'      => false,
						'icons'             => false,
					),
				)
			);
			set_transient( 'ti_cust_notify_plugin_info_' . $slug, $call_api, 30 * MINUTE_IN_SECONDS );
		}

		return $call_api;
	}

	/**
	 * Add custom parameters to pass to the JS via JSON.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function json() {
		$json                          = parent::json();
		$json['name']                  = ! empty( $this->plugin_info ) && ! is_wp_error( $this->plugin_info ) && property_exists( $this->plugin_info, 'name' ) ? $this->plugin_info->name : '';
		$json['description']           = $this->description;
		$json['plugin_install_button'] = $this->create_plugin_install_button( $this->slug, $this->options );
		$json['hide_notice']           = $this->hide_notice;

		return $json;

	}

	/**
	 * Outputs the structure for the customizer control
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	protected function render_template() {
		?>
		<# if ( ! data.hide_notice ) { #>
		<li id="accordion-section-{{ data.id }}"
				class="responsive-notice control-section-{{ data.type }} cannot-expand" style="margin-bottom: 1px;">
			<# if ( data.title ) { #>
			<h3 class="accordion-section-title">
				{{{ data.title }}}
			</h3>
			<# } #>
			<div class="notice notice-info" style="position: relative; margin-top:0; margin-bottom: 1px;">
				<button type="button" class="notice-dismiss" style="z-index: 1;"></button>
				<# if ( data.name ) { #>
				<h3>
					{{{data.name}}}
				</h3>

				<# } #>
				<# if( data.description ) { #>
				<p>
					{{{ data.description }}}
				</p>
				<# } #>
				<# if ( data.plugin_install_button ) { #>
				{{{data.plugin_install_button}}}
				<# } #>
			</div>
		</li>
		<# } #>
		<?php
	}
}
