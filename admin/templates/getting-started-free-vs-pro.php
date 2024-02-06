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
							<div class="responsive-theme-freevspro-feature-desc"><?php esc_html_e( 'Fully responsive on devices like mobiles and tablets', 'responsive' ); ?></div></td>
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
							<div class="responsive-theme-freevspro-feature-desc"><?php esc_html_e( 'Advanced settings for Typography, Layouts and Colors', 'responsive' ); ?></div>
						</td>
						<td class="text-center">
							<div class="responsive-theme-freevspro-feature-desc"><?php esc_html_e( 'Limited Options', 'responsive' ); ?></div>
						</td>
						<td class="text-center"><img src="<?php echo esc_url( RESPONSIVE_THEME_URI ) . 'admin/images/tick.svg'; ?>" alt=""></td>
					</tr>
					<tr>
						<td class="responsive-theme-freevspro-features">
							<div class="responsive-theme-freevspro-feature-title mb-2"><?php esc_html_e( 'Mega Menu', 'responsive' ); ?></div>
							<div class="responsive-theme-freevspro-feature-desc"><?php esc_html_e( 'Adds Nav module for building mega menu, & highlight tags', 'responsive' ); ?></div>
						</td>
						<td class="text-center"><img src="<?php echo esc_url( RESPONSIVE_THEME_URI ) . 'admin/images/cross.svg'; ?>" alt=""></td>
						<td class="text-center"><img src="<?php echo esc_url( RESPONSIVE_THEME_URI ) . 'admin/images/tick.svg'; ?>" alt=""></td>
					</tr>
					<tr>
						<td class="responsive-theme-freevspro-features">
							<div class="responsive-theme-freevspro-feature-title mb-2"><?php esc_html_e( 'White Label Feature', 'responsive' ); ?></div>
							<div class="responsive-theme-freevspro-feature-desc"><?php esc_html_e( 'White Label the theme and plugin name', 'responsive' ); ?></div>
						</td>
						<td class="text-center"><img src="<?php echo esc_url( RESPONSIVE_THEME_URI ) . 'admin/images/cross.svg'; ?>" alt=""></td>
						<td class="text-center"><img src="<?php echo esc_url( RESPONSIVE_THEME_URI ) . 'admin/images/tick.svg'; ?>" alt=""></td>
					</tr>
					<tr>
						<td class="responsive-theme-freevspro-features">
							<div class="responsive-theme-freevspro-feature-title mb-2"><?php esc_html_e( 'Lifter LMS Integration', 'responsive' ); ?></div>
							<div class="responsive-theme-freevspro-feature-desc"><?php esc_html_e( 'Advanced customizer settings for Lifter LMS Plugin', 'responsive' ); ?></div>
						</td>
						<td class="text-center"><img src="<?php echo esc_url( RESPONSIVE_THEME_URI ) . 'admin/images/cross.svg'; ?>" alt=""></td>
						<td class="text-center"><img src="<?php echo esc_url( RESPONSIVE_THEME_URI ) . 'admin/images/tick.svg'; ?>" alt=""></td>
					</tr>
					<tr>
						<td class="responsive-theme-freevspro-features">
							<div class="responsive-theme-freevspro-feature-title mb-2"><?php esc_html_e( 'Learn Dash Integration', 'responsive' ); ?></div>
							<div class="responsive-theme-freevspro-feature-desc"><?php esc_html_e( 'Advanced customizer settings for Learn Dash', 'responsive' ); ?></div>
						</td>
						<td class="text-center"><img src="<?php echo esc_url( RESPONSIVE_THEME_URI ) . 'admin/images/cross.svg'; ?>" alt=""></td>
						<td class="text-center"><img src="<?php echo esc_url( RESPONSIVE_THEME_URI ) . 'admin/images/tick.svg'; ?>" alt=""></td>
					</tr>
					<tr>
						<td class="responsive-theme-freevspro-features">
							<div class="responsive-theme-freevspro-feature-title mb-2"><?php esc_html_e( 'Responsive Starter Templates', 'responsive' ); ?></div>
							<div class="responsive-theme-freevspro-feature-desc"><?php esc_html_e( 'Ready-to-use Elementor and WordPress Block Templates', 'responsive' ); ?></div>
						</td>
						<td class="text-center">
							<div class="responsive-theme-freevspro-feature-desc"><?php esc_html_e( 'Free Only', 'responsive' ); ?></div>
						</td>
						<td class="text-center">
							<div class="responsive-theme-freevspro-feature-desc"><?php esc_html_e( '100+ Free & Pro', 'responsive' ); ?></div>
						</td>
					</tr>
					<tr>
						<td class="responsive-theme-freevspro-features">
							<div class="responsive-theme-freevspro-feature-title mb-2"><?php esc_html_e( 'Elementor Widgets', 'responsive' ); ?></div>
							<div class="responsive-theme-freevspro-feature-desc"><?php esc_html_e( 'Access to 50+ Elementor Widgets for free', 'responsive' ); ?></div>
						</td>
						<td class="text-center"><img src="<?php echo esc_url( RESPONSIVE_THEME_URI ) . 'admin/images/cross.svg'; ?>" alt=""></td>
						<td class="text-center"><img src="<?php echo esc_url( RESPONSIVE_THEME_URI ) . 'admin/images/tick.svg'; ?>" alt=""></td>
					</tr>
					<tr>
						<td class="responsive-theme-freevspro-features">
							<div class="responsive-theme-freevspro-feature-title mb-2"><?php esc_html_e( 'Theme Builder', 'responsive' ); ?></div>
							<div class="responsive-theme-freevspro-feature-desc"><?php esc_html_e( 'Access to REA Theme Builder Feature', 'responsive' ); ?></div>
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
				<p class="responsive-theme-freevspro-responsive-pro-title"><?php esc_html_e( 'Do More with Responsive Pro', 'responsive' ); ?></p>
				<div class="row">
					<div class="col-md-10 offset-md-1">
						<p class="responsive-theme-freevspro-responsive-pro-desc mt-3"><?php esc_html_e( 'Get powerful customizer settings in the Responsive Pro plugin, access to Premium Starter Template, and Responsive Elementor addons worth $47 for free. With all the features you get, the product pays for itself!', 'responsive' ); ?></p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 mt-3">
					<?php
					switch ( $state ) {
						case 'not installed':
							?>
							<a href="<?php echo esc_url( 'https://cyberchimps.com/pricing/?utm_source=Responsive_theme&utm_medium=intro_screen&utm_campaign=free-to-pro&utm_term=Upgrade_now_free_vs_pro' ); ?>" target="_blank" class="responsive-theme-upgrade-now-btn text-decoration-none"><?php esc_html_e( 'Upgrade to Pro', 'responsive' ); ?></a>
							<?php
							break;
						case 'installed':
							?>
							<a data-redirect="<?php echo esc_url( admin_url( 'themes.php?page=responsive' ) ); ?>" data-slug="<?php echo esc_attr( $slug ); ?>" class="responsive-theme-activate-plugin activate-now responsive-theme-upgrade-now-btn text-decoration-none mb-4" href="<?php echo esc_url( $nonce ); ?>" aria-label="Activate <?php echo esc_attr( $slug ); ?>"><?php echo esc_html__( 'Activate', 'responsive' ); ?></a>
							<?php
							break;
						case 'activated':
							?>
							<button class="responsive-plugin-activated-button-disabled text-decoration-none mb-4" aria-label="Activated <?php echo esc_attr( $slug ); ?>"><?php echo esc_html__( 'Activated', 'responsive' ); ?></button>
							<?php
							break;
					} // End switch.
					?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
