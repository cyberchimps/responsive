<?php
class Test_Version extends WP_UnitTestCase {


	function setUp() {
		parent::setUp();
	}

	function tearDown() {

		parent::tearDown();

	}

	/**
	 * Test the hooked responsive_template_data.
	 */
	function testHookedresponsive_template_data() {
		$this->assertEquals(
			10,
			has_action( 'wp_head', 'responsive_template_data' ),
			'wp_head is not attached to responsive_template_data. It might also have the wrong priority (validated priority: 10)'
		);

	}

	/**
	 * Test the hooked responsive_theme_data.
	 */
	function testHookedresponsive_theme_data() {
		$this->assertEquals(
			10,
			has_action( 'wp_head', 'responsive_theme_data' ),
			'wp_head is not attached to responsive_theme_data. It might also have the wrong priority (validated priority: 10)'
		);

	}


}
