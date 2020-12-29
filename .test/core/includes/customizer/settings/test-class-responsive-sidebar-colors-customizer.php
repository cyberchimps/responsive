<?php

class Test_Class_Responsive_Sidebar_Colors_Customizer extends WP_UnitTestCase {

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
	 * Test the responsive_sidebar_colors section is registered
	 */
	function test_customizer_options_responsive_sidebar_colors_section() {

		( new Responsive_Sidebar_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_section( 'responsive_sidebar_colors' ) );

	}

	/**
	 * Test the sidebar_headings settings are registered
	 */
	function test_customizer_options_sidebar_headings_color_setting() {

		( new Responsive_Sidebar_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_sidebar_headings_color' ) );

	}

	/**
	 * Test the sidebar_headings controls are registered
	 */
	function test_customizer_options_sidebar_headings_color_control() {

		( new Responsive_Sidebar_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_sidebar_headings_color' ) );

	}


	/**
	 * Test the sidebar_background settings are registered
	 */
	function test_customizer_options_sidebar_background_color_setting() {

		( new Responsive_Sidebar_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_sidebar_background_color' ) );

	}

	/**
	 * Test the sidebar_background controls are registered
	 */
	function test_customizer_options_sidebar_background_color_control() {

		( new Responsive_Sidebar_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_sidebar_background_color' ) );

	}


	/**
	 * Test the sidebar_text settings are registered
	 */
	function test_customizer_options_sidebar_text_color_setting() {

		( new Responsive_Sidebar_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_sidebar_text_color' ) );

	}

	/**
	 * Test the sidebar_text controls are registered
	 */
	function test_customizer_options_sidebar_text_color_control() {

		( new Responsive_Sidebar_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_sidebar_text_color' ) );

	}


	/**
	 * Test the sidebar_link settings are registered
	 */
	function test_customizer_options_sidebar_link_color_setting() {

		( new Responsive_Sidebar_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_sidebar_link_color' ) );

	}

	/**
	 * Test the sidebar_link controls are registered
	 */
	function test_customizer_options_sidebar_link_color_control() {

		( new Responsive_Sidebar_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_sidebar_link_color' ) );

	}


	/**
	 * Test the sidebar_link_hover settings are registered
	 */
	function test_customizer_options_sidebar_link_hover_color_setting() {

		( new Responsive_Sidebar_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_sidebar_link_hover_color' ) );

	}

	/**
	 * Test the sidebar_link_hover controls are registered
	 */
	function test_customizer_options_sidebar_link_hover_color_control() {

		( new Responsive_Sidebar_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_sidebar_link_hover_color' ) );

	}


}
