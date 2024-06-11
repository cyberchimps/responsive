<?php
/**
 * Add Ask For Review Admin Notice.
 *
 * @package        Responsive
 */

namespace Responsive\Admin;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * Set up theme defaults and register supported WordPress features.
 *
 * @return void
 */
function setup() {
	$n = function( $function ) {
		return __NAMESPACE__ . "\\$function";
	};

	add_action( 'admin_notices', $n( 'responsive_ask_for_review_notice' ) );
	add_action( 'admin_init', $n( 'responsive_theme_notice_dismissed' ) );
	add_action( 'admin_init', $n( 'responsive_theme_notice_change_timeout' ) );
	add_action( 'admin_head', $n( 'responsive_add_review_styling' ) );
}

/**
 * Add Ask For Review Admin Notice.
 */
function responsive_ask_for_review_notice() {

	if ( isset( $_GET['page'] ) && 'responsive' === $_GET['page'] ) {
		return;
	}

	if ( false === get_option( 'responsive-theme-old-setup' ) ) {
		set_transient( 'responsive_theme_ask_review_flag', true, 15 * 24 * 60 * 60 );
		update_option( 'responsive-theme-old-setup', true );
	} elseif ( false === get_transient( 'responsive_theme_ask_review_flag' ) && false === get_option( 'responsive_theme_review_notice_dismissed' ) ) {

		$image_path = get_template_directory_uri() . '/admin/images/responsive-thumbnail.jpg';
		echo sprintf(
			'<div class="notice notice-warning responsive-ask-for-review-notice">
				<div class="notice-content-wrapper">
					<div class="notice-image">
						<img src="%1$s" class="custom-logo" alt="Responsive" itemprop="logo">
					</div>
					<div class="notice-content">
						<div class="notice-heading">
							%3$s
						</div>
						<p class="responsive-review-request-text">%4$s</p>
						<div class="responsive-review-notice-container">
							<a href="%2$s" class="responsive-notice-close responsive-review-notice button-primary" target="_blank">
								%5$s
							</a>
							<span class="dashicons dashicons-calendar"></span>
							<a href="?responsive-theme-review-notice-change-timeout=true" data-repeat-notice-after="60" class="responsive-notice-close responsive-review-notice">
								%6$s
							</a>
							<span class="dashicons dashicons-smiley"></span>
							<a href="?responsive-theme-review-notice-dismissed=true" class="responsive-notice-close responsive-review-notice">
								%7$s
							</a>
						</div>
					</div>
				</div>
				<div>
					<a href="?responsive-theme-review-notice-dismissed=true"><button type="button" class="responsive-ask-review-notice-dismiss"></button></a>
				</div>
			</div>',
			esc_url( $image_path ),
			'https://wordpress.org/support/theme/responsive/reviews/#new-post',
			esc_html__( 'Hello! Seems like you have used Responsive Theme to build this website — Thanks a ton!', 'responsive' ),
			esc_html__( 'Could you please do us a BIG favor and give it a 5-star rating on WordPress? This would boost our motivation and help other users make a comfortable decision while choosing the Responsive Theme.', 'responsive' ),
			esc_html__( 'Ok, you deserve it', 'responsive' ),
			esc_html__( 'Nope, maybe later', 'responsive' ),
			esc_html__( 'I already did', 'responsive' )
		);
		do_action( 'tag_review' );
	}

}

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

/**
 * Add styling for responsive_ask_for_review_notice function.
 */
function responsive_add_review_styling() {
	?>
	<style>
	.responsive-ask-for-review-notice {
		display:flex;
		padding: 16px 24px;
		justify-content: space-between;
		position: relative;
	}

	.responsive-ask-for-review-notice.notice-warning {
		border-left-color: #2D2D53;
		border-left-width: 6px;
	}
	.notice-image {
		align-self: center;
	}

	.responsive-ask-for-review-notice .notice-content-wrapper {
		display: flex;
		gap: 30px;
	}

	.responsive-review-notice-container .dashicons {
		margin-left: 10px;
		padding-right: 5px !important;
	}

	.responsive-review-notice-container {
		display: flex;
		align-items: center;
		padding-top: 20px;
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

	.responsive-ask-for-review-notice .notice-content-wrapper .notice-heading {
		padding-bottom: 10px;
		color: #333333;
		font-size: 12px;
	}

	.responsive-ask-for-review-notice .responsive-review-request-text {
		margin: 0;
		color: #333333;
		font-size: 12px;
	}
	.responsive-ask-review-notice-dismiss {
		position: absolute;
		top: 0;
		right: 1px;
		border: none;
		margin: 0;
		padding: 9px;
		background: 0 0;
		color: #787c82;
		cursor: pointer;
	}
	.responsive-ask-review-notice-dismiss::before {
		background: 0 0;
		color: #787c82;
		content: "\f153";
		display: block;
		font: normal 16px/20px dashicons;
		height: 20px;
		text-align: center;
		width: 20px;
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
	<?php
}
