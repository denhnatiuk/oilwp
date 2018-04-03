



        <?php //echo do_shortcode([woocommerce_cart]);?>
        
      <div class="cart-left">
          <div class="cart-icon">
            <img src="<?php echo get_template_directory_uri()?>/static/img/assets/header/cart.png">
          </div>
        </div>
        <div class="cart-right">
          <div class="cart-number">
            <a class="cart-contents" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>">
                <?php echo sprintf ( _n( '%d товар', '%d товаров', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?>
            </a>
          </div>
          <div class="cart-price"><?php echo WC()->cart->get_cart_total(); ?></div>
        </div>
      </div>
      <div class="col-lg-2 col-md-3 checkout">
        <div class="button fill" >
            <a href="<?php echo wc_get_cart_url(); ?>">Оформить</a>
        </div>
      </div>