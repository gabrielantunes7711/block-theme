<?php

// function wpa_show_permalinks( $post_link, $post ){
//     if ( is_object( $post ) && $post->post_type == 'servicos' ){
//         $terms = wp_get_object_terms( $post->ID, 'tipos-de-servico' );
//         if( $terms ){
//             return str_replace( '%tipos-de-servico%' , $terms[0]->slug , $post_link );
//         }
//     }
//     return $post_link;
// }
// add_filter( 'post_type_link', 'wpa_show_permalinks', 1, 2 );