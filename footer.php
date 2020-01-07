<?php
/**
 * Footer Template
 *
 * @file           footer.php
 * @package        Responsive
 * @author         Emil Uzelac
 * @copyright      2003 - 2014 CyberChimps
 * @license        license.txt
 * @version        Release: 1.2
 * @filesource     wp-content/themes/responsive/footer.php
 * @link           http://codex.wordpress.org/Theme_Development#Footer_.28footer.php.29
 * @since          available since Release 1.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*
 * Globalize Theme options
 */
global $responsive_options;
$responsive_options = responsive_get_options();
global $responsive_blog_layout_columns;
?>
<footer id="footer" class="clearfix" role="contentinfo" <?php responsive_schema_markup( 'footer' ); ?>>
	<?php responsive_footer_top(); ?>

		<?php get_sidebar( 'footer' ); ?>
	<div class="footer-bar grid col-940">
	<div class="content-outer">

	<?php if ( has_nav_menu( 'footer-menu' ) || ! empty( responsive_get_social_icons() ) ) { ?>

		<?php if ( has_nav_menu( 'footer-menu', 'responsive' ) ) : ?>

			<?php
				wp_nav_menu(
					array(
						'container'       => 'nav',
						'container_class' => 'footer-layouts footer-menu-container',
						'container_id'    => 'footer-menu-container',
						'fallback_cb'     => false,
						'menu_class'      => 'footer-menu',
						'theme_location'  => 'footer-menu',
						'depth'           => 1,
					)
				);
			?>

	<?php endif; ?>

	<div class="footer-layouts social-icon">

                    <?php echo responsive_get_social_icons_new() ;// phpcs:ignore ?>
	</div><!-- end of col-380 fit -->
	<?php } ?>
	<?php get_sidebar( 'colophon' ); ?>
	<?php
	$cyberchimps_link = '';
	if ( is_plugin_active( 'responsive-addons-pro/responsive-addons-pro.php' ) ) {
		echo '<div class="footer-layouts copyright">';
		if ( ! empty( $responsive_options['copyright_textbox'] ) ) {
			$copyright_text = $responsive_options['copyright_textbox'];
			esc_attr_e( '&copy;', 'responsive' );
			echo esc_attr( gmdate( 'Y' ) );
			echo esc_attr( ' ' . $copyright_text, 'responsive' );
		} else {
			esc_attr_e( '&copy;', 'responsive' );
			echo esc_attr( gmdate( 'Y' ) );
			esc_attr_e( ' Responsive', 'responsive' );
		}
		if ( ! empty( $responsive_options['poweredby_link'] ) ) {
			$cyberchimps_link = $responsive_options['poweredby_link'];
		}
		if ( $cyberchimps_link ) {
			?>
			<div class="powered">
			<?php esc_attr_e( ' | Powered by', 'responsive' ); ?> <a href="<?php echo esc_url( 'https://cyberchimps.com/' ); ?>" title="<?php esc_attr_e( ' Responsive Theme ', 'responsive' ); ?>">
				Responsive Theme </a>
			</div>
			<?php
		}

		echo '</div>';

	} else {
		echo '<div class="footer-layouts copyright">';
		esc_attr_e( '&copy;', 'responsive' );
		echo esc_attr( gmdate( 'Y' ) . ' ' );
		echo esc_attr( bloginfo( 'name' ), 'responsive' );
		?>
		<div class="powered">
		<?php esc_attr_e( ' | Powered by', 'responsive' ); ?> <a href="<?php echo esc_url( 'https://cyberchimps.com/' ); ?>" title="<?php esc_attr_e( ' Responsive Theme ', 'responsive' ); ?>">
			Responsive Theme </a>
		</div>
		<?php
		echo '</div>';
	}
	?>
	</div>

	</div>

	<?php responsive_footer_bottom(); ?>
</footer><!-- end #footer -->
<?php responsive_footer_after(); ?>

</div><!-- end of #container -->
<?php responsive_container_end(); // after container hook. ?>
<?php
if ( get_theme_mod( 'responsive_scroll_to_top' ) ) {
	$scroll_top_devices = get_theme_mod( 'responsive_scroll_to_top_on_devices', 'both' );
	?>
	<div id="scroll" title="Scroll to Top" data-on-devices="<?php echo esc_attr( $scroll_top_devices ); ?>">Top<span></span></div>
	<?php
}
?>


	<?php
	// If full screen mobile menu style.
	if ( 'fullscreen' === get_theme_mod( 'mobile_menu_style' ) ) {
		get_template_part( 'partials/mobile/mobile-fullscreen' );
	}

	// If sidebar mobile menu style.
	if ( 'sidebar' === get_theme_mod( 'mobile_menu_style' ) ) {
		get_template_part( 'partials/mobile/mobile-sidebar' );
	}
	?>
<?php wp_footer(); ?>
</body>
</html>
