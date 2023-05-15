<?php

function remove_version() {
    return '';
}
add_filter('the_generator', 'remove_version');

remove_action('wp_head', 'wlwmanifest_link');

define('DISALLOW_FILE_EDIT', true);

remove_action('wp_head', 'rsd_link');
add_filter('xmlrpc_enabled', '__return_false');

header('X-Content-Type-Options: nosniff');
header('X-XSS-Protection: 1; mode=block');
header('Strict-Transport-Security: max-age=31536000;');

header("Permissions-Policy: accelerometer 'none' ; ambient-light-sensor 'none' ; autoplay 'none' ; camera 'none' ; encrypted-media 'none' ; fullscreen 'none' ; geolocation 'none' ; gyroscope 'none' ; magnetometer 'none' ; microphone 'none' ; midi 'none' ; payment 'none' ; speaker 'none' ; sync-xhr 'none' ; usb 'none' ; notifications 'none' ; vibrate 'none' ; push 'none' ; vr 'none' ");

// API Rest - desabilita a função
remove_action('xmlrpc_rsd_apis', 'rest_output_rsd');
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('template_redirect', 'rest_output_link_header', 11, 0);