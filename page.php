<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Kisima
 */

get_header(); ?>

<section class="section page-section">
	<div class="container py-3">
		<div class="row kisima-article">
			<div class="col-md-3 reveal">
				<?php get_sidebar() ?>
			</div>
			<div class="col-md-9 reveal">
				<?php
					// Start the loop.
					while ( have_posts() ) : the_post();
						// Include the page content template.
						get_template_part( 'template-parts/content/page');

					// End the loop.
					endwhile;
				?>
			</div>
		</div> <!-- .row -->
	</div><!-- .content-area -->
</section>

<?php get_footer(); ?>
