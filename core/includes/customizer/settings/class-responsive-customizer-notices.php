<?php
/**
 * The customizer notices manager.
 *
 * @package Responsive
 */

/**
 * Class Responsive_Customizer_Notices
 */
class Responsive_Customizer_Notices extends Responsive_Register_Customizer_Controls {

	/**
	 * Initialize.
	 */
	public function __construct() {
		parent::init();
		add_action( 'wp_ajax_dismissed_notice_handler', array( $this, 'ajax_notice_handler' ) );
		add_action( 'wp_ajax_nopriv_dismissed_notice_handler', array( $this, 'ajax_notice_handler' ) );
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_notices_handler' ), 9 );
	}

	/**
	 * AJAX handler to store the state of dismissible notices.
	 */
	final public function ajax_notice_handler() {

		$nonce = ( isset( $_POST['nonce'] ) ) ? sanitize_key( $_POST['nonce'] ) : '';

		if ( false === wp_verify_nonce( $nonce, 'responsive-plugin-notices-handler' ) ) {
			  return;
		}
		$control_id = isset( $_POST['control'] ) ? sanitize_text_field( wp_unslash( $_POST['control'] ) ) : '';
		if ( empty( $control_id ) ) {
			die();
		}
		update_option( 'dismissed-' . $control_id, true );
		die();
	}

	/**
	 * Enqueue the controls script.
	 */
	public function enqueue_notices_handler() {
		wp_register_script( 'responsive-customizer-notices-handler', trailingslashit( get_template_directory_uri() ) . 'core/includes/customizer/assets/min/js/customizer-notices-handler.js', array( 'customize-controls' ), RESPONSIVE_THEME_VERSION );
		wp_localize_script(
			'responsive-customizer-notices-handler',
			'dismissNotices',
			array(
				'_notice_nonce' => wp_create_nonce( 'responsive-customizer-notices-handler' ),
				'ajaxurl'       => admin_url( 'admin-ajax.php' ),
			)
		);

		wp_enqueue_script( 'responsive-customizer-notices-handler' );
	}

	/**
	 * Add customizer controls.
	 */
	public function add_controls() {
		$this->register_types();
		$this->add_docs_link_section();
		/* WP-6805 This part is removed as it was calling a function to add install notice for
		RSPT int the theme customizer no longer required */
		// $this->maybe_add_main_notice();
		if(!responsive_is_user_pro()): 
			$this->add_upsell_section();
		endif;
	}

	/**
	 * Register customizer controls type.
	 */
	private function register_types() {
		$this->register_type( 'Responsive_Section_Docs', 'section' );
		$this->register_type( 'Responsive_Generic_Notice_Section', 'section' );
		$this->register_type( 'Responsive_Main_Notice_Section', 'section' );
		$this->register_type( 'Responsive_Upsell_Section', 'section' );
	}

	/**
	 * Add docs link section.
	 */
	private function add_docs_link_section() {
		$this->add_section(
			new Responsive_Customizer_Section(
				'responsive_docs_section',
				array(
					'theme_info_title' => esc_html__( 'Responsive', 'responsive' ),
					'label_url'        => 'https://cyberchimps.com/docs/',
					'label_text'       => esc_html__( 'Documentation', 'responsive' ),
					'priority'         => 259,
				),
				'Responsive_Section_Docs'
			)
		);
		$this->add_control(
			new Responsive_Customizer_Control(
				'responsive_control_to_enable_docs_section',
				array(
					'sanitize_callback' => 'sanitize_text_field',
				),
				array(
					'section' => 'responsive_docs_section',
					'type'    => 'hidden',
				)
			)
		);
	}

	/**
	 * Maybe add WooCommerce notice.
	 */
	private function maybe_add_woo_notice() {
		if ( class_exists( 'WooCommerce', false ) ) {
			return;
		}
		$this->add_section(
			new Responsive_Customizer_Section(
				'responsive_info_woocommerce',
				array(
					'section_text' =>
						sprintf(
							/* translators: %1$s is Plugin Name */
							esc_html__( 'To have access to a shop section please install and configure %1$s.', 'responsive' ),
							esc_html__( 'WooCommerce plugin', 'responsive' )
						),
					'slug'         => 'woocommerce',
					'panel'        => 'responsive_frontpage_sections',
					'priority'     => 451,
					'capability'   => 'install_plugins',
					'hide_notice'  => (bool) get_option( 'dismissed-responsive_info_woocommerce', false ),
					'options'      => array(
						'redirect' => admin_url( 'customize.php' ) . '?autofocus[section]=responsive_shop',
					),
				),
				'Responsive_Generic_Notice_Section'
			)
		);
		$this->add_control(
			new Responsive_Customizer_Control(
				'responsive_control_to_enable_woo_recommendation',
				array(
					'sanitize_callback' => 'sanitize_text_field',
				),
				array(
					'section' => 'responsive_info_woocommerce',
					'type'    => 'hidden',
				)
			)
		);
	}

	/* WP-6805 This part is removed as it is the function to add install notice for
	RSPT int the theme customizer no longer required */
	// /**
	//  * Check for required plugins and add main notice if needed.
	//  */
	// private function maybe_add_main_notice() {
	// 	if ( class_exists( 'Responsive_Add_Ons', false ) ) {
	// 		return;
	// 	}

	// 	$this->add_section(
	// 		new Responsive_Customizer_Section(
	// 			'responsive_info_pro',
	// 			array(
	// 				'slug'        => 'responsive-add-ons',
	// 				'priority'    => 0,
	// 				'capability'  => 'install_plugins',
	// 				'hide_notice' => (bool) get_option( 'dismissed-responsive_info_pro', false ),
	// 				'title'       => __( 'Recommended Plugins', 'responsive' ),
	// 				'options'     => array(
	// 					'redirect' => admin_url( 'customize.php' ),
	// 				),
	// 				/* translators: Orbit Fox Companion */
	// 				'description' => sprintf( esc_html__( 'Get free access to 100+ ready-to-use Elementor & Block templates. Import a template, edit content and launch your website.', 'responsive' ), sprintf( '<strong>%s</strong>', 'Upgrade To Pro' ) ),
	// 			),
	// 			'Responsive_Main_Notice_Section'
	// 		)
	// 	);

	// 	$this->add_control(
	// 		new Responsive_Customizer_Control(
	// 			'responsive_control_to_enable_pro_recommendation',
	// 			array(
	// 				'sanitize_callback' => 'sanitize_text_field',
	// 			),
	// 			array(
	// 				'section' => 'responsive_info_pro',
	// 				'type'    => 'hidden',
	// 			)
	// 		)
	// 	);
	// }

	/**
	 * Add View Pro Features section.
	 */
	private function add_upsell_section() {
		$this->add_section(
			new Responsive_Customizer_Section(
				'responsive_upsell_section',
				array(
					'theme_info_title' => esc_html__( 'View PRO Features', 'responsive' ),
					'priority'         => 1,
				),
				'Responsive_Upsell_Section'
			)
		);
		$this->add_control(
			new Responsive_Customizer_Control(
				'responsive_control_to_enable_upsell_section',
				array(
					'sanitize_callback' => 'sanitize_text_field',
				),
				array(
					'section' => 'responsive_upsell_section',
					'type'    => 'hidden',
				)
			)
		);
	}

}
new Responsive_Customizer_Notices();
