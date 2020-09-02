<?php
/**
 * Optimize formats
 *
 * @package Dekode\Resets
 */

declare( strict_types = 1 );
namespace Dekode\Resets\ThemeSupports\Formats;

/*
 * Allow object-position in style attribute.
 */
add_filter( 'safe_style_css', function( array $styles ): array {
	$styles[] = 'object-position';
	return $styles;
} );
