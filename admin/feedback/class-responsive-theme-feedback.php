<?php
/**
 * Responsive Theme — Feedback Popup.
 *
 * Asks a single open-ended question when an administrator visits
 * Appearance > Themes > Add New Theme while Responsive (or a Responsive child
 * theme) is active. Built to the "Responsive Theme Feedback Popup" requirement
 * document (FP-01 to FP-05).
 *
 * Two display modes (see DISPLAY below):
 * - 'popup'  : Neve-style panel docked to the bottom-right corner (default).
 * - 'notice' : the same question inside a standard, dismissible WordPress admin
 *              notice printed on the admin_notices hook. Use this if the
 *              WordPress.org Theme Review Team asks for core notice UI.
 *
 * WordPress.org theme guideline notes:
 * - Nothing is emailed unless the user types an answer and clicks "Send".
 * - The popup tells the user exactly what the email contains before they send it.
 * - The website address is added to the email only if the user ticks "Include my website address" (unchecked by default).
 * - It is non-blocking, loads only on Add New Theme, and only for users who can install themes.
 * - It never shows again after Send, and by default never again after Skip/dismiss.
 *
 * @package Responsive
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Theme_Feedback' ) ) :

	/**
	 * Class Responsive_Theme_Feedback
	 */
	class Responsive_Theme_Feedback {

		/**
		 * Member Variable
		 *
		 * @var object instance
		 */
		private static $instance;

		/**
		 * Initiator
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		/**
		 * User meta key. Stores array( 'status' => 'sent'|'skipped', 'time' => int ).
		 */
		const META_KEY = 'responsive_theme_feedback';

		/**
		 * AJAX action name.
		 */
		const ACTION = 'responsive_theme_feedback';

		/**
		 * Admin screen ID of Appearance > Themes > Add New Theme.
		 */
		const SCREEN = 'theme-install';

		/**
		 * Inbox that receives answers, emailed from the user's site with wp_mail().
		 * Temporary: switch to the support inbox before release. Nothing shows while this is empty.
		 */
		const EMAIL = 'support@cyberchimps.com';

		/**
		 * User meta key set when the Starter Templates warning on Add New Theme is dismissed.
		 */
		const WARNING_META_KEY = 'responsive_rst_switch_warning_dismissed';

		/**
		 * AJAX action that dismisses the Starter Templates warning.
		 */
		const WARNING_ACTION = 'responsive_rst_switch_warning_dismiss';

		/**
		 * Display mode: 'popup' (bottom-right panel) or 'notice' (dismissible admin notice).
		 */
		const DISPLAY = 'popup';

		/**
		 * Boot hooks.
		 */
		public function __construct() {
			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );
			add_action( 'admin_notices', array( $this, 'render_notice' ) );
			// 'admin_footer' runs before footer scripts print, so the markup exists when the JS runs.
			add_action( 'admin_footer', array( $this, 'render_popup' ) );
			add_action( 'wp_ajax_' . self::ACTION, array( $this, 'handle_ajax' ) );

			// Starter Templates warning on Appearance > Themes > Add New Theme.
			add_action( 'admin_notices', array( $this, 'render_switch_warning' ) );
			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_switch_warning' ) );
			add_action( 'wp_ajax_' . self::WARNING_ACTION, array( $this, 'dismiss_switch_warning' ) );
		}

		/**
		 * Whether to show the Starter Templates warning.
		 * It appears on Add New Theme, i.e. right after the user clicks "Add New Theme".
		 *
		 * @return bool
		 */
		private static function should_show_switch_warning() {
			$screen = function_exists( 'get_current_screen' ) ? get_current_screen() : null;

			return $screen
				&& self::SCREEN === $screen->id
				&& 'responsive' === get_template()
				&& current_user_can( 'switch_themes' )
				&& self::has_starter_templates()
				&& ! get_user_meta( get_current_user_id(), self::WARNING_META_KEY, true );
		}

		/**
		 * Standard WordPress warning notice at the top of Add New Theme.
		 */
		public static function render_switch_warning() {
			if ( ! self::should_show_switch_warning() ) {
				return;
			}
			?>
			<div class="notice notice-warning is-dismissible" id="responsive-rst-switch-warning" data-nonce="<?php echo esc_attr( wp_create_nonce( self::WARNING_ACTION ) ); ?>">
				<p><?php esc_html_e( 'Looks like you have a Responsive Starter Template installed. It may not look/work like the demo site with another theme.', 'responsive' ); ?></p>
			</div>
			<?php
		}

		/**
		 * Remember the dismissal (WordPress.org requires notices to be permanently dismissible).
		 *
		 * @param string $hook_suffix Current admin page.
		 */
		public static function enqueue_switch_warning( $hook_suffix ) {
			if ( 'theme-install.php' !== $hook_suffix || ! self::should_show_switch_warning() ) {
				return;
			}

			$ajax_url = wp_json_encode( admin_url( 'admin-ajax.php' ) );
			$action   = wp_json_encode( self::WARNING_ACTION );

			$script = <<<JS
document.addEventListener( 'click', function ( e ) {
	if ( ! e.target.closest || ! e.target.closest( '#responsive-rst-switch-warning .notice-dismiss' ) ) {
		return;
	}
	var n = document.getElementById( 'responsive-rst-switch-warning' );
	var d = new FormData();
	d.append( 'action', {$action} );
	d.append( 'nonce', n.getAttribute( 'data-nonce' ) );
	fetch( {$ajax_url}, { method: 'POST', credentials: 'same-origin', body: d } ).catch( function () {} );
} );
JS;

			wp_add_inline_script( 'common', $script );
		}

		/**
		 * AJAX: dismiss the Starter Templates warning for this user.
		 */
		public static function dismiss_switch_warning() {
			check_ajax_referer( self::WARNING_ACTION, 'nonce' );

			if ( ! current_user_can( 'switch_themes' ) ) {
				wp_send_json_error( null, 403 );
			}

			update_user_meta( get_current_user_id(), self::WARNING_META_KEY, time() );
			wp_send_json_success();
		}

		/**
		 * Current display mode.
		 *
		 * @return string 'popup' or 'notice'.
		 */
		private static function display_mode() {
			/**
			 * Filter how the feedback question is displayed.
			 *
			 * @param string $mode 'popup' or 'notice'. Default self::DISPLAY.
			 */
			$mode = (string) apply_filters( 'responsive_theme_feedback_display', self::DISPLAY );
			return 'notice' === $mode ? 'notice' : 'popup';
		}

		/**
		 * FP-01 / FP-05: whether the question should show for the current user.
		 *
		 * @return bool
		 */
		private static function should_show() {
			// Responsive (parent or child theme) must be the active theme.
			if ( 'responsive' !== get_template() ) {
				return false;
			}

			if ( ! current_user_can( 'install_themes' ) ) {
				return false;
			}

			// On multisite, themes are installed from Network Admin, not per site.
			if ( is_multisite() ) {
				return false;
			}

			// No valid inbox means answers could not be delivered, so don't ask.
			if ( ! is_email( self::recipient() ) ) {
				return false;
			}

			$state = get_user_meta( get_current_user_id(), self::META_KEY, true );

			if ( is_array( $state ) && ! empty( $state['status'] ) ) {
				// After Send: never again.
				if ( 'sent' === $state['status'] ) {
					return false;
				}

				// After Skip: never again by default, or again after X days.
				if ( 'skipped' === $state['status'] ) {
					$days = self::skip_days();
					if ( 0 === $days ) {
						return false;
					}
					$time = isset( $state['time'] ) ? (int) $state['time'] : 0;
					if ( time() < $time + ( $days * DAY_IN_SECONDS ) ) {
						return false;
					}
				}
			}

			/**
			 * Filter whether the feedback question is enabled.
			 *
			 * @param bool $enabled Default true.
			 */
			return (bool) apply_filters( 'responsive_theme_feedback_enabled', true );
		}

		/**
		 * Days before the question may show again after Skip. 0 = never again.
		 *
		 * @return int
		 */
		private static function skip_days() {
			/**
			 * Filter how many days to wait before showing the question again after Skip.
			 *
			 * @param int $days Default 0 (never show again).
			 */
			return max( 0, (int) apply_filters( 'responsive_theme_feedback_skip_days', 0 ) );
		}

		/**
		 * Whether the current admin screen is Add New Theme.
		 *
		 * @return bool
		 */
		private static function is_screen() {
			$screen = function_exists( 'get_current_screen' ) ? get_current_screen() : null;
			return $screen && self::SCREEN === $screen->id;
		}

		/**
		 * Whether the Responsive Starter Templates plugin is installed and active.
		 *
		 * @return bool
		 */
		private static function has_starter_templates() {
			if ( ! function_exists( 'is_plugin_active' ) ) {
				require_once ABSPATH . 'wp-admin/includes/plugin.php';
			}
			return is_plugin_active( 'responsive-add-ons/responsive-add-ons.php' ) || class_exists( 'Responsive_Add_Ons' );
		}

		/**
		 * FP-03: inbox that receives the feedback email.
		 *
		 * @return string
		 */
		private static function recipient() {
			/**
			 * Filter the inbox that receives feedback emails.
			 *
			 * @param string $email Default self::EMAIL.
			 */
			return (string) apply_filters( 'responsive_theme_feedback_email', self::EMAIL );
		}

		/**
		 * Load CSS/JS on Add New Theme only, so no other admin page is affected.
		 *
		 * @param string $hook_suffix Current admin page.
		 */
		public static function enqueue( $hook_suffix ) {
			if ( 'theme-install.php' !== $hook_suffix || ! self::should_show() ) {
				return;
			}

			$version = wp_get_theme( get_template() )->get( 'Version' );
			$base    = get_template_directory_uri() . '/admin/feedback/';

			wp_enqueue_style( 'responsive-theme-feedback', $base . 'feedback.css', array(), $version );
			wp_enqueue_script( 'responsive-theme-feedback', $base . 'feedback.js', array(), $version, true );

			wp_localize_script(
				'responsive-theme-feedback',
				'responsiveThemeFeedback',
				array(
					'ajaxUrl'      => admin_url( 'admin-ajax.php' ),
					'action'       => self::ACTION,
					'nonce'        => wp_create_nonce( self::ACTION ),
					'dismissAfter' => 3000, // FP-03: thank-you message auto-dismisses after 3 seconds.
				)
			);
		}

		/**
		 * Popup mode: Neve-style panel in the bottom-right corner.
		 */
		public static function render_popup() {
			if ( 'popup' !== self::display_mode() || ! self::is_screen() || ! self::should_show() ) {
				return;
			}
			?>
			<div class="rtf-backdrop" id="rtf-root" data-rtf-mode="popup" hidden>
				<div class="rtf-popup" role="dialog" aria-modal="false" aria-labelledby="rtf-heading" aria-describedby="rtf-subtext">
					<?php self::render_inner(); ?>
				</div>
			</div>
			<?php
		}

		/**
		 * Notice mode: standard dismissible admin notice (core notice UI).
		 */
		public static function render_notice() {
			if ( 'notice' !== self::display_mode() || ! self::is_screen() || ! self::should_show() ) {
				return;
			}
			?>
			<div class="notice notice-info is-dismissible hide-if-no-js rtf-notice" id="rtf-root" data-rtf-mode="notice">
				<?php self::render_inner(); ?>
			</div>
			<?php
		}

		/**
		 * FP-02: shared form markup with the approved copy.
		 */
		private static function render_inner() {
			$privacy_url = (string) apply_filters( 'responsive_theme_feedback_privacy_url', 'https://cyberchimps.com/privacy-policy/' );
			?>
			<form class="rtf-form" id="rtf-form" novalidate>
				<h2 id="rtf-heading"><?php esc_html_e( 'One quick question', 'responsive' ); ?></h2>
				<p id="rtf-subtext" class="rtf-subtext"><?php esc_html_e( 'Takes 20 seconds. A real person on the Responsive team reads every answer.', 'responsive' ); ?></p>


				<label for="rtf-answer" class="screen-reader-text"><?php esc_html_e( 'One quick question', 'responsive' ); ?></label>
				<textarea id="rtf-answer" name="details" rows="4" maxlength="1000" placeholder="<?php esc_attr_e( 'Tell us in your own words. There are no wrong answers.', 'responsive' ); ?>"></textarea>

				<div class="rtf-actions">
					<button type="button" class="rtf-skip" data-rtf-skip><?php esc_html_e( 'Skip', 'responsive' ); ?></button>
					<button type="submit" class="button button-primary" data-rtf-send disabled><?php esc_html_e( 'Send', 'responsive' ); ?></button>
				</div>

				<details class="rtf-privacy">
					<summary><?php esc_html_e( 'What info do we collect?', 'responsive' ); ?></summary>
					<p>
						<?php
						printf(
							/* translators: %s: privacy policy link. */
							esc_html__( 'When you click Send, only your answer is emailed to the Responsive support team. We don’t collect your website address or any other details, but the email is sent from your site, so its sender address may show your domain. %s', 'responsive' ),
							'<a href="' . esc_url( $privacy_url ) . '" target="_blank" rel="noopener noreferrer">' . esc_html__( 'Privacy policy', 'responsive' ) . '</a>'
						);
						?>
					</p>
				</details>
			</form>

			<p class="rtf-thanks" role="status" hidden><?php esc_html_e( 'Thanks, this genuinely helps us.', 'responsive' ); ?></p>
			<?php
		}

		/**
		 * FP-03 / FP-04 / FP-05: handle Send and Skip.
		 */
		public static function handle_ajax() {
			check_ajax_referer( self::ACTION, 'nonce' );

			if ( ! current_user_can( 'install_themes' ) ) {
				wp_send_json_error( null, 403 );
			}

			$type    = isset( $_POST['type'] ) ? sanitize_key( wp_unslash( $_POST['type'] ) ) : 'skip';
			$user_id = get_current_user_id();

			// FP-04: Skip (or dismissing the notice) records the skip and submits nothing.
			if ( 'send' !== $type ) {
				update_user_meta( $user_id, self::META_KEY, array( 'status' => 'skipped', 'time' => time() ) );
				wp_send_json_success();
			}

			$details = isset( $_POST['details'] ) ? sanitize_textarea_field( wp_unslash( $_POST['details'] ) ) : '';
			$details = trim( mb_substr( $details, 0, 1000 ) );

			// Empty answers are not accepted (the Send button is also disabled until text is typed).
			if ( '' === $details ) {
				wp_send_json_error( null, 400 );
			}

			update_user_meta( $user_id, self::META_KEY, array( 'status' => 'sent', 'time' => time() ) );

			$payload = array(
				'details' => $details,
				//'version' => wp_get_theme( get_template() )->get( 'Version' ),
			);

			// Website address only with explicit opt-in (checkbox is unchecked by default).
			if ( isset( $_POST['include_url'] ) && '1' === sanitize_key( wp_unslash( $_POST['include_url'] ) ) ) {
				$payload['site_url'] = esc_url_raw( home_url( '/' ) );
			}

			/**
			 * Fires after feedback is sent, for local logging if wanted.
			 *
			 * @param array $payload Sanitized feedback.
			 */
			do_action( 'responsive_theme_feedback_submitted', $payload );

			// Fixed subject: user input never goes into email headers.
			$subject = sprintf( '[Responsive feedback from Responsive theme switch form]' );

			$body  = "New answer from the Responsive theme feedback popup (Add New Theme screen).\n\n";
			$body .= "Question: One quick question\n\n";
			$body .= "Answer:\n" . $payload['details'] . "\n\n";

			// Fail silently: the user sees the thank-you message whether or not mail is delivered.
			wp_mail( self::recipient(), $subject, $body, array( 'Content-Type: text/plain; charset=UTF-8' ) );

			wp_send_json_success();
		}
	}

	Responsive_Theme_Feedback::get_instance();

endif;