<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Oil
 */

get_header();
?>

            <section class="article">
                <div class="article-content container">
 		              <ul class="breadcrumbs">
		            	<!-- start breadcrumbs -->
		            	<?php the_breadcrumb(); ?>
		            	<!-- end breadcrumbs -->
		              </ul>

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			// if ( comments_open() || get_comments_number() ) :
			// 	comments_template();
			// endif;

		endwhile; // End of the loop.
		?>

                </div>
            </section>

<?php
get_sidebar();
get_footer();
