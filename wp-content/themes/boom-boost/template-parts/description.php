<div class="content-block__body cards-wrapper">
    <div class="description adaptHeight">
        <div class="description__content adaptHeight__content">
            <?php if( is_front_page() ) {?>
                
            <?php } elseif ( is_product_category() && $cat_desc = category_description()){                      
                    echo $cat_desc;
            }?>
        </div>
        <a class="show_more-btn adaptHeight__link" href="javascript:void(0)">show more</a>
    </div>
</div>