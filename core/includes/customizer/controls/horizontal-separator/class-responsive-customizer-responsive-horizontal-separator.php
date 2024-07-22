<?php
/**
 * Customizer Control: Responsive.
 *
 * @package     Responsive WordPress theme
 * @subpackage  Controls
 * @since       5.1.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Customizer_Horizontal_Separator' ) ) :
	/**
	 * Horizontal Separator control
	 */
	class Responsive_Customizer_Horizontal_Separator extends WP_Customize_Control {
        /**
         * The control type.
		 *
         * @access public
         * @var string
		 */
        public $type = 'responsive-horizontal-separator';
        
		/**
         * Enqueue control related scripts/styles.
		 *
         * @access public
		 */
        public function enqueue() {
            wp_enqueue_style( 'responsive-horizontal-separator', RESPONSIVE_THEME_URI . 'core/includes/customizer/assets/min/css/horizontal-separator.min.css', null );
		}

		/**
         * Refresh the parameters passed to JavaScript via JSON.
		 *
         * @see WP_Customize_Control::to_json()
		 */
        public function to_json() {
			parent::to_json();
			$this->json['value']       = $this->value();
			$this->json['link']        = $this->get_link();
			$this->json['id']          = $this->id;
			$this->json['type']        = $this->type;
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
