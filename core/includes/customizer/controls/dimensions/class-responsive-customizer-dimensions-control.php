<?php
/**
 * Customizer Control: responsive-dimensions.
 *
 * @package     Responsive WordPress theme
 * @subpackage  Controls
 * @see         https://github.com/aristath/kirki
 * @license     http://opensource.org/licenses/https://opensource.org/licenses/MIT
 * @since       1.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Customizer_Dimensions_Control' ) ) :
	/**
	 * Buttonset control
	 */
	class Responsive_Customizer_Dimensions_Control extends WP_Customize_Control {
		/**
		 * The control type.
		 *
		 * @access public
		 * @var string
		 */
		public $type = 'responsive-dimensions';

		/**
		 * Enqueue control related scripts/styles.
		 *
		 * @access public
		 */
		public function enqueue() {
			wp_localize_script( 'responsive-dimensions', 'responsiveL10n', $this->l10n() );
			wp_enqueue_style( 'responsive-dimensions', RESPONSIVE_THEME_URI . 'core/includes/customizer/assets/min/css/dimensions.min.css', null );
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

			$this->json['id']    = $this->id;
			$this->json['l10n']  = $this->l10n();
			$this->json['title'] = esc_html__( 'Link values together', 'responsive' );

			$this->json['inputAttrs'] = '';
			foreach ( $this->input_attrs as $attr => $value ) {
				$this->json['inputAttrs'] .= $attr . '="' . esc_attr( $value ) . '" ';
			}

			$this->json['desktop'] = array();
			$this->json['tablet']  = array();
			$this->json['mobile']  = array();

			foreach ( $this->settings as $setting_key => $setting ) {

				list( $_key ) = explode( '_', $setting_key );

				$this->json[ $_key ][ $setting_key ] = array(
					'id'    => $setting->id,
					'link'  => $this->get_link( $setting_key ),
					'value' => $this->value( $setting_key ),
				);
			}

		}

		/**
		 * Returns an array of translation strings.
		 *
		 * @access protected
		 * @param string|false $id The string-ID.
		 * @return string
		 */
		protected function l10n( $id = false ) {
			$translation_strings = array(
				'desktop_top'    => esc_attr__( 'Top', 'responsive' ),
				'desktop_right'  => esc_attr__( 'Right', 'responsive' ),
				'desktop_bottom' => esc_attr__( 'Bottom', 'responsive' ),
				'desktop_left'   => esc_attr__( 'Left', 'responsive' ),
				'tablet_top'     => esc_attr__( 'Top', 'responsive' ),
				'tablet_right'   => esc_attr__( 'Right', 'responsive' ),
				'tablet_bottom'  => esc_attr__( 'Bottom', 'responsive' ),
				'tablet_left'    => esc_attr__( 'Left', 'responsive' ),
				'mobile_top'     => esc_attr__( 'Top', 'responsive' ),
				'mobile_right'   => esc_attr__( 'Right', 'responsive' ),
				'mobile_bottom'  => esc_attr__( 'Bottom', 'responsive' ),
				'mobile_left'    => esc_attr__( 'Left', 'responsive' ),
			);
			if ( false === $id ) {
				return $translation_strings;
			}
			return $translation_strings[ $id ];
		}
		/**
		 * Render the control's content.
		 *
		 * @see WP_Customize_Control::render_content()
		 */
		protected function render_content() {}
	}
endif;
