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

			<?php get_sidebar( 'colophon' ); ?>
			<?php
			if ( is_plugin_active( 'responsive-addons-pro/responsive-addons-pro.php' ) ) {
				$sections = array( 'social_icons', 'footer_menu', 'copy_right_text' );
				$sections = get_theme_mod( 'responsive_footer_elements_positioning', $sections );
				foreach ( $sections as $section ) {

					if ( 'social_icons' === $section ) {

						 echo '<div class="footer-layouts social-icon">';
                            echo responsive_get_social_icons_new() ;// phpcs:ignore
						 echo '</div>';
					}
					// Footer Menu.
					if ( 'footer_menu' === $section ) {
						get_template_part( 'template-parts/footer-menu' );
					}
					// Copy Rights.
					if ( 'copy_right_text' == $section ) {
						get_template_part( 'template-parts/copy-right' );
					}
				}
			} else {
				echo '<div class="footer-layouts social-icon">';
                    echo responsive_get_social_icons_new() ;// phpcs:ignore
				echo '</div>';
				get_template_part( 'template-parts/copy-right' );
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
