<?php
/**
 * Theme Background Update
 *
 * @package     Responsive
 * @since       6.1.7
 */

if ( ! class_exists( 'Responsive_Theme_Background_Updater' ) ) {

	/**
	 * Responsive_Theme_Background_Updater Class.
	 */
	class Responsive_Theme_Background_Updater {

        private static $db_updates = array(
			'6.1.7'  => array(
                'responsive_theme_background_updater_6_1_7',
            ),
			'6.2.3'  => array(
                'responsive_theme_background_updater_6_2_3',
            ),
		);

        /**
		 *  Constructor
		 */
		public function __construct() {

			// Theme Updates.
			if ( is_admin() ) {
				add_action( 'admin_init', array( $this, 'responsive_theme_install_actions' ), 10 );
			} else {
				add_action( 'wp', array( $this, 'responsive_theme_install_actions' ), 10 );
			}

		}

        public function responsive_theme_install_actions() {

            if ( true === $this->responsive_theme_is_new_install() ) {
                $this->responsive_theme_update_db_version();
                return;
            }
        
            if ( $this->responsive_theme_need_db_updates_backward_compatibility() ) {
                $this->responsive_theme_update_db_backward_compatibility();
            } else {
                $this->responsive_theme_update_db_version();
            }
        }

        public function responsive_theme_is_new_install() {

            // Get auto saved version number.
            $saved_theme_version = responsive_free_get_option( 'theme_version' );
            if ( false === $saved_theme_version ) {
                return true;
            }
        
            return false;
        }
        
        public function responsive_theme_update_db_version() {
            $theme_options = get_option( 'responsive_theme_options' );
            $saved_version = responsive_free_get_option( 'theme_version' );
        
            if ( false === $saved_version ) {
        
                $saved_version = RESPONSIVE_THEME_VERSION;
        
                // Update auto saved version number.
                $theme_options['theme_version'] = RESPONSIVE_THEME_VERSION;
                update_option( 'responsive_theme_options', $theme_options );
            }
        
            // If equals then return.
            if ( version_compare( $saved_version, RESPONSIVE_THEME_VERSION, '=' ) ) {
                return;
            }
            $theme_options['theme_version'] = RESPONSIVE_THEME_VERSION;
            update_option( 'responsive_theme_options', $theme_options );
        }
        public function responsive_theme_db_updates_callbacks() {
            return self::$db_updates;
        }
        
        public function responsive_theme_need_db_updates_backward_compatibility() {

            $current_theme_version = responsive_free_get_option( 'theme_version', null );
            $updates               = $this->responsive_theme_db_updates_callbacks();
        
            if ( empty( $updates ) ) {
                return false;
            }
        
            $versions = array_keys( $updates );
            $latest   = $versions[ count( $versions ) - 1 ];
        
            return ! is_null( $current_theme_version ) && version_compare( $current_theme_version, $latest, '<' );
        }
        

        public function responsive_theme_update_db_backward_compatibility() {
            $theme_options      = get_option( 'responsive_theme_options' );
            $current_db_version = $theme_options['theme_version'];
        
            if ( count( $this->responsive_theme_db_updates_callbacks() ) > 0 ) {
                foreach ( $this->responsive_theme_db_updates_callbacks() as $version => $update_callbacks ) {
                    if ( version_compare( $current_db_version, $version, '<' ) ) {
                        foreach ( $update_callbacks as $update_callback ) {
                            call_user_func( $update_callback );
                        }
                    }
                }
                $this->responsive_theme_update_db_version();
            }
        }
    }
}
return new Responsive_Theme_Background_Updater();