<?php

class Test_Class_Responsive_Single_Blog_Layout_Customizer extends WP_UnitTestCase {

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
	 * Test the responsive_single_blog_layout section is registered
	 */
	function test_customizer_options_responsive_single_blog_layout_section() {

		( new Responsive_Single_Blog_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_section( 'responsive_single_blog_layout' ) );

	}

	/**
	 * Test the single_blog_content_width settings are registered
	 */
	function test_customizer_options_single_blog_content_width_setting() {

		( new Responsive_Single_Blog_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_single_blog_content_width' ) );

	}

	/**
	 * Test the single_blog_content_width controls are registered
	 */
	function test_customizer_options_single_blog_content_width_control() {

		( new Responsive_Single_Blog_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_single_blog_content_width' ) );

	}

	/**
	 * Test the single_blog_sidebar_position settings are registered
	 */
	function test_customizer_options_single_blog_sidebar_position_setting() {

		( new Responsive_Single_Blog_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_single_blog_sidebar_position' ) );

	}

	/**
	 * Test the single_blog_sidebar_position controls are registered
	 */
	function test_customizer_options_single_blog_sidebar_position_control() {

		( new Responsive_Single_Blog_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_single_blog_sidebar_position' ) );

	}


}
