<?php
/**
 * Dekode mu-plugins
 *
 * @package Dekode\MU
 */

declare( strict_types=1 );
namespace Dekode\MU;

/**
 * Load MU text domain
 */
function load_mu_textdomain() {
	$text_domain = 'dekode-mu';
	$path        = trailingslashit( __DIR__ ) . '/languages/';
	$mo_file     = $text_domain . '-' . get_locale() . '.mo';
	load_textdomain( $text_domain, $path . $mo_file );
}
add_action( 'muplugins_loaded', __NAMESPACE__ . '\load_mu_textdomain' );

require trailingslashit( __DIR__ ) . 'theme-supports.php';
