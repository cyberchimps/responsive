<?php
/**
 * Responsive Mobile Menu Markup
 *
 * @package Responsive
 */

/**
 * Responsive Mobile Menu Markup
 */
if ( ! class_exists( 'Responsive_Mobile_Menu_Markup' ) ) :

	/**
	 * Responsive Mobile Menu Markup
	 *
	 * @since 1.0.0
	 */
	class Responsive_Mobile_Menu_Markup {

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
		 * Constructor
		 */
		public function __construct() {
			add_filter( 'responsive_js_localize', array( $this, 'localize_variables' ) );
		}

		/**
		 * Add Localize variables
		 *
		 * @param  array $localize_vars Localize variables array.
		 * @return array
		 */
		public function localize_variables( $localize_vars ) {
			/**
			 * Breakpoint
			 */
			$localize_vars['break_point'] = get_theme_mod( 'responsive_mobile_header_breakpoint', 768 );

			return $localize_vars;
		}
	}

endif;
Responsive_Mobile_Menu_Markup::get_instance();
