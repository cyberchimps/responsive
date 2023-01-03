<?php
/**
 * View Get Started
 *
 * @package     Responsive
 * @author      CyberChimps
 * @copyright   Copyright (c) 2020, CyberChimps
 * @link        https://www.cyberchimps.com
 * @since       Responsive 4.0.3
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>

<div class="responsive-container responsive-welcome">
	<div class="postbox responsive-top-banner responsive-welcome responsive-container" style="background-image: url(<?php echo esc_url( RESPONSIVE_THEME_URI . 'images/rst-top-banner.png' ); ?>);background-size:cover; background-position: center; margin-top: 10px;">
				<div class="inside resposive-documentation inside-top-banner">
					
						<div class="responsive-top-banner-text resposive-documentation">
						<p>
							<?php
							esc_html_e( 'Get free access to 100+ ready-to-use Elementor & Block templates. Import a template, edit content and launch your website.', 'responsive' );
							?>
						</p>
						</div>
						<div id="responsive-top-btn" class="responsive-top-banner-button">
							<?php echo Responsive_Plugin_Install_Helper::instance()->get_button_html( 'responsive-add-ons' ); //phpcs:ignore ?>
							<?php
							$responsive_facebook_group_link = 'https://wordpress.org/plugins/responsive-add-ons';
							?>
						</div>
					<div>
					</div>
				</div>
			</div>
	<div id="poststuff">
		<div id="post-body" class="columns-2">
			<div id="post-body-content">
				<!-- All WordPress Notices below header -->
				<h1 class="screen-reader-text"> <?php esc_html_e( 'Responsive', 'responsive' ); ?> </h1>
				<?php do_action( 'responsive_welcome_page_content_before' ); ?>

				<?php do_action( 'responsive_welcome_page_content' ); ?>

				<?php do_action( 'responsive_welcome_page_content_after' ); ?>
			</div>
			<div class="postbox-container responsive-sidebar" id="postbox-container-1">
				<div id="side-sortables">
					<?php do_action( 'responsive_welcome_page_right_sidebar_before' ); ?>

					<?php do_action( 'responsive_welcome_page_right_sidebar_content' ); ?>

					<?php do_action( 'responsive_welcome_page_right_sidebar_after' ); ?>
				</div>
			</div>
		</div>
		<!-- /post-body -->
		<br class="clear">
	</div>


</div>
