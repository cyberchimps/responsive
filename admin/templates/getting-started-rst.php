<?php
/**
 * Provide a admin area view for the plugin
 *
 * Getting Started Starter Templates Tab
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
		<div class="col-md-8 offset-md-2 col-12">
			<div class="responsive-theme-rst-content">
				<div class="responsive-theme-text-content text-center">
					<img class="responsive-theme-responsive-logo" src="<?php echo esc_url( RESPONSIVE_THEME_URI ) . 'admin/images/rst.svg'; ?>" class="rounded mx-auto d-block" alt="">
					<div class="responsive-theme-brand-text mt-4">
						<p class="responsive-theme-rst-brand-name"><?php esc_html( 'Responsive Starter Templates' ); ?></p>
						<p class="responsive-theme-rst-brand-desc"><?php esc_html_e( 'Browse 150+ fully-functional ready site templates by installing the free Responsive Plus - Starter Templates plugin. Click the button below to get started.', 'responsive' ); ?></p>
					</div>
					<div class="responsive-theme-rst-button-section">
						<?php echo Responsive_Plugin_Install_Helper::instance()->responsive_install_plugin_button( 'responsive-add-ons', 'rst-templates', 'responsive_add_ons', 'Install & Activate' ); //phpcs:ignore ?>
						<div class="responsive-theme-rst-learn-more">
							<a href="https://wordpress.org/plugins/responsive-add-ons/" target="_blank"><?php esc_html_e( 'Learn More', 'responsive' ); ?></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
