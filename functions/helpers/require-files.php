<?php
function require_files( $dir, $extension = 'php', $file_name = null ) {
  $files = scandir( $dir );
  $files = array_diff( $files, ['.','..'] );

  foreach ( $files as $file ) {
    if ( is_dir( $dir.'/'.$file ) ) {
        require_files( $dir.'/'.$file, $extension, $file_name );
    } else if( pathinfo( $file, PATHINFO_EXTENSION ) == $extension ){
      require_once( $dir.'/'.$file );
    } else if ( $file == $file_name ) {
        require_once( $dir.'/'.$file );
    }
  }
}