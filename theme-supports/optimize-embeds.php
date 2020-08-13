<?php
/**
 * Embed optimizations
 *
 * @package Dekode\MU
 */

declare( strict_types = 1 );
namespace Dekode\Resets\ThemeSupports\Embed;

/**
 * Remove frameborder
 *
 * @param string $html HTML.
 * @param string $url  URL.
 *
 * @return string html
 */
function remove_frameborder( string $html, string $url ) : string {
	if ( strpos( $url, 'youtube.com' ) !== false ) {
		$html = str_replace( 'frameborder="0"', '', $html );
		$html = str_replace( '>', ' sandbox="allow-scripts allow-same-origin allow-popups">', $html );
	}

	return $html;
}
add_filter( 'embed_oembed_html', __NAMESPACE__ . '\\remove_frameborder', 10, 2 );
