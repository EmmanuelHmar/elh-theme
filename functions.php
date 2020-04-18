<?php

function elh_theme_support()
{
    // Adds dynamic title tag support
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'elh_theme_support');

function elh_register_styles()
{
    $version = wp_get_theme()->get('Version');

    wp_enqueue_style('elh-style', get_template_directory_uri() . "/style.css", array('elh-bootstrap'), $version, 'all');
    wp_enqueue_style('elh-bootstrap', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css", array(), '1.0', 'all');
    wp_enqueue_style('elh-fontawesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css", array(), '1.0', 'all');
    // wp_enqueue_style('elh-pure', "https://cdnjs.cloudflare.com/ajax/libs/pure/1.0.1/pure-min.css", array(), '1.0.1', 'all');
}

add_action('wp_enqueue_scripts', 'elh_register_styles');

function elh_register_scripts()
{
    wp_enqueue_script('elh-jquery', 'https://code.jquery.com/jquery-3.4.1.slim.min.js', array(), '3.4.1', true);
    wp_enqueue_script('elh-popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js', array(), '1.16.0', true);
    wp_enqueue_script('elh-bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', array(), '4.4.1', true);
    wp_enqueue_script('elh-script', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0', true);
}

add_action('wp_enqueue_scripts', 'elh_register_scripts');

function elh_setup_menus()
{
    $locations = array(
        'primary' => __('Desktop Left Sidebar'),
        'footer' => __('Footer Menu Items')
    );

    register_nav_menus($locations);
}

add_action('init', 'elh_setup_menus');


// Add Bootstrap walker class

function register_navwalker()
{
    require_once get_template_directory() .  '/class-wp-bootstrap-navwalker.php';
}

add_action('after_setup_theme', 'register_navwalker');


function elh_register_sidebars()
{
    register_sidebar(
        array(
            'before_title' => '',
            'after_title' => '',
            'before_widget' => '',
            'after_widget' => '',
            'id' => 'sidebar-1',
            'name' => 'Sidebar Area',
            'description' => 'Sidebar Widget Area'
        )
    );

    register_sidebar(
        array(
            'id' => 'footer',
            'before_title' => '',
            'after_title' => '',
            'before_widget' => '',
            'after_widget' => '',
            'id' => 'footer-1',
            'name' => 'Footer Area',
            'description' => 'Footer Widget Area'
        )
    );
}

add_action('widgets_init', 'elh_register_sidebars');
