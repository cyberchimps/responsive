<?php
class Test_Functions_Update extends WP_UnitTestCase {


	function setUp() {
		parent::setUp();

	}

	function tearDown() {

		parent::tearDown();

	}

	/**
	 * Test the hooked responsive_update_social_icon_options.
	 */
	function testHookedresponsive_update_social_icon_options() {

		$this->assertEquals(
			10,
			has_action( 'after_setup_theme', 'responsive_update_social_icon_options' ),
			'after_setup_theme is not attached to responsive_update_social_icon_options. It might also have the wrong priority (validated priority: 10)'
		);

	}

	/**
	 * Test the hooked responsive_update_page_template_meta.
	 */
	function testHookedresponsive_update_page_template_meta() {

		$this->assertEquals(
			10,
			has_action( 'after_switch_theme', 'responsive_update_page_template_meta' ),
			'after_switch_theme is not attached to responsive_update_page_template_meta. It might also have the wrong priority (validated priority: 10)'
		);

	}
}
