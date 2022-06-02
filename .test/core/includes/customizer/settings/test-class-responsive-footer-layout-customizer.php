<?php

class Test_Class_Responsive_Footer_Layout_Customizer extends WP_UnitTestCase {

	function setUp() {

		parent::setUp();

		wp_set_current_user( $this->factory->user->create( array( 'role' => 'administrator' ) ) );

		require_once ABSPATH . WPINC . '/class-wp-customize-manager.php';

		global $wp_customize;

		$GLOBALS['wp_customize'] = new WP_Customize_Manager();
		$GLOBALS['wp_customize']->setup_theme();
		$GLOBALS['wp_customize']->register_controls();

		require_once get_parent_theme_file_path( 'core/includes/customizer/settings/class-responsive-footer-layout-customizer.php' );
		require_once get_parent_theme_file_path( 'core/includes/customizer/controls/dimensions/class-responsive-customizer-dimensions-control.php' );
	}

	function tearDown() {

		parent::tearDown();

	}

	/**
	 * Test the responsive_footer_layout section is registered
	 */
	function test_customizer_options_responsive_footer_layout_section() {

		( new Responsive_Footer_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_section( 'responsive_footer_layout' ) );

	}

	/**
	 * Test the footer_full_width settings are registered
	 */
	function test_customizer_options_footer_full_width_setting() {

		( new Responsive_Footer_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_footer_full_width' ) );

	}

	/**
	 * Test the footer_full_width controls are registered
	 */
	function test_customizer_options_footer_full_width_control() {

		( new Responsive_Footer_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_footer_full_width' ) );

	}

	/**
	 * Test the footer_widgets_separator settings are registered
	 */
	function test_customizer_options_footer_widgets_separator_setting() {

		( new Responsive_Footer_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_footer_widgets_separator' ) );

	}

	/**
	 * Test the footer_widgets_separator controls are registered
	 */
	function test_customizer_options_footer_widgets_separator_control() {

		( new Responsive_Footer_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_footer_widgets_separator' ) );

	}

	/**
	 * Test the footer_widgets_columns settings are registered
	 */
	function test_customizer_options_footer_widgets_columns_setting() {

		( new Responsive_Footer_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_footer_widgets_columns' ) );

	}

	/**
	 * Test the footer_widgets_columns controls are registered
	 */
	function test_customizer_options_footer_widgets_columns_control() {

		( new Responsive_Footer_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_footer_widgets_columns' ) );

	}

	/**
	 * Test the footer_widgets_top_padding settings are registered
	 */
	function test_customizer_options_footer_widgets_top_padding_setting() {

		( new Responsive_Footer_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_footer_widgets_top_padding' ) );

	}

	/**
	 * Test the footer_widgets_left_padding settings are registered
	 */
	function test_customizer_options_footer_widgets_left_padding_setting() {

		( new Responsive_Footer_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_footer_widgets_left_padding' ) );

	}

	/**
	 * Test the footer_widgets_bottom_padding settings are registered
	 */
	function test_customizer_options_footer_widgets_bottom_padding_setting() {

		( new Responsive_Footer_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_footer_widgets_bottom_padding' ) );

	}

	/**
	 * Test the footer_widgets_right_padding settings are registered
	 */
	function test_customizer_options_footer_widgets_right_padding_setting() {

		( new Responsive_Footer_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_footer_widgets_right_padding' ) );

	}

	/**
	 * Test the footer_widgets_tablet_top_padding settings are registered
	 */
	function test_customizer_options_footer_widgets_tablet_top_padding_setting() {

		( new Responsive_Footer_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_footer_widgets_tablet_top_padding' ) );

	}

	/**
	 * Test the footer_widgets_tablet_right_padding settings are registered
	 */
	function test_customizer_options_footer_widgets_tablet_right_padding_setting() {

		( new Responsive_Footer_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_footer_widgets_tablet_right_padding' ) );

	}

	/**
	 * Test the footer_widgets_tablet_bottom_padding settings are registered
	 */
	function test_customizer_options_footer_widgets_tablet_bottom_padding_setting() {

		( new Responsive_Footer_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_footer_widgets_tablet_bottom_padding' ) );

	}

	/**
	 * Test the footer_widgets_tablet_left_padding settings are registered
	 */
	function test_customizer_options_footer_widgets_tablet_left_padding_setting() {

		( new Responsive_Footer_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_footer_widgets_tablet_left_padding' ) );

	}

	/**
	 * Test the footer_widgets_mobile_top_padding settings are registered
	 */
	function test_customizer_options_footer_widgets_mobile_top_padding_setting() {

		( new Responsive_Footer_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_footer_widgets_mobile_top_padding' ) );

	}

	/**
	 * Test the footer_widgets_mobile_right_padding settings are registered
	 */
	function test_customizer_options_footer_widgets_mobile_right_padding_setting() {

		( new Responsive_Footer_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_footer_widgets_mobile_right_padding' ) );

	}

	/**
	 * Test the footer_widgets_mobile_bottom_padding settings are registered
	 */
	function test_customizer_options_footer_widgets_mobile_bottom_padding_setting() {

		( new Responsive_Footer_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_footer_widgets_mobile_bottom_padding' ) );

	}

	/**
	 * Test the footer_widgets_mobile_left_padding settings are registered
	 */
	function test_customizer_options_footer_widgets_mobile_left_padding_setting() {

		( new Responsive_Footer_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_footer_widgets_mobile_left_padding' ) );

	}

	/**
	 * Test the footer_widgets_padding controls are registered
	 */
	function test_customizer_options_footer_widgets_padding_control() {

		( new Responsive_Footer_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_footer_widgets_padding' ) );

	}

	/**
	 * Test the footer_bar_separator settings are registered
	 */
	function test_customizer_options_footer_bar_separator_setting() {

		( new Responsive_Footer_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_footer_bar_separator' ) );

	}

	/**
	 * Test the footer_bar_separator controls are registered
	 */
	function test_customizer_options_footer_bar_separator_control() {

		( new Responsive_Footer_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_footer_bar_separator' ) );

	}

	/**
	 * Test the res_copyright_textbox settings are registered
	 */
	function test_customizer_options_res_copyright_textbox_setting() {

		( new Responsive_Footer_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_theme_options[copyright_textbox]' ) );

	}

	/**
	 * Test the res_copyright_textbox controls are registered
	 */
	function test_customizer_options_res_copyright_textbox_control() {

		( new Responsive_Footer_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'res_copyright_textbox' ) );

	}

	/**
	 * Test the res_poweredby_link settings are registered
	 */
	function test_customizer_options_res_poweredby_link_setting() {

		( new Responsive_Footer_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_theme_options[poweredby_link]' ) );

	}

	/**
	 * Test the res_poweredby_link controls are registered
	 */
	function test_customizer_options_res_poweredby_link_control() {

		( new Responsive_Footer_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'res_poweredby_link' ) );

	}

	/**
	 * Test the footer_bar_layout settings are registered
	 */
	function test_customizer_options_footer_bar_layout_setting() {

		( new Responsive_Footer_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_footer_bar_layout' ) );

	}

	/**
	 * Test the footer_bar_layout controls are registered
	 */
	function test_customizer_options_footer_bar_layout_control() {

		( new Responsive_Footer_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_footer_bar_layout' ) );

	}

	/**
	 * Test the footer_bar_top_padding settings are registered
	 */
	function test_customizer_options_footer_bar_top_padding_setting() {

		( new Responsive_Footer_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_footer_bar_top_padding' ) );

	}

	/**
	 * Test the footer_bar_left_padding settings are registered
	 */
	function test_customizer_options_footer_bar_left_padding_setting() {

		( new Responsive_Footer_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_footer_bar_left_padding' ) );

	}

	/**
	 * Test the footer_bar_bottom_padding settings are registered
	 */
	function test_customizer_options_footer_bar_bottom_padding_setting() {

		( new Responsive_Footer_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_footer_bar_bottom_padding' ) );

	}

	/**
	 * Test the footer_bar_right_padding settings are registered
	 */
	function test_customizer_options_footer_bar_right_padding_setting() {

		( new Responsive_Footer_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_footer_bar_right_padding' ) );

	}

	/**
	 * Test the footer_bar_tablet_top_padding settings are registered
	 */
	function test_customizer_options_footer_bar_tablet_top_padding_setting() {

		( new Responsive_Footer_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_footer_bar_tablet_top_padding' ) );

	}

	/**
	 * Test the footer_bar_tablet_right_padding settings are registered
	 */
	function test_customizer_options_footer_bar_tablet_right_padding_setting() {

		( new Responsive_Footer_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_footer_bar_tablet_right_padding' ) );

	}

	/**
	 * Test the footer_bar_tablet_bottom_padding settings are registered
	 */
	function test_customizer_options_footer_bar_tablet_bottom_padding_setting() {

		( new Responsive_Footer_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_footer_bar_tablet_bottom_padding' ) );

	}

	/**
	 * Test the footer_bar_tablet_left_padding settings are registered
	 */
	function test_customizer_options_footer_bar_tablet_left_padding_setting() {

		( new Responsive_Footer_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_footer_bar_tablet_left_padding' ) );

	}

	/**
	 * Test the footer_bar_mobile_top_padding settings are registered
	 */
	function test_customizer_options_footer_bar_mobile_top_padding_setting() {

		( new Responsive_Footer_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_footer_bar_mobile_top_padding' ) );

	}

	/**
	 * Test the footer_bar_mobile_right_padding settings are registered
	 */
	function test_customizer_options_footer_bar_mobile_right_padding_setting() {

		( new Responsive_Footer_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_footer_bar_mobile_right_padding' ) );

	}

	/**
	 * Test the footer_bar_mobile_bottom_padding settings are registered
	 */
	function test_customizer_options_footer_bar_mobile_bottom_padding_setting() {

		( new Responsive_Footer_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_footer_bar_mobile_bottom_padding' ) );

	}

	/**
	 * Test the footer_bar_mobile_left_padding settings are registered
	 */
	function test_customizer_options_footer_bar_mobile_left_padding_setting() {

		( new Responsive_Footer_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_footer_bar_mobile_left_padding' ) );

	}

	/**
	 * Test the footer_bar_padding controls are registered
	 */
	function test_customizer_options_footer_bar_padding_control() {

		( new Responsive_Footer_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_footer_bar_padding' ) );

	}

	/**
	 * Test the social_links_separator settings are registered
	 */
	function test_customizer_options_social_links_separator_setting() {

		( new Responsive_Footer_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_social_links_separator' ) );

	}

	/**
	 * Test the social_links_separator controls are registered
	 */
	function test_customizer_options_social_links_separator_control() {

		( new Responsive_Footer_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'responsive_social_links_separator' ) );

	}

	/**
	 * Test the res_twitter settings are registered
	 */
	function test_customizer_options_res_twitter_setting() {

		( new Responsive_Footer_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_theme_options[twitter_uid]' ) );

	}

	/**
	 * Test the res_twitter controls are registered
	 */
	function test_customizer_options_res_twitter_control() {

		( new Responsive_Footer_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'res_twitter' ) );

	}
	/**
	 * Test the res_facebook settings are registered
	 */
	function test_customizer_options_res_facebook_setting() {

		( new Responsive_Footer_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_theme_options[facebook_uid]' ) );

	}

	/**
	 * Test the res_facebook controls are registered
	 */
	function test_customizer_options_res_facebook_control() {

		( new Responsive_Footer_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'res_facebook' ) );

	}
	/**
	 * Test the res_linkedin settings are registered
	 */
	function test_customizer_options_res_linkedin_setting() {

		( new Responsive_Footer_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_theme_options[linkedin_uid]' ) );

	}

	/**
	 * Test the res_linkedin controls are registered
	 */
	function test_customizer_options_res_linkedin_control() {

		( new Responsive_Footer_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'res_linkedin' ) );

	}
	/**
	 * Test the res_youtube settings are registered
	 */
	function test_customizer_options_res_youtube_setting() {

		( new Responsive_Footer_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_theme_options[youtube_uid]' ) );

	}

	/**
	 * Test the res_youtube controls are registered
	 */
	function test_customizer_options_res_youtube_control() {

		( new Responsive_Footer_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'res_youtube' ) );

	}
	/**
	 * Test the res_rss settings are registered
	 */
	function test_customizer_options_res_rss_setting() {

		( new Responsive_Footer_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_theme_options[rss_uid]' ) );

	}

	/**
	 * Test the res_rss controls are registered
	 */
	function test_customizer_options_res_rss_control() {

		( new Responsive_Footer_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'res_rss' ) );

	}
	/**
	 * Test the res_instagram settings are registered
	 */
	function test_customizer_options_res_instagram_setting() {

		( new Responsive_Footer_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_theme_options[instagram_uid]' ) );

	}

	/**
	 * Test the res_instagram controls are registered
	 */
	function test_customizer_options_res_instagram_control() {

		( new Responsive_Footer_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'res_instagram' ) );

	}
	/**
	 * Test the res_pinterest settings are registered
	 */
	function test_customizer_options_res_pinterest_setting() {

		( new Responsive_Footer_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_theme_options[pinterest_uid]' ) );

	}

	/**
	 * Test the res_pinterest controls are registered
	 */
	function test_customizer_options_res_pinterest_control() {

		( new Responsive_Footer_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'res_pinterest' ) );

	}
	/**
	 * Test the res_stumble settings are registered
	 */
	function test_customizer_options_res_stumble_setting() {

		( new Responsive_Footer_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_theme_options[stumbleupon_uid]' ) );

	}

	/**
	 * Test the res_stumble controls are registered
	 */
	function test_customizer_options_res_stumble_control() {

		( new Responsive_Footer_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'res_stumble' ) );

	}
	/**
	 * Test the res_vimeo settings are registered
	 */
	function test_customizer_options_res_vimeo_setting() {

		( new Responsive_Footer_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_theme_options[vimeo_uid]' ) );

	}

	/**
	 * Test the res_vimeo controls are registered
	 */
	function test_customizer_options_res_vimeo_control() {

		( new Responsive_Footer_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'res_vimeo' ) );

	}
	/**
	 * Test the res_yelp settings are registered
	 */
	function test_customizer_options_res_yelp_setting() {

		( new Responsive_Footer_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_theme_options[yelp_uid]' ) );

	}

	/**
	 * Test the res_yelp controls are registered
	 */
	function test_customizer_options_res_yelp_control() {

		( new Responsive_Footer_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'res_yelp' ) );

	}
	/**
	 * Test the res_foursquare settings are registered
	 */
	function test_customizer_options_res_foursquare_setting() {

		( new Responsive_Footer_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_theme_options[foursquare_uid]' ) );

	}

	/**
	 * Test the res_foursquare controls are registered
	 */
	function test_customizer_options_res_foursquare_control() {

		( new Responsive_Footer_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'res_foursquare' ) );

	}
	/**
	 * Test the email_uid settings are registered
	 */
	function test_customizer_options_email_uid_setting() {

		( new Responsive_Footer_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_setting( 'responsive_theme_options[email_uid]' ) );

	}

	/**
	 * Test the email_uid controls are registered
	 */
	function test_customizer_options_email_uid_control() {

		( new Responsive_Footer_Layout_Customizer() )->customizer_options( $GLOBALS['wp_customize'] );

		$this->assertNotNull( $GLOBALS['wp_customize']->get_control( 'email_uid' ) );

	}

}
