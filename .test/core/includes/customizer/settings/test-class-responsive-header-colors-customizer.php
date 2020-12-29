<?php

class Test_Class_Responsive_Header_Colors_Customizer extends WP_UnitTestCase {

	function setUp() {

		parent::setUp();

		wp_set_current_user( $this->factory->user->create( array( 'role' => 'administrator' ) ) );

		require_once ABSPATH . WPINC . '/class-wp-customize-manager.php';

		global $wp_customize;

		$GLOBALS['wp_customize'] = new WP_Customize_Manager();
		$GLOBALS['wp_customize']->setup_theme();
		$GLOBALS['wp_customize']->register_controls();

		require_once get_parent_theme_file_path( 'core/includes/customizer/settings/class-responsive-blog-content-header-customizer.php' );
		require_once get_parent_theme_file_path( 'core/includes/customizer/controls/heading/class-responsive-customizer-heading-control.php' );
		require_once get_parent_theme_file_path( 'core/includes/customizer/controls/sortable/class-responsive-customizer-sortable-control.php' );

	}

	function tearDown() {

		parent::tearDown();

	}

	/**
	 * Test the responsive_header_colors section is registered
	 */
	function test_customizer_options_responsive_header_colors_section() {

		( new Responsive_Header_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_section( 'responsive_header_colors' ) );

	}

	/**
	 * Test the responsive_header_background_color settings are registered
	 */
	function test_customizer_options_responsive_header_background_color_setting() {

		( new Responsive_Header_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_header_background_color' ) );

	}

	/**
	 * Test the responsive_header_background_color controls are registered
	 */
	function test_customizer_options_responsive_header_background_color_control() {

		( new Responsive_Header_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_header_background_color' ) );

	}

	/**
	 * Test the header_border settings are registered
	 */
	function test_customizer_options_responsive_header_border_color_setting() {

		( new Responsive_Header_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_header_border_color' ) );

	}

	/**
	 * Test the header_border controls are registered
	 */
	function test_customizer_options_responsive_header_border_color_control() {

		( new Responsive_Header_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_header_border_color' ) );

	}

	/**
	 * Test the header_site_title settings are registered
	 */
	function test_customizer_options_responsive_header_site_title_color_setting() {

		( new Responsive_Header_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_header_site_title_color' ) );

	}

	/**
	 * Test the header_site_title controls are registered
	 */
	function test_customizer_options_responsive_header_site_title_color_control() {

		( new Responsive_Header_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_header_site_title_color' ) );

	}

	/**
	 * Test the responsive_header_site_title_hover_color settings are registered
	 */
	function test_customizer_options_responsive_header_site_title_hover_color_setting() {

		( new Responsive_Header_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_header_site_title_hover_color' ) );

	}

	/**
	 * Test the responsive_header_site_title_hover_color controls are registered
	 */
	function test_customizer_options_responsive_header_site_title_hover_color_control() {

		( new Responsive_Header_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_header_site_title_hover_color' ) );

	}

	/**
	 * Test the responsive_header_text_color settings are registered
	 */
	function test_customizer_options_responsive_header_text_color_setting() {

		( new Responsive_Header_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_header_text_color' ) );

	}

	/**
	 * Test the responsive_header_text_color controls are registered
	 */
	function test_customizer_options_responsive_header_text_color_control() {

		( new Responsive_Header_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_header_text_color' ) );

	}

	/**
	 * Test the responsive_header_widget_color_separator settings are registered
	 */
	function test_customizer_options_responsive_header_widget_color_separator_setting() {

		( new Responsive_Header_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_header_widget_color_separator' ) );

	}

	/**
	 * Test the responsive_header_widget_color_separator controls are registered
	 */
	function test_customizer_options_responsive_header_widget_color_separator_control() {

		( new Responsive_Header_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_header_widget_color_separator' ) );

	}

	/**
	 * Test the responsive_header_widget_text_color settings are registered
	 */
	function test_customizer_options_responsive_header_widget_text_color_setting() {

		( new Responsive_Header_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_header_widget_text_color' ) );

	}

	/**
	 * Test the responsive_header_widget_text_color controls are registered
	 */
	function test_customizer_options_responsive_header_widget_text_color_control() {

		( new Responsive_Header_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_header_widget_text_color' ) );

	}

	/**
	 * Test the responsive_header_widget_background_color settings are registered
	 */
	function test_customizer_options_responsive_header_widget_background_color_setting() {

		( new Responsive_Header_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_header_widget_background_color' ) );

	}

	/**
	 * Test the responsive_header_widget_background_color controls are registered
	 */
	function test_customizer_options_responsive_header_widget_background_color_control() {

		( new Responsive_Header_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_header_widget_background_color' ) );

	}

	/**
	 * Test the responsive_header_widget_border_color settings are registered
	 */
	function test_customizer_options_responsive_header_widget_border_color_setting() {

		( new Responsive_Header_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_header_widget_border_color' ) );

	}

	/**
	 * Test the responsive_header_widget_border_color controls are registered
	 */
	function test_customizer_options_responsive_header_widget_border_color_control() {

		( new Responsive_Header_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_header_widget_border_color' ) );

	}

	/**
	 * Test the responsive_header_widget_link_color settings are registered
	 */
	function test_customizer_options_responsive_header_widget_link_color_setting() {

		( new Responsive_Header_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_header_widget_link_color' ) );

	}

	/**
	 * Test the responsive_header_widget_link_color controls are registered
	 */
	function test_customizer_options_responsive_header_widget_link_color_control() {

		( new Responsive_Header_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_header_widget_link_color' ) );

	}

	/**
	 * Test the responsive_header_widget_link_hover_color settings are registered
	 */
	function test_customizer_options_responsive_header_widget_link_hover_color_setting() {

		( new Responsive_Header_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_header_widget_link_hover_color' ) );

	}

	/**
	 * Test the responsive_header_widget_link_hover_color controls are registered
	 */
	function test_customizer_options_responsive_header_widget_link_hover_color_control() {

		( new Responsive_Header_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_header_widget_link_hover_color' ) );

	}

}
