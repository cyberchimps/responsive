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
        <div class="site-branding-wrapper<?php echo esc_attr( get_theme_mod( 'responsive_inline_logo_site_title', 0 ) ? ' site-branding-inline' : '' ); ?>">
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
            <?php
            $inline_logo_title = get_theme_mod( 'responsive_inline_logo_site_title', 0 );
            $has_logo          = has_custom_logo();
			$title_visibility   = get_theme_mod( 'responsive_site_title_visibility', array( 'desktop', 'tablet', 'mobile' ) );
			$tagline_visibility = get_theme_mod( 'responsive_site_tagline_visibility', array( 'desktop', 'tablet', 'mobile' ) );
			$show_title   = ! empty( $title_visibility );
			$show_tagline = ! empty( $tagline_visibility );
            ?>
            <div class="site-title-tagline<?php echo ( $inline_logo_title && $has_logo && $show_title ) ? ' site-title-inline' : ''; ?>"
				data-title-visibility="<?php echo esc_attr( wp_json_encode( $title_visibility ) ); ?>"
				data-tagline-visibility="<?php echo esc_attr( wp_json_encode( $tagline_visibility ) ); ?>"
			>
				<?php if ( $show_title ) : ?>
					<?php if ( is_front_page() && is_home() ) : ?>
						<h1 class="site-title" <?php responsive_schema_markup( 'site-title' ); ?>>
							<a href="<?php echo esc_url( get_theme_mod( 'responsive_custom_logo_url', home_url( '/' ) ) ); ?>" rel="home">
								<?php bloginfo( 'name' ); ?>
							</a>
						</h1>
					<?php else : ?>
						<span class="site-title">
							<a href="<?php echo esc_url( get_theme_mod( 'responsive_custom_logo_url', home_url( '/' ) ) ); ?>" rel="home">
								<?php bloginfo( 'name' ); ?>
							</a>
						</span>
					<?php endif; ?>
				<?php endif; ?>

				<?php if ( $show_tagline ) : ?>
					<?php $response_description = get_bloginfo( 'description', 'display' ); ?>
					<?php if ( $response_description || is_customize_preview() ) : ?>
						<span class="site-description"><?php echo esc_html( $response_description ); ?></span>
					<?php endif; ?>
				<?php endif; ?>
			</div>
		</div>
		<?php Responsive\responsive_header_with_logo(); ?>
	</div>
</div>