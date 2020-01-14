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
