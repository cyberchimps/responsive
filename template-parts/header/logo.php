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
<div class="site-header-item site-header-focus-item" data-section="title_tagline">
	<div class="site-branding" <?php responsive_schema_markup( 'site-branding' ); ?> >
		<div class="site-branding-wrapper">
			<?php
			the_custom_logo();
			if (
				( version_compare( RESPONSIVE_THEME_VERSION, '4.9.9', '<' ) && class_exists( 'Responsive_Addons_Pro' ) ) ||
				( version_compare( RESPONSIVE_THEME_VERSION, '4.9.8', '>' ) )
			) {

				echo Responsive\Core\responsive_sticky_custom_logo(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
			echo Responsive\Core\responsive_mobile_custom_logo(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			?>
			<div class="site-title-tagline">
			<?php
			if ( ! get_theme_mod( 'responsive_hide_title', 0 ) ) :
				if ( is_front_page() && is_home() ) :
					?>
					<h1 class="site-title" <?php responsive_schema_markup( 'site-title' ); ?>><a href="<?php echo esc_url( get_theme_mod( 'responsive_custom_logo_url', home_url( '/' ) ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php

				else :

					?>
					<p class="site-title"><a href="<?php echo esc_url( get_theme_mod( 'responsive_custom_logo_url', home_url( '/' ) ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php

				endif;
			endif;

			if ( ! get_theme_mod( 'responsive_hide_tagline', 1 ) ) :
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
</div>