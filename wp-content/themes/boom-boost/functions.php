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

// подключение стилей 
function style_theme(){
    wp_enqueue_style('style', get_stylesheet_uri(), '', '1.0.' . date('His') );
}
// подключение стилей 


function sripts_theme(){
    wp_enqueue_script('main-sripts', get_template_directory_uri() . '/assets/js/main.js');
}

// включение меню виджетов в адмике 
function mytheme_register_nav_menus() {
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'your-text-domain' ),
        'footer' => __( 'Footer Menu', 'your-text-domain' )
    )); 
}
add_action( 'after_setup_theme', 'mytheme_register_nav_menus' );

function mytheme_widgets_init() {
    register_sidebar( array (
        'name' => __( 'Main Sidebar', 'your-text-domain' ),
        'id' => 'sidebar-1',
        'description' => __( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'your-text-domain' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}
add_action( 'widgets_init', 'mytheme_widgets_init' );
add_filter( 'gutenberg_use_widgets_block_editor', '__return_false' );
add_filter( 'use_widgets_block_editor', '__return_false' );
// включение меню виджетов в адмике 
