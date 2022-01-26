<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;
global $post;

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div class="top-bg">
	<?php
		$terms = get_the_terms( $post->ID, 'product_cat' );
		foreach ($terms as $term) {
			$product_cat_id = $term->term_id;
			break;
		}
		
		$thumbnail_id = get_term_meta( $product_cat_id, 'thumbnail_id', true );
		$cat_image = wp_get_attachment_url( $thumbnail_id );
	?>
	<img src="<?= $cat_image?>;"></img>
</div>

<div id="product-<?php the_ID(); ?>" <?php wc_product_class( 'page-checkout', $product ); ?>>
	<div class="top">
		<div class="container top-content">

			<div class="breadcrumbs">
				<?php do_action('woocommerce_breadcrumb_for-prod')?>
			</div>
			<div class="top-content__desc">
				<?php do_action('prod_main_info');?>
			</div>
			<div class="top-content__options">
				<?php do_action('extra_product_options');?>
			</div>
			
			<div class="top-content__card">
				<div class="buying-card">
				<div class="buying-card__content"> 
                    <div class="title">you’re buying</div>
                    <div class="buying-name">
						<?php the_title();?>
					</div>
                  </div>
					<?php do_action('extra_product_total')?>
					<a href="<?php echo $product->add_to_cart_url() ?>" value="<?php echo esc_attr( $product->get_id() ); ?>" class="ajax_add_to_cart add_to_cart_button link link-bg" data-product_id="<?php echo get_the_ID(); ?>" data-product_sku="<?php echo esc_attr($sku) ?>" aria-label="Add “<?php the_title_attribute() ?>” to your cart"> add to basket </a>
					<?php do_action('add_to_cart_on_page_product');?>
				</div>			
			</div>

		</div>
	</div>

	<section class="container content-block__description">
		<!-- <div class="content-block__header">
              <h2 class="content-block__title">description</h2>
        </div> -->
    	<!-- <?php get_template_part("template-parts/description");?> -->
  	</section>
	
	<!-- <section class="container content-block__trustpilot">
		<?php get_template_part("template-parts/trustpilot-slider");?>
  	</section> -->

	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	// do_action( 'woocommerce_after_single_product_summary' );
	?>

	<!-- <section class="container content-block__advantages">
	  <?php get_template_part("template-parts/whyChoose");?>
  	</section> -->

	<!-- <section class="container content-block__process-work">
		<?php get_template_part("template-parts/process-work");?>
	</section> -->

	<!-- <section class="container content-block__faq">
		<div class="content-block__header">
		<h2 class="content-block__title">faq</h2>
		<a class="link link-bg--transparent all-content" href="/faqs">check all
			faq</a>
		</div>
		<?php get_template_part("template-parts/FAQ-front");?>
	</section> -->
	
	<!-- <section class="container content-block__sub-form">
    	<?php get_template_part("template-parts/forms/form-subscribe");?>
  	</section> -->

	 <?= do_shortcode('[woocommerce_checkout]') ?> 
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>