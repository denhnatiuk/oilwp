<?php get_header(); ?>

            <section class="article">
                <div class="article-content container">



                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                  <?php get_template_part( 'template-parts/content', 'page'); ?>
                <?php endwhile; endif; ?>

                </div>
            </section>


<?php get_footer(); ?>