<?php
/**
 * Handling of embeddable objects.
 *
 * @package Dekode\Resets
 */

declare( strict_types = 1 );
namespace Dekode\Resets\ThemeSupports\LazyLoad;

/**
 * Inject lazy-loading for iframes when possible, reducing network impact until absolutely necessary.
 *
 * @param string $content The post content.
 *
 * @return string
 */
function lazyload_iframes( string $content ) : string {
	/*
	 * Our loading-attribute is injected first, if the embed has other loading preferences
	 * these will be added later, and parsed last, thus taking priority, as they should if
	 * already defined.
	 */
	$content = preg_replace( '/<iframe(.+?)>/si', '<iframe loading="lazy" $1>', $content );

	return $content;
}
add_filter( 'the_content', __NAMESPACE__ . '\\lazyload_iframes' );
