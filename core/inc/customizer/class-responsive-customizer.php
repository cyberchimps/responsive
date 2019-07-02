<?php
/**
 * Responsive Theme Customizer
 *
 * @package     Cyberchimps
 * @author      kajal
 * @copyright   Copyright (c) 2019, Cyberchimps
 * @link        https://cyberchmips.com/
 * @since       Responsive 1.0.0
 */

/**
 * Customizer Loader
 */
if ( ! class_exists( 'Responsive_Customizer' ) ) {

	/**
	 * Customizer Loader
	 *
	 * @since 1.0.0
	 */
	class Responsive_Customizer {

		/**
		 * Instance
		 *
		 * @access private
		 * @var object
		 */
		private static $instance;

		/**
		 * Customizer Configurations.
		 *
		 * @access Private
		 * @since 1.4.3
		 * @var Array
		 */
		private static $configuration;

		/**
		 * Customizer Dependency Array.
		 *
		 * @access Private
		 * @since 1.4.3
		 * @var array
		 */
		private static $_dependency_arr = array();

		/**
		 * Initiator
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self();
			}
			return self::$instance;
		}
		/**
		 * Constructor
		 */
		public function __construct() {

			/**
			 * Customizer
			 */
			add_action( 'customize_register', array( $this, 'include_configurations' ), 2 );
			add_action( 'customize_register', array( $this, 'register_customizer_settings' ) );
			//add_action( 'customize_register', array( $this, 'customize_register_panel' ), 2 );

		}
		/**
		 * Process and Register Customizer Panels, Sections, Settings and Controls.
		 *
		 * @param WP_Customize_Manager $wp_customize Reference to WP_Customize_Manager.
		 * @since 3.15
		 * @return void
		 */
		public function register_customizer_settings( $wp_customize ) {

			$configurations = $this->get_customizer_configurations( $wp_customize );
			foreach ( $configurations as $key => $config ) {
				$config = wp_parse_args( $config, $this->get_responsive_customizer_configuration_defaults() );

				switch ( $config['type'] ) {
					case 'panel':
						// Remove type from configuration.
						unset( $config['type'] );

						$this->register_panel( $config, $wp_customize );

						break;

					case 'section':
						// Remove type from configuration.
						unset( $config['type'] );

						$this->register_section( $config, $wp_customize );

						break;

					case 'control':
						// Remove type from configuration.
						unset( $config['type'] );
						error_log('control');
						$this->register_setting_control( $config, $wp_customize );

						break;
				}
			}

		}
		/**
		 * Filter and return Customizer Configurations.
		 *
		 * @param WP_Customize_Manager $wp_customize Reference to WP_Customize_Manager.
		 * @since 3.15
		 * @return Array Customizer Configurations for registering Sections/Panels/Controls.
		 */
		private function get_customizer_configurations( $wp_customize ) {
			if ( ! is_null( self::$configuration ) ) {
				return self::$configuration;
			}

			return apply_filters( 'responsive_customizer_configurations', array(), $wp_customize );
		}
		/**
		 * Return default values for the Customize Configurations.
		 *
		 * @since 1.4.3
		 * @return Array default values for the Customizer Configurations.
		 */
		private function get_responsive_customizer_configuration_defaults() {
			return apply_filters(
				'responsive_customizer_configuration_defaults',
				array(
					'priority'             => null,
					'title'                => null,
					'label'                => null,
					'name'                 => null,
					'type'                 => null,
					'description'          => null,
					'capability'           => null,
					'datastore_type'       => 'option', // theme_mod or option. Default option.
					'settings'             => null,
					'active_callback'      => null,
					'sanitize_callback'    => null,
					'sanitize_js_callback' => null,
					'theme_supports'       => null,
					'transport'            => null,
					'default'              => null,
					'selector'             => null,
				)
			);
		}
		/**
		 * Register custom section and panel.
		 *
		 * @since 1.0.0
		 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
		 */
		function customize_register_panel( $wp_customize ) {
			// require get_template_directory() . '/inc/customizer/class-responsive-customizer-control-base.php';
			// error_log('customize_register_panel');
			// Responsive_Customizer_Control_Base::add_control(
			// 	'image',
			// 	array(
			// 		'callback'          => 'WP_Customize_Image_Control',
			// 	)
			// );
		}
		/**
		 * Register Customizer Panel.
		 *
		 * @param Array                $config Panel Configuration settings.
		 * @param WP_Customize_Manager $wp_customize instance of WP_Customize_Manager.
		 * @since 1.4.3
		 * @return void
		 */
		private function register_panel( $config, $wp_customize ) {
			$wp_customize->add_panel( new Astra_WP_Customize_Panel( $wp_customize, responsive_get_prop( $config, 'name' ), $config ) );
		}

		/**
		 * Register Customizer Section.
		 *
		 * @param Array                $config Panel Configuration settings.
		 * @param WP_Customize_Manager $wp_customize instance of WP_Customize_Manager.
		 * @since 1.4.3
		 * @return void
		 */
		private function register_section( $config, $wp_customize ) {

			$callback = responsive_get_prop( $config, 'section_callback', 'Astra_WP_Customize_Section' );

			$wp_customize->add_section( new $callback( $wp_customize, responsive_get_prop( $config, 'name' ), $config ) );
		}

		/**
		 * Register Customizer Control and Setting.
		 *
		 * @param Array                $config Panel Configuration settings.
		 * @param WP_Customize_Manager $wp_customize instance of WP_Customize_Manager.
		 * @since 1.4.3
		 * @return void
		 */
		private function register_setting_control( $config, $wp_customize ) {

			$wp_customize->add_setting(
				responsive_get_prop( $config, 'name' ),
				array(
					'default'           => responsive_get_prop( $config, 'default' ),
					'type'              => responsive_get_prop( $config, 'datastore_type' ),
					'transport'         => responsive_get_prop( $config, 'transport', 'refresh' ),

				)
			);

			//$instance = Astra_Customizer_Control_Base::get_control_instance( responsive_get_prop( $config, 'control' ) );

			$config['label'] = responsive_get_prop( $config, 'title' );
			$config['type']  = responsive_get_prop( $config, 'control' );

			// For ast-font control font-weight and font-family is passed as param `font-type` which needs to be converted to `type`.
			if ( false !== responsive_get_prop( $config, 'font-type', false ) ) {
				$config['type'] = responsive_get_prop( $config, 'font-type', false );
			}

			// if ( false !== $instance ) {
			// 	$wp_customize->add_control(
			// 		new $instance( $wp_customize, responsive_get_prop( $config, 'name' ), $config )
			// 	);
			// } else {
				$wp_customize->add_control( responsive_get_prop( $config, 'name' ), $config );
			//}

			if ( responsive_get_prop( $config, 'partial', false ) ) {

				if ( isset( $wp_customize->selective_refresh ) ) {
					$wp_customize->selective_refresh->add_partial(
						responsive_get_prop( $config, 'name' ),
						array(
							'selector'            => responsive_get_prop( $config['partial'], 'selector' ),
							'container_inclusive' => responsive_get_prop( $config['partial'], 'container_inclusive' ),
							'render_callback'     => responsive_get_prop( $config['partial'], 'render_callback' ),
						)
					);
				}
			}

			if ( false !== responsive_get_prop( $config, 'required', false ) ) {
				$this->update_dependency_arr( responsive_get_prop( $config, 'name' ), responsive_get_prop( $config, 'required' ) );
			}

		}

		/**
		 * Update dependency in the dependency array.
		 *
		 * @param String $key name of the Setting/Control for which the dependency is added.
		 * @param Array  $dependency dependency of the $name Setting/Control.
		 * @since 1.4.3
		 * @return void
		 */
		private function update_dependency_arr( $key, $dependency ) {
			self::$_dependency_arr[ $key ] = $dependency;
		}

		/**
		 * Get dependency Array.
		 *
		 * @since 1.4.3
		 * @return Array Dependencies discovered when registering controls and settings.
		 */
		private function get_dependency_arr() {
			return self::$_dependency_arr;
		}
		/**
		 * Include Customizer Configuration files.
		 *
		 * @since 1.4.3
		 * @return void
		 */
		public function include_configurations() {

			require get_template_directory() . '/core/inc/customizer/configurations/class-responsive-customizer-config-base.php';

			/**
			 * Register Sections & Panels
			 */
			//require ASTRA_THEME_DIR . 'inc/customizer/class-responsive-customizer-register-sections-panels.php';

			require get_template_directory() . '/core/inc/customizer/configurations/siteidentity/class-responsive-customizer-siteidentity-configs.php';


		}
	}
}
/**
 *  Kicking this off by calling 'get_instance()' method
 */
Responsive_Customizer::get_instance();
