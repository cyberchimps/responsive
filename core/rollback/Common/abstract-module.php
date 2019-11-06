<?php
/**
 * The abstract class for module definition.
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
 * Class Abstract_Module.
 *
 * @package ResponsiveSDK\Common
 */
abstract class Abstract_Module {
	/**
	 * Product which use the module.
	 *
	 * @var Product $product Product object.
	 */
	protected $product = null;

	/**
	 * Can load the module for the selected product.
	 *
	 * @param Product $product Product data.
	 *
	 * @return bool Should load module?
	 */
	public abstract function can_load( $product );

	/**
	 * Bootstrap the module.
	 *
	 * @param Product $product Product object.
	 */
	public abstract function load( $product );

}
