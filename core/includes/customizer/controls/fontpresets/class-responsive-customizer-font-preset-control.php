<?php
/**
 * Customizer Control: Responsive Font Presets.
 *
 * @package     Responsive WordPress theme
 * @subpackage  Controls
 * @since       6.2.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Customizer_Font_Presets_Control' ) ) :
	/**
	 * Font Presets control
	 */
	class Responsive_Customizer_Font_Presets_Control extends WP_Customize_Control {
        /**
         * The control type.
		 *
         * @access public
         * @var string
		 */
        public $type = 'responsive-font-presets';

		/**
		 * Font preset choices.
		 *
		 * @access public
		 * @var array
		 */
		public $choices = array();

		/**
         * Enqueue control related scripts/styles.
		 *
         * @access public
		 */
        public function enqueue() {
            wp_enqueue_style( 'responsive-font-presets', RESPONSIVE_THEME_URI . 'core/includes/customizer/assets/min/css/font-presets.min.css', array(), RESPONSIVE_THEME_VERSION );
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
			$this->json['choices']     = $this->choices;
			$this->json['description'] = $this->description;
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
