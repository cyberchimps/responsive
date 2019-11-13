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
$diretory_path = dirname( __FILE__ );
$files_to_load = [
	$diretory_path . '/class-loader.php',
	$diretory_path . '/class-product.php',
	$diretory_path . '/common/class-abstract-module.php',
	$diretory_path . '/common/class-module-factory.php',
	$diretory_path . '/class-rollback.php',
];
$files_to_load = array_merge( $files_to_load, apply_filters( 'responsive_sdk_required_files', [] ) );

foreach ( $files_to_load as $file ) {
	if ( is_file( $file ) ) {
		include $file;
	}
}

Loader::init();

foreach ( $products as $product ) {
	Loader::add_product( $product );
}
