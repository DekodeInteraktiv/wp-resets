<?php
/**
 * Disable XML-RPC.
 *
 * @package Dekode\Resets
 */

declare( strict_types = 1 );
namespace Dekode\Resets\ThemeSupports\xmlrpc;

/**
 * Remove the X-Pingback HTTP header
 *
 * @param array $headers Current list of headers.
 * @return array List of headers with the X-Pingback header removed.
 */
function remove_pingback_from_headers( array $headers ) : array {
	if ( isset( $headers['X-Pingback'] ) ) {
		unset( $headers['X-Pingback'] );
	}

	return $headers;
}
add_filter( 'wp_headers', __NAMESPACE__ . '\remove_pingback_from_headers' );
