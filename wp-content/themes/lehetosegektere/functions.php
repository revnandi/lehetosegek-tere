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

// Add featured image to posts
add_theme_support( 'post-thumbnails' );

// Add post and grant featured image to REST API

add_action('rest_api_init', 'register_post_featured_image_in_rest' );
function register_post_featured_image_in_rest(){
    register_rest_field( array('post'),
        'featured_image_sizes',
        array(
            'get_callback'    => 'get_rest_featured_image',
            'update_callback' => null,
            'schema'          => null,
        )
    );
}
add_action('rest_api_init', 'register_grants_featured_image_in_rest' );
function register_grants_featured_image_in_rest(){
	register_rest_field( array('grants'),
			'featured_image_sizes',
			array(
					'get_callback'    => 'get_rest_featured_image',
					'update_callback' => null,
					'schema'          => null,
			)
	);
}

function get_rest_featured_image( $object, $field_name, $request ) {
    if( $object['featured_media'] ){
        // $img = wp_get_attachment_image_src( $object['featured_media'], 'app-thumb' );
				$lqip = wp_get_attachment_image_src( $object['featured_media'], 'lqip');
				$thumbnail = wp_get_attachment_image_src( $object['featured_media'], 'thumbnail');
				$medium = wp_get_attachment_image_src( $object['featured_media'], 'medium');
				$medium_large = wp_get_attachment_image_src( $object['featured_media'], 'medium_large');
				$large = wp_get_attachment_image_src( $object['featured_media'], 'large');
				$img = (object) [
					"lqip" => $lqip[0],
					"thumbnail" => $thumbnail[0],
					"medium" => $medium[0],
					"medium_large" => $medium_large[0],
					"large" => $large[0],
				];
        return $img;
    }
    return false;
}

// TODO order

function my_pre_get_posts( $query ) {
	
	// do not modify queries in the admin
	if( is_admin() ) {
		
		return $query;
		
	}
	

	// only modify queries for 'event' post type
	if( isset($query->query_vars['post_type']) && $query->query_vars['post_type'] == 'events' ) {
		
		$query->set('orderby', 'meta_value');	
		$query->set('meta_key', 'date_start');	 
		$query->set('order', 'DESC'); 
		
	}
	

	// return
	return $query;

}

add_action('pre_get_posts', 'my_pre_get_posts');

// TODO add tags to cpt

function ag_filter_post_json($response, $post, $context) {
	$tags = wp_get_post_tags($post->ID);
	$response->data['tag_names'] = [];

	foreach ($tags as $tag) {
			$response->data['tag_names'][]	= (object) array (
				'name' => $tag->name,
				'name_en' => get_field('name_en', $tag)
			);
	}

	return $response;
}

add_filter( 'rest_prepare_events', 'ag_filter_post_json', 10, 3 );

remove_action( 'wp_enqueue_scripts', 'wp_common_block_scripts_and_styles' );