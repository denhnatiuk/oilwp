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
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Hook Woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
	 <div class="product-card__name">
      <h3> <?php echo woocommerce_template_single_title(); ?> </h3>
   </div>
   <div class="product-card__row row">
     <div class="product-card__image col-lg-5 col-md-6 col-12">
        <?php echo woocommerce_show_product_images(); ?>
     </div>
     <div class="product-card__techniqic col-lg-3 col-md-6 col-12">
     	<div class="product-price"><?php echo woocommerce_template_single_price(); ?></div>
     	<div class="product-art"><?php echo woocommerce_template_single_meta(); ?></div>

        	<?php woocommerce_product_additional_information_tab(); ?>

     </div>
     </div>
     <div class="product-card__acquaintance col-lg-4 col-md-12">
      <div class="button grtransparent">Купить в 1 клик</div>
      <?php woocommerce_template_single_add_to_cart(); ?>
      
      <div class="product-acquaintance__item">
        <div class="product-acquaintance__title">Доставка</div>
        <ul class="product-acquaintance__container">
       	  <li class="acquaintance-point">Почта - от 7 дней, бесплатно</li>
          <li class="acquaintance-point">Курьером - от 5 дней (100 грн.)</li>
          <li class="acquaintance-point">Курьером - от 5 дней (100 грн.)</li>
        </ul>
      </div>
      <div class="product-acquaintance__item">
       <div class="product-acquaintance__title">Оплата</div>
        <ul class="product-acquaintance__container">
               <li class="acquaintance-point">Наличными курьеру</li>
               <li class="acquaintance-point">Наложенный платеж</li>
               <li class="acquaintance-point">Оплата картой</li>
        </ul>
       </div>

     </div>
   </div>
   </section>
   <section class="product-text">
     <div class="product-text__content container">
     	 <div class="product-text__title">
         <h5>Описание товара</h5>
       </div>
       <div class="product-text__paragraph">
     	<?php
     	the_excerpt();
     	// do_action('woocommerce_single_product_summary', 'woocommerce_shop_loop_item_desc', 10); 
     	?>
     	 </div>
     </div>
   </section>
   <section class="reviews">
     <div class="reviews-content container">
				 <?php get_template_part( 'template-parts/index', 'reviews' ); ?>
     </div>
   </section>
   <section class="associated">
     <div class="associated-content container">
       <div class="associated-title">
         <h3>Сопутствующие товары</h3>
       </div>
       <div class="associated-row">
        	<?php woocommerce_output_related_products(); ?>
       </div>
     </div>
   </section>
	<?php 
		
		//do_action( 'woocommerce_single_product_summary', 'woocommerce_product_additional_information_tab', 10 );
		/**
		 * Hook: woocommerce_before_single_product_summary.
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
		// do_action( 'woocommerce_before_single_product_summary' );
	?>

	<?php
			/**
			 * Hook: Woocommerce_single_product_summary.
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
			// do_action( 'woocommerce_single_product_summary' );
		?>
	
	<?php
		/**
		 * Hook: woocommerce_after_single_product_summary.
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */
		// do_action( 'woocommerce_after_single_product_summary' );
		// do_action( 'woocommerce_after_single_product_summary','woocommerce_upsell_display' );
		
	?>


<?php do_action( 'woocommerce_after_single_product' ); ?>
