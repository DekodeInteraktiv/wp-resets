<?php
/**
 * Plugin Name: Dekode Resets
 * Plugin URI: https://github.com/DekodeInteraktiv/dekode-mu-plugins
 * Description: This a collection of the basic functionality used by Dekode to optimize WordPress.
 * Version: 0.0.9
 * Author: Dekode
 * Author URI: https://dekode.no
 * License: GPL-3.0-or-later
 * License URI: https://www.gnu.org/licenses/gpl-3.0.en.html
 *
 * @package Dekode\Resets
 * @author Dekode
 */

declare( strict_types = 1 );
namespace Dekode\Resets;

add_action( 'muplugins_loaded', __NAMESPACE__ . '\load_mu_textdomain' );
add_action( 'after_setup_theme', __NAMESPACE__ . '\\manage_theme_support', 100 );

/**
 * Load textdomain
 * wp i18n make-pot ./ --slug=languages/dekode-mu --domain=dekode-mu --exclude=vendor
 */
function load_mu_textdomain() {
	load_muplugin_textdomain( 'dekode-mu', 'dekode-mu-plugins/languages' );
}

/**
 * Theme supports.
 */
function manage_theme_support() {
	$base_path = trailingslashit( __DIR__ ) . 'theme-supports/';

	// Default.
	require $base_path . 'optimize-formats.php';

	// Optional.
	require_if_theme_supports( 'disable-comments', $base_path . 'disable-comments.php' );
	require_if_theme_supports( 'disable-customizer', $base_path . 'disable-customizer.php' );
	require_if_theme_supports( 'disable-emoji', $base_path . 'disable-emoji.php' );
	require_if_theme_supports( 'disable-feeds', $base_path . 'disable-feeds.php' );
	require_if_theme_supports( 'disable-xmlrpc', $base_path . 'disable-xmlrpc.php' );
	require_if_theme_supports( 'disable-block-directory', $base_path . 'disable-block-directory.php' );
	require_if_theme_supports( 'optimize-embeds', $base_path . 'optimize-embeds.php' );
	require_if_theme_supports( 'optimize-yoast-schema', $base_path . 'optimize-yoast-schema.php' );
	require_if_theme_supports( 'optimize-wp-head', $base_path . 'optimize-wp-head.php' );
	require_if_theme_supports( 'admin-cleanup', $base_path . 'admin-cleanup.php' );
	require_if_theme_supports( 'admin-cards', $base_path . 'admin-cards.php' );
	require_if_theme_supports( 'post-to-article', $base_path . 'post-to-article.php' );
	require_if_theme_supports( 'searchwp-norwegian-stopwords', $base_path . 'searchwp/norwegian-stopwords.php' );
}
