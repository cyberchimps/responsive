<?php
/**
 * Customizer Control: responsive-range-with-switchers.
 *
 * @package     Responsive WordPress theme
 * @subpackage  Controls
 * @since       6.1.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Customizer_Range_With_Switcher_Control' ) ) :
	/**
	 * Range control
	 */
	class Responsive_Customizer_Range_With_Switcher_Control extends WP_Customize_Control {

		/**
		 * The control type.
		 *
		 * @access public
		 * @var string
		 */
		public $type = 'responsive-range-with-switchers';

		/**
		 * Enqueue control related scripts/styles.
		 *
		 * @access public
		 */
		public function enqueue() {
			wp_enqueue_style( 'responsive-range', RESPONSIVE_THEME_URI . 'core/includes/customizer/assets/min/css/range.min.css', RESPONSIVE_THEME_VERSION, true );
			wp_enqueue_style( 'responsive-range-with-switchers', RESPONSIVE_THEME_URI . 'core/includes/customizer/assets/min/css/range-switchers.min.css', RESPONSIVE_THEME_VERSION, true );
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

			$this->json['value']   = $this->value();
			$this->json['choices'] = $this->choices;
			$this->json['link']    = $this->get_link();
			$this->json['id']      = $this->id;

			$this->json['inputAttrs'] = '';
			foreach ( $this->input_attrs as $attr => $value ) {
				$this->json['inputAttrs'] .= $attr . '="' . esc_attr( $value ) . '" ';
			}

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
		 * Render the control's content.
		 *
		 * @see WP_Customize_Control::render_content()
		 */
		protected function render_content() {}
	}
endif;
