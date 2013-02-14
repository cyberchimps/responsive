<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Error 404 Template
 *
 *
 * @file           404.php
 * @package        Responsive 
 * @author         Emil Uzelac 
 * @copyright      2003 - 2013 ThemeID
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/responsive/404.php
 * @link           http://codex.wordpress.org/Creating_an_Error_404_Page
 * @since          available since Release 1.0
 */
?>
<?php get_header(); ?>

        <div id="content-full" class="grid col-940">
            <div id="post-0" class="error404">
                <div class="post-entry">
                
                    <h1 class="title-404"><?php _e('404 &#8212; Fancy meeting you here!', 'responsive'); ?></h1>
                    
                    <p><?php _e('Don&#39;t panic, we&#39;ll get through this together. Let&#39;s explore our options here.', 'responsive'); ?></p>
                    
                    <h6><?php printf( __('You can return %s or search for the page you were looking for.', 'responsive'),
	                    sprintf( '<a href="%1$s" title="%2$s">%3$s</a>',
		                    esc_url( get_home_url() ),
		                    esc_attr__('Home', 'responsive'),
		                    esc_attr__('&larr; Home', 'responsive')
	                    )); 
			         ?></h6>
                    
                    <?php get_search_form(); ?>
                    
                </div><!-- end of .post-entry -->
            </div><!-- end of #post-0 -->
        </div><!-- end of #content-full -->

<?php get_footer(); ?>
