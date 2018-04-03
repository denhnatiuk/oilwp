<?php
/**
 * Template part to display category news
 *
 * @package WordPress
 * @subpackage Demidov
 * @since 0.1
 * @version 0.1
 */

?>
<?php get_header(); ?>

  <section class="allnews">
    <div class="allnews-content container">
              <ul class="breadcrumbs">
            	<!-- start breadcrumbs -->
            	<?php the_breadcrumb(); ?>
            	<!-- end breadcrumbs -->
              </ul>

            <div class="allnews-title">
                        <h3>Все новости</h3>
                    </div>
                    <div class="allnews-row row">
            
            
            
              	
              <?php 
              $myposts = query_posts('category_name=news&posts_per_page=6'); 

              foreach( $myposts as $post ){ setup_postdata($post); ?>
              
              	<div class="allnews-item col-lg-6 col-md-12">
                  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="allnews-item__date"><?php the_time('j F Y') ?></div>
                    
                  <?php
                      if ( is_sticky() && is_home() ) :
                          echo twentyseventeen_get_svg( array( 'icon' => 'thumb-tack' ) );
                      endif;
                  ?>
                      <a href="<?php the_permalink(); ?>">
                          <div class="allnews-item__content">
                              <div class="allnews-item__left">
                                <div class="allnews-item__image">
            
                  <?php if ( '' !== get_the_post_thumbnail() && ! is_single() ) : ?>
                    <!-- post thumbnail code -->
                              <?php the_post_thumbnail( 'twentyseventeen-featured-image', 'style=""' ); ?>
                    <!-- .post-thumbnail -->
                  <?php endif; ?>
                                </div>
                              </div>
                              <div class="allnews-item__right">
                                <div class="allnews-date__mob"><?php the_time('j F Y') ?></div>
                                <div class="allnews-item__title">
                                  <h5><?php the_title(); ?></h5>
                                </div>
                                <div class="allnews-item__text">
                                  <p><?php the_excerpt_max_charlength(180);?></p>
                                </div>
                              </div>            

                  </article>
                </div><?php
              }
              wp_reset_postdata(); // сбрасываем переменную $post

              wp_link_pages( array(
          			'before'      => '<div class="page-links">' . __( 'Pages:', 'Oil' ),
          			'after'       => '</div>',
          			'link_before' => '<span class="page-number">',
          			'link_after'  => '</span>',
          		) );
          		?>
          </div>
  </section>
          
          
<?php get_footer(); ?>