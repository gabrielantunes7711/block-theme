<?php
function acf_load_cpt_field_choices( $field ) {
    // reset choices
    $field['choices'] = [];
    
    $post_types = get_post_types( [
        'public'   => true,
        ], 'objects' );
    
    if( $post_types ) {
        foreach( $post_types as $post_type ) {
          if ( $post_type->label != 'Páginas' && $post_type->label != "Mídia" ) {
            $field['choices'][ $post_type->name ] = $post_type->label;
          }
        }
    }
    
    return $field;
}

add_filter('acf/load_field/name=post_type', 'acf_load_cpt_field_choices');