<?php

class Test_Responsive_Customizer_Text_Control extends WP_UnitTestCase {

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
	 * Test the type property returns as expected
	 */
	function test_text_control_property_type() {

		$this->assertEquals( 'responsive-text', ( new Responsive_Customizer_Text_Control( $GLOBALS['wp_customize'], 'control-id' ) )->type );

	}

	/**
	 * Test that customize-controls is enqueued
	 */
	function test_text_control_enqueue_responsive_customizer_controls() {

		( new Responsive_Customizer_Text_Control( $GLOBALS['wp_customize'], 'control-id' ) )->enqueue();

		global $wp_scripts;

		$this->assertArrayHasKey( 'customize-controls', $wp_scripts->registered );

	}

	/**
	 * Test that to_json returns as expected
	 */
	function test_text_control_to_json() {

		$GLOBALS['wp_customize']->add_setting(
			'logo_width_mobile',
			array(
				'default'           => 100,
				'transport'         => 'postMessage',
				'sanitize_callback' => 'absint',
			)
		);

		$text_class = new Responsive_Customizer_Text_Control( $GLOBALS['wp_customize'], 'logo_width_mobile', array( 'settings' => 'logo_width_mobile' ) );

		$text_class->to_json();

		$this->assertEquals( '<li id="customize-control-logo_width_mobile" class="customize-control has-switchers customize-control-responsive-text"> <input id="_customize-input-logo_width_mobile" type="responsive-text" value="100" data-customize-setting-link="logo_width_mobile" /> </li>', trim( preg_replace( '/\s\s+/', ' ', str_replace( "\n", ' ', $text_class->json['content'] ) ) ) );

	}

	/**
	 * Test that content_template returns expected markup
	 */
	function test_text_control_content_template() {

		$this->expectOutputRegex(
			'/<span class="customize-control-title">
				<span>{{{ data.label }}}<\/span>

				<ul class="responsive-switchers">
					<li class="desktop">
						<button type="button" class="preview-desktop active" data-device="desktop">
							<i class="dashicons dashicons-desktop"><\/i>
						<\/button>
					<\/li>
					<li class="tablet">
						<button type="button" class="preview-tablet" data-device="tablet">
							<i class="dashicons dashicons-tablet"><\/i>
						<\/button>
					<\/li>
					<li class="mobile">
						<button type="button" class="preview-mobile" data-device="mobile">
							<i class="dashicons dashicons-smartphone"><\/i>
						<\/button>
					<\/li>
				<\/ul>

			<\/span>/'
		);

		$method = new ReflectionMethod( 'Responsive_Customizer_Text_Control', 'content_template' );
		$method->setAccessible( true );

		$method->invoke( new Responsive_Customizer_Text_Control( $GLOBALS['wp_customize'], 'control-id' ) );

	}
}
