# Dekode MU Plugins

## Table of Contents
- [Description](#description)
- [Load](#load)
- [Usage](#usage)

## Description
This a collection of the basic functionality used by Dekode to optimize WordPress.

## Load
This mu-plugin is not loaded in WordPress by default. You'll need to manually create a
file in x/mu-plugins/ and require/include the main file load.php located in the root
directory of this plugin.

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
}
add_action( 'after_setup_theme', 'setup_custom_project' );

```
