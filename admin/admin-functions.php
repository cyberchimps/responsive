<?php
/**
 * Admin Functions.
 *
 * @package responsive
 */

/**
 * Enqueue admin scipts.
 *
 * @param string $hook Hook.
 */
function responsive_admin_scripts( $hook ) {
	if ( 'post-new.php' === $hook || 'post.php' === $hook ) {
		return;
	}
	wp_enqueue_script( 'responsive-admin-js', get_template_directory_uri() . '/admin/js/plugin-install.js', array( 'jquery' ), true, RESPONSIVE_THEME_VERSION );
	wp_enqueue_script( 'updates' );
	wp_localize_script(
		'responsive-admin-js',
		'responsiveAboutPluginInstall',
		array(
			'activating'            => esc_html__( 'Activating ', 'responsive' ),
			'verify_network'        => esc_html__( 'Not connect. Verify Network.', 'responsive' ),
			'page_not_found'        => esc_html__( 'Requested page not found. [404]', 'responsive' ),
			'internal_server_error' => esc_html__( 'Internal Server Error [500]', 'responsive' ),
			'json_parse_failed'     => esc_html__( 'Requested JSON parse failed', 'responsive' ),
			'timeout_error'         => esc_html__( 'Time out error', 'responsive' ),
			'ajax_req_aborted'      => esc_html__( 'Ajax request aborted', 'responsive' ),
			'uncaught_error'        => esc_html__( 'Uncaught Error', 'responsive' ),
		)
	);
}
add_action( 'admin_enqueue_scripts', 'responsive_admin_scripts' );

/**
 * Responsive_enqueue_notices_handler.
 */
function responsive_enqueue_notices_handler() {
	wp_register_script( 'responsive-plugin-notices-handler', trailingslashit( get_template_directory_uri() ) . '/admin/js/notices.js', array( 'jquery' ), RESPONSIVE_THEME_VERSION, true );
	wp_localize_script(
		'responsive-plugin-notices-handler',
		'dismissNotices',
		array(
			'_notice_nonce' => wp_create_nonce( 'responsive-plugin-notices-handler' ),
			'ajaxurl'       => admin_url( 'admin-ajax.php' ),
		)
	);

	wp_enqueue_script( 'responsive-plugin-notices-handler' );
}

add_action( 'admin_enqueue_scripts', 'responsive_enqueue_notices_handler', 99 );

/**
 * Enqueue the Customizer Command Palette (Ctrl/Cmd + K) integration for Responsive.
 */
function responsive_enqueue_command_palette_scripts() {
	wp_enqueue_style( 'wp-components' );
	wp_enqueue_script(
		'responsive-command-palette',
		RESPONSIVE_THEME_URI . 'admin/js/responsive-command-palette.js',
		array( 'wp-commands', 'wp-data', 'wp-i18n', 'wp-element', 'wp-components', 'wp-dom-ready' ),
		RESPONSIVE_THEME_VERSION,
		true
	);

	$sections = array(
		array(
			'name'        => 'responsive/customizer-header',
			'label'       => __( 'Customizer: Header', 'responsive' ),
			'searchLabel' => __( 'Header, Primary Header, Logo, Site Title, Navigation, Menu, Customizer', 'responsive' ),
			'url'         => admin_url( 'customize.php?autofocus[panel]=responsive_header' ),
		),
		array(
			'name'        => 'responsive/customizer-footer',
			'label'       => __( 'Customizer: Footer', 'responsive' ),
			'searchLabel' => __( 'Footer, Bottom Bar, Copyright, Widgets, Menu, Customizer', 'responsive' ),
			'url'         => admin_url( 'customize.php?autofocus[panel]=responsive_footer' ),
		),
		array(
			'name'        => 'responsive/customizer-global',
			'label'       => __( 'Customizer: Global', 'responsive' ),
			'searchLabel' => __( 'Global, Layout, Buttons, Color Palette, Form Fields, Typography, Background, Embed Scripts, Customizer', 'responsive' ),
			'url'         => admin_url( 'customize.php?autofocus[panel]=responsive_site' ),
		),
		array(
			'name'        => 'responsive/customizer-typography',
			'label'       => __( 'Customizer: Typography', 'responsive' ),
			'searchLabel' => __( 'Typography, Fonts, Text, Base Typography, Customizer', 'responsive' ),
			'url'         => admin_url( 'customize.php?autofocus[section]=responsive_typography' ),
		),
		array(
			'name'        => 'responsive/customizer-blog',
			'label'       => __( 'Customizer: Blog/Archive', 'responsive' ),
			'searchLabel' => __( 'Blog, Archive, Single Post, Post, Customizer', 'responsive' ),
			'url'         => admin_url( 'customize.php?autofocus[section]=responsive_blog_options' ),
		),
		array(
			'name'        => 'responsive/customizer-performance',
			'label'       => __( 'Customizer: Performance', 'responsive' ),
			'searchLabel' => __( 'Performance, Local Font, Speed, Optimization, Customizer', 'responsive' ),
			'url'         => admin_url( 'customize.php?autofocus[section]=responsive_performance' ),
		),
		array(
			'name'        => 'responsive/customizer-breadcrumb',
			'label'       => __( 'Customizer: Breadcrumb', 'responsive' ),
			'searchLabel' => __( 'Breadcrumb, Customizer', 'responsive' ),
			'url'         => admin_url( 'customize.php?autofocus[section]=responsive_breadcrumb' ),
		),
		array(
			'name'        => 'responsive/customizer-sidebar',
			'label'       => __( 'Customizer: Sidebar', 'responsive' ),
			'searchLabel' => __( 'Sidebar, Default Sidebar, Customizer', 'responsive' ),
			'url'         => admin_url( 'customize.php?autofocus[section]=responsive_sidebar' ),
		),
		array(
			'name'        => 'responsive/customizer-site-identity',
			'label'       => __( 'Customizer: Site Identity', 'responsive' ),
			'searchLabel' => __( 'Site Identity, Logo, Site Title, Site Tagline, Customizer', 'responsive' ),
			'url'         => admin_url( 'customize.php?autofocus[section]=title_tagline' ),
		),
		array(
			'name'        => 'responsive/customizer-general',
			'label'       => __( 'Customizer: General', 'responsive' ),
			'searchLabel' => __( 'General, Breadcrumb, Sidebar, Performance, Customizer', 'responsive' ),
			'url'         => admin_url( 'customize.php?autofocus[section]=responsive_general' ),
		),
		array(
			'name'        => 'responsive/customizer-post-types',
			'label'       => __( 'Customizer: Post Types', 'responsive' ),
			'searchLabel' => __( 'Post Types, Post, Page, Blog/Archive, Single Post, Customizer', 'responsive' ),
			'url'         => admin_url( 'customize.php?autofocus[panel]=responsive_post_types' ),
		),
		array(
			'name'        => 'responsive/customizer-homepage-settings',
			'label'       => __( 'Customizer: Homepage Settings', 'responsive' ),
			'searchLabel' => __( 'Homepage Settings, Static Front Page, Customizer', 'responsive' ),
			'url'         => admin_url( 'customize.php?autofocus[section]=static_front_page' ),
		),
		array(
			'name'        => 'responsive/customizer-menus',
			'label'       => __( 'Customizer: Menus', 'responsive' ),
			'searchLabel' => __( 'Menus, Customizer', 'responsive' ),
			'url'         => admin_url( 'customize.php?autofocus[panel]=nav_menus' ),
		),
		array(
			'name'        => 'responsive/customizer-additional-css',
			'label'       => __( 'Customizer: Additional CSS', 'responsive' ),
			'searchLabel' => __( 'Additional CSS, Custom CSS, CSS, Customizer', 'responsive' ),
			'url'         => admin_url( 'customize.php?autofocus[section]=custom_css' ),
		),
		array(
			'name'        => 'responsive/customizer-page',
			'label'       => __( 'Customizer: Page', 'responsive' ),
			'searchLabel' => __( 'Page, Customizer', 'responsive' ),
			'url'         => admin_url( 'customize.php?autofocus[section]=responsive_page' ),
		),
		array(
			'name'        => 'responsive/customizer-blog_layout',
			'label'       => __( 'Customizer: Blog / Archive', 'responsive' ),
			'searchLabel' => __( 'Blog / Archive, Archive, Blog, Customizer', 'responsive' ),
			'url'         => admin_url( 'customize.php?autofocus[section]=responsive_blog_layout' ),
		),
		array(
			'name'        => 'responsive/customizer-single_blog_layout',
			'label'       => __( 'Customizer: Single Post', 'responsive' ),
			'searchLabel' => __( 'Single Post, Post, Customizer', 'responsive' ),
			'url'         => admin_url( 'customize.php?autofocus[section]=responsive_single_blog_layout' ),
		),
		array(
			'name'        => 'responsive/customizer-layout',
			'label'       => __( 'Customizer: Layout', 'responsive' ),
			'searchLabel' => __( 'Layout, Customizer', 'responsive' ),
			'url'         => admin_url( 'customize.php?autofocus[section]=responsive_layout' ),
		),
		array(
			'name'        => 'responsive/customizer-buttons',
			'label'       => __( 'Customizer: Buttons', 'responsive' ),
			'searchLabel' => __( 'Buttons, Customizer', 'responsive' ),
			'url'         => admin_url( 'customize.php?autofocus[section]=responsive_button' ),
		),
		array(
			'name'        => 'responsive/customizer-form-fields',
			'label'       => __( 'Customizer: Form Fields', 'responsive' ),
			'searchLabel' => __( 'Form Fields, Customizer', 'responsive' ),
			'url'         => admin_url( 'customize.php?autofocus[section]=responsive_form_fields' ),
		),
		array(
			'name'        => 'responsive/customizer-colors',
			'label'       => __( 'Customizer: Colors & Backgrounds', 'responsive' ),
			'searchLabel' => __( 'Colors & Backgrounds, Customizer', 'responsive' ),
			'url'         => admin_url( 'customize.php?autofocus[section]=responsive_colors' ),
		),
		array(
			'name'        => 'responsive/customizer-typography',
			'label'       => __( 'Customizer: Typography', 'responsive' ),
			'searchLabel' => __( 'Typography, Customizer', 'responsive' ),
			'url'         => admin_url( 'customize.php?autofocus[section]=responsive_typography' ),
		),
		array(
			'name'        => 'responsive/customizer-embed-scripts',
			'label'       => __( 'Customizer: Embed Scripts', 'responsive' ),
			'searchLabel' => __( 'Embed Scripts, Customizer', 'responsive' ),
			'url'         => admin_url( 'customize.php?autofocus[section]=responsive_scripts' ),
		),
		array(
			'name'        => 'responsive/customizer-widgets',
			'label'       => __( 'Customizer: Widgets', 'responsive' ),
			'searchLabel' => __( 'Widgets, Customizer', 'responsive' ),
			'url'         => admin_url( 'customize.php?autofocus[panel]=widgets' ),
		),
	);

	// Conditionally add WooCommerce sections if it's active.
	if ( class_exists( 'WooCommerce' ) ) {
		$sections[] = array(
			'name'        => 'responsive/customizer-woocommerce',
			'label'       => __( 'Customizer: WooCommerce', 'responsive' ),
			'searchLabel' => __( 'WooCommerce, Shop, Store, Product, Cart, Checkout, Customizer', 'responsive' ),
			'url'         => admin_url( 'customize.php?autofocus[panel]=woocommerce' ),
		);
		$sections[] = array(
			'name'        => 'responsive/customizer-product-catalog',
			'label'       => __( 'Customizer: Product Catalog', 'responsive' ),
			'searchLabel' => __( 'Product Catalog, Catalog, Store, Product, Customizer', 'responsive' ),
			'url'         => admin_url( 'customize.php?autofocus[section]=woocommerce_product_catalog' ),
		);
		$sections[] = array(
			'name'        => 'responsive/customizer-product-images',
			'label'       => __( 'Customizer: Product Images', 'responsive' ),
			'searchLabel' => __( 'Product Images, Images, Product, Customizer', 'responsive' ),
			'url'         => admin_url( 'customize.php?autofocus[section]=woocommerce_product_images' ),
		);
		$sections[] = array(
			'name'        => 'responsive/customizer-single-product',
			'label'       => __( 'Customizer: Single Product', 'responsive' ),
			'searchLabel' => __( 'Single Product, Customizer', 'responsive' ),
			'url'         => admin_url( 'customize.php?autofocus[section]=responsive_woocommerce_single_product_layout' ),
		);
		$sections[] = array(
			'name'        => 'responsive/customizer-product-catalog-options',
			'label'       => __( 'Customizer: Product Catalog Options', 'responsive' ),
			'searchLabel' => __( 'Product Catalog Options, Customizer', 'responsive' ),
			'url'         => admin_url( 'customize.php?autofocus[section]=responsive_woocommerce_shop' ),
		);
		$sections[] = array(
			'name'        => 'responsive/customizer-cart-options',
			'label'       => __( 'Customizer: Cart Options', 'responsive' ),
			'searchLabel' => __( 'Cart Options, Customizer', 'responsive' ),
			'url'         => admin_url( 'customize.php?autofocus[section]=responsive_woocommerce_cart' ),
		);
		$sections[] = array(
			'name'        => 'responsive/customizer-distraction-free-woocommerce',
			'label'       => __( 'Customizer: Distraction Free', 'responsive' ),
			'searchLabel' => __( 'Distraction Free, Customizer', 'responsive' ),
			'url'         => admin_url( 'customize.php?autofocus[section]=responsive_woocommerce_distraction_free' ),
		);
		$sections[] = array(
			'name'        => 'responsive/customizer-store-notice',
			'label'       => __( 'Customizer: Store Notice', 'responsive' ),
			'searchLabel' => __( 'Store Notice, Customizer', 'responsive' ),
			'url'         => admin_url( 'customize.php?autofocus[section]=woocommerce_store_notice' ),
		);
	}

	wp_localize_script(
		'responsive-command-palette',
		'responsiveCommandPalette',
		array(
			'sections' => $sections,
			'iconUrl'  => RESPONSIVE_THEME_URI . 'admin/images/responsive-theme-cmd-pal-logo.svg',
		)
	);
}
add_action( 'admin_enqueue_scripts', 'responsive_enqueue_command_palette_scripts' );

/**
 * Include Welcome page right starter sites content
 *
 * @since 4.0.3
 */
function responsive_welcome_banner_notice() {
	
	global $pagenow;

	if ( isset( $_GET['page'] ) && 'responsive' === $_GET['page'] ) {
		return;
	}
	$screen = get_current_screen();
	if ( $screen && 'plugin-install' === $screen->id ) {
		return;
	}
	if ( 'update.php' === $pagenow && isset( $_REQUEST['action'] ) && 'upload-plugin' === $_REQUEST['action'] ) {
		return;
	}
	if( is_plugin_active( 'responsive-add-ons/responsive-add-ons.php' ) ) {
		return;
	}
	if ( '1' !== get_option( 'responsive-readysite-promotion' ) ) {
		?>

	<?php echo Responsive_Plugin_Install_Helper::instance()->get_rateus_content( 'responsive-add-ons' ); //phpcs:ignore ?>
	<div class="notice postbox responsive-sites-active" id="responsive-sites-active">
		<div class="responsive-banner-outer-container">
			<div class="responisve-addons-banner-header">
				<div class="responsive-notice-image">
					<img class="responsive-starter-sites-img" src="<?php echo esc_url( RESPONSIVE_THEME_URI . 'admin/images/cyberchimps-logo-thumbnail.png' ); ?>">
				</div>
				<div class="responsive-notice-content">
					<h2 class="handle">
						<span><?php echo esc_html( apply_filters( 'responsive_sites_menu_page_title', __( 'Thank You for Installing Responsive Theme!', 'responsive' ) ) ); ?></span>
					</h2>
				</div>
			</div>
			<div class="responsive-addons-banner-content">
				<p>
					<?php esc_html_e( 'Import 100+ fully functional and ready to use business websites with the free Responsive Starter Templates Plugin.', 'responsive' ); ?>
					<?php echo Responsive_Plugin_Install_Helper::instance()->get_button_html( 'responsive-add-ons' ); //phpcs:ignore ?>
				</p>
			</div>
		</div>
		<div class="responsive-banner-image-container">
			<img class="responsive-banner-starter-sites-img" src="<?php echo esc_url( RESPONSIVE_THEME_URI . 'admin/images/resp-plus-starter-template.png' ); ?>">
		</div>			
			
			<button type="button" class="notice-dismiss"></button>
	</div>
	<?php echo Responsive_Plugin_Install_Helper::instance()->get_rateus_end_content( 'responsive-add-ons' ); //phpcs:ignore
	}
}

add_action( 'admin_notices', 'responsive_welcome_banner_notice', 10 );

add_action( 'wp_ajax_responsive_delete_transient_action', 'responsive_delete_transient_action' );

/**
 * Responsive Delete Transient Action
 *
 * @since 4.0.3
 */
function responsive_delete_transient_action() {
	$nonce = ( isset( $_POST['nonce'] ) ) ? sanitize_key( $_POST['nonce'] ) : '';

	if ( false === wp_verify_nonce( $nonce, 'responsive-plugin-notices-handler' ) ) {
		return;
	}
	update_option( 'responsive-readysite-promotion', 1 );

}

/**
 * Responsive Upgrade Pro React
 *
 * @since 4.0.3
 */
function responsive_upgrade_pro_react() {
	?>

	<div class="notice notice-error">
		<p>Please update to the latest version of <strong>Responsive Pro ( V2.4.2 or higher )</strong> to be compatible with the latest <strong>Responsive</strong> theme. To upgrade to latest version of <strong>Responsive Pro Plugin</strong> follow <a href="<?php echo esc_url( 'https://cyberchimps.com/docs-category/faq/' ); ?>">Documentation</a>.</p>
	</div>
	<?php
}

if ( class_exists( 'responsive_addons_pro' ) ) {
	$plugin_path            = WP_PLUGIN_DIR . '/responsive-addons-pro/responsive-addons-pro.php';
	$plugin_info            = get_plugin_data( $plugin_path );
	$responsive_pro_version = $plugin_info['Version'];
	$compare                = version_compare( $responsive_pro_version, '2.4.2' );
	if ( -1 === $compare ) {
		add_action( 'admin_notices', 'responsive_upgrade_pro_react', 20 );
	}
}
