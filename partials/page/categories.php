<?php
/**
 * Displays the page categories
 *
 * @package Responsive WordPress theme
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$categories = get_the_category_list( __( ', ', 'responsive' ) );
if ( $categories ) :
?>
<div class="post-meta entry-meta">
	<span class="entry-category">
		<span class='posted-in'>
			<?php echo wp_kses_post( $categories ); ?>
		</span>
	</span>
</div>
<?php endif; ?>
