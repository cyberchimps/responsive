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
<div class="site-branding">
	<div class="site-branding-wrapper">
		<?php
		the_custom_logo();

		if ( is_front_page() && is_home() ) :

			?>
			<h1 class="site-title h3"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php

		else :

			?>
			<p class="site-title h3"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php

		endif;

		$response_description = get_bloginfo( 'description', 'display' );
		if ( $response_description || is_customize_preview() ) :

			?>
			<p class="site-description"><?php echo esc_html( $response_description ); ?></p>
			<?php

		endif;
		?>
	</div>
	<?php responsive_header_with_logo(); ?>
</div>
