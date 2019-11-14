<?php
/**
 * The main loader class for Responsive
 *
 * @package     Responsive
 * @since       3.24
 */

namespace ResponsiveSDK;

use ResponsiveSDK\Common\Module_Factory;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * Singleton loader for Responsive SDK.
 */
final class Loader {
	/**
	 * Singleton instance.
	 *
	 * @var Loader instance The singleton instance
	 */
	private static $instance;
	/**
	 * Current loader version.
	 *
	 * @var string $version The class version.
	 */
	private static $version = '3.14';
	/**
	 * Holds registered products.
	 *
	 * @var array The products which use the SDK.
	 */
	private static $products = [];
	/**
	 * Holds available modules to load.
	 *
	 * @var array The modules which SDK will be using.
	 */
	private static $available_modules = [
		'rollback',

	];

	/**
	 * Initialize the sdk logic.
	 */
	public static function init() {
		if ( ! isset( self::$instance ) && ! ( self::$instance instanceof Loader ) ) {
			self::$instance          = new Loader();
			$modules                 = array_merge( self::$available_modules, apply_filters( 'responsive_sdk_modules', [] ) );
			self::$available_modules = $modules;
		}
	}

	/**
	 * Register product into SDK.
	 *
	 * @param string $base_file The product base file.
	 *
	 * @return Loader The singleton object.
	 */
	public static function add_product( $base_file ) {

		if ( ! is_file( $base_file ) ) {
			return self::$instance;
		}
		$product = new Product( $base_file );

		Module_Factory::attach( $product, self::get_modules() );

		self::$products[ $product->get_slug() ] = $product;

		return self::$instance;
	}

	/**
	 * Get all registered modules by the SDK.
	 *
	 * @return array Modules available.
	 */
	public static function get_modules() {
		return self::$available_modules;
	}

	/**
	 * Get all products using the SDK.
	 *
	 * @return array Products available.
	 */
	public static function get_products() {
		return self::$products;
	}

	/**
	 * Get the version of the SDK.
	 *
	 * @return string The version.
	 */
	public static function get_version() {
		return self::$version;
	}

}
