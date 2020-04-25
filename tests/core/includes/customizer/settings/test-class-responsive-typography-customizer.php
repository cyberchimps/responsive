<?php

class Test_Class_Responsive_Typography_Customizer extends WP_UnitTestCase {

	function setUp() {

		parent::setUp();

		wp_set_current_user( $this->factory->user->create( array( 'role' => 'administrator' ) ) );

		require_once ABSPATH . WPINC . '/class-wp-customize-manager.php';

		global $wp_customize;

		$GLOBALS['wp_customize'] = new WP_Customize_Manager();
		$GLOBALS['wp_customize']->setup_theme();
		$GLOBALS['wp_customize']->register_controls();
		require_once get_parent_theme_file_path( 'core/includes/customizer/controls/text/class-responsive-customizer-text-control.php' );

	}

	function tearDown() {

		parent::tearDown();

	}

	/**
	 * Test the responsive_typography_panel panel is registered
	 */
	function test_customizer_options_responsive_typography_panel() {

		( new Responsive_Typography_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_panel( 'responsive_typography_panel' ) );

	}
}
