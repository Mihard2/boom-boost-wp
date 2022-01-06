<?php
    /*
     Template Name: Front Page
    */
?>

<?php get_header(); ?>

  <section class="container content-block__hot-sellers">
    <div class="content-block__header">
      <h2 class="content-block__title">hot offers and best sellers</h2>
      <a class="link link-bg--transparent all-content" href="#">check all offers</a>
    </div>
    <div class="content-block__body cards-wrapper">

      <?php
        $loop = new WP_Query( array(
        'post_type' => 'product',
        'posts_per_page' => 4,
        'orderby' => 'menu_order',
        'order' => 'ASC',
        ));

        while ( $loop->have_posts() ): $loop->the_post(); 

          get_template_part("template-parts/cards/prodCard");
      
        endwhile; wp_reset_postdata(); ?>

      <a class="link link-bg--transparent all-content" href="#">check all offers</a>
    </div>
  </section>


  <!-- <section class="container content-block__upcoming-raids">
    <?php get_template_part("template-parts/upcoming");?>
  </section>

  <section class="container content-block__advantages">
    <?php get_template_part("template-parts/whyChoose");?>
  </section>

  <section class="container content-block__popular">
    <?php get_template_part("template-parts/popular");?>
  </section>
  <section class="container content-block__trustpilot">
    <?php get_template_part("template-parts/trustpilot-slider");?>
  </section>
  <section class="container content-block__newsGuides">
    <?php get_template_part("template-parts/newsGuidуs");?>
  </section>
  <section class="container content-block__faq">
    <?php get_template_part("template-parts/FAQ");?>
  </section>
  <section class="container content-block__process-work">
    <?php get_template_part("template-parts/process-work");?>
  </section>
  <section class="container content-block__description">
    <?php get_template_part("template-parts/description");?>
  </section>
  <section class="container content-block__sub-form">
    <?php get_template_part("template-parts/form-subscribe");?> -->
  </section>


<?php get_footer(); ?>