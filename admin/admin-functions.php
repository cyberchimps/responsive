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
	wp_register_script( 'responsive-plugin-notices-handler', trailingslashit( get_template_directory_uri() ) . '/admin/js/notices.js', array( 'jquery' ), true, RESPONSIVE_THEME_VERSION );
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
 * Include Welcome page right starter sites content
 *
 * @since 4.0.3
 */
function responsive_welcome_banner_notice() {
	if ( isset( $_GET['page'] ) && 'responsive' === $_GET['page'] ) {
		return;
	}
	if ( '1' !== get_option( 'responsive-readysite-promotion' ) ) {
		?>

	<?php echo Responsive_Plugin_Install_Helper::instance()->get_rateus_content( 'responsive-add-ons' ); //phpcs:ignore ?>
	<div class="postbox responsive-sites-active" id="responsive-sites-active">
		<div class="responsive-notice-image">
			<img class="responsive-starter-sites-img" src="<?php echo esc_url( RESPONSIVE_THEME_URI . 'images/responsive-thumbnail.jpg' ); ?>">
		</div>
		<div class="responsive-notice-content">
			<h2 class="handle">
				<span><?php echo esc_html( apply_filters( 'responsive_sites_menu_page_title', __( 'Thank You for installing Responsive', 'responsive' ) ) ); ?></span>
			</h2>
				<p>
					You can get a fully functional ready site with Responsive. Browse 100+ <a href="<?php echo esc_url( 'https://cyberchimps.com/wordpress-themes/?utm_source=wordpress-install-notice&utm_medium=button&utm_campaign=ready-site-templates' ); ?>" target="_blank" rel="noopener">ready site templates</a> Install the Responsive Starter Templates plugin to get started.
					<?php echo Responsive_Plugin_Install_Helper::instance()->get_button_html( 'responsive-add-ons' ); //phpcs:ignore ?>
				</p>
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

if ( ! class_exists( 'Responsive_Addons_Pro' ) ) {
	require get_template_directory() . '/core/includes/custom-fonts/class-responsive-custom-fonts-taxonomy.php';
	add_action( 'admin_enqueue_scripts', 'responsive_custom_fonts_admin_scripts' );

	if ( ! function_exists( 'responsive_custom_fonts_admin_scripts' ) ) {
		/**
		 * Responsive Custom Fonts
		 *
		 * @since 4.9.9
		 */
		function responsive_custom_fonts_admin_scripts() {
			wp_enqueue_media();
			wp_enqueue_script( 'responsive-custom-fonts-js', get_template_directory_uri() . '/core/includes/custom-fonts/assets/js/responsive-custom-fonts.js', array(), RESPONSIVE_THEME_VERSION, true );
			wp_enqueue_style( 'responsive-custom-fonts-css', get_template_directory_uri() . '/core/includes/custom-fonts/assets/css/responsive-custom-fonts.css', array(), RESPONSIVE_THEME_VERSION );
		}
	}

	add_action( 'admin_menu', 'responsive_register_custom_fonts_menu', 101 );

	if ( ! function_exists( 'responsive_register_custom_fonts_menu' ) ) {
		/**
		 * Register custom font menu
		 *
		 * @since 4.9.9
		 */
		function responsive_register_custom_fonts_menu() {

			$title = apply_filters( 'responsive_custom_fonts_menu_title', __( 'Custom Fonts', 'responsive' ) );
			add_submenu_page(
				'themes.php',
				$title,
				$title,
				Responsive_Custom_Fonts_Taxonomy::$capability,
				'edit-tags.php?taxonomy=' . Responsive_Custom_Fonts_Taxonomy::$register_taxonomy_slug
			);

		}
	}

	add_action( 'admin_head', 'responsive_custom_fonts_menu_highlight' );

	if ( ! function_exists( 'responsive_custom_fonts_menu_highlight' ) ) {
		/**
		 * Highlight custom font menu
		 *
		 * @since 4.9.9
		 */
		function responsive_custom_fonts_menu_highlight() {
			global $parent_file, $submenu_file;

			if ( 'edit-tags.php?taxonomy=' . Responsive_Custom_Fonts_Taxonomy::$register_taxonomy_slug === $submenu_file ) {
				$parent_file = 'themes.php'; // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
			}
			if ( get_current_screen()->id != 'edit-' . Responsive_Custom_Fonts_Taxonomy::$register_taxonomy_slug ) {
				return;
			}

			?>
			<style>#addtag div.form-field.term-slug-wrap, #edittag tr.form-field.term-slug-wrap { display: none; }
				#addtag div.form-field.term-description-wrap, #edittag tr.form-field.term-description-wrap { display: none; }</style><script>jQuery( document ).ready( function( $ ) {
					var $wrapper = $( '#addtag, #edittag' );
					$wrapper.find( 'tr.form-field.term-name-wrap p, div.form-field.term-name-wrap > p' ).text( '<?php esc_html_e( 'The name of the font as it appears in the customizer options.', 'responsive' ); ?>' );
				} );</script>
				<?php
		}
	}

	add_filter( 'manage_edit-' . Responsive_Custom_Fonts_Taxonomy::$register_taxonomy_slug . '_columns',  'responsive_theme_manage_columns' );

	if ( ! function_exists( 'responsive_theme_manage_columns' ) ) {
		/**
		 * Manage Columns
		 *
		 * @since 4.9.9
		 * @param array $columns default columns.
		 * @return array $columns updated columns.
		 */
		function responsive_theme_manage_columns( $columns ) {

			$screen = get_current_screen();
			// If current screen is add new custom fonts screen.
			if ( isset( $screen->base ) && 'edit-tags' == $screen->base ) {

				$old_columns = $columns;
				$columns     = array(
					'cb'   => $old_columns['cb'],
					'name' => $old_columns['name'],
				);

			}
			return $columns;
		}
	}

	add_action( Responsive_Custom_Fonts_Taxonomy::$register_taxonomy_slug . '_add_form_fields',  'add_new_taxonomy_data' );

	if ( ! function_exists( 'add_new_taxonomy_data' ) ) {
		/**
		 * Add new Taxonomy data
		 *
		 * @since 4.9.9
		 */
		function add_new_taxonomy_data() {
			responsive_theme_font_file_new_field( 'font_woff_2', __( 'Upload Font', 'responsive' ), __( 'Allowed Font types are .woff2, .woff, .ttf, .eot, .svg, .otf', 'responsive' ) );

			responsive_theme_select_new_field(
				'font-display',
				__( 'Font Display', 'responsive' ),
				__( 'Select font-display property for this font', 'responsive' ),
				array(
					'auto'     => 'auto',
					'block'    => 'block',
					'swap'     => 'swap',
					'fallback' => 'fallback',
					'optional' => 'optional',
				)
			);
		}
	}

	if ( ! function_exists( 'responsive_theme_font_file_new_field' ) ) {
		/**
		 * Add Taxonomy data field
		 *
		 * @since 4.9.9
		 * @param int    $id current term id.
		 * @param string $title font type title.
		 * @param string $description title font type description.
		 * @param string $value title font type meta values.
		 */
		function responsive_theme_font_file_new_field( $id, $title, $description, $value = '' ) {
			?>
			<div class="responsive-custom-fonts-file-wrap form-field term-<?php echo esc_attr( $id ); ?>-wrap" >

				<label for="font-<?php echo esc_attr( $id ); ?>"><?php echo esc_html( $title ); ?></label>
				<input type="text" id="font-<?php echo esc_attr( $id ); ?>" class="responsive-custom-fonts-link <?php echo esc_attr( $id ); ?>" name="<?php echo esc_attr( Responsive_Custom_Fonts_Taxonomy::$register_taxonomy_slug ); ?>[<?php echo esc_attr( $id ); ?>]" value="<?php echo esc_attr( $value ); ?>" />
				<a href="#" class="responsive-custom-fonts-upload button" data-upload-type="<?php echo esc_attr( $id ); ?>">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-upload" viewBox="0 0 16 16">
					<path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
					<path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"/>
				</svg>
				</a>
				<p><?php echo esc_html( $description ); ?></p>
			</div>
			<?php
		}
	}

	if ( ! function_exists( 'responsive_theme_select_new_field' ) ) {
		/**
		 * Render select field for the new font screen.
		 *
		 * @param String $id Field ID.
		 * @param String $title Field Title.
		 * @param String $description Field Description.
		 * @param Array  $select_fields Select fields as Array.
		 * @return void
		 */
		function responsive_theme_select_new_field( $id, $title, $description, $select_fields ) {
			?>
			<div class="responsive-custom-fonts-file-wrap form-field term-<?php echo esc_attr( $id ); ?>-wrap" >
				<label for="font-<?php echo esc_attr( $id ); ?>"><?php echo esc_html( $title ); ?></label>
				<select type="select" id="font-<?php echo esc_attr( $id ); ?>" class="responsive-custom-font-select-field <?php echo esc_attr( $id ); ?>" name="<?php echo esc_attr( Responsive_Custom_Fonts_Taxonomy::$register_taxonomy_slug ); ?>[<?php echo esc_attr( $id ); ?>]" />
					<?php
					foreach ( $select_fields as $key => $value ) {
						?>
						<option value="<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $value ); ?></option>;
					<?php } ?>
				</select>
			</div>
			<?php
		}
	}

	add_action( Responsive_Custom_Fonts_Taxonomy::$register_taxonomy_slug . '_edit_form_fields',  'responsive_theme_edit_taxonomy_data' );

	if ( ! function_exists( 'responsive_theme_edit_taxonomy_data' ) ) {
		/**
		 * Edit Taxonomy data
		 *
		 * @since 1.0.0
		 * @param object $term taxonomy terms.
		 */
		function responsive_theme_edit_taxonomy_data( $term ) {

			$data = Responsive_Custom_Fonts_Taxonomy::get_font_links( $term->term_id );
			responsive_theme_font_file_new_field( 'font_woff_2', __( 'Upload Font', 'responsive' ), $data['font_woff_2'], __( 'Allowed Font types are .woff2, .woff, .ttf, .eot, .svg, .otf', 'responsive' ) );

			responsive_theme_select_new_field(
				'font-display',
				__( 'Font Display', 'responsive' ),
				$data['font-display'],
				__( 'Select font-display property for this font', 'responsive' ),
				array(
					'auto'     => 'Auto',
					'block'    => 'Block',
					'swap'     => 'Swap',
					'fallback' => 'Fallback',
					'optional' => 'Optional',
				)
			);
		}
	}

	add_action( 'edited_' . Responsive_Custom_Fonts_Taxonomy::$register_taxonomy_slug, 'responsive_theme_save_metadata' );
	add_action( 'create_' . Responsive_Custom_Fonts_Taxonomy::$register_taxonomy_slug, 'responsive_theme_save_metadata' );

	if ( ! function_exists( 'responsive_theme_save_metadata' ) ) {
		/**
		 * Save Taxonomy meta data value
		 *
		 * @since 4.9.9
		 * @param int $term_id current term id.
		 */
		function responsive_theme_save_metadata( $term_id ) {

			if ( ! current_user_can( 'manage_options' ) ) {
				return;
			}

			if ( isset( $_POST[ Responsive_Custom_Fonts_Taxonomy::$register_taxonomy_slug ] ) ) {// phpcs:ignore WordPress.Security.NonceVerification.Missing
				$value = array_map( 'esc_attr', $_POST[ Responsive_Custom_Fonts_Taxonomy::$register_taxonomy_slug ] ); // phpcs:ignore WordPress.Security.NonceVerification.Missing
				Responsive_Custom_Fonts_Taxonomy::update_font_links( $value, $term_id );
			}
		}
	}

	add_filter( 'upload_mimes', 'responsive_theme_add_fonts_to_allowed_mimes' );

	if ( ! function_exists( 'responsive_theme_add_fonts_to_allowed_mimes' ) ) {
		/**
		 * Allowed mime types and file extensions
		 *
		 * @since 4.9.9
		 * @param array $mimes Current array of mime types.
		 * @return array $mimes Updated array of mime types.
		 */
		function responsive_theme_add_fonts_to_allowed_mimes( $mimes ) {
			$mimes['woff']  = 'application/x-font-woff';
			$mimes['woff2'] = 'application/x-font-woff2';
			$mimes['ttf']   = 'application/x-font-ttf';
			$mimes['svg']   = 'image/svg+xml';
			$mimes['eot']   = 'application/vnd.ms-fontobject';
			$mimes['otf']   = 'font/otf';

			return $mimes;
		}
	}

	add_filter( 'wp_check_filetype_and_ext', 'responsive_theme_update_mime_types', 10, 3 );

	if ( ! function_exists( 'responsive_theme_update_mime_types' ) ) {
		/**
		 * Correct the mome types and extension for the font types.
		 *
		 * @param array  $defaults File data array containing 'ext', 'type', and
		 *                                          'proper_filename' keys.
		 * @param string $file                      Full path to the file.
		 * @param string $filename                  The name of the file (may differ from $file due to
		 *                                          $file being in a tmp directory).
		 * @return Array File data array containing 'ext', 'type', and
		 */
		function responsive_theme_update_mime_types( $defaults, $file, $filename ) {
			if ( 'ttf' === pathinfo( $filename, PATHINFO_EXTENSION ) ) {
				$defaults['type'] = 'application/x-font-ttf';
				$defaults['ext']  = 'ttf';
			}

			if ( 'otf' === pathinfo( $filename, PATHINFO_EXTENSION ) ) {
				$defaults['type'] = 'application/x-font-otf';
				$defaults['ext']  = 'otf';
			}

			return $defaults;
		}
	}
}
