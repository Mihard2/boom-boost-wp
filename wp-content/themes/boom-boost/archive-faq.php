<?php
/*
Template Name: FAQ template
*/
?>
<?php get_header(); ?>
<?php $post = get_post();
?>
    <section class="container content-block__faq">

        <?php get_template_part("template-parts/FAQ");?>
    
    </section>

    <section class="container content-block__quest-form">
        <?php get_template_part("template-parts/forms/ask-a-question");?>
    </section>
<?php get_footer(); ?>