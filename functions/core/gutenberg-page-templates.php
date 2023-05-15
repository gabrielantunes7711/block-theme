<?php
function register_templates() {
  $templates = [
    'post' => [
      'acf/content-01',
      'acf/section-transition-01',
      'acf/contact-01', 
    ],
  ];
  
  foreach ( $templates as $post_type => $template ) {
    $post_type_object = get_post_type_object( $post_type );
    $post_type_object->template = array_map( function ( $block ) {
      return [$block];
    }, $template );
  }
}
add_action( 'init', 'register_templates' );
