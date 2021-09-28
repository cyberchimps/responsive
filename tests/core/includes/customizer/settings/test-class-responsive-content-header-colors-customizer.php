<?php

class Test_Class_Responsive_Content_Header_Colors_Customizer extends WP_UnitTestCase {

	function setUp() {

		parent::setUp();

		wp_set_current_user( $this->factory->user->create( array( 'role' => 'administrator' ) ) );

		require_once ABSPATH . WPINC . '/class-wp-customize-manager.php';

		global $wp_customize;

		$GLOBALS['wp_customize'] = new WP_Customize_Manager();
		$GLOBALS['wp_customize']->setup_theme();
		$GLOBALS['wp_customize']->register_controls();

		require_once get_parent_theme_file_path( 'core/includes/customizer/settings/class-responsive-content-header-colors-customizer.php' );

	}

	function tearDown() {

		parent::tearDown();

	}

	/**
	 * Test the responsive_content_header_colors section is registered
	 */
	function test_customizer_options_responsive_blog_content_section() {

		( new Responsive_Content_Header_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_section( 'responsive_content_header_colors' ) );

	}

	/**
	 * Test the content_header_heading_color settings are registered
	 */
	function test_customizer_options_content_header_heading_color_setting() {

		( new Responsive_Content_Header_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_content_header_heading_color' ) );

	}

	/**
	 * Test the content_header_heading_color controls are registered
	 */
	function test_customizer_options_content_header_heading_color_control() {

		( new Responsive_Content_Header_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_content_header_heading_color' ) );

	}

	/**
	 * Test the content_header_description_color settings are registered
	 */
	function test_customizer_options_content_header_description_color_setting() {

		( new Responsive_Content_Header_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_content_header_description_color' ) );

	}

	/**
	 * Test the content_header_description_color controls are registered
	 */
	function test_customizer_options_content_header_description_color_control() {

		( new Responsive_Content_Header_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_content_header_description_color' ) );

	}

	/**
	 * Test the breadcrumb_color settings are registered
	 */
	function test_customizer_options_breadcrumb_color_setting() {

		( new Responsive_Content_Header_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_breadcrumb_color' ) );

	}

	/**
	 * Test the breadcrumb_color controls are registered
	 */
	function test_customizer_options_breadcrumb_color_control() {

		( new Responsive_Content_Header_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_breadcrumb_color' ) );

	}



}
