<?php
/**
 * Optimize list table columns.
 *
 * @package Dekode\MU
 */

declare( strict_types=1 );
namespace Dekode\MU\ThemeSupports\ListTable;

/**
 * Optimize list tables.
 *
 * @param array $columns Current columns.
 * @return array $columns
 */
function columns( array $columns ) : array {
	unset( $columns['date'] );
	unset( $columns['author'] );
	unset( $columns['tags'] );

	return $columns;
}
add_filter( 'manage_posts_columns', __NAMESPACE__ . '\\columns' );
add_filter( 'manage_pages_columns', __NAMESPACE__ . '\\columns' );
add_filter( 'manage_guide_columns', __NAMESPACE__ . '\\columns' );
add_filter( 'manage_product_columns', __NAMESPACE__ . '\\columns' );

/**
 * Add List image column
 *
 * @param array $columns Current columns.
 * @return array $columns
 */
function list_columns( array $columns ) : array {
	$columns['list-image']   = esc_html__( 'Archive image', 'dekode-mu' );
	$columns['list-excerpt'] = esc_html__( 'Archive excerpt', 'dekode-mu' );

	return $columns;
}
add_filter( 'manage_posts_columns', __NAMESPACE__ . '\\list_columns', 20 );
add_filter( 'manage_pages_columns', __NAMESPACE__ . '\\list_columns', 20 );
add_filter( 'manage_resource_columns', __NAMESPACE__ . '\\list_columns', 20 );

/**
 * List column content
 *
 * @param string $column  Column.
 * @param int    $post_id Post ID.
 */
function list_columns_data( string $column, int $post_id ) {
	if ( 'list-image' === $column ) {
		echo wp_get_attachment_image(
			get_post_meta( $post_id, 'teft_list_image_id', true ),
			[ '50', '50' ],
			true
		);
	} elseif ( 'list-excerpt' === $column ) {
		echo esc_html( get_post_meta( $post_id, 'teft_list_excerpt', true ) );
	}
}
add_action( 'manage_posts_custom_column', __NAMESPACE__ . '\\list_columns_data', 10, 2 );
add_filter( 'manage_page_custom_column', __NAMESPACE__ . '\\list_columns_data', 10, 2 );
add_filter( 'manage_resource_custom_column', __NAMESPACE__ . '\\list_columns_data', 10, 2 );
