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
		'desc'  => __( 'Search for articles and documents created to help you use Cyberchimps products.', 'responsive' ),
		'icon'  => 'getting-started-help-documentation',
		'link'  => 'https://cyberchimps.com/docs/',
	),
	array(
		'title' => __( 'Video Tutorials', 'responsive' ),
		'desc'  => __( 'Our short and easy-to-follow video tutorials help to set up and use our products like an expert in no time.', 'responsive' ),
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
		'content' => __( 'As part of our development, we are actively working on it. Free updates will be provided to you every time we improve, add new features, or fix bugs in the plugin.', 'responsive' ),
	),
	array(
		'title'   => __( 'What is included in Responsive Pro bundle?', 'responsive' ),
		'content' => __( 'Responsive Pro bundle includes access to 100+ premium starter website templates & priority customer care support.', 'responsive' ),
	),
	array(
		'title'   => __( 'What’s your refund policy?', 'responsive' ),
		'content' => __( 'We’re 100% sure you’ll love our products. But we also understand it’s not for everyone. If for some reason you don’t want to continue our products, <a href="https://cyberchimps.com/my-account/orders/" target="_blank">get in touch</a> with us within 30 days of your purchase. We’ll gladly refund your order amount.', 'responsive' ),
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

<div class="responsive-theme-main-settings-section d-flex">
	<div class="row">
		<div class="responsive-theme-settings-tab-selection col-md-2">
			<div id="responsive-theme-help-theme-tab" class="mb-4 responsive-theme-help-tab-button fw-medium responsive-theme-help-flex-display responsive-theme-help-settings-active-tab">
				<div class="responsive-theme-help-setting-icon-wrapper d-flex justify-content-center">
					<svg width="16" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M8 6.14252C7.43486 6.14252 6.88241 6.3101 6.41252 6.62408C5.94262 6.93805 5.57638 7.38431 5.36012 7.90643C5.14385 8.42855 5.08726 9.00308 5.19751 9.55736C5.30777 10.1116 5.57991 10.6208 5.97952 11.0204C6.37913 11.42 6.88827 11.6921 7.44255 11.8024C7.99683 11.9126 8.57136 11.8561 9.09348 11.6398C9.6156 11.4235 10.0619 11.0573 10.3758 10.5874C10.6898 10.1175 10.8574 9.56505 10.8574 8.99991C10.8551 8.24278 10.5534 7.5173 10.018 6.98193C9.48261 6.44655 8.75713 6.14478 8 6.14252ZM14.1691 8.99991C14.1676 9.2669 14.148 9.53349 14.1105 9.79784L15.8496 11.1594C15.9254 11.2219 15.9764 11.3094 15.9936 11.4061C16.0108 11.5028 15.9931 11.6025 15.9435 11.6873L14.2984 14.5275C14.2484 14.6116 14.1703 14.6754 14.078 14.7076C13.9856 14.7398 13.8848 14.7384 13.7934 14.7036L11.7485 13.8821C11.3227 14.21 10.8568 14.4821 10.362 14.6918L10.0562 16.8627C10.0391 16.96 9.98879 17.0483 9.9138 17.1125C9.83882 17.1767 9.74386 17.2129 9.64514 17.2149H6.35486C6.25794 17.213 6.16452 17.1783 6.08985 17.1165C6.01519 17.0547 5.96368 16.9694 5.94375 16.8745L5.63801 14.7036C5.14185 14.4963 4.67555 14.2238 4.25146 13.8932L2.20664 14.7147C2.11524 14.7495 2.01449 14.7509 1.92212 14.7188C1.82975 14.6867 1.75166 14.623 1.7016 14.539L0.0564545 11.6991C0.00693511 11.6142 -0.0108054 11.5146 0.00640307 11.4179C0.0236116 11.3211 0.0746478 11.2337 0.150391 11.1712L1.88947 9.80962C1.85238 9.54128 1.83281 9.2708 1.83089 8.99991C1.83238 8.73292 1.85195 8.46633 1.88947 8.20198L0.150391 6.84044C0.0746478 6.77789 0.0236116 6.69046 0.00640307 6.59375C-0.0108054 6.49704 0.00693511 6.39737 0.0564545 6.31253L1.7016 3.47229C1.75161 3.38821 1.82967 3.32446 1.92204 3.29225C2.01442 3.26004 2.1152 3.26144 2.20664 3.2962L4.25146 4.1177C4.67725 3.78982 5.14321 3.51771 5.63801 3.30799L5.94375 1.13709C5.96086 1.03984 6.01121 0.951564 6.0862 0.88733C6.16118 0.823095 6.25614 0.786894 6.35486 0.784912H9.64514C9.74206 0.786799 9.83548 0.821484 9.91014 0.883305C9.98481 0.945127 10.0363 1.03043 10.0562 1.1253L10.362 3.2962C10.8588 3.50335 11.3257 3.7759 11.7503 4.10663L13.7934 3.28513C13.8848 3.25034 13.9855 3.24888 14.0779 3.28102C14.1703 3.31316 14.2483 3.37684 14.2984 3.46086L15.9435 6.3011C15.9931 6.38594 16.0108 6.48561 15.9936 6.58232C15.9764 6.67903 15.9254 6.76647 15.8496 6.82901L14.1105 8.19055C14.1476 8.45878 14.1672 8.72914 14.1691 8.99991Z" fill="#A8A8A8" class="responsive-theme-help-setting-icon-active" />
					</svg>
				</div>
				<p class="responsive-theme-help-margin-zero"><?php esc_html_e( 'Theme', 'responsive' ); ?></p>
			</div>
			<div id="responsive-theme-help-ticket-tab" class="mb-4 responsive-theme-help-tab-button fw-medium responsive-theme-help-flex-display">
				<div class="responsive-theme-help-setting-icon-wrapper d-flex justify-content-center">
					<svg width="10" height="16" viewBox="0 0 10 16" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M10 7.2V16H7.35833C7.18616 15.5316 6.86688 15.1259 6.4445 14.839C6.02212 14.5521 5.51743 14.398 5 14.398C4.48257 14.398 3.97788 14.5521 3.5555 14.839C3.13312 15.1259 2.81383 15.5316 2.64167 16H0V7.2H3.33333C3.55435 7.2 3.76631 7.11571 3.92259 6.96569C4.07887 6.81566 4.16667 6.61217 4.16667 6.4C4.16667 6.18783 4.07887 5.98434 3.92259 5.83431C3.76631 5.68429 3.55435 5.6 3.33333 5.6H0V0H2.64167C2.81383 0.468426 3.13312 0.874053 3.5555 1.16097C3.97788 1.44788 4.48257 1.60196 5 1.60196C5.51743 1.60196 6.02212 1.44788 6.4445 1.16097C6.86688 0.874053 7.18616 0.468426 7.35833 0L10 0V5.6H6.66667C6.44565 5.6 6.23369 5.68429 6.07741 5.83431C5.92113 5.98434 5.83333 6.18783 5.83333 6.4C5.83333 6.61217 5.92113 6.81566 6.07741 6.96569C6.23369 7.11571 6.44565 7.2 6.66667 7.2H10Z" fill="#A8A8A8" />
					</svg>
				</div>
				<p class="responsive-theme-help-margin-zero"><?php esc_html_e( 'Open a Ticket', 'responsive' ); ?></p>
			</div>
		</div>
		<div class="responsive-theme-help-settings col-md-9 responsive-theme-help-setting-border-left">
			<div id="responsive-theme-help-theme-settings" class="responsive-theme-theme-settings-section responsive-theme-help-sections">
				<div class="responsive-theme-inner-settings responsive-theme-help-theme-section">
					<p class="text-center fw-semibold responsive-theme-help-support-title"><?php esc_html_e( 'Support', 'responsive' ); ?></p>
					<p class="text-center mb-0 responsive-theme-help-support-desc"><?php esc_html_e( 'Got a question while using the Responsive theme?', 'responsive' ); ?></p>
					<p class="text-center responsive-theme-help-support-desc mb-5"><?php esc_html_e( 'Check the docs and videos to resolve issues.', 'responsive' ); ?></p>
					<div class="text-center fitvidsignore">
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
				</div>
			</div>
			<div id="responsive-theme-help-ticket-settings" class="responsive-theme-ticket-settings-section responsive-theme-help-sections">
				<div class="responsive-theme-inner-settings responsive-theme-help-ticket-section">
					<p class="text-center fw-semibold responsive-theme-help-ticket-support-title"><?php esc_html_e( 'Support', 'responsive' ); ?></p>
					<p class="text-center mb-0 responsive-theme-help-ticket-support-desc"><?php esc_html_e( 'Got a question or need some help with our theme and Plugins?', 'responsive' ); ?></p>
					<p class="text-center responsive-theme-help-ticket-support-desc mb-5"><?php esc_html_e( 'We are here to help and guide you.', 'responsive' ); ?></p>
					<div class="responsive-theme-help-card-section">
						<div class="row">
							<div class="col-md-10 offset-1">
								<div class="row">
									<?php
									for ( $i = 0; $i < 2; $i++ ) {
										?>
										<div class="col-md-6 gy-3">
											<a href="<?php echo esc_url( $help_card[ $i ]['link'] ); ?>" target="_blank" class="card text-decoration-none responsive-theme-ticket-card-body h-100">
												<div class="card-body" style="margin-top: 15px;">
													<div class="text-center">
														<div class="responsive-theme-help-card-icon-section">
															<div class="responsive-theme-help-card-icon-wrapper">
																<img src="<?php echo esc_url( RESPONSIVE_THEME_URI ) . 'admin/images/' . esc_attr( $help_card[ $i ]['icon'] ) . '.svg'; ?>" alt="<?php echo esc_attr( $help_card[ $i ]['icon'] ); ?>">
															</div>
														</div>
														<p class="fw-semibold responsive-theme-help-card-title"><?php echo esc_html( $help_card[ $i ]['title'] ); ?></p>
														<p class="fw-normal mb-0 responsive-theme-help-card-desc"><?php echo esc_html( $help_card[ $i ]['desc'] ); ?></p>
													</div>
												</div>
											</a>
										</div>
										<?php
									}
									?>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<p class="fw-semibold text-center responsive-theme-help-faq-title"><?php esc_html_e( 'Frequently Asked Questions', 'responsive' ); ?></p>
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

					<div class="row">
						<div class="col-md-10 offset-md-1 text-center">
							<div class="responsive-theme-help-open-ticket-section-box rounded">
								<p class="responsive-theme-help-open-ticket-title"><?php esc_html_e( 'Still Have Questions?', 'responsive' ); ?></p>
								<a href="<?php echo esc_url( 'https://cyberchimps.com/open-a-ticket/' ); ?>" target="_blank" class="btn responsive-theme-help-open-ticket-button"> <?php esc_html_e( 'Open a Ticket', 'responsive' ); ?></a>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
