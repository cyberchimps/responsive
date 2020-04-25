<?php
class Test_Functions_Admin extends WP_UnitTestCase {


	function setUp() {
		parent::setUp();

		Responsive\Admin\setup();

	}

	function tearDown() {

		parent::tearDown();

	}

	/**
	 * Test the hooked responsive_ask_for_review_notice.
	 */
	function testHookedresponsive_ask_for_review_notice() {

		$this->assertEquals(
			10,
			has_action( 'admin_notices', 'Responsive\Admin\responsive_ask_for_review_notice' ),
			'after_setup_theme is not attached to Responsive\Admin\responsive_ask_for_review_notice. It might also have the wrong priority (validated priority: 10)'
		);

	}

	/**
	 * Test the hooked esponsive_theme_notice_dismissed.
	 */
	function testHookedresponsive_theme_notice_dismissed() {

		$this->assertEquals(
			10,
			has_action( 'admin_init', 'Responsive\Admin\responsive_theme_notice_dismissed' ),
			'admin_init is not attached to Responsive\Admin\esponsive_theme_notice_dismissed. It might also have the wrong priority (validated priority: 10)'
		);

	}

	/**
	 * Test the hooked responsive_theme_notice_change_timeout.
	 */
	function testHookedresponsive_theme_notice_change_timeout() {

		$this->assertEquals(
			10,
			has_action( 'admin_init', 'Responsive\Admin\responsive_theme_notice_change_timeout' ),
			'admin_init is not attached to Responsive\Admin\responsive_theme_notice_change_timeout. It might also have the wrong priority (validated priority: 10)'
		);

	}

	/**
	 * Test the hooked responsive_add_review_styling.
	 */
	function testHookedresponsive_add_review_styling() {

		$this->assertEquals(
			10,
			has_action( 'admin_head', 'Responsive\Admin\responsive_add_review_styling' ),
			'admin_head is not attached to Responsive\Admin\responsive_add_review_styling. It might also have the wrong priority (validated priority: 10)'
		);

	}
}
