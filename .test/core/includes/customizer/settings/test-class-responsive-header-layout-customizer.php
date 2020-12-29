<?php

class Test_Class_Responsive_Header_Layout_Customizer extends WP_UnitTestCase {

	function setUp() {

		parent::setUp();

		wp_set_current_user( $this->factory->user->create( array( 'role' => 'administrator' ) ) );

		require_once ABSPATH . WPINC . '/class-wp-customize-manager.php';

		global $wp_customize;

		$GLOBALS['wp_customize'] = new WP_Customize_Manager();
		$GLOBALS['wp_customize']->setup_theme();
		$GLOBALS['wp_customize']->register_controls();

		require_once get_parent_theme_file_path( 'core/includes/customizer/settings/class-responsive-blog-content-header-customizer.php' );
		require_once get_parent_theme_file_path( 'core/includes/customizer/controls/heading/class-responsive-customizer-heading-control.php' );
		require_once get_parent_theme_file_path( 'core/includes/customizer/controls/sortable/class-responsive-customizer-sortable-control.php' );

	}

	function tearDown() {

		parent::tearDown();

	}

	/**
	 * Test the responsive_header_layout section is registered
	 */
	function test_customizer_options_responsive_header_layout_section() {

		( new Responsive_Header_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_section( 'responsive_header_layout' ) );

	}

	/**
	 * Test the header_full_width settings are registered
	 */
	function test_customizer_options_header_full_width_setting() {

		( new Responsive_Header_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_header_full_width' ) );

	}

	/**
	 * Test the header_full_width controls are registered
	 */
	function test_customizer_options_header_full_width_control() {

		( new Responsive_Header_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_header_full_width' ) );

	}

	/**
	 * Test the inline_logo_site_title settings are registered
	 */
	function test_customizer_options_inline_logo_site_title_setting() {

		( new Responsive_Header_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_inline_logo_site_title' ) );

	}

	/**
	 * Test the inline_logo_site_title controls are registered
	 */
	function test_customizer_options_inline_logo_site_title_control() {

		( new Responsive_Header_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_inline_logo_site_title' ) );

	}

	/**
	 * Test the responsive_header_elements settings are registered
	 */
	function test_customizer_options_responsive_header_elements_setting() {

		( new Responsive_Header_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_header_elements' ) );

	}

	/**
	 * Test the responsive_header_elements controls are registered
	 */
	function test_customizer_options_responsive_header_elements_control() {

		( new Responsive_Header_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_header_elements' ) );

	}

	/**
	 * Test the header_layout settings are registered
	 */
	function test_customizer_options_header_layout_setting() {

		( new Responsive_Header_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_header_layout' ) );

	}

	/**
	 * Test the header_layout controls are registered
	 */
	function test_customizer_options_header_layout_control() {

		( new Responsive_Header_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_header_layout' ) );

	}

	/**
	 * Test the header_alignment settings are registered
	 */
	function test_customizer_options_header_alignment_setting() {

		( new Responsive_Header_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_header_alignment' ) );

	}

	/**
	 * Test the header_alignment controls are registered
	 */
	function test_customizer_options_header_alignment_control() {

		( new Responsive_Header_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_header_alignment' ) );

	}


	/**
	 * Test the header_top_padding settings are registered
	 */
	function test_customizer_options_header_top_padding_setting() {

		( new Responsive_Header_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_header_top_padding' ) );

	}

	/**
	 * Test the header_left_padding settings are registered
	 */
	function test_customizer_options_header_left_padding_setting() {

		( new Responsive_Header_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_header_left_padding' ) );

	}

	/**
	 * Test the header_bottom_padding settings are registered
	 */
	function test_customizer_options_header_bottom_padding_setting() {

		( new Responsive_Header_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_header_bottom_padding' ) );

	}

	/**
	 * Test the header_right_padding settings are registered
	 */
	function test_customizer_options_header_right_padding_setting() {

		( new Responsive_Header_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_header_right_padding' ) );

	}

	/**
	 * Test the header_tablet_top_padding settings are registered
	 */
	function test_customizer_options_header_tablet_top_padding_setting() {

		( new Responsive_Header_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_header_tablet_top_padding' ) );

	}

	/**
	 * Test the header_tablet_right_padding settings are registered
	 */
	function test_customizer_options_header_tablet_right_padding_setting() {

		( new Responsive_Header_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_header_tablet_right_padding' ) );

	}

	/**
	 * Test the header_tablet_bottom_padding settings are registered
	 */
	function test_customizer_options_header_tablet_bottom_padding_setting() {

		( new Responsive_Header_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_header_tablet_bottom_padding' ) );

	}

	/**
	 * Test the header_tablet_left_padding settings are registered
	 */
	function test_customizer_options_header_tablet_left_padding_setting() {

		( new Responsive_Header_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_header_tablet_left_padding' ) );

	}

	/**
	 * Test the header_mobile_top_padding settings are registered
	 */
	function test_customizer_options_header_mobile_top_padding_setting() {

		( new Responsive_Header_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_header_mobile_top_padding' ) );

	}

	/**
	 * Test the header_mobile_right_padding settings are registered
	 */
	function test_customizer_options_header_mobile_right_padding_setting() {

		( new Responsive_Header_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_header_mobile_right_padding' ) );

	}

	/**
	 * Test the header_mobile_bottom_padding settings are registered
	 */
	function test_customizer_options_header_mobile_bottom_padding_setting() {

		( new Responsive_Header_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_header_mobile_bottom_padding' ) );

	}

	/**
	 * Test the header_mobile_left_padding settings are registered
	 */
	function test_customizer_options_header_mobile_left_padding_setting() {

		( new Responsive_Header_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_header_mobile_left_padding' ) );

	}

	/**
	 * Test the header_padding controls are registered
	 */
	function test_customizer_options_header_padding_control() {

		( new Responsive_Header_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_header_padding' ) );

	}

	/**
	 * Test the transparent_header_separator settings are registered
	 */
	function test_customizer_options_transparent_header_separator_setting() {

		( new Responsive_Header_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_transparent_header_separator' ) );

	}

	/**
	 * Test the transparent_header_separator controls are registered
	 */
	function test_customizer_options_transparent_header_separator_control() {

		( new Responsive_Header_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_transparent_header_separator' ) );

	}

	/**
	 * Test the transparent_header settings are registered
	 */
	function test_customizer_options_transparent_header_setting() {

		( new Responsive_Header_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_transparent_header' ) );

	}

	/**
	 * Test the transparent_header controls are registered
	 */
	function test_customizer_options_transparent_header_control() {

		( new Responsive_Header_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_transparent_header' ) );

	}


	/**
	 * Test the site_content_top_padding settings are registered
	 */
	function test_customizer_options_site_content_top_padding_setting() {

		( new Responsive_Header_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_site_content_top_padding' ) );

	}

	/**
	 * Test the site_content_left_padding settings are registered
	 */
	function test_customizer_options_site_content_left_padding_setting() {

		( new Responsive_Header_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_site_content_left_padding' ) );

	}

	/**
	 * Test the site_content_bottom_padding settings are registered
	 */
	function test_customizer_options_site_content_bottom_padding_setting() {

		( new Responsive_Header_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_site_content_bottom_padding' ) );

	}

	/**
	 * Test the site_content_right_padding settings are registered
	 */
	function test_customizer_options_site_content_right_padding_setting() {

		( new Responsive_Header_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_site_content_right_padding' ) );

	}

	/**
	 * Test the site_content_tablet_top_padding settings are registered
	 */
	function test_customizer_options_site_content_tablet_top_padding_setting() {

		( new Responsive_Header_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_site_content_tablet_top_padding' ) );

	}

	/**
	 * Test the site_content_tablet_right_padding settings are registered
	 */
	function test_customizer_options_site_content_tablet_right_padding_setting() {

		( new Responsive_Header_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_site_content_tablet_right_padding' ) );

	}

	/**
	 * Test the site_content_tablet_bottom_padding settings are registered
	 */
	function test_customizer_options_site_content_tablet_bottom_padding_setting() {

		( new Responsive_Header_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_site_content_tablet_bottom_padding' ) );

	}

	/**
	 * Test the site_content_tablet_left_padding settings are registered
	 */
	function test_customizer_options_site_content_tablet_left_padding_setting() {

		( new Responsive_Header_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_site_content_tablet_left_padding' ) );

	}

	/**
	 * Test the site_content_mobile_top_padding settings are registered
	 */
	function test_customizer_options_site_content_mobile_top_padding_setting() {

		( new Responsive_Header_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_site_content_mobile_top_padding' ) );

	}

	/**
	 * Test the site_content_mobile_right_padding settings are registered
	 */
	function test_customizer_options_site_content_mobile_right_padding_setting() {

		( new Responsive_Header_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_site_content_mobile_right_padding' ) );

	}

	/**
	 * Test the site_content_mobile_bottom_padding settings are registered
	 */
	function test_customizer_options_site_content_mobile_bottom_padding_setting() {

		( new Responsive_Header_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_site_content_mobile_bottom_padding' ) );

	}

	/**
	 * Test the site_content_mobile_left_padding settings are registered
	 */
	function test_customizer_options_site_content_mobile_left_padding_setting() {

		( new Responsive_Header_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_site_content_mobile_left_padding' ) );

	}

	/**
	 * Test the site_content_padding controls are registered
	 */
	function test_customizer_options_site_content_padding_control() {

		( new Responsive_Header_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_site_content_padding' ) );

	}

	/**
	 * Test the disable_archive_transparent_header settings are registered
	 */
	function test_customizer_options_disable_archive_transparent_header_setting() {

		( new Responsive_Header_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_disable_archive_transparent_header' ) );

	}

	/**
	 * Test the disable_archive_transparent_header controls are registered
	 */
	function test_customizer_options_disable_archive_transparent_header_control() {

		( new Responsive_Header_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_disable_archive_transparent_header' ) );

	}

	/**
	 * Test the disable_blog_page_transparent_header settings are registered
	 */
	function test_customizer_options_disable_blog_page_transparent_header_setting() {

		( new Responsive_Header_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_disable_blog_page_transparent_header' ) );

	}

	/**
	 * Test the disable_blog_page_transparent_header controls are registered
	 */
	function test_customizer_options_disable_blog_page_transparent_header_control() {

		( new Responsive_Header_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_disable_blog_page_transparent_header' ) );

	}

	/**
	 * Test the disable_homepage_transparent_header settings are registered
	 */
	function test_customizer_options_disable_homepage_transparent_header_setting() {

		( new Responsive_Header_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_disable_homepage_transparent_header' ) );

	}

	/**
	 * Test the disable_homepage_transparent_header controls are registered
	 */
	function test_customizer_options_disable_homepage_transparent_header_control() {

		( new Responsive_Header_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_disable_homepage_transparent_header' ) );

	}

	/**
	 * Test the disable_pages_transparent_header settings are registered
	 */
	function test_customizer_options_disable_pages_transparent_header_setting() {

		( new Responsive_Header_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_disable_pages_transparent_header' ) );

	}

	/**
	 * Test the disable_pages_transparent_header controls are registered
	 */
	function test_customizer_options_disable_pages_transparent_header_control() {

		( new Responsive_Header_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_disable_pages_transparent_header' ) );

	}

	/**
	 * Test the disable_posts_transparent_header settings are registered
	 */
	function test_customizer_options_disable_posts_transparent_header_setting() {

		( new Responsive_Header_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_disable_posts_transparent_header' ) );

	}

	/**
	 * Test the disable_posts_transparent_header controls are registered
	 */
	function test_customizer_options_disable_posts_transparent_header_control() {

		( new Responsive_Header_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_disable_posts_transparent_header' ) );

	}

	/**
	 * Test the disable_woo_products_transparent_header settings are registered
	 */
	function test_customizer_options_disable_woo_products_transparent_header_setting() {

		( new Responsive_Header_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_disable_woo_products_transparent_header' ) );

	}

	/**
	 * Test the disable_woo_products_transparent_header controls are registered
	 */
	function test_customizer_options_disable_woo_products_transparent_header_control() {

		( new Responsive_Header_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_disable_woo_products_transparent_header' ) );

	}

	/**
	 * Test the header_widget_separator settings are registered
	 */
	function test_customizer_options_header_widget_separator_setting() {

		( new Responsive_Header_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_header_widget_separator' ) );

	}

	/**
	 * Test the header_widget_separator controls are registered
	 */
	function test_customizer_options_header_widget_separator_control() {

		( new Responsive_Header_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_header_widget_separator' ) );

	}

	/**
	 * Test the enable_header_widget settings are registered
	 */
	function test_customizer_options_enable_header_widget_setting() {

		( new Responsive_Header_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_enable_header_widget' ) );

	}

	/**
	 * Test the enable_header_widget controls are registered
	 */
	function test_customizer_options_enable_header_widget_control() {

		( new Responsive_Header_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_enable_header_widget' ) );

	}

	/**
	 * Test the header_widget_position settings are registered
	 */
	function test_customizer_options_header_widget_position_setting() {

		( new Responsive_Header_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_header_widget_position' ) );

	}

	/**
	 * Test the header_widget_position controls are registered
	 */
	function test_customizer_options_header_widget_position_control() {

		( new Responsive_Header_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_header_widget_position' ) );

	}

	/**
	 * Test the header_widget_alignment settings are registered
	 */
	function test_customizer_options_header_widget_alignment_setting() {

		( new Responsive_Header_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_header_widget_alignment' ) );

	}

	/**
	 * Test the header_widget_alignment controls are registered
	 */
	function test_customizer_options_header_widget_alignment_control() {

		( new Responsive_Header_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_header_widget_alignment' ) );

	}



}
