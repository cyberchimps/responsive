<?php
/**
 * Customizer Control: Responsive.
 *
 * @package     Responsive WordPress theme
 * @subpackage  Controls
 * @since       5.2
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Customizer_Background_Image_Control' ) ) :
	/**
	 * Checkbox control
	 */
	class Responsive_Customizer_Background_Image_Control extends WP_Customize_Image_Control {

		/**
		 * The control type.
		 *
		 * @access public
		 * @var string
		 */
		public $type = 'responsive-background-image';

		/**
		 * Enqueue control related scripts/styles.
		 *
		 * @access public
		 */
		public function enqueue() {
			wp_enqueue_script( 'responsive-customize-controls', trailingslashit( get_template_directory_uri() ) . 'core/includes/js/customize-controls.js', array( 'jquery', 'lodash' ), RESPONSIVE_THEME_VERSION, true );
		}

		/**
		 * Refresh the parameters passed to JavaScript via JSON.
		 *
		 * @see WP_Customize_Control::to_json()
		 */
		public function to_json() {
			parent::to_json();

			$this->json['value'] = array(
				'enable'     => $this->settings['enable']->value(),
				'image_url'  => $this->settings['image_url']->value(),
			);
			$this->json['link'] = array(
				'enable'     => $this->get_link('enable'),
				'image_url'  => $this->get_link('image_url'),
			);
			$this->json['choices']            = $this->choices;
			$this->json['id']                 = $this->id;
			$this->json['type']               = $this->type;
			$this->json['description']        = $this->description;
		}

		/**
		 * Content template.
		 *
		 * @see WP_Customize_Control::print_template()
		 *
		 * @access public
		 */
		public function render_content() {}
	}
endif;
