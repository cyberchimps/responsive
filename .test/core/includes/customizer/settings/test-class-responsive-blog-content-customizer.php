<?php

class Test_Class_Responsive_Blog_Content_Customizer extends WP_UnitTestCase {

	function setUp() {

		parent::setUp();

		wp_set_current_user( $this->factory->user->create( array( 'role' => 'administrator' ) ) );

		require_once ABSPATH . WPINC . '/class-wp-customize-manager.php';

		global $wp_customize;

		$GLOBALS['wp_customize'] = new WP_Customize_Manager();
		$GLOBALS['wp_customize']->setup_theme();
		$GLOBALS['wp_customize']->register_controls();

		require_once get_parent_theme_file_path( 'core/includes/customizer/settings/class-responsive-blog-content-customizer.php' );
		require_once get_parent_theme_file_path( 'core/includes/customizer/controls/heading/class-responsive-customizer-heading-control.php' );
		require_once get_parent_theme_file_path( 'core/includes/customizer/controls/sortable/class-responsive-customizer-sortable-control.php' );

	}

	function tearDown() {

		parent::tearDown();

	}

	/**
	 * Test the responsive_blog_content section is registered
	 */
	function test_customizer_options_responsive_blog_content_section() {

		( new Responsive_Blog_Content_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_section( 'responsive_blog_content' ) );

	}

	/**
	 * Test the blog_entry_elements_separator settings are registered
	 */
	function test_customizer_options_blog_entry_elements_separator_setting() {

		( new Responsive_Blog_Content_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_blog_entry_elements_separator' ) );

	}

	/**
	 * Test the blog_entry_elements_separator controls are registered
	 */
	function test_customizer_options_blog_entry_elements_separator_control() {

		( new Responsive_Blog_Content_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_blog_entry_elements_separator' ) );

	}

	/**
	 * Test the responsive_blog_entry_elements_positioning settings are registered
	 */
	function test_customizer_options_responsive_blog_entry_elements_positioning_setting() {

		( new Responsive_Blog_Content_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_blog_entry_elements_positioning' ) );

	}

	/**
	 * Test the responsive_blog_entry_elements_positioning controls are registered
	 */
	function test_customizer_options_responsive_blog_entry_elements_positioning_control() {

		( new Responsive_Blog_Content_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_blog_entry_elements_positioning' ) );

	}

	/**
	 * Test the blog_entry_featured_image_separator settings are registered
	 */
	function test_customizer_options_blog_entry_featured_image_separator_setting() {

		( new Responsive_Blog_Content_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_blog_entry_featured_image_separator' ) );

	}

	/**
	 * Test the blog_entry_featured_image_separator controls are registered
	 */
	function test_customizer_options_blog_entry_featured_image_separator_control() {

		( new Responsive_Blog_Content_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_blog_entry_featured_image_separator' ) );

	}

	/**
	 * Test the blog_featured_image_width settings are registered
	 */
	function test_customizer_options_blog_featured_image_width_setting() {

		( new Responsive_Blog_Content_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_blog_featured_image_width' ) );

	}

	/**
	 * Test the blog_featured_image_width controls are registered
	 */
	function test_customizer_options_blog_featured_image_width_control() {

		( new Responsive_Blog_Content_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_blog_featured_image_width' ) );

	}

	/**
	 * Test the blog_entry_featured_image_style settings are registered
	 */
	function test_customizer_options_blog_entry_featured_image_style_setting() {

		( new Responsive_Blog_Content_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_blog_entry_featured_image_style' ) );

	}

	/**
	 * Test the blog_entry_featured_image_style controls are registered
	 */
	function test_customizer_options_blog_entry_featured_image_style_control() {

		( new Responsive_Blog_Content_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_blog_entry_featured_image_style' ) );

	}

	/**
	 * Test the blog_entry_featured_image_alignment settings are registered
	 */
	function test_customizer_options_blog_entry_featured_image_alignment_setting() {

		( new Responsive_Blog_Content_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_blog_entry_featured_image_alignment' ) );

	}

	/**
	 * Test the blog_entry_featured_image_alignment controls are registered
	 */
	function test_customizer_options_blog_entry_featured_image_alignment_control() {

		( new Responsive_Blog_Content_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_blog_entry_featured_image_alignment' ) );

	}

	/**
	 * Test the blog_entry_title_separator settings are registered
	 */
	function test_customizer_options_blog_entry_title_separator_setting() {

		( new Responsive_Blog_Content_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_blog_entry_title_separator' ) );

	}

	/**
	 * Test the blog_entry_title_separator controls are registered
	 */
	function test_customizer_options_blog_entry_title_separator_control() {

		( new Responsive_Blog_Content_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_blog_entry_title_separator' ) );

	}

	/**
	 * Test the blog_entry_title_alignment settings are registered
	 */
	function test_customizer_options_blog_entry_title_alignment_setting() {

		( new Responsive_Blog_Content_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_blog_entry_title_alignment' ) );

	}

	/**
	 * Test the blog_entry_title_alignment controls are registered
	 */
	function test_customizer_options_blog_entry_title_alignment_control() {

		( new Responsive_Blog_Content_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_blog_entry_title_alignment' ) );

	}

	/**
	 * Test the blog_entry_meta_control_separator settings are registered
	 */
	function test_customizer_options_blog_entry_meta_control_separator_setting() {

		( new Responsive_Blog_Content_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_blog_entry_meta_control_separator' ) );

	}

	/**
	 * Test the blog_entry_meta_control_separator controls are registered
	 */
	function test_customizer_options_blog_entry_meta_control_separator_control() {

		( new Responsive_Blog_Content_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_blog_entry_meta_control_separator' ) );

	}

	/**
	 * Test the responsive_blog_entry_meta settings are registered
	 */
	function test_customizer_options_responsive_blog_entry_meta_setting() {

		( new Responsive_Blog_Content_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_blog_entry_meta' ) );

	}

	/**
	 * Test the responsive_blog_entry_meta controls are registered
	 */
	function test_customizer_options_responsive_blog_entry_meta_control() {

		( new Responsive_Blog_Content_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_blog_entry_meta' ) );

	}

	/**
	 * Test the responsive_blog_entry_meta_separator_text settings are registered
	 */
	function test_customizer_options_responsive_blog_entry_meta_separator_text_setting() {

		( new Responsive_Blog_Content_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_blog_entry_meta_separator_text' ) );

	}

	/**
	 * Test the responsive_blog_entry_meta_separator_text controls are registered
	 */
	function test_customizer_options_responsive_blog_entry_meta_separator_text_control() {

		( new Responsive_Blog_Content_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_blog_entry_meta_separator_text' ) );

	}

	/**
	 * Test the blog_entry_meta_alignment settings are registered
	 */
	function test_customizer_options_blog_entry_meta_alignment_setting() {

		( new Responsive_Blog_Content_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_blog_entry_meta_alignment' ) );

	}

	/**
	 * Test the blog_entry_meta_alignment controls are registered
	 */
	function test_customizer_options_blog_entry_meta_alignment_control() {

		( new Responsive_Blog_Content_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_blog_entry_meta_alignment' ) );

	}

	/**
	 * Test the blog_entry_content_type settings are registered
	 */
	function test_customizer_options_blog_entry_content_type_setting() {

		( new Responsive_Blog_Content_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_blog_entry_content_type' ) );

	}

	/**
	 * Test the blog_entry_content_type controls are registered
	 */
	function test_customizer_options_blog_entry_content_type_control() {

		( new Responsive_Blog_Content_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_blog_entry_content_type' ) );

	}

	/**
	 * Test the blog_entry_content_alignment settings are registered
	 */
	function test_customizer_options_blog_entry_content_alignment_setting() {

		( new Responsive_Blog_Content_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_blog_entry_content_alignment' ) );

	}

	/**
	 * Test the blog_entry_content_alignment controls are registered
	 */
	function test_customizer_options_blog_entry_content_alignment_control() {

		( new Responsive_Blog_Content_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_blog_entry_content_alignment' ) );

	}

	/**
	 * Test the excerpt_length settings are registered
	 */
	function test_customizer_options_excerpt_length_setting() {

		( new Responsive_Blog_Content_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_excerpt_length' ) );

	}

	/**
	 * Test the excerpt_length controls are registered
	 */
	function test_customizer_options_excerpt_length_control() {

		( new Responsive_Blog_Content_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_excerpt_length' ) );

	}

	/**
	 * Test the blog_read_more_text settings are registered
	 */
	function test_customizer_options_blog_read_more_text_setting() {

		( new Responsive_Blog_Content_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_blog_read_more_text' ) );

	}

	/**
	 * Test the blog_read_more_text controls are registered
	 */
	function test_customizer_options_blog_read_more_text_control() {

		( new Responsive_Blog_Content_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_blog_read_more_text' ) );

	}

	/**
	 * Test the blog_entry_read_more_type settings are registered
	 */
	function test_customizer_options_blog_entry_read_more_type_setting() {

		( new Responsive_Blog_Content_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_blog_entry_read_more_type' ) );

	}

	/**
	 * Test the blog_entry_read_more_type controls are registered
	 */
	function test_customizer_options_blog_entry_read_more_type_control() {

		( new Responsive_Blog_Content_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_blog_entry_read_more_type' ) );

	}


}
