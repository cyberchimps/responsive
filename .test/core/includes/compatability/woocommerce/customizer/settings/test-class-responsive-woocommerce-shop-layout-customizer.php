<?php

class Test_Class_Responsive_Woocommerce_Shop_Layout_Customizer extends WP_UnitTestCase {

	function setUp() {

		parent::setUp();

		wp_set_current_user( $this->factory->user->create( array( 'role' => 'administrator' ) ) );

		require_once ABSPATH . WPINC . '/class-wp-customize-manager.php';

		global $wp_customize;

		$GLOBALS['wp_customize'] = new WP_Customize_Manager();
		$GLOBALS['wp_customize']->setup_theme();
		$GLOBALS['wp_customize']->register_controls();
		require_once get_parent_theme_file_path( 'core/includes/compatibility/woocommerce/customizer/settings/class-responsive-woocommerce-shop-layout-customizer.php' );
		require_once get_parent_theme_file_path( 'core/includes/customizer/controls/heading/class-responsive-customizer-heading-control.php' );
		require_once get_parent_theme_file_path( 'core/includes/customizer/controls/color/class-responsive-customizer-color-control.php' );
		require_once get_parent_theme_file_path( 'core/includes/customizer/controls/sortable/class-responsive-customizer-sortable-control.php' );
		require_once get_parent_theme_file_path( 'core/includes/customizer/controls/range/class-responsive-customizer-range-control.php' );

	}

	function tearDown() {

		parent::tearDown();

	}

	/**
	 * Test the responsive_woocommerce_shop_layout section is registered
	 */
	function test_customizer_options_responsive_woocommerce_shop_layout_section() {
			( new Responsive_Woocommerce_Shop_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

			$this->assertNotNull( $GLOBALS['wp_customize']->get_section( 'responsive_woocommerce_shop_layout' ) );
	}

	/**
	 * Test the shop_layout_elements_separator settings are registered
	 */
	function test_customizer_options_shop_layout_elements_separator_setting() {
			( new Responsive_Woocommerce_Shop_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

			$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_shop_layout_elements_separator' ) );
	}

	/**
	 * Test the shop_layout_elements_separator controls are registered
	 */
	function test_customizer_options_shop_layout_elements_separator_control() {
			( new Responsive_Woocommerce_Shop_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

			$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_shop_layout_elements_separator' ) );
	}

	/**
	 * Test the shop_content_width settings are registered
	 */
	function test_customizer_options_shop_content_width_setting() {
			( new Responsive_Woocommerce_Shop_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

			$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_shop_content_width' ) );
	}

	/**
	 * Test the shop_content_width controls are registered
	 */
	function test_customizer_options_shop_content_width_control() {
			( new Responsive_Woocommerce_Shop_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

			$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_shop_content_width' ) );
	}

	/**
	 * Test the shop_sidebar_position settings are registered
	 */
	function test_customizer_options_shop_sidebar_position_setting() {
			( new Responsive_Woocommerce_Shop_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

			$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_shop_sidebar_position' ) );
	}

	/**
	 * Test the shop_sidebar_position controls are registered
	 */
	function test_customizer_options_shop_sidebar_position_control() {
			( new Responsive_Woocommerce_Shop_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

			$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_shop_sidebar_position' ) );
	}

	/**
	 * Test the woocommerce_catalog_view settings are registered
	 */
	function test_customizer_options_woocommerce_catalog_view_setting() {
			( new Responsive_Woocommerce_Shop_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

			$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_woocommerce_catalog_view' ) );
	}

	/**
	 * Test the woocommerce_catalog_view controls are registered
	 */
	function test_customizer_options_woocommerce_catalog_view_control() {
			( new Responsive_Woocommerce_Shop_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

			$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_woocommerce_catalog_view' ) );
	}

	/**
	 * Test the product_content_aligmnment settings are registered
	 */
	function test_customizer_options_product_content_aligmnment_setting() {
			( new Responsive_Woocommerce_Shop_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

			$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_product_content_aligmnment' ) );
	}

	/**
	 * Test the product_content_aligmnment controls are registered
	 */
	function test_customizer_options_product_content_aligmnment_control() {
			( new Responsive_Woocommerce_Shop_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

			$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_product_content_aligmnment' ) );
	}

	/**
	 * Test the responsive_woocommerce_shop_elements_positioning settings are registered
	 */
	function test_customizer_options_responsive_woocommerce_shop_elements_positioning_setting() {
			( new Responsive_Woocommerce_Shop_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

			$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_woocommerce_shop_elements_positioning' ) );
	}

	/**
	 * Test the responsive_woocommerce_shop_elements_positioning controls are registered
	 */
	function test_customizer_options_responsive_woocommerce_shop_elements_positioning_control() {
			( new Responsive_Woocommerce_Shop_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

			$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_woocommerce_shop_elements_positioning' ) );
	}

	/**
	 * Test the product_sale_notification settings are registered
	 */
	function test_customizer_options_product_sale_notification_setting() {
			( new Responsive_Woocommerce_Shop_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

			$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_product_sale_notification' ) );
	}

	/**
	 * Test the product_sale_notification controls are registered
	 */
	function test_customizer_options_product_sale_notification_control() {
			( new Responsive_Woocommerce_Shop_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

			$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_product_sale_notification' ) );
	}

	/**
	 * Test the sale_percent_value settings are registered
	 */
	function test_customizer_options_sale_percent_value_setting() {
			( new Responsive_Woocommerce_Shop_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

			$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_sale_percent_value' ) );
	}

	/**
	 * Test the sale_percent_value controls are registered
	 */
	function test_customizer_options_sale_percent_value_control() {
			( new Responsive_Woocommerce_Shop_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

			$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_sale_percent_value' ) );
	}

	/**
	 * Test the product_sale_style settings are registered
	 */
	function test_customizer_options_product_sale_style_setting() {
			( new Responsive_Woocommerce_Shop_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

			$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_product_sale_style' ) );
	}

	/**
	 * Test the product_sale_style controls are registered
	 */
	function test_customizer_options_product_sale_style_control() {
			( new Responsive_Woocommerce_Shop_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

			$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_product_sale_style' ) );
	}

}
