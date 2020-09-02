<?php
/**
 * SearchWP - Norwegian Stopwords
 *
 * @package Dekode\Resets
 */

declare( strict_types = 1 );
namespace Dekode\Resets\ThemeSupports\SearchWP\StopWords;

/**
 * Norwegian stopwords
 *
 * @param array $terms Current stopwords.
 */
function add_norwegian_stopwords( array $terms ) : array {
	if ( file_exists( __DIR__ . '/stopwords-nb_NO.txt' ) ) {
		$terms = explode( PHP_EOL, trim( file_get_contents( __DIR__ . '/stopwords-nb_NO.txt' ) ) );
	}

	return $terms;
}
// SearchWP < 4
add_filter( 'searchwp_stopwords', __NAMESPACE__ . '\\add_norwegian_stopwords' );
// SearchWP > 4
add_filter( 'searchwp\stopwords', __NAMESPACE__ . '\\add_norwegian_stopwords' );
