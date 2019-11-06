<?php
/**
 * File responsible for sdk files loading.
 *
 * @package     Responsive
 * @since       3.24
 */

namespace ResponsiveSDK;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$products      = apply_filters( 'responsive_sdk_products', array() );
$path          = dirname( __FILE__ );
$files_to_load = [
	$path . '/loader.php',
	$path . '/product.php',
	$path . '/Common/abstract-module.php',
	$path . '/Common/module-factory.php',
	$path . '/rollback.php',
];
$files_to_load = array_merge( $files_to_load, apply_filters( 'responsive_sdk_required_files', [] ) );

foreach ( $files_to_load as $file ) {
	if ( is_file( $file ) ) {
		require_once $file;
	}
}

Loader::init();

foreach ( $products as $product ) {
	Loader::add_product( $product );
}
