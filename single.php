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
		<div class="recent-post-image single-post-image p-rel single" style="background-image: url(<?php the_post_thumbnail_url('singlepost-thumb'); ?>);">
				<header class="entry-header d-block text-center p-abs w-100 top-50">
					<?php the_title( '<h1 class="entry-title display-6 font-gothic">', '</h1>' ); ?>

					<ol class="breadcrumb text-center d-flex justify-content-center">
						<li class="breadcrumb-item">Home</li>
						<li class="breadcrumb-item">Blog</li>
						<li class="breadcrumb-item active"><?php the_title(); ?></li>
					</ol>

				</header><!-- .entry-header -->
				<div class="overlay p-abs w-100"></div>
		</div>
	<?php else: ?>

		<div class="recent-post-image single-post-image p-rel single">
				<header class="entry-header d-block text-center p-abs w-100 top-50">
					<?php the_title( '<h1 class="entry-title display-6 font-gothic">', '</h1>' ); ?>

					<ol class="breadcrumb text-center d-flex justify-content-center">
						<li class="breadcrumb-item">Home</li>
						<li class="breadcrumb-item">Blog</li>
						<li class="breadcrumb-item active"><?php the_title(); ?></li>
					</ol>

				</header><!-- .entry-header -->
				<div class="overlay p-abs w-100"></div>
		</div>

		<?php endif; ?>

	<div class="container">
		<div class="row">
			<div class="col-md-8 m-auto py-4 px-3">
				<?php
					// Start the loop.
						// Include the page content template.
						get_template_part( 'template-parts/content/post');
					// End the loop.
				?>
			</div>
		</div> <!-- .row -->
	</div><!-- .content-area -->
</section>

<section class="section comments-section">
	<div class="container">
		<div class="row">
			<div class="col-md-8 m-auto">
			<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>	
			</div>
		</div>
	</div>
</section>

<?php endwhile; ?>

<?php get_footer(); ?>
