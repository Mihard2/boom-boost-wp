
<?php if(have_posts()):
    while(have_posts()) : the_post(); ?>
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
endif;