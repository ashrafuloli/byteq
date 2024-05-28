<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package gocart
 */

get_header();
?>

    <div class="blog-section-2 pt-100">
        <div class="container">
            <div class="row blog-row">
				<?php
				if ( have_posts() ):
					?>
                    <div class="result-bar page-header">
                        <h2 class="page-title mb-50"><?php esc_html_e( 'Search Results For:', 'gocart' ); ?><?php print get_search_query(); ?></h2>
                    </div>
					<?php
					while ( have_posts() ): the_post();
						get_template_part( 'template-parts/content', 'search' );
					endwhile; ?>

                    <div class="basic-pagination basic-pagination-2 mt-40 mb-40">
						<?php byteq_pagination( '<i class="far fa-angle-double-left"></i>', '<i class="far fa-angle-double-right"></i>', '', array( 'class' => '' ) ); ?>
                    </div>
				<?php
				else:
					get_template_part( 'template-parts/content', 'none' );
				endif;
				?>
            </div>
        </div>
    </div>
<?php
get_footer();


