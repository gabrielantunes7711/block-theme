<?php
// add_filter( 'block_categories', 'gwg_block_categories' );
function gwg_block_categories( $categories ) {
    $category_slugs = wp_list_pluck( $categories, 'slug' );
    return in_array( 'gwg', $category_slugs, true ) ? $categories : array_merge(
      $categories,
      [
        [
            'slug'  => '',
            'title' => __( '' ),
            'icon'  => null,
        ],
      ]
    );
}