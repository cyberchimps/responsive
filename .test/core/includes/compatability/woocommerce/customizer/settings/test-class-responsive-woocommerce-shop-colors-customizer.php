<?php

class Test_Class_Responsive_Woocommerce_Shop_Colors_Customizer extends WP_UnitTestCase {

	function setUp() {

		parent::setUp();

		wp_set_current_user( $this->factory->user->create( array( 'role' => 'administrator' ) ) );

		require_once ABSPATH . WPINC . '/class-wp-customize-manager.php';

		global $wp_customize;

		$GLOBALS['wp_customize'] = new WP_Customize_Manager();
		$GLOBALS['wp_customize']->setup_theme();
		$GLOBALS['wp_customize']->register_controls();

		require_once get_parent_theme_file_path( 'core/includes/compatibility/woocommerce/customizer/settings/class-responsive-woocommerce-shop-colors-customizer.php' );
		require_once get_parent_theme_file_path( 'core/includes/customizer/controls/heading/class-responsive-customizer-heading-control.php' );
		require_once get_parent_theme_file_path( 'core/includes/customizer/controls/color/class-responsive-customizer-color-control.php' );
		require_once get_parent_theme_file_path( 'core/includes/customizer/controls/sortable/class-responsive-customizer-sortable-control.php' );
		require_once get_parent_theme_file_path( 'core/includes/customizer/controls/range/class-responsive-customizer-range-control.php' );

	}

	function tearDown() {

		parent::tearDown();

	}

	/**
	 * Test the responsive_woocommerce_shop_colors section is registered
	 */
	function test_customizer_options_responsive_woocommerce_shop_colors_section() {

		( new Responsive_Woocommerce_Shop_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_section( 'responsive_woocommerce_shop_colors' ) );

	}

	/**
	 * Test the shop_button_separator settings are registered
	 */
	function test_customizer_options_shop_button_separator_setting() {

		( new Responsive_Woocommerce_Shop_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_shop_button_separator' ) );

	}

	/**
	 * Test the shop_button_separator controls are registered
	 */
	function test_customizer_options_shop_button_separator_control() {

		( new Responsive_Woocommerce_Shop_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_shop_button_separator' ) );

	}

	/**
	 * Test the shop_product_rating settings are registered
	 */
	function test_customizer_options_shop_product_rating_setting() {

		( new Responsive_Woocommerce_Shop_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_shop_product_rating_color' ) );

	}

	/**
	 * Test the shop_product_rating controls are registered
	 */
	function test_customizer_options_shop_product_rating_control() {

		( new Responsive_Woocommerce_Shop_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_shop_product_rating_color' ) );

	}

	/**
	 * Test the shop_product_price settings are registered
	 */
	function test_customizer_options_shop_product_price_setting() {

		( new Responsive_Woocommerce_Shop_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_shop_product_price_color' ) );

	}

	/**
	 * Test the shop_product_price controls are registered
	 */
	function test_customizer_options_shop_product_price_control() {

		( new Responsive_Woocommerce_Shop_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_shop_product_price_color' ) );

	}

	/**
	 * Test the add_to_cart_button settings are registered
	 */
	function test_customizer_options_add_to_cart_button_setting() {

		( new Responsive_Woocommerce_Shop_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_add_to_cart_button_color' ) );

	}

	/**
	 * Test the add_to_cart_button controls are registered
	 */
	function test_customizer_options_add_to_cart_button_control() {

		( new Responsive_Woocommerce_Shop_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_add_to_cart_button_color' ) );

	}

	/**
	 * Test the add_to_cart_button_text settings are registered
	 */
	function test_customizer_options_add_to_cart_button_text_setting() {

		( new Responsive_Woocommerce_Shop_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_add_to_cart_button_text_color' ) );

	}

	/**
	 * Test the add_to_cart_button_text controls are registered
	 */
	function test_customizer_options_add_to_cart_button_text_control() {

		( new Responsive_Woocommerce_Shop_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_add_to_cart_button_text_color' ) );

	}

	/**
	 * Test the add_to_cart_button_hover settings are registered
	 */
	function test_customizer_options_add_to_cart_button_hover_setting() {

		( new Responsive_Woocommerce_Shop_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_add_to_cart_button_hover_color' ) );

	}

	/**
	 * Test the add_to_cart_button_hover controls are registered
	 */
	function test_customizer_options_add_to_cart_button_hover_control() {

		( new Responsive_Woocommerce_Shop_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_add_to_cart_button_hover_color' ) );

	}

	/**
	 * Test the add_to_cart_button_hover_text settings are registered
	 */
	function test_customizer_options_add_to_cart_button_hover_text_setting() {

		( new Responsive_Woocommerce_Shop_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_add_to_cart_button_hover_text_color' ) );

	}

	/**
	 * Test the add_to_cart_button_hover_text controls are registered
	 */
	function test_customizer_options_add_to_cart_button_hover_text_control() {

		( new Responsive_Woocommerce_Shop_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_add_to_cart_button_hover_text_color' ) );

	}

}
