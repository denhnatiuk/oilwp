<?php
/**
 * Template part to display latest news
 *
 * @package WordPress
 * @subpackage Oil
 * @since 0.1
 * @version 0.1
 */

?>
  <section class="news">
    <div class="news-content container">
      <div class="news-title">
        <h2>Новости</h2>
      </div>
      <div class="news-items row">

            <?php 
              $myposts = query_posts('category_name=news&posts_per_page=3'); 
              // global $post; // не обязательно
              // $news = new WP_Query(array( 'post_type' => 'news', 'posts_per_page' => 4, 'numberposts' => 10 ));
              // $args = array('category' => 1); // 5 записей из рубрики 9
              // $myposts = query_posts( $news );
              // $myposts = get_posts( $args );
              // $myposts = get_posts();
              foreach( $myposts as $post ){ setup_postdata($post); ?>
              
        <div class="news-item col-lg-4 col-md-6">
          <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                    <?php if ( '' !== get_the_post_thumbnail() && ! is_single() ) : ?>
                    <!-- post thumbnail code -->
            <div class="news-item__image">
              <a href="<?php the_permalink(); ?>">
                            
                    <?php the_post_thumbnail( 'twentyseventeen-featured-image', 'style=width:100%;height:auto;' ); ?>
                            
              </a>
              <div class="news-item__date">
                  <?php the_time('j F Y') ?>
              </div>
            </div><!-- .post-thumbnail -->
            
                    <?php endif; ?>
                    
            <header class="entry-header">
            
                    <?php
                      if ( 'post' === get_post_type() ) :
                        echo '<div class="entry-meta">';
                                    //   if ( is_single() ) :
                                    //       twentyseventeen_posted_on();
                                    //   else :
                                    //       echo twentyseventeen_time_link();
                                    //       twentyseventeen_edit_link();
                                    //   endif;
                        echo '</div><!-- .entry-meta -->';
                      endif;
                      
                      if ( is_single() ) {
                        the_title( '<h1 class="entry-title">', '</h1>' );
                      } else {
                        the_title(  '<div class="news-item__title">
                                      <h4>', 
                                      '</h4>
                                    </div>' );
                      }
                    ?>
            </header><!-- .entry-header -->
                  
            <div class="news-item__paragraph">
                <p>
                    <?php the_excerpt_max_charlength(280);?>
                </p>
            </div>
            <a href="<?php esc_url( get_permalink() ) ?>">
              <div class="news-item__button">
                <div class="button grtransparent">Читать далее</div>
              </div>
            </a>
          </article>
        </div>
                        
            <?php
              }
              wp_reset_postdata(); // сбрасываем переменную $post
             ?>
      </div>
      </div>
  </section>
          
          
