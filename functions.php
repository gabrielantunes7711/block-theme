<?php
require_once 'functions/helpers/require-files.php';

//Add-ons
require_files( get_template_directory() . '/functions/add-ons', 'php' );

// Core
require_files( get_template_directory() . '/functions/core', 'php' );

// Helpers
require_files( get_template_directory() . '/functions/helpers', 'php' );

// Options Page
require_files( get_template_directory() . '/functions/options_page', 'php' );


