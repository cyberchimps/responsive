<?php
/**
 * The product model class for Responsive SDK
 *
 * @package     ResponsiveSDK
 * @since       3.24
 */

namespace ResponsiveSDK;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Product model for Responsive SDK.
 */
class Product {
	/**
	 * Define theme type string.
	 */
	const THEME_TYPE = 'theme';
	/**
	 * Current product slug.
	 *
	 * @var string $slug THe product slug.
	 */
	private $slug;
	/**
	 * Product basefile, with the proper metadata.
	 *
	 * @var string $basefile The file with headers.
	 */
	private $basefile;
	/**
	 * Type of the product.
	 *
	 * @var string $type The product type ( plugin | theme ).
	 */
	private $type;
	/**
	 * The file name.
	 *
	 * @var string $file The file name.
	 */
	private $file;
	/**
	 * Product name, fetched from the file headers.
	 *
	 * @var string $name The product name.
	 */
	private $name;
	/**
	 * Product normalized key.
	 *
	 * @var string $key The product ready key.
	 */
	private $key;
	/**
	 * Product store url.
	 *
	 * @var string $store_url The store url.
	 */
	private $store_url;
	/**
	 * Product install timestamp.
	 *
	 * @var int $install The date of install.
	 */
	private $install;
	/**
	 * Product store/author name.
	 *
	 * @var string $store_name The store name.
	 */
	private $store_name;
	/**
	 * Does the product requires license.
	 *
	 * @var bool $requires_license Either user needs to activate it with license.
	 */
	private $requires_license;
	/**
	 * Is the product available on wordpress.org
	 *
	 * @var bool $wordpress_available Either is available on WordPress or not.
	 */
	private $wordpress_available;
	/**
	 * Current version of the product.
	 *
	 * @var string $version The product version.
	 */
	private $version;

	/**
	 * Responsive_SDK_Product constructor.
	 *
	 * @param string $basefile Product basefile.
	 */
	public function __construct( $basefile ) {
		if ( ! empty( $basefile ) ) {
			if ( is_file( $basefile ) ) {
				$this->basefile = $basefile;
				$this->setup_from_path();
				$this->setup_from_fileheaders();
			}
		}
		$install = get_option( $this->get_key() . '_install', 0 );
		if ( 0 === $install ) {
			$install = time();
			update_option( $this->get_key() . '_install', time() );
		}
		$this->install = $install;

	}

	/**
	 * Setup props from path.
	 */
	public function setup_from_path() {
		$this->file = basename( $this->basefile );
		$dir        = dirname( $this->basefile );
		$this->slug = basename( $dir );
		$exts       = explode( '.', $this->basefile );
		$ext        = $exts[ count( $exts ) - 1 ];
		if ( 'css' === $ext ) {
			$this->type = 'theme';
		}
		if ( 'php' === $ext ) {
			$this->type = 'plugin';
		}
		$this->key = self::key_ready_name( $this->slug );
	}

	/**
	 * Normalize string.
	 *
	 * @param string $string the String to be normalized for cron handler.
	 *
	 * @return string $name         The normalized string.
	 */
	static function key_ready_name( $string ) {
		return str_replace( '-', '_', strtolower( trim( $string ) ) );
	}

	/**
	 * Setup props from fileheaders.
	 */
	public function setup_from_fileheaders() {
		$file_headers = array(
			'Requires License'    => 'Requires License',
			'WordPress Available' => 'WordPress Available',
			'Pro Slug'            => 'Pro Slug',
			'Version'             => 'Version',
		);
		if ( 'plugin' === $this->type ) {
			$file_headers['Name']       = 'Plugin Name';
			$file_headers['AuthorName'] = 'Author';
			$file_headers['AuthorURI']  = 'Author URI';
		}
		if ( 'theme' === $this->type ) {
			$file_headers['Name']       = 'Theme Name';
			$file_headers['AuthorName'] = 'Author';
			$file_headers['AuthorURI']  = 'Author URI';
		}
		$file_headers = get_file_data( $this->basefile, $file_headers );

		$this->name       = $file_headers['Name'];
		$this->store_name = $file_headers['AuthorName'];
		$this->author_url = $file_headers['AuthorURI'];
		$this->store_url  = $file_headers['AuthorURI'];

		$this->wordpress_available = ( 'yes' === $file_headers['WordPress Available'] ) ? true : false;
		$this->version             = $file_headers['Version'];

	}

	/**
	 * Return the product key.
	 *
	 * @return string The product key.
	 */
	public function get_key() {
		return $this->key;
	}

	/**
	 * Check if the product is either theme or plugin.
	 *
	 * @return string Product type.
	 */
	public function get_type() {
		return $this->type;
	}

	/**
	 * Return if the product is used as a theme.
	 *
	 * @return bool Is theme ?
	 */
	public function is_theme() {
		return self::THEME_TYPE === $this->type;
	}

	/**
	 * Returns the product slug.
	 *
	 * @return string The product slug.
	 */
	public function get_slug() {
		return $this->slug;
	}

	/**
	 * The magic var_dump info method.
	 *
	 * @return array Debug info.
	 */
	public function __debugInfo() {
		return array(
			'name'                => $this->name,
			'slug'                => $this->slug,
			'version'             => $this->version,
			'basefile'            => $this->basefile,
			'key'                 => $this->key,
			'type'                => $this->type,
			'store_name'          => $this->store_name,
			'store_url'           => $this->store_url,
			'wordpress_available' => $this->wordpress_available,
		);

	}

	/**
	 * Getter for product version.
	 *
	 * @return string The product version.
	 */
	public function get_version() {
		return $this->version;
	}

	/**
	 * If product is available on wordpress.org or not.
	 *
	 * @return bool Either is wp available or not.
	 */
	public function is_wordpress_available() {
		return $this->wordpress_available;
	}

	/**
	 * Return friendly name.
	 *
	 * @return string Friendly name.
	 */
	public function get_friendly_name() {
		$name = apply_filters( $this->get_key() . '_friendly_name', trim( str_replace( 'Lite', '', $this->get_name() ) ) );
		$name = rtrim( $name, '- ()' );

		return $name;
	}

	/**
	 * Getter for product name.
	 *
	 * @return string The product name.
	 */
	public function get_name() {
		return $this->name;
	}

	/**
	 * Returns product basefile, which holds the metaheaders.
	 *
	 * @return string The product basefile.
	 */
	public function get_basefile() {
		return $this->basefile;
	}

	/**
	 * Returns product filename.
	 *
	 * @return string The product filename.
	 */
	public function get_file() {
		return $this->file;
	}
	/**
	 * Return the install timestamp.
	 *
	 * @return int The install timestamp.
	 */
	public function get_install_time() {
		return $this->install;
	}

	/**
	 * Returns the URL of the product base file.
	 *
	 * @param string $path The path to the file.
	 *
	 * @return string The URL of the product base file.
	 */
	public function get_base_url( $path = '/' ) {
		if ( $this->type ) {
			return plugins_url( $path, $this->basefile );
		}
	}

}
