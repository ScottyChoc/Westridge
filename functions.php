<?php
/**
 * Westridge.
 *
 * This file adds functions to the Westridge Theme.
 *
 * @package Westridge
 * @author  Scott Loveless
 * @license GPL-2.0+
 * @link    https://scott.loveless.org
 */

// Start the engine.
include_once( get_template_directory() . '/lib/init.php' );

// Setup Theme.
include_once( get_stylesheet_directory() . '/lib/theme-defaults.php' );

// Set Localization (do not remove).
add_action( 'after_setup_theme', 'genesis_sample_localization_setup' );
function genesis_sample_localization_setup(){
	load_child_theme_textdomain( 'genesis-sample', get_stylesheet_directory() . '/languages' );
}

// Add the helper functions.
include_once( get_stylesheet_directory() . '/lib/helper-functions.php' );

// Add Image upload and Color select to WordPress Theme Customizer.
require_once( get_stylesheet_directory() . '/lib/customize.php' );

// Include Customizer CSS.
include_once( get_stylesheet_directory() . '/lib/output.php' );

// Add WooCommerce support.
include_once( get_stylesheet_directory() . '/lib/woocommerce/woocommerce-setup.php' );

// Add the required WooCommerce styles and Customizer CSS.
include_once( get_stylesheet_directory() . '/lib/woocommerce/woocommerce-output.php' );

// Add the Genesis Connect WooCommerce notice.
include_once( get_stylesheet_directory() . '/lib/woocommerce/woocommerce-notice.php' );

// Child theme (do not remove).
define( 'CHILD_THEME_NAME', 'Westridge' );
define( 'CHILD_THEME_URL', 'https://scott.loveless.org' );
define( 'CHILD_THEME_VERSION', '1.0.0' );

// Enqueue Scripts and Styles.
add_action( 'wp_enqueue_scripts', 'westridge_enqueue_scripts_styles' );
function westridge_enqueue_scripts_styles() {

	// wp_enqueue_style( 'westridge-fonts', '//fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700', array(), CHILD_THEME_VERSION );
	wp_enqueue_style( 'dashicons' );

	$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
	wp_enqueue_script( 'westridge-responsive-menu', get_stylesheet_directory_uri() . "/js/responsive-menus{$suffix}.js", array( 'jquery' ), CHILD_THEME_VERSION, true );
	wp_enqueue_script( 'westridge-main', get_stylesheet_directory_uri() . "/js/main.js", array( 'jquery' ), CHILD_THEME_VERSION, true );
	wp_localize_script(
		'westridge-responsive-menu',
		'genesis_responsive_menu',
		westridge_responsive_menu_settings()
	);

}

// Define our responsive menu settings.
function westridge_responsive_menu_settings() {

	$settings = array(
		'mainMenu'          => __( 'Menu', 'westridge' ),
		'menuIconClass'     => 'dashicons-before dashicons-menu',
		'subMenu'           => __( 'Submenu', 'westridge' ),
		'subMenuIconsClass' => 'dashicons-before dashicons-arrow-down-alt2',
		'menuClasses'       => array(
			'combine' => array(
				'.nav-primary',
				'.nav-header',
			),
			'others'  => array(),
		),
	);

	return $settings;

}

//* Remove Genesis SEO Settings menu link
remove_theme_support( 'genesis-seo-settings-menu' );

// Add HTML5 markup structure.
add_theme_support( 'html5', array( 'caption', 'comment-form', 'comment-list', 'gallery', 'search-form' ) );

// Add Accessibility support.
add_theme_support( 'genesis-accessibility', array( '404-page', 'drop-down-menu', 'headings', 'rems', 'search-form', 'skip-links' ) );

// Add viewport meta tag for mobile browsers.
add_theme_support( 'genesis-responsive-viewport' );

// Add support for custom header.
add_theme_support( 'custom-header', array(
	'width'           => 400,
	'height'          => 275,
	'header-selector' => '.site-title a',
	'header-text'     => false,
	'flex-height'     => true,
) );

// Add support for custom background.
add_theme_support( 'custom-background' );

// Add support for after entry widget.
add_theme_support( 'genesis-after-entry-widget-area' );

//* Remove support for structural wraps
// remove_theme_support( 'genesis-structural-wraps' );

// Add support for 3-column footer widgets.
// add_theme_support( 'genesis-footer-widgets', 3 );

// Add Image Sizes.
add_image_size( 'featured-image', 720, 400, TRUE );

// Rename primary and secondary navigation menus.
add_theme_support( 'genesis-menus', array( 'primary' => __( 'After Header Menu', 'westridge' ), 'secondary' => __( 'Footer Menu', 'westridge' ) ) );

//* Remove Genesis in-post SEO Settings
remove_action( 'admin_menu', 'genesis_add_inpost_seo_box' );

//* Unregister Genesis widgets
add_action( 'widgets_init', 'unregister_genesis_widgets', 20 );
function unregister_genesis_widgets() {
	unregister_widget( 'Genesis_eNews_Updates' );
	unregister_widget( 'Genesis_Featured_Page' );
	unregister_widget( 'Genesis_Featured_Post' );
	unregister_widget( 'Genesis_Latest_Tweets_Widget' );
	unregister_widget( 'Genesis_Menu_Pages_Widget' );
	unregister_widget( 'Genesis_User_Profile_Widget' );
	unregister_widget( 'Genesis_Widget_Menu_Categories' );
}

// Reposition the secondary navigation menu.
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_footer', 'genesis_do_subnav', 5 );

// Disable WooCommerce styles
add_filter( 'woocommerce_enqueue_styles', '__return_false' );

//Full Width Pages on WooCommerce
function westridge_cpt_layout() {
    if( is_page ( array( 'cart', 'checkout' )) || is_shop() || 'product' == get_post_type() ) {
        return 'full-width-content';
    }
}
add_filter( 'genesis_site_layout', 'westridge_cpt_layout' );

// Reduce the secondary navigation menu to one level depth.
add_filter( 'wp_nav_menu_args', 'westridge_secondary_menu_args' );
function westridge_secondary_menu_args( $args ) {

	if ( 'secondary' != $args['theme_location'] ) {
		return $args;
	}

	$args['depth'] = 1;

	return $args;

}



// Modify size of the Gravatar in the author box.
add_filter( 'genesis_author_box_gravatar_size', 'westridge_author_box_gravatar' );
function westridge_author_box_gravatar( $size ) {
	return 90;
}

// Modify size of the Gravatar in the entry comments.
add_filter( 'genesis_comment_list_args', 'westridge_comments_gravatar' );
function westridge_comments_gravatar( $args ) {

	$args['avatar_size'] = 60;

	return $args;

}



add_action( 'genesis_before_footer', 'westridge_certs' );

function westridge_certs() {
	include_once( get_stylesheet_directory() . '/certs.php' );
}

add_action( 'genesis_before_footer', 'westridge_newsletter' );

function westridge_newsletter() {
	include_once( get_stylesheet_directory() . '/newsletter.php' );
}

remove_action( 'genesis_footer', 'genesis_do_footer' );
add_action( 'genesis_footer', 'westridge_custom_footer' );

function westridge_custom_footer() {
	include_once( get_stylesheet_directory() . '/custom-footer.php' );
}


