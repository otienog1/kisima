<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Kisima
 * @since Kisima 1.0
 */
// $class = '';
// $anim = '';
?>

<div class="col-md-4 kisima-article listing-taxon p-0">
	<div class="tax-listing p-rel">
		<?php
			if ( has_post_thumbnail() ):
				// $class = 'has-thumb';
				// $anim = 'post-body-anim';
		?>
		<a href="<?php echo get_permalink() ?>" class="taxon-image d-block p-abs top-0 bottom-0 w-100 bg-cover" style="background-image: url(<?php the_post_thumbnail_url('homepage-thumb'); ?>);">
			<div class="overlay p-abs w-100 top-0 bottom-0"></div>

			<h2 class="entry-title p-abs p-3"><?php echo mb_convert_case(get_the_title(), MB_CASE_TITLE, "UTF-8") ?></h2>
		</a>
		<?php else: ?>
		<a href="<?php echo get_permalink() ?>" class="taxon-image d-block p-abs top-0 bottom-0 w-100 bg-cover">
			<div class="overlay p-abs w-100 top-0 bottom-0"></div>

			<h2 class="entry-title p-abs p-3"><?php echo mb_convert_case(get_the_title(), MB_CASE_TITLE, "UTF-8") ?></h2>
		</a>
		<?php
			endif;	
		?>
	</div>
</div>