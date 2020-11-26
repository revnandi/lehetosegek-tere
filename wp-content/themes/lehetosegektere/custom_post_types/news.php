<?php
  function news_swiper_custom_post_type() {

    $labels = array(
      'name'                  => _x( 'Hírek', 'Post Type General Name', 'text_domain' ),
      'singular_name'         => _x( 'Hír', 'Post Type Singular Name', 'text_domain' ),
      'menu_name'             => __( 'Hírek', 'text_domain' ),
      'name_admin_bar'        => __( 'Hírek', 'text_domain' ),
      'archives'              => __( 'Item Archives', 'text_domain' ),
      'attributes'            => __( 'Item Attributes', 'text_domain' ),
      'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
      'all_items'             => __( 'Minden hír', 'text_domain' ),
      'add_new_item'          => __( 'Új hír hozzáadása', 'text_domain' ),
      'add_new'               => __( 'Hozzáadás', 'text_domain' ),
      'new_item'              => __( 'Új hír', 'text_domain' ),
      'edit_item'             => __( 'Szerkesztés', 'text_domain' ),
      'update_item'           => __( 'Frissítés', 'text_domain' ),
      'view_item'             => __( 'View Item', 'text_domain' ),
      'view_items'            => __( 'View Items', 'text_domain' ),
      'search_items'          => __( 'Search Item', 'text_domain' ),
      'not_found'             => __( 'Nem található', 'text_domain' ),
      'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
      'featured_image'        => __( 'Kép', 'text_domain' ),
      'set_featured_image'    => __( 'Kép beállítása', 'text_domain' ),
      'remove_featured_image' => __( 'Kép eltávolítása', 'text_domain' ),
      'use_featured_image'    => __( 'Kép használata', 'text_domain' ),
      'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
      'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
      'items_list'            => __( 'Items list', 'text_domain' ),
      'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
      'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
    );
    $args = array(
      'label'                 => __( 'Hír', 'text_domain' ),
      'description'           => __( 'A főoladli hírek carousel elemei', 'text_domain' ),
      'labels'                => $labels,
      'supports'              => array( 'title', 'editor', 'excerpt' ),
      'taxonomies'            => array( 'category', 'post_tag' ),
      'hierarchical'          => false,
      'public'                => true,
      'show_ui'               => true,
      'show_in_menu'          => true,
      'menu_position'         => 5,
      'show_in_admin_bar'     => true,
      'show_in_nav_menus'     => true,
      'can_export'            => true,
      'has_archive'           => true,
      'exclude_from_search'   => false,
      'publicly_queryable'    => true,
      'capability_type'       => 'page',
      'show_in_rest'          => true,
    );
    register_post_type( 'news_swiper', $args );

  }
  add_action( 'init', 'news_swiper_custom_post_type', 0 );

?>