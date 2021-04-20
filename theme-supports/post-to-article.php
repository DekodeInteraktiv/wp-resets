<?php
/**
 * Change Post to Article
 *
 * @package Dekode\Resets
 */

declare( strict_types = 1 );
namespace Dekode\Resets\ThemeSupports\Post;

/**
 * Change menu label
 */
function change_menu_label() {
	global $menu, $submenu;

	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	$menu[5][0]                 = esc_html__( 'Articles', 'wp-resets' ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
	$submenu['edit.php'][5][0]  = esc_html__( 'Articles', 'wp-resets' ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
	$submenu['edit.php'][10][0] = esc_html__( 'Add Articles', 'wp-resets' ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
}
add_action( 'admin_menu', __NAMESPACE__ . '\\change_menu_label' );

/**
 * Change post type object.
 */
function change_post_object_label() {
	global $wp_post_types;

	$labels = $wp_post_types['post']->labels;

	$labels->name               = esc_html__( 'Articles', 'wp-resets' );
	$labels->singular_name      = esc_html__( 'Article', 'wp-resets' );
	$labels->add_new            = esc_html__( 'Add Article', 'wp-resets' );
	$labels->add_new_item       = esc_html__( 'Add Article', 'wp-resets' );
	$labels->edit_item          = esc_html__( 'Edit Article', 'wp-resets' );
	$labels->new_item           = esc_html__( 'Article', 'wp-resets' );
	$labels->view_item          = esc_html__( 'View Article', 'wp-resets' );
	$labels->search_items       = esc_html__( 'Search Articles', 'wp-resets' );
	$labels->not_found          = esc_html__( 'No Articles found', 'wp-resets' );
	$labels->not_found_in_trash = esc_html__( 'No Articles found in Trash', 'wp-resets' );

	$wp_post_types['post']->labels = $labels;
}
add_action( 'init', __NAMESPACE__ . '\\change_post_object_label' );
