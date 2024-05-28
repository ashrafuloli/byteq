<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package gocart
 */
?>

<<div class="col-xl-4 col-lg-6 col-md-6">
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