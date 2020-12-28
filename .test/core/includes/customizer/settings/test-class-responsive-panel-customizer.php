<?php

class Test_Class_Responsive_Panel_Customizer extends WP_UnitTestCase {

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
	 * Test the responsive_site panel is registered
	 */
	function test_customizer_options_responsive_site_panel() {

		( new Responsive_Panel() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_panel( 'responsive_site' ) );

	}

	/**
	 * Test the responsive_header panel is registered
	 */
	function test_customizer_options_responsive_header_panel() {

		( new Responsive_Panel() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_panel( 'responsive_header' ) );

	}

	/**
	 * Test the responsive_header_menu panel is registered
	 */
	function test_customizer_options_responsive_header_menu_panel() {

		( new Responsive_Panel() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_panel( 'responsive_header_menu' ) );

	}
	/**
	 * Test the responsive_sidebar panel is registered
	 */
	function test_customizer_options_responsive_sidebar_panel() {

		( new Responsive_Panel() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_panel( 'responsive_sidebar' ) );

	}
	/**
	 * Test the responsive_footer panel is registered
	 */
	function test_customizer_options_responsive_footer_panel() {

		( new Responsive_Panel() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_panel( 'responsive_footer' ) );

	}
	/**
	 * Test the responsive_content_header panel is registered
	 */
	function test_customizer_options_responsive_content_header_panel() {

		( new Responsive_Panel() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_panel( 'responsive_content_header' ) );

	}
	/**
	 * Test the responsive_blog panel is registered
	 */
	function test_customizer_options_responsive_blog_panel() {

		( new Responsive_Panel() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_panel( 'responsive_blog' ) );

	}
	/**
	 * Test the responsive_single_blog panel is registered
	 */
	function test_customizer_options_responsive_single_blog_panel() {

		( new Responsive_Panel() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_panel( 'responsive_single_blog' ) );

	}
	/**
	 * Test the responsive_page panel is registered
	 */
	function test_customizer_options_responsive_page_panel() {

		( new Responsive_Panel() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_panel( 'responsive_page' ) );

	}

	/**
	 * Test the title_tagline priority is set properly
	 */
	function test_customizer_options_title_tagline_section_priority() {

		( new Responsive_Panel() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertEquals( 10, $GLOBALS['wp_customize']->get_section( 'title_tagline' )->priority );

	}

	/**
	 * Test the static_front_page priority is set properly
	 */
	function test_customizer_options_static_front_page_section_priority() {

		( new Responsive_Panel() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertEquals( 109, $GLOBALS['wp_customize']->get_section( 'static_front_page' )->priority );

	}

	/**
	 * Test the custom_css priority is set properly
	 */
	function test_customizer_options_custom_css_section_priority() {

		( new Responsive_Panel() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertEquals( 300, $GLOBALS['wp_customize']->get_section( 'custom_css' )->priority );

	}

}
