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
			// error_log("Inside the get_uploads function");
			$uploads = wp_get_upload_dir();
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
			// error_log("Inside the cache_and_get_url function with google css url: " . $google_css_url);
			if ( empty( $google_css_url ) ) {
				return false;
			}
			// Ensure the URL is in a request-safe format (avoid HTML entities like &amp;)
			$google_css_url = html_entity_decode( $google_css_url, ENT_QUOTES );
			list( $base_dir, $base_url ) = self::get_uploads();
			$hash      = md5( $google_css_url );
			$targetDir = trailingslashit( $base_dir . 'responsive-local-fonts' );
			// error_log("Target dir for caching: " . $targetDir);
			$targetUrl = trailingslashit( $base_url . $hash );
			// error_log("Target url for caching: " . $targetUrl);
			$cssPath   = $targetDir . 'fonts.css';
			$cssUrl    = $targetUrl . 'fonts.css';

			if ( file_exists( $cssPath ) ) {
				// error_log("Exiting the cache_and_get_url function with cached css url: " . $cssUrl);
				return $cssUrl;
			}

			wp_mkdir_p( $targetDir );

			$response = wp_remote_get( $google_css_url, array( 'timeout' => 15 ) );
			if ( is_wp_error( $response ) ) {
				return false;
			}

			// If Google returns a 400, skip caching and bail out.
			$status_code = (int) wp_remote_retrieve_response_code( $response );
			if ( 400 === $status_code ) {
				// error_log("Exiting the cache_and_get_url function with 400 status code");
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
			// error_log("class-responsive-local-fonts.php Font URLs found: " . print_r($matches, true));
			if ( ! empty( $matches[1] ) ) {
				foreach ( array_unique( $matches[1] ) as $font_url ) {
					$font_filename = wp_basename( parse_url( $font_url, PHP_URL_PATH ) );
					$local_path    = $targetDir . $font_filename;
					$local_url     = $targetUrl . $font_filename;
					if ( ! file_exists( $local_path ) ) {
						$font_resp = wp_remote_get( $font_url, array( 'timeout' => 20 ) );
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
			// error_log("Exiting the cache_and_get_url function with css url: " . $cssUrl);
			return $cssUrl;
		}

		/**
		 * Return list of cached font files for a given Google CSS URL.
		 *
		 * @param string $google_css_url Google CSS URL.
		 * @return array List of local font file URLs.
		 */
		public static function get_cached_font_files( $google_css_url ) {
			// error_log("Inside the get_cached_font_files function with the google css url: " . $google_css_url);
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
			// error_log("Exiting the get_cached_font_files function with the urls: " . print_r($urls, true));
			return $urls;
		}

		/**
		 * Flush all cached local fonts
		 */
		public static function flush_cache() {
			// error_log("Inside the flush cache function");
			list( $base_dir ) = self::get_uploads();
			if ( is_dir( $base_dir ) ) {
				self::rrmdir( $base_dir );
				wp_mkdir_p( $base_dir );
			}
		}

		protected static function rrmdir( $dir ) {
			// error_log("Inside the rmdir function with dir: " . $dir);
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
			// error_log("Inside the preload_all_fonts function");
			list( $base_dir, $base_url ) = self::get_uploads();
			$fonts_dir = trailingslashit( $base_dir . 'responsive-local-fonts' );
			$fonts_url = trailingslashit( $base_url . 'responsive-local-fonts' );

			$font_files = glob( $fonts_dir . '*.{ttf,woff,woff2,eot,otf}', GLOB_BRACE );
			// error_log("Font files found for preloading: " . print_r($font_files, true));
			if ( empty( $font_files ) ) return;

			foreach ( $font_files as $file_path ) {
				// error_log("Actually preloading font file: " . $file_path);
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


