<?php

class Test_Class_Responsive_Content_Header_Layout_Customizer extends WP_UnitTestCase {

	function setUp() {

		parent::setUp();

		wp_set_current_user( $this->factory->user->create( array( 'role' => 'administrator' ) ) );

		require_once ABSPATH . WPINC . '/class-wp-customize-manager.php';

		global $wp_customize;

		$GLOBALS['wp_customize'] = new WP_Customize_Manager();
		$GLOBALS['wp_customize']->setup_theme();
		$GLOBALS['wp_customize']->register_controls();

		require_once get_parent_theme_file_path( 'core/includes/customizer/settings/class-responsive-content-header-layout-customizer.php' );

	}

	function tearDown() {

		parent::tearDown();

	}

	/**
	 * Test the responsive_blog_content section is registered
	 */
	function test_customizer_options_responsive_blog_content_section() {

		( new Responsive_Content_Header_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_section( 'responsive_content_header_layout' ) );

	}

	/**
	 * Test the responsive_theme_options[breadcrumb] settings are registered
	 */
	function test_customizer_options_res_breadcrumb_setting() {

		( new Responsive_Content_Header_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_theme_options[breadcrumb]' ) );

	}

	/**
	 * Test the res_breadcrumb controls are registered
	 */
	function test_customizer_options_res_breadcrumb_control() {

		( new Responsive_Content_Header_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'res_breadcrumb' ) );

	}


	/**
	 * Test the breadcrumb_position settings are registered
	 */
	function test_customizer_options_breadcrumb_position_setting() {

		( new Responsive_Content_Header_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_breadcrumb_position' ) );

	}

	/**
	 * Test the breadcrumb_position controls are registered
	 */
	function test_customizer_options_breadcrumb_position_control() {

		( new Responsive_Content_Header_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_breadcrumb_position' ) );

	}

	/**
	 * Test the content_header_alignment settings are registered
	 */
	function test_customizer_options_content_header_alignment_setting() {

		( new Responsive_Content_Header_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_content_header_alignment' ) );

	}

	/**
	 * Test the content_header_alignment controls are registered
	 */
	function test_customizer_options_content_header_alignment_control() {

		( new Responsive_Content_Header_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_content_header_alignment' ) );

	}



}
