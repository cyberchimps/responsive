<?php
/**
 * Customizer Control: Responsive.
 *
 * @package     Responsive WordPress theme
 * @subpackage  Controls
 * @since       4.7.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Customizer_Redirect_Control' ) ) :
	/**
	 * Range control
	 */
	class Responsive_Customizer_Redirect_Control extends WP_Customize_Control {

		/**
		 * The control type.
		 *
		 * @access public
		 * @var string
		 */
		public $type = 'responsive-redirect';

		/**
		 * Linked customizer section.
		 *
		 * @var string
		 */
		public $linked = '';

		/**
		 * Linked customizer section type.
		 *
		 * @var string
		 */
		public $link_type = '';

		/**
		 * Enqueue control related scripts/styles.
		 *
		 * @access public
		 */
		public function enqueue() {
			wp_enqueue_style( 'responsive-redirect', RESPONSIVE_THEME_URI . 'core/includes/customizer/assets/min/css/redirect.min.css', null );
		}

		/**
		 * Refresh the parameters passed to JavaScript via JSON.
		 *
		 * @see WP_Customize_Control::to_json()
		 */
		public function to_json() {
			parent::to_json();
			$this->json['type']      = $this->type;
			$this->json['linked']    = $this->linked;
			$this->json['link_type'] = $this->link_type;
		}

		/**
		 * Content template.
		 *
		 * @see WP_Customize_Control::print_template()
		 *
		 * @access protected
		 */
		protected function render_control() {}
	}
endif;
