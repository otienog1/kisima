<?php get_header(); ?>

<section class="section taxonomy">
	<div class="container">
		<div class="row kisima-article">
			<div class="col-md-3 reveal">
				<?php get_sidebar() ?>
			</div>
			<div class="col-md-9 reveal">
				<h2 class="display-6 text-muted mb-3">
					<?php echo single_term_title(); ?>
				</h2>
				<div class="description mb-3">
					<?php echo term_description(); ?>
				</div>
				<div class="row k-post-container px-3">
					<?php if ( have_posts() ) : ?>

						<?php
						// Start the loop.
						// echo "<div class='page-limit' data-page='/blog/'". kisimaCheckPaged() .">";
						while ( have_posts() ) : the_post();

							/*
							 * Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'template-parts/content/tax', get_post_format() );

						// End the loop.
						endwhile;
						
						// echo "</div>";
						
						?>
						<?php
						// // Previous/next page navigation.
						// the_posts_pagination( array(
						// 	'prev_text'          => __( 'Previous', 'kisima' ),
						// 	'next_text'          => __( 'Next', 'kisima' ),
						// ) );

					// If no content, include the "No posts found" template.
					else :
						get_template_part( 'template-parts/content/none' );

					endif;
					?>
				</div>
				<!-- <div class="container text-center load-more mt-3 pt-3">
					<a class="btn btn-secondary kisima-load-more" data-page="<?php echo kisimaCheckPaged(2) ?>" data-url="<?php echo admin_url('admin-ajax.php') ?>">
					<span class="fa fa-refresh fa-1x kisima-icon"></span>
					<span class="load-text">Load More</span></a>
				</div> -->
				<div class="container text-center load-more">
					<?php 
						the_posts_pagination( array(
							'prev_text'          => __( 'Previous', 'kisima' ),
							'next_text'          => __( 'Next', 'kisima' ),
						) );
					?>
				</div>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>