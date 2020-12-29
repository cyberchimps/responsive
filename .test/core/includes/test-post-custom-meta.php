<?php
class Test_Post_Custom_Meta extends WP_UnitTestCase {


	function setUp() {
		parent::setUp();
	}

	function tearDown() {

		parent::tearDown();

	}

	/**
	 * Test the hooked responsive_add_layout_meta_box.
	 */
	function testHookedresponsive_add_layout_meta_box() {

		$this->assertEquals(
			10,
			has_action( 'add_meta_boxes', 'responsive_add_layout_meta_box' ),
			'add_meta_boxes is not attached to responsive_add_layout_meta_box. It might also have the wrong priority (validated priority: 10)'
		);

	}

	/**
	 * Test the hooked responsive_save_layout_post_metadata.
	 */
	function testHookedresponsive_save_layout_post_metadata() {
		$this->assertEquals(
			10,
			has_action( 'publish_post', 'responsive_save_layout_post_metadata' ),
			'publish_post is not attached to responsive_save_layout_post_metadata. It might also have the wrong priority (validated priority: 10)'
		);
		$this->assertEquals(
			10,
			has_action( 'publish_page', 'responsive_save_layout_post_metadata' ),
			'publish_page is not attached to responsive_save_layout_post_metadata. It might also have the wrong priority (validated priority: 10)'
		);
		$this->assertEquals(
			10,
			has_action( 'draft_post', 'responsive_save_layout_post_metadata' ),
			'draft_post is not attached to responsive_save_layout_post_metadata. It might also have the wrong priority (validated priority: 10)'
		);
		$this->assertEquals(
			10,
			has_action( 'draft_page', 'responsive_save_layout_post_metadata' ),
			'draft_page is not attached to responsive_save_layout_post_metadata. It might also have the wrong priority (validated priority: 10)'
		);
		$this->assertEquals(
			10,
			has_action( 'future_post', 'responsive_save_layout_post_metadata' ),
			'future_post is not attached to responsive_save_layout_post_metadata. It might also have the wrong priority (validated priority: 10)'
		);
		$this->assertEquals(
			10,
			has_action( 'future_page', 'responsive_save_layout_post_metadata' ),
			'future_page is not attached to responsive_save_layout_post_metadata. It might also have the wrong priority (validated priority: 10)'
		);

	}


}
