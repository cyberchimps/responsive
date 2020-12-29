<?php

class Test_Class_Responsive_Site_Typography_Customizer extends WP_UnitTestCase {

	function setUp() {

		parent::setUp();

		wp_set_current_user( $this->factory->user->create( array( 'role' => 'administrator' ) ) );

		require_once ABSPATH . WPINC . '/class-wp-customize-manager.php';

		global $wp_customize;

		$GLOBALS['wp_customize'] = new WP_Customize_Manager();
		$GLOBALS['wp_customize']->setup_theme();
		$GLOBALS['wp_customize']->register_controls();
		require_once get_parent_theme_file_path( 'core/includes/customizer/controls/typography/class-responsive-customizer-typography-control.php' );
	}

	function tearDown() {

		parent::tearDown();

	}

	/**
	 * Test the responsive_typography section is registered
	 */
	function test_customizer_options_responsive_typography_section() {

		( new Responsive_Site_Typography_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_section( 'responsive_typography' ) );

	}

	/**
	 * Test the body_typography_separator settings are registered
	 */
	function test_customizer_options_body_typography_separator_setting() {

		( new Responsive_Site_Typography_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_body_typography_separator' ) );

	}

	/**
	 * Test the body_typography_separator controls are registered
	 */
	function test_customizer_options_body_typography_separator_control() {

		( new Responsive_Site_Typography_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_body_typography_separator' ) );

	}
	/**
	 * Test the all_heading_typography_separator settings are registered
	 */
	function test_customizer_options_all_heading_typography_separator_setting() {

		( new Responsive_Site_Typography_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_all_heading_typography_separator' ) );

	}

	/**
	 * Test the all_heading_typography_separator controls are registered
	 */
	function test_customizer_options_all_heading_typography_separator_control() {

		( new Responsive_Site_Typography_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_all_heading_typography_separator' ) );

	}
	/**
	 * Test the h1_typography_separator settings are registered
	 */
	function test_customizer_options_h1_typography_separator_setting() {

		( new Responsive_Site_Typography_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_h1_typography_separator' ) );

	}

	/**
	 * Test the h1_typography_separator controls are registered
	 */
	function test_customizer_options_h1_typography_separator_control() {

		( new Responsive_Site_Typography_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_h1_typography_separator' ) );

	}
	/**
	 * Test the h2_typography_separator settings are registered
	 */
	function test_customizer_options_h2_typography_separator_setting() {

		( new Responsive_Site_Typography_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_h2_typography_separator' ) );

	}

	/**
	 * Test the h2_typography_separator controls are registered
	 */
	function test_customizer_options_h2_typography_separator_control() {

		( new Responsive_Site_Typography_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_h2_typography_separator' ) );

	}
	/**
	 * Test the h3_typography_separator settings are registered
	 */
	function test_customizer_options_h3_typography_separator_setting() {

		( new Responsive_Site_Typography_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_h3_typography_separator' ) );

	}

	/**
	 * Test the h3_typography_separator controls are registered
	 */
	function test_customizer_options_h3_typography_separator_control() {

		( new Responsive_Site_Typography_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_h3_typography_separator' ) );

	}
	/**
	 * Test the h4_typography_separator settings are registered
	 */
	function test_customizer_options_h4_typography_separator_setting() {

		( new Responsive_Site_Typography_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_h4_typography_separator' ) );

	}

	/**
	 * Test the h4_typography_separator controls are registered
	 */
	function test_customizer_options_h4_typography_separator_control() {

		( new Responsive_Site_Typography_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_h4_typography_separator' ) );

	}
	/**
	 * Test the h5_typography_separator settings are registered
	 */
	function test_customizer_options_h5_typography_separator_setting() {

		( new Responsive_Site_Typography_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_h5_typography_separator' ) );

	}

	/**
	 * Test the h5_typography_separator controls are registered
	 */
	function test_customizer_options_h5_typography_separator_control() {

		( new Responsive_Site_Typography_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_h5_typography_separator' ) );

	}
	/**
	 * Test the h6_typography_separator settings are registered
	 */
	function test_customizer_options_h6_typography_separator_setting() {

		( new Responsive_Site_Typography_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_h6_typography_separator' ) );

	}

	/**
	 * Test the h6_typography_separator controls are registered
	 */
	function test_customizer_options_h6_typography_separator_control() {

		( new Responsive_Site_Typography_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_h6_typography_separator' ) );

	}
	/**
	 * Test the meta_typography_separator settings are registered
	 */
	function test_customizer_options_meta_typography_separator_setting() {

		( new Responsive_Site_Typography_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_meta_typography_separator' ) );

	}

	/**
	 * Test the meta_typography_separator controls are registered
	 */
	function test_customizer_options_meta_typography_separator_control() {

		( new Responsive_Site_Typography_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_meta_typography_separator' ) );

	}
	/**
	 * Test the buttons_typography_separator settings are registered
	 */
	function test_customizer_options_buttons_typography_separator_setting() {

		( new Responsive_Site_Typography_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_buttons_typography_separator' ) );

	}

	/**
	 * Test the buttons_typography_separator controls are registered
	 */
	function test_customizer_options_buttons_typography_separator_control() {

		( new Responsive_Site_Typography_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_buttons_typography_separator' ) );

	}
	/**
	 * Test the inputs_typography_separator settings are registered
	 */
	function test_customizer_options_inputs_typography_separator_setting() {

		( new Responsive_Site_Typography_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_inputs_typography_separator' ) );

	}

	/**
	 * Test the inputs_typography_separator controls are registered
	 */
	function test_customizer_options_inputs_typography_separator_control() {

		( new Responsive_Site_Typography_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_inputs_typography_separator' ) );

	}
}
