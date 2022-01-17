<a class="card-product" href="<?php the_permalink(); ?>">
    <img class="card-product__image" src="<?php the_post_thumbnail_url()?>" alt="">
    <div class="card-product__title"><?php the_title(); ?></div>
    <div class="card-product__subTitle"></div>
    <div class="card-product__price-block">
        <?php woocommerce_template_loop_price(); ?>
        <!-- <span class="price-1">$88.99</span>
              <span class="price-old">$118.00</span> -->
    </div>
    <div class="card-product__more link link-bg--transparent">more </div>
</a>