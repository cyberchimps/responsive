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

/**
 * Check if Responsive Addons Pro is installed.
 */
function check_is_responsive_pro_installed() {
	$responsive_pro_slug = 'responsive-addons-pro/responsive-addons-pro.php';
	if ( ! function_exists( 'get_plugins' ) ) {
		require_once ABSPATH . 'wp-admin/includes/plugin.php';
	}
	$all_plugins = get_plugins();

	if ( ! empty( $all_plugins[ $responsive_pro_slug ] ) ) {
		return true;
	} else {
		return false;
	}
}

/**
 * Check if Responsive Addons Pro is installed.
 */
function check_is_responsive_addons_installed() {
	$responsive_addons_slug = 'responsive-add-ons/responsive-add-ons.php';
	if ( ! function_exists( 'get_plugins' ) ) {
		require_once ABSPATH . 'wp-admin/includes/plugin.php';
	}
	$all_plugins = get_plugins();

	if ( ! empty( $all_plugins[ $responsive_addons_slug ] ) ) {
		return true;
	} else {
		return false;
	}
}

/**
 * Check if Responsive Addons Pro is activated.
 */
function check_is_responsive_pro_activated() {
	return is_plugin_active( 'responsive-addons-pro/responsive-addons-pro.php' );
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

$responsive_addons_state = Responsive_Plugin_Install_Helper::instance()->check_plugin_installed_activated( 'responsive-add-ons' );

	$home_settings = array(
		array(
			'label' => __( 'Change Site Layout', 'responsive' ),
			'icon'  => 'dashicons-welcome-widgets-menus',
			'link'  => admin_url( 'customize.php?autofocus[section]=responsive_layout' ),
		),
		array(
			'label' => __( 'Customize fonts/typography', 'responsive' ),
			'icon'  => 'dashicons-editor-textcolor',
			'link'  => admin_url( 'customize.php?autofocus[section]=responsive_typography' ),
		),
		array(
			'label' => __( 'Upload logo & site icon', 'responsive' ),
			'icon'  => 'dashicons-format-image',
			'link'  => admin_url( 'customize.php?autofocus[section]=title_tagline' ),
		),
		array(
			'label' => __( 'Add/edit navigation menu', 'responsive' ),
			'icon'  => 'dashicons-menu',
			'link'  => admin_url( 'customize.php?autofocus[panel]=nav_menus' ),
		),
		array(
			'label' => __( 'Customize header options', 'responsive' ),
			'icon'  => 'dashicons-table-row-after',
			'link'  => admin_url( 'customize.php?autofocus[panel]=responsive_header' ),
		),
		array(
			'label' => __( 'Customize footer options', 'responsive' ),
			'icon'  => 'dashicons-table-row-before',
			'link'  => admin_url( 'customize.php?autofocus[panel]=responsive_footer' ),
		),
		array(
			'label' => __( 'Update blog layout', 'responsive' ),
			'icon'  => 'dashicons-welcome-write-blog',
			'link'  => admin_url( 'customize.php?autofocus[section]=responsive_blog_layout' ),
		),
		array(
			'label' => __( 'Update page layout', 'responsive' ),
			'icon'  => 'dashicons-text-page',
			'link'  => admin_url( 'customize.php?autofocus[section]=responsive_page_content' ),
		),
	);

	$is_rea_active = class_exists( 'Responsive_Elementor_Addons' ) ? true : false;
	$is_rst_active = class_exists( 'Responsive_Add_Ons' ) ? true : false;

	$white_label_url = admin_url( 'themes.php?page=responsive#settings' );
	if ( ! check_is_responsive_pro_activated() && $is_rst_active && check_is_responsive_addons_greater() ) {
		$white_label_url = admin_url( 'themes.php?page=responsive#raddons-settings' );
	}

	$upgrade_to_pro = array(
		array(
			'tag'   => 'pro',
			'title' => __( 'Starter Templates', 'responsive' ),
			'desc'  => __( 'Unlock the library of 100+ Premium Starter Templates.', 'responsive' ),
			'links' => array(
				array(
					'name'   => __( 'Explore Templates', 'responsive' ),
					'link'   => admin_url( 'admin.php?page=responsive_add_ons' ),
					'status' => $is_rst_active,
				),
			),
		),
		array(
			'tag'   => 'pro',
			'title' => __( 'Premium Support', 'responsive' ),
			'desc'  => __( 'Get priority support responses for any issues within 24 hours.', 'responsive' ),
			'links' => array(
				array(
					'name' => __( 'Open Ticket', 'responsive' ),
					'link' => 'https://cyberchimps.com/open-a-ticket/',
				),
			),
		),
		array(
			'tag'   => 'rea',
			'title' => __( '50+ Elementor Widgets', 'responsive' ),
			'desc'  => __( 'Get Free Access to the Responsive Elementor Addons Plugin worth $47/year.', 'responsive' ),
			'links' => array(
				array(
					'name' => __( 'Docs', 'responsive' ),
					'link' => 'https://cyberchimps.com/elementor-widgets/docs/',
				),
				array(
					'name'   => __( 'Settings', 'responsive' ),
					'link'   => admin_url( 'admin.php?page=rea_getting_started#widgets' ),
					'status' => $is_rea_active,
				),
			),
		),
		array(
			'tag'   => 'rea',
			'title' => __( 'Elementor Theme Builder', 'responsive' ),
			'desc'  => __( 'REA Theme Builder lets you design & customize every aspect of your website.', 'responsive' ),
			'links' => array(
				array(
					'name' => __( 'Docs', 'responsive' ),
					'link' => 'https://cyberchimps.com/elementor-widgets/docs/theme-builder/',
				),
				array(
					'name'   => __( 'Settings', 'responsive' ),
					'link'   => admin_url( 'edit.php?post_type=rea-theme-template' ),
					'status' => $is_rea_active,
				),
			),
		),
		array(
			'tag'   => 'pro',
			'title' => __( 'White Label', 'responsive' ),
			'desc'  => __( 'White Label the theme name & settings with the Pro Plugin.', 'responsive' ),
			'links' => array(
				array(
					'name' => __( 'Docs', 'responsive' ),
					'link' => 'https://cyberchimps.com/docs/how-to-white-label-cyberchimps-responsive-theme/',
				),
				array(
					'name' => __( 'Settings', 'responsive' ),
					'link' => $white_label_url,
				),
			),
		),
	);

	$responsive_addons_cards_content = array(
		array(
			'title' => __( 'Starter Templates', 'responsive' ),
			'desc'  => __( 'Unlock the library of 100+ Premium Starter Templates.', 'responsive' ),
			'links' => array(
				array(
					'name'   => __( 'Explore Templates', 'responsive' ),
					'link'   => admin_url( 'admin.php?page=responsive_add_ons' ),
					'status' => $is_rst_active,
				),
			),
		),
		array(
			'title' => __( 'White Label', 'responsive' ),
			'desc'  => __( 'White Label the theme name & settings with the Pro Plugin.', 'responsive' ),
			'links' => array(
				array(
					'name' => __( 'Docs', 'responsive' ),
					'link' => 'https://cyberchimps.com/docs/how-to-white-label-cyberchimps-responsive-theme/',
				),
				array(
					'name' => __( 'Settings', 'responsive' ),
					'link' => admin_url( 'themes.php?page=responsive#raddons-settings' ),
				),
			),
		),
	);

	if ( check_is_responsive_pro_activated() ) {
		$getting_started_home_cards_content = $upgrade_to_pro;
	} else {
		$getting_started_home_cards_content = $responsive_addons_cards_content;
	}

	$useful_plugins = array(
		array(
			'tag'    => __( 'free', 'responsive' ),
			'title'  => 'Responsive Plus - Starter Templates',
			'desc'   => __( '150+ Ready to Import Designer-Made Website Starter Templates.', 'responsive' ),
			'button' => Responsive_Plugin_Install_Helper::instance()->responsive_install_plugin_button( 'responsive-add-ons', 'rst', 'responsive_add_ons' ),
			'logo'   => 'rst',
		),
		array(
			'tag'    => __( 'free', 'responsive' ),
			'title'  => 'Responsive Blocks Library',
			'desc'   => __( '50+ Blocks to Enhance Your WordPress Block Editor Experience.', 'responsive' ),
			'button' => Responsive_Plugin_Install_Helper::instance()->responsive_install_plugin_button( 'responsive-block-editor-addons', 'rbl', 'responsive_block_editor_addons' ),
			'logo'   => 'responsive_blocks',
		),
		array(
			'tag'    => __( 'free', 'responsive' ),
			'title'  => 'Responsive Addons for Elementor',
			'desc'   => __( 'A free Elementor Addons plugin with more than 80+ premium quality Elementor widgets.', 'responsive' ),
			'button' => Responsive_Plugin_Install_Helper::instance()->responsive_install_plugin_button( 'responsive-addons-for-elementor', 'rae', 'rael_getting_started', 'Install & Activate' ),
			'logo'   => 'rea',
		),
		array(
			'tag'    => __( 'free', 'responsive' ),
			'title'  => 'WP Legal Pages',
			'desc'   => __( 'Free Plugin to Create Privacy Policy Pages for Your Website.', 'responsive' ),
			'button' => Responsive_Plugin_Install_Helper::instance()->responsive_install_plugin_button( 'wplegalpages', 'wplegalpages', 'getting-started' ),
			'logo'   => 'wp_legal_pages',
		),
	);

	$rpro_megamenu_status    = 'on' === get_option( 'rpo_megamenu_enable' ) ? 'checked' : '';
	$rpro_woocommerce_status = 'on' === get_option( 'rpro_woocommerce_enable' ) ? 'checked' : '';
	if ( ! is_responsive_version_greater() ) {
		$rpro_typography_status         = 'on' === get_option( 'rpro_typography_enable' ) ? 'checked' : '';
		$rpro_colors_backgrounds_status = 'on' === get_option( 'rpro_colors_backgrounds_enable' ) ? 'checked' : '';
	}

	if ( ! get_option( 'rpo_megamenu_enable' ) ) {
		add_option( 'rpo_megamenu_enable', 'on' );
	}

	if ( ! get_option( 'rpro_typography_enable' ) ) {
		add_option( 'rpro_typography_enable', 'on' );
	}

	if ( ! is_responsive_version_greater() ) {
		if ( ! get_option( 'rpro_colors_backgrounds_enable' ) ) {
			add_option( 'rpro_colors_backgrounds_enable', 'on' );
		}

		if ( ! get_option( 'rpro_woocommerce_enable' ) ) {
			add_option( 'rpro_woocommerce_enable', 'on' );
		}
	}

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
								<span class="dashicons <?php echo esc_attr( $home_setting['icon'] ); ?> mt-1 me-2"></span>
								<span class="responsive-theme-home-setting-button-label"><?php echo wp_kses_post( $home_setting['label'] ); ?></span>
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
				<div class="col-md-9">
					<p class="responsive-theme-home-settings-text fw-bolder mt-2">
						<?php
						if ( check_is_responsive_pro_activated() ) {
							esc_html_e( 'Responsive Pro Features', 'responsive' );
						} elseif ( check_is_responsive_addons_installed() ) {
							esc_html_e( 'Responsive Plus Features', 'responsive' );
						} else {
							esc_html_e( 'Unlock More Features by Installing Responsive Plus', 'responsive' );
						}
						?>
					</p>
				</div>
				<div class="col-md-3">
					<?php
					if ( check_is_responsive_pro_activated() ) {
						switch ( $state ) {
							case 'not installed':
								?>
								<a href="<?php echo esc_url( 'https://cyberchimps.com/pricing/?utm_source=Responsive_theme&utm_medium=intro_screen&utm_campaign=free-to-pro&utm_term=Upgrade_now_home' ); ?>" target="_blank" class="responsive-theme-upgrade-now-btn float-lg-end float-start text-decoration-none mb-4"><?php echo esc_html_e( 'Upgrade Now', 'responsive' ); ?></a>
								<?php
								break;
							case 'installed':
								?>
								<a data-slug="<?php echo esc_attr( $slug ); ?>" class="responsive-theme-activate-plugin activate-now responsive-theme-upgrade-now-btn float-lg-end float-start text-decoration-none mb-4" href="<?php echo esc_url( $nonce ); ?>" aria-label="Activate <?php echo esc_attr( $slug ); ?>"><?php echo esc_html__( 'Activate', 'responsive' ); ?></a>
								<?php
								break;
							case 'activated':
								?>
								<button class="responsive-plugin-activated-button-disabled float-lg-end float-start text-decoration-none mb-4" aria-label="Activated <?php echo esc_attr( $slug ); ?>"><?php echo esc_html__( 'Activated', 'responsive' ); ?></button>
								<?php
								break;
						} // End switch.
					} else {
						$button                  = '';
						$identifier              = 'rst';
						$redirect                = admin_url( 'admin.php?page=responsive_add_ons' );
						$responsive_addons_slug  = 'responsive-add-ons';
						$responsive_addons_nonce = add_query_arg(
							array(
								'action'        => 'activate',
								'plugin'        => rawurlencode( $responsive_addons_slug . '/' . $responsive_addons_slug . '.php' ),
								'plugin_status' => 'all',
								'paged'         => '1',
								'_wpnonce'      => wp_create_nonce( 'activate-plugin_' . $responsive_addons_slug . '/' . $responsive_addons_slug . '.php' ),
							),
							network_admin_url( 'plugins.php' )
						);

						switch ( $responsive_addons_state ) {
							case 'install':
								$button .= '<a id="responsive-theme-' . esc_attr( $identifier ) . '" data-redirect="' . esc_url( $redirect ) . '" data-slug="' . esc_attr( $responsive_addons_slug ) . '" class="responsive-theme-install-plugin install-now responsive-theme-install-responsive-add-ons float-lg-end float-start text-decoration-none mb-4" href="' . esc_url( $responsive_addons_nonce ) . '" data-name="' . esc_attr( $responsive_addons_slug ) . '" aria-label="Install ' . esc_attr( $responsive_addons_slug ) . '">' . esc_html( 'Install' ) . '</a>';
								break;

							case 'activate':
								$button .= '<a  data-redirect="' . esc_url( $redirect ) . '" data-slug="' . esc_attr( $responsive_addons_slug ) . '" class="responsive-theme-activate-plugin activate-now responsive-theme-install-responsive-add-ons float-lg-end float-start text-decoration-none mb-4" href="' . esc_url( $responsive_addons_nonce ) . '" aria-label="Activate ' . esc_attr( $responsive_addons_slug ) . '">' . esc_html__( 'Activate', 'responsive' ) . '</a>';
								break;
						} // End switch.
						echo wp_kses_post( $button );
					}
					?>
				</div>
			</div>
			<div class="row gy-4 responsive-plus-card-container">
				<?php
				foreach ( $getting_started_home_cards_content as $feature ) {
					?>
				<div class="col-xl-4 col-lg-6 col-md-6 ">
					<div class="responsive-theme-feature-cards h-100">
						<div class="responsive-theme-feature-cards-content">
							<?php
							if ( check_is_responsive_pro_activated() ) {
								?>
								<span class="responsive-theme-feature-card responsive-theme-feature-card-<?php echo esc_html( $feature['tag'] ); ?>"><span><?php echo esc_html( $feature['tag'] ); ?></span></span>
								<?php
							}
							?>
							<div class="responsive-theme-feature-card-title mt-2 mb-2"><?php echo esc_html( $feature['title'] ); ?></div>
							<div class="responsive-theme-feature-card-desc"><?php echo esc_html( $feature['desc'] ); ?></div>
							<?php
							if ( check_is_responsive_pro_installed() ) {
								if ( 'activated' === $state ) {
									?>
									<div class="responsive-theme-pro-features mt-2">
										<?php
										foreach ( $feature['links'] as $index => $feature_link ) {
											$disabled_links = ( isset( $feature_link['status'] ) && false === $feature_link['status'] ) ? 'responsive-theme-disabled-links' : '';
											?>

												<a href="<?php echo esc_url( $feature_link['link'] ); ?>" class="<?php echo esc_attr( $disabled_links ); ?>" target="
																	<?php
																	if ( 'Docs' === $feature_link['name'] || 'Open Ticket' === $feature_link['name'] ) {
																		echo esc_attr( '_blank' );}
																	?>
												"><?php echo esc_html( $feature_link['name'] ); ?></a>

											<?php
											if ( ( count( $feature['links'] ) - $index ) !== 1 ) {
												?>
													<span class="responsive-theme-feature-seperator">|</span>
												<?php
											}
										}
										?>
									</div>
									<?php
								}
							}
							if ( ! check_is_responsive_pro_activated() && check_is_responsive_addons_greater() ) {
								?>
								<div class="responsive-theme-pro-features mt-2">
									<?php
									foreach ( $feature['links'] as $index => $feature_link ) {
										$disabled_links = ( isset( $feature_link['status'] ) && false === $feature_link['status'] ) ? 'responsive-theme-disabled-links' : '';
										?>

											<a href="<?php echo esc_url( $feature_link['link'] ); ?>" class="<?php echo esc_attr( $disabled_links ); ?>" target="
																<?php
																if ( 'Docs' === $feature_link['name'] || 'Open Ticket' === $feature_link['name'] ) {
																	echo esc_attr( '_blank' );}
																?>
											"><?php echo esc_html( $feature_link['name'] ); ?></a>
											
										<?php
										if ( ( count( $feature['links'] ) - $index ) !== 1 ) {
											?>
												<span class="responsive-theme-feature-seperator">|</span>
											<?php
										}
									}
									?>
								</div>
								<?php
							}
							?>
						</div>
					</div>
				</div>
					<?php
				}
				?>
				<div class="col-xl-4 col-lg-6 col-md-6">
					<div class="responsive-theme-feature-cards h-100">
						<div class="responsive-theme-feature-cards-content">
							<?php
							if ( check_is_responsive_pro_activated() ) {
								?>
							<span class="responsive-theme-feature-card responsive-theme-feature-card-pro"><span><?php esc_html_e( 'PRO', 'responsive' ); ?></span></span>
								<?php
							}
							?>
							<div class="responsive-theme-feature-card-title mt-2 mb-2"><?php echo esc_html_e( 'Mega Menu', 'responsive' ); ?></div>
							<div class="responsive-theme-feature-card-desc"><?php echo esc_html_e( 'Adds menu options such as mega menus, highlight tags, icons, etc.', 'responsive' ); ?></div>
							<?php
							if ( check_is_responsive_pro_installed() ) {
								if ( 'activated' === $state ) {
									?>
									<div class="responsive-theme-pro-features mt-2 
									<?php
									if ( 'on' !== get_option( 'rpo_megamenu_enable' ) ) {
										echo 'disable-customize'; }
									?>
									">
										<a href="<?php echo esc_url( 'https://cyberchimps.com/docs/mega-menu/' ); ?>" class="" target="_blank"><?php esc_html_e( 'Docs', 'responsive' ); ?></a>
										<span class="responsive-theme-feature-seperator">|</span>
										<a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>" class="rpro-feature-customize-btn"><?php esc_html_e( 'Customize', 'responsive' ); ?></a>
										<?php
										global $wcam_lib_responsive_pro;
										$license_status = get_option( $wcam_lib_responsive_pro->wc_am_activated_key );
										if ( 'Activated' !== $license_status && 'on' === $rpro_megamenu_status ) {
											update_option( 'rpo_megamenu_enable', 'off' );
										}
										if ( 'Activated' === $license_status ) {
											?>
										<label class="resp-megamenu-switch float-md-none float-end float-lg-end float-xl-end float-xxl-end">
											<input class="resp-megamenu-input-checkbox" type="checkbox" 
											<?php
											if ( 'on' === get_option( 'rpo_megamenu_enable' ) ) {
												echo 'checked'; }
											?>
											 data-nonce="<?php echo esc_attr( wp_create_nonce( 'rpro_toggle_megamenu' ) ); ?>" <?php echo esc_attr( $rpro_megamenu_status ); ?>>
											<span class="resp-megamenu-slider resp-megamenu-round"></span>
										</label>
											<?php
										}
										?>
									</div>
									<?php
								}
							}
							if ( ! check_is_responsive_pro_activated() && check_is_responsive_addons_greater() ) {
								?>
								<div class="responsive-theme-pro-features mt-2 
								<?php
								if ( 'on' !== get_option( 'rpo_megamenu_enable' ) ) {
									echo 'disable-customize'; }
								?>
								">
									<a href="<?php echo esc_url( 'https://cyberchimps.com/docs/mega-menu/' ); ?>" class="" target="_blank"><?php esc_html_e( 'Docs', 'responsive' ); ?></a>
									<span class="responsive-theme-feature-seperator">|</span>
									<a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>" class="rpro-feature-customize-btn"><?php esc_html_e( 'Customize', 'responsive' ); ?></a>
									<label class="resp-megamenu-switch float-md-none float-end float-lg-end float-xl-end float-xxl-end">
										<input class="resp-megamenu-input-checkbox" type="checkbox" 
										<?php
										if ( 'on' === get_option( 'rpo_megamenu_enable' ) ) {
											echo 'checked'; }
										?>
										 data-nonce="<?php echo esc_attr( wp_create_nonce( 'rpro_toggle_megamenu' ) ); ?>" <?php echo esc_attr( $rpro_megamenu_status ); ?>>
										<span class="resp-megamenu-slider resp-megamenu-round"></span>
									</label>
								</div>
								<?php
							}
							?>
						</div>
					</div>
				</div>
				<?php
				if ( ! is_responsive_version_greater() ) {
					?>
				<div class="col-xl-4 col-lg-6 col-md-6">
					<div class="responsive-theme-feature-cards h-100">
						<div class="responsive-theme-feature-cards-content">
							<?php
							if ( check_is_responsive_pro_installed() ) {
								?>
							<span class="responsive-theme-feature-card responsive-theme-feature-card-pro"><span><?php esc_html_e( 'PRO', 'responsive' ); ?></span></span>
								<?php
							}
							?>
							<div class="responsive-theme-feature-card-title mt-2 mb-2"><?php echo esc_html_e( 'Typography', 'responsive' ); ?></div>
							<div class="responsive-theme-feature-card-desc"><?php echo esc_html_e( 'Adds options for font style, size, and family that suits your website best.', 'responsive' ); ?></div>
							<?php
							if ( 'activated' === $state ) {
								?>
								<div class="responsive-theme-pro-features mt-2 
								<?php
								if ( 'on' !== get_option( 'rpro_typography_enable' ) ) {
									echo 'disable-customize'; }
								?>
								">
									<a href="<?php echo esc_url( 'https://cyberchimps.com/docs/pro-modules/#typography-3' ); ?>" class="" target="_blank"><?php esc_html_e( 'Docs', 'responsive' ); ?></a>
									<span class="responsive-theme-feature-seperator">|</span>
									<a href="<?php echo esc_url( admin_url( 'customize.php' ) . '?autofocus[section]=responsive_page_typography' ); ?>" class="rpro-feature-customize-btn"><?php esc_html_e( 'Customize', 'responsive' ); ?></a>
									<?php
									global $wcam_lib_responsive_pro;
									$license_status = get_option( $wcam_lib_responsive_pro->wc_am_activated_key );
									if ( 'Activated' !== $license_status && 'on' === $rpro_typography_status ) {
										update_option( 'rpro_typography_enable', 'off' );
									}
									if ( 'Activated' === $license_status ) {
										?>
									<label class="resp-megamenu-switch float-md-none float-end float-lg-end float-xl-end float-xxl-end">
										<input class="resp-typography-input-checkbox" type="checkbox" 
										<?php
										if ( 'on' === get_option( 'rpro_typography_enable' ) ) {
											echo 'checked'; }
										?>
										 data-nonce="<?php echo esc_attr( wp_create_nonce( 'rpro_toggle_typography' ) ); ?>" <?php echo esc_attr( $rpro_typography_status ); ?>>
										<span class="resp-megamenu-slider resp-megamenu-round"></span>
									</label>
										<?php
									}
									?>
								</div>
								<?php
							}
							?>
						</div>
					</div>
				</div>
				<div class="col-xl-4 col-lg-6 col-md-6">
					<div class="responsive-theme-feature-cards h-100">
						<div class="responsive-theme-feature-cards-content">
							<?php
							if ( check_is_responsive_pro_installed() ) {
								?>
							<span class="responsive-theme-feature-card responsive-theme-feature-card-pro"><span><?php esc_html_e( 'PRO', 'responsive' ); ?></span></span>
								<?php
							}
							?>
							<div class="responsive-theme-feature-card-title mt-2 mb-2"><?php echo esc_html_e( 'Colors & Backgrounds', 'responsive' ); ?></div>
							<div class="responsive-theme-feature-card-desc"><?php echo esc_html_e( 'Enhances the background spacing, padding and color of your site.', 'responsive' ); ?></div>
							<?php
							if ( 'activated' === $state ) {
								?>
								<div class="responsive-theme-pro-features mt-2 
								<?php
								if ( 'on' !== get_option( 'rpro_colors_backgrounds_enable' ) ) {
									echo 'disable-customize'; }
								?>
								">
									<a href="<?php echo esc_url( 'https://cyberchimps.com/docs/colors-and-backgrounds/' ); ?>" class="" target="_blank"><?php esc_html_e( 'Docs', 'responsive' ); ?></a>
									<span class="responsive-theme-feature-seperator">|</span>
									<a href="<?php echo esc_url( admin_url( 'customize.php' ) . '?autofocus[section]=responsive_colors' ); ?>" class="rpro-feature-customize-btn"><?php esc_html_e( 'Customize', 'responsive' ); ?></a>
									<?php
									global $wcam_lib_responsive_pro;
									$license_status = get_option( $wcam_lib_responsive_pro->wc_am_activated_key );
									if ( 'Activated' !== $license_status && 'on' === $rpro_colors_backgrounds_status ) {
										update_option( 'rpro_colors_backgrounds_enable', 'off' );
									}
									if ( 'Activated' === $license_status ) {
										?>
									<label class="resp-megamenu-switch float-md-none float-end float-lg-end float-xl-end float-xxl-end">
										<input class="resp-colors-backgrounds-input-checkbox" type="checkbox" 
										<?php
										if ( 'on' === get_option( 'rpro_colors_backgrounds_enable' ) ) {
											echo 'checked'; }
										?>
										 data-nonce="<?php echo esc_attr( wp_create_nonce( 'rpro_toggle_colors_backgrounds' ) ); ?>" <?php echo esc_attr( $rpro_colors_backgrounds_status ); ?>>
										<span class="resp-megamenu-slider resp-megamenu-round"></span>
									</label>
										<?php
									}
									?>
								</div>
								<?php
							}
							?>
						</div>
					</div>
				</div>
					<?php
				} else {
					if ( 'off' === get_option( 'rpro_typography_enable' ) ) {
						add_option( 'rpro_typography_enable', 'on' );
					}

					if ( get_option( 'rpro_colors_backgrounds_enable' ) ) {
						add_option( 'rpro_colors_backgrounds_enable', 'on' );
					}
				}
				?>
				<div class="col-xl-4 col-lg-6 col-md-6">
					<div class="responsive-theme-feature-cards h-100">
						<div class="responsive-theme-feature-cards-content">
							<?php
							if ( check_is_responsive_pro_activated() ) {
								?>
							<span class="responsive-theme-feature-card responsive-theme-feature-card-pro"><span><?php esc_html_e( 'PRO', 'responsive' ); ?></span></span>
								<?php
							}
							?>
							<div class="responsive-theme-feature-card-title mt-2 mb-2"><?php echo esc_html_e( 'Woocommerce', 'responsive' ); ?></div>
							<div class="responsive-theme-feature-card-desc"><?php echo esc_html_e( 'Adds enhanced set of options in the WooCommerce store customizer.', 'responsive' ); ?></div>
							<?php
							if ( check_is_responsive_pro_installed() ) {
								if ( 'activated' === $state ) {
									?>
									<div class="responsive-theme-pro-features mt-2 
									<?php
									if ( 'on' !== get_option( 'rpro_woocommerce_enable' ) ) {
										echo 'disable-customize'; }
									?>
									">
										<a href="<?php echo esc_url( 'https://cyberchimps.com/docs/woocommerce-module/' ); ?>" class="" target="_blank"><?php esc_html_e( 'Docs', 'responsive' ); ?></a>
										<span class="responsive-theme-feature-seperator">|</span>
										<a href="<?php echo esc_url( admin_url( 'customize.php' ) ) . '?autofocus[section]=woocommerce'; ?>" class="rpro-feature-customize-btn"><?php esc_html_e( 'Customize', 'responsive' ); ?></a>
										<?php
										global $wcam_lib_responsive_pro;
										$license_status = get_option( $wcam_lib_responsive_pro->wc_am_activated_key );
										if ( 'Activated' !== $license_status && 'on' === $rpro_woocommerce_status ) {
											update_option( 'rpro_woocommerce_enable', 'off' );
										}
										if ( 'Activated' === $license_status ) {
											?>
										<label class="resp-megamenu-switch float-md-none float-end float-lg-end float-xl-end float-xxl-end">
											<input class="resp-woocommerce-input-checkbox" type="checkbox" 
											<?php
											if ( 'on' === get_option( 'rpro_woocommerce_enable' ) ) {
												echo 'checked'; }
											?>
											 data-nonce="<?php echo esc_attr( wp_create_nonce( 'rpro_toggle_woocommerce' ) ); ?>" <?php echo esc_attr( $rpro_woocommerce_status ); ?>>
											<span class="resp-megamenu-slider resp-megamenu-round"></span>
										</label>
											<?php
										}
										?>
									</div>
									<?php
								}
							}

							if ( ! check_is_responsive_pro_activated() && check_is_responsive_addons_greater() ) {
								?>
								<div class="responsive-theme-pro-features mt-2 
								<?php
								if ( 'on' !== get_option( 'rpro_woocommerce_enable' ) ) {
									echo 'disable-customize'; }
								?>
								">
									<a href="<?php echo esc_url( 'https://cyberchimps.com/docs/woocommerce-module/' ); ?>" class="" target="_blank"><?php esc_html_e( 'Docs', 'responsive' ); ?></a>
									<span class="responsive-theme-feature-seperator">|</span>
									<a href="<?php echo esc_url( admin_url( 'customize.php' ) ) . '?autofocus[section]=woocommerce'; ?>" class="rpro-feature-customize-btn"><?php esc_html_e( 'Customize', 'responsive' ); ?></a>
									<label class="resp-megamenu-switch float-md-none float-end float-lg-end float-xl-end float-xxl-end">
										<input class="resp-woocommerce-input-checkbox" type="checkbox" 
										<?php
										if ( 'on' === get_option( 'rpro_woocommerce_enable' ) ) {
											echo 'checked'; }
										?>
										 data-nonce="<?php echo esc_attr( wp_create_nonce( 'rpro_toggle_woocommerce' ) ); ?>" <?php echo esc_attr( $rpro_woocommerce_status ); ?>>
										<span class="resp-megamenu-slider resp-megamenu-round"></span>
									</label>
								</div>
								<?php
							}
							?>
						</div>
					</div>
				</div>
			</div>
			<?php
			if ( check_is_responsive_pro_activated() ) {
				?>
			<div class="row">
				<div class="col-md-12">
					<div class="responsive-theme-home-links mt-4">
						<a href="<?php echo esc_url( 'https://cyberchimps.com/responsive-go-pro/?utm_source=Responsive_theme&utm_medium=intro_screen&utm_campaign=free-to-pro&utm_term=See_all_Pro_features' ); ?>" target="_blank"><?php esc_html_e( 'See all PRO features', 'responsive' ); ?></a>
					</div>
				</div>
			</div>
				<?php
			}
			?>
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
		<div class="col-lg-1 col-md-1">
			<div class="d-flex justify-content-center responsive-theme-home-line" style="height: 100%;">
				<div class="vr"></div>
			</div>
		</div>
		<div class="col-lg-3 col-md-4">
			<div class="row">
				<p class="responsive-theme-home-settings-text fw-bolder"><?php esc_html_e( 'Rate Us', 'responsive' ); ?></p>
				<p><img src="<?php echo esc_url( RESPONSIVE_THEME_URI ) . 'admin/images/ph_star-fill.svg'; ?>" alt=""><img src="<?php echo esc_url( RESPONSIVE_THEME_URI ) . 'admin/images/ph_star-fill.svg'; ?>" alt=""><img src="<?php echo esc_url( RESPONSIVE_THEME_URI ) . 'admin/images/ph_star-fill.svg'; ?>" alt=""><img src="<?php echo esc_url( RESPONSIVE_THEME_URI ) . 'admin/images/ph_star-fill.svg'; ?>" alt=""><img src="<?php echo esc_url( RESPONSIVE_THEME_URI ) . 'admin/images/ph_star-fill.svg'; ?>" alt=""></p>
				<p class="responsive-theme-home-desc-text"><?php esc_html_e( 'Hi! Thanks for using the ', 'responsive' ) . esc_html_e( 'Responsive', 'responsive' ) . esc_html_e( ' theme. Can you please do us a favor and give us a 5-star rating? Your feedback keeps us motivated and helps us grow the Responsive community.', 'responsive' ); ?></p>
				<div class="responsive-theme-home-links">
					<a href="<?php echo esc_url( 'https://wordpress.org/support/theme/responsive/reviews/#new-post' ); ?>" target="_blank"><?php esc_html_e( 'Submit Review', 'responsive' ); ?></a>
				</div>
			</div>
			<hr>
			<?php if(!responsive_is_user_pro()): ?>
			<div class="row">
				<div class="responsive-theme-feature-cards upgrade-to-pro-card">
				    <div class="responsive-theme-feature-cards-content">
						<p class="responsive-theme-home-settings-text fw-bolder"><?php esc_html_e( 'Upgrade to PRO', 'responsive' ); ?></p>
			            <p class="responsive-theme-home-desc-text "><?php esc_html_e('Upgrade to Cyberchimps Pro plan to unlock access to 150+ Premium Starter Templates and priority support.', 'responsive');?></p>
						<button class="btn-upgrade" onclick="window.open('<?php echo esc_url('https://cyberchimps.com/pricing/?utm_source=wpdash&utm_medium=rtheme&utm_campaign=theme-home-tab&utm_content=upgrade'); ?>', '_blank')"><?php esc_html_e('Upgrade', 'responsive'); ?></button>
					</div>
				</div>
			</div>
			<?php endif;?>
			<hr>
			<div class="row">
				<p class="responsive-theme-home-settings-text fw-bolder"><?php esc_html_e( 'Learn and Grow', 'responsive' ); ?></p>
				<p class="responsive-theme-home-desc-text"><?php esc_html_e( 'Meet the Responsive Power-users. Say hello, ask questions, give feedback, and help each other', 'responsive' ); ?></p>
				<div class="responsive-theme-home-links">
					<a href="<?php echo esc_url( 'https://www.facebook.com/groups/responsive.theme/' ); ?>" target="_blank"><?php esc_html_e( 'Join Facebook', 'responsive' ); ?></a>
				</div>
				<div class="responsive-theme-home-links">
					<a href="<?php echo esc_url( 'https://www.youtube.com/playlist?list=PLXTwxw3ZJwPSKbf3-vo7sMBkXr9cakAPT' ); ?>" target="_blank"><?php esc_html_e( 'Watch Video Tutorials', 'responsive' ); ?></a>
				</div>
			</div>
		</div>
	</div>
</div>
