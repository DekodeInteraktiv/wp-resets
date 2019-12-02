<?php
/**
 * Dekode mu-plugins
 *
 * @package Dekode\MU
 */

declare( strict_types=1 );
namespace Dekode\MU;

/**
 * Load textdomain
 * wp i18n make-pot ./ --slug=languages/dekode-mu --domain=dekode-mu --exclude=vendor
 */
function load_mu_textdomain() {
	load_muplugin_textdomain( 'dekode-mu', 'dekode-mu-plugins/languages' );
}
add_action( 'muplugins_loaded', __NAMESPACE__ . '\load_mu_textdomain' );

require trailingslashit( __DIR__ ) . 'theme-supports.php';
