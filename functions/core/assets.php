<?php
/*
 * Importar Scripts e Styles
 */
function wpdocs_theme_name_scripts() {

    //CSS

    wp_enqueue_style( 'theme', get_template_directory_uri() . '/assets/dist/css/theme.css?v=' . time(), array());

    wp_enqueue_style( 'blocks', get_template_directory_uri() . '/assets/dist/css/blocks.css?v=' . time(), array());
    
    //JS
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery' , get_template_directory_uri() . '/assets/vendor/jquery/jquery-3.6.min.js', array(), '1.0.0', true);

    wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/assets/vendor/owl-carousel/owl.carousel.min.js', array('jquery'), '1.0.0', true );

    wp_enqueue_script( 'js-mask', get_template_directory_uri() . '/assets/vendor/mask/mask.js', array(), '1.0.0', true );

    wp_enqueue_script( 'js-yts-validation', get_template_directory_uri() . '/assets/vendor/yts-validation/yts-validation.js', array('jquery'), '1.0.0', true );

    wp_enqueue_script( 'theme', get_template_directory_uri() . '/assets/dist/js/theme.js?v='. time(), [], '1.0.0', true );

    wp_enqueue_script( 'blocks', get_template_directory_uri() . '/assets/dist/js/blocks.js?v='. time(), ['theme','owl-carousel', 'jquery'], '1.0.0', true );

    wp_enqueue_script('html2pdf', 'https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js', array(), '0.10.1', true);

    $translation_array = array( 'templateUrl' => site_url() );
    wp_localize_script( 'JS Principal', 'object_name', $translation_array );
}
add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );
