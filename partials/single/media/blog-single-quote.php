<?php
/**
 * Blog single quote format
 *
 * @package Responsive WordPress theme
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<div class="post-quote-wrap">

	<div class="post-quote-content">

		<?php echo wp_kses_post( get_post_meta( get_the_ID(), 'responsive_quote_format', true ) ); ?>

		<span class="post-quote-icon icon-speech"></span>

	</div>

	<div class="post-quote-author"><?php the_title(); ?></div>

</div>
