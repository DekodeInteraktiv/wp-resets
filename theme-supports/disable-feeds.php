<?php
/**
 * Disable default Feeds
 *
 * @package Dekode\MU
 */

declare( strict_types=1 );
namespace Dekode\MU\ThemeSupports\Feeds;

/**
 * Disable default feeds
 */
function redirect_feeds() {
	if ( is_feed() ) {
		wp_safe_redirect( home_url() );
		exit;
	}
}

if ( ! is_admin() ) {
	add_action( 'do_feed', 'redirect_feeds', 1 );

	$rss = [
		'rdf',
		'rss',
		'rss2',
		'atom',
	];

	foreach ( $rss as $r ) {
		add_action( "do_feed_{$r}", __NAMESPACE__ . '\redirect_feeds', 1 );
	}
}

/**
 * Cleanup HTML head RSS links
 */
function cleanup_head_links() {
	remove_action( 'wp_head', 'feed_links', 2 );
	remove_action( 'wp_head', 'feed_links_extra', 3 );
}
add_filter( 'init', __NAMESPACE__ . '\cleanup_head_links', 5 );
