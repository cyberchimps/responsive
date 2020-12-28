<?php

class Test_Class_Responsive_Content_Header_Typography_Customizer extends WP_UnitTestCase {

	function setUp() {

		parent::setUp();

		wp_set_current_user( $this->factory->user->create( array( 'role' => 'administrator' ) ) );

		require_once ABSPATH . WPINC . '/class-wp-customize-manager.php';

		global $wp_customize;

		$GLOBALS['wp_customize'] = new WP_Customize_Manager();
		$GLOBALS['wp_customize']->setup_theme();
		$GLOBALS['wp_customize']->register_controls();

		require_once get_parent_theme_file_path( 'core/includes/customizer/settings/class-responsive-content-header-typography-customizer.php' );
	}

	function tearDown() {

		parent::tearDown();

	}

	/**
	 * Test the responsive_content_header_typography section is registered
	 */
	function test_customizer_options_responsive_content_header_typography_section() {

		( new Responsive_Content_Header_Typography_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_section( 'responsive_content_header_typography' ) );

	}

	/**
	 * Test the content_header_heading settings are registered
	 */
	function test_customizer_options_content_header_heading_setting() {

		( new Responsive_Content_Header_Typography_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_content_header_heading' ) );

	}

	/**
	 * Test the content_header_heading controls are registered
	 */
	function test_customizer_options_content_header_heading_control() {

		( new Responsive_Content_Header_Typography_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_content_header_heading' ) );

	}
	/**
	 * Test the description settings are registered
	 */
	function test_customizer_options_description_setting() {

		( new Responsive_Content_Header_Typography_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_description' ) );

	}

	/**
	 * Test the description controls are registered
	 */
	function test_customizer_options_description_control() {

		( new Responsive_Content_Header_Typography_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_description' ) );

	}
	/**
	 * Test the breadcrumb settings are registered
	 */
	function test_customizer_options_breadcrumb_setting() {

		( new Responsive_Content_Header_Typography_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_breadcrumb' ) );

	}

	/**
	 * Test the breadcrumb controls are registered
	 */
	function test_customizer_options_breadcrumb_control() {

		( new Responsive_Content_Header_Typography_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_breadcrumb' ) );

	}



}
