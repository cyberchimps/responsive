<?php

class Test_Class_Responsive_Header_Menu_Colors_Customizer extends WP_UnitTestCase {

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
	 * Test the responsive_header_menu_colors section is registered
	 */
	function test_customizer_options_responsive_header_menu_colors_section() {

		( new Responsive_Header_Menu_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_section( 'responsive_header_menu_colors' ) );

	}

	/**
	 * Test the header_menu_background settings are registered
	 */
	function test_customizer_options_header_menu_background_color_setting() {

		( new Responsive_Header_Menu_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_header_menu_background_color' ) );

	}

	/**
	 * Test the header_menu_background controls are registered
	 */
	function test_customizer_options_header_menu_background_color_control() {

		( new Responsive_Header_Menu_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_header_menu_background_color' ) );

	}

	/**
	 * Test the header_menu_border settings are registered
	 */
	function test_customizer_options_header_menu_border_color_setting() {

		( new Responsive_Header_Menu_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_header_menu_border_color' ) );

	}

	/**
	 * Test the header_menu_border controls are registered
	 */
	function test_customizer_options_header_menu_border_color_control() {

		( new Responsive_Header_Menu_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_header_menu_border_color' ) );

	}

	/**
	 * Test the header_active_menu_background settings are registered
	 */
	function test_customizer_options_header_active_menu_background_color_setting() {

		( new Responsive_Header_Menu_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_header_active_menu_background_color' ) );

	}

	/**
	 * Test the header_active_menu_background controls are registered
	 */
	function test_customizer_options_header_active_menu_background_color_control() {

		( new Responsive_Header_Menu_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_header_active_menu_background_color' ) );

	}

	/**
	 * Test the header_menu_link settings are registered
	 */
	function test_customizer_options_header_menu_link_color_setting() {

		( new Responsive_Header_Menu_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_header_menu_link_color' ) );

	}

	/**
	 * Test the header_menu_link controls are registered
	 */
	function test_customizer_options_header_menu_link_color_control() {

		( new Responsive_Header_Menu_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_header_menu_link_color' ) );

	}

	/**
	 * Test the header_menu_link_hover settings are registered
	 */
	function test_customizer_options_header_menu_link_hover_color_setting() {

		( new Responsive_Header_Menu_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_header_menu_link_hover_color' ) );

	}

	/**
	 * Test the header_menu_link_hover controls are registered
	 */
	function test_customizer_options_header_menu_link_hover_color_control() {

		( new Responsive_Header_Menu_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_header_menu_link_hover_color' ) );

	}

	/**
	 * Test the header_sub_menu_background settings are registered
	 */
	function test_customizer_options_header_sub_menu_background_color_setting() {

		( new Responsive_Header_Menu_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_header_sub_menu_background_color' ) );

	}

	/**
	 * Test the header_sub_menu_background controls are registered
	 */
	function test_customizer_options_header_sub_menu_background_color_control() {

		( new Responsive_Header_Menu_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_header_sub_menu_background_color' ) );

	}

	/**
	 * Test the header_sub_menu_link settings are registered
	 */
	function test_customizer_options_header_sub_menu_link_color_setting() {

		( new Responsive_Header_Menu_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_header_sub_menu_link_color' ) );

	}

	/**
	 * Test the header_sub_menu_link controls are registered
	 */
	function test_customizer_options_header_sub_menu_link_color_control() {

		( new Responsive_Header_Menu_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_header_sub_menu_link_color' ) );

	}

	/**
	 * Test the header_sub_menu_link_hover settings are registered
	 */
	function test_customizer_options_header_sub_menu_link_hover_color_setting() {

		( new Responsive_Header_Menu_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_header_sub_menu_link_hover_color' ) );

	}

	/**
	 * Test the header_sub_menu_link_hover controls are registered
	 */
	function test_customizer_options_header_sub_menu_link_hover_color_control() {

		( new Responsive_Header_Menu_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_header_sub_menu_link_hover_color' ) );

	}

	/**
	 * Test the header_menu_toggle_background settings are registered
	 */
	function test_customizer_options_header_menu_toggle_background_color_setting() {

		( new Responsive_Header_Menu_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_header_menu_toggle_background_color' ) );

	}

	/**
	 * Test the header_menu_toggle_background controls are registered
	 */
	function test_customizer_options_header_menu_toggle_background_color_control() {

		( new Responsive_Header_Menu_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_header_menu_toggle_background_color' ) );

	}

	/**
	 * Test the header_menu_toggle settings are registered
	 */
	function test_customizer_options_header_menu_toggle_color_setting() {

		( new Responsive_Header_Menu_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_header_menu_toggle_color' ) );

	}

	/**
	 * Test the header_menu_toggle controls are registered
	 */
	function test_customizer_options_header_menu_toggle_color_control() {

		( new Responsive_Header_Menu_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_header_menu_toggle_color' ) );

	}

}
