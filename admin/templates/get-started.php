<?php
/**
 * View Get Started
 *
 * @package     Responsive
 * @author      CyberChimps
 * @copyright   Copyright (c) 2020, CyberChimps
 * @link        https://www.cyberchimps.com
 * @since       Responsive 4.8.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$slug  = 'responsive-addons-pro';
$state = '';
if ( file_exists( ABSPATH . 'wp-content/plugins/' . $slug . '/' . $slug . '.php' ) ) {
	$state = is_plugin_active( $slug . '/' . $slug . '.php' ) ? 'activated' : 'installed';
} else {
	$state = 'not installed';
}

$nonce = add_query_arg(
	array(
		'action'        => 'activate',
		'plugin'        => rawurlencode( $slug . '/' . $slug . '.php' ),
		'plugin_status' => 'all',
		'paged'         => '1',
		'_wpnonce'      => wp_create_nonce( 'activate-plugin_' . $slug . '/' . $slug . '.php' ),
	),
	network_admin_url( 'plugins.php' )
);

$admin_logo = apply_filters( 'responsive_admin_menu_icon', esc_url( RESPONSIVE_THEME_URI ) . 'admin/images/responsive-logo-colored.jpg' );
$admin_footer_logo = apply_filters( 'responsive_admin_menu_footer_icon', esc_url( RESPONSIVE_THEME_URI . 'admin/images/cyberchimps-logo.png' ));
?>

<div class="responsive-theme-getting-started-page">
	<div class="responsive-theme-getting-started-header bg-white">
		<div class="responsive-theme-brand">
			<img class="responsive-theme-logo" src="<?php echo $admin_logo; ?>" >
			<div class="responsive-theme-version"><?php echo esc_html( RESPONSIVE_THEME_VERSION ); ?></div>
		</div>
		<p class="responsive-theme-brand-desc"><?php esc_html_e( 'Blazing fast, mobile-friendly, fully-customizable WordPress theme.', 'responsive' ); ?></p>
	</div>
	<div class="responsive-theme-tabs-section">
		<div class="responsive-theme-tabs">
			<div class="responsive-theme-tab responsive-theme-home-tab" data-tab="home">
				<p class="responsive-theme-tab-name">Home</p>
			</div>
			<?php
			if ( 'installed' === $state || 'activated' === $state ) {
				?>
				<div class="responsive-theme-tab responsive-theme-settings-tab" data-tab="settings">
					<p class="responsive-theme-tab-name">Settings</p>
				</div>
				<?php
			}
			?>
			<div class="responsive-theme-tab responsive-theme-templates-tab" data-tab="templates">
				<p class="responsive-theme-tab-name">Starter&nbsp;Templates</p>
			</div>
			<div class="responsive-theme-tab responsive-theme-plugins-tab" data-tab="plugins">
				<p class="responsive-theme-tab-name">Useful&nbsp;Plugins</p>
			</div>
			<?php
			if ( ! class_exists( 'Responsive_Addons_Pro' ) ) {
				?>
				<div class="responsive-theme-tab responsive-theme-freevspro-tab" data-tab="freevspro">
					<p class="responsive-theme-tab-name">Free&nbsp;vs&nbsp;Pro</p>
				</div>
				<?php
			}
			?>
			<div class="responsive-theme-tab responsive-theme-help-tab" data-tab="help">
				<p class="responsive-theme-tab-name">Help</p>
			</div>
		</div>
	</div>
	<div class="responsive-theme-tabs-content">
		<div class="responsive-theme-tabs-inner-content">
			<div class="responsive-theme-home-content responsive-theme-tab-content" id="responsive_home">
				<?php require_once RESPONSIVE_THEME_DIR . 'admin/templates/getting-started-home.php'; ?>
			</div>
			<?php
			if ( 'installed' === $state || 'activated' === $state ) {
				?>
				<div class="responsive-theme-settings-content responsive-theme-tab-content" id="responsive_settings">
					<?php require_once RESPONSIVE_THEME_DIR . 'admin/templates/getting-started-settings.php'; ?>
				</div>
				<?php
			}
			?>
			<div class="responsive-theme-templates-content responsive-theme-tab-content" id="responsive_templates">
				<?php require_once RESPONSIVE_THEME_DIR . 'admin/templates/getting-started-rst.php'; ?>
			</div>
			<div class="responsive-theme-plugins-content responsive-theme-tab-content" id="responsive_plugins">
				<?php require_once RESPONSIVE_THEME_DIR . 'admin/templates/getting-started-useful-plugins.php'; ?>
			</div>
			<?php
			if ( ! class_exists( 'Responsive_Addons_Pro' ) ) {
				?>
				<div class="responsive-theme-help-content responsive-theme-tab-content" id="responsive_freevspro">
					<?php require_once RESPONSIVE_THEME_DIR . 'admin/templates/getting-started-free-vs-pro.php'; ?>
				</div>
				<?php
			}
			?>
			<div class="responsive-theme-help-content responsive-theme-tab-content" id="responsive_help">
				<?php require_once RESPONSIVE_THEME_DIR . 'admin/templates/getting-started-help.php'; ?>
			</div>
		</div>
	</div>
	<div class="responsive-theme-footer">
		<div class="responsive-theme-footer-details">
			<div class="responsive-theme-footer-text">
				<p class="responsive-theme-footer-text-line"><?php esc_html_e( 'If you like', 'responsive' ); ?>
					<span class="responsive-theme-footer-brand-name"><?php esc_html_e( 'Responsive', 'responsive' ); ?></span>, <br class="responsive-theme-mobile-line-break"><?php esc_html_e( 'please leave us a', 'responsive' ); ?> 
					<a href="https://wordpress.org/support/theme/responsive/reviews/#new-post" target="_blank" class="responsive-theme-star-rating">
						<img src="<?php echo esc_url( RESPONSIVE_THEME_URI ) . 'admin/images/ph_star-fill.svg'; ?>" alt=""><img src="<?php echo esc_url( RESPONSIVE_THEME_URI ) . 'admin/images/ph_star-fill.svg'; ?>" alt=""><img src="<?php echo esc_url( RESPONSIVE_THEME_URI ) . 'admin/images/ph_star-fill.svg'; ?>" alt=""><img src="<?php echo esc_url( RESPONSIVE_THEME_URI ) . 'admin/images/ph_star-fill.svg'; ?>" alt=""><img src="<?php echo esc_url( RESPONSIVE_THEME_URI ) . 'admin/images/ph_star-fill.svg'; ?>" alt="">
					</a> <?php esc_html_e( 'rating. Thank you!', 'responsive' ); ?>
				</p>
			</div>
			<div class="responsive-theme-hr"></div>
		</div>
		<img class="responsive-theme-cyberchimps-logo" src="<?php echo $admin_footer_logo; ?>" alt="">
	</div>
</div>
