<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8">
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php get_template_part('partials/header/head-title'); ?>
    <style>
        <?php //include 'assets/dist/css/above-the-fold.css'; ?>
    </style>
    <?php wp_head(); ?>
    <?php //get_template_part("includes/favico"); ?>
    <?php get_template_part('includes/seo-codes/script-head') ?>
</head>
<body <?php body_class(); ?>>
    <?php get_template_part('includes/seo-codes/script-body') ?>
    
    <?php if (!is_front_page()): ?>
        <?php get_template_part('includes/components/common/breadcrumb'); ?>
    <?php endif;?>
