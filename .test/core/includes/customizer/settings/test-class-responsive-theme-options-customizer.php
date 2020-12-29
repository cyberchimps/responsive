<?php

class Test_Class_Responsive_Theme_Options_Customizer extends WP_UnitTestCase {

	function setUp() {

		parent::setUp();

		wp_set_current_user( $this->factory->user->create( array( 'role' => 'administrator' ) ) );

		require_once ABSPATH . WPINC . '/class-wp-customize-manager.php';

		global $wp_customize;

		$GLOBALS['wp_customize'] = new WP_Customize_Manager();
		$GLOBALS['wp_customize']->setup_theme();
		$GLOBALS['wp_customize']->register_controls();
		require_once get_parent_theme_file_path( 'core/includes/customizer/class-responsive-customize-control-checkbox-multiple.php' );

	}

	function tearDown() {

		parent::tearDown();

	}

	/**
	 * Test the exclude_post_cat settings are registered
	 */
	function test_customizer_options_exclude_post_cat_setting() {

		( new Responsive_Theme_Options_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'exclude_post_cat' ) );

	}

	/**
	 * Test the exclude_post_cat controls are registered
	 */
	function test_customizer_options_exclude_post_cat_control() {

		( new Responsive_Theme_Options_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'exclude_post_cat' ) );

	}


}
