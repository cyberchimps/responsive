<?php

class Test_Class_Responsive_Woocommerce_Single_Product_Layout_Customizer extends WP_UnitTestCase {

	function setUp() {

		parent::setUp();

		wp_set_current_user( $this->factory->user->create( array( 'role' => 'administrator' ) ) );

		require_once ABSPATH . WPINC . '/class-wp-customize-manager.php';

		global $wp_customize;

		$GLOBALS['wp_customize'] = new WP_Customize_Manager();
		$GLOBALS['wp_customize']->setup_theme();
		$GLOBALS['wp_customize']->register_controls();
		require_once get_parent_theme_file_path( 'core/includes/compatibility/woocommerce/customizer/settings/class-responsive-woocommerce-single-product-layout-customizer.php' );
		require_once get_parent_theme_file_path( 'core/includes/customizer/controls/heading/class-responsive-customizer-heading-control.php' );
		require_once get_parent_theme_file_path( 'core/includes/customizer/controls/color/class-responsive-customizer-color-control.php' );
		require_once get_parent_theme_file_path( 'core/includes/customizer/controls/sortable/class-responsive-customizer-sortable-control.php' );
		require_once get_parent_theme_file_path( 'core/includes/customizer/controls/range/class-responsive-customizer-range-control.php' );

	}

	function tearDown() {

		parent::tearDown();

	}

	/**
	 * Test the responsive_woocommerce_single_product_layout section is registered
	 */
	function test_customizer_options_responsive_woocommerce_single_product_layout_section() {
			( new Responsive_Woocommerce_Single_Product_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

			$this->assertNotNull( $GLOBALS['wp_customize']->get_section( 'responsive_woocommerce_single_product_layout' ) );
	}

	/**
	 * Test the single_product_layout_elements_separator settings are registered
	 */
	function test_customizer_options_single_product_layout_elements_separator_setting() {
			( new Responsive_Woocommerce_Single_Product_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

			$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_single_product_layout_elements_separator' ) );
	}

	/**
	 * Test the single_product_layout_elements_separator controls are registered
	 */
	function test_customizer_options_single_product_layout_elements_separator_control() {
			( new Responsive_Woocommerce_Single_Product_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

			$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_single_product_layout_elements_separator' ) );
	}

	/**
	 * Test the single_product_content_width settings are registered
	 */
	function test_customizer_options_single_product_content_width_setting() {
			( new Responsive_Woocommerce_Single_Product_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

			$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_single_product_content_width' ) );
	}

	/**
	 * Test the single_product_content_width controls are registered
	 */
	function test_customizer_options_single_product_content_width_control() {
			( new Responsive_Woocommerce_Single_Product_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

			$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_single_product_content_width' ) );
	}

	/**
	 * Test the single_product_sidebar_position settings are registered
	 */
	function test_customizer_options_single_product_sidebar_position_setting() {
			( new Responsive_Woocommerce_Single_Product_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

			$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_single_product_sidebar_position' ) );
	}

	/**
	 * Test the single_product_sidebar_position controls are registered
	 */
	function test_customizer_options_single_product_sidebar_position_control() {
			( new Responsive_Woocommerce_Single_Product_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

			$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_single_product_sidebar_position' ) );
	}

	/**
	 * Test the single_product_elements_separator settings are registered
	 */
	function test_customizer_options_single_product_elements_separator_setting() {
			( new Responsive_Woocommerce_Single_Product_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

			$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_single_product_elements_separator' ) );
	}

	/**
	 * Test the single_product_elements_separator controls are registered
	 */
	function test_customizer_options_single_product_elements_separator_control() {
			( new Responsive_Woocommerce_Single_Product_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

			$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_single_product_elements_separator' ) );
	}

	/**
	 * Test the single_product_gallery_layout settings are registered
	 */
	function test_customizer_options_single_product_gallery_layout_setting() {
			( new Responsive_Woocommerce_Single_Product_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

			$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_single_product_gallery_layout' ) );
	}

	/**
	 * Test the single_product_gallery_layout controls are registered
	 */
	function test_customizer_options_single_product_gallery_layout_control() {
			( new Responsive_Woocommerce_Single_Product_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

			$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_single_product_gallery_layout' ) );
	}

	/**
	 * Test the responsive_woocommerce_product_elements_positioning settings are registered
	 */
	function test_customizer_options_responsive_woocommerce_product_elements_positioning_setting() {
			( new Responsive_Woocommerce_Single_Product_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

			$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_woocommerce_product_elements_positioning' ) );
	}

	/**
	 * Test the responsive_woocommerce_product_elements_positioning controls are registered
	 */
	function test_customizer_options_responsive_woocommerce_product_elements_positioning_control() {
			( new Responsive_Woocommerce_Single_Product_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

			$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_woocommerce_product_elements_positioning' ) );
	}


}
