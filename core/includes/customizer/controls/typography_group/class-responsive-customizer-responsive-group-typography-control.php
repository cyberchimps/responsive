<?php
/**
 * Customizer Control: Responsive.
 *
 * @package     Responsive WordPress theme
 * @subpackage  Controls
 * @since       5.1.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Customizer_Typography_Group_Control' ) ) :
	/**
	 * Toggle control
	 */
	class Responsive_Customizer_Typography_Group_Control extends WP_Customize_Control {
        /**
         * The control type.
		 *
         * @access public
         * @var string
		 */
        public $type = 'responsive-typography-settings-group';
        
		/**
         * Enqueue control related scripts/styles.
		 *
         * @access public
		 */
        public function enqueue() {
            // wp_enqueue_style( 'responsive-toggle', RESPONSIVE_THEME_URI . 'core/includes/customizer/assets/min/css/toggle.min.css', null );
		}
        
		/**
         * Refresh the parameters passed to JavaScript via JSON.
		 *
         * @see WP_Customize_Control::to_json()
		 */
        // public function to_json() {
		// 	parent::to_json();
		// 	$this->json['value']       = $this->value();
		// 	$this->json['link']        = $this->get_link();
		// 	$this->json['id']          = $this->id;
		// 	$this->json['type']        = $this->type;
		// 	$this->json['description'] = $this->description;
		// }

		/**
		 * Content template.
		 *
		 * @see WP_Customize_Control::print_template()
		 *
		 * @access protected
		 */
		protected function render_content() {

			/**
			 * @global WP_Customize_Manager $wp_customize
			 */
			global $wp_customize;

			?>
				<div class="responsive-typography-settings-group">
					<span class="customize-control-title maheswar"><?php echo esc_html( $this->label ); ?></span>
					<?php
						// $this->add_typography_control();

						$wp_customize->add_setting(
							// $element . '_typography[font-family]',
							'breadcrumb_typography[font-family]',
							array(
								'type'              => 'theme_mod',
								'transport'         => 'postMessage',
								'sanitize_callback' => 'sanitize_text_field',
							)
						);

						$wp_customize->add_control(
							new Responsive_Customizer_Typography_Control(
								$wp_customize,
								'breadcrumb_typography[font-family]',
								array(
									// 'name'            => $element . '_typography[font-family]',
									// 'label'           => esc_html__( 'Font Family', 'responsive' ),
									// 'section'         => $section,
									// 'responsive_setting_id' => 'responsive_font_family',
									// 'settings'        => $element . '_typography[font-family]',
									// 'priority'        => $priority,
									// 'type'            => 'responsive-typography',
									// 'active_callback' => $active_callback,
									// 'resp_inherit'    => __( 'Default', 'responsive' ),
									// 'connect'         => $element . '_typography[font-weight]',
									'name'            => 'breadcrumb_typography[font-family]',
									'label'           => esc_html__( 'Font Family', 'responsive' ),
									'section'         => 'responsive_breadcrumb_typography',
									'responsive_setting_id' => 'responsive_font_family',
									'settings'        => 'breadcrumb_typography[font-family]',
									'priority'        => 110,
									'type'            => 'responsive-typography',
									'active_callback' => null,
									'resp_inherit'    => __( 'Default', 'responsive' ),
									'connect'         => 'breadcrumb_typography[font-weight]',
								)
							)
						);
					?>
					<!-- <?php error_log( 'content: ' .  print_r($this->add_typography_control(), true) ); ?> -->
				</div>
			<?php
		}

		public function add_typography_control() {

			$responsive_typography_class = new Responsive_Typography_Customizer();

			$selectorArray = $responsive_typography_class->getSelectorArray();

			$responsive_theme_typography_settings = array(
				'breadcrumb'          => array(
					'label'           => esc_html__( 'Typography', 'responsive' ),
					'target'          => $selectorArray['breadcrumb'],
					'priority'        => 110,
					'section'         => 'responsive_breadcrumb',
					'exclude'         => array( 'font-color' ),
					'defaults'        => array(
						'font-size'   => '13px',
						'line-height' => '1.75',
					),
				),
			);

			// $responsive_typography_class->responsive_add_typography_controls_to_customizer( $responsive_theme_typography_settings, $wp_customize );
		}
	}
endif;
