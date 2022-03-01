<?php
/**
 * The blank customize control extends the WP_Customize_Control class.
 *
 * @package customizer-controls
 */

if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return;
}


/**
 * Class responsive_Control_Blank
 *
 * @access public
 */
class Responsive_Customizer_Builder_Control extends WP_Customize_Control {
	/**
	 * Control type
	 *
	 * @var string
	 */
	public $type = 'responsive-builder';

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
	 * Additional arguments passed to JS.
	 *
	 * @var array
	 */
	public $choices = array();

	/**
	 * Enqueue control related scripts/styles.
	 *
	 * @access public
	 */
	public function enqueue() {
		wp_enqueue_style( 'responsive-builder', RESPONSIVE_THEME_URI . 'core/includes/customizer/assets/min/css/builder-control.min.css', null );
	}
	/**
	 * Refresh the parameters passed to the JavaScript via JSON.
	 */
	public function to_json() {
		parent::to_json();
		$this->json['default']     = $this->default;
		$this->json['input_attrs'] = $this->input_attrs;
		$this->json['choices']     = $this->choices;
	}

	/**
	 * Content template.
	 *
	 * @see WP_Customize_Control::print_template()
	 *
	 * @access protected
	 */
	protected function render_content() {}
}
