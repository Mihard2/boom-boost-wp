<?php global $i;

$fraction = get_field('fraction');
$dataRaid = get_field('data_raid');
$timeRaid = get_field('time_raid');

if($i==0){ ?>

    <div class="card-raid card-raid--active" data-tags="<?php get_the_tags($id); ?>">
        <div class="card-raid__head">
            <span class="card-raid__head-desc">Next raid in </span>
            <span class="card-raid__head-date">
                at <?= $timeRaid; ?>
            </span>
            <span class="card-raid__head-time">
                3 h : 42 m :10 sec
            </span>
        </div>
        <div class="card-raid__body">
            <div class="card-raid__body-title">
                <?php the_title(); ?>
            </div>
            <div class="card-raid__body-desc--wrapp">
                <div class="card-raid__body-desc">
                    <?php the_content();?>
                </div>
                <?php if($fraction) {?>
                    <div class="card-raid__body-logo icons-main icons-main__<?= $fraction; ?>"> </div>
                <?php } ?>
            </div>
            <div class="card-raid__body-price">
                <?php woocommerce_template_loop_price();?>
            </div>                    
        </div>
        <a href="<?php echo do_shortcode('[add_to_cart_url id="'.get_the_ID().'"]'); ?>" class="link link-bg card-raid__link">add to basket</a>
    </div>

<?php } else { ?>

    <div class="card-raid" data-tags="<?php get_the_tags($id); ?>">
        <div class="card-raid__head">
            <span class="card-raid__head-date">
                <?= $dataRaid; ?>
            </span>
            <span class="card-raid__head-time">
                <?= $timeRaid; ?>
            </span>
        </div>
        <div class="card-raid__body">
            <div class="card-raid__body-title">
                <?php the_title(); ?>
            </div>
            <div class="card-raid__body-desc--wrapp">
                <div class="card-raid__body-desc">
                    <?php the_content();?>
                </div>
                <?php if($fraction) {?>
                    <div class="card-raid__body-logo icons-main icons-main__<?= $fraction; ?>"> </div>
                <?php } ?>
            </div>
            <div class="card-raid__body-price">
                <?php woocommerce_template_loop_price(); ?>
            </div>
        </div>
        <a href="<?php echo do_shortcode('[add_to_cart_url id="'.get_the_ID().'"]'); ?>" class="link link-bg card-raid__link">add to basket</a>
    </div>
<?php } ?>