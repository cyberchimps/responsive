<?php
/**
 * Site Front Page
 *
 * Note: You can overwrite front-page.php as well as any other Template in Child Theme.
 * Create the same file (name) include in /responsive-child-theme/ and you're all set to go!
 *
 * @see            http://codex.wordpress.org/Child_Themes and
 *                 http://themeid.com/forum/topic/505/child-theme-example/
 *
 * @file           front-page.php
 * @package        Responsive
 * @author         CyberChimps
 * @copyright      2020 CyberChimps
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/responsive/front-page.php
 * @link           http://codex.wordpress.org/Template_Hierarchy
 * @since          available since Release 1.0
 */

/**
 * Exit if accessed directly.
 *
 * @package Responsive
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/**
 * Globalize Theme Options
 */
$responsive_options = responsive_get_options();
/**
 * If front page is set to display the
 * blog posts index, include home.php;
 * otherwise, display static front page
 * content
 */
if ( 'posts' == get_option( 'show_on_front' ) && 1 != $responsive_options['front_page'] ) { //phpcs:ignore
	get_template_part( 'home' );
} elseif ( 'page' === get_option( 'show_on_front' ) && 1 !== $responsive_options['front_page'] ) {
	$template = get_post_meta( get_option( 'page_on_front' ), '_wp_page_template', true );
	$template = ( 'default' === $template || '' === $template ) ? 'page.php' : $template;
	locate_template( $template, true );
} else {
	get_header();
	responsive_wrapper_top(); // before wrapper content hook. ?>
	<div id="wrapper" class="site-content clearfix">
		<div class="content-outer container">
			<div class="row">
				<main id="primary" class="content-area" role="main">
					<article class=""  <?php responsive_schema_markup( 'creativework' ); ?>>
					<?php
					responsive_in_wrapper(); // wrapper hook.
					get_template_part( 'partials/custom-home/featured-area' );

					get_sidebar( 'home' );

					if ( isset( $responsive_options['contact'] ) && 1 === $responsive_options['contact'] ) {
						?>
						<div class="contact_div custom-home-contact-section grid col-940">
						<?php
							$responsive_contact_title    = isset( $responsive_options['contact_title'] ) ? $responsive_options['contact_title'] : 'contact';
							$responsive_contact_subtitle = isset( $responsive_options['contact_subtitle'] ) ? $responsive_options['contact_subtitle'] : '';
							$responsive_contact_add      = isset( $responsive_options['contact_add'] ) ? $responsive_options['contact_add'] : '';
							$responsive_contact_email    = isset( $responsive_options['contact_email'] ) ? $responsive_options['contact_email'] : '';
							$responsive_contact_ph       = isset( $responsive_options['contact_ph'] ) ? $responsive_options['contact_ph'] : '';
							$responsive_contact_content  = isset( $responsive_options['contact_content'] ) ? $responsive_options['contact_content'] : 'Contact form can be displayed here';

						?>
							<h2 class="contact_title"><?php echo esc_html( $responsive_contact_title ); ?></h2>
							<p class="contact_subtitle"><?php echo esc_html( $responsive_contact_subtitle ); ?></p>

							<div class="contact-content">
								<div class="contact_left grid col-460 fit">
									<?php if ( '' != $responsive_contact_add ) { ?>
										<div><i class="icon-map-marker" aria-hidden="true"></i><span class="contact_add"><?php echo esc_html( $responsive_contact_add ); ?></span></div>
									<?php } ?>
									<?php if ( '' != $responsive_contact_email ) { ?>
										<div><i class="icon-envelope-o" aria-hidden="true"></i><span class="contact_email"><?php echo esc_html( $responsive_contact_email ); ?></span></div>
									<?php } ?>
									<?php if ( '' != $responsive_contact_ph ) { ?>
										<div><i class="icon-phone" aria-hidden="true"></i><span class="contact_ph"><?php echo esc_html( $responsive_contact_ph ); ?></span></div>
									<?php } ?>
								</div>
								<div class="contact_right grid col-460" >
								<?php echo do_shortcode( wp_kses_post( $responsive_contact_content ) ); ?>
								</div>
							</div>
						</div>
						<?php
					}
					?>
					</article>
				</main>
			</div>
		</div>
		<?php responsive_wrapper_bottom(); // after wrapper content hook. ?>
	</div> <!-- end of #wrapper -->
	<?php
	responsive_wrapper_end(); // after wrapper hook.
	get_footer();
}
