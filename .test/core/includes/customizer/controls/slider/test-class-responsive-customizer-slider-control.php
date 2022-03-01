<?php

class Test_Responsive_Customizer_Slider_Control extends WP_UnitTestCase {

	function setUp() {

		parent::setUp();

		wp_set_current_user( $this->factory->user->create( array( 'role' => 'administrator' ) ) );

		require_once ABSPATH . WPINC . '/class-wp-customize-manager.php';

		global $wp_customize;

		$GLOBALS['wp_customize'] = new WP_Customize_Manager();
		$GLOBALS['wp_customize']->setup_theme();
		$GLOBALS['wp_customize']->register_controls();

		require_once get_parent_theme_file_path( 'core/includes/customizer/controls/slider/class-responsive-customizer-slider-control.php' );

	}

	function tearDown() {

		parent::tearDown();

	}

	/**
	 * Test the type property returns as expected
	 */
	function test_slider_control_property_type() {

		$this->assertEquals( 'responsive-slider', ( new Responsive_Customizer_Slider_Control( $GLOBALS['wp_customize'], 'control-id' ) )->type );

	}

	/**
	 * Test that customize-controls is enqueued
	 */
	function test_slider_control_enqueue_responsive_customizer_controls() {

		( new Responsive_Customizer_Slider_Control( $GLOBALS['wp_customize'], 'control-id' ) )->enqueue();

		global $wp_scripts;

		$this->assertArrayHasKey( 'customize-controls', $wp_scripts->registered );

	}

	/**
	 * Test that responsive-slider is enqueued
	 */
	function test_slider_control_enqueue_responsive_customizer_styles() {

		( new Responsive_Customizer_Slider_Control( $GLOBALS['wp_customize'], 'control-id' ) )->enqueue();

		global $wp_styles;

		$this->assertArrayHasKey( 'responsive-slider', $wp_styles->registered );

	}

	/**
	 * Test that to_json returns as expected
	 */
	function test_slider_control_to_json() {

		$GLOBALS['wp_customize']->add_setting(
			'logo_width_mobile',
			array(
				'default'           => 100,
				'transport'         => 'postMessage',
				'sanitize_callback' => 'absint',
			)
		);

		$slider_class = new Responsive_Customizer_Slider_Control( $GLOBALS['wp_customize'], 'logo_width_mobile', array( 'settings' => 'logo_width_mobile' ) );

		$slider_class->to_json();

		$this->assertEquals( '<li id="customize-control-logo_width_mobile" class="customize-control has-switchers customize-control-responsive-slider"> <input id="_customize-input-logo_width_mobile" type="responsive-slider" value="100" data-customize-setting-link="logo_width_mobile" /> </li>', trim( preg_replace( '/\s\s+/', ' ', str_replace( "\n", ' ', $slider_class->json['content'] ) ) ) );

	}

	/**
	 * Test that content_template returns expected markup
	 */
	function test_slider_control_content_template() {

		$this->expectOutputRegex(
			'/<div class="desktop control-wrap active">
				<div class="responsive-slider desktop-slider"><\/div>
				<div class="responsive-slider-input">
					<input {{{ data.inputAttrs }}} type="number" class="slider-input desktop-input" value="{{ data.desktop.value }}" {{{ data.desktop.link }}} \/>
				<\/div>
			<\/div>/'
		);

		$method = new ReflectionMethod( 'Responsive_Customizer_Slider_Control', 'content_template' );
		$method->setAccessible( true );

		$method->invoke( new Responsive_Customizer_Slider_Control( $GLOBALS['wp_customize'], 'control-id' ) );

	}
}
