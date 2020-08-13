<?php
/**
 * Cleanup site <head>
 *
 * @package Dekode\MU
 */

declare( strict_types = 1 );
namespace Dekode\Resets\ThemeSupports\Head;

/**
 * Cleanup HTML head
 */
function optimize_head() {
	remove_action( 'wp_head', 'rsd_link' );
	remove_action( 'wp_head', 'wlwmanifest_link' );
	remove_action( 'wp_head', 'index_rel_link' );
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
	remove_action( 'wp_head', 'wp_generator' );
	remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );
	remove_action( 'wp_head', 'rel_canonical' );
}
add_filter( 'init', __NAMESPACE__ . '\optimize_head', 5 );
