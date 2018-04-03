<?php
	if ( is_front_page() && is_woocommerce() ) {
		// Include the featured content template.
		// get_template_part( 'content' );
	}
?>
     <?php if ( have_posts() ) : ?>
     
    <div class="page-home">
      <div class="page-home-content container">
        <div class="page-home__row row">
          <div class="page-home__left col-lg-3 col-md-4 col-12">
             <aside class="aside">
              	<?php //get_sidebar( 'template-parts/store', 'aside'); ?>
              	<?php get_template_part( 'template-parts/store', 'aside'); ?>
             </aside>
          </div>
       <div class="page-home__right col-lg-9 col-md-8 cold-12">
        <div class="home-products home-products__sale">
          <div class="home-products__top">
            <div class="home-products__title">
              <h3>Товары со скидкой</h3>
            </div>
            <div id="sale-controller" class="home-products__controller"></div>
          </div>
          <div class="home-products__list">
             <?php
               remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
               remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
             ?>
            	<?php
            	// global $product;
            	// if ( $product->is_on_sale() ) {
             		$args = array(
             			'post_type' => 'product',
             			'posts_per_page' => 12,
             			'meta_key' => '_sale_price',
                  'meta_value' => '0',
                  'meta_compare' => '>='
             			);
             		$loop = new WP_Query( $args );
             		if ( $loop->have_posts() ) {
             		  	while ( $loop->have_posts() ) : $loop->the_post(); ?>
             		 	    <div class="product">
             		 	<?php	wc_get_template_part( 'content', 'product' ); ?>
             	       </div>
             			<?php endwhile;
             		} else {
             			echo __( 'No products found' );
             		}
             		wp_reset_postdata();
             	
             // }
             ?>
            
          </div>
        </div>
        <div class="home-products home-products__featured">
          <div class="home-products__top">
            <div class="home-products__title">
              <h3>Популярные товары</h3>
            </div>
            <div id="featured-controller" class="home-products__controller"></div>
          </div>
          <div class="home-featured__list">
             
                <?php
                       remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
                       remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
                ?>
                <?php
                   // global $product;
                  	// if ( $product->is_on_sale() ) {
                 		$args = array(
                 			'post_type' => 'product',
                 			'posts_per_page' => 12,
                 			'product_tag' => 'featured'

                			);
                 		$loop = new WP_Query( $args );
                 		if ( $loop->have_posts() ) {
                     	while ( $loop->have_posts() ) : $loop->the_post(); 
                  ?>
                                        		  	
              <div class="product featured">
                           		 	
            		 	<?php	wc_get_template_part( 'content', 'product' ); ?>
                                          	   
              </div>
                                          			
             			<?php endwhile;
                 		} else {
                   			echo __( 'No products found' );
                 		}
              		wp_reset_postdata();
                  // }
                ?>
                                     
            </div>
          </div>

                <?php //woocommerce_content( 'content', 'product' ); ?>

                <?php add_action( 'woocommerce_before_shop_loop_item_title', 'ignition_feature_flash', 15 ); ?>

                <?php endif; ?>

      </div>
  		</div><!-- #content -->
  	</div><!-- #primary -->
  </div><!-- #main-content -->