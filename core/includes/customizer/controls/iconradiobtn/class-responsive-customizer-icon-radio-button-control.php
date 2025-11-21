<?php
/**
 * Customizer Control: Responsive
 * 
 * @package Responsive Wordpress Theme
 * @subpackage Controls
 * @since 6.2.9
 */

// Exit if accessed directly.
if( ! defined( 'ABSPATH' ) ) {
    exit;
}

if( ! class_exists( 'Responsive_Customizer_Icon_Radio_Button_Control' ) ) :
    /*
    * Customizer Control: Responsive Icon Radio Button
    *
    * @package Responsive Wordpress Theme
    * @subpackage Controls
    * @since 6.2.9
    */
    class Responsive_Customizer_Icon_Radio_Button_Control extends WP_Customize_Control {

        /**
         * The control type
         *
         * @access public
         * @var string
         */
        public $type = 'responsive-icon-radio-btn';
        public $icon_ext; 

        public function __construct( $manager, $id, $args = array() ) {
            parent::__construct( $manager, $id, $args );
            $this->icon_ext = isset( $args['icon_ext'] ) ? $args['icon_ext'] : 'svg';
        }

        /**
         * Enqueue control related scripts/styles
         * 
         * @access public
         */
        public function enqueue() {
            wp_enqueue_style( 'responsive_icon_radio_btn', RESPONSIVE_THEME_URI . 'core/includes/customizer/assets/min/css/iconradiobtn.min.css', null );
        }

        /**
         * Refresh the parameters passed to Javascript via JSON
         * 
         * @see WP_Customize_Control::to_json()
         */
        public function to_json() {
            parent::to_json();
            $this->json['value' ]      = $this->value();
            $this->json['choices']     = $this->choices;
            $this->json['link']        = $this->get_link();
            $this->json['id']          = $this->id;
            $this->json['type']        = $this->type;
            $this->json['description'] = $this->description;
            $this->json['icon_ext']    = $this->icon_ext;
        }

        /**
         * Content template
         * 
         * @see WP_Customize_Control::print_template()
         * 
         * @access protected
         */protected function render_content() {}
    }
endif;