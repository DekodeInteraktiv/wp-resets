<?php
/**
 * Optimize Admin Dashboard
 *
 * @package Dekode\MU
 */

declare( strict_types = 1 );
namespace Dekode\Resets\ThemeSupports\Cleanup;

/**
 * Optimize admin dashboard
 */
function cleanup_admin_dashboard() {
	$remove_widgets_dashboard = [
		'dashboard_activity',
		'dashboard_right_now',
		'dashboard_recent_comments',
		'dashboard_plugins',
		'dashboard_recent_drafts',
		'dashboard_incoming_links',
		'dashboard_quick_press',
		'dashboard_primary',
		'dashboard_secondary',
		'dashboard_welcome',
	];

	foreach ( $remove_widgets_dashboard as $remove_widget_dashboard ) {
		remove_meta_box( $remove_widget_dashboard, 'dashboard', 'core' );
	}
}
add_action( '_admin_menu', __NAMESPACE__ . '\\cleanup_admin_dashboard' );

/**
 * Admin footer text.
 *
 * @param string $footer_text Footer text.
 */
function admin_footer_text( string $footer_text ) : string {
	return '';
}
add_filter( 'admin_footer_text', __NAMESPACE__ . '\\admin_footer_text', 10, 1 );

/**
 * Optimize admin menu
 */
function cleanup_admin_menu() {
	remove_menu_page( 'link-manager.php' );

	if ( ! current_user_can( 'manage_options' ) ) {
		remove_menu_page( 'themes.php' );
		remove_menu_page( 'tools.php' );
	}

	remove_submenu_page( 'options-general.php', 'options-permalink.php' );
}
add_action( '_admin_menu', __NAMESPACE__ . '\\cleanup_admin_menu' );

/**
 * Add gutenberg widget menu page
 */
function remove_gutenberg() {
	remove_menu_page( 'gutenberg' );
}
add_action( 'admin_menu', __NAMESPACE__ . '\\remove_gutenberg', 100 );
