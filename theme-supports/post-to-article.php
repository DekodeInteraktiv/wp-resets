<?php
/**
 * Change Post to Article
 *
 * @package Dekode\MU
 */

declare( strict_types=1 );
namespace Dekode\MU\ThemeSupports\Post;

/**
 * Change menu label
 */
function change_menu_label() {
	global $menu, $submenu;

	$menu[5][0]                 = esc_html__( 'Articles', 'dekode-mu' ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
	$submenu['edit.php'][5][0]  = esc_html__( 'Articles', 'dekode-mu' ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
	$submenu['edit.php'][10][0] = esc_html__( 'Add Articles', 'dekode-mu' ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
}
add_action( 'admin_menu', __NAMESPACE__ . '\\change_menu_label' );

/**
 * Change post type object.
 */
function change_post_object_label() {
	global $wp_post_types;

	$labels = $wp_post_types['post']->labels;

	$labels->name               = esc_html__( 'Articles', 'dekode-mu' );
	$labels->singular_name      = esc_html__( 'Article', 'dekode-mu' );
	$labels->add_new            = esc_html__( 'Add Article', 'dekode-mu' );
	$labels->add_new_item       = esc_html__( 'Add Article', 'dekode-mu' );
	$labels->edit_item          = esc_html__( 'Edit Article', 'dekode-mu' );
	$labels->new_item           = esc_html__( 'Article', 'dekode-mu' );
	$labels->view_item          = esc_html__( 'View Article', 'dekode-mu' );
	$labels->search_items       = esc_html__( 'Search Articles', 'dekode-mu' );
	$labels->not_found          = esc_html__( 'No Articles found', 'dekode-mu' );
	$labels->not_found_in_trash = esc_html__( 'No Articles found in Trash', 'dekode-mu' );

	$wp_post_types['post']->labels = $labels;
}
add_action( 'init', __NAMESPACE__ . '\\change_post_object_label' );
