<?php
function register_block( $dir ) {
  $files = scandir( $dir );
  $files = array_diff( $files, ['.','..'] );

  foreach ( $files as $file ) {
    if ( is_dir( $dir.'/'.$file ) ) {
      register_block( $dir.'/'.$file );
    } else if ( $file == 'block.json' ) {
      register_block_type( $dir );
    }
  }
}

add_action( 'init', 'register_all_blocks' );
function register_all_blocks() {
  register_block( get_template_directory() . '/blocks' );
}