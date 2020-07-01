<?php
/**
 * Theme supports
 *
 * @package Dekode\MU
 */

declare( strict_types=1 );
namespace Dekode\MU;

/**
 * Theme supports.
 */
function manage_theme_support() {
	$base_path = trailingslashit( __DIR__ ) . 'theme-supports/';

	require_if_theme_supports( 'disable-comments', $base_path . 'disable-comments.php' );
	require_if_theme_supports( 'disable-customizer', $base_path . 'disable-customizer.php' );
	require_if_theme_supports( 'disable-emoji', $base_path . 'disable-emoji.php' );
	require_if_theme_supports( 'disable-feeds', $base_path . 'disable-feeds.php' );
	require_if_theme_supports( 'disable-xmlrpc', $base_path . 'disable-xmlrpc.php' );
	require_if_theme_supports( 'optimize-embeds', $base_path . 'optimize-embeds.php' );
	require_if_theme_supports( 'optimize-formats', $base_path . 'optimize-formats.php' );
	require_if_theme_supports( 'optimize-yoast-schema', $base_path . 'optimize-yoast-schema.php' );
	require_if_theme_supports( 'optimize-wp-head', $base_path . 'optimize-wp-head.php' );
	require_if_theme_supports( 'admin-cleanup', $base_path . 'admin-cleanup.php' );
	require_if_theme_supports( 'admin-cards', $base_path . 'admin-cards.php' );
	require_if_theme_supports( 'post-to-article', $base_path . 'post-to-article.php' );
	require_if_theme_supports( 'searchwp-norwegian-stopwords', $base_path . 'searchwp/norwegian-stopwords.php' );
}
add_action( 'after_setup_theme', __NAMESPACE__ . '\\manage_theme_support', 100 );
