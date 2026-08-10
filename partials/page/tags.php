<?php
/**
 * Displays the page tags
 *
 * @package Responsive WordPress theme
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$tags = get_the_tag_list( '', __( ', ', 'responsive' ) );
if ( $tags ) :
?>
<div class="post-meta entry-meta">
	<span class="entry-tag">
		<span class="post-data">
			<?php
			/* translators: %s: tag list */
			printf( esc_html__( 'Tagged with %s', 'responsive' ), wp_kses_post( $tags ) );
			?>
		</span>
	</span>
</div>
<?php endif; ?>
