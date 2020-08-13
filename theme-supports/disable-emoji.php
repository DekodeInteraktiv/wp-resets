<?php
/**
 * Simple set of filters to disable emoji functionality.
 *
 * @package Dekode\MU
 */

declare( strict_types = 1 );
namespace Dekode\Resets\ThemeSupports\Emoji;

/**
 * Disable emoji filters
 */
function disable_wp_emojicons() {
	// all actions related to emojis.
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

	// filter to remove TinyMCE emojis.
	add_filter( 'tiny_mce_plugins', __NAMESPACE__ . '\\disable_tinymce_emojicons' );
	add_filter( 'mce_external_plugins', __NAMESPACE__ . '\\disable_tinymce_emojicons' );
}
add_action( 'init', __NAMESPACE__ . '\\disable_wp_emojicons' );

/**
 * Disable emojis in TinyMCE.
 *
 * @param array $plugins TinyMCE Plugins.
 * @return array $plugins Modified TinyMCE Plugins.
 */
function disable_tinymce_emojicons( array $plugins ) : array {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, [ 'wpemoji' ] );
	} else {
		return [];
	}
}

// Remove emoji svg url.
add_filter( 'emoji_svg_url', '__return_false' );
