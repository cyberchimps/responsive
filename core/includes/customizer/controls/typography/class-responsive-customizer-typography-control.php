<?php
/**
 * Customizer Control: responsive-typography.
 *
 * @package     Responsive WordPress theme
 * @subpackage  Controls
 * @since       1.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Customizer_Typography_Control' ) ) :
	/**
	 * Typography control
	 */
	class Responsive_Customizer_Typography_Control extends WP_Customize_Control {

		/**
		 * The control type.
		 *
		 * @access public
		 * @var string
		 */
		public $type = 'responsive-typography';
		/**
		 * Used to connect controls to each other.
		 *
		 * @var bool $connect
		 */
		public $connect = false;
		/**
		 * Option name.
		 *
		 * @var string $name
		 */
		public $name = '';
		/**
		 * Used to set the default font options.
		 *
		 * @var string $resp_inherit
		 */
		public $resp_inherit = '';

		/**
		 * All font weights
		 *
		 * @var string $resp_inherit
		 */
		public $all_font_weight = array();

		/**
		 * Responsive theme setting id(for font controls only)
		 *
		 * @var string $responsive_setting_id
		 */
		public $responsive_setting_id = '';

		/**
		 * Set the default font options.
		 *
		 * @param WP_Customize_Manager $manager Customizer bootstrap instance.
		 * @param string               $id      Control ID.
		 * @param array                $args    Default parent's arguments.
		 */
		public function __construct( $manager, $id, $args = array() ) {
			$this->resp_inherit    = __( 'Inherit', 'responsive' );
			$this->all_font_weight = array(
				''    => esc_html__( 'Default', 'responsive' ),
				'100' => esc_html__( 'Thin: 100', 'responsive' ),
				'200' => esc_html__( 'Light: 200', 'responsive' ),
				'300' => esc_html__( 'Book: 300', 'responsive' ),
				'400' => esc_html__( 'Normal: 400', 'responsive' ),
				'500' => esc_html__( 'Medium: 500', 'responsive' ),
				'600' => esc_html__( 'Semibold: 600', 'responsive' ),
				'700' => esc_html__( 'Bold: 700', 'responsive' ),
				'800' => esc_html__( 'Extra Bold: 800', 'responsive' ),
				'900' => esc_html__( 'Black: 900', 'responsive' ),
			);
			parent::__construct( $manager, $id, $args );
		}

		/**
		 * Enqueue control related scripts/styles.
		 *
		 * @access public
		 */
		public function enqueue() {
			// Don't call is The Event Calendar active to avoid conflict.
			if ( ! class_exists( 'Tribe__Events__Main' ) ) {
				wp_enqueue_script( 'responsive-select2', RESPONSIVE_THEME_URI . 'core/includes/customizer/controls/select2.min.js', array( 'jquery' ), RESPONSIVE_THEME_VERSION, true );
				wp_enqueue_style( 'select2', RESPONSIVE_THEME_URI . 'core/includes/customizer/controls/select2.min.css', RESPONSIVE_THEME_VERSION, true );
				wp_enqueue_script( 'responsive-typography-js', RESPONSIVE_THEME_URI . 'core/includes/customizer/assets/min/js/typography.min.js', array( 'jquery', 'select2' ), RESPONSIVE_THEME_VERSION, true );
			}
			wp_enqueue_style( 'responsive-typography', RESPONSIVE_THEME_URI . 'core/includes/customizer/assets/min/css/typography.min.css', RESPONSIVE_THEME_VERSION, true );

			wp_enqueue_script( 'responsive-typography-weight', RESPONSIVE_THEME_URI . 'core/includes/customizer/controls/typography/typography-weight-control.js', array( 'jquery', 'customize-base' ), RESPONSIVE_THEME_VERSION, true );
			wp_enqueue_script( 'responsive-conditional-display-controls', RESPONSIVE_THEME_URI . 'core/includes/customizer/assets/js/conditional-display-controls.js', array( 'jquery', 'customize-base' ), RESPONSIVE_THEME_VERSION, true );
			wp_localize_script(
				'responsive-typography-weight',
				'responsive',
				array(
					'googleFonts'  => responsive_get_google_fonts(),
					'weigthMap'    => $this->all_font_weight,
					'std_fonts'    => responsive_standard_fonts(),

				)
			);
		}
		public function get_custom_fonts() {
					return class_exists( 'Responsive_Addons_Pro' ) ? Responsive_Pro_Custom_Fonts_Taxonomy::get_fonts() : null;
		}

		/**
		 * Refresh the parameters passed to the JavaScript via JSON.
		 *
		 * @see WP_Customize_Control::to_json()
		 */
		public function to_json() {

			parent::to_json();

			$this->json['label']           = esc_html( $this->label );
			$this->json['description']     = $this->description;
			$this->json['name']            = $this->name;
			$this->json['value']           = $this->value();
			$this->json['connect']         = $this->connect;
			$this->json['link']            = $this->get_link();
			$this->json['all_font_weight'] = $this->all_font_weight;
			$this->json['resp_inherit']    = $this->resp_inherit;
			$this->json['id']              = $this->responsive_setting_id;
			$this->json['standard_fonts']  = responsive_standard_fonts();
			$this->json['google_fonts']    = responsive_get_google_fonts();
			$this->json['custom_fonts']    = $this->get_custom_fonts();
		}

		/**
		 * Render the control's content.
		 * Allows the content to be overriden without having to rewrite the wrapper in $this->render().
		 *
		 * @access protected
		 */
		protected function render_content() {}
	}
endif;
