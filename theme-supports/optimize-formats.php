<?php
/**
 * Optimize formats
 *
 * @package Dekode\MU
 */

declare( strict_types=1 );
namespace Dekode\MU\ThemeSupports\Formats;

/*
 * Allow object-position in style attribute.
 */
add_filter( 'safe_style_css', function( array $styles ): array {
	$styles[] = 'object-position';
	return $styles;
} );
