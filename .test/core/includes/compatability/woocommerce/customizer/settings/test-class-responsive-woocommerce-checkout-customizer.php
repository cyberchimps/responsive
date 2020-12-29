<?php

class Test_Class_Responsive_Woocommerce_Checkout_Customizer extends WP_UnitTestCase {

	function setUp() {

		parent::setUp();

		wp_set_current_user( $this->factory->user->create( array( 'role' => 'administrator' ) ) );

		require_once ABSPATH . WPINC . '/class-wp-customize-manager.php';

		global $wp_customize;

		$GLOBALS['wp_customize'] = new WP_Customize_Manager();
		$GLOBALS['wp_customize']->setup_theme();
		$GLOBALS['wp_customize']->register_controls();

	}

	function tearDown() {

		parent::tearDown();

	}

	/**
	 * Test the responsive_blog_content section is registered
	 */
	function test_customizer_options_responsive_blog_content_section() {
		if ( class_exists( 'WooCommerce' ) ) {
			( new Responsive_Woocommerce_Checkout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

			$this->assertNotNull( $GLOBALS['wp_customize']->get_section( 'responsive_blog_content' ) );
		}
	}

	/**
	 * Test the checkout_content_width settings are registered
	 */
	function test_customizer_options_checkout_content_width_setting() {
		if ( class_exists( 'WooCommerce' ) ) {

			( new Responsive_Woocommerce_Checkout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

			$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_checkout_content_width' ) );
		}
	}

	/**
	 * Test the checkout_content_width controls are registered
	 */
	function test_customizer_options_checkout_content_width_control() {
		if ( class_exists( 'WooCommerce' ) ) {

			( new Responsive_Woocommerce_Checkout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

			$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_checkout_content_width' ) );
		}
	}


}
