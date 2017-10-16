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
$class = '';
$anim = '';
?>

<div class="col-md-4 kisima-article">
	<div class="recent-post-wrapper bx post-excerpt p-rel">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php
				if ( has_post_thumbnail() ):
					$class = 'has-thumb';
					$anim = 'post-body-anim';
			?>
			<a href="<?php echo get_permalink() ?>">
				<div class="recent-post-image" style="background-image: url(<?php the_post_thumbnail_url('homepage-thumb'); ?>);">
				</div>
			</a>
			<?php
				endif;	
			?>

			<div class="recent-post-body p-rel bg-white <?php echo $class . ' ' . $anim; ?>">

				<header class="entry-header">
					<?php
						$title = get_the_title();

						// esc_url( get_permalink() )
						$title = '<h2 class="entry-title recent-posts-title"><a href="' . get_permalink() . '" rel="bookmark">' . mb_convert_case($title, MB_CASE_TITLE, "UTF-8") . '</a></h2>';

						echo $title
					?>
				</header><!-- .entry-header -->
				<div class="recent-post-meta text-light small bg-white">
					<span><?php the_author(); ?></span> | <span><?php echo get_the_date() ?></span>
				</div>
				<div class="entry-content text-muted">
					<?php
						/* translators: %s: Name of current post */
						the_content( sprintf(
							__( 'Continue reading %s', 'kisima' ),
							the_title( '<span class="screen-reader-text">', '</span>', false )
						) );

						wp_link_pages( array(
							'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'kisima' ) . '</span>',
							'after'       => '</div>',
							'link_before' => '<span>',
							'link_after'  => '</span>',
							'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'kisima' ) . ' </span>%',
							'separator'   => '<span class="screen-reader-text">, </span>',
						) );
					?>
				</div><!-- .entry-content -->

				<?php
					// Author bio.
					// if ( is_single() && get_the_author_meta( 'description' ) ) :
					// 	get_template_part( 'author-bio' );
					// endif;
				?>
			</div>
			<div class="fader"></div>
			<footer class="entry-footer p-abs bg-white pb-2 px-3 d-flex justify-content-between">
				<a href="<?php the_permalink() ?>" class=" text-light"><?php _e('Read More') ?></a>
				<?php edit_post_link( __( 'Edit', 'kisima' ), '<span class="edit-link">', '</span>' ); ?>
			</footer><!-- .entry-footer -->
		</article><!-- #post-## -->
	</div>
</div>