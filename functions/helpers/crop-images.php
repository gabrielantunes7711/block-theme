<?php

add_action( 'after_setup_theme', 'custom_image_size' );
function custom_image_size() {
    add_theme_support( 'post-thumbnails' );
    add_image_size('front-blog', 260);
    add_image_size('background-notebook', 1280);
    add_image_size('background-tablet', 767);
    add_image_size('background-mobile', 549);
}