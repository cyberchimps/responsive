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

if ( ! class_exists( 'Responsive_Customizer_Typography_Group_Control' ) ) :
	/**
	 * Toggle control
	 */
	class Responsive_Customizer_Typography_Group_Control extends WP_Customize_Control {
        /**
         * The control type.
		 *
         * @access public
         * @var string
		 */
        public $type = 'responsive-typography-settings-group';

		public $connected_control;

		public function __construct($manager, $id, $args = array()) {
			parent::__construct($manager, $id, $args);
			$this->connected_control = isset($args['connected_control']) ? $args['connected_control'] : null;
		}
        
		/**
         * Enqueue control related scripts/styles.
		 *
         * @access public
		 */
        public function enqueue() {
            wp_enqueue_style( 'responsive-typography', RESPONSIVE_THEME_URI . 'core/includes/customizer/assets/min/css/typography.min.css', RESPONSIVE_THEME_VERSION, true );
		}
        
		/**
         * Refresh the parameters passed to JavaScript via JSON.
		 *
         * @see WP_Customize_Control::to_json()
		 */
        public function to_json() {
			parent::to_json();
			$this->json['value']             = $this->value();
			$this->json['link']              = $this->get_link();
			$this->json['id']                = $this->id;
			$this->json['type']              = $this->type;
			$this->json['description']       = $this->description;
			$this->json['connected_control'] = $this->connected_control;
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
