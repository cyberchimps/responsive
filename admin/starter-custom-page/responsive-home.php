<?php
/**
 * Home starter content.
 * 
 * @since 6.0.5
 */
// @codingStandardsIgnoreStart WordPressVIPMinimum.Security.Mustache.OutputNotation -- Required for starter content.
ob_start();
?>
    <!-- wp:cover {"minHeight":720,"minHeightUnit":"px","customGradient":"linear-gradient(180.04deg, #2D2C52 4.77%, #7C29C4 119.73%)","align":"full","className":"home-banner"} -->
    <div class="wp-block-cover alignfull home-banner" style="min-height:720px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim has-background-gradient" style="background:linear-gradient(180.04deg, #2D2C52 4.77%, #7C29C4 119.73%)"></span><div class="wp-block-cover__inner-container"><!-- wp:group {"align":"wide","layout":{"inherit":true,"type":"constrained"}} -->
    <div class="wp-block-group alignwide"><!-- wp:media-text {"align":"wide","mediaPosition":"right","mediaId":6,"mediaLink":"http://localhost:10013/?attachment_id=6","mediaType":"image","mediaWidth":43,"verticalAlignment":"center"} -->
    <div class="wp-block-media-text alignwide has-media-on-the-right is-stacked-on-mobile is-vertically-aligned-center" style="grid-template-columns:auto 43%"><div class="wp-block-media-text__content"><!-- wp:heading {"textAlign":"left","level":1,"textColor":"white","style":{"spacing":{"margin":{"bottom":"18px"}}}} -->
    <h1 class="wp-block-heading has-text-align-left has-white-color has-text-color" style="margin-bottom:18px"><?php esc_html_e('Build Your Website', 'responsive'); ?></h1>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"style":{"typography":{"fontSize":"24px"}},{"margin":{"top":"0px","bottom":"37px"}}} -->
    <p style="font-size:24px;margin-top:0px;margin-bottom:37px"><?php esc_html_e('Imagine clicking a few buttons, and voila! You’ve got yourself a stunning website that even a tech whiz would envy.', 'responsive'); ?></p>
    <!-- /wp:paragraph -->

    <!-- wp:buttons -->
    <div class="wp-block-buttons"><!-- wp:button -->
    <div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#"><?php esc_html_e('Build Your Website', 'responsive'); ?></a></div>
    <!-- /wp:button --></div>
    <!-- /wp:buttons --></div><figure class="wp-block-media-text__media"><img src="<?php echo trailingslashit( get_template_directory_uri() ) ?>admin/images/hero.png" alt="hero" class="wp-image-6 size-full"/></figure></div>
    <!-- /wp:media-text --></div>
    <!-- /wp:group --></div></div>
    <!-- /wp:cover -->

<!-- wp:group {"align":"full","className":"services","style":{"spacing":{"padding":{"bottom":"120px","top":"120px","right":"180px","left":"108px"}}},"layout":{"inherit":false,"contentSize":"1440px","type":"constrained"}} -->
<div class="wp-block-group alignfull services" id="services" style="padding-top:120px;padding-bottom:120px;padding-right:180px;padding-left:108px"><!-- wp:heading {"textAlign":"center","style":{"spacing":{"margin":{"bottom":"0px"}}}} -->
<h2 class="wp-block-heading has-text-align-center" style="margin-bottom:0px"><?php esc_html_e('Our Services', 'responsive'); ?></h2>
<!-- /wp:heading -->

    <!-- wp:columns {"style":{"spacing":{"margin":{"top":"77px"}}}} -->
    <div class="wp-block-columns" style="margin-top:77px"><!-- wp:column {"style":{"spacing":{"blockGap":"8px"}}} -->
    <div class="wp-block-column"><!-- wp:image {"id":7,"sizeSlug":"full","linkDestination":"none","className":"is-style-default"} -->
    <figure class="wp-block-image size-full is-style-default"><img src="<?php echo trailingslashit( get_template_directory_uri() ) ?>admin/images/webdesign.png" alt="Web Design" class="wp-image-7"/></figure>
    <!-- /wp:image -->

    <!-- wp:heading {"textAlign":"center","level":3,"style":{"spacing":{"margin":{"top":"0px","bottom":"18px"}}}} -->
    <h3 class="wp-block-heading has-text-align-center" style="margin-top:0px;margin-bottom:18px"><?php esc_html_e('Web Design', 'responsive'); ?></h3>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"align":"center"} -->
    <p class="has-text-align-center"><?php esc_html_e('Creating and maintaining websites, combining design, coding, and functionality for online experiences.', 'responsive'); ?></p>
    <!-- /wp:paragraph --></div>
    <!-- /wp:column -->

    <!-- wp:column {"style":{"spacing":{"blockGap":"8px"}}} -->
    <div class="wp-block-column"><!-- wp:image {"id":8,"sizeSlug":"full","linkDestination":"none"} -->
    <figure class="wp-block-image size-full"><img src="<?php echo trailingslashit( get_template_directory_uri() ) ?>admin/images/webdevelopment.png" alt="Web Development" class="wp-image-8"/></figure>
    <!-- /wp:image -->

    <!-- wp:heading {"textAlign":"center","level":3,"style":{"spacing":{"margin":{"top":"0px","bottom":"18px"}}}} -->
    <h3 class="wp-block-heading has-text-align-center" style="margin-top:0px;margin-bottom:18px"><?php esc_html_e('Web Development', 'responsive'); ?></h3>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"align":"center"} -->
    <p class="has-text-align-center"><?php esc_html_e('Building and designing WordPress websites, combining creativity, coding, and functionality for online success.', 'responsive'); ?></p>
    <!-- /wp:paragraph --></div>
    <!-- /wp:column -->

    <!-- wp:column {"style":{"spacing":{"blockGap":"8px"}}} -->
    <div class="wp-block-column"><!-- wp:image {"id":9,"sizeSlug":"full","linkDestination":"none"} -->
    <figure class="wp-block-image size-full"><img src="<?php echo trailingslashit( get_template_directory_uri() ) ?>admin/images/marketingservices.png" alt="Marketing Services" class="wp-image-9"/></figure>
    <!-- /wp:image -->

    <!-- wp:heading {"textAlign":"center","level":3,"style":{"spacing":{"margin":{"top":"0px","bottom":"18px"}}}} -->
    <h3 class="wp-block-heading has-text-align-center" style="margin-top:0px;margin-bottom:18px"><?php esc_html_e('Marketing Services', 'responsive'); ?></h3>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"align":"center"} -->
    <p class="has-text-align-center"><?php esc_html_e('Promoting businesses with strategies to boost visibility, engagement, and drive successful outcomes.', 'responsive'); ?></p>
    <!-- /wp:paragraph --></div>
    <!-- /wp:column --></div>
    <!-- /wp:columns --></div>
    <!-- /wp:group -->

    <!-- wp:group {"align":"full","className":"about","style":{"spacing":{"padding":{"bottom":"124px","top":"120px","right":"208px","left":"78px"}}},"layout":{"inherit":false,"contentSize":"1440px","type":"constrained"}} -->
    <div class="wp-block-group alignfull about" id="about" style="padding-top:120px;padding-bottom:124px;padding-right:208px;padding-left:78px"><!-- wp:media-text {"align":"","mediaPosition":"right","mediaId":10,"mediaLink":"http://localhost:10013/?attachment_id=10","mediaType":"image","mediaWidth":33,"verticalAlignment":"center"} -->
    <div class="wp-block-media-text has-media-on-the-right is-stacked-on-mobile is-vertically-aligned-center" style="grid-template-columns:auto 33%"><div class="wp-block-media-text__content"><!-- wp:group {"style":"layout":{"inherit":true,"type":"constrained"}} -->
    <div class="wp-block-group"><!-- wp:heading {"style":{"spacing":{"margin":{"bottom":"12px"}}}} -->
    <h2 class="wp-block-heading" style="margin-bottom:12px"><?php esc_html_e('Building the Future, One Website at a Time', 'responsive'); ?></h2>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"style":{"margin":{"top":"0px","bottom":"14px"}}} -->
    <p style="margin-top:0px;margin-bottom:18px"><?php esc_html_e('At the heart of innovation lies the ability to create digital experiences that inspire and connect. With every website crafted, we aim to shape the future of online interaction—combining cutting-edge technology, thoughtful design, and user-focused functionality.', 'responsive'); ?></p>
    <!-- /wp:paragraph -->

    <!-- wp:paragraph {"style":{"margin":{"top":"0px","bottom":"0px"}}} -->
    <p style="margin-top:0px;margin-bottom:0px"><?php esc_html_e('Every website we build is a step toward a more connected and dynamic future. By blending innovation, design, and functionality, we create digital spaces that empower businesses and individuals to thrive', 'responsive'); ?></p>
    <!-- /wp:paragraph --></div>
    <!-- /wp:group --></div><figure class="wp-block-media-text__media"><img src="<?php echo trailingslashit( get_template_directory_uri() ) ?>admin/images/about-us.png" alt="About Us" class="wp-image-10 size-full"/></figure></div>
    <!-- /wp:media-text --></div>
    <!-- /wp:group -->

    <!-- wp:group {"align":"full","className":"whyus","style":{"spacing":{"padding":{"bottom":"175px","top":"178px","right":"90px","left":"80px"}},"color":{"background":"#d0a0fb33"}},"layout":{"inherit":false,"contentSize":"1440px","type":"constrained"}} -->
    <div class="wp-block-group alignfull whyus has-background" id="whyus" style="background-color:#d0a0fb33;padding-top:178px;padding-bottom:175px;padding-right:90px;padding-left:80px"><!-- wp:columns {"style":{"spacing":{"blockGap":"183px"}}} -->
    <div class="wp-block-columns"><!-- wp:column {"style":{"spacing":{"blockGap":"8px"}}} -->
    <div class="wp-block-column"><!-- wp:image {"id":11,"sizeSlug":"full","linkDestination":"none","align":"center"} -->
    <figure class="wp-block-image aligncenter size-full"><img src="<?php echo trailingslashit( get_template_directory_uri() ) ?>admin/images/passionate.png" alt="Passionate" class="wp-image-11"/></figure>
    <!-- /wp:image -->

    <!-- wp:heading {"textAlign":"center","level":3,"style":{"spacing":{"margin":{"top":"16px"}}}} -->
    <h3 class="wp-block-heading has-text-align-center" style="margin-top:16px"><?php esc_html_e('Passionate', 'responsive'); ?></h3>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"align":"center"} -->
    <p class="has-text-align-center"><?php esc_html_e('Driven by enthusiasm and dedication to deliver excellence in every endeavor.', 'responsive'); ?><br></p>
    <!-- /wp:paragraph --></div>
    <!-- /wp:column -->

    <!-- wp:column {"style":{"spacing":{"blockGap":"8px"}}} -->
    <div class="wp-block-column"><!-- wp:image {"id":12,"sizeSlug":"full","linkDestination":"none","align":"center"} -->
    <figure class="wp-block-image aligncenter size-full"><img src="<?php echo trailingslashit( get_template_directory_uri() ) ?>admin/images/professional.png" alt="Professional" class="wp-image-12"/></figure>
    <!-- /wp:image -->

    <!-- wp:heading {"textAlign":"center","level":3,"style":{"spacing":{"margin":{"top":"16px"}}}} -->
    <h3 class="wp-block-heading has-text-align-center" style="margin-top:16px"><?php esc_html_e('Professional', 'responsive'); ?></h3>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"align":"center"} -->
    <p class="has-text-align-center"><?php esc_html_e( 'Committed to delivering quality, reliability, and expertise in every project undertaken.', 'responsive' ); ?><br><br></p>
    <!-- /wp:paragraph --></div>
    <!-- /wp:column -->

    <!-- wp:column {"style":{"spacing":{"blockGap":"8px"}}} -->
    <div class="wp-block-column"><!-- wp:image {"id":13,"sizeSlug":"full","linkDestination":"none","align":"center"} -->
    <figure class="wp-block-image aligncenter size-full"><img src="<?php echo trailingslashit( get_template_directory_uri() ) ?>admin/images/support.png" alt="Support" class="wp-image-13"/></figure>
    <!-- /wp:image -->

    <!-- wp:heading {"textAlign":"center","level":3,"style":{"spacing":{"margin":{"top":"16px"}}}} -->
    <h3 class="wp-block-heading has-text-align-center" style="margin-top:16px"><?php esc_html_e( 'Support', 'responsive' );?></h3>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"align":"center"} -->
    <p class="has-text-align-center"><?php esc_html_e( 'Providing reliable assistance and solutions to ensure your success at every step.', 'responsive' ); ?><br></p>
    <!-- /wp:paragraph --></div>
    <!-- /wp:column --></div>
    <!-- /wp:columns --></div>
    <!-- /wp:group -->

    <!-- wp:group {"align":"full","className":"testimonials","style":{"spacing":{"padding":{"bottom":"158px","top":"158px","right":"205px","left":"205px"}}},"layout":{"inherit":false,"contentSize":"1028px","type":"constrained"}} -->
    <div class="wp-block-group alignfull testimonials" id="testimonials" style="padding-top:158px;padding-bottom:158px;padding-right:205px;padding-left:205px"><!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"bottom":"24px"}}}} -->
    <p class="has-text-align-center" style="margin-bottom:24px"><?php esc_html_e( '“I use this theme pretty often, as it gives me what I need and a lot more. Super-flexible for many purposes and not least, it is responsive. 🙂”', 'responsive' ); ?></p>
    <!-- /wp:paragraph -->

    <!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"0px"}}}} -->
    <p class="has-text-align-center" style="margin-top:0px"><strong><strong><?php esc_html_e( '-Responsive Theme User', 'responsive' ); ?></strong></strong></p>
    <!-- /wp:paragraph --></div>
    <!-- /wp:group -->

    <!-- wp:group {"align":"full","className":"contact","style":{"color":{"gradient":"linear-gradient(60.83deg, #2D2C52 -26.89%, #7C29C4 73.99%, #FFFFFF 130.3%)"},"spacing":{"padding":{"top":"194px","bottom":"194px","right":"178px","left":"178px"}}},"layout":{"inherit":false,"contentSize":"520px","type":"constrained"}} -->
    <div class="wp-block-group alignfull contact has-background" id="contact" style="background:linear-gradient(60.83deg, #2D2C52 -26.89%, #7C29C4 73.99%, #FFFFFF 130.3%);padding-top:194px;padding-bottom:194px;padding-right:178px;padding-left:178px"><!-- wp:heading {"textAlign":"center","level":2,"textColor":"white","style":{"spacing":{"margin":{"bottom":"0px"}}}} -->
    <h2 class="wp-block-heading has-text-align-center has-white-color has-text-color" style="margin-bottom:0px"><?php esc_html_e( 'Turn Your Website Ideas into Reality, Today!', 'responsive' ); ?></h2>
    <!-- /wp:heading -->

    <!-- wp:buttons {"align":"wide","style":{"spacing":{"margin":{"top":"26px"}}},"layout":{"type":"flex","justifyContent":"center","orientation":"horizontal"}} -->
    <div class="wp-block-buttons alignwide" style="margin-top:26px"><!-- wp:button -->
    <div class="wp-block-button"><a class="wp-block-button__link wp-element-button"><?php esc_html_e( 'Build Your Website', 'responsive' ); ?></a></div>
    <!-- /wp:button --></div>
    <!-- /wp:buttons --></div>
    <!-- /wp:group -->
     <?php
     $responsive_default_home_content = ob_get_clean();

// @codingStandardsIgnoreEnd WordPressVIPMinimum.Security.Mustache.OutputNotation -- Required for starter content.
return array(
	'post_type'    => 'page',
	'post_title'   => _x( 'Home', 'Theme starter content', 'responsive' ),
	'post_content' => $responsive_default_home_content,
	'template'     => 'gutenberg-fullwidth.php', // Set the custom template here
);