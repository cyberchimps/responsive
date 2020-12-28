<?php

class Test_Class_Responsive_Site_Colors_Customizer extends WP_UnitTestCase {

	function setUp() {

		parent::setUp();

		wp_set_current_user( $this->factory->user->create( array( 'role' => 'administrator' ) ) );

		require_once ABSPATH . WPINC . '/class-wp-customize-manager.php';

		global $wp_customize;

		$GLOBALS['wp_customize'] = new WP_Customize_Manager();
		$GLOBALS['wp_customize']->setup_theme();
		$GLOBALS['wp_customize']->register_controls();

		require_once get_parent_theme_file_path( 'core/includes/customizer/controls/color/class-responsive-customizer-color-control.php' );
	}

	function tearDown() {

		parent::tearDown();

	}

	/**
	 * Test the responsive_colors section is registered
	 */
	function test_customizer_options_responsive_colors_section() {

		( new Responsive_Site_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_section( 'responsive_colors' ) );

	}

	/**
	 * Test the section of background_color is set properly
	 */
	function test_customizer_options_background_color_section() {

		( new Responsive_Site_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertEquals( 'responsive_colors', $GLOBALS['wp_customize']->get_control( 'background_color' )->section );

	}

	/**
	 * Test the section of background_image is set properly
	 */
	function test_customizer_options_background_image_section() {

		( new Responsive_Site_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertEquals( 'responsive_colors', $GLOBALS['wp_customize']->get_control( 'background_image' )->section );

	}

	// **
	// * Test the default of background_color is set properly
	// */
	// function test_customizer_options_background_color_default() {
	//
	// ( new Responsive_Site_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );
	//
	// $this->assertEquals( 'eaeaea' , $GLOBALS['wp_customize']->get_control( 'background_color' )->default );
	//
	// }

	/**
	 * Test the priority of background_color is set properly
	 */
	function test_customizer_options_background_color_priority() {

		( new Responsive_Site_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertEquals( 11, $GLOBALS['wp_customize']->get_control( 'background_color' )->priority );

	}

	/**
	 * Test the priority of background_image is set properly
	 */
	function test_customizer_options_background_image_priority() {

		( new Responsive_Site_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertEquals( 20, $GLOBALS['wp_customize']->get_control( 'background_image' )->priority );

	}

	/**
	 * Test the responsive_site_background_separator settings are registered
	 */
	function test_customizer_options_responsive_site_background_separator_setting() {

		( new Responsive_Site_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_responsive_site_background_separator' ) );

	}

	/**
	 * Test the responsive_site_background_separator controls are registered
	 */
	function test_customizer_options_responsive_site_background_separator_control() {

		( new Responsive_Site_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_responsive_site_background_separator' ) );

	}

	/**
	 * Test the box_background settings are registered
	 */
	function test_customizer_options_box_background_setting() {

		( new Responsive_Site_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_box_background_color' ) );

	}

	/**
	 * Test the box_background controls are registered
	 */
	function test_customizer_options_box_background_control() {

		( new Responsive_Site_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_box_background_color' ) );

	}

	/**
	 * Test the alt_background settings are registered
	 */
	function test_customizer_options_alt_background_setting() {

		( new Responsive_Site_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_alt_background_color' ) );

	}

	/**
	 * Test the alt_background controls are registered
	 */
	function test_customizer_options_alt_background_control() {

		( new Responsive_Site_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_alt_background_color' ) );

	}

	/**
	 * Test the responsive_general_texts_separator settings are registered
	 */
	function test_customizer_options_responsive_general_texts_separator_setting() {

		( new Responsive_Site_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_responsive_general_texts_separator' ) );

	}

	/**
	 * Test the responsive_general_texts_separator controls are registered
	 */
	function test_customizer_options_responsive_general_texts_separator_control() {

		( new Responsive_Site_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_responsive_general_texts_separator' ) );

	}

	/**
	 * Test the body_text settings are registered
	 */
	function test_customizer_options_body_text_setting() {

		( new Responsive_Site_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_body_text_color' ) );

	}

	/**
	 * Test the body_text controls are registered
	 */
	function test_customizer_options_body_text_control() {

		( new Responsive_Site_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_body_text_color' ) );

	}

	/**
	 * Test the all_heading_text settings are registered
	 */
	function test_customizer_options_all_heading_text_setting() {

		( new Responsive_Site_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_all_heading_text_color' ) );

	}

	/**
	 * Test the all_heading_text controls are registered
	 */
	function test_customizer_options_all_heading_text_control() {

		( new Responsive_Site_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_all_heading_text_color' ) );

	}

	/**
	 * Test the h1_text settings are registered
	 */
	function test_customizer_options_h1_text_setting() {

		( new Responsive_Site_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_h1_text_color' ) );

	}

	/**
	 * Test the h1_text controls are registered
	 */
	function test_customizer_options_h1_text_control() {

		( new Responsive_Site_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_h1_text_color' ) );

	}

	/**
	 * Test the h2_text settings are registered
	 */
	function test_customizer_options_h2_text_setting() {

		( new Responsive_Site_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_h2_text_color' ) );

	}

	/**
	 * Test the h2_text controls are registered
	 */
	function test_customizer_options_h2_text_control() {

		( new Responsive_Site_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_h2_text_color' ) );

	}

	/**
	 * Test the h3_text settings are registered
	 */
	function test_customizer_options_h3_text_setting() {

		( new Responsive_Site_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_h3_text_color' ) );

	}

	/**
	 * Test the h3_text controls are registered
	 */
	function test_customizer_options_h3_text_control() {

		( new Responsive_Site_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_h3_text_color' ) );

	}

	/**
	 * Test the h4_text settings are registered
	 */
	function test_customizer_options_h4_text_setting() {

		( new Responsive_Site_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_h4_text_color' ) );

	}

	/**
	 * Test the h4_text controls are registered
	 */
	function test_customizer_options_h4_text_control() {

		( new Responsive_Site_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_h4_text_color' ) );

	}

	/**
	 * Test the h5_text settings are registered
	 */
	function test_customizer_options_h5_text_setting() {

		( new Responsive_Site_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_h5_text_color' ) );

	}

	/**
	 * Test the h5_text controls are registered
	 */
	function test_customizer_options_h5_text_control() {

		( new Responsive_Site_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_h5_text_color' ) );

	}

	/**
	 * Test the h6_text settings are registered
	 */
	function test_customizer_options_h6_text_setting() {

		( new Responsive_Site_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_h6_text_color' ) );

	}

	/**
	 * Test the h6_text controls are registered
	 */
	function test_customizer_options_h6_text_control() {

		( new Responsive_Site_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_h6_text_color' ) );

	}

	/**
	 * Test the meta_text settings are registered
	 */
	function test_customizer_options_meta_text_setting() {

		( new Responsive_Site_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_meta_text_color' ) );

	}

	/**
	 * Test the meta_text controls are registered
	 */
	function test_customizer_options_meta_text_control() {

		( new Responsive_Site_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_meta_text_color' ) );

	}

	/**
	 * Test the responsive_general_links_separator settings are registered
	 */
	function test_customizer_options_responsive_general_links_separator_setting() {

		( new Responsive_Site_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_responsive_general_links_separator' ) );

	}

	/**
	 * Test the responsive_general_links_separator controls are registered
	 */
	function test_customizer_options_responsive_general_links_separator_control() {

		( new Responsive_Site_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_responsive_general_links_separator' ) );

	}

	/**
	 * Test the link settings are registered
	 */
	function test_customizer_options_link_setting() {

		( new Responsive_Site_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_link_color' ) );

	}

	/**
	 * Test the link controls are registered
	 */
	function test_customizer_options_link_control() {

		( new Responsive_Site_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_link_color' ) );

	}

	/**
	 * Test the link_hover settings are registered
	 */
	function test_customizer_options_link_hover_setting() {

		( new Responsive_Site_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_link_hover_color' ) );

	}

	/**
	 * Test the link_hover controls are registered
	 */
	function test_customizer_options_link_hover_control() {

		( new Responsive_Site_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_link_hover_color' ) );

	}

	/**
	 * Test the responsive_general_buttons_separator settings are registered
	 */
	function test_customizer_options_responsive_general_buttons_separator_setting() {

		( new Responsive_Site_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_responsive_general_buttons_separator' ) );

	}

	/**
	 * Test the responsive_general_buttons_separator controls are registered
	 */
	function test_customizer_options_responsive_general_buttons_separator_control() {

		( new Responsive_Site_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_responsive_general_buttons_separator' ) );

	}

	/**
	 * Test the button settings are registered
	 */
	function test_customizer_options_button_setting() {

		( new Responsive_Site_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_button_color' ) );

	}

	/**
	 * Test the button controls are registered
	 */
	function test_customizer_options_button_control() {

		( new Responsive_Site_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_button_color' ) );

	}

	/**
	 * Test the button_hover settings are registered
	 */
	function test_customizer_options_button_hover_setting() {

		( new Responsive_Site_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_button_hover_color' ) );

	}

	/**
	 * Test the button_hover controls are registered
	 */
	function test_customizer_options_button_hover_control() {

		( new Responsive_Site_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_button_hover_color' ) );

	}

	/**
	 * Test the button_text settings are registered
	 */
	function test_customizer_options_button_text_setting() {

		( new Responsive_Site_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_button_text_color' ) );

	}

	/**
	 * Test the button_text controls are registered
	 */
	function test_customizer_options_button_text_control() {

		( new Responsive_Site_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_button_text_color' ) );

	}

	/**
	 * Test the button_hover_text settings are registered
	 */
	function test_customizer_options_button_hover_text_setting() {

		( new Responsive_Site_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_button_hover_text_color' ) );

	}

	/**
	 * Test the button_hover_text controls are registered
	 */
	function test_customizer_options_button_hover_text_control() {

		( new Responsive_Site_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_button_hover_text_color' ) );

	}

	/**
	 * Test the button_border settings are registered
	 */
	function test_customizer_options_button_border_setting() {

		( new Responsive_Site_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_button_border_color' ) );

	}

	/**
	 * Test the button_border controls are registered
	 */
	function test_customizer_options_button_border_control() {

		( new Responsive_Site_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_button_border_color' ) );

	}

	/**
	 * Test the button_hover_border settings are registered
	 */
	function test_customizer_options_button_hover_border_setting() {

		( new Responsive_Site_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_button_hover_border_color' ) );

	}

	/**
	 * Test the button_hover_border controls are registered
	 */
	function test_customizer_options_button_hover_border_control() {

		( new Responsive_Site_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_button_hover_border_color' ) );

	}

	/**
	 * Test the responsive_general_inputs_separator settings are registered
	 */
	function test_customizer_options_responsive_general_inputs_separator_setting() {

		( new Responsive_Site_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_responsive_general_inputs_separator' ) );

	}

	/**
	 * Test the responsive_general_inputs_separator controls are registered
	 */
	function test_customizer_options_responsive_general_inputs_separator_control() {

		( new Responsive_Site_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_responsive_general_inputs_separator' ) );

	}

	/**
	 * Test the inputs_background settings are registered
	 */
	function test_customizer_options_inputs_background_setting() {

		( new Responsive_Site_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_inputs_background_color' ) );

	}

	/**
	 * Test the inputs_background controls are registered
	 */
	function test_customizer_options_inputs_background_control() {

		( new Responsive_Site_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_inputs_background_color' ) );

	}

	/**
	 * Test the inputs_text settings are registered
	 */
	function test_customizer_options_inputs_text_setting() {

		( new Responsive_Site_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_inputs_text_color' ) );

	}

	/**
	 * Test the inputs_text controls are registered
	 */
	function test_customizer_options_inputs_text_control() {

		( new Responsive_Site_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_inputs_text_color' ) );

	}

	/**
	 * Test the inputs_border settings are registered
	 */
	function test_customizer_options_inputs_border_setting() {

		( new Responsive_Site_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_inputs_border_color' ) );

	}

	/**
	 * Test the inputs_border controls are registered
	 */
	function test_customizer_options_inputs_border_control() {

		( new Responsive_Site_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_inputs_border_color' ) );

	}

	/**
	 * Test the responsive_general_labels_separator settings are registered
	 */
	function test_customizer_options_responsive_general_labels_separator_setting() {

		( new Responsive_Site_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_responsive_general_labels_separator' ) );

	}

	/**
	 * Test the responsive_general_labels_separator controls are registered
	 */
	function test_customizer_options_responsive_general_labels_separator_control() {

		( new Responsive_Site_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_responsive_general_labels_separator' ) );

	}

	/**
	 * Test the label settings are registered
	 */
	function test_customizer_options_label_setting() {

		( new Responsive_Site_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_label_color' ) );

	}

	/**
	 * Test the label controls are registered
	 */
	function test_customizer_options_label_control() {

		( new Responsive_Site_Colors_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_label_color' ) );

	}

}
