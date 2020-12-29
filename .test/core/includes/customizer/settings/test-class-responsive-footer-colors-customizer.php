<?php

class Test_Class_Responsive_Footer_Colors_Customizer extends WP_UnitTestCase {

	function setUp() {

		parent::setUp();

		wp_set_current_user( $this->factory->user->create( array( 'role' => 'administrator' ) ) );

		require_once ABSPATH . WPINC . '/class-wp-customize-manager.php';

		global $wp_customize;

		$GLOBALS['wp_customize'] = new WP_Customize_Manager();
		$GLOBALS['wp_customize']->setup_theme();
		$GLOBALS['wp_customize']->register_controls();

		require_once get_parent_theme_file_path( 'core/includes/customizer/settings/class-responsive-footer-colors-customizer.php' );

	}

	function tearDown() {

		parent::tearDown();

	}

	/**
	 * Test the responsive_footer_colors section is registered
	 */
	function test_customizer_options_responsive_footer_colors_section() {

		( new Responsive_Footer_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_section( 'responsive_footer_colors' ) );

	}

	/**
	 * Test the footer_background settings are registered
	 */
	function test_customizer_options_footer_background_color_setting() {

		( new Responsive_Footer_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_footer_background_color' ) );

	}

	/**
	 * Test the footer_background controls are registered
	 */
	function test_customizer_options_footer_background_color_control() {

		( new Responsive_Footer_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_footer_background_color' ) );

	}

	/**
	 * Test the footer_text settings are registered
	 */
	function test_customizer_options_footer_text_color_setting() {

		( new Responsive_Footer_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_footer_text_color' ) );

	}

	/**
	 * Test the footer_text controls are registered
	 */
	function test_customizer_options_footer_text_color_control() {

		( new Responsive_Footer_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_footer_text_color' ) );

	}

	/**
	 * Test the footer_links settings are registered
	 */
	function test_customizer_options_footer_links_color_setting() {

		( new Responsive_Footer_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_footer_links_color' ) );

	}

	/**
	 * Test the footer_links controls are registered
	 */
	function test_customizer_options_footer_links_color_control() {

		( new Responsive_Footer_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_footer_links_color' ) );

	}

	/**
	 * Test the footer_links_hover settings are registered
	 */
	function test_customizer_options_footer_links_hover_color_setting() {

		( new Responsive_Footer_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_footer_links_hover_color' ) );

	}

	/**
	 * Test the footer_links_hover controls are registered
	 */
	function test_customizer_options_footer_links_hover_color_control() {

		( new Responsive_Footer_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_footer_links_hover_color' ) );

	}



}
