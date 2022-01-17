<?php
    /*
     Template Name: Front Page
    */
?>

<?php get_header(); ?>

  <section class="container content-block__hot-sellers">
    <!-- <div class="content-block__header">
      <h2 class="content-block__title">hot offers and best sellers</h2>
      <a class="link link-bg--transparent all-content" href="#">check all offers</a>
    </div> -->
    <div class="content-block__body cards-wrapper">

      <?php
        $hotProd = array(
          'post_type' => 'product',
          'posts_per_page' => 4,
          'orderby' => 'menu_order',
          'order' => 'ASC',
          'tax_query' => array(
            array(
              'taxonomy' => 'product_cat',
              'field' => 'slug',
              'terms' => array( 'raids'),
              'operator' => 'NOT IN'
            )
          )
        );

        $query = new WP_Query($hotProd);
        while ( $query->have_posts() ): $query->the_post(); 

          // get_template_part("template-parts/cards/prodCard");
      
        endwhile; wp_reset_postdata(); ?>

      <a class="link link-bg--transparent all-content" href="#">check all offers</a>
    </div>
  </section>


  <section class="container content-block__upcoming-raids">
    <!-- <div class="content-block__header">
      <h2 class="content-block__title">Upcoming Raids</h2>
      <a class="link link-bg--transparent all-content" href="#">check raids calendar</a>
    </div> -->
    <div class="content-block__body">
        <div class="tabs-block">
            <!-- <ul class="tabs-block__nav">
                <li>
                    <a class="active-tab" href="#">All</a></li>
                <li>
                    <a href="#">Heroic</a></li>
                <li>
                    <a href="#">Mythic</a></li>
                <li>
                    <a href="#">Glories</a></li>
                <li>
                    <a href="#">Mounts</a></li>
            </ul>
            <ul class="tabs-block__nav">
                <li>
                    <a class="active-tab" href="#">All</a></li>
                <li>
                    <a href="#">Horde</a></li>
                <li>
                    <a href="#">Alliance</a></li>
            </ul> -->
        <div class="tabs-block__content cards-wrapper">
          <?php
            $raidProd = array(
              'post_type' => 'product',
              'posts_per_page' => 4,
              'orderby' => 'menu_order',
              'order' => 'ASC',
              'tax_query' => array(
                array(
                  'taxonomy' => 'product_cat',
                  'field' => 'slug',
                  'terms' => array( 'raids'),
                  'operator' => 'IN'
                )
              )
            );

            $query = new WP_Query($raidProd);
            $i = 0;
            while ( $query->have_posts() ): $query->the_post(); 
            
              // get_template_part("template-parts/cards/raids");
              $i++;
            endwhile; wp_reset_postdata(); ?>
          </div>
        </div>
      <!-- <a class="link link-bg--transparent all-content" href="#">check raids calendar</a> -->
    </div>
  </section>

  <!-- <section class="container content-block__advantages">
    <?php get_template_part("template-parts/whyChoose");?>
  </section> -->

  <!-- <section class="container content-block__popular">
    <?php get_template_part("template-parts/popular");?>
  </section> -->
  
  <!-- <section class="container content-block__trustpilot">
    <?php get_template_part("template-parts/trustpilot-slider");?>
  </section> -->

  <section class="container content-block__newsGuides">
    <?php get_template_part("template-parts/newsGuids");?>
  </section>

  <section class="container content-block__faq">
    <div class="content-block__header">
    <h2 class="content-block__title">faq</h2>
    <a class="link link-bg--transparent all-content" href="/faqs">check all
        faq</a>
    </div>
    <?php get_template_part("template-parts/FAQ-front");?>
  </section>

  <!-- <section class="container content-block__process-work">
    <?php get_template_part("template-parts/process-work");?>
  </section> -->

  <!-- <section class="container content-block__description">
    <?php get_template_part("template-parts/description");?>
  </section> -->

  <section class="container content-block__sub-form">
    <?php get_template_part("template-parts/forms/form-subscribe");?>
  </section>


<?php get_footer(); ?>