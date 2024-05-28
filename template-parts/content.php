<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package byteq
 */
if ( is_single() ): ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class( 'row justify-content-center' ); ?>>
        <div class="col-xl-10">
            <div class="blog-details-content">
                <h3 class="title">
					<?php the_title(); ?>
                </h3>

				<?php if ( has_post_thumbnail() ): ?>
                    <div class="thumb">
						<?php the_post_thumbnail( 'byteq-post-details', array(
							'class' => 'img-responsive',
							'alt'   => get_the_post_thumbnail_caption( get_the_ID() )
						) ); ?>
                    </div>
				<?php endif; ?>

                <div class="share-wrap">
                    <h3>Share to:</h3>
                    <div class="custom-social-share">
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"
                           target="_blank" rel="noopener noreferrer">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://twitter.com/intent/tweet?text=<?php the_title(); ?>&url=<?php the_permalink(); ?>"
                           target="_blank" rel="noopener noreferrer">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php the_permalink(); ?>"
                           target="_blank" rel="noopener noreferrer">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>

                <div class="text">
					<?php the_content(); ?>

					<?php
					wp_link_pages( array(
						'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'byteq' ),
						'after'       => '</div>',
						'link_before' => '<span class="page-number">',
						'link_after'  => '</span>',
					) );
					?>
                </div>
            </div>
        </div>
    </article>
<?php
else: ?>

    <div class="col-xl-4 col-lg-6 col-md-6">
        <div class="blog-card-wrap">
            <div class="blog-thumb">
                <a href="<?php echo get_the_permalink(); ?>">
					<?php echo get_the_post_thumbnail( get_the_ID(), 'full' ); ?>
                </a>
            </div>
            <div class="blog-card-content">
                <div class="content-wrap">
                    <div class="tag">
						<?php
						$terms = get_the_terms( get_the_ID(), 'category' );

						if ( $terms && ! is_wp_error( $terms ) ) {
							foreach ( $terms as $term ) {
								$term_link = get_term_link( $term );
								echo '<a href="' . esc_url( $term_link ) . '">' . $term->name . '</a>';
							}
						}
						?>
                    </div>
                    <span>
                        <?php
                        $word_count   = str_word_count( strip_tags( get_the_content() ) );
                        $reading_time = ceil( $word_count / 200 );
                        echo $reading_time;
                        ?> min read
                    </span>
                </div>

                <h3 class="title">
                    <a href="<?php echo get_the_permalink(); ?>">
						<?php echo get_the_title(); ?>
                    </a>
                </h3>

                <div class="read-more">
                    <a href="<?php echo get_the_permalink(); ?>">read more</a>
                </div>
            </div>
        </div>
    </div>
<?php
endif; ?>
