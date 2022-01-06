<?php get_header(); ?>
<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>

<?php while ( have_posts() ) : ?>
<?php the_post(); ?>

<?php wc_get_template_part( 'content', 'single-product' ); ?>

<?php endwhile; // end of the loop. ?>



<?php
get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */

?>
<!-- <div class="page-checkout">
    <div class="top">
        <div class="top-bg"> <img src="static/img/bg/top-2.jpg" alt=""></div>
        <div class="container top-content">
            <div class="breadcrumbs"><a href="#"> Home</a><a href="#"> Catalog</a><span>Shadowlands Conquesst Cap
                    Boost</span></div>
            <div class="top-content__desc">
                <h1>Shadowlands Conquest Cap Boost</h1>
                <div class="price">$129.99<span class="price-old">$140.00</span></div>
                <div class="title">options </div>
            </div>
            <div class="top-content__options">
                <div class="option-checkbox">
                    <label>
                        <input type="checkbox" name="honor20"><span></span>
                    </label>
                    <div class="option-checkbox__title">+20 Honor</div>
                    <div class="option-checkbox__separator"></div>
                    <div class="option-checkbox__price">+ €39.99</div>
                </div>
                <div class="option-checkbox">
                    <label>
                        <input type="checkbox" name="honor30"><span></span>
                    </label>
                    <div class="option-checkbox__title">+30 Honor</div>
                    <div class="option-checkbox__separator"></div>
                    <div class="option-checkbox__price">+ €59.99</div>
                </div>
                <div class="option-checkbox">
                    <label>
                        <input type="checkbox" name="honor40"><span></span>
                    </label>
                    <div class="option-checkbox__title">+40 Honor</div>
                    <div class="option-checkbox__separator"></div>
                    <div class="option-checkbox__price">+ €109.99</div>
                </div>
            </div>
            <div class="top-content__card">
                <div class="buying-card">
                    <div class="buying-card__content">
                        <div class="title">you’re buying</div>
                        <div class="buying-name">Shadowlands Conquest Cap Boost</div>
                        <div class="buying-desc"><span>Fast delivery: 3—6 days.</span><span>Flexible
                                price</span><span>Price for 3550 conquest cap</span></div>
                    </div>
                    <div class="buying-card__price">
                        <div class="buying-card__price-name">Options amount</div>
                        <div class="buying-card__price-count">€39.99</div>
                    </div>
                    <div class="buying-card__price">
                        <div class="buying-card__price-name">Final total</div>
                        <div class="buying-card__price-count">€169.98</div>
                    </div><a class="link link-bg" href="#">add to basket</a><a class="link link-bg--transparent"
                        href="#">buy right now</a>
                </div>
            </div>
        </div>
    </div>
</div> -->