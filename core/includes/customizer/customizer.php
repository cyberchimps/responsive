<?php
/**
 * Responsive  Theme Customizer
 *
 * @package responsive
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function responsive_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';





/*--------------------------------------------------------------
	// Home Page
--------------------------------------------------------------*/
	$args = array(
			'type'         => 'post',
			'orderby'      => 'name',
			'order'        => 'ASC',
			'hide_empty'   => 1,
			'hierarchical' => 1,
			'taxonomy'     => 'category',
	);
	$option_categories = array();
	$category_lists = get_categories( $args );
	$option_categories[''] = esc_html( __( 'Choose Category', 'responsive' ) );
	foreach ( $category_lists as $category ) {
		$option_categories[ $category->term_id ] = $category->name;
	}

	$option_all_post_cat = array();
	foreach( $category_lists as $category ){
		$option_all_post_cat[$category->term_id] = $category->name;
	}

	/* Option list of all post */
	$options_posts = array();
	$options_posts_obj = get_posts('posts_per_page=-1');
	$options_posts[''] = esc_html(__( 'Choose Post', 'responsive' ));
	foreach ( $options_posts_obj as $posts ) {
		$options_posts[$posts->ID] = $posts->post_title;
	}

	$wp_customize->add_section( 'home_page', array(
		'title'                 => __( 'Home Page', 'responsive' ),
		'priority'              => 30
	) );
	$wp_customize->add_setting( 'responsive_theme_options[front_page]', array( 'sanitize_callback' => 'responsive_sanitize_checkbox', 'type' => 'option' ) );
	$wp_customize->add_control( 'res_front_page', array(
		'label'                 => __( 'Enable Custom Front Page', 'responsive' ),
		'section'               => 'home_page',
		'settings'              => 'responsive_theme_options[front_page]',
		'type'                  => 'checkbox',
		'description'           => __( 'Overrides the WordPress front page option', 'responsive' )
	) );
	$wp_customize->add_setting( 'responsive_theme_options[enable_slider]', array( 'sanitize_callback' => 'responsive_sanitize_checkbox', 'type' => 'option' ) );
	$wp_customize->add_control( 'enable_slider', array(
			'label'                 => __( 'Enable Slider on Home Page', 'responsive' ),
			'section'               => 'home_page',
			'settings'              => 'responsive_theme_options[enable_slider]',
			'type'                  => 'checkbox',
	) );
	$wp_customize->add_setting( 'responsive_theme_options[home_slider]', array( 'sanitize_callback' => 'sanitize_text_field','transport' => 'postMessage', 'type' => 'option' ) );
	//$wp_customize->add_setting( 'responsive_theme_options[contact_content]', array( 'sanitize_callback' => 'sanitize_text_field','transport' => 'postMessage', 'type' => 'option' ) );
	$wp_customize->add_control( 'home_slider', array(
			'label'                 => __( 'Slidedeck shortcode', 'responsive' ),
			'section'               => 'home_page',
			'settings'              => 'responsive_theme_options[home_slider]',
			'description'           => __( 'Create slider using Slidedeck', 'responsive' ),
			'type'                  => 'text',
	) );
	$wp_customize->add_setting( 'responsive_theme_options[home_headline]', array( 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage','default' => __( 'HAPPINESS', 'responsive' ), 'type' => 'option' ));
	$wp_customize->add_control( 'res_home_headline', array(
		'label'                 => __( 'Headline', 'responsive' ),
		'section'               => 'home_page',
		'settings'              => 'responsive_theme_options[home_headline]',
		'type'                  => 'text'
	) );
	$wp_customize->add_setting( 'responsive_theme_options[home_subheadline]', array( 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage','default' => __( 'IS A WARM CUP', 'responsive' ), 'type' => 'option' ));
	$wp_customize->add_control( 'res_home_subheadline', array(
		'label'                 => __( 'Subheadline', 'responsive' ),
		'section'               => 'home_page',
		'settings'              => 'responsive_theme_options[home_subheadline]',
		'type'                  => 'text'
	) );
	$wp_customize->add_setting( 'responsive_theme_options[home_content_area]',array( 'sanitize_callback' => 'responsive_sanitize_textarea', 'default' => __( 'Your title, subtitle and this very content is editable from Theme Option. Call to Action button and its destination link as well. Image on your right can be an image or even YouTube video if you like.', 'responsive' ), 'transport' => 'postMessage', 'type' => 'option') );
	$wp_customize->add_control( 'res_home_content_area', array(
		'label'                 => __( 'Content Area', 'responsive' ),
		'section'               => 'home_page',
		'settings'              => 'responsive_theme_options[home_content_area]',
		'type'                  => 'textarea'
	) );
	$wp_customize->add_setting( 'responsive_theme_options[cta_url]', array( 'sanitize_callback' => 'esc_url_raw','default' => '#nogo','transport' => 'postMessage', 'type' => 'option' ) );
	$wp_customize->add_control( 'res_cta_url', array(
		'label'                 => __( 'Call to Action (URL)', 'responsive' ),
		'section'               => 'home_page',
		'settings'              => 'responsive_theme_options[cta_url]',
		'type'                  => 'text'
	) );

	$wp_customize->add_setting( 'responsive_theme_options[cta_text]', array( 'sanitize_callback' => 'sanitize_text_field', 'default' => 'Call to Action','transport' => 'postMessage', 'type' => 'option') );
	$wp_customize->add_control( 'res_cta_text', array(
		'label'                 => __( 'Call to Action (Text)', 'responsive' ),
		'section'               => 'home_page',
		'settings'              => 'responsive_theme_options[cta_text]',
		'type'                  => 'text'
	) );

        // Call to action button style
	$wp_customize->add_setting( 'responsive_theme_options[button_style]', array(
		'default'           => 'Gradient',
		'type'              => 'option',
		'sanitize_callback' => 'responsive_pro_button_style_validate'
	) );

	// Call to action button style
        $wp_customize->add_control( 'static_page_layout_default', array(
		'label'    => __( 'Call to Action Button Style', 'responsive' ),
		'section'  => 'home_page',
		'settings' => 'responsive_theme_options[button_style]',
		'type'     => 'select',
		'choices'  => array(
			'default'      => __( 'Gradient', 'responsive' ),
			'flat_style'      => __( 'Flat', 'responsive' )

		),
            'priority' => 15
	) );

	$wp_customize->add_setting( 'responsive_theme_options[featured_content]', array( 'sanitize_callback' => 'responsive_sanitize_textarea', 'type' => 'option' ) );
	$wp_customize->add_control( 'res_featured_content', array(
		'label'                 => __( 'Featured Content', 'responsive' ),
		'section'               => 'home_page',
		'settings'              => 'responsive_theme_options[featured_content]',
		'type'                  => 'textarea',
		'description'           => __( 'Paste your shortcode, video or image source', 'responsive' ),
                'priority'              => 20
	) );

	$wp_customize->add_setting( 'responsive_theme_options[about]', array( 'sanitize_callback' => 'responsive_sanitize_checkbox', 'type' => 'option' ) );
	$wp_customize->add_control( 'about', array(
			'label'                 => __( 'Enable About Section', 'responsive' ),
			'section'               => 'home_page',
			'settings'              => 'responsive_theme_options[about]',
			'type'                  => 'checkbox',
			'priority' => 22
	) );
	$wp_customize->add_setting( 'responsive_theme_options[about_title]', array( 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage','default' => __( 'About Box Title', 'responsive' ), 'type' => 'option' ));
	$wp_customize->add_control( 'about_title', array(
			'label'                 => __( 'About Title', 'responsive' ),
			'section'               => 'home_page',
			'settings'              => 'responsive_theme_options[about_title]',
			'type'                  => 'text',
			'priority' => 22
	) );
	$wp_customize->add_setting( 'responsive_theme_options[about_text]', array( 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage', 'type' => 'option' ));
	$wp_customize->add_control( 'about_text', array(
			'label'                 => __( 'About Text', 'responsive' ),
			'section'               => 'home_page',
			'settings'              => 'responsive_theme_options[about_text]',
			'type'                  => 'text',
			'priority' => 22
	) );
	$wp_customize->add_setting( 'responsive_theme_options[about_cta_text]', array( 'sanitize_callback' => 'sanitize_text_field', 'default' => 'Call to Action','transport' => 'postMessage', 'type' => 'option') );
	$wp_customize->add_control( 'about_cta_text', array(
			'label'                 => __( 'Call to Action (Text)', 'responsive' ),
			'section'               => 'home_page',
			'settings'              => 'responsive_theme_options[about_cta_text]',
			'type'                  => 'text',
			'priority' => 22
	) );
	$wp_customize->add_setting( 'responsive_theme_options[about_cta_url]', array( 'sanitize_callback' => 'esc_url_raw','default' => '#','transport' => 'postMessage', 'type' => 'option' ) );
	$wp_customize->add_control( 'about_cta_url', array(
			'label'                 => __( 'Call to Action (URL)', 'responsive' ),
			'section'               => 'home_page',
			'description'           => __( 'Enter url as http://www.example.com', 'responsive' ),
			'settings'              => 'responsive_theme_options[about_cta_url]',
			'type'                  => 'text',
			'priority' => 22
	) );
	$wp_customize->add_setting( 'responsive_theme_options[feature]', array( 'sanitize_callback' => 'responsive_sanitize_checkbox', 'type' => 'option' ) );
	$wp_customize->add_control( 'feature_front_page', array(
			'label'                 => __( 'Enable Feature Section', 'responsive' ),
			'section'               => 'home_page',
			'settings'              => 'responsive_theme_options[feature]',
			'type'                  => 'checkbox',
			'priority' => 23
	) );

	$wp_customize->add_setting( 'responsive_theme_options[feature_title]', array( 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage','default' => __( 'Features', 'responsive' ), 'type' => 'option' ));
	$wp_customize->add_control( 'feature_title', array(
			'label'                 => __( 'Feature Title', 'responsive' ),
			'section'               => 'home_page',
			'settings'              => 'responsive_theme_options[feature_title]',
			'type'                  => 'text',
			'priority' => 23
	) );
	$wp_customize->add_setting( 'responsive_theme_options[feature1]', array( 'sanitize_callback' => 'responsive_sanitize_posts', 'type' => 'option' ) );
	$wp_customize->add_control( 'feature1', array(
			'label'                 => __( 'Select post for feature 1', 'responsive' ),
			'section'               => 'home_page',
			'settings'              => 'responsive_theme_options[feature1]',
			'description'           => __( 'The featured image, title and content from the posts will be used to display the feature. Recommended image size for the featured images: 130 x 130px', 'responsive' ),
			'type'                  => 'select',
			'choices'               => $options_posts,
			'priority' => 23
	) );
	$wp_customize->add_setting( 'responsive_theme_options[feature2]', array( 'sanitize_callback' => 'responsive_sanitize_posts', 'type' => 'option' ) );
	$wp_customize->add_control( 'feature2', array(
			'label'                 => __( 'Select post for feature 2', 'responsive' ),
			'section'               => 'home_page',
			'settings'              => 'responsive_theme_options[feature2]',
			'description'           => __( 'The featured image, title and content from the posts will be used to display the feature. Recommended image size for the featured images: 130 x 130px', 'responsive' ),
			'type'                  => 'select',
			'choices'               => $options_posts,
			'priority' => 23
	) );
	$wp_customize->add_setting( 'responsive_theme_options[feature3]', array( 'sanitize_callback' => 'responsive_sanitize_posts', 'type' => 'option' ) );
	$wp_customize->add_control( 'feature3', array(
			'label'                 => __( 'Select post for feature 3', 'responsive' ),
			'section'               => 'home_page',
			'settings'              => 'responsive_theme_options[feature3]',
			'description'           => __( 'The featured image, title and content from the posts will be used to display the feature. Recommended image size for the featured images: 130 x 130px', 'responsive' ),
			'type'                  => 'select',
			'choices'               => $options_posts,
			'priority' => 23
	) );


	$wp_customize->add_setting( 'responsive_theme_options[testimonials]', array( 'sanitize_callback' => 'responsive_sanitize_checkbox', 'type' => 'option' ) );
	$wp_customize->add_control( 'testimonial_front_page', array(
			'label'                 => __( 'Enable Testimonial Section', 'responsive' ),
			'section'               => 'home_page',
			'settings'              => 'responsive_theme_options[testimonials]',
			'type'                  => 'checkbox',
			'priority' => 25
	) );
	$wp_customize->add_setting( 'responsive_theme_options[testimonial_title]', array( 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage','default' => __( 'Testimonial', 'responsive' ), 'type' => 'option' ));
	$wp_customize->add_control( 'testimonial_title', array(
			'label'                 => __( 'Testimonial Title', 'responsive' ),
			'section'               => 'home_page',
			'settings'              => 'responsive_theme_options[testimonial_title]',
			'type'                  => 'text',
			'priority' => 30
	) );
	$wp_customize->add_setting( 'responsive_theme_options[testimonial_val]', array( 'sanitize_callback' => 'responsive_sanitize_posts', 'type' => 'option' ) );
	$wp_customize->add_control( 'testimonial_val', array(
			'label'                 => __( 'Select Post', 'responsive' ),
			'section'               => 'home_page',
			'settings'              => 'responsive_theme_options[testimonial_val]',
			'description'           => __( 'The featured image, title and content from the posts will be used to display the client testimonials. Recommended image size for the featured images: 178 x 178px', 'responsive' ),
			'type'                  => 'select',
			'choices'               => $options_posts,
			'priority' => 35
	) );
	$wp_customize->add_setting( 'responsive_theme_options[team]', array( 'sanitize_callback' => 'responsive_sanitize_checkbox', 'type' => 'option' ) );
	$wp_customize->add_control( 'team_front_page', array(
			'label'                 => __( 'Enable Team Section', 'responsive' ),
			'section'               => 'home_page',
			'settings'              => 'responsive_theme_options[team]',
			'type'                  => 'checkbox',
			'priority' => 36
	) );
	//$wp_customize->add_setting( 'responsive_theme_options[team_title]', array( 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage','default' => __( 'Team', 'responsive' ), 'type' => 'option' ));
	$wp_customize->add_setting( 'responsive_theme_options[team_title]', array( 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage','default' => __( 'team', 'responsive' ), 'type' => 'option' ));
	$wp_customize->add_control( 'team_title', array(
			'label'                 => __( 'Team Title', 'responsive' ),
			'section'               => 'home_page',
			'settings'              => 'responsive_theme_options[team_title]',
			'type'                  => 'text',
			'priority' => 37
	) );
	$wp_customize->add_setting( 'responsive_theme_options[teammember1]', array( 'sanitize_callback' => 'responsive_sanitize_posts', 'type' => 'option' ) );
	$wp_customize->add_control( 'teammember1', array(
			'label'                 => __( 'Select post for team member1', 'responsive' ),
			'section'               => 'home_page',
			'settings'              => 'responsive_theme_options[teammember1]',
			'description'           => __( 'The featured image, title and content from the posts will be used to display the team member. Recommended image size for the featured images: 178 x 178px', 'responsive' ),
			'type'                  => 'select',
			'choices'               => $options_posts,
			'priority' => 38
	) );
	$wp_customize->add_setting( 'responsive_theme_options[teammember2]', array( 'sanitize_callback' => 'responsive_sanitize_posts', 'type' => 'option' ) );
	$wp_customize->add_control( 'teammember2', array(
			'label'                 => __( 'Select post for team member2', 'responsive' ),
			'section'               => 'home_page',
			'settings'              => 'responsive_theme_options[teammember2]',
			'description'           => __( 'The featured image, title and content from the posts will be used to display the team member. Recommended image size for the featured images: 178 x 178px', 'responsive' ),
			'type'                  => 'select',
			'choices'               => $options_posts,
			'priority' => 39
	) );
	$wp_customize->add_setting( 'responsive_theme_options[teammember3]', array( 'sanitize_callback' => 'responsive_sanitize_posts', 'type' => 'option' ) );
	$wp_customize->add_control( 'teammember3', array(
			'label'                 => __( 'Select post for team member3', 'responsive' ),
			'section'               => 'home_page',
			'settings'              => 'responsive_theme_options[teammember3]',
			'description'           => __( 'The featured image, title and content from the posts will be used to display the team member. Recommended image size for the featured images: 178 x 178px', 'responsive' ),
			'type'                  => 'select',
			'choices'               => $options_posts,
			'priority' => 40
	) );
	$wp_customize->add_setting( 'responsive_theme_options[home-widgets]', array( 'sanitize_callback' => 'responsive_sanitize_checkbox', 'type' => 'option' ) );
	$wp_customize->add_control( 'home-widgets', array(
			'label'                 => __( 'Click to disable home page widgets', 'responsive' ),
			'section'               => 'home_page',
			'settings'              => 'responsive_theme_options[home-widgets]',
			'type'                  => 'checkbox',
			'priority' => 41
	) );
	$wp_customize->add_setting( 'responsive_theme_options[contact]', array( 'sanitize_callback' => 'responsive_sanitize_checkbox', 'type' => 'option' ) );
	$wp_customize->add_control( 'contact_front_page', array(
			'label'                 => __( 'Enable Contact Section', 'responsive' ),
			'section'               => 'home_page',
			'settings'              => 'responsive_theme_options[contact]',
			'type'                  => 'checkbox',
			'priority' => 42
	) );
	$wp_customize->add_setting( 'responsive_theme_options[contact_title]', array( 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage','default' => __( 'Contact Us', 'responsive' ), 'type' => 'option' ));
	$wp_customize->add_control( 'contact_title', array(
			'label'                 => __( 'Contact section Title', 'responsive' ),
			'section'               => 'home_page',
			'settings'              => 'responsive_theme_options[contact_title]',
			'type'                  => 'text',
			'priority' => 43
	) );
	$wp_customize->add_setting( 'responsive_theme_options[contact_subtitle]', array( 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage','default' => __( 'Contact subtitle', 'responsive' ), 'type' => 'option' ));
	$wp_customize->add_control( 'contact_subtitle', array(
			'label'                 => __( 'Contact section Subtitle', 'responsive' ),
			'section'               => 'home_page',
			'settings'              => 'responsive_theme_options[contact_subtitle]',
			'type'                  => 'text',
			'priority' => 44
	) );
	$wp_customize->add_setting( 'responsive_theme_options[contact_add]', array( 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage', 'type' => 'option' ));
	$wp_customize->add_control( 'contact_add', array(
			'label'                 => __( 'Address', 'responsive' ),
			'section'               => 'home_page',
			'settings'              => 'responsive_theme_options[contact_add]',
			'type'                  => 'text',
			'priority' => 45
	) );
	$wp_customize->add_setting( 'responsive_theme_options[contact_email]', array( 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage', 'type' => 'option' ));
	$wp_customize->add_control( 'contact_email', array(
			'label'                 => __( 'Email', 'responsive' ),
			'section'               => 'home_page',
			'settings'              => 'responsive_theme_options[contact_email]',
			'type'                  => 'text',
			'priority' => 46
	) );
	$wp_customize->add_setting( 'responsive_theme_options[contact_ph]', array( 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage', 'type' => 'option' ));
	$wp_customize->add_control( 'contact_ph', array(
			'label'                 => __( 'Phone no', 'responsive' ),
			'section'               => 'home_page',
			'settings'              => 'responsive_theme_options[contact_ph]',
			'type'                  => 'text',
			'priority' => 47
	) );
	$wp_customize->add_setting( 'responsive_theme_options[contact_content]', array( 'sanitize_callback' => 'sanitize_text_field','transport' => 'postMessage', 'type' => 'option' ) );
	$wp_customize->add_control( 'contact_content', array(
			'label'                 => __( 'Contact form shortcode', 'responsive' ),
			'section'               => 'home_page',
			'settings'              => 'responsive_theme_options[contact_content]',
			'description'           => __( 'You can put Contact Form 7 shortcode here.', 'responsive' ),
			'type'                  => 'text',
			'priority' => 48
	) );


/*--------------------------------------------------------------
	// Default Layouts
--------------------------------------------------------------*/

	$wp_customize->add_section( 'default_layouts', array(
		'title'                 => __( 'Default Layouts', 'responsive' ),
		'priority'              => 30
	) );
	$wp_customize->add_setting( 'responsive_theme_options[static_page_layout_default]', array( 'sanitize_callback' => 'responsive_sanitize_default_layouts', 'type' => 'option' ) );
	$wp_customize->add_control( 'res_static_page_layout_default', array(
		'label'                 => __( 'Default Static Page Layout', 'responsive' ),
		'section'               => 'default_layouts',
		'settings'              => 'responsive_theme_options[static_page_layout_default]',
		'type'                  => 'select',
		'choices'               => Responsive_Options::valid_layouts()
	) );
	// $wp_customize->add_setting( 'responsive_theme_options[single_post_layout_default]', array( 'sanitize_callback' => 'responsive_sanitize_default_layouts', 'type' => 'option' ) );
	// $wp_customize->add_control( 'res_single_post_layout_default', array(
	// 	'label'                 => __( 'Default Single Blog Post Layout', 'responsive' ),
	// 	'section'               => 'default_layouts',
	// 	'settings'              => 'responsive_theme_options[single_post_layout_default]',
	// 	'type'                  => 'select',
	// 	'choices'               => Responsive_Options::valid_layouts()
	// ) );
	$wp_customize->add_setting( 'responsive_theme_options[blog_posts_index_layout_default]', array( 'sanitize_callback' => 'responsive_sanitize_blog_default_layouts', 'type' => 'option' ) );
	$wp_customize->add_control( 'res_hblog_posts_index_layout_default', array(
		'label'                 => __( 'Default Blog Posts Index Layout', 'responsive' ),
		'section'               => 'default_layouts',
		'settings'              => 'responsive_theme_options[blog_posts_index_layout_default]',
		'type'                  => 'select',
		'choices'               => Responsive_Options::blog_valid_layouts()
	) );






// /*--------------------------------------------------------------
// 	// SOCIAL MEDIA SECTION
// --------------------------------------------------------------*/
//
// 	$wp_customize->add_section( 'responsive_social_media', array(
// 		'title'             => __( 'Social Icons', 'responsive' ),
// 		'priority'          => 40,
// 		'description'       => __( 'Enter the URL to your account for each service for the icon to appear in the header.', 'responsive' ),
// 	) );
//
// 	// Add Twitter Setting
//
// 	$wp_customize->add_setting( 'responsive_theme_options[twitter_uid]', array( 'sanitize_callback' => 'esc_url_raw', 'type' => 'option' ) );
// 	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'res_twitter', array(
// 		'label'             => __( 'Twitter', 'responsive' ),
// 		'section'           => 'responsive_social_media',
// 		'settings'          => 'responsive_theme_options[twitter_uid]'
// 	) ) );
//
// 	// Add Facebook Setting
//
// 	$wp_customize->add_setting( 'responsive_theme_options[facebook_uid]' , array( 'sanitize_callback' => 'esc_url_raw', 'type' => 'option' ));
// 	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'res_facebook', array(
// 		'label'             => __( 'Facebook', 'responsive' ),
// 		'section'           => 'responsive_social_media',
// 		'settings'          => 'responsive_theme_options[facebook_uid]'
// 	) ) );
//
// 	// Add LinkedIn Setting
//
// 	$wp_customize->add_setting( 'responsive_theme_options[linkedin_uid]' , array( 'sanitize_callback' => 'esc_url_raw', 'type' => 'option' ));
// 	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'res_linkedin', array(
// 		'label'             => __( 'LinkedIn', 'responsive' ),
// 		'section'           => 'responsive_social_media',
// 		'settings'          => 'responsive_theme_options[linkedin_uid]'
// 	) ) );
//
// 	// Add Youtube Setting
//
// 	$wp_customize->add_setting( 'responsive_theme_options[youtube_uid]' , array( 'sanitize_callback' => 'esc_url_raw', 'type' => 'option' ));
// 	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'res_youtube', array(
// 		'label'             => __( 'YouTube', 'responsive' ),
// 		'section'           => 'responsive_social_media',
// 		'settings'          => 'responsive_theme_options[youtube_uid]'
// 	) ) );
//
// 	// Add Google+ Setting
//
// 	$wp_customize->add_setting( 'responsive_theme_options[googleplus_uid]' , array( 'sanitize_callback' => 'esc_url_raw', 'type' => 'option' ));
// 	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'res_googleplus', array(
// 		'label'             => __( 'Google+', 'responsive' ),
// 		'section'           => 'responsive_social_media',
// 		'settings'          => 'responsive_theme_options[googleplus_uid]'
// 	) ) );
//
// 	// Add RSS Setting
//
// 	$wp_customize->add_setting( 'responsive_theme_options[rss_uid]' , array( 'sanitize_callback' => 'esc_url_raw', 'type' => 'option' ));
// 	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'res_rss', array(
// 		'label'             => __( 'RSS Feed', 'responsive' ),
// 		'section'           => 'responsive_social_media',
// 		'settings'          => 'responsive_theme_options[rss_uid]'
// 	) ) );
//
// 	// Add Instagram Setting
//
// 	$wp_customize->add_setting( 'responsive_theme_options[instagram_uid]' , array( 'sanitize_callback' => 'esc_url_raw', 'type' => 'option' ));
// 	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'res_instagram', array(
// 		'label'             => __( 'Instagram', 'responsive' ),
// 		'section'           => 'responsive_social_media',
// 		'settings'          => 'responsive_theme_options[instagram_uid]'
// 	) ) );
//
// 	// Add Pinterest Setting
//
// 	$wp_customize->add_setting( 'responsive_theme_options[pinterest_uid]' , array( 'sanitize_callback' => 'esc_url_raw', 'type' => 'option' ));
// 	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'res_pinterest', array(
// 		'label'             => __( 'Pinterest', 'responsive' ),
// 		'section'           => 'responsive_social_media',
// 		'settings'          => 'responsive_theme_options[pinterest_uid]'
// 	) ) );
//
// 	// Add StumbleUpon Setting
//
// 	$wp_customize->add_setting( 'responsive_theme_options[stumbleupon_uid]' , array( 'sanitize_callback' => 'esc_url_raw', 'type' => 'option' ));
// 	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'res_stumble', array(
// 		'label'             => __( 'StumbleUpon', 'responsive' ),
// 		'section'           => 'responsive_social_media',
// 		'settings'          => 'responsive_theme_options[stumbleupon_uid]'
// 	) ) );
//
// 	// Add Vimeo Setting
//
// 	$wp_customize->add_setting( 'responsive_theme_options[vimeo_uid]' , array( 'sanitize_callback' => 'esc_url_raw', 'type' => 'option' ));
// 	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'res_vimeo', array(
// 		'label'             => __( 'Vimeo', 'responsive' ),
// 		'section'           => 'responsive_social_media',
// 		'settings'          => 'responsive_theme_options[vimeo_uid]'
// 	) ) );
//
// 	// Add SoundCloud Setting
//
// 	$wp_customize->add_setting( 'responsive_theme_options[yelp_uid]' , array( 'sanitize_callback' => 'esc_url_raw', 'type' => 'option' ));
// 	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'res_yelp', array(
// 		'label'             => __( 'Yelp', 'responsive' ),
// 		'section'           => 'responsive_social_media',
// 		'settings'          => 'responsive_theme_options[yelp_uid]'
// 	) ) );
//
// 	// Add Foursquare Setting
//
// 	$wp_customize->add_setting( 'responsive_theme_options[foursquare_uid]' , array( 'sanitize_callback' => 'esc_url_raw', 'type' => 'option' ));
// 	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'res_foursquare', array(
// 		'label'             => __( 'Foursquare', 'responsive' ),
// 		'section'           => 'responsive_social_media',
// 		'settings'          => 'responsive_theme_options[foursquare_uid]'
// 	) ) );
// 	$wp_customize->add_setting( 'responsive_theme_options[email_uid]' , array( 'sanitize_callback' => 'sanitize_email', 'type' => 'option' ));
// 	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'email_uid', array(
// 			'label'             => __( 'Email Address', 'responsive' ),
// 			'section'           => 'responsive_social_media',
// 			'settings'          => 'responsive_theme_options[email_uid]'
// 	) ) );

        /**
 * Validates the Call to Action Button styles
 *
 * @param $input select
 *
 * @return string
 */
function responsive_pro_button_style_validate( $input ) {
	// An array of valid results
	//$valid = responsive_get_valid_featured_area_layouts();
         $valid = array(
             'default' => 'Gradient',
             'flat_style' => 'Flat'
         );

	if( array_key_exists( $input, $valid ) ) {
		return $input;
	} else {
		return '';
	}
}

function responsive_validate_site_layout( $input ) {
	// An array of valid results

	$valid = array(
			'default-layout' => 'Default',
			'full-width-layout' => 'Full Width Layout',
			'full-width-no-box' =>'Full Width Without boxes'
	);

	if( array_key_exists( $input, $valid ) ) {
		return $input;
	} else {
		return '';
	}
}

/*--------------------------------------------------------------
	// CSS Styles
--------------------------------------------------------------*/
$wp_version = get_bloginfo('version');
if (!($wp_version >= 4.7))
{
	$wp_customize->add_section( 'css_styles', array(
		'title'                 => __( 'CSS Styles', 'responsive' ),
		'priority'              => 30
	) );
	$wp_customize->add_setting( 'responsive_theme_options[responsive_inline_css]' ,array( 'sanitize_callback' => 'wp_filter_nohtml_kses', 'type' => 'option' ) );
	$wp_customize->add_control( 'res_responsive_inline_css', array(
		'label'                 => __( 'Custom CSS Styles', 'responsive' ),
		'section'               => 'css_styles',
		'settings'              => 'responsive_theme_options[responsive_inline_css]',
		'type'                  => 'textarea'
	) );
}


/*------------------------------------------------------------------
	// Copyright Text
-------------------------------------------------------------------*/

$wp_customize->add_section( 'footer_section', array(
		'title'                 => __( 'Footer Settings', 'responsive' ),
		'priority'              => 30
	) );
	$wp_customize->add_setting( 'responsive_theme_options[copyright_textbox]',array( 'default' => __('Default copyright text','responsive'),'sanitize_callback' => 'wp_filter_nohtml_kses', 'type' => 'option' ) );

	$wp_customize->add_control( 'res_copyright_textbox', array(
		'label'                 => __( 'Copyright text', 'responsive' ),
		'section'               => 'footer_section',
		'settings'              => 'responsive_theme_options[copyright_textbox]',
		'type'                  => 'text',
		'priority' => 1
	) );

	$wp_customize->add_setting( 'responsive_theme_options[poweredby_link]', array( 'sanitize_callback' => 'responsive_sanitize_checkbox', 'type' => 'option' ) );
	$wp_customize->add_control( 'res_poweredby_link', array(
		'label'                 => __( 'Display Powered By WordPress Link', 'responsive' ),
		'section'               => 'footer_section',
		'settings'              => 'responsive_theme_options[poweredby_link]',
		'type'                  => 'checkbox',
		'priority' => 2
	) );


}
add_action( 'customize_register', 'responsive_customize_register' );

function responsive_sanitize_checkbox( $input ) {
		if ( $input ) {
		$output = '1';
	} else {
		$output = false;
	}
	return $output;
}

function responsive_sanitize_textarea( $input ) {
	global $allowedposttags;
	$output = wp_kses( $input, $allowedposttags);
	return $output;
}

function responsive_sanitize_posts( $input ) {
	$output = '';
	$options_posts = array();
	$options_posts_obj = get_posts('posts_per_page=-1');
	$options_posts[''] = esc_html(__( 'Choose Post', 'responsive' ));
	foreach ( $options_posts_obj as $posts ) {
		$options_posts[$posts->ID] = $posts->post_title;
	}
	$option = $options_posts;
	if ( array_key_exists( $input, $option ) ) {
		$output = $input;
	}
	return $output;
}

function responsive_sanitize_default_layouts( $input ) {
	$output = '';
	$option = Responsive_Options::valid_layouts();
	if ( array_key_exists( $input, $option ) ) {
		$output = $input;
	}

	return $output;
}
function responsive_sanitize_blog_default_layouts( $input ) {
	$output = '';
	$option = Responsive_Options::blog_valid_layouts();
	if ( array_key_exists( $input, $option ) ) {
		$output = $input;
	}
	return $output;
}
function responsive_sanitize_multiple_checkboxes( $values ) {

	$multi_values = !is_array( $values ) ? explode( ',', $values ) : $values;

	return !empty( $multi_values ) ? array_map( 'sanitize_text_field', $multi_values ) : array();
}

function responsive_validate_site_footer_layout( $input ) {
	// An array of valid results

	$valid = array(
			'footer-default-layout' => 'Default (3 column)',
			'footer-2-col' => '2 Column Layout',
	);

	if( array_key_exists( $input, $valid ) ) {
		return $input;
	} else {
		return '';
	}
}


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function responsive_customize_preview_js() {
	wp_enqueue_script( 'responsive_customizer', get_template_directory_uri() . '/core/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'responsive_customize_preview_js' );

/**
 * Adds customizer options
 *
 */
function register_options() {
	// Var.
	$dir = RESPONSIVE_THEME_DIR . 'core/includes/customizer/settings/';

	// Customizer files array.
	$files = array(
		'site-colors',
		'button',
		'typoghraphy',
		'theme-options',
		'layout'
	);

	foreach ( $files as $key ) {

		$setting = str_replace( '-', '_', $key );
			require_once $dir . $key . '.php';

		}
	}

add_action( 'after_setup_theme', 'register_options' );

/**
 * Adds custom controls.
 *
 * @param object $wp_customize WordPress customizer.
 *
 * @since 1.0.0
 */
function custom_controls( $wp_customize ) {

	// Path.
	$dir = RESPONSIVE_THEME_DIR . 'core/includes/customizer/controls/';

	// Load customize control classes.
	//require_once $dir . 'buttonset/class-control-buttonset.php';
	 require_once $dir . 'color/class-control-color.php';
	// require_once $dir . 'dimensions/class-control-dimensions.php';
	// require_once $dir . 'dropdown-pages/class-control-dropdown-pages.php';
	// require_once $dir . 'heading/class-control-heading.php';
	// require_once $dir . 'icon-select/class-control-icon-select.php';
	// require_once $dir . 'multicheck/class-control-multicheck.php';
	// require_once $dir . 'multiple-select/class-control-multiple-select.php';
	// require_once $dir . 'radio-image/class-control-radio-image.php';
	 require_once $dir . 'range/class-control-range.php';
	 require_once $dir . 'slider/class-control-slider.php';
	 require_once $dir . 'sortable/class-control-sortable.php';
	 require_once $dir . 'text/class-control-text.php';
	// require_once $dir . 'textarea/class-control-textarea.php';
	// require_once $dir . 'typo/class-control-typo.php';
	require_once $dir . 'typography/class-control-typography.php';

	// Register JS control types.
	// $wp_customize->register_control_type( 'Responsive_Customizer_Buttonset_Control' );
	 $wp_customize->register_control_type( 'Responsive_Customizer_Color_Control' );
	// $wp_customize->register_control_type( 'Responsive_Customizer_Dimensions_Control' );
	// $wp_customize->register_control_type( 'Responsive_Customizer_Dropdown_Pages' );
	// $wp_customize->register_control_type( 'Responsive_Customizer_Heading_Control' );
	// $wp_customize->register_control_type( 'Responsive_Customizer_Icon_Select_Control' );
	// $wp_customize->register_control_type( 'Responsive_Customize_Multicheck_Control' );
	// $wp_customize->register_control_type( 'Responsive_Customize_Multiple_Select_Control' );
	// $wp_customize->register_control_type( 'Responsive_Customizer_Range_Control' );
	 $wp_customize->register_control_type( 'Responsive_Customizer_Slider_Control' );
	// $wp_customize->register_control_type( 'Responsive_Customizer_Radio_Image_Control' );
	// $wp_customize->register_control_type( 'Responsive_Customizer_Sortable_Control' );
	 $wp_customize->register_control_type( 'Responsive_Customizer_Text_Control' );
	// $wp_customize->register_control_type( 'Responsive_Customizer_Textarea_Control' );
	// $wp_customize->register_control_type( 'Responsive_Customizer_Typo_Control' );
	$wp_customize->register_control_type( 'Responsive_Customizer_Typography_Control' );

}
add_action( 'customize_register', 'custom_controls' );
