<?php

class Test_Class_Responsive_Header_Typography_Customizer extends WP_UnitTestCase {

	function setUp() {

		parent::setUp();

		wp_set_current_user( $this->factory->user->create( array( 'role' => 'administrator' ) ) );

		require_once ABSPATH . WPINC . '/class-wp-customize-manager.php';

		global $wp_customize;

		$GLOBALS['wp_customize'] = new WP_Customize_Manager();
		$GLOBALS['wp_customize']->setup_theme();
		$GLOBALS['wp_customize']->register_controls();

	}

	function tearDown() {

		parent::tearDown();

	}

	/**
	 * Test the responsive_header_typography section is registered
	 */
	function test_customizer_options_responsive_header_typography_section() {

		( new Responsive_Header_Typography_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_section( 'responsive_header_typography' ) );

	}

	/**
	 * Test the header_site_title_separator settings are registered
	 */
	function test_customizer_options_header_site_title_separator_setting() {

		( new Responsive_Header_Typography_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_header_site_title_separator' ) );

	}

	/**
	 * Test the header_site_title_separator controls are registered
	 */
	function test_customizer_options_header_site_title_separator_control() {

		( new Responsive_Header_Typography_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_header_site_title_separator' ) );

	}

	/**
	 * Test the header_site_tagline_separator settings are registered
	 */
	function test_customizer_options_header_site_tagline_separator_setting() {

		( new Responsive_Header_Typography_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_header_site_tagline_separator' ) );

	}

	/**
	 * Test the header_site_tagline_separator controls are registered
	 */
	function test_customizer_options_header_site_tagline_separator_control() {

		( new Responsive_Header_Typography_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_header_site_tagline_separator' ) );

	}



}
