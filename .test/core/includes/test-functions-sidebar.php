<?php
class Test_Functions_Sidebar extends WP_UnitTestCase {


	function setUp() {
		parent::setUp();

	}

	function tearDown() {

		parent::tearDown();

	}

	/**
	 * Test the hooked responsive_widgets_init.
	 */
	function testHookedresponsive_widgets_init() {

		$this->assertEquals(
			10,
			has_action( 'widgets_init', 'responsive_widgets_init' ),
			'widgets_init is not attached to responsive_widgets_init. It might also have the wrong priority (validated priority: 10)'
		);

	}

}
