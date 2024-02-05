<?php
/**
 * Provide a admin area view for the plugin
 *
 * Getting Started Useful Plugins Tab
 *
 * @link       https://cyberchimps.com/
 * @since      4.8.4
 *
 * @package responsive
 */

?>
<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<?php

	$useful_plugins = array(
		array(
			'tag'    => __( 'free', 'responsive' ),
			'title'  => 'Responsive Starter Templates',
			'desc'   => __( '150+ Ready to Import Designer-Made Website Starter Templates.', 'responsive' ),
			'button' => Responsive_Plugin_Install_Helper::instance()->responsive_install_plugin_button( 'responsive-add-ons', 'rst-plugins', 'responsive_add_ons' ),
			'logo'   => 'rst',
		),
		array(
			'tag'    => __( 'free', 'responsive' ),
			'title'  => 'Responsive Blocks Library',
			'desc'   => __( '50+ Blocks to Enhance Your WordPress Block Editor Experience.', 'responsive' ),
			'button' => Responsive_Plugin_Install_Helper::instance()->responsive_install_plugin_button( 'responsive-block-editor-addons', 'rbl-plugins', 'responsive_block_editor_addons' ),
			'logo'   => 'responsive_blocks',
		),
		array(
			'tag'    => __( 'pro', 'responsive' ),
			'title'  => 'Responsive Elementor Addons',
			'desc'   => __( 'Premium Elementor Add-on Plugin that Comes Bundled with Responsive Pro.', 'responsive' ),
			'button' => '<div class="responsive-theme-learn-more-btn" style="padding: 8px 0 5px;"><a class="button" href="https://cyberchimps.com/elementor-widgets/home/" target="_blank">Learn More</a></div>',
			'logo'   => 'rea',
		),
		array(
			'tag'    => __( 'free', 'responsive' ),
			'title'  => 'WP Legal Pages',
			'desc'   => __( 'Free Plugin to Create Privacy Policy Pages for Your Website.', 'responsive' ),
			'button' => Responsive_Plugin_Install_Helper::instance()->responsive_install_plugin_button( 'wplegalpages', 'wplegalpages-plugins', 'getting-started' ),
			'logo'   => 'wp_legal_pages',
		),
		array(
			'tag'    => __( 'free', 'responsive' ),
			'title'  => 'GDPR Cookie Consent',
			'desc'   => __( 'Free Plugin for adding cookie consent & CCPA\'s opt-out regulations.', 'responsive' ),
			'button' => Responsive_Plugin_Install_Helper::instance()->responsive_install_plugin_button( 'gdpr-cookie-consent', 'gdpr-plugins', 'gdpr-cookie-consent' ),
			'logo'   => 'gdpr',
		),
	);

	?>

<div class="container">
	<div class="row gy-4">
		<?php
		foreach ( $useful_plugins as $useful_plugin ) {
			?>
		<div class="col-xl-4 col-lg-6 col-md-6">
			<div class="responsive-theme-feature-cards">
				<div class="responsive-theme-feature-cards-content">
					<img src="<?php echo esc_url( RESPONSIVE_THEME_URI ) . 'admin/images/' . esc_attr( $useful_plugin['logo'] ) . '.svg'; ?>" alt="<?php echo esc_attr( $useful_plugin['logo'] ); ?>">
					<span class="responsive-theme-feature-card responsive-theme-feature-card-useful-plugin-section responsive-theme-feature-card-<?php echo esc_attr( $useful_plugin['tag'] ); ?>"><span><?php echo esc_html( $useful_plugin['tag'] ); ?></span></span>
					<div class="responsive-theme-feature-card-title mt-2 mb-2"><?php echo esc_html( $useful_plugin['title'] ); ?></div>
					<div class="responsive-theme-feature-card-desc"><?php echo esc_html( $useful_plugin['desc'] ); ?></div>
					<?php echo wp_kses_post( $useful_plugin['button'] ); ?>
				</div>
			</div>
		</div>
			<?php
		}
		?>
	</div>
</div>
