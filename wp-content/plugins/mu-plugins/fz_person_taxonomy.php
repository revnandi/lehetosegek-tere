<?php
/**
 * Plugin Name: FREIZEIT Persons taxonomy
 * Description: Generate Custom Persons taxonomy.
 * Author:      Studio Freizeit
 * License:     MIT
 * License URI: https://opensource.org/licenses/MIT
 */


add_action( 'init', 'fz_create_persons_nonhierarchical_taxonomy', 0 );

function fz_create_persons_nonhierarchical_taxonomy() {

// Labels part for the GUI

  $labels = array(
    'name' => _x( 'Persons', 'persons' ),
    'singular_name' => _x( 'Persons', 'person' ),
    'search_items' =>  __( 'Search Persons' ),
    'popular_items' => __( 'Popular Persons' ),
    'all_items' => __( 'All Persons' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Persons' ), 
    'update_item' => __( 'Update Persons' ),
    'add_new_item' => __( 'Add New Persons' ),
    'new_item_name' => __( 'New Persons Name' ),
    'separate_items_with_commas' => __( 'Separate persons with commas' ),
    'add_or_remove_items' => __( 'Add or remove persons' ),
    'choose_from_most_used' => __( 'Choose from the most used persons' ),
    'menu_name' => __( 'Persons' ),
  ); 

// Now register the non-hierarchical taxonomy like tag

  register_taxonomy('persons','post',array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'person' ),
  ));
}