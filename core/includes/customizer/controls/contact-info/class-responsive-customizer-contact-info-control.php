<?php
/**
 * Customizer Control: responsive-html.
 *
 * @package     Responsive WordPress theme
 * @subpackage  Controls
 * @see         https://github.com/aristath/kirki
 * @license     http://opensource.org/licenses/https://opensource.org/licenses/MIT
 * @since       1.0
 */
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! class_exists( 'Responsive_Customizer_Contact_Info_Control' ) ) :
	/**
	 * Buttonset control
	 */
	class Responsive_Customizer_Contact_Info_Control extends WP_Customize_Control {
		/**
		 * The control type.
		 *
		 * @access public
		 * @var string
		 */
		public $type = 'responsive-contact-info';
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
		 * Enqueue styles.
		 *
		 * @access public
		 */
		public function enqueue() {
			wp_enqueue_style( 'responsive-contact-info', RESPONSIVE_THEME_URI . 'core/includes/customizer/assets/min/css/contact-info.min.css', null );
		}

		/**
		 * Refresh the parameters passed to the JavaScript via JSON.
		 *
		 * @see WP_Customize_Control::to_json()
		 */
		public function to_json() {
            parent::to_json();
            $this->json['default']     = $this->default;
            $this->json['input_attrs'] = $this->input_attrs;
			$this->json['value']       = $this->value();
        }
		/**
		 * Render the control's content.
		 *
		 * @see WP_Customize_Control::render_content()
		 */
		protected function render_content() {}
	}
endif;