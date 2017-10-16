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
<?php while ( have_posts() ) : the_post(); ?>
<section class="page-section">

	<?php
		// Post thumbnail.
		if ( has_post_thumbnail() ):
	?>
		<div id="single-post-image" class="recent-post-image single-post-image p-rel single" style="background-image: url(<?php the_post_thumbnail_url('singlepost-thumb'); ?>);" data-stellar-background-ratio="0.5">
				<header class="entry-header d-block text-center p-abs w-100 top-50 z-1">
					<?php the_title( '<h1 class="entry-title display-6 font-gothic text-white">', '</h1>' ); ?>

				</header><!-- .entry-header -->
				<div class="overlay p-abs w-100"></div>
		</div>
	<?php else: ?>

		<div class="recent-post-image single-post-image p-rel single">
				<header class="entry-header d-block text-center p-abs w-100 top-50">
					<?php the_title( '<h1 class="entry-title display-6 font-gothic">', '</h1>' ); ?>

				</header><!-- .entry-header -->
				<div class="overlay p-abs w-100"></div>
		</div>

		<?php endif; ?>

	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<?php get_sidebar(); ?>
			</div>
			<div class="col-md-8 m-auto py-4 px-3">
				<?php
					// Start the loop.
						// Include the page content template.
						get_template_part( 'template-parts/content/listing');
					// End the loop.
				?>
			</div>
		</div> <!-- .row -->
	</div><!-- .content-area -->
</section>

<?php endwhile; ?>

<?php get_footer(); ?>
