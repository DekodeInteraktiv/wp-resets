<?php
/**
 * Disable comments from admin
 *
 * @package Dekode\Resets
 */

declare( strict_types = 1 );
namespace Dekode\Resets\ThemeSupports\Comments;

/**
 * Disable support for comments on post types.
 */
function remove_post_type_supports() {
	// Disable support for comments and trackbacks in post types.
	$post_types = get_post_types();
	foreach ( $post_types as $post_type ) {
		if ( post_type_supports( $post_type, 'comments' ) ) {
			remove_post_type_support( $post_type, 'comments' );
			remove_post_type_support( $post_type, 'trackbacks' );
		}
	}
}
add_action( 'init', __NAMESPACE__ . '\\remove_post_type_supports' );

/**
 * Redirect the user away from the comments page.
 */
function redirect_comments_page() {
	// Redirect any user trying to access comments page.
	global $pagenow;

	if ( 'edit-comments.php' === $pagenow ) {
		wp_safe_redirect( admin_url() );
		exit;
	}
}
add_action( 'admin_init', __NAMESPACE__ . '\\redirect_comments_page' );

/**
 * Remove comments page in menu and dashboard widget.
 */
function optimize_admin() {
	// Remove comments metabox from dashboard.
	remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
	remove_menu_page( 'edit-comments.php' );
	remove_submenu_page( 'options-general.php', 'options-discussion.php' );
}
add_action( 'admin_menu', __NAMESPACE__ . '\\optimize_admin' );

/**
 * Removes from admin bar
 *
 * @param \WP_Admin_Bar $wp_admin_bar The WP admin bar object.
 */
function admin_bar_menu( \WP_Admin_Bar $wp_admin_bar ) {
	$wp_admin_bar->remove_menu( 'comments' );
}
add_action( 'admin_bar_menu', __NAMESPACE__ . '\\admin_bar_menu', 100 );

// Close comments on the front-end.
add_filter( 'comments_open', '__return_false', 20, 2 );
add_filter( 'pings_open', '__return_false', 20, 2 );
// Hide existing comments.
add_filter( 'comments_array', '__return_empty_array', 10, 2 );
