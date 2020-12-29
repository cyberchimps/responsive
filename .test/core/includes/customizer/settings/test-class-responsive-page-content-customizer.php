<?php

class Test_Class_Responsive_Page_Content_Customizer extends WP_UnitTestCase {

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
	 * Test the responsive_page_content section is registered
	 */
	function test_customizer_options_responsive_page_content_section() {

		( new Responsive_Page_Content_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_section( 'responsive_page_content' ) );

	}

	/**
	 * Test the page_elements_separator settings are registered
	 */
	function test_customizer_options_page_elements_separator_setting() {

		( new Responsive_Page_Content_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_page_elements_separator' ) );

	}

	/**
	 * Test the page_elements_separator controls are registered
	 */
	function test_customizer_options_page_elements_separator_control() {

		( new Responsive_Page_Content_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_page_elements_separator' ) );

	}

	/**
	 * Test the responsive_page_single_elements_positioning settings are registered
	 */
	function test_customizer_options_responsive_page_single_elements_positioning_setting() {

		( new Responsive_Page_Content_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_page_single_elements_positioning' ) );

	}

	/**
	 * Test the responsive_page_single_elements_positioning controls are registered
	 */
	function test_customizer_options_responsive_page_single_elements_positioning_control() {

		( new Responsive_Page_Content_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_page_single_elements_positioning' ) );

	}

	/**
	 * Test the page_featured_image_separator settings are registered
	 */
	function test_customizer_options_page_featured_image_separator_setting() {

		( new Responsive_Page_Content_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_page_featured_image_separator' ) );

	}

	/**
	 * Test the page_featured_image_separator controls are registered
	 */
	function test_customizer_options_page_featured_image_separator_control() {

		( new Responsive_Page_Content_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_page_featured_image_separator' ) );

	}

	/**
	 * Test the page_featured_image_width settings are registered
	 */
	function test_customizer_options_page_featured_image_width_setting() {

		( new Responsive_Page_Content_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_page_featured_image_width' ) );

	}

	/**
	 * Test the page_featured_image_width controls are registered
	 */
	function test_customizer_options_page_featured_image_width_control() {

		( new Responsive_Page_Content_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_page_featured_image_width' ) );

	}

	/**
	 * Test the page_featured_image_style settings are registered
	 */
	function test_customizer_options_page_featured_image_style_setting() {

		( new Responsive_Page_Content_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_page_featured_image_style' ) );

	}

	/**
	 * Test the page_featured_image_style controls are registered
	 */
	function test_customizer_options_page_featured_image_style_control() {

		( new Responsive_Page_Content_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_page_featured_image_style' ) );

	}

	/**
	 * Test the page_featured_image_alignment settings are registered
	 */
	function test_customizer_options_page_featured_image_alignment_setting() {

		( new Responsive_Page_Content_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_page_featured_image_alignment' ) );

	}

	/**
	 * Test the page_featured_image_alignment controls are registered
	 */
	function test_customizer_options_page_featured_image_alignment_control() {

		( new Responsive_Page_Content_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_page_featured_image_alignment' ) );

	}

	/**
	 * Test the page_title_separator settings are registered
	 */
	function test_customizer_options_page_title_separator_setting() {

		( new Responsive_Page_Content_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_page_title_separator' ) );

	}

	/**
	 * Test the page_title_separator controls are registered
	 */
	function test_customizer_options_page_title_separator_control() {

		( new Responsive_Page_Content_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_page_title_separator' ) );

	}

	/**
	 * Test the page_title_alignment settings are registered
	 */
	function test_customizer_options_page_title_alignment_setting() {

		( new Responsive_Page_Content_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_page_title_alignment' ) );

	}

	/**
	 * Test the page_title_alignment controls are registered
	 */
	function test_customizer_options_page_title_alignment_control() {

		( new Responsive_Page_Content_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_page_title_alignment' ) );

	}

	/**
	 * Test the page_content_separator settings are registered
	 */
	function test_customizer_options_page_content_separator_setting() {

		( new Responsive_Page_Content_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_page_content_separator' ) );

	}

	/**
	 * Test the page_content_separator controls are registered
	 */
	function test_customizer_options_page_content_separator_control() {

		( new Responsive_Page_Content_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_page_content_separator' ) );

	}

	/**
	 * Test the page_content_alignment settings are registered
	 */
	function test_customizer_options_page_content_alignment_setting() {

		( new Responsive_Page_Content_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_page_content_alignment' ) );

	}

	/**
	 * Test the page_content_alignment controls are registered
	 */
	function test_customizer_options_page_content_alignment_control() {

		( new Responsive_Page_Content_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_page_content_alignment' ) );

	}



}
