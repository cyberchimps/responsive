<?php
/**
 * Customizer Control: responsive-color-with-devices.
 *
 * @package     Responsive WordPress theme
 * @subpackage  Controls
 * @see         https://github.com/BraadMartin/components
 * @license     http://opensource.org/licenses/https://opensource.org/licenses/MIT
 * @since       6.1.3
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Customizer_Color_With_Devices_Control' ) ) :
	/**
	 * Color control
	 */
	class Responsive_Customizer_Color_With_Devices_Control extends WP_Customize_Control {
		/**
		 * The control type.
		 *
		 * @access public
		 * @var string
		 */
		public $type = 'responsive-color-with-devices';
		
		/**
		 * Add support for palettes to be passed in.
		 *
		 * Supported palette values are true, false, or an array of RGBa and Hex colors.
		 *
		 * @access public
		 * @var string
		 */
		public $palette;
		
		/**
		 * Add support for showing the opacity value on the slider handle.
		 *
		 * @var string
		 */
		public $show_opacity;

		/**
		 * Enqueue control related scripts/styles.
		 *
		 * @access public
		 */
		public function enqueue() {
			wp_enqueue_script( 'wp-color-picker' );
			wp_enqueue_style( 'wp-color-picker' );
			wp_enqueue_style( 'responsive-color-with-devices', RESPONSIVE_THEME_URI . 'core/includes/customizer/assets/min/css/color.min.css', array( 'wp-color-picker' ), '1.0.0' );
		}

		/**
		 * Renders the control wrapper and calls $this->render_content() for the internals.
		 *
		 * @see WP_Customize_Control::render()
		 */
		protected function render() {
			$id    = 'customize-control-' . str_replace( array( '[', ']' ), array( '-', '' ), $this->id );
			$class = 'customize-control has-switchers customize-control-' . $this->type;

			?><li id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $class ); ?>">
			<?php $this->render_content(); ?>
		</li>
			<?php
		}

		/**
		 * Refresh the parameters passed to the JavaScript via JSON.
		 *
		 * @see WP_Customize_Control::to_json()
		 */
		public function to_json() {
			parent::to_json();

			$this->json['show_opacity']  = true;
			$this->json['value']         = $this->value();
			$this->json['link']          = $this->get_link();
			$this->json['id']            = $this->id;
			$this->json['colorPalettes'] = responsive_default_color_palettes();

			foreach ( $this->settings as $setting_key => $setting ) {
				$this->json[ $setting_key ] = array(
					'id'      => $setting->id,
					'default' => $setting->default,
					'link'    => $this->get_link( $setting_key ),
					'value'   => $this->value( $setting_key ),
				);
			}

		}

		/**
		 * An Underscore (JS) template for this control's content (but not its container).
		 *
		 * Class variables for this control class are available in the `data` JS object;
		 * export custom variables by overriding {@see WP_Customize_Control::to_json()}.
		 *
		 * @see WP_Customize_Control::print_template()
		 *
		 * @access protected
		 */
		protected function render_content() {}
	}
endif;