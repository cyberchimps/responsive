<?php

class Test_Class_Responsive_Header_Scripts_Customizer extends WP_UnitTestCase {

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
	 * Test the responsive_header_scripts section is registered
	 */
	function test_customizer_options_responsive_header_scripts_section() {

		( new Responsive_Header_Scripts_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_section( 'responsive_header_scripts' ) );

	}

	/**
	 * Test the responsive_theme_options[responsive_inline_js_head] settings are registered
	 */
	function test_customizer_options_res_responsive_inline_js_head_setting() {

		( new Responsive_Header_Scripts_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_theme_options[responsive_inline_js_head]' ) );

	}

	/**
	 * Test the res_responsive_inline_js_head controls are registered
	 */
	function test_customizer_options_res_responsive_inline_js_head_control() {

		( new Responsive_Header_Scripts_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'res_responsive_inline_js_head' ) );

	}



}
