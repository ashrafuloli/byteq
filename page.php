<?php get_header(); ?>

	<div class="page-area pt-120 pb-120">
		<div class="container">
			<div class="row">
				<div class="col-xl-12">
					<div class="byteq-page-content">
						<?php
						if( have_posts() ):
							while(  have_posts() ): the_post();
								get_template_part('template-parts/content','page');
							endwhile;
						else:
							get_template_part('template-parts/content', 'none');
						endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php get_footer();
