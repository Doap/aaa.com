<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package wprestyle
 */

get_header(); ?>

<section class="container-fluid" id="section3">
    <div class="row">
      <div class="col-sm-10 col-sm-offset-1">
        <div class="row">
          <div class="col-sm-8">
           
		<?php if ( have_posts() ) : ?>

			<header class="page-header text-center">
				<h3 class="page-title">
				
					<?php
						if ( is_category() ) :
							single_cat_title();

						elseif ( is_tag() ) :
							single_tag_title();

						elseif ( is_author() ) :
							/* Queue the first post, that way we know
							 * what author we're dealing with (if that is the case).
							*/
							the_post();
							printf( __( 'Author: %s', 'wprestyle' ), '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' );
							/* Since we called the_post() above, we need to
							 * rewind the loop back to the beginning that way
							 * we can run the loop properly, in full.
							 */
							rewind_posts();

						elseif ( is_day() ) :
							printf( __( 'Day: %s', 'wprestyle' ), '<span>' . get_the_date() . '</span>' );

						elseif ( is_month() ) :
							printf( __( 'Month: %s', 'wprestyle' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );

						elseif ( is_year() ) :
							printf( __( 'Year: %s', 'wprestyle' ), '<span>' . get_the_date( 'Y' ) . '</span>' );

						elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
							_e( 'Asides', 'wprestyle' );

						elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
							_e( 'Images', 'wprestyle');

						elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
							_e( 'Videos', 'wprestyle' );

						elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
							_e( 'Quotes', 'wprestyle' );

						elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
							_e( 'Links', 'wprestyle' );

						elseif ( is_post_type_archive( 'jetpack-portfolio' ) || is_tax( 'jetpack-portfolio-type' ) || is_tax( 'jetpack-portfolio-tag' ) ) :
						    _e( 'Portfolio', 'wprestyle' );
						
						else :
							_e( 'Archives', 'wprestyle' );

						endif;
					?>
				</h1>
				<?php
					// Show an optional term description.
					$wprestyle_term_desc = term_description();
					if ( ! empty( $wprestyle_term_desc ) ) :
						printf( '<div class="taxonomy-description">%s</div>', $wprestyle_term_desc );
					endif;
				?>
			</header><!-- .page-header -->

			<?php /* Start the Loop */
			while ( have_posts() ) : the_post();
				
					if ( is_post_type_archive( 'jetpack-portfolio' ) || is_tax( 'jetpack-portfolio-type' ) || is_tax( 'jetpack-portfolio-tag' ) ) :
						get_template_part( 'content/content', 'portfolio' );
					else :
					    get_template_part( 'content/content', 'home' );
					endif;
				

			endwhile;

			wprestyle_pagination();

		    else :

			get_template_part( 'no-results', 'archive' );

		    endif; ?>
        
		</div>
		<div class="col-sm-4">
            <?php get_sidebar(); ?>
        </div>
		</div>
   </div>
</section><!-- #primary -->
<?php get_footer();