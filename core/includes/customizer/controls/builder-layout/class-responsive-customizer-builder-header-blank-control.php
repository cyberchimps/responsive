<?php
/**
 * Customizer Control: Responsive.
 *
 * @package     Responsive WordPress theme
 * @subpackage  Controls
 * @since       6.1
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return;
}

if ( ! class_exists( 'Responsive_Customizer_Builder_Header_Blank_Control' ) ) :
	/**
	 * Builder control
	 */
	class Responsive_Customizer_Builder_Header_Blank_Control extends WP_Customize_Control {

		/**
		 * The control type.
		 *
		 * @access public
		 * @var string
		 */
		public $type = 'responsive-builder-header-blank-control';

		/**
		 * Content template.
		 *
		 * @see WP_Customize_Control::print_template()
		 *
		 * @access public
		 */
		public function render_content() {
            ?>
            <?php if ( ! empty( $this->label ) ) : ?>
                <span class="customize-control-title"><?php echo ( $this->label ); ?></span>
            <?php endif; ?>
    
            <?php if ( ! empty( $this->description ) ) : ?>
                <span class="responsive-blank-customize-control-description"><?php echo ( $this->description ); ?></span>
            <?php endif; ?>
            <?php
        }
	}
endif;
