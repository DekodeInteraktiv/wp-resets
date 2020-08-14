<?php
/**
 * Youtube Embed No-cookie
 * Use tracking free domain for YouTube embeds.
 * Author: Bjørn Johansen (https://bjornjohansen.no/)
 *
 * @package Dekode\Resets
 */

declare( strict_types = 1 );
namespace Dekode\Resets\ThemeSupports\Embed;

/**
 * Modify YouTube oEmbeds to use youtube-nocookie.com
 *
 * @param string $html The HTML code with the content.
 * @param string $url  The oEmbed URL.
 * @return string The modified HTML code with the content.
 */
function filter_youtube_embed( string $html, string $url = '' ) : string {
	// Search for 'youtu' to match both youtube.com and youtu.be URLs.
	if ( strpos( $url, 'youtu' ) ) {
		$html = preg_replace( '/youtube\.com\/(v|embed)\//s', 'youtube-nocookie.com/$1/', $html );
	}

	return $html;
}
add_filter( 'embed_oembed_html', __NAMESPACE__ . '\\filter_youtube_embed', 10, 2 );
