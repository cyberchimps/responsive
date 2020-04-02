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
			wp_localize_script(
				'responsive-typography-weight',
				'responsive',
				array(
					'googleFonts' => responsive_get_google_fonts(),
					'weigthMap'   => $this->all_font_weight,
					'std_fonts'   => responsive_standard_fonts(),

				)
			);
		}

		/**
		 * Render the control's content.
		 * Allows the content to be overriden without having to rewrite the wrapper in $this->render().
		 *
		 * @access protected
		 */
		protected function render_content() {
			switch ( $this->responsive_setting_id ) {

				case 'responsive_font_family':
					$this->render_font_family();
					break;

				case 'responsive_font_weight':
					$this->render_font_weight();
					break;
			}
		}

		/**
		 * Renders the title and description for a control.
		 *
		 * @access protected
		 * @return void
		 */
		protected function render_content_title() {
			if ( ! empty( $this->label ) ) {
				echo '<span class="customize-control-title">' . esc_html( $this->label ) . '</span>';
			}
			if ( ! empty( $this->description ) ) {
				echo '<span class="description customize-control-description">' . esc_html( $this->description ) . '</span>';
			}
		}

		/**
		 * Renders the connect attribute for a connected control.
		 *
		 * @access protected
		 * @return void
		 */
		protected function render_connect_attribute() {
			if ( $this->connect ) {
				echo ' data-connected-control="' . esc_attr( $this->connect ) . '"';
				echo ' data-inherit="' . esc_attr( $this->resp_inherit ) . '"';
			}

			echo ' data-value="' . esc_attr( $this->value() ) . '"';
			echo ' data-name="' . esc_attr( $this->name ) . '"';
		}

		/**
		 * Renders a font weight control.
		 *
		 * @access protected
		 * @return void
		 */
		protected function render_font_weight() {
			$this_val = $this->value();
			echo '<label>';
			$this->render_content_title();
			echo '</label>';
			echo '<select ';
			$this->link();
			$this->render_connect_attribute();
			echo '>';

			$all_fonts = $this->all_font_weight;
			foreach ( $all_fonts as $key => $value ) {
				if ( '400' === $key ) {
					$selected = ' selected = "selected" ';
				} else {
					$selected = '';
				}
				// Exclude all italic values.
				if ( strpos( $key, 'italic' ) === false ) {
					echo '<option value="' . esc_attr( $key ) . '"' . esc_attr( $selected ) . '>' . esc_attr( $value ) . '</option>';
				}
			}
			echo '</select>';
		}

		/**
		 * Renders a font family control.
		 *
		 * @access protected
		 * @return void
		 */
		protected function render_font_family() {
			$this_val = $this->value();?>
		<label>
				<?php if ( ! empty( $this->label ) ) : ?>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<?php endif; ?>
				<?php if ( ! empty( $this->description ) ) : ?>
				<span class="description customize-control-description"><?php echo wp_kses_post( $this->description ); ?></span>
			<?php endif; ?>

			<select class="responsive-typography-select responsive-font-family-select"
					<?php
					$this->link();
					$this->render_connect_attribute();
					?>
			>
				<option value=""
					<?php
					if ( ! $this_val ) {
						echo 'selected="selected"';}
					?>
				><?php esc_html_e( 'Arial, Helvetica, sans-serif', 'responsive' ); ?></option>
					<?php
					// Add custom fonts from child themes.
					if ( function_exists( 'responsive_add_custom_fonts' ) ) {
						$fonts = responsive_add_custom_fonts();
						if ( $fonts && is_array( $fonts ) ) {
							?>
						<optgroup label="<?php esc_html_e( 'Custom Fonts', 'responsive' ); ?>">
							<?php foreach ( $fonts as $font ) { ?>
								<option value="<?php echo esc_html( $font[0] ); ?>"
									<?php
									if ( $font[0] === $this_val ) {
										echo 'selected="selected"';}
									?>
								><?php echo esc_html( $font[0] ); ?></option>
							<?php } ?>
						</optgroup>
							<?php
						}
					}

					// Get Standard font options.
					if ( $std_fonts = responsive_standard_fonts() ) {//phpcs:ignore
						?>
					<optgroup label="<?php esc_html_e( 'Standard Fonts', 'responsive' ); ?>">
						<?php
						// Loop through font options and add to select.
						foreach ( $std_fonts as $key => $font ) {
							?>
							<option value="<?php echo esc_html( $key ); ?>" <?php selected( $key, $this_val ); ?>><?php echo esc_html( $key ); ?></option>
						<?php } ?>
					</optgroup>
						<?php
					}

					// Google font options.
					if ( $google_fonts = responsive_get_google_fonts() ) {//phpcs:ignore
						?>
					<optgroup label="<?php esc_html_e( 'Google Fonts', 'responsive' ); ?>">

						<?php
						// Loop through font options and add to select.
						foreach ( $google_fonts as $name => $single_font ) {
							$variants = $this->responsive_get_prop( $single_font, '0' );
							$category = $this->responsive_get_prop( $single_font, '1' );
							echo '<option value="\'' . esc_attr( $name ) . '\', ' . esc_attr( $category ) . '" ' . selected( $name, $this->value(), false ) . '>' . esc_attr( $name ) . '</option>';
						}
						?>
					</optgroup>
					<?php } ?>
			</select>

		</label>
			<?php
		}

		/**
		 * Function for sanitizing footer layout
		 *
		 * @param array  $array Default argument array.
		 *
		 * @param object $prop Default argument property.
		 *
		 * @param object $default Default argument array.
		 */
		public function responsive_get_prop( $array, $prop, $default = null ) {

			if ( ! is_array( $array ) && ! ( is_object( $array ) && $array instanceof ArrayAccess ) ) {
				return $default;
			}

			if ( isset( $array[ $prop ] ) ) {
				$value = $array[ $prop ];
			} else {
				$value = '';
			}

			return empty( $value ) && null !== $default ? $default : $value;
		}
	}
endif;
