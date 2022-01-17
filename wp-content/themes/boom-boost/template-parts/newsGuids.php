<div class="content-block__header">
    <h2 class="content-block__title">recent news &amp; guides</h2>
</div>
<div class="content-block__body cards-wrapper">
    <div class="scroll-slider">
        <div class="scroll-slider__wrapp">
        <?php 
        $args = array( 
            'posts_per_page' => 6 
        );
        $the_query = new WP_Query( $args );

        if($the_query->have_posts()):
            while($the_query->have_posts()) : $the_query->the_post(); ?>
                <div class="card-news">
                    <div class="card-news__header">
                        <?php the_post_thumbnail();?>
                    </div>
                    <div class="card-news__body">
                        <div class="card-news__body-date">
                            <?php the_date(); ?>
                        </div>
                        <div class="card-news__body-title">
                            <?php the_title(); ?>
                        </div>
                        <div class="card-news__body-content">
                            <?php 
                                $content = get_the_content();
                                $trimmed_content = wp_trim_words( $content, 40, '<a href="'. get_permalink() .'"> ...Read More</a>' );
                                echo $trimmed_content;
                            ?>
                        </div>
                    </div>
                </div>
            <?php endwhile;
        endif;?>
        </div>
        <div class="scroll-slider__control">
            <input id="slider-control" type="range" min="0" max="100" value="0" step="0.1" name="range">
        </div>
    </div>
</div>