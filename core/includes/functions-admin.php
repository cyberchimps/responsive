<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Theme options upgrade bar
 */
function responsive_upgrade_bar() {
	?>

	<!--  <div class="upgrade-callout">
		<p class="responsivepro-offer"><img src="<?php echo get_template_directory_uri(); ?>/core/includes/theme-options/images/chimp.png" alt="CyberChimps"/>
			<?php printf( __( '%1$s Such Free Themes By CyberChimps</span>', 'responsive' ),
						    ' <a href="https://cyberchimps.com/10-free-responsive-wordpress-themes/?utm_source=orgwpresponsive" target="_blank" title="CyberChimps Free Themes">Get More</a> '
			); ?>
		</p>
        <!-- <p class="responsivepro-offer">Get 30% off on Responsive Pro using Coupon Code RESPONSIVE30</p> -->		
	
	<!--</div>-->
	<div class="updated">
		<p><?php _e('Looking for More Features?','responsive');?></p>
		<p><?php _e('Check out <a href="https://cyberchimps.com/store/responsivepro/?utm_source=responsive2pro" target="_blank" title="Responsive Pro">Responsive Pro</a> & <a href="https://cyberchimps.com/product-category/upgradefromresponsive/?utm_source=responsive2pro" target="_blank" title="Responsive Pro">Premium Child Themes</a> for your Responsive Theme.','responsive'); ?></p>
	</div>
<?php
}

add_action( 'responsive_theme_options', 'responsive_upgrade_bar', 1 );

/**
 * Theme Options Support and Information
 */
function responsive_theme_support() {
	?>

	<div id="info-box-wrapper" class="grid col-940">
		<div class="info-box notice">

			<a class="button" href="<?php echo esc_url( 'http://cyberchimps.com/guides/r-free/' ); ?>" title="<?php esc_attr_e( 'Instructions', 'responsive' ); ?>" target="_blank">
				<?php _e( 'Instructions', 'responsive' ); ?></a>

			<a class="button" href="<?php echo esc_url( 'http://cyberchimps.com/forum/free/responsive/' ); ?>" title="<?php esc_attr_e( 'Help', 'responsive' ); ?>" target="_blank">
				<?php _e( 'Help', 'responsive' ); ?></a>			

				
			<a class="button button-primary" href="<?php echo esc_url( 'https://wordpress.org/support/theme/responsive/reviews/#new-post/' ); ?>" title="<?php esc_attr_e( 'Leave a star rating', 'responsive' ); ?>" target="_blank">
				<?php _e( 'Leave a star rating', 'responsive' ); ?></a>
			
			<a class="button" href="<?php echo esc_url( 'https://cyberchimps.com/contact/' ); ?>" title="<?php esc_attr_e( 'Need Customization', 'responsive' ); ?>" target="_blank">
				<?php _e( 'Need Customization?', 'responsive' ); ?></a>
							
			<a class="button" href="<?php echo esc_url( 'https://cyberchimps.com/checkout/?add-to-cart=277804' ); ?>" title="<?php esc_attr_e( 'Theme Demo Data', 'responsive' ); ?>" target="_blank">
				<?php _e( 'Theme Demo Data', 'responsive' ); ?></a>
<a class="button" href="<?php echo esc_url( 'https://cyberchimps.com/store/responsivepro#whygopro' ); ?>" title="<?php esc_attr_e('Why Go Pro?', 'responsive' ); ?>" target="_blank">	
				<?php _e( 'Why Go Pro?', 'responsive' ); ?></a>
		</div>
	</div>

<?php
}

add_action( 'responsive_theme_options', 'responsive_theme_support', 2 );

function responsive_install_plugins() {

	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

	$plugins = array(

		// This is an example of how to include a plugin pre-packaged with a theme
		array(
			'name'     => 'Responsive Add Ons', // The plugin name
			'slug'     => 'responsive-add-ons', // The plugin slug (typically the folder name)
			'required' => false
		),
		array(
			'name'     => 'SlideDeck', // The plugin name
			'slug'     => 'slidedeck', // The plugin slug (typically the folder name)
			'required' => false
		),
		array(
			'name'     => 'iFeature Slider', // The plugin name
			'slug'     => 'ifeature-slider', // The plugin slug (typically the folder name)
			'required' => false
		),
		array(
			'name'     => ' WP Legal Pages', // The plugin name
			'slug'     => 'wplegalpages', // The plugin slug (typically the folder name)
			'required' => false
		),
		array(
			'name'     => 'Elementor', // The plugin name
			'slug'     => 'elementor', // The plugin slug (typically the folder name)
			'required' => false
		),
		array(
			'name'     => 'WPForms Lite', // The plugin name
			'slug'     => 'wpforms-lite', // The plugin slug (typically the folder name)
			'required' => false
		)
			
	);

	$activeplugin = 0;

	if ( !is_plugin_active( 'ifeature-slider/ifeatureslider.php' ) ) 
		$activeplugin += 1; 
	if ( !is_plugin_active( 'responsive-add-ons/responsive-add-ons.php' ) )
		$activeplugin += 1;
	if ( !is_plugin_active( 'slidedeck/slidedeck.php' ) )
		$activeplugin += 1;	
	if ( !is_plugin_active( 'wpforms-lite/wpforms.php' ) )
		$activeplugin += 1;	
	if ( !is_plugin_active( 'elementor/elementor.php' ) )
		$activeplugin += 1;


	// Change this to your theme text domain, used for internationalising strings
	$theme_text_domain = 'responsive';

	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */

	$count = '<span class="addon-count">'.$activeplugin.'</span>';
	
	$config = array(
		'domain'           => $theme_text_domain, // Text domain - likely want to be the same as your theme.
		'default_path'     => '', // Default absolute path to pre-packaged plugins
		'parent_menu_slug' => 'themes.php', // Default parent menu slug
		'parent_url_slug'  => 'themes.php', // Default parent URL slug
		'menu'             => 'install-responsive-addons', // Menu slug
		'has_notices'      => true, // Show admin notices or not
		'is_automatic'     => true, // Automatically activate plugins after installation or not
		'message'          => '', // Message to output right before the plugins table
		'strings'          => array(
			'page_title'                      => __( 'Responsive Add Features', 'responsive' ),
			'menu_title'                      => __( 'Activate Add Ons'.$count, 'responsive' ),
			'installing'                      => __( 'Installing Plugin: %s', 'responsive' ), // %1$s = plugin name
			'oops'                            => __( 'Something went wrong with the plugin API.', 'responsive' ),
			'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'responsive' ), // %1$s = plugin name(s)
			'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'responsive' ), // %1$s = plugin name(s)
			'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'responsive' ), // %1$s = plugin name(s)
			'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'responsive' ), // %1$s = plugin name(s)
			'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'responsive' ), // %1$s = plugin name(s)
			'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'responsive' ), // %1$s = plugin name(s)
			'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'responsive' ), // %1$s = plugin name(s)
			'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'responsive' ), // %1$s = plugin name(s)
			'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'responsive' ),
			'activate_link'                   => _n_noop( 'Activate installed plugin', 'Activate installed plugins', 'responsive' ),
			'return'                          => __( 'Return to Required Plugins Installer', 'responsive' ),
			'plugin_activated'                => __( 'Plugin activated successfully.', 'responsive' ),
			'complete'                        => __( 'All plugins installed and activated successfully. %s', 'responsive' ) // %1$s = dashboard link
		)
	);

	global $pagenow;
	// Add plugin notification only if the current user is admin and on theme.php
	if ( current_user_can( 'manage_options' ) && 'themes.php' == $pagenow ) {
		tgmpa( $plugins, $config );
	}

}
add_action( 'tgmpa_register', 'responsive_install_plugins' );

/*
 * Add notification to Reading Settings page to notify if Custom Front Page is enabled.
 *
 * @since    1.9.4.0
 */
function responsive_front_page_reading_notice() {
	$screen             = get_current_screen();
	$responsive_options = responsive_get_options();
	if ( 'options-reading' == $screen->id ) {
		$html = '<div class="updated">';
		if ( 1 == $responsive_options['front_page'] ) {
			$html .= '<p>' . sprintf( __( 'The Custom Front Page is enabled. You can disable it in the <a href="%1$s">theme settings</a>.', 'responsive' ), admin_url( 'themes.php?page=theme_options' ) ) . '</p>';
		} else {
			$html .= '<p>' . sprintf( __( 'The Custom Front Page is disabled. You can enable it in the <a href="%1$s">theme settings</a>.', 'responsive' ), admin_url( 'themes.php?page=theme_options' ) ) . '</p>';
		}
		$html .= '</div>';
		echo $html;
	}
}

add_action( 'admin_notices', 'responsive_front_page_reading_notice' );
