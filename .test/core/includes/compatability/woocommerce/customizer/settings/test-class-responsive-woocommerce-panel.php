<?php

class Test_Class_Responsive_Woocommerce_Panel extends WP_UnitTestCase {

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
	 * Test the responsive-woocommerce-shop section is registered
	 */
	function test_customizer_options_responsive_woocommerce_shop_panel() {
		if ( class_exists( 'WooCommerce' ) ) {
			( new Responsive_Woocommerce_Checkout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

			$this->assertNotNull( $GLOBALS['wp_customize']->get_section( 'responsive-woocommerce-shop' ) );
		}
	}

	/**
	 * Test the responsive-woocommerce-single-product section is registered
	 */
	function test_customizer_options_responsive_woocommerce_single_product_panel() {
		if ( class_exists( 'WooCommerce' ) ) {
			( new Responsive_Woocommerce_Checkout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

			$this->assertNotNull( $GLOBALS['wp_customize']->get_section( 'responsive-woocommerce-single-product' ) );
		}
	}

	/**
	 * Test the responsive-woocommerce-cart section is registered
	 */
	function test_customizer_options_responsive_woocommerce_cart_panel() {
		if ( class_exists( 'WooCommerce' ) ) {
			( new Responsive_Woocommerce_Checkout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

			$this->assertNotNull( $GLOBALS['wp_customize']->get_section( 'responsive-woocommerce-cart' ) );
		}
	}

}
