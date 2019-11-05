<?php
/**
 * File responsible for sdk files loading.
 *
 * @package     Responsive
 * @copyright   Copyright (c) 2017, Marius Cristea
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.1.0
 */

namespace ResponsiveSDK;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$products      = apply_filters( 'responsive_sdk_products', array() );
$path          = dirname( __FILE__ );
$files_to_load = [
	$path . '/Loader.php',
	$path . '/Product.php',

	$path . '/Common/Abstract_module.php',
	$path . '/Common/Module_factory.php',
	$path . '/Rollback.php',
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
