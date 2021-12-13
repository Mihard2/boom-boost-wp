<?php get_header(); ?>
<?php
/*
Template Name: search
*/
?>
<div class="container">

    <h1><?php echo 'Результат поиска: ' . '<span>' . get_search_query() . '</span>'; ?></h1>
    <section class="container content-block__hot-sellers">
        <div class="content-block__header">
            <h2 class="content-block__title">hot offers and best sellers</h2>
            <a class="link link-bg--transparent all-content" href="#">check all offers</a>
        </div>
        <div class="content-block__body cards-wrapper">
            <?php
            if (have_posts()) :
            while (have_posts()) : the_post();
            ?>

            <a class="card-product <?php post_class("inloop-product"); ?>" href="<?php the_permalink(); ?>">
                <img class="card-product__image" src="<?php the_post_thumbnail_url()?>" alt="">
                <!-- <?php the_post_thumbnail("thumbnail-215x300"); ?> -->
                <div class="card-product__title">[<?php the_title(); ?></div>
                <div class="card-product__subTitle"></div>
                <div class="card-product__price-block">
                    <?php woocommerce_template_loop_price(); ?>
                    <!-- <span class="price-1">$88.99</span>
          <span class="price-old">$118.00</span> -->
                </div>
                <div class="card-product__more link link-bg--transparent">more </div>
            </a>

            <?php endwhile; ?>
        </div>
    </section>
    <?php
else :
echo "Извините по Вашему результату ничего не найдено";
endif;
?>
</div>

<?php get_footer(); ?>