<?php
/**
 * The module factory class.
 *
 * @package     ResponsiveSDK
 * @since       3.24
 */

namespace ResponsiveSDK\Common;

use ResponsiveSDK\Product;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Job_Factory
 *
 * @package ResponsiveSDK\Common
 */
class Module_Factory {
	/**
	 * Map which contains all the modules loaded for each product.
	 *
	 * @var array Mapping array.
	 */
	private static $modules_attached = [];

	/**
	 * Load availabe modules for the selected product.
	 *
	 * @param Product $product Loaded product.
	 * @param array   $modules List of modules.
	 */
	public static function attach( $product, $modules ) {

		if ( ! isset( self::$modules_attached[ $product->get_slug() ] ) ) {
			self::$modules_attached[ $product->get_slug() ] = [];
		}

		foreach ( $modules as $module ) {
			$class = 'ResponsiveSDK\\Modules\\' . ucwords( $module, '_' );
			/**
			 * Module object.
			 *
			 * @var Abstract_Module $module_object Module instance.
			 */
			$module_object = new $class( $product );

			if ( ! $module_object->can_load( $product ) ) {
				continue;
			}
			self::$modules_attached[ $product->get_slug() ][ $module ] = $module_object->load( $product );
		}
	}
}
