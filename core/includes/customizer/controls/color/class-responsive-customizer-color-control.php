<?php
/**
 * Customizer Control: responsive-color.
 *
 * @package     Responsive WordPress theme
 * @subpackage  Controls
 * @see         https://github.com/BraadMartin/components
 * @license     http://opensource.org/licenses/https://opensource.org/licenses/MIT
 * @since       1.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Customizer_Color_Control' ) ) :
	/**
	 * Color control
	 */
	class Responsive_Customizer_Color_Control extends WP_Customize_Control {
		/**
		 * The control type.
		 *
		 * @access public
		 * @var string
		 */
		public $type = 'alpha-color';

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
			wp_enqueue_script( 'responsive-color', RESPONSIVE_THEME_URI . 'core/includes/customizer/assets/min/js/color.min.js', array( 'jquery', 'customize-base', 'wp-color-picker' ), RESPONSIVE_THEME_VERSION, true );
			wp_enqueue_style( 'wp-color-picker' );
			wp_enqueue_style( 'responsive-color', RESPONSIVE_THEME_URI . 'core/includes/customizer/assets/min/css/color.min.css', array( 'wp-color-picker' ), '1.0.0' );
			wp_localize_script( 'responsive-color', 'responsiveLocalize', array( 'colorPalettes' => responsive_default_color_palettes() ) );
		}

		/**
		 * Refresh the parameters passed to the JavaScript via JSON.
		 *
		 * @see WP_Customize_Control::to_json()
		 */
		public function to_json() {
			parent::to_json();

			$this->json['default']      = $this->setting->default;
			$this->json['show_opacity'] = true;
			$this->json['value']        = $this->value();
			$this->json['link']         = $this->get_link();
			$this->json['id']           = $this->id;

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
		protected function content_template() { ?>

		<label>
			<# if ( data.label ) { #>
				<span class="customize-control-title">{{{ data.label }}}</span>
			<# } #>
			<# if ( data.description ) { #>
				<span class="description customize-control-description">{{{ data.description }}}</span>
			<# } #>
			<div>
				<input class="alpha-color-control" type="text"  value="{{ data.value }}" data-show-opacity="{{ data.show_opacity }}" data-default-color="{{ data.default }}" {{{ data.link }}} />
			</div>
		</label>
			<?php
		}
	}
endif;
