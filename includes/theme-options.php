<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Theme Options
 *
 *
 * @file           theme-options.php
 * @package        Responsive 
 * @author         Emil Uzelac 
 * @copyright      2003 - 2013 ThemeID
 * @license        license.txt
 * @version        Release: 1.8.0
 * @filesource     wp-content/themes/responsive/includes/theme-options.php
 * @link           http://themeshaper.com/2010/06/03/sample-theme-options/
 * @since          available since Release 1.0
 */

/*
 * Globalize Theme options
 */
global $responsive_options;
$responsive_options = responsive_get_options();

/*
 * Hook options
 */
add_action('admin_init', 'responsive_theme_options_init');
add_action('admin_menu', 'responsive_theme_options_add_page');

/**
 * Retrieve Theme option settings
 */
function responsive_get_options() {
	// Globalize the variable that holds the Theme options
	global $responsive_options;
	// Parse array of option defaults against user-configured Theme options
	$responsive_options = wp_parse_args( get_option( 'responsive_theme_options', array() ), responsive_get_option_defaults() );
	// Return parsed args array
	return $responsive_options;
}

/**
 * Responsive Theme option defaults
 */
function responsive_get_option_defaults() {
	$defaults = array(
		'breadcrumb' => false,
		'cta_button' => false,
		'front_page' => 1,
		'home_headline' => __('Hello, World!','responsive'),
		'home_subheadline' => __('Your H2 subheadline here','responsive'),
		'home_content_area' => __('Your title, subtitle and this very content is editable from Theme Option. Call to Action button and its destination link as well. Image on your right can be an image or even YouTube video if you like.','responsive'),
		'cta_text' => __('Call to Action','responsive'),
		'cta_url' => '#nogo',
		'featured_content' => '<img class="aligncenter" src="' . get_template_directory_uri() . '/images/featured-image.png" width="440" height="300" alt="" />',
		'google_site_verification' => '',
		'bing_site_verification' => '',
		'yahoo_site_verification' => '',
		'site_statistics_tracker' => '',
		'twitter_uid' => '',
		'facebook_uid' => '',
		'linkedin_uid' => '',
		'youtube_uid' => '',
		'stumble_uid' => '',
		'rss_uid' => '',
		'google_plus_uid' => '',
		'instagram_uid' => '',
		'pinterest_uid' => '',
		'yelp_uid' => '',
		'vimeo_uid' => '',
		'foursquare_uid' => '',
		'responsive_inline_css' => '',
		'responsive_inline_js_head' => '',
		'responsive_inline_css_js_footer' => '',
		'static_page_layout_default' => 'content-sidebar-page',
		'single_post_layout_default' => 'content-sidebar-page',
		'blog_posts_index_layout_default' => 'content-sidebar-page',
	);
	return apply_filters( 'responsive_option_defaults', $defaults );
}

/**
 * A safe way of adding JavaScripts to a WordPress generated page.
 */
function responsive_admin_enqueue_scripts( $hook_suffix ) {
	wp_enqueue_style('responsive-theme-options', get_template_directory_uri() . '/includes/theme-options.css', false, '1.0');
	wp_enqueue_script('responsive-theme-options', get_template_directory_uri() . '/includes/theme-options.js', array('jquery'), '1.0');
}
add_action('admin_print_styles-appearance_page_theme_options', 'responsive_admin_enqueue_scripts');

/**
 * Init plugin options to white list our options
 */
function responsive_theme_options_init() {
    register_setting('responsive_options', 'responsive_theme_options', 'responsive_theme_options_validate');
}

/**
 * Load up the menu page
 */
function responsive_theme_options_add_page() {
    add_theme_page(__('Theme Options', 'responsive'), __('Theme Options', 'responsive'), 'edit_theme_options', 'theme_options', 'responsive_theme_options_do_page');
}

/**
 * Site Verification and Webmaster Tools
 * If user sets the code we're going to display meta verification
 * And if left blank let's not display anything at all in case there is a plugin that does this
 */
 
function responsive_google_verification() {
    global $responsive_options;
    if (!empty($responsive_options['google_site_verification'])) {
		echo '<meta name="google-site-verification" content="' . $responsive_options['google_site_verification'] . '" />' . "\n";
	}
}

add_action('wp_head', 'responsive_google_verification');

function responsive_bing_verification() {
    global $responsive_options;
    if (!empty($responsive_options['bing_site_verification'])) {
        echo '<meta name="msvalidate.01" content="' . $responsive_options['bing_site_verification'] . '" />' . "\n";
	}
}

add_action('wp_head', 'responsive_bing_verification');

function responsive_yahoo_verification() {
    global $responsive_options;
    if (!empty($responsive_options['yahoo_site_verification'])) {
        echo '<meta name="y_key" content="' . $responsive_options['yahoo_site_verification'] . '" />' . "\n";
	}
}

add_action('wp_head', 'responsive_yahoo_verification');

function responsive_site_statistics_tracker() {
    global $responsive_options;
    if (!empty($responsive_options['site_statistics_tracker'])) {
        echo $responsive_options['site_statistics_tracker'];
	}
}

add_action('wp_head', 'responsive_site_statistics_tracker');

function responsive_inline_css() {
    global $responsive_options;
    if (!empty($responsive_options['responsive_inline_css'])) {
		echo '<!-- Custom CSS Styles -->' . "\n";
        echo '<style type="text/css" media="screen">' . "\n";
		echo $responsive_options['responsive_inline_css'] . "\n";
		echo '</style>' . "\n";
	}
}

add_action('wp_head', 'responsive_inline_css');

function responsive_inline_js_head() {
    global $responsive_options;
    if (!empty($responsive_options['responsive_inline_js_head'])) {
		echo '<!-- Custom Scripts -->' . "\n";
        echo $responsive_options['responsive_inline_js_head'];
		echo "\n";
	}
}

add_action('wp_head', 'responsive_inline_js_head');

function responsive_inline_js_footer() {
    global $responsive_options;
    if (!empty($responsive_options['responsive_inline_js_footer'])) {
		echo '<!-- Custom Scripts -->' . "\n";
        echo $responsive_options['responsive_inline_js_footer'];
		echo "\n";
	}
}

add_action('wp_footer', 'responsive_inline_js_footer');
	
/**
 * Create the options page
 */
function responsive_theme_options_do_page() {

	if (!isset($_REQUEST['settings-updated']))
		$_REQUEST['settings-updated'] = false;
	?>
    
    <div class="wrap">
        <?php
        /**
         * < 3.4 Backward Compatibility
         */
        ?>
        <?php $theme_name = function_exists('wp_get_theme') ? wp_get_theme() : get_current_theme(); ?>
        <?php screen_icon(); echo "<h2>" . $theme_name ." ". __('Theme Options', 'responsive') . "</h2>"; ?>
        

		<?php if (false !== $_REQUEST['settings-updated']) : ?>
		<div class="updated fade"><p><strong><?php _e('Options Saved', 'responsive'); ?></strong></p></div>
		<?php endif; ?>
        
        <?php responsive_theme_options(); // Theme Options Hook ?>
        
        <form method="post" action="options.php">
            <?php settings_fields('responsive_options'); ?>
            <?php global $responsive_options; ?>
            
            <div id="rwd" class="grid col-940">

            <h3 class="rwd-toggle"><a href="#"><?php _e('Theme Elements', 'responsive'); ?></a></h3>
            <div class="rwd-container">
                <div class="rwd-block"> 
                               
                <?php
                /**
                 * Breadcrumb Lists
                 */
                ?>
                <div class="grid col-300"><?php _e('Disable Breadcrumb Lists?', 'responsive'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
					    <input id="responsive_theme_options[breadcrumb]" name="responsive_theme_options[breadcrumb]" type="checkbox" value="1" <?php isset($responsive_options['breadcrumb']) ? checked( '1', $responsive_options['breadcrumb'] ) : checked('0', '1'); ?> />
						<label class="description" for="responsive_theme_options[breadcrumb]"><?php _e('Check to disable', 'responsive'); ?></label>
                    </div><!-- end of .grid col-620 -->

                <?php
                /**
                 * CTA Button
                 */
                ?>
                <div class="grid col-300"><?php _e('Disable Call to Action Button?', 'responsive'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
					    <input id="responsive_theme_options[cta_button]" name="responsive_theme_options[cta_button]" type="checkbox" value="1" <?php isset($responsive_options['cta_button']) ? checked( '1', $responsive_options['cta_button'] ) : checked('0', '1'); ?> />
						<label class="description" for="responsive_theme_options[cta_button]"><?php _e('Check to disable', 'responsive'); ?></label>
                        <p class="submit">
						<?php submit_button( __( 'Save Options', 'responsive' ), 'primary', 'responsive_theme_options[submit]', false ); ?>
						<?php submit_button( __( 'Restore Defaults', 'responsive' ), 'secondary', 'responsive_theme_options[reset]', false ); ?>
                        </p>
                    </div><!-- end of .grid col-620 -->
                                    
                </div><!-- end of .rwd-block -->
            </div><!-- end of .rwd-container -->

            <h3 class="rwd-toggle"><a href="#"><?php _e('Logo Upload', 'responsive'); ?></a></h3>
            <div class="rwd-container">
                <div class="rwd-block">
                <?php
                /**
                 * Logo Upload
                 */
                ?>
                <div class="grid col-300"><?php _e('Custom Header', 'responsive'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        
                        <p><?php printf(__('Need to replace or remove default logo?','responsive')); ?> <?php printf(__('<a href="%s">Click here</a>.', 'responsive'), admin_url('themes.php?page=custom-header')); ?></p>
                     			
                    </div><!-- end of .grid col-620 -->
                    
                </div><!-- end of .rwd-block -->
            </div><!-- end of .rwd-container -->
                        
            <h3 class="rwd-toggle"><a href="#"><?php _e('Home Page', 'responsive'); ?></a></h3>
            <div class="rwd-container">
                <div class="rwd-block">
                <?php
                /**
                 * Front Page Override Checkbox
                 */
                ?>
                <div class="grid col-300"><?php _e('Enable Custom Front Page', 'responsive'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="responsive_theme_options[front_page]" name="responsive_theme_options[front_page]" type="checkbox" value="1" <?php checked( '1', $responsive_options['front_page'], true ); ?> />
                        <label class="description" for="responsive_theme_options[home_headline]"><?php printf( __('Overrides the WordPress %1sfront page option%2s', 'responsive'), '<a href="options-reading.php">', '</a>'); ?></label>
                    </div><!-- end of .grid col-620 -->
                <?php
                /**
                 * Homepage Headline
                 */
                ?>
                <div class="grid col-300"><?php _e('Headline', 'responsive'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="responsive_theme_options[home_headline]" class="regular-text" type="text" name="responsive_theme_options[home_headline]" value="<?php if (!empty($responsive_options['home_headline'])) echo esc_attr($responsive_options['home_headline']); ?>" />
                        <label class="description" for="responsive_theme_options[home_headline]"><?php _e('Enter your headline', 'responsive'); ?></label>
                    </div><!-- end of .grid col-620 -->

                <?php
                /**
                 * Homepage Subheadline
                 */
                ?>
                <div class="grid col-300"><?php _e('Subheadline', 'responsive'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="responsive_theme_options[home_subheadline]" class="regular-text" type="text" name="responsive_theme_options[home_subheadline]" value="<?php if (!empty($responsive_options['home_subheadline'])) echo esc_attr($responsive_options['home_subheadline']); ?>" />
                        <label class="description" for="responsive_theme_options[home_subheadline]"><?php _e('Enter your subheadline', 'responsive'); ?></label>
                    </div><!-- end of .grid col-620 -->
                    
                <?php
                /**
                 * Homepage Content Area
                 */
                ?>
                <div class="grid col-300"><?php _e('Content Area', 'responsive'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <textarea id="responsive_theme_options[home_content_area]" class="large-text" cols="50" rows="10" name="responsive_theme_options[home_content_area]"><?php if (!empty($responsive_options['home_content_area'])) echo esc_html($responsive_options['home_content_area']); ?></textarea>
                        <label class="description" for="responsive_theme_options[home_content_area]"><?php _e('Enter your content', 'responsive'); ?></label>
                    </div><!-- end of .grid col-620 -->
                                
                <?php
                /**
                 * Homepage Call to Action URL
                 */
                ?>
                <div class="grid col-300"><?php _e('Call to Action (URL)', 'responsive'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="responsive_theme_options[cta_url]" class="regular-text" type="text" name="responsive_theme_options[cta_url]" value="<?php if (!empty($responsive_options['cta_url'])) echo esc_url($responsive_options['cta_url']); ?>" />
                        <label class="description" for="responsive_theme_options[cta_url]"><?php _e('Enter your call to action URL', 'responsive'); ?></label>
                    </div><!-- end of .grid col-620 -->
                
                <?php
                /**
                 * Homepage Call to Action Text
                 */
                ?>
                <div class="grid col-300"><?php _e('Call to Action (Text)', 'responsive'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="responsive_theme_options[cta_text]" class="regular-text" type="text" name="responsive_theme_options[cta_text]" value="<?php if (!empty($responsive_options['cta_text'])) echo esc_attr($responsive_options['cta_text']); ?>" />
                        <label class="description" for="responsive_theme_options[cta_text]"><?php _e('Enter your call to action text', 'responsive'); ?></label>
                    </div><!-- end of .grid col-620 -->

                <?php
                /**
                 * Homepage Featured Content
                 */
                ?>
                <div class="grid col-300">
				    <?php _e('Featured Content', 'responsive'); ?>
                    <a class="help-links" href="<?php echo esc_url('http://themeid.com/docs/theme-options-featured-content/'); ?>" title="<?php esc_attr_e('See Docs', 'responsive'); ?>" target="_blank">
                    <?php printf(__('See Docs','responsive')); ?></a>
                </div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <textarea id="responsive_theme_options[featured_content]" class="large-text" cols="50" rows="10" name="responsive_theme_options[featured_content]"><?php if (!empty($responsive_options['featured_content'])) echo esc_html($responsive_options['featured_content']); ?></textarea>
                        <label class="description" for="responsive_theme_options[featured_content]"><?php _e('Paste your shortcode, video or image source', 'responsive'); ?></label>
                        <p class="submit">
						<?php submit_button( __( 'Save Options', 'responsive' ), 'primary', 'responsive_theme_options[submit]', false ); ?>
						<?php submit_button( __( 'Restore Defaults', 'responsive' ), 'secondary', 'responsive_theme_options[reset]', false ); ?>
                        </p>
                    </div><!-- end of .grid col-620 -->
                    
                </div><!-- end of .rwd-block -->
            </div><!-- end of .rwd-container -->

            <h3 class="rwd-toggle"><a href="#"><?php _e('Default Layouts', 'responsive'); ?></a></h3>
            <div class="rwd-container">
                <div class="rwd-block"> 
                               
                <?php
                /**
                 * Default Static Page Layout
                 */
                ?>
                <div class="grid col-300"><?php _e( 'Default Static Page Layout', 'responsive' ); ?></div><!-- end of .grid col-300 -->
				<div class="grid col-620 fit">
					<?php $valid_options = responsive_get_valid_layouts(); 	?>
					<select id="responsive_theme_options[static_page_layout_default]" name="responsive_theme_options[static_page_layout_default]">
					<?php 
					foreach ( $valid_options as $slug => $name ) {
						?>
						<option <?php selected( $slug == $responsive_options['static_page_layout_default'] ); ?> value="<?php echo $slug; ?>"><?php echo $name; ?></option>
						<?php
					}
					?>
					</select>
				</div><!-- end of .grid col-620 -->
                               
                <?php
                /**
                 * Default Single Blog Post Layout
                 */
                ?>
                <div class="grid col-300"><?php _e( 'Default Single Blog Post Layout', 'responsive' ); ?></div><!-- end of .grid col-300 -->
				<div class="grid col-620 fit">
					<?php $valid_options = responsive_get_valid_layouts(); 	?>
					<select id="responsive_theme_options[single_post_layout_default]" name="responsive_theme_options[single_post_layout_default]">
					<?php 
					foreach ( $valid_options as $slug => $name ) {
						?>
						<option <?php selected( $slug == $responsive_options['single_post_layout_default'] ); ?> value="<?php echo $slug; ?>"><?php echo $name; ?></option>
						<?php
					}
					?>
					</select>
				</div><!-- end of .grid col-620 -->
                               
                <?php
                /**
                 * Default Blog Posts Index Layout
                 */
                ?>
                <div class="grid col-300"><?php _e( 'Default Blog Posts Index Layout', 'responsive' ); ?></div><!-- end of .grid col-300 -->
				<div class="grid col-620 fit">
					<?php $valid_options = responsive_get_valid_layouts(); 	?>
					<select id="responsive_theme_options[blog_posts_index_layout_default]" name="responsive_theme_options[blog_posts_index_layout_default]">
					<?php 
					foreach ( $valid_options as $slug => $name ) {
						?>
						<option <?php selected( $slug == $responsive_options['blog_posts_index_layout_default'] ); ?> value="<?php echo $slug; ?>"><?php echo $name; ?></option>
						<?php
					}
					?>
					</select>
                        <p class="submit">
						<?php submit_button( __( 'Save Options', 'responsive' ), 'primary', 'responsive_theme_options[submit]', false ); ?>
						<?php submit_button( __( 'Restore Defaults', 'responsive' ), 'secondary', 'responsive_theme_options[reset]', false ); ?>
                        </p>
				</div><!-- end of .grid col-620 -->
                                    
                </div><!-- end of .rwd-block -->
            </div><!-- end of .rwd-container -->

            <h3 class="rwd-toggle"><a href="#"><?php _e('Webmaster Tools', 'responsive'); ?></a></h3>
            <div class="rwd-container">
                <div class="rwd-block"> 
                               
                <?php
                /**
                 * Google Site Verification
                 */
                ?>
                <div class="grid col-300"><?php _e('Google Site Verification', 'responsive'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="responsive_theme_options[google_site_verification]" class="regular-text" type="text" name="responsive_theme_options[google_site_verification]" value="<?php if (!empty($responsive_options['google_site_verification'])) echo esc_attr($responsive_options['google_site_verification']); ?>" />
                        <label class="description" for="responsive_theme_options[google_site_verification]"><?php _e('Enter your Google ID number only', 'responsive'); ?></label>
                    </div><!-- end of .grid col-620 -->
                
                <?php
                /**
                 * Bing Site Verification
                 */
                ?>
                <div class="grid col-300"><?php _e('Bing Site Verification', 'responsive'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="responsive_theme_options[bing_site_verification]" class="regular-text" type="text" name="responsive_theme_options[bing_site_verification]" value="<?php if (!empty($responsive_options['bing_site_verification'])) echo esc_attr($responsive_options['bing_site_verification']); ?>" />
                        <label class="description" for="responsive_theme_options[bing_site_verification]"><?php _e('Enter your Bing ID number only', 'responsive'); ?></label>
                    </div><!-- end of .grid col-620 -->
                
                <?php
                /**
                 * Yahoo Site Verification
                 */
                ?>
                <div class="grid col-300"><?php _e('Yahoo Site Verification', 'responsive'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="responsive_theme_options[yahoo_site_verification]" class="regular-text" type="text" name="responsive_theme_options[yahoo_site_verification]" value="<?php if (!empty($responsive_options['yahoo_site_verification'])) echo esc_attr($responsive_options['yahoo_site_verification']); ?>" />
                        <label class="description" for="responsive_theme_options[yahoo_site_verification]"><?php _e('Enter your Yahoo ID number only', 'responsive'); ?></label>
                    </div><!-- end of .grid col-620 -->
                    
                <?php
                /**
                 * Site Statistics Tracker
                 */
                ?>
                <div class="grid col-300">
				    <?php _e('Site Statistics Tracker', 'responsive'); ?>
                    <span class="info-box information help-links"><?php _e('Leave blank if plugin handles your webmaster tools', 'responsive'); ?></span>
                </div><!-- end of .grid col-300 -->
                    
                    <div class="grid col-620 fit">
                        <textarea id="responsive_theme_options[site_statistics_tracker]" class="large-text" cols="50" rows="10" name="responsive_theme_options[site_statistics_tracker]"><?php if (!empty($responsive_options['site_statistics_tracker'])) echo esc_textarea($responsive_options['site_statistics_tracker']); ?></textarea>
                        <label class="description" for="responsive_theme_options[site_statistics_tracker]"><?php _e('Google Analytics, StatCounter, any other or all of them.', 'responsive'); ?></label>
                        <p class="submit">
						<?php submit_button( __( 'Save Options', 'responsive' ), 'primary', 'responsive_theme_options[submit]', false ); ?>
						<?php submit_button( __( 'Restore Defaults', 'responsive' ), 'secondary', 'responsive_theme_options[reset]', false ); ?>
                        </p>
                    </div><!-- end of .grid col-620 -->
                
                </div><!-- end of .rwd-block -->
            </div><!-- end of .rwd-container -->

            <h3 class="rwd-toggle"><a href="#"><?php _e('Social Icons', 'responsive'); ?></a></h3>
            <div class="rwd-container">
                <div class="rwd-block"> 
                            
                <?php
                /**
                 * Social Media
                 */
                ?>
                <div class="grid col-300"><?php _e('Twitter', 'responsive'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="responsive_theme_options[twitter_uid]" class="regular-text" type="text" name="responsive_theme_options[twitter_uid]" value="<?php if (!empty($responsive_options['twitter_uid'])) echo esc_url($responsive_options['twitter_uid']); ?>" />
                        <label class="description" for="responsive_theme_options[twitter_uid]"><?php _e('Enter your Twitter URL', 'responsive'); ?></label>
                    </div><!-- end of .grid col-620 -->

                <div class="grid col-300"><?php _e('Facebook', 'responsive'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="responsive_theme_options[facebook_uid]" class="regular-text" type="text" name="responsive_theme_options[facebook_uid]" value="<?php if (!empty($responsive_options['facebook_uid'])) echo esc_url($responsive_options['facebook_uid']); ?>" />
                        <label class="description" for="responsive_theme_options[facebook_uid]"><?php _e('Enter your Facebook URL', 'responsive'); ?></label>
                    </div><!-- end of .grid col-620 -->
                
                <div class="grid col-300"><?php _e('LinkedIn', 'responsive'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="responsive_theme_options[linkedin_uid]" class="regular-text" type="text" name="responsive_theme_options[linkedin_uid]" value="<?php if (!empty($responsive_options['linkedin_uid'])) echo esc_url($responsive_options['linkedin_uid']); ?>" /> 
                        <label class="description" for="responsive_theme_options[linkedin_uid]"><?php _e('Enter your LinkedIn URL', 'responsive'); ?></label>
                    </div><!-- end of .grid col-620 -->
                    
                <div class="grid col-300"><?php _e('YouTube', 'responsive'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="responsive_theme_options[youtube_uid]" class="regular-text" type="text" name="responsive_theme_options[youtube_uid]" value="<?php if (!empty($responsive_options['youtube_uid'])) echo esc_url($responsive_options['youtube_uid']); ?>" /> 
                        <label class="description" for="responsive_theme_options[youtube_uid]"><?php _e('Enter your YouTube URL', 'responsive'); ?></label>
                    </div><!-- end of .grid col-620 -->
                    
                <div class="grid col-300"><?php _e('StumbleUpon', 'responsive'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="responsive_theme_options[stumble_uid]" class="regular-text" type="text" name="responsive_theme_options[stumble_uid]" value="<?php if (!empty($responsive_options['stumble_uid'])) echo esc_url($responsive_options['stumble_uid']); ?>" /> 
                        <label class="description" for="responsive_theme_options[youtube_uid]"><?php _e('Enter your StumbleUpon URL', 'responsive'); ?></label>
                    </div><!-- end of .grid col-620 -->
                    
                <div class="grid col-300"><?php _e('RSS Feed', 'responsive'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="responsive_theme_options[rss_uid]" class="regular-text" type="text" name="responsive_theme_options[rss_uid]" value="<?php if (!empty($responsive_options['rss_uid'])) echo esc_url($responsive_options['rss_uid']); ?>" /> 
                        <label class="description" for="responsive_theme_options[rss_uid]"><?php _e('Enter your RSS Feed URL', 'responsive'); ?></label>
                    </div><!-- end of .grid col-620 -->
                
                <div class="grid col-300"><?php _e('Google+', 'responsive'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="responsive_theme_options[google_plus_uid]" class="regular-text" type="text" name="responsive_theme_options[google_plus_uid]" value="<?php if (!empty($responsive_options['google_plus_uid'])) echo esc_url($responsive_options['google_plus_uid']); ?>" />  
                        <label class="description" for="responsive_theme_options[google_plus_uid]"><?php _e('Enter your Google+ URL', 'responsive'); ?></label>
                    </div><!-- end of .grid col-620 -->
                    
                <div class="grid col-300"><?php _e('Instagram', 'responsive'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="responsive_theme_options[instagram_uid]" class="regular-text" type="text" name="responsive_theme_options[instagram_uid]" value="<?php if (!empty($responsive_options['instagram_uid'])) echo esc_url($responsive_options['instagram_uid']); ?>" />  
                        <label class="description" for="responsive_theme_options[instagram_uid]"><?php _e('Enter your Instagram URL', 'responsive'); ?></label>
                    </div><!-- end of .grid col-620 -->
                    
                <div class="grid col-300"><?php _e('Pinterest', 'responsive'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="responsive_theme_options[pinterest_uid]" class="regular-text" type="text" name="responsive_theme_options[pinterest_uid]" value="<?php if (!empty($responsive_options['pinterest_uid'])) echo esc_url($responsive_options['pinterest_uid']); ?>" />  
                        <label class="description" for="responsive_theme_options[pinterest_uid]"><?php _e('Enter your Pinterest URL', 'responsive'); ?></label>
                    </div><!-- end of .grid col-620 -->
                    
                <div class="grid col-300"><?php _e('Yelp!', 'responsive'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="responsive_theme_options[yelp_uid]" class="regular-text" type="text" name="responsive_theme_options[yelp_uid]" value="<?php if (!empty($responsive_options['yelp_uid'])) echo esc_url($responsive_options['yelp_uid']); ?>" />  
                        <label class="description" for="responsive_theme_options[yelp_uid]"><?php _e('Enter your Yelp! URL', 'responsive'); ?></label>
                    </div><!-- end of .grid col-620 -->
                    
                <div class="grid col-300"><?php _e('Vimeo', 'responsive'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="responsive_theme_options[vimeo_uid]" class="regular-text" type="text" name="responsive_theme_options[vimeo_uid]" value="<?php if (!empty($responsive_options['vimeo_uid'])) echo esc_url($responsive_options['vimeo_uid']); ?>" />  
                        <label class="description" for="responsive_theme_options[vimeo_uid]"><?php _e('Enter your Vimeo URL', 'responsive'); ?></label>
                    </div><!-- end of .grid col-620 -->
                    
                <div class="grid col-300"><?php _e('foursquare', 'responsive'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="responsive_theme_options[foursquare_uid]" class="regular-text" type="text" name="responsive_theme_options[foursquare_uid]" value="<?php if (!empty($responsive_options['foursquare_uid'])) echo esc_url($responsive_options['foursquare_uid']); ?>" />  
                        <label class="description" for="responsive_theme_options[foursquare_uid]"><?php _e('Enter your foursquare URL', 'responsive'); ?></label>
                        <p class="submit">
						<?php submit_button( __( 'Save Options', 'responsive' ), 'primary', 'responsive_theme_options[submit]', false ); ?>
						<?php submit_button( __( 'Restore Defaults', 'responsive' ), 'secondary', 'responsive_theme_options[reset]', false ); ?>
                        </p>
                    </div><!-- end of .grid col-620 -->

                </div><!-- end of .rwd-block -->
            </div><!-- end of .rwd-container -->
            
            <h3 class="rwd-toggle"><a href="#"><?php _e('Custom CSS Styles', 'responsive'); ?></a></h3>
            <div class="rwd-container">
                <div class="rwd-block"> 

                <?php
                /**
                 * Custom Styles
                 */
                ?>
                <div class="grid col-300">
				    <?php _e('Custom CSS Styles', 'responsive'); ?>
                    <a class="help-links" href="<?php echo esc_url(__('https://developer.mozilla.org/en/CSS','responsive')); ?>" title="<?php esc_attr_e('CSS Tutorial', 'responsive'); ?>" target="_blank">
                    <?php printf(__('CSS Tutorial','responsive')); ?></a>
                </div><!-- end of .grid col-300 -->
                
                    <div class="grid col-620 fit">
                        <textarea id="responsive_theme_options[responsive_inline_css]" class="inline-css large-text" cols="50" rows="30" name="responsive_theme_options[responsive_inline_css]"><?php if (!empty($responsive_options['responsive_inline_css'])) echo esc_textarea($responsive_options['responsive_inline_css']); ?></textarea>
                        <label class="description" for="responsive_theme_options[responsive_inline_css]"><?php _e('Enter your custom CSS styles.', 'responsive'); ?></label>
                        <p class="submit">
						<?php submit_button( __( 'Save Options', 'responsive' ), 'primary', 'responsive_theme_options[submit]', false ); ?>
						<?php submit_button( __( 'Restore Defaults', 'responsive' ), 'secondary', 'responsive_theme_options[reset]', false ); ?>
                        </p>
                    </div><!-- end of .grid col-620 -->
                                    
                </div><!-- end of .rwd-block -->
            </div><!-- end of .rwd-container -->
            
            <h3 class="rwd-toggle"><a href="#"><?php _e('Custom Scripts', 'responsive'); ?></a></h3>
            <div class="rwd-container">
                <div class="rwd-block"> 

                <?php
                /**
                 * Custom Styles
                 */
                ?>
                <div class="grid col-300">
				    <?php _e('Custom Scripts for Header and Footer', 'responsive'); ?>
                    <a class="help-links" href="<?php echo esc_url(__('http://codex.wordpress.org/Using_Javascript','responsive')); ?>" title="<?php esc_attr_e('Quick Tutorial', 'responsive'); ?>" target="_blank">
                    <?php printf(__('Quick Tutorial','responsive')); ?></a>
                </div><!-- end of .grid col-300 -->
                
                    <div class="grid col-620 fit">
                        <p><?php printf(__('Embeds to header.php &darr;','responsive')); ?></p>
                        <textarea id="responsive_theme_options[responsive_inline_js_head]" class="inline-css large-text" cols="50" rows="30" name="responsive_theme_options[responsive_inline_js_head]"><?php if (!empty($responsive_options['responsive_inline_js_head'])) echo esc_textarea($responsive_options['responsive_inline_js_head']); ?></textarea>
                        <label class="description" for="responsive_theme_options[responsive_inline_js_head]"><?php _e('Enter your custom header script.', 'responsive'); ?></label>
                        
                        <p><?php printf(__('Embeds to footer.php &darr;','responsive')); ?></p>
                        <textarea id="responsive_theme_options[responsive_inline_js_footer]" class="inline-css large-text" cols="50" rows="30" name="responsive_theme_options[responsive_inline_js_footer]"><?php if (!empty($responsive_options['responsive_inline_js_footer'])) echo esc_textarea($responsive_options['responsive_inline_js_footer']); ?></textarea>
                        <label class="description" for="responsive_theme_options[responsive_inline_js_footer]"><?php _e('Enter your custom footer script.', 'responsive'); ?></label>
                        <p class="submit">
						<?php submit_button( __( 'Save Options', 'responsive' ), 'primary', 'responsive_theme_options[submit]', false ); ?>
						<?php submit_button( __( 'Restore Defaults', 'responsive' ), 'secondary', 'responsive_theme_options[reset]', false ); ?>
                        </p>
                    </div><!-- end of .grid col-620 -->
                                    
                </div><!-- end of .rwd-block -->
            </div><!-- end of .rwd-container -->

            </div><!-- end of .grid col-940 -->
        </form>
    </div>
    <?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function responsive_theme_options_validate($input) {

	global $responsive_options;
	$defaults = responsive_get_option_defaults();

	if ( isset( $input['reset'] ) ) {

		$input = $defaults;

	} else {

		// checkbox value is either 0 or 1
		foreach (array(
			'breadcrumb',
			'cta_button',
			'front_page'
			) as $checkbox) {
			if (!isset($input[$checkbox]))
				$input[$checkbox] = null;
				$input[$checkbox] = ( $input[$checkbox] == 1 ? 1 : 0 );
		}
		foreach ( array(
			'static_page_layout_default',
			'single_post_layout_default',
			'blog_posts_index_layout_default'
			) as $layout ) {
			$input[$layout] = ( isset( $input[$layout] ) && array_key_exists( $input[$layout], responsive_get_valid_layouts() ) ? $input[$layout] : $responsive_options[$layout] );
		}
		foreach ( array(
			'home_headline',
			'home_subheadline',
			'home_content_area',
			'cta_text',
			'cta_url',
			'featured_content',
			) as $content ) {
			$input[$content] = ( in_array( $input[$content], array( $defaults[$content], '' ) ) ? $defaults[$content] :  wp_kses_stripslashes($input[$content] ) );
		}
		$input['google_site_verification'] = wp_filter_post_kses($input['google_site_verification']);
		$input['bing_site_verification'] = wp_filter_post_kses($input['bing_site_verification']);
		$input['yahoo_site_verification'] = wp_filter_post_kses($input['yahoo_site_verification']);
		$input['site_statistics_tracker'] = wp_kses_stripslashes($input['site_statistics_tracker']);
		$input['twitter_uid'] = esc_url_raw($input['twitter_uid']);
		$input['facebook_uid'] = esc_url_raw($input['facebook_uid']);
		$input['linkedin_uid'] = esc_url_raw($input['linkedin_uid']);
		$input['youtube_uid'] = esc_url_raw($input['youtube_uid']);
		$input['stumble_uid'] = esc_url_raw($input['stumble_uid']);
		$input['rss_uid'] = esc_url_raw($input['rss_uid']);
		$input['google_plus_uid'] = esc_url_raw($input['google_plus_uid']);
		$input['instagram_uid'] = esc_url_raw($input['instagram_uid']);
		$input['pinterest_uid'] = esc_url_raw($input['pinterest_uid']);
		$input['yelp_uid'] = esc_url_raw($input['yelp_uid']);
		$input['vimeo_uid'] = esc_url_raw($input['vimeo_uid']);
		$input['foursquare_uid'] = esc_url_raw($input['foursquare_uid']);
		$input['responsive_inline_css'] = wp_kses_stripslashes($input['responsive_inline_css']);
		$input['responsive_inline_js_head'] = wp_kses_stripslashes($input['responsive_inline_js_head']);
		$input['responsive_inline_js_footer'] = wp_kses_stripslashes($input['responsive_inline_js_footer']);

	}
	
    return $input;
}
