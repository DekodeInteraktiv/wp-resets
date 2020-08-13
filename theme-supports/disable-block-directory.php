<?php
/**
 * Disable block directory
 *
 * @package Dekode\MU
 */

declare( strict_types=1 );
namespace Dekode\MU\ThemeSupports\BlockDirectory;

/**
 * Disable block directory
 */
function disable_block_directory() {
	remove_action( 'enqueue_block_editor_assets', 'wp_enqueue_editor_block_directory_assets' );
	remove_action( 'enqueue_block_editor_assets', 'gutenberg_enqueue_block_editor_assets_block_directory' );
}
add_action( 'init', __NAMESPACE__ . '\\disable_block_directory' );
