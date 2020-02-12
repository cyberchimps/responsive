<?php
/**
 * Post single content
 *
 * @package Responsive WordPress theme
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} ?>

<?php do_action( 'responsive_before_single_post_content' ); ?>

<div class="entry-content" itemprop="text">
	<?php
	if ( is_single() ) {
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'responsive' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			)
		);
	} else {
		the_excerpt();
	}

	wp_link_pages(
		array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'responsive' ),
			'after'  => '</div>',
		)
	);
	?>
</div><!-- .entry-content -->

<?php do_action( 'responsive_after_single_post_content' ); ?>
