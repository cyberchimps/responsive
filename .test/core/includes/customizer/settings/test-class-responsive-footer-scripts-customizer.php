<?php

class Test_Class_Responsive_Footer_Scripts_Customizer extends WP_UnitTestCase {

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
	 * Test the responsive_footer_scripts section is registered
	 */
	function test_customizer_options_responsive_footer_scripts_section() {

		( new Responsive_Footer_Scripts_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_section( 'responsive_footer_scripts' ) );

	}

	/**
	 * Test the res_responsive_inline_js_footer settings are registered
	 */
	function test_customizer_options_res_responsive_inline_js_footer_setting() {

		( new Responsive_Footer_Scripts_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_theme_options[responsive_inline_js_footer]' ) );

	}

	/**
	 * Test the res_responsive_inline_js_footer controls are registered
	 */
	function test_customizer_options_res_responsive_inline_js_footer_control() {

		( new Responsive_Footer_Scripts_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'res_responsive_inline_js_footer' ) );

	}



}
