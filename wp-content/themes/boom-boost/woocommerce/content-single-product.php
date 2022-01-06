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

				<!-- <?php
				/**
				 * Hook: woocommerce_before_single_product.
				 *
				 * @hooked woocommerce_output_all_notices - 10
				 */
				do_action( 'woocommerce_before_single_product' );

				/**
				 * Hook: woocommerce_single_product_summary.
				 *
				 * @hooked woocommerce_template_single_title - 5
				 * @hooked woocommerce_template_single_rating - 10
				 * @hooked woocommerce_template_single_price - 10
				 * @hooked woocommerce_template_single_excerpt - 20
				 * @hooked woocommerce_template_single_add_to_cart - 30
				 * @hooked woocommerce_template_single_meta - 40
				 * @hooked woocommerce_template_single_sharing - 50
				 * @hooked WC_Structured_Data::generate_product_data() - 60
				 */
				do_action( 'woocommerce_single_product_summary' );
				?> -->
			</div>
			<div class="top-content__options">
				<?php do_action('extra_product_options')?>
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
					<?php do_action('add_to_cart');?>
				</div>			
			</div>

		</div>
	</div>

	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	do_action( 'woocommerce_after_single_product_summary' );
	?>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>