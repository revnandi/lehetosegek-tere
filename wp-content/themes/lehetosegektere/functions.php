<?php
// Remove all default WP template redirects/lookups
remove_action( 'template_redirect', 'redirect_canonical' );

// Redirect all requests to index.php so the Vue app is loaded and 404s aren't thrown
function remove_redirects() {
	add_rewrite_rule( '^/(.+)/?', 'index.php', 'top' );
}
add_action( 'init', 'remove_redirects' );

// Load scripts
function load_vue_scripts() {
	wp_enqueue_script(
		'vuejs-wordpress-theme-starter-js',
		get_stylesheet_directory_uri() . '/dist/scripts/index.js',
		array( 'jquery' ),
		filemtime( get_stylesheet_directory() . '/dist/scripts/index.js' ),
		true
	);

	wp_enqueue_style(
		'vuejs-wordpress-theme-starter-css',
		get_stylesheet_directory_uri() . '/dist/styles.css',
		null,
		filemtime( get_stylesheet_directory() . '/dist/styles.css' )
	);
}
add_action( 'wp_enqueue_scripts', 'load_vue_scripts', 100 );

// Disable Admin Bar for All Users Except for Administrators
function remove_admin_bar() {
	if (!current_user_can('administrator') && !is_admin()) {
		show_admin_bar(false);
	}
}
add_action('after_setup_theme', 'remove_admin_bar');

// Limit Access to WordPress Dashboard for Subscribers
function disable_dashboard() {
	if (!is_user_logged_in()) {
		return null;
	}
	if (!current_user_can('administrator') && is_admin()) {
		wp_redirect(home_url());
		exit;
	}
}
add_action('admin_init', 'disable_dashboard');

// Register Menu
function mytheme_register_nav_menu() {
	register_nav_menus( array(
		'primary_menu' => __( 'Primary Menu', 'vuejs-wordpress'),
	) );
}
add_action( 'after_setup_theme', 'mytheme_register_nav_menu', 0 );

// ACF Options Page
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Egyéni Téma Beállítások',
		'menu_title'	=> 'Téma Beállítások',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
}

// Whitelist api routes
add_filter( 'jwt_auth_whitelist', function ( $endpoints ) {
	return array(
			'/wp-json/acf/v3/options/options/*',
			'/wp-json/menus/v1/menus/fomenu/',
	);
} );