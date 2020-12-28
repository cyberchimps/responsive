<?php
class Test_Functions_Extensions extends WP_UnitTestCase {


	function setUp() {
		parent::setUp();

	}

	function tearDown() {

		parent::tearDown();

	}

	/**
	 * Test the hooked responsive_add_pro_button.
	 */
	function testHookedresponsive_gallery_atts() {

		$this->assertEquals(
			10,
			has_filter( 'shortcode_atts_gallery', 'responsive_gallery_atts' ),
			'shortcode_atts_gallery is not attached to responsive_gallery_atts. It might also have the wrong priority (validated priority: 10)'
		);

	}

	/**
	 * Test the hooked responsive_add_image_size.
	 */
	function testHookedresponsive_add_image_size() {

		$this->assertEquals(
			10,
			has_action( 'after_setup_theme', 'responsive_add_image_size' ),
			'after_setup_theme is not attached to responsive_add_image_size. It might also have the wrong priority (validated priority: 10)'
		);

	}

}
