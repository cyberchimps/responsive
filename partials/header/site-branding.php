<?php
/**
 * Brand template part
 *
 * @package responsive
 * @since 4.0.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<div class="site-branding" <?php responsive_schema_markup( 'site-branding' ); ?> >
	<div class="site-branding-wrapper">
		<?php
		the_custom_logo();
		?>
		<div class="site-title-tagline">
		<?php
		if ( ! get_theme_mod( 'responsive_hide_title', 0 ) ) :
			if ( is_front_page() && is_home() ) :

				?>
				<h1 class="site-title h3" <?php responsive_schema_markup( 'site-title' ); ?>><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php

			else :

				?>
				<p class="site-title h3"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php

			endif;
		endif;

		if ( ! get_theme_mod( 'responsive_hide_tagline', 0 ) ) :
			$response_description = get_bloginfo( 'description', 'display' );
			if ( $response_description || is_customize_preview() ) :

				?>
				<p class="site-description"><?php echo esc_html( $response_description ); ?></p>
				<?php

			endif;
		endif;
		?>
		</div>
	</div>
	<?php Responsive\responsive_header_with_logo(); ?>
</div>
