# Dekode WP Resets

## Table of Contents
- [Description](#description)
- [Load](#load)
- [Usage](#usage)

## Description
This a collection of the basic functionality used by Dekode to optimize WordPress.

## Load
This mu-plugin is not loaded in WordPress by default. You'll need to manually create a
loader file in your mu-plugins folder.

You should also add the plugin to your project `.gitignore` file.

```php
<?php
/**
 * Autoloader for wp-resets
 *
 */

declare( strict_types = 1 );

if ( file_exists( trailingslashit( __DIR__ ) . 'wp-resets/resets.php' ) ) {
	require trailingslashit( __DIR__ ) . 'wp-resets/resets.php';
}
```

## Usage
```
function setup_custom_project() {
	add_theme_support( 'admin-cards' );
	add_theme_support( 'admin-cleanup' );
	add_theme_support( 'disable-comments' );
	add_theme_support( 'disable-customizer' );
	add_theme_support( 'disable-emoji' );
	add_theme_support( 'disable-feeds' );
	add_theme_support( 'disable-xmlrpc' );
	add_theme_support( 'optimize-embeds' );
	add_theme_support( 'optimize-wp-head' );
	add_theme_support( 'optimize-yoast-schema' );
	add_theme_support( 'post-to-article' );
	add_theme_support( 'searchwp-norwegian-stopwords' );
	add_theme_support( 'youtube-embed-nocookie' );
}
add_action( 'after_setup_theme', 'setup_custom_project' );

```
