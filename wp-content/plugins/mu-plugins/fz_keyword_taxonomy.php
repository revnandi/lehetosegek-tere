<?php
/**
 * Plugin Name: FREIZEIT Keywords taxonomy
 * Description: Generate Custom Keywords taxonomy.
 * Author:      Studio Freizeit
 * License:     MIT
 * License URI: https://opensource.org/licenses/MIT
 */


//hook into the init action and call fz_create_keywords_nonhierarchical_taxonomy when it fires

add_action( 'init', 'fz_create_keywords_nonhierarchical_taxonomy', 0 );

function fz_create_keywords_nonhierarchical_taxonomy() {

// Labels part for the GUI

  $labels = array(
    'name' => _x( 'Keywords', 'keywords' ),
    'singular_name' => _x( 'Keyword', 'keyword' ),
    'search_items' =>  __( 'Search Keywords' ),
    'popular_items' => __( 'Popular Keywords' ),
    'all_items' => __( 'All Keywords' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Keyword' ), 
    'update_item' => __( 'Update Keyword' ),
    'add_new_item' => __( 'Add New Keyword' ),
    'new_item_name' => __( 'New Keyword Name' ),
    'separate_items_with_commas' => __( 'Separate keywords with commas' ),
    'add_or_remove_items' => __( 'Add or remove keywords' ),
    'choose_from_most_used' => __( 'Choose from the most used keywords' ),
    'menu_name' => __( 'Keywords' ),
  ); 

// Now register the non-hierarchical taxonomy like tag

  register_taxonomy('keywords','post',array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'keyword' ),
  ));
}
