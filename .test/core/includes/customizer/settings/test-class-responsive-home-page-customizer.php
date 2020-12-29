<?php

class Test_Class_Responsive_Home_Page_Customizer extends WP_UnitTestCase {

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
	 * Test the custom_home_page_section_separtor settings are registered
	 */
	function test_customizer_options_custom_home_page_section_separtor_setting() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_custom_home_page_section_separtor' ) );

	}

	/**
	 * Test the custom_home_page_section_separtor controls are registered
	 */
	function test_customizer_options_custom_home_page_section_separtor_control() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_custom_home_page_section_separtor' ) );

	}

	/**
	 * Test the responsive_theme_options[front_page] settings are registered
	 */
	function test_customizer_options_res_front_page_setting() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_theme_options[front_page]' ) );

	}

	/**
	 * Test the res_front_page controls are registered
	 */
	function test_customizer_options_res_front_page_control() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'res_front_page' ) );

	}

	/**
	 * Test the custom_hero_area_separtor settings are registered
	 */
	function test_customizer_options_custom_hero_area_separtor_setting() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_custom_hero_area_separtor' ) );

	}

	/**
	 * Test the custom_hero_area_separtor controls are registered
	 */
	function test_customizer_options_custom_hero_area_separtor_control() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_custom_hero_area_separtor' ) );

	}

	/**
	 * Test the disable_hero_area settings are registered
	 */
	function test_customizer_options_disable_hero_area_setting() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_disable_hero_area' ) );

	}

	/**
	 * Test the disable_hero_area controls are registered
	 */
	function test_customizer_options_disable_hero_area_control() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_disable_hero_area' ) );

	}

	/**
	 * Test the responsive_theme_options[home_headline] settings are registered
	 */
	function test_customizer_options_res_home_headline_setting() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_theme_options[home_headline]' ) );

	}

	/**
	 * Test the res_home_headline controls are registered
	 */
	function test_customizer_options_res_home_headline_control() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'res_home_headline' ) );

	}

	/**
	 * Test the responsive_theme_options[home_subheadline] settings are registered
	 */
	function test_customizer_options_res_home_subheadline_setting() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_theme_options[home_subheadline]' ) );

	}

	/**
	 * Test the res_home_subheadline controls are registered
	 */
	function test_customizer_options_res_home_subheadline_control() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'res_home_subheadline' ) );

	}

	/**
	 * Test the responsive_theme_options[home_content_area] settings are registered
	 */
	function test_customizer_options_res_home_content_area_setting() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_theme_options[home_content_area]' ) );

	}

	/**
	 * Test the res_home_content_area controls are registered
	 */
	function test_customizer_options_res_home_content_area_control() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'res_home_content_area' ) );

	}

	/**
	 * Test the responsive_theme_options[cta_button] settings are registered
	 */
	function test_customizer_options_res_cta_button_setting() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_theme_options[cta_button]' ) );

	}

	/**
	 * Test the res_cta_button controls are registered
	 */
	function test_customizer_options_res_cta_button_control() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'res_cta_button' ) );

	}

	/**
	 * Test the responsive_theme_options[cta_url] settings are registered
	 */
	function test_customizer_options_res_cta_url_setting() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_theme_options[cta_url]' ) );

	}

	/**
	 * Test the res_cta_url controls are registered
	 */
	function test_customizer_options_res_cta_url_control() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'res_cta_url' ) );

	}

	/**
	 * Test the responsive_theme_options[cta_text] settings are registered
	 */
	function test_customizer_options_res_cta_text_setting() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_theme_options[cta_text]' ) );

	}

	/**
	 * Test the res_cta_text controls are registered
	 */
	function test_customizer_options_res_cta_text_control() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'res_cta_text' ) );

	}

	/**
	 * Test the responsive_theme_options[button_style] settings are registered
	 */
	function test_customizer_options_static_page_layout_default_setting() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_theme_options[button_style]' ) );

	}

	/**
	 * Test the static_page_layout_default controls are registered
	 */
	function test_customizer_options_static_page_layout_default_control() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'static_page_layout_default' ) );

	}

	/**
	 * Test the responsive_home_content_area_image settings are registered
	 */
	function test_customizer_options_responsive_home_content_area_image_setting() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_home_content_area_image' ) );

	}

	/**
	 * Test the responsive_home_content_area_image controls are registered
	 */
	function test_customizer_options_responsive_home_content_area_image_control() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_home_content_area_image' ) );

	}

	/**
	 * Test the responsive_theme_options[featured_content] settings are registered
	 */
	function test_customizer_options_res_featured_content_setting() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_theme_options[featured_content]' ) );

	}

	/**
	 * Test the res_featured_content controls are registered
	 */
	function test_customizer_options_res_featured_content_control() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'res_featured_content' ) );

	}

	/**
	 * Test the custom_about_section_separtor settings are registered
	 */
	function test_customizer_options_custom_about_section_separtor_setting() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_custom_about_section_separtor' ) );

	}

	/**
	 * Test the custom_about_section_separtor controls are registered
	 */
	function test_customizer_options_custom_about_section_separtor_control() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_custom_about_section_separtor' ) );

	}

	/**
	 * Test the responsive_theme_options[about] settings are registered
	 */
	function test_customizer_options_about_setting() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_theme_options[about]' ) );

	}

	/**
	 * Test the about controls are registered
	 */
	function test_customizer_options_about_control() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'about' ) );

	}

	/**
	 * Test the responsive_theme_options[about_title] settings are registered
	 */
	function test_customizer_options_about_title_setting() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_theme_options[about_title]' ) );

	}

	/**
	 * Test the about_title controls are registered
	 */
	function test_customizer_options_about_title_control() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'about_title' ) );

	}

	/**
	 * Test the responsive_theme_options[about_text] settings are registered
	 */
	function test_customizer_options_about_text_setting() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_theme_options[about_text]' ) );

	}

	/**
	 * Test the about_text controls are registered
	 */
	function test_customizer_options_about_text_control() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'about_text' ) );

	}

	/**
	 * Test the responsive_theme_options[about_cta_text] settings are registered
	 */
	function test_customizer_options_about_cta_text_setting() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_theme_options[about_cta_text]' ) );

	}

	/**
	 * Test the about_cta_text controls are registered
	 */
	function test_customizer_options_about_cta_text_control() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'about_cta_text' ) );

	}

	/**
	 * Test the responsive_theme_options[about_cta_url] settings are registered
	 */
	function test_customizer_options_about_cta_url_setting() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_theme_options[about_cta_url]' ) );

	}

	/**
	 * Test the about_cta_url controls are registered
	 */
	function test_customizer_options_about_cta_url_control() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'about_cta_url' ) );

	}

	/**
	 * Test the responsive_theme_options[feature] settings are registered
	 */
	function test_customizer_options_feature_front_page_setting() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_theme_options[feature]' ) );

	}

	/**
	 * Test the feature_front_page controls are registered
	 */
	function test_customizer_options_feature_front_page_control() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'feature_front_page' ) );

	}

	/**
	 * Test the custom_feature_section_separtor settings are registered
	 */
	function test_customizer_options_custom_feature_section_separtor_setting() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_custom_feature_section_separtor' ) );

	}

	/**
	 * Test the custom_feature_section_separtor controls are registered
	 */
	function test_customizer_options_custom_feature_section_separtor_control() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_custom_feature_section_separtor' ) );

	}

	/**
	 * Test the responsive_theme_options[feature_title] settings are registered
	 */
	function test_customizer_options_feature_title_setting() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_theme_options[feature_title]' ) );

	}

	/**
	 * Test the feature_title controls are registered
	 */
	function test_customizer_options_feature_title_control() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'feature_title' ) );

	}

	/**
	 * Test the responsive_theme_options[feature1] settings are registered
	 */
	function test_customizer_options_feature1_setting() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_theme_options[feature1]' ) );

	}

	/**
	 * Test the feature1 controls are registered
	 */
	function test_customizer_options_feature1_control() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'feature1' ) );

	}

	/**
	 * Test the feature2 settings are registered
	 */
	function test_customizer_options_feature2_setting() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_theme_options[feature2]' ) );

	}

	/**
	 * Test the feature2 controls are registered
	 */
	function test_customizer_options_feature2_control() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'feature2' ) );

	}

	/**
	 * Test the feature3 settings are registered
	 */
	function test_customizer_options_feature3_setting() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_theme_options[feature3]' ) );

	}

	/**
	 * Test the feature3 controls are registered
	 */
	function test_customizer_options_feature3_control() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'feature3' ) );

	}

	/**
	 * Test the custom_testimonial_section_separtor settings are registered
	 */
	function test_customizer_options_custom_testimonial_section_separtor_setting() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_custom_testimonial_section_separtor' ) );

	}

	/**
	 * Test the custom_testimonial_section_separtor controls are registered
	 */
	function test_customizer_options_custom_testimonial_section_separtor_control() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_custom_testimonial_section_separtor' ) );

	}

	/**
	 * Test the responsive_theme_options[testimonials] settings are registered
	 */
	function test_customizer_options_testimonial_front_page_setting() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_theme_options[testimonials]' ) );

	}

	/**
	 * Test the testimonial_front_page controls are registered
	 */
	function test_customizer_options_testimonial_front_page_control() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'testimonial_front_page' ) );

	}

	/**
	 * Test the responsive_theme_options[testimonial_title] settings are registered
	 */
	function test_customizer_options_testimonial_title_setting() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_theme_options[testimonial_title]' ) );

	}

	/**
	 * Test the testimonial_title controls are registered
	 */
	function test_customizer_options_testimonial_title_control() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'testimonial_title' ) );

	}

	/**
	 * Test the responsive_theme_options[testimonial_val] settings are registered
	 */
	function test_customizer_options_testimonial_val_setting() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_theme_options[testimonial_val]' ) );

	}

	/**
	 * Test the testimonial_val controls are registered
	 */
	function test_customizer_options_testimonial_val_control() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'testimonial_val' ) );

	}

	/**
	 * Test the custom_team_section_separtor settings are registered
	 */
	function test_customizer_options_custom_team_section_separtor_setting() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_custom_team_section_separtor' ) );

	}

	/**
	 * Test the custom_team_section_separtor controls are registered
	 */
	function test_customizer_options_custom_team_section_separtor_control() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_custom_team_section_separtor' ) );

	}

	/**
	 * Test the responsive_theme_options[team] settings are registered
	 */
	function test_customizer_options_team_front_page_setting() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_theme_options[team]' ) );

	}

	/**
	 * Test the team_front_page controls are registered
	 */
	function test_customizer_options_team_front_page_control() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'team_front_page' ) );

	}

	/**
	 * Test the responsive_theme_options[team_title] settings are registered
	 */
	function test_customizer_options_team_title_setting() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_theme_options[team_title]' ) );

	}

	/**
	 * Test the team_title controls are registered
	 */
	function test_customizer_options_team_title_control() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'team_title' ) );

	}

	/**
	 * Test the responsive_theme_options[teammember1] settings are registered
	 */
	function test_customizer_options_teammember1_setting() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_theme_options[teammember1]' ) );

	}

	/**
	 * Test the teammember1 controls are registered
	 */
	function test_customizer_options_teammember1_control() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'teammember1' ) );

	}

	/**
	 * Test the responsive_theme_options[teammember2] settings are registered
	 */
	function test_customizer_options_teammember2_setting() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_theme_options[teammember2]' ) );

	}

	/**
	 * Test the teammember2 controls are registered
	 */
	function test_customizer_options_teammember2_control() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'teammember2' ) );

	}

	/**
	 * Test the responsive_theme_options[teammember3] settings are registered
	 */
	function test_customizer_options_teammember3_setting() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_theme_options[teammember3]' ) );

	}

	/**
	 * Test the teammember3 controls are registered
	 */
	function test_customizer_options_teammember3_control() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'teammember3' ) );

	}

	/**
	 * Test the responsive_theme_options[home-widgets] settings are registered
	 */
	function test_customizer_options_home_widgets_setting() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_theme_options[home-widgets]' ) );

	}

	/**
	 * Test the home-widgets controls are registered
	 */
	function test_customizer_options_home_widgets_control() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'home-widgets' ) );

	}

	/**
	 * Test the custom_contact_section_separtor settings are registered
	 */
	function test_customizer_options_custom_contact_section_separtor_setting() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_custom_contact_section_separtor' ) );

	}

	/**
	 * Test the custom_contact_section_separtor controls are registered
	 */
	function test_customizer_options_custom_contact_section_separtor_control() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_custom_contact_section_separtor' ) );

	}

	/**
	 * Test the responsive_theme_options[contact] settings are registered
	 */
	function test_customizer_options_contact_front_page_setting() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_theme_options[contact]' ) );

	}

	/**
	 * Test the contact_front_page controls are registered
	 */
	function test_customizer_options_contact_front_page_control() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'contact_front_page' ) );

	}

	/**
	 * Test the responsive_theme_options[contact_title] settings are registered
	 */
	function test_customizer_options_contact_title_setting() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_theme_options[contact_title]' ) );

	}

	/**
	 * Test the contact_title controls are registered
	 */
	function test_customizer_options_contact_title_control() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'contact_title' ) );

	}

	/**
	 * Test the responsive_theme_options[contact_subtitle] settings are registered
	 */
	function test_customizer_options_contact_subtitle_setting() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_theme_options[contact_subtitle]' ) );

	}

	/**
	 * Test the contact_subtitle controls are registered
	 */
	function test_customizer_options_contact_subtitle_control() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'contact_subtitle' ) );

	}

	/**
	 * Test the responsive_theme_options[contact_add] settings are registered
	 */
	function test_customizer_options_contact_add_setting() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_theme_options[contact_add]' ) );

	}

	/**
	 * Test the contact_add controls are registered
	 */
	function test_customizer_options_contact_add_control() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'contact_add' ) );

	}

	/**
	 * Test the responsive_theme_options[contact_email] settings are registered
	 */
	function test_customizer_options_contact_email_setting() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_theme_options[contact_email]' ) );

	}

	/**
	 * Test the contact_email controls are registered
	 */
	function test_customizer_options_contact_email_control() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'contact_email' ) );

	}

	/**
	 * Test the responsive_theme_options[contact_ph] settings are registered
	 */
	function test_customizer_options_contact_ph_setting() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_theme_options[contact_ph]' ) );

	}

	/**
	 * Test the contact_ph controls are registered
	 */
	function test_customizer_options_contact_ph_control() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'contact_ph' ) );

	}

	/**
	 * Test the responsive_theme_options[contact_content] settings are registered
	 */
	function test_customizer_options_contact_content_setting() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_theme_options[contact_content]' ) );

	}

	/**
	 * Test the contact_content controls are registered
	 */
	function test_customizer_options_contact_content_control() {

		( new Responsive_Home_Page_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'contact_content' ) );

	}


}
