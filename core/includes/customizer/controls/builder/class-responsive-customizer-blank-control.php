<?php
/**
 * The blank customize control extends the WP_Customize_Control class.
 *
 * @package customizer-controls
 */

if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return;
}


/**
 * Class responsive_Control_Blank
 *
 * @access public
 */
class Responsive_Customizer_Blank_Control extends WP_Customize_Control {
	/**
	 * Control type
	 *
	 * @var string
	 */
	public $type = 'responsive_blank_control';

	/**
	 * Render the control in the customizer
	 */
	public function render_content() {
		if ( ! empty( $this->label ) ) :
			?>
			<span class="customize-control-title"><?php echo $this->label; // phpcs:ignore ?></span>
			<?php
		endif;
		if ( ! empty( $this->description ) ) :
			?>
			<span class="customize-control-description hf-builder"><?php echo $this->description; // phpcs:ignore ?></span>
			<?php
		endif;
		?>
		<?php
	}
}
