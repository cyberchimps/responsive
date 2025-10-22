<?php
/**
 * Local Google Fonts manager
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Local_Fonts' ) ) :

	class Responsive_Local_Fonts {

		/**
		 * Base upload dir
		 *
		 * @return array
		 */
		protected static function get_uploads() {
			$uploads = wp_upload_dir();
			$base_dir = trailingslashit( $uploads['basedir'] );
			$base_url = trailingslashit( $uploads['baseurl'] );
			wp_mkdir_p( $base_dir );
			return array( $base_dir, $base_url );
		}

		/**
		 * Cache Google CSS and font assets locally and return the local CSS URL.
		 *
		 * @param string $google_css_url Full Google Fonts CSS URL.
		 * @return string|false Local CSS file URL or false on failure.
		 */
		public static function cache_and_get_url( $google_css_url ) {
			if ( empty( $google_css_url ) ) {
				return false;
			}
			// Ensure the URL is in a request-safe format (avoid HTML entities like &amp;)
			$google_css_url = html_entity_decode( $google_css_url, ENT_QUOTES );
			list( $base_dir, $base_url ) = self::get_uploads();
			$targetDir = trailingslashit( $base_dir . 'responsive-local-fonts' );
			$targetUrl = trailingslashit( $base_url . 'responsive-local-fonts' );
			$cssPath   = $targetDir . 'fonts.css';
			$cssUrl    = $targetUrl . 'fonts.css';

			if ( file_exists( $cssPath ) ) {
				return $cssUrl;
			}

			wp_mkdir_p( $targetDir );

			$response = wp_remote_get( $google_css_url, array( 
				'timeout' => 15,
				'user-agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36'
			) );
			if ( is_wp_error( $response ) ) {
				return false;
			}

			// If Google returns a 400, skip caching and bail out.
			$status_code = (int) wp_remote_retrieve_response_code( $response );
			if ( 400 === $status_code ) {
				return false;
			}

			$css = wp_remote_retrieve_body( $response );
			if ( empty( $css ) ) {
				return false;
			}

			// Find font file URLs and cache them locally.
			$updated_css = $css;
			$matches = array();
			preg_match_all( '/url\((https?:\\/\\/[^\)]+)\)/i', $css, $matches );
			if ( ! empty( $matches[1] ) ) {
				foreach ( array_unique( $matches[1] ) as $font_url ) {
					$font_filename = wp_basename( parse_url( $font_url, PHP_URL_PATH ) );
					$local_path    = $targetDir . $font_filename;
					$local_url     = $targetUrl . $font_filename;
					if ( ! file_exists( $local_path ) ) {
						$font_resp = wp_remote_get( $font_url, array( 
							'timeout' => 20,
							'user-agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36'
						) );
						if ( ! is_wp_error( $font_resp ) ) {
							$body = wp_remote_retrieve_body( $font_resp );
							if ( ! empty( $body ) ) {
								file_put_contents( $local_path, $body );
							}
						}
					}
					$updated_css = str_replace( $font_url, $local_url, $updated_css );
				}
			}

			file_put_contents( $cssPath, $updated_css );
			return $cssUrl;
		}

		/**
		 * Return list of cached font files for a given Google CSS URL.
		 *
		 * @param string $google_css_url Google CSS URL.
		 * @return array List of local font file URLs.
		 */
		public static function get_cached_font_files( $google_css_url ) {
			list( $base_dir, $base_url ) = self::get_uploads();
			$hash      = md5( $google_css_url );
			$targetDir = trailingslashit( $base_dir . $hash );
			$targetUrl = trailingslashit( $base_url . $hash );
			if ( ! is_dir( $targetDir ) ) {
				return array();
			}
			$files = glob( $targetDir . '*.{woff,woff2,ttf,otf}', GLOB_BRACE );
			$urls  = array();
			if ( $files ) {
				foreach ( $files as $file ) {
					$urls[] = $targetUrl . wp_basename( $file );
				}
			}
			return $urls;
		}

		/**
		 * Flush all cached local fonts
		 */
		public static function flush_cache() {
			// Limit deletion to the responsive-local-fonts directory only.
			list( $base_dir ) = self::get_uploads();
			$fonts_dir = trailingslashit( $base_dir . 'responsive-local-fonts' );
			if ( is_dir( $fonts_dir ) ) {
				self::rrmdir( $fonts_dir );
				wp_mkdir_p( $fonts_dir );
			}
		}

		protected static function rrmdir( $dir ) {
			$dir = untrailingslashit( $dir );

			if ( ! is_dir( $dir ) ) {
				return;
			}

			$items = array_merge(
				glob( $dir . '/*', GLOB_NOSORT ) ?: array(),
				glob( $dir . '/.*', GLOB_NOSORT ) ?: array()
			);

			foreach ( $items as $item ) {
				$basename = wp_basename( $item );

				// Skip current and parent directory entries.
				if ( '.' === $basename || '..' === $basename ) {
					continue;
				}

				if ( is_dir( $item ) && ! is_link( $item ) ) {
					self::rrmdir( $item );
				} else {
					@chmod( $item, 0644 );
					@unlink( $item );
				}
			}

			@rmdir( $dir );
		}

		public static function preload_all_fonts() {
			list( $base_dir, $base_url ) = self::get_uploads();
			$fonts_dir = trailingslashit( $base_dir . 'responsive-local-fonts' );
			$fonts_url = trailingslashit( $base_url . 'responsive-local-fonts' );

			$font_files = glob( $fonts_dir . '*.{ttf,woff,woff2,eot,otf}', GLOB_BRACE );
			if ( empty( $font_files ) ) return;

			foreach ( $font_files as $file_path ) {
				$file_url = str_replace( $fonts_dir, $fonts_url, $file_path );
				$ext = pathinfo( $file_path, PATHINFO_EXTENSION );

				$type = 'font/ttf'; // default
				if ( $ext === 'woff2' ) $type = 'font/woff2';
				elseif ( $ext === 'woff' ) $type = 'font/woff';
				elseif ( $ext === 'eot' ) $type = 'application/vnd.ms-fontobject';
				elseif ( $ext === 'otf' ) $type = 'font/otf';

				echo '<link rel="preload" href="' . esc_url( $file_url ) . '" as="font" type="' . esc_attr($type) . '" crossorigin />' . "\n";
			}
		}
	}

endif;


