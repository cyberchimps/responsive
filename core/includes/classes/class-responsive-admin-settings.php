<?php
/**
 * Admin settings helper
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package     Responsive
 * @author      Responsive
 * @copyright   Copyright (c) 2020, Responsive
 * @link        https://www.cyberchimps.com
 * @since       Responsive 4.0.3
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Admin_Settings' ) ) {

	/**
	 * Responsive Admin Settings
	 */
	class Responsive_Admin_Settings {

		/**
		 * Menu page title
		 *
		 * @since 4.0.3
		 * @var array $menu_page_title
		 */
		public static $menu_page_title = 'Responsive Theme';

		/**
		 * Page title
		 *
		 * @since 4.0.3
		 * @var array $page_title
		 */
		public static $page_title = 'Responsive';

		/**
		 * Plugin slug
		 *
		 * @since 4.0.3
		 * @var array $plugin_slug
		 */
		public static $plugin_slug = 'responsive';

		/**
		 * Default Menu position
		 *
		 * @since 4.0.3
		 * @var array $default_menu_position
		 */
		public static $default_menu_position = 'themes.php';

		/**
		 * Parent Page Slug
		 *
		 * @since 4.0.3
		 * @var array $parent_page_slug
		 */
		public static $parent_page_slug = 'general';

		/**
		 * Current Slug
		 *
		 * @since 4.0.3
		 * @var array $current_slug
		 */
		public static $current_slug = 'general';

		/**
		 * Constructor
		 */
		public function __construct() {

			if ( ! is_admin() ) {
				return;
			}

			add_action( 'after_setup_theme', __CLASS__ . '::init_admin_settings', 99 );
		}

		/**
		 * Admin settings init
		 *
		 * @since 4.0.3
		 */
		public static function init_admin_settings() {
			self::$menu_page_title = apply_filters( 'responsive_menu_page_title', __( 'Responsive Options', 'responsive' ) );
			self::$page_title      = apply_filters( 'responsive_page_title', __( 'Responsive', 'responsive' ) );
			self::$plugin_slug     = self::get_theme_page_slug();

			if ( isset( $_REQUEST['page'] ) && strpos( $_REQUEST['page'], self::$plugin_slug ) !== false ) {

				add_action( 'admin_enqueue_scripts', __CLASS__ . '::styles_scripts' );
			}

			add_action( 'admin_menu', __CLASS__ . '::add_admin_menu', 99 );

			add_action( 'responsive_menu_general_action', __CLASS__ . '::general_page' );

			add_action( 'responsive_menu_upgrade_to_pro_action', __CLASS__ . '::upgrade_to_pro_page' );

			add_action( 'responsive_header_right_section', __CLASS__ . '::top_header_right_section' );

			add_action( 'responsive_welcome_page_right_sidebar_content', __CLASS__ . '::responsive_welcome_page_starter_sites_section', 10 );
			add_action( 'responsive_welcome_page_right_sidebar_content', __CLASS__ . '::responsive_welcome_page_support_section', 11 );

			add_action( 'responsive_welcome_page_content', __CLASS__ . '::responsive_welcome_page_content' );
		}

		/**
		 * Theme options page Slug getter including White Label string.
		 *
		 * @since 4.0.3
		 * @return string Theme Options Page Slug.
		 */
		public static function get_theme_page_slug() {
			return apply_filters( 'responsive_theme_page_slug', self::$plugin_slug );
		}

		/**
		 * Enqueues the needed CSS/JS for the builder's admin settings page.
		 *
		 * @since 1.0
		 */
		public static function styles_scripts() {

			wp_enqueue_style( 'responsive-admin-settings', RESPONSIVE_THEME_URI . 'admin/css/responsive-admin-menu-page.css', array(), RESPONSIVE_THEME_VERSION );

		}

		/**
		 * Add main menu
		 *
		 * @since 1.0
		 */
		public static function add_admin_menu() {

			$parent_page    = self::$default_menu_position;
			$page_title     = self::$menu_page_title;
			$capability     = 'manage_options';
			$page_menu_slug = self::$plugin_slug;
			$page_menu_func = __CLASS__ . '::menu_callback';

			if ( apply_filters( 'responsive_dashboard_admin_menu', true ) ) {
				add_theme_page( $page_title, $page_title, $capability, $page_menu_slug, $page_menu_func );
			} else {
				do_action( 'responsivea_register_admin_menu', $parent_page, $page_title, $capability, $page_menu_slug, $page_menu_func );
			}
		}

		/**
		 * Menu callback
		 *
		 * @since 1.0
		 */
		public static function menu_callback() {

			$current_slug = isset( $_GET['action'] ) ? esc_attr( $_GET['action'] ) : self::$current_slug;

			$active_tab   = str_replace( '_', '-', $current_slug );
			$current_slug = str_replace( '-', '_', $current_slug );

			$responsive_icon           = apply_filters( 'responsive_page_top_icon', true );
			$responsive_visit_site_url = 'https://www.cyberchimps.com';
			$responsive_wrapper_class  = apply_filters( 'responsive_welcome_wrapper_class', array( $current_slug ) );

            $responsive_recommended_addons_screen = ( isset( $_GET['action'] ) && 'upgrade_to_pro' === $_GET['action'] ) ? true : false; //phpcs:ignore?>

			<div class="responsive-menu-page-wrapper wrap responsive-clear <?php echo esc_attr( implode( ' ', $responsive_wrapper_class ) ); ?>">
				<div class="responsive-theme-page-header">
					<div class="responsive-container responsive-flex">
						<div class="responsive-theme-title">
							<a href="<?php echo esc_url( $responsive_visit_site_url ); ?>" target="_blank" rel="noopener" >
								<?php if ( $responsive_icon ) { ?>
									<img src="<?php echo esc_url( RESPONSIVE_THEME_URI . 'core/images/cc-responsive-wp-theme-logo.png' ); ?>" class="responsive-theme-icon" alt="<?php echo esc_attr( self::$page_title ); ?> " >
									<span class="responsive-theme-version"><?php echo esc_html( RESPONSIVE_THEME_VERSION ); ?></span>
								<?php } ?>
								<?php do_action( 'responsive_welcome_page_header_title' ); ?>
							</a>
						</div>

						<?php do_action( 'responsive_header_right_section' ); ?>

					</div>
				</div>
			</div>
			<div class="wrap responsive-theme-options-page">
				<h2 class="nav-tab-wrapper">
                    <a href="<?php echo esc_url( admin_url( 'themes.php?page=responsive' ) ); ?>" class="nav-tab get-started<?php if ( ! isset( $_GET['action'] ) || isset( $_GET['action'] ) && 'upgrade_to_pro' != $_GET['action'] ) echo ' nav-tab-active';//phpcs:ignore ?>">
						<?php esc_html_e( 'Get Started', 'responsive' ); ?>
					</a>
                    <a href="<?php echo esc_url( add_query_arg( array( 'action' => 'upgrade_to_pro' ), admin_url( 'themes.php?page=responsive' ) ) ); ?>" class="nav-tab upgrade_to_pro<?php if ( $responsive_recommended_addons_screen ) echo ' nav-tab-active';//phpcs:ignore ?>"><?php esc_html_e( 'Free Vs Pro ', 'responsive' );?>&#9733;</a>
				</h2>
				<?php do_action( 'responsive_menu_' . esc_attr( $current_slug ) . '_action' ); ?>
			</div>
			<?php
		}

		/**
		 * Include general page
		 *
		 * @since 4.0.3
		 */
		public static function general_page() {
			require_once RESPONSIVE_THEME_DIR . 'admin/templates/get-started.php';
		}

		/**
		 * Include general page
		 *
		 * @since 4.0.3
		 */
		public static function upgrade_to_pro_page() {
			require_once RESPONSIVE_THEME_DIR . 'admin/templates/free-vs-pro.php';
		}

		/**
		 * Include Welcome page right starter sites content
		 *
		 * @since 4.0.3
		 */
		public static function responsive_welcome_page_starter_sites_section() {
			?>

			<div class="postbox responsive-import-starter-sites-section">
				<h2 class="handle">
					<span><?php echo esc_html( apply_filters( 'responsive_sites_menu_page_title', __( 'Import a website template(FREE)', 'responsive' ) ) ); ?></span>
				</h2>
				<img class="responsive-starter-sites-img" src="<?php echo esc_url( RESPONSIVE_THEME_URI . 'images/responsive-starter-sites.png' ); ?>">
				<div class="inside">
					<p>
						<?php
						esc_html_e( 'Install Responsive Starter Templates for Gutenberg & Elementor to get ready-to-use website templates that can be imported with one click.', 'responsive' );
						?>
                        <?php echo Responsive_Plugin_Install_Helper::instance()->get_button_html( 'responsive-add-ons' ); //phpcs:ignore ?>
						<?php
						$responsive_facebook_group_link      = 'https://wordpress.org/plugins/responsive-add-ons';
						$responsive_facebook_group_link_text = __( 'Learn More &raquo;', 'responsive' );

						printf(
							'%1$s',
							! empty( $responsive_facebook_group_link ) ? '<p><a href=' . esc_url( $responsive_facebook_group_link ) . ' target="_blank" rel="noopener">' . esc_html( $responsive_facebook_group_link_text ) . '</a></p>' :
							esc_html( $responsive_facebook_group_link_text )
						);
						?>
					</p>
					<div>
					</div>
				</div>
			</div>

			<?php
		}

		/**
		 * Include support section on right side of the Responsive Options page
		 *
		 * @since 4.0.3
		 */
		public static function responsive_welcome_page_support_section() {
			?>

			<div class="postbox responsive-support-section">
				<h2 class="handle">
					<span><?php esc_html_e( 'Support', 'responsive' ); ?></span>
				</h2>
				<div class="inside">
					<p>
						<?php esc_html_e( 'Have questions? Get in touch with us. We\'ll be happy to help', 'responsive' ); ?>
					</p>
					<?php
					$responsive_support_link           = 'https://wordpress.org/support/theme/responsive/';
					$responsive_support_link_link_text = __( 'Request Support &raquo;', 'responsive' );

					printf(
						/* translators: %1$s: Responsive Support link. */
						'%1$s',
						! empty( $responsive_support_link ) ? '<a href=' . esc_url( $responsive_support_link ) . ' target="_blank" rel="noopener">' . esc_html( $responsive_support_link_link_text ) . '</a>' :
							esc_html( $responsive_support_link_link_text )
					);
					?>
				</div>
			</div>
			<?php
		}

		/**
		 * Include Welcome page content
		 *
		 * @since 1.2.4
		 */
		public static function responsive_welcome_page_content() {

			// Quick settings.
			$quick_settings = apply_filters(
				'responsive_quick_settings',
				array(
					'change-layout' => array(
						'title'     => __( 'Change site layout', 'responsive' ),
						'dashicon'  => 'dashicons-welcome-widgets-menus',
						'quick_url' => admin_url( 'customize.php?autofocus[section]=responsive_layout' ),
					),
					'typography'    => array(
						'title'     => __( 'Customize fonts/typography', 'responsive' ),
						'dashicon'  => 'dashicons-editor-textcolor',
						'quick_url' => admin_url( 'customize.php?autofocus[section]=responsive_typography' ),
					),
					'logo-favicon'  => array(
						'title'     => __( 'Upload logo & site icon', 'responsive' ),
						'dashicon'  => 'dashicons-format-image',
						'quick_url' => admin_url( 'customize.php?autofocus[section]=title_tagline' ),
					),
					'navigation'    => array(
						'title'     => __( 'Add/edit navigation menu', 'responsive' ),
						'dashicon'  => 'dashicons-menu',
						'quick_url' => admin_url( 'customize.php?autofocus[panel]=nav_menus' ),
					),
					'header'        => array(
						'title'     => __( 'Customize header options', 'responsive' ),
						'dashicon'  => 'dashicons-editor-table',
						'quick_url' => admin_url( 'customize.php?autofocus[panel]=responsive_header' ),
					),
					'footer'        => array(
						'title'     => __( 'Customize footer options', 'responsive' ),
						'dashicon'  => 'dashicons-editor-table',
						'quick_url' => admin_url( 'customize.php?autofocus[panel]=responsive_footer' ),
					),
					'blog-layout'   => array(
						'title'     => __( 'Update blog layout', 'responsive' ),
						'dashicon'  => 'dashicons-welcome-write-blog',
						'quick_url' => admin_url( 'customize.php?autofocus[section]=responsive_blog_layout' ),
					),
					'page'          => array(
						'title'     => __( 'Update page layout', 'responsive' ),
						'dashicon'  => 'dashicons-welcome-widgets-menus',
						'quick_url' => admin_url( 'customize.php?autofocus[section]=responsive_page_layout' ),
					),
				)
			);
			?>
			<div class="postbox responsive-quick-setting-section">
				<h2 class="handle"><span><?php esc_html_e( 'Quick Start:', 'responsive' ); ?></span></h2>
				<div class="responsive-quick-setting-section-inner">
					<?php
					if ( ! empty( $quick_settings ) ) :
						?>
						<div class="responsive-quick-links">
							<ul class="responsive-flex">
								<?php
								foreach ( (array) $quick_settings as $key => $link ) {
									echo '<li class=""><span class="dashicons ' . esc_attr( $link['dashicon'] ) . '"></span><a class="responsive-quick-setting-title" href="' . esc_url( $link['quick_url'] ) . '" target="_blank" rel="noopener">' . esc_html( $link['title'] ) . '</a></li>';
								}
								?>
							</ul>
						</div>
					<?php endif; ?>
				</div>
			</div>

			<div class="postbox">
				<h2 class="handle"><?php esc_html_e( 'Community', 'responsive' ); ?></h2>
				<div class="responsive-documentation-section">
					<div class="resposive-documentation">
						<p>
							<?php esc_html_e( 'Meet the Responsive Power-users. Say hello, ask questions, give feedback, and help each other', 'responsive' ); ?>
						</p>
						<?php
						$responsive_facebook_group_link      = 'https://www.facebook.com/groups/responsive.theme';
						$responsive_facebook_group_link_text = __( 'Join Facebook Group &raquo;', 'responsive' );

						printf(
							'%1$s',
							! empty( $responsive_facebook_group_link ) ? '<a href=' . esc_url( $responsive_facebook_group_link ) . ' target="_blank" rel="noopener">' . esc_html( $responsive_facebook_group_link_text ) . '</a>' :
								esc_html( $responsive_facebook_group_link_text )
						);
						?>
					</div>
				</div>
			</div>


			<div class="postbox">
				<h2 class="handle"><?php esc_html_e( 'Feedback', 'responsive' ); ?></h2>
				<div class="responsive-review-section">
					<div class="responsive-review">
						<p>
							<?php esc_html_e( 'Hi! Thanks for using the Responsive theme. Can you please do us a favor and give us a 5-star rating? Your feedback keeps us motivated and helps us grow the Responsive community.', 'responsive' ); ?>
						</p>
						<?php
						$responsive_submit_review_link      = 'https://wordpress.org/support/theme/responsive/reviews/#new-post';
						$responsive_submit_review_link_text = __( 'Submit Review &raquo;', 'responsive' );

						printf(
							'%1$s',
							! empty( $responsive_submit_review_link ) ? '<a href=' . esc_url( $responsive_submit_review_link ) . ' target="_blank" rel="noopener">' . esc_html( $responsive_submit_review_link_text ) . '</a>' :
								esc_html( $responsive_submit_review_link_text )
						);
						?>
					</div>
				</div>
			</div>

			<?php
		}

		/**
		 * Responsive Header Right Section Links
		 *
		 * @since 4.0.3
		 */
		public static function top_header_right_section() {

			$top_links = apply_filters(
				'responsive_header_top_links',
				array(
					'responsive-theme-info' => array(
						'title' => __( 'Blazing Fast, mobile-friendly, fully-customizable WordPress theme.', 'responsive' ),
					),
				)
			);

			if ( ! empty( $top_links ) ) {
				?>
				<div class="responsive-top-links">
					<ul>
						<?php
						foreach ( (array) $top_links as $key => $info ) {
							if ( isset( $info['url'] ) ) {
								printf(
									/* translators: %1$s: Top Link URL wrapper, %2$s: Top Link URL, %3$s: Top Link URL target attribute */
									'<li><%1$s %2$s %3$s > %4$s </%1$s>',
									'a',
									'href="' . esc_url( $info['url'] ) . '"',
									'target="_blank" rel="noopener"',
									esc_html( $info['title'] )
								);
							} else {
								printf(
									/* translators: %1$s: Top Link URL wrapper, %2$s: Top Link URL, %3$s: Top Link URL target attribute */
									'<li><%1$s %2$s %3$s > %4$s </%1$s>',
									'span',
									'',
									'',
									esc_html( $info['title'] )
								);
							}
						}
						?>
					</ul>
				</div>
				<?php
			}
		}
	}

	new Responsive_Admin_Settings();
}
