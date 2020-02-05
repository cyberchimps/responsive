<?php
/**
 * Add Ask For Review Admin Notice.
 *
 * @package        Responsive
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Add Ask For Review Admin Notice.
 */
function ask_for_review_notice() {
	add_option( 'ask_review_flag', 'false' );
	if ( 'false' === get_option( 'ask_review_flag' ) ) {

		$image_path = get_template_directory_uri() . '/admin/images/responsive-thumbnail.jpg';
		echo sprintf(
			'<div class="notice notice-warning ask-for-review-notice">
             					<div class="notice-image">
									<img src="%1$s" class="custom-logo" alt="Responsive" itemprop="logo">
								</div>
								<div class="notice-content">
									<div class="notice-heading">
										Hello! Seems like you have used Responsive theme to build this website — Thanks a ton!
									</div>
									Could you please do us a BIG favor and give it a 5-star rating on WordPress? This would boost our motivation and help other users make a comfortable decision while choosing the Responsive theme.<br />
									<div class="responsive-review-notice-container">
										<a href="%2$s" class="responsive-notice-close responsive-review-notice button-primary" target="_blank">
										Ok, you deserve it
										</a>
										<span class="dashicons dashicons-calendar"></span>
										<a href="#" data-repeat-notice-after="60" class="responsive-notice-close responsive-review-notice">
										Nope, maybe later
										</a>
										<span class="dashicons dashicons-smiley"></span>
										<a href="#" class="responsive-notice-close responsive-review-notice">
										I already did
										</a>
									</div>
								</div>
								<div>
									<a href="?is-my-plugin-dismissed=true">Dismiss</a>

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
function my_plugin_notice_dismissed() {
	if ( isset( $_GET['is-my-plugin-dismissed'] ) ) {
		update_option( 'ask_review_flag', 'true' );
	}
}
add_action( 'admin_init', 'my_plugin_notice_dismissed' );
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
 		margin-right: 15px;
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
