<?php

class Test_Class_Responsive_Blog_Content_Header_Customizer extends WP_UnitTestCase {

	function setUp() {

		parent::setUp();

		wp_set_current_user( $this->factory->user->create( array( 'role' => 'administrator' ) ) );

		require_once ABSPATH . WPINC . '/class-wp-customize-manager.php';

		global $wp_customize;

		$GLOBALS['wp_customize'] = new WP_Customize_Manager();
		$GLOBALS['wp_customize']->setup_theme();
		$GLOBALS['wp_customize']->register_controls();

		require_once get_parent_theme_file_path( 'core/includes/customizer/settings/class-responsive-blog-content-header-customizer.php' );
		// require_once get_parent_theme_file_path( 'core/includes/customizer/controls/heading/class-responsive-customizer-heading-control.php' );
		// require_once get_parent_theme_file_path( 'core/includes/customizer/controls/sortable/class-responsive-customizer-sortable-control.php' );
	}

	function tearDown() {

		parent::tearDown();

	}

	/**
	 * Test the responsive_blog_content_header section is registered
	 */
	function test_customizer_options_responsive_blog_content_header_section() {

		( new Responsive_Blog_Content_Header_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_section( 'responsive_blog_content_header' ) );

	}

	/**
	 * Test the responsive_theme_options[blog_post_title_toggle] settings are registered
	 */
	function test_customizer_options_res_blog_post_title_toggle_setting() {

		( new Responsive_Blog_Content_Header_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_theme_options[blog_post_title_toggle]' ) );

	}

	/**
	 * Test the res_blog_post_title_toggle controls are registered
	 */
	function test_customizer_options_res_blog_post_title_toggle_control() {

		( new Responsive_Blog_Content_Header_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'res_blog_post_title_toggle' ) );

	}

	/**
	 * Test the responsive_theme_options[blog_post_title_text] settings are registered
	 */
	function test_customizer_options_res_blog_post_title_text_setting() {

		( new Responsive_Blog_Content_Header_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_theme_options[blog_post_title_text]' ) );

	}

	/**
	 * Test the res_blog_post_title_text controls are registered
	 */
	function test_customizer_options_res_blog_post_title_text_control() {

		( new Responsive_Blog_Content_Header_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'res_blog_post_title_text' ) );

	}

}
