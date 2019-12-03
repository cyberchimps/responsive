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
<?php $single_alignment = get_theme_mod( 'single_title_alignment_options', 'default' ); ?>
<h1 class="entry-title post-title responsive <?php echo esc_attr( $single_alignment ); ?>" itemprop="headline"><?php the_title(); ?></h1>
