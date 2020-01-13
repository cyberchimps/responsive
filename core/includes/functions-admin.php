<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Theme options upgrade bar
 */
function responsive_upgrade_bar() {
	?>

	<!--  <div class="upgrade-callout">
		<p class="responsivepro-offer"><img src="<?php echo get_template_directory_uri(); ?>/core/includes/theme-options/images/chimp.png" alt="CyberChimps"/>
			<?php
			printf(
				__( '%1$s Such Free Themes By CyberChimps</span>', 'responsive' ),
				' <a href="https://cyberchimps.com/10-free-responsive-wordpress-themes/?utm_source=orgwpresponsive" target="_blank" title="CyberChimps Free Themes">Get More</a> '
			);
			?>
		</p>
		 <p class="responsivepro-offer">Get 30% off on Responsive Pro using Coupon Code RESPONSIVE30</p> -->

	<!--</div>-->
	<div class="updated">
		<p><?php esc_html_e( 'Looking for More Features?', 'responsive' ); ?></p>
		<p><?php esc_html_e( 'Check out <a href="https://cyberchimps.com/store/responsivepro/?utm_source=responsive2pro" target="_blank" title="Responsive Pro">Responsive Pro</a> & <a href="https://cyberchimps.com/product-category/upgradefromresponsive/?utm_source=responsive2pro" target="_blank" title="Responsive Pro">Premium Child Themes</a> for your Responsive Theme.', 'responsive' ); ?></p>
	</div>
	<?php
}

add_action( 'responsive_theme_options', 'responsive_upgrade_bar', 1 );

/**
 * Theme Options Support and Information
 */
function responsive_theme_support() {
	?>

	<div id="info-box-wrapper" class="grid col-940">
		<div class="info-box notice">

			<a class="button" href="<?php echo esc_url( 'http://cyberchimps.com/guides/r-free/' ); ?>" title="<?php esc_attr_e( 'Instructions', 'responsive' ); ?>" target="_blank">
				<?php esc_html_e( 'Instructions', 'responsive' ); ?></a>

			<a class="button" href="<?php echo esc_url( 'http://cyberchimps.com/forum/free/responsive/' ); ?>" title="<?php esc_attr_e( 'Help', 'responsive' ); ?>" target="_blank">
				<?php esc_html_e( 'Help', 'responsive' ); ?></a>


			<a class="button button-primary" href="<?php echo esc_url( 'https://wordpress.org/support/theme/responsive/reviews/#new-post/' ); ?>" title="<?php esc_attr_e( 'Leave a star rating', 'responsive' ); ?>" target="_blank">
				<?php esc_html_e( 'Leave a star rating', 'responsive' ); ?></a>

			<a class="button" href="<?php echo esc_url( 'https://cyberchimps.com/contact/' ); ?>" title="<?php esc_attr_e( 'Need Customization', 'responsive' ); ?>" target="_blank">
				<?php esc_html_e( 'Need Customization?', 'responsive' ); ?></a>

			<a class="button" href="<?php echo esc_url( 'https://cyberchimps.com/checkout/?add-to-cart=277804' ); ?>" title="<?php esc_attr_e( 'Theme Demo Data', 'responsive' ); ?>" target="_blank">
				<?php esc_html_e( 'Theme Demo Data', 'responsive' ); ?></a>
<a class="button" href="<?php echo esc_url( 'https://cyberchimps.com/store/responsivepro#whygopro' ); ?>" title="<?php esc_attr_e( 'Why Go Pro?', 'responsive' ); ?>" target="_blank">
				<?php esc_html_e( 'Why Go Pro?', 'responsive' ); ?></a>
		</div>
	</div>

	<?php
}

add_action( 'responsive_theme_options', 'responsive_theme_support', 2 );

/*
 * Add notification to Reading Settings page to notify if Custom Front Page is enabled.
 *
 * @since    1.9.4.0
 */
function responsive_front_page_reading_notice() {
	$screen             = get_current_screen();
	$responsive_options = responsive_get_options();
	if ( 'options-reading' == $screen->id ) {
		$html = '<div class="updated">';
		if ( 1 == $responsive_options['front_page'] ) {
			$html .= '<p>' . sprintf( __( 'The Custom Front Page is enabled. You can disable it in the <a href="%1$s">theme settings</a>.', 'responsive' ), admin_url( 'themes.php?page=theme_options' ) ) . '</p>';
		} else {
			$html .= '<p>' . sprintf( __( 'The Custom Front Page is disabled. You can enable it in the <a href="%1$s">theme settings</a>.', 'responsive' ), admin_url( 'themes.php?page=theme_options' ) ) . '</p>';
		}
		$html .= '</div>';
		echo $html;
	}
}

add_action( 'admin_notices', 'responsive_front_page_reading_notice' );

/**
 * Add Ask For Review Admin Notice.
 */
function ask_for_review_notice() {

	if ( isset( $_GET['page'] ) && 'responsive' === $_GET['page'] ) {
		return;
	}

	if ( false === get_option( 'responsive-theme-old-setup' ) ) {
		set_transient( 'responsive_theme_ask_review_flag', true, MONTH_IN_SECONDS );
		update_option( 'responsive-theme-old-setup', true );
	} elseif ( false === get_transient( 'responsive_theme_ask_review_flag' ) && false === get_option( 'responsive_theme_review_notice_dismissed' ) ) {

		$image_path = get_template_directory_uri() . '/admin/images/responsive-thumbnail.jpg';
		echo sprintf(
			'<div class="notice notice-warning ask-for-review-notice">
             					<div class="notice-image">
									<img src="%1$s" class="custom-logo" alt="Responsive" itemprop="logo">
								</div>
								<div class="notice-content">
									<div class="notice-heading">
										Hi! Thanks for using the Responsive theme.
									</div>
									Can you please do us a favor and give us a 5-star rating? Your feedback keeps us motivated and helps us grow the Responsive community.<br />
									<div class="responsive-review-notice-container">
										<a href="%2$s" class="responsive-notice-close responsive-review-notice button-primary" target="_blank">
										Ok, you deserve it
										</a>
										<span class="dashicons dashicons-calendar"></span>
										<a href="?responsive-theme-review-notice-change-timeout=true" data-repeat-notice-after="60" class="responsive-notice-close responsive-review-notice">
										Nope, maybe later
										</a>
										<span class="dashicons dashicons-smiley"></span>
										<a href="?responsive-theme-review-notice-dismissed=true" class="responsive-notice-close responsive-review-notice">
										I already did
										</a>
									</div>
								</div>
								<div>
									<a href="?responsive-theme-review-notice-dismissed=true">Dismiss</a>

								</div>
         					</div>',
			esc_url( $image_path ),
			'https://wordpress.org/support/theme/responsive/reviews/?filter=5#new-post'
		);
		do_action( 'tag_review' );
	}

}

add_action( 'admin_notices', 'ask_for_review_notice' );

/**
 * Removed Ask For Review Admin Notice when dismissed.
 */
function responsive_theme_notice_dismissed() {
	if ( isset( $_GET['responsive-theme-review-notice-dismissed'] ) ) {
		update_option( 'responsive_theme_review_notice_dismissed', true );
		wp_safe_redirect( remove_query_arg( array( 'responsive-theme-review-notice-dismissed' ), wp_get_referer() ) );
	}
}

/**
 * Removed Ask For Review Admin Notice when dismissed.
 */
function responsive_theme_notice_change_timeout() {
	if ( isset( $_GET['responsive-theme-review-notice-change-timeout'] ) ) {
		set_transient( 'responsive_theme_ask_review_flag', true, DAY_IN_SECONDS );
		wp_safe_redirect( remove_query_arg( array( 'responsive-theme-review-notice-change-timeout' ), wp_get_referer() ) );
	}
}
add_action( 'admin_init', 'responsive_theme_notice_dismissed' );
add_action( 'admin_init', 'responsive_theme_notice_change_timeout' );
add_action( 'admin_head', 'add_review_styling' );
/**
 * Add styling for ask_for_review_notice function.
 */
function add_review_styling() {
	echo <<<HTML
     <style>
     .ask-for-review-notice {
     	display:flex;
     	padding: 15px;
     }

 	.notice-image {
 		align-self: center;
 	}

 	.notice-content {
 		padding-left: 20px;
 	}

 	.responsive-review-notice-container .dashicons {
 		margin-left: 10px;
 		padding-right: 5px !important;
 	}

 	.responsive-review-notice-container {
 		display: flex;
 		align-items: center;
 		padding-top: 10px;
 	}

 	.responsive-review-notice-container .dashicons {
 		font-size: 1.4em;
 		padding-right: 10px;
 	}

 	.responsive-review-notice-container a {
 		padding-right: 5px;
 		text-decoration: none;
 	}

 	.responsive-review-notice-container .dashicons:first-child {
 		padding-right: 0;
 	}

 	.notice-image img {
 		max-width: 90px;
 	}

 	.notice-content .notice-heading {
 		padding-bottom: 5px;
 	}

 	.notice-content {
 		margin-right: 12%;
 	}

 	.notice-container {
 		padding-top: 10px;
 		padding-bottom: 10px;
 		display: flex;
 		justify-content: left;
 		align-items: center;
 	}

 	#responsive-sites-on-active .notice-image img {
 		max-width: 60px;
 		margin-right: 5px;
 	}

 	#responsive-sites-on-active .notice-content .notice-heading {
 		margin: 0 0 8px;
 		padding: 0;
 		font-weight: bolder;
 		font-size: 1.3em;
 		color: #2e4453;
 	}

 	#responsive-sites-on-active .notice-content p {
 		padding-top: 0;
 		margin-top: 0;
 		margin-bottom: 6px;
 	}

 	#responsive-sites-on-active .notice-container {
 		padding: 18px 0 18px;
 		align-items: start;
 	}

 	#responsive-sites-on-active .button.button-hero {
 		font-size: 13px;
 		min-height: 30px;
 		line-height: 26px;
 		padding: 0 12px;
 		height: 30px;
 	}

 	#responsive-sites-on-active .responsive-review-notice-container {
 		padding-top: 5px;
 	}

 	#responsive-sites-on-active .button-primary {
 		box-shadow: 0 1px 0 #006799;
 	}

 	#responsive-sites-on-active .button.updating-message:before,
 	#responsive-sites-on-active .button.updated-message:before,
 	#responsive-sites-on-active .button.installed:before,
 	#responsive-sites-on-active .button.installing:before {
 		margin: 4px -1px 0px 5px;
 	}

     </style>
HTML;
}
