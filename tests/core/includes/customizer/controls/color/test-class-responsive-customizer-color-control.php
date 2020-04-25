<?php

class Test_Responsive_Customizer_Color_Control extends WP_UnitTestCase {

	function setUp() {

		parent::setUp();

		wp_set_current_user( $this->factory->user->create( array( 'role' => 'administrator' ) ) );

		require_once ABSPATH . WPINC . '/class-wp-customize-manager.php';

		global $wp_customize;

		$GLOBALS['wp_customize'] = new WP_Customize_Manager();
		$GLOBALS['wp_customize']->setup_theme();
		$GLOBALS['wp_customize']->register_controls();

		require_once get_parent_theme_file_path( 'core/includes/customizer/controls/color/class-responsive-customizer-color-control.php' );

	}

	function tearDown() {

		parent::tearDown();

	}

	/**
	 * Test the type property returns as expected
	 */
	function test_range_control_property_type() {

		$this->assertEquals( 'alpha-color', ( new Responsive_Customizer_Color_Control( $GLOBALS['wp_customize'], 'control-id' ) )->type );

	}

	/**
	 * Test that customize-controls is enqueued
	 */
	function test_range_control_enqueue_responsive_customizer_controls() {

		( new Responsive_Customizer_Color_Control( $GLOBALS['wp_customize'], 'control-id' ) )->enqueue();

		global $wp_scripts;

		$this->assertArrayHasKey( 'customize-controls', $wp_scripts->registered );

	}

	/**
	 * Test that responsive-range is enqueued
	 */
	function test_range_control_enqueue_responsive_customizer_styles() {

		( new Responsive_Customizer_Color_Control( $GLOBALS['wp_customize'], 'control-id' ) )->enqueue();

		global $wp_styles;

		$this->assertArrayHasKey( 'responsive-color', $wp_styles->registered );

	}

	/**
	 * Test that to_json returns as expected
	 */
	function test_color_control_to_json() {

		$GLOBALS['wp_customize']->add_setting(
			'logo_color',
			array(
				'default'           => '#000',
				'transport'         => 'postMessage',
				'sanitize_callback' => 'absint',
			)
		);
		$range_class = new Responsive_Customizer_Color_Control( $GLOBALS['wp_customize'], 'logo_color', array( 'settings' => 'logo_color' ) );

		$range_class->to_json();

		$this->assertEquals( '<li id="customize-control-logo_color" class="customize-control customize-control-alpha-color"> <input id="_customize-input-logo_color" type="alpha-color" value="#000" data-customize-setting-link="logo_color" /> </li>', trim( preg_replace( '/\s\s+/', ' ', str_replace( "\n", ' ', $range_class->json['content'] ) ) ) );
	}

	/**
	 * Test that content_template returns expected markup
	 */
	function test_range_control_content_template() {

		$this->expectOutputRegex(
			'/<div>
				<input class="alpha-color-control" type="text"  value="{{ data.value }}" data-show-opacity="{{ data.show_opacity }}" data-default-color="{{ data.default }}" {{{ data.link }}} \/>
			<\/div>/'
		);

		$method = new ReflectionMethod( 'Responsive_Customizer_Color_Control', 'content_template' );
		$method->setAccessible( true );

		$method->invoke( new Responsive_Customizer_Color_Control( $GLOBALS['wp_customize'], 'control-id' ) );

	}
}
