<div class="top-bg">
    <!-- <img src="<?php the_post_thumbnail_url('full');?>"></img> -->
    <img src="<?= home_url();?>/wp-content/uploads/2022/01/top-faq.jpeg"></img>
</div>
<div class="top">
    <div class="container">
        <div class="breadcrumbs">
            <?php woocommerce_breadcrumb()?>
        </div>
        <div class="top-content__desc">
            <h1><?php the_title(); ?></h1>
        </div>
    </div>
</div>