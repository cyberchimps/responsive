<?php
/**
 * Home starter content.
 * 
 * @since 6.0.5
 */
// @codingStandardsIgnoreStart WordPressVIPMinimum.Security.Mustache.OutputNotation -- Required for starter content.
// $responsive_default_home_content = '
ob_start();
?>
    <!-- wp:cover {"className":"responsive-custom-home-hero alignfull"} -->
    <div class="wp-block-cover responsive-custom-home-hero alignfull">
    <span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim has-background-gradient" style="background:linear-gradient(180.04deg, #2D2C52 4.77%, #7C29C4 119.73%)"></span>
        <div class="wp-block-cover__inner-container">
            <!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
            <div class="wp-block-group alignwide">
                <!-- wp:media-text {"mediaPosition":"right","mediaId":118,"mediaLink":"","mediaType":"image","mediaWidth":43,"verticalAlignment":"center","className":"alignwide"} -->
                <div class="wp-block-media-text has-media-on-the-right is-stacked-on-mobile is-vertically-aligned-center alignwide" style="grid-template-columns:auto 43%">
                    <div class="wp-block-media-text__content">
                        <!-- wp:heading {"textAlign":"left","level":1,"textColor":"white"} -->
                        <h1 class="wp-block-heading has-text-align-left has-white-color has-text-color">Build Your Website</h1>
                        <!-- /wp:heading -->
                        <!-- wp:paragraph -->
                        <p class="has-text-align-left has-text-color has-white-color" style="font-size:24px;font-weight:400;">Imagine clicking a few buttons, and voila! You’ve got yourself a stunning website that even a tech whiz would envy.</p>
                        <!-- /wp:paragraph -->
                        <!-- wp:buttons -->
                        <div class="wp-block-buttons">
                            <!-- wp:button -->
                            <div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#">Build Your Website</a> </div>
                            <!-- /wp:button -->
                        </div>
                        <!-- /wp:buttons -->
                    </div>
                    <figure class="wp-block-media-text__media">
                    <img src="<?php echo trailingslashit( get_template_directory_uri() ) ?>admin/images/hero.svg" alt="" class="wp-image-118 size-full" width="700" height="740"/>
                    </figure>
                </div>
                <!-- /wp:media-text -->
            </div>
            <!-- /wp:group -->
        </div>
    </div>
    <!-- /wp:cover -->
    <!-- wp:group {"className":"services"} {"align":"full","style":{"backgroundColor":"#FFFFFF"},"layout":{"inherit":false,"contentSize":"1200px","type":"constrained"}} -->
    <div class="wp-block-group services alignfull" id="services" style="background-color:#ffffff;">
    <!-- wp:heading -->
    <h2 style="text-align:center;">Our Services</h2>
    <!-- /wp:heading -->
    <!-- wp:columns {"style":{"backgroundColor":"#FFFFFF"}} -->
    <div class="wp-block-columns" style="background-color:#ffffff;">
        <!-- wp:column {"style":{"spacing":{"blockGap":"8px"}}} -->
        <div class="wp-block-column">
        <!-- wp:image {"id":230,"sizeSlug":"full","linkDestination":"none"} -->
        <figure class="wp-block-image size-full">
            <img src="' . trailingslashit( get_template_directory_uri() ) . 'admin/images/webdesign.svg" alt="" class="wp-image-230" style="max-width:320px;max-height:320px;width:100%;height:100%;"/>
        </figure>
        <!-- /wp:image -->
        <!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"top":"16px"}}}} -->
        <h3 style="text-align:center;">Web Design</h3>
        <!-- /wp:heading -->
        <!-- wp:paragraph -->
        <p style="font-family:Libre Franklin;font-size:16px;font-weight:300;line-height:28px;text-align:center">Creating and maintaining websites, combining design, coding, and functionality for online experiences.</p>
        <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->
        <!-- wp:column {"style":{"spacing":{"blockGap":"8px"}}} -->
        <div class="wp-block-column">
        <!-- wp:image {"id":232,"sizeSlug":"full","linkDestination":"none"} -->
        <figure class="wp-block-image size-full">
            <img src="' . trailingslashit( get_template_directory_uri() ) . 'admin/images/webdevelopment.svg" alt="" class="wp-image-232" style="max-width:320px;max-height:320px;width:100%;height:100%;"/>
        </figure>
        <!-- /wp:image -->
        <!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"top":"16px"}}}} -->
        <h3 style="text-align:center;">Web Development</h3>
        <!-- /wp:heading -->
        <!-- wp:paragraph -->
        <p style="font-family:Libre Franklin;font-size:16px;font-weight:300;line-height:28px;text-align:center">Building and designing WordPress websites, combining creativity, coding, and functionality for online success.</p>
        <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->
        <!-- wp:column {"style":{"spacing":{"blockGap":"8px"}}} -->
        <div class="wp-block-column">
        <!-- wp:image {"id":231,"sizeSlug":"full","linkDestination":"none"} -->
        <figure class="wp-block-image size-full">
            <img src="' . trailingslashit( get_template_directory_uri() ) . 'admin/images/marketingservices.svg" alt="" class="wp-image-231" style="max-width:320px;max-height:320px;width:100%;height:100%;"/>
        </figure>
        <!-- /wp:image -->
        <!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"top":"16px"}}}} -->
        <h3 style="text-align:center;">Marketing Services</h3>
        <!-- /wp:heading -->
        <!-- wp:paragraph -->
        <p style="font-family:Libre Franklin;font-size:16px;font-weight:300;line-height:28px;text-align:center">Promoting businesses with strategies to boost visibility, engagement, and drive successful outcomes.</p>
        <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
    </div>
    <!-- /wp:group -->
    <!-- wp:group {"className":"about"} {"align":"full","style":{"backgroundColor":"#FFFFFF"},"layout":{"inherit":false,"contentSize":"1200px","type":"constrained"}} -->
    <div class="wp-block-group about alignfull" id="about" style="background-color:#ffffff;">
    <!-- wp:media-text {"align":"","mediaPosition":"right","mediaId":237,"mediaLink":"","mediaType":"image","verticalAlignment":"center"} -->
    <div class="wp-block-media-text has-media-on-the-right is-stacked-on-mobile is-vertically-aligned-center">
        <div class="wp-block-media-text__content">
        <!-- wp:group "layout":{"inherit":true,"type":"constrained"}} -->
        <div class="wp-block-group">
            <!-- wp:heading {"style":{"spacing":{"padding":{"right":"40px"}}}} -->
            <h2 style="text-align:left;">Building the Future, One Website at a Time</h2>
            <!-- /wp:heading -->
            <!-- wp:paragraph -->
            <p style="line-height:30px;text-align:left;">At the heart of innovation lies the ability to create digital experiences that inspire and connect. With every website crafted, we aim to shape the future of online interaction—combining cutting-edge technology, thoughtful design, and user-focused functionality.</p>
            <!-- /wp:paragraph -->
            <!-- wp:paragraph -->
            <p style="line-height:30px;text-align:left;">Every website we build is a step toward a more connected and dynamic future. By blending innovation, design, and functionality, we create digital spaces that empower businesses and individuals to thrive.</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->
        </div>
        <figure class="wp-block-media-text__media">
        <img src="' . trailingslashit( get_template_directory_uri() ) . 'admin/images/about-us.svg" alt="" class="wp-image-237 size-full" style="max-height:668px;width:100%;height:100%"/>
        </figure>
    </div>
    <!-- /wp:media-text -->
    </div>
    <!-- /wp:group -->
    <!-- wp:group {"className":"whyus"} {"align":"full","style":{"backgroundColor":"#D0A0FB33"},"layout":{"inherit":false,"contentSize":"1200px","type":"constrained"}} -->
    <div class="wp-block-group whyus alignfull" id="whyus" style="background-color: #D0A0FB33;">
    <!-- wp:columns -->
    <div class="wp-block-columns">
        <!-- wp:column -->
        <div class="wp-block-column">
        <!-- wp:image {"id":162,"sizeSlug":"large","linkDestination":"none"} -->
        <figure class="wp-block-image size-large">
            <img src="' . trailingslashit( get_template_directory_uri() ) . 'admin/images/passionate.svg" alt="" class="wp-image-162" style="max-width:80px;max-height:80px;width:100%;height:100%;"/>
        </figure>
        <!-- /wp:image -->
        <!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"top":"16px"}}}} -->
        <h3 style="text-align:center;margin-top:35px;margin-bottom:15px;">Passionate</h3>
        <!-- /wp:heading -->
        <!-- wp:paragraph -->
        <p style="font-family:Libre Franklin;font-size:16px;font-weight:300;line-height:26px;text-align:center;margin-top:0px;">Driven by enthusiasm and dedication to deliver excellence in every endeavor.</p>
        <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->
        <!-- wp:column {"style":{"spacing":{"blockGap":"8px"}}} -->
        <div class="wp-block-column">
        <!-- wp:image {"id":163,"sizeSlug":"large","linkDestination":"none"} -->
        <figure class="wp-block-image size-large">
            <img src="' . trailingslashit( get_template_directory_uri() ) . 'admin/images/professional.svg" alt="" class="wp-image-163" style="max-width:120px;max-height:80px;width:100%;height:100%;"/>
        </figure>
        <!-- /wp:image -->
        <!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"top":"16px"}}}} -->
        <h3 style="text-align:center;margin-top:35px;margin-bottom:15px;">Professional</h3>
        <!-- /wp:heading -->
        <!-- wp:paragraph -->
        <p style="font-family:Libre Franklin;font-size:16px;font-weight:300;line-height:26px;text-align:center;margin-top:0px;">Committed to delivering quality, reliability, and expertise in every project undertaken.</p>
        <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->
        <!-- wp:column {"style":{"spacing":{"blockGap":"8px"}}} -->
        <div class="wp-block-column">
        <!-- wp:image {"id":164,"sizeSlug":"large","linkDestination":"none"} -->
        <figure class="wp-block-image size-large">
            <img src="' . trailingslashit( get_template_directory_uri() ) . 'admin/images/support.svg" alt="" class="wp-image-164" style="max-width:85px;max-height:80px;width:100%;height:100%;"/>
        </figure>
        <!-- /wp:image -->
        <!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"top":"16px"}}}} -->
        <h3 style="text-align:center;margin-top:35px;margin-bottom:15px;">Support</h3>
        <!-- /wp:heading -->
        <!-- wp:paragraph -->
        <p style="font-family:Libre Franklin;font-size:16px;font-weight:300;line-height:26px;text-align:center;margin-top:0px;">Providing reliable assistance and solutions to ensure your success at every step.</p>
        <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
    </div>
    <!-- /wp:group -->
    <!-- wp:group {"className":"testimonials"} {"align":"full","style":{"backgroundColor":"#ffffff"},"layout":{"inherit":false,"contentSize":"1200px","type":"constrained"}} -->
    <div class="wp-block-group testimonials alignfull" id="testimonials" style="background-color:#ffffff;">
    <div style="max-width:1024px;width:100%;margin:auto;">
        <!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"24px","lineHeight":"47px"}}} -->
        <p class="has-text-align-center" style="font-weight:300;">“I use this theme pretty often, as it gives me what I need and a lot more. Super-flexible for many purposes and not least, it is responsive. 🙂”</p>
        <!-- /wp:paragraph -->
        
        <!-- wp:paragraph {"align":"center"} -->
        <p class="has-text-align-center" style="font-weight:600;"><strong>-Responsive Theme User</strong></p>
        <!-- /wp:paragraph -->
    </div>
    </div>
    <!-- /wp:group -->
    <!-- wp:group {"className":"contact"} {"align":"full","style":{"background":{"gradient":"linear-gradient(60.83deg, #2D2C52 -26.89%, #7C29C4 73.99%, #FFFFFF 130.3%)"}}} -->
    <div class="wp-block-group contact alignfull" id="contact" style="background:linear-gradient(60.83deg, #2D2C52 -26.89%, #7C29C4 73.99%, #FFFFFF 130.3%);">
    <!-- wp:heading {"textAlign":"center","style":{"color":{"text":"#ffffff"}}} -->
    <h2 class="has-text-align-center has-white-text-color has-text-color" style="text-align:center;color:#ffffff;font-weight:700;margin-bottom:0px;">Turn Your Website Ideas into Reality, Today!</h2>
    <!-- /wp:heading -->
    <!-- wp:buttons {"align":"wide","layout":{"type":"flex","justifyContent":"center","orientation":"horizontal"}} -->
    <div class="wp-block-buttons alignwide has-text-align-center">
        <!-- wp:button -->
        <div class="wp-block-button">
        <a class="wp-block-button__link wp-element-button" style="border-radius:13px;border:1px solid #FFC300;background: #FFC300;">Build Your Website</a>
        </div>
        <!-- /wp:button -->
    </div>
    <!-- /wp:buttons -->
    </div>
    <!-- /wp:group -->
     <?php
     $responsive_default_home_content = ob_get_clean();
    // ';

// @codingStandardsIgnoreEnd WordPressVIPMinimum.Security.Mustache.OutputNotation -- Required for starter content.
return array(
	'post_type'    => 'page',
	'post_title'   => _x( 'Home', 'Theme starter content', 'responsive' ),
	'post_content' => $responsive_default_home_content,
	'template'     => 'gutenberg-fullwidth.php', // Set the custom template here
);