<?php
/**
 * Provide a admin area view for the plugin
 *
 * Getting Started Free vs Pro Tab
 *
 * @link       https://cyberchimps.com/
 * @since      4.8.4
 *
 * @package responsive
 */

?>
<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="container">
	<div class="row">
		<div class="col-md-10 offset-md-1">
			<div class="table-responsive">
			<table class="table responsive-theme-freevspro">
				<thead class="">
					<tr>
						<td><?php esc_html_e( 'Features', 'responsive' ); ?></td>
						<td class="text-center"><?php esc_html_e( 'Free', 'responsive' ); ?></td>
						<td class="text-center"><?php esc_html_e( 'Responsive Pro', 'responsive' ); ?></td>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="responsive-theme-freevspro-features">
							<div class="responsive-theme-freevspro-feature-title mb-2"><?php esc_html_e( 'Mobile Friendly', 'responsive' ); ?></div>
							<div class="responsive-theme-freevspro-feature-desc"><?php esc_html_e( 'Slider, portfolio, pricing tables, WooCommerce widgets etc', 'responsive' ); ?></div></td>
						<td class="text-center"><img src="<?php echo esc_url( RESPONSIVE_THEME_URI ) . 'admin/images/tick.svg'; ?>" alt=""></td>
						<td class="text-center"><img src="<?php echo esc_url( RESPONSIVE_THEME_URI ) . 'admin/images/tick.svg'; ?>" alt=""></td>
					</tr>
					<tr>
						<td class="responsive-theme-freevspro-features">
							<div class="responsive-theme-freevspro-feature-title mb-2"><?php esc_html_e( 'Blazing Fast Speed', 'responsive' ); ?></div>
							<div class="responsive-theme-freevspro-feature-desc"><?php esc_html_e( 'Optimized for speed, loads in under 2 seconds', 'responsive' ); ?></div>
						</td>
						<td class="text-center"><img src="<?php echo esc_url( RESPONSIVE_THEME_URI ) . 'admin/images/tick.svg'; ?>" alt=""></td>
						<td class="text-center"><img src="<?php echo esc_url( RESPONSIVE_THEME_URI ) . 'admin/images/tick.svg'; ?>" alt=""></td>
					</tr>
					<tr>
						<td class="responsive-theme-freevspro-features">
							<div class="responsive-theme-freevspro-feature-title mb-2"><?php esc_html_e( 'Fully Customizable', 'responsive' ); ?></div>
							<div class="responsive-theme-freevspro-feature-desc"><?php esc_html_e( 'Using the customizer options for layout, fonts & colors', 'responsive' ); ?></div>
						</td>
						<td class="text-center">
							<div class="responsive-theme-freevspro-feature-desc"><?php esc_html_e( 'Limited Options', 'responsive' ); ?></div>
						</td>
						<td class="text-center"><img src="<?php echo esc_url( RESPONSIVE_THEME_URI ) . 'admin/images/tick.svg'; ?>" alt=""></td>
					</tr>
					<tr>
						<td class="responsive-theme-freevspro-features">
							<div class="responsive-theme-freevspro-feature-title mb-2"><?php esc_html_e( 'Responsive Starter Templates', 'responsive' ); ?></div>
							<div class="responsive-theme-freevspro-feature-desc"><?php esc_html_e( 'Ready-to-use Elementor and WordPress Block Templates', 'responsive' ); ?></div>
						</td>
						<td class="text-center">
							<div class="responsive-theme-home-links">
								<a href="" target="_blank"><?php esc_html_e( 'Free Only', 'responsive' ); ?></a>
							</div>
						</td>
						<td class="text-center">
							<div class="responsive-theme-home-links">
								<a href="" target="_blank"><?php esc_html_e( '100+ Free & Pro', 'responsive' ); ?></a>
							</div>
						</td>
					</tr>
					<tr>
						<td class="responsive-theme-freevspro-features">
							<div class="responsive-theme-freevspro-feature-title mb-2"><?php esc_html_e( 'Exclusive Widgets', 'responsive' ); ?></div>
							<div class="responsive-theme-freevspro-feature-desc"><?php esc_html_e( 'Slider, portfolio, pricing tables, WooCommerce widgets etc', 'responsive' ); ?></div>
						</td>
						<td class="text-center"><img src="<?php echo esc_url( RESPONSIVE_THEME_URI ) . 'admin/images/cross.svg'; ?>" alt=""></td>
						<td class="text-center"><img src="<?php echo esc_url( RESPONSIVE_THEME_URI ) . 'admin/images/tick.svg'; ?>" alt=""></td>
					</tr>
					<tr>
						<td class="responsive-theme-freevspro-features">
							<div class="responsive-theme-freevspro-feature-title mb-2"><?php esc_html_e( 'Exclusive Content, Deals & Offers', 'responsive' ); ?></div>
							<div class="responsive-theme-freevspro-feature-desc"><?php esc_html_e( 'Get access to exclusive WordPress content, deals & offers', 'responsive' ); ?></div>
						</td>
						<td class="text-center"><img src="<?php echo esc_url( RESPONSIVE_THEME_URI ) . 'admin/images/cross.svg'; ?>" alt=""></td>
						<td class="text-center"><img src="<?php echo esc_url( RESPONSIVE_THEME_URI ) . 'admin/images/tick.svg'; ?>" alt=""></td>
					</tr>
					<tr>
						<td class="responsive-theme-freevspro-features">
							<div class="responsive-theme-freevspro-feature-title mb-2"><?php esc_html_e( 'Private Priority Email Support', 'responsive' ); ?></div>
							<div class="responsive-theme-freevspro-feature-desc"><?php esc_html_e( 'Need help? Just raise a support ticket to get priority email support', 'responsive' ); ?></div>
						</td>
						<td class="text-center"><img src="<?php echo esc_url( RESPONSIVE_THEME_URI ) . 'admin/images/cross.svg'; ?>" alt=""></td>
						<td class="text-center"><img src="<?php echo esc_url( RESPONSIVE_THEME_URI ) . 'admin/images/tick.svg'; ?>" alt=""></td>
					</tr>
				</tbody>
			</table>
			</div>
		</div>
	</div>
	<div class="row mt-4">
		<div class="col-md-10 offset-md-1">
			<div class="responsive-theme-freevspro-responsive-pro text-center">
				<p class="responsive-theme-freevspro-responsive-pro-title"><?php esc_html_e( 'Download Responsive Pro', 'responsive' ); ?></p>
				<div class="row">
					<div class="col-md-8 offset-md-2">
						<p class="responsive-theme-freevspro-responsive-pro-desc mt-3"><?php esc_html_e( 'Lorem ipsum dolor sit amet consectetur. Fermentum faucibus duis enim sit nec ac ante aliquet lacus. Mattis sit nunc elit tempor habitant.', 'responsive' ); ?></p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 mt-3">
						<a href="" target="_blank" class="responsive-theme-upgrade-now-btn text-decoration-none"><?php esc_html_e( 'Upgrade to Pro', 'responsive' ); ?></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
