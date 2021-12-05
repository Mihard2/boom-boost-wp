<?php

add_action( 'after_setup_theme', 'woocommerce_support' );

function woocommerce_support() {
    add_theme_support( 'woocommerce' );
} 

add_action( 'wp_enqueue_scripts', 'style_theme' );
add_action( 'wp_footer', 'sripts_theme' );
add_action( 'after_setup_theme', 'theme_register_nav_menu');

function theme_register_nav_menu(){
    register_nav_menu( 'sidebar_menu', 'Main menu');
}

function style_theme(){
    wp_enqueue_style('style', get_stylesheet_uri(), '', '1.0.' . date('His') );
}


function sripts_theme(){
    wp_enqueue_script('main-sripts', get_template_directory_uri() . '/assets/js/main.js');
}