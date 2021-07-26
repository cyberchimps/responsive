<?php
/**
 * Customizer Control: Responsive.
 *
 * @package     Responsive WordPress theme
 * @subpackage  Controls
 * @since       1.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Customizer_Heading_Control' ) ) :
	/**
	 * Range control
	 */
	class Responsive_Customizer_Heading_Control extends WP_Customize_Control {

		/**
		 * The control type.
		 *
		 * @access public
		 * @var string
		 */
		public $type = 'responsive-heading';

		/**
		 * Enqueue control related scripts/styles.
		 *
		 * @access public
		 */
		public function enqueue() {
			wp_enqueue_style( 'responsive-heading', RESPONSIVE_THEME_URI . 'core/includes/customizer/assets/min/css/heading.min.css', null );
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
