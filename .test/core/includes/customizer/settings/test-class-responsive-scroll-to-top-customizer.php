<?php

class Test_Class_Responsive_Scroll_To_Top_Customizer extends WP_UnitTestCase {

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
	 * Test the responsive_scrolltotop_section section is registered
	 */
	function test_customizer_options_responsive_scrolltotop_section_section() {

		( new Responsive_Scroll_To_Top_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_section( 'responsive_scrolltotop_section' ) );

	}

	/**
	 * Test the responsive_scroll_to_top settings are registered
	 */
	function test_customizer_options_responsive_scroll_to_top_setting() {

		( new Responsive_Scroll_To_Top_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_scroll_to_top' ) );

	}

	/**
	 * Test the responsive_scroll_to_top controls are registered
	 */
	function test_customizer_options_responsive_scroll_to_top_control() {

		( new Responsive_Scroll_To_Top_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_scroll_to_top' ) );

	}

	/**
	 * Test the responsive_scroll_to_top_on_devices settings are registered
	 */
	function test_customizer_options_responsive_scroll_to_top_on_devices_setting() {

		( new Responsive_Scroll_To_Top_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_scroll_to_top_on_devices' ) );

	}

	/**
	 * Test the responsive_scroll_to_top_on_devices controls are registered
	 */
	function test_customizer_options_responsive_scroll_to_top_on_devices_control() {

		( new Responsive_Scroll_To_Top_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_scroll_to_top_on_devices' ) );

	}

	/**
	 * Test the responsive_scroll_to_top_icon_position settings are registered
	 */
	function test_customizer_options_responsive_scroll_to_top_icon_position_setting() {

		( new Responsive_Scroll_To_Top_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_scroll_to_top_icon_position' ) );

	}

	/**
	 * Test the responsive_scroll_to_top_icon_position controls are registered
	 */
	function test_customizer_options_responsive_scroll_to_top_icon_position_control() {

		( new Responsive_Scroll_To_Top_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_scroll_to_top_icon_position' ) );

	}

	/**
	 * Test the responsive_scroll_to_top_icon_size settings are registered
	 */
	function test_customizer_options_responsive_scroll_to_top_icon_size_setting() {

		( new Responsive_Scroll_To_Top_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_scroll_to_top_icon_size' ) );

	}

	/**
	 * Test the responsive_scroll_to_top_icon_size controls are registered
	 */
	function test_customizer_options_responsive_scroll_to_top_icon_size_control() {

		( new Responsive_Scroll_To_Top_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_scroll_to_top_icon_size' ) );

	}

	/**
	 * Test the responsive_scroll_to_top_icon_radius settings are registered
	 */
	function test_customizer_options_responsive_scroll_to_top_icon_radius_setting() {

		( new Responsive_Scroll_To_Top_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_scroll_to_top_icon_radius' ) );

	}

	/**
	 * Test the responsive_scroll_to_top_icon_radius controls are registered
	 */
	function test_customizer_options_responsive_scroll_to_top_icon_radius_control() {

		( new Responsive_Scroll_To_Top_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_scroll_to_top_icon_radius' ) );

	}

	/**
	 * Test the responsive_scroll_to_top_icon_color settings are registered
	 */
	function test_customizer_options_responsive_scroll_to_top_icon_color_setting() {

		( new Responsive_Scroll_To_Top_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_scroll_to_top_icon_color' ) );

	}

	/**
	 * Test the responsive_scroll_to_top_icon_color controls are registered
	 */
	function test_customizer_options_responsive_scroll_to_top_icon_color_control() {

		( new Responsive_Scroll_To_Top_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_scroll_to_top_icon_color' ) );

	}

	/**
	 * Test the responsive_scroll_to_top_icon_hover_color settings are registered
	 */
	function test_customizer_options_responsive_scroll_to_top_icon_hover_color_setting() {

		( new Responsive_Scroll_To_Top_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_scroll_to_top_icon_hover_color' ) );

	}

	/**
	 * Test the responsive_scroll_to_top_icon_hover_color controls are registered
	 */
	function test_customizer_options_responsive_scroll_to_top_icon_hover_color_control() {

		( new Responsive_Scroll_To_Top_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_scroll_to_top_icon_hover_color' ) );

	}

	/**
	 * Test the responsive_scroll_to_top_icon_background_color settings are registered
	 */
	function test_customizer_options_responsive_scroll_to_top_icon_background_color_setting() {

		( new Responsive_Scroll_To_Top_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_scroll_to_top_icon_background_color' ) );

	}

	/**
	 * Test the responsive_scroll_to_top_icon_background_color controls are registered
	 */
	function test_customizer_options_responsive_scroll_to_top_icon_background_color_control() {

		( new Responsive_Scroll_To_Top_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_scroll_to_top_icon_background_color' ) );

	}

	/**
	 * Test the responsive_scroll_to_top_icon_background_hover_color settings are registered
	 */
	function test_customizer_options_responsive_scroll_to_top_icon_background_hover_color_setting() {

		( new Responsive_Scroll_To_Top_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_scroll_to_top_icon_background_hover_color' ) );

	}

	/**
	 * Test the responsive_scroll_to_top_icon_background_hover_color controls are registered
	 */
	function test_customizer_options_responsive_scroll_to_top_icon_background_hover_color_control() {

		( new Responsive_Scroll_To_Top_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_scroll_to_top_icon_background_hover_color' ) );

	}


}
