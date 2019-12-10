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
<?php responsive_wrapper_bottom(); // after wrapper content hook. ?>
<!-- </div> -->
<!-- end of #wrapper -->

<?php responsive_wrapper_end(); // after wrapper hook. ?>
<?php if ( ( is_home() && ! is_front_page() ) || in_array( $responsive_options['blog_posts_index_layout_default'], $responsive_blog_layout_columns, true ) ) { ?>
</div>
<?php } ?>

<footer id="footer" class="clearfix" role="contentinfo" <?php responsive_schema_markup( 'footer' ); ?>>
	<?php responsive_footer_top(); ?>
	<div class="content-outer">
	<div id="footer-wrapper">


		<?php get_sidebar( 'footer' ); ?>

		<?php if ( has_nav_menu( 'footer-menu' ) || ! empty( responsive_get_social_icons() ) ) { ?>

			<?php if ( has_nav_menu( 'footer-menu', 'responsive' ) ) : ?>
				<div class="grid col-940">
				<?php
					wp_nav_menu(
						array(
							'container'       => 'nav',
							'container_class' => 'footer-menu-container',
							'container_id'    => 'footer-menu-container',
							'fallback_cb'     => false,
							'menu_class'      => 'footer-menu',
							'theme_location'  => 'footer-menu',
						)
					);
				?>
				</div><!-- end of col-940 -->
			<?php endif; ?>
	<div class="footer-layout">
		<div class="social-icon">
			<?php echo  responsive_get_social_icons() ;// phpcs:ignore ?>
		</div><!-- end of col-380 fit -->
		<?php } ?>
		<?php get_sidebar( 'colophon' ); ?>
		<?php

		if ( ! empty( $responsive_options['copyright_textbox'] ) ) {
			$copyright_text = $responsive_options['copyright_textbox'];
		}
		$cyberchimps_link = '';
		if ( ! empty( $responsive_options['poweredby_link'] ) ) {
			$cyberchimps_link = $responsive_options['poweredby_link'];
		}
		?>
			<div class="copyright">
				<?php esc_attr_e( '&copy;', 'responsive' ); ?> <?php echo esc_attr( date( 'Y' ) ); ?><a id="copyright_link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
					<?php
					if ( empty( $copyright_text ) ) {
						bloginfo( 'name' );
					} else {
						echo esc_html( $copyright_text );
					}
					?>
				</a>
			</div><!-- end of .copyright -->

		<?php if ( $cyberchimps_link ) { ?>
			<div class="powered">
				<a href="<?php echo esc_url( 'http://cyberchimps.com/responsive-theme/' ); ?>" title="<?php esc_attr_e( 'Responsive Theme', 'responsive' ); ?>" rel="noindex, nofollow" <?php responsive_schema_markup( 'url' ); ?>> | Responsive Theme</a>
				<?php esc_attr_e( 'powered by', 'responsive' ); ?> <a href="<?php echo esc_url( 'http://wordpress.org/' ); ?>" title="<?php esc_attr_e( 'WordPress', 'responsive' ); ?>">
					WordPress</a>
			</div><!-- end .powered -->
	</div>
		<?php } ?>
	</div>

	</div><!-- end #footer-wrapper -->

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
