<?php
/**
 * Customizer Control: Responsive.
 *
 * @package     Responsive WordPress theme
 * @subpackage  Controls
 * @since       4.9.6
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Customizer_Responsive_Tabs_Control' ) ) :
	/**
	 * Alignment control
	 */
	class Responsive_Customizer_Responsive_Tabs_Control extends WP_Customize_Control {

		/**
		 * The control type.
		 *
		 * @access public
		 * @var string
		 */
		public $type = 'responsive-tabs';

		/**
		 * ID for General Tab.
		 *
		 * @access public
		 * @var string
		 */

		public $general_id;

		/**
		 * ID for Design Tab.
		 *
		 * @access public
		 * @var string
		 */
		public $design_id;

		/**
		 * Control ids that belong to general tab.
		 *
		 * @access public
		 * @var string
		 */
		public $general_tab_ids;

		/**
		 * Control ids that belong to design tab.
		 *
		 * @access public
		 * @var string
		 */
		public $design_tab_ids;

		/**
		 * Constructor for the custom control.
		 *
		 * This constructor initializes the custom control by setting custom arguments
		 * and calling the parent constructor to ensure proper setup within the WordPress
		 * Customizer framework.
		 *
		 * @param WP_Customize_Manager $manager The customizer manager class.
		 * @param string               $id      The control ID.
		 * @param array                $args    Optional. Arguments to override class property defaults.
		 *                                      - 'general_id' (string): A custom argument for the control.
		 */
		public function __construct( $manager, $id, $args = array() ) {
			// Set custom arguments.
			if ( isset( $args['general_id'] ) ) {
				$this->general_id = $args['general_id'];
			}

			if ( isset( $args['design_id'] ) ) {
				$this->design_id = $args['design_id'];
			}

			if ( isset( $args['general_tab_ids'] ) ) {
				$this->general_tab_ids = $args['general_tab_ids'];
			}

			if ( isset( $args['design_tab_ids'] ) ) {
				$this->design_tab_ids = $args['design_tab_ids'];
			}

			// Call parent constructor.
			parent::__construct( $manager, $id, $args );
		}

		/**
		 * Enqueue control related scripts/styles.
		 *
		 * @access public
		 */
		public function enqueue() {
			wp_enqueue_script( 'responsive-tabs', RESPONSIVE_THEME_URI . 'core/includes/customizer/assets/min/js/tabs.min.js', array( 'jquery', 'customize-base', 'jquery-ui-slider' ), RESPONSIVE_THEME_VERSION, true );
			wp_enqueue_style( 'responsive-tabs', RESPONSIVE_THEME_URI . 'core/includes/customizer/assets/min/css/tabs.min.css', null, RESPONSIVE_THEME_VERSION );
		}


		/**
		 * Refresh the parameters passed to JavaScript via JSON.
		 *
		 * @see WP_Customize_Control::to_json()
		 */
		public function to_json() {
			parent::to_json();
			$this->json['value']           = $this->value();
			$this->json['link']            = $this->get_link();
			$this->json['id']              = $this->id;
			$this->json['type']            = $this->type;
			$this->json['description']     = $this->description;
			$this->json['choices']         = $this->choices;
			$this->json['general_id']      = $this->general_id;
			$this->json['design_id']       = $this->design_id;
			$this->json['general_tab_ids'] = $this->general_tab_ids;
			$this->json['design_tab_ids']  = $this->design_tab_ids;
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
