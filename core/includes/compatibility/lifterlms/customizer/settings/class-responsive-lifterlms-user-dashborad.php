<?php
/**
 * Create LifterLMS Content section in customizer
 *
 * @package Responsive
 */

if (class_exists('LifterLMS')) {
	/**
	 * LifterLMS Customizer Options
	 *
	 * @package Responsive WordPress theme
	 */

	if (!defined('ABSPATH')) {
		exit;
	}
    
	if (!class_exists('Responsive_LifterLMS_Dashboard_Customizer')) :
		/**
         * Links Customizer Options
		 */
        class Responsive_LifterLMS_Dashboard_Customizer
		{
            /**
             * Setup class.
			 *
             * @since 4.8.2
			 */
            public function __construct()
			{
				add_action('customize_register', array($this, 'customizer_options'));
			}

			/**
			 * Customizer options
			 *
			 * @param  object $wp_customize WordPress customization option.
			 * @since 4.8.2
			 */
			public function customizer_options($wp_customize)
			{

				$wp_customize->add_section(
					'responsive_lifterlms_user_dashboard',
					array(
						'title'         => __('User Dashboard', 'responsive'),
						'priority'      => 6,
						'panel'         => 'responsive_lifterlms'
					)
				);
                $wp_customize->add_setting( 'lifterlms_navigation_layout' , array(
                    'default'     => 'above',
                    'transport'   => 'refresh',
                    'sanitize_callback' => 'responsive_sanitize_select',
                ) );
    
				$wp_customize->add_control( new Responsive_Customizer_Select_Button_Control( $wp_customize, 'lifterlms_navigation_layout', array(
					'label'	=>  'Navigation Layout',
					'choices' 	=> array(
						'left'          => esc_html__( 'dashicons-editor-alignleft', 'responsive' ),
						'above' => esc_html__( 'dashicons-editor-aligncenter', 'responsive' ),
						'right'         => esc_html__( 'dashicons-editor-alignright', 'responsive' )
					),
					'section' => 'responsive_lifterlms_user_dashboard',
				) ) );
				$wp_customize->add_setting( 'lifterlms_dashboard_course_columns' , array(
                    'default'     => '3',
                    'transport'   => 'refresh',
                    'sanitize_callback' => 'responsive_sanitize_select',
                ) );
				$wp_customize->add_control( new Responsive_Customizer_Select_Control( $wp_customize, 'lifterlms_dashboard_course_columns', array(
					'label'	=>  'Number of Columns',
					'choices' 	=> array(
					'2'         => esc_html__( "2", 'responsive' ),
					'3' => esc_html__( "3", 'responsive' ),
					'4'          => esc_html__( "4", 'responsive' ),
					),
					'section' => 'responsive_lifterlms_user_dashboard',
				) ) );
			}
		} 

	endif;

	return new Responsive_LifterLMS_Dashboard_Customizer();
}