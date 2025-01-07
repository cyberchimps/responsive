<?php
/**
 * The Border customize control extends the WP_Customize_Control class.
 *
 * @package customizer-controls
 */

if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return;
}


/**
 * Class Kadence_Control_Border
 *
 * @access public
 */
class Responsive_Customizer_Shadow_Control extends WP_Customize_Control {
	/**
	 * Control type
	 *
	 * @var string
	 */
	public $type = 'responsive-shadow-control';

	/**
	 * Additional arguments passed to JS.
	 *
	 * @var array
	 */
	public $default = array();

	/**
	 * Additional arguments passed to JS.
	 *
	 * @var array
	 */
	public $input_attrs = array();

	/**
	 * Enqueue control related scripts/styles.
	 *
	 * @access public
	 */
	public function enqueue() {
		wp_enqueue_style( 'responsive-shadow', RESPONSIVE_THEME_URI . 'core/includes/customizer/assets/min/css/shadow.min.css', null );
	}

	/**
	 * Send to JS.
	 */
	public function to_json() {
		parent::to_json();
		$this->json['type']          = $this->type;
		$this->json['description']   = $this->description;

		foreach ( $this->settings as $setting_key => $setting ) {

			list( $_key ) = explode( '_', $setting_key );

			$this->json[ $_key ][ $setting_key ] = array(
				'id'    => $setting->id,
				'link'  => $this->get_link( $setting_key ),
				'value' => $this->value( $setting_key ),
			);
		}
	}
	/**
	 * Empty Render Function to prevent errors.
	 */
	public function render_content() {
	}
}

