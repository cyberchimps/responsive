<?php
/**
 * Customizer Control: Responsive.
 *
 * @package     Responsive WordPress theme
 * @subpackage  Controls
 * @since       4.6
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Customizer_Editor_Control' ) ) :
	/**
	 * Checkbox control
	 */
	class Responsive_Customizer_Editor_Control extends WP_Customize_Control {
		/**
		 * Control type
		 *
		 * @var string
		 */
		public $type = 'responsive_editor_control';

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
		 * Refresh the parameters passed to the JavaScript via JSON.
		 */
		public function to_json() {
			parent::to_json();
			$this->json['default']     = $this->default;
			$this->json['input_attrs'] = $this->input_attrs;
		}
		/**
		 * Empty Render Function to prevent errors.
		 */
		public function render_content() {
		}
	}
endif;
