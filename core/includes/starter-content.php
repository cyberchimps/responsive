<?php
/**
 * Responsive theme Starter Content
 *
 * @package Responsive
 * @since Responsive 4.3.2
 */

/**
 * Function to return the array of starter content for the theme.
 *
 * Passes it through the `responsive_starter_content` filter before returning.
 *
 * @since Responsive 4.3.2
 * @return array a filtered array of args for the starter_content.
 */

if ( ! function_exists( 'responsive_get_starter_content' ) ) {

function responsive_get_starter_content() {

	// Define and register starter content to showcase the theme on new sites.
	$starter_content = array(
		'widgets'    => array(
			// Place one core-defined widgets in the first footer widget area.
			'sidebar-1' => array(
				'text_about',
			),
		),

		// Specify the core-defined pages to create and add custom thumbnails to some of them.
		'posts'      => array(
			'front' => array(
				'post_type'    => 'page',
				'post_title'   => __( 'Home', 'responsive' ),
				'template'     => 'gutenberg-fullwidth.php',
				'post_content' => join(
					'',
					array(
						'<!-- wp:group -->',
						'<div class="wp-block-group"><div class="wp-block-group__inner-container">',
						'<!-- wp:group -->',
						'<div class="wp-block-group"><div class="wp-block-group__inner-container">',
						'<!-- wp:group -->',
						'<div class="wp-block-group"><div class="wp-block-group__inner-container">',
						'<!-- wp:spacer {"height":30} -->',
						'<div style="height:30px" aria-hidden="true" class="wp-block-spacer"></div>',
						'<!-- /wp:spacer --></div></div>',
						'<!-- /wp:group --></div></div>',
						'<!-- /wp:group --></div></div>',
						'<!-- /wp:group -->',
						'<!-- wp:group {"backgroundColor":"button-hover-text-color"} -->',
						'<div class="wp-block-group has-button-hover-text-color-background-color has-background">',
						'<div class="wp-block-group__inner-container">',
						'<!-- wp:group -->',
						'<div class="wp-block-group"><div class="wp-block-group__inner-container">',
						'<!-- wp:spacer {"height":50} -->',
						'<div style="height:50px" aria-hidden="true" class="wp-block-spacer"></div>',
						'<!-- /wp:spacer -->',
						'<!-- wp:columns {"verticalAlignment":"center","backgroundColor":"button-hover-text-color"} -->',
						'<div class="wp-block-columns has-background has-button-hover-text-color-background-color are-vertically-aligned-center">',
						'<!-- wp:column {"verticalAlignment":"center"} -->',
						'<div class="wp-block-column is-vertically-aligned-center">',
						'<!-- wp:heading {"align":"center","level":1} -->',
						'<h1 class="has-text-align-center">HAPPINESS</h1>',
						'<!-- /wp:heading -->',
						'<!-- wp:heading {"align":"center"} -->',
						'<h2 class="has-text-align-center">IS A WARM CUP</h2>',
						'<!-- /wp:heading -->',
						'<!-- wp:paragraph {"align":"center","fontSize":"normal"} -->',
						'<p class="has-text-align-center has-normal-font-size">Your title, subtitle and this very content is editable from Theme Option. Call to Action button and its destination link as well. Image on your right can be an image or even YouTube video if you like.</p>',
						'<!-- /wp:paragraph -->',
						'<!-- wp:buttons {"align":"center"} -->',
						'<div class="wp-block-buttons aligncenter">',
						'<!-- wp:button -->',
						'<div class="wp-block-button"><a class="wp-block-button__link">Call To Action</a></div>',
						'<!-- /wp:button --></div>',
						'<!-- /wp:buttons --></div>',
						'<!-- /wp:column -->',
						'<!-- wp:column {"verticalAlignment":"center"} -->',
						'<div class="wp-block-column is-vertically-aligned-center">',
						'<!-- wp:image {"id":57,"sizeSlug":"full"} -->',
						'<figure class="wp-block-image size-full"><img src="' . get_theme_file_uri() . '/core/images/featured-image.jpg" alt="" class="wp-image-57"/></figure>',
						'<!-- /wp:image --></div>',
						'<!-- /wp:column --></div>',
						'<!-- /wp:columns -->',
						'<!-- wp:spacer {"height":50} -->',
						'<div style="height:50px" aria-hidden="true" class="wp-block-spacer"></div>',
						'<!-- /wp:spacer --></div></div>',
						'<!-- /wp:group --></div></div>',
						'<!-- /wp:group -->',
						'<!-- wp:group -->',
						'<div class="wp-block-group"><div class="wp-block-group__inner-container">',
						'<!-- wp:spacer {"height":30} -->',
						'<div style="height:30px" aria-hidden="true" class="wp-block-spacer"></div>',
						'<!-- /wp:spacer --></div></div>',
						'<!-- /wp:group -->',
						'<!-- wp:columns -->',
						'<div class="wp-block-columns">',
						'<!-- wp:column -->',
						'<div class="wp-block-column">',
						'<!-- wp:group {"backgroundColor":"button-hover-text-color"} -->',
						'<div class="wp-block-group has-button-hover-text-color-background-color has-background">',
						'<div class="wp-block-group__inner-container">',
						'<!-- wp:heading -->',
						'<h2>Fermentum</h2>',
						'<!-- /wp:heading --></div></div>',
						'<!-- /wp:group -->',
						'<!-- wp:group {"backgroundColor":"button-hover-text-color"} -->',
						'<div class="wp-block-group has-button-hover-text-color-background-color has-background">',
						'<div class="wp-block-group__inner-container">',
						'<!-- wp:image {"id":193,"sizeSlug":"large"} -->',
						'<figure class="wp-block-image size-large"><img src="' . get_theme_file_uri() . '/images/box1.jpg" alt="" class="wp-image-193"/></figure>',
						'<!-- /wp:image --></div></div>',
						'<!-- /wp:group -->',
						'<!-- wp:group {"backgroundColor":"button-hover-text-color"} -->',
						'<div class="wp-block-group has-button-hover-text-color-background-color has-background"><div class="wp-block-group__inner-container">',
						'<!-- wp:paragraph -->',
						'<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>',
						'<!-- /wp:paragraph --></div></div>',
						'<!-- /wp:group --></div>',
						'<!-- /wp:column -->',
						'<!-- wp:column -->',
						'<div class="wp-block-column">',
						'<!-- wp:group {"backgroundColor":"button-hover-text-color"} -->',
						'<div class="wp-block-group has-button-hover-text-color-background-color has-background">',
						'<div class="wp-block-group__inner-container">',
						'<!-- wp:heading -->',
						'<h2>Elementum</h2>',
						'<!-- /wp:heading --></div></div>',
						'<!-- /wp:group -->',
						'<!-- wp:group {"backgroundColor":"button-hover-text-color"} -->',
						'<div class="wp-block-group has-button-hover-text-color-background-color has-background">',
						'<div class="wp-block-group__inner-container">',
						'<!-- wp:image {"id":192,"sizeSlug":"large"} -->',
						'<figure class="wp-block-image size-large"><img src="' . get_theme_file_uri() . '/images/box3.jpg" alt="" class="wp-image-192"/></figure>',
						'<!-- /wp:image --></div></div>',
						'<!-- /wp:group -->',
						'<!-- wp:group {"backgroundColor":"button-hover-text-color"} -->',
						'<div class="wp-block-group has-button-hover-text-color-background-color has-background">',
						'<div class="wp-block-group__inner-container">',
						'<!-- wp:paragraph -->',
						'<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>',
						'<!-- /wp:paragraph --></div></div>',
						'<!-- /wp:group --></div>',
						'<!-- /wp:column -->',
						'<!-- wp:column -->',
						'<div class="wp-block-column">',
						'<!-- wp:group {"backgroundColor":"button-hover-text-color"} -->',
						'<div class="wp-block-group has-button-hover-text-color-background-color has-background">',
						'<div class="wp-block-group__inner-container">',
						'<!-- wp:heading -->',
						'<h2>Interdum</h2>',
						'<!-- /wp:heading --></div></div>',
						'<!-- /wp:group -->',
						'<!-- wp:group {"backgroundColor":"button-hover-text-color"} -->',
						'<div class="wp-block-group has-button-hover-text-color-background-color has-background">',
						'<div class="wp-block-group__inner-container">',
						'<!-- wp:image {"id":191,"sizeSlug":"large"} -->',
						'<figure class="wp-block-image size-large"><img src="' . get_theme_file_uri() . '/images/box2.jpg" alt="" class="wp-image-191"/></figure>',
						'<!-- /wp:image --></div></div>',
						'<!-- /wp:group -->',
						'<!-- wp:group {"backgroundColor":"button-hover-text-color"} -->',
						'<div class="wp-block-group has-button-hover-text-color-background-color has-background">',
						'<div class="wp-block-group__inner-container">',
						'<!-- wp:paragraph -->',
						'<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>',
						'<!-- /wp:paragraph --></div></div>',
						'<!-- /wp:group --></div>',
						'<!-- /wp:column --></div>',
						'<!-- /wp:columns -->',
						'<!-- wp:spacer {"height":20} -->',
						'<div style="height:20px" aria-hidden="true" class="wp-block-spacer"></div>',
						'<!-- /wp:spacer -->',
						'<!-- wp:cover {"overlayColor":"responsive-container-background-color","align":"full"} -->',
						'<div class="wp-block-cover alignfull has-responsive-container-background-color-background-color has-background-dim">',
						'<div class="wp-block-cover__inner-container">',
						'<!-- wp:spacer -->',
						'<div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>',
						'<!-- /wp:spacer -->',
						'<!-- wp:columns -->',
						'<div class="wp-block-columns">',
						'<!-- wp:column -->',
						'<div class="wp-block-column">',
						'<!-- wp:heading {"textColor":"button-hover-text-color"} -->',
						'<h2 class="has-button-hover-text-color-color has-text-color">About the Responsive</h2>',
						'<!-- /wp:heading -->',
						'<!-- wp:paragraph -->',
						'<p>Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry</p>',
						'<!-- /wp:paragraph --></div>',
						'<!-- /wp:column -->',
						'<!-- wp:column -->',
						'<div class="wp-block-column">',
						'<!-- wp:heading {"textColor":"button-hover-text-color"} -->',
						'<h2 class="has-button-hover-text-color-color has-text-color">Follow On</h2>',
						'<!-- /wp:heading -->',
						'<!-- wp:social-links -->',
						'<ul class="wp-block-social-links">',
						'<!-- wp:social-link {"url":"#","service":"facebook"} /-->',
						'<!-- wp:social-link {"url":"#","service":"twitter"} /-->',
						'<!-- wp:social-link {"url":"#","service":"instagram"} /-->',
						'<!-- wp:social-link {"url":"#","service":"linkedin"} /-->',
						'<!-- wp:social-link {"service":"youtube"} /--></ul>',
						'<!-- /wp:social-links --></div>',
						'<!-- /wp:column -->',
						'<!-- wp:column -->',
						'<div class="wp-block-column">',
						'<!-- wp:heading {"textColor":"button-hover-text-color"} -->',
						'<h2 class="has-button-hover-text-color-color has-text-color">Contact Now</h2>',
						'<!-- /wp:heading -->',
						'<!-- wp:list -->',
						'<ul><li>123, Main Street, Anytown, ST 12345</li><li>+123 456 7890</li></ul>',
						'<!-- /wp:list --></div>',
						'<!-- /wp:column --></div>',
						'<!-- /wp:columns -->',
						'<!-- wp:spacer -->',
						'<div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>',
						'<!-- /wp:spacer -->',
						'<!-- wp:paragraph {"align":"center","placeholder":"Write title","fontSize":"large"} -->',
						'<p class="has-text-align-center has-large-font-size"></p>',
						'<!-- /wp:paragraph --></div></div>',
						'<!-- /wp:cover -->',
					)
				),
			),
			'about',
			'blog',
			'services',
			'contact',
		),

		// Default to a static front page and assign the front and posts pages.
		'options'    => array(
			'show_on_front'  => 'page',
			'page_on_front'  => '{{front}}',
			'page_for_posts' => '{{blog}}',
		),

		// Set up nav menus for each of the two areas registered in the theme.
		'nav_menus'  => array(
			// Assign a menu to the "primary" location.
			'primary' => array(
				'name'  => __( 'Primary', 'responsive' ),
				'items' => array(
					'link_home', // Note that the core "home" page is actually a link in case a static front page is not used.
					'page_about',
					'page_blog',
					'page_services',
					'page_contact',
				),
			),
		),

		// Custom setting.
		'theme_mods' => array(
			'responsive_style' => 'flat',
		),
	);

	/**
	 * Filters Responsive array of starter content.
	 *
	 * @since Responsive 4.3.2
	 *
	 * @param array $starter_content Array of starter content.
	 */
	return apply_filters( 'responsive_starter_content', $starter_content );

}
}
