<?php

class Test_Responsive_Customizer_Range_Control extends WP_UnitTestCase {

	function setUp() {

		parent::setUp();

		wp_set_current_user( $this->factory->user->create( array( 'role' => 'administrator' ) ) );

		require_once ABSPATH . WPINC . '/class-wp-customize-manager.php';

		global $wp_customize;

		$GLOBALS['wp_customize'] = new WP_Customize_Manager();
		$GLOBALS['wp_customize']->setup_theme();
		$GLOBALS['wp_customize']->register_controls();

		require_once get_parent_theme_file_path( 'core/includes/customizer/controls/range/class-responsive-customizer-range-control.php' );

	}

	function tearDown() {

		parent::tearDown();

	}

	/**
	 * Test the type property returns as expected
	 */
	function test_range_control_property_type() {

		$this->assertEquals( 'responsive-range', ( new Responsive_Customizer_Range_Control( $GLOBALS['wp_customize'], 'control-id' ) )->type );

	}

	/**
	 * Test that customize-controls is enqueued
	 */
	function test_range_control_enqueue_responsive_customizer_controls() {

		( new Responsive_Customizer_Range_Control( $GLOBALS['wp_customize'], 'control-id' ) )->enqueue();

		global $wp_scripts;

		$this->assertArrayHasKey( 'customize-controls', $wp_scripts->registered );

	}

	/**
	 * Test that responsive-range is enqueued
	 */
	function test_range_control_enqueue_responsive_customizer_styles() {

		( new Responsive_Customizer_Range_Control( $GLOBALS['wp_customize'], 'control-id' ) )->enqueue();

		global $wp_styles;

		$this->assertArrayHasKey( 'responsive-range', $wp_styles->registered );

	}

	/**
	 * Test that to_json returns as expected
	 */
	function test_range_control_to_json() {

		$GLOBALS['wp_customize']->add_setting(
			'logo_width_mobile',
			array(
				'default'           => 100,
				'transport'         => 'postMessage',
				'sanitize_callback' => 'absint',
			)
		);

		$range_class = new Responsive_Customizer_Range_Control( $GLOBALS['wp_customize'], 'logo_width_mobile', array( 'settings' => 'logo_width_mobile' ) );

		$range_class->to_json();

		$this->assertEquals( '<li id="customize-control-logo_width_mobile" class="customize-control customize-control-responsive-range"> <input id="_customize-input-logo_width_mobile" type="responsive-range" value="100" data-customize-setting-link="logo_width_mobile" /> </li>', trim( preg_replace( '/\s\s+/', ' ', str_replace( "\n", ' ', $range_class->json['content'] ) ) ) );

	}

	/**
	 * Test that content_template returns expected markup
	 */
	function test_range_control_content_template() {

		$this->expectOutputRegex(
			'/<div class="control-wrap">
				<input type="range" {{{ data.inputAttrs }}} value="{{ data.value }}" {{{ data.link }}} data-reset_value="{{ data.default }}" \/>
				<input type="number" {{{ data.inputAttrs }}} class="responsive-range-input" value="{{ data.value }}" \/>
				<span class="responsive-reset-slider"><span class="dashicons dashicons-image-rotate"><\/span><\/span>
			<\/div>/'
		);

		$method = new ReflectionMethod( 'Responsive_Customizer_Range_Control', 'content_template' );
		$method->setAccessible( true );

		$method->invoke( new Responsive_Customizer_Range_Control( $GLOBALS['wp_customize'], 'control-id' ) );

	}
}
