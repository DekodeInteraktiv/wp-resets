<?php
/**
 * Optimize safe style css
 *
 * @package Dekode\Resets
 */

declare( strict_types = 1 );
namespace Dekode\Resets\MustHaves\SafeStyle;

/*
 * Allow object-position in style attribute.
 */
add_filter( 'safe_style_css', function( array $styles ): array {
	$styles[] = 'object-position';

	return $styles;
} );
