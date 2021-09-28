<?php
class Test_Theme_Options extends WP_UnitTestCase {


	function setUp() {
		parent::setUp();

	}

	function tearDown() {

		parent::tearDown();

	}

	/**
	 * Test the hooked responsive_inline_css.
	 */
	function testHookedresponsive_inline_css() {

		$this->assertEquals(
			110,
			has_action( 'wp_head', 'responsive_inline_css' ),
			'wp_head is not attached to responsive_inline_css. It might also have the wrong priority (validated priority: 10)'
		);

	}

	/**
	 * Test the hooked responsive_inline_js_head.
	 */
	function testHookedresponsive_inline_js_head() {

		$this->assertEquals(
			10,
			has_action( 'wp_head', 'responsive_inline_js_head' ),
			'wp_head is not attached to responsive_inline_js_head. It might also have the wrong priority (validated priority: 10)'
		);

	}

	/**
	 * Test the hooked responsive_inline_js_footer.
	 */
	function testHookedresponsive_inline_js_footer() {

		$this->assertEquals(
			10,
			has_action( 'wp_footer', 'responsive_inline_js_footer' ),
			'wp_footer is not attached to responsive_inline_js_footer. It might also have the wrong priority (validated priority: 10)'
		);

	}

}
