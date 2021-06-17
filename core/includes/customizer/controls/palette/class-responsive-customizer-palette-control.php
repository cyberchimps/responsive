<?php
/**
 * Customizer Control: responsive-range.
 *
 * @package     Responsive WordPress theme
 * @subpackage  Controls
 * @since       1.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Customizer_Palette_Control' ) ) :
	/**
	 * Palette control
	 */
	class Responsive_Customizer_Palette_Control extends WP_Customize_Control {

		/**
		 * Holds the palette type
		 *
		 * @var string
		 */
		protected $palette_type = 'default';

		/**
		 * The slug of this control in the customizer.
		 *
		 * @var string
		 */
		public $type = 'responsive-palette';

		/**
		 * Constructor.
		 *
		 * Supplied `$args` override class property defaults.
		 *
		 * @param \WP_Customize_Manager $manager Customizer bootstrap instance.
		 * @param string                $id      Control ID.
		 * @param array                 $args    @see WP_Customize_Control::__construct().
		 */
		public function __construct( WP_Customize_Manager $manager, $id, $args = array() ) {
			parent::__construct( $manager, $id, $args );

			if ( isset( $args['palette_type'] ) ) {
				$this->palette_type = $args['palette_type'];
			}
		}

		/**
		 * Enqueues required JS and CSS
		 *
		 * @return void
		 */
		public function enqueue() {
			wp_enqueue_style( 'responsive-palette', RESPONSIVE_THEME_URI . 'core/includes/customizer/controls/palette/palette.css', RESPONSIVE_THEME_VERSION, true );
		}

		/**
		 * Convert the control settings to JSON.
		 *
		 * @return void
		 */
		public function to_json() {
			parent::to_json();

			$this->json['id']           = $this->id;
			$this->json['value']        = $this->value();
			$this->json['link']         = $this->get_link();
			$this->json['choices']      = $this->choices;
			$this->json['palette_type'] = isset( $this->palette_type ) ? $this->palette_type : 'default';
		}

		/**
		 * The control is rendered in JS not PHP.
		 *
		 * @return void
		 */
		public function render_content() {}
	}
endif;
