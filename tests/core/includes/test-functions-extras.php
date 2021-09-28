<?php
class Test_Functions_Extras extends WP_UnitTestCase {


	function setUp() {
		parent::setUp();
		Responsive\Extra\setup();
	}

	function tearDown() {

		parent::tearDown();

	}

	/**
	 * Test the hooked responsive_remove_recent_comments_style.
	 */
	function testHookedresponsive_remove_recent_comments_style() {

		$this->assertEquals(
			10,
			has_action( 'widgets_init', 'Responsive\Extra\responsive_remove_recent_comments_style' ),
			'widgets_init is not attached to responsive_remove_recent_comments_style. It might also have the wrong priority (validated priority: 10)'
		);

	}

	/**
	 * Test the hooked responsive_wp_page_menu.
	 */
	function testHookedresponsive_wp_page_menu() {

		$this->assertEquals(
			10,
			has_filter( 'wp_page_menu', 'Responsive\Extra\responsive_wp_page_menu' ),
			'wp_page_menu is not attached to responsive_wp_page_menu. It might also have the wrong priority (validated priority: 10)'
		);

	}

	/**
	 * Test the hooked responsive_remove_gallery_css.
	 */
	function testHookedresponsive_remove_gallery_css() {

		$this->assertEquals(
			10,
			has_filter( 'gallery_style', 'Responsive\Extra\responsive_remove_gallery_css' ),
			'gallery_style is not attached to responsive_remove_gallery_css. It might also have the wrong priority (validated priority: 10)'
		);

	}

	/**
	 * Test the hooked responsive_custom_excerpt_more.
	 */
	function testHookedresponsive_custom_excerpt_more() {

		$this->assertEquals(
			10,
			has_filter( 'get_the_excerpt', 'Responsive\Extra\responsive_custom_excerpt_more' ),
			'get_the_excerpt is not attached to responsive_custom_excerpt_more. It might also have the wrong priority (validated priority: 10)'
		);

	}

	/**
	 * Test the hooked responsive_auto_excerpt_more.
	 */
	function testHookedresponsive_auto_excerpt_more() {

		$this->assertEquals(
			10,
			has_filter( 'excerpt_more', 'Responsive\Extra\responsive_auto_excerpt_more' ),
			'excerpt_more is not attached to responsive_auto_excerpt_more. It might also have the wrong priority (validated priority: 10)'
		);

	}

	/**
	 * Test the hooked responsive_excerpt_length.
	 */
	function testHookedresponsive_excerpt_length() {

		$this->assertEquals(
			10,
			has_filter( 'excerpt_length', 'Responsive\Extra\responsive_excerpt_length' ),
			'excerpt_length is not attached to responsive_excerpt_length. It might also have the wrong priority (validated priority: 10)'
		);

	}

	/**
	 * Test the hooked responsive_comment_count.
	 */
	function testHookedresponsive_comment_count() {

		$this->assertEquals(
			0,
			has_filter( 'get_comments_number', 'Responsive\Extra\responsive_comment_count' ),
			'get_comments_number is not attached to responsive_comment_count. It might also have the wrong priority (validated priority: 10)'
		);

	}

	/**
	 * Test the hooked responsive_category_rel_removal.
	 */
	function testHookedresponsive_category_rel_removal() {

		$this->assertEquals(
			10,
			has_filter( 'wp_list_categories', 'Responsive\Extra\responsive_category_rel_removal' ),
			'wp_list_categories is not attached to responsive_category_rel_removal. It might also have the wrong priority (validated priority: 10)'
		);

	}

	/**
	 * Test the hooked responsive_category_rel_removal.
	 */
	function testHookedthe_categoryresponsive_category_rel_removal() {

		$this->assertEquals(
			10,
			has_filter( 'the_category', 'Responsive\Extra\responsive_category_rel_removal' ),
			'the_category is not attached to responsive_category_rel_removal. It might also have the wrong priority (validated priority: 10)'
		);

	}



}
