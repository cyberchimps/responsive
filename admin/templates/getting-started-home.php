<?php
/**
 * Provide a admin area view for the plugin
 *
 * Getting Started Home Tab
 *
 * @link       https://cyberchimps.com/
 * @since      4.8.4
 *
 * @package responsive
 */

?>
<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<?php

	$home_settings = array(
		array(
			'label' => __( 'Change Site Layout', 'responsive' ),
			'icon'  => 'icon_welcome_widgets_menus_.svg',
			'link'  => admin_url( 'customize.php?autofocus[section]=responsive_layout' ),
		),
		array(
			'label' => __( 'Customize fonts/typography', 'responsive' ),
			'icon'  => 'icon_editor_textcolor_.svg',
			'link'  => admin_url( 'customize.php?autofocus[section]=responsive_typography' ),
		),
		array(
			'label' => __( 'Upload logo & site icon', 'responsive' ),
			'icon'  => 'icon_format_image_.svg',
			'link'  => admin_url( 'customize.php?autofocus[section]=title_tagline' ),
		),
		array(
			'label' => __( 'Add/edit navigation menu', 'responsive' ),
			'icon'  => 'icon_menu_alt_.svg',
			'link'  => admin_url( 'customize.php?autofocus[panel]=nav_menus' ),
		),
		array(
			'label' => __( 'Customize header options', 'responsive' ),
			'icon'  => 'icon_table_row_after_.svg',
			'link'  => admin_url( 'customize.php?autofocus[panel]=responsive_header' ),
		),
		array(
			'label' => __( 'Customize footer options', 'responsive' ),
			'icon'  => 'icon_table_row_after_.svg',
			'link'  => admin_url( 'customize.php?autofocus[panel]=responsive_footer' ),
		),
		array(
			'label' => __( 'Update blog layout', 'responsive' ),
			'icon'  => 'icon_welcome_write_blog_.svg',
			'link'  => admin_url( 'customize.php?autofocus[section]=responsive_blog_layout' ),
		),
		array(
			'label' => __( 'Update page layout', 'responsive' ),
			'icon'  => 'icon_text_page_.svg',
			'link'  => admin_url( 'customize.php?autofocus[section]=responsive_page_content' ),
		),
	);

	$upgrade_to_pro = array(
		array(
			'tag'   => 'pro',
			'title' => __( 'White Label', 'responsive' ),
			'desc'  => __( 'White Label the theme name & settings with the Pro Plugin.', 'responsive' ),
		),
		array(
			'tag'   => 'pro',
			'title' => __( 'Starter Templates', 'responsive' ),
			'desc'  => __( 'Unlock the library of 100+ Premium Starter Templates.', 'responsive' ),
		),
		array(
			'tag'   => 'pro',
			'title' => __( 'Premium Support', 'responsive' ),
			'desc'  => __( 'Get priority support responses for any issues within 24 hours.', 'responsive' ),
		),
		array(
			'tag'   => 'pro',
			'title' => __( 'Pro Customizer Options', 'responsive' ),
			'desc'  => __( 'Unlock Premium Customizer Settings with the Responsive Pro Plugin.', 'responsive' ),
		),
		array(
			'tag'   => 'rea',
			'title' => __( '50+ Elementor Widgets', 'responsive' ),
			'desc'  => __( 'Get Free Access to the Responsive Elementor Addons Plugin worth $47/year.', 'responsive' ),
		),
		array(
			'tag'   => 'rea',
			'title' => __( 'Elementor Theme Builder', 'responsive' ),
			'desc'  => __( 'REA Theme Builder lets you design & customize every aspect of your website.', 'responsive' ),
		),
	);

	$useful_plugins = array(
		array(
			'tag'    => __( 'free', 'responsive' ),
			'title'  => 'Responsive Starter Templates',
			'desc'   => __( '150+ Ready to Import Designer-Made Website Starter Templates.', 'responsive' ),
			'button' => Responsive_Plugin_Install_Helper::instance()->responsive_install_plugin_button( 'responsive-add-ons', 'rst', 'responsive-add-ons' ),
		),
		array(
			'tag'    => __( 'free', 'responsive' ),
			'title'  => 'Responsive Blocks Library',
			'desc'   => __( '50+ Blocks to Enhance Your WordPress Block Editor Experience.', 'responsive' ),
			'button' => Responsive_Plugin_Install_Helper::instance()->responsive_install_plugin_button( 'responsive-block-editor-addons', 'rbl', 'responsive_block_editor_addons' ),
		),
		array(
			'tag'    => __( 'pro', 'responsive' ),
			'title'  => 'Responsive Elementor Addons',
			'desc'   => __( 'Premium Elementor Add-on Plugin that Comes Bundled with Responsive Pro.', 'responsive' ),
			'button' => '<div class="responsive-theme-learn-more-btn" style="padding: 8px 0 5px;"><a class="button" href="https://cyberchimps.com/elementor-widgets/home/" target="_blank">Learn More</a></div>',
		),
		array(
			'tag'    => __( 'free', 'responsive' ),
			'title'  => 'WP Legal Pages',
			'desc'   => __( 'Free Plugin to Create Privacy Policy Pages for Your Website.', 'responsive' ),
			'button' => Responsive_Plugin_Install_Helper::instance()->responsive_install_plugin_button( 'wplegalpages', 'wplegalpages', 'getting-started' ),
		),
	);

	?>

<div class="container">
	<div class="row">
		<div class="col-lg-8 col-md-7">
			<div class="row">
				<div class="col-md-12">
					<p class="responsive-theme-home-settings-text fw-bolder"><?php esc_html_e( 'Customizer Settings', 'responsive' ); ?></p>
				</div>
			</div>
			<div class="row">
				<?php
				foreach ( $home_settings as $home_setting ) {
					?>
				<div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
					<a class="text-decoration-none shadow-none" href="<?php echo esc_attr( $home_setting['link'] ); ?>">
						<div class="responsive-theme-home-setting">
							<div class="responsive-theme-home-setting-button">
								<img src="<?php echo esc_url( RESPONSIVE_THEME_URI ) . 'admin/images/' . esc_attr( $home_setting['icon'] ); ?>" alt="">
								<span class="responsive-theme-home-setting-button-label"><?php echo esc_attr( $home_setting['label'] ); ?></span>
							</div>
							<div class="responsive-theme-home-setting-arrow">
								<img src="<?php echo esc_url( RESPONSIVE_THEME_URI ) . 'admin/images/trending_flat.svg'; ?>" alt="">
							</div>
						</div>
					</a>
				</div>
				<?php } ?>
			</div>
			<div class="row mt-lg-5 mt-2">
				<div class="col-md-6">
					<p class="responsive-theme-home-settings-text fw-bolder mt-2"><?php esc_html_e( 'Upgrade to Pro Features', 'responsive' ); ?></p>
				</div>
				<div class="col-md-6">
					<a href="https://cyberchimps.com/pricing/?utm_source=Responsive_theme&utm_medium=intro_screen&utm_campaign=free-to-pro&utm_term=Upgrade_now_home" target="_blank" class="responsive-theme-upgrade-now-btn float-lg-end float-start text-decoration-none mb-4"><?php echo esc_html_e( 'Upgrade Now', 'responsive' ); ?></a>
				</div>
			</div>
			<div class="row gy-4">
				<?php
				foreach ( $upgrade_to_pro as $feature ) {
					?>
				<div class="col-xl-4 col-lg-6 col-md-6">
					<div class="responsive-theme-feature-cards h-100">
						<div class="responsive-theme-feature-cards-content">
							<span class="responsive-theme-feature-card responsive-theme-feature-card-<?php echo esc_html( $feature['tag'] ); ?>"><span><?php echo esc_html( $feature['tag'] ); ?></span></span>
							<div class="responsive-theme-feature-card-title mt-2 mb-2"><?php echo esc_html( $feature['title'] ); ?></div>
							<div class="responsive-theme-feature-card-desc"><?php echo esc_html( $feature['desc'] ); ?></div>
						</div>
					</div>
				</div>
					<?php
				}
				?>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="responsive-theme-home-links mt-4">
						<a href="https://cyberchimps.com/responsive-features/" target="_blank"><?php esc_html_e( 'See all PRO features', 'responsive' ); ?></a>
					</div>
				</div>
			</div>
			<div class="row mt-lg-5 mt-2">
				<div class="col-md-12">
					<p class="responsive-theme-home-settings-text fw-bolder mt-2"><?php esc_html_e( 'Useful Plugins', 'responsive' ); ?></p>
				</div>
			</div>
			<div class="row gy-4">
			<?php
			foreach ( $useful_plugins as $useful_plugin ) {
				?>
				<div class="col-xl-6 col-lg-6 col-md-6">
					<div class="responsive-theme-feature-cards h-100">
						<div class="responsive-theme-feature-cards-content">
							<span class="responsive-theme-feature-card responsive-theme-feature-card-<?php echo esc_attr( $useful_plugin['tag'] ); ?>"><span><?php echo esc_html( $useful_plugin['tag'] ); ?></span></span>
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
		<div class="col-lg-1 col-md-1">
			<div class="d-flex justify-content-center responsive-theme-home-line" style="height: 100%;">
				<div class="vr"></div>
			</div>
		</div>
		<div class="col-lg-3 col-md-4">
			<div class="row">
				<p class="responsive-theme-home-settings-text fw-bolder mt-lg-0 mt-4"><?php esc_html_e( 'Support', 'responsive' ); ?></p>
				<p class="responsive-theme-home-desc-text"><?php esc_html_e( 'Have questions? Get in touch with us. We\'ll be happy to help', 'responsive' ); ?></p>
				<div class="responsive-theme-home-links">
					<a href="https://wordpress.org/support/theme/responsive/" target="_blank"><?php esc_html_e( 'Request Support', 'responsive' ); ?></a>
				</div>
				<div class="responsive-theme-home-links">
					<a href="https://docs.cyberchimps.com/responsive" target="_blank"><?php esc_html_e( 'Browse Docs', 'responsive' ); ?></a>
				</div>
				<div class="responsive-theme-home-links">
					<a href="https://cyberchimps.com/changelog/responsive-theme/" target="_blank"><?php esc_html_e( 'View Changelog', 'responsive' ); ?></a>
				</div>
			</div>
			<hr>
			<div class="row">
				<p class="responsive-theme-home-settings-text fw-bolder"><?php esc_html_e( 'Learn and Grow', 'responsive' ); ?></p>
				<p class="responsive-theme-home-desc-text"><?php esc_html_e( 'Meet the Responsive Power-users. Say hello, ask questions, give feedback, and help each other', 'responsive' ); ?></p>
				<div class="responsive-theme-home-links">
					<a href="https://www.facebook.com/groups/responsive.theme/" target="_blank"><?php esc_html_e( 'Join Facebook', 'responsive' ); ?></a>
				</div>
				<div class="responsive-theme-home-links">
					<a href="https://www.youtube.com/playlist?list=PLXTwxw3ZJwPSKbf3-vo7sMBkXr9cakAPT" target="_blank"><?php esc_html_e( 'Watch Video Tutorials', 'responsive' ); ?></a>
				</div>
			</div>
			<hr>
			<div class="row">
				<p class="responsive-theme-home-settings-text fw-bolder"><?php esc_html_e( 'Rate Us', 'responsive' ); ?></p>
				<p><img src="<?php echo esc_url( RESPONSIVE_THEME_URI ) . 'admin/images/ph_star-fill.svg'; ?>" alt=""><img src="<?php echo esc_url( RESPONSIVE_THEME_URI ) . 'admin/images/ph_star-fill.svg'; ?>" alt=""><img src="<?php echo esc_url( RESPONSIVE_THEME_URI ) . 'admin/images/ph_star-fill.svg'; ?>" alt=""><img src="<?php echo esc_url( RESPONSIVE_THEME_URI ) . 'admin/images/ph_star-fill.svg'; ?>" alt=""><img src="<?php echo esc_url( RESPONSIVE_THEME_URI ) . 'admin/images/ph_star-fill.svg'; ?>" alt=""></p>
				<p class="responsive-theme-home-desc-text"><?php esc_html_e( 'Hi! Thanks for using the Responsive theme. Can you please do us a favor and give us a 5-star rating? Your feedback keeps us motivated and helps us grow the Responsive community.', 'responsive' ); ?></p>
				<div class="responsive-theme-home-links">
					<a href="https://wordpress.org/support/theme/responsive/reviews/#new-post" target="_blank"><?php esc_html_e( 'Submit Review', 'responsive' ); ?></a>
				</div>
			</div>
		</div>
	</div>
</div>
