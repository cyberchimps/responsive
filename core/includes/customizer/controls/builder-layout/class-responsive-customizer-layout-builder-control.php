<?php
/**
 * Customizer Control: Responsive.
 *
 * @package     Responsive WordPress theme
 * @subpackage  Controls
 * @since       6.1.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return;
}

if ( ! class_exists( 'Responsive_Customizer_Layout_Builder_Control' ) ) :
	/**
	 * Builder control
	 */
	class Responsive_Customizer_Layout_Builder_Control extends WP_Customize_Control {

		/**
		 * The control type.
		 *
		 * @access public
		 * @var string
		 */
		public $type = 'responsive-builder-control';

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
		public $builder_choices = array();

		/**
		 * Refresh the parameters passed to JavaScript via JSON.
		 *
		 * @see WP_Customize_Control::to_json()
		 */
		public function to_json() {
			parent::to_json();
			$this->json['default']         = $this->default;
			$this->json['input_attrs']     = $this->input_attrs;
			$this->json['builder_choices'] = $this->builder_choices;
			$this->json['type']            = $this->type;
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
endif;
