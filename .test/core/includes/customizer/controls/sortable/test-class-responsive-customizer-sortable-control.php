<?php

class Test_Responsive_Customizer_Sortable_Control extends WP_UnitTestCase {

	function setUp() {

		parent::setUp();

		wp_set_current_user( $this->factory->user->create( array( 'role' => 'administrator' ) ) );

		require_once ABSPATH . WPINC . '/class-wp-customize-manager.php';

		global $wp_customize;

		$GLOBALS['wp_customize'] = new WP_Customize_Manager();
		$GLOBALS['wp_customize']->setup_theme();
		$GLOBALS['wp_customize']->register_controls();

		require_once get_parent_theme_file_path( 'core/includes/customizer/controls/sortable/class-responsive-customizer-sortable-control.php' );

	}

	function tearDown() {

		parent::tearDown();

	}

	/**
	 * Test the type property returns as expected
	 */
	function test_sortable_control_property_type() {

		$this->assertEquals( 'responsive-sortable', ( new Responsive_Customizer_Sortable_Control( $GLOBALS['wp_customize'], 'control-id' ) )->type );

	}

	/**
	 * Test that customize-controls is enqueued
	 */
	function test_sortable_control_enqueue_responsive_customizer_controls() {

		( new Responsive_Customizer_Sortable_Control( $GLOBALS['wp_customize'], 'control-id' ) )->enqueue();

		global $wp_scripts;

		$this->assertArrayHasKey( 'customize-controls', $wp_scripts->registered );

	}

	/**
	 * Test that responsive-sortable is enqueued
	 */
	function test_sortable_control_enqueue_responsive_customizer_styles() {

		( new Responsive_Customizer_Sortable_Control( $GLOBALS['wp_customize'], 'control-id' ) )->enqueue();

		global $wp_styles;

		$this->assertArrayHasKey( 'responsive-sortable', $wp_styles->registered );

	}

	/**
	 * Test that to_json returns as expected
	 */
	function test_sortable_control_to_json() {

		$GLOBALS['wp_customize']->add_setting(
			'logo_width_mobile',
			array(
				'default'           => 100,
				'transport'         => 'postMessage',
				'sanitize_callback' => 'absint',
			)
		);

		$sortable_class = new Responsive_Customizer_Sortable_Control( $GLOBALS['wp_customize'], 'logo_width_mobile', array( 'settings' => 'logo_width_mobile' ) );

		$sortable_class->to_json();

		$this->assertEquals( '<li id="customize-control-logo_width_mobile" class="customize-control customize-control-responsive-sortable"></li>', trim( preg_replace( '/\s\s+/', ' ', str_replace( "\n", ' ', $sortable_class->json['content'] ) ) ) );

	}

	/**
	 * Test that content_template returns expected markup
	 */
	function test_sortable_control_content_template() {

		$this->expectOutputRegex(
			'/<span class="customize-control-title">
				{{{ data.label }}}
			<\/span>/'
		);

		$method = new ReflectionMethod( 'Responsive_Customizer_Sortable_Control', 'content_template' );
		$method->setAccessible( true );

		$method->invoke( new Responsive_Customizer_Sortable_Control( $GLOBALS['wp_customize'], 'control-id' ) );

	}
}
