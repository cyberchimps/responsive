<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Search Form Template
 *
 *
 * @file           searchform.php
 * @package        Responsive 
 * @author         Emil Uzelac 
 * @copyright      2003 - 2013 ThemeID
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/responsive/searchform.php
 * @link           http://codex.wordpress.org/Function_Reference/get_search_form
 * @since          available since Release 1.0
 */
?>
	<form method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
		<label class="screen-reader-text" for="s"><?php esc_attr_e('Search for:') ?></label>
		<input type="text" class="field" name="s" id="s" placeholder="<?php esc_attr_e('search here &hellip;', 'responsive'); ?>" />
		<input type="submit" class="submit" name="submit" id="searchsubmit" value="<?php esc_attr_e('Go', 'responsive'); ?>"  />
	</form>
