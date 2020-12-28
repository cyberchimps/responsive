<?php

class Test_Responsive_Customizer_Typography_Control extends WP_UnitTestCase {

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
	 * Test the type property returns as expected
	 */
	function test_typography_control_property_type() {

		$this->assertEquals( 'responsive-typography', ( new Responsive_Customizer_Typography_Control( $GLOBALS['wp_customize'], 'control-id' ) )->type );

	}

	/**
	 * Test that customize-controls is enqueued
	 */
	function test_typography_control_enqueue_responsive_customizer_controls() {

		( new Responsive_Customizer_Typography_Control( $GLOBALS['wp_customize'], 'control-id' ) )->enqueue();

		global $wp_scripts;

		$this->assertArrayHasKey( 'customize-controls', $wp_scripts->registered );

	}

	/**
	 * Test that responsive-typography is enqueued
	 */
	function test_typography_control_enqueue_responsive_customizer_styles() {

		( new Responsive_Customizer_Typography_Control( $GLOBALS['wp_customize'], 'control-id' ) )->enqueue();

		global $wp_styles;

		$this->assertArrayHasKey( 'responsive-typography', $wp_styles->registered );

	}
}
