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
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

            <div class="breadcrumbs-wrapper">
                <div class="breadcrumbs-content container">

								<?php
									/**
									 * woocommerce_before_main_content hook.
									 *
									 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
									 * @hooked woocommerce_breadcrumb - 20
									 */
									do_action( 'woocommerce_before_main_content' );
								?>

                </div>
            </div>
            <section class="product-card">
                <div class="product-card__content container">

						<?php while ( have_posts() ) : the_post(); ?>
						
				
							<?php wc_get_template_part( 'content', 'single-product' ); ?>
				
						<?php endwhile; // end of the loop. ?>
						
							<?php
								/**
								 * woocommerce_after_main_content hook.
								 *
								 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
								 */
								do_action( 'woocommerce_after_main_content' );
							?>
						
								</div>
            </section>



	<?php
	//add_action( 'woocommerce_after_single_product_summary', 'yourthemename_upsell_related_cross',  20 );

	//do_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
	 
	// do_action( 'woocommerce_review_before', 'woocommerce_review_display_gravatar', 10 );
	// do_action( 'woocommerce_review_before_comment_meta', 'woocommerce_review_display_rating', 10 );
	// do_action( 'woocommerce_review_meta', 'woocommerce_review_display_meta', 10 );
	// do_action( 'woocommerce_review_comment_text', 'woocommerce_review_display_comment_text', 10 );
			/**
		 * woocommerce_sidebar hook.
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		//do_action( 'woocommerce_sidebar' );
	?>

<?php get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
