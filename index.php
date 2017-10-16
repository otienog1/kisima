<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

<section class="section">
	<div class="container">
		<div class="row kisima-article">
			<div class="col-md-12">
				<?php //if( is_paged() ): ?>
					<!-- <div class="container text-center load-more mb-3 pb-3">
						<a class="btn btn-secondary kisima-load-more" data-prev="1" data-page="<?php echo kisimaCheckPaged(2) ?>" data-url="<?php echo admin_url('admin-ajax.php') ?>">
						<span class="fa fa-refresh fa-1x kisima-icon"></span>
						<span class="load-text">Load Preious</span></a>
					</div> -->
				<?php// endif ?>

				<div class="row k-post-container">
					<?php if ( have_posts() ) : ?>

						<?php if ( is_home() && ! is_front_page() ) : ?>
							<!-- <header>
								<h1 class="display-6 page-title screen-reader-text"><?php single_post_title(); ?></h1>
							</header> -->
						<?php endif; ?>

						<?php
						// Start the loop.
						// echo "<div class='page-limit' data-page='/blog/'". kisimaCheckPaged() .">";
						while ( have_posts() ) : the_post();


							/*
							 * Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'template-parts/content/blog', get_post_format() );

						// End the loop.
						endwhile;
						
						// echo "</div>";
						
						?>
						<?php
						// Previous/next page navigation.
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