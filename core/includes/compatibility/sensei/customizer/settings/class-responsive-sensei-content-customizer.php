<?php
/**
 * Create Sensei Content section in customizer
 *
 * @package Responsive
 */

if ( class_exists( 'Sensei_Main' ) ) {
	/**
	 * Sensei Customizer Options
	 *
	 * @package Responsive WordPress theme
	 */

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	if ( ! class_exists( 'Responsive_Sensei_Content_Customizer' ) ) :
		/**
		 * Links Customizer Options
		 */
		class Responsive_Sensei_Content_Customizer {

			/**
			 * Setup class.
			 *
			 * @since 4.3.0
			 */
			public function __construct() {

				add_action( 'customize_register', array( $this, 'customizer_options' ) );

			}


			/**
			 * Customizer options
			 *
			 * @param  object $wp_customize WordPress customization option.
			 * @since 4.3.0
			 */
			public function customizer_options( $wp_customize ) {
				$wp_customize->add_section(
					'responsive_sensei_content',
					array(
						'title'    => esc_html__( 'Content', 'responsive' ),
						'panel'    => 'responsive-sensei-settings',
						'priority' => 10,
					)
				);

				// Excerpt Length.
				$sensei_archive_excerpt_length_label = esc_html__( 'Excerpt Length', 'responsive' );
				responsive_drag_number_control( $wp_customize, 'sensei_excerpt_length', $sensei_archive_excerpt_length_label, 'responsive_sensei_content', 10, 40, '', 500 );

				// Read More Text.
				$sensei_archive_read_more_text_label = esc_html__( 'Enroll Text', 'responsive' );
				responsive_text_control( $wp_customize, 'sensei_read_more_text', $sensei_archive_read_more_text_label, 'responsive_sensei_content', 20, 'Enroll &raquo;', '' );
			}
		}

	endif;

	return new Responsive_Sensei_Content_Customizer();

}
