<?php
class Test_Functions_Install extends WP_UnitTestCase {


	function setUp() {
		parent::setUp();

	}

	function tearDown() {

		parent::tearDown();

	}

	/**
	 * Test the hooked responsive_admin_css.
	 */
	function testHookedresponsive_admin_css() {

		$this->assertEquals(
			10,
			has_action( 'admin_head', 'responsive_admin_css' ),
			'admin_head is not attached to responsive_admin_css. It might also have the wrong priority (validated priority: 10)'
		);

	}

}
