<?php
/**
 * Plugin Name: FREIZEIT Locations taxonomy
 * Description: Generate Custom Locations taxonomy.
 * Author:      Studio Freizeit
 * License:     MIT
 * License URI: https://opensource.org/licenses/MIT
 */


add_action( 'init', 'fz_create_locations_nonhierarchical_taxonomy', 0 );

function fz_create_locations_nonhierarchical_taxonomy() {

  $labels = array(
    'name' => _x( 'Locations', 'locations' ),
    'singular_name' => _x( 'Locations', 'location' ),
    'search_items' =>  __( 'Search Locations' ),
    'popular_items' => __( 'Popular Locations' ),
    'all_items' => __( 'All Locations' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Locations' ), 
    'update_item' => __( 'Update Locations' ),
    'add_new_item' => __( 'Add New Locations' ),
    'new_item_name' => __( 'New Locations Name' ),
    'separate_items_with_commas' => __( 'Separate locations with commas' ),
    'add_or_remove_items' => __( 'Add or remove locations' ),
    'choose_from_most_used' => __( 'Choose from the most used locations' ),
    'menu_name' => __( 'Locations' ),
  );

  register_taxonomy('locations','post',array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'location' ),
  ));
}