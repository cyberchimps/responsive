<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Top Widget Template
 *
 *
 * @file           sidebar-top.php
 * @package        Responsive 
 * @author         Emil Uzelac 
 * @copyright      2003 - 2013 ThemeID
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/responsive/sidebar-top.php
 * @link           http://codex.wordpress.org/Theme_Development#Widgets_.28sidebar.php.29
 * @since          available since Release 1.0
 */
?>
    <?php
        if (! is_active_sidebar('top-widget')
	    )
            return;
    ?>
    <div id="top-widget" class="top-widget">
        <?php responsive_widgets(); // above widgets hook ?>
        
            <?php if (is_active_sidebar('top-widget')) : ?>
            
            <?php dynamic_sidebar('top-widget'); ?>

            <?php endif; //end of top-widget ?>

        <?php responsive_widgets_end(); // after widgets hook ?>
    </div><!-- end of #top-widget -->