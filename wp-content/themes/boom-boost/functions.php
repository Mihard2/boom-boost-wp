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

// add_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_login_form', 10 );
// add_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 );
// remove_action( 'woocommerce_checkout_order_review', 'woocommerce_order_review', 10 );
// remove_action( 'woocommerce_checkout_order_review', 'woocommerce_checkout_payment', 20 );
// add_action( 'woocommerce_checkout_terms_and_conditions', 'wc_checkout_privacy_policy_text', 20 );
// add_action( 'woocommerce_checkout_terms_and_conditions', 'wc_terms_and_conditions_page_content', 30 );
// add_action( 'woocommerce_checkout_before_customer_details', 'wc_get_pay_buttons', 30 );


// отключение лишних полей в козрине заказа
add_filter( 'woocommerce_checkout_fields', 'wpbl_remove_some_fields', 9999 );
 
function wpbl_remove_some_fields( $array ) {

    unset( $array['billing']['billing_phone'] ); // Телефон
    unset( $array['billing']['billing_company'] ); // Компания
    unset( $array['billing']['billing_country'] ); // Страна
    unset( $array['billing']['billing_address_1'] ); // 1-ая строка адреса 
    unset( $array['billing']['billing_address_2'] ); // 2-ая строка адреса 
    unset( $array['billing']['billing_city'] ); // Населённый пункт
    unset( $array['billing']['billing_state'] ); // Область / район
    unset( $array['billing']['billing_postcode'] ); // Почтовый индекс
     
    // Возвращаем обработанный массив
    return $array;
}


add_filter( 'woocommerce_checkout_fields', 'wplb_email_first' );
 
function wplb_email_first( $array ) {
    
    // Меняем приоритет
    $array['billing']['billing_email']['priority'] = 4;
    $array['billing']['billing_first_name']['priority'] = 5;
    $array['billing']['billing_last_name']['priority'] = 6;
    
    $array['billing']['billing_email']['class'][0] = 'form-row-first';
    $array['billing']['billing_first_name']['class'][0] = 'form-row-last';    
    $array['billing']['billing_last_name']['class'][0] = 'form-row-first';

    // Возвращаем обработанный массив
    return $array;
}


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

// add_action( 'add_to_cart_on_page_product', 'woocommerce_template_loop_add_to_cart', 5 );
add_action( 'add_to_cart_on_page_product', 'woocommerce_simple_add_to_cart', 10 );

// put this in functions.php, it will produce code before the form
add_action('woocommerce_after_single_product','show_cart_summary',100);


/**
 * @desc Remove in all product type
 * Удаление поля выбора количества товара
 */
function wc_remove_all_quantity_fields( $return, $product ) {
    return true;
}
add_filter( 'woocommerce_is_sold_individually', 'wc_remove_all_quantity_fields', 10, 2 );

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


// удаление лишних тегов-обертов в contact form 7
add_filter('wpcf7_form_elements', function($content) {
    $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);

    return $content;
});
