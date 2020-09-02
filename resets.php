<?php
/**
 * Plugin Name: Dekode WP Resets
 * Plugin URI: https://github.com/DekodeInteraktiv/wp-resets
 * Description: This a collection of the basic functionality used by Dekode to optimize WordPress.
 * Version: 2.0.1
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

\add_action( 'muplugins_loaded', __NAMESPACE__ . '\\load_mu_textdomain' );
\add_action( 'after_setup_theme', __NAMESPACE__ . '\\manage_must_haves' );
\add_action( 'after_setup_theme', __NAMESPACE__ . '\\manage_theme_support', 100 );

/**
 * Load textdomain
 * wp i18n make-pot ./ --slug=languages/wp-resets --domain=wp-resets --exclude=vendor
 */
function load_mu_textdomain() {
	\load_muplugin_textdomain( 'wp-resets', 'wp-resets/languages' );
}

/**
 * Required must-haves.
 */
function manage_must_haves() {
	foreach ( glob( __DIR__ . '/must-haves/*.php' ) as $file ) {
		require $file;
	}
}

/**
 * Optional theme supports.
 */
function manage_theme_support() {
	$base_path = trailingslashit( __DIR__ ) . 'theme-supports/';

	\require_if_theme_supports( 'searchwp-norwegian-stopwords', $base_path . 'searchwp/norwegian-stopwords.php' );
	\require_if_theme_supports( 'admin-cards', $base_path . 'admin-cards.php' );
	\require_if_theme_supports( 'admin-cleanup', $base_path . 'admin-cleanup.php' );
	\require_if_theme_supports( 'disable-block-directory', $base_path . 'disable-block-directory.php' );
	\require_if_theme_supports( 'disable-comments', $base_path . 'disable-comments.php' );
	\require_if_theme_supports( 'disable-customizer', $base_path . 'disable-customizer.php' );
	\require_if_theme_supports( 'disable-emoji', $base_path . 'disable-emoji.php' );
	\require_if_theme_supports( 'disable-feeds', $base_path . 'disable-feeds.php' );
	\require_if_theme_supports( 'disable-xmlrpc', $base_path . 'disable-xmlrpc.php' );
	\require_if_theme_supports( 'optimize-embeds', $base_path . 'embeds/optimize-embeds.php' );
	\require_if_theme_supports( 'optimize-wp-head', $base_path . 'optimize-wp-head.php' );
	\require_if_theme_supports( 'optimize-yoast-schema', $base_path . 'optimize-yoast-schema.php' );
	\require_if_theme_supports( 'post-to-article', $base_path . 'post-to-article.php' );
	\require_if_theme_supports( 'youtube-embed-nocookie', $base_path . 'embeds/youtube-embed-nocookie.php' );
}
