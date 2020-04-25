<?php
class Test_Functions extends WP_UnitTestCase {


	function setUp() {
		parent::setUp();

		Responsive\Core\setup();

	}

	function tearDown() {

		parent::tearDown();

	}

	/**
	 * Test the hooked responsive_load_customize_controls.
	 */
	function testHookedresponsive_load_customize_controls() {

		$this->assertEquals(
			10,
			has_action( 'customize_register', 'Responsive\Core\responsive_load_customize_controls' ),
			'customize_register is not attached to Responsive\Core\responsive_load_customize_controls. It might also have the wrong priority (validated priority: 10)'
		);

	}

	/**
	 * Test the hooked responsive_setup.
	 */
	function testHookedresponsive_setup() {

		$this->assertEquals(
			10,
			has_action( 'after_setup_theme', 'Responsive\Core\responsive_setup' ),
			'after_setup_theme is not attached to Responsive\Core\responsive_setup. It might also have the wrong priority (validated priority: 10)'
		);

	}

	/**
	 * Test the hooked responsive_content_width.
	 */
	function testHookedresponsive_content_width() {

		$this->assertEquals(
			10,
			has_action( 'template_redirect', 'Responsive\Core\responsive_content_width' ),
			'template_redirect is not attached to Responsive\Core\responsive_content_width. It might also have the wrong priority (validated priority: 10)'
		);

	}

	/**
	 * Test the hooked responsive_css.
	 */
	function testHookedresponsive_css() {

		$this->assertEquals(
			10,
			has_action( 'wp_enqueue_scripts', 'Responsive\Core\responsive_css' ),
			'wp_enqueue_scripts is not attached to Responsive\Core\responsive_css. It might also have the wrong priority (validated priority: 10)'
		);

	}

	/**
	 * Test the hooked responsive_js.
	 */
	function testHookedresponsive_js() {

		$this->assertEquals(
			10,
			has_action( 'wp_enqueue_scripts', 'Responsive\Core\responsive_js' ),
			'wp_enqueue_scripts is not attached to Responsive\Core\responsive_js. It might also have the wrong priority (validated priority: 10)'
		);

	}

	/**
	 * Test the hooked responsive_team_add_meta_box.
	 */
	function testHookedresponsive_team_add_meta_box() {

		$this->assertEquals(
			10,
			has_action( 'add_meta_boxes', 'Responsive\Core\responsive_team_add_meta_box' ),
			'add_meta_boxes is not attached to Responsive\Core\responsive_team_add_meta_box. It might also have the wrong priority (validated priority: 10)'
		);

	}

	/**
	 * Test the hooked responsive_team_meta_box_save.
	 */
	function testHookedresponsive_team_meta_box_save() {

		$this->assertEquals(
			10,
			has_action( 'save_post', 'Responsive\Core\responsive_team_meta_box_save' ),
			'save_post is not attached to Responsive\Core\responsive_team_meta_box_save. It might also have the wrong priority (validated priority: 10)'
		);

	}

	/**
	 * Test the hooked responsive_enqueue_comment_reply.
	 */
	function testHookedresponsive_enqueue_comment_reply() {

		$this->assertEquals(
			10,
			has_action( 'wp_enqueue_scripts', 'Responsive\Core\responsive_enqueue_comment_reply' ),
			'wp_enqueue_scripts is not attached to Responsive\Core\responsive_enqueue_comment_reply. It might also have the wrong priority (validated priority: 10)'
		);

	}
	/**
	 * Test the hooked responsive_enqueue_scrolltotop.
	 */
	function testHookedresponsive_enqueue_scrolltotop() {

		$this->assertEquals(
			10,
			has_action( 'wp_enqueue_scripts', 'Responsive\Core\responsive_enqueue_scrolltotop' ),
			'wp_enqueue_scripts is not attached to Responsive\Core\responsive_enqueue_scrolltotop. It might also have the wrong priority (validated priority: 10)'
		);

	}
	/**
	 * Test the hooked responsive_front_page_override.
	 */
	function testHookedresponsive_front_page_override() {

		$this->assertEquals(
			10,
			has_action( 'pre_update_option_show_on_front', 'Responsive\Core\responsive_front_page_override' ),
			'pre_update_option_show_on_front is not attached to Responsive\Core\responsive_front_page_override. It might also have the wrong priority (validated priority: 10)'
		);

	}
	/**
	 * Test the hooked responsive_add_class.
	 */
	function testHookedresponsive_add_class() {

		$this->assertEquals(
			10,
			has_action( 'body_class', 'Responsive\Core\responsive_add_class' ),
			'body_class is not attached to Responsive\Core\responsive_add_class. It might also have the wrong priority (validated priority: 10)'
		);

	}
	/**
	 * Test the hooked responsive_add_custom_body_classes.
	 */
	function testHookedresponsive_add_custom_body_classes() {

		$this->assertEquals(
			10,
			has_action( 'body_class', 'Responsive\Core\responsive_add_custom_body_classes' ),
			'body_class is not attached to Responsive\Core\responsive_add_custom_body_classes. It might also have the wrong priority (validated priority: 10)'
		);

	}
	/**
	 * Test the hooked responsive_add_pro_button.
	 */
	function testHookedresponsive_add_pro_button() {

		$this->assertEquals(
			10,
			has_action( 'customize_controls_print_footer_scripts', 'Responsive\Core\responsive_add_pro_button' ),
			'customize_controls_print_footer_scripts is not attached to Responsive\Core\responsive_add_pro_button. It might also have the wrong priority (validated priority: 10)'
		);

	}

	/**
	 * Test the global content width is set
	 */
	function testGlobalContentWidth() {
		global $content_width;
		$this->assertEquals( $content_width, 605 );

	}
}
