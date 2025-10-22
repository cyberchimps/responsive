<?php
/**
 * Customizer Control: Flush Local Fonts Cache Button
 *
 * @package     Responsive WordPress theme
 * @subpackage  Controls
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! class_exists( 'Responsive_Customizer_Flush_Fonts_Control' ) ) :
    /**
     * Flush Local Fonts button control.
     */
    class Responsive_Customizer_Flush_Fonts_Control extends WP_Customize_Control {

        /**
         * Control type.
         *
         * @var string
         */
        public $type = 'responsive-flush-fonts';

        /**
         * Button text shown on the control.
         *
         * @var string
         */
        public $button_text = '';

        /**
         * Enqueue scripts/styles.
         */
        public function enqueue() {
            wp_enqueue_style( 'responsive-flush-fonts', RESPONSIVE_THEME_URI . 'core/includes/customizer/assets/min/css/flush-button.min.css', null, RESPONSIVE_THEME_VERSION );

            $handle = 'responsive-flush-local-fonts-control';
            wp_enqueue_script( $handle, RESPONSIVE_THEME_URI . 'core/includes/customizer/assets/js/flush-local-fonts-control.js', array( 'customize-controls' ), RESPONSIVE_THEME_VERSION, true );
            wp_localize_script( $handle, 'responsiveFlushFonts', array(
                'ajaxurl' => admin_url( 'admin-ajax.php' ),
                'nonce'   => wp_create_nonce( 'responsive-flush-local-fonts' ),
                'i18n'    => array(
                    'success' => esc_html__( 'Local fonts cache flushed', 'responsive' ),
                    'error'   => esc_html__( 'Something went wrong. Please try again.', 'responsive' ),
                ),
            ) );
        }

        /**
         * Pass data to JS.
         */
        public function to_json() {
            parent::to_json();
            $this->json['type']        = $this->type;
            $this->json['label']       = $this->label;
            $this->json['description'] = $this->description;
            $this->json['button_text'] = $this->button_text ? $this->button_text : esc_html__( 'Flush Cache', 'responsive' );
            $this->json['id']          = $this->id;
        }

        /**
         * PHP renders nothing; React will render content.
         */
        protected function render_content() {}
    }
endif;


