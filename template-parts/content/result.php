<div id="post-<?php the_ID(); ?>" class="reveal">
	<?php //twentyfifteen_post_thumbnail(); ?>

	<header class="entry-header py-2">
		<?php the_title( sprintf( '<h2 class="entry-title display-7 mb-2"><a href="%s" rel="bookmark" class="text-twitter">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-summary mb-2">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<?php if ( 'post' == get_post_type() ) : ?>

		<footer class="entry-footer result-page">
			<?php kisima_entry_meta(); ?>
			<?php edit_post_link( __( 'Edit', 'kisima' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-footer -->

	<?php else : ?>

		<?php edit_post_link( __( 'Edit', 'kisima' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer><!-- .entry-footer -->' ); ?>

	<?php endif; ?>

</div><!-- #post-## -->