<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

$responsive_options = responsive_get_options();
//test for first install no database
$db = get_option( 'responsive_theme_options' );
//test if all options are empty so we can display default text if they are

$home_headline = get_theme_mod('home_headline');

$home_subheadline = get_theme_mod('home_subheadline');

$home_content_area = get_theme_mod('home_content_area');

$cta_text = get_theme_mod('cta_text');

$new_featured_content = get_theme_mod('featured_content');

$empty     = ( empty( $home_headline ) && empty( $home_subheadline ) && empty( $home_content_area ) ) ? false : true;
$emtpy_cta = ( empty( $cta_text ) ) ? false : true;

?>

<div id="featured" class="grid col-940">

	<div id="featured-content" class="grid col-460">

		<h1 class="featured-title">
			<?php
			if ( isset( $home_headline ) && $db && $empty )
				echo get_theme_mod('home_headline');
			else {
				_e( 'Hello, World!', 'responsive' );
			}
			?>
		</h1>

		<h2 class="featured-subtitle">
			<?php
			if ( isset( $home_subheadline ) && $db && $empty )
				echo get_theme_mod('home_subheadline');
			else
				_e( 'Your H2 subheadline here', 'responsive' );
			?>
		</h2>

		<?php
		if ( isset( $home_content_area ) && $db && $empty ) {
			echo do_shortcode( wpautop( get_theme_mod('home_content_area') ) );
		} else {
			echo '<p>' . __( 'Your title, subtitle and this very content is editable from Theme Option. Call to Action button and its destination link as well. Image on your right can be an image or even YouTube video if you like.', 'responsive' ) . '</p>';
		} ?>


		<?php if ( get_theme_mod('cta_button') == 0 ): ?>

			<div class="call-to-action">

				<a href="<?php echo get_theme_mod('cta_url'); ?>" class="blue button">
					<?php
					if ( isset( $cta_text ) && $db && $emtpy_cta )
						echo get_theme_mod('cta_text');
					else
						_e( 'Call to Action', 'responsive' );
					?>
				</a>

			</div><!-- end of .call-to-action -->

		<?php endif; ?>

	</div><!-- end of .col-460 -->

	<div id="featured-image" class="grid col-460 fit">

		<?php $featured_content = ( !empty( $new_featured_content ) ) ? $new_featured_content : '<img class="aligncenter" src="' . get_template_directory_uri() . '/core/images/featured-image.png" width="440" height="300" alt="" />'; ?>

		<?php echo do_shortcode( wpautop( $featured_content ) ); ?>

	</div><!-- end of #featured-image -->

</div><!-- end of #featured -->