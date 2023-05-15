<?php
add_action( 'enqueue_block_editor_assets', 'my_gutenberg_editor_styles', 99 );
function my_gutenberg_editor_styles() {
  wp_dequeue_style( 'wp-block-library' );
  wp_enqueue_style(
      'theme',
      get_template_directory_uri() . '/assets/dist/css/theme.css',
      false
  );

  wp_enqueue_style(
    'blocks',
    get_template_directory_uri() . '/assets/dist/css/blocks.css',
    ['theme'],
  );
}