<?php
/**
 * Provide a admin area view for the plugin
 *
 * Getting Started Help Tab
 *
 * @link       https://cyberchimps.com/
 * @since      4.8.8
 *
 * @package responsive
 */

?>
<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<?php

$help_card = array(
	array(
		'title' => __( 'Documentation', 'responsive' ),
		'desc'  => __( 'Search for articles and documents created to help you use Responsive plugins.', 'responsive' ),
		'icon'  => 'getting-started-help-documentation',
		'link'  => 'https://cyberchimps.com/docs/',
	),
	array(
		'title' => __( 'Video Tutorials', 'responsive' ),
		'desc'  => __( 'Our short and easy-to-follow video tutorials help to set up and use the theme like a pro in no time.', 'responsive' ),
		'icon'  => 'getting-started-help-video',
		'link'  => 'https://www.youtube.com/playlist?list=PLXTwxw3ZJwPSKbf3-vo7sMBkXr9cakAPT',
	),
	array(
		'title' => __( 'Support Center', 'responsive' ),
		'desc'  => __( 'Our experienced support staff is ready to resolve all your issues anytime.', 'responsive' ),
		'icon'  => 'getting-started-help-support',
		'link'  => 'https://wordpress.org/support/theme/responsive/',
	),
	array(
		'title' => __( 'Request a Feature', 'responsive' ),
		'desc'  => __( 'Make headers flexible by changing layouts, customizing the header elements.', 'responsive' ),
		'icon'  => 'getting-started-help-feature',
		'link'  => 'https://cyberchimps.com/contact/',
	),

);

$accordions = array(
	array(
		'title'   => __( 'How do I get updates?', 'responsive' ),
		'content' => __( 'You will get notification automatically in your WordPress backend whenever an update is available. You can update plugin within a click.', 'responsive' ),
	),
	array(
		'title'   => __( 'Will you add more ready sites in the library?', 'responsive' ),
		'content' => __( 'Definitely. We keep adding new website templates every month and keep updating the old ones to match the design trends.', 'responsive' ),
	),
	array(
		'title'   => __( 'What can I expect in updates?', 'responsive' ),
		'content' => __( 'As part of our Responsive plugin development, we are actively working on it. Free updates will be provided to you every time we improve, add new features, or fix bugs in the plugin.', 'responsive' ),
	),
	array(
		'title'   => __( 'What is included in Responsive Pro bundle?', 'responsive' ),
		'content' => __( 'Responsive Pro bundle includes the Pro plugin that adds more features to the Responsive theme. It also includes access to 100+ starter website templates & Responsive Elementor Addons with 50+ Elementor widgets.', 'responsive' ),
	),
	array(
		'title'   => __( 'What’s your refund policy?', 'responsive' ),
		'content' => __( 'We’re 100% sure you’ll love Responsive. But we also understand it’s not for everyone. If for some reason you don’t want to continue using Responsive, <a href="https://cyberchimps.com/my-account/orders/" target="_blank">get in touch</a> with us within 30 days of your purchase. We’ll gladly refund your order amount.', 'responsive' ),
	),
	array(
		'title'   => __( 'Is it necessary to renew the license every year?', 'responsive' ),
		'content' => __( 'No. Annual license fees help us provide you with regular products updates and professional, one-on-one support. If you do not need either, you can choose not to renew your license.', 'responsive' ),
	),
	array(
		'title'   => __( 'What kind of support do you offer?', 'responsive' ),
		'content' => __( 'We offer professional, premium support to our customers through ticketing system.', 'responsive' ),
	),
	array(
		'title'   => __( 'Will my website continue to work if I don’t renew?', 'responsive' ),
		'content' => __( 'Yes. Your website will continue to work even if you do not renew your annual license.', 'responsive' ),
	),
);

?>

<div class="conatiner">
	<div class="row">
		<div class="col-md-8 offset-md-2">
			<p class="text-center fw-semibold responsive-theme-help-support-title"><?php esc_html_e( 'Support', 'responsive' ); ?></p>
			<p class="text-center mb-0 responsive-theme-help-support-desc"><?php esc_html_e( 'Got a question or need some help with our theme and Plugins?', 'responsive' ); ?></p>
			<p class="text-center responsive-theme-help-support-desc mb-5"><?php esc_html_e( 'We are here to help and guide you.', 'responsive' ); ?></p>
			<div class="text-center">
				<iframe width="100%" height="440" src="https://www.youtube.com/embed/ehKE0nj-hxo?si=_VdA-dX9msRaDbIY" title="<?php esc_attr_e( 'How to install and activate Responsive WordPress Theme', 'responsive' ); ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
			</div>
			<div class="responsive-theme-help-card-section">
				<div class="row">
					<?php
					foreach ( $help_card as $card ) {
						?>
					<div class="col-md-6 gy-3">
						<a href="<?php echo esc_url( $card['link'] ); ?>" target="_blank" class="card text-decoration-none h-100">
							<div class="card-body" style="margin-top: 15px;">
								<div class="text-center">
									<div class="responsive-theme-help-card-icon-section">
										<div class="responsive-theme-help-card-icon-wrapper">
											<img src="<?php echo esc_url( RESPONSIVE_THEME_URI ) . 'admin/images/' . esc_attr( $card['icon'] ) . '.svg'; ?>" alt="<?php echo esc_attr( $card['icon'] ); ?>">
										</div>
									</div>
									<p class="fw-semibold responsive-theme-help-card-title"><?php echo esc_html( $card['title'] ); ?></p>
									<p class="fw-normal mb-0 responsive-theme-help-card-desc"><?php echo esc_html( $card['desc'] ); ?></p>
								</div>
							</div>
						</a>
					</div>
						<?php
					}
					?>
				</div>
			</div>
			<div class="row mt-5">
				<div class="col-md-12">
					<p class="fw-normal responsive-theme-help-ticket-text"><?php esc_html_e( 'Still Have Questions?', 'responsive' ); ?></p>
					<a href="<?php echo esc_url( 'https://cyberchimps.com/open-a-ticket/' ); ?>" target="_blank" class="button button-secondary responsive-theme-help-ticket-btn"><?php esc_html_e( 'Open a Ticket', 'responsive' ); ?><img src="<?php echo esc_url( RESPONSIVE_THEME_URI ) . 'admin/images/getting-started-help-arrow.svg'; ?>" alt="getting-started-help-arrow"></a>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<p class="fw-semibold text-center responsive-theme-help-faq-title"><?php esc_html_e( 'Frequently Asked Questions', 'responsive' ); ?></p>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-10 offset-md-1">
			<div class="responsive-theme-help-faq-section">
				<div class="accordion" id="resp-faq-accordion">
					<div class="row">
					<?php
					foreach ( $accordions as $index => $accordion ) {
						?>
						<div class="col-md-6 gy-3">
							<div class="accordion-item">
								<h2 class="accordion-header">
								<button class="fw-semibold accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#resp-help-accordion-<?php echo esc_attr( $index + 1 ); ?>" aria-expanded="true" aria-controls="resp-help-accordion-<?php echo esc_attr( $index + 1 ); ?>">
								<?php echo esc_html( $accordion['title'] ); ?>
								</button>
								</h2>
								<div id="resp-help-accordion-<?php echo esc_attr( $index + 1 ); ?>" class="accordion-collapse collapse" data-bs-parent="#resp-faq-accordion">
									<div class="accordion-body responsive-help-accordion-body">
									<?php echo wp_kses_post( $accordion['content'] ); ?>
									</div>
								</div>
							</div>
						</div>
						<?php
					}
					?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
