<?php
class Test_Hooks extends WP_UnitTestCase {


	function setUp() {
		parent::setUp();
		Responsive\setup();
	}

	function tearDown() {

		parent::tearDown();

	}

	/**
	 * Test the hooked responsive_no_js_class.
	 */
	function testHookedresponsive_no_js_class() {

		$this->assertEquals(
			10,
			has_action( 'wp_head', 'Responsive\responsive_no_js_class' ),
			'wp_head is not attached to responsive_no_js_class. It might also have the wrong priority (validated priority: 10)'
		);

	}

	/**
	 * Test the hooked responsive_woocommerce_wrapper.
	 */
	function testHookedresponsive_woocommerce_wrapper() {

		$this->assertEquals(
			10,
			has_action( 'woocommerce_before_main_content', 'Responsive\responsive_woocommerce_wrapper' ),
			'woocommerce_before_main_content is not attached to responsive_woocommerce_wrapper. It might also have the wrong priority (validated priority: 10)'
		);

	}

	/**
	 * Test the hooked responsive_woocommerce_wrapper_end.
	 */
	function testHookedresponsive_woocommerce_wrapper_end() {

		$this->assertEquals(
			10,
			has_action( 'woocommerce_after_main_content', 'Responsive\responsive_woocommerce_wrapper_end' ),
			'woocommerce_after_main_content is not attached to responsive_woocommerce_wrapper_end. It might also have the wrong priority (validated priority: 10)'
		);

	}

	/**
	 * Test the hooked responsive_wrapper_classes.
	 */
	function testHookedresponsive_wrapper_classes() {

		$this->assertEquals(
			10,
			has_action( 'responsive_wrapper', 'Responsive\responsive_wrapper_classes' ),
			'responsive_wrapper is not attached to responsive_wrapper_classes. It might also have the wrong priority (validated priority: 10)'
		);

	}

	/**
	 * Test the hooked responsive_wrapper_classes_close.
	 */
	function testHookedresponsive_wrapper_classes_close() {

		$this->assertEquals(
			10,
			has_action( 'responsive_wrapper_close', 'Responsive\responsive_wrapper_classes_close' ),
			'responsive_wrapper_close is not attached to responsive_wrapper_classes_close. It might also have the wrong priority (validated priority: 10)'
		);

	}

	/**
	 * Test the hooked responsive_woocommerce_after_single_product_summary.
	 */
	function testHookedresponsive_woocommerce_after_single_product_summary() {

		$this->assertEquals(
			10,
			has_action( 'woocommerce_after_single_product_summary', 'Responsive\responsive_woocommerce_after_single_product_summary' ),
			'woocommerce_after_single_product_summary is not attached to responsive_woocommerce_after_single_product_summary. It might also have the wrong priority (validated priority: 10)'
		);

	}

	/**
	 * Test the hooked responsive_close_container.
	 */
	function testHookedresponsive_close_container() {

		$this->assertEquals(
			10,
			has_action( 'woocommerce_after_shop_loop', 'Responsive\responsive_close_container' ),
			'woocommerce_after_shop_loop is not attached to responsive_close_container. It might also have the wrong priority (validated priority: 10)'
		);

	}

	/**
	 * Test the hooked responsive_woocommerce_archive_description.
	 */
	function testHookedresponsive_woocommerce_archive_description() {

		$this->assertEquals(
			10,
			has_action( 'woocommerce_archive_description', 'Responsive\responsive_woocommerce_archive_description' ),
			'woocommerce_archive_description is not attached to responsive_woocommerce_archive_description. It might also have the wrong priority (validated priority: 10)'
		);

	}

	/**
	 * Test the hooked responsive_close_container.
	 */
	function testHookedbeforeresponsive_close_container() {

		$this->assertEquals(
			10,
			has_action( 'woocommerce_before_single_product', 'Responsive\responsive_close_container' ),
			'woocommerce_before_single_product is not attached to responsive_close_container. It might also have the wrong priority (validated priority: 10)'
		);

	}

	/**
	 * Test the hooked responsive_custom_logo_link.
	 */
	function testHookedresponsive_custom_logo_link() {

		$this->assertEquals(
			10,
			has_filter( 'get_custom_logo', 'Responsive\responsive_custom_logo_link' ),
			'get_custom_logo is not attached to responsive_custom_logo_link. It might also have the wrong priority (validated priority: 10)'
		);

	}

	/**
	 * Test the hooked responsive_theme_wrapper_start.
	 */
	function testHookedresponsive_theme_wrapper_start() {
		if ( class_exists( 'Sensei_Main' ) ) {
			$this->assertEquals(
				10,
				has_action( 'sensei_before_main_content', 'Responsive\responsive_theme_wrapper_start' ),
				'sensei_before_main_content is not attached to responsive_theme_wrapper_start. It might also have the wrong priority (validated priority: 10)'
			);
		}

	}
	/**
	 * Test the hooked responsive_theme_wrapper_end.
	 */
	function testHookedresponsive_theme_wrapper_end() {
		if ( class_exists( 'Sensei_Main' ) ) {
			$this->assertEquals(
				10,
				has_action( 'sensei_after_main_content', 'Responsive\responsive_theme_wrapper_end' ),
				'sensei_after_main_content is not attached to responsive_theme_wrapper_end. It might also have the wrong priority (validated priority: 10)'
			);
		}

	}

	/**
	 * Test the hooked responsive_sensei_read_more_text.
	 */
	function testHookedresponsive_sensei_read_more_text() {
		if ( class_exists( 'Sensei_Main' ) ) {
			$this->assertEquals(
				30,
				has_filter( 'responsive_post_read_more', 'Responsive\responsive_sensei_read_more_text' ),
				'responsive_post_read_more is not attached to responsive_sensei_read_more_text. It might also have the wrong priority (validated priority: 10)'
			);
		}

	}

	/**
	 * Test the hooked responsive_excerpt_length.
	 */
	function testHooked() {
		if ( class_exists( 'Sensei_Main' ) ) {
			$this->assertEquals(
				30,
				has_filter( 'excerpt_length', 'Responsive\responsive_sensei_custom_excerpt_length' ),
				'excerpt_length is not attached to responsive_sensei_custom_excerpt_length. It might also have the wrong priority (validated priority: 10)'
			);
		}

	}

	/**
	 * Test responsive_container() runs the responsive_container action
	 */
	public function test_responsive_container_responsive_container() {

		Responsive\responsive_container();

		$this->assertEquals( 1, did_action( 'responsive_container' ) );

	}

	/**
	 * Test responsive_container_end() runs the responsive_container_end action
	 */
	public function test_responsive_container_end_responsive_container_end() {

		Responsive\responsive_container_end();

		$this->assertEquals( 1, did_action( 'responsive_container_end' ) );

	}
	/**
	 * Test responsive_header() runs the responsive_header action
	 */
	public function test_responsive_header_responsive_header() {

		Responsive\responsive_header();

		$this->assertEquals( 1, did_action( 'responsive_header' ) );

	}
	/**
	 * Test responsive_header_top() runs the responsive_header_top action
	 */
	public function test_responsive_header_top_responsive_header_top() {

		Responsive\responsive_header_top();

		$this->assertEquals( 1, did_action( 'responsive_header_top' ) );

	}
	/**
	 * Test responsive_header_with_logo() runs the responsive_header_with_logo action
	 */
	public function test_responsive_header_with_logo_responsive_header_with_logo() {

		Responsive\responsive_header_with_logo();

		$this->assertEquals( 1, did_action( 'responsive_header_with_logo' ) );

	}
	/**
	 * Test responsive_header_bottom() runs the responsive_header_bottom action
	 */
	public function test_responsive_header_bottom_responsive_header_bottom() {

		Responsive\responsive_header_bottom();

		$this->assertEquals( 1, did_action( 'responsive_header_bottom' ) );

	}

	/**
	 * Test responsive_wrapper() runs the responsive_wrapper action
	 */
	public function test_responsive_wrapper_responsive_wrapper() {

		Responsive\responsive_wrapper();

		$this->assertEquals( 1, did_action( 'responsive_wrapper' ) );

	}

	/**
	 * Test responsive_wrapper_close() runs the responsive_wrapper_close action
	 */
	public function test_responsive_wrapper_close_responsive_wrapper_close() {

		Responsive\responsive_wrapper_close();

		$this->assertEquals( 1, did_action( 'responsive_wrapper_close' ) );

	}

	/**
	 * Test responsive_wrapper_top() runs the responsive_wrapper_top action
	 */
	public function test_responsive_wrapper_top_responsive_wrapper_top() {

		Responsive\responsive_wrapper_top();

		$this->assertEquals( 1, did_action( 'responsive_wrapper_top' ) );

	}

	/**
	 * Test responsive_in_wrapper() runs the responsive_in_wrapper action
	 */
	public function test_responsive_in_wrapper_responsive_in_wrapper() {

		Responsive\responsive_in_wrapper();

		$this->assertEquals( 1, did_action( 'responsive_in_wrapper' ) );

	}
	/**
	 * Test responsive_wrapper_bottom() runs the responsive_wrapper_bottom action
	 */
	public function test_responsive_wrapper_bottom_responsive_wrapper_bottom() {

		Responsive\responsive_wrapper_bottom();

		$this->assertEquals( 1, did_action( 'responsive_wrapper_bottom' ) );

	}
	/**
	 * Test responsive_wrapper_end() runs the responsive_wrapper_end action
	 */
	public function test_responsive_wrapper_end_responsive_wrapper_end() {

		Responsive\responsive_wrapper_end();

		$this->assertEquals( 1, did_action( 'responsive_wrapper_end' ) );

	}
	/**
	 * Test responsive_entry_before() runs the responsive_entry_before action
	 */
	public function test_responsive_entry_before_responsive_entry_before() {

		Responsive\responsive_entry_before();

		$this->assertEquals( 1, did_action( 'responsive_entry_before' ) );

	}
	/**
	 * Test responsive_entry_top() runs the responsive_entry_top action
	 */
	public function test_responsive_entry_top_responsive_entry_top() {

		Responsive\responsive_entry_top();

		$this->assertEquals( 1, did_action( 'responsive_entry_top' ) );

	}
	/**
	 * Test responsive_entry_bottom() runs the responsive_entry_bottom action
	 */
	public function test_responsive_entry_bottom_responsive_entry_bottom() {

		Responsive\responsive_entry_bottom();

		$this->assertEquals( 1, did_action( 'responsive_entry_bottom' ) );

	}
	/**
	 * Test responsive_entry_after() runs the responsive_entry_after action
	 */
	public function test_responsive_entry_after_responsive_entry_after() {

		Responsive\responsive_entry_after();

		$this->assertEquals( 1, did_action( 'responsive_entry_after' ) );

	}
	/**
	 * Test responsive_comments_before() runs the responsive_comments_before action
	 */
	public function test_responsive_comments_before_responsive_comments_before() {

		Responsive\responsive_comments_before();

		$this->assertEquals( 1, did_action( 'responsive_comments_before' ) );

	}
	/**
	 * Test responsive_comments_after() runs the responsive_comments_after action
	 */
	public function test_responsive_comments_after_responsive_comments_after() {

		Responsive\responsive_comments_after();

		$this->assertEquals( 1, did_action( 'responsive_comments_after' ) );

	}
	/**
	 * Test responsive_widgets_before() runs the responsive_widgets_before action
	 */
	public function test_responsive_widgets_before_responsive_widgets_before() {

		Responsive\responsive_widgets_before();

		$this->assertEquals( 1, did_action( 'responsive_widgets_before' ) );

	}
	/**
	 * Test responsive_widgets() runs the responsive_widgets action
	 */
	public function test_responsive_widgets_responsive_widgets() {

		Responsive\responsive_widgets();

		$this->assertEquals( 1, did_action( 'responsive_widgets' ) );

	}
	/**
	 * Test responsive_widgets_end() runs the responsive_widgets_end action
	 */
	public function test_responsive_widgets_end_responsive_widgets_end() {

		Responsive\responsive_widgets_end();

		$this->assertEquals( 1, did_action( 'responsive_widgets_end' ) );

	}
	/**
	 * Test responsive_widgets_after() runs the responsive_widgets_after action
	 */
	public function test_responsive_widgets_after_responsive_widgets_after() {

		Responsive\responsive_widgets_after();

		$this->assertEquals( 1, did_action( 'responsive_widgets_after' ) );

	}
	/**
	 * Test responsive_footer_top() runs the responsive_footer_top action
	 */
	public function test_responsive_footer_top_responsive_footer_top() {

		Responsive\responsive_footer_top();

		$this->assertEquals( 1, did_action( 'responsive_footer_top' ) );

	}
	/**
	 * Test responsive_footer_bottom() runs the responsive_footer_bottom action
	 */
	public function test_responsive_footer_bottom_responsive_footer_bottom() {

		Responsive\responsive_footer_bottom();

		$this->assertEquals( 1, did_action( 'responsive_footer_bottom' ) );

	}
	/**
	 * Test responsive_footer_after() runs the responsive_footer_after action
	 */
	public function test_responsive_footer_after_responsive_footer_after() {

		Responsive\responsive_footer_after();

		$this->assertEquals( 1, did_action( 'responsive_footer_after' ) );

	}
	/**
	 * Test responsive_theme_options() runs the responsive_theme_options action
	 */
	public function test_responsive_theme_options_responsive_theme_options() {

		Responsive\responsive_theme_options();

		$this->assertEquals( 1, did_action( 'responsive_theme_options' ) );

	}

}
