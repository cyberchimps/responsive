<?php

class Test_Class_Responsive_Woocommerce_Cart_Layout_Customizer extends WP_UnitTestCase {

	function setUp() {

		parent::setUp();

		wp_set_current_user( $this->factory->user->create( array( 'role' => 'administrator' ) ) );

		require_once ABSPATH . WPINC . '/class-wp-customize-manager.php';

		global $wp_customize;

		$GLOBALS['wp_customize'] = new WP_Customize_Manager();
		$GLOBALS['wp_customize']->setup_theme();
		$GLOBALS['wp_customize']->register_controls();
		require_once get_parent_theme_file_path( 'core/includes/compatibility/woocommerce/customizer/settings/class-responsive-woocommerce-cart-colors-customizer.php' );
		require_once get_parent_theme_file_path( 'core/includes/customizer/controls/heading/class-responsive-customizer-heading-control.php' );
		require_once get_parent_theme_file_path( 'core/includes/customizer/controls/color/class-responsive-customizer-color-control.php' );
		require_once get_parent_theme_file_path( 'core/includes/customizer/controls/sortable/class-responsive-customizer-sortable-control.php' );
		require_once get_parent_theme_file_path( 'core/includes/customizer/controls/range/class-responsive-customizer-range-control.php' );

	}

	function tearDown() {

		parent::tearDown();

	}

	/**
	 * Test the responsive_woocommerce_cart_layout section is registered
	 */
	function test_customizer_options_responsive_woocommerce_cart_layout_section() {
		if ( class_exists( 'WooCommerce' ) ) {
			( new Responsive_Woocommerce_Cart_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

			$this->assertNotNull( $GLOBALS['wp_customize']->get_section( 'responsive_woocommerce_cart_layout' ) );
		}
	}

	/**
	 * Test the cart_content_width settings are registered
	 */
	function test_customizer_options_cart_content_width_setting() {
		if ( class_exists( 'WooCommerce' ) ) {
			( new Responsive_Woocommerce_Cart_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

			$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_cart_content_width' ) );
		}
	}

	/**
	 * Test the cart_content_width controls are registered
	 */
	function test_customizer_options_cart_content_width_control() {
		if ( class_exists( 'WooCommerce' ) ) {
			( new Responsive_Woocommerce_Cart_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

			$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_cart_content_width' ) );
		}
	}

	/**
	 * Test the enable_crosssells_options settings are registered
	 */
	function test_customizer_options_enable_crosssells_options_setting() {
		if ( class_exists( 'WooCommerce' ) ) {
			( new Responsive_Woocommerce_Cart_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

			$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_enable_crosssells_options' ) );
		}
	}

	/**
	 * Test the cart_content_width controls are registered
	 */
	function test_customizer_options_enable_crosssells_options_control() {
		if ( class_exists( 'WooCommerce' ) ) {
			( new Responsive_Woocommerce_Cart_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

			$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_enable_crosssells_options' ) );
		}
	}

	/**
	 * Test the responsive_menu_cart_icon settings are registered
	 */
	function test_customizer_options_responsive_menu_cart_icon_setting() {
		if ( class_exists( 'WooCommerce' ) ) {
			( new Responsive_Woocommerce_Cart_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

			$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_menu_cart_icon' ) );
		}
	}

	/**
	 * Test the responsive_menu_cart_icon controls are registered
	 */
	function test_customizer_options_responsive_menu_cart_icon_control() {
		if ( class_exists( 'WooCommerce' ) ) {
			( new Responsive_Woocommerce_Cart_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

			$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_menu_cart_icon' ) );
		}
	}


}
