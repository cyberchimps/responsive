<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Footer Template
 *
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

/*
 * Globalize Theme options
 */
global $responsive_options;
$responsive_options = responsive_get_options();
?>
<?php responsive_wrapper_bottom(); // after wrapper content hook ?>
</div><!-- end of #wrapper -->

</div>
<?php responsive_wrapper_end(); // after wrapper hook ?>
</div><!-- end of #container -->
<?php responsive_container_end(); // after container hook ?>

<div id="footer" class="clearfix" role="contentinfo">
	<?php responsive_footer_top(); ?>

	<div id="footer-wrapper">
	<div id="content-outer">
		<?php get_sidebar( 'footer' ); ?>
		</div>
		<?php if ( isset( $responsive_options['contact']) && $responsive_options['contact'] == '1') { ?>
			<div class="contact_div grid col-940">
			<div id="content-outer">
			
		<?php 
			$responsive_contact_title = isset( $responsive_options['contact_title']) ?  $responsive_options['contact_title'] : 'contact';
			$responsive_contact_subtitle = isset( $responsive_options['contact_subtitle']) ?  $responsive_options['contact_subtitle'] : '';
			$responsive_contact_add = isset( $responsive_options['contact_add']) ?  $responsive_options['contact_add'] : '';
			$responsive_contact_email = isset( $responsive_options['contact_email']) ?  $responsive_options['contact_email'] : '';
			$responsive_contact_ph = isset( $responsive_options['contact_ph']) ?  $responsive_options['contact_ph'] : '';
			$responsive_contact_content = isset( $responsive_options['contact_content']) ?  $responsive_options['contact_content'] : 'Contact form can be displayed here';
			
		?>	
			<div class="contact_title"><?php echo esc_html($responsive_contact_title); ?></div>
			<div class="contact_subtitle"><?php echo esc_html($responsive_contact_subtitle); ?></div>
			
			<div class="contact_left grid col-460 fit">
			<?php if ($responsive_contact_add != '') {?>
			<div><i class="fa fa-map-marker" aria-hidden="true"></i><span class="contact_add"><?php echo esc_html($responsive_contact_add); ?></span></div>
			<?php }?>
			<?php if ($responsive_contact_email != '') {?>
			<div><i class="fa fa-envelope" aria-hidden="true"></i><span class="contact_email"><?php echo esc_html($responsive_contact_email); ?></span></div>
			<?php }?>
			<?php if ($responsive_contact_ph != '') {?>
			<div><i class="fa fa-phone" aria-hidden="true"></i><span class="contact_ph"><?php echo esc_html($responsive_contact_ph); ?></span></div>
			<?php }?>
			</div>
			<div class="contact_right grid col-460" >
			<?php echo do_shortcode(wp_kses_post($responsive_contact_content)); ?>
			</div>
		</div>
		</div>
		
		<?php }?> <!--   main-->
		<div id="content-outer">
		<div class="grid col-940">

			<div class="grid col-540">
				<?php if ( has_nav_menu( 'footer-menu', 'responsive' ) ) {
					wp_nav_menu( array(
						'container'      => '',
						'fallback_cb'    => false,
						'menu_class'     => 'footer-menu',
						'theme_location' => 'footer-menu'
					) );
				} ?>
			</div><!-- end of col-540 -->

			<div class="grid col-380 fit">
				<?php echo responsive_get_social_icons() ?>
			</div><!-- end of col-380 fit -->

		</div><!-- end of col-940 -->
		<?php get_sidebar( 'colophon' ); ?>

		<div class="grid col-300 copyright">
			<?php esc_attr_e( '&copy;', 'responsive' ); ?> <?php echo date( 'Y' ); ?><a id="copyright_link" href="<?php echo esc_url( home_url( '/' ) ) ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
				<?php bloginfo( 'name' ); ?>
			</a>
		</div><!-- end of .copyright -->

		<div class="grid col-300 scroll-top"><a href="#scroll-top" title="<?php esc_attr_e( 'scroll to top', 'responsive' ); ?>"><?php _e( '&uarr;', 'responsive' ); ?></a></div>

		<div class="grid col-300 fit powered">
			<a href="<?php echo esc_url( 'http://cyberchimps.com/responsive-theme/' ); ?>" title="<?php esc_attr_e( 'Responsive Theme', 'responsive' ); ?>" rel="noindex, nofollow">Responsive Theme</a>
			<?php esc_attr_e( 'powered by', 'responsive' ); ?> <a href="<?php echo esc_url( 'http://wordpress.org/' ); ?>" title="<?php esc_attr_e( 'WordPress', 'responsive' ); ?>">
				WordPress</a>
		</div><!-- end .powered -->
	</div>
	</div><!-- end #footer-wrapper -->

	<?php responsive_footer_bottom(); ?>
</div><!-- end #footer -->
<?php responsive_footer_after(); ?>

<?php wp_footer(); ?>
</body>
</html>
