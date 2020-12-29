<?php

class Test_Class_Responsive_Blog_Layout_Customizer extends WP_UnitTestCase {

	function setUp() {

		parent::setUp();

		wp_set_current_user( $this->factory->user->create( array( 'role' => 'administrator' ) ) );

		require_once ABSPATH . WPINC . '/class-wp-customize-manager.php';

		global $wp_customize;

		$GLOBALS['wp_customize'] = new WP_Customize_Manager();
		$GLOBALS['wp_customize']->setup_theme();
		$GLOBALS['wp_customize']->register_controls();

		require_once get_parent_theme_file_path( 'core/includes/customizer/settings/class-responsive-blog-layout-customizer.php' );
		// require_once get_parent_theme_file_path( 'core/includes/customizer/controls/heading/class-responsive-customizer-heading-control.php' );
		// require_once get_parent_theme_file_path( 'core/includes/customizer/controls/sortable/class-responsive-customizer-sortable-control.php' );
	}

	function tearDown() {

		parent::tearDown();

	}

	/**
	 * Test the responsive_blog_layout section is registered
	 */
	function test_customizer_options_responsive_blog_layout_section() {

		( new Responsive_Blog_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_section( 'responsive_blog_layout' ) );

	}

	/**
	 * Test the blog_content_width settings are registered
	 */
	function test_customizer_options_blog_content_width_setting() {

		( new Responsive_Blog_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_blog_content_width' ) );

	}

	/**
	 * Test the blog_content_width controls are registered
	 */
	function test_customizer_options_blog_content_width_control() {

		( new Responsive_Blog_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_blog_content_width' ) );

	}

	/**
	 * Test the blog_entry_columns settings are registered
	 */
	function test_customizer_options_blog_entry_columns_setting() {

		( new Responsive_Blog_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_blog_entry_columns' ) );

	}

	/**
	 * Test the blog_entry_columns controls are registered
	 */
	function test_customizer_options_blog_entry_columns_control() {

		( new Responsive_Blog_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_blog_entry_columns' ) );

	}

	/**
	 * Test the blog_entry_display_masonry settings are registered
	 */
	function test_customizer_options_blog_entry_display_masonry_setting() {

		( new Responsive_Blog_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_blog_entry_display_masonry' ) );

	}

	/**
	 * Test the blog_entry_display_masonry controls are registered
	 */
	function test_customizer_options_blog_entry_display_masonry_control() {

		( new Responsive_Blog_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_blog_entry_display_masonry' ) );

	}

	/**
	 * Test the blog_sidebar_position settings are registered
	 */
	function test_customizer_options_blog_sidebar_position_setting() {

		( new Responsive_Blog_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_blog_sidebar_position' ) );

	}

	/**
	 * Test the blog_sidebar_position controls are registered
	 */
	function test_customizer_options_blog_sidebar_position_control() {

		( new Responsive_Blog_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_blog_sidebar_position' ) );

	}

}
