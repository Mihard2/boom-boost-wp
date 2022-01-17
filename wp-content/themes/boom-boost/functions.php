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

// удаление лишних хуков 
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);


// присвоение классов определенным страницам
add_action('page_class', 'my_class_name');
function my_class_name() {
    if(is_product()) {
        echo 'prod-page';
    }
}

// ПЕРЕПОДКЛЮЧЕНИЕ ХУКОВ В КАСТОМНЫХ МЕСТАХ 

// хлебные крошки в записях (товарах)
add_action('woocommerce_breadcrumb_for-prod', 'woocommerce_breadcrumb', 5);

add_action( 'prod_main_info', 'woocommerce_template_single_title', 5 );
add_action( 'prod_main_info', 'woocommerce_template_single_price', 10 );

add_action( 'prod_card_info', 'woocommerce_template_single_title', 5 );
add_action( 'prod_card_info', 'woocommerce_template_single_rating', 10 );

add_action( 'add_to_cart', 'woocommerce_template_loop_add_to_cart', 5 );
add_action( 'add_to_cart', 'woocommerce_template_single_add_to_cart', 10 );

// put this in functions.php, it will produce code before the form
add_action('woocommerce_after_single_product','show_cart_summary',100);

// ПЕРЕПОДКЛЮЧЕНИЕ ХУКОВ В КАСТОМНЫХ МЕСТАХ 
 

// gets the cart template and outputs it before the form
function show_cart_summary( ) {
  wc_get_template_part( 'cart/cart' );
}


// ПРОИЗВОЛЬНЫЕ ТИПЫ ЗАПИСЕЙ 

// произвольныетипы записей FAQ

function wptp_create_faq_post_type() {

    // faq custom post type
    register_post_type( 'faq', array(
        'labels' => array(
        'name' => 'FAQs',
        'singular_name' => 'FAQ'
    ),
        'has_archive' => true,
        'public' => true,
        'hierarchical' => true,
        'supports' => array( 'title', 'editor', 'excerpt', 'custom-fields', 'thumbnail','page-attributes' ),
        'exclude_from_search' => true,
        'capability_type' => 'post',
        'rewrite' => array ('slug' => 'faqs' ),
        )
    );

}
add_action( 'init', 'wptp_create_faq_post_type' );

// ПРОИЗВОЛЬНЫЕ ТИПЫ ЗАПИСЕЙ 


function post_tags_within_content() {
    global $post;
    $tags = get_the_tag_list( '' , ' ', '', $post->ID );
    return $tags;
}
add_action('tags', 'post_tags_within_content' );

add_filter('wpcf7_form_elements', function($content) {
    $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);

    return $content;
});
