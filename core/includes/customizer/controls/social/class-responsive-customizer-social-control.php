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

if ( ! class_exists( 'Responsive_Customizer_Social_Control' ) ) :
	/**
	 * Range control
	 */
	class Responsive_Customizer_Social_Control extends WP_Customize_Control {

		/**
		 * The control type.
		 *
		 * @access public
		 * @var string
		 */
		public $type = 'responsive-social';

        /**
		 * Enqueue control related scripts/styles.
		 *
		 * @access public
		 */
		public function enqueue() {
			wp_enqueue_style( 'responsive-social', RESPONSIVE_THEME_URI . 'core/includes/customizer/assets/min/css/social.min.css', RESPONSIVE_THEME_VERSION, true );
		}

		/**
		 * Refresh the parameters passed to JavaScript via JSON.
		 *
		 * @see WP_Customize_Control::to_json()
		 */
		public function to_json() {
			parent::to_json();

			$this->json['default'] = $this->setting->default;
			if ( isset( $this->default ) ) {
				$this->json['default'] = $this->default;
			}
			$this->json['value']   = maybe_unserialize( $this->value() );
			$this->json['choices'] = $this->choices;
			$this->json['link']    = $this->get_link();
			$this->json['id']      = $this->id;

			$this->json['inputAttrs'] = '';
			foreach ( $this->input_attrs as $attr => $value ) {
				$this->json['inputAttrs'] .= $attr . '="' . esc_attr( $value ) . '" ';
			}

			$this->json['inputAttrs'] = maybe_serialize( $this->input_attrs() );
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
