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
 * @copyright      2003 - 2011 ThemeID
 * @license        license.txt
 * @version        Release: 1.1
 * @filesource     wp-content/themes/responsive/includes/theme-options.php
 * @link           http://themeshaper.com/2010/06/03/sample-theme-options/
 * @since          available since Release 1.0
 */
?>
<?php
add_action('admin_init', 'responsive_theme_options_init');
add_action('admin_menu', 'responsive_theme_options_add_page');

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
    $options = get_option('responsive_theme_options');
    if (!empty($options['google_site_verification'])) {
		echo '<meta name="google-site-verification" content="' . $options['google_site_verification'] . '" />' . "\n";
	}
}

add_action('wp_head', 'responsive_google_verification');

function responsive_bing_verification() {
    $options = get_option('responsive_theme_options');
    if (!empty($options['bing_site_verification'])) {
        echo '<meta name="msvalidate.01" content="' . $options['bing_site_verification'] . '" />' . "\n";
	}
}

add_action('wp_head', 'responsive_bing_verification');

function responsive_yahoo_verification() {
    $options = get_option('responsive_theme_options');
    if (!empty($options['yahoo_site_verification'])) {
        echo '<meta name="y_key" content="' . $options['yahoo_site_verification'] . '" />' . "\n";
	}
}

add_action('wp_head', 'responsive_yahoo_verification');

function responsive_site_statistics_tracker() {
    $options = get_option('responsive_theme_options');
    if (!empty($options['site_statistics_tracker'])) {
        echo $options['site_statistics_tracker'];
	}
}

add_action('wp_head', 'responsive_site_statistics_tracker');

function responsive_inline_css() {
    $options = get_option('responsive_theme_options');
    if (!empty($options['responsive_inline_css'])) {
		echo '<!-- Custom CSS Styles -->' . "\n";
        echo '<style type="text/css" media="screen">' . "\n";
		echo $options['responsive_inline_css'] . "\n";
		echo '</style>' . "\n";
	}
}

add_action('wp_head', 'responsive_inline_css');

function responsive_inline_js_head() {
    $options = get_option('responsive_theme_options');
    if (!empty($options['responsive_inline_js_head'])) {
		echo '<!-- Custom Scripts -->' . "\n";
        echo $options['responsive_inline_js_head'];
		echo "\n";
	}
}

add_action('wp_head', 'responsive_inline_js_head');

function responsive_inline_js_footer() {
    $options = get_option('responsive_theme_options');
    if (!empty($options['responsive_inline_js_footer'])) {
		echo '<!-- Custom Scripts -->' . "\n";
        echo $options['responsive_inline_js_footer'];
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
            <?php $options = get_option('responsive_theme_options'); ?>
            
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
					    <input id="responsive_theme_options[breadcrumb]" name="responsive_theme_options[breadcrumb]" type="checkbox" value="1" <?php isset($options['breadcrumb']) ? checked( '1', $options['breadcrumb'] ) : checked('0', '1'); ?> />
						<label class="description" for="responsive_theme_options[breadcrumb]"><?php _e('Check to disable', 'responsive'); ?></label>
                    </div><!-- end of .grid col-620 -->

                <?php
                /**
                 * CTA Button
                 */
                ?>
                <div class="grid col-300"><?php _e('Disable Call to Action Button?', 'responsive'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
					    <input id="responsive_theme_options[cta_button]" name="responsive_theme_options[cta_button]" type="checkbox" value="1" <?php isset($options['cta_button']) ? checked( '1', $options['cta_button'] ) : checked('0', '1'); ?> />
						<label class="description" for="responsive_theme_options[cta_button]"><?php _e('Check to disable', 'responsive'); ?></label>
                        <p class="submit">
                        <input type="submit" class="button-primary" value="<?php _e('Save Options', 'responsive'); ?>" />
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
                 * Homepage Headline
                 */
                ?>
                <div class="grid col-300"><?php _e('Headline', 'responsive'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="responsive_theme_options[home_headline]" class="regular-text" type="text" name="responsive_theme_options[home_headline]" value="<?php if (!empty($options['home_headline'])) echo esc_attr($options['home_headline']); ?>" />
                        <label class="description" for="responsive_theme_options[home_headline]"><?php _e('Enter your headline', 'responsive'); ?></label>
                    </div><!-- end of .grid col-620 -->

                <?php
                /**
                 * Homepage Subheadline
                 */
                ?>
                <div class="grid col-300"><?php _e('Subheadline', 'responsive'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="responsive_theme_options[home_subheadline]" class="regular-text" type="text" name="responsive_theme_options[home_subheadline]" value="<?php if (!empty($options['home_subheadline'])) echo esc_attr($options['home_subheadline']); ?>" />
                        <label class="description" for="responsive_theme_options[home_subheadline]"><?php _e('Enter your subheadline', 'responsive'); ?></label>
                    </div><!-- end of .grid col-620 -->
                    
                <?php
                /**
                 * Homepage Content Area
                 */
                ?>
                <div class="grid col-300"><?php _e('Content Area', 'responsive'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <textarea id="responsive_theme_options[home_content_area]" class="large-text" cols="50" rows="10" name="responsive_theme_options[home_content_area]"><?php if (!empty($options['home_content_area'])) echo esc_html($options['home_content_area']); ?></textarea>
                        <label class="description" for="responsive_theme_options[home_content_area]"><?php _e('Enter your content', 'responsive'); ?></label>
                    </div><!-- end of .grid col-620 -->
                                
                <?php
                /**
                 * Homepage Call to Action URL
                 */
                ?>
                <div class="grid col-300"><?php _e('Call to Action (URL)', 'responsive'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="responsive_theme_options[cta_url]" class="regular-text" type="text" name="responsive_theme_options[cta_url]" value="<?php if (!empty($options['cta_url'])) echo esc_url($options['cta_url']); ?>" />
                        <label class="description" for="responsive_theme_options[cta_url]"><?php _e('Enter your call to action URL', 'responsive'); ?></label>
                    </div><!-- end of .grid col-620 -->
                
                <?php
                /**
                 * Homepage Call to Action Text
                 */
                ?>
                <div class="grid col-300"><?php _e('Call to Action (Text)', 'responsive'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="responsive_theme_options[cta_text]" class="regular-text" type="text" name="responsive_theme_options[cta_text]" value="<?php if (!empty($options['cta_text'])) echo esc_attr($options['cta_text']); ?>" />
                        <label class="description" for="responsive_theme_options[cta_text]"><?php _e('Enter your call to action text', 'responsive'); ?></label>
                    </div><!-- end of .grid col-620 -->

                <?php
                /**
                 * Homepage Featured Content
                 */
                ?>
                <div class="grid col-300">
				    <?php _e('Featured Content', 'responsive'); ?>
                    <a class="help-links" href="<?php echo esc_url(__('http://themeid.com/help/discussion/510/theme-options-featured-content/','responsive')); ?>" title="<?php esc_attr_e('See Docs', 'responsive'); ?>" target="_blank">
                    <?php printf(__('See Docs','responsive')); ?></a>
                </div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <textarea id="responsive_theme_options[featured_content]" class="large-text" cols="50" rows="10" name="responsive_theme_options[featured_content]"><?php if (!empty($options['featured_content'])) echo esc_html($options['featured_content']); ?></textarea>
                        <label class="description" for="responsive_theme_options[featured_content]"><?php _e('Paste your shortcode, video or image source', 'responsive'); ?></label>
                        <p class="submit">
                        <input type="submit" class="button-primary" value="<?php _e('Save Options', 'responsive'); ?>" />
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
                        <input id="responsive_theme_options[google_site_verification]" class="regular-text" type="text" name="responsive_theme_options[google_site_verification]" value="<?php if (!empty($options['google_site_verification'])) echo esc_attr($options['google_site_verification']); ?>" />
                        <label class="description" for="responsive_theme_options[google_site_verification]"><?php _e('Enter your Google ID number only', 'responsive'); ?></label>
                    </div><!-- end of .grid col-620 -->
                
                <?php
                /**
                 * Bing Site Verification
                 */
                ?>
                <div class="grid col-300"><?php _e('Bing Site Verification', 'responsive'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="responsive_theme_options[bing_site_verification]" class="regular-text" type="text" name="responsive_theme_options[bing_site_verification]" value="<?php if (!empty($options['bing_site_verification'])) echo esc_attr($options['bing_site_verification']); ?>" />
                        <label class="description" for="responsive_theme_options[bing_site_verification]"><?php _e('Enter your Bing ID number only', 'responsive'); ?></label>
                    </div><!-- end of .grid col-620 -->
                
                <?php
                /**
                 * Yahoo Site Verification
                 */
                ?>
                <div class="grid col-300"><?php _e('Yahoo Site Verification', 'responsive'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="responsive_theme_options[yahoo_site_verification]" class="regular-text" type="text" name="responsive_theme_options[yahoo_site_verification]" value="<?php if (!empty($options['yahoo_site_verification'])) echo esc_attr($options['yahoo_site_verification']); ?>" />
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
                        <textarea id="responsive_theme_options[site_statistics_tracker]" class="large-text" cols="50" rows="10" name="responsive_theme_options[site_statistics_tracker]"><?php if (!empty($options['site_statistics_tracker'])) echo esc_textarea($options['site_statistics_tracker']); ?></textarea>
                        <label class="description" for="responsive_theme_options[site_statistics_tracker]"><?php _e('Google Analytics, StatCounter, any other or all of them.', 'responsive'); ?></label>
                        <p class="submit">
                        <input type="submit" class="button-primary" value="<?php _e('Save Options', 'responsive'); ?>" />
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
                        <input id="responsive_theme_options[twitter_uid]" class="regular-text" type="text" name="responsive_theme_options[twitter_uid]" value="<?php if (!empty($options['twitter_uid'])) echo esc_url($options['twitter_uid']); ?>" />
                        <label class="description" for="responsive_theme_options[twitter_uid]"><?php _e('Enter your Twitter URL', 'responsive'); ?></label>
                    </div><!-- end of .grid col-620 -->

                <div class="grid col-300"><?php _e('Facebook', 'responsive'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="responsive_theme_options[facebook_uid]" class="regular-text" type="text" name="responsive_theme_options[facebook_uid]" value="<?php if (!empty($options['facebook_uid'])) echo esc_url($options['facebook_uid']); ?>" />
                        <label class="description" for="responsive_theme_options[facebook_uid]"><?php _e('Enter your Facebook URL', 'responsive'); ?></label>
                    </div><!-- end of .grid col-620 -->
                
                <div class="grid col-300"><?php _e('LinkedIn', 'responsive'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="responsive_theme_options[linkedin_uid]" class="regular-text" type="text" name="responsive_theme_options[linkedin_uid]" value="<?php if (!empty($options['linkedin_uid'])) echo esc_url($options['linkedin_uid']); ?>" /> 
                        <label class="description" for="responsive_theme_options[linkedin_uid]"><?php _e('Enter your LinkedIn URL', 'responsive'); ?></label>
                    </div><!-- end of .grid col-620 -->
                    
                <div class="grid col-300"><?php _e('YouTube', 'responsive'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="responsive_theme_options[youtube_uid]" class="regular-text" type="text" name="responsive_theme_options[youtube_uid]" value="<?php if (!empty($options['youtube_uid'])) echo esc_url($options['youtube_uid']); ?>" /> 
                        <label class="description" for="responsive_theme_options[youtube_uid]"><?php _e('Enter your YouTube URL', 'responsive'); ?></label>
                    </div><!-- end of .grid col-620 -->
                    
                <div class="grid col-300"><?php _e('StumbleUpon', 'responsive'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="responsive_theme_options[stumble_uid]" class="regular-text" type="text" name="responsive_theme_options[stumble_uid]" value="<?php if (!empty($options['stumble_uid'])) echo esc_url($options['stumble_uid']); ?>" /> 
                        <label class="description" for="responsive_theme_options[youtube_uid]"><?php _e('Enter your StumbleUpon URL', 'responsive'); ?></label>
                    </div><!-- end of .grid col-620 -->
                    
                <div class="grid col-300"><?php _e('RSS Feed', 'responsive'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="responsive_theme_options[rss_uid]" class="regular-text" type="text" name="responsive_theme_options[rss_uid]" value="<?php if (!empty($options['rss_uid'])) echo esc_url($options['rss_uid']); ?>" /> 
                        <label class="description" for="responsive_theme_options[rss_uid]"><?php _e('Enter your RSS Feed URL', 'responsive'); ?></label>
                    </div><!-- end of .grid col-620 -->
                
                <div class="grid col-300"><?php _e('Google+', 'responsive'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="responsive_theme_options[google_plus_uid]" class="regular-text" type="text" name="responsive_theme_options[google_plus_uid]" value="<?php if (!empty($options['google_plus_uid'])) echo esc_url($options['google_plus_uid']); ?>" />  
                        <label class="description" for="responsive_theme_options[google_plus_uid]"><?php _e('Enter your Google+ URL', 'responsive'); ?></label>
                    </div><!-- end of .grid col-620 -->
                    
                <div class="grid col-300"><?php _e('Instagram', 'responsive'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="responsive_theme_options[instagram_uid]" class="regular-text" type="text" name="responsive_theme_options[instagram_uid]" value="<?php if (!empty($options['instagram_uid'])) echo esc_url($options['instagram_uid']); ?>" />  
                        <label class="description" for="responsive_theme_options[instagram_uid]"><?php _e('Enter your Instagram URL', 'responsive'); ?></label>
                    </div><!-- end of .grid col-620 -->
                    
                <div class="grid col-300"><?php _e('Pinterest', 'responsive'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="responsive_theme_options[pinterest_uid]" class="regular-text" type="text" name="responsive_theme_options[pinterest_uid]" value="<?php if (!empty($options['pinterest_uid'])) echo esc_url($options['pinterest_uid']); ?>" />  
                        <label class="description" for="responsive_theme_options[pinterest_uid]"><?php _e('Enter your Pinterest URL', 'responsive'); ?></label>
                    </div><!-- end of .grid col-620 -->
                    
                <div class="grid col-300"><?php _e('Yelp!', 'responsive'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="responsive_theme_options[yelp_uid]" class="regular-text" type="text" name="responsive_theme_options[yelp_uid]" value="<?php if (!empty($options['yelp_uid'])) echo esc_url($options['yelp_uid']); ?>" />  
                        <label class="description" for="responsive_theme_options[yelp_uid]"><?php _e('Enter your Yelp! URL', 'responsive'); ?></label>
                    </div><!-- end of .grid col-620 -->
                    
                <div class="grid col-300"><?php _e('Vimeo', 'responsive'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="responsive_theme_options[vimeo_uid]" class="regular-text" type="text" name="responsive_theme_options[vimeo_uid]" value="<?php if (!empty($options['vimeo_uid'])) echo esc_url($options['vimeo_uid']); ?>" />  
                        <label class="description" for="responsive_theme_options[vimeo_uid]"><?php _e('Enter your Vimeo URL', 'responsive'); ?></label>
                    </div><!-- end of .grid col-620 -->
                    
                <div class="grid col-300"><?php _e('foursquare', 'responsive'); ?></div><!-- end of .grid col-300 -->
                    <div class="grid col-620 fit">
                        <input id="responsive_theme_options[foursquare_uid]" class="regular-text" type="text" name="responsive_theme_options[foursquare_uid]" value="<?php if (!empty($options['foursquare_uid'])) echo esc_url($options['foursquare_uid']); ?>" />  
                        <label class="description" for="responsive_theme_options[foursquare_uid]"><?php _e('Enter your foursquare URL', 'responsive'); ?></label>
                        <p class="submit">
                        <input type="submit" class="button-primary" value="<?php _e('Save Options', 'responsive'); ?>" />
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
                        <textarea id="responsive_theme_options[responsive_inline_css]" class="inline-css large-text" cols="50" rows="30" name="responsive_theme_options[responsive_inline_css]"><?php if (!empty($options['responsive_inline_css'])) echo esc_textarea($options['responsive_inline_css']); ?></textarea>
                        <label class="description" for="responsive_theme_options[responsive_inline_css]"><?php _e('Enter your custom CSS styles.', 'responsive'); ?></label>
                        <p class="submit">
                        <input type="submit" class="button-primary" value="<?php _e('Save Options', 'responsive'); ?>" />
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
                        <textarea id="responsive_theme_options[responsive_inline_js_head]" class="inline-css large-text" cols="50" rows="30" name="responsive_theme_options[responsive_inline_js_head]"><?php if (!empty($options['responsive_inline_js_head'])) echo esc_textarea($options['responsive_inline_js_head']); ?></textarea>
                        <label class="description" for="responsive_theme_options[responsive_inline_js_head]"><?php _e('Enter your custom header script.', 'responsive'); ?></label>
                        
                        <p><?php printf(__('Embeds to footer.php &darr;','responsive')); ?></p>
                        <textarea id="responsive_theme_options[responsive_inline_js_footer]" class="inline-css large-text" cols="50" rows="30" name="responsive_theme_options[responsive_inline_js_footer]"><?php if (!empty($options['responsive_inline_js_footer'])) echo esc_textarea($options['responsive_inline_js_footer']); ?></textarea>
                        <label class="description" for="responsive_theme_options[responsive_inline_js_footer]"><?php _e('Enter your custom footer script.', 'responsive'); ?></label>
                        <p class="submit">
                        <input type="submit" class="button-primary" value="<?php _e('Save Options', 'responsive'); ?>" />
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

	// checkbox value is either 0 or 1
	foreach (array(
		'breadcrumb',
		'cta_button'
		) as $checkbox) {
		if (!isset($input[$checkbox]))
			$input[$checkbox] = null;
		    $input[$checkbox] = ( $input[$checkbox] == 1 ? 1 : 0 );
	}
	
    $input['home_headline'] = wp_kses_stripslashes($input['home_headline']);
	$input['home_subheadline'] = wp_kses_stripslashes($input['home_subheadline']);
    $input['home_content_area'] = wp_kses_stripslashes($input['home_content_area']);
    $input['cta_text'] = wp_kses_stripslashes($input['cta_text']);
    $input['cta_url'] = esc_url_raw($input['cta_url']);
    $input['featured_content'] = wp_kses_stripslashes($input['featured_content']);
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
	$input['responsive_inline_css_js_footer'] = wp_kses_stripslashes($input['responsive_inline_css_js_footer']);
	
    return $input;
}