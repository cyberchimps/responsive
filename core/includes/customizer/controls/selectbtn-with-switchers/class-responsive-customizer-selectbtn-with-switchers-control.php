<?php
/**
 * Customizer Control: responsive-selectbtn-with-switchers.
 *
 * @package     Responsive WordPress theme
 * @subpackage  Controls
 * @since       6.3.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Customizer_Selectbtn_With_Switchers_Control' ) ) :
	/**
	 * Select Button control with device switchers
	 */
	class Responsive_Customizer_Selectbtn_With_Switchers_Control extends WP_Customize_Control {

		/**
		 * The control type.
		 *
		 * @access public
		 * @var string
		 */
		public $type = 'responsive-selectbtn-with-switchers';

		/**
		 * Enqueue control related scripts/styles.
		 *
		 * @access public
		 */
		public function enqueue() {
			wp_enqueue_style( 'responsive-selectbtn', RESPONSIVE_THEME_URI . 'core/includes/customizer/assets/min/css/selectbtn.min.css', null );
			wp_enqueue_style( 'responsive-selectbtn-with-switchers', RESPONSIVE_THEME_URI . 'core/includes/customizer/controls/selectbtn-with-switchers/selectbtn-with-switchers.css', array( 'responsive-selectbtn' ), RESPONSIVE_THEME_VERSION );
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
		 * Refresh the parameters passed to JavaScript via JSON.
		 *
		 * @see WP_Customize_Control::to_json()
		 */
		public function to_json() {
			parent::to_json();
			$this->json['choices']     = $this->choices;
			$this->json['id']          = $this->id;
			$this->json['type']        = $this->type;
			$this->json['description'] = $this->description;

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
		 * Content template.
		 *
		 * @see WP_Customize_Control::print_template()
		 *
		 * @access protected
		 */
		protected function render_content() {}
	}
endif;

