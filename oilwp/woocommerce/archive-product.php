<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
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
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header( 'shop' );

?>
<section class="categories">
  <div class="categories-content container">
          <?php
      /**
       * Hook: woocommerce_before_main_content.
       *
       * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
       * @hooked woocommerce_breadcrumb - 20
       * @hooked WC_Structured_Data::generate_website_data() - 30
       */
      do_action( 'woocommerce_before_main_content' );
      ?>
      <div class="clearfix">
      </div>
    <div class="categories-row row">
      <div class="categories-filter col-lg-3 col-md-4 widget-area">
        <?php get_template_part( 'template-parts/store', 'filter' ); 

        ?>
        <aside class="aside">
        		<?php //if ( ! dynamic_sidebar() ) : ?>
          <div class="aside-title">
            <div class="aside-title__text">Подбор по марке авто</div>
            <div class="aside-title__icon active">
              <img src="<?php echo get_template_directory_uri()?>/static/img/assets/aside/down-arrow.png">
            </div>
          </div>
          <div class="aside-content">
              <form class="aside-form">
                <div class="aside-form__label">Введите данные:</div>
                <div class="form-group">
                  <input type="text" placeholder="Модель">
                </div>
                <div class="form-group">
                  <input type="text" placeholder="Год выпуска">
                </div>
                <div class="form-group">
                  <input type="text" placeholder="Объем двигателя">
                </div>
                <div class="aside-form__label">Что ищем :</div>
                <div class="form-group form-group__checkbox">
                  <input type="checkbox" id="oils">
                  <label for="oils">Масла</label>
                </div>
                <div class="form-group form-group__checkbox">
                  <input type="checkbox" id="autoparts">
                  <label for="autoparts">Автозапчасти</label>
                </div>
                <div class="form-group form-group__button">
                  <button class="button green">Подобрать</button>
                </div>
              </form>
          </div>
						<?php //endif; ?>
        </aside>
        <div class="advertising">
          <div class="advertising-text">Скидки на фары <span>10%</span></div>
          <div class="advertising-button">
            <div class="button green">Подробнее</div>
          </div>
        </div>
      </div>
      <div class="categories-products col-lg-9 col-md-8">
        <div class="categories-items">
            <header class="woocommerce-products-header">
            	<?php
            	/**
            	 * Hook: woocommerce_archive_description.
            	 *
            	 * @hooked woocommerce_taxonomy_archive_description - 10
            	 * @hooked woocommerce_product_archive_description - 10
            	 */
            	do_action( 'woocommerce_archive_description' );
            	?>
            </header>
            <?php
            
            if ( have_posts() ) {
            
            	/**
            	 * Hook: woocommerce_before_shop_loop.
            	 *
            	 * @hooked wc_print_notices - 10
            	 * @hooked woocommerce_result_count - 20
            	 * @hooked woocommerce_catalog_ordering - 30
            	 */
            	do_action( 'woocommerce_before_shop_loop' );
            
            	woocommerce_product_loop_start();
            
            	if ( wc_get_loop_prop( 'total' ) ) {
            		while ( have_posts() ) {
            			the_post();
            
            			/**
            			 * Hook: woocommerce_shop_loop.
            			 *
            			 * @hooked WC_Structured_Data::generate_product_data() - 10
            			 */
            			do_action( 'woocommerce_shop_loop' );
            
            			wc_get_template_part( 'content', 'product' );
            		}
            	}
            
            	woocommerce_product_loop_end();
            
            	/**
            	 * Hook: woocommerce_after_shop_loop.
            	 *
            	 * @hooked woocommerce_pagination - 10
            	 */
            	do_action( 'woocommerce_after_shop_loop' );
            } else {
            	/**
            	 * Hook: woocommerce_no_products_found.
            	 *
            	 * @hooked wc_no_products_found - 10
            	 */
            	do_action( 'woocommerce_no_products_found' );
            }
            
            /**
             * Hook: woocommerce_after_main_content.
             *
             * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
             */
            do_action( 'woocommerce_after_main_content' );
            
            ?>
            </div>
          <div class="categories-controller">
          </div>
        </div>
      </div>
    </div>
</section>
<?php   get_footer( 'shop' );?>