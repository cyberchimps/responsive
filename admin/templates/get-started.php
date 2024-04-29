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

if ( ! function_exists( 'check_is_responsive_addons_greater' ) ) {
	/**
	 * Check if Responsive Addons is installed.
	 */
	function check_is_responsive_addons_greater() {
		if ( is_plugin_active( 'responsive-add-ons/responsive-add-ons.php' ) ) {
			$raddons_version    = get_plugin_data( WP_PLUGIN_DIR . '/responsive-add-ons/responsive-add-ons.php' )['Version'];
			$is_raddons_greater = false;
			if ( version_compare( $raddons_version, '3.0.0', '>=' ) ) {
				$is_raddons_greater = true;
			}
			return $is_raddons_greater;
		}
		return false;
	}
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

$admin_logo        = apply_filters( 'responsive_admin_menu_icon', esc_url( RESPONSIVE_THEME_URI ) . 'admin/images/responsive-logo-colored.jpg' );
$admin_footer_logo = apply_filters( 'responsive_admin_menu_footer_icon', esc_url( RESPONSIVE_THEME_URI . 'admin/images/cyberchimps-logo.png' ) );
?>

<div class="responsive-theme-getting-started-page">
	<div class="responsive-theme-getting-started-header bg-white">
		<div class="responsive-theme-brand">
			<img class="responsive-theme-logo" src="<?php echo esc_url( $admin_logo ); ?>" >
			<div class="responsive-theme-version"><?php echo esc_html( RESPONSIVE_THEME_VERSION ); ?></div>
		</div>
		<p class="responsive-theme-brand-desc"><?php esc_html_e( 'Blazing fast, mobile-friendly, fully-customizable WordPress theme.', 'responsive' ); ?></p>
	</div>
	<div class="responsive-theme-tabs-section">
		<div class="responsive-theme-tabs">
			<div class="responsive-theme-tab responsive-theme-home-tab" data-tab="home">
				<p class="responsive-theme-tab-name"><?php esc_html_e( 'Home', 'responsive' ); ?></p>
			</div>
			<?php
			if ( 'activated' === $state ) {
				?>
				<div class="responsive-theme-tab responsive-theme-settings-tab" data-tab="settings">
					<p class="responsive-theme-tab-name"><?php esc_html_e( 'Settings', 'responsive' ); ?></p>
				</div>
				<?php
			}
			?>
			<?php do_action( 'responsive_addons_getting_started_settings_tab' ); ?>
			<?php if ( ! is_plugin_active( 'responsive-add-ons/responsive-add-ons.php' ) ) : ?>
				<div class="responsive-theme-tab responsive-theme-templates-tab" data-tab="templates">
					<p class="responsive-theme-tab-name"><?php esc_html_e( 'Starter&nbsp;Templates', 'responsive' ); ?></p>
				</div>
			<?php endif; ?>
				<div class="responsive-theme-tab responsive-theme-blocks-tab" data-tab="blocks">
					<p class="responsive-theme-tab-name"><?php esc_html_e( 'Blocks', 'responsive' ); ?></p>
				</div>
				<div class="responsive-theme-tab responsive-theme-rae-tab" data-tab="rae">
					<p class="responsive-theme-tab-name"><?php esc_html_e( 'Addons&nbsp;for&nbsp;Elementor', 'responsive' ); ?></p>
				</div>
			<div class="responsive-theme-tab responsive-theme-help-tab" data-tab="help">
				<p class="responsive-theme-tab-name"><?php esc_html_e( 'Help', 'responsive' ); ?></p>
			</div>
		</div>
	</div>
	<div class="responsive-theme-tabs-content">
		<div class="responsive-theme-tabs-inner-content">
			<div class="responsive-theme-home-content responsive-theme-tab-content" id="responsive_home">
				<?php require_once RESPONSIVE_THEME_DIR . 'admin/templates/getting-started-home.php'; ?>
			</div>
			<?php
			if ( 'activated' === $state ) {
				?>
				<div class="responsive-theme-settings-content responsive-theme-tab-content" id="responsive_settings">
					<?php require_once RESPONSIVE_THEME_DIR . 'admin/templates/getting-started-settings.php'; ?>
				</div>
				<?php
			}
			?>
			<?php do_action( 'responsive_addons_getting_started_settings_tab_content' ); ?>
			<?php if ( ! is_plugin_active( 'responsive-add-ons/responsive-add-ons.php' ) ) : ?>
				<div class="responsive-theme-templates-content responsive-theme-tab-content" id="responsive_templates">
					<?php require_once RESPONSIVE_THEME_DIR . 'admin/templates/getting-started-rst.php'; ?>
				</div>
			<?php endif; ?>
				<div class="responsive-theme-templates-content responsive-theme-tab-content" id="responsive_blocks">
					<?php require_once RESPONSIVE_THEME_DIR . 'admin/templates/getting-started-blocks.php'; ?>
				</div>
				<div class="responsive-theme-templates-content responsive-theme-tab-content" id="responsive_rae">
					<?php require_once RESPONSIVE_THEME_DIR . 'admin/templates/getting-started-rae.php'; ?>
				</div>
			<div class="responsive-theme-help-content responsive-theme-tab-content" id="responsive_help">
				<?php require_once RESPONSIVE_THEME_DIR . 'admin/templates/getting-started-help.php'; ?>
			</div>
		</div>
	</div>
	<div class="responsive-theme-footer">
		<div class="responsive-theme-footer-details">
			<div class="responsive-theme-footer-text">
				<p class="responsive-theme-footer-text-line"><?php esc_html_e( 'If you like', 'responsive' ); ?>
					<span class="responsive-theme-footer-brand-name"><?php esc_html_e( 'Responsive Theme', 'responsive' ); ?></span>, <br class="responsive-theme-mobile-line-break"><?php esc_html_e( 'please leave us a', 'responsive' ); ?> 
					<a href="https://wordpress.org/support/theme/responsive/reviews/#new-post" target="_blank" class="responsive-theme-star-rating">
						<img src="<?php echo esc_url( RESPONSIVE_THEME_URI ) . 'admin/images/ph_star-fill.svg'; ?>" alt=""><img src="<?php echo esc_url( RESPONSIVE_THEME_URI ) . 'admin/images/ph_star-fill.svg'; ?>" alt=""><img src="<?php echo esc_url( RESPONSIVE_THEME_URI ) . 'admin/images/ph_star-fill.svg'; ?>" alt=""><img src="<?php echo esc_url( RESPONSIVE_THEME_URI ) . 'admin/images/ph_star-fill.svg'; ?>" alt=""><img src="<?php echo esc_url( RESPONSIVE_THEME_URI ) . 'admin/images/ph_star-fill.svg'; ?>" alt="">
					</a> <?php esc_html_e( 'rating. Thank you!', 'responsive' ); ?>
				</p>
			</div>
			<div class="responsive-theme-hr"></div>
		</div>
		<img class="responsive-theme-cyberchimps-logo" src="<?php echo esc_url( $admin_footer_logo ); ?>" alt="">
	</div>
</div>
