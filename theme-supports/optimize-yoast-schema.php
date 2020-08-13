<?php
/**
 * Normialize schema.
 *
 * @package Dekode\MU
 */

declare( strict_types = 1 );
namespace Dekode\Resets\ThemeSupports\Schema;

add_filter( 'disable_wpseo_json_ld_search', '__return_true' );

/**
 * Change WebSite Schema data from yoast.
 *
 * @param array $data Schema.org WebPage data array.
 * @return array $data Schema.org WebPage data array.
 */
function optimize_yoast_schema( $data ) { // phpcs:ignore
	if ( isset( $data['primaryImageOfPage'] ) ) {
		unset( $data['primaryImageOfPage'] );
	}

	if ( isset( $data['about'] ) ) {
		unset( $data['about'] );
	}

	return $data;
}
add_filter( 'wpseo_schema_webpage', __NAMESPACE__ . '\\optimize_yoast_schema' );

/**
 * Optimize main image.
 *
 * @param array $data Schema.org WebPage data array.
 * @return array $data Schema.org WebPage data array.
 */
function optimize_yoast_main_image_schema( $data ) { // phpcs:ignore
	return false;
}
add_filter( 'wpseo_schema_mainimage', __NAMESPACE__ . '\\optimize_yoast_main_image_schema' );
