<?php 

if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title'    => 'Config Global',
        'menu_title'    => 'Config Global',
        'menu_slug'     => 'configuracoes',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));

}

if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title'    => 'SEO',
        'menu_title'    => 'SEO',
        'menu_slug'     => 'seo',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));

}
