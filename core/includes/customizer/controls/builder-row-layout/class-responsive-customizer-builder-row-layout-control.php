<?php
/**
 * Customizer Row Layout Select Control: Responsive.
 *
 * @package     Responsive WordPress theme
 * @subpackage  Controls
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Customizer_Builder_Row_Layout_Control' ) ) :
	/**
	 * Alignment control
	 */
	class Responsive_Customizer_Builder_Row_Layout_Control extends WP_Customize_Control {

		/**
		 * The control type.
		 *
		 * @access public
		 * @var string
		 */
		public $type = 'responsive-row-layout-select';

		/**
		 * Enqueue control related scripts/styles.
		 *
		 * @access public
		 */
		public function enqueue() {
			wp_enqueue_style( 'responsive-row-layout-select', RESPONSIVE_THEME_URI . 'core/includes/customizer/assets/min/css/row-layout.min.css', null );
		}


		/**
		 * Refresh the parameters passed to JavaScript via JSON.
		 *
		 * @see WP_Customize_Control::to_json()
		 */
		public function to_json() {
			parent::to_json();
			$this->json['value']       = $this->value();
			$this->json['choices']     = $this->choices;
			$this->json['link']        = $this->get_link();
			$this->json['id']          = $this->id;
			$this->json['type']        = $this->type;
            $this->json['input_attrs'] = $this->input_attrs;
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