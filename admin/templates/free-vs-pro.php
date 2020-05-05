<?php
/**
 * Responsive Options
 *
 * @package responsive
 */

?>
<div class="responsive-options-tabs">
	<div id="responsive-options-go-pro" class="tab-content active">
		<div class="features">
			<table class="responsive-features-table" border="1">
				<thead class="responsive-features-heading">
				<tr>
					<th class="header-responsive-features"><?php esc_html_e( 'Features', 'responsive' ); ?></th>
					<th class="header-responsive-features"><?php esc_html_e( 'Free', 'responsive' ); ?></th>
					<th class="header-responsive-features"><?php esc_html_e( 'Pro', 'responsive' ); ?></th>
				</tr>
				</thead>
				<tbody>
				<tr>
					<td class="feature">
						<div class="feature-title"><?php esc_html_e( 'Mobile Friendly', 'responsive' ); ?></div>
						<div class="feature-description"><?php esc_html_e( 'Slider, portfolio, pricing tables, WooCommerce widgets etc', 'responsive' ); ?></div>
					</td>
					<td class="feature-status featureyes"><span class='dashicons-before dashicons-yes'></span></td>
					<td class="feature-status featureyes"><span class='dashicons-before dashicons-yes'></span></td>
				</tr>
				<tr>
					<td class="feature">
						<div class="feature-title"><?php esc_html_e( 'Blazing Fast Speed', 'responsive' ); ?></div>
						<div class="feature-description"><?php esc_html_e( 'Optimized for speed, loads in under 2 seconds', 'responsive' ); ?></div>
					</td>
					<td class="feature-status featureyes"><span class='dashicons-before dashicons-yes'></span></td>
					<td class="feature-status featureyes"><span class='dashicons-before dashicons-yes'></span></td>
				</tr>
				<tr>
					<td class="feature">
						<div class="feature-title"><?php esc_html_e( 'Fully Customizable', 'responsive' ); ?></div>
						<div class="feature-description"><?php esc_html_e( 'Using the customizer options for layout, fonts & colors', 'responsive' ); ?></div>
					</td>
					<td class="feature-status"><?php esc_html_e( 'Limited Options', 'responsive' ); ?></span></td>
					<td class="feature-status featureyes"><span class='dashicons-before dashicons-yes'></span></td>
				</tr>
				<tr>
					<td class="feature">
						<div class="feature-title"><?php esc_html_e( 'Ready-to-use Website Templates', 'responsive' ); ?></div>
						<div class="feature-description"><?php esc_html_e( 'Ready-to-use Elementor page builder and Gutenberg website templates', 'responsive' ); ?></div>
					</td>
					<td class="feature-status"><a href="https://cyberchimps.com/wordpress-themes/free/" target="_blank"><?php esc_html_e( 'Free Only', 'responsive' ); ?></a></td>
					<td class="feature-status"><a href="https://cyberchimps.com/wordpress-themes/" target="_blank"><?php esc_html_e( '40+ Free & Pro', 'responsive' ); ?></a></td>
				</tr>
				<tr>
					<td class="feature">
						<div class="feature-title"><?php esc_html_e( 'Exclusive Widgets', 'responsive' ); ?></div>
						<div class="feature-description"><?php esc_html_e( 'Slider, portfolio, pricing tables, WooCommerce widgets etc', 'responsive' ); ?></div>
					</td>
					<td class="feature-status featureno"><span class='dashicons-before dashicons-no'></span></td>
					<td class="feature-status featureyes"><span class='dashicons-before dashicons-yes'></span></td>
				</tr>
				<tr>
					<td class="feature">
						<div class="feature-title"><?php esc_html_e( 'Exclusive Content, Deals & Offers', 'responsive' ); ?></div>
						<div class="feature-description"><?php esc_html_e( 'Get access to exclusive WordPress content, deals & offers', 'responsive' ); ?></div>
					</td>
					<td class="feature-status featureno"><span class='dashicons-before dashicons-no'></span></td>
					<td class="feature-status featureyes"><span class='dashicons-before dashicons-yes'></span></td>
				</tr>
				<tr>
					<td class="feature">
						<div class="feature-title"><?php esc_html_e( 'Private Priority Email Support', 'responsive' ); ?></div>
						<div class="feature-description"><?php esc_html_e( 'Need help? Just raise a support ticket to get priority email support', 'responsive' ); ?></div>
					</td>
					<td class="feature-status featureno"><span class='dashicons-before dashicons-no'></span></td>
					<td class="feature-status featureyes"><span class='dashicons-before dashicons-yes'></span></td>
				</tr>
				</tbody>
			</table>
		</div>
		<?php if ( ! class_exists( 'Responsive_Addons_Pro' ) ) { ?>
			<div class="go-pro-section">
				<a class="responsive-go-pro-button" href="https://cyberchimps.com/responsive-go-pro/?utm_source=free-to-pro&utm_medium=responsive-theme&utm_campaign=responsive-pro&utm_content=responsive-options-free-vs-pro" target="_blank"><?php esc_html_e( 'Upgrade to Pro', 'responsive' ); ?></a>
			</div>
		<?php } ?>
	</div>
</div>
