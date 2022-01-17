<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head();?>
    <title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>
</head>

<body>
    <div class="main-container">
        <?php get_template_part('template-parts/sidebar')?>
        <div class="content-block">

            <?php get_template_part('template-parts/menus/mobile-menu')?>
            <?php get_template_part('template-parts/menus/desctop-menu')?>
            <main class="container">
                    <? if(is_front_page()){
                        get_template_part("template-parts/tops/front-top");
                    } elseif(is_product()){
                        get_template_part("template-parts/tops/product-top");
                    } elseif(is_post_type_archive('faq')){
                        get_template_part("template-parts/tops/faq-top");
                    } else {
                        get_template_part("template-parts/tops/top");
                    }?>