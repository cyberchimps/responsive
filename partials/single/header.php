<?php
/**
 * Displays the post header
 *
 * @package Responsive WordPress theme
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<h1 class="entry-title post-title responsive" itemprop="headline"><?php the_title(); ?></h1>
