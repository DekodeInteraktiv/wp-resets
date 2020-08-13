<?php
/**
 * Disable customizer from admin
 *
 * @package Dekode\MU
 */

declare( strict_types = 1 );
namespace Dekode\Resets\ThemeSupports\Customizer;

/**
 * Do not allow customizer for this project.
 *
 * @param array  $caps Caps.
 * @param string $cap  Cap.
 *
 * @return array $caps
 */
function restrict_customizer( array $caps, string $cap ) : array {
	if ( 'customize' === $cap ) {
		return [ 'do_not_allow' ];
	}

	return $caps;
}
add_filter( 'map_meta_cap', __NAMESPACE__ . '\\restrict_customizer', 10, 2 );
