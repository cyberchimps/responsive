<?php

class Test_Class_Responsive_Header_Menu_Layouts_Customizer extends WP_UnitTestCase {

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
	 * Test the responsive_header_menu_layout section is registered
	 */
	function test_customizer_options_responsive_header_menu_layout_section() {

		( new Responsive_Header_Menu_Layouts_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_section( 'responsive_header_menu_layout' ) );

	}

	/**
	 * Test the header_menu_full_width settings are registered
	 */
	function test_customizer_options_header_menu_full_width_setting() {

		( new Responsive_Header_Menu_Layouts_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_header_menu_full_width' ) );

	}

	/**
	 * Test the header_menu_full_width controls are registered
	 */
	function test_customizer_options_header_menu_full_width_control() {

		( new Responsive_Header_Menu_Layouts_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_header_menu_full_width' ) );

	}

	/**
	 * Test the disable_mobile_menu settings are registered
	 */
	function test_customizer_options_disable_mobile_menu_setting() {

		( new Responsive_Header_Menu_Layouts_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_disable_mobile_menu' ) );

	}

	/**
	 * Test the disable_mobile_menu controls are registered
	 */
	function test_customizer_options_disable_mobile_menu_control() {

		( new Responsive_Header_Menu_Layouts_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_disable_mobile_menu' ) );

	}

	/**
	 * Test the mobile_menu_breakpoint settings are registered
	 */
	function test_customizer_options_mobile_menu_breakpoint_setting() {

		( new Responsive_Header_Menu_Layouts_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_mobile_menu_breakpoint' ) );

	}

	/**
	 * Test the mobile_menu_breakpoint controls are registered
	 */
	function test_customizer_options_mobile_menu_breakpoint_control() {

		( new Responsive_Header_Menu_Layouts_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_mobile_menu_breakpoint' ) );

	}

	/**
	 * Test the mobile_menu_style settings are registered
	 */
	function test_customizer_options_mobile_menu_style_setting() {

		( new Responsive_Header_Menu_Layouts_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_mobile_menu_style' ) );

	}

	/**
	 * Test the mobile_menu_style controls are registered
	 */
	function test_customizer_options_mobile_menu_style_control() {

		( new Responsive_Header_Menu_Layouts_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_mobile_menu_style' ) );

	}

	/**
	 * Test the sidebar_menu_alignment settings are registered
	 */
	function test_customizer_options_sidebar_menu_alignment_setting() {

		( new Responsive_Header_Menu_Layouts_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_sidebar_menu_alignment' ) );

	}

	/**
	 * Test the blog_entry_elements_separator controls are registered
	 */
	function test_customizer_options_sidebar_menu_alignment_control() {

		( new Responsive_Header_Menu_Layouts_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_sidebar_menu_alignment' ) );

	}



}
