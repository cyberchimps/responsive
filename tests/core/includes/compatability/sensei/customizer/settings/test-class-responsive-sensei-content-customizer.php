<?php

class Test_Class_Responsive_Sensei_Content_Customizer extends WP_UnitTestCase {

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
	 * Test the responsive_sensei_content section is registered
	 */
	function test_customizer_options_responsive_sensei_content_section() {
		if ( class_exists( 'Sensei_Main' ) ) {
			( new Responsive_Woocommerce_Cart_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

			$this->assertNotNull( $GLOBALS['wp_customize']->get_section( 'responsive_sensei_content' ) );
		}
	}

	/**
	 * Test the sensei_courses_per_row settings are registered
	 */
	function test_customizer_options_sensei_courses_per_row_setting() {
		if ( class_exists( 'Sensei_Main' ) ) {
			( new Responsive_Woocommerce_Cart_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

			$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_sensei_courses_per_row' ) );
		}
	}

	/**
	 * Test the sensei_courses_per_row controls are registered
	 */
	function test_customizer_options_sensei_courses_per_row_control() {
		if ( class_exists( 'Sensei_Main' ) ) {
			( new Responsive_Woocommerce_Cart_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

			$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_sensei_courses_per_row' ) );
		}
	}

	/**
	 * Test the sensei_excerpt_length settings are registered
	 */
	function test_customizer_options_sensei_excerpt_length_setting() {
		if ( class_exists( 'Sensei_Main' ) ) {
			( new Responsive_Woocommerce_Cart_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

			$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_sensei_excerpt_length' ) );
		}
	}

	/**
	 * Test the sensei_excerpt_length controls are registered
	 */
	function test_customizer_options_sensei_excerpt_length_control() {
		if ( class_exists( 'Sensei_Main' ) ) {
			( new Responsive_Woocommerce_Cart_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

			$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_sensei_excerpt_length' ) );
		}
	}

	/**
	 * Test the sensei_read_more_text settings are registered
	 */
	function test_customizer_options_sensei_read_more_text_setting() {
		if ( class_exists( 'Sensei_Main' ) ) {
			( new Responsive_Woocommerce_Cart_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

			$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_sensei_read_more_text' ) );
		}
	}

	/**
	 * Test the sensei_read_more_text controls are registered
	 */
	function test_customizer_options_sensei_read_more_text_control() {
		if ( class_exists( 'Sensei_Main' ) ) {
			( new Responsive_Woocommerce_Cart_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

			$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_sensei_read_more_text' ) );
		}
	}

}
