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
	}

	/**
	 * Render the control's content.
	 * Allows the content to be overriden without having to rewrite the wrapper in $this->render().
	 *
	 * @access protected
	 */
	protected function render_content() {
		$this_val = $this->value(); ?>
		<label>
			<?php if ( ! empty( $this->label ) ) : ?>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<?php endif; ?>
			<?php if ( ! empty( $this->description ) ) : ?>
				<span class="description customize-control-description"><?php echo wp_kses_post( $this->description ); ?></span>
			<?php endif; ?>

			<select class="responsive-typography-select" <?php $this->link(); ?>>
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
								<option value="<?php echo esc_html( $font ); ?>"
									<?php
									if ( $font == $this_val ) {
											echo 'selected="selected"';}
									?>
								><?php echo esc_html( $font ); ?></option>
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
						foreach ( $std_fonts as $font ) {
							?>
							<option value="<?php echo esc_html( $font ); ?>" <?php selected( $font, $this_val ); ?>><?php echo esc_html( $font ); ?></option>
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
