
<?php 
$args = array( 
    'post_type' => 'faq', 
    'posts_per_page' => 3 
);
$the_query = new WP_Query( $args );

if($the_query->have_posts()):
    while($the_query->have_posts()) : $the_query->the_post(); ?>
        <div class="content-block__body cards-wrapper">
            <div class="card-faq adaptHeight">
                <div class="card-faq__title adaptHeight__link">
                    <?php the_title(); ?>
                    <div class="rounded-triangle">
                        <div class="rounded-triangle_block"></div>
                    </div>
                </div>
                <div class="card-faq__content adaptHeight__content">
                    <?php the_content();?>
                </div>
            </div>
        </div>
    <?php endwhile;
    wp_reset_postdata();
endif;?>